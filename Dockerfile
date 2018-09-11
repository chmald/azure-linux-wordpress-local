FROM appsvcorg/wordpress-alpine-php:0.61

COPY app/ $WORDPRESS_HOME/
COPY wp-config.php $WORDPRESS_HOME
RUN chown -R www-data:www-data $WORDPRESS_HOME