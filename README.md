# Интернет магазин мотоциклов "Moto-X"

## Информация

### Laravel 10.x

### PHP 8.x

### MySql 8.0

#### Для запуска требуется docker, либо настроенный XAMP (в этом случае устанавливаейте сами)

# Для развертывания
## Удалить у файла .env.example приставку .example должен получится .env

```
composer install
```

```
./vendor/bin/sail up -d
```

## Внутри докер контейнера

```
chmod o+w ./storage/ -R
```
```
php artisan storage:link
```

```
php artisan migrate
```

```
npm install
```

```
npm run dev
```

## (Курсовой проект)
