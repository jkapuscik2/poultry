#!/bin/bash

sudo apt-get install -y php7.3 php7.3-fpm php7.3-common php7.3-mysql php7.3-gd php7.3-xml php7.3-mbstring php7.3-zip
composer install
cd /var/www/poultry
composer install
php artisan migrate
