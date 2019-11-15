# Image to use
FROM php:7.2-apache

ARG USER=karim

# Send le name of the server to apache, it will be used to call our pages
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Some usefull libraries
RUN apt-get update \
    && apt-get install -y --no-install-recommends locales apt-utils git libicu-dev g++ libpng-dev \
    zlib1g-dev \
    libzip-dev  \
    nano \
    unzip

RUN docker-php-ext-configure zip --with-libzip

RUN docker-php-ext-install zip

# locales, always usefull
RUN echo "en_US.UTF-8 UTF-8" > /etc/locale.gen && \
    echo "fr_FR.UTF-8 UTF-8" >> /etc/locale.gen && \
    locale-gen

# Copy the php.ini of the current directory into the container
COPY php.ini /usr/local/etc/php/php.ini

# Download and move composer
RUN curl -sSk https://getcomposer.org/installer | php -- --disable-tls && \
   mv composer.phar /usr/local/bin/composer

# Install some usefull extensions
RUN docker-php-ext-install pdo pdo_mysql

# Create a new user with the same gid/uid as the local
# this will allow files to be created in the container to be granted the same rights
RUN addgroup --system ${USER} --gid 1000 && adduser --system ${USER} --uid 1000 --ingroup ${USER}

WORKDIR /var/www/backend require guzzlehttp/guzzle:~6.0

RUN composer require slim/slim "^3.12"

RUN a2enmod rewrite

# RUN service apache2 restart

# RUN apt-get install --reinstall systemd

# RUN systemctl restart apache2

WORKDIR /var/www/frontend

RUN composer require guzzlehttp/guzzle:~6.0

# The directory that contains the sources (inside the container, the ont at the right side of the docker-compose mapping)
WORKDIR /var/www
