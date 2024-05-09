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
docker compose up -d
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

## После данных манипуляций сайт будет доуступен по адресу 
http://localhost:80
## База данных по адресу
http://localhost:3306

### Замечания
#### Для получения админки
```
mysql -h mysql -u sail -p moto_x -e "UPDATE users SET admin=1 WHERE id=1"
```
##### и ввести пароль password
##### после чего будет выдана админка на первого зарегестрированного пользователя

## (Курсовой проект)
