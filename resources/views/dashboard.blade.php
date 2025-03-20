<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Bienvenido a CERM2</h3>
                        <p class="text-gray-600">
                            Este es el sistema de gestión para comunidades energéticas renovables. 
                            Utilice el menú de navegación superior para acceder a las diferentes secciones.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="bg-green-50 rounded-lg p-6 shadow">
                            <h4 class="text-lg font-semibold text-gray-800 mb-2">Consumo Energético</h4>
                            <p class="text-gray-600 mb-3">
                                Visualice y gestione su consumo energético. Incorpore nuevos datos de consumo y analice su evolución.
                            </p>
                            <div class="flex justify-end">
                                <a href="{{ route('consumption.incorporate') }}" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition">
                                    Incorporar Consumo
                                    <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <div class="bg-blue-50 rounded-lg p-6 shadow">
                            <h4 class="text-lg font-semibold text-gray-800 mb-2">Generación Renovable</h4>
                            <p class="text-gray-600 mb-3">
                                Gestione la generación de energía renovable. Suba datos de generación y vea estadísticas de producción.
                            </p>
                            <div class="flex justify-end">
                                <a href="{{ route('generation.upload') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                                    Subir Generación
                                    <svg class="w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</x-app-layout>
