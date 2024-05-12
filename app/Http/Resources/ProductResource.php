<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "product_name" => $this->product_name,
            "sku" => $this->sku,
            "selling_price" => $this->selling_price,
            "regular_price" => $this->regular_price,
            "tax" => $this->tax,
            "discount" => $this->discount,
            "quantity" => $this->quantity,
            "variants" => $this->variants,
            "image" => $this->image,
            "custom_qty" => 1
        ];
    }
}