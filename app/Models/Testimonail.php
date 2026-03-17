<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;

class Testimonail extends Model
{
    use HasFactory;
    use Resizable;
    protected $guarded = [];

    const IS_ACTIVE_YES = 1;
    const IS_ACTIVE_NO = 0;
}
