<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
    	return view('front.home');
    }

    public function gpus()
    {
    	return view('front.gpus');
    }

    public function gpu()
    {
    	return view('front.gpu');
    }

}
