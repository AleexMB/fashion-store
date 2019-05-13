<?php

namespace App\Http\Controllers;

use App\Trousers;
use Illuminate\Http\Request;

class TrousersController extends Controller
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
        $trousers = Trousers::all();

        return view("trousers.index")->with('trousers', $trousers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("trousers.create");
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
            'ref_id' => 'required|unique:trousers|max:12',
            'size_s' => 'nullable|numeric',
            'size_m' => 'nullable|numeric',
            'size_l' => 'nullable|numeric',
            'size_xl' => 'nullable|numeric',
        ]);

        $trousers = new Trousers();
        $trousers->name = $request->input('name');
        $trousers->description = $request->input('description');
        $trousers->ref_id = $request->input('ref_id');

        if ($request->input('size_s')) {
            $trousers->size_s = $request->input('size_s');
        } else {
            $trousers->size_s = 0;
        }
        
        if ($request->input('size_m')) {
            $trousers->size_m = $request->input('size_m');
        } else {
            $trousers->size_m = 0;
        }

        if ($request->input('size_l')) {
            $trousers->size_l = $request->input('size_l');
        } else {
            $trousers->size_l = 0;
        }

        if ($request->input('size_xl')) {
            $trousers->size_xl = $request->input('size_xl');
        } else {
            $trousers->size_xl = 0;
        }
        
        if ($request->file('img')) {
            try {
                $trousers->img = time().'.'.$request->file('img')->getClientOriginalExtension();
                $request->img->move(public_path('assets/trousers/'), $trousers->img);
            } catch (\Exception $e) {
                //
            }
        }

        $trousers->save();

        return redirect('dashboard/trousers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trousers  $trousers
     * @return \Illuminate\Http\Response
     */
    public function show($ref_id)
    {
        $trousers = Trousers::where('ref_id', $ref_id)->first();

        return view('trousers/show')->with('trousers', $trousers);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trousers  $trousers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trousers = Trousers::where('ref_id', $id)->first();

        return view('trousers/edit')->with('trousers', $trousers);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trousers  $trousers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ref_id)
    {
        $request->validate([
            'img' => 'mimes:jpeg,jpg,png',
            'name' => 'required|max:70',
            'description' => 'max:600',
            'ref_id' => 'required|unique:trousers->ignore($ref_id)|max:12',
            'size_s' => 'nullable|numeric',
            'size_m' => 'nullable|numeric',
            'size_l' => 'nullable|numeric',
            'size_xl' => 'nullable|numeric',
        ]);

        $trousers = Trousers::where('ref_id', $ref_id)->first();
        $trousers->name = $request->input('name');
        $trousers->description = $request->input('description');
        $trousers->ref_id = $request->input('ref_id');

        if ($request->input('size_s')) {
            $trousers->size_s = $request->input('size_s');
        } else {
            $trousers->size_s = 0;
        }
        
        if ($request->input('size_m')) {
            $trousers->size_m = $request->input('size_m');
        } else {
            $trousers->size_m = 0;
        }

        if ($request->input('size_l')) {
            $trousers->size_l = $request->input('size_l');
        } else {
            $trousers->size_l = 0;
        }

        if ($request->input('size_xl')) {
            $trousers->size_xl = $request->input('size_xl');
        } else {
            $trousers->size_xl = 0;
        }

        if ($request->file('img')) {
            try {
                $trousers->img = time().'.'.$request->file('img')->getClientOriginalExtension();
                $request->img->move(public_path('assets/trousers/'), $trousers->img);
            } catch (\Exception $e) {
                //
            }
        }

        $trousers->save();

        return redirect('dashboard/trousers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trousers  $trousers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trousers = Trousers::where('_id', $id)->first();
        $trousers->delete();
        return redirect('dashboard/trousers');
    }
}
