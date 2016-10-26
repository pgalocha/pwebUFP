<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello/{name}', function($name){
    echo 'Hello again mrs '. $name;
});

Route::get('customer/{id}', function($id){
    $users = DB::table('customers')->get();
    foreach ($users as $user) {
        echo $user->name . " " . $user->id . " ". $user->email ."\n";
    }

    $nome="Pedro";
    $email = DB::table('customers')->where('name', $nome)->value('email');

    echo $email;

     $customer= App\Customer::find($id);

    echo "<pre>";
    print_r($customer);
    echo "</pre>";
    echo "hello my name is " . $customer->name . "\n";

    return response()
        ->json(['name' => $customer->name, 'id' => $customer->id,'email'=> $customer->email]);



});
