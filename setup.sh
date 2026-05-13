cd mvmood
cp .env.example .env
php artisan install:broadcasting
php artisan install:sanctum
php artisan install:api
php artisan key:generate
php artisan require laravel/ui
php artisan migrate
composer install
php artisan serve
