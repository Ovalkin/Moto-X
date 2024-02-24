<div class="modal fade" id="registrationForm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Регистрация</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="/signup">
                    @csrf
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
                        <input name="lastname" type="text" class="form-control" id="exampleInputLastname1"
                               aria-describedby="lastnameHelp">
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
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember">
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
