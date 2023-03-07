<?php

namespace App\Http\Controllers\API\Admin;

use App\Firebase\Firebase;
use App\Http\Controllers\Controller;
use App\Models\Admin\AssignDriver;
use App\Models\Admin\Booking;
use App\Models\Admin\CustomerCarDetail;
use App\Models\Admin\CustomerExtend;
use App\Models\Admin\DailyReporting;
use App\Models\Admin\FuelDetail;
use App\Models\Admin\leave_detail;
use App\Models\Admin\Salary;
use App\Models\Admin\Setting;
use App\Models\Admin\User_Rating;
use App\Models\User;
use App\Notification\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DailyReportingController extends Controller
{
    public function check_in_check_out(Request $request)
    {

        $input = $request->all();
        $driver = Auth::guard('api')->user();
        if ($driver) {
            $startDate = Carbon::now();
            $user = DailyReporting::whereDate('check_in', $startDate)->where('assign_driver_id', $driver->id)->first();
            if ($user == null) {
                $drivers = AssignDriver::where('driver_id', $driver->id)->first();
                if ($drivers) {

                    $daily_report['assign_driver_id'] = $drivers->driver_id;
                    $daily_report['check_in'] = Carbon::now();
                    $startDate = Carbon::today();
                    DailyReporting::create($daily_report);
                    return $this->api_success_response("Success !", ['daily_report' => $daily_report]);
                } else {
                    return $this->api_error_response('Check Your Driver Does Not Exist Assign Driver Table!..');
                }
            } else if ($user->check_out == null) {
                $startDate = Carbon::now();
                $daily_report = DailyReporting::whereDate('check_in', $startDate)->where('assign_driver_id', $driver->id)->first();
                $input['check_out'] = Carbon::now();
                $daily_report->update($input);
                return $this->api_success_response('Check Out Updated SuccessFully!..', ['check_out' => $input]);
            } else {
                return $this->api_error_response('Already Check Out Exist!');
            }

        } else {
            return $this->api_error_response('Check Your Driver Does Not Exist!..Login Here...');

        }
    }


    public function get_daily_report(Request $request)
    {

        $drivers = Auth::guard('api')->user();
        if ($drivers) {
            $rules = [
                'select_month' => 'required|integer|between:1,12',
            ];

            $validate = Validator::make($request->all(), $rules);
            if ($validate->fails()) {
                return $this->api_error_response("Invalid input data", $validate->errors()->all());
            }
            $month = DailyReporting::whereMonth('created_at', $request->select_month)
                ->where('assign_driver_id', $drivers->id)->get();
            if ($month->count() > 0) {
                return $this->api_success_response('Success!..', ['month_wise_daily_report_details' => $month]);
            } else {
                return $this->api_error_response('Record Not Found!..');
            }
        } else {
            return $this->api_error_response('Check Your Driver Does Not Exist!..Login Here...');
        }
    }


    public function add_fuel_detail(Request $request)
    {

        $input = $request->all();
        $driver = Auth::guard('api')->user();
        if ($driver) {
            $rules = [
                'fuel_litter' => 'required',
                'rate' => 'required',
                'date' => 'required',
            ];

            $validate = Validator::make($request->all(), $rules);
            if ($validate->fails()) {
                return $this->api_error_response("Invalid input data", $validate->errors()->all());
            }
            if ($driver->role == "CUSTOMER") {
                $customers = AssignDriver::where('user_id ', $driver->user_id)->first();
                return $this->api_success_response("Sucecss !", ['customer' => $customers]);
            } else if ($driver->role == "DRIVER") {
                $drivers = AssignDriver::where('driver_id', $driver->id)->first();
                $price = $request->rate * $request->fuel_litter;
                $input['assign_driver_id'] = $drivers->driver_id;
                $input['total_amount'] = $price;
                $input = FuelDetail::create($input);


                $data['customer_id'] = $driver->user_id;
                $data['title'] = 'Fuel Refilled';
                $data['type'] = 'Fuel';
                $data['type_id'] = $driver->id;
                $driver_name = $drivers->drivers->first_name;
                $customer_name = $drivers->customers->first_name;
                $fuel_type = $input->fuel_type;
                $total_amount = $input->total_amount;
                $rate = $input->rate;

                $data['msg'] = "Hello $customer_name $fuel_type refilled by $driver_name of $total_amount Rs with the Rate of $rate RS.";

                //    Notification::notify_with_push($data);
                Firebase::send_push_notification($data);
                customer_notification_store($data);


                return $this->api_success_response("Sucecss !", ['daily_report' => $input]);
            }
        } else {
            return $this->api_error_response("Check Your Driver Does Not Exist!..Login Here...");
        }

    }

    public function get_fuel_detail()
    {

        $drivers = Auth::guard('api')->user();
        if ($drivers) {
            $fuel_detail = FuelDetail::where('assign_driver_id', $drivers->id)->orderBy('id', 'DESC')->get();
            return $this->api_success_response('Success!..', ['fuel_detail' => $fuel_detail]);
        } else {
            return $this->api_error_response('Check Your Driver Does Not Exist!...Login Here...');
        }

    }


    public function submit_leave(Request $request)
    {

        $input = $request->all();
        $driver = Auth::guard('api')->user();
        if ($driver) {
            $rules = [
//                'from_date' => 'required',
//                'to_date' => 'required',
                'remark' => 'required',
                'leave_type' => 'required',
            ];


            $validate = Validator::make($request->all(), $rules);
            if ($validate->fails()) {
                return $this->api_error_response("Invalid input data", $validate->errors()->all());
            }
            if ($driver->role == "CUSTOMER") {
                $customers = AssignDriver::where('user_id ', $driver->user_id)->first();
                return $this->api_success_response("Sucecss !", ['customer' => $customers]);
            } else if ($driver->role == "DRIVER") {
                $drivers = AssignDriver::where('driver_id', $driver->id)->first();
                $input['assign_driver_id'] = $drivers->driver_id;
                $input['status'] = config('constants.STATUS.Pending');
                leave_detail::create($input);

                $data['driver_id'] = $drivers->driver_id;
                $data['customer_id'] = $drivers->user_id;
                $data['title'] = 'New Leave Request';
                $data['type'] = 'Leave';
                $data['type_id'] = $drivers->id;
                $customer_name = $drivers->customers->first_name;
                $driver_name = $driver->first_name;
                $start_date_formate = notification_date_formate($drivers->from_date);
                $end_date_formate = notification_date_formate($drivers->to_date);

                $data['msg'] = "Hello $customer_name a new leave request added by $driver_name from the date of  $start_date_formate to $end_date_formate";

                //    Notification::notify_with_push($data);
                Firebase::send_push_notification_driver($data);
                Firebase::send_push_notification($data);
                driver_notification_store($data);
                customer_notification_store($data);
                return $this->api_success_response("Sucecss !", ['leave_detail' => $input]);
            }
        } else {
            return $this->api_error_response("Check Your Driver Does Not Exist!..Login Here...");
        }

    }


    public function get_leave_detail(Request $request)
    {
        $drivers = Auth::guard('api')->user();
        if ($drivers) {

            $date = array();


            for ($i = 1; $i <= 12; $i++) {
                $years = leave_detail::whereMonth('created_at', $i)->where('assign_driver_id', $drivers->id)->get();
                foreach ($years as $year) {
                    if ($i == 1) {
//                    $year = Carbon::now()->format('Y');

                        $date['January,' . year_formate($year->created_at)] = leave_detail::whereMonth('created_at', $i)->where( DB::raw('YEAR(created_at)'), '=', year_formate($year->created_at))->where('assign_driver_id', $drivers->id)->get();
                    }
                    if ($i == 2) {
//                        $year = Carbon::now()->format('Y');
                        $date['February,' . year_formate($year->created_at)] = leave_detail::whereMonth('created_at', $i)->where( DB::raw('YEAR(created_at)'), '=', year_formate($year->created_at))->where('assign_driver_id', $drivers->id)->get();
                    }
                    if ($i == 3) {
//                        $year = Carbon::now()->format('Y');
                        $date['March,' . year_formate($year->created_at)] = leave_detail::whereMonth('created_at', $i)->where( DB::raw('YEAR(created_at)'), '=', year_formate($year->created_at))->where('assign_driver_id', $drivers->id)->get();
                    }
                    if ($i == 4) {
//                        $year = Carbon::now()->format('Y');
                        $date['April,' . year_formate($year->created_at)] = leave_detail::whereMonth('created_at', $i)->where( DB::raw('YEAR(created_at)'), '=', year_formate($year->created_at))->where('assign_driver_id', $drivers->id)->get();
                    }
                    if ($i == 5) {
//                        $year = Carbon::now()->format('Y');
                        $date['May,' . year_formate($year->created_at)] = leave_detail::whereMonth('created_at', $i)->where( DB::raw('YEAR(created_at)'), '=', year_formate($year->created_at))->where('assign_driver_id', $drivers->id)->get();
                    }
                    if ($i == 6) {
//                        $year = Carbon::now()->format('Y');
                        $date['June,' . year_formate($year->created_at)] = leave_detail::whereMonth('created_at', $i)->where( DB::raw('YEAR(created_at)'), '=', year_formate($year->created_at))->where('assign_driver_id', $drivers->id)->get();
                    }
                    if ($i == 7) {
//                        $year = Carbon::now()->format('Y');
                        $date['July,' . year_formate($year->created_at)] = leave_detail::whereMonth('created_at', $i)->where( DB::raw('YEAR(created_at)'), '=', year_formate($year->created_at))->where('assign_driver_id', $drivers->id)->get();
                    }
                    if ($i == 8) {
//                        $year = Carbon::now()->format('Y');
                        $date['August,' . year_formate($year->created_at)] = leave_detail::whereMonth('created_at', $i)->where( DB::raw('YEAR(created_at)'), '=', year_formate($year->created_at))->where('assign_driver_id', $drivers->id)->get();
                    }
                    if ($i == 9) {
//                        $year = Carbon::now()->format('Y');
                        $date['September,' . year_formate($year->created_at)] = leave_detail::whereMonth('created_at', $i)->where( DB::raw('YEAR(created_at)'), '=', year_formate($year->created_at))->where('assign_driver_id', $drivers->id)->get();
                    }
                    if ($i == 10) {
//                        $year = Carbon::now()->format('Y');
                        $date['October,' . year_formate($year->created_at)] = leave_detail::whereMonth('created_at', $i)->where( DB::raw('YEAR(created_at)'), '=', year_formate($year->created_at))->where('assign_driver_id', $drivers->id)->get();
                    }
                    if ($i == 11) {
//                        $year = Carbon::now()->format('Y');
                        $date['November,' . year_formate($year->created_at)] = leave_detail::whereMonth('created_at', $i)->where( DB::raw('YEAR(created_at)'), '=', year_formate($year->created_at))->where('assign_driver_id', $drivers->id)->get();
                    }
                    if ($i == 12) {
//                        $year = Carbon::now()->format('Y');
                        $date['December,' . year_formate($year->created_at)] = leave_detail::whereMonth('created_at', $i)->where( DB::raw('YEAR(created_at)'), '=', year_formate($year->created_at))->where('assign_driver_id', $drivers->id)->get();
                    }


                }
            }

            foreach ($date as $key => $d) {
                if (count($d) > 0) {
                    $date[$key] = $d;
                }
            }
//$aa = array($dates);

            return $this->api_success_response("Success!", ['leave_details' => $date]);

        } else {
            return $this->api_error_response('Check Your Driver Does Not Exist!..Login Here...');
        }

    }


    public
    function get_salary_api()
    {

        $drivers = Auth::guard('api')->user();

        if ($drivers) {
            $salary_detail = Salary::where('assign_driver_id', $drivers->id)->orderBy('id', 'DESC')->get();

            return $this->api_success_response('Success!..', ['driver_salary_detail' => $salary_detail]);
        } else {
            return $this->api_error_response('Check Your Driver Does Not Exist!..');
        }

    }


    public
    function get_allocated_customer_detail_and_car_detail()
    {

        $drivers = Auth::guard('api')->user();
        if ($drivers) {
            $customer_detail_and_car_detail = AssignDriver::where('driver_id', $drivers->id)->first();
            if (isset($customer_detail_and_car_detail->user_id)) {
                $user_details = User::where('id', $customer_detail_and_car_detail->user_id)->first();
                $customer_address = CustomerExtend::where('user_id', $user_details->id)->first();
                $customer_rating = number_formats(\user_rating($user_details));
                $car_details = CustomerCarDetail::where('user_id', $user_details->id)->get();

                return $this->api_success_response('Success!..', ['user_detail' => $user_details, 'customer_address' => $customer_address, 'car_details' => $car_details,'customer_rating' => $customer_rating]);
            } else {
                return $this->api_error_response('Check Your Does Not Exist Record  In AssignDriver Table');
            }
        } else {
            return $this->api_error_response('Check Your Driver Does Not Exist!..Login Here...');
        }

    }

    function count_reffer()
    {

        $drivers = Auth::guard('api')->user();
        if ($drivers) {
            $match_reffer_code_users = User::where('reffer_by', $drivers->id)->get();
            $total_reffer_amounts = 0;
            if (count($match_reffer_code_users) > 0) {
                foreach ($match_reffer_code_users as $key => $match_reffer_code_user) {
                    $book = Booking::where('status', config('constants.STATUS.Completed'))->where('driver_id', $match_reffer_code_user->id)->first();
//                   if(isset($book->driver)) {
                    $completed_trips[$key]['driver_name'] = $match_reffer_code_user->first_name;
//                   }
                    $reffer_amounts = Booking::where('status', config('constants.STATUS.Completed'))->where('driver_id', $match_reffer_code_user->id)->count();
                    $completed_trips[$key]['completed_trip_count'] = Booking::all()->where('status', config('constants.STATUS.Completed'))->where('driver_id', $match_reffer_code_user->id)->count();
                    $per_reffer = Setting::first();
                    $reffer_code_amount = $per_reffer->refer_comission_amt;
                    $completed_trips[$key]['reffer_amount'] = $reffer_code_amount * $reffer_amounts;
                    $completed_trip_count = Booking::where('status', config('constants.STATUS.Completed'))->where('driver_id', $match_reffer_code_user->id)->count();
                    $total_reffer_amounts += $reffer_amounts;
                }
                $reffer_count = User::where('reffer_by', $drivers->id)->count();
                $total_completed_trip = $total_reffer_amounts;
                $total_reffer_amount = $total_reffer_amounts * $reffer_code_amount;
                return $this->api_success_response('Success!..', ['completed_trip' => $completed_trips, 'reffer_count' => $reffer_count, 'total_completed_trip' => $total_completed_trip, 'total_reffer_amount' => $total_reffer_amount]);
            } else {
                return $this->api_error_response('Record Not Found');
            }
        } else {
            return $this->api_error_response('Check Your Driver Does Not Exist!..Login Here...');
        }


    }

    function rating_api()
    {

        $drivers = Auth::guard('api')->user();
        if ($drivers) {
            $max_star = 5;
            $user_rating = number_formats(\user_rating($drivers));
            $total_rating = $user_rating . '/' . $max_star;


            //$ratings = User_Rating::query();

            $rate['1'] = User_Rating::where('star', 1)->where('rated_to', $drivers->id)->count();
            $rate['2'] = User_Rating::where('star', 2)->where('rated_to', $drivers->id)->count();
            $rate['3'] = User_Rating::where('star', 3)->where('rated_to', $drivers->id)->count();
            $rate['4'] = User_Rating::where('star', 4)->where('rated_to', $drivers->id)->count();
            $rate['5'] = User_Rating::where('star', 5)->where('rated_to', $drivers->id)->count();

            $rating_reviews = User_Rating::where('rated_to', $drivers->id)->get();

            foreach ($rating_reviews as $key => $rating_review) {
                $rating_reviews[$key]['rated_to'] = $rating_review->rated_to_user->first_name;
                $rating_reviews[$key]['rated_by'] = $rating_review->user_rating->first_name;

            }

            return $this->api_success_response('Success!..', ['rating' => $total_rating, 'user_ratings' => $rate, 'client_reviews' => $rating_reviews]);

        } else {
            return $this->api_error_response('Check Your Driver Does Not Exist!..Login Here...');
        }
    }

    public function add_salary(Request $request, $id)
    {
        $input = $request->all();
        $customer = Auth::guard('api')->user();
        if ($customer) {
            $rules = [
                //'assign_driver_id' => 'required',
                'amount' => 'required',
                'date' => 'required',
                'type' => 'required',
//                'paid_unpaid' => 'required',
            ];
            $input['assign_driver_id'] = $id;
            $input['paid_unpaid'] = 'paid';
            $validate = Validator::make($request->all(), $rules);
            if ($validate->fails()) {
                return $this->api_error_response("Invalid input data", $validate->errors()->all());
            }
            Salary::create($input);
            return $this->api_success_response('Success!..', ['salary' => $input]);
            $assign_driver = AssignDriver::where('driver_id', $request->assign_driver_id)->where('user_id', $driver->id);
            //dd($assign_driver);

        } else {
            return $this->api_error_response("Check Your Customer Does Not Exist!..Login Here...");
        }


    }


}
