<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }} </title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.4/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="icon" href="{{ asset('2.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased flex flex-col min-h-screen bg-gray-100">
    <!-- Header -->
    <header class="bg-emerald-600 text-white py-3 px-6 sm:px-10 lg:px-20 shadow-md sticky top-0" x-data="{ dropdownOpen: false }">
        <div class="container mx-auto flex items-center justify-between">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('2.png') }}" alt="Terra+" class="h-10 w-10 sm:h-12 sm:w-12 md:h-16 md:w-16 transition duration-300 hover:rotate-12">
                <h1 class="text-2xl md:text-4xl font-bold">Terra+</h1>
            </div>
            <p class="hidden md:block">Bienvenue, <span class="font-semibold hover:text-yellow-200 select-none">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</span></p>
            <div class="relative" @click.away="dropdownOpen = false">
                <button @click="dropdownOpen = !dropdownOpen" aria-expanded="dropdownOpen" class="relative z-10 block h-10 w-10 rounded-full overflow-hidden border-2 border-white focus:outline-none focus:border-yellow-300 transition duration-300 hover:border-yellow-300">
                    <img class="h-full w-full object-cover" src="{{ asset('avatar.png') }}" alt="Votre Avatar">
                </button>
                <div x-show="dropdownOpen" x-cloak aria-hidden="!dropdownOpen" class="absolute right-0 top-12 w-48 bg-white rounded-md shadow-lg py-2 transition duration-300" style="display: none;">
                    <a href="{{ route('password') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-100 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M80-200v-80h800v80H80Zm46-242-52-30 34-60H40v-60h68l-34-58 52-30 34 58 34-58 52 30-34 58h68v60h-68l34 60-52 30-34-60-34 60Zm320 0-52-30 34-60h-68v-60h68l-34-58 52-30 34 58 34-58 52 30-34 58h68v60h-68l34 60-52 30-34-60-34 60Zm320 0-52-30 34-60h-68v-60h68l-34-58 52-30 34 58 34-58 52 30-34 58h68v60h-68l34 60-52 30-34-60-34 60Z"/></svg>
                        Modifier mot de passe
                    </a>
                    {{-- <a href="#" class="inline-flex w-48 px-4 py-2 text-gray-800 hover:bg-gray-100 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" class="mr-2" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M240-80q-33 0-56.5-23.5T160-160v-400q0-33 23.5-56.5T240-640h40v-80q0-83 58.5-141.5T480-920q83 0 141.5 58.5T680-720v80h40q33 0 56.5 23.5T800-560v400q0 33-23.5 56.5T720-80H240Zm0-80h480v-400H240v400Zm240-120q33 0 56.5-23.5T560-360q0-33-23.5-56.5T480-440q-33 0-56.5 23.5T400-360q0 33 23.5 56.5T480-280ZM360-640h240v-80q0-50-35-85t-85-35q-50 0-85 35t-35 85v80ZM240-160v-400 400Z"/></svg>
                        Verrouiller
                    </a> --}}
                    <hr class="border-gray-200 mb-2">
                    <form method="POST" action="{{ route('logout') }}" class="block">
                        @csrf
                        <button type="submit" class="w-full text-left px-4 py-2 text-gray-800 hover:bg-gray-100 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="mr-2" height="24px" viewBox="0 -960 960 960" width="24px" fill="#5f6368"><path d="M200-120q-33 0-56.5-23.5T120-200v-560q0-33 23.5-56.5T200-840h280v80H200v560h280v80H200Zm440-160-55-58 102-102H360v-80h327L585-622l55-58 200 200-200 200Z"/></svg>
                            Se déconnecter
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    @if (session('status'))
        <div class="mt-5 rounded-md bg-gradient-to-r from-teal-200 to-emerald-200 p-4 shadow-lg transform transition duration-500 ease-in-out hover:scale-85">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-green-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-white">{{ session('status') }}</p>
                </div>
            </div>
        </div>
        @endif

    <!-- Main content with Nav-side -->
    <main class="flex flex-1">
        {{ $slot }}
    </main>


</body>
</html>
