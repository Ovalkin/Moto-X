<div class="container mt-5 mb-5" style="min-height: 800px">
    <div class="d-flex justify-content-center">
    <form method="post" action="/setting/changedata" class="w-50">
        @csrf
        <div class="mb-3">
            <label for="exampleName" class="form-label">Имя</label>
            <input type="text" class="form-control" id="exampleName"
                   value="{{$userData['name']}}" name="name">
        </div>
        <div class="mb-3">
            <label for="exampleSurname" class="form-label">Фамилия</label>
            <input type="text" class="form-control" id="exampleSurname"
                   value="{{$userData['surname']}}" name="surname">
        </div>
        <div class="mb-3">
            <label for="exampleLastname" class="form-label">Отчество</label>
            <input type="text" class="form-control" id="exampleLastname"
                   value="{{$userData['lastname']}}" name="lastname">
        </div>
        <div class="mb-3">
            <label for="examplePhone" class="form-label">Номер телефона</label>
            <input type="text" class="form-control" id="examplePhone"
                   value="{{$userData['phone']}}" name="phone">
        </div>
        <div class="mb-3">
            <label for="exampleEmail" class="form-label">Почта</label>
            <input type="text" class="form-control" id="exampleEmail"
                   value="{{$userData['email']}}" name="email">
        </div>
        <div class="mb-3">
            <label for="exampleEmail" class="form-label"></label>
            <button type="button" class="btn btn-dark form-control" data-bs-toggle="modal"
                    data-bs-target="#changePassword">Сменить пароль
            </button>
        </div>
        <button type="submit" class="mt-2 btn btn-dark form-control">Применить изменения</button>
    </form>
    </div>
</div>
@include('layouts.forms.changePassForm')
