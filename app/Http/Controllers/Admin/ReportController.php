<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Booking;
use App\Models\Admin\CustomerExtend;
use App\Models\Admin\DriverExtended;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function customer_reports(Request $request)
    {
        $customers = CustomerExtend::whereHas('users', function ($q) {
            $q->where('verify_user', 1);
        })->paginate(10)->appends(request()->query());

        if ($request->date) {
            $date = $request->date;
            $name = explode(' ', $date);
            $start = date('Y-m-d', strtotime($name[0]));
            $end = date('Y-m-d', strtotime($name[2]));
            $customers = CustomerExtend::whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->whereHas('users', function ($q) {
                    $q->where('verify_user', 1);
                })->paginate(10)->appends(request()->query());
        }
        return view('admin.reports.customer_report', compact('customers'));
    }

    public function driver_reports(Request $request)
    {
        $drivers = DriverExtended::whereHas('user', function ($q) {
            $q->where('verify_user', 1);
        })->paginate(10)->appends(request()->query());
        if ($request->date) {
            $date = $request->date;
            $name = explode(' ', $date);
            $start = date('Y-m-d', strtotime($name[0]));
            $end = date('Y-m-d', strtotime($name[2]));
            $drivers = DriverExtended::whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->whereHas('user', function ($q) {
                    $q->where('verify_user', 1);
                })->paginate(10)->appends(request()->query());
        }
        if ($request->work_type) {
            $drivers = DriverExtended::where('work_type', $request->work_type)
                ->whereHas('user', function ($q) {
                    $q->where('verify_user', 1);
                })->paginate(10)->appends(request()->query());
        }
        if ($request->date && $request->work_type) {
            $date = $request->date;
            $name = explode(' ', $date);
            $start = date('Y-m-d', strtotime($name[0]));
            $end = date('Y-m-d', strtotime($name[2]));
            $drivers = DriverExtended::whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->where('work_type', $request->work_type)
                ->whereHas('user', function ($q) {
                    $q->where('verify_user', 1);
                })->paginate(10)->appends(request()->query());
        }
        return view('admin.reports.driver_report', compact('drivers'));
    }

    public function advance_trip_reports(Request $request)
    {
        $advance_trips = Booking::where('live_or_advance', config('constants.BOOKING_TYPE.advance_booking'))
            ->paginate(10)->appends(request()->query());
        if ($request->date) {
            $date = $request->date;
            $name = explode(' ', $date);
            $start = date('Y-m-d', strtotime($name[0]));
            $end = date('Y-m-d', strtotime($name[2]));
            $advance_trips = Booking::whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)->paginate(10)->appends(request()->query());
        }
        if ($request->in_city_or_out_city) {
            $advance_trips = Booking::where('incity_or_out_city', $request->in_city_or_out_city)
                ->paginate(10)->appends(request()->query());
        }
        if ($request->pickup_or_temporary) {
            $advance_trips = Booking::where('pickup_drop_or_temp', $request->pickup_or_temporary)
                ->paginate(10)->appends(request()->query());
        }

        if ($request->status) {
            $advance_trips = Booking::where('status', $request->status)
                ->paginate(10)->appends(request()->query());
        }

        if ($request->date && $request->in_city_or_out_city && $request->pickup_or_temporary && $request->status) {
            $date = $request->date;
            $name = explode(' ', $date);
            $start = date('Y-m-d', strtotime($name[0]));
            $end = date('Y-m-d', strtotime($name[2]));
            $advance_trips = Booking::whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->where('incity_or_out_city', $request->in_city_or_out_city)
                ->where('pickup_drop_or_temp', $request->pickup_or_temporary)
                ->where('status', $request->status)
                ->paginate(10)->appends(request()->query());
        }
        return view('admin.reports.advance_trip_report', compact('advance_trips'));
    }

    public function customer_reports_pdf(Request $request)
    {
        $customers = CustomerExtend::whereHas('users', function ($q) {
            $q->where('verify_user', 1);
        })->get();

        if ($request->date) {

            $date = $request->date;
            $name = explode(' ', $date);
            $start = date('Y-m-d', strtotime($name[0]));
            $end = date('Y-m-d', strtotime($name[2]));
            $customers = CustomerExtend::whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->whereHas('users', function ($q) {
                    $q->where('verify_user', 1);
                })->get();
        }

        $customPaper = array(0, 0, 650.00, 900.80);
        $pdf = PDF::loadView('admin.reports.customer_report_pdf', compact('customers'))->setPaper($customPaper);
        if (isset($start)) {
            return $pdf->download($start . '_to_' . $end . '_' . 'customer_report.pdf');
        } else {
            return $pdf->download('all_customer_report.pdf');
        }
    }

    public function driver_reports_pdf(Request $request)
    {
        $drivers = DriverExtended::whereHas('user', function ($q) {
            $q->where('verify_user', 1);
        })->get();
        if ($request->date) {
            $date = $request->date;
            $name = explode(' ', $date);
            $start = date('Y-m-d', strtotime($name[0]));
            $end = date('Y-m-d', strtotime($name[2]));
            $drivers = DriverExtended::whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->whereHas('user', function ($q) {
                    $q->where('verify_user', 1);
                })->get();
        }
        if ($request->work_type) {
            $drivers = DriverExtended::where('work_type', $request->work_type)
                ->whereHas('user', function ($q) {
                    $q->where('verify_user', 1);
                })->get();
        }
        if ($request->date && $request->work_type) {
            $date = $request->date;
            $name = explode(' ', $date);
            $start = date('Y-m-d', strtotime($name[0]));
            $end = date('Y-m-d', strtotime($name[2]));
            $drivers = DriverExtended::whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->where('work_type', $request->work_type)
                ->whereHas('user', function ($q) {
                    $q->where('verify_user', 1);
                })->get();
        }
        $customPaper = array(0, 0, 800.00, 900.80);
        $pdf = PDF::loadView('admin.reports.driver_report_pdf', compact('drivers'))->setPaper($customPaper);
        if (isset($start)) {
            return $pdf->download($start . '_to_' . $end . '_' . 'driver_report.pdf');
        } else {
            return $pdf->download('all_driver_report.pdf');
        }
    }

    public function advance_trip_reports_pdf(Request $request)
    {
        $advance_trips = Booking::where('live_or_advance', config('constants.BOOKING_TYPE.advance_booking'))
            ->get();

        if ($request->date) {
            $date = $request->date;
            $name = explode(' ', $date);
            $start = date('Y-m-d', strtotime($name[0]));
            $end = date('Y-m-d', strtotime($name[2]));
            $advance_trips = Booking::whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)->get();
        }
        if ($request->in_city_or_out_city) {
            $advance_trips = Booking::where('incity_or_out_city', $request->in_city_or_out_city)
                ->get();
        }
        if ($request->pickup_or_temporary) {
            $advance_trips = Booking::where('pickup_drop_or_temp', $request->pickup_or_temporary)
                ->get();
        }
        if ($request->status) {
            $advance_trips = Booking::where('status', $request->status)
                ->get();
        }
        if ($request->date && $request->in_city_or_out_city && $request->pickup_or_temporary && $request->status) {
            $date = $request->date;
            $name = explode(' ', $date);
            $start = date('Y-m-d', strtotime($name[0]));
            $end = date('Y-m-d', strtotime($name[2]));
            $advance_trips = Booking::whereDate('created_at', '>=', $start)
                ->whereDate('created_at', '<=', $end)
                ->where('incity_or_out_city', $request->in_city_or_out_city)
                ->where('pickup_drop_or_temp', $request->pickup_or_temporary)
                ->where('status', $request->status)
                ->get();
        }
        $customPaper = array(0, 0, 1000.00, 900.80);
        $pdf = PDF::loadView('admin.reports.advance_trip_report_pdf', compact('advance_trips'))->setPaper($customPaper);
        if (isset($start)) {
            return $pdf->download($start . '_to_' . $end . '_' . 'advance_trip_report.pdf');
        } else {
            return $pdf->download('all_advance_trip_report.pdf');
        }
    }
}
