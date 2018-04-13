<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Dimsav\Translatable\Translatable;

class Product extends Model
{
    use Translatable;

    public $translatedAttributes = [
        'name',
        'description'
    ];

    protected $fillable = [
        'price',
        'category_id',
    ];


    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function images() {
        return $this->hasMany(Image::class);
    }

    public function orders() {
        return $this->belongsToMany(Order::class);
    }
}
