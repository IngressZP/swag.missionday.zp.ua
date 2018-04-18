<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $fillable = [
        'title',
    ];

    public function __toString() {
        return $this->title;
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }
}
