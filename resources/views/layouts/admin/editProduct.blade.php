@if(isset($products))
    <form class="mt-5" method="post" action="/adminpanel/edit-product/edit">
        @csrf
        <div class="mb-3 row d-flex flex-row">
            <label for="code" class="col-sm-2 col-form-label">Выберете продукт</label>
            <div class="col-sm-10">
                <select class="form-control chosen" id="code" name="idProduct">
                    <option></option>
                    @foreach($products as $product)
                        <option value="{{$product['id']}}">{{$product['name']}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-outline-dark">Выбрать</button>
        </div>
    </form>
@else
    <form class="mt-5" method="post" action="/adminpanel/edit-product/edit/submit" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row d-flex flex-row">
            <input type="hidden" name="category" value="{{$product['category']}}">
            <input type="hidden" name="code" value="{{$product['code']}}">
            <input type="hidden" name="idProduct" value="{{$product['id']}}">
            <input type="hidden" name="idCategory" value="{{$product['idCategory']}}">
            <div class="mb-3 row">
                <label for="photo" class="col-sm-2 col-form-label">Изменить фотографию</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" id="photo" name="photo">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="name" class="col-sm-2 col-form-label">Название</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" value="{{$product['name']}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="producer" class="col-sm-2 col-form-label">Производитель</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="producer" name="producer"
                           value="{{$product['producer']}}">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Описание</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" id="description" name="description">{{$product['description']}}
                    </textarea>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="price" class="col-sm-2 col-form-label">Цена (в рублях)</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="price" name="price"
                           value="{{$product['price']}}">
                </div>
            </div>
            @if($product['category'] == 'motorcycle')
                <div class="mb-3 row">
                    <label for="year" class="col-sm-2 col-form-label">Год производства</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="year" name="year"
                               value="{{$product['params']['Год']}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="capacity" class="col-sm-2 col-form-label">Ёмкость двигателя (л.)</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="capacity" name="capacity"
                               value="{{$product['params']['Ёмкость двигателя']}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="class" class="col-sm-2 col-form-label">Класс мото-техники</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="class" name="class"
                               value="{{$product['params']['Класс']}}">
                    </div>
                </div>
            @endif
            @if($product['category'] == 'equipment')
                <div class="mb-3 row">
                    <label for="eqCategory" class="col-sm-2 col-form-label">Категория</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="eqCategory" name="eqCategory"
                               value="{{$product['params']['Категория']}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="size" class="col-sm-2 col-form-label">Размер</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="size" name="size"
                               value="{{$product['params']['Размер']}}">
                    </div>
                </div>
            @endif
            @if($product['category'] == 'accessory')
                <div class="mb-3 row">
                    <label for="acCategory" class="col-sm-2 col-form-label">Категория</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="acCategory" name="acCategory"
                               value="{{$product['params']['Категория']}}">
                    </div>
                </div>
            @endif
            <button type="submit" class="mb-1 btn btn-outline-dark">Редактировать</button>
            <button type="submit" name="delete" value="1" class="btn btn-outline-danger">Удалить товар</button>
        </div>
    </form>
@endif

<script>
    $('.chosen').chosen();
</script>