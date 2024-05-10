<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Админ-панель</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://bootstraptema.ru/plugins/2022/chosen/chosen.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://bootstraptema.ru/plugins/2022/chosen/chosen.jquery.min.js" type="text/javascript"></script>
</head>

<body>
<div class="wrapper">
    <header class="header">
        <div class="container">
            <h1>Админ панель</h1>
            <h4><a href="/">Вернуться назад</a></h4>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link {{$page == '' ? 'active' : '' }}" href="/adminpanel">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$page == 'add-product' ? 'active' : '' }}" href="/adminpanel/add-product">Добавить
                        товар</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$page == 'add-motorcycles' ? 'active' : '' }}"
                       href="/adminpanel/add-motorcycles">Добавить
                        мотоцикл</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$page == 'add-equipment' ? 'active' : '' }}" href="/adminpanel/add-equipment">Добавить
                        экипировку</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$page == 'add-accessory' ? 'active' : '' }}" href="/adminpanel/add-accessory">Добавить
                        аксессуар</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$page == 'edit-product' ? 'active' : '' }}" href="/adminpanel/edit-product">Редактировать
                        товары</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$page == 'orders' ? 'active' : '' }}" href="/adminpanel/orders">Заказы</a>
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
                @case('add-equipment')
                    @include('layouts.admin.addEquipment')
                    @break
                @case('add-accessory')
                    @include('layouts.admin.addAccessory')
                    @break
                @case('edit-product')
                    @include('layouts.admin.editProduct')
                    @break
                @case('orders')
                    @include('layouts.admin.orders')
            @endswitch
        </div>
    </main>

    <footer class="footer">
    </footer>

</div>
</body>
</html>
