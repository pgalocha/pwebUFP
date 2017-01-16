<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
//use Intervention\Image\File;
use File;
use App\User as User;

use Illuminate\Support\Facades\Hash;




class UserController extends Controller
{
    //
    public function profile(){
        return view('profile', array('user' => Auth::user()));

    }
    /**
     * @return string
     */
    public function update_avatar(Request $request)
    {
        if ($request->hasFile('avatar')){
            $user = Auth::user();
            $avatar = $request->file('avatar');
            $filenameantigo=$user->avatar;
           if(File::exists(public_path('/avatars/' . $filenameantigo)) && $user->avatar != "default.jpg"){
               File::delete(public_path('/avatars/' . $filenameantigo));
               //die("");
           };
            $filename= $user->id . "profile" . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,200)->save(public_path('/avatars/' . $filename));
            $user->avatar= $filename;
            $user->save();
        }
        return view('profile', array('user' => Auth::user()));
    }

    public function delete_avatar(Request $request){
        $user = Auth::user();
            if($user->avatar=='default.jpg'){
                return view('/profile',array('user' => Auth::user()));
            }
            $filenameantigo=$user->avatar;
            File::delete(public_path('/avatars/' . $filenameantigo));
            $filename = "default" . '.' . 'jpg';
            $user->avatar = $filename;
            $user->save();
        return view('profile', array('user' => Auth::user()));
    }

    public function update_info(Request $request){

        $this->validate($request, [
            'contact' => 'required|max:9|min:9',
            'name' => 'required|max:255|min:1',

        ]);
        if( ! Auth::user()->isAdmin()){
            $user = Auth::user();
            $contacto = $request['contact'];
            if($user->contact == $contacto){
                return view('profile', array('user' => Auth::user()));
            }else{
                $user->contact=$contacto;
                $user->save();
            }
            return view('profile', array('user' => Auth::user()));
        }

    }

    public function update_info_adm(Request $request){
        $this->validate($request, [
            'contact' => 'required|max:9|min:9',
            'name' => 'required|max:255|min:1',
            'email' => 'required',
            'password_user'=> 'required|min:5',

        ]);

        $customer = User::find($request['id']);
        $customer->name=$request['name'];
        $customer->id=$request['id'];
        $customer->contact=$request['contact'];
        $customer->email=$request['email'];
        $customer->password=bcrypt($request['password_user']);
        $customer->save();
        return view('profile_user_adm',array('user' => $customer,'id' => $request['id']));

    }

    public function userdelete(Request $request){
        User::find($request['id'])->delete();
    }


    public function updatepass(Request $request){
        $user = Auth::user();

        echo bcrypt($request['password_old']);

        if (Hash::check($request['password_old'],$user->password))
        {
            $user->password=bcrypt($request['password']);
            $user->save();
            return view('/home');
        }else{
            return view('/home');
        }

    }


}
