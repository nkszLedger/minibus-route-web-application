<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class MemberPortraitResource extends JsonResource
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
            'member_id' => $this->member_id,
            'portrait' => $this->portrait,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at
            
        ];
    }
}
