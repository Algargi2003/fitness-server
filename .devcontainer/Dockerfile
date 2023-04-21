# [Choice] PHP version (use -bullseye variants on local arm64/Apple Silicon): 8, 8.1, 8.0, 7, 7.4, 7.3, 8-bullseye, 8.1-bullseye, 8.0-bullseye, 7-bullseye, 7.4-bullseye, 7.3-bullseye, 8-buster, 8.1-buster, 8.0-buster, 7-buster, 7.4-buster
ARG NODE_VERSION=18
FROM mcr.microsoft.com/vscode/devcontainers/php:8.1

COPY ./ /workspace
ONBUILD RUN sudo chown root:www-data /workspace -R
ONBUILD RUN sudo chmod 770 /workspace -R

# Install MariaDB client
ONBUILD RUN export NODE_OPTIONS=--max_old_space_size=8096
ONBUILD RUN rm /etc/apt/preferences.d/no-debian-php \
    && apt-get update\
    && export DEBIAN_FRONTEND=noninteractive \
    && apt-get install -y x11-apps mariadb-client libpng-dev libxml2-dev libzip-dev php-soap php-gd php-zip nodejs npm\ 
    && apt-get clean -y\
    && rm -rf /var/lib/apt/lists/* \
    && npm i -D @playwright/test

# ONBUILD RUN apt update && apt install -y locales locales-all

# ONBUILD RUN npm install -g n && npm install -g npm@latest && n stable && sudo npm install -g eslint --unsafe-perm=true --allow-root


# Install php-mysql driver
ONBUILD RUN docker-php-ext-install mysqli pdo pdo_mysql soap gd zip pcntl

ONBUILD RUN yes no | pecl install redis -q

ONBUILD RUN  echo "extension=redis.so" >> /usr/local/etc/php/conf.d/docker-php-ext-redis.ini 

EXPOSE 80
CMD apachectl -D FOREGROUND
