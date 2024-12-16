<!-- resources/views/loans/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Listado de Préstamos') }}
            </h2>
            <a href="{{ route('loans.create') }}" class="btn btn-primary">
                {{ __('Registrar Préstamo') }}
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
                                <th class="py-2 px-4 border-b text-left">Usuario</th>
                                <th class="py-2 px-4 border-b text-left">Libro</th>
                                <th class="py-2 px-4 border-b text-left">Fecha de Préstamo</th>
                                <th class="py-2 px-4 border-b text-left">Fecha de Devolución</th>
                                <th class="py-2 px-4 border-b text-left">Estado</th>
                                <th class="py-2 px-4 border-b text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($loans as $loan)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $loan->id }}</td>
                                    <td class="py-2 px-4 border-b">{{ $loan->user->name }}</td>
                                    <td class="py-2 px-4 border-b">{{ $loan->book->title }}</td>
                                    <td class="py-2 px-4 border-b">{{ $loan->loan_date->format('d/m/Y') }}</td>
                                    <td class="py-2 px-4 border-b">{{ $loan->due_date->format('d/m/Y') }}</td>
                                    <td class="py-2 px-4 border-b">{{ ucfirst($loan->status) }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <a href="{{ route('loans.show', $loan->id) }}" class="text-blue-600 hover:text-blue-900"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('loans.edit', $loan->id) }}" class="text-yellow-500 hover:text-yellow-700 ml-2"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('loans.destroy', $loan->id) }}" method="POST" class="inline-block ml-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('¿Estás seguro de que deseas eliminar este préstamo?')"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Paginación -->
                    <div class="mt-4">
                        {{ $loans->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
