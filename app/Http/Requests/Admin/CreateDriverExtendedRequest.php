<?php

namespace App\Http\Requests\Admin;

use App\Models\Admin\DriverExtended;
use Illuminate\Foundation\Http\FormRequest;

class CreateDriverExtendedRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = DriverExtended::$rules;
        $rules['multi_work_type'] = 'nullable';
        $rules['email'] = 'required|regex:/(.+)@(.+)\.(.+)/i|unique:users,email,';
        $rules['mobile_no'] = 'required|unique:users,mobile_no,';
        return $rules;
    }
}
