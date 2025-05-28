# Gunakan image resmi PHP dengan FPM
FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    unzip \
    curl \
    git \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath zip

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Copy aplikasi Laravel ke dalam container
COPY . .

# Install dependencies aplikasi Laravel
RUN composer install --no-dev --optimize-autoloader

# Copy file .env.production ke .env jika disediakan
# RUN cp .env.production .env

# Set permission (gunakan ini jika diperlukan)
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage

# Jalankan artisan commands
RUN php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

# Gunakan server bawaan Laravel (untuk Cloud Run bisa seperti ini)
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=3306"]

EXPOSE 3306
