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

# copy into web doc root
COPY . /var/www

WORKDIR /var/www

# install composer, composer deps
COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

RUN composer install

# install nodejs, dependencies
RUN npm install
RUN npm run dev
