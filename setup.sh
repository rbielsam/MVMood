#!/bin/bash
echo "Iniciando instalacion"
cd mvmood
composer install
cp .env.example .env
php artisan key:generate
sed -i 's/^DB_CONNECTION=.*/DB_CONNECTION=mysql/' .env
echo "DB_HOST=127.0.0.1" >> .env
echo "DB_PORT=3306" >> .env
echo "DB_DATABASE=mvmood" >> .env
echo "DB_USERNAME=deploy" >> .env
echo "DB_PASSWORD=1234" >> .env

php artisan install:broadcasting --no-interaction

sed -i 's/^BROADCAST_DRIVER=.*/BROADCAST_DRIVER=pusher/' .env
sed -i 's/^BROADCAST_CONNECTION=.*/BROADCAST_CONNECTION=pusher/' .env
echo "PUSHER_APP_ID=2143530" >> .env
echo "PUSHER_APP_KEY=fc768dea3d34d2690a2f" >> .env
echo "PUSHER_APP_SECRET=97c14b40d5644ab640a9" >> .env
echo "PUSHER_APP_CLUSTER=eu" >> .env

sed -i 's/^MAIL_MAILER=.*/MAIL_MAILER=smtp/' .env
sed -i 's/^MAIL_HOST=.*/MAIL_HOST=smtp.gmail.com/' .env
sed -i 's/^MAIL_PORT=.*/MAIL_PORT=587/' .env
sed -i 's/^MAIL_USERNAME=.*/MAIL_USERNAME=welcomemvmood@gmail.com/' .env
sed -i 's/^MAIL_PASSWORD=.*/MAIL_PASSWORD=sfvxgjczoczomyck/' .env
sed -i 's/^MAIL_FROM_ADDRESS=.*/MAIL_FROM_ADDRESS="welcomemvmood@gmail.com"/' .env
sed -i 's/^MAIL_FROM_NAME=.*/MAIL_FROM_NAME="MVMood team"/' .env

php artisan install:api --no-interaction
composer require laravel/ui
php artisan ui react
php artisan migrate
php artisan serve
