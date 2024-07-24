<x-layout>

    <main class="flex flex-1 items-center justify-center bg-gradient-to-r from-emerald-200 to-lime-200 min-h-screen">
        <div class="bg-white p-10 rounded-lg shadow-lg max-w-3xl w-full  transform -translate-y-12">
            <h2 class="text-2xl font-bold mb-8 text-center text-emerald-500">Modification de Mot de Passe</h2>
            <form action="{{ route('password') }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-700">Mot de passe actuel:</label>
                        <input id="current_password" name="current_password" type="password" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm" required>
                        @error('current_password')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Nouveau mot de passe:</label>
                        <input id="password" name="password" type="password" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm" required>
                        @error('password')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmer le nouveau mot de passe:</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring-emerald-500 focus:border-emerald-500 sm:text-sm" required>
                        @error('password_confirmation')
                            <p class="text-red-600 text-sm mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" onclick="window.history.back()" class="py-2 px-4 bg-red-200 text-gray-700 rounded-lg shadow-md font-semibold hover:bg-red-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 leading-6">Retour</button>
                    <button type="submit" class="py-2 px-4 bg-emerald-500 text-white rounded-lg shadow-md font-semibold hover:bg-emerald-600 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-opacity-200">Modifier</button>
                </div>
            </form>
        </div>
    </main>

</x-layout>
