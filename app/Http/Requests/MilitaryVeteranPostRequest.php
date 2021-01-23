<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MilitaryVeteranPostRequest extends FormRequest
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
        return [
            'name' => 'required|max:40|regex:/^[\pL\s\-]+$/u',
            'surname' => 'required|max:40|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|email',
            'id_number' => 'required|digits:13',
            'phone_number' => 'required|digits:10',
            'address_line' => 'required|regex:/([- ,\/0-9a-zA-Z]+)/',
            'surburb' => 'required|max:40|regex:/^[\pL\s\-]+$/u',
            'postal_code' =>'required|digits:4',
            // 'city' => 'required',
            // 'province' => 'required',
            // 'gender' => 'required',
            // 'mvregion' => 'required',
            'emergency_contact_name' => 'sometimes',
            'emergency_contact_relationship' => 'sometimes',
            'emergency_contact_number' => 'sometimes|max:10',
            'region_leader_name' => 'sometimes',
            'region_leader_contact_number' => 'sometimes|max:10',
            'number_of_delegated_schools' => 'required|min:0|max:25',
            'list_of_delegated_schools' => 'sometimes|required',
        ];
    }
}
