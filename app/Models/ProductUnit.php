<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductUnit extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function productUnitValue ()
    {
        return $this->hasMany(ProductUnitValue::class, 'product_unit_id', 'id');
    }
}