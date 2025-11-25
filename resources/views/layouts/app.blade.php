<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AmigoPet - O Cuidado que seu Pet Merece</title>

    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800"> <nav class="bg-white shadow-md p-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/clientes" class="text-2xl font-bold text-blue-600">🐾 AmigoPet</a>

            <div class="space-x-4">
                <a href="/clientes" class="text-gray-600 hover:text-blue-500">Clientes</a>
                <a href="/animais" class="text-gray-600 hover:text-blue-500">Animais</a>
                <a href="/servicos" class="text-gray-600 hover:text-blue-500">Serviços</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto p-4 mt-6">
        @yield('content')
    </main>

</body>
</html>