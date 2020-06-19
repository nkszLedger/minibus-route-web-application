<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            
            'id' => strval($this->id),
            'name' => $this->name,
            'surname' => $this->surname,
            'id_number' => strval($this->id_number),
            'email' => $this->email,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at

        ];
    }
}
