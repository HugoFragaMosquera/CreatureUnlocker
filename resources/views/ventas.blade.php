@extends('layouts.app')

@section('content')
<section class="py-10 px-4 min-h-screen mt-4">
    <!-- Contenedor centrado con espacio vertical entre tarjetas -->
    <div class="max-w-7xl mx-auto space-y-6">
        @foreach (auth()->user()->criaturas as $criatura)
            <div class="rounded-xl shadow-md p-4 border border-gray-300"
                style="background: {{ $criatura->calidadColor() }};">
        
                <!-- Nombre de la criatura -->
                <h3 class="text-xl font-bold mb-2">{{ $criatura->nombre }}</h3>

                <!-- Estadísticas de la criatura -->
                <ul class="text-sm mb-4">
                    <li><strong>Nivel:</strong> {{ $criatura->pivot->nivel_actual }}</li>
                    <li><strong>Ataque:</strong> {{ $criatura->pivot->ataque_actual }}</li>
                    <li><strong>Defensa:</strong> {{ $criatura->pivot->defensa_actual }}</li>
                </ul>

                <!-- Formulario para vender la criatura -->
                <form method="POST" action="{{ route('criatura.vender', $criatura->id) }}" 
                        onsubmit="return confirm('¿Seguro que quieres vender esta criatura?')">
                    @csrf
                    <button type="submit" class="text-white px-4 py-2 rounded-md w-full"  style="background-color: #3b82f6;">
                        Vender por {{ $criatura->valorVenta() }} esencias
                    </button>
                </form>
            </div>
        @endforeach
    </div>
</section>
@endsection