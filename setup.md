# Setup

 - Setup nginx, mysql, php with docker: `docker-compose build && docker-compose up -d`
 - Create database
 -- Access mysql: `docker-compose exec mysql bash`
 -- Login account: `mysql -u root -p`
 -- Create database: `create database travel_list`
 -- exit mysql: `ctr/command + p + q`
 - Config laravel file `src/.env` with database above
 - Create table and seed: `docker-compose exec php php /var/www/html/artisan migrate:fresh --seed `
 - Access `localhost:9999` to test
