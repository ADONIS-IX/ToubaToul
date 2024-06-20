<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Connectez-vous à Terra+ pour accéder à nos services exclusifs">
    <title>Terraplus | Connexion</title>
    <meta name="description" content="Connectez-vous à Terra+ pour accéder à nos services exclusifs">

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="icon" href="{{ asset('2.ico') }}">

    <!-- Tailwind CSS -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" async>

    <!-- Vite Resources -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased h-full">
    <!-- Header Section -->
    <header class="bg-emerald-600 text-white py-3 px-6 sm:px-10 lg:px-20 flex items-center justify-between">
        <div class="flex items-center">
            <img src="{{ asset('2.png') }}" alt="logoTerra"
                class="h-10 w-10 mr-2 sm:h-12 sm:w-12 md:h-16 md:w-16 transition-transform duration-300 ease-in-out hover:rotate-12">
            <a href="{{ route('index') }}">
                <h1
                    class="text-2xl md:text-4xl font-bold transition-colors duration-300 ease-in-out hover:text-emerald-300">
                    Terra+</h1>
            </a>
        </div>
        <div class="hidden md:flex items-center">
            <a href="{{ route('inscription') }}"
                class="mr-1 bg-white text-emerald-600 hover:text-emerald-500 font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
                Inscription
            </a>
        </div>
    </header>

    <!-- Main Content Section -->
    <main class="flex items-center justify-center min-h-screen px-6 sm:px-10 lg:px-20">
        <div class="w-full max-w-2xl bg-white rounded-lg shadow-md p-8 animate-fade-in">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 text-center">Connexion</h2>

            <!-- Login Form -->
            <form action='{{ route('login') }}' method="POST" class="flex flex-col" aria-label="Formulaire de connexion" novalidate>
                @csrf

                <!-- Email Section -->
                <div class="mb-4 relative">
                    <label for="email" class="block text-gray-700 mb-2">Adresse e-mail</label>
                    <input type="email" id="email" name="email"  value="{{ old('email') }}"
                        @class(['border-gray-400', 'border', 'py-2', 'px-4', 'rounded-lg', 'w-full', 'focus:ring', 'focus:ring-emerald-300', 'transition-colors', 'duration-300', 'ease-in-out', 'pr-10' => $errors->has('email'), 'border-red-500' => $errors->has('email')])
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                    @if ($errors->has('email'))
                        <span class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i class="fas fa-exclamation-circle text-red-500"></i>
                        </span>
                    @endif
                    @error('email')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Section -->
                <div class="mb-4 relative">
                    <label for="password" class="block text-gray-700 mb-2">Mot de passe</label>
                    <input type="password" id="password" name="password"
                        @class(['border-gray-400', 'border', 'py-2', 'px-4', 'rounded-lg', 'w-full', 'focus:ring', 'focus:ring-emerald-300', 'transition-colors', 'duration-300', 'ease-in-out', 'pr-10' => $errors->has('password'), 'border-red-500' => $errors->has('password')])
                        required autocomplete="current-password">
                    @if ($errors->has('password'))
                        <span class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i class="fas fa-exclamation-circle text-red-500"></i>
                        </span>
                    @endif
                    @error('password')
                    <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me Section -->
                <div class="mb-4 flex items-center">
                    <input type="checkbox" name="remember" id="remember" class="form-checkbox h-5 w-5 text-emerald-600 border-gray-300 rounded">
                    <label for="remember" class="ml-2 text-sm text-gray-700">Se souvenir de moi</label>
                </div>
                <!-- Submit Button -->
                <button type="submit"
                    class="bg-emerald-600 text-white hover:bg-emerald-500 font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:scale-105">Connexion</button>
            </form>
        </div>
    </main>

    <!-- TailwindCSS Animations -->
    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 1.8s ease-out forwards;
        }
    </style>
</body>

</html>
