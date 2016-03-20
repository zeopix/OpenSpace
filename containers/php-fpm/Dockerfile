FROM debian:jessie

MAINTAINER Vincent Composieux <vincent.composieux@gmail.com>

RUN apt-get update && apt-get install -y php5-common curl php5-cli php5-fpm php5-mcrypt php5-mysql php5-apcu php5-gd php5-imagick php5-curl php5-intl php5-redis

ADD symfony.ini /etc/php5/fpm/conf.d/
ADD symfony.ini /etc/php5/cli/conf.d/

ADD symfony.pool.conf /etc/php5/fpm/pool.d/

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN usermod -u 1000 www-data

RUN mkdir /var/app && mkdir /var/app/cache && mkdir /var/app/logs && chmod -R 777 /var/app && chown -R www-data /var/app

RUN apt-get -y install php5-dev
RUN pecl install xdebug

ADD debuger.ini /etc/php5/fpm/conf.d/
ADD debuger.ini /etc/php5/cli/conf.d/

RUN apt-get -y install librabbitmq-dev
RUN pecl install amqp

ADD extensions.ini /etc/php5/fpm/conf.d/
ADD extensions.ini /etc/php5/cli/conf.d/

CMD ["php5-fpm", "-F"]

EXPOSE 9000
