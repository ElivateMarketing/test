{{-- filepath: c:\projects\test\resources\views\components\app-layout.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Filament Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @filamentStyles
</head>
<body class="antialiased bg-gray-100">
    <div class="min-h-screen">
        <!-- Replace this -->
        {{ $slot }}
        <!-- End replacement -->
    </div>

    @livewireScripts
    @filamentScripts
</body>
</html>