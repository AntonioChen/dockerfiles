FROM tiaonmmn/alpine-apache2-php7
LABEL Author="Blaklis"
COPY files/ /tmp/
RUN sed -i "s/display_errors\ =\ On/display_errors\ =\ Off/" /etc/php7/php.ini &&\
    mv /tmp/flag / && mv /tmp/get_flag / &&\
    mv /tmp/app/* /app/public/ &&\
    mkdir /app/public/users/ &&\
    chmod 400 /flag && chmod u+s+x /get_flag &&\
    chown -R apache:apache /app/public/ &&\
    rm -rf /tmp/*
EXPOSE 80
