<?php

namespace App\Http\Controllers;

use App\Category;
use App\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $categories = Category::all();
        $sliders = Slider::all();
        return view('home', compact('categories', 'sliders'));
    }
}

