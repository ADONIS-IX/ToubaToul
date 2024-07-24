@php
     use App\Enums\EtatDossier;
@endphp
<x-layout title="Tableau de bord">
    {{-- Nav side --}}
    <nav class="fixed top-30 h-screen left-0 w-64 bg-gray-800 text-white p-4 space-y-4">
        <h2 class="text-xl font-bold mb-4">Navigation</h2>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('proprietaire.index') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-gray-700">
                    <i class="fas fa-tachometer-alt mr-2"></i> Tableau de Bord
                </a>
            </li>
            <li>
                <a href="{{ route('profil') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-gray-700">
                    <i class="fas fa-user mr-2"></i> Mes Informations
                </a>
            </li>
            <li>
                <a href="{{ route('lot') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-gray-700">
                    <i class="fas fa-map-marker-alt mr-2"></i> Parcelle
                </a>
            </li>
            <li>
                <a href="{{ route('proprietaire.create') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-gray-700">
                    <i class="fas fa-folder-open mr-2"></i> Procédures
                </a>
            </li>
            <li>
                <a href="{{ route('support') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-gray-700">
                    <i class="fas fa-life-ring mr-2"></i> Support
                </a>
            </li>
        </ul>
    </nav>

    <!-- Main content -->
    <main class="ml-64 flex-1 bg-gray-200 p-8">
        <div class="container mx-auto space-y-8">
            <h2 class="text-2xl md:text-4xl font-bold text-center mb-8">Tableau de Bord</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <x-status-card
                :status="EtatDossier::En_attente"
                :count="$dossierCounts[EtatDossier::En_attente->value] ?? 0"
                title="Dossiers en cours"
                description="Voir et éditer vos dossiers en cours de traitements"
                :icon="'<svg ... ></svg>'"
                :current-status="$currentStatus"
                color="yellow"
                >
                <svg class="w-12 h-12 text-yellow-600 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 11H4m15.5 5a.5.5 0 0 0 .5-.5V8a1 1 0 0 0-1-1h-3.75a1 1 0 0 1-.829-.44l-1.436-2.12a1 1 0 0 0-.828-.44H8a1 1 0 0 0-1 1M4 9v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-7a1 1 0 0 0-1-1h-3.75a1 1 0 0 1-.829-.44L9.985 8.44A1 1 0 0 0 9.157 8H5a1 1 0 0 0-1 1Z"/>
                </svg>
            </x-status-card>

            <x-status-card
            :status="EtatDossier::Approuve"
            :count="$dossierCounts[EtatDossier::Approuve->value] ?? 0"
            title="Dossiers validés"
            description="Accéder aux dossiers validés"
            :icon="'<svg ... ></svg>'"
            :current-status="$currentStatus"
            color="emerald"
            >
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-12 text-emerald-500">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9 13.5 3 3m0 0 3-3m-3 3v-6m1.06-4.19-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                </svg>
            </x-status-card>

            <x-status-card
            :status="EtatDossier::Refuse"
            :count="$dossierCounts[EtatDossier::Refuse->value] ?? 0"
            title="Dossiers Rejetés"
            description="Voir les dossiers rejetés"
            :icon="'<svg ... ></svg>'"
            :current-status="$currentStatus"
            color="red"
            >
            <svg class="h-12 w-12 text-red-500" width="36" height="36" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z"/>
                <path d="M5 4h4l3 3h7a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 2 -2" />
                <path d="M10 11l4 4m0 -4l-4 4" />
            </svg>
        </x-status-card>

                <div class="bg-white p-4 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-2">Support</h3>
                    <p class="text-sm">Contacter le support technique pour assistance</p>
                </div>
            </div>

            <div class="mt-8 space-y-8 md:w-2/3">
                <a href="{{ route('proprietaire.create') }}" class="inline-flex bg-emerald-600 text-white font-semibold shadow-sm py-2 px-4 rounded-full transition duration-300 hover:bg-emerald-500">
                    Déposer une Nouvelle Demande
                </a>
            </div>

             {{-- Formulaire de recherche --}}
             @if($dossiers->isNotEmpty())
                <form action="{{ route('proprietaire.index') }}" method="GET" class="bg-white p-4 rounded-lg shadow-md flex items-center space-x-4">
                    <div class="flex-grow">
                        <label for="search" class="sr-only">Rechercher</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" name="search" id="search" class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm" placeholder="Rechercher un dossier..." value="{{ request('search') }}">
                        </div>
                    </div>
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                        Rechercher
                    </button>
                </form>
            @endif


        {{--
            <form action="{{ route('proprietaire.index') }}" method="GET" class="bg-white p-4 rounded-lg shadow-md flex items-center space-x-4">
                <input type="hidden" name="status" value="{{ $currentStatus }}">
                <input type="text" name="search" id="search" class="flex-grow px-3 py-2 border border-gray-300 rounded-md" placeholder="Rechercher un dossier..." value="{{ $search }}">
                <button type="submit" class="px-4 py-2 bg-emerald-600 text-white rounded-md hover:bg-emerald-700">Rechercher</button>
                @if($search || $currentStatus)
                    <a href="{{ route('proprietaire.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300">Réinitialiser</a>
                @endif
            </form>
        --}}

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                @if($dossiers->isNotEmpty())
                    <table class="min-w-full bg-white divide-y divide-gray-300">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 uppercase font-semibold text-left text-sm sm:pl-3">ID</th>
                            <th scope="col" class="px-3 py-3.5 uppercase font-semibold text-left text-sm">Procedure</th>
                            <th scope="col" class="px-3 py-3.5 uppercase font-semibold text-left text-sm">Parcelle</th>
                            <th scope="col" class="px-3 py-3.5 uppercase font-semibold text-left text-sm">Localite</th>
                            <th scope="col" class="px-3 py-3.5 uppercase font-semibold text-left text-sm">Statut</th>
                            <th scope="col" class="px-3 py-3.5 uppercase font-semibold text-left text-sm">Date de dépot</th>
                            <th scope="col" class="px-3 py-3.5 uppercase font-semibold text-left text-sm"></th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($dossiers as $dossier)
                        <tr class="hover:bg-teal-50 even:bg-gray-50">
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $dossier->id }}</td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $dossier->type }}</td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">
                                @if($dossier->type === 'Terrain')
                                    Terrain sans parcelle
                                @else
                                {{ $dossier->parcelle->numeroLot ?? 'N/A' }}
                                @endif
                            </td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">
                                @if($dossier->type === 'Terrain')
                                Localisation à déterminer
                                @else
                                {{ $dossier->parcelle->lotissement->localite->nom ?? 'N/A' }}
                                @endif
                            </td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">{{ $dossier->statut }}</td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-500">@datetime($dossier->created_at)</td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm">
                                <a href="{{ route('proprietaire.show', $dossier->id) }}" class="text-indigo-600 hover:text-emerald-400">Voir</a>
                            </td>

                            <td x-data="{ showModal: false }" class="inline-flex relative whitespace-nowrap py-4 pl-3 pr-4 sm:pr-3 text-sm text-right font-medium">
                                <a href="#" @click.prevent="showModal = true" class="text-red-600 hover:text-red-300">
                                    <span class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 -960 960 960" width="18px" fill="#5f6368" class="fill-red-500 mr-1">
                                            <path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/>
                                        </svg>
                                        Supprimer
                                    </span>
                                </a>
                                <form x-ref="delete" action="{{ route('proprietaire.destroy', $dossier->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>

                                <!-- Modal de confirmation -->
                                <div x-show="showModal" x-cloak class="fixed inset-0 z-10 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                        <div x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                        <div x-show="showModal" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                                <div class="sm:flex sm:items-start">
                                                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                        <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                        </svg>
                                                    </div>
                                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                        <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                                            Confirmation de suppression
                                                        </h3>
                                                        <div class="mt-2">
                                                            <p class="text-sm text-gray-500">Êtes-vous sûr de vouloir supprimer ce dossier ?</p>
                                                            <p class="text-sm text-gray-500">Cette action est irréversible.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                                <form action="{{ route('proprietaire.destroy', $dossier->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                                                        Supprimer
                                                    </button>
                                                </form>
                                                <button @click="showModal = false" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                                                    Annuler
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    @else
                    <div class="text-center py-10 px-6 bg-gray-50">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">Aucun dossier trouvé</h3>
                        <p class="mt-1 text-sm text-gray-500">
                            @if(request()->has('search'))
                                Désolé, nous n'avons trouvé aucun dossier correspondant à "{{ request('search') }}".
                            @else
                                Vous n'avez pas encore de dossiers.
                            @endif
                        </p>
                        <div class="mt-6">
                            <a href="{{ route('proprietaire.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500">
                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                                </svg>
                                Créer un nouveau dossier
                            </a>
                        </div>
                    </div>
                @endif
            </div>
            {{ $dossiers->links() }}

        </div>
    </main>
</x-layout>
