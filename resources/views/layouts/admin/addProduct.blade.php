<form class="mt-5" method="post" action="/adminpanel/add-product/submit">
    @csrf
    <div class="mb-3 row">
        <label for="category" class="col-sm-2 col-form-label">Категория</label>
        <div class="col-sm-10">
            <select class="form-select" id="category" name="category">
                <option selected="selected"></option>
                <option value="motorcycle">Мотоцикл</option>
                <option value="equipment">Экипировка</option>
                <option value="accessory">Аксессуар</option>
            </select>
        </div>
    </div>
    <div class="block"></div>
    <div class="block">
        <div class="mb-3 row">
            <label for="code" class="col-sm-2 col-form-label">Мотоциклы</label>
            <div class="col-sm-10">
                <select class="form-control chosen" id="code" name="codeMotorcycles">
                    <option></option>
                    @foreach($motorcycles as $motorcycle)
                        <option value="{{$motorcycle['code']}}">{{$motorcycle['name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="block">
        <div class="mb-3 row">
            <label for="code" class="col-sm-2 col-form-label">Экипировка</label>
            <div class="col-sm-10">
                <select class="form-control chosen" id="code" name="codeEquipments">
                    <option></option>
                    @foreach($equipments as $equipment)
                        <option value="{{$equipment['code']}}">{{$equipment['name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="block">
        <div class="mb-3 row">
            <label for="code" class="col-sm-2 col-form-label">Аксессуары</label>
            <div class="col-sm-10">
                <select class="form-control chosen" id="code" name="codeAccessories">
                    <option></option>
                    @foreach($accessories as $accessory)
                        <option value="{{$accessory['code']}}">{{$accessory['name']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="mb-3 row">
        <label for="description" class="col-sm-2 col-form-label">Описание</label>
        <div class="col-sm-10">
            <textarea name="description" type="text" class="form-control" id="description" rows="3"></textarea>
        </div>
    </div>
    <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label">Цена (в рублях)</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="price" name="price">
        </div>
    </div>
    <div class="mb-3 row">
        <button type="submit" class="btn btn-outline-dark">Добавить товар</button>
    </div>
</form>

<style>
    .block {
        visibility: hidden ;
    }
</style>

<script>
    let select = document.getElementById('category');
    let block = document.querySelectorAll('.block');
    let lastIndex = 0; // После каждой смены опции, сохраняем сюда индекс предыдущего блока

    select.addEventListener('change', function () {
        block[lastIndex].style.visibility = "hidden";
        // Чтобы сразу делать именно его невидимым при следующей смене

        let index = select.selectedIndex; // Определить индекс выбранной опции
        block[index].style.visibility = "unset"; // Показать блок с соответствующим индексом

        lastIndex = index; // Обновить сохраненный индекс.
    });
    $('.chosen').chosen();
</script>