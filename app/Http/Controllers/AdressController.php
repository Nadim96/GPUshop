<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Address;
use App\User;
use App\Category;

class AdressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $klantgegevens = Address::all();
        $user_ids = $klantgegevens->pluck('user_id')->unique();
        $gebruikers = User::all();

        return view('admin.klanten.index', compact('gebruikers', 'klantgegevens', 'user_ids'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\m_responsekeys(conn, identifier)
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
        $this->validate($request,[
            'huisnummer'=>'integer',
            ['huisnummer.integer' => 'this is my custom error message for required']
        ]);

        Address::create($request->all());

        return redirect()->route('checkout.saveOrder');
        
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
         $user_id = User::findOrFail($id);
         $user_id->delete();

         return back()->with('success', 'Gebruiker successvol is verwijderd.');
    }
}
