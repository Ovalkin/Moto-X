<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Главная</title>
</head>
<body>

<div class="wrapper">
    <header class="header">
        @include('layouts.header.navbar')
    </header>

    <main class="main pt-5">
        @include('layouts.carousel')
        @include('layouts.tabs')
        @switch($page)
            @case('')
                @include('layouts.main.mainContent')
                @break
            @case('motorcycles')
                @include('layouts.main.motorcyclesContent')
                @break
            @case('equipment')
                @include('layouts.main.equipmentContent')
                @break
            @case('accessories')
                @include('layouts.main.accessoriesContent')
                @break
            @case('discounted')
                @include('layouts.main.discountedContent')
                @break
        @endswitch
    </main>

    <footer class="footer">
        @include('layouts.footer')
    </footer>
</div>

</body>
</html>
