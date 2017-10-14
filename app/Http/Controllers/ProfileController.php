<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
     public function show(User $user){

        return view('profile.show',[
            "profile"=>$user,
            //"threads"=>$user->thread()->paginate(5)
            "activites" =>$user->activity()->with('subject')->get()
        ]);
    }
}
