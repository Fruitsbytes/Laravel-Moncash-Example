# MonCash/Laravel

<small>Advanced e-commerce example</small>

<p align="center">
    <img src="../banner.png?v=1" alt="banner">
</p>

## About this example

In this exalpe we simulate an e-commerce website using Laravel and MonCash as a payment system.

Copy `.env.example` into `.env` and fill the missing environment variables values ( APP_KEY, MONCASH, PUSHER...). 

You should be all set to start :
```shell
sail up
```

```shell
composer install
```

In opposition to the [Basic example](../laravel-moncash-basic-example), we use :

- [Facades](https://laravel.com/docs/9.x/facades)
- [Service Providers](https://laravel.com/docs/9.x/providers)
- [Containers](https://laravel.com/docs/9.x/container)
- [Cache](https://laravel.com/docs/9.x/cache)
- [Queue/Job](https://laravel.com/docs/9.x/queues)
- [Echo](https://laravel.com/docs/9.x/broadcasting#client-side-installation)
- Data Persistance with MySQL
- 🚧 Swap environment configuration in the settings
- Strategies design patterns
- 🚧 i18n Internationalisation
    - English
    - French
    - Kreyol
- Cart + Checkout simulation
- 🚧 Confirmation Email
- 🚧 Confirmation SMS
- 🚧 Cron job to periodically check for missed signal from MonCash

#### ⚠ IMPORTANT:

In this example we use queues to safely  process payment transactions and optimize the server performance.

You will need to select a valid queue connection (default is redis)
and [run the queue worker](https://laravel.com/docs/9.x/queues#running-the-queue-worker):

```shell
php artisan queue:work
```

or

```shell
sail php artisan queue:work
```

Also read about process monitoring via [Supervision](https://laravel.com/docs/9.x/queues#supervisor-configuration)

## Laravel

<a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200" alt="Laravel Logo"></a>

<p>
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and
creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in
many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache)
  storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## MonCash

<a href="https://www.digicelgroup.com/ht/en/moncash/customer.html)" target="_blank" >
<img src="../assets/images/moncash-logo.png?v=1" alt="MOnCash Logo" width="150">
</a>


> MonCash is a mobile money service that allows daily transactions between MonCash users, regardless of their location
> in Haiti. Some of the daily transactions users can do are:
> - Hold money in their MonCash account for day-to-day purchases
> - Receive international money transfers
> - Send money between MonCash users by using their phone number
> - Deposit money to their MonCash account
> - Withdraw money from their MonCash account
> - Purchase Digicel bundles of minutes or data
> - Pay to affiliated merchants
> - Pay bills
> - Receive payroll payments
>
> Digicel Haiti offers this service in partnership with Sogebank.
>
> MonCash has been in Haiti since 2010. The old name was Tchotcho Mobil.
>
> -[Digicel Group](https://www.digicelgroup.com/ht/en/moncash/customer.html)

