<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point_history extends Model
{
    use HasFactory;
    protected $table="point_historys";

    protected $fillable = [
        "User_id",
        "QR_Code",
        "Point",
        'Reference',
        "name",
        "cin_no",
        "city",
        "proffession",
        "mobile_no"

    ];


}
