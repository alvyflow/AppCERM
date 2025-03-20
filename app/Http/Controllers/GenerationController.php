<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenerationController extends Controller
{
    /**
     * Muestra la página para subir datos de generación.
     *
     * @return \Illuminate\View\View
     */
    public function upload()
    {
        return view('generation.upload');
    }
}
