<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Amis</title>
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
                    <a href="/amis" class="text-purple-700 hover:text-pink-500 border-b-2 border-pink-500">Mes Amis</a>
                    <a href="/invitations" class="text-purple-700 hover:text-pink-500">Invitations</a>
                    <a href="/logout" class="text-purple-700 hover:text-pink-500">Déconnexion</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Friends Section -->
    <div class="container mx-auto px-4 py-8">
        @include('flash-message')
        <div class="max-w-6xl mx-auto">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-purple-800">Mes Amis</h1>
                
                <!-- Search Bar -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text" id="search" class="bg-white border border-gray-300 text-gray-900 rounded-lg pl-10 pr-4 py-2 focus:ring-pink-500 focus:border-pink-500" placeholder="Rechercher un ami...">
                </div>
            </div>
            
            <!-- Filters -->
            <div class="flex mb-6 overflow-x-auto py-2">
                <button class="bg-purple-600 text-white px-4 py-2 rounded-full mr-2 whitespace-nowrap flex items-center">
                    <i class="fas fa-users mr-2"></i> Tous <span class="ml-2 bg-white text-purple-600 rounded-full w-6 h-6 flex items-center justify-center text-xs">{{ count($amis) }}</span>
                </button>
                <button class="bg-white text-gray-700 px-4 py-2 rounded-full mr-2 whitespace-nowrap hover:bg-gray-100 flex items-center">
                    <i class="fas fa-heart mr-2 text-pink-500"></i> Proches
                </button>
                <button class="bg-white text-gray-700 px-4 py-2 rounded-full mr-2 whitespace-nowrap hover:bg-gray-100 flex items-center">
                    <i class="fas fa-birthday-cake mr-2 text-purple-500"></i> Anniversaires
                </button>
                <button class="bg-white text-gray-700 px-4 py-2 rounded-full mr-2 whitespace-nowrap hover:bg-gray-100 flex items-center">
                    <i class="fas fa-clock mr-2 text-blue-500"></i> Récents
                </button>
            </div>

            <!-- No Friends Message (Shown when there are no friends) -->
            @if(count($amis) == 0)
            <div class="bg-white rounded-lg shadow-lg p-8 text-center">
                <div class="text-purple-600 text-5xl mb-4">
                    <i class="far fa-sad-tear"></i>
                </div>
                <h2 class="text-xl font-semibold text-purple-700 mb-2">Aucun ami pour le moment</h2>
                <p class="text-gray-600 mb-4">Commencez à vous connecter avec des personnes pour les voir apparaître ici.</p>
                <a href="/Suggestions" class="bg-pink-500 text-white px-6 py-2 rounded-lg hover:bg-pink-600 transition-colors inline-flex items-center">
                    <i class="fas fa-user-plus mr-2"></i> Voir les suggestions
                </a>
            </div>
            @else
            
            <!-- Friends Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($amis as $ami)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow">
                    <!-- Friend Card -->
                    <div class="relative">
                        <!-- Banner -->
                        <div class="h-24 bg-gradient-to-r from-pink-300 to-purple-300"></div>
                        
                        <!-- Profile Picture -->
                        <div class="absolute top-12 left-6">
                            <img src="{{ asset('storage/'.$ami->profile_image) }}" alt="{{ $ami->name }}" 
                                 class="w-20 h-20 rounded-full border-4 border-white shadow-lg object-cover">
                        </div>
                        
                        <!-- Friend Menu -->
                        <div class="absolute top-4 right-4">
                            <button class="text-white hover:bg-white hover:text-purple-700 p-2 rounded-full transition-colors">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                        </div>
                        
                        <!-- Friend Info -->
                        <div class="pt-16 px-6 pb-6">
                            <h3 class="text-lg font-semibold text-purple-700 mb-1">{{ $ami->name }}</h3>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $ami->bio }}</p>
                            
                            <!-- Action Buttons -->
                            <div class="flex space-x-2">
                                <a href="{{ route('consulteProfile', $ami->id) }}" class="flex-1 bg-purple-500 text-white text-center py-2 rounded-lg hover:bg-purple-600 transition-colors">
                                    <i class="fas fa-user mr-1"></i> Profil
                                </a>
                               
                                <button class="bg-gray-200 text-gray-700 p-2 rounded-lg hover:bg-gray-300 transition-colors">
                                    <i class="fas fa-heart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <!-- Load More Button -->
            <div class="text-center mt-8">
                <button class="bg-white border border-purple-500 text-purple-700 px-6 py-2 rounded-lg hover:bg-purple-50 transition-colors inline-flex items-center">
                    <i class="fas fa-sync mr-2"></i> Voir plus d'amis
                </button>
            </div>
            @endif
        </div>
    </div>
</body>
</html>