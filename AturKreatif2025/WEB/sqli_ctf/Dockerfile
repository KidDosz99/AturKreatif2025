FROM php:8.2-apache

# Install mysqli
RUN docker-php-ext-install mysqli

# Enable mod_rewrite
RUN a2enmod rewrite

# Update Apache config to allow .htaccess
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Copy files into Apache root
COPY . /var/www/html/

RUN a2enmod rewrite
