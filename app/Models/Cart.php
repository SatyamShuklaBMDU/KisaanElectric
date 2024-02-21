<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

protected $table="carts";


    protected $fillable = ['user_id', 'product_id', 'quantity','product_size','series','product_name','price','image'];

    // public function product()
    // {
    //     return $this->belongsTo(Product::class);
    // }
}
