<?php

namespace App\Http\Controllers\admin;

use App\DataTables\Admin\OnTripDriverDataTable;
use App\Firebase\Firebase;
use App\Http\Controllers\Controller;
use App\Models\Admin\AssignDriver;
use App\Models\Admin\Booking;
use App\Models\Admin\DriverExtended;
use App\Models\Admin\FuelDetail;
use App\Models\Admin\leave_detail;
use App\Models\Admin\Notification;
use App\Models\Admin\PermanentInquiry;
use App\Models\Admin\Salary;
use App\Models\Admin\User_Rating;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DriversController extends Controller
{
    public function index(OnTripDriverDataTable $onTripDriverDataTable)
    {
        return $onTripDriverDataTable->render('admin.drivers.total_drivers.index');

    }

    public function driver_dashboard(Request $request)
    {
        $driverExtended = DriverExtended::where('user_id', $request->id)->first();
        if (empty($driverExtended)) {

            return redirect(route('admin.driverExtendeds.index'))->with('danger', 'Driver Extend not found');
        }
        $users = User::where('id', $driverExtended->user_id)->first();
        collect([$driverExtended, $users]);
        $array = array_merge($driverExtended->toArray(), $users->toArray());
//        if((Auth::user()->role == config('constants.ROLE.DRIVER')) {
//        $user_rating = Auth::user();
//            dd(number_formats(\user_rating($user_rating)));
//        }
        $trip = Booking::where('driver_id', $request->id)->count();
        $ratings = User_Rating::where('rated_to', $request->id)->get();
        $trip_details = Booking::where('driver_id', $request->id)->get();
        $salaries = Salary::where('assign_driver_id', $request->id)->get();
        $leaves = leave_detail::where('assign_driver_id', $request->id)->get();
        $fueldetails = FuelDetail::where('assign_driver_id', $request->id)->get();
        $total_salaries = Salary::where('assign_driver_id', $request->id)->sum('amount');
        $halfleaves = leave_detail::where('leave_type', 'Half Leave')->where('assign_driver_id', $request->id)->count();
        $fullleaves = leave_detail::where('leave_type', 'Full Leave')->where('assign_driver_id', $request->id)->count();
        $canceled_trip = Booking::where('status', config('constants.STATUS.Cancel'))->where('driver_id', $request->id)->count();
        $current_month_salaries = Salary::where('assign_driver_id', $request->id)->whereMonth('date', Carbon::now()->month)->first();
        $ongoing_trip = Booking::where('status', config('constants.STATUS.On_Going'))->where('driver_id', $request->id)->count();
        $incity_trip = Booking::where('incity_or_out_city', config('constants.BOOKING_CITY.In City'))->where('driver_id', $request->id)->count();
        $outcity_trip = Booking::where('incity_or_out_city', config('constants.BOOKING_CITY.Out City'))->where('driver_id', $request->id)->count();
        $livebooking_trip = Booking::where('live_or_advance', config('constants.BOOKING_TYPE.live_booking'))->where('driver_id', $request->id)->count();
        $temporary_trip = Booking::where('pickup_drop_or_temp', config('constants.BOOKING_DROP_CAR.temporary'))->where('driver_id', $request->id)->count();
        $advancebook_trip = Booking::where('live_or_advance', config('constants.BOOKING_TYPE.advance_booking'))->where('driver_id', $request->id)->count();
        $pickup_drop_trip = Booking::where('pickup_drop_or_temp', config('constants.BOOKING_DROP_CAR.pickup_drop'))->where('driver_id', $request->id)->count();

        $reffers = User::where('reffer_by', $request->id)->count();
        $booking = Booking::where('status', config('constants.STATUS.Completed'))->whereHas('driver', function ($query) use ($request) {
            $query->where('reffer_by', $request->id);
        });
        $completed_trip_refer_amount = $booking->sum('reffer_amount');
        $refer_users = $booking->get();

        $notification = Notification::where('id', $request->id)->first();
//      dd($notification);

        $hirecustomercount = AssignDriver::where('driver_id', $request->id)->count();

        $hirecustomerDriver = AssignDriver::where('driver_id', $request->id)->first();

        return view('admin.drivers.dashboard', compact('array', 'driverExtended', 'users', 'trip', 'ratings',
            'salaries', 'leaves', 'fueldetails', 'total_salaries', 'canceled_trip', 'ongoing_trip', 'incity_trip',
            'outcity_trip', 'temporary_trip', 'trip_details', 'halfleaves', 'fullleaves', 'livebooking_trip', 'advancebook_trip',
            'pickup_drop_trip', 'current_month_salaries', 'reffers', 'completed_trip_refer_amount', 'refer_users',
            'hirecustomercount', 'hirecustomerDriver'
        ));
    }

    public function leave(Request $request, $id)
    {

        $leaves = leave_detail::where('assign_driver_id', $id)->get();
        return \DataTables::of($leaves)
            ->addColumn('actions', function ($row) {
                $btn = '<button type="button" data-toggle="modal" data-target="#leave' . $row->id . '"
                        class="btn btn-default"><i class="fas fa-eye"></i></button>';
                return $btn;
            })
            ->addColumn('status', function ($row) {
                if ($row->status == config('constants.STATUS.Pending')) {
                    return '<span class="badge badge-warning">Pending</span>';
                } elseif ($row->status == config('constants.STATUS.Approve')) {
                    return '<span class="badge badge-success">Approve</span>';
                } elseif ($row->status == config('constants.STATUS.Cancel')) {
                    return '<span class="badge badge-danger">Cancel</span>';
                }

            })
            ->addColumn('days', function ($row) {

                $last_date = $row->to_date;
                $current_date = $row->from_date;
                $start_date = Carbon::createFromFormat('Y-m-d H:i:s', $last_date);
                $end_date = Carbon::createFromFormat('Y-m-d H:i:s', $current_date);
//                $different_days = $start_date->diffInDays($end_date);
                $different_days = $start_date->diff($end_date);
                $diff = $different_days->days + 1;
                return $diff . " Days";
            })
            ->addColumn('created_at', function ($row) {
                return birth_date_formate($row->created_at);
            })
            ->addColumn('Leave Date', function ($row) {
                return birth_date_formate($row->from_date) . ' - ' .
                    birth_date_formate($row->to_date);
            })
            ->rawColumns(['actions', 'status', 'Leave Date'])
            ->make(true);
    }

    public function salary(Request $request, $id)
    {

        $salaries = Salary::where('assign_driver_id', $request->id)->get();

        return \DataTables::of($salaries)
            ->addColumn('actions', function ($row) {
                if ($row->paid_unpaid == 1) {
                    $btn = '<a href="' . route("payslip") . '?id=' . $row->id . '"
                        class="btn btn-dark btn-sm" target="_blank">View Payslip</a>';

                    return $btn;
                }
            })
            ->addColumn('month_year', function ($row) {
                return month_year_formate($row->date);
            })
            ->addColumn('status', function ($row) {
                if ($row->paid_unpaid == 0) {
                    return '<span class="badge badge-warning">Unpaid</span>';
                } else {
                    return '<span class="badge badge-success">Paid</span>';
                }
            })
            ->addColumn('amount', function ($row) {
                return get_rupee_currency($row->amount);
            })
            ->addColumn('date', function ($row) {
                return birth_date_formate($row->date);
            })
            ->rawColumns(['actions', 'amount', 'date', 'month_year', 'status'])
            ->make(true);
    }

    public function trips(Request $request, $id)
    {

        $trip_details = Booking::where('driver_id', $request->id)->get();
        return \DataTables::of($trip_details)
            ->addColumn('actions', function ($data) {
//                return '<a href='.\URL::route('users.edit', $data->id).' class="btn btn-success btn-sm">Edit</a>
//                    <a href='.\URL::route('users.show', $data->id).' class="btn btn-info btn-sm">View</a>';
                $btn = '<a href="' . \URL::route('customer_show_trip', $data->id) . '" class="btn btn-sm btn-warning" target="_blank">Show Trip</a>';
                return $btn;
            })
            ->addColumn('status', function ($row) {
                if ($row->status == config('constants.STATUS.Pending')) {
                    return '<span class="badge badge-warning">Pending</span>';
                } elseif ($row->status == config('constants.STATUS.On_Going')) {
                    return '<span class="badge badge-info">On Going</span>';
                } elseif ($row->status == config('constants.STATUS.Completed')) {
                    return '<span class="badge badge-success">Completed</span>';
                } elseif ($row->status == config('constants.STATUS.Cancel')) {
                    return '<span class="badge badge-danger">Cancel</span>';
                }

            })
            ->addColumn('Trip Type', function ($row) {
                return $row->live_or_advance . '&nbsp; <br> &nbsp;' . $row->incity_or_out_city . '&nbsp; <br> &nbsp;' .
                    $row->pickup_drop_or_temp;
            })
            ->addColumn('customer_name', function ($row) {
                return $row->customer->first_name ?? ' - ';
            })
            ->addColumn('start_at', function ($row) {
                return $row->city ?? '-';
            })
            ->addColumn('end_at', function ($row) {
                return $row->destination_city ?? '-';
            })
            ->addColumn('start date time', function ($row) {
                $startdatetime = ($row->start_or_pickup_date) . ' ' . ($row->start_or_pickup_time);

                return date_formate($startdatetime) ?? '-';
            })
            ->addColumn('end date time', function ($row) {
                $enddatetime = ($row->end_or_drop_date) . ' ' . ($row->end_or_drop_time);
                return date_formate($enddatetime) ?? '-';
            })
            ->rawColumns(['actions', 'status', 'Trip Type', 'start_at', 'end_at', 'start date time', 'end date time', 'customer_name'])
            ->make(true);
    }

    public function fuel(Request $request, $id)
    {
        $fueldetails = FuelDetail::where('assign_driver_id', $request->id)->get();
//        dd($fueldetails);
        return \DataTables::of($fueldetails)
//            ->addColumn('vehicle', function ($row) {
//                return $row->vehicle = 'Honda City';
//            })
//            ->addColumn('vehicle_no', function ($row) {
//                return $row->vehicle_no = 'GJ 18 5689';
//            })
            ->addColumn('fuel_type', function ($row) {
                if ($row->fuel_type == 'Petrol') {
                    return '<span class="badge badge-dark">Petrol</span>';
                } elseif ($row->fuel_type == 'Diesel') {
                    return '<span class="badge badge-dark">Diesel</span>';
                }

            })
            ->addColumn('rate', function ($row) {
                return get_rupee_currency($row->rate);
            })
            ->addColumn('total_amount', function ($row) {
                return get_rupee_currency($row->total_amount);
            })
            ->addColumn('date', function ($row) {
                return birth_date_formate($row->date);
            })
            ->rawColumns(['fuel_type', 'date', 'rate', 'total_amount'])
            ->make(true);
    }

    public function driver_allocation_list(Request $request)
    {
        if (request()->id && request()->d_id) {
            $permanent_inquiry = PermanentInquiry::where('id', request()->id)->first();

            if ($permanent_inquiry->type == config('constants.CATEGORY.valet_parking')) {
                if ($permanent_inquiry->no_of_drivers == 0) {
                    return redirect()->back()->with('danger', 'Driver Assign Limit Is Over');
                }
                $input = new AssignDriver();
                $input->user_id = $permanent_inquiry->user_id;
                $input->driver_id = request()->d_id;
                $input->type = $permanent_inquiry->type;
                $input->weekly_off = $permanent_inquiry->weekly_off;
                $input->accomodation = $permanent_inquiry->accomodation;
                $input->salary = $permanent_inquiry->salary_start;
                $input->work_time_from = $permanent_inquiry->work_time_from;
                $input->work_time_to = $permanent_inquiry->work_time_to;
                $input->from_date = $permanent_inquiry->from_date;
                $input->to_date = $permanent_inquiry->to_date;

                $store_data = $input->save();

                $data['customer_id'] = $permanent_inquiry->user_id;
                $data['driver_id'] = $input->driver_id;
                $data['title'] = 'Driver Assigned';
                $data['type'] = 'Driver';
                $data['type_id'] = null;
                $customer_name = $permanent_inquiry->permanent_customer->first_name;
                $name = User::where('id',$input->driver_id)->first();
                $driver_name = $name->first_name;
                $data['msg'] = "Hello $customer_name for your requesting of driver $driver_name is assign you for a permenent driver ";

             //   \App\Notification\Notification::notify_with_push($data);
                Firebase::send_push_notification($data);
                customer_notification_store($data);

                $driver['driver_id'] = request()->d_id;
                $driver['title'] = 'Assign as Permenent';
                $driver['type'] = 'Permenent';
                $driver['type_id'] = null;
                $customer_name = $permanent_inquiry->permanent_customer->first_name;
                $name = User::where('id',$input->driver_id)->first();
                $driver_name = $name->first_name;
                $driver['msg'] = "Hello $driver_name you are assigned as a permenet driver for $customer_name enjoy your job ! ";
            //    \App\Notification\Notification::notify_with_push($driver);
                Firebase::send_push_notification_driver($driver);
                driver_notification_store($driver);

                if ($permanent_inquiry->no_of_drivers == 1) {
                    $status_update['status'] = config('constants.STATUS.Completed');
                }
                $less_driver = $permanent_inquiry->no_of_drivers;
                $status_update['no_of_drivers'] = $less_driver - 1;
                $permanent_inquiry->update($status_update);


            } else if ($permanent_inquiry->type == config('constants.CATEGORY.permanent')) {
                if ($permanent_inquiry->status == config('constants.STATUS.Completed')) {
                    return redirect()->back()->with('danger', 'Driver Assign Limit Is Over');
                }
                $input = new AssignDriver();
                $input->user_id = $permanent_inquiry->user_id;
                $input->driver_id = request()->d_id;
                $input->type = $permanent_inquiry->type;
                $input->weekly_off = $permanent_inquiry->weekly_off;
                $input->accomodation = $permanent_inquiry->accomodation;
                $input->salary = $permanent_inquiry->salary_start;
                $input->work_time_from = $permanent_inquiry->work_time_from;
                $input->work_time_to = $permanent_inquiry->work_time_to;
                $input->from_date = $permanent_inquiry->from_date;
                $input->to_date = $permanent_inquiry->to_date;
                $store_data = $input->save();

                $data['customer_id'] = $permanent_inquiry->user_id;
                $data['title'] = 'Driver Assigned';
                $data['type'] = 'Driver';
                $data['type_id'] = null;
                $customer_name = $permanent_inquiry->permanent_customer->first_name;
                $name = User::where('id',$input->driver_id)->first();
                $driver_name = $name->first_name;
                $data['msg'] = "Hello $customer_name for your requesting of driver $driver_name is assign you for a permenent driver ";

            //    \App\Notification\Notification::notify_with_push($data);
                Firebase::send_push_notification($data);
                customer_notification_store($data);

                $driver['driver_id'] = $input->driver_id;
                $driver['title'] = 'Assign as Permenent';
                $driver['type'] = 'Driver';
                $driver['type_id'] = null;
                $customer_name = $permanent_inquiry->permanent_customer->first_name;
                $name = User::where('id',$input->driver_id)->first();
                $driver_name = $name->first_name;
                $driver['msg'] = "Hello $driver_name you are assigned as a permenet driver for $customer_name enjoy your job ! ";
            //    \App\Notification\Notification::notify_with_push($driver);
                Firebase::send_push_notification_driver($driver);
                driver_notification_store($driver);

                $status_update['status'] = config('constants.STATUS.Completed');
                $permanent_inquiry->update($status_update);
            }
            return redirect()->back()->with('success', 'Driver Assign Succesfully');

        } elseif (request()->id) {

            $drivers = DriverExtended::whereIn('work_type', [config('constants.CATEGORY.permanent'), config('constants.CATEGORY.valet_parking')])
                ->doesntHave('permanent_driv')
                ->whereHas('user', function ($q) {
                    $q->where('verify_user', 1);
                    $q->where('is_doc_verified', 1);
                })
                ->paginate(10)->appends(request()->query());
            return view('admin.drivers.driver_allocation_list', compact('drivers'));

        } elseif (request()->page) {

            $drivers = DriverExtended::whereIn('work_type', [config('constants.CATEGORY.permanent'), config('constants.CATEGORY.valet_parking')])
                ->doesntHave('permanent_driv')
                ->whereHas('user', function ($q) {
                    $q->where('verify_user', 1);
                    $q->where('is_doc_verified', 1);
                })
                ->paginate(10)->appends(request()->query());
            return view('admin.drivers.driver_allocation_list', compact('drivers'));

        } else {
            if (request()->trip_id) {
                $drivers = DriverExtended::whereIn('work_type', [config('constants.CATEGORY.temporary'), config('constants.CATEGORY.pickup-drop')])
                    ->doesntHave('permanent_driv')
                    ->doesntHave('assignDriver')
                    ->whereHas('user', function ($q) {
                        $q->where('verify_user', 1);
                        $q->where('is_doc_verified', 1);

                    })
                    ->paginate(10)->appends(request()->query());

                return view('admin.drivers.driver_allocation_list', compact('drivers'));

            } elseif (request()->booking_id || request()->driver_id) {
                if (request()->booking_id == '') {
                    return redirect()->back()->with('danger', 'You can not Assign Driver');
                }
                $input = $request->all();
                $book = Booking::find(request()->booking_id);
                $assign_driver = DriverExtended::find(request()->driver_id);
                $input['driver_id'] = $assign_driver->user_id;
                $book->update($input);

//                $drivers = DriverExtended::doesnthave('assignDriver')->whereHas('user', function ($q) {
//                    $q->where('verify_user', 1);
//                })->paginate(10)->appends(request()->query());

                $drivers = DriverExtended::whereIn('work_type', [config('constants.CATEGORY.temporary'), config('constants.CATEGORY.pickup-drop')])
                    ->doesntHave('permanent_driv')
                    ->doesntHave('assignDriver')
                    ->whereHas('user', function ($q) {
                        $q->where('verify_user', 1);
                        $q->where('is_doc_verified', 1);
                    })->orWhereHas('assignDriver', function ($query) {
                        $query->where('status', config('constants.STATUS.Completed'));
                    })
                    ->paginate(10)->appends(request()->query());

                return view('admin.drivers.driver_allocation_list', compact('drivers'))->with('success', 'Driver Assign Succesfully');
            } elseif (request()->page) {

                $drivers = DriverExtended::doesnthave('assignDriver')->whereHas('user', function ($q) {
                    $q->where('verify_user', 1);
                    $q->where('is_doc_verified', 1);
                })->paginate(10)->appends(request()->query());
                return view('admin.drivers.driver_allocation_list', compact('drivers'));
            }
            $drivers = DriverExtended::doesnthave('assignDriver')
                ->doesnthave('permanent_driv')
                ->whereHas('user', function ($q) {
                    $q->where('verify_user', 1);
                    $q->where('is_doc_verified', 1);
                })->orWhereHas('assignDriver', function ($query) {
                    $query->where('status', config('constants.STATUS.Completed'));
                })->paginate(10)->appends(request()->query());
            return view('admin.drivers.driver_allocation_list', compact('drivers'));
        }
    }

    public function driver_allocation_filter(Request $request)
    {
        if ($request->filter == config('constants.CATEGORY.permanent') || $request->filter == config('constants.CATEGORY.valet_parking')) {
            $drivers = DriverExtended::where('work_type', $request->filter)
                ->doesntHave('permanent_driv')
                ->whereHas('user', function ($q) {
                    $q->where('verify_user', 1);
                })
                ->paginate(10)->appends(request()->query());
        } elseif ($request->filter == config('constants.CATEGORY.temporary') || $request->filter == config('constants.CATEGORY.pickup-drop')) {
            $drivers = DriverExtended::where('work_type', $request->filter)
                ->doesntHave('permanent_driv')
                ->doesntHave('assignDriver')
                ->whereHas('user', function ($q) {
                    $q->where('verify_user', 1);
                })
                ->paginate(10)->appends(request()->query());
        }
        $request_id = $request->request_id;
        $trip_id = $request->trip_id;
        $return_view = view('admin.drivers.driver_allocation_list_copy', compact('drivers', 'request_id', 'trip_id'))->render();
        return response()->json(array('success' => true, 'html' => $return_view));
    }

//    public function resi_ads_state(Request $request)
//    {
//        $data = City::where('state_id', $request->cat_id)->pluck('city_name', 'id');
//        return response()->json($data);
//    }
//
//    public function post_ads_state(Request $request)
//    {
//        $data = City::where('state_id', $request->cat_id)->pluck('city_name', 'id');
//        return response()->json($data);
//    }

    public function get_city_state(Request $request)
    {
        $pincode = $request['pincode'];
        $data = file_get_contents('https://api.postalpincode.in/pincode/' . $pincode);
        $data = json_decode($data);
        if (isset($data->PostOffice['0'])) {
            $arr['city'] = $data->PostOffice['0']->Taluk;
            $arr['state'] = $data->PostOffice['0']->State;
            echo json_encode($arr);
        } else {
            echo 'no';
        }
    }

    public function payslip(Request $request)
    {
        $admins = User::where('role', config('constants.ROLE.ADMIN'))->first();
        $salary_details = Salary::where('id', request()->id)->first();
        $users = DriverExtended::where('user_id', $salary_details->assign_driver_id)->first();
        return view('admin.drivers.payslip', compact('admins', 'users', 'salary_details'));
    }



}
