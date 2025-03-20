<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Subir Generación
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-semibold mb-6">Cargar Datos de Generación</h3>
                    
                    <div class="mb-10">
                        <div class="bg-blue-50 p-4 rounded-lg mb-6">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-blue-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-blue-800">Información</h3>
                                    <div class="mt-2 text-sm text-blue-700">
                                        <p>Los datos de generación deben estar en formato CSV con el siguiente formato:</p>
                                        <ul class="list-disc pl-5 mt-2">
                                            <li>Columna 1: Fecha (DD/MM/YYYY)</li>
                                            <li>Columna 2: Hora (HH:MM)</li>
                                            <li>Columna 3: Generación (kWh)</li>
                                            <li>Columna 4: Identificador de Planta</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <form action="#" method="POST" enctype="multipart/form-data" class="space-y-6">
                            <div>
                                <label for="plant" class="block text-sm font-medium text-gray-700">Planta Generadora</label>
                                <select id="plant" name="plant" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                    <option value="">Seleccione una planta</option>
                                    <option value="1">Planta Solar Las Rozas</option>
                                    <option value="2">Parque Eólico Norte</option>
                                    <option value="3">Instalación Fotovoltaica Central</option>
                                </select>
                            </div>
                            
                            <div>
                                <label for="month" class="block text-sm font-medium text-gray-700">Mes de Generación</label>
                                <input type="month" name="month" id="month" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Archivo de Datos</label>
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                                <span>Subir archivo</span>
                                                <input id="file-upload" name="file-upload" type="file" class="sr-only" accept=".csv">
                                            </label>
                                            <p class="pl-1">o arrastre y suelte</p>
                                        </div>
                                        <p class="text-xs text-gray-500">CSV hasta 10MB</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex justify-end">
                                <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mr-3">
                                    Cancelar
                                </button>
                                <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Procesar Datos
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
