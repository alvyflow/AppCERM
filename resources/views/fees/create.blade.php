<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nueva Cuota
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="card mt-5">
                        <div class="card-body">
                            <h3 class="text-2xl font-semibold mb-6">Formulario Inscripción Cuotas de Usuarios</h3>
                            <form action="{{ route('fees.store') }}" method="POST">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="col-span-1 md:col-span-2">
                                        <label for="usuario_id" class="block text-sm font-medium text-gray-700 mb-1">Usuarios</label>
                                        <select class="form-select rounded-md shadow-sm mt-1 block w-full" id="usuario_id" name="usuario_id" required>
                                            <option value="">Selecciona un usuario</option>
                                            @foreach ($usuarios as $usuario)
                                                <option value="{{ $usuario->id }}" {{ old('usuario_id') == $usuario->id ? 'selected' : '' }}>{{ $usuario->nombre . ' ' . $usuario->apellidos }}</option>
                                            @endforeach
                                        </select>
                                        @error('usuario_id')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-span-1 md:col-span-2">
                                        <label for="cuota" class="block text-sm font-medium text-gray-700 mb-1">Cuota Anual</label>
                                        <input type="number" step="0.01" class="form-input rounded-md shadow-sm mt-1 block w-full" id="cuota" name="cuota" placeholder="Ingrese la cantidad anual" value="{{ old('cuota') }}">
                                        @error('cuota')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-span-1">
                                        <label for="pago_2023" class="block text-sm font-medium text-gray-700 mb-1">Pago Cuota 2023</label>
                                        <select class="form-select rounded-md shadow-sm mt-1 block w-full" id="pago_2023" name="pago_2023" required>
                                            <option value="">Seleccione un valor</option>
                                            <option value="1" {{ old('pago_2023') == '1' ? 'selected' : '' }}>Sí</option>
                                            <option value="0" {{ old('pago_2023') == '0' ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('pago_2023')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-span-1">
                                        <label for="pago_2024" class="block text-sm font-medium text-gray-700 mb-1">Pago Cuota 2024</label>
                                        <select class="form-select rounded-md shadow-sm mt-1 block w-full" id="pago_2024" name="pago_2024" required>
                                            <option value="">Seleccione un valor</option>
                                            <option value="1" {{ old('pago_2024') == '1' ? 'selected' : '' }}>Sí</option>
                                            <option value="0" {{ old('pago_2024') == '0' ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('pago_2024')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-span-1">
                                        <label for="pago_2025" class="block text-sm font-medium text-gray-700 mb-1">Pago Cuota 2025</label>
                                        <select class="form-select rounded-md shadow-sm mt-1 block w-full" id="pago_2025" name="pago_2025" required>
                                            <option value="">Seleccione un valor</option>
                                            <option value="1" {{ old('pago_2025') == '1' ? 'selected' : '' }}>Sí</option>
                                            <option value="0" {{ old('pago_2025') == '0' ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('pago_2025')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-span-1">
                                        <label for="pago_2026" class="block text-sm font-medium text-gray-700 mb-1">Pago Cuota 2026</label>
                                        <select class="form-select rounded-md shadow-sm mt-1 block w-full" id="pago_2026" name="pago_2026" required>
                                            <option value="">Seleccione un valor</option>
                                            <option value="1" {{ old('pago_2026') == '1' ? 'selected' : '' }}>Sí</option>
                                            <option value="0" {{ old('pago_2026') == '0' ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('pago_2026')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-span-1">
                                        <label for="pago_2027" class="block text-sm font-medium text-gray-700 mb-1">Pago Cuota 2027</label>
                                        <select class="form-select rounded-md shadow-sm mt-1 block w-full" id="pago_2027" name="pago_2027" required>
                                            <option value="">Seleccione un valor</option>
                                            <option value="1" {{ old('pago_2027') == '1' ? 'selected' : '' }}>Sí</option>
                                            <option value="0" {{ old('pago_2027') == '0' ? 'selected' : '' }}>No</option>
                                        </select>
                                        @error('pago_2027')
                                            <span class="text-red-600 text-sm">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="flex justify-center mt-6">
                                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Guardar Cuota</button>
                                    <a href="{{ route('fees.index') }}" class="px-4 py-2 ml-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
