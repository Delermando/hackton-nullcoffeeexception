FROM nginx:1.9.9

MAINTAINER Delermando

RUN apt-get update
RUN apt-get install -y php5
RUN apt-get install -y php5-fpm
RUN apt-get install -y php5-mcrypt
RUN apt-get install -y php5-curl
RUN apt-get install -y php5-gd
RUN apt-get install -y php5-mysql
RUN apt-get install -y php5-cli
RUN apt-get install -y memcached
RUN apt-get install -y php5-memcache

RUN rm -rf /var/lib/apt/lists/*

RUN touch /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

WORKDIR /var/www/html

EXPOSE 80 443

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
