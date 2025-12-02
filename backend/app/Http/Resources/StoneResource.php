<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoneResource extends JsonResource
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
            "name" => $this->name,
            "origin" => $this->origin,
            "color" => $this->color,
            "image_url" => $this->image_url,
            "group" => $this->group,
        ];
    }
}
