@extends('layouts.app')

@section('content')
<section style="margin: 0 auto; width:100%; max-width:1400px;">
    <div class="flex flex-wrap justify-center p-6" style="margin-top: 200px;">
        <!-- Huevo común -->
        <form action="{{ route('tienda.obtener') }}" method="POST" onsubmit="return confirmarCompra(50, 'común')">
            @csrf
            <input type="hidden" name="calidad" value="común">
            <button type="submit" class="py-4 px-6 border border-black" style="background: linear-gradient(to right,rgb(91, 221, 173),rgb(26, 163, 108)); margin-right: 50px;">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
                Común - 50 esencias
            </button>
        </form>

        <!-- Huevo raro -->
        <form action="{{ route('tienda.obtener') }}" method="POST" onsubmit="return confirmarCompra(80, 'rara')">
            @csrf
            <input type="hidden" name="calidad" value="rara">
            <button type="submit" class="py-4 px-6 border border-black" style="background: linear-gradient(to right,rgb(72, 124, 209),rgb(26, 90, 168)); margin-right: 50px;">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
                Rara - 80 esencias
            </button>
        </form>

        <!-- Huevo épico -->
        <form action="{{ route('tienda.obtener') }}" method="POST" onsubmit="return confirmarCompra(150, 'épica')">
            @csrf
            <input type="hidden" name="calidad" value="épica">
            <button type="submit" class="py-4 px-6 border border-black" style="background: linear-gradient(to right,rgb(160, 83, 231),rgb(103, 22, 173)); margin-right: 50px;">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
                Épica - 150 esencias
            </button>
        </form>

        <!-- Huevo legendario -->
        <form action="{{ route('tienda.obtener') }}" method="POST" onsubmit="return confirmarCompra(250, 'legendaria')">
            @csrf
            <input type="hidden" name="calidad" value="legendaria">
            <button type="submit" class="py-4 px-6 border border-black" style="background: linear-gradient(to right,rgb(248, 200, 80),rgb(209, 143, 29)); margin-right: 50px;">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
                Legendaria - 250 esencias
            </button>
        </form>
    </div>
</section>

<script>
    // Confirmación antes de comprar
    function confirmarCompra(precio, calidad) {
        return confirm(`¿Quieres comprar una criatura ${calidad} por ${precio} esencias?`);
    }
</script>
@endsection