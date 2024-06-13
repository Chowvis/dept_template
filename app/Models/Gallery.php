<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
        'images',
    ];
    public function events(){
        return $this->belongsTo(Event::class);
    }
}
