<div class="products container mt-2 border-start border-end">
    <h1>Экипировка</h1>
    <div class="row row-cols-1 row-cols-md-5 g-4">
        @foreach($equipments as $id=>$equipment)
            <div class="col">
                <div class="card">
                    <a href="/equipment/{{$equipment['code']}}" class="text-decoration-none text-black">
                        <div>
                            <img src="{{asset('storage/'.$equipment['photo'])}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$equipment['name']}}</h5>
                                <div class="d-flex justify-content-between">
                                    <div>Производитель:</div>
                                    <div>{{$equipment['producer']}}</div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div>Категория:</div>
                                    <div>{{$equipment['category']}}</div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div>Размер:</div>
                                    <div>{{$equipment['size']}}</div>
                                </div>
                                <br>
                                <h5>{{number_format($equipment['price'], 0, '', ' ')}} р.</h5>
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
