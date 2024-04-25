Docker development environment (PHP, MySQL, NGINX)
==================================================

![Docker development environment](doc/images/adminp.png)

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

Well done.


License
-------

This software is published under the [MIT License](LICENSE.md)

