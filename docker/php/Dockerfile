# docker/php/Dockerfile

FROM php:8.1-fpm

# Set working directory
WORKDIR /var/www/html/src

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \ 
    bash \
    openssh-server \
    nano

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# # Install Composer dependencies
# COPY composer.json composer.lock /var/www/html/
COPY ../../src/composer.json ../../src/composer.lock* /var/www/html/src/
# RUN composer install --no-dev --prefer-dist --optimize-autoloader

# Install phpdotenv
# RUN composer global require vlucas/phpdotenv
RUN composer require vlucas/phpdotenv
RUN composer dump-autoload

# Modify PHP-FPM pool configuration (www.conf) to pass environment variables
RUN echo "env[MYSQL_USER] = \$MYSQL_USER" >> /usr/local/etc/php-fpm.d/www.conf \
    && echo "env[MYSQL_PASSWORD] = \$MYSQL_PASSWORD" >> /usr/local/etc/php-fpm.d/www.conf \
    && echo "env[MYSQL_DATABASE] = \$MYSQL_DATABASE" >> /usr/local/etc/php-fpm.d/www.conf \
    && echo "env[MYSQL_ROOT_PASSWORD] = \$MYSQL_ROOT_PASSWORD" >> /usr/local/etc/php-fpm.d/www.conf

# Set permissions for /var/www
RUN chown -R www-data:www-data /var/www

# Copy existing application directory contents
# COPY ../../src/ /var/www/html/src/

# Configure PHP to display errors
RUN echo "display_errors=On" >> /usr/local/etc/php/conf.d/docker-php-errors.ini \
    && echo "display_startup_errors=On" >> /usr/local/etc/php/conf.d/docker-php-errors.ini \
    && echo "error_reporting=E_ALL" >> /usr/local/etc/php/conf.d/docker-php-errors.ini

# Copy existing application directory permissions
COPY --chown=www-data:www-data ../../src/ /var/www/html

# Change current user to www
USER www-data

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
