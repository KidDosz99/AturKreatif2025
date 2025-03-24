#!/bin/bash

# Generate Dockerfile
cat <<EOF > Dockerfile
FROM php:8.2-apache

COPY . /var/www/html/

RUN a2enmod rewrite
EOF

# Generate docker-compose.yml
cat <<EOF > docker-compose.yml
version: "3"
services:
  web:
    build: .
    container_name: xss_easy_container
    ports:
      - "8007:80"
EOF

# Build and run
docker-compose up --build -d

echo "✅ xss_easy is running at http://localhost:8007"

