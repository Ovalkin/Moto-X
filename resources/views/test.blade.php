<div class="container mb-5" style="min-height: 800px">
    <h1>Корзина</h1>
    <div>{{$countProduct}} товаров</div>
    <br>
    <div class="d-flex flex-row gap-3 justify-content-center">
        <div class="d-flex flex-column gap-2 w-75">
            @foreach($basketData as $product)
                <div class="d-flex flex-row gap-5 border-bottom border-top justify-content-between">
                    <div class="d-flex flex-row gap-5 w-75">
                        <img src="{{asset('storage/'.$product['photo'])}}" alt="..." style="height: 150px;">
                        <div class="d-flex flex-column">
                            <h3 class="">{{$product['name']}}</h3>
                            <label for="floatingPlaintextInput">Код товара:</label>
                            <input type="text" readonly class="form-control-plaintext"
                                   id="floatingPlaintextInput" value="{{$product['code']}}">
                        </div>
                    </div>
                    <div class="d-flex flex-column justify-content-between m-2">
                        <h4>{{number_format($product['price'], 0, '', ' ')}} р.</h4>
                        <div>
                            <label for="col">Количество</label>
                            <form class="d-flex flex-row" method="get" action="/basket/update">
                                <input type="hidden" name="basketId" value="{{$product['id']}}">
                                <input type="hidden" name="productId" value="{{$product['product_id']}}">
                                <input type="submit" value="-" name="action" id="col">
                                <input style="width: 50px;" readonly name="count" type="number"
                                       value="{{$product['amount']}}"
                                       id="col">
                                <input type="submit" value="+" name="action" id="col">
                            </form>
                        </div>
                        <form method="post" action="/basket/delete">
                            @csrf
                            <input type="hidden" name="id" value="{{$product['id']}}">
                            <input type="submit" class="btn btn-outline-danger" value="Удалить из корзины">
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <form class="w-25" method="post" action="/basket/make-order">
            @csrf
            <div>
                <h5>К оплате: {{number_format($sumPrice, 0, '', ' ')}} р.</h5>
                <button type="button" class="btn btn-outline-dark w-100 mb-2" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">
                    Указать адресс доставки
                </button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Укажите адресс доставки</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Закрыть"></button>
                            </div>
                            <div class="modal-body">
                                <form class="w-100" method="post" action="/basket/make-order">
                                    @csrf
                                    <label for="address" class="form-label">Адресс</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                           placeholder="пр. Победы, д. 290, кв. 50">
                                    <button class="mt-4 btn btn-outline-dark w-100" type="submit">Сделать заказ</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger w-100" data-bs-dismiss="modal">
                                    Закрыть
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</div>
