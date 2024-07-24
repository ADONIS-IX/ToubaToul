<x-layout title="Creation d'un dossier">
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
                <a href="#" class="flex items-center px-4 py-2 rounded transition duration-300 bg-gray-500">
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
    <main class="ml-64 flex flex-1 items-center justify-center bg-gradient-to-r from-emerald-200 to-lime-200 min-h-screen">
        <main class="min-h-screen bg-gradient-to-r from-emerald-100 to-lime-100 py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-3xl md:text-4xl font-bold text-center text-emerald-800 mb-12">
                    Créer un Nouveau Dossier
                </h1>

                <form action="{{ route('proprietaire.store') }}" method="POST" enctype="multipart/form-data" x-data="{ type: '{{ old('type', '') }}' }" class="space-y-8">
                    @csrf

                    {{-- Type Selection --}}
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <label for="type" class="block text-lg font-medium text-gray-700 mb-2">Type de Dossier</label>
                        <select id="type" name="type" x-model="type" class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition duration-300">
                            <option value="">Sélectionner le type de dossier</option>
                            @foreach ($types as $type)
                                <option value="{{ $type->value }}" {{ old('type') == $type->value ? 'selected' : '' }}>
                                    {{ $type->value }}
                                </option>
                            @endforeach
                        </select>
                        @error('type')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                     <!-- Parcelle Selection -->
                     <div x-show="type && type !== 'Terrain'" class="bg-white rounded-xl shadow-lg p-6">
                        <label for="parcelle_id" class="block text-sm font-medium text-gray-700">Sélectionnez une parcelle</label>
                        <select id="parcelle_id" name="parcelle_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border border-gray-300 focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm rounded-md">
                            <option value="">-- Choisir --</option>
                            @foreach($parcelles as $parcelle)
                                <option value="{{ $parcelle->id }}" {{ old('parcelle_id') == $parcelle->id ? 'selected' : '' }}>{{ $parcelle->numeroLot }} - {{ $parcelle->lotissement->localite->nom }}</option>
                            @endforeach
                        </select>
                        @error('parcelle_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Required Documents --}}
                    <div x-show="type" x-cloak class="bg-white rounded-xl shadow-lg p-6 transition duration-300 hover:shadow-xl">
                        <h2 class="text-2xl font-semibold text-emerald-700 mb-6">Documents Requis</h2>

                        {{-- Example for 'Bail' Type --}}
                        <div x-show="type === 'Bail'" class="space-y-4">
                            <x-file-input label="Carte d'Identité Nationale" name="piece_identite_bail"/>
                            <x-file-input label="Notification d'Attribution de Parcelle" name="notification_attribution_bail"/>
                            <x-file-input label="Extrait de Plan Cadastral" name="extrait_plan_bail"/>
                            <x-file-input label="Quittance de Paiement" name="quittance_paiement_bail"/>
                        </div>

                        <div x-show="type === 'Construction'" class="space-y-4">
                            <x-file-input label="Attestation d'attribution" name="attestation_attribution_construction"/>
                            <x-file-input label="Extrait de plan cadastrale" name="extrait_plan_cadastrale_construction"/>
                            <x-file-input label="Carte d'identité nationale" name="piece_identite_construction"/>
                            <x-file-input label="Plan architectural - Rez-de-chaussée" name="plan_rez"/>
                            <x-file-input label="Plan architectural - Façade principale" name="plan_facade"/>
                            <x-file-input label="Plan architectural - Plan de coupe" name="plan_coupe"/>
                            <x-file-input label="Plan architectural - Plan de masse" name="plan_masse"/>
                            <x-file-input label="Plan architectural - Plan terrasse" name="plan_terrasse"/>
                            <x-file-input label="Plan architectural - Plan fosse septique ou d'assainissement" name="plan_fosse"/>
                            <x-file-input label="Devis estimatif" name="devis_estimatif"/>
                            <x-file-input label="Devis descriptif" name="devis_descriptif"/>
                            <x-file-input label="Lettre adressée au chef de service urbanisme" name="lettre_urbanisme"/>
                        </div>

                        <div x-show="type === 'Extrait plan cadastrale'" class="space-y-4">
                            <x-file-input label="Pièce d'identité nationale" name="piece_identite_cadastre"/>
                            <x-file-input label="Notification d'attribution" name="notification_attribution_cadastre"/>
                            <x-file-input label="Plan de lotissement" name="plan_lotissement"/>
                        </div>

                        <div x-show="type === 'Terrain'" class="space-y-4">
                            <x-file-input label="Pièce d'identité nationale" name="piece_identite"/>
                        </div>

                        <div x-show="type === 'Titre foncier'" class="space-y-4">
                            <x-file-input label="Pièce d'identité nationale" name="piece_identite_foncier"/>
                            <x-file-input label="Acte de bail" name="acte_bail_foncier"/>
                            <x-file-input label="Demande de cession définitive" name="demande_cession"/>
                        </div>

                        <div x-show="type === 'Mutation'" class="space-y-4">
                            <x-file-input label="Pièce d'identité nationale du cédant" name="piece_identite_cedant"/>
                            <x-file-input label="Pièce d'identité nationale du nouveau proprietaire" name="piece_identite_newproprietaire"/>
                            <x-file-input label="Acte de vente" name="acte_vente"/>
                            <x-file-input label="Acte de bail" name="acte_bail"/>
                            <x-file-input label="Acte de peine et de soins" name="acte_peine"/>
                            <x-file-input label="Déclaration de Mutation" name="declaration_mutation"/>
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

                    <div class="flex justify-center mt-8">
                        <button type="submit" class="bg-emerald-600 text-white font-bold py-3 px-6 rounded-full transition duration-300 hover:bg-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2">
                            Créer le Dossier
                        </button>
                    </div>
                </form>
            </div>
        </main>
    </main>

</x-layout>
