<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'districtId'
    ];

    public function district() {
        return $this->belongsTo('App\Models\District');
    }
}
