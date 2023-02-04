FROM php:8.0.3-fpm-buster

RUN docker-php-ext-install bcmath pdo_mysql

RUN apt-get update
RUN apt-get install -y git zip unzip
  
COPY --from=composer:2.2.5 /usr/bin/composer /usr/bin/composer

COPY --chown=www-data:www-data . /var/www

#RUN chown -R www-data:www-data /var/www
#RUN chmod -R 777 /var/www/storage
RUN chmod -R 755 /var/www/storage
#RUN chmod -R 755 /var/www/storage/logs
#RUN chmod -R 755 /var/www/storage/logs/laravel.log
EXPOSE 9000

