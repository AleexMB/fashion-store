<?php

namespace App\Http\Controllers;

use App\Coat;
use Illuminate\Http\Request;

class CoatController extends Controller
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
        $coats = Coat::all();

        return view("coats.index")->with('coats', $coats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("coats.create");
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
            'ref_id' => 'required|unique:coats|max:12',
            'size_s' => 'nullable|numeric',
            'size_m' => 'nullable|numeric',
            'size_l' => 'nullable|numeric',
            'size_xl' => 'nullable|numeric',
        ]);

        $coat = new Coat();
        $coat->name = $request->input('name');
        $coat->description = $request->input('description');
        $coat->ref_id = $request->input('ref_id');

        if ($request->input('size_s')) {
            $coat->size_s = $request->input('size_s');
        } else {
            $coat->size_s = 0;
        }
        
        if ($request->input('size_m')) {
            $coat->size_m = $request->input('size_m');
        } else {
            $coat->size_m = 0;
        }

        if ($request->input('size_l')) {
            $coat->size_l = $request->input('size_l');
        } else {
            $coat->size_l = 0;
        }

        if ($request->input('size_xl')) {
            $coat->size_xl = $request->input('size_xl');
        } else {
            $coat->size_xl = 0;
        }
        
        if ($request->file('img')) {
            try {
                $coat->img = time().'.'.$request->file('img')->getClientOriginalExtension();
                $request->img->move(public_path('assets/coats/'), $coat->img);
            } catch (\Exception $e) {
                //
            }
        }

        $coat->save();

        return redirect('dashboard/coats');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coat  $coat
     * @return \Illuminate\Http\Response
     */
    public function show($ref_id)
    {
        $coat = Coat::where('ref_id', $ref_id)->first();

        return view('coats/show')->with('coat', $coat);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coat  $coat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $coat = Coat::where('ref_id', $id)->first();

        return view('coats/edit')->with('coat', $coat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coat  $coats
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ref_id)
    {
        $request->validate([
            'img' => 'mimes:jpeg,jpg,png',
            'name' => 'required|max:70',
            'description' => 'max:600',
            'ref_id' => 'required|unique:coats->ignore($ref_id)|max:12',
            'size_s' => 'nullable|numeric',
            'size_m' => 'nullable|numeric',
            'size_l' => 'nullable|numeric',
            'size_xl' => 'nullable|numeric',
        ]);

        $coat = Coat::where('ref_id', $ref_id)->first();
        $coat->name = $request->input('name');
        $coat->description = $request->input('description');
        $coat->ref_id = $request->input('ref_id');

        if ($request->input('size_s')) {
            $coat->size_s = $request->input('size_s');
        } else {
            $coat->size_s = 0;
        }
        
        if ($request->input('size_m')) {
            $coat->size_m = $request->input('size_m');
        } else {
            $coat->size_m = 0;
        }

        if ($request->input('size_l')) {
            $coat->size_l = $request->input('size_l');
        } else {
            $coat->size_l = 0;
        }

        if ($request->input('size_xl')) {
            $coat->size_xl = $request->input('size_xl');
        } else {
            $coat->size_xl = 0;
        }

        if ($request->file('img')) {
            try {
                $coat->img = time().'.'.$request->file('img')->getClientOriginalExtension();
                $request->img->move(public_path('assets/coats/'), $coat->img);
            } catch (\Exception $e) {
                //
            }
        }

        $coat->save();

        return redirect('dashboard/coats');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coat  $coat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $coat = Coat::where('_id', $id)->first();
        $coat->delete();
        return redirect('dashboard/coats');
    }
}
