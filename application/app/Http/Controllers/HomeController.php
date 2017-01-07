<?php

namespace App\Http\Controllers;
use App\User as User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            return view('home');
    }

    public function teste(Request $request){
        /*
        echo "<pre>";
        print_r($data);
        echo "</pre>";*/
       // echo $data['name'];
            $data = $request->all();
            User::create([
            'name' => $data['name'],
                'contact' => $data['contact'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        return redirect('home/user');
       // echo $data['contact'];
    }

    public function edit($id)
    {
        $customer = User::find($id);
        // echo $customer->name;
        return view('profile_user_adm', array('user' => $customer ,'id' => $id));

    }



    public function checkdate(Request $request){
        echo "ola";
    }
}
