FROM php:8.1.1-fpm-bullseye

RUN apt update && apt install \
    libpq-dev \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    nodejs \
    npm \
    zip \
    unzip --assume-yes

# install php extensions
RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd

# copy php source and configs into web server root
COPY . /var/www

WORKDIR /var/www

# install npm dependencies and build JS
RUN npm install
RUN npm run dev

# copy composer binary, install PHP deps
COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer
RUN composer install

RUN chown -R www-data:www-data /var/www
