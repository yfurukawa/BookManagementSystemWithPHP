#!/bin/sh

mkdir -p /var/www/html/BM
mkdir -p /var/www/php_libs/class/repository
mkdir -p /var/www/html/BM/css
cp index.html /var/www/html/BM/
cp css/* /var/www/html/BM/css
cp *.php /var/www/html/BM/
cp -R php_libs/class/* /var/www/php_libs/class/
cp php_libs/init.php /var/www/php_libs/
