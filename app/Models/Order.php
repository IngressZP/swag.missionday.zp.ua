<?php

namespace App\Models;

use App\Models\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'order_status_id',
        'telegram_nick',
        'ingress_nick',
        'email',
        'phone',
        'city',
        'comment',
        'total',
        'delivery',
    ];

    protected $dates = [
        'deleted_at',
    ];

    public function products() {
        return $this->belongsToMany(Product::class)->withPivot(['price','quantity']);
    }

    public function order_status() {
        return $this->belongsTo(OrderStatus::class);
    }
}
