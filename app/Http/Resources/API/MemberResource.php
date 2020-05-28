<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class MemberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'id' => $this->id,
            'name' => $this->name,
            'surname' => $this->surname,
            'id_number' => $this->id_number,
            'phone_number' =>$this->phone_number,
            'email' => $this->email,
            'city_id' => $this->city_id,
            'address_line'=> $this->address_line,
            'postal_code' => $this->postal_code,
            'membership_type_id' => $this->membership_type_id,
            'is_member_associated' => $this->is_member_associated,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at

        ];
    }
}
