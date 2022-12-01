<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'provinceId'
    ];

    public function province() {
        return $this->belongsTo('App\Models\Province');
    }

    public function village() {
        return $this->hasMany('App\Models\Village');
    }
}
