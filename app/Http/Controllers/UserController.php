<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function banUser($id){
        $user = User::query()->where('id',$id)->update(['status'=>'banned']);

        return redirect()->route('adminUsers');
    }
    public function activeUser($id){
        $user = User::query()->where('id',$id)->update(['status'=>'active']);

        return redirect()->route('adminUsers');
    }
}
