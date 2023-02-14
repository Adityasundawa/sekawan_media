<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Drivers;
use App\Models\Order;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class AgreementController extends Controller
{
    public function index()
    {
        $data['title'] = "Index";
        $data['vehicle'] = Vehicle::get();
        $data['driver'] = Drivers::get();
        $data['user'] = User::get();
        $data['order'] = Order::get();
        return view('agreement.index', $data);
    }
}
