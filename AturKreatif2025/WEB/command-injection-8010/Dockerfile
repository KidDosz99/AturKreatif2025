FROM php:8.2-apache

# Install ping and other basic tools
RUN apt-get update && apt-get install -y iputils-ping

# Copy all files into a cleaner subdirectory (to make 'ls' less obvious)
COPY . /var/www/html/app

# Set Apache DocumentRoot to /var/www/html/app
RUN sed -i 's|/var/www/html|/var/www/html/app|g' /etc/apache2/sites-available/000-default.conf

# Add a fake user line to /etc/passwd with the flag
RUN echo 'delivery:x:9999:9999:CTF Flag:/nonexistent:/bin/false # AKCTF25{c0mm4nd_1nj3ct!on_b3g!ns_n0w}' >> /etc/passwd

# Enable mod_rewrite
RUN a2enmod rewrite
