<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    /**
     * Muestra la página de gestión de inversiones.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('investments.index');
    }
}
