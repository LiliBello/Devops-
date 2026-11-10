### Стэк:

- Laravel 12 (PHP 8.4)
- Laravel Sanctum

## Эндпоинты

- `GET /api/hello` — проверка, что всё работает
- `POST /api/register` — регистрация пользователя (`name`, `email`, `password`)

## При запуске:

> Запуск через Docker описан в корневом `README.md`. Ниже — запуск без Docker.

Скопируйте `.env.example` в `.env`. Заполните `.env`:

- `DB_HOST` - хост базы данных (куда подключаться; в Docker это `db`)
- `DB_PORT` - порт
- `DB_DATABASE` - название базы данных
- `DB_USERNAME` - пользователь
- `DB_PASSWORD` - пароль

Введите в терминал (в корне проекта):

- команду для установки пакетов: `composer install`
- команду для генерации спец. ключа приложения: `php artisan key:generate`
- команду для выполнения миграций (заполнения базы данных): `php artisan migrate`
