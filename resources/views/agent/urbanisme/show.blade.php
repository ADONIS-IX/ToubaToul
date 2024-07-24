<x-layout title="Vue Dossier">
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
                <a href="{{ route('support') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-yellow-500">
                    <i class="fas fa-life-ring mr-2"></i> Support
                </a>
            </li>
        </ul>
    </nav>

    {{-- Main content --}}
    <main class="ml-64 flex-1 bg-teal-50 p-8">
        <div class="container mx-auto px-4 py-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <!-- En-tête du dossier -->
                <div class="bg-emerald-600 text-white px-6 py-4 flex justify-between items-center">
                    <div>
                        <h1 class="text-3xl font-bold">Dossier #{{ $dossier->id }}</h1>
                        <p class="text-amber-200">{{ $dossier->type }}</p>
                    </div>
                    <div class="text-xl">
                        <span class="px-2 py-1 rounded-full bg-yellow-500">{{ $dossier->statut }}</span>
                    </div>
                </div>

                <!-- Informations du requérant -->
                <div class="p-6">
                    <h2 class="text-2xl font-semibold mb-4 text-emerald-500">Informations du requérant</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-gray-600">Nom complet</p>
                            <p class="font-medium">{{ $dossier->user->prenom }} {{ $dossier->user->nom }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Adresse</p>
                            <p class="font-medium">{{ $dossier->user->adresse }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Date de naissance</p>
                            <p class="font-medium">{{ Carbon\Carbon::parse($dossier->user->date_naissance)->format('d/m/Y') }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Lieu de naissance</p>
                            <p class="font-medium">{{ $dossier->user->lieu_naissance }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Téléphone</p>
                            <p class="font-medium">{{ $dossier->user->telephone }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Profession</p>
                            <p class="font-medium">{{ $dossier->user->profession }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Email</p>
                            <p class="font-medium">{{ $dossier->user->email }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Numero Carte d'Identité National</p>
                            <p class="font-medium">{{ $dossier->user->numero_cni }}</p>
                        </div>
                    </div>
                </div>

                <!-- Informations du parcelle -->
                <div class="p-6 py-4 bg-gray-50 border-t border-b">
                    <h2 class="text-2xl font-semibold mb-4 text-emerald-500">Informations du parcelle</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <p class="text-gray-600">Numero lot</p>
                            <p class="font-medium">{{ $dossier->parcelle->numeroLot }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Superficie</p>
                            <p class="font-medium">{{ $dossier->parcelle->superficie }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Titre Lotissement</p>
                            <p class="font-medium">{{ $dossier->parcelle->lotissement->titre }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Localité</p>
                            <p class="font-medium">{{ $dossier->parcelle->lotissement->localite->nom }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Droit de propriete</p>
                            @foreach ($dossier->parcelle->droitProprietes as $droitPropriete)
                                <p class="font-medium">{{ $droitPropriete->type }}</p>
                            @endforeach
                        </div>
                        <div>
                            <p class="text-gray-600">Statut parcelle</p>
                            <p class="font-medium">{{ $dossier->parcelle->statutParcelle->titre }}</p>
                        </div>
                        <div>
                            <p class="text-gray-600">Chef de la localité</p>
                            @foreach ($dossier->parcelle->lotissement->localite->chefLocalites as $chefLocalite )
                                <p class="font-medium">{{ $chefLocalite->prenom }} {{ $chefLocalite->nom }}</p>
                            @endforeach
                        </div>
                        <div>
                            <p class="text-gray-600">Contact chef de localité</p>
                            @foreach ($dossier->parcelle->lotissement->localite->chefLocalites as $chefLocalite )
                            <p class="font-medium">telephone: {{ $chefLocalite->telephone }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Documents joints -->
                <div class="px-6">
                    <h3 class="text-xl font-semibold mb-3 text-emerald-500">Documents joints</h3>
                    <ul class="list-disc list-inside">
                        @forelse($dossier->pieceDossier as $piece)
                        <li><a href="{{ asset('storage/' . $piece->nom) }}" target="_blanck" class="text-blue-500 hover:underline">{{ $piece->nom }}</a></li>
                            @empty
                            <p class="text-sm font-medium sm:pl-3 text-emerald-700">Aucune pièce pour ce dossier.</p>
                        @endforelse
                    </ul>
                </div>

                 <!-- Informations du parcelle -->
                 <div class="p-6 py-4 bg-gray-50 border-t border-b">
                    <h2 class="text-2xl font-semibold mb-4 text-emerald-500">Observations</h2>
                        <div class="space-y-8">
                            @foreach ($dossier->observations as $observation)
                                <div class="flex bg-slate-50 p-6 rounded-lg">
                                    <img class="w-10 h-10 sm:w-12 sm:h-12 object-cover rounded-full" src="{{ Gravatar::get($observation->user->email) }}" alt="image de profile de {{ $observation->user->prenom }} {{ $observation->user->nom }}">
                                    <div class="ml-4 flex flex-col">
                                        <div class="flex flex-col sm:flex-row sm:items-center">
                                            <h2 class="font-bold text-slate-900 text-lg">{{ $observation->user->prenom }} {{ $observation->user->nom }}</h2>
                                            <time class="mt-2 sm:mt-0 sm:ml-4 text-xs text-slate-400" datetime="{{ $observation->created_at }}">@datetime($observation->created_at)</time>
                                        </div>
                                        <p class="mt-4 text-slate-500 sm:leading-loose">{{ $observation->avis }}</p>
                                        <p class="mt-4 text-slate-500 sm:leading-loose">{{ $observation->content }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

</x-layout>

{{-- <span class="text-gray-500 text-sm ml-2">(2.5 MB)</span> --}}
