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
use Illuminate\Http\Request;
use App\User;

Event::listen('404',function (){
    return Response::error('404');
});


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
    $users = DB::table('users')->get();
    $team= json_encode($users);
    echo "<pre>";
    print_r($users);
    echo "</pre>";
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

Route::get('shufle',function (){
    return view('galocha');
});

Route::get('testevideo',function(){

return view('testevideo');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/home' ,function(){
    if( Auth::user()->isAdmin()){
        return view('/admin');
    }
    return view('/home');
});




Route::get('/registuser','HomeController@regist');

Route::get('/form',['middleware' => 'admin' ,function(){
   if( Auth::user()->isAdmin()){
       return view('form');
   }

}]);

Route::get('/user/new',['middleware' => 'admin' ,function(){
    return view('form');
}]);

Route::post('/user/new','HomeController@teste');
//Route::post('/user/new','Auth\RegisterController@create');

Route::get('/user',['middleware' => 'admin' ,function(){
    return view('listar')->with('users', App\User::paginate(10));
}]);




Route::get('/profile','UserController@profile');
Route::post('/profile','UserController@update_avatar');
Route::delete('/profile','UserController@delete_avatar');
Route::put('/profile','UserController@update_info');
