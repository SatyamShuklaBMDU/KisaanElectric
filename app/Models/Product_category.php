<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_category extends Model
{
    use HasFactory;
    protected $table="category";

    protected $fillable = [
        "series_no",
        "image",
        "category",
    ];

}
