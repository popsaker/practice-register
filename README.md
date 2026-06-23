# Практический проект: развёртывание

## Быстрый старт

1. Скопируйте проект на новый компьютер.
2. Скопируйте `config.example.php` в `config.php`.
3. Укажите свои данные MySQL в `config.php`.
4. Запустите `composer install`.
5. Импортируйте `database.sql` в вашу базу данных.
6. Настройте веб-сервер так, чтобы корневая папка была `public/`.

## Что нужно

- PHP 8.0 или выше
- MySQL / MariaDB
- Веб-сервер (Apache, Nginx, OpenServer, OSPanel и т.п.)
- Папка `storage/framework/views` должна быть доступна для записи

## Отдельные файлы

- `config.example.php` — шаблон настроек подключения к базе
- `database.sql` — скрипт для создания таблиц `aregistr` и `acars`
- `vendor/` — зависимости PHP, устанавливаются через `composer install`

## Пример команд

```bash
composer install
mysql -u username -p database_name < database.sql
```

> Таблица `user_carts` создаётся автоматически при первом использовании корзины.
