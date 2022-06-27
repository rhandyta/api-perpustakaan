
# API Perpustakaan

Clone the project

```bash
  https://github.com/rhandyta/api-perpustakaan.git
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

