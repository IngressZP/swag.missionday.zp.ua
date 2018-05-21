<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use Translatable;
    use SoftDeletes;

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
