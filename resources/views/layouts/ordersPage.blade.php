<div class="container mt-5 mb-5" style="min-height: 700px">
    <ul class="list-group list-group-horizontal">
        <li class="list-group-item flex-fill w-25">Название товара</li>
        <li class="list-group-item flex-fill w-25">Колличество</li>
        <li class="list-group-item flex-fill w-25">Адрес</li>
        <li class="list-group-item flex-fill w-25">Статус</li>
    </ul>
    @foreach($ordersData as $order)
        <ul class="list-group list-group-horizontal">
            <li class="list-group-item flex-fill w-25" title="{{$order['name']}}">{{$order['name']}}</li>
            <li class="list-group-item flex-fill w-25" title="{{$order['amount']}}">{{$order['amount']}}</li>
            <li class="list-group-item flex-fill w-25" title="{{$order['address']}}">{{$order['address']}}</li>
            <li class="list-group-item flex-fill w-25" title="{{$order['status']}}">{{$order['status']}}</li>
        </ul>
    @endforeach

</div>
