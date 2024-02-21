<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table="product";

    protected $fillable = [
        "name",
        "series",
        "category",
        "price",
        "code",
        "module_size",
        "size",
        "dimension",
        "description",
        "image",
        "images",
    ];

}
