<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('clear_cache', function () {

    \Artisan::call('optimize:clear');
    return redirect()->route('home')->with("success", "Cache is cleared");
    // dd("Cache is cleared");

});

Route::get('storage_link', function () {

    \Illuminate\Support\Facades\Artisan::call('storage:link');
    dd("Storage Link");

});

Route::get('/', function () {
    return view('front.index');
})->name('index');

Route::get('notification', [App\Http\Controllers\Admin\NotificationController::class, 'notification'])->name('notification');
Route::post('/save-token', [App\Http\Controllers\Admin\NotificationController::class, 'saveToken'])->name('save-token');
Route::post('/send-notification', [App\Http\Controllers\Admin\NotificationController::class, 'sendNotification'])->name('send-notification');

Auth::routes();

Route::get('/get_city_state_name', [App\Http\Controllers\HomeController::class, 'get_city_state_name'])->name('get_city_state_name');
Route::get('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'profile'])->name('profile');
Route::post('/update_profile', [App\Http\Controllers\Admin\ProfileController::class, 'update_profile'])->name('update_profile');
Route::post('/change_password', [App\Http\Controllers\Admin\ProfileController::class, 'change_password'])->name('change_password');
Route::get('/get_status', [App\Http\Controllers\HomeController::class, 'get_status'])->name('get_status');
Route::get('/leave/{id}', [App\Http\Controllers\Admin\DriversController::class, 'leave'])->name('leave');
Route::get('/salary/{id}', [App\Http\Controllers\Admin\DriversController::class, 'salary'])->name('salary');
Route::get('/trips/{id}', [App\Http\Controllers\Admin\DriversController::class, 'trips'])->name('trips');
Route::get('/fuel/{id}', [App\Http\Controllers\Admin\DriversController::class, 'fuel'])->name('fuel');
Route::get('/customer-trips/{id}', [App\Http\Controllers\Admin\CustomerExtendController::class, 'customer_trips'])->name('customer_trips');
Route::get('/customer-myrefer/{id}', [App\Http\Controllers\Admin\CustomerExtendController::class, 'customer_myrefer'])->name('customer-myrefer');
Route::get('/live-booking', [App\Http\Controllers\Admin\TripController::class, 'live_booking'])->name('live-booking');
//Route::get('/load_more', [App\Http\Controllers\Admin\TripController::class, 'loadmore'])->name('load_more');
Route::get('/on-trip-customer-filter', [App\Http\Controllers\Admin\CustomerExtendController::class, 'on_trip_customer_filter'])->name('on-trip-customer-filter');
Route::get('/customer-search', [App\Http\Controllers\Admin\CustomerExtendController::class, 'customer_search'])->name('customer-search');
Route::get('/payslip', [App\Http\Controllers\Admin\DriversController::class, 'payslip'])->name('payslip');
Route::post('/verify/{id}', [App\Http\Controllers\Admin\KYCController::class, 'verify'])->name('verify');
Route::post('/un_verify/{id}', [App\Http\Controllers\Admin\KYCController::class, 'un_verify'])->name('un_verify');


Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('io_generator_builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate')->name('io_field_template');

Route::get('relation_field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@relationFieldTemplate')->name('io_relation_field_template');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate')->name('io_generator_builder_generate');

Route::post('generator_builder/rollback', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@rollback')->name('io_generator_builder_rollback');

Route::post(
    'generator_builder/generate-from-file',
    '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generateFromFile'
)->name('io_generator_builder_generate_from_file');



Route::group(['prefix' => 'admin','middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/driver-dashboard', [App\Http\Controllers\Admin\DriversController::class, 'driver_dashboard'])->name('driver-dashboard');
    Route::get('/customer-dashboard', [App\Http\Controllers\Admin\CustomerExtendController::class, 'customer_dashboard'])->name('customer-dashboard');
    Route::get('/trips-dashboard', [App\Http\Controllers\Admin\TripController::class, 'trips_dashboard'])->name('trips-dashboard');
    Route::get('/assign-permanent-driver', [App\Http\Controllers\Admin\TripController::class, 'permanent_driver'])->name('assign-permanent-driver');
    Route::get('/assign-valet-parking-driver', [App\Http\Controllers\Admin\TripController::class, 'valet_parking_driver'])->name('assign-valet-parking-driver');


    Route::resource('settings', App\Http\Controllers\Admin\SettingController::class, ["as" => 'admin']);
    Route::resource('slider', App\Http\Controllers\Admin\SettingController::class, ["as" => 'admin']);
    Route::any('pages',  [App\Http\Controllers\Admin\PagesController::class, 'index'])->name('pages.index');
    Route::resource('pages', App\Http\Controllers\Admin\PagesController::class, ["as" => 'admin']);
    Route::any('driver',  [App\Http\Controllers\Admin\DriversController::class, 'index'])->name('total_drivers.index');
    Route::resource('total_drivers', App\Http\Controllers\Admin\DriversController::class, ["as" => 'admin']);
    Route::resource('states', App\Http\Controllers\Admin\StateController::class, ["as" => 'admin']);
    Route::resource('cities', App\Http\Controllers\Admin\CityController::class, ["as" => 'admin']);
    Route::resource('carcompanies', App\Http\Controllers\Admin\CarcompanyController::class, ["as" => 'admin']);
    Route::resource('carmodels', App\Http\Controllers\Admin\CarmodelController::class, ["as" => 'admin']);
    Route::resource('caryears', App\Http\Controllers\Admin\CaryearController::class, ["as" => 'admin']);
    Route::resource('offercodes', App\Http\Controllers\Admin\OffercodeController::class, ["as" => 'admin']);
    Route::resource('staticdatas', App\Http\Controllers\Admin\StaticdataController::class, ["as" => 'admin']);
    Route::resource('driverExtendeds', App\Http\Controllers\Admin\DriverExtendedController::class, ["as" => 'admin']);
    Route::resource('driverCategories', App\Http\Controllers\Admin\DriverCategoryController::class, ["as" => 'admin']);
    Route::resource('customerExtends', App\Http\Controllers\Admin\CustomerExtendController::class, ["as" => 'admin']);
    Route::resource('customerCarDetails', App\Http\Controllers\Admin\CustomerCarDetailController::class, ["as" => 'admin']);
    Route::resource('permanentInquiries', App\Http\Controllers\Admin\PermanentInquiryController::class, ["as" => 'admin']);
    Route::resource('permanent-driver', App\Http\Controllers\Admin\Permanent_DriverController::class, ["as" => 'admin']);
    Route::resource('temporary-driver', App\Http\Controllers\Admin\Temporary_DriverController::class, ["as" => 'admin']);
    Route::resource('pickUp-drop-driver', App\Http\Controllers\Admin\PickUp_Drop_DriverController::class, ["as" => 'admin']);
    Route::resource('valet-driver', App\Http\Controllers\Admin\Valet_DriverController::class, ["as" => 'admin']);
    Route::resource('assignDrivers', App\Http\Controllers\Admin\AssignDriverController::class, ["as" => 'admin']);
    Route::resource('dailyReportings', App\Http\Controllers\Admin\DailyReportingController::class, ["as" => 'admin']);
    Route::resource('salaries', App\Http\Controllers\Admin\SalaryController::class, ["as" => 'admin']);
    Route::resource('leaveDetails', App\Http\Controllers\Admin\leave_detailController::class, ["as" => 'admin']);
    Route::resource('fuelDetails', App\Http\Controllers\Admin\FuelDetailController::class, ["as" => 'admin']);
    Route::resource('faq', App\Http\Controllers\Admin\FaqController::class, ["as" => 'admin']);
    Route::resource('outOFStatoindetails', App\Http\Controllers\Admin\OutOFStatoindetailController::class, ["as" => 'admin']);
    Route::resource('help-line', App\Http\Controllers\Admin\HelpLineController::class, ["as" => 'admin']);
    Route::resource('kyc-customer',App\Http\Controllers\Admin\KYCController::class,["as" => 'admin']);
    Route::get('trip/dashboard', [App\Http\Controllers\Admin\TripController::class, 'index'])->name('dashboard');
    Route::get('on-trip-customer', [App\Http\Controllers\Admin\CustomerExtendController::class, 'on_trip_customer'])->name('on-trip-customer');
    Route::get('driver-allocation-list', [App\Http\Controllers\Admin\DriversController::class, 'driver_allocation_list'])->name('driver-allocation-list');
    Route::get('driver-allocation-list-type', [App\Http\Controllers\Admin\DriversController::class, 'driver_allocation_list_type'])->name('driver-allocation-list-type');
    Route::get('driver-allocation-filter', [App\Http\Controllers\Admin\DriversController::class, 'driver_allocation_filter'])->name('driver-allocation-filter');
    Route::get('trip-dashboard-filter', [App\Http\Controllers\Admin\TripController::class, 'trip_dashboard_filter'])->name('trip-dashboard-filter');
//    Route::get('driver-allocation-search',[App\Http\Controllers\Admin\DriversController::class,'driver_allocation_search'])->name('driver-allocation-search');
//    Route::get('loadmore',[App\Http\Controllers\Admin\TripController::class,'loadmore'])->name('loadmore');
    Route::get('loadmorecustomer', [App\Http\Controllers\Admin\CustomerExtendController::class, 'loadmore'])->name('loadmorecustomer');
    Route::get('resi_ads_state', [App\Http\Controllers\Admin\DriversController::class, 'resi_ads_state'])->name('resi_ads_state');
    Route::get('get_city_state', [App\Http\Controllers\Admin\DriversController::class, 'get_city_state'])->name('get_city_state');
    Route::get('profile_state', [App\Http\Controllers\Admin\ProfileController::class, 'profile_state'])->name('profile_state');
    Route::get('post_ads_state', [App\Http\Controllers\Admin\DriversController::class, 'post_ads_state'])->name('post_ads_state');
    Route::get('city_ajax', [App\Http\Controllers\Admin\CustomerExtendController::class, 'city_ajax'])->name('city_ajax');
    Route::get('show-all-notification', [App\Http\Controllers\Admin\NotificationController::class, 'show_all_notification'])->name('show-all-notification');
    Route::get('customer_show_trip/{id}', [App\Http\Controllers\Admin\CustomerExtendController::class, 'customer_show_trip'])->name('customer_show_trip');
    Route::get('permanent-inquiry', [App\Http\Controllers\HomeController::class, 'permanent_inquiry'])->name('permanent-inquiry');
    Route::get('valet-inquiry', [App\Http\Controllers\HomeController::class, 'valet_inquiry'])->name('valet-inquiry');
    Route::get('all-timeline-show', [App\Http\Controllers\Admin\CustomerExtendController::class, 'timeline_show'])->name('all-timeline-show');

    Route::get('customer-reports', [App\Http\Controllers\Admin\ReportController::class, 'customer_reports'])->name('customer-reports');
    Route::get('customer-reports-pdf', [App\Http\Controllers\Admin\ReportController::class, 'customer_reports_pdf'])->name('customer-reports-pdf');
    Route::get('driver-reports', [App\Http\Controllers\Admin\ReportController::class, 'driver_reports'])->name('driver-reports');
    Route::get('driver-reports-pdf', [App\Http\Controllers\Admin\ReportController::class, 'driver_reports_pdf'])->name('driver-reports-pdf');
    Route::get('advance-trip-reports', [App\Http\Controllers\Admin\ReportController::class, 'advance_trip_reports'])->name('advance-trip-reports');
    Route::get('advance-trip-reports-pdf', [App\Http\Controllers\Admin\ReportController::class, 'advance_trip_reports_pdf'])->name('advance-trip-reports-pdf');
});

//    get page content

Route::get('terms-conditions', [App\Http\Controllers\Admin\PagesController::class, 'get_terms_conditions'])->name('terms-and-conditions');
Route::get('privacy-policy', [App\Http\Controllers\Admin\PagesController::class, 'get_privacy_policy'])->name('privacy-policy');
Route::get('faqs', [App\Http\Controllers\Front\FrontController::class, 'get_faq'])->name('faqs');
Route::get('about', [App\Http\Controllers\Admin\PagesController::class, 'get_about'])->name('about');
Route::get('send_sms_otp', [App\Http\Controllers\Admin\CustomerExtendController::class, 'send_sms_otp'])->name('send_sms_otp');

//test firebase notification

//Route::get('send-noti-to-user', [\App\Http\Controllers\HomeController::class, 'sendNotifictionToUser']);
