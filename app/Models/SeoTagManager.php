<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoTagManager extends Model
{
    use HasFactory;
    protected $guarded = [];
    const TYPE_HEAD = 'HEAD';
    const TYPE_BODY = 'BODY';
    const IS_ACTIVE_YES = 1;
    const IS_ACTIVE_NO = 0;
}
