<x-layout>
    {{-- Nav-side --}}
    <nav class="fixed top-30 h-screen left-0 w-64 bg-emerald-900 text-white p-4 space-y-4">
        <h2 class="text-xl font-bold mb-4">Navigation</h2>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('impots-domaines.index') }}" class="flex items-center px-4 py-2 rounded transition duration-300  hover:bg-emerald-300">
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
                <a href="#" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-yellow-500">
                    <i class="fas fa-folder-open mr-2"></i> Procédures
                </a>
            </li>
            <li>
                <a href="{{ route('domaniale.instruction.index') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-yellow-500">
                    <i class="fas fa-file-alt mr-2"></i> Instructions dossiers
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
            <h2 class="text-2xl md:text-4xl font-bold text-center mb-8">Tableau de Bord</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-4 rounded-lg shadow-md hover:bg-yellow-50">
                    <a href="{{ route('domaniale.index', ['status' => 'En attente']) }}">
                        <span class="flex items-center">
                            <svg class="w-12 h-12 text-yellow-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 11H4m15.5 5a.5.5 0 0 0 .5-.5V8a1 1 0 0 0-1-1h-3.75a1 1 0 0 1-.829-.44l-1.436-2.12a1 1 0 0 0-.828-.44H8a1 1 0 0 0-1 1M4 9v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-3.75a1 1 0 0 1-.829-.44L9.985 8.44A1 1 0 0 0 9.157 8H5a1 1 0 0 0-1 1Z"/>
                            </svg>
                          <p class="ml-4 text-3xl text-yellow-500">{{ $totalAttente }}</p>
                        </span>
                        <h3 class="text-xl font-bold mb-2 mt-3 text-yellow-500">Demandes en attentes</h3>
                        <p class="text-sm">Voir et éditer les dossiers en attentes</p>
                    </a>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md hover:bg-emerald-50">
                    <a href="{{ route('domaniale.index', ['status' => 'Approuve']) }}">
                        <span class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-12 text-emerald-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9 13.5 3 3m0 0 3-3m-3 3v-6m1.06-4.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                            </svg>
                            <p class="ml-4 text-3xl text-emerald-400">{{ $totalApprouve }}</p>
                        </span>
                        <h3 class="text-xl font-bold mb-2 mt-3 text-emerald-400">Demandes validées</h3>
                        <p class="text-sm">Accéder aux demandes de contruction favorable</p>
                    </a>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md hover:bg-red-50">
                    <a href="{{ route('domaniale.index', ['status' => 'Refuse']) }}">
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
                    <a href="{{ route('domaniale.index', ['status' => 'all']) }}">
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

            <a class="inline-flex group relative justify-center items-center text-zinc-600 text-sm font-bold">
                <div class="shadow-md flex items-center group-hover:gap-2 bg-gradient-to-br from-lime-200 to-yellow-200 p-3 rounded-full cursor-pointer duration-300">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 17h6m-3 3v-6M4.857 4h4.286c.473 0 .857.384.857.857v4.286a.857.857 0 0 1-.857.857H4.857A.857.857 0 0 1 4 9.143V4.857C4 4.384 4.384 4 4.857 4Zm10 0h4.286c.473 0 .857.384.857.857v4.286a.857.857 0 0 1-.857.857h-4.286A.857.857 0 0 1 14 9.143V4.857c0-.473.384-.857.857-.857Zm-10 10h4.286c.473 0 .857.384.857.857v4.286a.857.857 0 0 1-.857.857H4.857A.857.857 0 0 1 4 19.143v-4.286c0-.473.384-.857.857-.857Z"/>
                      </svg>
                  <span class="text-[0px] group-hover:text-sm duration-300">Attribuer une nouvelle parcelle</span>
                </div>
            </a>

            {{-- Formulaire de recherche --}}
            @if($dossiers->isNotEmpty())
            <form action="{{ route('domaniale.index') }}" method="GET" class="flex items-center bg-white p-4 rounded-lg shadow-md space-x-4">
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
                            <th scope="col" class="py-3.5 px-3 uppercase font-semibold text-left text-sm"></th>
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
                                <a href="{{ route('domaniale.show', $dossier->id) }}" target="_blank" class="text-indigo-600 hover:text-emerald-400">Voir</a>
                            </td>

                            <td x-data class="inline-flex relative whitespace-nowrap py-4 pl-3 pr-4 sm:pr-3 text-sm text-right font-medium">
                                <a href="#" class="text-indigo-600 hover:text-emerald-400">
                                    <span class="flex items-center">
                                        <svg class="h-5 w-5 text-slate-500 mr-1"  fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                        </svg>
                                            Modifier
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
                    <h3 class="mt-2 text-lg font-medium text-gray-900">Aucun dossier en attente trouvé pour l'instant.</h3>
                </div>
                @endif
            </div>
            {{ $dossiers->links() }}
        </div>
    </main>
</x-layout>
