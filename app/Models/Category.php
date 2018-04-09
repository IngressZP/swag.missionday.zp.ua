<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    public function products() {
        return $this->hasMany(Product::class);
    }
}
