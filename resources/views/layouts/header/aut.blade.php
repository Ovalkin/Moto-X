<ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    <li class="nav-item me-4">
        <a type="button" href="/basket" class="btn btn btn-outline-dark">Корзина</a>
    </li>
    <li class="nav-item me-2">
        <div class="dropdown">
            <button class="btn btn-outline-dark dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                Аккаунт
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <h6 class="dropdown-header">{{$userData['name'].' '.$userData['surname'].' '.$userData['lastname']}}</h6>
                </li>
                @if($userData['admin'])
                    <li>
                        <a class="dropdown-item " type="button" href="/adminpanel">Админ-панель</a>
                    </li>
                @endif
                <li>
                    <a class="dropdown-item " type="button" href="/orders">Мои заказы</a>
                </li>
                <li>
                    <a class="dropdown-item" type="button" href="/setting">Настройка профиля</a>
                </li>
                <li>
                    <a class="dropdown-item" type="button" href="/signout">Выйти</a>
                </li>
            </ul>
        </div>
    </li>
</ul>
