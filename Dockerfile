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

COPY /etc/secrets/oauth-private.key storage/oauth-private.key
COPY /etc/secrets/oauth-public.key storage/oauth-public.key

RUN composer install
RUN php artisan l5-swagger:generate

EXPOSE 10000