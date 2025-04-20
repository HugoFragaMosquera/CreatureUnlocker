{{-- resources/views/welcome.blade.php --}}
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bienvenido a CreatureUnlocker</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">

    <style>
        .background {
            background: linear-gradient(to bottom right, #0f172a,rgb(69, 102, 155), #0f172a);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }
    </style>
</head>

<body class="font-sans antialiased background">
    <div class="max-w-7xl w-full sm:px-6 lg:px-8">

        <!-- Cuerpo -->
        <div class="bg-gray p-6 sm:p-8 rounded-lg shadow-xl">

             <!-- Logo -->
            <div class="flex justify-center mb-10">
                <a href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-24 w-auto">
                </a>
            </div>

            <!-- Título -->
            <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">
                Bienvenido a CreatureUnlocker 🐾
            </h1>

            <!-- Descripción -->
            <p class="text-lg text-center mb-8 text-white">
                Desbloquea y colecciona tus propias criaturas.
            </p>


            <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-6">
                <!-- Inicio sesión -->
                <a href="{{ route('login') }}" class="block w-full sm:w-auto text-center px-6 py-3 bg-blue-500 text-white rounded-md hover:bg-blue-600 transition shadow-md">
                    Iniciar sesión
                </a>

                <!-- Registro -->
                <a href="{{ route('register') }}" class="block w-full sm:w-auto text-center px-6 py-3 bg-green-500 text-white rounded-md hover:bg-green-600 transition shadow-md">
                    Registrarse
                </a>
            </div>
        </div>
    </div>
</body>
</html>