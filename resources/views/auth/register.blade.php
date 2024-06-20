<!DOCTYPE html>
<html lang="fr" class="h-full bg-gray-50">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Inscrivez-vous sur Terra+ pour accéder à nos services exclusifs">
    <title>Terraplus | Inscription</title>

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
            <a href="{{ route('login') }}"
                class="mr-1 bg-white text-emerald-600 hover:text-emerald-500 font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
                Connexion
            </a>
        </div>
    </header>

    <!-- Main Content Section -->
    <main class="flex items-center justify-center min-h-screen px-6 sm:px-10 lg:px-20">
        <div class="w-full max-w-2xl bg-white rounded-lg shadow-md p-8 animate-fade-in">
            <h2 class="text-3xl md:text-4xl font-bold mb-6 text-center">Inscription</h2>

            <!-- Registration Form -->
            <form action='{{ route('inscription') }}' method="POST" class="flex flex-col"
                aria-label="Formulaire d'inscription" novalidate>
                @csrf

                <!-- Name Section -->
                <div class="flex flex-wrap -mx-2">
                    <div class="w-full sm:w-1/2 px-2 mb-4 relative">
                        <label for="prenom" class="block text-gray-700 mb-2">Prénom</label>
                        <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}"
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
                                'pr-10' => $errors->has('prenom'),
                                'border-red-500' => $errors->has('prenom'),
                            ]) required autocomplete="given-name">
                        @if ($errors->has('prenom'))
                            <span class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-exclamation-circle text-red-500"></i>
                            </span>
                        @endif
                        @error('prenom')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="w-full sm:w-1/2 px-2 mb-4 relative">
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
                            ])" required autocomplete="family-name">
                        @if ($errors->has('nom'))
                            <span class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-exclamation-circle text-red-500"></i>
                            </span>
                        @endif
                        @error('nom')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Email Section -->
                <div class="mb-4 relative">
                    <label for="email" class="block text-gray-700 mb-2">Adresse e-mail</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
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
                            'pr-10' => $errors->has('email'),
                            'border-red-500' => $errors->has('email'),
                        ]) pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
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
                    <input type="password" id="password" name="password" @class([
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
                        'pr-10' => $errors->has('password'),
                        'border-red-500' => $errors->has('password'),
                    ]) required
                        autocomplete="new-password" minlength="8">
                    @if ($errors->has('password'))
                        <span class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i class="fas fa-exclamation-circle text-red-500"></i>
                        </span>
                    @endif
                    @error('password')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block text-gray-700 mb-2">Confirmer le mot de
                        passe</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="border border-gray-400 py-2 px-4 rounded-lg w-full focus:ring focus:ring-emerald-300 transition-colors duration-300 ease-in-out"
                        required autocomplete="new-password" minlength="8">
                </div>

                <!-- Additional Information Section -->
                <div class="flex flex-wrap -mx-2">
                    <div class="w-full sm:w-1/2 px-2 mb-4 relative">
                        <label for="profession" class="block text-gray-700 mb-2">Profession</label>
                        <input type="text" id="profession" name="profession" value="{{ old('profession') }}"
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
                                'pr-10' => $errors->has('profession'),
                                'border-red-500' => $errors->has('profession'),
                            ]) autocomplete="organization-title">
                        @if ($errors->has('profession'))
                            <span class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-exclamation-circle text-red-500"></i>
                            </span>
                        @endif
                        @error('profession')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full sm:w-1/2 px-2 mb-4 relative">
                        <label for="genre" class="block text-gray-700 mb-2">Genre</label>
                        <select id="genre" name="genre" @class([
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
                            'pr-10' => $errors->has('genre'),
                            'border-red-500' => $errors->has('genre'),
                        ]) autocomplete="sex">
                            <option value="" disabled selected>--Choisir--</option>
                            <option value="homme" {{ old('genre') === 'homme' ? 'selected' : '' }}>Homme</option>
                            <option value="femme"{{ old('genre') === 'femme' ? 'selected' : '' }}>Femme</option>
                        </select>
                        @if ($errors->has('genre'))
                            <span class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-exclamation-circle text-red-500"></i>
                            </span>
                        @endif
                        @error('genre')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Address Section -->
                <div class="mb-4 relative">
                    <label for="adresse" class="block text-gray-700 mb-2">Adresse</label>
                    <textarea id="adresse" name="adresse" @class([
                        'form-textarea',
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
                        'pr-10' => $errors->has('adresse'),
                        'border-red-500' => $errors->has('adresse'),
                    ]) autocomplete="street-address">{{ old('adresse') }}</textarea>
                    @if ($errors->has('adresse'))
                        <span class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i class="fas fa-exclamation-circle text-red-500"></i>
                        </span>
                    @endif
                    @error('adresse')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Identification and Contact Section -->
                <div class="flex flex-wrap -mx-2">
                    <div class="w-full sm:w-1/2 px-2 mb-4 relative">
                        <label for="numero_cni" class="block text-gray-700 mb-2">Numéro de carte d'identité
                            nationale</label>
                        <input type="text" id="numero_cni" name="numero_cni" value="{{ old('numero_cni') }}"
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
                                'pr-10' => $errors->has('numero_cni'),
                                'border-red-500' => $errors->has('numero_cni'),
                            ]) autocomplete="cc-number" minlength="13" maxlength="13">
                        @if ($errors->has('numero_cni'))
                            <span class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-exclamation-circle text-red-500"></i>
                            </span>
                        @endif
                        @error('numero_cni')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full sm:w-1/2 px-2 mb-4 relative">
                        <label for="telephone" class="block text-gray-700 mb-2">Téléphone</label>
                        <input type="tel" id="telephone" name="telephone" value="{{ old('telephone') }}"
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
                                'pr-10' => $errors->has('telephone'),
                                'border-red-500' => $errors->has('telephone'),
                            ]) autocomplete="tel-national">
                        @if ($errors->has('telephone'))
                            <span class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-exclamation-circle text-red-500"></i>
                            </span>
                        @endif
                        @error('telephone')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Birth Information Section -->
                <div class="flex flex-wrap -mx-2">
                    <div class="w-full sm:w-1/2 px-2 mb-4 relative">
                        <label for="date_naissance" class="block text-gray-700 mb-2">Date de naissance</label>
                        <input type="date" id="date_naissance" name="date_naissance"
                            value="{{ old('date_naissance') }}" @class([
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
                                'pr-10' => $errors->has('date-de-naissance'),
                                'border-red-500' => $errors->has('date-de-naissance'),
                            ]) autocomplete="bday">
                        @if ($errors->has('date_naissance'))
                            <span class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-exclamation-circle text-red-500"></i>
                            </span>
                        @endif
                        @error('date_naissance')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="w-full sm:w-1/2 px-2 mb-4 relative">
                        <label for="lieu_naissance" class="block text-gray-700 mb-2">Lieu de naissance</label>
                        <input type="text" id="lieu_naissance" name="lieu_naissance"
                            value="{{ old('lieu_naissance') }}" @class([
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
                                'pr-10' => $errors->has('lieu_naissance'),
                                'border-red-500' => $errors->has('lieu_naissance'),
                            ]) autocomplete="off">
                        @if ($errors->has('lieu_naissance'))
                            <span class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-exclamation-circle text-red-500"></i>
                            </span>
                        @endif
                        @error('lieu_naissance')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit"
                    class=
                    "bg-emerald-600 text-white hover:bg-emerald-500 font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
                    Créer un compte</button>
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
