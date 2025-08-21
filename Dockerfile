# Используем официальный образ PHP с Apache
FROM php:8.4-apache

# Устанавливаем рабочую директорию
WORKDIR /app

# Устанавливаем системные зависимости
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql
RUN a2enmod rewrite
# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Копируем файлы приложения
COPY . .
#RUN sudo chmod 777 /app/*
# Удаляем символические ссылки, если они есть, чтобы избежать ошибок
#RUN find public/storage -type l -exec rm -f {} \
#RUN sudo chmod -R 777 storage && sudo chmod -R 777 bootstrap/cache
# Устанавливаем права доступа для Laravel
#RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Открываем порт 80
#EXPOSE 8080
# Запускаем сервер Apache
ENV APACHE_DOCUMENT_ROOT=/app/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
#RUN echo "\
#<Directory ${APACHE_DOCUMENT_ROOT}>\n\
#    AllowOverride All\n\
#    Require all granted\n\
#</Directory>\n\
#" >> /etc/apache2/apache2.conf \

CMD ["apache2-foreground"]
#ENTRYPOINT ["php","artisan","serve"]
