# Ensure proper permissions for nginx directories
mkdir -p /var/run/nginx
chown -R myuser:mygroup /var/run/nginx

# Ensure proper permissions for the log file
touch /var/www/storage/logs/laravel.log
chown -R myuser:mygroup /var/www/storage/logs
chmod -R 775 /var/www/storage/logs

# Start php-fpm
php-fpm &

# Start nginx
nginx -g 'daemon off;'
