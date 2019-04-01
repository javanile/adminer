# javanile/adminer

[![StyleCI](https://github.styleci.io/repos/132001150/shield?branch=master)](https://github.styleci.io/repos/132001150)
[![](https://images.microbadger.com/badges/image/javanile/adminer.svg)](https://hub.docker.com/r/javanile/adminer)
[![](https://images.microbadger.com/badges/version/javanile/adminer.svg)](https://hub.docker.com/r/javanile/adminer)

Replace phpMyAdmin with Adminer and you will get a tidier user interface, better support for MySQL features, 
higher performance and more security.

## Use docker-compose.yml

```yaml
version: '3'

services:

  adminer:
    image: javanile/adminer
    environment: 
      - MYSQL_ROOT_PASSWORD=secret
    ports: 
      - 8080:8080
    links: 
      - mysql

  mysql:
    image: mysql:5.7
    environment: 
      - MYSQL_ROOT_PASSWORD=secret
```

## Use command-line

```bash
$ docker run --rm -p 8080:8080 javanile/adminer
```

## TODO

* Support for WordPress environment variables
* Support for MongoDB environment variables
* Support for DB_* environment variables
