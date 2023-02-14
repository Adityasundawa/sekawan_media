<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Drivers;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function rental()
    {
        $data['drivers'] = Drivers::get();
        $data['vehicle'] = Vehicle::get();
      
        $data['orders'] = Order::get();
        return view('administrator.rental',$data);
    }

    public function rental_add(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'drivers' => 'required|string',
            'vehicle' => 'required|string',
            'duration' => 'required|integer',
        ]);
    
        $rental = new Order();
        $rental->name = $request->input('name');
        $rental->email = $request->input('email');
        $rental->driverss_id = $request->input('drivers');
        $rental->vehicles_id = $request->input('vehicle');
        $rental->duration = $request->input('duration');
        $rental->status = "waiting";
        $rental->save();
    
        return redirect()->back();
    }

    public function rental_accept($id)
    {
        Order::where('id', $id)->update([
            'status'=>'approval'
        ]);
        return redirect()->back();
    }
    public function rental_decline($id)
    {
        Order::where('id', $id)->update([
            'status'=>'rejected'
        ]);
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
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
