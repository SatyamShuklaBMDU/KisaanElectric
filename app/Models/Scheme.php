<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scheme extends Model
{
    use HasFactory;

    protected $table="scheme";

    protected $fillable = [
        "title",
        "image",
        "point",
        "status",
        "for",
        "upto",
    ];
}
