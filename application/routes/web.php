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

/*
Route::get('home', function (){

echo "Welcome Home.";

});
*/

Route::get('hello/{name}', function($name){
    echo "<p><font size='3' color='red'>$name</font></p>";
    echo "<p1>Hello again mrs $name </p1>";
});

Route::get('customer', function () {
    $users = DB::table('customers')->get();
    echo json_encode($users);
});

Route::get('get_customer/{id}', 'CustomerController@get_customer');

Route::get('orders','OrderController@index');


Route::get('customer/{id}', 'CustomerController@show');
/*
        //comentar este pedaço de código para ver return
        $userss = DB::table('customers')->where('id',$id)->first();
        return json_encode($userss);


        $users = DB::table('customers')->get();
        foreach ($users as $user) {
            echo $user->name . " " . $user->id . " ". $user->email ."\n";
        }


        $nome="Pedro";
        $email = DB::table('customers')->where('name', $nome)->value('email');

        echo $email;



        $customer= Customer::find($id);

        echo "<pre>";
        print_r($customer);
        echo "</pre>";
        echo "hello my name is " . $customer->name . "\n";

        $userss = DB::table('customers')->get();

        echo json_encode($users);

        return response()
            ->json(['name' => $customer->name, 'id' => $customer->id,'email'=> $customer->email]);

 */


Route::get('mypage', function(){
    $customers= App\Customer::all();
    $data = array(
        'customers' => $customers
    );
   return view('mypage', $data);
});

Route::get('teste',function (){
    return view('teste');
});



Route::get('testevideo',function(){

return view('testevideo');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
