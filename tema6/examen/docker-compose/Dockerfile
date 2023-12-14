#FROM php:8.0-apache
FROM php:8.2-fpm

RUN apt-get update -y && apt-get upgrade -y && apt-get install git libssl-dev -y
RUN pecl install mongodb && docker-php-ext-enable mongodb
RUN echo "extension=mongodb.so" >> /usr/local/etc/php/php.ini

RUN apt install unzip
RUN cd ~
RUN curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php

RUN HASH=`curl -sS https://composer.github.io/installer.sig`
RUN php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install pdo pdo_mysql 
