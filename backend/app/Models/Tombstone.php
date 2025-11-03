<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tombstone extends Model
{
    use HasFactory;

    public $timestamps = true;

    public $fillable = [
        "order",
        "tombstone_id",
        "name",
        "description",
        "image_url",
        "group",
    ];
}
