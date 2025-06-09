FROM php:8.3-apache

RUN apt-get update && apt-get install -y --no-install-recommends \
    iputils-ping \
    && rm -rf /var/lib/apt/lists/*

COPY src/ /var/www/html/