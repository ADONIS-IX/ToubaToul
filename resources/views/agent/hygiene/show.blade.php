<x-layout title="Vue Dossier">
    {{-- Nav-side --}}
    <nav class="fixed top-30 h-screen left-0 w-64 bg-emerald-900 text-white p-4 space-y-4">
        <h2 class="text-xl font-bold mb-4">Navigation</h2>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('hygiene.index') }}" class="flex items-center px-4 py-2 rounded transition duration-300  hover:bg-emerald-300">
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
                <a href="#" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-yellow-500">
                    <i class="fas fa-life-ring mr-2"></i> Support
                </a>
            </li>
        </ul>
    </nav>

    {{-- Main content --}}
    <main class="ml-64 flex-1 bg-teal-50 p-4 sm:p-8">
        <div class="container mx-auto mt-8">
            <div class="max-w-lg mx-auto">
                <div class="shadow-md rounded-lg overflow-hidden bg-emerald-50">

                    <div class="flex justify-center bg-emerald-700">
                        <svg version="1.1" viewBox="0 0 2000 2000" width="200" height="200" xmlns="http://www.w3.org/2000/svg">
                        <path transform="translate(925,666)" d="m0 0 5 2 11 10 11 9 8 8 8 7 14 13 8 7 11 10 8 7 16 15 8 7 10 9 16 14 4-1 12-11 10-9 8-7 10-9 8-8h2v-2l16-14 4 1 8 7 12 11 8 7 10 9 8 7 5 4v2l4 2 14 13 8 7 13 12 12 11 10 9 8 7 12 11 10 9 11 10 8 7 10 9 13 12 8 7 10 9 12 11 10 9 12 11 8 7 13 12 7 6-1 5-13 15-6 6h-5l-14-12-16-15-8-7-11-10-8-7-16-15-8-7-11-10-8-7-16-15-8-7-11-10-8-7-16-15-8-7-10-9-8-7-16-15-10-9-8-7-20-18-3-1-5 5h-2l-1 3-8 7-12 11-11 10-3 3 8 8 11 9 7 7 8 7 13 12 20 18 11 10 8 7 15 14 8 7 10 9 12 11 11 10 8 7 12 11 6 5-1 5-12 13-7 8-7-1-15-14-11-9-7-7-8-7-15-14-8-7-10-9-8-7-16-15-11-9-16-15-14-13-8-7-10-9-8-7-4-2-15 14-10 9-16 15-10 9-2 1v2l8 7 10 9 8 7 12 11 8 7 15 14 8 7 10 9 6 5-1 5-13 14-6 7-7-1-16-15-8-7-13-12-11-9-15-14-8-7-10-9-15-14-8-7-13-12-3-2-4 1-12 11-10 9-13 12-15 14-12 11h-2v2l-8 7-39 36-8 6-6-1-15-16-5-5 2-4 11-10 8-7 10-10 8-7 14-13 8-7 12-11 17-16 24-22 8-7 9-9 8-7 6-6 5 1 11 10 11 9 8 7 3 3 8-6 11-11 8-7 8-8 11-9 8-7-1-3-8-7-10-10-8-7-15-14-8-7-10-9-16-15-11-9-17-16-3-1-13 12-16 15-26 24-24 22-16 15-10 9-15 14-8 7-5 5h-2l-1 3-8 7-15 14-8 7-15 14-12 11-16 15-8 7-15 14-26 24-8 7-15 14-12 11-4 3h-5l-22-22 6-7 7-7 8-7 15-14 8-7 15-14 17-16 11-10 8-7 30-28 24-22 8-7 8-8 8-7 16-15 8-7 13-12 7-7 8-7 14-13 8-7 12-11 7-7 8-7 16-15 8-7 13-12 7-7h2l1-3z" fill="#FEFEFE"/>
                        <path transform="translate(647,480)" d="m0 0h705l1 1v385l-1 1h-25l-1-2 1-358h-654v360h-26l-1-2v-376z" fill="#FEFEFE"/>
                        <path transform="translate(647,1030)" d="m0 0h25l1 1v118l653-1 1-118h25l1 1v142l-2 2h-704z" fill="#FEFEFE"/>
                        <path transform="translate(979,1283)" d="m0 0h12l15 2 9 4 7 8 2 6v16l-4 11-7 10-11 7-6 1 6 12 10 19 7 13v3l-7 1h-17l-3-3-14-32-4-9h-1l-6 39-1 4-2 1h-17l-3-1 1-10 10-62 6-38 1-1zm2 18-3 14-2 12v8h10l8-3 6-6 2-7v-9l-3-5-4-3-6-1z" fill="#FEFEFE"/>
                        <path transform="translate(1104,1283)" d="m0 0h19l16 2 10 5 5 6 3 7v16l-3 9-6 9-5 5-8 5-6 1 8 16 15 29v2l-2 1h-21l-4-3-15-34-3-5v-2h-2l-1 13-4 26-2 5h-19l-2-1 1-9 14-89 2-12 1-1zm10 18-3 13-3 21h11l8-3 5-5 3-8v-10l-5-6-7-2z" fill="#FEFEFE"/>
                        <path transform="translate(1265,1280)" d="m0 0h13l2 1 6 27 16 76 2 11-2 1h-20l-2-2-4-19v-3l-40 1-7 14-6 9h-22l2-5 18-34 13-24 12-22 10-19 6-10zm-1 35-8 16-10 21v2h26l-2-16-4-22z" fill="#FEFEFE"/>
                        <path transform="translate(846,1283)" d="m0 0 51 1 1 3-3 15-36 1-4 24h33l1 1-1 13-2 5-34 1-5 30h36l-2 15-2 4h-56l-1-5 11-68 6-37 1-2z" fill="#FEFEFE"/>
                        <path transform="translate(715,1284)" d="m0 0h67l-2 14-1 4h-23l-1 12-9 56-4 25-8 1-14-1 1-12 10-62 3-18-22-1 1-11z" fill="#FEFEFE"/>
                        <path transform="translate(1036,1420)" d="m0 0h13l1 4-6 38v12l1 5 4 1h9l5-3 4-9 4-21 4-24 1-3h13l1 3-6 36-4 16-6 9-8 7-7 2h-16l-8-4-4-5-2-6v-17z" fill="#FEFEFE"/>
                        <path transform="translate(817,1420)" d="m0 0h29l6 3 6 7 1 9-2 9-5 9-6 5-8 2-13 1-4 25-2 2-13-1 2-14zm13 11-2 7-1 6v9h9l5-3 3-6v-10l-2-2z" fill="#FEFEFE"/>
                        <path transform="translate(1181,1418)" d="m0 0h11l9 3 3 2-1 6-4 6-8-4h-8l-5 5v5l5 4 11 6 6 7 1 3v10l-4 9-7 8-4 3-6 2h-13l-6-3-5-4-2-3 1-5 6-6 4 2 2 5 4 1h7l4-2 3-5v-6l-4-5-12-6-6-7-1-3v-7l4-10 5-6z" fill="#FEFEFE"/>
                        <path transform="translate(934,1420)" d="m0 0h13l-1 13-7 42-1 5h19l1 3-2 8h-34l2-14 8-51z" fill="#FEFEFE"/>
                        </svg>
                    </div>

                    <div class="px-6 py-4">
                        <h2 class="text-xl font-medium text-gray-800">Détails du dossier :</h2>
                        <div class="mt-5 flex flex-wrap -mx-2">
                        <div class="w-full sm:w-1/2 px-2 mb-4 relative">
                            <p class="text-sm font-semibold text-gray-600">Numéro dossier :</p>
                            <p class="text-lg font-bold text-gray-900">{{ $dossier->id }}</p>
                        </div>
                        <div class="w-full sm:w-1/2 px-2 mb-4 relative">
                            <p class="text-sm font-semibold text-gray-600">Titre demande :</p>
                            <p class="text-lg font-medium text-gray-900">{{ $dossier->type }}</p>
                        </div>
                    </div>
                    <div class="mt-2 flex flex-wrap -mx-2">
                        <div class="w-full sm:w-1/2 px-2 mb-4 relative">
                            <p class="text-sm font-semibold text-gray-600">Numéro parcelle :</p>
                            <p class="text-lg font-medium text-gray-900">{{ $dossier->parcelle->numeroLot }}</p>
                        </div>
                        <div class="w-full sm:w-1/2 px-2 mb-4 relative">
                            <p class="text-sm font-semibold text-gray-600">Localité :</p>
                            <p class="text-lg font-medium text-gray-900">{{ $dossier->parcelle->lotissement->localite->nom }}</p>
                        </div>
                    </div>
                    <div class="mt-2 flex flex-wrap -mx-2">
                        <div class="w-full sm:w-1/2 px-2 mt-4 relative">
                            <p class="text-sm font-semibold text-gray-600">Statut :</p>
                            <p class="text-xl font-bold inline-flex text-gray-900">{{ $dossier->statut }}</p>
                        </div>
                        <div class="w-full sm:w-1/2 px-2 mt-4 relative">
                            <p class="text-sm font-semibold text-gray-600">Requerant :</p>
                            <p class="text-xl font-bold inline-flex text-gray-900">{{ $dossier->user->prenom }} {{ $dossier->user->nom }}</p>
                        </div>
                    </div>
                        <div class="mt-4">
                            <p class="text-sm font-semibold text-gray-600">Date de dépôt :</p>
                            <p class="text-md font-medium text-gray-900">@datetime($dossier->created_at)</p>
                        </div>
                        <div class="mt-4">
                            <p class="text-sm font-semibold text-gray-600">Date de fin d'instruction :</p>
                            @if($dossier->created_at->eq($dossier->updated_at))
                            <p class="text-md font-medium text-gray-900">---</p>
                            @else
                            <p class="text-md font-medium text-gray-900">@datetime($dossier->updated_at)</p>
                            @endif
                        </div>
                        <div class="mt-4">
                            <p class="text-sm font-semibold text-gray-600">Pièces jointes :</p>
                            <ul class="mt-2">
                                @forelse($dossier->pieceDossier as $piece)
                                    <li><a href="{{ asset('storage/' . $piece->nom) }}" target="_blanck" class="text-blue-500 hover:underline">{{ $piece->nom }}</a></li>
                                        @empty
                                        <p class="text-sm font-medium sm:pl-3 text-emerald-700">Aucune pièce pour ce dossier.</p>
                                @endforelse
                            </ul>
                        </div>
                        <div class="mt-4 max-w-md mx-auto p-6 bg-white rounded-lg shadow-md">
                            <h2 class="text-2xl font-bold mb-6 text-gray-800">Instruction Dossier</h2>
                            <form action="{{ route('hygiene.store', $dossier->id )}}" method="POST" x-data="{ avis: '' }">
                                @csrf
                                <input type="hidden" name="dossier_id" value="{{ $dossier->id }}">
                                <div class="flex flex-col space-y-4">
                                    <div class="flex h-12">
                                        <select x-model="avis" id="avis" name="avis" class="w-full bg-slate-50 rounded-lg px-5 text-slate-900 border focus:outline focus:outline-2 focus:outline-emerald-500">
                                            <option value="">-- Sélectionnez un avis --</option>
                                            @foreach ($avis as $option)
                                                <option value="{{ $option->value }}">{{ $option->value }}</option>
                                            @endforeach
                                        </select>
                                        @error('avis')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div x-cloak x-show="avis === 'Reserve'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0">
                                        <input class="w-full h-12 bg-slate-50 rounded-lg px-5 text-slate-900 border focus:outline focus:outline-2 focus:outline-emerald-500" type="text" name="observation" placeholder="Quelque remarque à ajouter ? 🚩" autocomplete="off">
                                        @error('observation')
                                            <span class="text-red-500 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div  x-cloak x-show="avis !== ''" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform -translate-y-4" x-transition:enter-end="opacity-100 transform translate-y-0">
                                        <button type="submit" class="w-full h-12 flex justify-center items-center bg-emerald-700 rounded-lg text-indigo-50 hover:bg-emerald-600 transition duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 mr-2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                            </svg>
                                            Soumettre
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <p class="mt-4 text-sm font-semibold text-gray-600">Observations :</p>
                            <div class="space-y-8">
                                @foreach ($dossier->observations as $observation)
                                    <div class="flex bg-slate-50 p-6 rounded-lg">
                                        <img class="w-10 h-10 sm:w-12 sm:h-12 object-cover rounded-full" src="{{ Gravatar::get($observation->user->email) }}" alt="image de profile de {{ $observation->user->prenom }} {{ $observation->user->nom }}">
                                        <div class="ml-4 flex flex-col">
                                            <div class="flex flex-col sm:flex-row sm:items-center">
                                                <h2 class="font-bold text-slate-900 text-lg">{{ $observation->user->prenom }} {{ $observation->user->nom }}</h2>
                                                <time class="mt-2 sm:mt-0 sm:ml-4 text-xs text-slate-400" datetime="{{ $observation->created_at }}">@datetime($observation->created_at)</time>
                                            </div>
                                            <p class="mt-4 text-slate-500 rounded-full bg-slate-200 fkex inline-flex sm:leading-loose">{{ $observation->avis }}</p>
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
