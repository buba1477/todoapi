# todoapi
tasks
Для запуска необходимо:

1) Склонировать себе репу.
2) В корне проекта запустить команду sudo docker-compose up -d , установятся с docker hub
nginx postgres php. Может возникнуть ошибка ERROR [app internal] load metadata for docker.io/library/php:8.3-fpm
для того чтобы ее разрешить нужно отдельно скачать образ с помощью sudo docker pull php:8.3-fpm

и повторно запустить sudo docker-compose up -d

3) нужно настроить .env
   для коннекта с базой указать настройки
DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=laravel
DB_USERNAME=postgres
DB_PASSWORD=postgres

далее зайти на контейнер с помощью команды docker exec -it todo_app bash и внутри 
контейнера запустить миграции таблиц php artisan migrate.

4) После того как все успешно поднялось и установилось, регистрируемся
   там базовая регистрация laravel ui auth и можно работать с crud.
   Фильтрация пагинация все в наличиию. JWT авторизация настроена
   можно config/auth.php переключить
    'defaults' => [
        'guard' => 'api',
        'passwords' => 'users',
    ],

   c POSTMAN на защищенные роуты прилетает токен , его в GET
   c Bearer указываем и получаем доступ.
