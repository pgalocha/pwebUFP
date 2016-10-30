<?php

namespace App\Http\Controllers;
use App\Order as Order;
use Illuminate\Http\Request;

use App\Http\Requests;

class OrderController extends Controller
{
    //
    public function index(){
        $orders=Order::all();
        foreach($orders as $order){
            //$customer = App\Customer::find($order->customer_id);
            echo $order->name . "Ordered by " . $order->customer->name . "</br>";

        }

    }

}
