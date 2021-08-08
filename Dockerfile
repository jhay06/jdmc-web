FROM debian
RUN addgroup lighttpd && useradd -g lighttpd lighttpd
RUN apt-get update -y && apt-get install  nano lighttpd php-cgi php \
        php-ctype openssl unzip php-xml php-json php-xmlreader php-dom -y

RUN lighttpd -f /etc/lighttpd/lighttpd.conf
#RUN service lighttpd start
EXPOSE 80

#CMD ["tail","-f","/dev/null"]