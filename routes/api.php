<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/*Driver Completed API*/
Route::post('driver_create',[App\Http\Controllers\API\Admin\DriversAPIController::class,'driver_create'])->name('driver_create');
Route::post('driver_login',[App\Http\Controllers\API\Admin\DriversAPIController::class,'driver_login'])->name('driver_login');
Route::post('vehicle_management',[App\Http\Controllers\API\Admin\DriversAPIController::class,'vehicle_management'])->name('vehicle_management');
Route::post('driver_management',[App\Http\Controllers\API\Admin\DriversAPIController::class,'driver_management'])->name('driver_management');
Route::get('driver_get',[App\Http\Controllers\API\Admin\DriversAPIController::class,'driver_get'])->name('driver_get');
Route::get('driver_home_api', [App\Http\Controllers\API\Admin\DriversAPIController::class, 'driver_home_api'])->name('driver_home_api');
Route::post('driver_profile_update',[App\Http\Controllers\API\Admin\DriversAPIController::class,'driver_profile_update'])->name('driver_profile_update');
Route::post('driver_language_update', [App\Http\Controllers\API\Admin\DriversAPIController::class, 'driver_language_update'])->name('driver_language_update');
Route::post('update_online_offline',[App\Http\Controllers\API\Admin\DriversAPIController::class,'update_online_offline'])->name('update_online_offline');
Route::post('refral_code_match', [App\Http\Controllers\API\Admin\DriversAPIController::class, 'refral_code_match'])->name('refral_code_match');
Route::post('driver_logout',[App\Http\Controllers\API\Admin\DriversAPIController::class,'driver_logout'])->name('driver_logout');
Route::post('add_helpline_detail', [App\Http\Controllers\API\Admin\DriversAPIController::class, 'add_helpline_detail'])->name('add_helpline_detail');
Route::post('add_rating_api',[App\Http\Controllers\API\Admin\UserRatingAPIController::class,'add_rating_api'])->name('add_rating_api');
Route::get('get_driver_rating', [App\Http\Controllers\API\Admin\UserRatingAPIController::class, 'get_driver_rating'])->name('get_driver_rating');
Route::get('get_all_trip_of_driver', [App\Http\Controllers\API\Admin\BookingAPIController::class, 'get_all_trip_of_driver'])->name('get_all_trip_of_driver');
Route::get('get_on_going_trip', [App\Http\Controllers\API\Admin\BookingAPIController::class, 'get_on_going_trip'])->name('get_on_going_trip');
Route::get('get_up_coming_trip', [App\Http\Controllers\API\Admin\BookingAPIController::class, 'get_up_coming_trip'])->name('get_up_coming_trip');
Route::get('get_live_booking',[App\Http\Controllers\API\Admin\BookingAPIController::class,'get_live_booking'])->name('get_live_booking');
Route::get('get_advance_booking_list',[App\Http\Controllers\API\Admin\BookingAPIController::class,'get_advance_booking_list'])->name('get_advance_booking_list');
Route::get('trip_detail/{id}',[App\Http\Controllers\API\Admin\BookingAPIController::class,'trip_detail'])->name('trip_detail');
Route::post('cancel_trip/{id}', [App\Http\Controllers\API\Admin\BookingAPIController::class, 'cancel_trip'])->name('cancel_trip');
Route::get('get_cancel_trip ',[App\Http\Controllers\API\Admin\BookingAPIController::class,'get_cancel_trip'])->name('get_cancel_trip');
Route::post('upload_picture_befor_start_trip/{id}', [App\Http\Controllers\API\Admin\BookingAPIController::class, 'upload_picture_befor_start_trip'])->name('upload_picture_befor_start_trip');
Route::post('upload_picture_befor_end_trip/{id}',[App\Http\Controllers\API\Admin\BookingAPIController::class,'upload_picture_befor_end_trip'])->name('upload_picture_befor_end_trip');
Route::get('diver_out_of_station_data_list', [App\Http\Controllers\API\Admin\DriversAPIController::class, 'diver_out_of_station_data_list'])->name('diver-out-of-station-data-list');
Route::post('driver_current_location', [App\Http\Controllers\API\Admin\DriversAPIController::class, 'driver_current_location'])->name('driver_current_location');
Route::get('driver_notification_list', [App\Http\Controllers\API\Admin\DriversAPIController::class, 'driver_notification_list'])->name('driver_notification_list');
Route::get('driver_notification_seen', [App\Http\Controllers\API\Admin\DriversAPIController::class, 'driver_notification_seen'])->name('driver_notification_seen');
Route::post('driver_extend_profile_update', [App\Http\Controllers\API\Admin\DriversAPIController::class, 'driver_extend_profile_update'])->name('driver_extend_profile_update');


//Route::post('daily_report',[App\Http\Controllers\API\Admin\DailyReportingController::class,'daily_report'])->name('daily_report');
Route::post('check_in_check_out',[App\Http\Controllers\API\Admin\DailyReportingController::class,'check_in_check_out'])->name('check_in_check_out');
Route::post('add_fuel_detail',[App\Http\Controllers\API\Admin\DailyReportingController::class,'add_fuel_detail'])->name('add_fuel_detail');
Route::get('get_fuel_detail',[App\Http\Controllers\API\Admin\DailyReportingController::class,'get_fuel_detail'])->name('get_fuel_detail');
Route::post('submit_leave',[App\Http\Controllers\API\Admin\DailyReportingController::class,'submit_leave'])->name('submit_leave');
Route::get('get_leave_detail',[App\Http\Controllers\API\Admin\DailyReportingController::class,'get_leave_detail'])->name('get_leave_detail');
Route::post('add_salary_api/{id}', [App\Http\Controllers\API\Admin\DailyReportingController::class, 'add_salary'])->name('add-salary-api');
Route::get('get_salary_api',[App\Http\Controllers\API\Admin\DailyReportingController::class,'get_salary_api'])->name('get_salary_api');
Route::get('get_daily_report',[App\Http\Controllers\API\Admin\DailyReportingController::class,'get_daily_report'])->name('get_daily_report');
Route::get('get_allocated_customer_detail_and_car_detail',[App\Http\Controllers\API\Admin\DailyReportingController::class,'get_allocated_customer_detail_and_car_detail'])->name('get_allocated_customer_detail_and_car_detail');
Route::get('get_count_reffer', [App\Http\Controllers\API\Admin\DailyReportingController::class, 'count_reffer'])->name('get-count-reffer');
Route::get('driver_rating_api', [App\Http\Controllers\API\Admin\DailyReportingController::class, 'rating_api'])->name('driver-rating-api');
Route::post('confirm_advance_trip_booking/{id}', [App\Http\Controllers\API\Admin\BookingAPIController::class, 'confirm_advance_trip_booking'])->name('confirm-advance-trip-booking');
Route::post('confirm_live_trip_booking/{id}', [App\Http\Controllers\API\Admin\BookingAPIController::class, 'confirm_live_trip_booking'])->name('confirm-live-trip-booking');
Route::post('start_advance_trip_booking/{id}', [App\Http\Controllers\API\Admin\BookingAPIController::class, 'start_advance_trip_booking'])->name('start-advance-trip-booking');
Route::post('completed_advance_trip_booking/{id}', [App\Http\Controllers\API\Admin\BookingAPIController::class, 'completed_advance_trip_booking'])->name('completed-advance-trip-booking');
Route::post('customer_confirm_advance_trip_booking/{id}', [App\Http\Controllers\API\Admin\BookingAPIController::class, 'customer_confirm_advance_trip_booking'])->name('customer-confirm-advance-trip-booking');
Route::get('driver_filters_in_all_trip_apis', [App\Http\Controllers\API\Admin\DriversAPIController::class, 'driver_filters_in_all_trip_apis'])->name('driver_filters_in_all_trip_apis');
Route::get('driver_my_trip', [App\Http\Controllers\API\Admin\DriversAPIController::class, 'driver_trip'])->name('driver-my-trip');
/*Pending API*/
Route::get('get_otp',[App\Http\Controllers\API\Admin\DriversAPIController::class,'get_otp'])->name('get_otp');
Route::get('resend_otp',[App\Http\Controllers\API\Admin\DriversAPIController::class,'resend_otp'])->name('resend-otp');
Route::post('match_otp',[App\Http\Controllers\API\Admin\DriversAPIController::class,'match_otp'])->name('match_otp');

Route::get('get_city', [App\Http\Controllers\API\Admin\DriversAPIController::class, 'get_by_state'])->name('citys_ajax');
Route::get('get_states', [App\Http\Controllers\API\Admin\DriversAPIController::class, 'get_all_state'])->name('get_states');

Route::post('temporary_pickUp_drop_toggle_api', [App\Http\Controllers\API\Admin\DriversAPIController::class, 'temporary_pickUp_drop_toggle'])->name('temporary-pickUp-drop-toggle-api');


/*Customer Completed API*/
Route::post('customer_create',[App\Http\Controllers\API\Admin\CustomerAPIController::class,'customer_create'])->name('customer_create');
Route::post('leave_approve_cancel/{id}',[App\Http\Controllers\API\Admin\CustomerAPIController::class,'leave_approve_cancel'])->name('leave_approve_cancel');
Route::post('customer_login',[App\Http\Controllers\API\Admin\CustomerAPIController::class,'customer_login'])->name('customer_login');
Route::post('customer_match_otp', [App\Http\Controllers\API\Admin\CustomerAPIController::class, 'customer_match_otp'])->name('customer_match_otp');
Route::get('customer_get',[App\Http\Controllers\API\Admin\CustomerAPIController::class,'customer_get'])->name('customer_get');
Route::post('customer_profile_update',[App\Http\Controllers\API\Admin\CustomerAPIController::class,'customer_profile_update'])->name('customer_profile_update');
Route::post('customer_update_online_offline', [App\Http\Controllers\API\Admin\CustomerAPIController::class, 'online_offline'])->name('customer-update-online-offline');
Route::post('customer_refral_code_match ',[App\Http\Controllers\API\Admin\CustomerAPIController::class,'customer_refral_code_match'])->name('customer_refral_code_match');
Route::post('customer_logout',[App\Http\Controllers\API\Admin\CustomerAPIController::class,'customer_logout'])->name('customer_logout');
Route::post('add_car_detail',[App\Http\Controllers\API\Admin\CustomerAPIController::class,'add_car_detail'])->name('add_car_detail');
Route::get('get_car_detail',[App\Http\Controllers\API\Admin\CustomerAPIController::class,'get_car_detail'])->name('get_car_detail');
Route::post('delete_car_detail/{id}',[App\Http\Controllers\API\Admin\CustomerAPIController::class,'delete_car_detail'])->name('delete_car_detail');
Route::post('permanent_driver_request',[App\Http\Controllers\API\Admin\CustomerAPIController::class,'permanent_driver_request'])->name('permanent_driver_request');
Route::post('valet_driver_request', [App\Http\Controllers\API\Admin\CustomerAPIController::class, 'valet_driver_request'])->name('valet-driver-request');
Route::post('event_valet_driver_request', [App\Http\Controllers\API\Admin\CustomerAPIController::class, 'event_valet_driver_request'])->name('event-valet-driver-request');

Route::post('add_car_wash_details/{id}', [App\Http\Controllers\API\Admin\CustomerAPIController::class, 'add_car_wash'])->name('add-car-wash-details');
Route::post('driver_car_wash_details', [App\Http\Controllers\API\Admin\DriversAPIController::class, 'driver_car_wash'])->name('driver-car-wash-details');
Route::get('get_car_wash_details/{id}', [App\Http\Controllers\API\Admin\CustomerAPIController::class, 'get_car_wash'])->name('get-car-wash-details');
Route::get('get_driver_car_wash_details', [App\Http\Controllers\API\Admin\DriversAPIController::class, 'get_driver_car_wash'])->name('get-driver-car-wash-details');
Route::post('change_car_wash_status/{id}', [App\Http\Controllers\API\Admin\DriversAPIController::class, 'change_car_wash_status'])->name('change-car-wash-status');

Route::get('customer_home_api', [App\Http\Controllers\API\Admin\CustomerAPIController::class, 'customer_home_api'])->name('customer_home_api');
Route::get('customer_notification_list', [App\Http\Controllers\API\Admin\CustomerAPIController::class, 'customer_notification_list'])->name('customer_notification_list');
Route::get('customer_notification_seen', [App\Http\Controllers\API\Admin\CustomerAPIController::class, 'customer_notification_seen'])->name('customer_notification_seen');

//Route::get('get_car',[App\Http\Controllers\API\Admin\CustomerAPIController::class,'get_all_car'])->name('get-car');


Route::get('customer_count_reffer', [App\Http\Controllers\API\Admin\CustomerAPIController::class, 'customer_count_reffer'])->name('customer-count-reffer');
Route::get('live_booking_assign_driver', [App\Http\Controllers\API\Admin\CustomerAPIController::class, 'live_booking_assign_driver'])->name('live-booking-assign-driver');


Route::get('get_allocated_driver_list',[App\Http\Controllers\API\Admin\CustomerAPIController::class,'get_allocated_driver_list'])->name('get_allocated_driver_list');
Route::get('get_daily_reporting_data/{id}',[App\Http\Controllers\API\Admin\CustomerAPIController::class,'get_daily_reporting_data'])->name('get_daily_reporting_data');
Route::get('customer_assign_driver_car_details/{id}', [App\Http\Controllers\API\Admin\CustomerAPIController::class, 'assign_driver_car_details'])->name('customer-assign-driver-car-details');
Route::post('add_out_of_station_detail',[App\Http\Controllers\API\Admin\CustomerAPIController::class,'add_out_of_station_detail'])->name('add_out_of_station_detail');
Route::post('customer_cancel_trip/{id}', [App\Http\Controllers\API\Admin\CustomerAPIController::class, 'customer_cancel_trip'])->name('customer_cancel_trip');
Route::get('get_allocated_driver_detail/{id}',[App\Http\Controllers\API\Admin\CustomerAPIController::class,'get_allocated_driver_detail'])->name('get_allocated_driver_detail');
Route::get('get_driver_fuel_detail/{id}',[App\Http\Controllers\API\Admin\CustomerAPIController::class,'get_driver_fuel_detail'])->name('get_driver_fuel_detail');
//Route::get('get_driver_fuel_detail/{id}',[App\Http\Controllers\API\Admin\CustomerAPIController::class,'get_driver_fuel_detail'])->name('get_driver_fuel_detail');
Route::get('get_payment_detail/{id}',[App\Http\Controllers\API\Admin\CustomerAPIController::class,'get_payment_detail'])->name('get_payment_detail');
Route::get('get_driver_leave_detail/{id}',[App\Http\Controllers\API\Admin\CustomerAPIController::class,'get_driver_leave_detail'])->name('get_driver_leave_detail');
Route::get('get_upcoming_trip', [App\Http\Controllers\API\Admin\CustomerAPIController::class, 'get_upcoming_trip'])->name('get_upcoming_trip');
Route::get('customer_filters_in_all_trip_apis', [App\Http\Controllers\API\Admin\CustomerAPIController::class, 'customer_filters_in_all_trip_apis'])->name('customer_filters_in_all_trip_apis');
Route::get('customer_my_trip', [App\Http\Controllers\API\Admin\CustomerAPIController::class, 'my_trip'])->name('customer-my-trip');
Route::post('add_customer_address_api', [App\Http\Controllers\API\Admin\CustomerAPIController::class, 'add_customer_address'])->name('add-customer-address-api');
Route::get('get_customer_address_api', [App\Http\Controllers\API\Admin\CustomerAPIController::class, 'get_customer_address'])->name('get-customer-address-api');

Route::get('get_valet_driver_list_api', [App\Http\Controllers\API\Admin\CustomerAPIController::class, 'get_valet_driver_list'])->name('get-valet-driver-list-api');
Route::get('get_near_by_drive_api', [App\Http\Controllers\API\Admin\CustomerAPIController::class, 'get_near_by_drive_api'])->name('get-near-by-drive_api');


/*Live Booking APIs*/
Route::post('live_booking_in_city_pickup_drop',[App\Http\Controllers\API\Admin\BookingAPIController::class,'live_booking_in_city_pickup_drop'])->name('live_booking_in_city_pickup_drop');
Route::post('live_booking_out_city_pickup_drop',[App\Http\Controllers\API\Admin\BookingAPIController::class,'live_booking_out_city_pickup_drop'])->name('live_booking_out_city_pickup_drop');
Route::post('live_booking_in_city_temporary',[App\Http\Controllers\API\Admin\BookingAPIController::class,'live_booking_in_city_temporary'])->name('live_booking_in_city_temporary');
Route::post('live_booking_out_city_temporary',[App\Http\Controllers\API\Admin\BookingAPIController::class,'live_booking_out_city_temporary'])->name('live_booking_out_city_temporary');

/*Advance Booking APIs*/
Route::post('advance_booking_in_city_pickup_drop',[App\Http\Controllers\API\Admin\BookingAPIController::class,'advance_booking_in_city_pickup_drop'])->name('advance_booking_in_city_pickup_drop');
Route::post('advance_booking_out_city_pickup_drop',[App\Http\Controllers\API\Admin\BookingAPIController::class,'advance_booking_out_city_pickup_drop'])->name('advance_booking_out_city_pickup_drop');
Route::post('advance_booking_in_city_temporary',[App\Http\Controllers\API\Admin\BookingAPIController::class,'advance_booking_in_city_temporary'])->name('advance_booking_in_city_temporary');
Route::post('advance_booking_out_city_temporary',[App\Http\Controllers\API\Admin\BookingAPIController::class,'advance_booking_out_city_temporary'])->name('advance_booking_out_city_temporary');


Route::post('advance_booking', [App\Http\Controllers\API\Admin\BookingAPIController::class, 'advance_booking'])->name('advance-booking');
Route::post('live_booking', [App\Http\Controllers\API\Admin\BookingAPIController::class, 'live_booking'])->name('live-booking');
Route::post('file_upload/', [App\Http\Controllers\API\Admin\UserRatingAPIController::class, 'file_upload'])->name('file_upload');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'fundoo'], function () {
    Route::resource('settings', App\Http\Controllers\API\Fundoo_\SettingsAPIController::class);
});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('pages', App\Http\Controllers\API\Admin\PagesAPIController::class);
});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('states', App\Http\Controllers\API\Admin\StateAPIController::class);
});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('cities', App\Http\Controllers\API\Admin\CityAPIController::class);
});


Route::group(['prefix' => 'admin'], function () {
    Route::resource('carcompanies', App\Http\Controllers\API\Admin\CarcompanyAPIController::class);
});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('carmodels', App\Http\Controllers\API\Admin\CarmodelAPIController::class);
});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('caryears', App\Http\Controllers\API\Admin\CaryearAPIController::class);
});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('offercodes', App\Http\Controllers\API\Admin\OffercodeAPIController::class);
});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('staticdatas', App\Http\Controllers\API\Admin\StaticdataAPIController::class);
});
