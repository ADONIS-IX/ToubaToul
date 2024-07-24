<x-layout title="Mon dossier">
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
                <a href="{{ route('support') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-gray-700">
                    <i class="fas fa-life-ring mr-2"></i> Support
                </a>
            </li>
        </ul>
    </nav>

    {{-- Main content --}}
    <main class="ml-64 flex flex-1 items-center justify-center bg-gradient-to-r from-emerald-100 to-lime-100 min-h-screen">
        <div class="container mx-auto mt-8">
            <div class="max-w-lg mx-auto">
                <div class="shadow-md rounded-lg overflow-hidden bg-emerald-50">

                <div class="flex justify-center bg-emerald-700">
                    <svg version="1.1" viewBox="0 0 2000 2000" width="200" height="200" xmlns="http://www.w3.org/2000/svg">
                    <path transform="translate(925,666)" d="m0 0 5 2 14 12 15 14 8 7 13 12 10 9 11 10 8 7 15 14 10 9 11 9 7 7 7 6 5-1 14-14 8-7 10-9 12-11 16-15h2l1-3 5-1 8 7 10 9 11 10 8 7 12 11 10 9 11 10 8 7 13 12 10 9 12 11 8 7 10 9 12 11 20 18 8 7 13 12 10 9 8 7 13 12 10 9 12 11 8 7 11 10 8 7 1 5-9 10-7 8-6 5-6-3-15-14-8-7-13-12-8-7-12-11-10-9-12-11-20-18-12-11-11-10-8-7-10-9-15-14-10-9-8-7-24-22-11-10-8-7-12-11-8-7-5-1-7 7-8 7-13 12-11 10h-2l3 5 10 9 12 11 10 9 12 11 10 9 8 7 13 12 8 7 13 12 30 27 12 11 8 7 13 12 6 5-1 5-10 11-7 8-2 2-7-1-14-13-11-9-8-8-8-7-13-12-10-9-8-7-12-11-10-9-11-10-8-7-24-22-10-9-8-7-10-9-4-2-16 15-10 9-15 14-10 9-2 2 7 7 8 7 13 12 10 9 8 7 13 12 8 7 13 12 5 4-1 5-11 12-7 8-1 1-7-1-15-14-10-9-8-7-11-10-11-9-7-7-8-7-12-11-13-12-10-9-8-7-7-6-4 1-36 33-15 14-10 9-13 12-15 14-12 11-11 10-7 5-6-1-9-9-7-8-4-4 2-4 13-12 12-11 15-14 24-22 10-9 17-16 10-9 13-12 12-11 13-12 4-4 5 1 10 9 8 7 14 12 4-1 13-12 16-15 11-10 11-9-1-3-8-7-9-9-8-7-15-14-8-7-10-9-15-14-10-9-8-7-10-9-5-3-13 12-17 16-13 12-12 11-52 48-12 11-15 14-24 22-26 24-10 9-17 16-8 7-16 15-10 9-15 14-10 9-16 15-10 9-7 1-5-4-7-8-10-10 6-7 7-7 8-7 17-16 8-7 13-12 17-16 24-22 10-9 4-4h2v-2l8-7 13-12 12-11 13-12 15-14 24-22 10-9 17-16 12-11 10-9 13-12 16-15 12-11 10-9 15-14z" fill="#050505"/>
                    <path transform="translate(647,480)" d="m0 0h705l1 1v385l-1 1h-25l-1-2 1-358h-654v360h-26l-1-3v-383z" fill="#040404"/>
                    <path transform="translate(647,1030)" d="m0 0h26v119l653-1v-34l1-84h25l1 1v143l-2 1h-704l-1-17v-126z" fill="#030303"/>
                    <path transform="translate(963,1283)" d="m0 0h30l14 2 8 4 7 8 2 6v16l-4 11-8 11-10 6-6 1 6 12 10 19 8 16-9 1h-16l-3-3-18-40-2-1-1 14-5 29-1 1h-12l-9-1 2-16 13-82 2-13zm18 18-3 14-2 13v7h10l8-3 6-7 2-6v-8l-3-6-5-3-5-1z" fill="#060606"/>
                    <path transform="translate(1096,1283)" d="m0 0h30l14 2 8 4 7 8 2 5v17l-4 11-8 11-10 6-6 1 8 16 12 23 3 5-1 4h-22l-4-3-15-33-3-6v-2h-2l-1 14-5 29-1 1h-19l-2-1 1-10 14-88 2-13zm19 18-2 2-4 24v8h10l8-3 6-7 2-6v-9l-4-6-8-3z" fill="#060606"/>
                    <path transform="translate(1265,1280)" d="m0 0h14l2 3 20 97 3 15-2 1h-20l-2-2-4-18v-4h-40l-2 6-10 17-1 1h-22l1-4 9-16 14-27 10-18 13-24 10-19 4-7zm-1 35-8 16-10 21v2h26l-2-16-4-23z" fill="#050505"/>
                    <path transform="translate(841,1283)" d="m0 0h45l12 1-1 8-2 10-36 1-4 24h34l-1 14-1 5-35 1-4 26v3l35 1-2 17-2 2h-56l-1-5 9-55 7-45 2-7z" fill="#060606"/>
                    <path transform="translate(722,1283)" d="m0 0h58l2 1-1 8-2 10h-23l-1 12-11 68-2 13-2 1h-19l-1-1 1-12 12-75 1-5h-21l-1-1 1-12 1-6z" fill="#090909"/>
                    <path transform="translate(1036,1420)" d="m0 0h14l-2 16-4 27v11l1 5 4 1h10l5-5 3-7 7-41 1-7h15l-1 8-6 37-4 12-4 6-5 5-4 3-6 2-10 1-10-2-6-4-4-7-1-3v-17l6-37z" fill="#080808"/>
                    <path transform="translate(817,1420)" d="m0 0h29l8 4 4 6 1 9-3 12-6 8-7 4-15 2h-3l-4 25-2 2-13-1 3-21zm14 11-2 1-2 13v8h8l5-3 3-3 1-3v-9l-2-3z" fill="#050505"/>
                    <path transform="translate(1181,1418)" d="m0 0h11l11 4 1 5-5 8-8-4h-8l-5 5v5l5 4 11 6 6 7 1 2v11l-4 9-7 8-6 4-3 1h-14l-8-4-5-6 1-5 6-6h3l4 6 4 2h6l4-2 3-6-1-7-5-4-10-5-6-7-1-3v-8l6-12 8-6z" fill="#0B0B0B"/>
                    <path transform="translate(945,1419)" d="m0 0 2 1-1 13-7 43-1 4h19l1 4-2 7h-34l3-21 8-50z" fill="#070707"/>
                    </svg>

                </div>


                    <div class="px-6 py-4">
                        <h2 class="text-xl font-medium text-gray-800">Détails du dossier</h2>
                        <div class="mt-5 flex flex-wrap -mx-2">
                        <div class="w-full sm:w-1/2 px-2 mb-4 relative">
                            <p class="text-sm font-semibold text-gray-600">Numéro dossier :</p>
                            <p class="text-lg font-medium text-gray-900">{{ $dossier->id }}</p>
                        </div>
                        <div class="w-full sm:w-1/2 px-2 mb-4 relative">
                            <p class="text-sm font-semibold text-gray-600">Titre demande :</p>
                            <p class="text-lg font-medium text-gray-900">{{ $dossier->type }}</p>
                        </div>
                    </div>
                        <div class="mt-4">
                            <p class="text-sm font-semibold text-gray-600">Statut :</p>
                            <p class="text-2xl font-medium bg-amber-400 inline-flex text-gray-900">{{ $dossier->statut }}</p>
                        </div>
                        <div class="mt-4">
                            <p class="text-sm font-semibold text-gray-600">Date de dépôt :</p>
                            <p class="text-md font-medium text-gray-900">@datetime($dossier->created_at)</p>
                        </div>
                        <div class="mt-4">
                            <p class="text-sm font-semibold text-gray-600">Date de fin d'instruction :</p>
                            @if ($dossier->created_at != $dossier->updated_at)
                                <p class="text-md font-medium text-gray-900">@datetime($dossier->updated_at)</p>
                                @else
                                <p class="text-md font-medium text-gray-900">---</p>
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
                        <div class="mt-4">
                            <p class="text-sm font-semibold text-gray-600">Observations :</p>
                            <ul class="mt-2">
                                @forelse ($dossier->observations as $observation)
                                <li><p class="text-sm font-medium sm:pl-3 text-red-500"> - {{ $observation->content }}</p></li>
                                @empty
                                <p class="text-sm font-medium sm:pl-3 text-emerald-700">Aucune observation pour ce dossier.</p>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</x-layaout>
