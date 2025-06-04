<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_en',
        'name_ar',
        'desc_ar',
        'desc_en',
        'image',
        'images',
        'video',
    ];

    protected $casts = [
        'images' => 'array',
    ];
}
