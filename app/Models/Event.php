<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_en',
        'name_ar',
        'desc_en',
        'desc_ar',
        'start_date',
        'end_date',
        'image',
        'images',
    ];

    protected $casts = [
        'images' => 'array',
    ];
}
