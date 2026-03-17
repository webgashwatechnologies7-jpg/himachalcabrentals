<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;

class Cab extends Model
{
    use HasFactory;
    use Resizable;

    const CAB_TYPE_SMALL = 'Small';
    const CAB_TYPE_HATCH_BACK = 'Hatch Back';
    const CAB_TYPE_MEDIUM = 'Medium';
    const CAB_TYPE_SEDAN = 'Sedan';
    const CAB_TYPE_MPV = 'MPV';
    const CAB_TYPE_SUV = 'SUV';
    const CAB_TYPE_VAN = 'Van';

    const FUEL_TYPE_PETROL = 'Petrol';
    const FUEL_TYPE_DIESEL = 'Diesel';
    const FUEL_TYPE_BOTH = 'Petrol/Diesel';

    const AC_TYPE_AC = 'AC';
    const AC_TYPE_NON_AC = 'Non AC';

    const IS_ACTIVE_YES = 1;
    const IS_ACTIVE_NO = 0;
}
