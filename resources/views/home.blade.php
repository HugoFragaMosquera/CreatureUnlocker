@extends('layouts.app')

@section('content')
<section class="py-10 px-4 min-h-screen">
    <div class="tabla-wrapper">
        <table class="border border-black" style="margin: 0 auto; width:100%; max-width:1200px;">
            <thead>
                <tr style="text-align:left;">
                    <th class="py-4 text-lg">
                        <a href="{{ route('home', ['sort' => 'nombre', 'direction' => $sortDirection == 'asc' ? 'desc' : 'asc']) }}">Nombre ⇕</a>
                    </th>
                    <th class="text-lg">
                        <a href="{{ route('home', ['sort' => 'nivel', 'direction' => $sortDirection == 'asc' ? 'desc' : 'asc']) }}">Nivel ⇕</a>
                    </th>
                    <th class="text-lg">
                        <a href="{{ route('home', ['sort' => 'ataque', 'direction' => $sortDirection == 'asc' ? 'desc' : 'asc']) }}">Ataque ⇕</a>
                    </th>
                    <th class="text-lg">
                        <a href="{{ route('home', ['sort' => 'defensa', 'direction' => $sortDirection == 'asc' ? 'desc' : 'asc']) }}">Defensa ⇕</a>
                    </th>
                    <th class="text-lg">Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach (auth()->user()->criaturas as $criatura)
                <tr style="background: {{ $criatura->calidadColor() }}">
                    <td class="py-4 text-lg">{{ $criatura->nombre }}</td>
                    <td class="text-lg">{{ $criatura->pivot->nivel_actual }}</td>
                    <td class="text-lg">{{ $criatura->pivot->ataque_actual }}</td>
                    <td class="text-lg">{{ $criatura->pivot->defensa_actual }}</td>
                    <td>
                        <form method="POST" action="{{ route('criatura.subirNivel', $criatura->id) }}">
                            @csrf
                            <button type="submit" class="subir-nivel-btn text-white px-6 py-3 rounded-md text-lg font-semibold shadow-lg">
                                Subir nivel (x10 esencia)
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('.subir-nivel-btn').forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('form');
            form.submit();
        });
    });
</script>
@endpush