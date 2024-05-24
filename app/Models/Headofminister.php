<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Headofminister extends Model
{
    use HasFactory;
    protected $fillable = [
        'card_place',
        'name',
        'postname',
        'email',
        'phone',
        'twitter',
        'facebook',
        'instagram',
        'profile_image',
    ];
}
