<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Http\Requests\StoreVehicleRequest;
use App\Http\Requests\UpdateVehicleRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function vehicle()
    {
        $data['vehicle'] = Vehicle::get();
        $data['orders'] = Order::get();
        return view('administrator.vehicle', $data);
    }
    public function vehicle_add(Request $request)
    {
        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images/vehicle'), $imageName);
        }else{
            $imageName = 'default.png';
        }

        $vehicle = new Vehicle();
        $vehicle->name = $request->input('name');
        $vehicle->type = $request->input('type');
        $vehicle->image = $request->input('image');
        $vehicle->status = $request->input('status');
        $vehicle->image =  $imageName;
        // Save the object to the database
        $vehicle->save();
        
        return redirect()->back();
    }

    public function vehicle_edit($id)
    {

    }
    public function vehicle_delete($id)
    {
        Vehicle::where('id', $id)->delete();
        return redirect()->back();
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreVehicleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVehicleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVehicleRequest  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVehicleRequest $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
}
