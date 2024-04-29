FROM nginx:stable-alpine

# apline based = ubuntu => apk istead apt
RUN apk update && apk add openssl

RUN rm /etc/nginx/conf.d/default.conf

RUN openssl dhparam -out /etc/ssl/private/dhparam.pem 2048 && \
    openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/self.key -out /etc/ssl/private/self.crt \
      -subj "/C=XX/ST=StateName/L=CityName/O=CompanyName/OU=CompanySectionName/CN=CommonNameOrHostname"
