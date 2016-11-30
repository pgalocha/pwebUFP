<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
//use Intervention\Image\File;
use File;


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
       echo $request['contact'];
    }

}
