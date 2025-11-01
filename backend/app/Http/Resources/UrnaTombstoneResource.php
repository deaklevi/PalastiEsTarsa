<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UrnaTombstoneResource extends JsonResource
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
            "id" => $this->id,
            "order" => $this->order,
            "tombstone_id" => $this->tombstone_id,
            "name" => $this->name,
            "description" => $this->description,
            "image_url" => $this->image_url,
            "group" => $this->group,
        ];
    }
}
