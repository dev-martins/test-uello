FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    zlib1g-dev libzip-dev libpng-dev git curl gnupg && \
    docker-php-ext-install zip pdo pdo_mysql gd && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
    
COPY . /var/www/html 
COPY php.ini /usr/local/etc/php/php.ini
COPY apache.conf /etc/apache2/sites-enabled/000-default.conf
WORKDIR /var/www/html

RUN a2enmod rewrite headers ssl && \
    service apache2 restart

EXPOSE 80