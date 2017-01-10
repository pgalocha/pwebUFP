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
use App\Order;


Event::listen('404',function (){
    return Response::error('404');
});
Route::get('/', function () {
    $cidades = DB::table('cidade')->get();
    //print_r($cidades['0']);
    //$cidade=$cidades['0'];
  //  echo $cidade->id;
   return View::make('principal')->with('cidades',$cidades);
    //return view('principal');
});
Route::get('/cidade',function (){
    $cidade= \Illuminate\Support\Facades\Input::get('cid_id');
    //$campos = DB::table('campos')->where('cidade', $cidade);
    //$cidades = DB::table('campos')->get();
    $cidades = DB::table('campos')->where('cidade', '=', $cidade)->get();
    return $cidades;
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
Route::get('/hi' ,function(Request $request ){
    return $request;
});
Route::post('/hi' ,function(Request $request ){
    return $request;
});
Route::post('/home/upload' ,function(Request $request ){
    return $request;
});
Route::get('/date',function(Request $request){
    $date = $request['date'];
    if($request->ajax()) return Response::json(['success'=> true ]);
});
Route::get('/cache',function(){
    Cache::put('foo',App\Customer::all(),10);
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


Route::get('/outra',function(){
    return view('ajax');
});



Route::post('/schedule',function(Request $request){
   // echo \Illuminate\Support\Facades\Input::get('date');
    $date=\Illuminate\Support\Facades\Input::get('date');
    $campo=\Illuminate\Support\Facades\Input::get('campo');

   $var= App\Order::where('date',$date)->get();

    if ($var->isEmpty()) {
        return Response::json(array(
            'success' => true,
            'info'   => "Está Livre"
        ));

    }
    foreach ($var as $teste){
        if($teste['campo']== $campo){
            return Response::json(array(
                'error' => true,
                'info'   => "Está Ocupado"
            ));
        }
    }
    return Response::json(array(
        'error' => true,
        'info'   => "Está Livre"
    ));

});

Route::post('/ordernew',function(){
    $date=\Illuminate\Support\Facades\Input::get('date');
    $camp=\Illuminate\Support\Facades\Input::get('campo');
    $horas=\Illuminate\Support\Facades\Input::get('hora');

    if(Auth::user()){
        $infocampo = DB::table('campos')->where('nome', '=', "Cucu")->get();

        return Response::json(array(
            'success' => true,
            'auth'   => true,
            'custo' => $infocampo,
        ));

    }else{
        return Response::json(array(
            'error' => true,
            'auth'   => false,
        ));

    }


});

Route::post('/makereserv',function(){
    $date=\Illuminate\Support\Facades\Input::get('date');
    $camp=\Illuminate\Support\Facades\Input::get('campo');
    $horas=\Illuminate\Support\Facades\Input::get('hora');
    $price=\Illuminate\Support\Facades\Input::get('preco');
    $id= Auth::user()->id;

    return Response::json(array(
        'success' => true,
    ));



});
