<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('public.public_master');
    }

    public function authUser(){
        return response ()->json([
            'user' => \Auth::user()
         ],200);
    }

    public function userList()
    {
       $user_list = User::paginate(5);
       return response()->json([
          'user_list' => $user_list
       ]);
    }
}
