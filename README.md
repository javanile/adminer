# javanile/adminer

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
      - 7777:8080
    links: 
      - mysql

  mysql:
    image: mysql:5.7
    environment: 
      - MYSQL_ROOT_PASSWORD=P4$$w0rd
```
