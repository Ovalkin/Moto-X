<div class="products container mt-2 border-start border-end">
    <div class="row row-cols-1 row-cols-md-5 g-4">
        @if($products == null)
            <h1>Отсутсвуют</h1>
        @else
            @foreach($products as $name=>$product)
                <div class="col">
                    <div class="card">
                        <a href="/{{$product['page']}}/{{$product['code']}}" class="text-decoration-none text-black">
                            <div>
                                <img src="{{asset('storage/'.$product['photo'])}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title text-truncate"
                                        title="{{$product['name']}}">{{$product['name']}}</h5>
                                    @foreach($product['params'] as $namePar=>$param)
                                        <div class="d-flex justify-content-between">
                                            <div>{{$namePar}}:</div>
                                            <div class="text-truncate"
                                                 title="{{$param}}">{{$param}}</div>
                                        </div>
                                    @endforeach
                                    <br>
                                    <h5>{{number_format($product['price'], 0, '', ' ')}} р.</h5>
                                </div>
                            </div>
                        </a>
                        <div class="me-2 ms-2 mb-1">
                            <form method="post" action="/basket/addProduct">
                                @csrf
                                <input name="product_id" readonly type="hidden" value="{{$product['id']}}">
                                <input type="submit" class="btn btn-outline-dark w-100 mb-1" value="Добавить в корзину">
                            </form>
                            <button type="button" class="btn btn-outline-dark w-100">Купить</button>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <br>
</div>
