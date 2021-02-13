<?php

namespace App\Http\Requests;

use App\BankAccount;
use Illuminate\Foundation\Http\FormRequest;

class MilitaryVeteranUpdateRequest extends FormRequest
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
            'email' => 'required|email|unique:military_veterans,email,'.$this->id,
            'id_number' => 'required|digits:13|unique:military_veterans,id_number,'.$this->id,
            'phone_number' => 'required|digits:10',
            'address_line' => 'required|regex:/([- ,\/0-9a-zA-Z]+)/',
            'surburb' => 'required|max:40|regex:/^[\pL\s\-]+$/u',
            'postal_code' =>'required|digits:4',
            'city' => 'required',
            'province' => 'required',
            'gender' => 'required',
            'mvregion' => 'required',
            'military_formation' => 'required|max:40|regex:/^[\pL\s\-]+$/u',
            'alternative_number' => 'sometimes|max:10',
            'force_number' => 'sometimes|max:25',
            'emergency_contact_name' => 'sometimes|max:40',
            'emergency_contact_relationship' => 'sometimes|max:40',
            'emergency_contact_number' => 'sometimes|max:10',
            'region_leader_name' => 'sometimes|max:40',
            'region_leader_contact_number' => 'sometimes|max:10',
            'number_of_delegated_schools' => 'required|min:0|max:25',
            'list_of_delegated_schools' => 
                [ 
                    'exclude_if:number_of_delegated_schools,0',
                    'required_if:number_of_delegated_schools,gt,1',
                    function ($attribute, $value, $fail) 
                    {
                        if ( count($this->list_of_delegated_schools) != $this->number_of_delegated_schools )
                        {
                            $fail('The '.$attribute.' has incorrect number of schools');
                        }
                    },
                ],
            'bank' => 'required',
            'branch_name' => 'sometimes|max:25',
            'branch_code' => 'sometimes|max:25',
            'account_number' => 'required|unique:bank_accounts,account_number,'.BankAccount::where('account_number', 
                                $this->account_number)->first()->pluck('id')->first(),
            'account_holder' => 'required|max:25',
            'bank_account_type' => 'required',
            'comments' => 'sometimes|max:50'
        ];
    }
}
