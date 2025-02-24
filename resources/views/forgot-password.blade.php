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
<div class="max-w-md mx-auto bg-white rounded-lg shadow-lg overflow-hidden">
<div class="px-6 py-8">
<form action="{{ route('password.email') }}" method="POST" class="space-y-6">
    @csrf
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

    <button type="submit"
            class="w-full py-3 px-4 border border-transparent rounded-md shadow-sm text-white bg-gradient-to-r from-pink-500 to-purple-500 hover:from-pink-600 hover:to-purple-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500">
        Envoyer le lien de réinitialisation
    </button>
</form>
</div>
</div>
</body>
</html>