<?php

namespace App\Http\Controllers;

use App\Models\Invitation;
use Illuminate\Http\Request;

use function Termwind\render;

class FreindController extends Controller
{
    //
    public function addFreind(Request $request){
      
        Invitation::create([
          'sender_id'=>$request->userEnvoye_id,
          'receiver_id'=>$request->userRecu_id,
        ]);
        return redirect('/Suggestions')->with('message' ,'send invitation successfully');
    }
}
