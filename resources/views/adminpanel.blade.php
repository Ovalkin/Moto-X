<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Админ-панель</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://bootstraptema.ru/plugins/2022/chosen/chosen.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
</head>

<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://bootstraptema.ru/plugins/2022/chosen/chosen.jquery.min.js" type="text/javascript"></script>
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
                <li class="nav-item">
                    <a class="nav-link {{$page == 'add-motorcycles' ? 'active' : '' }}" href="/adminpanel/add-motorcycles">Добавить
                        мотоцикл</a>
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
                @case('add-motorcycles')
                    @include('layouts.admin.addMotorcycle')
                    @break
            @endswitch
        </div>
    </main>

    <footer class="footer">
    </footer>

</div>
</body>
</html>
