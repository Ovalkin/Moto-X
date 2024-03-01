<div class="products container mt-2 border-start border-end">
    <h1>Аксессуары</h1>
    @for($j = 0; $j < 5; $j++)
        <div class="row row-cols-1 row-cols-md-5 g-4">
            @for($i = 0; $i < 5; $i++)
                <div class="col">
                    <div class="card">
                        <img src="{{asset('images/4.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$i}}</h5>
                            <p class="card-text">This is a longer card with supporting text below as a natural
                                lead-in
                                to additional content. This content is a little bit longer.</p>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <hr class="bi-hr">
        <br>
    @endfor
</div>
