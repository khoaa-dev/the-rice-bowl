<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderFood extends Model
{
    use HasFactory;

    protected $fillable = [
        'orderId', 'foodId'
    ];

    public function food() {
        return $this->belongsTo('App\Model\Food');
    }
}
