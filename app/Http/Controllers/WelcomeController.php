<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;
use App\Category;
use App\Item;

class WelcomeController extends Controller
{
    public function index(){
    	$sliders = Slider::all();
    	$categories = Category::all();
    	$items = Item::all();
    	return view('welcome',compact('sliders','categories','items',$sliders,$categories,$items));
    }
}
