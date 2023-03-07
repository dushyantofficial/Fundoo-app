<?php

namespace App\Http\Requests\Admin;

use App\Models\Admin\DriverExtended;
use Illuminate\Foundation\Http\FormRequest;

class UpdateDriverExtendedRequest extends FormRequest
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
        $rules['license'] = 'nullable|mimes:png,jpeg,jpg';
        $rules['aadhar_card'] = 'nullable|mimes:png,jpeg,jpg';
        $rules['pancard'] = 'nullable|mimes:png,jpeg,jpg';
        $rules['light_bill'] = 'nullable|mimes:png,jpeg,jpg';
        $rules['multi_work_type'] = 'nullable';
        return $rules;
    }
}
