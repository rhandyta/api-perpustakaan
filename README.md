<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# API Perpustakaan

Clone the project

```bash
  git clone https://github.com/rhandyta/api-perpustakaan.git
```

Go to the project directory

```bash
  cd api-perpustakaan
```

Install dependencies

```bash
  composer install
```

Duplicate Environment

```bash
  Duplicate .env.example to .env
```

Change your database

```bash
  Change your config database in file .env "perpustakaan"
```

Generate Key
```bash
  php artisan key:generate
```

Generate JWT Secret
```bash
  php artisan jwt:secret
```

Migration & seed
```bash
  php artisan migrate and migrate --seed
```

Start the server

```bash
  php artisan serve
```

Login Account

```bash
  Email: officer@gmail.com password: officer
```

## License

[MIT](https://choosealicense.com/licenses/mit/)

