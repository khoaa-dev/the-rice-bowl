<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'id', 'name'
    ];

    public function Food()
    {
        return $this->hasMany('App\Models\Food');
    }
}
