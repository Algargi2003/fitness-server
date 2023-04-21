rm -rf /var/www/html
ln -s /workspace/public /var/www/html
cp /workspace/.devcontainer/config/apache2.conf /etc/apache2
cp /workspace/.devcontainer/config/000-default.conf /etc/apache2/sites-enabled
cp /workspace/.devcontainer/config/xdebug.ini /usr/local/etc/php/conf.d
rm /workspace/storage/logs/tests.log
touch /workspace/storage/logs/tests.log
chmod 777 /workspace/storage/logs/tests.log
rm /workspace/storage/logs/laravel.log
touch /workspace/storage/logs/laravel.log
chmod 777 /workspace/storage/logs/laravel.log
rm /workspace/database/database.sqlite
touch /workspace/database/database.sqlite
chmod 777 /workspace/database/database.sqlite
ln -s /usr/local/etc/php/conf.d/ /conf.d
chmod 777 /workspace/vendor

echo "+++++++++++++APACHE+++++++++++++++++"
a2enmod rewrite
a2enmod headers
apachectl restart

echo "+++++++++++++COMPOSER+++++++++++++++++"
composer install

echo "+++++++++++++ARTISAN+++++++++++++++++"
php artisan route:cache
php artisan cache:clear
php artisan config:cache
php artisan view:clear

php artisan optimize

# php artisan db:wipe
# php artisan migrate --seed
# php artisan db:wipe --env=testing
# php artisan migrate --seed --env=testing

# sudo echo "* * * * * root /usr/local/bin/php /workspace/artisan schedule:run 1>> /dev/null 2>&1" | sudo tee /etc/cron.d/artisan_scheduler

# # # In some cases, Laravel logs a lot of data in the storage/logs/laravel.log and it sometimes
# # # might turn out into massive files that will restrict the filesystem.
# # # Uncomment the following lines to enable a CRON that deletes the laravel.log file
# # # every now and often.

# sudo echo "0 0 * * */7 root rm -rf /workspace/storage/logs/laravel.log 1>> /dev/null 2>&1" | sudo tee /etc/cron.d/log_deleter
