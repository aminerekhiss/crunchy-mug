# Crunchy Mug



## Requirements

- PHP 8.1 or later
- Composer
- Node.js and npm
- A database supported by Laravel

## Setup

Clone the repository and install its dependencies:

```sh
git clone https://github.com/aminerekhiss/crunchy-mug.git
cd crunchy-mug
composer install
npm install
```

Configure the database and other settings in `.env`, then generate the
application key and run the migrations and seeders:

```sh
php artisan key:generate
php artisan migrate --seed
```

Build the frontend assets and start the development server:

```sh
npm run dev
php artisan serve
```

The application is available at `http://localhost:8000`.

## License

See [LICENSE](./LICENSE).
