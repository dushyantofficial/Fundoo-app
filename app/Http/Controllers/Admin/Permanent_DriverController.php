<?php

namespace App\Http\Controllers\admin;

use App\DataTables\Admin\Permanent_DriverDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateDriverExtendedRequest;
use App\Http\Requests\Admin\UpdateDriverExtendedRequest;
use App\Models\Admin\City;
use App\Models\Admin\DriverCategory;
use App\Models\Admin\DriverExtended;
use App\Models\Admin\State;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Laracasts\Flash\Flash;

class Permanent_DriverController extends Controller
{
    public function index(Permanent_DriverDataTable $Permanent_DriverDataTable)
    {

        return $Permanent_DriverDataTable->render('admin.permanent_driver.index');
    }

    public function create()
    {

        $work = DriverExtended::pluck('work_type', 'id');
        $work_categorys = DriverCategory::pluck('category_name', 'id');
        $user = User::pluck('name', 'id');
        $city = City::all();
        $states = State::pluck('state_name', 'id');
        $category_name = DriverCategory::all();
        return view('admin.permanent_driver.create', compact('category_name', 'work_categorys', 'user', 'work', 'states', 'city'));
    }

    /**
     * Store a newly created permanent_driver in storage.
     *
     * @param CreateDriverExtendedRequest $request
     *
     * @return Response
     */
    public function store(CreateDriverExtendedRequest $request)
    {
//        $validatedData = $request->validate([
//            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|unique:users,email',
//            'aditional_contact_no' => 'required|unique:driver_extendeds',
//        ]);
        $input = $request->all();
        $input['work_type'] = config('constants.CATEGORY.permanent');
        $user['role'] = config('constants.ROLE.DRIVER');
        $user['reffral_code'] = random_number();
        $user['mobile_no'] = $request->mobile_no;
        $user['state'] = $request->resi_ads_state;
        $user['city'] = $request->resi_ads_city;
        $user['pincode'] = $request->resi_ads_pincode;
        $user['first_name'] = $request->first_name;
        $user['middle_name'] = $request->middle_name;
        $user['middle_name'] = $request->middle_name;
        $user['last_name'] = $request->last_name;
        $user['last_name'] = $request->last_name;
        $user['email'] = $request->email;
        $user['date_of_birth'] = $request->date_of_birth;
        $user['gender'] = $request->gander;
        $user['status'] = $request->status;
        $user['verify_user'] = 1;
        $user['is_doc_verified'] = 0;

//        $input['mobile_no'] = $request->aditional_contact_no;
        if ($request->hasFile("resi_ads_proof")) {
            $img = $request->file("resi_ads_proof");
            $img->store('public/admin/images');
            $input['resi_ads_proof'] = $img->hashName();

        }

        if ($request->hasFile("post_ads_proof")) {
            $img = $request->file("post_ads_proof");
            $img->store('public/admin/images');
            $input['post_ads_proof'] = $img->hashName();

        }

        if ($request->hasFile("profile_image")) {
            $img = $request->file("profile_image");
            $img->store('public/admin/images');
            $user['profile_image'] = $img->hashName();

        }

        if ($request->hasFile("license")) {
            $img = $request->file("license");
            $img->store('public/admin/images');
            $input['license'] = $img->hashName();

        }

        if ($request->hasFile("aadhar_card")) {
            $img = $request->file("aadhar_card");
            $img->store('public/admin/images');
            $input['aadhar_card'] = $img->hashName();

        }

        if ($request->hasFile("pancard")) {
            $img = $request->file("pancard");
            $img->store('public/admin/images');
            $input['pancard'] = $img->hashName();

        }

        if ($request->hasFile("light_bill")) {
            $img = $request->file("light_bill");
            $img->store('public/admin/images');
            $input['light_bill'] = $img->hashName();

        }
//dd($input);
        $users = User::create($user);
        $users->driverEx()->create($input);


        Flash::success('Driver Extended saved successfully.');

        return redirect(route('admin.permanent-driver.index'))->with('success', 'Permanent Driver saves successfully...');

    }

    /**
     * Display the specified permanent_driver.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {

        $permanent_driver = $this->driverExtendedRepository->find($id);

        if (empty($permanent_driver)) {
            return redirect(route('admin.permanent-driver.index'))->with('danger', 'Driver not found');
        }

        return view('admin.permanent_driver.show')->with('permanent_driver', $permanent_driver);
    }

    /**
     * Show the form for editing the specified permanent_driver.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {

        $driverExtended = DriverExtended::where('user_id', $id)->first();
        $userss = User::where('id', $driverExtended->user_id)->first();
        collect([$driverExtended, $userss]);
        $array = array_merge($driverExtended->toArray(), $userss->toArray());


        if (empty($driverExtended)) {
            return redirect(route('admin.permanent-driver.index'))->with('danger', 'Driver not found');
        }
        $work_categorys = DriverCategory::pluck('category_name', 'id');
        $category_name = DriverCategory::all();
        $states = State::pluck('state_name', 'id');
        $work = DriverExtended::pluck('work_type', 'id');
        $city = City::all();

        return view('admin.permanent_driver.edit', compact('category_name', 'work_categorys', 'userss', 'work', 'array', 'driverExtended', 'states', 'city'));
    }

    /**
     * Update the specified permanent_driver in storage.
     *
     * @param int $id
     * @param UpdateDriverExtendedRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDriverExtendedRequest $request)
    {

        $driverExtended = DriverExtended::where('user_id', $id)->first();
        $user = User::where('id', $driverExtended->user_id)->first();
        $validatedData = $request->validate([
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|unique:users,email,' . $user->id,
        ]);
        $input = $request->all();
        $users['role'] = config('constants.ROLE.DRIVER');
        $users['state'] = $request->resi_ads_state;
        $users['city'] = $request->resi_ads_city;
        $users['pincode'] = $request->resi_ads_pincode;
        $users['first_name'] = $request->first_name;
        $users['middle_name'] = $request->middle_name;
        $users['middle_name'] = $request->middle_name;
        $users['last_name'] = $request->last_name;
        $users['last_name'] = $request->last_name;
        $users['email'] = $request->email;
        $users['date_of_birth'] = $request->date_of_birth;
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
            $input['resi_ads_proof'] = $img->hashName();
            $driverExtended->update($input);
        }

        if ($request->hasFile("post_ads_proof")) {
            $img = $request->file("post_ads_proof");
            if (Storage::exists('public/admin/images' . $driverExtended->post_ads_proof)) {
                Storage::delete('public/admin/images' . $driverExtended->post_ads_proof);
            };
            $img->store('public/admin/images');
            $input['post_ads_proof'] = $img->hashName();
            $driverExtended->update($input);
        }


        if ($request->hasFile("license")) {
            $img = $request->file("license");
            if (Storage::exists('public/admin/images' . $driverExtended->license)) {
                Storage::delete('public/admin/images' . $driverExtended->license);
            };
            $img->store('public/admin/images');
            $input['license'] = $img->hashName();
            $driverExtended->update($input);
        }

        if ($request->hasFile("aadhar_card")) {
            $img = $request->file("aadhar_card");
            if (Storage::exists('public/admin/images' . $driverExtended->aadhar_card)) {
                Storage::delete('public/admin/images' . $driverExtended->aadhar_card);
            };
            $img->store('public/admin/images');
            $input['aadhar_card'] = $img->hashName();
            $driverExtended->update($input);
        }

        if ($request->hasFile("pancard")) {
            $img = $request->file("pancard");
            if (Storage::exists('public/admin/images' . $driverExtended->pancard)) {
                Storage::delete('public/admin/images' . $driverExtended->pancard);
            };
            $img->store('public/admin/images');
            $input['pancard'] = $img->hashName();
            $driverExtended->update($input);
        }

        if ($request->hasFile("light_bill")) {
            $img = $request->file("light_bill");
            if (Storage::exists('public/admin/images' . $driverExtended->light_bill)) {
                Storage::delete('public/admin/images' . $driverExtended->light_bill);
            };
            $img->store('public/admin/images');
            $input['light_bill'] = $img->hashName();
            $driverExtended->update($input);
        }


        if (empty($driverExtended)) {
            Flash::error('Driver Extended not found');

            return redirect(route('admin.permanent-driver.index'));
        }
        $user->update($users);
        $driverExtended->update($input);


        return redirect(route('admin.permanent-driver.index'))->with('info', 'Permanent Driver updated successfully...');
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

        $customerExtend = User::find($user_id);
        $customerExtend->delete();

        Flash::success('Driver Extended deleted successfully.');

        return redirect(route('admin.permanent-driver.index'))->with('danger', 'Permanent Driver deleted successfully...');
    }


}

