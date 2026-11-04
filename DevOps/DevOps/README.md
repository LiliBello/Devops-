## Мазурина Елизавета Федоровна

## Контейнеры

| Сервис       | Образ                     | Назначение                      | Порт на хосте            |
|--------------|---------------------------|---------------------------------|--------------------------|
| `proxy`      | nginx:1.29-alpine         | прокси для Laravel и phpMyAdmin | `8000`, `127.0.0.1:8080` |
| `app`        | php:8.4-fpm-alpine3.22    | Laravel 12                      | —                        |
| `db`         | alpine:3.22 + MariaDB     | база данных                     | `127.0.0.1:3307`         |
| `phpmyadmin` | phpmyadmin:5.2-fpm-alpine | веб-интерфейс к БД              | через `proxy`            |

## Что нужно

- Docker с плагином Docker Compose v2 (`docker compose`)
- свободные порты `8000`, `8080`, `3307`

## Запуск

Все команды выполняются из корня репозитория.

### 1. Переменные окружения

```
cp Deploy/dev/.env.example Deploy/dev/.env
cp Project/.env.example Project/.env
```

Значения `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` в `Project/.env` должны совпадать с `Deploy/dev/.env`
(по умолчанию уже совпадают). `DB_HOST=db` и `DB_PORT=3306` менять не нужно — это адрес контейнера БД внутри docker-сети.

> Пользователь и база создаются при сборке образа `db`. Если поменяли пароли в `Deploy/dev/.env`,
> пересоберите образ и удалите старый том: `docker compose down -v && docker compose up -d --build`.

### 2. Сборка и запуск контейнеров

```
cd Deploy/dev
docker desktop stop
```

### 3. Установка зависимостей и миграции


```
docker compose exec app composer install
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate
```


## Проверка

- API: http://localhost:8000/api/hello
- phpMyAdmin: http://localhost:8080 (логин/пароль — `DB_USERNAME` / `DB_PASSWORD` из `Deploy/dev/.env`)