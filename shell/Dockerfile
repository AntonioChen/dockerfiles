FROM ctftraining/base_image_nginx_php_56

COPY ./files /var/www/
ENV FLAG 111111
RUN chown -R www-data:www-data /var/www/ &&\
	/bin/echo $FLAG > /var/www/html/flag

