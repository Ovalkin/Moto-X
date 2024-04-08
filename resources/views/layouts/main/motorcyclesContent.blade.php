<div class="products container mt-2 border-start border-end">
    <h1>Мотоциклы</h1>
    <div class="row row-cols-1 row-cols-md-5 g-4">
        @foreach($motorcycles as $id=>$motorcycle)
            <div class="col">
                <div class="card">
                    <a href="/motorcycle/{{$motorcycle['code']}}" class="text-decoration-none text-black">
                        <div>
                            <img src="{{asset('storage/'.$motorcycle['photo'])}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$motorcycle['name']}}</h5>
                                <div class="d-flex justify-content-between">
                                    <div>Производитель:</div>
                                    <div>{{$motorcycle['producer']}}</div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div>Год:</div>
                                    <div>{{$motorcycle['year']}}</div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div>Ёмкость двигателя:</div>
                                    <div>{{$motorcycle['capacity']}}</div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div>Класс:</div>
                                    <div>{{$motorcycle['class']}}</div>
                                </div>
                                <h5>{{number_format($motorcycle['price'], 0, '', ' ')}} р.</h5>
                            </div>
                        </div>
                    </a>
                    <div class="me-2 ms-2 mb-1">
                        <button type="button" class="btn btn-outline-dark w-100 mb-1">В корзину</button>
                        <button type="button" class="btn btn-outline-dark w-100">В избранное</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <br>
</div>
