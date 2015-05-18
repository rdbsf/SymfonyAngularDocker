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
  wget

# Create required directories
RUN mkdir -p /var/log/supervisor
RUN mkdir -p /etc/nginx
RUN mkdir -p /etc/nginx/sites-enabled
RUN rm /etc/nginx/sites-enabled/default

# Add configuration files
ADD supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Expose volumes
VOLUME ["/var/www", "/etc/nginx/sites-enabled"]

EXPOSE 5000

WORKDIR /var/www

CMD ["/usr/bin/supervisord"]