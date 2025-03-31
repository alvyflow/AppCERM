<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cuotas
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
                    <div class="mb-6">
                        <h3 class="text-2xl font-semibold">Cuota Asociativa</h3>
                    </div>
                    
                    <div class="mb-4">
                        <a href="{{ route('fees.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                            Incluir Usuario
                        </a>
                    </div>
                    
                    <div class="overflow-x-auto mb-6">
                        <table class="min-w-full bg-white">
                            <thead>
                                <tr class="bg-gray-100 text-gray-700 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Nombre del Usuario</th>
                                    <th class="py-3 px-6 text-center">Pago 2023</th>
                                    <th class="py-3 px-6 text-center">Pago 2024</th>
                                    <th class="py-3 px-6 text-center">Pago 2025</th>
                                    <th class="py-3 px-6 text-center">Pago 2026</th>
                                    <th class="py-3 px-6 text-center">Pago 2027</th>
                                    <th class="py-3 px-6 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm">
                                @forelse($cuotas as $cuota)
                                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                                        <td class="py-3 px-6 text-left">
                                            @foreach ($usuarios as $usuario)
                                                @if ($usuario->id == $cuota->usuario_id)
                                                    {{ $usuario->nombre . ' ' . $usuario->apellidos }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex flex-col md:flex-row items-center justify-center gap-2">
                                                <span>{{ $cuota->pago_2023 == 1 ? 'Sí' : 'No' }}</span>
                                                <form action="{{ route('fees.generate-receipt') }}" method="POST" class="inline">
                                                    @csrf
                                                    <input type="hidden" name="pago" value="{{ $cuota->pago_2023 }}">
                                                    <input type="hidden" name="anio" value="2023">
                                                    <input type="hidden" name="cuota_id" value="{{ $cuota->id }}">
                                                    <button type="submit" class="px-2 py-1 bg-blue-600 text-white text-xs rounded hover:bg-blue-700 transition">Recibo</button>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex flex-col md:flex-row items-center justify-center gap-2">
                                                <span>{{ $cuota->pago_2024 == 1 ? 'Sí' : 'No' }}</span>
                                                <form action="{{ route('fees.generate-receipt') }}" method="POST" class="inline">
                                                    @csrf
                                                    <input type="hidden" name="pago" value="{{ $cuota->pago_2024 }}">
                                                    <input type="hidden" name="anio" value="2024">
                                                    <input type="hidden" name="cuota_id" value="{{ $cuota->id }}">
                                                    <button type="submit" class="px-2 py-1 bg-blue-600 text-white text-xs rounded hover:bg-blue-700 transition">Recibo</button>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex flex-col md:flex-row items-center justify-center gap-2">
                                                <span>{{ $cuota->pago_2025 == 1 ? 'Sí' : 'No' }}</span>
                                                <form action="{{ route('fees.generate-receipt') }}" method="POST" class="inline">
                                                    @csrf
                                                    <input type="hidden" name="pago" value="{{ $cuota->pago_2025 }}">
                                                    <input type="hidden" name="anio" value="2025">
                                                    <input type="hidden" name="cuota_id" value="{{ $cuota->id }}">
                                                    <button type="submit" class="px-2 py-1 bg-blue-600 text-white text-xs rounded hover:bg-blue-700 transition">Recibo</button>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex flex-col md:flex-row items-center justify-center gap-2">
                                                <span>{{ $cuota->pago_2026 == 1 ? 'Sí' : 'No' }}</span>
                                                <form action="{{ route('fees.generate-receipt') }}" method="POST" class="inline">
                                                    @csrf
                                                    <input type="hidden" name="pago" value="{{ $cuota->pago_2026 }}">
                                                    <input type="hidden" name="anio" value="2026">
                                                    <input type="hidden" name="cuota_id" value="{{ $cuota->id }}">
                                                    <button type="submit" class="px-2 py-1 bg-blue-600 text-white text-xs rounded hover:bg-blue-700 transition">Recibo</button>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex flex-col md:flex-row items-center justify-center gap-2">
                                                <span>{{ $cuota->pago_2027 == 1 ? 'Sí' : 'No' }}</span>
                                                <form action="{{ route('fees.generate-receipt') }}" method="POST" class="inline">
                                                    @csrf
                                                    <input type="hidden" name="pago" value="{{ $cuota->pago_2027 }}">
                                                    <input type="hidden" name="anio" value="2027">
                                                    <input type="hidden" name="cuota_id" value="{{ $cuota->id }}">
                                                    <button type="submit" class="px-2 py-1 bg-blue-600 text-white text-xs rounded hover:bg-blue-700 transition">Recibo</button>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="py-3 px-6 text-center">
                                            <a href="{{ route('fees.edit', $cuota->id) }}" class="px-2 py-1 bg-gray-600 text-white text-xs rounded hover:bg-gray-700 transition">Editar</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="border-b border-gray-200">
                                        <td class="py-3 px-6 text-center" colspan="7">No hay cuotas registradas</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
