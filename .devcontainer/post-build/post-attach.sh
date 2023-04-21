echo "Attaching ..."
echo "+++++++++++++CACHE++++++++++++++++++"
php artisan optimize:clear
chmod 777 -R storage/
echo "+++++++++++++APACHE+++++++++++++++++"
sudo apachectl restart
echo "+++++++++++++NPM+++++++++++++++++"
npm install
