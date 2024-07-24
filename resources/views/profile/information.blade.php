<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Terraplus | Profil Utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.4/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="icon" href="{{ asset('2.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-r from-emerald-200 to-lime-200 min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl w-full bg-white p-8 rounded-lg shadow-lg space-y-8">
        <h2 class="text-2xl font-bold mb-8 text-center text-emerald-500">Profil Utilisateur</h2>
        <form action="{{ route('profil') }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="prenom" class="block text-sm font-medium text-gray-700">Prénom:</label>
                    <input id="prenom" name="prenom" type="text" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm" value="{{ $user->prenom }}">
                        @if ($errors->has('prenom'))
                            <span class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-exclamation-circle text-red-500"></i>
                            </span>
                        @endif
                            @error('prenom')
                                <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                            @enderror
                </div>
                <div>
                    <label for="nom" class="block text-sm font-medium text-gray-700">Nom:</label>
                    <input id="nom" name="nom" type="text" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm" value="{{ $user->nom }}">
                        @if ($errors->has('nom'))
                            <span class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i class="fas fa-exclamation-circle text-red-500"></i>
                            </span>
                        @endif
                    @error('nom')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                    <input id="email" name="email" type="email" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm" value="{{ $user->email }}" readonly>
                </div>
                <div>
                    <label for="genre" class="block text-sm font-medium text-gray-700">Genre:</label>
                    <select id="genre" name="genre" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm">
                        <option value="Homme" {{ old('genre', $user->genre) == 'Homme' ? 'selected' : '' }}>Homme</option>
                        <option value="Femme" {{ old('genre', $user->genre) == 'Femme' ? 'selected' : '' }}>Femme</option>
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
                <div>
                    <label for="adresse" class="block text-sm font-medium text-gray-700">Adresse:</label>
                    <input id="adresse" name="adresse" type="text" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm" value="{{ $user->adresse }}">
                    @if ($errors->has('adresse'))
                        <span class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <i class="fas fa-exclamation-circle text-red-500"></i>
                        </span>
                    @endif
                    @error('adresse')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="profession" class="block text-sm font-medium text-gray-700">Profession:</label>
                    <input id="profession" name="profession" type="text" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm" value="{{ $user->profession }}">
                    @if ($errors->has('profession'))
                        <span class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i class="fas fa-exclamation-circle text-red-500"></i>
                        </span>
                    @endif
                    @error('profession')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="telephone" class="block text-sm font-medium text-gray-700">Téléphone:</label>
                    <input id="telephone" name="telephone" type="tel" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm" value="{{ $user->telephone }}">
                    @if ($errors->has('telephone'))
                    <span class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                        <i class="fas fa-exclamation-circle text-red-500"></i>
                    </span>
                    @endif
                    @error('telephone')
                        <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="numero_cni" class="block text-sm font-medium text-gray-700">CNI:</label>
                    <input id="numero_cni" name="numero_cni" type="text" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm" value="{{ $user->numero_cni }}" maxlength="13">
                    @if ($errors->has('numero_cni'))
                            <span class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-exclamation-circle text-red-500"></i>
                            </span>
                        @endif
                        @error('numero_cni')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                </div>
                <div>
                    <label for="date_naissance" class="block text-sm font-medium text-gray-700">Date de Naissance:</label>
                    <input id="date_naissance" name="date_naissance" type="date" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm" value="{{ $user->date_naissance }}">
                    @if ($errors->has('date_naissance'))
                            <span class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fas fa-exclamation-circle text-red-500"></i>
                            </span>
                        @endif
                        @error('date_naissance')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                </div>
                <div>
                    <label for="lieu_naissance" class="block text-sm font-medium text-gray-700">Lieu de Naissance:</label>
                    <input id="lieu_naissance" name="lieu_naissance" type="text" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm" value="{{ $user->lieu_naissance }}">
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
            <div class="mt-6 flex items-center justify-end gap-x-6" x-data="{ open: false }">
                <button onclick="event.preventDefault(); window.history.back()" class="py-2 px-4 bg-red-200 text-gray-700 rounded-lg shadow-md font-semibold hover:bg-red-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 leading-6">Retour</button>
                <button type="submit" class="py-2 px-4 bg-emerald-500 text-white rounded-lg shadow-md font-semibold hover:bg-emerald-600 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-opacity-200">Modifier</button>
            </div>
        </form>
    </div>
</body>

</html>
