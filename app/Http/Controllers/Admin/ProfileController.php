<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\City;
use App\Models\Admin\State;
use App\Models\User;
use App\Rule\CurrentPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        $states = State::all();
        return view('auth.profile',compact('states'));
    }

    public function update_profile(Request $request){

        $input = $request->all();
        $user = User::whereId(Auth::id())->first();
        if ($request->hasFile("profile_image")) {
            $img = $request->file("profile_image");
            if (Storage::exists('public/admin/images' . $user->profile_image)) {
                Storage::delete('public/admin/images' . $user->profile_image);
            }
            $img->store('public/admin/images');
            $input['profile_image'] = $img->hashName();
            $user->update($input);
        }
        $user->update($input);
        return redirect()->back()->with('info','Profile Updated SuccessFully!...');
    }

    public function change_password(Request $request){
        $input = $request->all();
        $user = User::whereId(Auth::id())->first();
        $request->validate([
            'current_password' => [new CurrentPassword($user->password)],

            'new_password' => 'min:8',
            'conform_password' => 'same:new_password'
        ]);

        $new_pass['password'] = Hash::make($request->input('new_password'));
        $user->update($new_pass);
        $user->update($input);
        return redirect()->back()->with('info','Change Password SuccessFully!...');
    }

    public function profile_state(Request $request)
    {

        $data = City::where('state_id', $request->cat_id)->pluck('city_name','id');
//        dd($data);
        return response()->json($data);
    }
}
