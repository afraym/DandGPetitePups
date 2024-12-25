<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'address',
        'phone',
        'email',
        'facebook',
        'instagram',
        'twitter',
        'youtube',
        'tiktok',
        'headercode',
        'footercode'
    ];
}
