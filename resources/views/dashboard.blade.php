<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Estadísticas de Biblioteca') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Libros por Categoría</h3>
                
                <!-- Canvas para el gráfico -->
                <canvas id="booksChart" width="400" height="200"></canvas>
                
                <!-- Script para generar el gráfico con Chart.js -->
                <script>
                    const ctx = document.getElementById('booksChart').getContext('2d');
                    const booksChart = new Chart(ctx, {
                        type: 'bar', // Tipo de gráfico
                        data: {
                            labels: ['Ciencia Ficción', 'Historia', 'Romance', 'Terror', 'Misterio'],
                            datasets: [{
                                label: 'Cantidad de Libros',
                                data: [40, 30, 50, 20, 10], // Datos estáticos
                                backgroundColor: [
                                    'rgba(54, 162, 235, 0.7)',  // Azul
                                    'rgba(255, 99, 132, 0.7)',  // Rojo
                                    'rgba(75, 192, 192, 0.7)',  // Verde
                                    'rgba(153, 102, 255, 0.7)', // Morado
                                    'rgba(255, 206, 86, 0.7)'   // Amarillo
                                ],
                                borderColor: [
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 206, 86, 1)'
                                ],
                                borderWidth: 1
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Cantidad de Libros'
                                    }
                                },
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Categoría de Libros'
                                    }
                                }
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</x-app-layout>
