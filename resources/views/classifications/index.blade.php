<!-- resources/views/classifications/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Clasificaciones de Libros') }}
            </h2>
            <a href="{{ route('classifications.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                {{ __('Agregar Clasificación') }}
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
                                <th class="py-2 px-4 border-b text-left">Nombre</th>
                                <th class="py-2 px-4 border-b text-left">Descripción</th>
                                <th class="py-2 px-4 border-b text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classifications as $classification)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $classification->id }}</td>
                                    <td class="py-2 px-4 border-b">{{ $classification->name }}</td>
                                    <td class="py-2 px-4 border-b">{{ $classification->description }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <a href="{{ route('classifications.show', $classification->id) }}" class="text-blue-600 hover:text-blue-900"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('classifications.edit', $classification->id) }}" class="text-yellow-500 hover:text-yellow-700 ml-2"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('classifications.destroy', $classification->id) }}" method="POST" class="inline-block ml-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('¿Estás seguro de que deseas eliminar esta clasificación?')"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Paginación -->
                    <div class="mt-4">
                        {{ $classifications->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
