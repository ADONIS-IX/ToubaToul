<x-layout title="Créer un Lotissement">
    {{-- Navigation --}}
    <nav class="fixed top-30 left-0 h-full w-64 bg-emerald-900 text-white p-4 space-y-4">
        {{-- Liens de navigation --}}
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
                <a href="{{ route('lotissement') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-yellow-500">
                    <i class="fas fa-map mr-2"></i> Creer un Lotissement
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-yellow-500">
                    <i class="fas fa-life-ring mr-2"></i> Support
                </a>
            </li>
        </ul>
    </nav>

    {{-- Contenu principal --}}
    <main class="ml-64 flex flex-col items-end justify-start min-h-screen px-6 sm:px-10 lg:px-20">
        {{-- Lien "Voir les Lotissements" --}}
        <a href="{{ route('index') }}" class="inline-flex group relative justify-center items-center text-zinc-600 text-sm font-bold mb-4">
            <div class="shadow-md flex items-center group-hover:gap-2 bg-gradient-to-br from-lime-200 to-yellow-200 p-3 rounded-full cursor-pointer duration-300">
                <svg class="w-6 h-6 text-green-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 17h6m-3 3v-6M4.857 4h4.286c.473 0 .857.384.857.857v4.286a.857.857 0 0 1-.857.857H4.857A.857.857 0 0 1 4 9.143V4.857C4 4.384 4.384 4 4.857 4Zm10 0h4.286c.473 0 .857.384.857.857v4.286a.857.857 0 0 1-.857.857h-4.286A.857.857 0 0 1 14 9.143V4.857c0-.473.384-.857.857-.857Zm-10 10h4.286c.473 0 .857.384.857.857v4.286a.857.857 0 0 1-.857.857H4.857A.857.857 0 0 1 4 19.143v-4.286c0-.473.384-.857.857-.857Z"/>
                </svg>
                <span class="text-[0px] group-hover:text-sm duration-300 text-green-600">Voir les Lotissements</span>
            </div>
        </a>

        {{-- Contenu --}}
        <div class="flex w-full max-w-6xl bg-white rounded-lg shadow-md p-8 animate-fade-in">
            {{-- Section Image --}}
            <div class="w-2/3">
                <img src="{{ asset('home/images/causes/loti.JPG') }}" alt="Image Description" class="w-full h-full object-cover rounded-lg">
            </div>
            {{-- Section Formulaire --}}
            <div class="w-2/3 pl-8">
                <h2 class="text-3xl md:text-4xl font-bold mb-6 text-center">Créer un Lotissement</h2>

                {{-- Formulaire --}}
                <form action="{{ route('store') }}" method="POST" class="flex flex-col" aria-label="Formulaire de création de lotissement" novalidate>
                    @csrf

                    {{-- Localité --}}
                    <div class="mb-4 relative">
                        <label for="localite_id" class="block text-gray-700 mb-2">Localité</label>
                        <select id="localite_id" name="localite_id" class="border-gray-400 border py-2 px-4 rounded-lg w-full focus:ring focus:ring-emerald-300 transition-colors duration-300 ease-in-out @error('localite_id') border-red-500 @enderror" required>
                            <option value="" disabled selected>Sélectionnez une localité</option>
                            @foreach($localites as $localite)
                                <option value="{{ $localite->id }}">{{ $localite->nom }}</option>
                            @endforeach
                        </select>
                        @error('localite_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Titre --}}
                    <div class="mb-4 relative">
                        <label for="titre" class="block text-gray-700 mb-2">Titre</label>
                        <input type="text" id="titre" name="titre" value="{{ old('titre') }}" class="border-gray-400 border py-2 px-4 rounded-lg w-full focus:ring focus:ring-emerald-300 transition-colors duration-300 ease-in-out @error('titre') border-red-500 @enderror" required>
                        @error('titre')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Slug --}}
                    <div class="mb-4 relative">
                        <label for="slug" class="block text-gray-700 mb-2">Slug</label>
                        <input type="text" id="slug" name="slug" value="{{ old('slug') }}" class="border-gray-400 border py-2 px-4 rounded-lg w-full focus:ring focus:ring-emerald-300 transition-colors duration-300 ease-in-out @error('slug') border-red-500 @enderror" required>
                        @error('slug')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Plan de Lotissement --}}
                    <div class="mb-4 relative">
                        <label for="plan_lotissement" class="block text-gray-700 mb-2">Plan de Lotissement</label>
                        <input type="text" id="plan_lotissement" name="plan_lotissement" value="{{ old('plan_lotissement') }}" class="border-gray-400 border py-2 px-4 rounded-lg w-full focus:ring focus:ring-emerald-300 transition-colors duration-300 ease-in-out @error('plan_lotissement') border-red-500 @enderror" required>
                        @error('plan_lotissement')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Plan Urbanisme Directeur --}}
                    <div class="mb-4 relative">
                        <label for="plan_urbanisme_directeur" class="block text-gray-700 mb-2">Plan Urbanisme Directeur</label>
                        <input type="text" id="plan_urbanisme_directeur" name="plan_urbanisme_directeur" value="{{ old('plan_urbanisme_directeur') }}" class="border-gray-400 border py-2 px-4 rounded-lg w-full focus:ring focus:ring-emerald-300 transition-colors duration-300 ease-in-out @error('plan_urbanisme_directeur') border-red-500 @enderror" required>
                        @error('plan_urbanisme_directeur')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Bouton Soumettre --}}
                    <button type="submit" class="bg-emerald-600 text-white hover:bg-emerald-500 font-bold py-2 px-4 rounded-full transition duration-300 ease-in-out transform hover:scale-105">
                        Créer un Lotissement
                    </button>
                </form>
            </div>
        </div>
    </main>
</x-layout>
