<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Dimsav\Translatable\Translatable;

class Category extends Model
{
    use Translatable;

    public $translatedAttributes = [
        'title',
    ];

    protected $fillable = [
        'slug',
    ];

    protected $dates = [
        'deleted_at',
    ];

    public function products() {
        return $this->hasMany(Product::class);
    }
}
