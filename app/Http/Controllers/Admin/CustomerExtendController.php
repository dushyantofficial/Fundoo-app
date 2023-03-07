<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\CustomerExtendDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateCustomerExtendRequest;
use App\Http\Requests\Admin\UpdateCustomerExtendRequest;
use App\Models\Admin\AssignDriver;
use App\Models\Admin\Booking;
use App\Models\Admin\City;
use App\Models\Admin\CustomerCarDetail;
use App\Models\Admin\CustomerExtend;
use App\Models\Admin\State;
use App\Models\Admin\User_Rating;
use App\Models\User;
use App\Notification\Notification;
use App\Repositories\Admin\CustomerExtendRepository;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Response;
use Helper;

class CustomerExtendController extends AppBaseController
{
    /** @var CustomerExtendRepository $customerExtendRepository */
    private $customerExtendRepository;

    public function __construct(CustomerExtendRepository $customerExtendRepo)
    {
        $this->customerExtendRepository = $customerExtendRepo;
    }

    /**
     * Display a listing of the CustomerExtend.
     *
     * @param CustomerExtendDataTable $customerExtendDataTable
     *
     * @return Response
     */
    public function index(CustomerExtendDataTable $customerExtendDataTable)
    {
        return $customerExtendDataTable->render('admin.customer_extends.index');
    }

    /**
     * Show the form for creating a new CustomerExtend.
     *
     * @return Response
     */
    public function create()
    {
        $city = City::all();
        $states = State::pluck('state_name', 'id');
//        $states = State::all();
        $users = User::pluck('name', 'id');
        return view('admin.customer_extends.create', compact('city', 'states', 'users'));
    }


    /**
     * Store a newly created CustomerExtend in storage.
     *
     * @param CreateCustomerExtendRequest $request
     *
     * @return Response
     */
    public function store(CreateCustomerExtendRequest $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|unique:users,email',
            'mobile_no' => 'required|unique:users,mobile_no|min:10|max:10'
        ]);
        $input = $request->all();
//        try {
//            DB::beginTransaction();
        $input['role'] = config('constants.ROLE.CUSTOMER');
        $input['reffral_code'] = random_number();
        if ($request->hasFile("profile_image")) {
            $img = $request->file("profile_image");
            $img->store('public/admin/images');
            $input['profile_image'] = $img->hashName();

        }
        $user = User::create($input);
        $customer = $user->extends()->create($input);

//            DB::commit();

        $data['user_id'] = $user->id;
        $data['title'] = 'Customer Registered';
        $data['type'] = 'Customer';
        $data['type_id'] = null;
        $data['msg'] = "New Customer  <a href='" . route('customer-dashboard', $customer->user_id) . "'>" . $customer->user_id . "</a> registered by <a href='" . route('customer-dashboard', Auth::id()) . "'>" . Auth::user()->name . "</a>.";
        Notification::notify_with_push($data);

//            $user_id = $user->id;
//            $msg = "New Customer  <a href='" . route('customer-dashboard', $customer->user_id) . "'>" . $customer->user_id . "</a> registered by <a href='" . route('customer-dashboard', Auth::id()) . "'>" . Auth::user()->name . "</a>.";
//            Notification::notify_with_push($user_id, 'New Customer registered', $msg);
//
//            Flash::success('Customer Extend saved successfully.');

        return redirect(route('admin.customerExtends.index'))->with('success', 'Customer Extend saved successfully...');
//        } catch (\Exception $exp) {
//            DB::rollBack(); // Tell Laravel, "It's not you, it's me. Please don't persist to DB"
//            return redirect()->back()->with('danger', 'Customer Extended Save failed...');
//
//        }
    }

    /**
     * Display the specified CustomerExtend.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {

        $customerExtend = $this->customerExtendRepository->find($id);
        if (empty($customerExtend)) {
            Flash::error('Customer Extend not found');

            return redirect(route('admin.customerExtends.index'));
        }

        return view('admin.customer_extends.show')->with('customerExtend', $customerExtend);
    }

    /**
     * Show the form for editing the specified CustomerExtend.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit(Request $request, $id)
    {
//        dd($id);
//        $customerExtend = $this->customerExtendRepository->find($id);
        $customerExtend = CustomerExtend::where('user_id', $id)->first();
        if (empty($customerExtend)) {

            return redirect(route('admin.customerExtends.index'))->with('danger', 'Customer Extend not not found');
        }
        $userss = User::where('id', $customerExtend->user_id)->first();
        $statuss = State::pluck('state_name', 'id');
        collect([$customerExtend, $userss]);
        $array = array_merge($customerExtend->toArray(), $userss->toArray());
        $city = City::all();
        $users = User::pluck('name', 'id');
        $states = State::pluck('state_name', 'id');


        return view('admin.customer_extends.edit', compact('city', 'statuss', 'customerExtend', 'userss', 'array', 'states'));
    }

    /**
     * Update the specified CustomerExtend in storage.
     *
     * @param int $id
     * @param UpdateCustomerExtendRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCustomerExtendRequest $request)
    {

        $input = $request->all();
        $users = User::find($id);

        $validatedData = $request->validate([
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|unique:users,email,' . $users->id,
//            'mobile_no' => 'required|min:10|max:10|unique:users,mobile_no,' . $users->id
        ]);
        $users['role'] = config('constants.ROLE.CUSTOMER');
        $users['status'] = $request->status;

        $customerExtend = CustomerExtend::where('user_id', $id)->first();

        try {
            DB::beginTransaction();
            if ($request->hasFile("profile_image")) {
                $img = $request->file("profile_image");
                if (Storage::exists('public/admin/images' . $users->profile_image)) {
                    Storage::delete('public/admin/images' . $users->profile_image);
                }
                $img->store('public/admin/images');
                $input['profile_image'] = $img->hashName();
                $users->update($input);
            }
            if (empty($customerExtend)) {
                Flash::error('Customer Extend not found');
                return redirect(route('admin.customerExtends.index'))->with('danger', 'Customer Extend not found...');
            }
            $users->update($input);
            $customerExtend->update($input);
            $data['user_id'] = $users->id;
            $data['title'] = 'Profile Update';
            $data['type'] = 'Customer';
            $data['type_id'] = null;
            $data['msg'] = 'Customer <a href="' . route('customer-dashboard') . '?id=' . $users->id . '">' . $users->first_name . "'</a>'Updated his profile";
            Notification::notify_with_push($data);
            DB::commit();
            return redirect(route('admin.customerExtends.index'))->with('info', 'Customer Extend updated successfully...');
        } catch (\Exception $exp) {
            DB::rollBack(); // Tell Laravel, "It's not you, it's me. Please don't persist to DB"
            return redirect()->back()->with('danger', 'Customer Extended Updated failed...');

        }
    }

    /**
     * Remove the specified CustomerExtend from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($user_id)
    {

        $customerExtend = User::find($user_id);
        try {
            DB::beginTransaction();
            $customerExtend->delete();
            DB::commit();
            Flash::success('Customer Extend deleted successfully.');
            return redirect(route('admin.customerExtends.index'))->with('danger', 'Customer Extend deleted successfully...');
        } catch (\Exception $exp) {
            DB::rollBack(); // Tell Laravel, "It's not you, it's me. Please don't persist to DB"
            return redirect()->back()->with('danger', 'Customer Extended Deleted failed...');

        }
    }

    public function customer_dashboard(Request $request)
    {
        $customerExtend = CustomerExtend::where('user_id', $request->id)->first();
        if (empty($customerExtend)) {

            return redirect(route('admin.customerExtends.index'))->with('danger', 'Customer Extend not not found');
        }
        $customer_address = CustomerExtend::where('user_id', $customerExtend->user_id)->get();
        $users = User::where('id', $customerExtend->user_id)->first();
        $car_details = CustomerCarDetail::where('user_id', $users->id)->get();
        collect([$customerExtend, $users]);
        $array = array_merge($customerExtend->toArray(), $users->toArray());
        $trip = Booking::where('customer_id', $request->id)->count();
        $ratings = User_Rating::where('rated_to', $request->id)->get();
        $trip_details = Booking::where('customer_id', $request->id)->get();
        $reffers = User::where('reffer_by', $request->id)->count();
        $booking = Booking::where('status', config('constants.STATUS.Completed'))->whereHas('customer', function ($query) use ($request) {
            $query->where('reffer_by', $request->id);
        });
        $completed_trip_refer_amount = $booking->sum('reffer_amount');
        $refer_users = $booking->get();

        $canceled_trip = Booking::where('status', config('constants.STATUS.Cancel'))->where('customer_id', $request->id)->count();
        $ongoing_trip = Booking::where('status', config('constants.STATUS.On_Going'))->where('customer_id', $request->id)->count();
        $incity_trip = Booking::where('incity_or_out_city', config('constants.BOOKING_CITY.In City'))->where('customer_id', $request->id)->count();
        $outcity_trip = Booking::where('incity_or_out_city', config('constants.BOOKING_CITY.Out City'))->where('customer_id', $request->id)->count();
        $temporary_trip = Booking::where('pickup_drop_or_temp', config('constants.BOOKING_DROP_CAR.temporary'))->where('customer_id', $request->id)->count();
        $livebooking_trip = Booking::where('live_or_advance', config('constants.BOOKING_TYPE.live_booking'))->where('customer_id', $request->id)->count();
        $advancebook_trip = Booking::where('live_or_advance', config('constants.BOOKING_TYPE.advance_booking'))->where('customer_id', $request->id)->count();
        $pickup_drop_trip = Booking::where('pickup_drop_or_temp', config('constants.BOOKING_DROP_CAR.pickup_drop'))->where('customer_id', $request->id)->count();

        $date = \Carbon\Carbon::today()->subDays(7);
        $time_lines = \App\Models\Admin\Notification::where('user_id', $request->id)->where('type', 'Booking')->with('bookingNotification')->where('created_at', '>=', $date)->orderBy('created_at', 'DESC')->get()
            ->groupBy(function ($item) {
                return DATE_FORMAT($item->created_at, "d M. Y");
            });
        $assignDriverCount = AssignDriver::where('user_id', $request->id)->count();
        $assignDrivers = AssignDriver::where('user_id', $request->id)->get();

        return view('admin.customer_extends.dashboard', compact('array', 'customerExtend', 'users', 'car_details',
            'trip', 'ratings', 'trip_details', 'canceled_trip', 'ongoing_trip', 'incity_trip', 'outcity_trip', 'temporary_trip', 'livebooking_trip',
            'advancebook_trip', 'pickup_drop_trip', 'customer_address', 'reffers', 'refer_users', 'time_lines', 'completed_trip_refer_amount', 'assignDriverCount', 'assignDrivers'));
    }

    public function city_ajax(Request $request)
    {

        $data = City::where('state_id', $request->cat_id)->get();
        return response()->json(['data' => $data]);
    }

    public function on_trip_customer()
    {
        $trip_details = Booking::where('status', config('constants.STATUS.On_Going'))->paginate(6);
        return view('admin.customer_extends.on_trip_customer', compact('trip_details'));
    }

    public function on_trip_customer_filter(Request $request)
    {
        if ($request->arr && $request->page) {
            $array1 = explode(",", $request->arr);
            $array = collect($array1)->toArray();
            $trip_details = Booking::where(function ($query) use ($array) {
                $query->where('status', config('constants.STATUS.On_Going'))
                    ->whereIn('live_or_advance', $array);
            })->orWhere(function ($query) use ($array) {
                $query->where('status', config('constants.STATUS.On_Going'))
                    ->whereIn('pickup_drop_or_temp', $array);
            })->orWhere(function ($query) use ($array) {
                $query->where('status', config('constants.STATUS.On_Going'))
                    ->whereIn('incity_or_out_city', $array);
            })->offset(\request('page') * 6)->limit(6)->get();

            if (count($trip_details) == 0) {
                $html = '';
            } else {
                $view = view('admin.customer_extends.on_trip_customer_copy', compact('trip_details'));
                $html = $view->render();
            }
            return response()->json(['html' => $html, 'resultCount' => count($trip_details)]);

        } elseif ($request->page) {
            $booking = Booking::where('status', config('constants.STATUS.On_Going'));
            $trip_details = $booking->offset(\request('page') * 6)->limit(6)->get();

            if (count($trip_details) == 0) {
                $html = '';
            } else {
                $view = view('admin.customer_extends.on_trip_customer_copy', compact('trip_details'));
                $html = $view->render();
            }
            return response()->json(['html' => $html, 'resultCount' => count($trip_details)]);

        } elseif ($request->arr) {

            $array = $request->arr;
            $trip_details = Booking::where(function ($query) use ($array) {
                $query->where('status', config('constants.STATUS.On_Going'))
                    ->whereIn('live_or_advance', $array);
            })->orWhere(function ($query) use ($array) {
                $query->where('status', config('constants.STATUS.On_Going'))
                    ->whereIn('pickup_drop_or_temp', $array);
            })->orWhere(function ($query) use ($array) {
                $query->where('status', config('constants.STATUS.On_Going'))
                    ->whereIn('incity_or_out_city', $array);
            })->paginate(6);

        } else {
            $trip_details = Booking::where('status', config('constants.STATUS.On_Going'))->paginate(6);
        }
        $return_view = view('admin.customer_extends.on_trip_customer_copy', compact('trip_details'))->render();
        return response()->json(array('success' => true, 'html' => $return_view, 'resultCount' => count($trip_details)));

    }

    public function customer_search(Request $request)
    {
        $search = $request->filter;
        $trip_details = Booking::whereHas('customer', function ($query) use ($search) {
            $query->where('first_name', 'LIKE', '%' . $search . '%')
                ->orWhere('mobile_no', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%');
        })->where('status', config('constants.STATUS.On_Going'))->paginate(6);
        return view('admin.customer_extends.on_trip_customer', compact('trip_details'));
    }

    public function customer_trips(Request $request, $id)
    {
        $trip_details = Booking::where('customer_id', $request->id)->get();
        return \DataTables::of($trip_details)
            ->addColumn('actions', function ($data) {
                $btn = '<a href="' . \URL::route('customer_show_trip', $data->id) . '" class="btn btn-sm btn-warning">Show Trip</a>';
                return $btn;
            })
            ->addColumn('status', function ($row) {
                if ($row->status == config('constants.STATUS.Pending')) {
                    return '<span class="badge badge-warning">Pending</span>';
                } elseif ($row->status == config('constants.STATUS.On_Going')) {
                    return '<span class="badge badge-info">On Going</span>';
                } elseif ($row->status == config('constants.STATUS.Cancel')) {
                    return '<span class="badge badge-danger">Cancel</span>';
                } elseif ($row->status == config('constants.STATUS.Completed')) {
                    return '<span class="badge badge-success">Completed</span>';
                }

            })
            ->addColumn('Trip Type', function ($row) {
                return $row->live_or_advance . '&nbsp; <br> &nbsp;' . $row->incity_or_out_city . '&nbsp; <br> &nbsp;' .
                    $row->pickup_drop_or_temp;
            })
            ->addColumn('customer_name', function ($row) {
                return $row->driver->first_name ?? ' - ';
            })
            ->addColumn('start_at', function ($row) {
                return $row->city ?? ' - ';
            })
            ->addColumn('end_at', function ($row) {
                return $row->destination_city ?? ' - ';
            })
            ->addColumn('start date time', function ($row) {
                $startdatetime = ($row->start_or_pickup_date) . ' ' . ($row->start_or_pickup_time);

                return date_formate($startdatetime);
            })
            ->addColumn('end date time', function ($row) {
                $enddatetime = ($row->end_or_drop_date) . ' ' . ($row->end_or_drop_time);
                return date_formate($enddatetime);
            })
            ->rawColumns(['actions', 'status', 'Trip Type', 'start_at', 'end_at', 'start date time', 'end date time', 'customer_name'])
            ->make(true);
    }

    public function customer_show_trip($id)
    {
        $trip_detail = Booking::find($id);
        if (empty($trip_detail)) {

            return redirect(route('trips-dashboard'))->with('danger', 'Trip not found');
        }
        return view('admin.customer_extends.customer_trip', compact('trip_detail'));
    }


    public function timeline_show(Request $request)
    {

        $customerExtend = CustomerExtend::where('user_id', $request->id)->first();
        $customer_address = CustomerExtend::where('user_id', $customerExtend->user_id)->get();
        $users = User::where('id', $customerExtend->user_id)->first();
        $car_details = CustomerCarDetail::where('user_id', $users->id)->get();
        collect([$customerExtend, $users]);
        $array = array_merge($customerExtend->toArray(), $users->toArray());
        $trip = Booking::where('customer_id', $request->id)->count();
        $trip_details = Booking::where('customer_id', $request->id)->get();
        $reffers = User::where('reffer_by', $request->id)->count();
        $booking = Booking::where('status', config('constants.STATUS.Completed'))->whereHas('customer', function ($query) use ($request) {
            $query->where('reffer_by', $request->id);
        });
        $completed_trip_refer_amount = $booking->sum('reffer_amount');
        $refer_users = $booking->get();

        $canceled_trip = Booking::where('status', config('constants.STATUS.Cancel'))->where('customer_id', $request->id)->count();
        $ongoing_trip = Booking::where('status', config('constants.STATUS.On_Going'))->where('customer_id', $request->id)->count();
        $incity_trip = Booking::where('incity_or_out_city', config('constants.BOOKING_CITY.In City'))->where('customer_id', $request->id)->count();
        $outcity_trip = Booking::where('incity_or_out_city', config('constants.BOOKING_CITY.Out City'))->where('customer_id', $request->id)->count();
        $temporary_trip = Booking::where('pickup_drop_or_temp', config('constants.BOOKING_DROP_CAR.temporary'))->where('customer_id', $request->id)->count();
        $livebooking_trip = Booking::where('live_or_advance', config('constants.BOOKING_TYPE.live_booking'))->where('customer_id', $request->id)->count();
        $advancebook_trip = Booking::where('live_or_advance', config('constants.BOOKING_TYPE.advance_booking'))->where('customer_id', $request->id)->count();
        $pickup_drop_trip = Booking::where('pickup_drop_or_temp', config('constants.BOOKING_DROP_CAR.pickup_drop'))->where('customer_id', $request->id)->count();

        $date = \Carbon\Carbon::today();
        $time_lines = \App\Models\Admin\Notification::where('user_id', $request->id)->where('type', 'Booking')->with('bookingNotification')->where('created_at', '<=', $date)->orderBy('created_at', 'DESC')->get()
            ->groupBy(function ($item) {
                return DATE_FORMAT($item->created_at, "d M. Y");
            });
        $assignDriverCount = AssignDriver::where('user_id', $request->id)->count();
        $assignDrivers = AssignDriver::where('user_id', $request->id)->get();

        return view('admin.customer_extends.timeline_show', compact('array', 'customerExtend', 'users', 'car_details',
            'trip', 'trip_details', 'canceled_trip', 'ongoing_trip', 'incity_trip', 'outcity_trip', 'temporary_trip', 'livebooking_trip',
            'advancebook_trip', 'pickup_drop_trip', 'customer_address', 'reffers', 'refer_users', 'time_lines', 'completed_trip_refer_amount', 'assignDriverCount', 'assignDrivers'));
    }


}
