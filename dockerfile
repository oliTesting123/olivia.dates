
FROM php:7.4-apache

RUN docker-php-ext-install pdo pdo_mysql

RUN a2enmod rewrite

RUN apt-get update && apt-get install -y \
    git \
    unzip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


WORKDIR /var/www/html


COPY . .


RUN composer install


RUN chown -R www-data:www-data storage
RUN chown -R www-data:www-data bootstrap/cache

EXPOSE 8000

# Ejecuta Apache en primer plano
CMD ["apache2-foreground"]
