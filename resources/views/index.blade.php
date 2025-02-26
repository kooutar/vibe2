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
                <a href="/Suggestions" class="text-purple-700 hover:text-pink-500">Suggestions</a>
                <a href="/invitations" class="text-purple-700 hover:text-pink-500">Invitations</a>
                <a href="/logout" class="text-purple-700 hover:text-pink-500">Déconnexion</a>
            </div>
        </div>
    </div>
</nav>

<!-- Main Content -->
<div class="container mx-auto px-4 py-8">
    <!-- Search and Filter Section -->
    <div class="max-w-4xl mx-auto mb-8">
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <!-- Search Bar -->
                <div class="flex-1">
                    <form class="flex gap-2">
                        <input type="text"
                               placeholder="Rechercher des posts..."
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-pink-500">
                        <button type="submit" class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
                <!-- Filter Dropdown -->
                <div class="flex items-center gap-2">
                    <select class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-pink-500">
                        <option value="recent">Plus récents</option>
                        <option value="popular">Plus populaires</option>
                        <option value="trending">Tendances</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

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

                    <!-- Interaction Buttons -->
                    <div class="flex items-center justify-between border-t pt-4">
                        <div class="flex items-center space-x-4">
                            <button class="flex items-center space-x-1 text-gray-500 hover:text-pink-500">
                                <i class="far fa-heart"></i>
                                <span>42</span>
                            </button>
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
                                <img src="/api/placeholder/32/32"
                                     alt="Commenter"
                                     class="w-8 h-8 rounded-full">
                                <div class="flex-1 bg-gray-50 rounded-lg p-3">
                                    <div class="flex items-center justify-between">
                                        <h4 class="font-semibold text-gray-800"></h4>
                                        <span class="text-sm text-gray-500">Il y a 2 heures</span>
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
</script>
</body>
</html>
