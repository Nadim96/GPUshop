<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class OrderController extends Controller
{
    public function orders($type=''){
    
    	if($type == 'pending'){
    		$orders = Order::where('delivered', '0')->get();
    	}elseif($type == 'delivered'){
    		$orders = Order::where('delivered', '1')->get();
    		$delivered = true;
    	}else{
    		$orders = Order::all();
    	}

    	return view('admin.orders.index',compact('orders','delivered'));
    }

    public function toggleDeliver(Request $request,$orderId)
    {
    	$order = Order::find($orderId);
    	$order->delivered=$request->delivered;


    	if($order->delivered == 1){
	    	$order->save();
	    	return back()->with('success', 'Bestelling is gemarkeerd als bezorgd');
	    }
	    else{
	    	 $order->save();
	    	return back()->with('success', 'Bezorging is gemarkeerd als in behandeling ');
	    }
    }
}
