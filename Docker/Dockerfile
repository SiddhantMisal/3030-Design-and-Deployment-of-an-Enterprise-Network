FROM php:8.1-apache

# Install mysqli and enable needed modules
RUN apt-get update && \
    docker-php-ext-install mysqli && \
    a2enmod ssl rewrite

# Copy your Apache config and files
COPY apache/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY apache/ssl /etc/apache2/ssl
COPY web/ /var/www/html

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html
