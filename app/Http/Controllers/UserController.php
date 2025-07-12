<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Listar todos los usuarios
    public function index()
    {
        $users = User::all();
        return view('admin.secciones.usuarios', compact('users'));
    }

    // Crear un nuevo usuario
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'role'     => 'required|in:admin,user',
        ]);

        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'role'     => $validated['role'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()
            ->route('admin.section', ['seccion' => 'usuarios'])
            ->with('feedback.message', 'Usuario creado correctamente')
            ->with('feedback.type', 'success');
    }

    // Actualizar un usuario existente
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
            'role'     => 'required|in:admin,user',
        ]);

        $user = User::findOrFail($id);

        $data = [
            'name'  => $validated['name'],
            'email' => $validated['email'],
            'role'  => $validated['role'],
        ];

        if (!empty($validated['password'])) {
            $data['password'] = Hash::make($validated['password']);
        }

        $user->update($data);

        return redirect()
            ->route('admin.section', ['seccion' => 'usuarios'])
            ->with('feedback.message', 'Usuario actualizado correctamente')
            ->with('feedback.type', 'success');
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        User::findOrFail($id)->delete();

        return redirect()
            ->route('admin.section', ['seccion' => 'usuarios'])
            ->with('feedback.message', 'Usuario eliminado correctamente')
            ->with('feedback.type', 'success');
    }
}
