<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use TCG\Voyager\Facades\Voyager;

class ImageController extends Controller
{
    public function index()
    {
        $image = asset('public/images/bg/bg1.jpg');
        $data = 'data:image/jpeg;base64,' . base64_encode(file_get_contents($image));
        echo $data;
        die();
        $slider = Slider::query()->select('image')->first();
        $imagePath = Voyager::image($slider->image);
        $base64Image = 'data:image/jpeg;base64,' . base64_encode(file_get_contents($imagePath));
        return view('site.optimize.index', compact('base64Image'));
    }
}
