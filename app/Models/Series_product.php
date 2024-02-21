<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series_product extends Model
{
    use HasFactory;
    protected $table="series_product";
    protected $fillable = [
        "Series",
        "image"
    ];
}
