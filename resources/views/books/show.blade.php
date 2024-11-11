<!-- resources/views/books/show.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalles del Libro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <p><strong>ID:</strong> {{ $book->id }}</p>
                    <p><strong>Título:</strong> {{ $book->title }}</p>
                    <p><strong>Autor:</strong> {{ $book->author }}</p>
                    <p><strong>Año de Publicación:</strong> {{ $book->published_year }}</p>
                    <p><strong>Clasificación:</strong> {{ $book->classification->name ?? 'N/A' }}</p>
                    <p><strong>Copias Disponibles:</strong> {{ $book->available_copies }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
