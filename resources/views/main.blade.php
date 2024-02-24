<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body class=" bg-warning-subtle ">

<div class="wrapper">
    <header class="header">
        @include('header.navBar')
        @include('header.navUnderLine')
    </header>

    <main class="main py-0 fs-5">
        <div class="container ">
            <div id="carouselExampleInterval" class="carousel m-0 slide bg-black" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="4000">
                        <img src="{{asset('images/1.jpg')}}" height="200" width="100%"
                             class="d-block object-fit-cover" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="4000">
                        <img src="{{asset('images/2.jpg')}}" height="200" width="100%"
                             class="d-block object-fit-cover" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="4000">
                        <img src="{{asset('images/3.jpg')}}" height="200" width="100%"
                             class="d-block object-fit-cover" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
                        data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
                        data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

        </div>
    </main>
    <footer class="footer">
    </footer>
</div>

</body>
</html>



