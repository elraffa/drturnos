<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MedTurnos</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="antialiased">
        <div class="relative flex flex-col justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            <div class="max-w-6xl text-center mx-auto sm:px-6 lg:px-8">
                <h1 class="font-bold text-4xl lg:text-8xl">
                MedTurnos
                </h1>
                <h3 class="m-6 text-lg lg:text-2xl">Conecta con tus pacientes</h3>
          
                @if (Route::has('login'))
                    <div class="flex flex-col lg:flex-row gap-4 px-6 py-4 justify-evenly">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-lg text-white font-bold px-6 py-2 rounded-sm bg-blue-600 hover:bg-blue-700 dark:text-gray-500">Escritorio</a>
                        @else
                            <a href="{{ route('login') }}" class="text-lg text-white font-bold px-6 py-2 rounded-sm bg-blue-600 hover:bg-blue-700 shadow-md">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-lg text-white font-bold px-6 py-2 rounded-sm bg-blue-600 hover:bg-blue-700 shadow-md">Registro</a>
                            @endif
                        @endauth
                        <a href="{{ route('guest.register') }}" class="text-lg text-white font-bold px-6 py-2 rounded-sm bg-green-600 hover:bg-green-700 shadow-md transition-all">Pacientes</a>

                    </div>
                @endif
            </div>
             </div>
        </div>        
    </body>
</html>
