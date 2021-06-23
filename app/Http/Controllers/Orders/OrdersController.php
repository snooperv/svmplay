<?php

namespace App\Http\Controllers\Orders;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function index() {
        $orders = DB::table('orders')
            ->where('orders.id', Auth::id())
            ->join('users', 'orders.master_id', '=', 'users.id')
            ->select('orders.id',
                'orders.order_time',
                'users.name AS master_name',
                'orders.comment'
            )
            ->get();
        $ordersAssignedToMe = null;
        $allOrders = null;
        if (Auth::user()->role == 'MASTER') {
            $ordersAssignedToMe = DB::table('orders')
                ->where('master_id', Auth::id())
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->select('orders.id',
                    'orders.order_time',
                    'users.name',
                    'orders.comment'
                )
                ->get();
        }
        else if (Auth::user()->role == 'ADMIN') {
            $allOrders = DB::table('orders')
                ->join('users', 'orders.master_id', '=', 'users.id')
                ->select('orders.id',
                    'orders.order_time',
                    'orders',
                    'users_id',
                    'users.name AS master_name',
                    'orders.comment'
                )
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->select('orders.id',
                    'orders.order_time',
                    'users.name',
                    'orders.comment'
                )->get();
        }
        return view('orders', ['myOrders' => $orders,
            'ordersAssignedToMe' => $ordersAssignedToMe,
            'allOrders' => $allOrders]);
    }
}
