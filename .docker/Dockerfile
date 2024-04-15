FROM php:8.3-fpm

ENV LANG=C.UTF-8

COPY ./config/php/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

# Домашний каталог контейнера
WORKDIR /var/www

RUN apt-get update && apt-get upgrade -y \
    && apt-get install apt-utils -y

RUN apt-get update && apt-get install -y \
    build-essential \
    libwebp-dev libjpeg62-turbo-dev libpng-dev libxpm-dev libzip-dev libpq-dev libgmp-dev libffi-dev libssl-dev \
    libfreetype6 libfreetype6-dev \
    locales \
    nano \
    zip unzip \
    git \
    curl

RUN docker-php-ext-install opcache

# Установка composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Чистим файлы
RUN docker-php-source delete
RUN apt-get autoremove --purge -y && apt-get autoclean -y && apt-get clean -y

# Настройка пользователя для работы контейнера и взаимодействия прав
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

USER www
