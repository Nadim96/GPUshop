<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;

class FrontController extends Controller
{
    public function index()
    {
        $gpus = Product::all();
    	return view('front.home',compact('gpus'));
    }

    public function gpus()
    {

        $gpus = Product::all();
        $categories = Category::all();
    	return view('front.gpus',compact('gpus', 'categories'));
    }

    public function gpu(Request $request, $productId)
    {
        //met productId product ophalen en grotere beschrijving

        $singleProduct = Product::where('id', $productId)->get();
        $categorie = Category::where('id', Product::where('id', $productId)->pluck('category_id'))->get();
        $relatedProducts = Product::where('id', '!=', $productId)->get();

    	return view('front.gpu', compact('singleProduct', 'categorie', 'relatedProducts'));
    }

}
