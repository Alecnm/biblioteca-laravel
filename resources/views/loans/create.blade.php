<!-- resources/views/loans/create.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Registrar Nuevo Préstamo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('loans.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="user_id" class="block text-gray-700 dark:text-gray-300">Usuario:</label>
                            <select name="user_id" id="user_id" class="w-full px-3 py-2 border rounded-lg" required>
                                <option value="">Seleccione un usuario</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="book_id" class="block text-gray-700 dark:text-gray-300">Libro:</label>
                            <select name="book_id" id="book_id" class="w-full px-3 py-2 border rounded-lg" required>
                                <option value="">Seleccione un libro</option>
                                @foreach ($books as $book)
                                    <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                                        {{ $book->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('book_id')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="due_date" class="block text-gray-700 dark:text-gray-300">Fecha de Devolución:</label>
                            <input type="date" name="due_date" id="due_date" class="w-full px-3 py-2 border rounded-lg" value="{{ old('due_date') }}" required>
                            @error('due_date')
                                <span class="text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Registrar Préstamo
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
