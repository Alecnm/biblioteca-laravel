<!-- resources/views/books/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Listado de Libros') }}
            </h2>
            <a href="{{ route('books.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                {{ __('Agregar Libro') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full bg-white dark:bg-gray-800">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 border-b text-left">ID</th>
                                <th class="py-2 px-4 border-b text-left">Título</th>
                                <th class="py-2 px-4 border-b text-left">Autor</th>
                                <th class="py-2 px-4 border-b text-left">Año de Publicación</th>
                                <th class="py-2 px-4 border-b text-left">Clasificación</th>
                                <th class="py-2 px-4 border-b text-left">Copias Disponibles</th>
                                <th class="py-2 px-4 border-b text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($books as $book)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $book->id }}</td>
                                    <td class="py-2 px-4 border-b">{{ $book->title }}</td>
                                    <td class="py-2 px-4 border-b">{{ $book->author }}</td>
                                    <td class="py-2 px-4 border-b">{{ $book->published_year }}</td>
                                    <td class="py-2 px-4 border-b">{{ $book->classification->name ?? 'N/A' }}</td>
                                    <td class="py-2 px-4 border-b">{{ $book->available_copies }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <a href="{{ route('books.show', $book->id) }}" class="text-blue-600 hover:text-blue-900"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('books.edit', $book->id) }}" class="text-yellow-500 hover:text-yellow-700 ml-2"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline-block ml-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('¿Estás seguro de que deseas eliminar este libro?')"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Paginación -->
                    <div class="mt-4">
                        {{ $books->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
