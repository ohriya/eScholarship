<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('studentMiddleware');
    }

    public function showUsers(){
        $users = User::all();
        // return $users;
        return view('admin.showUsers', compact('users'));
    }

    public function showOneUser($user_id){
        // return $user_id;
        $user = User::find($user_id);
        return view('admin.showOneUser', compact('user'));
    }

    public function showApplicants(){
        $profiles = Profile::all();
        return view('admin.showApplicants', compact('profiles'));
    }

}
