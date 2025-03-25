#!/bin/bash

# Generate Dockerfile for web (PHP + Apache)
cat <<EOF > Dockerfile
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
EOF

# Generate docker-compose.yml (with MySQL service)
cat <<EOF > docker-compose.yml
version: "3"
services:
  web:
    build: .
    container_name: sqli_ctf_web
    ports:
      - "8004:80"
    depends_on:
      - db
    environment:
      - MYSQL_HOST=db
      - MYSQL_USER=root
      - MYSQL_PASSWORD=root
      - MYSQL_DATABASE=sqli_db

  db:
    image: mysql:5.7
    container_name: sqli_ctf_db
    restart: always
    environment:
      - MYSQL_ROOT_PASSWORD=root
      - MYSQL_DATABASE=sqli_db
    volumes:
      - db_data:/var/lib/mysql
      - ./setup.sql:/docker-entrypoint-initdb.d/setup.sql

volumes:
  db_data:
EOF

# Build and run containers
docker-compose up --build -d

echo "✅ sqli_ctf is running:"
echo "  - Web: http://localhost:8004"
echo "  - MySQL container: sqli_ctf_db"

