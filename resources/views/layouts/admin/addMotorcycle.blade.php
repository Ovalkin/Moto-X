<form class="mt-5" method="post" enctype="multipart/form-data" action="/adminpanel/add-motorcycles/submit">
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
        <label for="name" class="col-sm-2 col-form-label">Название мотоцикла</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name="name">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="producer" class="col-sm-2 col-form-label">Производитель</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="producer" name="producer">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="year" class="col-sm-2 col-form-label">Год производства</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="year" name="year">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="capacity" class="col-sm-2 col-form-label">Ёмкость двигателя (л.)</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="capacity" name="capacity">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="class" class="col-sm-2 col-form-label">Класс мото-техники</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="class" name="class">
        </div>
    </div>
    <div class="mb-3 row">
        <button type="submit" class="btn btn-outline-dark">Добавить мотоцикл</button>
    </div>
</form>
