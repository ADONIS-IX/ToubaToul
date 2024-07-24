<x-layout title="Edition dossier">
    {{-- Nav-side --}}
    <nav class="fixed top-30 h-screen left-0 w-64 bg-emerald-900 text-white p-4 space-y-4">
        <h2 class="text-xl font-bold mb-4">Navigation</h2>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('cadastrale.index') }}" class="flex items-center px-4 py-2 rounded transition duration-300  hover:bg-emerald-300">
                    <i class="fas fa-tachometer-alt mr-2"></i> Tableau de Bord
                </a>
            </li>
            <li>
                <a href="{{ route('profil') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-yellow-500">
                    <i class="fas fa-user mr-2"></i> Mes Informations
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-yellow-500">
                    <i class="fas fa-concierge-bell mr-2"></i> Mes Services
                </a>
            </li>
            <li>
                <a href="{{ route('cadastrale.instruction.index') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-yellow-500">
                    <i class="fas fa-file-alt mr-2"></i> Instructions dossiers
                </a>
            </li>
            <li>
                <a href="{{ route('support') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-yellow-500">
                    <i class="fas fa-life-ring mr-2"></i> Support
                </a>
            </li>
        </ul>
    </nav>

    {{-- Main content --}}
    <main class="ml-64 flex-1 bg-teal-50 p-8">
        <div class="container mx-auto p-4 space-y-8">
            <div x-cloak class="bg-white shadow-md rounded-lg overflow-hidden" x-data="{ open: false }">
                <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Numero dossier: {{ $dossier->id }}
                    </h3>
                    <button @click="open = !open" class="text-indigo-600 hover:text-indigo-900">
                        <span x-show="!open">Voir Plus</span>
                        <span x-show="open">Voir Moins</span>
                    </button>
                </div>
                <div x-show="open" class="border-t border-gray-200">
                    <dl class="divide-y divide-gray-200">
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Type
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $dossier->type }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Prénom et Nom
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $dossier->user->prenom }} {{ $dossier->user->nom }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Adresse
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $dossier->user->adresse }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Numéro de Téléphone
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $dossier->user->telephone }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Profession
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $dossier->user->profession }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Email
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $dossier->user->email }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div x-cloak class="container bg-gradient-to-r from-emerald-100 to-lime-100 py-12 px-4 sm:px-6 lg:px-8" x-data="{ dossierType: '{{ $dossier->type }}' }">
                <form action="{{ route('cadastrale.update', $dossier->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mb-4">
                        <label for="statut" class="block mb-2">Statut</label>
                        <select name="statut" id="statut" class="w-full p-2 border rounded">
                            @foreach($etats as $etat)
                                <option value="{{ $etat->value }}" {{ $dossier->statut == $etat->value ? 'selected' : '' }}>
                                    {{ $etat->value }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div x-show="dossierType === 'Extrait plan cadastrale'" class="mb-4">
                        <label for="extrait_plan" class="block mb-2">Extrait de Plan</label>
                        <input type="file" name="extrait_plan" id="extrait_plan" class="w-full p-2 border rounded bg-white">
                        @error('extrait_plan')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div x-show="dossierType === 'Bail'" class="mb-4">
                        <label for="titre_bail" class="block mb-2">Titre de Bail</label>
                        <input type="file" name="titre_bail" id="titre_bail" class="w-full p-2 border rounded bg-white">
                        @error('titre_bail')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <button type="submit" class="bg-emerald-500 text-white px-4 py-2 rounded">Mettre à jour</button>
                </form>
            </div>
        </div>

    </main>


</x-layout>
