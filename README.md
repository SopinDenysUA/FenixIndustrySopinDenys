<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Fenix Industry

Laravel back-end developer, PHP-розробник

- Завантажте актуальні бібліотеки(папка vendor відсутня)
> composer update
- Встановлення залежностей і компіляції CSS/JS
> npm install && npm run dev
- Зробіть міграції
> php artisan migrate або sail (./vendor/bin/sail) artisan migrate якщо докер
- Зробіть сіди
> php artisan db:seed або sail (./vendor/bin/sail) artisan db:seed якщо докер
- Переконайтеся, що під'єднано і завантажено бібліотеки css & js bootstrap, а також іконки font awesome за шляхом resource/views/layouts
> link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
> 
> script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js">
> 
> link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"

Пояснення виконання завдання:
- Для авторизації, скористався Laravel Auth
- Додатково зробив основну сторінку товарів, з можливістю додавання товарів у кошик.
- Додатково зробив можливим додати бажану кількість товарів у кошик.
- Вивів у шапку (header) сайту кількість товарів у кошику
- Зробив сайт багатомовним з можливістю вибору мови (en, uk, ru)
- Дотримувався MVC, звернення до бази в Сервісах, через Моделі, логіка в Контролерах
- Сайт працює стабільно, додатково написав тести на додавання, оновлення та видалення товарів з кошика
