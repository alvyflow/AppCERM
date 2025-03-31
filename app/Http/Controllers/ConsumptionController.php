<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Consumo;
use Illuminate\Support\Facades\Validator;

class ConsumptionController extends Controller
{
    /**
     * Muestra la página para incorporar consumo.
     *
     * @return \Illuminate\View\View
     */
    public function incorporate()
    {
        $usuarios = Usuario::all();
        return view('consumption.incorporate', compact('usuarios'));
    }

    /**
     * Procesa el archivo CSV con datos de consumo.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function processConsumption(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'usuario_id' => 'required|exists:usuarios,id',
            'consumption_file' => 'required|file|mimes:csv,txt|max:10240',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $file = $request->file('consumption_file');
        $usuario_id = $request->input('usuario_id');
        
        // Verificar si el archivo se puede abrir
        if (($handle = fopen($file->getPathname(), 'r')) !== false) {
            // Array para almacenar registros de consumo
            $consumos = [];
            $errores = [];
            $lineNumber = 0;
            
            // Leer el archivo línea a línea
            while (($data = fgetcsv($handle, 1000, ',')) !== false) {
                $lineNumber++;
                
                // Verificar si la línea tiene las 3 columnas requeridas
                if (count($data) < 3) {
                    $errores[] = "Línea $lineNumber: formato incorrecto, faltan columnas.";
                    continue;
                }
                
                // Extraer datos
                $fecha = trim($data[0]);
                $hora = trim($data[1]);
                $consumo = trim($data[2]);
                
                // Validar formato de fecha (DD/MM/YYYY)
                if (!preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $fecha)) {
                    $errores[] = "Línea $lineNumber: formato de fecha incorrecto (debe ser DD/MM/YYYY).";
                    continue;
                }
                
                // Convertir fecha al formato Y-m-d para MySQL
                $fechaPartes = explode('/', $fecha);
                $fechaMysql = $fechaPartes[2] . '-' . $fechaPartes[1] . '-' . $fechaPartes[0];
                
                // Validar formato de hora (HH:MM)
                if (!preg_match('/^\d{2}$/', $hora)) {
                    $errores[] = "Línea $lineNumber: formato de hora incorrecto (debe ser HH).";
                    continue;
                }
                
                // Validar consumo (número decimal)
                if (!is_numeric($consumo)) {
                    $errores[] = "Línea $lineNumber: consumo debe ser un número.";
                    continue;
                }
                
                // Añadir registro al array
                $consumos[] = [
                    'usuario_id' => $usuario_id,
                    'fecha' => $fechaMysql,
                    'hora' => $hora,
                    'consumo' => $consumo,
                    'created_at' => now(),
                    'updated_at' => now()
                ];
            }
            
            fclose($handle);
            
            // Si hay errores, mostrarlos y no procesar nada
            if (!empty($errores)) {
                return redirect()->back()
                    ->withErrors(['csv_errors' => $errores])
                    ->withInput();
            }
            
            // Si no hay errores, insertar todos los registros
            if (!empty($consumos)) {
                Consumo::insert($consumos);
                
                return redirect()->route('consumption.incorporate')
                    ->with('success', 'Se han procesado ' . count($consumos) . ' registros de consumo correctamente.');
            }
            
            return redirect()->back()
                ->with('warning', 'No se encontraron datos válidos en el archivo.')
                ->withInput();
        }
        
        return redirect()->back()
            ->with('error', 'No se pudo abrir el archivo. Por favor, inténtelo de nuevo.')
            ->withInput();
    }

    /**
     * Muestra la lista de consumos registrados.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $consumos = Consumo::with('usuario')->orderBy('fecha', 'desc')->orderBy('hora', 'desc')->paginate(15);
        return view('consumption.index', compact('consumos'));
    }
}
