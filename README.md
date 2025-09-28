# INSTALLATION GUIDE

## Requirements 
Docker </br>
Composer </br>
NPM


1. Copy `.env.example` to `.env`
2. update variables for database values in the .env file
3. run `composer install`
4. run `npm install`
5. run `docker compose up -d`
6. inside the docker container you will need to run `php artisan migrate && php artisan db:seed`

