<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Models\Master;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MakeOrderController extends Controller
{
    public function index() {
        $masters = DB::table('masters')
            ->where('status', 'ACTIVE')
            ->select('id')
            ->get()->pluck('id')->toArray();

        $orders = DB::table('orders')
            ->whereIn('orders.master_id', $masters)
            ->join('users', 'users.master_id', '=', 'orders.master_id')
            ->whereNotNull('users.master_id')

            ->select('orders.id AS order_id',
                'users.master_id',
                'users.name AS master_name',
                'orders.order_time')->get();/*;*/
        return view('makeOrder', ['orders' => $orders]);
    }

    public function store(Request $request) {
        $order = Order::create([
            'order_time' => $request->date,
            'user_id' => Auth::id(),
            'master_id' => $request->masterName,
            'comment' => $request->comment
        ]);
        return view('orderMadeSuccessfully', ['order_id' => $order->id]);
    }
}
