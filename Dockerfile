FROM php:8.1.4-apache-buster
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN apt-get update && apt-get install -y zip libzip-dev libpq-dev libicu-dev cron wget acl curl
RUN docker-php-ext-install sockets zip
RUN docker-php-ext-configure zip
# Install postgresql extensions for PHP
RUN docker-php-ext-install pgsql pdo_pgsql intl
ENV SERVER_NAME walletservice
RUN echo 'ServerName ${SERVER_NAME}' >> /etc/apache2/conf-enabled/servername.conf
RUN echo 'export SERVER_NAME=$SERVER_NAME' >> /etc/apache2/envvars
# Enable apache2 mode rewrite
RUN a2enmod rewrite
RUN echo '<VirtualHost *:80>\n\
    ServerAdmin it@nkey.com.br\n\
    DocumentRoot /var/www/html/public\n\
    HttpProtocolOptions Unsafe\n\
    <Directory /var/www/html/public>\n\
    Options Indexes FollowSymLinks MultiViews\n\
    AllowOverride All\n\
    Order Deny,Allow\n\
    Allow from All\n\
    </Directory>\n\
    ErrorLog ${APACHE_LOG_DIR}/error.log\n\
    LogLevel warn\n\
    CustomLog ${APACHE_LOG_DIR}/access.log combined\n\
    </VirtualHost>' > /etc/apache2/sites-enabled/000-default.conf
RUN ln -sf /dev/stderr /var/log/apache2/error.log
# COPY composer.json ./
# COPY composer.lock ./
# RUN composer install --no-scripts --no-autoloader --no-ansi
# RUN composer dump-autoload --optimize --no-ansi && composer clear-cache --no-ansi
COPY . /var/www/html
WORKDIR /var/www/html
RUN touch .env
EXPOSE 80