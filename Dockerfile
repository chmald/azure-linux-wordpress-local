FROM appsvcorg/wordpress-alpine-php:0.61

COPY app/ $WORDPRESS_HOME/
RUN chown -R www-data:www-data $WORDPRESS_HOME
RUN chmod 777 $WORDPRESS_HOME