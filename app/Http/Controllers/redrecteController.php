<?php
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class redrecteController{
    function index(){
        return view('registre');
    }
    function home()
    {
      return view('index');
    }
    function connection(){
        return view('login');
    }
    function dashboard(){
        $user=Auth::user();
        $posts = $user->posts()->latest()->get();
        return view('dashboard',compact('user', 'posts'));
    }
    function showForgotPasswordForm(){
        return view('forgot-password');
    }
    function reset(){
        return view('reset-password');
    }
   

  


}
