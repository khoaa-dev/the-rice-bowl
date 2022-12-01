<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageCriteria extends Model
{
    use HasFactory;

    protected $fillable = [
        'packageId', 'criteriaId'
    ];

    public function Criteria()
    {
        return $this->belongsTo('App\Models\Criteria');
    }

    public function Package()
    {
        return $this->belongsTo('App\Models\Package');
    }
}
