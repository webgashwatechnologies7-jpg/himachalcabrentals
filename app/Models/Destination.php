<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;

class Destination extends Model
{
    use HasFactory;
    use Resizable;

    protected $guarded = [];

    const IS_ACTIVE_YES = 1;
    const IS_ACTIVE_NO = 0;

    public function tourPackages()
    {
        return $this->belongsToMany(TourPackage::class, 'tour_package_destinations');
    }

    public function tourPackagesWithLimit()
    {
        return $this->belongsToMany(TourPackage::class, 'tour_package_destinations')->limit(4);
    }
}
