<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Term_and_conditions extends Model
{
    use HasFactory;

    protected $table="_term_and_conditions";
    protected $fillable = [
        "Subject",
    ];

}
