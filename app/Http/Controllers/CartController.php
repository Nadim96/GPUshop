<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Product;
use App\Category;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItems = Cart::content();

        $cartIds = $cartItems->pluck('id')->toArray();
        $afbeeldingenCart = Product::find($cartIds);
        return view('cart.index',compact(['cartItems', 'afbeeldingenCart']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $product = Product::find($id);
        Cart::add($id, $product->naam, 1, $product->prijs);
        return back()->with('success', 'Artikel is toegevoegd aan het winkelmandje');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->removeItem){
            $rowId = $request->rowId;
            Cart::remove($rowId);
            return back()->with('success', 'Artikel is succesvol verwijderd uit het winkelmandje');
        }
        else{

        $qty = $request->qty;
        $proId = $request->proId;
        $rowId = $request->rowId;

        Cart::update($rowId, $qty);

        $cartItems = Cart::content();

        return view('cart.upCart', compact('cartItems'));

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::destroy();
        return back()->with('success', 'Alle artikelen zijn succesvol verwijderd uit het winkelmandje');
    }
}
