<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\DriverExtendedDataTable;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\CreateDriverExtendedRequest;
use App\Http\Requests\Admin\UpdateDriverExtendedRequest;
use App\Models\Admin\City;
use App\Models\Admin\DriverCategory;
use App\Models\Admin\DriverExtended;
use App\Models\Admin\State;
use App\Models\User;
use App\Notification\Notification;
use App\Repositories\Admin\DriverExtendedRepository;
use Flash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Response;

class DriverExtendedController extends AppBaseController
{
    /** @var DriverExtendedRepository $driverExtendedRepository */
    private $driverExtendedRepository;

    public function __construct(DriverExtendedRepository $driverExtendedRepo)
    {
        $this->driverExtendedRepository = $driverExtendedRepo;
    }

    /**
     * Display a listing of the DriverExtended.
     *
     * @param DriverExtendedDataTable $driverExtendedDataTable
     *
     * @return Response
     */
    public function index(DriverExtendedDataTable $driverExtendedDataTable)
    {
        return $driverExtendedDataTable->render('admin.driver_extendeds.index');
    }

    /**
     * Show the form for creating a new DriverExtended.
     *
     * @return Response
     */
    public function create()
    {
        $work = DriverExtended::pluck('work_type', 'id');
        $work_categorys = DriverCategory::pluck('category_name', 'id');
        $user = User::pluck('name', 'id');
        $city = City::all();
        $states = State::pluck('state_name', 'id');
        $category_name = DriverCategory::all();
        return view('admin.driver_extendeds.create', compact('category_name', 'work_categorys', 'user', 'work', 'states', 'city'));
    }

    /**
     * Store a newly created DriverExtended in storage.
     *
     * @param CreateDriverExtendedRequest $request
     *
     * @return Response
     */
    public function store(CreateDriverExtendedRequest $request)
    {
        $input = $request->all();
        $user['role'] = config('constants.ROLE.DRIVER');
        $user['reffral_code'] = random_number();
        $user['mobile_no'] = $request->mobile_no;
        $user['state'] = $request->resi_ads_state;
        $user['city'] = $request->resi_ads_city;
        $user['pincode'] = $request->resi_ads_pincode;
        $user['name'] = $request->first_name;
        $user['first_name'] = $request->first_name;
        $user['middle_name'] = $request->middle_name;
        $user['last_name'] = $request->last_name;
        $user['email'] = $request->email;
        $user['date_of_birth'] = birth_date_formate($request->date_of_birth);
        $user['gender'] = $request->gander;
        $user['status'] = $request->status;
        $user['verify_user'] = 1;
        $user['is_doc_verified'] = 0;


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

        $users = User::create($user);
        $driver = $users->driverEx()->create($input);

        $users = User::first();

        $data['user_id'] = $users->id;
        $data['title'] = 'Driver Registered';
        $data['type'] = 'Driver';
        $data['type_id'] = null;
        $data['msg'] = 'New driver  <a href="' . route('driver-dashboard') . '?id=' . $users->id . '">' . $users->first_name . "'</a>'is registered for " . $input['work_type'];
        Notification::notify_with_push($data);

        DB::commit();
        return redirect(route('admin.driverExtendeds.index'))->with('success', 'Driver Extended saves successfully...');

    }


    /**
     * Display the specified DriverExtended.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {

        $driverExtended = $this->driverExtendedRepository->find($id);


        if (empty($driverExtended)) {
            Flash::error('Driver Extended not found');

            return redirect(route('admin.driverExtendeds.index'));
        }

        return view('admin.driver_extendeds.show')->with('driverExtended', $driverExtended);
    }

    /**
     * Show the form for editing the specified DriverExtended.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {

        $driverExtended = DriverExtended::where('user_id', $id)->first();
        if (empty($driverExtended)) {
            return redirect(route('admin.driverExtendeds.index'))->with('danger', 'Driver not found');
        }
        $check = DriverExtended::find($driverExtended->language_known);
        $userss = User::where('id', $driverExtended->user_id)->first();
        collect([$driverExtended, $userss]);
        $array = array_merge($driverExtended->toArray(), $userss->toArray());


        if (empty($driverExtended)) {
            Flash::error('Driver Extended not found');

            return redirect(route('admin.driverExtendeds.index'));
        }
        $work_categorys = DriverCategory::pluck('category_name', 'id');
        $category_name = DriverCategory::all();
        $states = State::pluck('state_name', 'id');
        $work = DriverExtended::pluck('work_type', 'id');
        $city = City::all();

        return view('admin.driver_extendeds.edit', compact('category_name', 'work_categorys', 'userss', 'work', 'array', 'driverExtended', 'states', 'city'));
    }

    /**
     * Update the specified DriverExtended in storage.
     *
     * @param int $id
     * @param UpdateDriverExtendedRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDriverExtendedRequest $request)
    {
        $input = $request->all();
        $driverExtended = DriverExtended::where('user_id', $id)->first();
        $user = User::where('id', $driverExtended->user_id)->first();
        $validatedData = $request->validate([
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|unique:users,email,' . $user->id,
        ]);


        $users['role'] = config('constants.ROLE.DRIVER');
//            $users['aditional_contact_no'] = $request->aditional_contact_no;
        $users['state'] = $request->resi_ads_state;
        $users['city'] = $request->resi_ads_city;
        $users['pincode'] = $request->resi_ads_pincode;
        $users['first_name'] = $request->first_name;
        $users['middle_name'] = $request->middle_name;
        $users['last_name'] = $request->last_name;
        $users['email'] = $request->email;
        $users['date_of_birth'] = birth_date_formate($request->date_of_birth);
        $users['gender'] = $request->gander;
        $users['status'] = $request->status;


        if ($request->hasFile("profile_image")) {
            $img = $request->file("profile_image");
            if (Storage::exists('public/admin/images' . $user->profile_image)) {
                Storage::delete('public/admin/images' . $user->profile_image);
            }
            $img->store('public/admin/images');
            $users['profile_image'] = $img->hashName();
            $user->update($users);

        }

        if ($request->hasFile("resi_ads_proof")) {
            $img = $request->file("resi_ads_proof");
            if (Storage::exists('public/admin/images' . $driverExtended->resi_ads_proof)) {
                Storage::delete('public/admin/images' . $driverExtended->resi_ads_proof);
            }
            $img->store('public/admin/images');
            $input['resi_ads_proof'] = config('app.url') . '/public/storage/admin/images/' . $img->hashName();
            $driverExtended->update($input);
        }

        if ($request->hasFile("post_ads_proof")) {
            $img = $request->file("post_ads_proof");
            if (Storage::exists('public/admin/images' . $driverExtended->post_ads_proof)) {
                Storage::delete('public/admin/images' . $driverExtended->post_ads_proof);
            };
            $img->store('public/admin/images');
            $input['post_ads_proof'] = config('app.url') . '/public/storage/admin/images/' . $img->hashName();
            $driverExtended->update($input);
        }


        if ($request->hasFile("license")) {
            $img = $request->file("license");
            if (Storage::exists('public/admin/images' . $driverExtended->license)) {
                Storage::delete('public/admin/images' . $driverExtended->license);
            };
            $img->store('public/admin/images');
            $input['license'] = config('app.url') . '/public/storage/admin/images/' . $img->hashName();
            $driverExtended->update($input);
        }

        if ($request->hasFile("aadhar_card")) {
            $img = $request->file("aadhar_card");
            if (Storage::exists('public/admin/images' . $driverExtended->aadhar_card)) {
                Storage::delete('public/admin/images' . $driverExtended->aadhar_card);
            };
            $img->store('public/admin/images');
            $input['aadhar_card'] = config('app.url') . '/public/storage/admin/images/' . $img->hashName();
            $driverExtended->update($input);
        }

        if ($request->hasFile("pancard")) {
            $img = $request->file("pancard");
            if (Storage::exists('public/admin/images' . $driverExtended->pancard)) {
                Storage::delete('public/admin/images' . $driverExtended->pancard);
            };
            $img->store('public/admin/images');
            $input['pancard'] = config('app.url') . '/public/storage/admin/images/' . $img->hashName();
            $driverExtended->update($input);
        }

        if ($request->hasFile("light_bill")) {
            $img = $request->file("light_bill");
            if (Storage::exists('public/admin/images' . $driverExtended->light_bill)) {
                Storage::delete('public/admin/images' . $driverExtended->light_bill);
            };
            $img->store('public/admin/images');
            $input['light_bill'] = config('app.url') . '/public/storage/admin/images/' . $img->hashName();
            $driverExtended->update($input);
        }


        if (empty($driverExtended)) {
            Flash::error('Driver Extended not found');

            return redirect(route('admin.driverExtendeds.index'));
        }

//            if (DriverExtended::where('aditional_contact_no', '=', $request->aditional_contact_no)->exists()) {

        $user->update($users);
        $driverExtended->update($input);

        $user_id = $driverExtended->user_id;
        $data['user_id'] = $user_id;
        $data['title'] = 'Profile Update';
        $data['type'] = 'Driver';
        $data['type_id'] = null;
        $data['msg'] = 'Driver <a href="' . route('driver-dashboard') . '?id=' . $user->id . '">' . $user->first_name . "'</a>' Updated his profile.";
        Notification::notify_with_push($data);

//            } else {
//                return Redirect()->back()->with('danger', 'Mobile Number Can'."'".'t Update !');
//            }


        Flash::success('Driver Extended updated successfully.');
        DB::commit();


        return redirect(route('admin.driverExtendeds.index'))->with('info', 'Driver Extended updated successfully...');

    }

    /**
     * Remove the specified DriverExtended from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($user_id)
    {
        try {
            DB::beginTransaction();
            $customerExtend = User::find($user_id);
            $customerExtend->delete();

            Flash::success('Driver Extended deleted successfully.');
            DB::commit();
            return redirect(route('admin.driverExtendeds.index'))->with('danger', 'Driver Extended deleted successfully...');
        } catch (\Exception $exp) {
            DB::rollBack(); // Tell Laravel, "It's not you, it's me. Please don't persist to DB"
            return redirect()->back()->with('danger', 'Driver Extended Deleted failed...');

        }
    }
}
