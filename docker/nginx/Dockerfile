FROM nginx:stable-alpine

RUN apk update && apk add openssl

RUN openssl dhparam -out /etc/ssl/private/dhparam.pem 2048 && \
    openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/self.key -out /etc/ssl/private/self.crt \
      -subj "/C=XX/ST=StateName/L=CityName/O=CompanyName/OU=CompanySectionName/CN=CommonNameOrHostname"
