<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;

class TourPackage extends Model
{
    use HasFactory;
    use Resizable;

    protected $guarded = [];

    const IS_ACTIVE_YES = 1;
    const IS_ACTIVE_NO = 0;

    public function destinations()
    {
        return $this->belongsToMany(Destination::class, 'tour_package_destinations');
    }

    public function getDestinationNamesAttribute()
    {
        return $this->destinations->pluck('title')->implode(', ');
    }

    public function tourCategory()
    {
        return $this->belongsTo(TourCategory::class, 'tour_category_id');
    }
}
