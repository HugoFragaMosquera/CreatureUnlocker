@extends('layouts.app')

@section('content')
<style>
    .combate-container {
        max-width: 500px;
        margin: 50px auto;
        background: #fff;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
        z-index: 1;
    }

    h2 {
        text-align: center;
        font-size: 26px;
        margin-bottom: 20px;
        color: #333;
    }

    label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #444;
    }

    select {
        width: 100%;
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #ccc;
        margin-bottom: 20px;
        font-size: 16px;
    }

    button#btnCombatir {
        width: 100%;
        padding: 12px;
        background-color: #2563eb;
        color: #fff;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button#btnCombatir:hover:enabled {
        background-color: #1e40af;
    }

    button#btnCombatir:disabled {
        background-color: #94a3b8;
        cursor: not-allowed;
    }

    #resultadoCombate {
        margin-top: 20px;
        padding: 16px;
        font-size: 18px;
        border-radius: 8px;
        display: none;
        position: relative;
        z-index: 2;
    }

    .victoria {
        background-color: #d1fae5;
        color: #065f46;
        border: 1px solid #34d399;
    }

    .derrota {
        background-color: #fee2e2;
        color: #991b1b;
        border: 1px solid #f87171;
    }

    #animacionCombate {
        text-align: center;
        font-size: 48px;
        margin-top: 20px;
        animation: bounce 0.6s infinite;
        position: relative;
        z-index: 2;
    }

    @keyframes bounce {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-15px);
        }
    }

    /* Confeti */
    .confeti {
        position: fixed;
        width: 10px;
        height: 10px;
        background-color: red;
        animation: fall 2s linear forwards;
        opacity: 0.8;
        z-index: 9999;
        pointer-events: none;
        border-radius: 2px;
    }

    @keyframes fall {
        0% { transform: translateY(0) rotate(0deg); }
        100% { transform: translateY(600px) rotate(360deg); }
    }

    /* Humo */
    .humo {
        position: fixed;
        width: 40px;
        height: 40px;
        background: radial-gradient(circle, #ccc, transparent);
        border-radius: 50%;
        animation: flotar 3s ease-out forwards;
        opacity: 0.6;
        z-index: 9999;
        pointer-events: none;
    }

    @keyframes flotar {
        0% { transform: translateY(0) scale(1); opacity: 0.6; }
        100% { transform: translateY(-150px) scale(2); opacity: 0; }
    }
</style>

<section class="combate-container">
    <h2>⚔️ Combate de criaturas ⚔️</h2>

    <label for="criaturaSelect">Elige una criatura para combatir:</label>
    <select id="criaturaSelect">
        @foreach(auth()->user()->criaturas as $criatura)
            <option value="{{ $criatura->id }}"
                data-ataque="{{ $criatura->pivot->ataque_actual }}"
                data-defensa="{{ $criatura->pivot->defensa_actual }}">
                {{ $criatura->nombre }} (Nivel {{ $criatura->pivot->nivel_actual }})
            </option>
        @endforeach
    </select>

    <button id="btnCombatir">¡Combatir!</button>

    <div id="animacionCombate" class="hidden">⚔️</div>
    <div id="resultadoCombate"></div>
</section>

<script>
    function crearConfeti() {
        for (let i = 0; i < 30; i++) {
            const confeti = document.createElement('div');
            confeti.classList.add('confeti');
            confeti.style.left = `${Math.random() * window.innerWidth}px`;
            confeti.style.top = `-${Math.random() * 20 + 10}px`; // ligeramente arriba de la pantalla
            confeti.style.backgroundColor = `hsl(${Math.random() * 360}, 80%, 60%)`;
            confeti.style.animationDuration = `${Math.random() * 1 + 1}s`;
            confeti.style.transform = `rotate(${Math.random() * 360}deg)`;
            document.body.appendChild(confeti);
            setTimeout(() => confeti.remove(), 2000);
        }
    }

    function crearHumo() {
        for (let i = 0; i < 8; i++) {
            const humo = document.createElement('div');
            humo.classList.add('humo');
            humo.style.left = `${Math.random() * window.innerWidth}px`;
            humo.style.top = `${window.innerHeight - 100 + Math.random() * 50}px`; // cerca abajo de la pantalla
            humo.style.animationDuration = `${2 + Math.random()}s`;
            document.body.appendChild(humo);
            setTimeout(() => humo.remove(), 3000);
        }
    }

    document.getElementById('btnCombatir').addEventListener('click', async function () {
        const btn = this;
        btn.disabled = true;

        const select = document.getElementById('criaturaSelect');
        const criaturaId = select.value;

        const animacion = document.getElementById('animacionCombate');
        const resultadoDiv = document.getElementById('resultadoCombate');
        resultadoDiv.style.display = 'none';
        animacion.classList.remove('hidden');

        const emojis = ['⚔️', '🔥', '💥', '✨', '🌀'];
        animacion.textContent = emojis[Math.floor(Math.random() * emojis.length)];

        try {
            const response = await fetch("{{ route('combatir') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": '{{ csrf_token() }}'
                },
                body: JSON.stringify({ criatura_id: criaturaId })
            });

            const data = await response.json();

            setTimeout(() => {
                animacion.classList.add('hidden');
                resultadoDiv.style.display = 'block';
                resultadoDiv.className = data.victoria ? 'victoria' : 'derrota';
                resultadoDiv.innerHTML = `
                    ${data.mensaje}
                    <p style="font-size: 14px; margin-top: 10px;">
                        👾 Enemigo — Ataque: <strong>${data.enemigo.ataque}</strong>, Defensa: <strong>${data.enemigo.defensa}</strong>
                    </p>
                `;

                if (data.victoria) {
                    crearConfeti();
                } else {
                    crearHumo();
                }

                btn.disabled = false;

            }, 1000);

        } catch (error) {
            alert("Error en el combate.");
            btn.disabled = false;
        }
    });
</script>
@endsection