<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CheckoutController extends Controller
{
    public function step1()
    {
    	if(Auth::check()){
    		return redirect()->route('checkout.shipping');
    	}

    	return redirect('login');
    }

    public function shipping()
    {
    	$name = Auth::user()->name;
    	$email = Auth::user()->email;
    	return view('front.shipping-info', compact('name', 'email'));
    }
}
