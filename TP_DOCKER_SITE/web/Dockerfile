# web/Dockerfile
FROM php:8.2-apache

# Installation des extensions PHP requises (PDO, MySQL)
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Activation du mod_rewrite pour Apache (optionnel mais utile)
RUN a2enmod rewrite
