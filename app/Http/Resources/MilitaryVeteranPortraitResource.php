<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MilitaryVeteranPortraitResource extends JsonResource
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
            'military_veteran_id' => strval($this->military_veteran_id),
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at
            
        ];
    
    }
}
