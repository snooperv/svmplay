<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MakeOrder extends Controller
{
    public function index() {
        //Давать только тех мастеров, что доступны!
        //И их время!
        return view('makeOrder');
    }

    public function store(Request $request) {
        Order::create([

        ]);
        $request->masterName;
        $request->date;
        $request->comment;
        Auth::id();

    }
}
