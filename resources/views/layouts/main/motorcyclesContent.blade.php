<div class="products container mt-2 border-start border-end">
    <h1>Мотоциклы</h1>
    <div class="row row-cols-1 row-cols-md-5 g-4">
        @foreach($motorcycles as $id=>$motorcycle)
            <div class="col">
                <div class="card">
                    <img src="{{asset('images/4.jpg')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$motorcycle['name']}}</h5>
                        <p class="card-text">This is a longer card with supporting text below as a natural
                            lead-in
                            to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <br>
</div>
