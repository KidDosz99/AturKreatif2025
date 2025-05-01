#!/bin/bash

# Generate Dockerfile
cat <<EOF > Dockerfile
FROM php:8.2-apache

# Copy flag to secret location OUTSIDE web root
COPY PT_flag.txt /var/www/secret_files/PT_flag.txt

# Copy the rest of the files (except flag) to web root
COPY index.php /var/www/html/
COPY read.php /var/www/html/
COPY documents /var/www/html/documents/
COPY bg.png /var/www/html/

RUN a2enmod rewrite
EOF

# Generate docker-compose.yml
cat <<EOF > docker-compose.yml
version: "3"
services:
  web:
    build: .
    container_name: path_traversal_easy_container
    ports:
      - "8008:80"
EOF

# Clean and build
docker-compose down
docker-compose up --build -d

echo "✅ path_traversal_easy is running at http://localhost:8008"

