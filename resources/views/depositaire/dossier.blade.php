<x-layout title="Creation d'un dossier">
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

    <main class="flex flex-1 items-center justify-center bg-gradient-to-r from-emerald-200 to-lime-200 min-h-screen">
        <div class="max-w-2xl mx auto bg-white min-h-screen p-8 shadow-md rounded-md">
            <form action="{{ route('depositaire.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <h1 class="text-base font-semibold leading-7 text-gray-900">Créer un dossier</h1>
                        <p class="mt-1 text-sm leading-6 text-gray-600">Déposer votre photocopie de carte d'identité légalisé.</p>
                    </div>

                    <div class="mt-10 space-y-2">
                        <label for="type" class="block text-sm font-bold text-gray-700">Type de demande</label>
                        <input type="text" value="Terrain" disabled class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                        <input type="hidden" name="type" value="Terrain">
                    @error('type')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                    </div>

                    <div class="mb-4">
                        <label for="piece_identite" class="block text-sm font-bold text-gray-700">Pièce d'Identité</label>
                        <input type="file" name="piece_identite" id="piece_identite" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-emerald-500 focus:ring-emerald-500">
                        @error('piece_identite')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>



                    <div class="mt-8 flex items-center justify-end gap-x-6">
                        <button type="submit" class="w-full bg-emerald-600 text-white py-2 px-3 rounded-md shadow-md hover:bg-emerald-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">Déposer</button>
                    </div>

                </div>

            </form>

        </div>
    </main>




</x-layaout>


{{--

 <div class="max-w-2xl mx-auto bg-white min-h-screen p-8 shadow-md rounded-md space-y-12">
        <h1 class="text-2xl font-bold mb-6">Créer un nouveau dossier</h1>
        <p class="text-sm">Scanner et déposer votre photocopie de piéce d'identité pour la demande de terrain</p>
        <form action="{{ route('depositaire.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-4">
                <label for="type" class="block text-sm font-bold text-gray-700">Type de demande</label>
                <select name="type" id="type" class="mt-1 block w-full border-emerald-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    @foreach ($types as $type)
                        <option value="{{ $type->value }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                @error('type')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label for="identityDocument" class="block text-sm font-bold text-gray-700">Pièce d'Identité</label>
                <input type="file" name="identityDocument" id="identityDocument" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                @error('identityDocument')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-8 flex items-center justify-end gap-x-6">
                <button type="submit" class="w-full bg-emerald-600 text-white py-2 px-3 rounded-md shadow-md hover:bg-emerald-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">Déposer</button>
            </div>
        </form>
    </div>

--}}
