FROM php:7.4-apache
# FROM php:8.1-apache

# PHP 設定ファイル
# COPY php.ini /etc/php.ini
COPY php.ini /usr/local/etc/php/php.ini

# Composerのインストール
RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer

# ミドルウェアインストール
# https://hub.docker.com/_/php/
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    git \
    zip \
    unzip \
    vim \
    libpng-dev \
    libpq-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    wget \
    msmtp \
    msmtp-mta \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install pdo pdo_mysql mysqli \
    # && docker-php-ext-configure imap --with-kerberos --with-imap-ssl \
    # && docker-php-ext-install imap \
    && docker-php-ext-install zip

# Install and enable imagick PECL extensions
# RUN pecl install imagick \
#   && docker-php-ext-enable imagick

# xdebug
RUN pecl install xdebug-3.1.5 && \
    docker-php-ext-enable xdebug

# modRewriteを有効化する
RUN mv /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled
RUN /bin/sh -c a2enmod rewrite

# 必要なモジュールを有効化する
RUN /bin/sh -c a2enmod include

# タイムゾーン設定
RUN ln -sf  /usr/share/zoneinfo/Asia/Tokyo /etc/localtime

# 作業ディレクトリを設定
WORKDIR /var/www/html

# アプリケーションコードをコピー
COPY . /var/www/html/

RUN rm -f /var/www/html/.htaccess

# 一時ディレクトリに .htaccess ファイルをコピー
COPY .htaccess /var/www/html/.htaccess


CMD ["apache2-foreground"]