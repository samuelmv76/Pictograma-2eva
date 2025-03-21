<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\Imagen;
use App\Models\Persona;

class AgendaController extends Controller
{
    public function create()
    {
        $personas = Persona::all();
        $imagenes = Imagen::all();
        return view('agenda.create', compact('personas', 'imagenes'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'fecha'   => 'required|date',
            'hora'    => 'required',
            'persona' => 'required|exists:personas,id',
            'imagen'  => 'required|exists:imagenes,idimagen'
        ]);

        $agenda = new Agenda();
        $agenda->fecha     = $request->fecha;
        $agenda->hora      = $request->hora;
        $agenda->idpersona = $request->persona;
        $agenda->idimagen  = $request->imagen;
        $agenda->save();

        return redirect()->back()->with('success', 'Entrada en la agenda creada correctamente.');
    }

    public function showForm()
    {
        $personas = Persona::all();
        return view('agenda.show', compact('personas'));
    }


    public function showAgenda(Request $request)
    {
        $request->validate([
            'fecha'   => 'required|date',
            'persona' => 'required|exists:personas,id'
        ]);

        $personas = Persona::all();

        $agenda = Agenda::select('imagenes.imagen', 'agenda.fecha', 'agenda.hora')
            ->join('imagenes', 'imagenes.idimagen', '=', 'agenda.idimagen')
            ->where('agenda.idpersona', $request->persona)
            ->where('agenda.fecha', $request->fecha)
            ->get();

        return view('agenda.show', compact('agenda', 'personas'));
    }
}
