FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    nginx git curl zip unzip \
    libpng-dev libonig-dev libxml2-dev libpq-dev \
    && curl -fsSL https://deb.nodesource.com/setup_22.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY package*.json ./
RUN npm install

COPY . .
RUN npm run build

RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data /var/www \
    && chmod -R 775 storage bootstrap/cache

COPY docker/nginx.conf /etc/nginx/sites-available/default

EXPOSE 8000

CMD php artisan migrate --force \
    && php artisan config:cache \
    && php artisan route:cache \
    && php-fpm -D \
    && nginx -g 'daemon off;'