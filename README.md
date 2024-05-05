# Installation

## Setup this repository first

Usage

```bash
git clone https://github.com/fauziabd26/laravel-wedding
cd wedding-invitation
```

## Setup Laravel Packages and Migrations

### Make sure you do this before setup on bash

-   PHP version is on version 8
-   .env File is available or exists
-   Change database config on .env file
-   Composer installed

### Bash Usage

```bash
composer install
cp .env.example .env
php artisan key:generate
npm install && npm run dev
php artisan migrate:fresh --seed
php artisan serve
```

### landing page with guest name

http://wedding-fauzi-abdilah.my.id/?to=Fauzi+Abdilah