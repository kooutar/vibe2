<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous les Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-gradient-to-br from-pink-50 to-purple-50 min-h-screen">
<!-- Navigation -->
<nav class="bg-white shadow-md">
    <div class="container mx-auto px-6 py-3">
        <div class="flex justify-between items-center">
            <div class="text-2xl font-bold text-pink-600">MonSite</div>
            <div class="flex items-center space-x-4">
                <a href="/index" class="text-purple-700 hover:text-pink-500">Accueil</a>
                <a href="/dashboard" class="text-purple-700 hover:text-pink-500">Profil</a>
                <a href="/Suggestions" class="text-purple-700 hover:text-pink-500">Suggestions</a>
                <a href="/amis" class="text-purple-700 hover:text-pink-500 border-b-2 border-pink-500">Mes Amis</a>
                <a href="/invitations" class="text-purple-700 hover:text-pink-500">Invitations</a>
                <a href="/logout" class="text-purple-700 hover:text-pink-500">Déconnexion</a>
            </div>
        </div>
    </div>
</nav>
<div class="container mx-auto px-4 py-8">
    <!-- Nouvelle section pour créer un post -->
    <div class="max-w-4xl mx-auto mb-8">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="flex items-center mb-4">
                <img src="{{ asset('storage/'.auth()->user()->profile_image) }}"
                     alt="Votre profil"
                     class="w-10 h-10 rounded-full object-cover">
                <div class="ml-3">
                    <h3 class="text-lg font-semibold text-gray-800">{{ auth()->user()->name }}</h3>
                </div>
            </div>
            
            <form action="{{ route('poste.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <input type="text" 
                           name="title" 
                           placeholder="Titre de votre post" 
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-pink-500 mb-3">
                    <textarea name="content" 
                              placeholder="Qu'avez-vous en tête ?"
                              class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-pink-500" 
                              rows="3"></textarea>
                </div>
                
                <div class="border-t border-gray-200 pt-3">
                    <div class="flex justify-between items-center">
                        <div class="flex space-x-4">
                            <label for="image-upload" class="flex items-center space-x-2 text-gray-600 hover:text-purple-500 cursor-pointer">
                                <i class="fas fa-image"></i>
                                <span>Photo</span>
                                <input id="image-upload" type="file" name="image" class="hidden">
                            </label>
                          
                        </div>
                        <button type="submit" class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition-colors">
                            Publier
                        </button>
                    </div>
                    
                    <!-- Prévisualisation de l'image -->
                    <div id="image-preview" class="hidden mt-3">
                        <div class="relative inline-block">
                            <img id="preview-img" src="#" alt="Prévisualisation" class="max-h-48 rounded-lg">
                            <button type="button" id="remove-image" class="absolute top-2 right-2 bg-gray-800 bg-opacity-50 text-white rounded-full w-8 h-8 flex items-center justify-center hover:bg-gray-900">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
<!-- Main Content -->
<div class="container mx-auto px-4 py-8">
 

    <!-- Posts Grid -->
    <div class="max-w-4xl mx-auto">
        <div class="grid grid-cols-1 gap-6">
            <!-- Post 1 -->
            @foreach($posts as $post)
            <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                <div class="p-6">
                    <!-- Author Info -->
                    <div class="flex items-center mb-4">
                        <img src="{{ asset('storage/'.$post->user->profile_image)}}"
                             alt="Profile"
                             class="w-10 h-10 rounded-full object-cover">
                        <div class="ml-3">
                            <h3 class="text-lg font-semibold text-gray-800">{{$post->user->name}}</h3>
                            <p class="text-sm text-gray-500">{{$post->created_at}}</p>
                        </div>
                    </div>

                    <!-- Post Content -->
                    <h2 class="text-xl font-bold text-purple-800 mb-3">{{$post->titre}}</h2>
                    <p class="text-gray-600 mb-4">{{$post->text}}</p>
                    @if($post->photo_post)
                    <img src="{{ Storage::url($post->photo_post) }}" alt="Post Image" class="img-fluid">
                    @endif
                    <!-- Interaction Buttons -->
                    <div class="flex items-center justify-between border-t pt-4">
                        <div class="flex items-center space-x-4">
                            <form action="{{route('addLike')}}" method="POST">
                                @csrf
                                <input type="hidden" name="id_post" value="{{$post->id}}">
                                <button id="" class="heartButton flex items-center space-x-1 text-gray-500 hover:text-pink-500 p-2 rounded-md transition-colors duration-200">
                                      
                                     @if($post->likes->contains('id_user',auth()->id()))
                                    <i class="fas fa-heart text-red-500"></i>
                                    @else
                                    <i class="far fa-heart"></i>
                                    @endif
                                    <span>{{$post->likes()->count()}}</span>
                                </button>
                            </form>
                            
                             
                            <button class="flex items-center space-x-1 text-gray-500 hover:text-purple-500">
                                <i class="far fa-comment"></i>
                                <span>{{$post->comments->count()}}</span>
                            </button>
                            <button class="flex items-center space-x-1 text-gray-500 hover:text-blue-500">
                                <i class="far fa-share-square"></i>
                            </button>
                        </div>
                       
                    </div>

                    <!-- Comments Section -->
                    <div class="comments-section hidden mt-4 border-t pt-4">
                        
                        <form class="mb-4" action="{{ route('addComment')}}" method="POST">
                            @csrf
                            <input type="hidden" name="post_id" value="{{$post->id}}">
                                <textarea  name="comment" placeholder="Ajouter un commentaire..."
                                          class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-pink-500"
                                          rows="2"></textarea>
                            <button class="mt-2 bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600">
                                Commenter
                            </button>
                        </form>
                        <!-- Sample Comment -->
                        @if($post->comments->count()>0)
                           @forEach($post->comments as $comment)
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3">
                                <img src="{{ asset('storage/'.$comment->user->profile_image)}}"
                                     alt="Commenter"
                                     class="w-8 h-8 rounded-full">
                                <div class="flex-1 bg-gray-50 rounded-lg p-3">
                                    <div class="flex items-center justify-between">
                                        <h4 class="font-semibold text-gray-800">{{  optional($comment->user)->name}}</h4>
                                        <span class="text-sm text-gray-500">{{$comment->created_at}}</span>
                                    </div>
                                    <p class="text-gray-600">{{$comment->commentaire}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                        
                    </div>
                </div>
            </div>
            @endforeach
            <!-- Post 2 -->


        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            <div class="flex space-x-2">
                <a href="#" class="px-4 py-2 border rounded-lg bg-white hover:bg-gray-50">Précédent</a>
                <a href="#" class="px-4 py-2 border rounded-lg bg-purple-600 text-white">1</a>
                <a href="#" class="px-4 py-2 border rounded-lg bg-white hover:bg-gray-50">2</a>
                <a href="#" class="px-4 py-2 border rounded-lg bg-white hover:bg-gray-50">3</a>
                <a href="#" class="px-4 py-2 border rounded-lg bg-white hover:bg-gray-50">Suivant</a>
            </div>
        </div>
    </div>
</div>

<script>
    // Toggle Comments Section
    document.querySelectorAll('.far.fa-comment').forEach(button => {
        button.addEventListener('click', (e) => {
            const post = e.target.closest('.bg-white');
            const commentsSection = post.querySelector('.comments-section');
            commentsSection.classList.toggle('hidden');
        });
    });

    const heartButtons = document.querySelectorAll('.heartButton');
    
    heartButtons.forEach((heartButton) => {
  let isLiked = false;
  heartButton.addEventListener('click', function () {
    isLiked = !isLiked;

    if (isLiked) {
     
      heartButton.classList.remove('text-gray-500');
      heartButton.classList.add('text-red-500');
      heartButton.querySelector('i').classList.remove('far');
      heartButton.querySelector('i').classList.add('fas');
    } else {
   
      heartButton.classList.remove('text-red-500');
      heartButton.classList.add('text-gray-500');
      heartButton.querySelector('i').classList.remove('fas');
      heartButton.querySelector('i').classList.add('far');
    }
  });
});

    
</script>
</body>
</html>
