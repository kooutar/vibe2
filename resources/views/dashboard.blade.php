<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
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
                    <a href="/logout" class="text-purple-700 hover:text-pink-500">Déconnexion</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Profile Section -->
    <div class="container mx-auto px-4 py-8">
    @include('flash-message')
        <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Cover Photo -->
            <div class="h-48 bg-gradient-to-r from-pink-300 to-purple-300 relative">
                <button class="absolute bottom-2 right-2 bg-white p-2 rounded-full shadow-lg hover:bg-gray-100">
                    <i class="fas fa-camera text-purple-600"></i>
                </button>
            </div>

            <!-- Profile Info -->

            <div class="relative px-6 py-8">
                <!-- Profile Picture -->
                <div class="relative -mt-24 mb-4">
                    <div class="w-32 h-32 mx-auto relative">

                        <img src="{{ asset('storage/'.$user->profile_image)}}" alt="profile"
                             class="w-full h-full rounded-full border-4 border-white shadow-lg object-cover">
                        <button id="bteUplodeImage" class="absolute bottom-0 right-0 bg-pink-500 p-2 rounded-full shadow-lg hover:bg-pink-600 text-white">
                            <i class="fas fa-camera"></i>
                        </button>
                    </div>
                </div>

                <!-- Name and Bio -->
                <div class="text-center mb-6">
                    <div class="flex justify-center items-center mb-2">
                        <h1 class="text-2xl font-bold text-purple-800">{{ $user->name }}</h1>

                        <button class="ml-2 text-pink-500 hover:text-pink-600">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                    <p class="text-gray-600">{{$user->name }}</p>

                </div>

                <!-- Bio Section -->
                <div class="bg-pink-50 p-4 rounded-lg mb-6 relative">
                    <button class="absolute top-2 right-2 text-pink-500 hover:text-pink-600">
                        <i class="fas fa-edit"></i>
                    </button>
                    <h2 class="text-lg font-semibold text-purple-700 mb-2">Bio</h2>
                    <p class="text-gray-600">
                       {{ $user->bio}}
                    </p>
                </div>

                <!-- Additional Info -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-purple-50 p-4 rounded-lg relative">
                        <button class="absolute top-2 right-2 text-purple-500 hover:text-purple-600">
                            <i class="fas fa-edit"></i>
                        </button>
                        <h3 class="font-semibold text-purple-700 mb-2">Informations de contact</h3>
                        <ul class="space-y-2 text-gray-600">
                            <li><i class="fas fa-envelope mr-2"></i>{{ $user->email }}</li>
                            <li><i class="fas fa-phone mr-2"></i>+33 6 12 34 56 78</li>
                            <li><i class="fas fa-map-marker-alt mr-2"></i>Paris, France</li>
                        </ul>
                    </div>

                    <div class="bg-pink-50 p-4 rounded-lg relative">
                        <button class="absolute top-2 right-2 text-pink-500 hover:text-pink-600">
                            <i class="fas fa-edit"></i>
                        </button>
                        <h3 class="font-semibold text-purple-700 mb-2">Réseaux sociaux</h3>
                        <ul class="space-y-2 text-gray-600">
                            <li><i class="fab fa-twitter mr-2"></i>@mariedupont</li>
                            <li><i class="fab fa-linkedin mr-2"></i>marie-dupont</li>
                            <li><i class="fab fa-instagram mr-2"></i>@marie.creative</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <!-- Create Post Form -->
            <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
                <h2 class="text-xl font-bold text-purple-800 mb-4">Créer un nouveau post</h2>
                <form action="{{route('poste.store')}}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="title" class="block text-gray-700 font-semibold mb-2">Titre</label>
                        <input type="text" id="title" name="title" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-pink-500">
                    </div>
                    <div>
                        <label for="content" class="block text-gray-700 font-semibold mb-2">Contenu</label>
                        <textarea id="content" name="content" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-pink-500"></textarea>
                    </div>
                    <button type="submit" class="bg-pink-500 text-white px-6 py-2 rounded-lg hover:bg-pink-600 transition-colors">
                        Publier
                    </button>
                </form>
            </div>
            <div class="space-y-6">
                <h2 class="text-xl font-bold text-purple-800 mb-4">Mes posts</h2>

                @foreach($posts as $post)
                <div class="bg-white rounded-lg shadow-lg p-6 relative">
                    <div class="absolute top-4 right-4 flex space-x-2">
                        <button onclick="openEditModal('{{ $post->id }}', '{{ $post->titre }}', '{{ $post->text }}')" class="text-purple-500 hover:text-purple-600">
                            <i class="fas fa-edit"></i>
                        </button>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-pink-500 hover:text-pink-600">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>

                    <h3 class="text-lg font-semibold text-purple-700 mb-2">{{ $post->titre }}</h3>
                    <p class="text-gray-600 mb-4">{{ $post->text }}</p>
                    <div class="text-sm text-gray-500">
                        Publié le {{ $post->created_at->format('d/m/Y à H:i') }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

        </div>
    </div>

    <!-- Edit Post Modal -->
    <div id="editPostModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 w-96">
            <h2 class="text-xl font-bold text-gray-800 mb-4">Modifier le post</h2>
            <form id="editPostForm" action="" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label for="editTitle" class="block text-gray-700 font-semibold mb-2">Titre</label>
                        <input type="text" id="editTitle" name="title" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-pink-500">
                    </div>
                    <div>
                        <label for="editContent" class="block text-gray-700 font-semibold mb-2">Contenu</label>
                        <textarea id="editContent" name="content" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-pink-500"></textarea>
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="button" onclick="closeEditModal()" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
                            Annuler
                        </button>
                        <button type="submit" class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600">
                            Sauvegarder
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div id="uploadModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-96">
        <h2 class="text-xl font-bold text-gray-800 mb-4">Uploader une image</h2>
        <form id="uploadForm" action="{{ route('uploadImage')}}" method ="post" enctype="multipart/form-data">
          @csrf
            <label for="imageInput" class="block text-gray-700 font-semibold mb-2">Choisissez une image :</label>
            <input type="file" id="imageInput" name="image" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-pink-500">
            @error('image')
                <p class="text-red-500">{{$message}}</p>
            @enderror
            <label for="imageInput" class="block text-gray-700 font-semibold mb-2">bio :</label>
            <input type="text" id="imageInput" name="bio" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-pink-500">
            @error('image')
                <p class="text-red-500">{{$message}}</p>
            @enderror
            <div class="mt-4 flex justify-end">
                <button type="button" id="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded-lg mr-2 hover:bg-gray-600">Annuler</button>
                <button type="submit" class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600">Uploader</button>
            </div>
        </form>
    </div>
</div>
<script>
    const bteUplodeImage = document.getElementById('bteUplodeImage');
    const uploadModal = document.getElementById('uploadModal');
    const closeModal = document.getElementById('closeModal');

    // Ouvrir la modale au clic sur le bouton
    bteUplodeImage.addEventListener('click', () => {
        uploadModal.classList.remove('hidden');
    });

    // Fermer la modale au clic sur le bouton "Annuler"
    closeModal.addEventListener('click', () => {
        uploadModal.classList.add('hidden');
    });
    function openEditModal(id, titre, content) {
        // document.getElementById('editPostId').value = id;
        document.getElementById('editTitle').value = titre;
        document.getElementById('editContent').value = content;

        // Modifier l'action du formulaire
        document.getElementById('editPostForm').action = "/posts/" + id;

        document.getElementById('editPostModal').classList.remove('hidden');
    }

    function closeEditModal() {
        document.getElementById('editPostModal').classList.add('hidden');
    }

</script>
</body>
</html>
