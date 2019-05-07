<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plant;
use Illuminate\Support\Facades\Input;
use Validator;


class PlantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plants = Plant::all();
        return view('plants.index', [
            'plants' => $plants
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Börja med en validering
        $validator = Validator::make($request->all(), [
            'name'    => 'required|unique:plants|max:100',
            'height'  => 'required|numeric'
        ]);

        if ($validator->fails()) {
            return redirect('plants/create')
                ->withErrors($validator)
                ->withInput();
        }

        Plant::create($request->all());

        return redirect('plants');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $plant = Plant::findOrFail($id);
        return view('plants.show', [
            'plant' => $plant
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plant = Plant::find($id);
        return view('plants.edit', [
            'plant' => $plant
        ]);
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
        $plant = Plant::find($id);
        $plant->name = Input::get('name');
        $plant->height = Input::get('height');
        $plant->save();

        return redirect('plants');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plant = Plant::find($id);

        $plant->delete();

        return redirect('plants');
    }
}
