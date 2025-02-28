<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class postController extends Controller
{
    
  

    public function store(Request $request)
    {
        // Validation des données entrantes
        $validation = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:png,jpg,jpeg|max:2048', // Autorise les formats PNG, JPG, JPEG avec une taille maximale de 2 Mo
        ]);
    
        // Gestion du fichier image (si présent)
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Stocker l'image dans le dossier public/images
            $imagePath = $request->file('image')->store('profile_images', 'public');
    
            // Optionnel : Renommer l'image pour éviter les conflits de noms
            // $imagePath = $request->file('image')->storeAs('public/images', uniqid() . '.' . $request->file('image')->extension());
        }
    
        // Création du post avec les données validées et le chemin de l'image
        Post::create([
            'id_user' => Auth::id(),
            'titre' => $validation['title'],
            'text' => $validation['content'],
            'photo_post' => $imagePath, // Enregistre le chemin relatif de l'image
        ]);
    
        // Redirection vers le tableau de bord avec un message de succès
        return redirect('/dashboard')->with('success', 'Le post a été créé avec succès.');
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
