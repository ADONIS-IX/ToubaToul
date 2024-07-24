<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Inscrivez-vous sur Terra+ pour accéder à nos services exclusifs">
    <title>Localite</title>

    <!-- Styles -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

    <!-- Vite Resources -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <x-layout title="Tableau de bord">
        {{-- Nav-side --}}
     <nav class="fixed top-30 left-0 h-full w-64 bg-emerald-900 text-white p-4 space-y-4">
        <h2 class="text-xl font-bold mb-4">Navigation</h2>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('maire.index') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-emerald-300">
                    <i class="fas fa-tachometer-alt mr-2"></i> Tableau de Bord
                </a>
            </li>
            <li>
                <a href="{{ route('profil') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-yellow-500">
                    <i class="fas fa-user mr-2"></i> Mes Informations
                </a>
            </li>
            <li>
                <a href="{{ route('parcelle') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-yellow-500">
                    <i class="fas fa-tree mr-2"></i> Voir les parcelles
                </a>
            </li>
            <li>
                <a href="{{ route('demande') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-yellow-500">
                    <i class="fas fa-folder-open mr-2"></i> Voir les demandes
                </a>
            </li>
            <li>
                <a href="{{ route('localite') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-yellow-500">
                    <i class="fas fa-map-marker-alt mr-2"></i> Ajouter une Localite
                </a>
            </li>
             <li>
                <a href="{{ route('localite') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-yellow-500">
                    <i class="fas fa-map-marker-alt mr-2"></i> Ajouter un Chef de Localite
                </a>
            </li>
            <li>
                <a href="{{ route('lotissement') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-yellow-500">
                    <i class="fas fa-map mr-2"></i> Creer un Lotissement
                </a>
            </li>
            <li>
                <a href="{{ route('support') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-yellow-500">
                    <i class="fas fa-life-ring mr-2"></i> Support
                </a>
            </li>
        </ul>
    </nav>

        {{-- Contenu principal --}}
        <main class="ml-64 flex flex-col items-end justify-start min-h-screen px-6 sm:px-10 lg:px-20">
            {{-- Lien "Attribuer une nouvelle parcelle" --}}
            <a href="#" class="inline-flex group relative justify-center items-center text-zinc-600 text-sm font-bold mb-4">
                <div class="shadow-md flex items-center group-hover:gap-2 bg-gradient-to-br from-lime-200 to-yellow-200 p-3 rounded-full cursor-pointer duration-300">
                    <svg class="w-6 h-6 text-green-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 17h6m-3 3v-6M4.857 4h4.286c.473 0 .857.384.857.857v4.286a.857.857 0 0 1-.857.857H4.857A.857.857 0 0 1 4 9.143V4.857C4 4.384 4.384 4 4.857 4Zm10 0h4.286c.473 0 .857.384.857.857v4.286a.857.857 0 0 1-.857.857h-4.286A.857.857 0 0 1 14 9.143V4.857c0-.473.384-.857.857-.857Zm-10 10h4.286c.473 0 .857.384.857.857v4.286a.857.857 0 0 1-.857.857H4.857A.857.857 0 0 1 4 19.143v-4.286c0-.473.384-.857.857-.857Z"/>
                    </svg>
                    <span class="text-[0px] group-hover:text-sm duration-300 text-green-600">Voir les Localites</span>
                </div>
            </a>



            {{-- Contenu --}}
            <div class="flex w-full max-w-6xl bg-white rounded-lg shadow-md p-8 animate-fade-in">
                {{-- Section Image --}}
                <div class="w-1/3">
                    <img src="{{ asset('home/images/causes/te.JPG') }}" alt="Image Description" class="w-full h-full object-cover rounded-lg">
                </div>

                {{-- Section Formulaire --}}
                <div class="w-2/3 pl-8">
                    <h2 class="text-3xl md:text-4xl font-bold mb-6 text-center">Ajouter une Localite</h2>

                    {{-- Formulaire --}}
                    <form action='{{ route('store') }}' method="POST" class="flex flex-col" aria-label="Formulaire d'inscription" novalidate>
                        @csrf

                        {{-- Section Nom --}}
                        <div class="mb-4 relative">
                            <label for="nom" class="block text-gray-700 mb-2">Nom</label>
                            <input type="text" id="nom" name="nom" value="{{ old('nom') }}"
                                @class([
                                    'border-gray-400',
                                    'border',
                                    'py-2',
                                    'px-4',
                                    'rounded-lg',
                                    'w-full',
                                    'focus:ring',
                                    'focus:ring-emerald-300',
                                    'transition-colors',
                                    'duration-300',
                                    'ease-in-out',
                                    'pr-10' => $errors->has('nom'),
                                    'border-red-500' => $errors->has('nom'),
                                ]) required autocomplete="given-name">
                        </div>

                        {{-- Section Population --}}
                        <div class="mb-4 relative">
                            <label for="population" class="block text-gray-700 mb-2">Population</label>
                            <input type="number" id="population" name="population" value="{{ old('population') }}"
                                @class([
                                    'border-gray-400',
                                    'border',
                                    'py-2',
                                    'px-4',
                                    'rounded-lg',
                                    'w-full',
                                    'focus:ring',
                                    'focus:ring-emerald-300',
                                    'transition-colors',
                                    'duration-300',
                                    'ease-in-out',
                                    'pr-10' => $errors->has('population'),
                                    'border-red-500' => $errors->has('population'),
                                ]) required>
                        </div>

                        {{-- Section Superficie --}}
                        <div class="mb-4 relative">
                            <label for="superficie" class="block text-gray-700 mb-2">Superficie</label>
                            <input type="number" id="superficie" name="superficie" value="{{ old('superficie') }}"
                                @class([
                                    'border-gray-400',
                                    'border',
                                    'py-2',
                                    'px-4',
                                    'rounded-lg',
                                    'w-full',
                                    'focus:ring',
                                    'focus:ring-emerald-300',
                                    'transition-colors',
                                    'duration-300',
                                    'ease-in-out',
                                    'pr-10' => $errors->has('superficie'),
                                    'border-red-500' => $errors->has('superficie'),
                                ]) required>
                        </div>

                        {{-- Bouton Soumettre --}}
                        <button type="submit" class="bg-emerald-600 text-white hover:bg-emerald-500 font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
                            Créer une Localite
                        </button>
                    </form>
                </div>
            </div>
        </main>
    </x-layout>
</body>
</html>
