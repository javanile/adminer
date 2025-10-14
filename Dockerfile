## Adminer with autologin
FROM adminer:4.17.1-standalone
LABEL maintainer="Francesco Bianco <info@javanile.org>"

USER	root
RUN apk add --no-cache --virtual .build-deps $PHPIZE_DEPS openssl-dev \
 && pecl install mongodb \
 && docker-php-ext-enable mongodb \
 && apk del .build-deps


#COPY autologin.php /var/www/html/plugins-enabled/
COPY php.ini /usr/local/etc/php/conf.d/

USER	adminer