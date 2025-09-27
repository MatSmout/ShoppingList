# Stage 1: Build Stage
FROM node:22 AS builder

# Set working directory
WORKDIR /app

# Copy package.json and package-lock.json
COPY package*.json ./

# Install node modules
RUN npm install

# Copy application code
COPY . .

# Use the official PHP image with the specified version (8.2)
FROM php:8.4-apache

ARG DEBUG

# Set the working directory inside the container
WORKDIR /var/www/html

# Install required dependencies
RUN apt-get update && \
    apt-get install -y \
        libzip-dev \
        unzip \
        libonig-dev \
#        freetype-dev \
#        libjpeg-turbo-dev \
        libpng-dev \
        vim \
        libxml2-dev && \
    docker-php-ext-configure gd && \
#                --with-freetype \
#                --with-jpeg && \
    docker-php-ext-install pdo_mysql zip xml gd && \
    docker-php-ext-enable opcache

# Enable Apache modules
RUN a2enmod rewrite # Add this line to enable the rewrite module

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer  && \
    composer --version


# Copy the application files to the container
COPY . /var/www/html

# If DEBUG set to a value with --build-arg DEBUG=1
RUN if [ -n "$DEBUG" ] ; then \
    pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && cp docker/php/xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    ; fi

# Override webroot to public
COPY docker/apache/sites-enabled/000-default.conf /etc/apache2/sites-enabled/000-default.conf

# Copy these to make sure they exist so composer install can work
COPY composer.json composer.lock /var/www/html/

# Install Laravel dependencies using Composer
RUN composer update #install --no-interaction --optimize-autoloader

# Copy application code from builder stage
COPY --from=builder /app /var/www/html

# Copy the built assets
COPY --from=builder /app/public/build /var/www/html/public/build

# Set the correct permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage
