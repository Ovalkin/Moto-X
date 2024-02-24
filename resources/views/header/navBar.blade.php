<nav class="navbar p-1 navbar-expand-lg bg-body-tertiary navbar bg-primary" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">MOTO-X</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Главная</a>
                </li>
            </ul>
            <form class="d-flex w-25" role="search">
                <input class="form-control me-2" type="search" placeholder="Поиск по товарам" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Поиск</button>
            </form>

            @if(isset($_COOKIE['autUser'])) @include('header.aut')
            @else @include('header.notAut')
            @endif

        </div>
    </div>
</nav>

@include('forms.signForms')

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
     aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">ХАХАХАХАХААХАХАХАХАХА</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        РЛОРОЛЛО
    </div>
</div>
