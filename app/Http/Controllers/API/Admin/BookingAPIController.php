<?php

namespace App\Http\Controllers\API\Admin;

use App\Firebase\Firebase;
use App\Http\Controllers\Controller;
use App\Models\Admin\Booking;
use App\Models\Admin\CustomerCarDetail;
use App\Models\Admin\CustomerExtend;
use App\Models\Admin\DriverExtended;
use App\Models\Admin\Setting;
use App\Models\Admin\User_Rating;
use App\Models\User;
use App\Notification\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookingAPIController extends Controller
{
    public function get_all_trip_of_driver(Request $request)
    {
        $status = $request->get('status');

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

                    }
                    return $this->api_success_response("Success!", ['driver' => $driver_trip_details]);
                }
                $drivers = Booking::where('driver_id', $driver->id)->where(function ($query) {
                    $query->orwhere('status', config('constants.STATUS.Completed'));
                    $query->orwhere('status', config('constants.STATUS.Cancel'));

                })->orderBy('id', 'DESC')->get();
                foreach ($drivers as $key => $driv) {

                    $drivers[$key]['customer_name'] = $driv->customer->first_name;
                    $drivers[$key]['driver_name'] = $driv->driver->first_name;
                    $drivers[$key]['star_rating'] = number_formats(multi_customer_rating($driv));

                }
                return $this->api_success_response("Success !", ['driver' => $drivers]);
            } else {
                return $this->api_error_response("Un-authenticated User...!");
            }
        } else {
            return $this->api_error_response("Check Your User Does Not Exist!..Login Here...");
        }
    }


    public function get_on_going_trip()
    {

        $driver = Auth::guard('api')->user();
        if ($driver) {
            if ($driver->role == config('constants.ROLE.CUSTOMER')) {
                $customers = Booking::where('customer_id', $driver->id)->where('status', config('constants.STATUS.On_Going'))->first();
                $customers['customer_name'] = $customers->customer->first_name;
                $customers['driver_name'] = $customers->driver->fisrt_name;
                $customers['star_rating'] = number_formats(multi_customer_rating($customers));
                return $this->api_success_response("Sucecss !", ['customer' => $customers]);
            } else if ($driver->role == config('constants.ROLE.DRIVER')) {
                $drivers = Booking::where('driver_id', $driver->id)->where('status', config('constants.STATUS.On_Going'))->first();
                $drivers['customer_name'] = $drivers->customer->first_name;
                $drivers['driver_name'] = $drivers->driver->fisrt_name;
                $drivers['star_rating'] = number_formats(multi_customer_rating($drivers));
                return $this->api_success_response("Sucecss !", ['driver' => $drivers]);
            }
        } else {
            return $this->api_error_response("Check Your Driver Does Not Exist!..Login Here...");
        }
    }

    public function get_up_coming_trip(Request $request)
    {

        $driver = Auth::guard('api')->user();

        if ($driver) {
            if ($driver->role == config('constants.ROLE.CUSTOMER')) {

                if ($request->status || $request->from_date || $request->to_date) {

                    $customer_upcoming_trips = Booking::where('driver_id', $driver->id)->where(function ($query) use ($request) {
                        if ($request->status) {
                            $query->orWhere('status', $request->status);
                        }
                        if ($request->from_date && $request->to_date) {
                            $query->whereDate('created_at', '>=', $request->from_date);
                            $query->whereDate('created_at', '<=', $request->to_date);
                        }

                    })->get();
                    foreach ($customer_upcoming_trips as $key => $customer_upcoming_trip) {
                        $customer_upcoming_trips[$key]['customer_address'] = CustomerExtend::where('user_id',$customer_upcoming_trip->customer_id)->get();
                        $customer_upcoming_trips[$key]['customer_car_details'] = CustomerCarDetail::where('user_id',$customer_upcoming_trip->customer_id)->get();
                        $customer_upcoming_trips[$key]['customer_name'] = $customer_upcoming_trip->customer->first_name;
                        $customer_upcoming_trips[$key]['driver_name'] = $customer_upcoming_trip->driver->first_name;

                    }
                    return $this->api_error_response("Success!", ['customer' => $customer_upcoming_trips]);
                }

                $customers = Booking::where('driver_id', $driver->id)->where(function ($query) {

                    $query->orWhere('status', config('constants.STATUS.Pending'));
                    $query->orWhere('status', config('constants.STATUS.Accepted'));
                    $query->orWhere('status', config('constants.STATUS.Confirm'));

                })->get();
                foreach ($customers as $key => $customer) {

                    $customers[$key]['customer_name'] = $customer->customer->first_name;
                    $customers[$key]['driver_name'] = $customer->driver->first_name;
                    $customers['star_rating'] = number_formats(multi_customer_rating($customers));
                }
                return $this->api_success_response("Success !", ['customer' => $customers]);
            } else if ($driver->role == config('constants.ROLE.DRIVER')) {

                if ($request->status || $request->from_date || $request->to_date) {

                    $driver_upcoming_trips = Booking::where('driver_id', $driver->id)->where(function ($query) use ($request) {
                        if ($request->status) {
                            $query->orWhere('status', $request->status);
                        }
                        if ($request->from_date && $request->to_date) {
                            $query->whereDate('created_at', '>=', $request->from_date);
                            $query->whereDate('created_at', '<=', $request->to_date);
                        }

                    })->get();
                    foreach ($driver_upcoming_trips as $key => $driver_upcoming_trip) {
                        $driver_upcoming_trips[$key]['customer_address'] = CustomerExtend::where('user_id',$driver_upcoming_trip->customer_id)->get();
                        $driver_upcoming_trips[$key]['customer_car_details'] = CustomerCarDetail::where('user_id',$driver_upcoming_trip->customer_id)->get();
                        $driver_upcoming_trips[$key]['customer_name'] = $driver_upcoming_trip->customer->first_name;
                        $driver_upcoming_trips[$key]['driver_name'] = $driver_upcoming_trip->driver->first_name;

                    }
                    return $this->api_error_response("Success!", ['driver' => $driver_upcoming_trips]);
                }

                $drivers = Booking::where('driver_id', $driver->id)->where('status', config('constants.STATUS.Pending'))->orwhere('status', config('constants.STATUS.Accepted'))->orwhere('status', config('constants.STATUS.Confirm'))->get();
                foreach ($drivers as $key => $driv) {
                    $drivers[$key]['customer_address'] = CustomerExtend::where('user_id',$driv->customer_id)->get();
                    $drivers[$key]['customer_car_details'] = CustomerCarDetail::where('user_id',$driv->customer_id)->get();
                    $drivers[$key]['customer_name'] = $driv->customer->first_name;
                    $drivers[$key]['driver_name'] = $driv->driver->first_name;
                    $drivers[$key]['star_rating'] = number_formats(multi_customer_rating($driv));
                }
                return $this->api_success_response("Success !", ['driver' => $drivers]);
            }
        } else {
            return $this->api_error_response("Check Your Driver Does Not Exist!..Login Here...");
        }
    }

    public function get_live_booking()
    {

        $driver = Auth::guard('api')->user();
        if ($driver) {
            if ($driver->role == config('constants.ROLE.CUSTOMER')) {
                $customers = Booking::where('customer_id', $driver->id)->where('live_or_advance', 'live_booking')->orderBy('id', 'DESC')->get();
                return $this->api_success_response("Sucecss !", ['customer' => $customers]);
            } else if ($driver->role == config('constants.ROLE.DRIVER')) {
                $drivers = Booking::where('driver_id', $driver->id)->where('live_or_advance', 'live_booking')->orderBy('id', 'DESC')->get();
                foreach ($drivers as $key => $driv) {

                    $drivers[$key]['customer_name'] = $driv->customer->first_name;
                    $drivers[$key]['driver_name'] = $driv->driver->first_name;
                    $drivers[$key]['star_rating'] = number_formats(multi_customer_rating($driv));
                }
                return $this->api_success_response("Sucecss !", ['driver' => $drivers]);
            }
        } else {
            return $this->api_error_response("Check Your Driver Does Not Exist!..Login Here...");
        }
    }


    public function get_advance_booking_list()
    {

        $driver = Auth::guard('api')->user();
        if ($driver) {
            if ($driver->role == config('constants.ROLE.CUSTOMER')) {
                $customers = Booking::where('customer_id', $driver->id)->where('live_or_advance', 'advance_booking')->orderBy('id', 'DESC')->get();
                return $this->api_success_response("Sucecss !", ['customer' => $customers]);
            } else if ($driver->role == config('constants.ROLE.DRIVER')) {
                $drivers = Booking::where('driver_id', $driver->id)->where('live_or_advance', 'advance_booking')->orderBy('id', 'DESC')->get();
                foreach ($drivers as $key => $driv) {

                    $drivers[$key]['customer_name'] = $driv->customer->first_name;
                    $drivers[$key]['driver_name'] = $driv->driver->first_name;
                    $drivers[$key]['star_rating'] = number_formats(multi_customer_rating($driv));
                }

                return $this->api_success_response("Sucecss !", ['driver' => $drivers]);
            }
        } else {
            return $this->api_error_response("Check Your Driver Does Not Exist!..Login Here...");
        }
    }


    public function trip_detail(Request $request, $id)
    {
        $driver = Auth::guard('api')->user();


        if ($driver) {
            if ($driver->role == config('constants.ROLE.CUSTOMER')) {
                $customers_trip_details = Booking::where('id', $id)->where('customer_id', $driver->id)->first();
                return $this->api_success_response("Sucecss !", ['customer trip Details' => $customers_trip_details]);
            } else if ($driver->role == config('constants.ROLE.DRIVER')) {
                $drivers_trip_details = Booking::where('id', $id)->where('driver_id', $driver->id)->first();
                foreach ($drivers as $key => $driv) {

                    $drivers[$key]['customer_name'] = $driv->customer->first_name;
                    $drivers[$key]['driver_name'] = $driv->driver->first_name;
                    $drivers[$key]['star_rating'] = number_formats(multi_customer_rating($driv));
                }
                return $this->api_success_response("Sucecss !", ['driver_trip_details' => $drivers_trip_details]);
            }
        } else {
            return $this->api_error_response("Check Your Driver Does Not Exist!..Login Here...");
        }


    }


    public function cancel_trip(Request $request, $id)
    {

        $driver = Auth::guard('api')->user();
        if ($driver) {
            if ($driver->role == config('constants.ROLE.DRIVER')) {
                $drivers_trip_details = Booking::where('id', $id)->first();
                if (isset($drivers_trip_details->status)) {
                    if ($drivers_trip_details->status == config('constants.STATUS.Pending') || $drivers_trip_details->status == config('constants.STATUS.On_Going')) {
                        $input['status'] = config('constants.STATUS.Cancel');
                        if ($input) {
                            $rules = [
                                'cancel_reason' => 'required',
                            ];


                            $validate = Validator::make($request->all(), $rules);
                            if ($validate->fails()) {
                                return $this->api_error_response("Invalid input data", $validate->errors()->all());
                            }

                            $lat1 = $drivers_trip_details->start_late;
                            $lon1 = $drivers_trip_details->start_long;
                            $lat2 = $drivers_trip_details->destination_late;
                            $lon2 = $drivers_trip_details->destination_long;


                            if (($lat1 == $lat2) && ($lon1 == $lon2)) {
                                return 0;
                            } else {
                                $theta = $lon1 - $lon2;
                                $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                                $dist = acos($dist);
                                $dist = rad2deg($dist);
                                $miles = round($dist * 60 * 1.1515, 3);
                                $convert_km = $miles * 1.6;
                                $km_count = Setting::first();

                            }

                            //   $total_amount = $convert_km * $km_count->per_km_panelty_rate;
                            $total_amount = round($convert_km, 2) * $km_count->per_km_panelty_rate;
// dd($total_amount);

                            $input['total_panelty'] = $total_amount;
                            $input['cancel_reason'] = $request->cancel_reason;
                            $input['driver_name'] = $driver->first_name;
                            $drivers_trip_details->update($input);


                            $data['user_id'] = $driver->id;
                            $data['title'] = 'Cancel-Trip';
                            $data['type'] = 'Booking';
                            $data['type_id'] = $drivers_trip_details->id;
                            $data['msg'] = 'A new ' . $drivers_trip_details['live_or_advance'] . '&nbsp' . $drivers_trip_details['incity_or_out_city'] . '&nbsp' . $drivers_trip_details['pickup_drop_or_temp'] . '&nbsp' . 'trip book cancel by <a href="' . route('driver-dashboard') . '?id=' . $driver->id . '">' . $driver->first_name . "'</a>' for date " . birth_date_formate(Carbon::now());
                            Notification::notify_with_push($data);

                            return $this->api_success_response("Sucecss !", ['driver_trip_details' => $input]);

                        }


                    } else {
                        return $this->api_error_response("Status Only For Pending and On_Going !...");
                    }
                } else {
                    return $this->api_error_response("Check Your Driver Does Not Exist!...");
                }

            }
        } else {

            return $this->api_error_response("Check Your Driver Does Not Exist!...");
        }
    }


    public function upload_picture_befor_start_trip(Request $request, $id)
    {

        $input = $request->all();
        $driver = Auth::guard('api')->user();
        if ($driver) {
            if ($driver->role == config('constants.ROLE.DRIVER')) {
                $drivers_trip_details = Booking::where('id', $id)->where('driver_id', $driver->id)->first();
                if (isset($drivers_trip_details)) {
                    if ($request->hasFile("picture_befor_start")) {
                        $img = $request->file("picture_befor_start");
                        if (Storage::exists('public/admin/images' . $drivers_trip_details->picture_befor_start)) {
                            Storage::delete('public/admin/images' . $drivers_trip_details->picture_befor_start);
                        }
                        $img->store('public/admin/images');
                        $input['picture_befor_start'] = $img->hashName();
                        $drivers_trip_details->update($input);
                    }
                    $drivers_trip_details['picture_befor_start'] = 'storage/admin/images/' . $drivers_trip_details->picture_befor_start;
                    $drivers_trip_details = $drivers_trip_details->update($input);
                } else {
                    return $this->api_error_response("Check Your Driver Does Not Exist!...");
                }
                return $this->api_success_response("Sucecss !", ['driver_trip_details' => $drivers_trip_details]);
            }
        } else {
            return $this->api_error_response("Check Your Driver Does Not Exist!..Login Here...");
        }

    }

    public function upload_picture_befor_end_trip(Request $request, $id)
    {
        $input = $request->all();
        $driver = Auth::guard('api')->user();
        if ($driver) {
            if ($driver->role == config('constants.ROLE.DRIVER')) {
                $drivers_trip_details = Booking::where('id', $id)->where('driver_id', $driver->id)->first();
                if (isset($drivers_trip_details)) {
                    if ($request->hasFile("picture_befor_end")) {
                        $img = $request->file("picture_befor_end");
                        if (Storage::exists('public/admin/images' . $drivers_trip_details->picture_befor_end)) {
                            Storage::delete('public/admin/images' . $drivers_trip_details->picture_befor_end);
                        }
                        $img->store('public/admin/images');
                        $input['picture_befor_end'] = $img->hashName();
                        $drivers_trip_details->update($input);
                    }
                    $drivers_trip_details->update($input);

                    $data['user_id'] = $driver->id;
                    $data['user_id'] = $driver->id;
                    $data['title'] = 'Trip Ended';
                    $data['type'] = 'Trip';
                    $data['type_id'] = $drivers_trip_details->id;
                    $customer_name = $drivers_trip_details->customer->first_name;
                    $start_date_formate = notification_date_formate($drivers_trip_details->start_or_pickup_date);
                    $end_date_formate = notification_date_formate($drivers_trip_details->end_or_drop_date);

                    $data['msg'] = "Hello $customer_name your trip of $start_date_formate to $end_date_formate is rejected by $driver->first_name" ;

                   // Notification::notify_with_push($data);
                    Firebase::send_push_notification($data);
                    Firebase::send_push_notification_driver($data);
                    customer_notification_store($data);
                    driver_notification_store($data);


                } else {
                    return $this->api_error_response("Check Your Driver Does Not Exist!...");
                }
                return $this->api_success_response("Sucecss !", ['driver_trip_details' => $drivers_trip_details]);
            }
        } else {
            return $this->api_error_response("Check Your Driver Does Not Exist!..Login Here...");
        }

    }


    public function get_cancel_trip()
    {

        $driver = Auth::guard('api')->user();
        if ($driver) {
            if ($driver->role == config('constants.ROLE.CUSTOMER')) {
                $customers = Booking::where('customer_id', $driver->id)->where('status', config('constants.STATUS.Cancel'))->get();

                return $this->api_success_response("Sucecss !", ['customer' => $customers]);
            } else if ($driver->role == config('constants.ROLE.DRIVER')) {
                $drivers = Booking::where('driver_id', $driver->id)->where('status', config('constants.STATUS.Cancel'))->get();
                foreach ($drivers as $key => $driv) {

                    $drivers[$key]['customer_name'] = $driv->customer->first_name;
                    $drivers[$key]['driver_name'] = $driv->driver->first_name;

                }
                return $this->api_success_response("Sucecss !", ['driver' => $drivers]);
            }
        } else {
            return $this->api_error_response("Check Your Driver Does Not Exist!..Login Here...");
        }
    }


    /*Customer Live Booking Car*/
    public function live_booking_in_city_pickup_drop(Request $request)
    {

        $customer = Auth::guard('api')->user();
        if ($customer) {
            if ($customer->role == config('constants.ROLE.CUSTOMER')) {
                $rules = [
                    'start_late' => 'required',
                    'start_long' => 'required',
                    'destination_late' => 'required',
                    'destination_long' => 'required',
                    'start_or_pickup_date' => 'required',
                    'start_or_pickup_time' => 'required',
                    'end_or_drop_date' => 'required',
                    'end_or_drop_time' => 'required',
                    'assign_driver_date' => 'required',
                ];

                $validate = Validator::make($request->all(), $rules);
                if ($validate->fails()) {
                    return $this->api_error_response("Invalid input data", $validate->errors()->all());
                }

                $lat1 = $request->start_late;
                $lon1 = $request->start_long;
                $lat2 = $request->destination_late;
                $lon2 = $request->destination_long;


                if (($lat1 == $lat2) && ($lon1 == $lon2)) {
                    return 0;
                } else {
                    $theta = $lon1 - $lon2;
                    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                    $dist = acos($dist);
                    $dist = rad2deg($dist);
                    $miles = $dist * 60 * 1.1515;
                    $convert_km = get_currency_count($miles * 1.609344);
                    $km_count = Setting::first();
                }

                $total_amount = $convert_km * get_currency_count($km_count->km_rate);


                $input = $request->all();
                $input['status'] = config('constants.STATUS.Pending');
                $input['customer_id'] = $customer->id;
                $input['total_payment'] = $total_amount;
                $input['live_or_advance'] = config('constants.BOOKING_TYPE.live_booking');
                $input['incity_or_out_city'] = config('constants.BOOKING_CITY.In City');
                $input['pickup_drop_or_temp'] = config('constants.BOOKING_DROP_CAR.pickup_drop');

                $booking = Booking::create($input);
                $booking['customer_name'] = $customer->first_name;
                $booking['star_rating'] = number_formats(user_rating($customer));
                $users = User::first();

                $data['user_id'] = $customer->id;
                $data['title'] = 'New in-city pickup_drop trip booked';
                $data['type'] = 'Booking';
                $data['type_id'] = $booking->id;
                $data['msg'] = 'A new ' . $input['live_or_advance'] . '&nbsp' . $input['incity_or_out_city'] . '&nbsp' . $input['pickup_drop_or_temp'] . '&nbsp' . 'trip book by <a href="' . route('customer-dashboard') . '?id=' . $customer->id . '">' . $customer->first_name . "'</a>' for date " . birth_date_formate($booking['created_at']);
                Notification::notify_with_push($data);


                return $this->api_success_response("Sucecss !", ['customer_booking_details' => $booking]);
            } else {
                return $this->api_error_response("Un-authenticated User...!");
            }
        } else {
            return $this->api_error_response("Check Your Customer Does Not Exist!..Login Here...");
        }
    }


    public function live_booking_out_city_pickup_drop(Request $request)
    {
        $customer = Auth::guard('api')->user();
        if ($customer) {
            if ($customer->role == config('constants.ROLE.CUSTOMER')) {
                $rules = [
                    'start_late' => 'required',
                    'start_long' => 'required',
                    'destination_late' => 'required',
                    'destination_long' => 'required',
                    'start_or_pickup_date' => 'required',
                    'start_or_pickup_time' => 'required',
                    'end_or_drop_date' => 'required',
                    'end_or_drop_time' => 'required',
                    'assign_driver_date' => 'required',
                ];

                $validate = Validator::make($request->all(), $rules);
                if ($validate->fails()) {
                    return $this->api_error_response("Invalid input data", $validate->errors()->all());
                }

                $lat1 = $request->start_late;
                $lon1 = $request->start_long;
                $lat2 = $request->destination_late;
                $lon2 = $request->destination_long;


                if (($lat1 == $lat2) && ($lon1 == $lon2)) {
                    return 0;
                } else {
                    $theta = $lon1 - $lon2;
                    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                    $dist = acos($dist);
                    $dist = rad2deg($dist);
                    $miles = $dist * 60 * 1.1515;
                    $convert_km = get_currency_count($miles * 1.609344);
                    $km_count = Setting::first();

                }

                $total_amount = $convert_km * get_currency_count($km_count->km_rate);

                $input = $request->all();
                $input['status'] = config('constants.STATUS.Pending');
                $input['customer_id'] = $customer->id;
                $input['total_payment'] = $total_amount;
                $input['live_or_advance'] = config('constants.BOOKING_TYPE.live_booking');
                $input['incity_or_out_city'] = config('constants.BOOKING_CITY.Out City');
                $input['pickup_drop_or_temp'] = config('constants.BOOKING_DROP_CAR.pickup_drop');

                $booking = Booking::create($input);
                $booking['customer_name'] = $customer->first_name;
                $booking['star_rating'] = number_formats(user_rating($customer));

                $users = User::first();

                $data['user_id'] = $customer->id;
                $data['title'] = 'New out-city pickup_drop trip booked';
                $data['type'] = 'Booking';
                $data['type_id'] = $booking->id;
                $data['msg'] = 'A new ' . $input['live_or_advance'] . '&nbsp' . $input['incity_or_out_city'] . '&nbsp' . $input['pickup_drop_or_temp'] . '&nbsp' . 'trip book by <a href="' . route('customer-dashboard') . '?id=' . $customer->id . '">' . $customer->first_name . "'</a>' for date " . birth_date_formate($booking['created_at']);
                Notification::notify_with_push($data);

                return $this->api_success_response("Sucecss !", ['customer_booking_details' => $booking]);
            } else {
                return $this->api_error_response("Un-authenticated User...!");
            }
        } else {
            return $this->api_error_response("Check Your Customer Does Not Exist!..Login Here...");
        }
    }


    public function live_booking_in_city_temporary(Request $request)
    {
        $customer = Auth::guard('api')->user();
        if ($customer) {
            if ($customer->role == config('constants.ROLE.CUSTOMER')) {
                $rules = [
                    'start_late' => 'required',
                    'start_long' => 'required',
                    'destination_late' => 'required',
                    'destination_long' => 'required',
                    'start_or_pickup_date' => 'required',
                    'start_or_pickup_time' => 'required',
                    'end_or_drop_date' => 'required',
                    'end_or_drop_time' => 'required',
                    'assign_driver_date' => 'required',
                ];

                $validate = Validator::make($request->all(), $rules);
                if ($validate->fails()) {
                    return $this->api_error_response("Invalid input data", $validate->errors()->all());
                }

                $lat1 = $request->start_late;
                $lon1 = $request->start_long;
                $lat2 = $request->destination_late;
                $lon2 = $request->destination_long;


                if (($lat1 == $lat2) && ($lon1 == $lon2)) {
                    return 0;
                } else {
                    $theta = $lon1 - $lon2;
                    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                    $dist = acos($dist);
                    $dist = rad2deg($dist);
                    $miles = $dist * 60 * 1.1515;
                    $convert_km = get_currency_count($miles * 1.609344);
                    $km_count = Setting::first();

                }

                $total_amount = $convert_km * get_currency_count($km_count->km_rate);


                $input = $request->all();
                $input['status'] = config('constants.STATUS.Pending');
                $input['customer_id'] = $customer->id;
                $input['total_payment'] = $total_amount;
                $input['live_or_advance'] = config('constants.BOOKING_TYPE.live_booking');
                $input['incity_or_out_city'] = config('constants.BOOKING_CITY.In City');
                $input['pickup_drop_or_temp'] = config('constants.BOOKING_DROP_CAR.temporary');

                $booking = Booking::create($input);
                $booking['customer_name'] = $customer->first_name;
                $booking['star_rating'] = number_formats(user_rating($customer));

                $users = User::first();

                $data['user_id'] = $customer->id;
                $data['title'] = 'New in-city temporary trip booked';
                $data['type'] = 'Booking';
                $data['type_id'] = $booking->id;
                $data['msg'] = 'A new ' . $input['live_or_advance'] . '&nbsp' . $input['incity_or_out_city'] . '&nbsp' . $input['pickup_drop_or_temp'] . '&nbsp' . 'trip book by <a href="' . route('customer-dashboard') . '?id=' . $customer->id . '">' . $customer->first_name . "'</a>' for date " . birth_date_formate($booking['created_at']);
                Notification::notify_with_push($data);


                return $this->api_success_response("Sucecss !", ['customer_booking_details' => $booking]);
            } else {
                return $this->api_error_response("Un-authenticated User...!");
            }
        } else {
            return $this->api_error_response("Check Your Customer Does Not Exist!..Login Here...");
        }
    }

    public function live_booking_out_city_temporary(Request $request)
    {
        $customer = Auth::guard('api')->user();
        if ($customer) {
            if ($customer->role == config('constants.ROLE.CUSTOMER')) {
                $rules = [
                    'start_late' => 'required',
                    'start_long' => 'required',
                    'destination_late' => 'required',
                    'destination_long' => 'required',
                    'start_or_pickup_date' => 'required',
                    'start_or_pickup_time' => 'required',
                    'end_or_drop_date' => 'required',
                    'end_or_drop_time' => 'required',
                    'assign_driver_date' => 'required',
                ];

                $validate = Validator::make($request->all(), $rules);
                if ($validate->fails()) {
                    return $this->api_error_response("Invalid input data", $validate->errors()->all());
                }

                $lat1 = $request->start_late;
                $lon1 = $request->start_long;
                $lat2 = $request->destination_late;
                $lon2 = $request->destination_long;


                if (($lat1 == $lat2) && ($lon1 == $lon2)) {
                    return 0;
                } else {
                    $theta = $lon1 - $lon2;
                    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                    $dist = acos($dist);
                    $dist = rad2deg($dist);
                    $miles = $dist * 60 * 1.1515;
                    $convert_km = get_currency_count($miles * 1.609344);
                    $km_count = Setting::first();

                }

                $total_amount = $convert_km * get_currency_count($km_count->km_rate);

                $input = $request->all();
                $input['status'] = config('constants.STATUS.Pending');
                $input['customer_id'] = $customer->id;
                $input['total_payment'] = $total_amount;
                $input['live_or_advance'] = config('constants.BOOKING_TYPE.live_booking');
                $input['incity_or_out_city'] = config('constants.BOOKING_CITY.Out City');
                $input['pickup_drop_or_temp'] = config('constants.BOOKING_DROP_CAR.temporary');

                $booking = Booking::create($input);
                $booking['customer_name'] = $customer->first_name;
                $booking['star_rating'] = number_formats(user_rating($customer));

                $users = User::first();

                $data['user_id'] = $customer->id;
                $data['title'] = 'New out-city temporary trip booked';
                $data['type'] = 'Booking';
                $data['type_id'] = $booking->id;
                $data['msg'] = 'A new ' . $input['live_or_advance'] . '&nbsp' . $input['incity_or_out_city'] . '&nbsp' . $input['pickup_drop_or_temp'] . '&nbsp' . 'trip book by <a href="' . route('customer-dashboard') . '?id=' . $customer->id . '">' . $customer->first_name . "'</a>' for date " . birth_date_formate($booking['created_at']);
                Notification::notify_with_push($customer->id, 'New out-city temporary trip booked', $msg);


                return $this->api_success_response("Sucecss !", ['customer_booking_details' => $booking]);
            } else {
                return $this->api_error_response("Un-authenticated User...!");
            }
        } else {
            return $this->api_error_response("Check Your Customer Does Not Exist!..Login Here...");
        }
    }

    /*Customer Advance Booking Car*/
    public function advance_booking_in_city_pickup_drop(Request $request)
    {
        $customer = Auth::guard('api')->user();
        if ($customer) {
            if ($customer->role == config('constants.ROLE.CUSTOMER')) {
                $rules = [
                    'start_late' => 'required',
                    'start_long' => 'required',
                    'destination_late' => 'required',
                    'destination_long' => 'required',
                    'start_or_pickup_date' => 'required',
                    'start_or_pickup_time' => 'required',
                    'end_or_drop_date' => 'required',
                    'end_or_drop_time' => 'required',
                    'assign_driver_date' => 'required',
                ];

                $validate = Validator::make($request->all(), $rules);
                if ($validate->fails()) {
                    return $this->api_error_response("Invalid input data", $validate->errors()->all());
                }

                $lat1 = $request->start_late;
                $lon1 = $request->start_long;
                $lat2 = $request->destination_late;
                $lon2 = $request->destination_long;


                if (($lat1 == $lat2) && ($lon1 == $lon2)) {
                    return 0;
                } else {
                    $theta = $lon1 - $lon2;
                    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                    $dist = acos($dist);
                    $dist = rad2deg($dist);
                    $miles = $dist * 60 * 1.1515;
                    $convert_km = get_currency_count($miles * 1.609344);
                    $km_count = Setting::first();

                }


                $total_amount = $convert_km * get_currency_count($km_count->km_rate);


                $input = $request->all();
                $input['status'] = config('constants.STATUS.Pending');
                $input['customer_id'] = $customer->id;
                $input['total_payment'] = $total_amount;
                $input['live_or_advance'] = config('constants.BOOKING_TYPE.advance_booking');
                $input['incity_or_out_city'] = config('constants.BOOKING_CITY.In City');
                $input['pickup_drop_or_temp'] = config('constants.BOOKING_DROP_CAR.pickup_drop');

                $booking = Booking::create($input);
                $booking['customer_name'] = $customer->first_name;
                $booking['star_rating'] = number_formats(user_rating($customer));

                $users = User::first();

                $data['user_id'] = $customer->id;
                $data['title'] = 'New in-city pickup_drop trip booked';
                $data['type'] = 'Booking';
                $data['type_id'] = $booking->id;
                $data['msg'] = 'A new ' . $input['live_or_advance'] . '&nbsp' . $input['incity_or_out_city'] . '&nbsp' . $input['pickup_drop_or_temp'] . '&nbsp' . 'trip book by <a href="' . route('customer-dashboard') . '?id=' . $customer->id . '">' . $customer->first_name . "'</a>' for date " . birth_date_formate($booking['created_at']);
                Notification::notify_with_push($data);

                return $this->api_success_response("Sucecss !", ['customer_booking_details' => $booking]);
            } else {
                return $this->api_error_response("Un-authenticated User...!");
            }
        } else {
            return $this->api_error_response("Check Your Customer Does Not Exist!..Login Here...");
        }
    }


    public function advance_booking_out_city_pickup_drop(Request $request)
    {
        $customer = Auth::guard('api')->user();
        if ($customer) {
            if ($customer->role == config('constants.ROLE.CUSTOMER')) {
                $rules = [
                    'start_late' => 'required',
                    'start_long' => 'required',
                    'destination_late' => 'required',
                    'destination_long' => 'required',
                    'start_or_pickup_date' => 'required',
                    'start_or_pickup_time' => 'required',
                    'end_or_drop_date' => 'required',
                    'end_or_drop_time' => 'required',
                    'assign_driver_date' => 'required',
                ];

                $validate = Validator::make($request->all(), $rules);
                if ($validate->fails()) {
                    return $this->api_error_response("Invalid input data", $validate->errors()->all());
                }

                $lat1 = $request->start_late;
                $lon1 = $request->start_long;
                $lat2 = $request->destination_late;
                $lon2 = $request->destination_long;


                if (($lat1 == $lat2) && ($lon1 == $lon2)) {
                    return 0;
                } else {
                    $theta = $lon1 - $lon2;
                    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                    $dist = acos($dist);
                    $dist = rad2deg($dist);
                    $miles = $dist * 60 * 1.1515;
                    $convert_km = get_currency_count($miles * 1.609344);
                    $km_count = Setting::first();

                }
                $total_amount = $convert_km * get_currency_count($km_count->km_rate);

                $input = $request->all();
//                $input['status'] = 'pending';
                $input['status'] = config('constants.STATUS.Pending');
                $input['customer_id'] = $customer->id;
                $input['total_payment'] = $total_amount;
                $input['live_or_advance'] = config('constants.BOOKING_TYPE.advance_booking');
                $input['incity_or_out_city'] = config('constants.BOOKING_CITY.Out City');
                $input['pickup_drop_or_temp'] = config('constants.BOOKING_DROP_CAR.pickup_drop');

                $booking = Booking::create($input);
                $booking['customer_name'] = $customer->first_name;
                $booking['star_rating'] = number_formats(user_rating($customer));

                $users = User::first();

                $data['user_id'] = $customer->id;
                $data['title'] = 'New out-city pickup_drop trip booked';
                $data['type'] = 'Booking';
                $data['type_id'] = $booking->id;
                $data['msg'] = 'A new ' . $input['live_or_advance'] . '&nbsp' . $input['incity_or_out_city'] . '&nbsp' . $input['pickup_drop_or_temp'] . '&nbsp' . 'trip book by <a href="' . route('customer-dashboard') . '?id=' . $customer->id . '">' . $customer->first_name . "'</a>' for date " . birth_date_formate($booking['created_at']);
                Notification::notify_with_push($data);

                return $this->api_success_response("Sucecss !", ['customer_booking_details' => $booking]);
            } else {
                return $this->api_error_response("Un-authenticated User...!");
            }
        } else {
            return $this->api_error_response("Check Your Customer Does Not Exist!..Login Here...");
        }
    }


    public function advance_booking_in_city_temporary(Request $request)
    {
        $customer = Auth::guard('api')->user();
        if ($customer) {
            if ($customer->role == config('constants.ROLE.CUSTOMER')) {
                $rules = [
                    'start_late' => 'required',
                    'start_long' => 'required',
                    'destination_late' => 'required',
                    'destination_long' => 'required',
                    'start_or_pickup_date' => 'required',
                    'start_or_pickup_time' => 'required',
                    'end_or_drop_date' => 'required',
                    'end_or_drop_time' => 'required',
                    'assign_driver_date' => 'required',
                ];

                $validate = Validator::make($request->all(), $rules);
                if ($validate->fails()) {
                    return $this->api_error_response("Invalid input data", $validate->errors()->all());
                }

                $lat1 = $request->start_late;
                $lon1 = $request->start_long;
                $lat2 = $request->destination_late;
                $lon2 = $request->destination_long;


                if (($lat1 == $lat2) && ($lon1 == $lon2)) {
                    return 0;
                } else {
                    $theta = $lon1 - $lon2;
                    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                    $dist = acos($dist);
                    $dist = rad2deg($dist);
                    $miles = $dist * 60 * 1.1515;
                    $convert_km = get_currency_count($miles * 1.609344);
                    $km_count = Setting::first();

                }

                $total_amount = $convert_km * get_currency_count($km_count->km_rate);


                $input = $request->all();
                $input['status'] = config('constants.STATUS.Pending');
                $input['customer_id'] = $customer->id;
                $input['total_payment'] = $total_amount;
                $input['live_or_advance'] = config('constants.BOOKING_TYPE.advance_booking');
                $input['incity_or_out_city'] = config('constants.BOOKING_CITY.In City');
                $input['pickup_drop_or_temp'] = config('constants.BOOKING_DROP_CAR.temporary');

                $booking = Booking::create($input);
                $booking['customer_name'] = $customer->first_name;
                $booking['star_rating'] = number_formats(user_rating($customer));

                $users = User::first();

                $data['user_id'] = $customer->id;
                $data['title'] = 'New in-city temporary trip booked';
                $data['type'] = 'Booking';
                $data['type_id'] = $booking->id;
                $data['msg'] = 'A new ' . $input['live_or_advance'] . '&nbsp' . $input['incity_or_out_city'] . '&nbsp' . $input['pickup_drop_or_temp'] . '&nbsp' . 'trip book by <a href="' . route('customer-dashboard') . '?id=' . $customer->id . '">' . $customer->first_name . "'</a>' for date " . birth_date_formate($booking['created_at']);
                Notification::notify_with_push($data);

                return $this->api_success_response("Sucecss !", ['customer_booking_details' => $booking]);
            } else {
                return $this->api_error_response("Un-authenticated User...!");
            }
        } else {
            return $this->api_error_response("Check Your Customer Does Not Exist!..Login Here...");
        }
    }

    public function advance_booking_out_city_temporary(Request $request)
    {
        $customer = Auth::guard('api')->user();
        if ($customer) {
            if ($customer->role == config('constants.ROLE.CUSTOMER')) {
                $rules = [
                    'start_late' => 'required',
                    'start_long' => 'required',
                    'destination_late' => 'required',
                    'destination_long' => 'required',
                    'start_or_pickup_date' => 'required',
                    'start_or_pickup_time' => 'required',
                    'end_or_drop_date' => 'required',
                    'end_or_drop_time' => 'required',
                    'assign_driver_date' => 'required',
                ];

                $validate = Validator::make($request->all(), $rules);
                if ($validate->fails()) {
                    return $this->api_error_response("Invalid input data", $validate->errors()->all());
                }

                $lat1 = $request->start_late;
                $lon1 = $request->start_long;
                $lat2 = $request->destination_late;
                $lon2 = $request->destination_long;


                if (($lat1 == $lat2) && ($lon1 == $lon2)) {
                    return 0;
                } else {
                    $theta = $lon1 - $lon2;
                    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                    $dist = acos($dist);
                    $dist = rad2deg($dist);
                    $miles = $dist * 60 * 1.1515;
                    $convert_km = get_currency_count($miles * 1.609344);
                    $km_count = Setting::first();

                }
                $total_amount = $convert_km * get_currency_count($km_count->km_rate);

                $input = $request->all();
                $input['status'] = config('constants.STATUS.Pending');
                $input['customer_id'] = $customer->id;
                $input['total_payment'] = $total_amount;
                $input['live_or_advance'] = config('constants.BOOKING_TYPE.advance_booking');
                $input['incity_or_out_city'] = config('constants.BOOKING_CITY.Out City');
                $input['pickup_drop_or_temp'] = config('constants.BOOKING_DROP_CAR.temporary');

                $booking = Booking::create($input);
                $booking['customer_name'] = $customer->first_name;
                $booking['star_rating'] = number_formats(user_rating($customer));

                $data['user_id'] = $customer->id;
                $data['title'] = 'New out-city temporary trip booked';
                $data['type'] = 'Booking';
                $data['type_id'] = $booking->id;
                $data['msg'] = 'A new ' . $input['live_or_advance'] . '&nbsp' . $input['incity_or_out_city'] . '&nbsp' . $input['pickup_drop_or_temp'] . '&nbsp' . 'trip book by <a href="' . route('customer-dashboard') . '?id=' . $customer->id . '">' . $customer->first_name . "'</a>' for date " . birth_date_formate($booking['created_at']);
                Notification::notify_with_push($data);

                return $this->api_success_response("Sucecss !", ['customer_booking_details' => $booking]);
            } else {
                return $this->api_error_response("Un-authenticated User...!");
            }
        } else {
            return $this->api_error_response("Check Your Customer Does Not Exist!..Login Here...");
        }
    }

    public function confirm_advance_trip_booking(Request $request, $id)
    {

        $input = $request->all();
        $driver = Auth::guard('api')->user();
        if ($driver) {
            $booking = Booking::find($id);
            if ($booking) {

                $input['driver_id'] = $driver->id;
                $input['status'] =  config('constants.STATUS.Confirm');
                $input['assign_driver_date'] = Carbon::now();
                $booking->update($input);

                $data['customer_id'] = $booking->customer_id;
               // $data['driver_id'] = $driver->id;
                $data['title'] = 'Trip Confirm';
                $data['type'] = 'Trip';
                $data['type_id'] = $booking->id;
                $customer_name=$booking->customer->first_name;


                $driver['driver_id'] = $driver->id;
                $driver['title'] = 'Trip Confirm';
                $driver['type'] = 'Trip';
                $driver['type_id'] = $booking->id;


                $start_date_formate = notification_date_formate($booking->start_or_pickup_date);
                $end_date_formate = notification_date_formate($booking->end_or_drop_date);

                $data['msg'] = "Hello $driver->first_name trip is confrim by $customer_name for the date of $start_date_formate to $end_date_formate ! Enjoy your trip..";
                $driver['msg'] ="Hello $customer_name your trip of $start_date_formate to $end_date_formate has been confirmed by $driver->first_name ";
                Firebase::send_push_notification($data);
                Firebase::send_push_notification_driver($driver);
                customer_notification_store($data);
                driver_notification_store($driver);

                return $this->api_success_response('Success!..', ['car_booking_detail' => $booking]);

            } else {
                return $this->api_error_response("Check Your Record Does Not Exist In This Table!");
            }

        } else {
            return $this->api_error_response("Check Your Driver Does Not Exist!..Login Here...");
        }
    }

    public function confirm_live_trip_booking(Request $request, $id)
    {

        $input = $request->all();
        $driver = Auth::guard('api')->user();
        if ($driver) {
            $booking = Booking::find($id);
            if ($booking) {

                $input['driver_id'] = $driver->id;
                $input['assign_driver_date'] = Carbon::now();
                $input['status'] = config('constants.STATUS.On_Going');

                $booking->update($input);


                $data['user_id'] = $driver->id;
                $data['title'] = 'Trip-Confirm';
                $data['type'] = 'Trip';
                $data['type_id'] = $booking->id;
                $data['msg'] = 'Driver ' . $booking['live_or_advance'] . '&nbsp' . $booking['incity_or_out_city'] . '&nbsp' . $booking['pickup_drop_or_temp'] . '&nbsp' . ' <a href="' . route('driver-dashboard') . '?id=' . $driver->id . '">' . $driver->first_name . "'</a>'confirm your trip for date " . birth_date_formate($booking['assign_driver_date']);
            //    Notification::notify_with_push($data);

                return $this->api_success_response('Success!..', ['car_booking_detail' => $booking]);

            } else {
                return $this->api_error_response("Check Your Record Does Not Exist In This Table!");
            }

        } else {
            return $this->api_error_response("Check Your Driver Does Not Exist!..Login Here...");
        }
    }

    public function start_advance_trip_booking(Request $request, $id)
    {

        $input = $request->all();
        $driver = Auth::guard('api')->user();
        if ($driver) {
            $booking = Booking::find($id);
            if ($booking) {

                $rules = [
                    'picture_befor_start' => 'required',
                ];

                $validate = Validator::make($request->all(), $rules);
                if ($validate->fails()) {
                    return $this->api_error_response("Invalid input data", $validate->errors()->all());
                }

//                $input['status'] = config('constants.STATUS.Start');
                $input['status'] = config('constants.STATUS.On_Going');
                if ($request->hasFile("picture_befor_start")) {
                    $img = $request->file("picture_befor_start");
                    if (Storage::exists('public/admin/images' . $booking->picture_befor_start)) {
                        Storage::delete('public/admin/images' . $booking->picture_befor_start);
                    }
                    $img->store('public/admin/images');
                    $input['picture_befor_start'] = $img->hashName();
                    $booking->update($input);
                }

                $booking->update($input);
                $booking['picture_befor_start'] = 'storage/admin/images/' . $booking->picture_befor_start;

                $booking_id = $booking->id;
                $users = User::first();
                $type = 'Start-Trip';


              //  $data['customer_id'] = $booking->customer_id;
                $data['driver_id'] = $driver->id;
                $data['title'] = 'New Trip Added';
                $data['type'] = 'Trip';
                $data['type_id'] = $booking->id;
                $data['msg'] = "Hello $driver->first_name a new advance trip was added for $booking->pickup_drop_or_temp would you like to drive it?";
                Firebase::send_push_notification_driver($data);
              //  Firebase::send_push_notification($data);
                driver_notification_store($data);
              //  customer_notification_store($data);

                return $this->api_success_response('Success!..', ['car_booking_detail' => $booking]);

            } else {
                return $this->api_error_response("Check Your Record Does Not Exist In This Table!");
            }

        } else {
            return $this->api_error_response("Check Your Driver Does Not Exist!..Login Here...");
        }
    }


    public function completed_advance_trip_booking(Request $request, $id)
    {

        $input = $request->all();
        $driver = Auth::guard('api')->user();
        if ($driver) {
            $booking = Booking::find($id);
            if ($booking) {

                $rules = [
                    'picture_befor_end' => 'required',
                    'rating_star' => 'required',
//                    'coment' => 'required',
                ];

                $validate = Validator::make($request->all(), $rules);
                if ($validate->fails()) {
                    return $this->api_error_response("Invalid input data", $validate->errors()->all());
                }

                if ($request->hasFile("picture_befor_end")) {
                    $img = $request->file("picture_befor_end");
                    if (Storage::exists('public/admin/images' . $booking->picture_befor_end)) {
                        Storage::delete('public/admin/images' . $booking->picture_befor_end);
                    }
                    $img->store('public/admin/images');
                    $input['picture_befor_end'] = $img->hashName();

                    $booking->update($input);
                }
                $input['rated_to'] = $booking->customer_id;
                $input['rated_by'] = $driver->id;
                $input['star'] = $request->rating_star;
                $input['coment'] = $request->coment;
                $input['status'] = 1;
                User_Rating::create($input);
                $input['status'] = config('constants.STATUS.Completed');
                $booking->update($input);
                $booking['picture_befor_end'] = 'storage/admin/images/' . $booking->picture_befor_end;


                $data['customer_id'] = $booking->customer_id;
              //  $data['driver_id'] = $driver->id;
                $data['title'] = 'Trip Ended';
                $data['type'] = 'Trip';
                $data['type_id'] = $booking->id;
                $customer_name = $booking->customer->first_name;
                $start_date_formate = notification_date_formate($booking->start_or_pickup_date);
                $end_date_formate = notification_date_formate($booking->end_or_drop_date);

                $data['msg'] = "Hello $customer_name your trip of $start_date_formate to $end_date_formate is ended by $driver->first_name" ;

           //     Notification::notify_with_push($data);
                Firebase::send_push_notification($data);
              //  Firebase::send_push_notification_driver($data);
                customer_notification_store($data);
             //   driver_notification_store($data);

                return $this->api_success_response('Success!..', ['car_booking_detail' => $booking]);

            } else {
                return $this->api_error_response("Check Your Record Does Not Exist In This Table!");
            }

        } else {
            return $this->api_error_response("Check Your Driver Does Not Exist!..Login Here...");
        }
    }


    public function customer_confirm_advance_trip_booking(Request $request, $id)
    {

        $input = $request->all();
        $customer = Auth::guard('api')->user();
        if ($customer) {
            $booking = Booking::find($id);
            if ($booking) {
                if ($booking->driver_id != null) {
                    $input['status'] = config('constants.STATUS.Accepted');
                    $input['updated_at'] = Carbon::now();
                    $booking->update($input);

                    $data['customer_id'] = $customer->id;
                    $data['title'] = 'Trip Confirm';
                    $data['type'] = 'Trip';
                    $data['type_id'] = $booking->id;
                    $driver_name = $booking->driver->first_name;
                    $start_date_formate = notification_date_formate($booking->start_or_pickup_date);
                    $end_date_formate = notification_date_formate($booking->end_or_drop_date);
                    $data['msg'] = "Hello $customer->first_name your trip of $start_date_formate to $end_date_formate has been confirmed by $driver_name";
//                    $data['msg'] = 'Customer ' . $booking['live_or_advance'] . '&nbsp' . $booking['incity_or_out_city'] . '&nbsp' . $booking['pickup_drop_or_temp'] . '&nbsp' . ' <a href="' . route('driver-dashboard') . '?id=' . $customer->id . '">' . $customer->first_name . "'</a>'confirm your trip for date " . birth_date_formate($booking['updated_at']);
             //       Notification::notify_with_push($data);
                    Firebase::send_push_notification($data);
                    customer_notification_store($data);


                    return $this->api_success_response('Success!..', ['car_booking_detail' => $booking]);
                } else {
                    return $this->api_error_response("Driver Does Not Exist!");
                }
            } else {
                return $this->api_error_response("Check Your Record Does Not Exist In This Table!");
            }

        } else {
            return $this->api_error_response("Check Your Customer Does Not Exist!..Login Here...");
        }
    }


    public function advance_booking(Request $request)
    {
        $customer = Auth::guard('api')->user();
        if ($customer) {
            if ($customer->role == config('constants.ROLE.CUSTOMER')) {
                $rules = [
                    'start_late' => 'required',
                    'start_long' => 'required',
                    'destination_late' => 'required',
                    'destination_long' => 'required',
                    'start_or_pickup_date' => 'required',
                    'start_or_pickup_time' => 'required',
                    'end_or_drop_date' => 'required',
                    'end_or_drop_time' => 'required',
                    'incity_or_out_city' => 'required',
                    'pickup_drop_or_temp' => 'required',
                    'city' => 'required',
                    'state' => 'required',
                    'address' => 'required',
                    'car_id' => 'required',
                    'destination_city' => 'required',
                    'destination_state' => 'required',
                    'destination_address' => 'required',
                    'total_payment' => 'required',
                ];

                $validate = Validator::make($request->all(), $rules);
                if ($validate->fails()) {
                    return $this->api_error_response("Invalid input data", $validate->errors()->all());
                }

                $lat1 = $request->start_late;
                $lon1 = $request->start_long;
                $lat2 = $request->destination_late;
                $lon2 = $request->destination_long;


                if (($lat1 == $lat2) && ($lon1 == $lon2)) {
                    return 0;
                } else {
                    $theta = $lon1 - $lon2;
                    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                    $dist = acos($dist);
                    $dist = rad2deg($dist);
                    $miles = round($dist * 60 * 1.1515, 3);
                    $convert_km = $miles * 1.6;
                    $km_count = Setting::first();

                }

//                $total_amount = round($convert_km, 2) * 5.00;

                $input = $request->all();
                $input['status'] = config('constants.STATUS.Pending');
                $input['customer_id'] = $customer->id;
                $input['reffer_amount'] = $km_count->refer_comission_amt;
                $input['total_payment'] = $request->total_payment;
                $input['live_or_advance'] = config('constants.BOOKING_TYPE.advance_booking');


                if ($request->pickup_drop_or_temp == config('constants.BOOKING_DROP_CAR.temporary')) {
                    $input['pickup_drop_or_temp'] = config('constants.BOOKING_DROP_CAR.temporary');
                } else if ($request->pickup_drop_or_temp == config('constants.BOOKING_DROP_CAR.pickup_drop')) {
                    $input['pickup_drop_or_temp'] = config('constants.BOOKING_DROP_CAR.pickup_drop');
                }
                if ($request->incity_or_out_city == config('constants.BOOKING_CITY.In City')) {
                    $input['incity_or_out_city'] = config('constants.BOOKING_CITY.In City');
                } else if ($request->incity_or_out_city == config('constants.BOOKING_CITY.Out City')) {
                    $input['incity_or_out_city'] = config('constants.BOOKING_CITY.Out City');
                }

                $advance_bookings = Booking::create($input);
                $advance_bookings['customer_name'] = $customer->first_name;
                $advance_bookings['star_rating'] = number_formats(user_rating($customer));


                $data['user_id'] = $customer->id;
                $data['title'] = 'New Advance-Trip Booked';
                $data['type'] = 'Booking';
                $data['type_id'] = $advance_bookings->id;
                $data['msg'] = 'A new ' . $input['live_or_advance'] . '&nbsp' . $input['incity_or_out_city'] . '&nbsp' . $input['pickup_drop_or_temp'] . '&nbsp' . 'trip book by <a href="' . route('customer-dashboard') . '?id=' . $customer->id . '">' . $customer->first_name . "'</a>' for date " . birth_date_formate($advance_bookings['created_at']);
           //     Notification::notify_with_push($data);

                return $this->api_success_response("Sucecss !", ['customer_booking_details' => $advance_bookings]);
            } else {
                return $this->api_error_response("Un-authenticated User...!");
            }
        } else {
            return $this->api_error_response("Check Your Customer Does Not Exist!..Login Here...");
        }
    }

    public function live_booking(Request $request)
    {

        $customer = Auth::guard('api')->user();
        if ($customer) {
            if ($customer->role == config('constants.ROLE.CUSTOMER')) {
                $rules = [
                    'start_late' => 'required',
                    'start_long' => 'required',
                    'destination_late' => 'required',
                    'destination_long' => 'required',
                    'start_or_pickup_date' => 'required',
                    'start_or_pickup_time' => 'required',
                    'end_or_drop_date' => 'required',
                    'end_or_drop_time' => 'required',
                    'incity_or_out_city' => 'required',
                    'pickup_drop_or_temp' => 'required',
                    'total_payment' => 'required',
                ];

                $validate = Validator::make($request->all(), $rules);
                if ($validate->fails()) {
                    return $this->api_error_response("Invalid input data", $validate->errors()->all());
                }

                $lat1 = $request->start_late;
                $lon1 = $request->start_long;
                $lat2 = $request->destination_late;
                $lon2 = $request->destination_long;


                if (($lat1 == $lat2) && ($lon1 == $lon2)) {
                    return 0;
                } else {
                    $theta = $lon1 - $lon2;
                    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
                    $dist = acos($dist);
                    $dist = rad2deg($dist);
                    $miles = $dist * 60 * 1.1515;
                    $convert_km = get_currency_count($miles * 1.609344);
                    $km_count = Setting::first();

                }
              //  $total_amount = $convert_km * get_currency_count($km_count->km_rate);

                $input = $request->all();
                $input['status'] = config('constants.STATUS.Pending');
                $input['customer_id'] = $customer->id;
                $input['reffer_amount'] = $km_count->refer_comission_amt;
                $input['total_payment'] = $request->total_payment;
                $input['live_or_advance'] = config('constants.BOOKING_TYPE.live_booking');

                if ($request->pickup_drop_or_temp == config('constants.BOOKING_DROP_CAR.temporary')) {
                    $input['pickup_drop_or_temp'] = config('constants.BOOKING_DROP_CAR.temporary');
                } else if ($request->pickup_drop_or_temp == config('constants.BOOKING_DROP_CAR.pickup_drop')) {
                    $input['pickup_drop_or_temp'] = config('constants.BOOKING_DROP_CAR.pickup_drop');
                }
                if ($request->incity_or_out_city == config('constants.BOOKING_CITY.In City')) {
                    $input['incity_or_out_city'] = config('constants.BOOKING_CITY.In City');
                } else if ($request->incity_or_out_city == config('constants.BOOKING_CITY.Out City')) {
                    $input['incity_or_out_city'] = config('constants.BOOKING_CITY.Out City');
                }


                $live_bookings = Booking::create($input);

                $live_bookings['customer_name'] = $customer->first_name;
                $live_bookings['star_rating'] = number_formats(user_rating($customer));


                $data['user_id'] = $customer->id;
                $data['title'] = 'New Live-Trip Booked';
                $data['type'] = 'Booking';
                $data['type_id'] = $live_bookings->id;
                $data['msg'] = 'A new ' . $input['live_or_advance'] . '&nbsp' . $input['incity_or_out_city'] . '&nbsp' . $input['pickup_drop_or_temp'] . '&nbsp' . 'trip book by <a href="' . route('customer-dashboard') . '?id=' . $customer->id . '">' . $customer->first_name . "'</a>' for date " . birth_date_formate($live_bookings['created_at']);
            //    Notification::notify_with_push($data);

                return $this->api_success_response("Sucecss !", ['customer_booking_details' => $live_bookings]);
            } else {
                return $this->api_error_response("Un-authenticated User...!");
            }
        } else {
            return $this->api_error_response("Check Your Customer Does Not Exist!..Login Here...");
        }
    }


}
