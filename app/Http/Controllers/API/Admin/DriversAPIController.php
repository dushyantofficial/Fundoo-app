<?php

namespace App\Http\Controllers\API\Admin;

use App\Firebase\Firebase;
use App\Http\Controllers\Controller;
use App\Models\Admin\AssignDriver;
use App\Models\Admin\Booking;
use App\Models\Admin\Car_Wash_Details;
use App\Models\Admin\City;
use App\Models\Admin\CustomerCarDetail;
use App\Models\Admin\CustomerExtend;
use App\Models\Admin\DailyReporting;
use App\Models\Admin\DriverExtended;
use App\Models\Admin\OutOFStatoindetail;
use App\Models\Admin\State;
use App\Models\Help_Line;
use App\Models\User;
use App\Notification\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DriversAPIController extends Controller
{
    public function driver_create(Request $request)
    {
        $user_id = Auth::guard('api')->user()->id;
        $rules = [
            //'email' => 'email|unique:users,email',
            //   'country_code' => 'required|regex:/^\+\d{1,3}$/',

            //Personal Infomation
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',

            //Postal Address
            'post_ads_appartment' => 'required',
            'post_ads_block_flat' => 'required',
            'post_ads_pincode' => 'required|min:6|max:6',
            'post_ads_state' => 'required',
            'post_ads_city' => 'required',

            //Residential Address
            'resi_ads_apartment' => 'required',
            'resi_ads_block_flate' => 'required',
            'resi_ads_pincode' => 'required|min:6|max:6',
            'resi_ads_state' => 'required',
            'resi_ads_city' => 'required',


            //   'monthly_salary' => 'required',
            'work_station' => 'required',

            'work_type' => 'required',
            'work_time' => 'required',
            //'driver_type' => 'required',
        ];

        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return $this->api_error_response("Invalid input data", $validate->errors()->all());
        }

        $user['role'] = config('constants.ROLE.DRIVER');
        $user['reffral_code'] = random_number();
        //$user['mobile_no'] = $request->aditional_contact_no;
        $user['state'] = $request->resi_ads_state;
        $user['city'] = $request->resi_ads_city;
        $user['pincode'] = $request->resi_ads_pincode;
        $user['first_name'] = $request->first_name;
        $user['middle_name'] = $request->middle_name;
        $user['last_name'] = $request->last_name;
        $user['country_code'] = $request->country_code;
        $user['email'] = $request->email;
        $user['date_of_birth'] = birth_date_formate($request->date_of_birth);
        $user['gender'] = $request->gander;
        $user['lati'] = $request->start_late;
        $user['longi'] = $request->start_long;
        $user['status'] = 'active';
        $user['password'] = Hash::make(\request('password'));


        //update driver extended fields
        $input = [
            "aditional_contact_no" => $request->aditional_contact_no,
            "expriance" => $request->expriance,
            "post_ads_appartment" => $request->post_ads_appartment,
            "post_ads_block_flat" => $request->post_ads_block_flat,
            //     "post_ads_proof" => config('app.url') . '/fundoo-app/public/storage/admin/images/' . $request->post_ads_proof,
            "post_ads_pincode" => $request->post_ads_pincode,
            "post_ads_city" => $request->post_ads_city,
            "post_ads_state" => $request->post_ads_state,
            "resi_ads_apartment" => $request->resi_ads_apartment,
            "resi_ads_block_flate" => $request->resi_ads_block_flate,
            "resi_ads_pincode" => $request->resi_ads_pincode,
            "resi_ads_city" => $request->resi_ads_city,
            "resi_ads_state" => $request->resi_ads_state,
            "language_known" => $request->language_known,
            "monthly_salary" => $request->monthly_salary,
            "driver_type" => $request->driver_type,
            "vehicle_type" => $request->vehicle_type,
            "select_vehicle_type" => $request->select_vehicle_type,
            "account_number" => $request->account_number,
            "account_holder_name" => $request->account_holder_name,
            "ifsc_code" => $request->ifsc_code,
            "branch_name" => $request->branch_name,
            "bank_name" => $request->bank_name,
            "work_type" => $request->work_type,
            "multi_work_type" => $request->multi_work_type,
            "work_station" => $request->work_station,
            "work_time" => $request->work_time,

            "post_ads_late" => $request->post_ads_late,
            "post_ads_long" => $request->post_ads_long,
            "resi_ads_late" => $request->resi_ads_late,
            "resi_ads_long" => $request->resi_ads_long,

            //     "resi_ads_proof" => $request->resi_ads_proof,

            "license" => $request->license,

            "aadhar_card" => $request->aadhar_card,

            "pancard" => $request->pancard,

            "light_bill" => $request->light_bill,
        ];


        if ($request->hasFile("resi_ads_proof")) {
            $img = $request->file("resi_ads_proof");
            $img->store('public/admin/images');
            $input['resi_ads_proof'] = config('app.url') . '/public/storage/admin/images/' . $img->hashName();
        }

        if ($request->hasFile("post_ads_proof")) {
            $img = $request->file("post_ads_proof");
            $img->store('public/admin/images');
            $input['post_ads_proof'] = config('app.url') . '/public/storage/admin/images/' . $img->hashName();
        }

        if ($request->hasFile("profile_image")) {
            $img = $request->file("profile_image");
            $img->store('public/admin/images');
            $user['profile_image'] = $img->hashName();

        }

        if ($request->hasFile("license")) {
            $img = $request->file("license");
            $img->store('public/admin/images');
            $input['license'] = config('app.url') . '/public/storage/admin/images/' . $img->hashName();
        }

        if ($request->hasFile("aadhar_card")) {
            $img = $request->file("aadhar_card");
            $img->store('public/admin/images');
            $input['aadhar_card'] = config('app.url') . '/public/storage/admin/images/' . $img->hashName();
        }

        if ($request->hasFile("pancard")) {
            $img = $request->file("pancard");
            $img->store('public/admin/images');
            $input['pancard'] = config('app.url') . '/public/storage/admin/images/' . $img->hashName();

        }

        if ($request->hasFile("light_bill")) {
            $img = $request->file("light_bill");
            $img->store('public/admin/images');
            $input['light_bill'] = config('app.url') . '/public/storage/admin/images/' . $img->hashName();
        }

        $users = User::where('id', $user_id)->update($user);

        $driver = DriverExtended::where('user_id', $user_id)->update($input);

        User::where('id', $user_id)->update(['verify_user' => 1]);

        DB::commit();


        $data['driver_id'] = $user_id;
        $data['title'] = "Welcome $request->first_name";
        $data['type'] = 'Driver';
        $data['type_id'] = null;
        $data['msg'] = 'Thank you for Registred in zroop drive app !';
        //   Notification::notify_with_push($data);
        Firebase::send_push_notification_driver($data);
        driver_notification_store($data);

        $token = Auth::guard('api')->user()->token();
        return $this->api_success_response("Driver Created successfully !", ['token' => $token, 'input' => $input]);

    }

    public
    function driver_login(Request $request)
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
            sendSMS($request->mobile_no, $otp_number);
            $input['auth_otp'] = $otp_number;
            $input['status'] = 'active';
            $input['reffral_code'] = random_number();
            $input['role'] = config('constants.ROLE.DRIVER');
            $input['expire_at'] = \Carbon\Carbon::now()->addSecond(60);
            $user = User::create($input);
            $driver = $user->driverEx()->create($input);

            return $this->api_success_response("New Driver Register successfully !", [$input]);
        } else {
            $otp_number = random_int(1000, 9999);
            $input['auth_otp'] = $otp_number;
            sendSMS($request->mobile_no, $otp_number);
            $input['expire_at'] = \Carbon\Carbon::now()->addSecond(60);
            $users->update($input);
            return $this->api_success_response("User already Exists !", [$users]);
        }


    }


    public
    function driver_get(Request $request)
    {

        $user = Auth::guard('api')->user();
        if (isset($user->id)) {
            $driver = DriverExtended::where('user_id', $user->id)->first();

            return $this->api_success_response("Success !", ['user' => $user, 'driver' => $driver]);
        }
        return $this->api_error_response("Driver Not Login !");

    }

    public
    function driver_home_api(Request $request)
    {

        $driver = Auth::guard('api')->user();


        if ($driver) {
            $check = DailyReporting::whereDate('created_at', Carbon::today())->where('assign_driver_id', $driver->id)->first();


            $driver_on_going_trip_details = Booking::where('driver_id', $driver->id)->where('status', config('constants.STATUS.On_Going'))->first();

            $driver_advance_booking_details = Booking::where('driver_id', null)->where(function ($query) {
                $query->where('live_or_advance', config('constants.BOOKING_TYPE.advance_booking'));
                $query->where('status', config('constants.STATUS.Pending'));
            })->orderBy('id', 'DESC')->get();

            foreach ($driver_advance_booking_details as $key => $driver_advance_booking_detail) {
                $driver_advance_booking_details[$key]['star_rating'] = number_formats(multi_customer_rating($driver_advance_booking_detail->customer_id));
                $driver_advance_booking_details[$key]['customer_name'] = $driver_advance_booking_detail->customer->first_name;
                $driver_advance_booking_details[$key]['profile_image'] = 'storage/admin/images/' . $driver_advance_booking_detail->customer->profile_image;
            }


            $driver_live_booking_details = Booking::where('driver_id', $driver->id)->where(function ($query) {
                $query->where('live_or_advance', config('constants.BOOKING_TYPE.live_booking'));
                $query->where('status', config('constants.STATUS.Pending'));
            })->orderBy('id', 'DESC')->get();

            foreach ($driver_live_booking_details as $key => $driver_live_booking_detail) {
                $driver_live_booking_details[$key]['customer_address'] = CustomerExtend::where('user_id', $driver_live_booking_detail->customer_id)->get();
                $driver_live_booking_details[$key]['customer_car_details'] = CustomerCarDetail::where('user_id', $driver_live_booking_detail->customer_id)->get();
                $driver_live_booking_details[$key]['customer_name'] = $driver_live_booking_detail->customer->first_name;
                $driver_live_booking_details[$key]['profile_image'] = 'storage/admin/images/' . $driver_live_booking_detail->customer->profile_image;
                $driver_live_booking_details[$key]['star_rating'] = number_formats(multi_customer_rating($driver_live_booking_detail->customer_id));
            }


            if ($driver_on_going_trip_details != null || $driver_on_going_trip_details != '' && !empty($driver_advance_booking_details)) {
                if ($driver_on_going_trip_details->customer) {
                    $driver_on_going_trip_details['customer_address'] = CustomerExtend::where('user_id', $driver_on_going_trip_details->customer_id)->get();
                    $driver_on_going_trip_details['customer_car_details'] = CustomerCarDetail::where('user_id', $driver_on_going_trip_details->customer_id)->get();
                    $driver_on_going_trip_details['customer_name'] = $driver_on_going_trip_details->customer->first_name;
                    $driver_on_going_trip_details[$key]['star_rating'] = number_formats(multi_customer_rating($driver_on_going_trip_details));

                } else {
                    $driver_on_going_trip_details['customer_name'] = "null";
                }
                if ($driver_on_going_trip_details->driver) {
                    $driver_on_going_trip_details['driver_name'] = $driver_on_going_trip_details->driver->first_name;
                } else {
                    $driver_on_going_trip_details['driver_name'] = "null";
                }

            }
            if ($check == null) {
                $check_in = false;
            } else {
                if ($check['check_in'] == null) {
                    $check_in = false;

                } elseif ($check != null) {
                    $check_in = true;
                }
            }

            $driver_count = \App\Models\Admin\Notification::where('user_id', $driver->id)->whereNull('read_at')->count();

            return $this->api_success_response("Success !", ['driver' => $driver, 'on_going_trip_details' => $driver_on_going_trip_details, 'advance_booking_list' => $driver_advance_booking_details, 'driver_live_booking_details' => $driver_live_booking_details, 'check_status' => $check_in, 'notification_count' => $driver_count]);
        }
        return $this->api_error_response("Driver Not Login !");


    }
//    public
//    function driver_home_api(Request $request)
//    {
//
//        $driver = Auth::guard('api')->user();
//        if ($driver) {
//            $driver_on_going_trip_details = Booking::where('driver_id', $driver->id)->where('status', config('constants.STATUS.On_Going'))->orWhere('status', config('constants.STATUS.Start'))->first();
//
//            $driver_advance_booking_details = Booking::where('driver_id', null)->where(function ($query) {
//                $query->where('live_or_advance', config('constants.BOOKING_TYPE.advance_booking'));
//                $query->where('status', config('constants.STATUS.Pending'));
//            })->limit(3)->orderBy('id', 'DESC')->get();
//
//            if ($driver_on_going_trip_details != null || $driver_on_going_trip_details != '' && !empty($driver_advance_booking_details)) {
//                if ($driver_on_going_trip_details->customer) {
//                    $driver_on_going_trip_details['customer_name'] = $driver_on_going_trip_details->customer->first_name;
//                } else {
//                    $driver_on_going_trip_details['customer_name'] = "null";
//                }
//                if ($driver_on_going_trip_details->driver) {
//                    $driver_on_going_trip_details['driver_name'] = $driver_on_going_trip_details->driver->first_name;
//                } else {
//                    $driver_on_going_trip_details['driver_name'] = "null";
//                }
//                foreach ($driver_advance_booking_details as $key => $driver_advance_booking_detail) {
//                    $driver_advance_booking_details[$key]['customer_name'] = $driver_advance_booking_detail->customer->first_name;
////                    if ($driver_advance_booking_detail->driver) {
////                        $driver_advance_booking_details[$key]['driver_name'] = $driver_advance_booking_detail->driver->first_name;
////                    }
//                }
//            }
//            return $this->api_success_response("Sucecss !", ['driver' => $driver, 'on_going_trip_details' => $driver_on_going_trip_details, 'advance_booking_list' => $driver_advance_booking_details]);
//        }
//        return $this->api_error_response("Driver Not Login !");
//
//
//    }


    public function match_otp(Request $request)
    {

        $rules = [
            'otp' => 'required',
            'mobile_no' => 'required',
        ];
        $custom_validation = [
            'otp.required'=> 'The OTP field is required', // custom message
        ];
        $reffral_code = $request->reffral_code;

        $validate = Validator::make($request->all(), $rules,$custom_validation);
        if ($validate->fails()) {
            return $this->api_error_response("Invalid input data", $validate->errors()->all());
        }
        $user = User::firstWhere('mobile_no', $request->mobile_no);

        $match_otp = $user->auth_otp;


        if ($match_otp == $request->otp) {
            $now = \Carbon\Carbon::now();
            if ($now->isAfter($user->expire_at)) {
                return $this->api_error_response("Your OTP has been expired");
            }
            if ($user = User::where('mobile_no', $request->mobile_no)->first()) {
                Auth::guard('web')->login($user);
                $user = Auth::user();

//                    if ($user->reffer_by == '') {
//                        $input['reffer_by'] = $drivers->id;
//                        $user->update($input);
//                    }
//                    else {
//                        return $this->api_error_response("Exits Reffer Code in User Tables!");
//                    }

                if (Auth::user()->role != config('constants.ROLE.ADMIN')) {
                    if (Auth::user()->role == config('constants.ROLE.DRIVER')) {
                        $input['device_token'] = $request->device_token;
                        $user->update($input);
                        if ($user->verify_user == 0) {
                            $driver = User::where('id', Auth::user()->id)->first();
                            $worktype = DriverExtended::where('user_id', Auth::user()->id)->first();
                            $token = auth()->user()->createToken('FundooApp')->accessToken;
                            $verify_user = false;
                            $message = ["$user->role Login SuccessFully!..."];
                            return $this->api_success_response("Add All details!", ['token' => $token, 'message' => $message, 'data' => $driver, 'work_type' => $worktype['work_type'], 'verify_user' => $verify_user]);


                        } else if ($user->verify_user == 1) {

                            $driver = User::where('id', Auth::user()->id)->first();
                            $driver['profile_image'] = 'storage/admin/images/' . $driver->profile_image;
                            $worktype = DriverExtended::where('user_id', Auth::user()->id)->first();

                            $token = auth()->user()->createToken('FundooApp')->accessToken;
                            $verify_user = true;
                            $message = ["$user->role Login SuccessFully!..."];


                            return $this->api_success_response("Logged in successfully !", ['token' => $token, 'message' => $message, 'data' => $driver, 'work_type' => $worktype['work_type'], 'verify_user' => $verify_user]);

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
    function driver_logout(Request $request)
    {

        if (Auth::guard('api')->user()) {
            Auth::guard('api')->user()->token()->revoke();
        }
        return $this->api_success_response("Logged out successfully !");
    }


    public
    function driver_profile_update(Request $request)
    {

        $user = Auth::guard('api')->user();
        $driver['aditional_contact_no'] = $request->aditional_contact_no;
        $driver['post_ads_appartment'] = $request->post_ads_appartment;
        $driver['post_ads_block_flat'] = $request->post_ads_block_flat;
        $driver['post_ads_pincode'] = $request->post_ads_pincode;
        $driver['resi_ads_pincode'] = $request->resi_ads_pincode;
        $driver['resi_ads_city'] = $request->resi_ads_city;
        $driver['post_ads_type'] = $request->post_ads_type;
        $driver['resi_ads_type'] = $request->resi_ads_type;
        $driver['resi_ads_apartment'] = $request->resi_ads_apartment;
        $driver['resi_ads_block_flate'] = $request->resi_ads_block_flate;
        $driver['resi_ads_state'] = $request->resi_ads_state;
        $driver['post_ads_state'] = $request->post_ads_state;
        $driver['post_ads_city'] = $request->post_ads_city;
        $driver['expriance'] = $request->expriance;
        $driver['language_known'] = $request->language_known;
        $driver['monthly_salary'] = $request->monthly_salary;
        $driver['driver_type'] = $request->driver_type;
        $driver['vehicle_type'] = $request->vehicle_type;
        $driver['select_vehicle_type'] = $request->select_vehicle_type;
        $driver['account_number'] = $request->account_number;
        $driver['account_holder_name'] = $request->account_holder_name;
        $driver['ifsc_code'] = $request->ifsc_code;
        $driver['branch_name'] = $request->branch_name;
        $driver['work_type'] = $request->work_type;
        $driver['multi_work_type'] = $request->multi_work_type;
        $driver['work_station'] = $request->work_station;
        $driver['work_time'] = $request->work_time;
        $driver['post_ads_late'] = $request->post_ads_late;
        $driver['post_ads_long'] = $request->post_ads_long;
        $driver['resi_ads_late'] = $request->resi_ads_late;
        $driver['resi_ads_long'] = $request->resi_ads_long;
        $driver['is_kyc_verify'] = $request->is_kyc_verify;
        $driver['license_status'] = $request->license_status;
        $driver['driving_licence_reject_reason'] = $request->driving_licence_reject_reason;
        $driver['aadhar_card_status'] = $request->aadhar_card_status;
        $driver['aadhar_card_reject_reason'] = $request->aadhar_card_reject_reason;
        $driver['pancard_status'] = $request->pancard_status;
        $driver['pancard_reject_reason'] = $request->pancard_reject_reason;
        $driver['light_bill_status'] = $request->light_bill_status;
        $driver['light_bill_reject_reason'] = $request->light_bill_reject_reason;


        if ($request->hasFile("post_ads_proof")) {
            $img = $request->file("post_ads_proof");
            if (Storage::exists('public/admin/images' . $user->post_ads_proof)) {
                Storage::delete('public/admin/images' . $user->post_ads_proof);
            }
            $img->store('public/admin/images');
            $driver['post_ads_proof'] = $img->hashName();
            $user->update($driver);

        }

        if ($request->hasFile("resi_ads_proof")) {
            $img = $request->file("resi_ads_proof");
            if (Storage::exists('public/admin/images' . $user->resi_ads_proof)) {
                Storage::delete('public/admin/images' . $user->resi_ads_proof);
            }
            $img->store('public/admin/images');
            $driver['resi_ads_proof'] = $img->hashName();
            $user->update($driver);

        }

        if ($request->hasFile("license")) {
            $img = $request->file("license");
            if (Storage::exists('public/admin/images' . $user->license)) {
                Storage::delete('public/admin/images' . $user->license);
            }
            $img->store('public/admin/images');
            $driver['license'] = $img->hashName();
            $user->update($driver);

        }

        if ($request->hasFile("aadhar_card")) {
            $img = $request->file("aadhar_card");
            if (Storage::exists('public/admin/images' . $user->aadhar_card)) {
                Storage::delete('public/admin/images' . $user->aadhar_card);
            }
            $img->store('public/admin/images');
            $driver['aadhar_card'] = $img->hashName();
            $user->update($driver);

        }

        if ($request->hasFile("pancard")) {
            $img = $request->file("pancard");
            if (Storage::exists('public/admin/images' . $user->pancard)) {
                Storage::delete('public/admin/images' . $user->pancard);
            }
            $img->store('public/admin/images');
            $driver['pancard'] = $img->hashName();
            $user->update($driver);

        }

        if ($request->hasFile("light_bill")) {
            $img = $request->file("light_bill");
            if (Storage::exists('public/admin/images' . $user->light_bill)) {
                Storage::delete('public/admin/images' . $user->light_bill);
            }
            $img->store('public/admin/images');
            $driver['light_bill'] = $img->hashName();
            $user->update($driver);

        }


        if ($user) {
            $driverExtended = DriverExtended::where('user_id', $user->id)->first();

            $rules = [
                'email' => 'regex:/(.+)@(.+)\.(.+)/i|unique:users,email,' . $user->id,
                'aditional_contact_no' => 'unique:driver_extendeds,aditional_contact_no,' . $driverExtended->id,
            ];

            $validate = Validator::make($request->all(), $rules);
            if ($validate->fails()) {
                return $this->api_error_response("Invalid input data", $validate->errors()->all());
            }

            $users = $request->all();
            if ($request->hasFile("profile_image")) {
                $img = $request->file("profile_image");
                if (Storage::exists('public/admin/images' . $user->profile_image)) {
                    Storage::delete('public/admin/images' . $user->profile_image);
                }
                $img->store('public/admin/images');
                $users['profile_image'] = $img->hashName();
                $user->update($users);

            }

            $user->update($users);
            DriverExtended::where('user_id', $user->id)->update($driver);

            $user['profile_image'] = 'storage/admin/images/' . $user->profile_image;
            $users = User::first();

            $data['user_id'] = $user->id;
            $data['title'] = 'Profile Update';
            $data['type'] = 'Driver';
            $data['type_id'] = null;
            $data['msg'] = 'Driver <a href="' . route('driver-dashboard') . '?id=' . $user->id . '">' . $user->first_name . "'</a>' Updated his profile.";
            //   Notification::notify_with_push($data);
            DB::commit();
            return $this->api_success_response("Driver Record Updated successfully !", [$user]);

        } else {
            return $this->api_error_response("Driver Not Login !");
        }
    }

    public
    function get_otp(Request $request)
    {
        $mobile_no = $request->mobile_no;

        // check if account exists
        $user = User::firstWhere('mobile_no', $mobile_no);
        if ($user) {
            $account_exists = true;
        } else {
            $account_exists = false;
        }

        // generate OTP
        $otp_number = random_int(1000, 9999);


        $input['auth_otp'] = $otp_number;
        $user->update($input);
        // sent OTP to the mobile number

        $send = sendSMS($mobile_no, $otp_number);


        return response()->json([
            'message' => 'OK',
            'data' => [
                'account' => $account_exists
            ]
        ]);
    }


    public
    function update_online_offline(Request $request)
    {
        $drivers = Auth::guard('api')->user();
        if ($drivers) {
            if ($drivers->is_online == 1) {
                $online_offline = 0;
            } else if ($drivers->is_online == 0) {
                $online_offline = 1;
            }
            $drivers->update(['is_online' => $online_offline]);
            return $this->api_success_response('Status Updated SuccessFully!..', ['is_online' => $online_offline]);
        } else {
            return $this->api_error_response('Check Your Driver Dose Not Exist!..', [$drivers]);
        }
    }


    public
    function refral_code_match(Request $request)
    {

        $reffral_code = $request->reffral_code;
        $driver = Auth::guard('api')->user();

        // check if account exists
        $drivers = User::firstWhere('reffral_code', $reffral_code);
        if ($drivers) {

            $user = User::where('id', $drivers->id)->first();
            $users = User::find($driver->id);
            $input['reffer_by'] = $drivers->id;
            $users->update($input);
            return $this->api_success_response("Success !", ['user' => $user]);
        } else {
            return $this->api_error_response("Refral Code Dose Not Match in User Tables!");
        }


    }


    public
    function get_advance_booking_list()
    {

        $driver = Auth::guard('api')->user();
        if ($driver) {
            $users = DriverExtended::where('user_id', $driver->id)->get();
            return $this->api_success_response("Success !", ['driver' => $users]);
        } else {
            return $this->api_error_response("Check Your Driver Dose Not Exist!..");
        }
    }


    public
    function add_helpline_detail(Request $request)
    {

        $driver = Auth::guard('api')->user();
        if ($driver) {
            $rules = [
                'reason' => 'required',
                'nots' => 'required',
            ];

            $validate = Validator::make($request->all(), $rules);
            if ($validate->fails()) {
                return $this->api_error_response("Invalid input data", $validate->errors()->all());
            }
            $input = $request->all();
            $input['user_id'] = $driver->id;
            $users = \App\Models\Admin\Help_Line::create($input);
            return $this->api_success_response("Success!", [$users]);
        } else {
            return $this->api_error_response("Check Your Driver Dose Not Exist!..");
        }
    }

    public
    function get_all_state(Request $request)
    {

        $states = State::get();
        return $this->api_success_response("Success !", ['states' => $states]);
    }

    public
    function get_by_state(Request $request)
    {
        $rules = [
            'state_id' => 'required',
        ];

        $validate = Validator::make($request->all(), $rules);
        if ($validate->fails()) {
            return $this->api_error_response("Invalid input data", $validate->errors()->all());
        }
        $city_name = City::where('state_id', $request->state_id)->get();
        return $this->api_success_response("Success !", ['data' => $city_name]);
    }

    public
    function temporary_pickUp_drop_toggle(Request $request)
    {
        $drivers = Auth::guard('api')->user();
        if ($drivers) {
            $driverExtends = DriverExtended::where('user_id', $drivers->id)->first();
            if ($driverExtends->work_type == config('constants.CATEGORY.permanent')) {
                $temporary_pickup_drop = config('constants.CATEGORY.temporary');

            } else if ($driverExtends->work_type == config('constants.CATEGORY.temporary')) {
                $temporary_pickup_drop = config('constants.CATEGORY.permanent');

            } else {
                $temporary_pickup_drop = config('constants.CATEGORY.permanent');

            }
            $driverExtends->update(['work_type' => $temporary_pickup_drop]);
            return $this->api_success_response('Work Type Upadated SuccessFully!..', ['temporary_pickup_drop' => $temporary_pickup_drop]);
        } else {
            return $this->api_error_response('Check Your Driver Dose Not Exist!..', [$drivers]);
        }
    }

    public
    function get_driver_car_wash(Request $request)
    {

        $driver = Auth::guard('api')->user();
        if ($driver) {
            if ($driver->role == config('constants.ROLE.DRIVER')) {
                $pending_car_wash_details = Car_Wash_Details::where('driver_id', $driver->id)->where('status', config('constants.STATUS.Pending'))->get();
                foreach ($pending_car_wash_details as $key => $pending_car_wash_detail) {
                    $pending_car_wash_details[$key]['customer_name'] = $pending_car_wash_detail->customers->first_name;
                    $pending_car_wash_details[$key]['driver_name'] = $pending_car_wash_detail->drivers->first_name;
                    $pending_car_wash_details[$key]['car_name'] = (isset($pending_car_wash_detail->cars->model_name)) ? $pending_car_wash_detail->cars->model_name : '-';

                }
                $done_car_wash_details = Car_Wash_Details::where('driver_id', $driver->id)->where('status', config('constants.STATUS.Done'))->get();
                foreach ($done_car_wash_details as $key => $done_car_wash_detail) {
                    $done_car_wash_details[$key]['customer_name'] = $done_car_wash_detail->customers->first_name;
                    $done_car_wash_details[$key]['driver_name'] = $done_car_wash_detail->drivers->first_name;
                    $done_car_wash_details[$key]['car_name'] = (isset($done_car_wash_detail->cars->model_name)) ? $done_car_wash_detail->cars->model_name : '-';

                }
                return $this->api_success_response("Success !", ['pending_car_wash_details' => $pending_car_wash_details, 'done_car_wash_details' => $done_car_wash_details]);
            } else {
                return $this->api_error_response("Un-authenticated User...!");
            }
        } else {
            return $this->api_error_response("Driver Not Login !");
        }
    }

    public
    function driver_car_wash(Request $request)
    {
        $driver = Auth::guard('api')->user();

        if ($driver) {
            if ($driver->role == config('constants.ROLE.DRIVER')) {
                $rules = [
                    'car_id' => 'required|integer',
                ];

                $validate = Validator::make($request->all(), $rules);
                if ($validate->fails()) {
                    return $this->api_error_response("Invalid input data", $validate->errors()->all());
                }
                $assign_driver = AssignDriver::where('driver_id', $driver->id)->first();
                $assign_customer = AssignDriver::where('user_id', $assign_driver->user_id)->first();
                $input = $request->all();
                $input['customer_id'] = $assign_customer->user_id;
                $input['driver_id'] = $driver->id;
                $input['status'] = config('constants.STATUS.Pending');

                $car_wash_detail = Car_Wash_Details::create($input);
                return $this->api_success_response("Success !", ['car_wash_detail' => $car_wash_detail,]);

            } else {
                return $this->api_error_response("Un-authenticated User...!");
            }
        } else {
            return $this->api_error_response("Customer Not Login !");
        }
    }

    public
    function diver_out_of_station_data_list()
    {

        $driver = Auth::guard('api')->user();
        if ($driver) {
            $out_of_station_details = OutOFStatoindetail::where('assign_driver_id', $driver->id)->get();
            return $this->api_success_response("Success !", ['out_of_station_details' => $out_of_station_details]);
        } else {
            return $this->api_error_response("Check Your Driver Dose Not Exist!..");
        }
    }


    public
    function change_car_wash_status(Request $request, $id)
    {

        $driver = Auth::guard('api')->user();
        if ($driver) {
            if ($driver->role == config('constants.ROLE.DRIVER')) {
                $input = $request->all();
                $car_wash = Car_Wash_Details::find($id);
                if ($car_wash) {
                    $input['status'] = config('constants.STATUS.Done');
                    $car_wash->update($input);

                    $data['driver_id'] = $driver->id;
                    $data['customer_id'] = $car_wash->customer_id;
                    $data['title'] = 'Car Wash Done';
                    $data['type'] = 'Car Wash';
                    $data['type_id'] = null;
                    $customer_name = $car_wash->customers->first_name;

                    $data['msg'] = "Hello $customer_name your car is ready after washing enjoy your trip thank you !";

                    Firebase::send_push_notification($data);
                    customer_notification_store($data);

                    return $this->api_success_response("Success !", ['status' => $input]);
                } else {
                    return $this->api_error_response("Record Not Found!");
                }
            } else {
                return $this->api_error_response("Un-authenticated User...!");
            }
        } else {
            return $this->api_error_response("Driver Not Login !");
        }
    }

    public
    function driver_filters_in_all_trip_apis(Request $request)
    {

        $driver = Auth::guard('api')->user();
        if ($driver) {
            if ($request->status || $request->from_date || $request->to_date) {

                $booking = Booking::where('driver_id', $driver->id)->where(function ($query) use ($request) {
                    if ($request->status) {
                        $query->orWhere('status', $request->status);
                    }
                    if ($request->from_date && $request->to_date) {
                        $query->whereDate('created_at', '>=', $request->from_date);
                        $query->whereDate('created_at', '<=', $request->to_date);
                    }

                })->get();
                return $this->api_success_response("Success!", ['driver_all_trip_details' => $booking]);
            }
            $booking = Booking::where('driver_id', $driver->id)->get();
            return $this->api_success_response("Success!", ['driver_all_trip_details' => $booking]);

        } else {
            return $this->api_error_response("Driver Not Login !");
        }
    }

    public
    function driver_trip(Request $request)
    {
        $driver = Auth::guard('api')->user();
        if ($driver) {
            if ($driver->role == config('constants.ROLE.DRIVER')) {

                if ($request->status || $request->from_date || $request->to_date) {

                    $driver_trip_details = Booking::where('driver_id', $driver->id)->where(function ($query) use ($request) {
                        if ($request->status) {
                            $query->orWhere('status', $request->status);
                        }
                        if ($request->from_date && $request->to_date) {
                            $query->whereDate('created_at', '>=', $request->from_date);
                            $query->whereDate('created_at', '<=', $request->to_date);
                        }

                    })->get();
                    foreach ($driver_trip_details as $key => $driver_trip_detail) {

                        $driver_trip_details[$key]['customer_name'] = $driver_trip_detail->customer->first_name;
                        $driver_trip_details[$key]['driver_name'] = $driver_trip_detail->driver->first_name;
                        $driver_trip_details[$key]['star_rating'] = number_formats(multi_customer_rating($driver_trip_detail->customer_id));

                    }
                    return $this->api_error_response("Success!", ['trip_details' => $driver_trip_details]);
                }

                $driver_trip_details = Booking::where('driver_id', $driver->id)->where(function ($query) {
                    $query->orwhere('status', config('constants.STATUS.Completed'));
                    $query->orwhere('status', config('constants.STATUS.Cancel'));

                })->orderBy('id', 'DESC')->get();

                foreach ($driver_trip_details as $key => $driver_trip_detail) {

                    $driver_trip_details[$key]['customer_name'] = $driver_trip_detail->customer->first_name;
                    $driver_trip_details[$key]['driver_name'] = $driver_trip_detail->driver->first_name;
                    $driver_trip_details[$key]['star_rating'] = number_formats(multi_customer_rating($driver_trip_detail->customer_id));

                }
                return $this->api_success_response("Success !", ['trip_details' => $driver_trip_details]);
            }
        } else {
            return $this->api_error_response("Check Your User Does Not Exist!..Login Here...");
        }
    }

    public
    function driver_language_update(Request $request)
    {
        $user = Auth::guard('api')->user();
        if ($user) {
            $rules = [
                'language_known' => 'required',
            ];
            $validate = Validator::make($request->all(), $rules);
            if ($validate->fails()) {
                return $this->api_error_response("Language is required", $validate->errors()->all());
            }
            $users = $request->all();
            $driverdetails = DriverExtended::where('user_id', $user->id)->update($users);
            return $this->api_success_response("Driver Record Updated successfully !");
        } else {
            return $this->api_error_response("Driver Not Login !");
        }
    }

    public
    function vehicle_management(Request $request)
    {
        $driver = Auth::guard('api')->user();
        if ($driver) {
            $vehicle_managements = DriverExtended::where('user_id', $driver->id)->first();
            $input['driver_type'] = $request->driver_type;
            $input['vehicle_type'] = $request->vehicle_type;
            $input['select_vehicle_type'] = $request->select_vehicle_type;
            $vehicle_managements->update($input);
            return $this->api_success_response("Driver Record Updated successfully !", ['vehicle_management' => $input]);
        } else {
            return $this->api_error_response("Driver Not Login !");
        }

    }

    public
    function driver_management(Request $request)
    {
        $driver = Auth::guard('api')->user();
        if ($driver) {
            $driver_managements = DriverExtended::where('user_id', $driver->id)->first();
            $input['multi_work_type'] = $request->multi_work_type;
            $input['work_time'] = $request->work_time;
            $input['monthly_salary'] = $request->monthly_salary;
            $driver_managements->update($input);
            return $this->api_success_response("Driver Record Updated successfully !", ['driver_management' => $input]);
        } else {
            return $this->api_error_response("Driver Not Login !");
        }

    }

    public
    function driver_current_location(Request $request)
    {
        $driver = Auth::guard('api')->user();
        if ($driver) {

            $driver_current_location = User::where('id', $driver->id)->first();
            $input['lati'] = $request->latitude;
            $input['longi'] = $request->longitude;
            $input['city'] = $request->city;
            $input['state'] = $request->state;
            $driver_current_location->update($input);
            return $this->api_success_response("Driver Record Updated successfully !", ['driver_current_location' => $input]);
        } else {
            return $this->api_error_response("Driver Not Login !");
        }
    }

    public
    function driver_notification_list()
    {
        $driver = Auth::guard('api')->user();
        if ($driver) {
            $today = \App\Models\Admin\Notification::where('user_id', $driver->id)->whereDate('created_at', Carbon::today())->get();
            $yesterday = \App\Models\Admin\Notification::where('user_id', $driver->id)->whereDate('created_at', Carbon::yesterday())->get();
            $date = \Carbon\Carbon::today()->subDays(3);

            $today_date = \Carbon\Carbon::now();
            $final_date = substr($today_date, 0, 10);

            $last_three_days = \App\Models\Admin\Notification::where('user_id', $driver->id)->whereDate('created_at', '!=', $final_date)->whereDate('created_at', '>=', $date)->get();

            $lastseven = \Carbon\Carbon::today()->subDays(7);
            $last_seven_days = \App\Models\Admin\Notification::where('user_id', $driver->id)->whereDate('created_at', '!=', $final_date)->whereDate('created_at', '>=', $lastseven)->get();

            $lastmonth = \Carbon\Carbon::today()->subDays(30);
            $last_month = \App\Models\Admin\Notification::where('user_id', $driver->id)->whereDate('created_at', '!=', $final_date)->whereDate('created_at', '>=', $lastmonth)->get();

            $notification = array();
            if (count($today) > 0) {
                foreach ($today as $key => $body) {
                    $today[$key]['body'] = strip_tags($body->body);
                }
                $notification['today'] = \App\Models\Admin\Notification::where('user_id', $driver->id)->whereDate('created_at', Carbon::today())->orderBy('id', 'DESC')->get();
                foreach ($notification['today'] as $key => $body) {
                    $notification['today'][$key]['body'] = strip_tags($body->body);
                }
            }
            if (count($yesterday) > 0) {
                foreach ($yesterday as $key => $body) {
                    $yesterday[$key]['body'] = strip_tags($body->body);
                }
                $notification['yesterday'] = \App\Models\Admin\Notification::where('user_id', $driver->id)->whereDate('created_at', Carbon::yesterday())->orderBy('id', 'DESC')->get();
                foreach ($notification['yesterday'] as $key => $body) {
                    $notification['yesterday'][$key]['body'] = strip_tags($body->body);
                }
            }
            if (count($last_three_days) > 0) {
                foreach ($last_three_days as $key => $body) {
                    $last_three_days[$key]['body'] = strip_tags($body->body);

                }

                $notification['last_three_days'] = \App\Models\Admin\Notification::where('user_id', $driver->id)->whereDate('created_at', '!=', $final_date)->whereDate('created_at', '>=', $date)->orderBy('id', 'DESC')->get();
                foreach ($notification['last_three_days'] as $key => $body) {
                    $notification['last_three_days'][$key]['body'] = strip_tags($body->body);
                }
            }
            if (count($last_seven_days) > 0) {
                foreach ($last_seven_days as $key => $body) {
                    $last_seven_days[$key]['body'] = strip_tags($body->body);
                }
                $notification['last_seven_days'] = \App\Models\Admin\Notification::where('user_id', $driver->id)->whereDate('created_at', '!=', $final_date)->whereDate('created_at', '>=', $lastseven)->orderBy('id', 'DESC')->get();
                foreach ($notification['last_seven_days'] as $key => $body) {
                    $notification['last_seven_days'][$key]['body'] = strip_tags($body->body);
                }
            }
            if (count($last_month) > 0) {
                foreach ($last_month as $key => $body) {
                    $last_month[$key]['body'] = strip_tags($body->body);
                }
                $notification['last_month'] = \App\Models\Admin\Notification::where('user_id', $driver->id)->whereDate('created_at', '!=', $final_date)->whereDate('created_at', '>=', $lastmonth)->orderBy('id', 'DESC')->get();
                foreach ($notification['last_month'] as $key => $body) {
                    $notification['last_month'][$key]['body'] = strip_tags($body->body);
                }
            }
            return $this->api_success_response("Success !", $notification);
        } else {
            return $this->api_error_response("Driver Not Login !");
        }
    }


    public
    function driver_notification_seen()
    {
        $driver = Auth::guard('api')->user();
        if ($driver) {
            $driver_notification_seen = \App\Models\Admin\Notification::where('user_id', $driver->id)->whereNull('read_at')->update(['read_at' => date('Y-m-d H:i:s')]);
            return $this->api_success_response("Success !", ['driver_notification_seen' => $driver_notification_seen]);
        } else {
            return $this->api_error_response("Driver Not Login !");
        }

    }


    public
    function driver_extend_profile_update(Request $request)
    {
        $driver = Auth::guard('api')->user();
        if ($driver) {
            $input = $request->all();
            $driverExtends = DriverExtended::where('user_id', $driver->id)->first();
            //Profile Update Start
            if (isset($request->aditional_contact_no)) {
                $drivers['aditional_contact_no'] = $request->aditional_contact_no;
            }
            if (isset($request->expriance)) {
                $drivers['expriance'] = $request->expriance;
            }

            if (isset($request->first_name)) {
                $users['first_name'] = $request->first_name;
            }
            if (isset($request->middle_name)) {
                $users['middle_name'] = $request->middle_name;
            }
            if (isset($request->last_name)) {
                $users['last_name'] = $request->last_name;
            }
            if (isset($request->date_of_birth)) {
                $users['date_of_birth'] = $request->date_of_birth;
            }

            if (isset($request->profile_image)) {
                if ($request->hasFile("profile_image")) {
                    $img = $request->file("profile_image");
                    if (Storage::exists('public/admin/images' . $driver->profile_image)) {
                        Storage::delete('public/admin/images' . $driver->profile_image);
                    }
                    $img->store('public/admin/images');
                    $users['profile_image'] = $img->hashName();
                    $driver->update($users);

                }
            }
            //Profile Update End

            //Post Address Update Start
            if (isset($request->post_ads_appartment)) {
                $drivers['post_ads_appartment'] = $request->post_ads_appartment;
            }
            if (isset($request->post_ads_block_flat)) {
                $drivers['post_ads_block_flat'] = $request->post_ads_block_flat;
            }
            if (isset($request->post_ads_pincode)) {
                $drivers['post_ads_pincode'] = $request->post_ads_pincode;
            }
            if (isset($request->post_ads_type)) {
                $drivers['post_ads_type'] = $request->post_ads_type;
            }
            if (isset($request->post_ads_state)) {
                $drivers['post_ads_state'] = $request->post_ads_state;
            }
            if (isset($request->post_ads_city)) {
                $drivers['post_ads_city'] = $request->post_ads_city;
            }
            //Post Address Update End

            //Residential Address Update Start
            if (isset($request->resi_ads_appartment)) {
                $drivers['resi_ads_appartment'] = $request->resi_ads_appartment;
            }
            if (isset($request->resi_ads_block_flat)) {
                $drivers['resi_ads_block_flat'] = $request->resi_ads_block_flat;
            }
            if (isset($request->resi_ads_pincode)) {
                $drivers['resi_ads_pincode'] = $request->resi_ads_pincode;
            }
            if (isset($request->resi_ads_type)) {
                $drivers['resi_ads_type'] = $request->resi_ads_type;
            }
            if (isset($request->resi_ads_state)) {
                $drivers['resi_ads_state'] = $request->resi_ads_state;
            }
            if (isset($request->resi_ads_city)) {
                $drivers['resi_ads_city'] = $request->resi_ads_city;
            }
            //Residential Address Update End

            //Driver Management Start
            if (isset($request->multi_work_type)) {
                $drivers['multi_work_type'] = $request->multi_work_type;
            }
            if (isset($request->monthly_salary)) {
                $drivers['monthly_salary'] = $request->monthly_salary;
            }
            if (isset($request->work_time)) {
                $drivers['work_time'] = $request->work_time;
            }
            //Driver Management End

            //Vehicle Management Start
            if (isset($request->driver_type)) {
                $drivers['driver_type'] = $request->driver_type;
            }
            if (isset($request->vehicle_type)) {
                $drivers['vehicle_type'] = $request->vehicle_type;
            }
            if (isset($request->select_vehicle_type)) {
                $drivers['select_vehicle_type'] = $request->select_vehicle_type;
            }
            //Vehicle Management End

            //Bank Details Start
            if (isset($request->account_number)) {
                $drivers['account_number'] = $request->account_number;
            }
            if (isset($request->account_holder_name)) {
                $drivers['account_holder_name'] = $request->account_holder_name;
            }
            if (isset($request->ifsc_code)) {
                $drivers['ifsc_code'] = $request->ifsc_code;
            }
            if (isset($request->branch_name)) {
                $drivers['branch_name'] = $request->branch_name;
            }
            if (isset($request->bank_name)) {
                $drivers['bank_name'] = $request->bank_name;
            }
            //Bank Details End

            //language_known Details Start
            if (isset($request->language_known)) {
                $drivers['language_known'] = $request->language_known;
            }
            //language_known Details End
            if (isset($users)) {
                $driver->update($users);
            }
            if (isset($drivers)) {
                $driverExtends->update($drivers);
            }
            $driver_details = array_merge([$driver, $driverExtends]);
            return $this->api_success_response("Success !", ['driver_record_update' => $driver_details]);
        } else {
            return $this->api_error_response("Driver Not Login !");
        }

    }



    public
    function resend_otp(Request $request)
    {
        $mobile_no = $request->mobile_no;

        // check if account exists
        $user = User::firstWhere('mobile_no', $mobile_no);
        if ($user) {
            $account_exists = true;
        } else {
            $account_exists = false;
        }

        // generate OTP
        $otp_number = random_int(1000, 9999);


        $input['auth_otp'] = $otp_number;
        $input['expire_at'] = \Carbon\Carbon::now()->addSecond(60);
        $user->update($input);
        // sent OTP to the mobile number

        $send = sendSMS($mobile_no, $otp_number);

        return response()->json([
            'message' => 'OK',
            'data' => [
                'account' => $account_exists,
                'Resend OTP' => $otp_number
            ]
        ]);
    }


}
