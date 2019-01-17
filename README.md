# javanile/adminer

[![](https://images.microbadger.com/badges/image/javanile/adminer.svg)](https://hub.docker.com/r/javanile/adminer)
[![](https://images.microbadger.com/badges/version/javanile/adminer.svg)](https://hub.docker.com/r/javanile/adminer)

Replace phpMyAdmin with Adminer and you will get a tidier user interface, better support for MySQL features, 
higher performance and more security.

## Usage in docker-compose.yml

```yaml
version: '3'

services:

  adminer:
    image: javanile/adminer
    environment: 
      - MYSQL_ROOT_PASSWORD=P4$$w0rd
    ports: 
      - 8080:8080
    links: 
      - mysql

  mysql:
    image: mysql:5.7
    environment: 
      - MYSQL_ROOT_PASSWORD=P4$$w0rd
```


