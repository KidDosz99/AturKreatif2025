#!/bin/bash

# Dockerfile
cat <<EOF > Dockerfile
FROM php:8.2-apache

COPY . /var/www/html/

RUN a2enmod rewrite
EOF

# docker-compose.yml
cat <<EOF > docker-compose.yml
version: "3"
services:
  web:
    build: .
    container_name: idor_easy_container
    ports:
      - "8002:80"
EOF

# Run the container
docker-compose up --build -d

echo "✅ IDOR_easy is live at http://localhost:8002"
