<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateSettingRequest;
use App\Http\Requests\Admin\UpdateSettingRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Admin\Setting;
use App\Repositories\Admin\SettingRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Storage;
use Response;

class SettingController extends Controller
{
    /** @var SettingRepository $settingRepository */
    private $settingRepository;

    public function __construct(SettingRepository $settingRepo)
    {
        $this->settingRepository = $settingRepo;
    }

    /**
     * Display a listing of the Setting.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {

    }

    /**
     * Show the form for creating a new Setting.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.settings.create');
    }

    /**
     * Store a newly created Setting in storage.
     *
     * @param CreateSettingRequest $request
     *
     * @return Response
     */
    public function store(CreateSettingRequest $request)
    {
        $input = $request->all();
        if ($request->hasFile("app_logo")) {
            $img = $request->file("app_logo");
            $img->store('public/admin/setting');
            $input['app_logo'] = $img->hashName();

        }
        if ($request->hasFile("intro_screen_one_img")) {
            $img = $request->file("intro_screen_one_img");
            $img->store('public/admin/setting');
            $input['intro_screen_one_img'] = $img->hashName();

        }
        if ($request->hasFile("intro_screen_two_img")) {
            $img = $request->file("intro_screen_two_img");
            $img->store('public/admin/setting');
            $input['intro_screen_two_img'] = $img->hashName();

        }
        if ($request->hasFile("intro_screen_three_img")) {
            $img = $request->file("intro_screen_three_img");
            $img->store('public/admin/setting');
            $input['intro_screen_three_img'] = $img->hashName();

        }

        $setting = $this->settingRepository->create($input);

        Flash::success('Setting saved successfully.');

        return redirect(route('admin.settings.index'));
    }

    /**
     * Display the specified Setting.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified Setting.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $setting = Setting::find($id);

        if (empty($setting)) {
            Flash::error('Setting not found');

            return redirect(route('admin.settings.index'));
        }
//        Flash::success('Setting updated successfully.');
        return view('admin.settings.edit', compact('setting'))->with('info', 'Setting updated successfully.');
    }

    /**
     * Update the specified Setting in storage.
     *
     * @param int $id
     * @param UpdateSettingRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSettingRequest $request)
    {

        $input = $request->all();
        $setting = Setting::find($id);
        if (empty($setting)) {
            Flash::error('Setting not found');

            return redirect(route('admin.settings.index'));
        }
        if ($request->hasFile("app_logo")) {
            $img = $request->file("app_logo");
            if (Storage::exists('public/admin/setting' . $setting->app_logo)) {
                Storage::delete('public/admin/setting' . $setting->app_logo);
            }
            $img->store('public/admin/setting');
            $input['app_logo'] = $img->hashName();
            $setting->update($input);
        }
        if ($request->hasFile("intro_screen_one_img")) {
            $img = $request->file("intro_screen_one_img");
            if (Storage::exists('public/admin/setting' . $setting->intro_screen_one_img)) {
                Storage::delete('public/admin/setting' . $setting->intro_screen_one_img);
            }
            $img->store('public/admin/setting');
            $input['intro_screen_one_img'] = $img->hashName();
            $setting->update($input);
        }
        if ($request->hasFile("intro_screen_two_img")) {
            $img = $request->file("intro_screen_two_img");
            if (Storage::exists('public/admin/setting' . $setting->intro_screen_two_img)) {
                Storage::delete('public/admin/setting' . $setting->intro_screen_two_img);
            }
            $img->store('public/admin/setting');
            $input['intro_screen_two_img'] = $img->hashName();
            $setting->update($input);
        }
        if ($request->hasFile("intro_screen_three_img")) {
            $img = $request->file("intro_screen_three_img");
            if (Storage::exists('public/admin/setting' . $setting->intro_screen_three_img)) {
                Storage::delete('public/admin/setting' . $setting->intro_screen_three_img);
            }
            $img->store('public/admin/setting');
            $input['intro_screen_three_img'] = $img->hashName();
            $setting->update($input);
        }



        $setting->update($input);
//        $setting = $this->settingRepository->update($request->all(), $id);

        Flash::success('Setting updated successfully.');
        return redirect()->back()->with('info', 'Setting updated successfully!...');
//        return redirect(route('admin.settings.index'));
    }

    /**
     * Remove the specified Setting from storage.
     *
     * @param int $id
     *
     * @return Response
     * @throws \Exception
     *
     */
    public function destroy($id)
    {

    }
}
