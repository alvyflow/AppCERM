<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsumptionController extends Controller
{
    /**
     * Muestra la página para incorporar consumo.
     *
     * @return \Illuminate\View\View
     */
    public function incorporate()
    {
        return view('consumption.incorporate');
    }
}
