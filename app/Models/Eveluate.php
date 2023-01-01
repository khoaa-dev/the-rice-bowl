<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eveluate extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'userId', 'content', 'numberStar', 'category_id', 'created_at'
    ];
}