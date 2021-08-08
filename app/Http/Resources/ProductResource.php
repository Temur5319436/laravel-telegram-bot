<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "category" => $this->category,
            "code" => $this->code,
            "price" => $this->price,
            "image_url" => $this->image_url,
            "commentary" => $this->commentary,
            "active" => $this->active,
            "created_at" => $this->created_at(),
        ];
    }
}
