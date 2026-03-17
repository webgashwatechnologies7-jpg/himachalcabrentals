<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CabBooking extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cab(){
        return $this->hasOne(Cab::class,'id','cab_id');
    }
}
