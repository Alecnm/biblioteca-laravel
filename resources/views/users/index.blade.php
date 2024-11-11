<!-- resources/views/users/index.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Lista de Usuarios') }}
            </h2>
            <a href="{{ route('users.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Agregar Usuario
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
                                <th class="py-3 px-4 border-b text-left">ID</th>
                                <th class="py-3 px-4 border-b text-left">Nombre</th>
                                <th class="py-3 px-4 border-b text-left">Email</th>
                                <th class="py-3 px-4 border-b text-left">Rol</th>
                                <th class="py-3 px-4 border-b text-left">Fecha de Creación</th>
                                <th class="py-3 px-4 border-b text-left">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="py-2 px-4 border-b">{{ $user->id }}</td>
                                    <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                                    <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                                    <td class="py-2 px-4 border-b">{{ $user->role }}</td>
                                    <td class="py-2 px-4 border-b">{{ $user->created_at->format('d/m/Y') }}</td>
                                    <td class="py-2 px-4 border-b">
                                        <a href="{{ route('users.show', $user->id) }}" class="text-blue-600 hover:text-blue-900"><i class="fas fa-eye"></i></i></a>
                                        <a href="{{ route('users.edit', $user->id) }}" class="text-yellow-500 hover:text-yellow-700 ml-2"><i class="fas fa-edit"></i></a>
                                        @if ($user->id !== auth()->user()->id)
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block ml-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?')"><i class="fas fa-trash"></i></button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Paginación -->
                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
