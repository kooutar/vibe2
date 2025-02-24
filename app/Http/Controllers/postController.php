<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class postController extends Controller
{
    //

    public function store(Request $request){
     $validation= $request->validate([
         'title'=>'required',
         'content'=>'required',
      ]);

      $post=post::create([
        'id_user'=>Auth::id(),
        'titre'=>$validation['title'],
        'text'=>$validation['content'],
      ]);
    //   return view('dashboard',compact('post'));

      return redirect('/dashboard');
    }


    public function destroy($id) {
        $post = Post::find($id);

        if (!$post) {
            return redirect()->back()->with('error', 'Post non trouvé.');
        }



        // Supprimer le post
        $post->delete();

        return redirect()->back()->with('success', 'Post supprimé avec succès.');
    }

    public function update(Request $request, $id) {
        // Validation
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Trouver le post
        $post = Post::find($id);
        if (!$post) {
            return redirect()->back()->with('error', 'Post non trouvé.');
        }

        // Mettre à jour le post
        $post->update([
            'titre' => $request->title,
            'text' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Post mis à jour avec succès.');
    }

    public function getAllPosts()
    {
        $posts=Post::all();
        return view('index',compact('posts'));
    }

    public function getPostUsr($id){
         $posts=Post::findOrFail($id);
         return view('profile', compact('posts'));
    }
   


}
