<?php

namespace App\Http\Controllers;

use App\Models\like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    //
    public function store(Request $request){
        $validation = $request->validate([
            'id_post'=>'required|integer|exists:posts,id',
        ]);
        $like= new like();
        $like->id_user=Auth::id();
        $like->id_post=$validation['id_post'];
        $like->save();
        return redirect('/index');
    }
}
