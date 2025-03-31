<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Cuota;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;

class FeeController extends Controller
{
    /**
     * Display a listing of the fees.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuotas = Cuota::all();
        $usuarios = Usuario::all();
        return view('fees.index', compact('cuotas', 'usuarios'));
    }

    /**
     * Show the form for creating a new fee.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuarios = Usuario::all();
        return view('fees.create', compact('usuarios'));
    }

    /**
     * Store a newly created fee in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'usuario_id' => 'required|exists:usuarios,id',
            'cuota' => 'nullable|numeric|min:0',
            'pago_2023' => 'required|boolean',
            'pago_2024' => 'required|boolean',
            'pago_2025' => 'required|boolean',
            'pago_2026' => 'required|boolean',
            'pago_2027' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Verificar si ya existe una cuota para este usuario
        $existingCuota = Cuota::where('usuario_id', $request->usuario_id)->first();
        if ($existingCuota) {
            return redirect()->back()
                ->withErrors(['usuario_id' => 'Este usuario ya tiene una cuota registrada.'])
                ->withInput();
        }

        $cuota = new Cuota();
        $cuota->usuario_id = $request->usuario_id;
        $cuota->cuota = $request->cuota;
        $cuota->pago_2023 = $request->pago_2023;
        $cuota->pago_2024 = $request->pago_2024;
        $cuota->pago_2025 = $request->pago_2025;
        $cuota->pago_2026 = $request->pago_2026;
        $cuota->pago_2027 = $request->pago_2027;
        $cuota->save();

        return redirect()->route('fees.index')
            ->with('success', 'Cuota creada correctamente.');
    }

    /**
     * Show the form for editing the specified fee.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuota = Cuota::findOrFail($id);
        $usuarios = Usuario::all();
        return view('fees.edit', compact('cuota', 'usuarios'));
    }

    /**
     * Update the specified fee in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'usuario_id' => 'required|exists:usuarios,id',
            'cuota' => 'nullable|numeric|min:0',
            'pago_2023' => 'required|boolean',
            'pago_2024' => 'required|boolean',
            'pago_2025' => 'required|boolean',
            'pago_2026' => 'required|boolean',
            'pago_2027' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $cuota = Cuota::findOrFail($id);
        
        // Verificar si se está cambiando el usuario y si el nuevo usuario ya tiene cuota
        if ($request->usuario_id != $cuota->usuario_id) {
            $existingCuota = Cuota::where('usuario_id', $request->usuario_id)->first();
            if ($existingCuota) {
                return redirect()->back()
                    ->withErrors(['usuario_id' => 'Este usuario ya tiene una cuota registrada.'])
                    ->withInput();
            }
        }

        $cuota->usuario_id = $request->usuario_id;
        $cuota->cuota = $request->cuota;
        $cuota->pago_2023 = $request->pago_2023;
        $cuota->pago_2024 = $request->pago_2024;
        $cuota->pago_2025 = $request->pago_2025;
        $cuota->pago_2026 = $request->pago_2026;
        $cuota->pago_2027 = $request->pago_2027;
        $cuota->save();

        return redirect()->route('fees.index')
            ->with('success', 'Cuota actualizada correctamente.');
    }

    /**
     * Generate a receipt for the specified fee payment.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generateReceipt(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cuota_id' => 'required|exists:cuotas,id',
            'anio' => 'required|numeric|min:2023|max:2027',
            'pago' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $cuota = Cuota::findOrFail($request->cuota_id);
        $usuario = Usuario::findOrFail($cuota->usuario_id);
        $anio = $request->anio;
        $pago = $request->pago;

        // Si el pago no está realizado, mostrar un mensaje
        if (!$pago) {
            return redirect()->back()
                ->with('error', 'No se puede generar un recibo para un pago no realizado.');
        }

        // Generamos el recibo como HTML
        $data = [
            'usuario' => $usuario,
            'cuota' => $cuota,
            'anio' => $anio,
            'fecha' => now(),
        ];

        // Generar el recibo como HTML sin PDF
        return view('fees.receipt', $data);
    }
}
