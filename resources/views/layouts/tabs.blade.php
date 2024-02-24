<ul class="nav nav-underline justify-content-center border-bottom bg-body-tertiary position-sticky z-1"
    style="top: 50px">
    <li class="nav-item">
        <a class="nav-link {{Route::currentRouteName('/') == '/' ? 'active' : '' }}" href="/">Главная</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Мотоциклы</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Экипировка</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Аксессуары</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">Уценка</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{Route::currentRouteName('test') == 'test' ? 'active' : '' }}" href="/test">Test</a>
    </li>
</ul>
