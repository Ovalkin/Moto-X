<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Корзина</title>
</head>

<body>

<main class="main">
    <div class="wrapper">
        <div class="container">
            <h1>Корзина</h1>
            <div>2 товара</div>
            <br>
            <form class="d-flex flex-row gap-3 justify-content-center">
                <div class="d-flex flex-column gap-2 w-75 border-end">
                    <div class="d-flex flex-row gap-5 border-bottom border-top justify-content-between">
                        <img src="{{asset('images/1.jpg')}}" alt="" style="height: 150px;">
                        <div class="d-flex flex-column">
                            <h3>YAMAHA YZF-R3A ABS</h3>
                            <ul>
                                <li class="d-flex justify-content-between">
                                    <div>Год:</div>
                                    <div>2009</div>
                                </li>
                                <li class="d-flex justify-content-between">
                                    <div>Код товара:</div>
                                    <div>УТ-00119738</div>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex flex-column">
                            <h4>500 000 р.</h4>
                            <input style="width: 60px;" type="number" value="1" id="col">
                        </div>
                    </div>
                </div>
                <div class="w-25">
                    <div>
                        <h5>К оплате: 2 000 000 р.</h5>
                        <button class="btn btn-outline-dark w-100" type="submit">Перейти к оформлению</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>