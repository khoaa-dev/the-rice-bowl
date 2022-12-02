FROM ubuntu:latest 

RUN export LANG=en_US.UTF-8 \
  && apt-get update \
  && apt-get -y install apache2 

# ENV APACHE_RUN_USER www-data
# ENV APACHE_RUN_GROUP www-data
# ENV APACHE_LOG_DIR /var/log/apache2
# ENV APACHE_PID_FILE /var/run/apache2.pid
# ENV APACHE_RUN_DIR /var/run/apache2
# ENV APACHE_LOCK_DIR /var/lock/apache2
# RUN ln -sf /dev/stdout /var/log/apache2/access.log && \
#     ln -sf /dev/stderr /var/log/apache2/error.log
# RUN mkdir -p $APACHE_RUN_DIR $APACHE_LOCK_DIR $APACHE_LOG_DIR

# RUN apt-get -y install libapache2-mod-php8.1 php8.1 php8.1-cli php-xdebug php8.1-mbstring \
#   sqlite3 php8.1-mysql php-imagick php-memcached php-pear curl imagemagick php8.1-dev \
#   php8.1-phpdbg php8.1-gd npm nodejs-legacy php8.1-json php8.1-curl php8.1-sqlite3 php8.1-intl \
#   apache2 vim git-core wget libsasl2-dev libssl-dev libsslcommon2-dev libcurl4-openssl-dev \
#   autoconf g++ make openssl libssl-dev libcurl4-openssl-dev pkg-config libsasl2-dev libpcre3-dev \
#   && a2enmod headers \
#   && a2enmod rewrite

# RUN curl -sS https://getcomposer.org/installer -o composer-setup.php 
# RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
# RUN curl -sL https://deb.nodesource.com/setup_7.x | bash -
# RUN apt-get install -y nodejs 
# RUN apt-get update && apt-get install git 

# VOLUME [ "/var/www/html" ]
# WORKDIR /var/www/html

# EXPOSE 80

# ENTRYPOINT [ "/usr/sbin/apache2" ]
# CMD ["-D", "FOREGROUND"]

FROM php:8.1.10-fpm

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Install Postgre PDO
RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Set working directory
WORKDIR /var/www

USER $user