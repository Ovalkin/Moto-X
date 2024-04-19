<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Корзина</title>
</head>
<body>

<div class="wrapper">
    <header class="header">
        @include('layouts.header.navbar')
    </header>

    <main class="main pt-5">
        @include('layouts.ordersPage')
    </main>

    <footer class="footer">
        @include('layouts.footer')
    </footer>
</div>

</body>
</html>
