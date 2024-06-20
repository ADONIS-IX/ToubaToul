<x-layout title="Tableau de bord">
    {{-- Nav side --}}
    <nav class="w-64 bg-gray-800 text-white p-4 space-y-4">
        <h2 class="text-xl font-bold mb-4">Navigation</h2>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('depositaire.index') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-gray-700">
                    <i class="fas fa-tachometer-alt mr-2"></i> Tableau de Bord
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-gray-700">
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
    <main class="flex-1 bg-gray-200 p-8">
        <div class="container mx-auto">
            <h2 class="text-2xl md:text-4xl font-bold text-center mb-8">Tableau de Bord</h2>
            <p class="mt-1 text-sm leading-6 text-gray-700">Vous pouvez procéder ici à une demande de terrain pour vos future habitations.</p>
            <div class="mt-8 space-y-8 md:w-2/3 mb-4">
                <a href="{{ route('depositaire.create') }}" class="inline-flex bg-emerald-600 text-white font-semibold shadow-sm py-2 px-4 rounded-full transition duration-300 hover:bg-emerald-500">
                    Déposer une Nouvelle Demande
                </a>
            </div>
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <table class="min-w-full bg-white divide-y divide-gray-300">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th scope="col" class="py-3.5 pl-4 pr-3 uppercase font-semibold text-left text-sm sm:pl-3">ID</th>
                            <th scope="col" class="py-3.5 px-3 uppercase font-semibold text-left text-sm">Procedure</th>
                            <th scope="col" class="py-3.5 px-3 uppercase font-semibold text-left text-sm">Statut</th>
                            <th scope="col" class="py-3.5 px-3 uppercase font-semibold text-left text-sm">Date de dépot</th>
                            <th scope="col" class="py-3.5 px-3 uppercase font-semibold text-left text-sm"></th>
                            <th scope="col" class="py-3.5 px-3 uppercase font-semibold text-left text-sm"></th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3"></th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 bg-white">
                        @forelse ($dossiers as $dossier)
                        <!-- Exemple de demande -->
                        <tr class="even:bg-gray-50">
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium sm:pl-3">{{ $dossier->id }}</td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm text-gray-900">{{ $dossier->type }}</td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm">{{ $dossier->statut }}</td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm">@datetime($dossier->created_at)</td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm">
                                <a href="{{ route('depositaire.show', $dossier->id) }}" target="_blank" class="text-indigo-600 hover:text-emerald-400">Voir</a>
                            </td>
                            <td class="whitespace-nowrap py-4 px-3 text-sm">
                                <a href="#" class="text-indigo-600 hover:text-emerald-400">
                                    Modifier</a>
                            </td>
                            <td x-data class="inline-flex relative whitespace-nowrap py-4 pl-3 pr-4 sm:pr-3 text-sm text-right font-medium">
                                <a href="#" @click.prevent="$refs.delete.submit()" class="text-red-600 hover:text-red-300">
                                    <span class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="18px" viewBox="0 -960 960 960" width="18px"  fill="#5f6368" class="fill-red-500 mr-1"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                                    Supprimer</a>
                                    </span>
                                <form x-ref="delete" action="#" method="POST">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        <!-- Ajouter d'autres demandes ici -->
                        @empty
                            <li class="text-sm font-medium sm:pl-3 text-emerald-700">Aucun dossier déposé pour l'instant.</li>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</x-layaout>
