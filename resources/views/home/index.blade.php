<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="icon" href="{{ asset('2.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">
    <header class="bg-emerald-600 text-white py-4 px-6 sm:px-10 lg:px-20">
        <div class="container mx-auto flex flex-wrap items-center justify-between">
            <div class="w-full md:w-1/3">
                <div class="flex items-center">
                    <img src="{{ asset('2.png') }}" alt="Terraplus"
                        class="h-10 w-10 mr-2 sm:h-12 sm:w-12 md:h-16 md:w-16 transition-transform duration-300 ease-in-out hover:rotate-12">
                    <h1 class="text-2xl md:text-4xl font-bold">Terra+</h1>
                </div>
                <p class="hidden md:flex items-center">Découvrez nos services et informations pratiques</p>
            </div>
            <div class="w-full md:w-2/3 flex justify-end items-center mt-4 md:mt-0">
                <a href="{{ route('login') }}"
                    class="mr-3 bg-white text-emerald-600 font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:scale-105">Se connecter</a>
                <a href="{{ route('inscription') }}"
                    class="mr-1 bg-gradient-to-r from-pink-500 to-yellow-500 text-white font-bold py-2 px-4 rounded-full shadow-lg hover:from-pink-600 hover:via-red-600 hover:to-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-pink-500 transition duration-300 ease-in-out transform hover:scale-105">S'inscrire</a>
            </div>
        </div>
    </header>
    <section class="bg-gray-200 p-8">
        <div class="container mx-auto">
            <h2 class="text-2xl md:text-4xl font-bold text-center mb-8">Nos services en ligne</h2>
            <div class="flex flex-wrap -mx-3">
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <div class="bg-white p-4 rounded-lg shadow-md"> <img src="https://via.placeholder.com/150"
                            alt="Service 1" class="mb-4">
                        <h3 class="text-xl font-bold mb-2">Service 1</h3>
                        <p class="text-sm">Description du service 1</p>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                    <div class="bg-white p-4 rounded-lg shadow-md"> <img src="https://via.placeholder.com/150"
                            alt="Service 2" class="mb-4">
                        <h3 class="text-xl font-bold mb-2">Service 2</h3>
                        <p class="text-sm">Description du service 2</p>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-3">
                    <div class="bg-white p-4 rounded-lg shadow-md"> <img src="https://via.placeholder.com/150"
                            alt="Service 3" class="mb-4">
                        <h3 class="text-xl font-bold mb-2">Service 3</h3>
                        <p class="text-sm">Description du service 3</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-white p-8">
        <div class="container mx-auto">
            <h2 class="text-2xl md:text-4xl font-bold text-center mb-8">Actualités</h2>
            <div class="flex flex-wrap -mx-3">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <div class="bg-gray-200 p-4 rounded-lg shadow-md">
                        <h3 class="text-xl font-bold mb-2">Titre de l'actualité 1</h3>
                        <p class="text-sm">Description de l'actualité 1</p> <a href="#"
                            class="text-blue-500 hover:text-blue-700">En savoir plus</a>
                    </div>
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <div class="bg-gray-200 p-4 rounded-lg shadow-md">
                        <h3 class="text-xl font-bold mb-2">Titre de l'actualité 2</h3>
                        <p class="text-sm">Description de l'actualité 2</p> <a href="#"
                            class="text-blue-500 hover:text-blue-700">En savoir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="bg-emerald-500 text-white p-8">
        <div class="container mx-auto flex flex-wrap items-center">
            <div class="w-full md:w-1/3">
                <h3 class="text-xl font-bold">Coordonnées</h3>
                <p class="text-sm">Adresse : 1 place de la mairie, 12345 Ville</p>
                <p class="text-sm">Téléphone : 01 22 33 44 55</p>
                <p class="text-sm">Email : <a href="mailto:contact@mairie-ville.fr"
                        class="text-white hover:text-yellow-300">contact@mairie-ville.fr</a></p>
            </div>
            <div class="w-full md:w-1/3">
                <h3 class="text-xl font-bold">Liens utiles</h3>
                <ul>
                    <li><a href="#" class="text-white hover:text-gray-300">À propos de la mairie</a></li>
                    <li><a href="#" class="text-white hover:text-gray-300">Contactez-nous</a></li>
                    <li><a href="#" class="text-white hover:text-gray-300">FAQ</a></li>
                </ul>
            </div>
            <div class="w-full md:w-1/3">
                <h3 class="text-xl font-bold">Suivez-nous</h3>
                <div class="flex"> <a href="#" class="text-white mx-1"><i class="fab fa-facebook-f"></i></a> <a
                        href="#" class="text-white mx-1"><i class="fab fa-twitter"></i></a> <a href="#"
                        class="text-white mx-1"><i class="fab fa-instagram"></i></a> </div>
            </div>
        </div>
    </footer>
</body>

</html>
