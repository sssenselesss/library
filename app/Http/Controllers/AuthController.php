<?php

namespace App\Http\Controllers;

use App\Models\User;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function signup(Request $request){

        $validator = \Illuminate\Support\Facades\Validator::make($request->all(),[
            'name'=>'required|max:50',
            'email' =>'required|email|max:50|unique:users,email',
            'pass'=>'required|min:6|same:re_pass'
        ]);

        if($validator->fails()){
            return back()->withErrors($validator->errors())->withInput($request->all());
        }

        $user = User::query()->create(
            ['password'=>Hash::make($request['pass'])]+$validator->validated()
        );

        Auth::login($user);

        return  redirect()->route('main');

    }

    public function signin(Request $request){

            $validataor = \Illuminate\Support\Facades\Validator::make($request->all(),[
                'email'=>'required',
                'password'=>'required'
            ]);

            if($validataor->fails()){
                return back()->withErrors($validataor->errors());
            }

            if(!Auth::attempt($validataor->validated())){
                return back()->withErrors(['invalid' =>'Неверные данные'])->withInput($request->all());
            }

            if(Auth::user()->status === 'banned'){
                Auth::logout();

                return  redirect()->route('banned');
            }

            return redirect()->route('main');
    }

    public function banned(){
        return view('banned');
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('main');
    }
}
