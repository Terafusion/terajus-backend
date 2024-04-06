FROM php:8.1-fpm
WORKDIR /var/www

## INSTALL AND SETUP ENVIROMENT DEPENDENCIES
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    libpq-dev \
    nginx

RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd sockets
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY ./docker/nginx/laravel.conf /etc/nginx/nginx.conf

## SETUP APPLICATION CODE AND DEPENDENCIES
COPY . .
RUN composer install --no-dev

## CONTAINER STARTUP SETTINGS
EXPOSE 9001

CMD ["sh", "-c", "php-fpm & nginx -g 'daemon off;'"]