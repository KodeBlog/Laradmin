<?php

namespace Larashop\Http\Controllers\Admin;

use Larashop\Models\Order;
use Illuminate\Http\Request;
use Larashop\Http\Controllers\Controller;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        public function index()
        {
            $orders = Order::all();

            $params = [
                'title' => 'Orders Listing',
                'orders' => $orders,
            ];

            return view('admin.orders.orders_list')->with($params);
        }
    }
