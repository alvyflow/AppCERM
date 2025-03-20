<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Incorporar Consumo
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-semibold mb-6">Cargar Datos de Consumo</h3>
                    
                    <div class="mb-6">
                        <p class="text-gray-600 mb-4">
                            En esta sección puede incorporar datos de consumo energético para su análisis y procesamiento.
                            Seleccione el archivo con el formato adecuado y complete la información requerida.
                        </p>
                    </div>

                    <div class="bg-gray-50 p-6 rounded-lg mb-6">
                        <form>
                            <div class="mb-4">
                                <label for="fileType" class="block text-sm font-medium text-gray-700 mb-2">Tipo de archivo</label>
                                <select id="fileType" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    <option value="csv">CSV</option>
                                    <option value="excel">Excel</option>
                                </select>
                            </div>
                            
                            <div class="mb-4">
                                <label for="period" class="block text-sm font-medium text-gray-700 mb-2">Período</label>
                                <input type="month" id="period" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            </div>
                            
                            <div class="mb-4">
                                <label for="consumptionFile" class="block text-sm font-medium text-gray-700 mb-2">Archivo de consumo</label>
                                <div class="flex items-center justify-center w-full">
                                    <label class="flex flex-col w-full h-32 border-2 border-dashed border-gray-300 rounded-lg cursor-pointer hover:bg-gray-50">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                            </svg>
                                            <p class="pt-1 text-sm text-gray-500">
                                                <span class="font-medium">Haga clic para seleccionar</span> o arrastre y suelte
                                            </p>
                                            <p class="text-xs text-gray-500">
                                                CSV, Excel (máx. 10MB)
                                            </p>
                                        </div>
                                        <input id="consumptionFile" type="file" class="hidden" />
                                    </label>
                                </div>
                            </div>
                            
                            <div class="flex justify-end">
                                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
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
