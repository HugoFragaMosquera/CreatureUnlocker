<?php

namespace App\Http\Controllers;

use App\Models\Criatura;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Ordena la tabla
        $sortField = $request->get('sort', 'id');
        $sortDirection = $request->get('direction', 'asc');

        // Obtiene las criaturas del usuario actual
        $criaturas = auth()->user()->criaturas()
            ->withPivot(['nivel_actual', 'ataque_actual', 'defensa_actual'])
            ->orderBy($sortField, $sortDirection)
            ->get();

        // Para obtener la esencia que tiene el usuario
        $esenciaDisponible = auth()->user()->esencia;

        return view('home', compact('criaturas', 'esenciaDisponible', 'sortField', 'sortDirection'));
    }

    // Para subir de nivel una criatura
    public function subirNivel($id)
    {
        $user = auth()->user();
        $esenciaNecesaria = 10;

        // Busca la criatura
        $criatura = $user->criaturas()->where('criatura_id', $id)->first();

        if (!$criatura) {
            return redirect()->back()->with('error', 'No tienes esta criatura.');
        }

        // Accede a la tabla intermedia
        $pivot = $criatura->pivot;

        if ($user->esencia >= $esenciaNecesaria) {
            $pivot->nivel_actual++;
            $pivot->ataque_actual += 5;
            $pivot->defensa_actual += 5;
            $pivot->save();

            $user->decrement('esencia', $esenciaNecesaria);
        } else {
            return redirect()->back()->with('error', 'No tienes suficiente esencia.');
        }

        return redirect()->route('home');
    }

    // Para vender una criatura del usuario
    public function vender($id)
    {
        $user = auth()->user();

        // Busca la criatura asociada al usuario
        $criatura = $user->criaturas()->where('criatura_id', $id)->first();

        if (!$criatura) {
            return redirect()->back()->with('error', 'No tienes esta criatura.');
        }

        // Define el valor de venta según calidad
        $valores = [
            'común' => 25,
            'rara' => 40,
            'épica' => 75,
            'legendaria' => 150,
        ];

        $valor = $valores[$criatura->calidad] ?? 0;

        // Quita la criatura de la tabla
        $user->criaturas()->detach($id);

        // Suma esencias al usuario
        $user->increment('esencia', $valor);

        return redirect()->back()->with('success', 'Criatura vendida por ' . $valor . ' esencias.');
    }

    // Muestra las criaturas del usuario en formato tarjetas para vender
    public function ventas()
    {
        $user = auth()->user();

        // Obtiene las criaturas con datos del pivote
        $criaturas = $user->criaturas()->withPivot(['nivel_actual', 'ataque_actual', 'defensa_actual'])->get();

        // Esencia actual del usuario
        $esenciaDisponible = $user->esencia;

        return view('ventas', compact('criaturas', 'esenciaDisponible'));
    }
}
