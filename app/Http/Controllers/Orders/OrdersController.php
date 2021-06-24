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
            ->where('orders.user_id', Auth::id())
            ->whereNull('deleted_at')
            ->join('masters', 'orders.master_id', '=', 'masters.id')
            ->join('users', 'masters.user_id', '=', 'users.id')
            ->select('orders.id',
                'orders.order_date',
                'orders.order_time',
                'users.name AS master_name',
                'orders.comment'
            )
            ->get();
        $ordersAssignedToMe = null;
        $allOrders = null;
        if (Auth::user()->role == 'MASTER') {
            $ordersAssignedToMe = DB::table('orders')
                ->where('orders.master_id', Auth::user()->master_id)
                ->whereNull('deleted_at')
                ->join('users', 'orders.user_id', '=', 'users.id')
                ->select('orders.id',
                    'orders.order_date',
                    'orders.order_time',
                    'users.name',
                    'orders.comment'
                )
                ->get();
        }

        else if (Auth::user()->role == 'ADMIN') {
            $allOrders = DB::table('orders')
                ->whereNull('deleted_at')
                ->join('masters', 'orders.master_id', '=', 'masters.id')
                ->join('users', 'masters.user_id', '=', 'users.id')
                ->select('orders.id',
                    'orders.order_date',
                    'orders.order_time',
                    'orders.users_id',
                    'users.name',
                    'orders.comment'
                )
                ->join('users AS u', 'orders.user_id', '=', 'u.id')
                ->select('orders.id',
                    'orders.order_date',
                    'orders.order_time',
                    'u.name AS user_name',
                    'users.name AS master_name',
                    'orders.comment'
                )->get();
        }
        return view('orders', ['myOrders' => $orders,
            'ordersAssignedToMe' => $ordersAssignedToMe,
            'allOrders' => $allOrders]);
    }
}
