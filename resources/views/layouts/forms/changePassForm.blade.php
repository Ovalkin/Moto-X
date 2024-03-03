<div class="modal fade" id="changePassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Изменить пароль</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="/setting/changepass">
                    @csrf
                    <div class="mb-2">
                        <label for="exampleInputRePassword1" class="form-label">Текущий пароль</label>
                        <input name="nowPassword" type="password" class="form-control" id="exampleInputRePassword1"
                               aria-describedby="RePasswordHelp">
                    </div>
                    <div class="mb-2">
                        <label for="exampleInputRePassword1" class="form-label">Новый пароль</label>
                        <input name="newPassword" type="password" class="form-control" id="exampleInputRePassword1"
                               aria-describedby="RePasswordHelp">
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-dark">Изменить</button>
                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Закрыть</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
