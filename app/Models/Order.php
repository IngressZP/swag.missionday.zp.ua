<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'telegram_nick',
        'ingress_nick',
        'email',
        'phone',
        'city',
    ];

    public function products() {
        return $this->belongsToMany(Product::class);
    }
}
