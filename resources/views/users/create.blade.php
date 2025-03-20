<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nuevo Usuario
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="card mt-5">
                        <div class="card-body">
                            <h3 class="text-2xl font-semibold mb-6">Formulario Inscripción Usuarios</h3>
                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="col-span-1">
                                        <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                                        <input type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" id="nombre" name="nombre" placeholder="Ingrese su nombre" value="{{ old('nombre') }}">
                                        @error('nombre')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-span-1">
                                        <label for="apellidos" class="block text-sm font-medium text-gray-700 mb-1">Apellidos</label>
                                        <input type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" id="apellidos" name="apellidos" placeholder="Ingrese sus apellidos" value="{{ old('apellidos') }}">
                                        @error('apellidos')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-span-1">
                                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo Electrónico</label>
                                        <input type="email" class="form-input rounded-md shadow-sm mt-1 block w-full" id="email" name="email" placeholder="Ingrese su correo electrónico" value="{{ old('email') }}">
                                        @error('email')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-span-1">
                                        <label for="telefono" class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
                                        <input type="tel" class="form-input rounded-md shadow-sm mt-1 block w-full" id="telefono" name="telefono" placeholder="Ingrese su teléfono" value="{{ old('telefono') }}">
                                        @error('telefono')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-span-1">
                                        <label for="direccion" class="block text-sm font-medium text-gray-700 mb-1">Dirección</label>
                                        <input type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" id="direccion" name="direccion" placeholder="Ingrese su dirección" value="{{ old('direccion') }}">
                                        @error('direccion')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-span-1">
                                        <label for="rol" class="block text-sm font-medium text-gray-700 mb-1">Rol</label>
                                        <input type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" id="rol" name="rol" placeholder="Ingrese el rol" value="{{ old('rol') }}">
                                        @error('rol')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-span-1">
                                        <label for="dni" class="block text-sm font-medium text-gray-700 mb-1">DNI</label>
                                        <input type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" id="dni" name="dni" placeholder="Ingrese el DNI" value="{{ old('dni') }}">
                                        @error('dni')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-span-1">
                                        <label for="porcentaje_autoconsumo" class="block text-sm font-medium text-gray-700 mb-1">Porcentaje autoconsumo</label>
                                        <input type="text" class="form-input rounded-md shadow-sm mt-1 block w-full" id="porcentaje_autoconsumo" name="porcentaje_autoconsumo" placeholder="Ingrese porcentaje" value="{{ old('porcentaje_autoconsumo') }}">
                                        @error('porcentaje_autoconsumo')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-span-2">
                                        <label for="comunidades_energetica_id" class="block text-sm font-medium text-gray-700 mb-1">Comunidad Energética</label>
                                        <select class="form-select rounded-md shadow-sm mt-1 block w-full" id="comunidades_energetica_id" name="comunidades_energetica_id" required>
                                            <option value="">Selecciona una comunidad</option>
                                            @foreach ($comunidades as $comunidad)
                                                <option value="{{ $comunidad->id }}" {{ old('comunidades_energetica_id') == $comunidad->id ? 'selected' : '' }}>{{ $comunidad->nombre }}</option>
                                            @endforeach
                                        </select>
                                        @error('comunidades_energetica_id')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="flex justify-center mt-6">
                                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Guardar Usuario</button>
                                    <a href="{{ route('users.manage') }}" class="px-4 py-2 ml-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
