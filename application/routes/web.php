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

Route::get('main/', function () {
    return view('principal');
});

Route::get('user',function (){
    return view('testerota');
});

Route::get('user/{id}', function ($id){
    echo $id;
})->name('profile')->where(['id' => '[0-9]+']);

Route::post('user',function (Request $request){
     $url = route('profile', ['id' => $request['id']]);
    return Redirect::to($url);
});

Route::get('basic',function (){
    return view('basic');
});

Route::get('checkdate','HomeController@checkdate');
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

Route::get('/home/user/new',['middleware' => 'admin' ,function(){
    return view('form');
}]);

Route::post('/home/user/new','HomeController@teste');
//Route::post('/user/new','Auth\RegisterController@create');

Route::get('/home/user',['middleware' => 'admin' ,function(){
    return view('listar')->with('users', App\User::paginate(10));
}]);

Route::get('/cache',function(){
    //Cache::put('foo', 'bar',10);
  return Cache::get('foo');

});

Route::get('/home/user/{id}', 'HomeController@edit');

Route::get('/profile',function (){
    die("teste");
});

Route::get('/profile','UserController@profile');
Route::post('/profile','UserController@update_avatar');
Route::delete('/profile','UserController@delete_avatar');
Route::put('/profile','UserController@update_info');
Route::put('/home/user/{id}','UserController@update_info_adm');
Route::get('/profile/changepass',function(){
    return view('newpass');
});

Route::get('/click', function(){
    return view('home');
});
Route::post('/click', function(){
    return view('home');
});
Route::put('/profile/changepass','UserController@updatepass');

Route::post('/userdelete','UserController@userdelete');
