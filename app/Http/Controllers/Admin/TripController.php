<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\Assign_Permanent_DriversDataTable;
use App\DataTables\Admin\Assign_Valet_Parking_DriverDataTable;
use App\Http\Controllers\Controller;
use App\Models\Admin\AssignDriver;
use App\Models\Admin\Booking;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index(Request $request)
    {
        $trip = Booking::count();
        $canceltrip = Booking::where('status', config('constants.STATUS.Cancel'))->count();
        $ongoingtrip = Booking::where('status', config('constants.STATUS.On_Going'))->count();
        $permanent_trips = AssignDriver::where('type', config('constants.CATEGORY.permanent'))->count();
        $valet_trips = AssignDriver::where('type', config('constants.CATEGORY.valet_parking'))->count();

//        $permanenttrip = Booking::where('status','cancel')->count();
//        $valettrip =Booking::where('status','cancel')->count();
        $livebookingtrip = Booking::where('live_or_advance', config('constants.BOOKING_TYPE.live_booking'))->count();
        $advancebookingtrip = Booking::where('live_or_advance', config('constants.BOOKING_TYPE.advance_booking'))->count();
        $pickupdroptrip = Booking::where('pickup_drop_or_temp', config('constants.BOOKING_DROP_CAR.pickup_drop'))->count();
        $incitytrip = Booking::where('incity_or_out_city', config('constants.BOOKING_CITY.In City'))->count();
        $outcitytrip = Booking::where('incity_or_out_city', config('constants.BOOKING_CITY.Out City'))->count();
        $temporarytrip = Booking::where('pickup_drop_or_temp', config('constants.BOOKING_DROP_CAR.temporary'))->count();
        $tripdetails = Booking::where('status', config('constants.STATUS.Pending'))->orderBy('created_at', 'DESC')->paginate(10)->appends(request()->query());


        if ($request->date) {
            $date = $request->date;
            $name = explode(' ', $date);
            $start = date('Y-m-d', strtotime($name[0]));
            $end = date('Y-m-d', strtotime($name[2]));
            $tripdetails = Booking::whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->where('status', config('constants.STATUS.Pending'))
                ->orderBy('created_at', 'DESC')
                ->paginate(10)->appends(request()->query());
        }

        if ($request->search) {
            $search = $request->search;

            $tripdetails = Booking::where('status', config('constants.STATUS.Pending'))
                ->whereHas('customer', function ($query1) use ($search) {
                    $query1->where('first_name', 'LIKE', '%' . $search . '%');
                })->where(function ($query) use ($search) {

                })->orWhere(function ($query) use ($search) {
                    $query->where('status', config('constants.STATUS.Pending'))
                        ->where('city', 'LIKE', "%{$search}%");
                })->orWhere(function ($query) use ($search) {
                    $query->where('status', config('constants.STATUS.Pending'))
                        ->where('pickup_drop_or_temp', 'LIKE', "%{$search}%");
                })->orWhere(function ($query) use ($search) {
                    $query->where('status', config('constants.STATUS.Pending'))
                        ->where('destination_city', 'LIKE', "%{$search}%");
                })->orWhere(function ($query) use ($search) {
                    $query->where('status', config('constants.STATUS.Pending'))
                        ->where('live_or_advance', 'LIKE', "%{$search}%");
                })->orWhere(function ($query) use ($search) {
                    $query->where('status', config('constants.STATUS.Pending'))
                        ->where('incity_or_out_city', 'LIKE', "%{$search}%");
                })
                ->orderBy('created_at', 'DESC')->paginate(10)->appends(request()->query());
        }

        return view('admin.trip.dashboard', compact('trip', 'canceltrip', 'tripdetails', 'ongoingtrip', 'livebookingtrip',
            'advancebookingtrip', 'pickupdroptrip', 'incitytrip', 'outcitytrip', 'temporarytrip', 'permanent_trips', 'valet_trips'));
    }

    public function trips_dashboard(Request $request)
    {
        $trip_details = Booking::paginate(10);
        if ($request->date) {
            $date = $request->date;
            $name = explode(' ', $date);
            $start = date('Y-m-d', strtotime($name[0]));
            $end = date('Y-m-d', strtotime($name[2]));
            $trip_details = Booking::whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)->get();
        }
        return view('admin.trip.trips_dashboard', compact('trip_details'));
    }

    public function live_booking(Request $request)
    {
        if ($request->arr && $request->page) {
            $array1 = explode(",", $request->arr);
            $array = collect($array1)->toArray();

            $trip_details = Booking::whereIn('status', $array)->orWhereIn('pickup_drop_or_temp', $array)
                ->orWhereIn('incity_or_out_city', $array)->orWhereIn('live_or_advance', $array)
                ->offset(\request('page') * 10)->limit(10)->get();

            if (count($trip_details) == 0) {
                $html = '';
            } else {
                $view = view('admin.trip.trips_dashboard_copy', compact('trip_details'));
                $html = $view->render();
            }
            return response()->json(['html' => $html, 'resultCount' => count($trip_details)]);

        } elseif ($request->page) {
            $trip_details = Booking::offset(\request('page') * 10)->limit(10)->get();

            if (count($trip_details) == 0) {
                $html = '';
            } else {
                $view = view('admin.trip.trips_dashboard_copy', compact('trip_details'));
                $html = $view->render();
            }
            return response()->json(['html' => $html, 'resultCount' => count($trip_details)]);

        } elseif ($request->arr) {

            $array = $request->arr;
            $trip_details = Booking::orWhereIn('live_or_advance', $array)
                ->orWhereIn('pickup_drop_or_temp', $array)
                ->orWhereIn('incity_or_out_city', $array)
                ->orWhereIn('status', $array)
                ->paginate(10);

        } else {
            $trip_details = Booking::paginate(10);
        }
        $return_view = view('admin.trip.trips_dashboard_copy', compact('trip_details'))->render();
        return response()->json(array('success' => true, 'html' => $return_view));
    }

//    public function loadmore(Request $request)
//    {
////        dd($request);
//        $trip_details = Booking::offset(\request('page') * 4)->limit(4)->get();
//
//        if (count($trip_details) == 0) {
//            $html = '';
//        } else {
//            $view = view('admin.trip.trips_dashboard_copy', compact('trip_details'));
//            $html = $view->render();
//        }
//
//        return response()->json(['html' => $html, 'resultCount' => count($trip_details)]);
//    }


    public function permanent_driver(Assign_Permanent_DriversDataTable $assignDriverDataTable)
    {
        return $assignDriverDataTable->render('admin.trip.assign_permanent_drivers');
    }

    public function valet_parking_driver(Assign_Valet_Parking_DriverDataTable $assignDriverDataTable)
    {
        return $assignDriverDataTable->render('admin.trip.assign_valet_drivers');
    }
}











