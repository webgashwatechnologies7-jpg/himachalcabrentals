<?php
const SITE_VERSION = 'v2';
const MODEL_TOUR_PACKAGE = "App\Models\TourPackage";
const MODEL_POST = "TCG\Voyager\Models\Post";
const MODEL_CAB = "App\Models\Cab";
const MODEL_DESTINATION = "App\Models\Destination";
const MODEL_FEATURE = "App\Models\Feature";
const MODEL_TESTIMONAIL = "App\Models\Testimonail";
const EMAIL_COMPANY_HEADER = 'Himachal Cab Rentals';

const UPGRADE_READY = true;
const WEB_VERSION = 10;

function get_destination_nav_items()
{
    $navLinks = "";
    $destinations = \App\Models\Destination::query()
        ->select('slug', 'title')
        ->where('is_active', \App\Models\Destination::IS_ACTIVE_YES)
        ->get();
    if ($destinations->isNotEmpty()) {
        foreach ($destinations as $link) {
            $navLinks .= '<li><a href="' . url('/destination/' . $link->slug) . '">' . $link->title . '</a></li>';
        }
    }
    return $navLinks;
}

function get_tour_category_list($feature = false)
{
    $navLinks = "";
    $destinations = \App\Models\TourCategory::query()
        ->select('slug', 'title')
        ->where('is_active', \App\Models\TourCategory::IS_ACTIVE_YES)
        ->when($feature, function ($destinations) {
            return $destinations->where('is_featured', \App\Models\TourCategory::IS_ACTIVE_YES);
        })->get();
    if ($destinations->isNotEmpty()) {
        foreach ($destinations as $link) {
            $navLinks .= '<li><a href="' . url('/tour-category/' . $link->slug) . '">' . $link->title . '</a></li>';
        }
    }
    return $navLinks;
}

function get_featured_tour_list()
{
    $navLinks = "";
    $destinations = \App\Models\TourPackage::query()
        ->select('slug', 'title')
        ->where('is_active', \App\Models\TourPackage::IS_ACTIVE_YES)
        ->limit(4)
        ->get();
    if ($destinations->isNotEmpty()) {
        foreach ($destinations as $link) {
            $navLinks .= '<li><a href="' . url('/tour-package/' . $link->slug) . '">' . $link->title . '</a></li>';
        }
    }
    return $navLinks;
}

function parse_inclusion_exclusion_list($element)
{
    $list = [];
    if (!empty($element)) {
        $dom = new DOMDocument();
        $dom->loadHTML($element);

        $liElements = $dom->getElementsByTagName('li');
        foreach ($liElements as $li) {
            $list[] = $li->nodeValue;
        }
    }
    return $list;
}

function formatItinerary($input)
{
    if (!empty($input)) {
        $dom = new DOMDocument();
        $dom->loadHTML($input);

        $paragraphs = $dom->getElementsByTagName('p');
        $data = [];
        foreach ($paragraphs as $paragraph) {
            $data[] = [$paragraph->nodeValue];
        }
    }
}

function get_places_covered($places)
{
    $output = "";
    if (!empty($places)) {
        $data = explode("-", $places);
        foreach ($data as $value) {
            $output .= "<b class='t_places_covered'><i class='fa fa-map-pin'></i> $value</b>";
        }
    }
    return $output;
}

function get_package_image($url)
{
    $image = asset('images/package/default.jpg');
    if (!empty($url)) {
        $image = \TCG\Voyager\Facades\Voyager::image($url);
    }
    return $image;
}

function get_cab_image($url)
{
    $image = asset('images/cabs/default.jpg');
    if (!empty($url)) {
        $image = \TCG\Voyager\Facades\Voyager::image($url);
    }
    return $image;
}

function get_cabs_list()
{
    $cabs = \App\Models\Cab::query()->select("id", "title")->where('is_active', \App\Models\Cab::IS_ACTIVE_YES)->get();
    return $cabs;
}

function get_all_seo_head_tags()
{
    $data = '';
    $tags = \App\Models\SeoTagManager::query()->select('code')->where('type', \App\Models\SeoTagManager::TYPE_HEAD)->where('is_active', \App\Models\SeoTagManager::IS_ACTIVE_YES)->get();
    if ($tags->isNotEmpty()) {
        foreach ($tags as $tag) {
            $data .= $tag->code;
        }
    }
    return $data;
}

function get_all_seo_body_tags()
{
    $data = '';
    $tags = \App\Models\SeoTagManager::query()->select('code')->where('type', \App\Models\SeoTagManager::TYPE_BODY)->where('is_active', \App\Models\SeoTagManager::IS_ACTIVE_YES)->get();
    if ($tags->isNotEmpty()) {
        foreach ($tags as $tag) {
            $data .= $tag->code;
        }
    }
    return $data;
}

function format_itinerary($html)
{
    $days = [];
    // Create a DOMDocument
    $dom = new \DOMDocument();
    $dom->loadHTML($html);
    // Initialize variables to store day information
    $currentDay = null;
    $currentDescription = '';

    // Iterate through DOM elements
    $elements = $dom->getElementsByTagName('*');
    foreach ($elements as $element) {
        if ($element->tagName === 'p' && $element->getElementsByTagName('strong')->length > 0) {
            // Day title
            if ($currentDay !== null) {
                // Store previous day's data
                $days[] = ['title' => $currentDay, 'description' => $currentDescription];
                $currentDescription = '';
            }
            $currentDay = trim($element->textContent);
        } elseif ($element->tagName === 'li') {
            // Day description
            $currentDescription .= $dom->saveHTML($element);
        }
    }

    // Add the last day's data
    if ($currentDay !== null) {
        $days[] = ['title' => $currentDay, 'description' => $currentDescription];
    }

    $package = $days;
    $viewData = "";
    foreach ($package as $key => $data) {
        $viewData .= '<div class="accordion-item plans-accordion-single"><div class="accordion-header" id="planHeading' . $key . '"><div class="accordion-button ' . ($key != 0 ? "collapsed-rm" : "") . '" data-bs-toggle="collapse" data-bs-target="#planCollapse-rm' . $key . '"><div class="paln-index-circle"><h4>' . ($key + 1) . '</h4></div><div class="plan-title"><h5>' . $data['title'] . '</h5></div></div></div><div id="planCollapse' . $key . '" class="accordion-collapse-rm collapse-rm' . ($key == 0 ? " show-rm" : "") . '" data-bs-parent="#planAccordion"><div class="accordion-body plan-info t-itinerary"><ul>' . $data['description'] . '</ul></div></div></div>';
    }

    return $viewData;
}
