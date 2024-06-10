<?php

namespace V1\Users\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'image' => $this->image ? $this->image_url : null,
            'phone' => $this->phone,
            'roles' => collect($this->roles)->transform(function ($value) {
                return [
                    'id' => $value->id,
                    'name' => $value->name
                ];
            }),
        ];
    }
}
