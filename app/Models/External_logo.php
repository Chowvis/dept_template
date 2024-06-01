<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class External_logo extends Model
{
    use HasFactory;
    protected $fillable = [
        'url',
        'logoimage',
        'logo_no',
        'name'
    ];
}
