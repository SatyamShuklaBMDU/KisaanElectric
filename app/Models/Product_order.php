<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_order extends Model
{
    use HasFactory;

    protected $table="order_product";
    protected $fillable=[
        "order_id",
        "product_name",
        "image",
        "quantity",
        "series",
        "price",
        "size"
    ];
}
