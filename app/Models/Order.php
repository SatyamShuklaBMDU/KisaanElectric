<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table="order";

    protected $fillable = [
        "id",
        "order_id",
        "user_id",
        "total_amount",
        "status",
        "name",
        "address",
        "cin_no",
        "quantity",
        "assign_id",

    ];

}
