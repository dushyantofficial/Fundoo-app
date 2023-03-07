<?php

namespace App\Http\Controllers;

use App\DataTables\Admin\Permanent_InquiryDatatable;
use App\DataTables\Admin\Valet_InquiryDatatable;
use App\Firebase\Firebase;
use App\Models\Admin\Booking;
use App\Models\Admin\CustomerExtend;
use App\Models\Admin\DriverExtended;
use App\Models\Admin\PermanentInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        if ($user->role == config('constants.ROLE.ADMIN')) {
            $total_customers = CustomerExtend::whereHas('users', function ($q) {

                $q->where('verify_user', 1);
            })->count();
            $total_drivers = DriverExtended::whereHas('user', function ($q) {

                $q->where('verify_user', 1);
            })->count();
            $trip = Booking::count();
            $ongoing_trip = Booking::where('status', config('constants.STATUS.On_Going'))->count();
            $completed_trip = Booking::where('status', config('constants.STATUS.Completed'))->count();
            $canceled_trip = Booking::where('status', config('constants.STATUS.Cancel'))->count();
            $permanent_booking_requests_count = PermanentInquiry::where('type', config('constants.CATEGORY.permanent'))->count();
            $valet_booking_requests_count = PermanentInquiry::where('type', config('constants.CATEGORY.valet_parking'))->count();

            $permanent_booking_requests = PermanentInquiry::where('type', config('constants.CATEGORY.permanent'))
                ->where('status', config('constants.STATUS.Pending'))->orderBy('id', 'DESC')->get();

            $valet_booking_requests = PermanentInquiry::where('type', config('constants.CATEGORY.valet_parking'))->where('status', config('constants.STATUS.Pending'))->orderBy('id', 'DESC')->get();

            $permanent_bookings = PermanentInquiry::where('type', config('constants.CATEGORY.permanent'))->where('status', config('constants.STATUS.Completed'))->count();
            $valet_bookings = PermanentInquiry::where('type', config('constants.CATEGORY.valet_parking'))->where('status', config('constants.STATUS.Completed'))->count();
            return view('home', compact('total_customers', 'total_drivers', 'trip', 'ongoing_trip', 'completed_trip',
                'canceled_trip', 'permanent_booking_requests', 'valet_booking_requests', 'permanent_bookings', 'valet_bookings',
                'permanent_booking_requests_count', 'valet_booking_requests_count'));
        }else{
            return redirect()->route('index')->with('danger','Denied Access!...');
        }
    }

    public function get_city_state_name(Request $request)
    {
        $request->pincode;
        $pincode = $request['pincode'];
        $data = file_get_contents('http://postalpincode.in/api/pincode/' . $pincode);
        $data = json_decode($data);
        if (isset($data->PostOffice['0'])) {
            $arr['city'] = $data->PostOffice['0']->Taluk;
            $arr['state'] = $data->PostOffice['0']->State;
            echo json_encode($arr);
        } else {
            echo 'no';
        }
    }

//    public function permanent_inquiry(){
//        return view('admin.inquiry.permanent_inquiry');
//    }

    public function permanent_inquiry(Permanent_InquiryDatatable $permanent_InquiryDatatable)
    {
        return $permanent_InquiryDatatable->render('admin.inquiry.permanent_index');
    }

    public function valet_inquiry(Valet_InquiryDatatable $valet_InquiryDatatable)
    {
        return $valet_InquiryDatatable->render('admin.inquiry.valet_index');
    }

//    public function valet_inquiry(){
//        return view('admin.inquiry.valet_inquiry');
//    }
//    public function sendNotifictionToUser()
//    {
//        $data['user_id'] = 1;
//        $data['title'] = "Welcome";
//        $data['type'] = 'Customer';
//        $data['type_id'] = null;
//        $data['msg'] ='Thank you for regitred in zroop drive app !';
//        Firebase::send_push_notification($data);
//    }


}
