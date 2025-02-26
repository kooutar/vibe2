<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    //

    function store(Request $request){
        $user=auth()->user();
        $post = Post::findOrFail($request->post_id);
        $commente=new Comment();
        $commente->id_user=$user->id;
        $commente->id_post=$post->id;
        $commente->commentaire=$request->comment;
       $post->comments()->save($commente);
    }
}
