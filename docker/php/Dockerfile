FROM php:8.2-fpm

# Устанавливаем необходимые зависимости
RUN apt-get update && apt-get install -y \
    curl \
    unzip \

# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Настроим рабочую директорию
WORKDIR /var/www/html

# Обновим права на директории
RUN chown -R www-data:www-data /var/www/html
