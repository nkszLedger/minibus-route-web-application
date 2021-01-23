<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MilitaryVeteranUpdateRequest extends FormRequest
{
    /**
     * Military Veteran record ID to update
     * 
     */
    protected int $military_veteran_id;

    /** 
     * Set Military Veteran record ID prior validation
     * 
     * @return void
    */
    public function setID($id)
    {
        $this->military_veteran_id = $id;
    }

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
            'email' => 'required|email|unique:military_veterans, email, '.$this->military_veteran_id,
            'id_number' => 'required|digits:13|unique:military_veterans, id_number, '.$this->military_veteran_id,
            'phone_number' => 'required|digits:10',
            'address_line' => 'required|regex:/([- ,\/0-9a-zA-Z]+)/',
            'surburb' => 'required|max:40|regex:/^[\pL\s\-]+$/u',
            'postal_code' =>'required|digits:4',
            'city' => 'required',
            'province' => 'required',
            'gender' => 'required',
            'mvregion' => 'required',
            'emergency_contact_name' => 'sometimes|max:40',
            'emergency_contact_relationship' => 'sometimes|max:40',
            'emergency_contact_number' => 'sometimes|max:10',
            'region_leader_name' => 'sometimes|max:40',
            'region_leader_contact_number' => 'sometimes|max:10',
            'number_of_delegated_schools' => 'required|min:0|max:25',
            'list_of_delegated_schools' => 'sometimes',
        ];
    }
}
