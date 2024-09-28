# Gunakan image resmi PHP 8.2-fpm sebagai basis
FROM php:8.1-fpm-alpine

# Set working directory
WORKDIR /var/www/html

# Install paket tambahan yang dibutuhkan Laravel
RUN apk add --no-cache \
libzip-dev \
libpng-dev \
libjpeg-turbo-dev \
libwebp-dev \
freetype-dev \
libicu-dev \
&& docker-php-ext-install zip pdo_mysql xml ctype curl gd dom cli dev imap mbstring soap bcmath fileinfo pdo tokenizer

# Instal composer
COPY composer.json composer.lock ./
RUN composer install --no-interaction --prefer-dist

# Copy aplikasi Laravel
COPY . .

# Set lingkungan
ENV APP_ENV=production
ENV APP_KEY=base64:YOUR_BASE64_ENCODED_KEY

# Expose port
EXPOSE 9000

# Jalankan PHP-FPM
CMD ["php-fpm"]