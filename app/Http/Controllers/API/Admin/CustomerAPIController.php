<?php

namespace App\Http\Controllers\API\Admin;
use App\Firebase\Firebase;
use App\Http\Controllers\Controller;
use App\Models\Admin\AssignDriver;
use App\Models\Admin\Booking;
use App\Models\Admin\Car_Wash_Details;
use App\Models\Admin\CustomerCarDetail;
use App\Models\Admin\CustomerExtend;
use App\Models\Admin\DailyReporting;
use App\Models\Admin\DriverExtended;
use App\Models\Admin\FuelDetail;
use App\Models\Admin\leave_detail;
use App\Models\Admin\OutOFStatoindetail;
use App\Models\Admin\PermanentInquiry;
use App\Models\Admin\Salary;
use App\Models\Admin\Setting;
use App\Models\User;
use App\Notification\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CustomerAPIController extends Controller
{
    public function customer_create(Request $request)
    {
        $user_id = Auth::guard('api')->user();
//        $user_id = Auth::guard('api')->user()->id;

        $rules = [

            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'apartment' => 'required',
            'block_flat' => 'required',
            'pincode' => 'required',
            'city' => 'required',
            'state' => 'required',
            'address_type' => 'required'
        ];

        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return $this->api_error_response("Invalid input data", $validate->errors()->all());
        }


        $user['role'] = config('constants.ROLE.CUSTOMER');
        $user['reffral_code'] = random_number();
        $user['first_name'] = $request->first_name;
        $user['middle_name'] = $request->middle_name;
        $user['last_name'] = $request->last_name;
        $user['email'] = $request->email;
        $user['date_of_birth'] = formate_date($request->date_of_birth);
        $user['gender'] = $request->gender;
        $user['lati'] = $request->start_late;
        $user['longi'] = $request->start_long;
        $user['status'] = 'active';

        //update Customer extended fields
        $input = [
            "apartment" => $request->apartment,
            "block_flat" => $request->block_flat,
            "address_type" => $request->address_type,
            "pincode" => $request->pincode,
            "city" => $request->city,
            "state" => $request->state,
            "start_late" => $request->start_late,
            "start_long" => $request->start_long,
            "status" => "active",
        ];


        $users = User::where('id', $user_id->id)->update($user);
        $customer = CustomerExtend::where('user_id', $user_id->id)->update($input);
        User::where('id', $user_id->id)->update(['verify_user' => 1]);

        DB::commit();

        $customers = array_merge($user, $input);


        $data['customer_id'] = $user_id->id;
        $data['title'] = "Welcome $request->first_name";
        $data['type'] = 'Customer';
        $data['type_id'] = null;
        $data['msg'] ='Thank you for Registred in zroop drive app !';

       // $data['msg'] = 'New Customer  <a href="' . route('customer-dashboard') . '?id=' . $user_id->id . '">' . Auth::guard('api')->user()->first_name . "'</a>' registered. ";
      //  Notification::notify_with_push($data);
        Firebase::send_push_notification($data);
        customer_notification_store($data);


        $token = Auth::guard('api')->user()->token();

        return $this->api_success_response("Customer Created successfully !", ['token' => $token, 'new_customer_registered_details' => $customers]);

    }


    public
    function customer_login(Request $request)
    {

        $match_otp = 1234;
        $users = User::where('mobile_no', $request->mobile_no)->first();

        if (empty($users)) {

            $rules = [
                'mobile_no' => 'required|unique:users|min:10|max:10',
                'country_code' => 'required',
            ];

            $validate = Validator::make($request->all(), $rules);
            if ($validate->fails()) {
                return $this->api_error_response("Invalid input data", $validate->errors()->all());
            }
            $input = $request->all();
            $otp_number = random_int(1000, 9999);
            sendSMS($request->mobile_no,$otp_number);
            $input['auth_otp'] = $otp_number;
            $input['status'] = 'active';
            $input['reffral_code'] = random_number();
            $input['expire_at'] = Carbon::now()->addSecond(60);
            $input['role'] = config('constants.ROLE.CUSTOMER');
            $user = User::create($input);
            $customer = $user->customerEx()->create($input);

            return $this->api_success_response("new_customer_register_successfully !", [$input]);
        } else {
            $otp_number = random_int(1000, 9999);
            $input['auth_otp'] = $otp_number;
            sendSMS($request->mobile_no,$otp_number);
            $input['expire_at'] = Carbon::now()->addSecond(60);
            $users->update($input);
            return $this->api_success_response("User already Exists !", [$users]);
        }


    }


    public function online_offline()
    {
        $customers = Auth::guard('api')->user();
        if ($customers) {
            if ($customers->is_online == 1) {
                $online_offline = 0;
            } else if ($customers->is_online == 0) {
                $online_offline = 1;
            }
            $customers->update(['is_online' => $online_offline]);
            return $this->api_success_response('Status Updated SuccessFully!..', ['is_online' => $online_offline]);
        } else {
            return $this->api_error_response('Check Your Customer Dose Not Exist!..', [$customers]);
        }
    }


    public
    function customer_get(Request $request)
    {
        $user = Auth::guard('api')->user();
        if (isset($user->id)) {
            $customer = CustomerExtend::where('user_id', $user->id)->first();
            return $this->api_success_response("Success !", ['user' => $user, 'customer' => $customer]);
        } else {

            return $this->api_error_response("Customer Not Login !");
        }

    }


    public
    function customer_profile_update(Request $request)
    {

        $user = Auth::guard('api')->user();

        if ($user) {
            $customerExtended = CustomerExtend::where('user_id', $user->id)->first();
            $rules = [
                'email' => 'regex:/(.+)@(.+)\.(.+)/i|unique:users,email,' . $user->id,

            ];

            $validate = Validator::make($request->all(), $rules);
            if ($validate->fails()) {
                return $this->api_error_response("Invalid input data", $validate->errors()->all());
            }

            $input = $request->all();

            $users['role'] = config('constants.ROLE.CUSTOMER');
            $users['first_name'] = $request->first_name;
            $users['middle_name'] = $request->middle_name;
            $users['last_name'] = $request->last_name;
            $users['email'] = $request->email;
            $users['date_of_birth'] = $request->date_of_birth;
            $users['gender'] = $request->gender;
            $users['status'] = 'active';

            if ($request->hasFile("profile_image")) {
                $img = $request->file("profile_image");
                if (Storage::exists('public/admin/images' . $user->profile_image)) {
                    Storage::delete('public/admin/images' . $user->profile_image);
                }
                $img->store('public/admin/images');
                $users['profile_image'] = $img->hashName();
                $user->update($users);

            }


            $customers = $user->update($users);
            $user['profile_image'] = 'storage/admin/images/' . $user->profile_image;
            $user['star_rating'] = number_formats(user_rating($user));

            // $customers['city'] = $user->get_city->city_name;
            // $customers['state'] = $user->get_state->state_name;


            $users = User::first();


            $data['user_id'] = $user->id;
            $data['title'] = 'Profile Update';
            $data['type'] = 'Customer';
            $data['type_id'] = null;
            $data['msg'] = 'Customer <a href="' . route('customer-dashboard') . '?id=' . $user->id . '">' . $user->first_name . "'</a>'Updated his profile";
         //   Notification::notify_with_push($data);

            return $this->api_success_response("Customer Record Updated successfully !", ['customer_record_updated_details' => $user]);
        } else {
            return $this->api_error_response("Customer Not Login !");
        }

    }


    public
    function customer_refral_code_match(Request $request)
    {

        $driver = Auth::guard('api')->user();

        if ($driver) {
            $rules = [
                'reffral_code' => 'required',
            ];

            $validate = Validator::make($request->all(), $rules);
            if ($validate->fails()) {
                return $this->api_error_response("Invalid input data", $validate->errors()->all());
            }
            $reffral_code = $request->reffral_code;
            // check if account exists
            $drivers = User::firstWhere('reffral_code', $reffral_code);
            if ($drivers) {

                $user = User::where('id', $drivers->id)->first();
                $users = User::find($driver->id);
                $input['reffer_by'] = $drivers->id;
                $users->update($input);
                return $this->api_success_response("Sucecss !", ['user' => $user]);
            } else {
                return $this->api_error_response("Refral Code Dose Not Match in User Tables!");
            }
        } else {
            return $this->api_error_response("Customer Not Login...Login Here...!");

        }


    }

    public
    function customer_logout(Request $request)
    {

        if (Auth::guard('api')->user()) {
            Auth::guard('api')->user()->token()->revoke();
        }
        return $this->api_success_response("Logged out successfully !");
    }


    public
    function add_car_detail(Request $request)
    {
        $user = Auth::guard('api')->user();
        if ($user) {
            $rules = [
                'company_name' => 'required',
                'model_name' => 'required',
                'year' => 'required',
                'manual_or_automatic' => 'required',
                'number_plate' => 'required',
                'car_photos' => 'required',
            ];

            $validate = Validator::make($request->all(), $rules);
            if ($validate->fails()) {
                return $this->api_error_response("Invalid input data", $validate->errors()->all());
            }

            $input = $request->all();
            $input['user_id'] = $user->id;
            $input['status'] = 0;

            if ($request->hasFile("car_photos")) {
                $img = $request->file("car_photos");
                $img->store('public/admin/car_photos');
                $input['car_photos'] = $img->hashName();

            }

            $car_details = CustomerCarDetail::create($input);
            $car_details['car_photos'] = 'storage/admin/car_photos/' . $car_details->car_photos;
            return $this->api_success_response("Customer Record Updated successfully !", ['car_details' => $car_details]);
        } else {
            return $this->api_error_response("Customer Not Login !");
        }

    }

    public
    function get_car_detail(Request $request)
    {

        $customer = Auth::guard('api')->user();
        if ($customer) {
            if ($customer->role == config('constants.ROLE.CUSTOMER')) {
                $get_all_car_details = CustomerCarDetail::where('user_id', $customer->id)->get();
                return $this->api_success_response("Sucecss !", ['get_all_car_details' => $get_all_car_details]);
            } else {
                return $this->api_error_response("Un-authenticated User...!");
            }
        } else {
            return $this->api_error_response("Customer Not Login !");
        }

//        $customer = Auth::guard('api')->user();
//        if ($customer) {
//            $car_details = CustomerCarDetail::where('user_id', $customer->id)->get();
//            return $this->api_success_response("Sucecss !", ['car_details' => $car_details]);
//        } else {
//
//            return $this->api_error_response("Customer Not Login !");
//        }


    }


    public
    function delete_car_detail(Request $request, $id)
    {

        $customer = Auth::guard('api')->user();
        if ($customer) {
            if ($customer->role == config('constants.ROLE.CUSTOMER')) {
                ;
                $customers_car_details = CustomerCarDetail::where('id', $id)->where('user_id', $customer->id)->first();
                if ($customers_car_details) {
                    $car_details = CustomerCarDetail::find($id);
                    $car_details->delete();
                } else {
                    return $this->api_error_response("Check Your Customer Dose Not Exist In Customer Car Details Table!");
                }
                return $this->api_success_response("Sucecss !", ['customer_car_details_deleted_successfully!...' => $car_details]);
            }
        } else {
            return $this->api_error_response("Check Your Customer Dose Not Exist!...");
        }
    }

    public
    function permanent_driver_request(Request $request)
    {
        $customer = Auth::guard('api')->user();
        if ($customer) {
            if ($customer->role == config('constants.ROLE.CUSTOMER')) {
                $rules = [
                    // 'type' => 'required',
                    'weekly_off' => 'required',
                    'accomodation' => 'required',
                    'work_time_from' => 'required',
                    'work_time_to' => 'required',
                    //'from_date' => 'required',
                    // 'to_date' => 'required',
                    'salary_start' => 'required',
                    'salary_end' => 'required',
                    'need_local_person' => 'required',
                ];

                $validate = Validator::make($request->all(), $rules);
                if ($validate->fails()) {
                    return $this->api_error_response("Invalid input data", $validate->errors()->all());
                }

                $input = $request->all();
                $input['user_id'] = $customer->id;
                $input['type'] = config('constants.CATEGORY.permanent');
                $input['status'] = config('constants.STATUS.Pending');

                $Permanent_Inquiry_details = PermanentInquiry::create($input);

                return $this->api_success_response("Customer Permanent Driver Request Added successfully !", ['permanent_inquiry_details' => $Permanent_Inquiry_details]);
            } else {
                return $this->api_error_response("Un-authenticated User...!");
            }
        } else {
            return $this->api_error_response("Customer Not Login !");
        }

    }


    public
    function valet_driver_request(Request $request)
    {
        $customer = Auth::guard('api')->user();
        if ($customer) {
            if ($customer->role == config('constants.ROLE.CUSTOMER')) {
                $rules = [
                    'no_of_drivers' => 'required',
                    'accomodation' => 'required',
                    'salary_start' => 'required',
                    'salary_end' => 'required',
                    'need_local_person' => 'required',
                    'work_time_from' => 'required',
                    'work_time_to' => 'required',
                    //  'from_date' => 'required',
                    //'to_date' => 'required',
                ];

                $validate = Validator::make($request->all(), $rules);
                if ($validate->fails()) {
                    return $this->api_error_response("Invalid input data", $validate->errors()->all());
                }

                $input = $request->all();
                $input['user_id'] = $customer->id;
                $input['type'] = config('constants.CATEGORY.valet_parking');
                $input['status'] = config('constants.STATUS.Pending');

                $Permanent_Inquiry_details = PermanentInquiry::create($input);
                return $this->api_success_response("Customer Valet Driver Request Added successfully !", ['permanent_inquiry_details' => $Permanent_Inquiry_details]);
            } else {
                return $this->api_error_response("Un-authenticated User...!");
            }
        } else {
            return $this->api_error_response("Customer Not Login !");
        }

    }

    public
    function event_valet_driver_request(Request $request)
    {
        $customer = Auth::guard('api')->user();
        if ($customer) {
            if ($customer->role == config('constants.ROLE.CUSTOMER')) {
                $rules = [
                    'no_of_drivers' => 'required',
                    //  'need_local_person' => 'required',
                    'work_time_from' => 'required',
                    'work_time_to' => 'required',
                    'from_date' => 'required',
                    'to_date' => 'required',
                ];

                $validate = Validator::make($request->all(), $rules);
                if ($validate->fails()) {
                    return $this->api_error_response("Invalid input data", $validate->errors()->all());
                }

                $input = $request->all();
                $input['user_id'] = $customer->id;
                $input['type'] = config('constants.CATEGORY.event_valet_parking');
                $input['status'] = config('constants.STATUS.Pending');

                $Permanent_Inquiry_details = PermanentInquiry::create($input);
                return $this->api_success_response("Customer Valet Driver Request Added successfully !", ['permanent_inquiry_details' => $Permanent_Inquiry_details]);
            } else {
                return $this->api_error_response("Un-authenticated User...!");
            }
        } else {
            return $this->api_error_response("Customer Not Login !");
        }

    }


    public
    function get_allocated_driver_list()
    {

        $customer = Auth::guard('api')->user();
        if ($customer) {
            if ($customer->role == config('constants.ROLE.CUSTOMER')) {

                $drivers = AssignDriver::where('user_id', $customer->id)->where('type', config('constants.CATEGORY.permanent'))->get();
                foreach ($drivers as $key => $driv) {

                    $drivers[$key]['customer_name'] = $driv->customers->first_name;
                    $drivers[$key]['driver_name'] = $driv->drivers->first_name;

                }
                return $this->api_success_response("Sucecss !", ['customer_permanent_driver_details' => $drivers]);
            }
        } else {
            return $this->api_error_response("Check Your Customer Does Not Exist!...");
        }
    }

    public
    function get_daily_reporting_data(Request $request, $id)
    {


        $customer = Auth::guard('api')->user();
        if ($customer) {
            $assign_driver = AssignDriver::where('user_id', $customer->id)->first();
            if ($assign_driver) {
                $assign = AssignDriver::where('user_id', $customer->id)->where('driver_id', $id)->first();
                if ($assign) {


                    $rules = [
                        'select_month' => 'required|integer|between:1,12',
                    ];

                    $validate = Validator::make($request->all(), $rules);
                    if ($validate->fails()) {
                        return $this->api_error_response("Invalid input data", $validate->errors()->all());
                    }
                    $daily_reporting_details = DailyReporting::whereMonth('created_at', $request->select_month)
                        ->where('assign_driver_id', $assign->driver_id)->get();
                    foreach ($daily_reporting_details as $key => $daily_reporting_detail) {

                        $daily_reporting_details[$key]['driver_name'] = $daily_reporting_detail->driver->first_name;

                    }
                    if ($daily_reporting_details->count() > 0) {
                        return $this->api_success_response('Success!..', ['daily_reporting_details' => $daily_reporting_details]);
                    } else {
                        return $this->api_error_response('Record Not Found!..');
                    }
                } else {
                    return $this->api_error_response("Customer Assign Driver Does Not In This Table !");
                }
            } else {
                return $this->api_error_response("Customer Does Not In This Table !");
            }
        } else {
            return $this->api_error_response("Customer Not Login !");
        }

    }

    public
    function add_out_of_station_detail(Request $request)
    {

        $customer = Auth::guard('api')->user();
        if ($customer) {
            $rules = [
                'from_date' => 'required',
                'to_date' => 'required',
                'from_time' => 'required',
                'to_time' => 'required',
                'location' => 'required',
                'late' => 'required',
                'longe' => 'required',
            ];

            $validate = Validator::make($request->all(), $rules);
            if ($validate->fails()) {
                return $this->api_error_response("Invalid input data", $validate->errors()->all());
            }
            $assign_driver = AssignDriver::where('user_id', $customer->id)->first();

            if ($assign_driver) {
                $input = $request->all();
                $input['assign_driver_id'] = $assign_driver->driver_id;
                $Out_Of_Station_Details = OutOFStatoindetail::create($input);

                $data['driver_id'] = $assign_driver->driver_id;
                $data['title'] = 'Out of Station';
                $data['type'] = 'Out of Station';
                $data['type_id'] = null;
                $data['msg'] = "Your customer $customer->first_name is out of station for the date of $Out_Of_Station_Details->from_date to $Out_Of_Station_Details->to_date";

            //    \App\Notification\Notification::notify_with_push($data);
                Firebase::send_push_notification_driver($data);
                driver_notification_store($data);

                return $this->api_success_response("Customer Out Of Station Details Added Successfully !", ['out_of_station_details' => $Out_Of_Station_Details]);
            } else {
                return $this->api_error_response("Customer Does Not In This Table !");
            }
        } else {
            return $this->api_error_response("Customer Not Login !");
        }

    }


    public
    function get_allocated_driver_detail(Request $request, $id)
    {

        $customer = Auth::guard('api')->user();
        if ($customer) {
            $assign_driver = AssignDriver::where('user_id', $customer->id)->first();
            if ($assign_driver) {
                $detais = AssignDriver::find($id);
                $assign_drivers = AssignDriver::where('id', $id)->where('user_id', $customer->id)->first();
                if ($assign_drivers) {
                    $driver_details = User::where('id', $assign_drivers->driver_id)->first();
                    return $this->api_success_response("Success!", ['driver_details' => $driver_details]);
                } else {
                    return $this->api_error_response("Customer Does Not In This Table !");
                }
            } else {
                return $this->api_error_response("Customer Does Not In This Table !");
            }
        } else {
            return $this->api_error_response("Customer Not Login !");
        }

    }

    public
    function get_driver_fuel_detail(Request $request, $id)
    {


        $customer = Auth::guard('api')->user();
        if ($customer) {

            $fuel_details = FuelDetail::where('assign_driver_id', $id)->orderBy('id', 'DESC')->get();
            foreach ($fuel_details as $key => $fuel_detail) {
                $fuel_details[$key]['driver_name'] = $fuel_detail->driver->first_name;
            }
            if ($fuel_details) {
                return $this->api_success_response("Success!", ['fuel_details' => $fuel_details]);
            } else {
                return $this->api_error_response("Record Not Found !");
            }

        } else {
            return $this->api_error_response("Customer Not Login !");
        }


    }


    public
    function get_near_by_drive_api(Request $request)
    {


        $customer = Auth::guard('api')->user();
        if ($customer) {

            $near_by_driver = User::where('is_online', '1')->where('verify_user', '1')->where('role', config('constants.ROLE.DRIVER'))->select('id', 'name', 'lati', 'longi', DB::raw(sprintf(
                '(6371 * acos(cos(radians(%1$.7f)) * cos(radians(`lati`)) * cos(radians(`longi`) - radians(%2$.7f)) + sin(radians(%1$.7f)) * sin(radians(`lati`)))) AS distance',
                $customer->lati,
                $customer->longi
            )))
                ->having('distance', '<', 500)
                ->orderBy('distance', 'asc')
                ->get();


            $near_by_drivers = DriverExtended::where('work_type', '!=', config('constants.CATEGORY.permanent'))
                ->whereHas('verify_user', function ($q) use ($customer) {
                    return $q->where('is_online', '1')->where('role', config('constants.ROLE.DRIVER'))->select('id', 'name', 'lati', 'longi', DB::raw(sprintf(
                        '(6371 * acos(cos(radians(%1$.7f)) * cos(radians(`lati`)) * cos(radians(`longi`) - radians(%2$.7f)) + sin(radians(%1$.7f)) * sin(radians(`lati`)))) AS distance',
                        $customer->lati,
                        $customer->longi
                    )))->having('distance', '<', 500)
                        ->orderBy('distance', 'asc');

                })->get();

            foreach ($near_by_drivers as $key => $near_by_driver) {

                $near_by_drivers[$key] ['driver_total_trip'] = Booking::where('driver_id', $near_by_driver->user_id)->where('status', config('constants.STATUS.Completed'))->count();

                $near_by_drivers[$key]['driver_name'] = $near_by_driver->driver->first_name;


                $data['driver_id'] = $near_by_driver->user_id;
                $data['title'] = 'Yea..!  A new ride for you';
                $data['type'] = 'Near By';
                $data['type_id'] = null;
                $driver_name=$near_by_driver->driver->first_name;

                $data['msg'] = "Hello $driver_name new trip assigned near you by $customer->first_name confirm if you free for it ! Thank you..";

          //      \App\Notification\Notification::notify_with_push($data);
                Firebase::send_push_notification_driver($data);
                driver_notification_store($data);


                $lon1 = Booking::where('driver_id', $near_by_driver->user_id)->where('status', '=', 'completed')->sum('start_late');
                $lon2 = Booking::where('driver_id', $near_by_driver->user_id)->where('status', '=', 'completed')->sum('start_long');


                $theta = $lon1 - $lon2;
                $dist = sin(deg2rad($lon1)) * sin(deg2rad($lon2)) + cos(deg2rad($lon1)) * cos(deg2rad($lon2)) * cos(deg2rad($theta));
                $dist = acos($dist);
                $dist = rad2deg($dist);
                $miles = $dist * 60 * 1.1515;

                $km = $miles * 1.609344;

                $near_by_drivers[$key]['driver_total_km'] = $km;


            }


            return $this->api_success_response("Success!", ['near_by_driver' => $near_by_drivers]);

        } else {
            return $this->api_error_response("Customer Not Login !");
        }


    }


    public
    function get_payment_detail(Request $request, $id)
    {

        $customer = Auth::guard('api')->user();
        if ($customer) {
            $assign_driver = AssignDriver::where('user_id', $customer->id)->first();
            if ($assign_driver) {
                $assign = AssignDriver::where('user_id', $customer->id)->where('driver_id', $id)->first();
                if ($assign) {
                    $salary_details = Salary::where('assign_driver_id', $assign->driver_id)->orderBy('id', 'DESC')->get();
                    return $this->api_success_response("Success!", ['salary_details' => $salary_details]);
                } else {
                    return $this->api_error_response("Customer Assign Driver Does Not In This Table !");
                }
            } else {
                return $this->api_error_response("Customer Does Not In This Table !");
            }
        } else {
            return $this->api_error_response("Customer Not Login !");
        }

    }


    public
    function get_driver_leave_detail(Request $request, $id)
    {

        $customer = Auth::guard('api')->user();
        if ($customer) {
            $assign_driver = AssignDriver::where('user_id', $customer->id)->first();
            if ($assign_driver) {
                $assign = AssignDriver::where('user_id', $customer->id)->where('driver_id', $id)->first();
                if ($assign) {

                    $date = array();
                    for ($i = 1; $i <= 12; $i++) {
                        $years = leave_detail::whereMonth('created_at', $i)->where('assign_driver_id', $id)->get();
                        foreach ($years as $year) {

                            if ($i == 1) {
                              //  $year = Carbon::now()->format('Y');
                                $date['January,' . year_formate($year->created_at)] = leave_detail::whereMonth('created_at', $i)->where( DB::raw('YEAR(created_at)'), '=', year_formate($year->created_at))->where('assign_driver_id', $id)->get();
                            }
                            if ($i == 2) {
                              //  $year = Carbon::now()->format('Y');
                                $date['February,' . year_formate($year->created_at)] = leave_detail::whereMonth('created_at', $i)->where( DB::raw('YEAR(created_at)'), '=', year_formate($year->created_at))->where('assign_driver_id', $id)->get();
                            }
                            if ($i == 3) {
                              //  $year = Carbon::now()->format('Y');
                                $date['March,' . year_formate($year->created_at)] = leave_detail::whereMonth('created_at', $i)->where( DB::raw('YEAR(created_at)'), '=', year_formate($year->created_at))->where('assign_driver_id', $id)->get();
                            }
                            if ($i == 4) {
                             //   $year = Carbon::now()->format('Y');
                                $date['April,' . year_formate($year->created_at)] = leave_detail::whereMonth('created_at', $i)->where( DB::raw('YEAR(created_at)'), '=', year_formate($year->created_at))->where('assign_driver_id', $id)->get();
                            }
                            if ($i == 5) {
                             //   $year = Carbon::now()->format('Y');
                                $date['May,' . year_formate($year->created_at)] = leave_detail::whereMonth('created_at', $i)->where( DB::raw('YEAR(created_at)'), '=', year_formate($year->created_at))->where('assign_driver_id', $id)->get();
                            }
                            if ($i == 6) {
                               // $year = Carbon::now()->format('Y');
                                $date['June,' . year_formate($year->created_at)] = leave_detail::whereMonth('created_at', $i)->where( DB::raw('YEAR(created_at)'), '=', year_formate($year->created_at))->where('assign_driver_id', $id)->get();
                            }
                            if ($i == 7) {
                             //   $year = Carbon::now()->format('Y');
                                $date['July,' . year_formate($year->created_at)] = leave_detail::whereMonth('created_at', $i)->where( DB::raw('YEAR(created_at)'), '=', year_formate($year->created_at))->where('assign_driver_id', $id)->get();
                            }
                            if ($i == 8) {
                              //  $year = Carbon::now()->format('Y');
                                $date['August,' . year_formate($year->created_at)] = leave_detail::whereMonth('created_at', $i)->where( DB::raw('YEAR(created_at)'), '=', year_formate($year->created_at))->where('assign_driver_id', $id)->get();
                            }
                            if ($i == 9) {
                              //  $year = Carbon::now()->format('Y');
                                $date['September,' . year_formate($year->created_at)] = leave_detail::whereMonth('created_at', $i)->where( DB::raw('YEAR(created_at)'), '=', year_formate($year->created_at))->where('assign_driver_id', $id)->get();
                            }
                            if ($i == 10) {
                              //  $year = Carbon::now()->format('Y');
                                $date['October,' . year_formate($year->created_at)] = leave_detail::whereMonth('created_at', $i)->where( DB::raw('YEAR(created_at)'), '=', year_formate($year->created_at))->where('assign_driver_id', $id)->get();
                            }
                            if ($i == 11) {
                              //  $year = Carbon::now()->format('Y');
                                $date['November,' . year_formate($year->created_at)] = leave_detail::whereMonth('created_at', $i)->where( DB::raw('YEAR(created_at)'), '=', year_formate($year->created_at))->where('assign_driver_id', $id)->get();
                            }
                            if ($i == 12) {
                              //  $year = Carbon::now()->format('Y');
                                $date['December,' . year_formate($year->created_at)] = leave_detail::whereMonth('created_at', $i)->where( DB::raw('YEAR(created_at)'), '=', year_formate($year->created_at))->where('assign_driver_id', $id)->get();
                            }
                        }
                    }

                    foreach ($date as $key => $d) {
                        if (count($d) > 0) {
                            $date[$key] = $d;
                        }
                    }

                    return $this->api_success_response("Success!", ['leave_details' => $date]);
                } else {
                    return $this->api_error_response("Customer Assign Driver Does Not In This Table !");
                }
            } else {
                return $this->api_error_response("Customer Does Not In This Table !");
            }
        } else {
            return $this->api_error_response("Customer Not Login !");
        }

    }


    public
    function customer_cancel_trip(Request $request, $id)
    {

        $customer = Auth::guard('api')->user();
        if ($customer) {
            $input = $request->all();
            $booking = Booking::where('id', $id)->where('customer_id', $customer->id)->first();
            if ($booking) {
                $input['status'] = config('constants.STATUS.Cancel');
                if ($input) {
                    $rules = [
                        'cancel_reason' => 'required',
                    ];


                    $validate = Validator::make($request->all(), $rules);
                    if ($validate->fails()) {
                        return $this->api_error_response("Invalid input data", $validate->errors()->all());
                    }

                    $input['cancel_reason'] = $request->cancel_reason;
                    $input['customer_name'] = $customer->first_name;
                    $customers = $booking->update($input);


                    $data['customer_id'] = $customer->id;
                    $data['title'] = 'Trip rejected';
                    $data['type'] = 'Trip';
                    $data['type_id'] = $booking->id;
                    $driver_name = $booking->driver->first_name;
                    $start_date_formate = notification_date_formate($booking->start_or_pickup_date);
                    $end_date_formate = notification_date_formate($booking->end_or_drop_date);

                    $data['msg'] = "Hello $customer->first_name your trip of $start_date_formate to $end_date_formate is rejected by $driver_name" ;

               //     Notification::notify_with_push($data);
                    Firebase::send_push_notification($data);
                    customer_notification_store($data);

                    return $this->api_success_response("Customer Car Booking Cancel SucessFully!", ['cancel_car_reason' => $input]);
                }
            } else {
                return $this->api_error_response("Customer Not Assignn In This Table !");
            }
        } else {
            return $this->api_error_response("Customer Not Login !");
        }


    }

    public
    function get_upcoming_trip(Request $request)
    {

        $customer = Auth::guard('api')->user();

        if ($customer) {

            if ($customer->role == config('constants.ROLE.CUSTOMER')) {
                if ($request->status || $request->from_date || $request->to_date) {

                    $customer_upcoming_trips = Booking::where('customer_id', $customer->id)->where(function ($query) use ($request) {
                        if ($request->status) {
                            $query->orWhere('status', $request->status);
                        }
                        if ($request->from_date && $request->to_date) {
                            $query->whereDate('created_at', '>=', $request->from_date);
                            $query->whereDate('created_at', '<=', $request->to_date);
                        }

                    })->get();
                    foreach ($customer_upcoming_trips as $key => $customer_upcoming_trip) {

                        $customer_upcoming_trips[$key]['customer_name'] = $customer_upcoming_trip->customer->first_name;
                        $customer_upcoming_trips[$key]['driver_name'] = $customer_upcoming_trip->driver->first_name;

                    }
                    return $this->api_error_response("Success!", ['customer_upcoming_trip_details' => $customer_upcoming_trips]);
                }
                $customer_upcoming_trips = Booking::where('customer_id', $customer->id)->where(function ($query) {

                        $query->orWhere('status', config('constants.STATUS.Pending'));
                        $query->orWhere('status', config('constants.STATUS.Accepted'));
                        $query->orWhere('status', config('constants.STATUS.Confirm'));
                        $query->orWhere('created_at', '>=', Carbon::today());


                })->get();

                foreach ($customer_upcoming_trips as $key => $customer_upcoming_trip) {

                    $customer_upcoming_trips[$key]['customer_name'] = $customer_upcoming_trip->customer->first_name;
//                    $customer_upcoming_trips[$key]['driver_name'] = $customer_upcoming_trip->driver->first_name;

                }
                return $this->api_error_response("Success!", ['customer_upcoming_trip_details' => $customer_upcoming_trips]);
            } else {
                return $this->api_error_response("Un-authenticated User...!");
            }
        } else {
            return $this->api_error_response("Customer Not Login !");
        }
    }

    public
    function customer_filters_in_all_trip_apis(Request $request)
    {

        $customer = Auth::guard('api')->user();
        if ($customer) {
            if ($request->status || $request->from_date || $request->to_date) {

                $booking = Booking::where('customer_id', $customer->id)->where(function ($query) use ($request) {
                    if ($request->status) {
                        $query->orWhere('status', $request->status);
                    }
                    if ($request->from_date && $request->to_date) {
                        $query->whereDate('created_at', '>=', $request->from_date);
                        $query->whereDate('created_at', '<=', $request->to_date);
                    }

                })->get();
                return $this->api_error_response("Success!", ['customer_all_trip_details' => $booking]);
            }
            $booking = Booking::where('customer_id', $customer->id)->get();
            return $this->api_error_response("Success!", ['customer_all_trip_details' => $booking]);

        } else {
            return $this->api_error_response("Customer Not Login !");
        }
    }


    public
    function customer_match_otp(Request $request)
    {

        $rules = ['otp' => 'required',
            'mobile_no' => 'required',];
        $custom_validation = [
            'otp.required'=> 'The OTP field is required', // custom message
        ];

        $validate = Validator::make($request->all(), $rules,$custom_validation);
        if ($validate->fails()) {
            return $this->api_error_response("Invalid input data", $validate->errors()->all());
        }
        $user = User::firstWhere('mobile_no', $request->mobile_no);

        $match_otp = $user->auth_otp;

        $reffral_code = $request->reffral_code;

        // check if account exists
        $users = User::firstWhere('reffral_code', $reffral_code);

        if ($match_otp == $request->otp) {
            $now = Carbon::now();
            if($now->isAfter($user->expire_at)){
                return $this->api_error_response("Your OTP has been expired");
            }
            if ($user = User::where('mobile_no', $request->mobile_no)->first()) {
                Auth::guard('web')->login($user);
                $user = Auth::user();
//                if ($user->reffer_by == '') {
//                   // dd($users);
//                    $input['reffer_by'] = $users->id;
//                    $user->update($input);
//                }

                if (Auth::user()->role != config('constants.ROLE.ADMIN')) {
                    if (Auth::user()->role == config('constants.ROLE.CUSTOMER')) {
                        $input['device_token'] = $request->device_token;
                        $user->update($input);
                        if ($user->verify_user == 0) {
                            $customer = User::where('id', Auth::user()->id)->first();
                            $worktype = CustomerExtend::where('user_id', Auth::user()->id)->first();
                            $token = auth()->user()->createToken('FundooApp')->accessToken;
                            $verify_user = false;
                            $message = ["$user->role Login SucessFully!..."];
                            return $this->api_success_response("Add All details!", ['token' => $token, 'message' => $message, 'data' => $customer, 'work_type' => $worktype['work_type'], 'verify_user' => $verify_user]);


                        } else if ($user->verify_user == 1) {

                            $customer = User::where('id', Auth::user()->id)->first();
                            $customer['profile_image'] = 'storage/admin/images/' . $customer->profile_image;
                            $worktype = CustomerExtend::where('user_id', Auth::user()->id)->first();

                            $token = auth()->user()->createToken('FundooApp')->accessToken;
                            $verify_user = true;
                            $message = ["$user->role Login SucessFully!..."];


                            return $this->api_success_response("Logged in successfully !", ['token' => $token, 'message' => $message, 'data' => $customer, 'work_type' => $worktype['work_type'], 'verify_user' => $verify_user]);

                        }
                    } else {
                        return $this->api_error_response("Un-authenticated User...!");
                    }
                } else {
                    return $this->api_error_response("Admin Not Login!...");
                }

            } else {
                return $this->api_error_response("Mobile Number Not Match Check Your User Table!");
            }
        } else {
            return $this->api_error_response("OTP Dose Not Match Check Your OTP!");
        }


    }


    public
    function customer_home_api(Request $request)
    {

        $customer = Auth::guard('api')->user();
        if ($customer) {
            $customer_on_going_trip_details = Booking::where('customer_id', $customer->id)->where('status', config('constants.STATUS.On_Going'))->first();

            if ($customer_on_going_trip_details != null || $customer_on_going_trip_details != '' && !empty($customer_advance_booking_details)) {
                $customer_on_going_trip_details['driver_address']=DriverExtended::where('user_id',$customer_on_going_trip_details->driver_id)->get();
                $customer_on_going_trip_details->customer->first_name;
                $customer_on_going_trip_details->driver->first_name;
            }

            if (isset($customer_on_going_trip_details['picture_befor_start'])) {
                $customer_on_going_trip_details['picture_befor_start'] = 'storage/admin/images/' . $customer_on_going_trip_details->picture_befor_start;
            }
            if (isset($customer_on_going_trip_details['picture_befor_end'])) {
                $customer_on_going_tzrip_details['picture_befor_end'] = 'storage/admin/images/' . $customer_on_going_trip_details->picture_befor_end;
            }
            $customer_count=\App\Models\Admin\Notification::where('user_id',$customer->id)->whereNull('read_at')->count();

            return $this->api_success_response("Sucecss !", ['customer' => $customer, 'on_going_trip_details' => $customer_on_going_trip_details,'notification_count'=>$customer_count]);
        }
        return $this->api_error_response("Customer Not Login !");


    }

    public function my_trip(Request $request)
    {
        $customer = Auth::guard('api')->user();
        if ($customer) {
            if ($customer->role == config('constants.ROLE.CUSTOMER')) {

                if ($request->status || $request->from_date || $request->to_date) {

                    $customer_trip_details = Booking::where('customer_id', $customer->id)->where(function ($query) use ($request) {
                        if ($request->status) {
                            $query->orWhere('status', $request->status);
                        }
                        if ($request->from_date && $request->to_date) {
                            $query->whereDate('created_at', '>=', $request->from_date);
                            $query->whereDate('created_at', '<=', $request->to_date);
                        }

                    })->get();
                    foreach ($customer_trip_details as $key => $customer_trip_detail) {

                        $customer_trip_details[$key]['customer_name'] = $customer_trip_detail->customer->first_name;
                        $customer_trip_details[$key]['driver_name'] = $customer_trip_detail->driver->first_name;

                    }
                    return $this->api_error_response("Success!", ['trip_details' => $customer_trip_details]);
                }

                $customer_trip_details = Booking::where('customer_id', $customer->id)->where(function ($query) {
                    $query->orwhere('status', config('constants.STATUS.Completed'));
                    $query->orwhere('status', config('constants.STATUS.Cancel'));

                })->orderBy('id', 'DESC')->get();

                foreach ($customer_trip_details as $key => $customer_trip_detail) {

                    $customer_trip_details[$key]['customer_name'] = $customer_trip_detail->customer->first_name;
                    $customer_trip_details[$key]['driver_name'] = $customer_trip_detail->driver->first_name;

                }
                return $this->api_success_response("Sucecss !", ['trip_details' => $customer_trip_details]);
            }
        } else {
            return $this->api_error_response("Check Your User Does Not Exist!..Login Here...");
        }
    }


    public
    function add_customer_address(Request $request)
    {
        $customer = Auth::guard('api')->user();
        if ($customer) {
            if ($customer->role == config('constants.ROLE.CUSTOMER')) {
                $rules = [
                    'apartment' => 'required',
                    'block_flat' => 'required',
                    'pincode' => 'required',
                    'city' => 'required',
                    'state' => 'required',
                    'address_type' => 'required',
                    'start_late' => 'required',
                    'start_long' => 'required',
                ];

                $validate = Validator::make($request->all(), $rules);
                if ($validate->fails()) {
                    return $this->api_error_response("Invalid input data", $validate->errors()->all());
                }

                $input = $request->all();
                $input['user_id'] = $customer->id;
                $input['status'] = "active";

                $customer_address_details = CustomerExtend::create($input);
                return $this->api_success_response("Customer Address Record Added successfully !", ['customer_address_details' => $customer_address_details]);

            } else {
                return $this->api_error_response("Un-authenticated User...!");
            }
        } else {
            return $this->api_error_response("Customer Not Login !");
        }

    }


    public
    function get_customer_address(Request $request)
    {
        $customer = Auth::guard('api')->user();
        if ($customer) {
            if ($customer->role == config('constants.ROLE.CUSTOMER')) {

                $customer_address = CustomerExtend::where('user_id', $customer->id)->get();

                return $this->api_success_response("Sucecss !", ['customer_address_details' => $customer_address,]);

            } else {
                return $this->api_error_response("Un-authenticated User...!");
            }
        } else {
            return $this->api_error_response("Customer Not Login !");
        }

    }

    public
    function assign_driver_car_details(Request $request, $id)
    {


        $customer = Auth::guard('api')->user();
        if ($customer) {
            $assign_driver = AssignDriver::where('user_id', $customer->id)->first();
            if ($assign_driver) {
                $assign = AssignDriver::where('user_id', $customer->id)->where('driver_id', $id)->first();
                if ($assign) {


                    $rules = [
                        'select_month' => 'required|integer|between:1,12',
                    ];

                    $validate = Validator::make($request->all(), $rules);
                    if ($validate->fails()) {
                        return $this->api_error_response("Invalid input data", $validate->errors()->all());
                    }
                    $daily_reporting_details = DailyReporting::whereMonth('created_at', $request->select_month)
                        ->where('assign_driver_id', $assign->driver_id)->get();
                    foreach ($daily_reporting_details as $key => $daily_reporting_detail) {

                        $daily_reporting_details[$key]['driver_name'] = $daily_reporting_detail->driver->first_name;

                    }
                    if ($daily_reporting_details->count() > 0) {
                        return $this->api_success_response('Success!..', ['daily_reporting_details' => $daily_reporting_details]);
                    } else {
                        return $this->api_error_response('Record Not Found!..');
                    }
                } else {
                    return $this->api_error_response("Customer Assign Driver Does Not In This Table !");
                }
            } else {
                return $this->api_error_response("Customer Does Not In This Table !");
            }
        } else {
            return $this->api_error_response("Customer Not Login !");
        }

    }


    public
    function add_car_wash(Request $request, $id)
    {


        $customer = Auth::guard('api')->user();

        if ($customer) {
            if ($customer->role == config('constants.ROLE.CUSTOMER')) {
                $rules = [
                    'car_id' => 'required|integer',
                ];

                $validate = Validator::make($request->all(), $rules);
                if ($validate->fails()) {
                    return $this->api_error_response("Invalid input data", $validate->errors()->all());
                }
                $assign_driver = User::where('id', $request->id)->first();
                $input = $request->all();
                $input['customer_id'] = $customer->id;
                $input['driver_id'] = $assign_driver->id;
                $input['status'] = config('constants.STATUS.Pending');

                $car_wash_detail = Car_Wash_Details::create($input);

                $data['driver_id'] = $assign_driver->id;
                $data['title'] = 'Car washing added';
                $data['type'] = 'Car Wash';
                $data['type_id'] = null;
                $driver_name=$car_wash_detail->drivers->first_name;
                $car_name=$car_wash_detail->cars->name;

                $data['msg'] = "Hello $driver_name new car washing for $car_name do that as early as possible thank you !";

                Firebase::send_push_notification_driver($data);
                driver_notification_store($data);


                return $this->api_success_response("Success !", ['car_wash_detail' => $car_wash_detail,]);

            } else {
                return $this->api_error_response("Un-authenticated User...!");
            }
        } else {
            return $this->api_error_response("Customer Not Login !");
        }

    }


    public
    function get_car_wash(Request $request, $id)
    {

        $customer = Auth::guard('api')->user();
        if ($customer) {
            if ($customer->role == config('constants.ROLE.CUSTOMER')) {
                $pending_car_wash_details = Car_Wash_Details::where('customer_id', $customer->id)->where('driver_id', $id)->where('status', config('constants.STATUS.Pending'))->get();
                foreach ($pending_car_wash_details as $key => $pending_car_wash_detail) {
                    $pending_car_wash_details[$key]['customer_name'] = $pending_car_wash_detail->customers->first_name;
                    $pending_car_wash_details[$key]['driver_name'] = $pending_car_wash_detail->drivers->first_name;
                    $pending_car_wash_details[$key]['car_name'] = (isset($pending_car_wash_detail->cars->model_name)) ?$pending_car_wash_detail->cars->model_name :'-';

                }
                $done_car_wash_details = Car_Wash_Details::where('customer_id', $customer->id)->where('driver_id', $id)->where('status', config('constants.STATUS.Done'))->get();
                foreach ($done_car_wash_details as $key => $done_car_wash_detail) {
                    $done_car_wash_details[$key]['customer_name'] = $done_car_wash_detail->customers->first_name;
                    $done_car_wash_details[$key]['driver_name'] = $done_car_wash_detail->drivers->first_name;
                    $done_car_wash_details[$key]['car_name'] = (isset($done_car_wash_detail->cars->model_name)) ?$done_car_wash_detail->cars->model_name:'-';

                }
                return $this->api_success_response("Sucecss !", ['pending_car_wash_details' => $pending_car_wash_details, 'done_car_wash_details' => $done_car_wash_details]);
            } else {
                return $this->api_error_response("Un-authenticated User...!");
            }
        } else {
            return $this->api_error_response("Customer Not Login !");
        }
    }


    function customer_count_reffer()
    {

        $customers = Auth::guard('api')->user();
        if ($customers) {
            $match_reffer_code_users = User::where('reffer_by', $customers->id)->get();
            $total_reffer_amounts = 0;
            foreach ($match_reffer_code_users as $key => $match_reffer_code_user) {
                $book = Booking::where('status', config('constants.STATUS.Completed'))->where('customer_id', $match_reffer_code_user->id)->first();
                if (isset($book->customer_book->first_name)) {
                    $completed_trips[$key]['customer_name'] = $book->customer_book->first_name;
                }
                $reffer_amounts = Booking::where('status', config('constants.STATUS.Completed'))->where('customer_id', $match_reffer_code_user->id)->count();
                $completed_trips[$key]['completed_trip_count'] = Booking::all()->where('status', config('constants.STATUS.Completed'))->where('customer_id', $match_reffer_code_user->id)->count();
                $per_reffer = Setting::first();
                $reffer_code_amount = $per_reffer->refer_comission_amt;
                $completed_trips[$key]['reffer_amount'] = $reffer_code_amount * $reffer_amounts;
                $completed_trip_count = Booking::where('status', config('constants.STATUS.Completed'))->where('customer_id', $match_reffer_code_user->id)->count();
                $total_reffer_amounts += $reffer_amounts;
            }

            $total_completed_trip = $total_reffer_amounts;
            $total_reffer_amount = $total_reffer_amounts * $reffer_code_amount;

            return $this->api_success_response('Success!..', ['completed_trip' => $completed_trips, 'total_completed_trip' => $total_completed_trip, 'total_reffer_amount' => $total_reffer_amount]);
        } else {
            return $this->api_error_response('Check Your Customer Does Not Exist!..Login Here...');
        }


    }


    public
    function get_valet_driver_list()
    {

        $customer = Auth::guard('api')->user();
        if ($customer) {
            if ($customer->role == config('constants.ROLE.CUSTOMER')) {

                $drivers = AssignDriver::where('user_id', $customer->id)->where('type', config('constants.CATEGORY.valet_parking'))->get();
                foreach ($drivers as $key => $driv) {

                    $drivers[$key]['customer_name'] = $driv->customers->first_name;
                    $drivers[$key]['driver_name'] = $driv->drivers->first_name;

                }
                return $this->api_success_response("Sucecss !", ['customer_valet_driver_details !...' => $drivers]);
            }
        } else {
            return $this->api_error_response("Check Your Customer Does Not Exist!...");
        }
    }

    public function live_booking_assign_driver(Request $request)
    {

        $customer = Auth::guard('api')->user();
        if ($customer) {
            if ($customer->role == config('constants.ROLE.CUSTOMER')) {

                $drivers = DriverExtended::where('work_type', '!=', config('constants.CATEGORY.permanent'))->doesntHave('assignDriver')->doesntHave('permanent_driv')->whereHas('user', function ($q) {
                    $q->where('verify_user', 1);
                })->get();
                return $this->api_success_response("Sucecss !", ['driver_list_details !...' => $drivers]);

            } else {
                return $this->api_error_response("Un-authenticated User...!");
            }
        } else {
            return $this->api_error_response("Customer Not Login !");
        }
    }
    public function customer_notification_list()
    {
        $customer = Auth::guard('api')->user();

        if ($customer) {

            $today=\App\Models\Admin\Notification::where('user_id',$customer->id)->whereDate('created_at', Carbon::today())->get();
            $yesterday=\App\Models\Admin\Notification::where('user_id',$customer->id)->whereDate('created_at', Carbon::yesterday())->get();
            $date = \Carbon\Carbon::today()->subDays(3);

            $today_date = \Carbon\Carbon::now();
            $final_date=substr($today_date,0,10);


            $last_three_days=\App\Models\Admin\Notification::where('user_id',$customer->id)->whereDate('created_at','!=',$final_date)->whereDate('created_at','>=',$date)->get();

            $lastseven = \Carbon\Carbon::today()->subDays(7);
            $last_seven_days=\App\Models\Admin\Notification::where('user_id',$customer->id)->whereDate('created_at','!=',$final_date)->whereDate('created_at','>=',$lastseven)->get();

            $lastmonth= \Carbon\Carbon::today()->subDays(30);
            $last_month=\App\Models\Admin\Notification::where('user_id',$customer->id)->whereDate('created_at','!=',$final_date)->whereDate('created_at','>=',$lastmonth)->get();

            $notification = array();
            if (count($today) > 0)
            {
                foreach($today  as $key=>$body)
                {
                    $today[$key]['body'] = strip_tags($body->body);

                }
                $notification['today'] = \App\Models\Admin\Notification::where('user_id',$customer->id)->whereDate('created_at', Carbon::today())->orderBy('id', 'DESC')->get();

                foreach($notification['today']  as $key=>$body)
                {
                    $notification['today'][$key]['body'] = strip_tags($body->body);

                }
            } if (count($yesterday) > 0)
            {
                foreach($yesterday  as $key=>$body)
                {
                    $yesterday[$key]['body'] = strip_tags($body->body);

                }
                $notification['yesterday'] = \App\Models\Admin\Notification::where('user_id',$customer->id)->whereDate('created_at', Carbon::yesterday())->orderBy('id', 'DESC')->get();
                foreach($notification['yesterday']  as $key=>$body)
                {
                    $notification['yesterday'][$key]['body'] = strip_tags($body->body);

                }
            }
            if (count($last_three_days) > 0)
            {
                foreach($last_three_days  as $key=>$body)
                {
                    $last_three_days[$key]['body'] = strip_tags($body->body);
                }
                $notification['last_three_days']=\App\Models\Admin\Notification::where('user_id',$customer->id)->whereDate('created_at','!=',$final_date)->whereDate('created_at','>=',$date)->orderBy('id', 'DESC')->get();
                foreach($notification['last_three_days']  as $key=>$body)
                {
                    $notification['last_three_days'][$key]['body'] = strip_tags($body->body);

                }
            }
            if (count($last_seven_days) > 0)
            {
                foreach($last_seven_days  as $key=>$body)
                {
                    $last_seven_days[$key]['body'] = strip_tags($body->body);
                }
                $notification['last_seven_days']=\App\Models\Admin\Notification::where('user_id',$customer->id)->whereDate('created_at','!=',$final_date)->whereDate('created_at','>=',$lastseven)->orderBy('id', 'DESC')->get();
                foreach($notification['last_seven_days']  as $key=>$body)
                {
                    $notification['last_seven_days'][$key]['body'] = strip_tags($body->body);
                }
            }
            if (count($last_month) > 0)
            {
                foreach($last_month  as $key=>$body)
                {
                    $last_month[$key]['body'] = strip_tags($body->body);
                }
                $notification['last_month']=\App\Models\Admin\Notification::where('user_id',$customer->id)->whereDate('created_at','!=',$final_date)->whereDate('created_at','>=',$lastmonth)->orderBy('id', 'DESC')->get();
                foreach($notification['last_month']  as $key=>$body)
                {
                    $notification['last_month'][$key]['body'] = strip_tags($body->body);

                }
            }

            return $this->api_success_response("Success !",$notification);


        } else {
            return $this->api_error_response("Customer Not Login !");
        }
    }
    public function customer_notification_seen()
    {
        $customer = Auth::guard('api')->user();
        if ($customer) {
            $customer_notification_seen =\App\Models\Admin\Notification::where('user_id',$customer->id)->whereNull('read_at')->update(['read_at' => date('Y-m-d H:i:s')]);
            return $this->api_success_response("Success !",['customer_notification_seen' => $customer_notification_seen]);
        } else {
            return $this->api_error_response("Customer Not Login !");
        }
    }
    public function leave_approve_cancel($id,Request $request)
    {
        $customer = Auth::guard('api')->user();
        if ($customer) {

            $leave_approve_cancel=leave_detail::find($id);
            $input = $request->all();
            $leave_approve_cancel->update($input);
            return $this->api_success_response("Success !",['leave_approve_cancel' => $leave_approve_cancel]);

        } else {
            return $this->api_error_response("Customer Not Login !");
        }

    }


}
