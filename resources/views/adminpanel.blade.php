<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Админ-панель</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="wrapper">
    <header class="header">
        <div class="container">
            <h1>Админ панель</h1>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link {{$page == '' ? 'active' : '' }}" href="/adminpanel">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$page == 'add-product' ? 'active' : '' }}" href="/adminpanel/add-product">Добавить
                        товар</a>
                </li>
            </ul>
        </div>
    </header>

    <main class="main">
        <div class="container">
            @switch($page)
                @case('')
                    @include('layouts.admin.mainContent')
                    @break
                @case('add-product')
                    @include('layouts.admin.addProduct')
                    @break

            @endswitch
        </div>
    </main>

    <footer class="footer">
    </footer>

</div>
</body>
</html>
