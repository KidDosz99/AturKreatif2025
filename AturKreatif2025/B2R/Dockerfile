FROM php:8.2-apache

# Install system tools + PHP extensions + privesc tools
RUN apt update && apt install -y python3 curl vim net-tools e2fsprogs gcc && \
    docker-php-ext-install mysqli

# Enable mod_rewrite
RUN a2enmod rewrite

# Copy web app files
COPY web/ /var/www/html/

# Create final flag
RUN echo "AKCTF25{r00t_fr0m_upl04d_sh3ll}" > /root/flag.txt && chmod 400 /root/flag.txt

# Set upload folder
RUN mkdir -p /var/www/html/uploads/files && \
    chown www-data:www-data /var/www/html/uploads/files && \
    chmod 755 /var/www/html/uploads/files

# Allow .htaccess override globally
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Copy SUID exploit binary
COPY rootme /usr/local/bin/rootme
RUN chown root:root /usr/local/bin/rootme && chmod 4755 /usr/local/bin/rootme
