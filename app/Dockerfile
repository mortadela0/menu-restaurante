# Imagen base con PHP y Apache
FROM php:8.2-apache

# Instalar extensiones necesarias si las hubiera
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copiar todo el proyecto al directorio de Apache
COPY . /var/www/html/

# Cambiar permisos para Apache
RUN chown -R www-data:www-data /var/www/html

# Exponer el puerto 80
EXPOSE 80
