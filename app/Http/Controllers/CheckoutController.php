<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Order;
use App\User;
use Cart;

class CheckoutController extends Controller
{
    // public function step1()
    // {
    // 	if(Auth::check()){
    // 		return redirect()->route('checkout.shipping');
    // 	}

    // 	return redirect('login');
    // }

    public function shipping()
    {
    	$name = Auth::user()->name;
    	$email = Auth::user()->email;
    	return view('front.shipping-info', compact('name', 'email'));
    }



    public function saveOrder(Request $request){


        $total = str_replace( ',', '', Cart::total());

        if(Cart::count() >= 1){

        $user = Auth::user();


        $order = Order::create([
            'user_id'=>$user->id,
            'total'=>$total,
            'delivered'=>0,
        ]);

        $cartItems = Cart::content();
        foreach($cartItems as $cartItem)
        {
            $order->orderItems()->attach($cartItem->id,[
                'qty'=>$cartItem->qty,
                'total'=>$cartItem->qty*$cartItem->price,

            ]);
        }


        Cart::destroy();
        return redirect('/cart')->with('success', 'Uw bestelling is geplaatst');
        }
        return redirect('/cart')->with('success', 'Er is iets niet goed gegaan, probeer het opnieuw');

    }

}
