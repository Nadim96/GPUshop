<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

class FrontController extends Controller
{
    public function index()
    {
    	return view('front.home');
    }

    public function gpus()
    {
        $gpus = Product::all();
    	return view('front.gpus',compact('gpus'));
    }

    public function gpu()
    {
    	return view('front.gpu');
    }

}
