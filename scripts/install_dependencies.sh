#!/bin/bash

sudo apt-get install -y php7.4 php7.4-fpm php7.4-common php7.4-mysql php7.4-gd php7.4-xml php7.4-mbstring php7.4-zip

chown www-data:www-data /var/www -R
sudo find /var/www/poultry -type f -exec chmod 644 {} \;
sudo find /var/www/poultry -type d -exec chmod 755 {} \;
sudo chown -R www-data:www-data /var/www/poultry/vendor
sudo chown -R www-data:www-data /var/www/poultry/storage

cd /var/www/poultry
composer install --optimize-autoloader --no-dev
php artisan migrate
