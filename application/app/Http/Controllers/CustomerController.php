<?php

namespace App\Http\Controllers;

use App\Customer as Customer;
use Illuminate\Http\Request;


use App\Http\Requests;

class CustomerController extends Controller
{
    //
    public function show($id){
        $customer = Customer::find($id);
        $orders = $customer->orders;
        foreach ($orders as $order){
            echo $order->name . "</br>";
        }
    }

    public function get_customer($id){
        //$customer = Customer::find($id);
        $customer = Customer::where('id','=',$id)->first();
        echo $customer->name;

    }
}
