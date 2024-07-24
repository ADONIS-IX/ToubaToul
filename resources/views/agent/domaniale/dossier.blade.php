<x-layout title="Edition dossier">
    {{-- Nav-side --}}
    <nav class="fixed top-30 h-screen left-0 w-64 bg-emerald-900 text-white p-4 space-y-4">
        <h2 class="text-xl font-bold mb-4">Navigation</h2>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('domaniale.index') }}" class="flex items-center px-4 py-2 rounded transition duration-300  hover:bg-emerald-300">
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
                <a href="{{ route('domaniale.instruction.index') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-yellow-500">
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
    <main class="ml-64 flex-1 bg-teal-50 p-8">
        <div class="container mx-auto p-4 space-y-8">
            <div x-cloak class="bg-white shadow-md rounded-lg overflow-hidden" x-data="{ open: false }">
                <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        Numero dossier: {{ $dossier->id }}
                    </h3>
                    <button @click="open = !open" class="text-indigo-600 hover:text-indigo-900">
                        <span x-show="!open">Voir Plus</span>
                        <span x-show="open">Voir Moins</span>
                    </button>
                </div>
                <div x-show="open" class="border-t border-gray-200">
                    <dl class="divide-y divide-gray-200">
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Type
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $dossier->type }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Prénom et Nom
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $dossier->user->prenom }} {{ $dossier->user->nom }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Adresse
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $dossier->user->adresse }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Numéro de Téléphone
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $dossier->user->telephone }}
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Profession
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $dossier->user->profession }}
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">
                                Email
                            </dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                {{ $dossier->user->email }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="container bg-gradient-to-r from-emerald-100 to-lime-100 py-12 px-4 sm:px-6 lg:px-8">
                <form action="{{ route('domaniale.update', $dossier->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mb-4">
                        <label for="statut" class="block mb-2">Statut</label>
                        <select name="statut" id="statut" class="w-full p-2 border rounded">
                            @foreach($etats as $etat)
                                <option value="{{ $etat->value }}" {{ $dossier->statut == $etat->value ? 'selected' : '' }}>
                                    {{ $etat->value }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <h3 class="text-xl font-bold mb-2">Nouvelle Parcelle</h3>

                    <div class="mb-4">
                        <label for="numeroLot" class="block mb-2">Numéro de Lot</label>
                        <input type="text" value="{{ old('numeroLot', $dossier->parcelle->numeroLot ?? '') }}" name="numeroLot" id="numeroLot"  class="w-full p-2 border rounded">
                        @error('numeroLot')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="superficie" class="block mb-2">Superficie</label>
                        <input type="number" step="0.01" name="superficie" id="superficie" value="{{ old('superficie', $dossier->parcelle->superficie ?? '') }}" class="w-full p-2 border rounded" >
                        @error('superficie')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="coordonne_x" class="block mb-2">Coordonnée X</label>
                        <input type="number" step="0.000001" name="coordonne_x" id="coordonne_x" value="{{ old('coordonne_x', $dossier->parcelle->coordonne_x ?? '') }}" class="w-full p-2 border rounded" >
                        @error('coordonne_x')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="coordonne_y" class="block mb-2">Coordonnée Y</label>
                        <input type="number" step="0.000001" name="coordonne_y" id="coordonne_y" value="{{ old('coordonne_y', $dossier->parcelle->coordonne_y ?? '') }}" class="w-full p-2 border rounded" >
                        @error('coordonne_y')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="lotissement_id" class="block mb-2">Lotissement</label>
                        <select name="lotissement_id" id="lotissement_id" class="w-full p-2 border rounded" >
                            @foreach($lotissements as $lotissement)
                                <option value="{{ $lotissement->id }}">{{ $lotissement->titre }}</option>
                            @endforeach
                        </select>
                        @error('lotissement_id')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="statut_parcelle_id" class="block mb-2">Statut de la Parcelle</label>
                        <select name="statut_parcelle_id" id="statut_parcelle_id" class="w-full p-2 border rounded" >
                            @foreach($status as $statut)
                                <option value="{{ $statut->id }}">{{ $statut->titre }}</option>
                            @endforeach
                        </select>
                        @error('statut_parcelle_id')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="droit_propriete" class="block mb-2">Droits de Propriété</label>
                        <select name="droit_propriete[]" id="droit_propriete" class="w-full p-2 border rounded" multiple >
                            @foreach($droitsPropriete as $droit)
                                <option value="{{ $droit->id }}"  {{ (collect(old('droit_propriete'))->contains($droit->id)) ? 'selected' : '' }}>{{ $droit->type }}</option>
                            @endforeach
                        </select>
                        @error('droit_propriete')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="plan_lotissement" class="block mb-2">Plan de lotissement</label>
                         <input type="file" name="plan_lotissement" id="plan_lotissement" class="w-full p-2 border rounded bg-white" >
                        @error('plan_lotissement')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="notification" class="block mb-2">Notification d'attribution</label>
                         <input type="file" name="notification" id="notification" class="w-full p-2 border rounded bg-white" >
                        @error('notification')
                            <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4" x-data="{
                        currentRole: '{{ $dossier->user->role }}',
                        showRoleSelection: {{ $dossier->user->role === \App\Enums\Role::Depositaire ? 'true' : 'false' }}
                    }">
                        <div x-show="!showRoleSelection">
                            <p>Rôle actuel du requérant : {{ $dossier->user->role }}</p>
                        </div>
                    </div>

                    @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Mettre à jour et Créer la Parcelle</button>
                </form>
            </div>
        </div>

    </main>

</x-layout>
