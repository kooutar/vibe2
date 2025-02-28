<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AuthController{
    function store(Request $request){
   
        $validation=$request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);
        // ************//
       
    $basePseudo = str_replace(' ', '', $validation['name']); 
    $pseudo = $basePseudo;
    $count = 1;

   
    while (User::where('pseudo', $pseudo)->exists()) {
        $pseudo = $basePseudo . $count; 
        $count++;
    }
        User::create([
            'name' => $validation['name'],
            'email' => $validation['email'],
            'password' => bcrypt($validation['password']),
            'pseudo'=>$pseudo ,
        ]);

      return  redirect('/connection')->with('message' ,'registre successfully');
    }

    function connection(Request $request){
        // dd($request);
         $validation=$request->validate([
            'email'=>'required|email',
            'password'=>'required',
         ]);

         if (Auth::attempt($validation)) {
          
            return redirect('/dashboard');
        }else{
            return back()->withErrors([
                'email' => 'Les informations de connexion sont incorrectes.',
            ])->onlyInput('email');
        }

    }

    function sendResetLink(Request $request){
        $validate=$request->validate([
            'email' => 'required|email|exists:users,email',
        ]);
        $token = Str::random(60);
        DB::table('password_resets')->where('email', $validate['email'])->delete();

  
      DB::table('password_resets')->insert([
        'email' => $validate['email'],
        'token' => $token,
        'created_at' => now(),
    ]);
        Mail::to($validate['email'])->send(new ResetPasswordMail($token));
        return redirect('/reset');
}
}