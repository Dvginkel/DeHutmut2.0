<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'type'          => 'products',
            'id'            => (string)$this->id,
            'attributes'    => [
                'name' => $this->title,
                'description' => $this->description,
                'color' => $this->color,
                'size' => $this->size,
                'age' => $this->age,
            ],
        ];
    }
}
