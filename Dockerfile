FROM php:7.0-fpm

#install dependencies
RUN apt-get update -y && apt-get install -y openssl zip unzip git postgresql postgresql-contrib
RUN echo "deb http://ftp.de.debian.org/debian stretch main" >> /etc/apt/sources.list
RUN apt-get update && DEBIAN_FRONTEND=noninteractive apt-get install -y php7.0-pgsql
RUN apt-get install -y libpcre3-dev

# Install Postgre PDO
RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql mbstring

#install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN cd /home && \
    mkdir renzel
WORKDIR /home/renzel/
COPY . /home/renzel
RUN composer install

#run app using port 80
CMD php artisan serve --host=0.0.0.0 --port=88
EXPOSE 88

#