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

        // Define los precios de cada tipo de huevo
        $precios = [
            'común' => 50,
            'rara' => 80,
            'épica' => 150,
            'legendaria' => 250,
        ];

        // En caso de que la calidad no sea válida
        if (!array_key_exists($calidad, $precios)) {
            return redirect()->route('tienda')->with('error', 'Tipo de huevo inválido');
        }

        // Obtiene el usuario
        $usuario = auth()->user();

        // Si el usuario no tiene suficiente esencia
        if ($usuario->esencia < $precios[$calidad]) {
            return redirect()->route('tienda')->with('error', 'No tienes suficiente esencia');
        }

        // Buscar criaturas que correspondan a la calidad seleccionada
        $criaturas = Criatura::where('calidad', $calidad)->get();

        // En el caso de que no hubiese una criatura de esa calidad
        if ($criaturas->isEmpty()) {
            return redirect()->route('tienda')->with('error', 'No hay criaturas disponibles de esta calidad');
        }

        // Elige una criatura aleatoria de esa calidad
        $criatura = $criaturas->random();

        // Va aumentando el orden de adquisicion según se obtienen criaturas
        $ultimoOrden = $usuario->criaturas()->max('orden_adquisicion') ?? 0;
        $nuevoOrden = $ultimoOrden + 1;

        // Le da la criatura al usuario
        $usuario->criaturas()->attach($criatura, [
            'nivel_actual' => 1,
            'ataque_actual' => $criatura->ataque, 
            'defensa_actual' => $criatura->defensa,
            'adquirida_en' => now(),
            'orden_adquisicion' => $nuevoOrden,
        ]);

        // Resta el precio en esencias
        $usuario->decrement('esencia', $precios[$calidad]);

        return redirect()->route('home')->with('success', 'Has obtenido una nueva criatura.');
    }
}