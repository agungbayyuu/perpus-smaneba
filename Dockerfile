FROM php:8.0.24-zts-alpine3.16
WORKDIR /var/www/html/perpus-smaneba

RUN apk update 
RUN curl -sS https://getcomposer.org/installer | php -- --version=2.7.9 --install-dir=/usr/local/bin --filename=composer

COPY . .
RUN composer install

CMD ["php","artisan","serve","--host=0.0.0.0"]