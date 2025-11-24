1. Закинул конфиг php.ini к себе в папку C:\xampp\ (полный путь к файлу: C:\xampp\php.ini).
2. Создал проект на Laravel с помощью команды composer create-project laravel/laravel todo-laravel.
3. В файле .env настроил подключение к БД MySQL - поменял db_connection с sqlite на mysql и название БД с laravel на taskapp. В файле config\database.php сменил подключение по умолчанию с sqlite на mysql: 'default' => env('DB_CONNECTION', 'mysql').
4. Создал миграцию для таблицы tasks командой php artisan make:migration create_tasks_table. Также добавил в таблицу столбцы created_at и updated_at через SQL в phpMyAdmin.
5. В созданном файле реализовано 2 метода: метод up (выполняется при примении миграции) - создается таблица tasks с полями id (первичный ключ), заголовком задачи, её статусом и автоматически создаются поля created_at и updated_at (время создания и обновления); метод down (выполняется при откате миграции) - удаляет таблицу.
6. В файле Models/Task.php настроил массовое присваивание - разрешил заполнение полей title и completed; добавил преобразование типов - поле completed автоматически конвертируется между boolean (php) и int (БД).
7. В контроллере TaskController - импортировал модель Task; функция index показывает список всех задач - т.е. получаем все задачи из БД, отсортированные в обратном порядке и возвращаем представление с передачей переменной tasks; функция create показывает форму создания новой задачи - просто возвращается представление с формой; функция store сохраняет новую задачу в БД - происходит валидация входных данных (заголовок - обязательное поле, строка, макс 255 символов), затем создается новая задача в БД - с формы берется заголовок и статус выполнения задачи по умолчанию (true). Наконец, происходит перенаправление на страницу со списком задач.
8. Прописал руты в routes\web.php: '/' - главная страница (т.е. непосредственно список задач); '/tasks/create' - форма создания новой задачи (GET запрос); '/tasks' - сохранение новой задачи (POST запрос).
9. Создал и заполнил Blade шаблоны: для списка задач (resources\views\tasks\index.blade.php) - внешний вид главной формы; для формы создания (resources\views\tasks\create.blade.php) - внешний вид формы создания новой задачи.
10. Протестировал работу проекта: добавил несколько новых записей, на последних записях поменял статус выполнения задачи по умолчанию на выполненную (галочка). Проверил, появляются ли данные в таблице tasks БД taskapp в phpMyAdmin - все задачи проекта синхронизированны с БД, добавление новых задач происходит корректно.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
