<!-- resources/views/books/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear Nuevo Libro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('books.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 dark:text-gray-300">Título:</label>
                            <input type="text" name="title" id="title" class="w-full px-3 py-2 border rounded-lg" value="{{ old('title') }}" required>
                            @error('title')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="author" class="block text-gray-700 dark:text-gray-300">Autor:</label>
                            <input type="text" name="author" id="author" class="w-full px-3 py-2 border rounded-lg" value="{{ old('author') }}">
                            @error('author')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="published_year" class="block text-gray-700 dark:text-gray-300">Año de Publicación:</label>
                            <input type="number" name="published_year" id="published_year" class="w-full px-3 py-2 border rounded-lg" value="{{ old('published_year') }}">
                            @error('published_year')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="classification_id" class="block text-gray-700 dark:text-gray-300">Clasificación:</label>
                            <select name="classification_id" id="classification_id" class="w-full px-3 py-2 border rounded-lg">
                                <option value="">Seleccione una clasificación</option>
                                @foreach ($classifications as $classification)
                                    <option value="{{ $classification->id }}" {{ old('classification_id') == $classification->id ? 'selected' : '' }}>
                                        {{ $classification->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('classification_id')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="copies" class="block text-gray-700 dark:text-gray-300">Copias Disponibles:</label>
                            <input type="number" name="copies" id="copies" class="w-full px-3 py-2 border rounded-lg" value="{{ old('copies') }}" required>
                            @error('copies')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Crear Libro
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
