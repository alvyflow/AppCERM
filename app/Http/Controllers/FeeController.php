<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeeController extends Controller
{
    /**
     * Muestra la página de gestión de cuotas.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('fees.index');
    }
}
