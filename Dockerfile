FROM php:8.4-cli

# Dependencias e extensões PHP
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copia os arquivos para dentro do container
WORKDIR /var/www/html
COPY . .

# Instala dependências do Composer
RUN composer install --no-dev --optimize-autoloader

# Roda as migrations
CMD php artisan migrate

# Inicia a aplicação
EXPOSE 8000
CMD php artisan serve --host=0.0.0.0 --port=8000
