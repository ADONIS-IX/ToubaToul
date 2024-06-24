<div class="group relative flex justify-center items-center text-zinc-600 text-sm font-bold">
    <div class="shadow-md flex items-center group-hover:gap-2 bg-gradient-to-br from-lime-200 to-yellow-200 p-3 rounded-full cursor-pointer duration-300">
        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 17h6m-3 3v-6M4.857 4h4.286c.473 0 .857.384.857.857v4.286a.857.857 0 0 1-.857.857H4.857A.857.857 0 0 1 4 9.143V4.857C4 4.384 4.384 4 4.857 4Zm10 0h4.286c.473 0 .857.384.857.857v4.286a.857.857 0 0 1-.857.857h-4.286A.857.857 0 0 1 14 9.143V4.857c0-.473.384-.857.857-.857Zm-10 10h4.286c.473 0 .857.384.857.857v4.286a.857.857 0 0 1-.857.857H4.857A.857.857 0 0 1 4 19.143v-4.286c0-.473.384-.857.857-.857Z"/>
          </svg>
      <span class="text-[0px] group-hover:text-sm duration-300">Attribuer une nouvelle parcelle</span>
    </div>
  </div>


  <div class="group relative flex justify-center items-center text-zinc-600 text-sm font-bold">
    <div class="shadow-md flex items-center group-hover:gap-2 bg-gradient-to-br from-lime-200 to-yellow-200 p-3 rounded-full cursor-pointer duration-300">
        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 17h6m-3 3v-6M4.857 4h4.286c.473 0 .857.384.857.857v4.286a.857.857 0 0 1-.857.857H4.857A.857.857 0 0 1 4 9.143V4.857C4 4.384 4.384 4 4.857 4Zm10 0h4.286c.473 0 .857.384.857.857v4.286a.857.857 0 0 1-.857.857h-4.286A.857.857 0 0 1 14 9.143V4.857c0-.473.384-.857.857-.857Zm-10 10h4.286c.473 0 .857.384.857.857v4.286a.857.857 0 0 1-.857.857H4.857A.857.857 0 0 1 4 19.143v-4.286c0-.473.384-.857.857-.857Z"/>
        </svg>
        <span class="ml-2 hidden group-hover:inline-block text-sm duration-300">Attribuer une nouvelle parcelle</span>
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


<main class="flex-1 bg-gray-200 p-8">
    <div class="container mx-auto py-8">
        <h2 class="text-2xl md:text-4xl font-bold text-center mb-8">Créer un Nouveau Dossier</h2>
        <form action="{{ route('proprietaire.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data" x-data="{ type: '' }">
            @csrf
            <div class="bg-white p-6 rounded-lg shadow-md">
                <label for="type" class="block text-sm font-medium text-gray-700">Type de Dossier</label>
                <select id="type" name="type" x-model="type" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm">
                    <option value="">Sélectionner le type de dossier</option>
                    @foreach ( $types as $type)
                        <option value="{{ $type->value }}">{{ $type->value }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Champs pour le type Bail -->
            <div class="bg-white p-6 rounded-lg shadow-md" x-show="type === 'Bail'" x-cloak>
                <label for="piece_identite" class="block text-sm font-medium text-gray-700">Carte d'Identité Nationale</label>
                <input type="file" id="piece_identite" name="piece_identite" class="mt-1 block w-full">

                <label for="notification_attribution" class="block text-sm font-medium text-gray-700 mt-4">Notification d'Attribution de Parcelle</label>
                <input type="file" id="notification_attribution" name="notification_attribution" class="mt-1 block w-full">

                <label for="extrait_plan" class="block text-sm font-medium text-gray-700 mt-4">Extrait de Plan Cadastral</label>
                <input type="file" id="extrait_plan" name="extrait_plan" class="mt-1 block w-full">

                <label for="quittance_paiement" class="block text-sm font-medium text-gray-700 mt-4">Quittance de Paiement</label>
                <input type="file" id="quittance_paiement" name="quittance_paiement" class="mt-1 block w-full">
            </div>

            <!-- Champs pour le type Permis -->
            <div class="bg-white p-6 rounded-lg shadow-md" x-show="type === 'Construction'" x-cloak>
                <x-file-input label="Attestation d'attribution" name="attestation_attribution"/>
                <x-file-input label="Extrait de plan cadastrale" name="extrait_plan_cadastrale"/>
                <x-file-input label="Carte d'identité nationale" name="carte_identite"/>
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

            <!-- Champs pour le plan cadastrale -->
            <div class="bg-white p-6 rounded-lg shadow-md" x-show="type === 'Extrait plan cadastrale'" x-cloak>
                <x-file-input label="Pièce d'identité nationale" name="piece_identite"/>
                <x-file-input label="Notification d'attribution" name="notification_attribution"/>
                <x-file-input label="Plan de lotissement" name="plan_lotissement"/>
            </div>

            {{-- champs pour le terrain --}}
            <div class="bg-white p-6 rounded-lg shadow-md" x-show="type == 'Terrain'" x-cloak>
                <x-file-input label="Pièce d'identité nationale" name="piece_identite"/>
            </div>

            {{-- champs pour le titre foncier --}}
            <div class="bg-white p-6 rounded-lg shadow-md" x-show="type == 'Titre foncier'" x-cloak>
                <x-file-input label="Pièce d'identité nationale" name="piece_identite"/>
                <x-file-input label="Acte de bail" name="acte_bail"/>
                <x-file-input label="Demande de cession définitive" name="demande_cession"/>
            </div>

            <!-- Champs pour le type Mutation -->
            <div class="bg-white p-6 rounded-lg shadow-md" x-show="type === 'Mutation'" x-cloak>
                <x-file-input label= "Acte de vente" name="acte_vente"/>
                <x-file-input label="Acte de bail" name="acte_bail"/>
                <x-file-input label="Acte de peine et de soins" name="acte_peine"/>

                <label for="declaration_mutation" class="block text-sm font-medium text-gray-700 mt-4">Déclaration de Mutation</label>
                <input type="file" id="declaration_mutation" name="declaration_mutation" class="mt-1 block w-full">
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <button type="submit" class="bg-emerald-600 text-white font-semibold shadow-sm py-2 px-4 rounded-full transition duration-300 hover:bg-emerald-500">Créer le Dossier</button>
            </div>
        </form>
    </div>
</main>
