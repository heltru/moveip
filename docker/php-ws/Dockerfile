FROM php:7.4-fpm
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libzip-dev \
        libonig-dev \
        libssl-dev \
        pkg-config

RUN pecl install mongodb \
    && docker-php-ext-enable mongodb \
    && docker-php-ext-install mysqli pdo_mysql

RUN docker-php-ext-install -j$(nproc) iconv mbstring mysqli pdo_mysql zip

RUN docker-php-ext-install gd

RUN docker-php-ext-install bcmath

RUN pecl install xdebug && docker-php-ext-enable xdebug

RUN pecl install redis && docker-php-ext-enable redis

#ENTRYPOINT ["/usr/bin/php", "/var/www/moveip.ru", "main.php"]

CMD php /var/www/moveip.ru/main.php