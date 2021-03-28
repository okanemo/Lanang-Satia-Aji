# How to run code
## required
1. Docker
2. Laravel 8
3. Postman
4. MySql (http://localhost:8081/)

  MySql server : - (kosongin)
  
  MySql username: root
  
  MySql password: secret

## Steps
1. clone repository
2. run _docker-compose up -d_
3. run _docker exec -it php /bin/sh_
4. on /var/www/html # type _php artisan migrate_
5. to run API Endpoint create data to databse on localhost:8080/create (Post method)
