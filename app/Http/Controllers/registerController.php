<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class registerController extends Controller
{
    public function index(){
        return view('auth.register');
    }
    public function store(Request $request){
        //modificar el request
        $request -> request->add(['username'=>Str::slug($request->username)]);
        //validation
        $this->validate($request, [
            'name'=>'required|max:20',
            'username'=>'required|min:3|unique:users|max:10',
            'email'=>'required|unique:users|email|max:60',
            'password'=>'required|confirmed|min:6'
        ]);
            User::create([
                'name'=>$request->name,
                'username'=> $request->username,
                'email'=>$request->email,
                'password'=>Hash::make($request->password)

            ]);
                //authenticate
                auth()->attempt([
                    'email' => $request->email,
                    'password' => $request->password
                ]);
            //redirect
                return redirect()->route('posts.index',auth()->user()->username);
    }





}