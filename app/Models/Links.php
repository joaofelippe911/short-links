<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    protected $fillable = ["short_link", "original_link", "description"];
    use HasFactory;
}
