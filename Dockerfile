FROM php:8.2-fpm 

#install depedencies OS
RUN apt-get update && apt-get install -y \
git \
curl \
unzip \
libpng-dev \
libonig-dev \
libxml2-dev \
libzip-dev \
&& docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

#install composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

#set working directory
WORKDIR /var/www

#copy project
COPY . . 

#install laraven dependency
RUN composer install

#permission
RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

    EXPOSE 9000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]