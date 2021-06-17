FROM php:7.4-fpm

# XDEBUG
RUN pecl install xdebug-3.0.4 \
    && docker-php-ext-enable xdebug

# PHP INI
COPY ./php.ini /usr/local/etc/php/conf.d/00-custom.ini

# LOG PERMISSIONS
RUN chmod a+rwx /var/log