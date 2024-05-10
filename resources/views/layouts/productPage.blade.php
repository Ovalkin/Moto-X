<div class="container mt-5" style="min-height: 800px">
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
                <form method="post" action="/basket/addProduct">
                    @csrf
                    <input name="product_id" readonly type="hidden" value="{{$products[$code]['id']}}">
                    @if($products[$code]['amount'] != 0)
                        <button type="submit" class="btn btn-outline-dark w-100 mb-1">Добавить в корзину</button>
                    @else
                        <h1 class="btn btn-outline-danger w-100 mb-1">Товар закончился</h1>
                    @endif
                </form>
            </div>
        </div>
    </div>
    <div class="d-flex flex-row mt-5 mb-5 justify-content-center">
        <div class="border w-75 p-3">
            <h2>Описание:</h2>
            <h4>
                {{$products[$code]['description']}}
            </h4>
        </div>
    </div>
</div>
