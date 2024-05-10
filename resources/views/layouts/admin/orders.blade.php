<div class="container mt-5 mb-5" style="min-height: 700px">
    <ul class="list-group list-group-horizontal">
        <li class="list-group-item flex-fill w-25">Покупатель</li>
        <li class="list-group-item flex-fill w-25">Название товара</li>
        <li class="list-group-item flex-fill w-25">Колличество</li>
        <li class="list-group-item flex-fill w-25">Адрес</li>
        <li class="list-group-item flex-fill w-25">Статус</li>
    </ul>
    @foreach($orders as $order)
        <form action="/adminpanel/orders/submit" method="post">
            @csrf
            <input type="hidden" name="id_order" value="{{$order['id_order']}}">
            <input type="hidden" name="id_product" value="{{$order['id_product']}}">
            <input type="hidden" name="amount" value="{{$order['amount']}}">
            <ul class="list-group list-group-horizontal">
                <li class="list-group-item flex-fill w-25">{{$order['user_name']}}</li>
                <li class="list-group-item flex-fill w-25">{{$order['name_product']}}</li>
                <li class="list-group-item flex-fill w-25">{{$order['amount']}}</li>
                <li class="list-group-item flex-fill w-25">{{$order['address']}}</li>
                <li class="list-group-item flex-fill w-25">
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success" name="submit" value=1>Принять</button>
                        <button type="submit" class="btn-danger btn" name="submit" value=0>Отклонить</button>
                    </div>
                </li>
            </ul>
        </form>
    @endforeach
</div>
