<?php

namespace App\Http\Requests\Admin;

use App\Models\Admin\CustomerExtend;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerExtendRequest extends FormRequest
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
        $rules = CustomerExtend::$rules;
        $rules['profile_image'] = 'nullable';
        $rules['mobile_no'] = 'nullable';
        return $rules;
    }
}
