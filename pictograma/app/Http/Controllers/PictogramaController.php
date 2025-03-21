<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagen;

class PictogramaController extends Controller
{
    public function index()
    {

        $imagenes = Imagen::all();
        return view('pictogramas.index', compact('imagenes'));
    }
}
