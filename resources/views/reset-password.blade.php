<!-- reset-password.blade.php -->
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
<form action="{{ route('password.update') }}" method="POST" class="space-y-6">
    @csrf
    <input type="hidden" name="token" value="">
    
    <div>
        <label class="block text-sm font-medium text-purple-700" for="email">
            Email
        </label>
        <input type="email" id="email" name="email" required
               class="mt-1 block w-full px-3 py-2 bg-white border border-pink-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
        @error('email')
            <p class="text-red-500">{{$message}}</p>
        @enderror
    </div>
    
    <div>
        <label class="block text-sm font-medium text-purple-700" for="password">
            Nouveau mot de passe
        </label>
        <input type="password" id="password" name="password" required
               class="mt-1 block w-full px-3 py-2 bg-white border border-pink-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
        @error('password')
            <p class="text-red-500">{{$message}}</p>
        @enderror
    </div>
    
    <div>
        <label class="block text-sm font-medium text-purple-700" for="password_confirmation">
            Confirmer le mot de passe
        </label>
        <input type="password" id="password_confirmation" name="password_confirmation" required
               class="mt-1 block w-full px-3 py-2 bg-white border border-pink-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
    </div>
    
    <button type="submit"
            class="w-full py-3 px-4 border border-transparent rounded-md shadow-sm text-white bg-gradient-to-r from-pink-500 to-purple-500 hover:from-pink-600 hover:to-purple-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
        Réinitialiser le mot de passe
    </button>
</form>
</div>
        </div>
    </div>
</body>
</html>
