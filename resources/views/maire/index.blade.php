<x-layout>
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
                    <i class="fas fa-folder-open mr-2"></i> Procédures
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-gray-700">
                    <i class="fas fa-life-ring mr-2"></i> Support
                </a>
            </li>
        </ul>
    </nav>

    <!-- Main content -->
    <main class="flex-1 bg-gray-200 p-8">
        <div class="container mx-auto">
            <h2 class="text-2xl md:text-4xl font-bold text-center mb-8">Tableau de Bord</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-2">Mes Informations</h3>
                    <p class="text-sm">Voir et éditer vos informations personnelles</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-2">Mes Services</h3>
                    <p class="text-sm">Accéder aux services auxquels vous êtes inscrit</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-2">Procédures</h3>
                    <p class="text-sm">Voir et gérer les procédures en cours</p>
                </div>
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <h3 class="text-xl font-bold mb-2">Support</h3>
                    <p class="text-sm">Contacter le support technique pour assistance</p>
                </div>
            </div>
        </div>
    </main>

</x-layout>
