<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin - Relyzn Course</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-800">

    @include('layouts.admin-navigation')

    <main class="py-8">
        <div class="max-w-7xl mx-auto px-4">
            @yield('content')
        </div>
    </main>

</body>
</html>
