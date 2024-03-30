<form class="mt-5">
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Название товара</label>
        <div class="col-sm-10">
            <input name="name" type="text" class="form-control" id="name">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="category" class="col-sm-2 col-form-label">Категория</label>
        <div class="col-sm-10">
            <select id="category" class="form-select">
                <option selected>Выберете категорию</option>
                <option value="motorbike">Мотоцикл</option>
                <option value="equipment">Экиперовка</option>
                <option value="accessor">Аксессуар</option>
            </select>
{{--            <input name="category" type="text" class="form-control" id="category">--}}
        </div>
    </div>
    <div class="mb-3 row">
        <label for="description" class="col-sm-2 col-form-label">Описание</label>
        <div class="col-sm-10">
            <textarea name="description" type="text" class="form-control" id="description" rows="3"></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label">Цена</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="price">
        </div>
    </div>
</form>
