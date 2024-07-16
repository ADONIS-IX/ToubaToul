<x-layout title="Parcelle">
    {{-- Nav-side --}}
    <nav class="fixed top-30 h-screen left-0 w-64 bg-emerald-900 text-white p-4 space-y-4">
        <h2 class="text-xl font-bold mb-4">Navigation</h2>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('maire.index') }}" class="flex items-center px-4 py-2 rounded transition duration-300  hover:bg-emerald-300">
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
                    <i class="fas fa-tree mr-2"></i> Voir les parcelles
                </a>
            </li>
            <li>
                <a href="{{ route('demande')}}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-yellow-500">
                    <i class="fas fa-folder-open mr-2"></i> Voir les demandes
                </a>
                <li>
                    <a href="{{ route('localite') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-yellow-500">
                        <i class="fas fa-map-marker-alt mr-2"></i> Ajouter une Localite
                    </a>
                </li>
            </li>
            <li>
                <a href="#" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-yellow-500">
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

     {{-- Main content --}}
<main class="ml-64 flex-1 bg-teal-50 p-8">
    <div class="container mx-auto space-y-8">
        <h2 class="text-2xl md:text-4xl font-bold text-center mb-8">Voir les parcelles</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-4 rounded-lg shadow-md hover:bg-yellow-50">
                <a href="{{ route('parcelle', ['status' => '2']) }}">
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 15.28V21a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-5.72M12 3v10c0 2.21-1.79 4-4 4s-4-1.79-4-4V3h8z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10l3 3 3-3m-3 3v-3" />
                        </svg>

                        <p class="ml-4 text-3xl text-black-400">{{ $totalBatie }}</p>
                    </span>
                    <h3 class="text-xl font-bold mb-2 mt-3 text-yblack-400">Statut:Baties</h3>
                    <p class="text-sm">Voir les parcelles baties</p>
                </a>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-md hover:bg-emerald-50">
                <a href="{{ route('parcelle', ['status' => '3']) }}">
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 15.28V21a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-5.72M12 3v10c0 2.21-1.79 4-4 4s-4-1.79-4-4V3h8z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10l3 3 3-3m-3 3v-3" />
                        </svg>

                        <p class="ml-4 text-3xl text-black-400">{{ $totalConstruction }}</p>
                    </span>
                    <h3 class="text-xl font-bold mb-2 mt-3 text-black-400">Statut:Constructions</h3>
                    <p class="text-sm">Voir les parcelles en constructions</p>
                </a>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-md hover:bg-red-50">
                <a href="{{ route('parcelle', ['status' => '1']) }}">
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 15.28V21a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-5.72M12 3v10c0 2.21-1.79 4-4 4s-4-1.79-4-4V3h8z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10l3 3 3-3m-3 3v-3" />
                        </svg>

                        <p class="ml-4 text-3xl text-black-400">{{ $totalLibre }}</p>
                    </span>
                    <h3 class="text-xl font-bold mb-2 mt-3 text-black-400">Statut:Libres</h3>
                    <p class="text-sm">Voir les parcelles libres</p>
                </a>
            </div>
            <div class="bg-white p-4 rounded-lg shadow-md hover:bg-slate-100">
                <a href="{{ route('parcelle', ['status' => 'all']) }}">
                    <span class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 15.28V21a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-5.72M12 3v10c0 2.21-1.79 4-4 4s-4-1.79-4-4V3h8z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 10l3 3 3-3m-3 3v-3" />
                        </svg>

                        <p class="ml-4 text-3xl">{{ $totalParcelles }}</p>
                    </span>
                    <h3 class="text-xl font-bold mb-2 mt-3">Tous les Parcelles</h3>
                    <p class="text-sm">Voir toutes les demandes de terrain</p>
                </a>
            </div>
        </div>

        {{-- Formulaire de recherche --}}
        @if($parcelles->isNotEmpty())
        <form action="{{ route('parcelle') }}" method="GET" class="flex items-center bg-white p-4 rounded-lg shadow-md space-x-4">
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
            @if($parcelles->isNotEmpty())
            <table class="min-w-full bg-white divide-y divide-gray-300">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th scope="col" class="py-3.5 pl-4 pr-3 uppercase font-semibold text-left text-sm sm:pl-3">ID</th>
                        <th scope="col" class="py-3.5 px-3 uppercase font-semibold text-left text-sm">NumeroLot</th>
                        <th scope="col" class="py-3.5 px-3 uppercase font-semibold text-left text-sm">Superficie</th>
                        <th scope="col" class="py-3.5 px-3 uppercase font-semibold text-left text-sm">Coordonne x</th>
                        <th scope="col" class="py-3.5 px-3 uppercase font-semibold text-left text-sm">Coordonne y</th>
                        <th scope="col" class="py-3.5 px-3 uppercase font-semibold text-left text-sm">Lotissement</th>
                        <th scope="col" class="py-3.5 px-3 uppercase font-semibold text-left text-sm">Statut  </th>
                        <th scope="col" class="py-3.5 px-3 uppercase font-semibold text-left text-sm">Proprietaire ID</th>
                        <th scope="col" class="py-3.5 px-3 uppercase font-semibold text-left text-sm"></th>
                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3"></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($parcelles as $parcelle)
                    <tr class="hover:bg-teal-50 even:bg-gray-50">
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $parcelle->id }}</td>
                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $parcelle->numeroLot }}</td>
                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $parcelle->superficie }}</td>
                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $parcelle->coordonne_x }}</td>
                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $parcelle->coordonne_y }}</td>
                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $parcelle->lotissement->titre }}</td>
                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $parcelle->statutParcelle->titre ?? 'N/A' }}</td>
                        <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">
                            {{ $parcelle->user ? $parcelle->user->prenom . ' ' . $parcelle->user->nom : 'N/A' }}
                        </td>
                        <td class="whitespace-nowrap py-4 px-3 text-sm">
                            <a href="{{ route('maire.show', $parcelle->id) }}" class="text-indigo-600 hover:text-emerald-400">Voir</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>



            </table>

            @endif
    </div>
</main>


</x-layout>
