<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Architecture extends Model
{
    use HasFactory;

    public $timestamps = true;

    public $fillable = [
        "order",
        "name",
        "image_url",
        "group",
    ];
}
