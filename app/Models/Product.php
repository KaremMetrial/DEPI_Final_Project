<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'thumb_image',
        'categories_id',
        'short_description',
        'long_description',
        'price',
        'offer_price',
        'sku',
        'seo_title',
        'seo_description',
        'show_at_home',
        'status'
    ];
}
