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

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tShirts = Tshirt::orderBy('created_at', 'desc')->get();

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
        $request->validate([
            'img' => 'mimes:jpeg,jpg,png',
            'name' => 'required|max:70',
            'description' => 'max:600',
            'ref_id' => 'required|unique:tshirts|max:12',
            'size_s' => 'nullable|numeric',
            'size_m' => 'nullable|numeric',
            'size_l' => 'nullable|numeric',
            'size_xl' => 'nullable|numeric',
        ]);

        $tShirt = new Tshirt();
        $tShirt->name = $request->input('name');
        $tShirt->description = $request->input('description');
        $tShirt->ref_id = $request->input('ref_id');
        //z$tShirt->img_url = $request->input('img_url');

        if ($request->input('size_s')) {
            $tShirt->size_s = $request->input('size_s');
        } else {
            $tShirt->size_s = 0;
        }
        
        if ($request->input('size_m')) {
            $tShirt->size_m = $request->input('size_m');
        } else {
            $tShirt->size_m = 0;
        }

        if ($request->input('size_l')) {
            $tShirt->size_l = $request->input('size_l');
        } else {
            $tShirt->size_l = 0;
        }

        if ($request->input('size_xl')) {
            $tShirt->size_xl = $request->input('size_xl');
        } else {
            $tShirt->size_xl = 0;
        }
        
        if ($request->file('img')) {
            try {
                $tShirt->img = time().'.'.$request->file('img')->getClientOriginalExtension();
                $request->img->move(public_path('assets/tshirts/'), $tShirt->img);
            } catch (\Exception $e) {
                //
            }
        }

        $tShirt->save();

        return redirect('dashboard/t-shirts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tshirt  $tshirt
     * @return \Illuminate\Http\Response
     */
    public function show($ref_id)
    {
        $tShirt = Tshirt::where('ref_id', $ref_id)->first();

        return view('tshirts/show')->with('tShirt', $tShirt);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tshirt  $tshirt
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tShirt = Tshirt::where('ref_id', $id)->first();

        return view('tshirts/edit')->with('tShirt', $tShirt);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tshirt  $tshirt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ref_id)
    {
        $request->validate([
            'img' => 'mimes:jpeg,jpg,png',
            'name' => 'required|max:70',
            'description' => 'max:600',
            'ref_id' => 'required|unique:tshirts->ignore($ref_id)|max:12',
            'size_s' => 'nullable|numeric',
            'size_m' => 'nullable|numeric',
            'size_l' => 'nullable|numeric',
            'size_xl' => 'nullable|numeric',
        ]);

        $tShirt = Tshirt::where('ref_id', $ref_id)->first();
        $tShirt->name = $request->input('name');
        $tShirt->description = $request->input('description');
        $tShirt->ref_id = $request->input('ref_id');
        //z$tShirt->img_url = $request->input('img_url');

        if ($request->input('size_s')) {
            $tShirt->size_s = $request->input('size_s');
        } else {
            $tShirt->size_s = 0;
        }
        
        if ($request->input('size_m')) {
            $tShirt->size_m = $request->input('size_m');
        } else {
            $tShirt->size_m = 0;
        }

        if ($request->input('size_l')) {
            $tShirt->size_l = $request->input('size_l');
        } else {
            $tShirt->size_l = 0;
        }

        if ($request->input('size_xl')) {
            $tShirt->size_xl = $request->input('size_xl');
        } else {
            $tShirt->size_xl = 0;
        }

        if ($request->file('img')) {
            try {
                $tShirt->img = time().'.'.$request->file('img')->getClientOriginalExtension();
                $request->img->move(public_path('assets/tshirts/'), $tShirt->img);
            } catch (\Exception $e) {
                //
            }
        }

        $tShirt->save();

        return redirect('dashboard/t-shirts');
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
        return redirect('dashboard/t-shirts');
    }
}
