#!/bin/sh

mkdir -p /var/www/html/BM
mkdir -p /var/www/php_libs/class/repository
cp index.html /var/www/html/BM/
cp *.php /var/www/html/BM/
cp -R php_libs/class/* /var/www/php_libs/class/
cp php_libs/init.php /var/www/php_libs/
