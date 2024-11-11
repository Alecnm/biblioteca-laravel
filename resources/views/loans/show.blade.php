<!-- resources/views/loans/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalles del Préstamo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p><strong>ID:</strong> {{ $loan->id }}</p>
                    <p><strong>Usuario:</strong> {{ $loan->user->name }}</p>
                    <p><strong>Libro:</strong> {{ $loan->book->title }}</p>
                    <p><strong>Fecha de Préstamo:</strong> {{ $loan->loan_date->format('d/m/Y') }}</p>
                    <p><strong>Fecha de Devolución:</strong> {{ $loan->due_date->format('d/m/Y') }}</p>
                    <p><strong>Estado:</strong> {{ ucfirst($loan->status) }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>