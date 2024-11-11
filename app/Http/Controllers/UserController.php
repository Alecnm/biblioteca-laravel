<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Listado de usuarios (método index ya creado anteriormente)
    public function index()
    {
        // Obtenemos los usuarios con paginación (10 usuarios por página en este ejemplo)
        $users = User::paginate(10);

        // Retornamos la vista y le pasamos los usuarios
        return view('users.index', compact('users'));
    }
    
    // Mostrar un solo usuario
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // Mostrar formulario de creación de usuario
    public function create()
    {
        return view('users.create');
    }

    // Guardar nuevo usuario en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'Usuario creado correctamente.');
    }

    // Mostrar formulario de edición de usuario
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Actualizar un usuario en la base de datos
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($request->only(['name', 'email']));

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    // Eliminar un usuario
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }
}