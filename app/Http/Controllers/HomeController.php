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
}