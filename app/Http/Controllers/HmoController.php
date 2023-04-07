<?php

namespace App\Http\Controllers;
use App\Models\Hmo;

use Illuminate\Http\Request;

class HmoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hmos=Hmo::all();


        return view('hmos.index', compact('hmos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view (strtolower('hmos.create'));
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
            'name'=> 'required',
            'type'=> 'required',
            'status'=> 'required',
        ]);

        Hmo::create($request->all());

        return redirect()->route('hmos.index')
        ->with('success', 'HMO created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Hmo $hmo)
    {
        return view('hmos.show', compact('hmo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Hmo $hmo)
    {
        return view('hmos.edit', compact('hmo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hmo $hmo)
    {
        $request->validate([
            'name'=> 'required',
            'type'=> 'required',
            'status'=> 'required',
        ]);

        $hmo->update($request->all());

        return redirect()->route('hmos.index')
        ->with('success', 'HMO updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(HMO $hmo)
    {
        $hmo->delete();

        return redirect()->route('hmos.index')
        ->with('success', 'HMO deleted successfully.');
    }
}
