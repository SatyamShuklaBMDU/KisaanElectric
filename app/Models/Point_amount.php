<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point_amount extends Model
{
    use HasFactory;

    protected $table="point_amount";
    protected $fillable = [
        "electrician",
        "dealer",
        "partner",
    ];
}
