<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <title>Настройки профиля</title>
</head>
<body>

<div class="wrapper">
    <header class="header">
        @include('layouts.header.navbar')
    </header>

    <main class="main pt-5">
        <div class="container">
            <div class="justify-content-center">
                @foreach($userData as $key=>$value)
                    @if($key == 'admin' || $key == '_token')
                        @continue
                    @endif
                    <div class="mb-3 row">
                        <label for="staticEmail" class="col-sm-2 col-form-label">{{$key}}</label>
                        <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail"
                                   value="{{$value}}">
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>

    <footer class="footer">
        @include('layouts.footer')
    </footer>
</div>

</body>
</html>
