Docker-containers
==============

Requiere docker y docker-compose.

```bash
$ docker-compose up
```

Listo y funcionando

Web:

```
http://autoklase.dev
```

Logs:

```
http://autoklase.dev:81
```

Rebuild:

```bash
$ docker-compose build
```

# Helpers

```bash
> $ docker-compose ps
        Name                      Command               State              Ports
        -------------------------------------------------------------------------------------------
        docker_application_1   /bin/bash                        Up
        docker_db_1            /entrypoint.sh mysqld            Up      0.0.0.0:3306->3306/tcp
        docker_elk_1           /usr/bin/supervisord -n -c ...   Up      0.0.0.0:81->80/tcp
        docker_nginx_1         nginx                            Up      443/tcp, 0.0.0.0:80->80/tcp
        docker_php_1           php5-fpm -F                      Up      9000/tcp
```

# Logs

* `logs/nginx`
* `logs/symfony`