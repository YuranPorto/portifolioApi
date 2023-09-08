<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class social extends Model
{
    protected $fillable = ["name", "icon", "link"];
    use HasFactory;
}
