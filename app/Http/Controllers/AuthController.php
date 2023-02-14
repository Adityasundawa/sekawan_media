<?php

namespace App\Http\Controllers;

use App\Models\Drivers;
use App\Models\Order;
use App\Models\User;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function redirect()
    {
       $role_id = auth()->user()->role_id;
       if ($role_id == 1) {
        return redirect('administrator/index');
       }
       if ($role_id == 2) {
        return redirect('agreement/index');
       }
    }

    public function index()
    {
        $data['title'] = "Index";
        $data['vehicle'] = Vehicle::get();
        $data['drivers'] = Drivers::get();
        $data['user'] = User::get();
        $data['order'] = Order::get();
        return view('order', $data);
    }
}
