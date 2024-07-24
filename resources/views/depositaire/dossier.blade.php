<x-layout title="Creation d'un dossier">
    {{-- Nav side --}}
    <nav class="fixed top-30 h-screen left-0 w-64 bg-gray-800 text-white p-4 space-y-4">
        <h2 class="text-xl font-bold mb-4">Navigation</h2>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('depositaire.index') }}"
                    class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-gray-700">
                    <i class="fas fa-tachometer-alt mr-2"></i> Tableau de Bord
                </a>
            </li>
            <li>
                <a href="{{ route('profil') }}"
                    class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-gray-700">
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

    <main class="ml-64 flex flex-1 items-center justify-center bg-gradient-to-r from-emerald-200 to-lime-200 min-h-screen">
        <main class="min-h-screen bg-gradient-to-r from-emerald-100 to-lime-100 py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-xl mx-auto">
                <h1 class="text-3xl md:text-4xl font-bold text-center text-emerald-800 mb-12">
                    Créer un Nouveau Dossier
                </h1>
                <form action="{{ route('depositaire.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="space-y-12">
                        <div class="bg-white rounded-xl shadow-lg p-6">
                            <label for="type" class="block text-lg font-medium text-gray-700 mb-2">Type de
                                dossier</label>
                            <input type="text" value="Terrain" disabled
                                class="w-full p-3 border border-gray-300 rounded-md focus:ring-2 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 transition duration-300">
                            <input type="hidden" name="type" value="Terrain">
                            @error('type')
                                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="bg-white rounded-xl shadow-lg p-6 transition duration-300 hover:shadow-xl">
                            <h2 class="text-2xl font-semibold text-emerald-700 mb-6">Documents Requis</h2>
                            <div class="bg-white rounded-xl shadow-lg p-6">
                                <x-file-input label="Carte d'Identité Nationale" name="piece_identite" />
                                @error('piece_identite')
                                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-center mt-8">
                            <button type="submit" class="bg-emerald-600 text-white font-bold py-3 px-6 rounded-full transition duration-300 hover:bg-emerald-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2">
                                Créer le Dossier
                            </button>
                        </div>

                </form>

            </div>
        </main>
    </main>

    </x-layaout>
