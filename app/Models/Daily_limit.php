<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daily_limit extends Model
{
    use HasFactory;

    protected $table="daily_limit";

    protected $fillable = [
        "electrician",
        "dealer",
        "partner"
    ];


}
