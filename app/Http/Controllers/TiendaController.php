<?php

namespace App\Http\Controllers;

use App\Models\Criatura;
use Illuminate\Http\Request;

class TiendaController extends Controller
{
    public function obtenerCriatura(Request $request)
    {
        // Ve la calidad del huevo
        $calidad = $request->input('calidad');

        // Buscar criaturas que correspondan a la calidad seleccionada
        $criaturas = Criatura::where('calidad', $calidad)->get();

        // Een el caso de que no hubiese una criatura de esa calidad
        if ($criaturas->isEmpty()) {
            return redirect()->route('tienda')->with('error', 'No hay criaturas disponibles de esta calidad');
        }

        // Elige una criatura aleatoria de esa calidad
        $criatura = $criaturas->random();

        // Obtiene el usuario
        $usuario = auth()->user();

        // Va aumentando el orden de adquisicion según se obtienen criaturas
        $ultimoOrden = $usuario->criaturas()->max('orden_adquisicion');
        $nuevoOrden = $ultimoOrden + 1;

        // Le da la criatura al usuario
        $usuario->criaturas()->attach($criatura, [
            'nivel_actual' => 1,
            'ataque_actual' => $criatura->ataque, 
            'defensa_actual' => $criatura->defensa,
            'adquirida_en' => now(),
            'orden_adquisicion' => $nuevoOrden,
        ]);

        return redirect()->route('home')->with('success', 'Has obtenido una nueva criatura.');
    }
}