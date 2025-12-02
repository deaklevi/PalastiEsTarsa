<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stone extends Model
{
    use HasFactory;

    public $timestamps = true;
    
    public $fillable = [
        'order',
        'name',
        'origin',
        'color',
        'image_url',
        'group',
    ];
}
