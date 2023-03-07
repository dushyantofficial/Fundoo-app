<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\User_Rating;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserRatingAPIController extends Controller
{
    public function add_rating_api(Request $request)
    {


        $rated_to = $request->rated_to;
        $driver = Auth::guard('api')->user();


        // check if account exists
        $drivers = User::firstWhere('id', $rated_to);
        if ($driver) {
            if ($driver->role == "DRIVER" || $driver->role == "CUSTOMER") {
                $rules = [
                    'rated_to' => 'required',
                    'star' => 'required',
                    'coment' => 'required',
                ];

                $validate = Validator::make($request->all(), $rules);
                if ($validate->fails()) {
                    return $this->api_error_response("Invalid input data", $validate->errors()->all());
                }
                $input = $request->all();
                $input['rated_by'] = $driver->id;
                $input['status'] = 1;
                $users = User_Rating::create($input);
                return $this->api_success_response("Success !", ['driver' => $users]);
            } else {
                return $this->api_error_response("Only For Driver And Customer Star Rating!...Not Other User");
            }
        } else {
            return $this->api_error_response("Check Your Driver Dose Not Exist!..");
        }
    }


    public function get_driver_rating()
    {

        $driver = Auth::guard('api')->user();
        if ($driver) {
            $users = User_Rating::where('rated_to', $driver->id)->get();
            return $this->api_success_response("Sucecss !", ['driver' => $users]);
        } else {
            return $this->api_error_response("Check Your Driver Dose Not Exist!..Login Here...");
        }
    }

    public function file_upload(Request $request)
    {
        if ($request->hasFile("image")) {
            $img = $request->file("image");
            $img->store('public/admin/images');
            $input['image'] = $img->hashName();
        }
        $image = $input['image'];
        $input['image'] = config('constants.FILE_UPLOAD_PATH.file_path') . 'storage/admin/images/' . $image;
        return response()->json($input);
    }
}
