<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\ComunidadEnergetica;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Muestra la página de gestión de usuarios.
     *
     * @return \Illuminate\View\View
     */
    public function manage()
    {
        $usuarios = Usuario::all();
        return view('users.manage', compact('usuarios'));
    }

    /**
     * Muestra el formulario para crear un nuevo usuario.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $comunidades = ComunidadEnergetica::all();
        return view('users.create', compact('comunidades'));
    }

    /**
     * Almacena un nuevo usuario en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'telefono' => 'nullable|string|max:15',
            'direccion' => 'nullable|string|max:255',
            'rol' => 'required|string|max:50',
            'dni' => 'required|string|max:20|unique:usuarios',
            'porcentaje_autoconsumo' => 'required|numeric|min:0|max:100',
            'comunidades_energetica_id' => 'required|exists:comunidades_energeticas,id'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('users.create')
                ->withErrors($validator)
                ->withInput();
        }

        Usuario::create($request->all());

        return redirect()
            ->route('users.manage')
            ->with('success', 'Usuario creado correctamente.');
    }

    /**
     * Muestra el formulario para editar un usuario.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        $comunidades = ComunidadEnergetica::all();
        return view('users.edit', compact('usuario', 'comunidades'));
    }

    /**
     * Actualiza un usuario específico en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios,email,' . $id,
            'telefono' => 'nullable|string|max:15',
            'direccion' => 'nullable|string|max:255',
            'rol' => 'required|string|max:50',
            'dni' => 'required|string|max:20|unique:usuarios,dni,' . $id,
            'porcentaje_autoconsumo' => 'required|numeric|min:0|max:100',
            'comunidades_energetica_id' => 'required|exists:comunidades_energeticas,id'
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('users.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $usuario->update($request->all());

        return redirect()
            ->route('users.manage')
            ->with('success', 'Usuario actualizado correctamente.');
    }

    /**
     * Elimina un usuario específico de la base de datos.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return redirect()
            ->route('users.manage')
            ->with('success', 'Usuario eliminado correctamente.');
    }
}
