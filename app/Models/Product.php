<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

//use App\Models\Category;

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

        public function category()
        {
            return $this->belongsTo(related: Category::class, foreignKey: 'categories_id', ownerKey: 'id');
        }

        public function productImages()
        {
            return $this->hasMany(ProductGallery::class);
        }

        public function productSizes()
        {
            return $this->hasMany(ProductSize::class);
        }

        public function productOptions()
        {
            return $this->hasMany(ProductOption::class);
        }
    }
