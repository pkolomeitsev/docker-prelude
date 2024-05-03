FROM php:8.1-fpm

# install sudo, create a non-sudo user
ARG UID
ARG GID
RUN apt update \
    && apt install -y sudo \
    && addgroup --gid $GID phpdev \
    && adduser --uid $UID --gid $GID --disabled-password --gecos "" phpdev \
    && echo 'phpdev ALL=(ALL) NOPASSWD: ALL' >> /etc/sudoers


RUN apt update && apt install -y zlib1g-dev g++ git libicu-dev zip libzip-dev zip \
    && docker-php-ext-install intl opcache pdo pdo_mysql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip

WORKDIR /var/www/apps

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# install symfony cli
RUN curl -1sLf 'https://dl.cloudsmith.io/public/symfony/stable/setup.deb.sh' | bash
RUN apt install symfony-cli

# set non-sudo user user as the default user
USER phpdev
