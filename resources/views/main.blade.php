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
        @if($page != '')
            @if($code != '')
                @include('layouts.productPage')
            @else
                @if($page == 'basket')
                    @include('test')
                @else
                    @include('layouts.main.productsPage')
                @endif
            @endif
        @else
            @include('layouts.main.mainContent')
        @endif

    </main>

    <footer class="footer">
        @include('layouts.footer')
    </footer>
</div>

</body>
</html>
