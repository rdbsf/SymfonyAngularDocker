FROM ubuntu:trusty

MAINTAINER Ewan Valentine <ewan@theladbible.com>

RUN apt-get update && \
    apt-get install -y nginx && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

RUN echo "daemon off;" >> /etc/nginx/nginx.conf

# Only use stable sources
RUN rm -rf /etc/apt/sources.list.d/proposed.list

# Install packages
RUN apt-get update
RUN apt-get install -y \
  supervisor \
  curl \
  wget \
  php5-fpm \
  php5-mysql \
  php5-mcrypt \
  php5-gd \
  php5-memcached \
  php5-curl \
  php5-xdebug

RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

# Create required directories
RUN mkdir -p /var/log/supervisor
RUN mkdir -p /etc/nginx
RUN mkdir -p /var/run/php5-fpm
RUN mkdir -p /etc/nginx/sites-enabled
RUN mkdir -p /var/api/cache
RUN mkdir -p /var/api/logs
RUN rm /etc/nginx/sites-enabled/default

# Add configuration files
ADD supervisord.conf /etc/supervisor/conf.d/supervisord.conf
ADD php.ini /etc/php5/fpm/conf.d/40-custom.ini

# Expose volumes
VOLUME ["/var/www", "/etc/nginx/sites-enabled", "/var/api/cache", "/var/api/logs"]

EXPOSE 8008

WORKDIR /var/www

CMD ["/usr/bin/supervisord"]