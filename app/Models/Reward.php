<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Reward as Mode ;
use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    use HasFactory;
    protected $table = 'product__q_r__code';
    protected $fillable = [
        'Category',
        'Product_Name',
        'points',
        'status',
        'QR_Code',
        'group',
    ];
}
