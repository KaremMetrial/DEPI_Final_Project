<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->get();
        return view('web.home.index', compact('sliders'));
    }
}
