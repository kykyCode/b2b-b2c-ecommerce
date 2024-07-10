FROM php:8.2-fpm

RUN groupadd -g 1000 mygroup && \
    useradd -u 1000 -g mygroup -m -s /bin/bash myuser

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    libonig-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    nginx \
    libzip-dev \
    redis-server

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Redis extension for PHP
RUN pecl install redis && docker-php-ext-enable redis

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /var/www

RUN chown -R myuser:mygroup /var/www

RUN mkdir -p /var/lib/nginx /var/log/nginx /var/run/nginx && \
    chown -R myuser:mygroup /var/lib/nginx /var/log/nginx /var/run/nginx

RUN chown -R myuser:mygroup /var/www/storage /var/www/bootstrap/cache
RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache

RUN touch /var/www/storage/logs/laravel.log && \
    chown -R myuser:mygroup /var/www/storage/logs && \
    chmod -R 775 /var/www/storage/logs

RUN sed -i 's/^user = .*/;user = nobody/' /usr/local/etc/php-fpm.d/www.conf && \
    sed -i 's/^group = .*/;group = nobody/' /usr/local/etc/php-fpm.d/www.conf

COPY ./nginx/nginx.conf /etc/nginx/nginx.conf

COPY ./start.sh /start.sh
RUN chmod +x /start.sh

EXPOSE 8080

USER myuser

CMD ["/start.sh"]
