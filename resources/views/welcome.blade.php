<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-pink-50 to-purple-50">
    <!-- Navigation -->
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-3">
            <div class="flex justify-between items-center">
                <div class="text-2xl font-bold text-pink-600">MonSite</div>
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#" class="text-purple-700 hover:text-pink-500">Accueil</a>
                    <a href="#" class="text-purple-700 hover:text-pink-500">Services</a>
                    <a href="#" class="text-purple-700 hover:text-pink-500">À propos</a>
                    <a href="#" class="text-purple-700 hover:text-pink-500">Contact</a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="/connection" class="text-pink-600 hover:text-pink-500">Connexion</a>
                    <a href="/registre" class="bg-gradient-to-r from-pink-500 to-purple-500 text-white px-4 py-2 rounded-md hover:from-pink-600 hover:to-purple-600">
                        S'inscrire
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="container mx-auto px-6 py-16">
        <div class="flex flex-col-reverse md:flex-row items-center">
            <div class="md:w-1/2 mt-8 md:mt-0">
                <h1 class="text-4xl md:text-6xl font-bold text-purple-800 mb-6">
                    Bienvenue sur notre plateforme
                </h1>
                <p class="text-lg text-gray-600 mb-8">
                    Découvrez notre univers unique et laissez-vous guider par une expérience exceptionnelle.
                </p>
                <div class="flex space-x-4">
                    <button class="bg-gradient-to-r from-pink-500 to-purple-500 text-white px-8 py-3 rounded-lg hover:from-pink-600 hover:to-purple-600">
                        Commencer
                    </button>
                    <button class="border-2 border-pink-500 text-pink-500 px-8 py-3 rounded-lg hover:bg-pink-50">
                        En savoir plus
                    </button>
                </div>
            </div>
            <div class="md:w-1/2">
                <img src="/api/placeholder/600/400" alt="Hero Image" class="rounded-lg shadow-xl">
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="bg-white py-16">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-purple-800 mb-12">Nos Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="p-6 bg-pink-50 rounded-lg">
                    <div class="w-12 h-12 bg-pink-500 rounded-full mb-4"></div>
                    <h3 class="text-xl font-bold text-purple-700 mb-4">Service 1</h3>
                    <p class="text-gray-600">Description détaillée du premier service offert par notre plateforme.</p>
                </div>
                <div class="p-6 bg-purple-50 rounded-lg">
                    <div class="w-12 h-12 bg-purple-500 rounded-full mb-4"></div>
                    <h3 class="text-xl font-bold text-purple-700 mb-4">Service 2</h3>
                    <p class="text-gray-600">Description détaillée du deuxième service offert par notre plateforme.</p>
                </div>
                <div class="p-6 bg-pink-50 rounded-lg">
                    <div class="w-12 h-12 bg-pink-500 rounded-full mb-4"></div>
                    <h3 class="text-xl font-bold text-purple-700 mb-4">Service 3</h3>
                    <p class="text-gray-600">Description détaillée du troisième service offert par notre plateforme.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter Section -->
    <div class="container mx-auto px-6 py-16">
        <div class="bg-gradient-to-r from-pink-500 to-purple-500 rounded-lg p-8 text-center">
            <h2 class="text-2xl font-bold text-white mb-4">Restez informé(e)</h2>
            <p class="text-white mb-6">Inscrivez-vous à notre newsletter pour recevoir nos dernières actualités</p>
            <div class="max-w-md mx-auto flex space-x-4">
                <input type="email" placeholder="Votre email" class="flex-1 px-4 py-2 rounded-lg focus:outline-none">
                <button class="bg-white text-purple-500 px-6 py-2 rounded-lg hover:bg-gray-100">
                    S'inscrire
                </button>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white">
        <div class="container mx-auto px-6 py-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold text-pink-600 mb-4">MonSite</h3>
                    <p class="text-gray-600">Une description courte de votre entreprise et de sa mission.</p>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-purple-700 mb-4">Liens rapides</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-pink-500">Accueil</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-pink-500">À propos</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-pink-500">Services</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-pink-500">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-purple-700 mb-4">Support</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-600 hover:text-pink-500">FAQ</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-pink-500">Aide</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-pink-500">Conditions</a></li>
                        <li><a href="#" class="text-gray-600 hover:text-pink-500">Confidentialité</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-semibold text-purple-700 mb-4">Contact</h4>
                    <ul class="space-y-2">
                        <li class="text-gray-600">contact@monsite.com</li>
                        <li class="text-gray-600">+33 1 23 45 67 89</li>
                        <li class="text-gray-600">Paris, France</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-200 mt-8 pt-8 text-center text-gray-600">
                <p>&copy; 2025 MonSite. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>
</html>