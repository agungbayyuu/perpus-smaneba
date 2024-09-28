# Gunakan image resmi PHP 8.2-fpm sebagai basis
FROM php:8.2-fpm-alpine

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
    && docker-php-ext-install zip pdo_mysql pdo_pgsql mbstring gd exif

# Instal composer
COPY composer.json composer.lock ./
RUN composer install --no-interaction --prefer-dist

# Copy file konfigurasi PHP (opsional)
COPY php.ini /usr/local/etc/php/

# Copy aplikasi Laravel
COPY . .

# Set lingkungan
ENV APP_ENV=production
ENV APP_KEY=base64:YOUR_BASE64_ENCODED_KEY

# Expose port
EXPOSE 9000

# Jalankan PHP-FPM
CMD ["php-fpm"]