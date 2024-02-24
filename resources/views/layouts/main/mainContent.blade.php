<?php

    $products = [
        "Мотоциклы" => [
            "Мотоцикл 1",
            "Мотоцикл 2",
            "Мотоцикл 3",
            "Мотоцикл 4",
            "Мотоцикл 5"
        ],
        "Экипировка" => [
            "Экипировка 1",
            "Экипировка 2",
            "Экипировка 3",
            "Экипировка 4",
            "Экипировка 5"
        ],
        "Аксессуары" => [
            "Аксессуар 1",
            "Аксессуар 2",
            "Аксессуар 3",
            "Аксессуар 4",
            "Аксессуар 5"
        ],
        "Уценка" => [
            "Уценка 1",
            "Уценка 2",
            "Уценка 3",
            "Уценка 4",
            "Уценка 5"
        ]
    ]
?>
<div class="products container mt-2 border-start border-end">
    @foreach($products as $category=>$product)
        <h1>{{$category}}</h1>
        <div class="row row-cols-1 row-cols-md-5 g-4">
            @for($i = 0; $i < 5; $i++)
                <div class="col">
                    <div class="card">
                        <img src="{{asset('images/4.jpg')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{$product[$i]}}</h5>
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
    @endforeach
</div>
