<x-layout>
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
                <a href="{{ route('cadastrale.instruction.index') }}" class="flex items-center px-4 py-2 rounded transition duration-300 bg-yellow-500">
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
    <main class="ml-64 flex-1 bg-teal-50 p-4 sm:p-8">
        <div class="container mx-auto space-y-8 sm:space-y-8">
            <h2 class="text-2xl md:text-4xl font-bold text-center mb-6">Instruction dossier de construction</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-4 rounded-lg shadow-md hover:bg-yellow-50">
                    <a href="{{ route('cadastrale.instruction.index', ['status' => 'en_attente']) }}">
                        <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-10">
                                <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z" clip-rule="evenodd" />
                                <path d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z" />
                            </svg>
                            <p class="ml-4 text-3xl text-yellow-500">{{ $totalAttente }}</p>
                        </span>
                        <h3 class="text-xl font-bold mb-2 mt-3 text-yellow-500">Instructions en attentes</h3>
                        <p class="text-sm">Voir et éditer les dossiers en attentes</p>
                    </a>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md hover:bg-emerald-50">
                    <a href="{{ route('cadastrale.instruction.index', ['status' => 'favorable']) }}">
                        <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="45px" class="size-10" viewBox="0 -960 960 960" width="45px" fill="#5f6368">
                            <path d="M40-160v-112q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v112H40Zm720 0v-120q0-44-24.5-84.5T666-434q51 6 96 20.5t84 35.5q36 20 55 44.5t19 53.5v120H760ZM360-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm400-160q0 66-47 113t-113 47q-11 0-28-2.5t-28-5.5q27-32 41.5-71t14.5-81q0-42-14.5-81T544-792q14-5 28-6.5t28-1.5q66 0 113 47t47 113ZM120-240h480v-32q0-11-5.5-20T580-306q-54-27-109-40.5T360-360q-56 0-111 13.5T140-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T440-640q0-33-23.5-56.5T360-720q-33 0-56.5 23.5T280-640q0 33 23.5 56.5T360-560Zm0 320Zm0-400Z"/>
                            </svg>
                            <p class="ml-4 text-3xl text-emerald-400">{{ $totalApprouve }}</p>
                        </span>
                        <h3 class="text-xl font-bold mb-2 mt-3 text-emerald-400">Demandes favorables</h3>
                        <p class="text-sm">Accéder aux demandes de contructions favorable</p>
                    </a>
                    </div>
                <div class="bg-white p-4 rounded-lg shadow-md hover:bg-red-50">
                    <a href="{{ route('cadastrale.instruction.index', ['status' => 'rejete']) }}">
                        <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="45px" class="size-10 text-red-300" viewBox="0 -960 960 960" width="45px" fill="#5f6368">
                                <path d="M40-160v-112q0-34 17.5-62.5T104-378q62-31 126-46.5T360-440q66 0 130 15.5T616-378q29 15 46.5 43.5T680-272v112H40Zm720 0v-120q0-44-24.5-84.5T666-434q51 6 96 20.5t84 35.5q36 20 55 44.5t19 53.5v120H760ZM360-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47Zm400-160q0 66-47 113t-113 47q-11 0-28-2.5t-28-5.5q27-32 41.5-71t14.5-81q0-42-14.5-81T544-792q14-5 28-6.5t28-1.5q66 0 113 47t47 113ZM120-240h480v-32q0-11-5.5-20T580-306q-54-27-109-40.5T360-360q-56 0-111 13.5T140-306q-9 5-14.5 14t-5.5 20v32Zm240-320q33 0 56.5-23.5T440-640q0-33-23.5-56.5T360-720q-33 0-56.5 23.5T280-640q0 33 23.5 56.5T360-560Zm0 320Zm0-400Z"/>
                            </svg>
                            <p class="ml-4 text-3xl text-red-400">{{ $totalRefuse }}</p>
                        </span>
                        <h3 class="text-xl font-bold mb-2 mt-3 text-red-400">Demandes rejetées</h3>
                        <p class="text-sm">Voir les demandes refusées</p>
                    </a>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md hover:bg-slate-100">
                    <a href="{{ route('cadastrale.instruction.index', ['status' => 'all']) }}" >
                        <span class="flex items-center">
                            <svg class="h-12 w-12 text-slate-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"/><path d="M9 4h3l2 2h5a2 2 0 0 1 2 2v7a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" /><path d="M17 17v2a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2h2" />
                            </svg>
                            <p class="ml-4 text-3xl">{{ $totalDossiers }}</p>
                        </span>
                        <h3 class="text-xl font-bold mb-2 mt-3">Total instructions</h3>
                        <p class="text-sm">Voir toutes les demandes de constructions instruites</p>
                    </a>
                </div>
            </div>

            {{-- Formulaire de recherche --}}
            @if($dossiers->isNotEmpty())
            <form action="{{ route('cadastrale.instruction.index') }}" method="GET" class="flex items-center bg-white p-4 rounded-lg shadow-md space-x-4">
                <input type="hidden" name="status" value="{{ $status }}">
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
                            <th scope="col" class="py-3.5 px-3 uppercase font-semibold text-left text-sm">Parcelle</th>
                            <th scope="col" class="py-3.5 px-3 uppercase font-semibold text-left text-sm">Localite</th>
                            <th scope="col" class="py-3.5 px-3 uppercase font-semibold text-left text-sm">Date de dépot</th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($dossiers as $dossier)
                        <tr class="hover:bg-teal-50 even:bg-gray-50">
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium sm:pl-3">{{ $dossier->id }}</td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $dossier->type }}</td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $dossier->user->prenom }} {{ $dossier->user->nom }}</td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $dossier->parcelle->numeroLot }}</td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $dossier->parcelle->lotissement->localite->nom }}</td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">@datetime($dossier->created_at)</td>


                            <td x-data class="inline-flex relative whitespace-nowrap py-4 pl-3 pr-4 sm:pr-3 text-sm text-right font-medium">
                                <a href="{{ route('cadastrale.instruction.show', $dossier->id) }}" class="text-indigo-600 hover:text-emerald-400">
                                    <span class="flex items-center">
                                        <svg class="h-5 w-5 text-slate-500 mr-1"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                        </svg>
                                            Editer
                                        </span>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="text-center py-10 px-6 bg-gray-50">
                      <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <circle cx="12" cy="12" r="9" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9 12l2 2 4-4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                      </svg>
                    <h3 class="mt-2 text-lg font-medium text-gray-900">Aucun dossier en attente d'instruction n'a été identifié pour l'instant.</h3>
                </div>
                @endif
            </div>
            {{ $dossiers->links() }}

        </div>
    </main>
</x-layout>
