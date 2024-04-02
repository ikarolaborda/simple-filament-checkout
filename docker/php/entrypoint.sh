#!/bin/sh

php artisan optimize:clear

php artisan migrate:fresh --seed

php artisan queue:listen

exec docker-php-entrypoint php-fpm
