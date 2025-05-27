<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name_en',
        'name_ar',
        'desc_en',
        'desc_ar',
        'image',
        'images',
        'price',
    ];
    protected $casts = [
        'images' => 'array', // تحويل الصور إلى مصفوفة عند الاسترجاع
    ];
    /**
     * Get the category that owns the product.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
