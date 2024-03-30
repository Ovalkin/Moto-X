<ul class="nav nav-underline justify-content-center border-bottom bg-body-tertiary position-sticky z-1"
    style="top: 50px">
    <li class="nav-item">
        <a class="nav-link {{$page == '' ? 'active' : '' }}" href="/">Главная</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$page == 'motorcycles' ? 'active' : '' }}"
           href="/motorcycles">Мотоциклы</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$page == 'equipment' ? 'active' : '' }}"
           href="/equipment">Экипировка</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{$page == 'accessories' ? 'active' : '' }}"
           href="/accessories">Аксессуары</a>
    </li>
</ul>
