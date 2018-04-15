<?php

/**
 * Custom helpers
 */

use App\Models\Product;

/**
 * @param string $text
 * @return string
 */
function uah($text) {
    return $text . " &#8372;";
}

/**
 * @param int $productId
 * @return string
 */
function productImage($productId) {
    $product = Product::find($productId);
    if ($product) {
        return '/img/' . $product->main_image;
    } else {
        return '/img/noimage.png';
    }
}
