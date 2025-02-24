<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-pink-100 to-purple-100">
    <div class="container mx-auto px-4 py-8">
       
        <div class="max-w-md mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="px-6 py-8">
            @include('flash-message')
                <h2 class="text-center text-3xl font-bold text-pink-600 mb-8">Connexion</h2>
                
                <form class="space-y-6" action="{{ route('connectionForm')}}" method="Post">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-purple-700" for="email">
                            Adresse email
                        </label>
                        <input type="email" id="email" name="email"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-pink-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                            >
                            @error('email')
                            <p class="text-red-500">{{$message}}</p>
                            @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-purple-700" for="password">
                            Mot de passe
                        </label>
                        <input type="password" id="password" name="password"
                            class="mt-1 block w-full px-3 py-2 bg-white border border-pink-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500"
                            >
                            @error('password')
                            <p class="text-red-500">{{$message}}</p>
                            @enderror
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember-me"
                                class="h-4 w-4 text-pink-600 border-pink-300 rounded focus:ring-pink-500">
                            <label for="remember-me" class="ml-2 block text-sm text-gray-700">
                                Se souvenir de moi
                            </label>
                        </div>
                        <a href="{{route('forgot.password')}}" class="text-sm font-medium text-pink-600 hover:text-pink-500">
                            Mot de passe oublié ?
                        </a>
                    </div>

                    <button type="submit"
                        class="w-full py-3 px-4 border border-transparent rounded-md shadow-sm text-white bg-gradient-to-r from-pink-500 to-purple-500 hover:from-pink-600 hover:to-purple-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
                        Se connecter
                    </button>
                </form>

                <p class="mt-6 text-center text-sm text-gray-600">
                    Pas encore de compte ?
                    <a href="#" class="font-medium text-pink-600 hover:text-pink-500">
                        Inscrivez-vous
                    </a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>