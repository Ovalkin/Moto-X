<nav class="navbar navbar-expand-lg bg-body-tertiary position-fixed w-100 z-2">
    <div class="container">
        <a class="navbar-brand" href="/">MOTO-X</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Магазин</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-lg-0">
                @if(isset($_COOKIE['aut_user'])) @include('layouts.header.aut')
                @else @include('layouts.header.notAut')
                @endif
            </ul>
        </div>
    </div>
</nav>
@include('layouts.forms.signForms')

