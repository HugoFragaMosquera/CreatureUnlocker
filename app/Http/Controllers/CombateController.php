<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CombateController extends Controller
{
    public function index()
    {
        $criaturas = auth()->user()->criaturas;
        $esenciaDisponible = auth()->user()->esencia;

        return view('combate', compact('criaturas', 'esenciaDisponible'));
    }

    public function combatir(Request $request)
    {
        $user = auth()->user();
        $criatura = $user->criaturas()->where('criatura_id', $request->criatura_id)->first();

        if (!$criatura) {
            return response()->json(['error' => 'Criatura no encontrada.'], 404);
        }

        $pivot = $criatura->pivot;
        $ataque = $pivot->ataque_actual;
        $defensa = $pivot->defensa_actual;

        // Enemigo aleatorio
        $enemigoAtaque = rand(20, 150);
        $enemigoDefensa = rand(20, 150);

        $victoria = $ataque > $enemigoDefensa;

        $base = match ($criatura->calidad) {
            'legendaria' => 20,
            'épica' => 15,
            'rara' => 10,
            'común' => 5,
            default => 3,
        };

        $baseGanancia = $base + intval($pivot->nivel_actual * 1.5);

        // Variación aleatoria en las ganancias
        $variacion = rand(80, 120) / 100;
        $gananciaFinal = floor($baseGanancia * $variacion);

        if ($victoria) {
            $user->increment('esencia', $gananciaFinal);
            return response()->json([
                'victoria' => true,
                'mensaje' => "¡Victoria! Has ganado $gananciaFinal esencias.",
                'enemigo' => [
                    'ataque' => $enemigoAtaque,
                    'defensa' => $enemigoDefensa,
                ]
            ]);
        } else {
            return response()->json([
                'victoria' => false,
                'mensaje' => "Derrota... El enemigo te superó.",
                'enemigo' => [
                    'ataque' => $enemigoAtaque,
                    'defensa' => $enemigoDefensa,
                ]
            ]);
        }
    }
}