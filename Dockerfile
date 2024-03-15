# Используем официальный образ Debian Bullseye
FROM debian:bullseye

# Установка необходимых пакетов
RUN apt-get update && apt-get install -y curl \
    vim \
    bash \
    rsync \
    nginx-full \
    php7.4 \
    php7.4-cli \
    php7.4-mbstring \
    php7.4-curl \
    php7.4-xml \
    php7.4-zip \
    php7.4-mysql \
    php7.4-imagick \
    php7.4-memcached \
    php7.4-gd \
    php-pear \
    php-memcache \ 
    php-memcached \
    php-redis \
    php-db \
    redis-server \
    memcached \
    apache2 \
    libapache2-mod-php7.4 \
    mariadb-server \
    mariadb-client \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Копируем конфигурационные файлы
COPY docker/php.ini /etc/php/7.4/apache2/php.ini
COPY docker/apache.conf /etc/apache2/sites-enabled/000-default.conf
COPY docker/default /etc/nginx/sites-available/default
COPY docker/ssl /etc/nginx/sites-available/ssl
COPY sitebrush.sql /tmp/sitebrush.sql
COPY backend /opt/sitebrush.com/backend
COPY public_html /opt/sitebrush.com/public_html

# Удаляем лишний файл
RUN cat /dev/null > /etc/apache2/ports.conf
RUN mkdir -p /opt/sitebrush.com/var && chmod 777 /opt/sitebrush.com/var -R

# Настраиваем Apache
RUN a2enmod php7.4 && a2enmod expires && a2enmod headers && a2enmod rewrite  

# Открываем порты
EXPOSE 80
EXPOSE 443

# Запускаем сервисы и инициализируем базу данных
CMD service mariadb start && service memcached start && service redis-server start && service apache2 start && service nginx start && mysql -u root < /tmp/sitebrush.sql && tail -f /dev/null
