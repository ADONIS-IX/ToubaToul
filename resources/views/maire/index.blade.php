<x-layout title="Tableau de bord">
    {{-- Nav-side --}}
    <nav class="fixed top-30 left-0 h-full w-64 bg-emerald-900 text-white p-4 space-y-4">
        <h2 class="text-xl font-bold mb-4">Navigation</h2>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('maire.index') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-emerald-300">
                    <i class="fas fa-tachometer-alt mr-2"></i> Tableau de Bord
                </a>
            </li>
            <li>
                <a href="{{ route('profil') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-yellow-500">
                    <i class="fas fa-user mr-2"></i> Mes Informations
                </a>
            </li>
            <li>
                <a href="{{ route('parcelle') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-yellow-500">
                    <i class="fas fa-tree mr-2"></i> Voir les parcelles
                </a>
            </li>
            <li>
                <a href="{{ route('demande') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-yellow-500">
                    <i class="fas fa-folder-open mr-2"></i> Voir les demandes
                </a>
            </li>
            <li>
                <a href="{{ route('localite') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-yellow-500">
                    <i class="fas fa-map-marker-alt mr-2"></i> Ajouter une Localite
                </a>
            </li>
             <li>
                <a href="{{ route('localite') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-yellow-500">
                    <i class="fas fa-map-marker-alt mr-2"></i> Ajouter un Chef de Localite
                </a>
            </li>
            <li>
                <a href="{{ route('lotissement') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-yellow-500">
                    <i class="fas fa-map mr-2"></i> Creer un Lotissement
                </a>
            </li>
            <li>
                <a href="{{ route('support') }}" class="flex items-center px-4 py-2 rounded transition duration-300 hover:bg-yellow-500">
                    <i class="fas fa-life-ring mr-2"></i> Support
                </a>
            </li>
        </ul>
    </nav>

    <!-- Main content -->
    <main class="ml-64 flex-1 bg-gray-200 p-8">
        <div class="container mx-auto">
            <h2 class="text-2xl md:text-4xl font-bold text-center mb-8">Tableau de Bord</h2>
            <!-- Show Graph Data -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js"></script>

            <div class="map_canvas">
                <canvas id="myBarChart" width="auto" height="100"></canvas>
            </div>

            <style>
                .chart-container {
                    width: 500px;
                    height: 500px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    margin: 0 auto; /* Optional: To center the container itself */
                }
            </style>
            <div class="chart-container">
                <canvas id="myPieChart"></canvas>
            </div>

            <script>
                var barCtx = document.getElementById('myBarChart').getContext('2d');
                var myBarChart = new Chart(barCtx, {
                    type: 'bar',
                    data: {
                        labels: @json($labels),
                        datasets: [{
                            label: '',
                            data: @json($prices),
                            backgroundColor: [
                                'rgba(31, 58, 147, 1)',
                                'rgba(37, 116, 169, 1)',
                                'rgba(92, 151, 191, 1)',
                                'rgb(200, 247, 197)',
                                'rgb(77, 175, 124)',
                                'rgb(30, 130, 76)'
                            ],
                            borderColor: [
                                'rgba(31, 58, 147, 1)',
                                'rgba(37, 116, 169, 1)',
                                'rgba(92, 151, 191, 1)',
                                'rgb(200, 247, 197)',
                                'rgb(77, 175, 124)',
                                'rgb(30, 130, 76)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            x: {
                                type: 'category',
                                labels: @json($labels),
                                ticks: {
                                    stepSize: 1
                                }
                            },
                            y: {
                    title: {
                        display: true,
                        text: 'Nombre total de dossiers'
                    },
                    max: {{ $totalDossiers }},
                    min: 0,
                    ticks: {
                        stepSize: 10
                    }
                }
            },
                        plugins: {
                            title: {
                                display: true,
                                text: 'Diagramme récapitulatif des demandes enregistrées'

                            },
                            legend: {
                                display: false,
                            }
                        }
                    }
                });

                var pieCtx = document.getElementById('myPieChart').getContext('2d');
                var myPieChart = new Chart(pieCtx, {
                    type: 'pie',
                    data: {
                        labels: ['Batie', 'Construction', 'Libre'],
                        datasets: [{
                            label: '',
                            data: [{{ $totalBatie }}, {{ $totalConstruction }}, {{ $totalLibre }}],
                            backgroundColor: [
                                'rgba(31, 58, 147, 1)',
                                'rgb(77, 175, 124)',
                                'rgba(75, 192, 192, 1)'
                            ],
                            borderColor: [
                                'rgba(31, 58, 147, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        plugins: {
                            title: {
                                display: true,
                                text: 'Répartition des types de parcelles enregistrées'
                            },
                            legend: {
                                display: true,
                                position: 'right'
                            }
                        }
                    }
                });
            </script>
        </div>
    </main>


</x-layout>
