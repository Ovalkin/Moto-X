@php use App\Http\Controllers\UserController; @endphp
<nav class="navbar p-1 navbar-expand-lg bg-body-tertiary navbar bg-primary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Мотики</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Главная</a>
                </li>
            </ul>
            <form class="d-flex w-25" role="search">
                <input class="form-control me-2" type="search" placeholder="Поиск по товарам" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Поиск</button>
            </form>

            @include('notAut')

        </div>
    </div>
</nav>

<div class="modal fade" id="registrationForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Регистрация</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="mb-2">
                        <label for="exampleInputName1" class="form-label">Имя</label>
                        <input name="name" type="text" class="form-control" id="exampleInputName1"
                               aria-describedby="nameHelp">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputSurname1" class="form-label">Фамилия</label>
                        <input name="surname" type="text" class="form-control" id="exampleInputSurname1"
                               aria-describedby="surnameHelp">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputLastname1" class="form-label">Отчество</label>
                        <input name="Lastname" type="text" class="form-control" id="exampleInputLastname1"
                               aria-describedby="LastnameHelp">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputPhone1" class="form-label">Номер телефона</label>
                        <input name="phone" type="text" class="form-control" id="exampleInputPhone1"
                               aria-describedby="phoneHelp">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Почта</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputPassword1" class="form-label">Пароль</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputRePassword1" class="form-label">Повторите пароль</label>
                        <input name="rePassword" type="password" class="form-control" id="exampleInputRePassword1"
                               aria-describedby="RePasswordHelp">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn btn-dark">Войти</button>
                        <button type="button" class="btn btn btn-dark" data-bs-dismiss="modal">Закрыть</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="loginForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Авторизация</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/signin" method="post">
                    @csrf
                    <div class="mb-2">
                        <label for="exampleInputEmail1" class="form-label">Почта</label>
                        <input name="email" type="email" class="form-control" id="exampleInputEmail1"
                               aria-describedby="emailHelp">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputPassword1" class="form-label">Пароль</label>
                        <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-2 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn btn-dark">Войти</button>
                        <button type="button" class="btn btn btn-dark" data-bs-dismiss="modal">Закрыть</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
     aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">ХАХАХАХАХААХАХАХАХАХА</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        РЛОРОЛЛО
    </div>
</div>
