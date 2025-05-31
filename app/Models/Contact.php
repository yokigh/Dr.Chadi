<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'address_en',
        'address_ar',
        'location_url',
        'email',
        'phone',
        'facebook_link',
        'instagram_link',
    ];
}
