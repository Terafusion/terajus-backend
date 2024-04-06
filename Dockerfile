FROM richarvey/nginx-php-fpm:3.1.6

COPY . .

ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr

ENV COMPOSER_ALLOW_SUPERUSER 1

COPY docker/nginx/laravel.conf /etc/nginx/nginx.conf

RUN composer install
RUN php artisan l5-swagger:generate

EXPOSE 10000

# FROM php:8.1-fpm
# WORKDIR /var/www

# ## INSTALL AND SETUP ENVIROMENT DEPENDENCIES
# RUN apt-get update && apt-get install -y \
#     git \
#     curl \
#     libpng-dev \
#     libonig-dev \
#     libxml2-dev \
#     zip \
#     unzip \
#     libpq-dev \
#     nginx

# RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd sockets
# RUN apt-get clean && rm -rf /var/lib/apt/lists/*
# COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
# COPY ./docker/nginx/laravel.conf /etc/nginx/nginx.conf

# ## SETUP APPLICATION CODE AND DEPENDENCIES
# COPY . .
# RUN composer install --no-dev

# ## CONTAINER STARTUP SETTINGS
# EXPOSE 10000

# CMD ["sh", "-c", "php-fpm & nginx -g 'daemon off;'"]