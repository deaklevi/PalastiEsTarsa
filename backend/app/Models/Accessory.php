<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessory extends Model
{
    use HasFactory;

    public $timestamps = true;

    public $fillable = [
        "order",
        "accessories_id",
        "name",
        "type",
        "size",
        "recommended_type",
        "manufacturing_technology",
        "image_url",
        "group",
    ];
}
