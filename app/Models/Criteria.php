<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'content'
    ];

    public function PackageCriteria()
    {
        return $this->hasMany('App\Models\PackageCriteria');
    }
}
