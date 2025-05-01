#!/bin/bash

# Buat Dockerfile
cat <<EOF > Dockerfile
FROM php:8.2-apache

COPY . /var/www/html/

RUN a2enmod rewrite
EOF

# Buat docker-compose.yml
cat <<EOF > docker-compose.yml
version: "3"
services:
  web:
    build: .
    container_name: jwt_easy_container
    ports:
      - "8009:80" 
EOF

# Build dan run container
docker-compose up --build -d

echo "✅ jwt_easy is running at http://localhost:8009"
