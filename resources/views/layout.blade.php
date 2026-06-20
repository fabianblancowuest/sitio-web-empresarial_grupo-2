<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Software Agency</title>
    <script src="https://tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen flex flex-col">

    <!-- MENÚ DE NAVEGACIÓN (Consigna 2) -->
    <nav class="bg-gray-800 p-4 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-xl font-bold text-teal-400">DevSquad Agency</a>
            <div class="space-x-4">
                <a href="/" class="hover:text-teal-400 transition">Nuestro Equipo</a>
                <a href="/proyectos" class="hover:text-teal-400 transition">Proyectos exitosos</a>
            </div>
        </div>
    </nav>

    <!-- CONTENIDO DINÁMICO -->
    <main class="container mx-auto flex-grow p-6">
        @yield('contenido')
    </main>

    <footer class="bg-gray-800 text-center p-4 text-gray-400 text-sm mt-10">
        &copy; {{ date('Y') }} - DevSquad Agency - Panel de Portafolios
    </footer>

</body>
</html>
