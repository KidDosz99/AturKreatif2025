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
    container_name: undercover_request_container
    ports:
      - "8005:80"
EOF

# Build and run
docker-compose up --build -d

echo "✅ undercover_request is running at http://localhost:8005"

