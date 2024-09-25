<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FrontendController extends Controller
{
    public function index()
    {
            return view('web.home.index');
    }
}
