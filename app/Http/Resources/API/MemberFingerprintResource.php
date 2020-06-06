<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class MemberFingerprintResource extends JsonResource
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
            'member_id' => strval($this->member_id),
            'fingerprint_left_thumb' => ($this->fingerprint_left_thumb),
            'fingerprint_right_thumb' => ($this->fingerprint_right_thumb),
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at
            
        ];
    }
}
