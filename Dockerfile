# Gunakan image resmi PHP 8.2-fpm sebagai basis
FROM php:8.2-fpm-alpine

# Set working directory
WORKDIR /var/www/html

# Install paket tambahan yang dibutuhkan Laravel
RUN apt install php8.1-fpm php8.1-common php8.1-mysql php8.1-xml php8.1-ctype php8.1-curl php8.1-gd php8.1-dom php8.1-cli php8.1-dev php8.1-imap php8.1-mbstring php8.1-soap php8.1-zip php8.1-bcmath php8.1-fileinfo php8.1-pdo php8.1-tokenizer -y

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