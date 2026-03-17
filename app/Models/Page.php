<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends \TCG\Voyager\Models\Page
{
    use HasFactory;

    const PAGE_TYPE_GENERIC = 'GENERIC_PAGE';
    const PAGE_TYPE_HOME = 'HOME';
    const PAGE_TYPE_ABOUT = 'ABOUT';
    const PAGE_TYPE_CONTACT = 'CONTACT';
    const PAGE_TYPE_DESTINATION = 'DESTINATION';
    const PAGE_TYPE_BLOG = 'BLOG';
    const PAGE_TYPE_PACKAGES = 'PACKAGES';
    const PAGE_TYPE_CABS = 'CABS';
    const PAGE_TYPE_CAB_BOOKING = 'CAB_BOOKING';
    const PAGE_TYPE_PLAN_TRIP = 'PLAN_TRIP';
    const PAGE_TYPE_TOUR_PACKAGES = 'TOUR_PACKAGES';
    const PAGE_TYPE_FAQ = 'FAQ';
}
