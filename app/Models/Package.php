<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'content', 'price', 'background', 'detail', 'serviceId', 'menuId'
    ];

    public function Service()
    {
        return $this->belongsTo('App\Model\Service');
    }

    public function PackageCriteria()
    {
        return $this->hasMany('App\Models\PackageCriteria');
    }

    public function Menu()
    {
        return $this->belongsTo('App\Models\Menu');
    }
}
