<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_ar',
        'name_en',
        'desc_ar',
        'desc_en',
        'files',
        'type',
    ];
    protected $casts = [
        'files' => 'array', 
    ];
}
