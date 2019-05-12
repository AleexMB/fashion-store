<?php

namespace App\Http\Controllers;

use App\Tshirt;
use Illuminate\Http\Request;

class TshirtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tShirts = Tshirt::all();

        return view("tshirts.index")->with('tShirts', $tShirts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("tshirts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tShirt = new Tshirt();
        $tShirt->name = $request->input('name');
        $tShirt->description = $request->input('description');
        $tShirt->img_url = $request->input('img_url');

        $tShirt->size_s = $request->input('size_s');
        $tShirt->size_m = $request->input('size_m');
        $tShirt->size_l = $request->input('size_l');
        $tShirt->size_xl = $request->input('size_xl');

        $tShirt->save();

        return redirect('t-shirts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tshirt  $tshirt
     * @return \Illuminate\Http\Response
     */
    public function show(Tshirt $tshirt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tshirt  $tshirt
     * @return \Illuminate\Http\Response
     */
    public function edit(Tshirt $tshirt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tshirt  $tshirt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tshirt $tshirt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tshirt  $tshirt
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tShirt = Tshirt::where('_id', $id)->first();
        $tShirt->delete();
        return redirect('t-shirts');
    }
}
