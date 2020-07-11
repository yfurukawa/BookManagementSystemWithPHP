#!/bin/sh

cp index.html /var/www/html/BM/
cp *.php /var/www/html/BM/
cp php/* /var/www/php_libs/class/
mv /var/www/php_libs/class/init.php /var/www/php_libs/
