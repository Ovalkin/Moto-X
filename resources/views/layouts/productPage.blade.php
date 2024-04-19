<div class="container mt-5" style="min-height: 1000px">
    <div class="d-flex  justify-content-between">
        <div class="w-50" style="width: 700px">
            <img src="{{asset('storage/'.$products[$code]['photo'])}}" class="d-block" style="width: 690px" alt="...">
        </div>
        <div class="ms-5 w-50">
            <h1>{{$products[$code]['name']}}</h1>
            <ul class="list-group mt-3 mb-5">
                @foreach($products[$code]['params'] as $id=>$param)
                    <li class="list-group-item d-flex justify-content-between">
                        <div>{{$id}}:</div>
                        <div>{{$param}}</div>
                    </li>
                @endforeach
            </ul>
            <div class="border-top border-bottom d-flex justify-content-center mb-5">
                <b>Код товара: {{$products[$code]['code']}}</b>
            </div>
            <h2>{{number_format($products[$code]['price'], 0, '', ' ')}} р.</h2>
            <div class="d-grid gap-1">
                <button class="btn btn-dark" type="button">Добавить в корзину</button>
                <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">
                    Купить
                </button>
            </div>
        </div>
    </div>
    <div class="d-flex flex-row mt-5 mb-5">
        <div class="border w-100">
            <h2>Описание:</h2>
            <br>
            {{$products[$code]['description']}}
        </div>
    </div>
</div>
