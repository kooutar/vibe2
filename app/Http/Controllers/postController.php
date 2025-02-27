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



       
        $post->delete();

        return redirect()->back()->with('success', 'Post supprimé avec succès.');
    }

    public function update(Request $request, $id) {
       
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        
        $post = Post::find($id);
        if (!$post) {
            return redirect()->back()->with('error', 'Post non trouvé.');
        }

       
        $post->update([
            'titre' => $request->title,
            'text' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Post mis à jour avec succès.');
    }

    public function getAllPosts()
    {
      
        $user = auth()->user();
    
        
     
        $friendIds = $user->friends()->pluck('sender_id')->toArray(); 
    
      
        $friendIds[] = $user->id;
    
       
        $posts = Post::whereIn('id_user', $friendIds)
                     ->orderBy('created_at', 'desc') 
                     ->get();
    
      
        return view('index', compact('posts'));
    }
    public function getPostUsr($id){
        $posts = Post::with(['comments.user'])->whefindOrFail($id);
         return view('profile', compact('posts'));
    }
   


}
