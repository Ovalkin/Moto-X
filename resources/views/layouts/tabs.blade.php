<ul class="nav nav-underline justify-content-center border-bottom bg-body-tertiary position-sticky z-1"
    style="top: 50px">
    <li class="nav-item">
        <a class="nav-link {{Route::currentRouteName('/') == '/' ? 'active' : '' }}" href="/">Главная</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{Route::currentRouteName('motorcycles') == 'motorcycles' ? 'active' : '' }}"
           href="/motorcycles">Мотоциклы</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{Route::currentRouteName('equipment') == 'equipment' ? 'active' : '' }}"
           href="/equipment">Экипировка</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{Route::currentRouteName('accessories') == 'accessories' ? 'active' : '' }}"
           href="/accessories">Аксессуары</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{Route::currentRouteName('discounted') == 'discounted' ? 'active' : '' }}"
           href="/discounted">Уценка</a>
    </li>
</ul>
