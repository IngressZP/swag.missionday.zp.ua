<?php

namespace App\Models;

use Gloudemans\Shoppingcart\Contracts\Buyable;
use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model implements Buyable
{
    use Translatable;
    use SoftDeletes;

    public $translatedAttributes = [
        'name',
        'description',
    ];

    protected $fillable = [
        'price',
        'category_id',
    ];

    protected $dates = [
        'deleted_at',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category() {
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images() {
        return $this->hasMany(Image::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function orders() {
        return $this->belongsToMany(Order::class)->withPivot(['price','quantity']);
    }

    # Buyable implementatio

    /**
     * @param $options
     * @return int|mixed|string
     */
    public function getBuyableIdentifier($options = null) {
        return $this->id;
    }

    /**
     * @param $options
     * @return int|mixed|string
     */
    public function getBuyableDescription($options = null) {
        return $this->name;
    }

    /**
     * @param $options
     * @return int|mixed|string
     */
    public function getBuyablePrice($options = null) {
        return $this->price;
    }
}
