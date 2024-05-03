Docker development environment (PHP, MySQL, NGINX)
==================================================

#### Installation process

```bash
# 1. Build all docker services
./build.sh --all 

# 2. Check the status
./build.sh --status

# 3. Install new project
./build.sh -s mysite.local -h

# See more details about build script
./build.sh --help
```

After than visit Admin Panel http://localhost/ to see new projects available

![Docker development environment](doc/images/adminp.png)

Project structure
----------------
```
apps/
--/default <-- admin panal dir
--/mysite.local <-- custom site dir

nginx/
--/conf.d <-- stores generated nginx .conf files
```

phpMyAdmin
----------

PhpMyAdmin panel has link -> http://localhost:8081/
```
Login: root
Password: secret
```

nginx
-----
```bash
# nginx container SSH
docker exec -it devenv-nginx-container /bin/sh
# restart nginx service 
docker-compose restart nginx-service
# rebuild nginx service to update SSL keys
docker-compose build --no-cache nginx-service
```

php
---
```bash
# php container SSH
docker exec -it devenv-php81-container bash
```

mysql
-----
```bash
# MySQL access from host machine
mysql -h127.0.0.1 -uroot -p [secret]
```

PHP multiversion control
------------------------
By default Admin Panel application use PHP latest version see `./nginx/conf.d/localhost.conf`:
```
    location ~ \.php$ {
        # when using PHP-FPM as a unix socket
        fastcgi_pass phplatest-service:9000;
        ....
    }
```
Where `phplatest-service` is Docker service name see `./docker-compose.yml`.
Take it as example to add new PHP services for each version and don't forget to update appropriate nginx config for your
site `./nginx/conf.d/*`.

Well done.

License
-------

This software is published under the [MIT License](LICENSE.md)

