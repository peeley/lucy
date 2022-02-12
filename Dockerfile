FROM php:8.1.1-apache-bullseye

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
COPY . /var/www/html

WORKDIR /var/www/html

# install npm dependencies and build JS
RUN npm install
RUN npm run dev

# copy composer binary, install PHP deps
COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer
RUN composer install

RUN chmod -R 777 storage/

# modify web server root
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# write updated web server root to apache config files
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# restart apache
RUN a2enmod rewrite
RUN service apache2 restart
