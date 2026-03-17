<?php

namespace App\View\Components\Site;

use App\Models\Cab;
use Illuminate\View\Component;

class TourBookingForm extends Component
{
    public $cabs;
    public $tour;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tour)
    {
        $this->tour = $tour;
        $this->cabs = Cab::query()->select('id', 'title')
            ->where('is_active', Cab::IS_ACTIVE_YES)
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.site.tour-booking-form');
    }
}
