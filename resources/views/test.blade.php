<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    @isset($path)
        <img src="{{asset('/storage/') .'/'. $path}}" alt="">
    @endisset
</body>
</html>