FROM ctftraining/base_image_nginx_php_56

COPY ./files /var/www/
ENV FLAG default_flag
RUN chown -R www-data:www-data /var/www/ 

ENTRYPOINT echo $FLAG > /var/www/html/flag && docker-php-entrypoint
