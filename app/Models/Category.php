<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en',
        'name_ar',
        'desc_en',
        'desc_ar',
        'image',
        'images',
    ];
    protected $casts = [
        'images' => 'array', // تحويل الصور إلى مصفوفة عند الاسترجاع
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
