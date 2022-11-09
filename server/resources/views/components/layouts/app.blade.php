<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700&family=Open+Sans:wght@300;400;600;700&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased">

    <nav>
        <x-headers.navbar></x-headers.navbar>
    </nav>

    <main class="flex">
        <aside class="block w-[300px] border-r border-r-slate-900/10 min-h-screen">
            <x-drawers.drawer></x-drawers.drawer>
        </aside>

        <div class="container">
            {{ $slot }}
        </div>
    </main>

</body>

</html>
