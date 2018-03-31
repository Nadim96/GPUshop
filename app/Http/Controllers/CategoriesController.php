<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;
use DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorieen = Category::all();
        $allProducts = Product::all();
        return view('admin.category.index', compact('categorieen', 'allProducts'));
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
        $categories = Category::count();
        if($categories >= 3){
             return back()->with('fail', 'Maximaal 3 categorieën toegestaan, verwijder een bestaande categorie u een nieuwe wilt toevoegen');
        }else{
            Category::create($request->all());
             return back()->with('success', 'Categorie successvol toegevoegd');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Category::find($id)->products;
        $categoriesNaam = Category::where('id', $id)->get();
        $categorieen = Category::all();
        return view('admin.category.index', compact(['categorieen','products', 'categoriesNaam']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $category_id = Category::findOrFail($id);
         $category_id->delete();

         return redirect('admin/category')->with('success', 'Categorie is successvol verwijderd');
    }
}
