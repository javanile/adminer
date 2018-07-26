## Adminer with autologin
FROM adminer
LABEL MAINTAINER="Francesco Bianco <info@javanile.org>"

COPY autologin.php /var/www/html/plugins-enabled/
COPY php.ini /usr/local/etc/php/conf.d/
