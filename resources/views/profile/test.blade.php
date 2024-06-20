<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier les informations de l'utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <div class="max-w-6xl mx-auto bg-white p-8 rounded-lg shadow-lg transform transition-all duration-500 hover:shadow-2xl">
            <h2 class="text-3xl font-bold mb-6 text-center text-indigo-600">Modifier les informations de l'utilisateur</h2>
            <form action="" method="POST">
                @csrf


                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Informations Personnelles -->
                    <div>
                        <h3 class="text-xl font-semibold mb-4 text-gray-700"><i class="fas fa-user"></i> Informations Personnelles</h3>
                        <!-- Prénom -->
                        <div class="mb-4">
                            <label for="prenom" class="block text-gray-700">Prénom:</label>
                            <input type="text" id="prenom" name="prenom" value="{{ old('prenom', $user->prenom) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <!-- Nom -->
                        <div class="mb-4">
                            <label for="nom" class="block text-gray-700">Nom:</label>
                            <input type="text" id="nom" name="nom" value="{{ old('nom', $user->nom) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <!-- Genre -->
                        <div class="mb-4">
                            <label for="genre" class="block text-gray-700">Genre:</label>
                            <select id="genre" name="genre" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="masculin" {{ old('genre', $user->genre) == 'masculin' ? 'selected' : '' }}>Masculin</option>
                                <option value="feminin" {{ old('genre', $user->genre) == 'feminin' ? 'selected' : '' }}>Féminin</option>
                            </select>
                        </div>

                        <!-- Date de naissance -->
                        <div class="mb-4">
                            <label for="date_naissance" class="block text-gray-700">Date de naissance:</label>
                            <input type="date" id="date_naissance" name="date_naissance" value="{{ old('date_naissance', $user->date_naissance) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <!-- Lieu de naissance -->
                        <div class="mb-4">
                            <label for="lieu_naissance" class="block text-gray-700">Lieu de naissance:</label>
                            <input type="text" id="lieu_naissance" name="lieu_naissance" value="{{ old('lieu_naissance', $user->lieu_naissance) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <!-- Numéro CNI -->
                        <div class="mb-4">
                            <label for="numero_cni" class="block text-gray-700">Numéro CNI:</label>
                            <input type="text" id="numero_cni" name="numero_cni" value="{{ old('numero_cni', $user->numero_cni) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                    </div>

                    <!-- Informations de Contact -->
                    <div>
                        <h3 class="text-xl font-semibold mb-4 text-gray-700"><i class="fas fa-envelope"></i> Informations de Contact</h3>
                        <!-- Adresse -->
                        <div class="mb-4">
                            <label for="adresse" class="block text-gray-700">Adresse:</label>
                            <input type="text" id="adresse" name="adresse" value="{{ old('adresse', $user->adresse) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block text-gray-700">Email:</label>
                            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <!-- Profession -->
                        <div class="mb-4">
                            <label for="profession" class="block text-gray-700">Profession:</label>
                            <input type="text" id="profession" name="profession" value="{{ old('profession', $user->profession) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <!-- Téléphone -->
                        <div class="mb-4">
                            <label for="telephone" class="block text-gray-700">Téléphone:</label>
                            <input type="tel" id="telephone" name="telephone" value="{{ old('telephone', $user->telephone) }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>
                    </div>
                </div>

                <!-- Bouton de Soumission -->
                <div class="flex items-center justify-center mt-6">
                    <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                        <i class="fas fa-save"></i> Sauvegarder
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
