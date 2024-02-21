<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheme_history extends Model
{
    use HasFactory;

    protected $table="scheme_history";
    protected $fillable = [
        'user_id',
        'cin_no',
        'scheme_image',
        'scheme_name',
        'name',
        'point',
        'status',
    ];
}
