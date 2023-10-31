# FROM php:7.4-apache
FROM php:8.0.2-apache-buster

RUN docker-php-ext-install pdo pdo_mysql

RUN a2enmod rewrite

RUN apt-get update && apt-get install -y \
    git \
    unzip

# Instala Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN chmod +x /usr/local/bin/composer

WORKDIR /var/www/html

COPY . .
COPY .env.example .env
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
COPY composer.json composer.lock /var/www/html/


RUN chown -R www-data:www-data storage
RUN chown -R www-data:www-data bootstrap/cache

EXPOSE 80

RUN a2ensite 000-default

CMD ["apache2-foreground"]
