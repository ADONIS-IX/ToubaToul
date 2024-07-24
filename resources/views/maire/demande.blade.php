<x-layout title="Demande">
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

    {{-- Main content --}}
    <main class="ml-64 flex-1 bg-teal-50 p-8">
        <div class="container mx-auto space-y-8">
            <h2 class="text-2xl md:text-4xl font-bold text-center mb-8">Suivie des Demandes</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-4 rounded-lg shadow-md hover:bg-yellow-50">
                    <a href="{{ route('demande', ['status' => 'En attente']) }}">
                        <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-12 text-yellow-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9 13.5 3 3m0 0 3-3m-3 3v-6m1.06-4.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                            </svg>
                          <p class="ml-4 text-3xl text-yellow-500">{{ $totalAttente }}</p>
                        </span>
                        <h3 class="text-xl font-bold mb-2 mt-3 text-yellow-500">Demandes en attentes</h3>
                        <p class="text-sm">Voir les dossiers en attentes</p>
                    </a>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md hover:bg-emerald-50">
                    <a href="{{ route('demande', ['status' => 'Approuve']) }}">
                        <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-12 text-emerald-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9 13.5 3 3m0 0 3-3m-3 3v-6m1.06-4.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                            </svg>
                            <p class="ml-4 text-3xl text-emerald-400">{{ $totalApprouve }}</p>
                        </span>
                        <h3 class="text-xl font-bold mb-2 mt-3 text-emerald-400">Demandes validées</h3>
                        <p class="text-sm">Accéder aux demandes favorables</p>
                    </a>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md hover:bg-red-50">
                    <a href="{{ route('demande', ['status' => 'Refuse']) }}">
                        <span class="flex items-center">
                            <svg class="h-12 w-12 text-red-500" width="36" height="36" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M5 4h4l3 3h7a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2" />  <path d="M10 11l4 4m0 -4l-4 4" />
                            </svg>
                            <p class="ml-4 text-3xl text-red-400">{{ $totalRefuse }}</p>
                        </span>
                        <h3 class="text-xl font-bold mb-2 mt-3 text-red-400">Demandes rejetées</h3>
                        <p class="text-sm">Voir les demandes refusées</p>
                    </a>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md hover:bg-slate-100">
                    <a href="{{ route('demande', ['status' => 'all']) }}">
                        <span class="flex items-center">
                            <svg class="h-12 w-12 text-slate-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"/><path d="M9 4h3l2 2h5a2 2 0 0 1 2 2v7a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" /><path d="M17 17v2a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2h2" />
                            </svg>
                            <p class="ml-4 text-3xl">{{ $totalDossiers }}</p>
                        </span>
                        <h3 class="text-xl font-bold mb-2 mt-3">Total Dossiers</h3>
                        <p class="text-sm">Voir toutes les demandes de terrain</p>
                    </a>
                </div>
            </div>


            {{-- Formulaire de recherche --}}
            @if($dossiers->isNotEmpty())
            <form action="{{ route('demande') }}" method="GET" class="flex items-center bg-white p-4 rounded-lg shadow-md space-x-4">
                <input type="hidden" name="status" value="{{ $currentStatus }}">
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input type="search" name="search" id="search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-emerald-500 focus:border-emerald-500 block w-full pl-10 p-2.5" placeholder="Rechercher un dossier..." value="{{ $search ?? '' }}">
                </div>
                <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-emerald-700 rounded-lg border border-emerald-700 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:ring-emerald-300">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Rechercher</span>
                </button>
            </form>
            @endif

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                @if($dossiers->isNotEmpty())
                <table class="min-w-full bg-white divide-y divide-gray-300">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 uppercase font-semibold text-left text-sm sm:pl-3">ID</th>
                            <th scope="col" class="py-3.5 px-3 uppercase font-semibold text-left text-sm">Procedure</th>
                            <th scope="col" class="py-3.5 px-3 uppercase font-semibold text-left text-sm">Requérant</th>
                            <th scope="col" class="py-3.5 px-3 uppercase font-semibold text-left text-sm">Adresse</th>
                            <th scope="col" class="py-3.5 px-3 uppercase font-semibold text-left text-sm">Statut</th>
                            <th scope="col" class="py-3.5 px-3 uppercase font-semibold text-left text-sm">Date de dépot</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($dossiers as $dossier)
                        <tr class="hover:bg-teal-50 even:bg-gray-50">
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $dossier->id }}</td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $dossier->type }}</td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $dossier->user->prenom }} {{ $dossier->user->nom }}</td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $dossier->user->adresse }}</td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $dossier->statut }}</td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">@datetime($dossier->created_at)</td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm">
                                <a href="{{ route('demandes.show', $dossier->id) }}" class="text-indigo-600 hover:text-emerald-400">Voir</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @endif
            </div>
        </div>
    </main>

</x-layout>
