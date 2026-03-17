<?php

namespace App\Http\Controllers;

use App\Mail\CabEmail;
use App\Mail\PackageQueryEmail;
use App\Mail\PlanTripEmail;
use App\Mail\QuickInquiryEmail;
use App\Models\Cab;
use App\Models\CabBooking;
use App\Models\CallRequest;
use App\Models\Contact;
use App\Models\Destination;
use App\Models\Enquiry;
use App\Models\Faq;
use App\Models\Newsletter;
use App\Models\PackageQuery;
use App\Models\Page;
use App\Models\Section;
use App\Models\TourCategory;
use App\Models\TourPackage;
use App\Models\TourPlan;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\SEOMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use TCG\Voyager\Models\Post;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('nonw3');
    }

    public function index()
    {
        $page = Page::query()->select('title', 'seo_title', 'meta_description', 'meta_keywords')
            ->where('page_type', Page::PAGE_TYPE_HOME)->first();
        if ($page) {
            $title = !empty($page->seo_title) ? $page->seo_title : $page->title;
            SEOMeta::setTitle($title);
            SEOMeta::setDescription($page->meta_description);
            SEOMeta::addKeyword($page->meta_keywords);
        }
        SEOMeta::setCanonical(url('/'));
        $sections = Section::query()->select('title', 'headLine', 'tagLine', 'model')->where('is_active', Section::IS_ACTIVE)->orderBy('order', 'asc')->get();
        return view('site.index', compact('sections'));
    }

    public function submitQuery(Request $request)
    {
        $res = ['status' => false];
        $validData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);

        $enquiry = new Enquiry();
        $enquiry->name = $request->get('name');
        $enquiry->email = $request->get('email');
        $enquiry->phone = $request->get('phone');
        $enquiry->count = $request->get('count');
        $enquiry->start_date = $request->get('start_date');
        $enquiry->end_date = $request->get('end_date');
        $enquiry->destination = $request->get('destination');
        $enquiry->pick_up = $request->get('pick_up');
        $enquiry->drop = $request->get('drop');
        $enquiry->status = Enquiry::STATUS_OPEN;
        if ($enquiry->save()) {
            $res['status'] = true;
            try {
                Mail::to(env('MAIL_TO_ADDRESS'))->send(new QuickInquiryEmail($enquiry));
            } catch (\Exception $exception) {
                Log::error('Submit quick query email fail.');
            }
        }

        return response()->json($res);

    }

    public function submitPlan(Request $request)
    {
        $res = ['status' => false];
        $validData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            //'city' => 'required',
            'drop' => 'required',
            'pick_up' => 'required',
            //'kids' => 'required',
            //'adults' => 'required',
            'location' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'cab_id' => 'required',
        ]);

        $enquiry = new TourPlan();
        $enquiry->name = $request->get('name');
        $enquiry->email = $request->get('email');
        $enquiry->phone = $request->get('phone');
        $enquiry->kids = $request->get('kids');
        $enquiry->city = $request->get('city');
        $enquiry->adults = $request->get('adults');
        $enquiry->pick_up = $request->get('pick_up');
        $enquiry->drop = $request->get('drop');
        $enquiry->location = $request->get('location');
        $enquiry->start_date = $request->get('start_date');
        $enquiry->end_date = $request->get('end_date');
        $enquiry->description = $request->get('description');
        $enquiry->cab_id = $request->get('cab_id');
        $enquiry->status = Enquiry::STATUS_OPEN;
        if ($enquiry->save()) {
            $res['status'] = true;
            try {
                Mail::to(env('MAIL_TO_ADDRESS'))->send(new PlanTripEmail($enquiry));
            } catch (\Exception $exception) {
                Log::error('Submit plan query email fail.');
            }
        }

        return response()->json($res);

    }

    public function submitCab(Request $request)
    {
        $res = ['status' => false];
        $validData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'pick_up' => 'required',
            'adults' => 'required',
            'location' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'cab_id' => 'required',
            'type' => 'required',
        ]);

        $enquiry = new CabBooking();
        $enquiry->name = $request->get('name');
        $enquiry->email = $request->get('email');
        $enquiry->phone = $request->get('phone');
        $enquiry->kids = $request->get('kids');
        $enquiry->type = $request->get('type');
        $enquiry->adults = $request->get('adults');
        $enquiry->pick_up = $request->get('pick_up');
        $enquiry->drop = $request->get('drop');
        $enquiry->location = $request->get('location');
        $enquiry->start_date = $request->get('start_date');
        $enquiry->end_date = $request->get('end_date');
        $enquiry->description = $request->get('description');
        $enquiry->cab_id = $request->get('cab_id');
        $enquiry->status = Enquiry::STATUS_OPEN;
        if ($enquiry->save()) {
            $res['status'] = true;
            try {
                Mail::to(env('MAIL_TO_ADDRESS'))->send(new CabEmail($enquiry));
            } catch (\Exception $exception) {
                Log::error('Submit cab query email fail.');
            }
        }
        return response()->json($res);
    }

    public function submitPackage(Request $request)
    {
        $res = ['status' => false];
        $validData = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'pick_up' => 'required',
            'adults' => 'required',
            'drop' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $cabs = $request->get('cabs');
        if (is_array($cabs) && count($cabs) > 0) {
            $cabs = implode(", ", $cabs);
        }

        $enquiry = new PackageQuery();
        $enquiry->name = $request->get('name');
        $enquiry->email = $request->get('email');
        $enquiry->phone = $request->get('phone');
        $enquiry->kids = $request->get('kids');
        $enquiry->package_id = $request->get('package_id');
        $enquiry->adults = $request->get('adults');
        $enquiry->pick_up = $request->get('pick_up');
        $enquiry->drop = $request->get('drop');
        $enquiry->location = $request->get('location');
        $enquiry->start_date = $request->get('start_date');
        $enquiry->end_date = $request->get('end_date');
        $enquiry->description = $request->get('description');
        $enquiry->cabs = $cabs;
        $enquiry->status = Enquiry::STATUS_OPEN;
        if ($enquiry->save()) {
            $res['status'] = true;
            try {
                Mail::to(env('MAIL_TO_ADDRESS'))->send(new PackageQueryEmail($enquiry));
            } catch (\Exception $exception) {
                Log::error('Submit package email fail.');
            }

        }

        return response()->json($res);

    }

    public function submitContact(Request $request)
    {

        $res = ['status' => false];
        try {
            $validData = $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required|email',
                'message' => 'required'
            ]);

            $enquiry = new Contact();
            $enquiry->name = $request->get('name');
            $enquiry->email = $request->get('email');
            $enquiry->phone = $request->get('phone');
            $enquiry->message = $request->get('message');
            $enquiry->status = Enquiry::STATUS_OPEN;
            if ($enquiry->save()) {
                $res['status'] = true;
            }
        } catch (\Exception $exception) {
            $res = ['status' => false];
        }

        return response()->json($res);

    }

    public function submitCall(Request $request)
    {
        $res = ['status' => false];
        try {
            $validData = $request->validate([
                'phone' => 'required',
            ]);

            $enquiry = new CallRequest();
            $enquiry->phone = $request->get('phone');
            $enquiry->status = Enquiry::STATUS_OPEN;
            if ($enquiry->save()) {
                $res['status'] = true;
            }
        } catch (\Exception $exception) {
            $res = ['status' => false];
        }
        return response()->json($res);
    }

    public function submitNews(Request $request)
    {
        $res = ['status' => false];
        try {
            $validData = $request->validate([
                'email' => 'required|email',
            ]);

            $enquiry = new Newsletter();
            $enquiry->email = $request->get('email');
            if ($enquiry->save()) {
                $res['status'] = true;
            }
        } catch (\Exception $exception) {
            $res = ['status' => false];
        }
        return response()->json($res);
    }

    public function blogPost($slug)
    {
        $post = Post::query()->where('slug', $slug)->first();
        if ($post) {
            $seoData = ['title' => $post->title, 'seo_title' => $post->seo_title,
                'meta_description' => $post->meta_description,
                'meta_keywords' => $post->meta_keywords,
                'url' => url('blog/' .$post->slug),
                'type' => 'article'];
            $this->setSeoData($seoData);
            return view('site.templates.post', compact('post'));
        }
        abort(404);
    }

    public function destination($slug)
    {
        $destination = Destination::query()->with('tourPackages')
            ->where('is_active', Destination::IS_ACTIVE_YES)
            ->where('slug', $slug)
            ->first();
        $tourPackages = $destination->tourPackages;
        if ($destination) {
            $seoData = ['title' => $destination->title, 'seo_title' => $destination->seo_title,
                'meta_description' => $destination->meta_description,
                'meta_keywords' => $destination->meta_keywords,
                'url' => url('destination/' .$destination->slug),
                'type' => 'WebPage'];
            $this->setSeoData($seoData);
            return view('site.templates.destination', compact('destination', 'tourPackages'));
        }
        abort(404);
    }

    public function tourPackage($slug)
    {
        $package = TourPackage::query()->where('slug', $slug)->where('is_active', TourPackage::IS_ACTIVE_YES)->first();
        if ($package) {

            $seoData = ['title' => $package->title, 'seo_title' => $package->seo_title,
                'meta_description' => $package->meta_description,
                'meta_keywords' => $package->meta_keywords,
                'url' => url('tour-package/' . $package->slug),
                'type' => 'WebPage'];
            $this->setSeoData($seoData);

            $relatedTourPackages = $package->destinations()
                ->with('tourPackagesWithLimit')
                ->limit(1)
                ->get()
                ->pluck('tourPackagesWithLimit')
                ->flatten()
                ->unique();

            return view('site.templates.tour-package-2', compact('package', 'relatedTourPackages'));
        }
        abort(404);
    }

    public function tourCategory($slug)
    {
        $category = TourCategory::query()->where('slug', $slug)->where('is_active', TourPackage::IS_ACTIVE_YES)->first();
        if ($category) {

            $seoData = ['title' => $category->title, 'seo_title' => $category->seo_title,
                'meta_description' => $category->meta_description,
                'meta_keywords' => $category->meta_keywords,
                'url' => url('tour-category/' .$category->slug),
                'type' => 'WebPage'];
            $this->setSeoData($seoData);

            $tourPackages = $category->tourPackages;
            return view('site.templates.tour-category', compact('category', 'tourPackages'));
        }
        abort(400);
    }

    public function allRoutes($slug)
    {
        $page = Page::query()->where('slug', $slug)
            ->where('status', Page::STATUS_ACTIVE)
            ->first();

        if ($page) {
            $view = $page->page_template ? 'site.templates.pages.' . SITE_VERSION . '.' . $page->page_template : 'site.templates.pages.generic';
            if (!view()->exists($view)) {
                $view = 'site.templates.pages.' . $page->page_template;
            }
            $title = $page->title;
            $data = collect();
            if ($page->page_type == Page::PAGE_TYPE_BLOG) {
                $data = Post::query()->where('status', Post::PUBLISHED)->paginate(9);
            }
            if ($page->page_type == Page::PAGE_TYPE_DESTINATION) {
                $data = Destination::query()->withCount('tourPackages')->where('is_active', Destination::IS_ACTIVE_YES)->get();
            }
            if ($page->page_type == Page::PAGE_TYPE_CABS) {
                $data = Cab::query()->where('is_active', Cab::IS_ACTIVE_YES)->get();
            }
            if ($page->page_type == Page::PAGE_TYPE_TOUR_PACKAGES) {
                $data = TourCategory::query()->withCount('tourPackages')->where('is_active', TourCategory::IS_ACTIVE_YES)->get();
                //$data = TourPackage::query()->where('is_active', TourPackage::IS_ACTIVE_YES)->get();
            }
            if ($page->page_type == Page::PAGE_TYPE_FAQ) {
                $data = Faq::query()->where('is_active', Faq::IS_ACTIVE_YES)->get();
            }

            $seoData = ['title' => $page->title, 'seo_title' => $page->seo_title,
                'meta_description' => $page->meta_description,
                'meta_keywords' => $page->meta_keywords,
                'url' => url($page->slug),
                'type' => 'WebPage'];

            $this->setSeoData($seoData);

            return view($view, compact('title', 'data', 'page'));
        }
        abort(404);
    }

    private function setSeoData($data)
    {
        $seoTitle = $data['seo_title'] != null ? $data['seo_title'] : $data['title'];
        SEOMeta::setTitle($seoTitle);
        SEOMeta::setDescription($data['meta_description']);
        SEOMeta::addKeyword($data['meta_keywords']);
        SEOMeta::setCanonical($data['url']);

        OpenGraph::setDescription($data['meta_description']);
        OpenGraph::setTitle($seoTitle);
        OpenGraph::setUrl($data['url']);
        OpenGraph::addProperty('type', $data['type']);
    }
}
