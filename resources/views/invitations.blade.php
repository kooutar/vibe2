<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invitations</title>
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

    <!-- Invitations Section -->
    <div class="container mx-auto px-4 py-8">
        @include('flash-message')
        <div class="max-w-4xl mx-auto">
            <h1 class="text-2xl font-bold text-purple-800 mb-6">Mes invitations</h1>
            
            <!-- Tabs -->
            <div class="mb-6 border-b border-gray-200">
                <ul class="flex flex-wrap -mb-px">
                    <li class="mr-2">
                        <a href="#" class="inline-block p-4 text-pink-600 border-b-2 border-pink-500 rounded-t-lg">
                            Reçues
                        </a>
                    </li>
                    <li class="mr-2">
                        <a href="#" class="inline-block p-4 text-gray-500 hover:text-pink-600 rounded-t-lg">
                            Envoyées
                        </a>
                    </li>
                </ul>
            </div>

            <!-- No Invitations Message (Shown when there are no invitations) -->
          
            {{-- <div class="bg-white rounded-lg shadow-lg p-8 text-center">
                <div class="text-purple-600 text-5xl mb-4">
                    <i class="far fa-envelope-open"></i>
                </div>
                <h2 class="text-xl font-semibold text-purple-700 mb-2">Aucune invitation</h2>
                <p class="text-gray-600">Vous n'avez pas d'invitations pour le moment.</p>
            </div> --}}
           

            <!-- Invitations List -->
            <div class="space-y-6">
               
                @foreach($RequestsEnvoyes as $invitation)
               
                <div class="bg-white rounded-lg shadow-lg p-6 relative">
                    <div class="flex items-start md:items-center flex-col md:flex-row">
                        <!-- Avatar -->
                        <div class="flex-shrink-0 mr-4 mb-4 md:mb-0">
                            <img src="{{ asset('storage/'.$invitation->profile_image) }}" alt="Avatar" 
                                class="w-16 h-16 rounded-full border-2 border-pink-200 object-cover">
                        </div>
                        
                        <!-- Invitation Content -->
                        <div class="flex-grow">
                            <h3 class="text-lg font-semibold text-purple-700 mb-1">
                              {{$invitation->name}}
                            </h3>
                            <p class="text-gray-600 mb-2">
                               
                            </p>
                            <div class="text-sm text-gray-500 mb-4">
                                Reçue le
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="flex space-x-2">
                                <form action="" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-purple-500 text-white px-4 py-2 rounded-lg hover:bg-purple-600 transition-colors flex items-center">
                                        <i class="fas fa-check mr-2"></i> Accepter
                                    </button>
                                </form>
                                
                                <form action="" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition-colors flex items-center">
                                        <i class="fas fa-times mr-2"></i> Refuser
                                    </button>
                                </form>
                            </div>
                        </div>
                        
                        <!-- Status Badge (optional) -->
                        <div class="absolute top-4 right-4">
                            <span class="bg-yellow-100 text-yellow-800 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                En attente
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
                
                <!-- Pagination -->
                {{-- <div class="flex justify-center mt-8">
                    {{ $invitations->links() }}
                </div> --}}
            </div>
          
        </div>
    </div>
</body>
</html>