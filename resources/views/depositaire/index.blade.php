<x-layout title="Tableau de bord">
    {{-- Nav side --}}
    <nav class="fixed top-30 h-screen left-0 w-64 bg-gray-800 text-white p-4 space-y-4">
        <h2 class="text-xl font-bold mb-4">Navigation</h2>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('depositaire.index') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-gray-700">
                    <i class="fas fa-tachometer-alt mr-2"></i> Tableau de Bord
                </a>
            </li>
            <li>
                <a href="{{ route('profil') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-gray-700">
                    <i class="fas fa-user mr-2"></i> Mes Informations
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-gray-700">
                    <i class="fas fa-concierge-bell mr-2"></i> Mes Services
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-gray-700">
                    <i class="fas fa-life-ring mr-2"></i> Support
                </a>
            </li>
        </ul>
    </nav>

    {{-- Main content --}}
    <main class="ml-64 flex-1 bg-gradient-to-r from-emerald-100 to-lime-100 p-8">
        <div class="container mx-auto">
            <h2 class="text-2xl md:text-4xl font-bold text-center mb-8">Tableau de Bord</h2>
            <p class="mt-1 text-sm leading-6 text-gray-700">Vous pouvez procéder ici à une demande de terrain pour vos future habitations.</p>
            <div class="mt-8 space-y-8 md:w-2/3 mb-4">
                <a href="{{ route('depositaire.create') }}" class="inline-flex bg-emerald-600 text-white font-semibold shadow-sm py-2 px-4 rounded-full transition duration-300 hover:bg-emerald-500">
                    Déposer une Nouvelle Demande
                </a>
            </div>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                @if($dossiers->isNotEmpty())
                    <table class="min-w-full bg-white divide-y divide-gray-300">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold uppercase sm:pl-3">ID</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold uppercase">Procedure</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold uppercase">Statut</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold uppercase">Date de dépot</th>
                                <th scope="col" class="px-3 py-3.5 uppercase font-semibold text-left text-sm"></th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($dossiers as $dossier)
                            <tr class="hover:bg-teal-50 even:bg-gray-50">
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">{{ $dossier->id }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $dossier->type }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $dossier->statut }}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">@datetime($dossier->created_at)</td>
                                <td class="whitespace-nowrap py-4 px-3 text-sm">
                                    <a href="{{ route('depositaire.show', $dossier->id) }}" class="text-indigo-600 hover:text-emerald-400">Voir</a>
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
                                    <form x-ref="delete" action="{{ route('depositaire.destroy', $dossier->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>

                                    <!-- Modal de confirmation -->
                                    <div x-cloak x-show="showModal" class="fixed inset-0 z-10 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
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
                                                    <form action="{{ route('depositaire.destroy', $dossier->id) }}" method="POST">
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
                    <div class="text-center py-8">
                        <p class="text-2xl font-medium text-gray-500">Aucun dossier déposé pour l'instant.</p>
                    </div>
                @endif
            </div>
        </div>
    </main>

</x-layaout>
