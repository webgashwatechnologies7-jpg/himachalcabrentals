<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageQuery extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function package()
    {
        return $this->hasOne(TourPackage::class,'id','package_id');
    }
}
