<?php

namespace App\Http\Controllers;

use App\Models\Drivers;
use App\Http\Requests\StoreDriversRequest;
use App\Http\Requests\UpdateDriversRequest;
use Illuminate\Http\Request;

class DriversController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function drivers()
    {
        $data['drivers'] = Drivers::get();
        return view('administrator.drivers', $data);
    }

    public function drivers_add(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
        ]);

        $driver = new Drivers([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'status' => $request->input('status', 'not_ready'),
        ]);
        $driver->save();
        return redirect()->back();

    }
    
    public function drivers_delete($id)
    {
        Drivers::where('id', $id)->delete();
        return redirect()->back();
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
     * @param  \App\Http\Requests\StoreDriversRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDriversRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function show(Drivers $drivers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function edit(Drivers $drivers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDriversRequest  $request
     * @param  \App\Models\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDriversRequest $request, Drivers $drivers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drivers  $drivers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Drivers $drivers)
    {
        //
    }
}
