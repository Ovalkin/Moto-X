<form class="mt-5" method="post" enctype="multipart/form-data" action="/adminpanel/add-equipment/submit">
    @csrf
    <div class="mb-3 row">
        <label for="photo" class="col-sm-2 col-form-label">Фотография</label>
        <div class="col-sm-10">
            <input type="file" class="form-control" id="photo" name="photo">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="quantity" class="col-sm-2 col-form-label">Количество</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="quantity" name="quantity">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Название</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="category" class="col-sm-2 col-form-label">Категория</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="category" name="category">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="producer" class="col-sm-2 col-form-label">Производитель</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="producer" name="producer">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="size" class="col-sm-2 col-form-label">Размер</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="size" name="size">
        </div>
    </div>
    <div class="mb-3 row">
        <button type="submit" class="btn btn-outline-dark">Добавить экипировку</button>
    </div>
</form>
