FROM ctftraining/base_image_nginx_php_56

COPY ./files /var/www/
RUN chown -R www-data:www-data /var/www/ &&\
	/bin/echo $FLAG > /var/www/html/flag
