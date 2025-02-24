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
                <div class="mt-5 mb-5 flex space-x-2">
                    <a class="flex-1 py-2 px-3 bg-gradient-to-r from-pink-500 to-purple-500 text-white text-sm font-medium rounded hover:from-pink-600 hover:to-purple-600 focus:outline-none focus:ring-2 focus:ring-pink-500">
                        Ajouter
                    </a>
                    <a href="{{ route('consulteProfile',$user->id)}}" class="py-2 px-3 border border-gray-300 text-gray-700 text-sm font-medium rounded hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500">
                        Message
                    </a>
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
            
            
        </div>
    </div>

        </div>
    </div>

   

</body>
</html>
