<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AccessoryResource extends JsonResource
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
            'order' => $this->order,
            'accessory_id' => $this->accessory_id,
            'name' => $this->name,
            'type' => $this->type,
            'size' => $this->size,
            'recommended_type' => $this->recommended_type,
            'manufacturing_technology' => $this->manufacturing_technology,
            'image_url' => $this->image_url,
            'group' => $this->group,
        ];
    }
}
