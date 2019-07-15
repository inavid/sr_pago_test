# SR. PAGO TEST

## Description
This project has been made to complete the sr pago test the tools and programming languages used has been:

* PHP 7 with laravel framework
* Javascript ES6 features with React
* Bootstrap 4 for react


## Requirements 
* You need to have docker installed
* You need to have nvm installed or npm version 10.0.0
* You need to have composer installed in your computer

## Steps to install

1.- Go to docker folder and exec

```bash
docker-compose up --build -d
```

* If you need to exec any command with artisan you can use artisan.sh file in this folder for example:

 ```bash
./artisan.sh makeController [controller name]
```

2.- Backend config

Do a copy of .env.example file to .env file and check that the mysql configuration is using the docker variables for mysql:

* DB_CONNECTION=mysql
* DB_HOST=database
* DB_PORT=3306
* DB_DATABASE=sr_pago_test
* DB_USERNAME=laravel
* DB_PASSWORD=secret

Go to backend folder and exec: 

```bash
composer install
```

This command is gonna build the mysql database structure needed and read the postal codes txt file to feed sepomex table, this seed is gonna take kind of 5 minutes to finish because the file is too large, dont worry this is gonna be only the first time you install the project

```bash
./artisan.sh migrate:fresh --seed
```

3.- Frontend (only to modify the frontend project)

Go to root of frontend folder and exec:

```bash
nvm install && nvm use
```

in case that you dont want to use nvm, the version of npm used with this project is 10.0.0 so you need it to use the frontend 

after that cd into frontend_sr_pago_test and exec:

```bash
npm install && npm start 
```

this is to run a local development environment

if you only want to see it working use the main page of this project

[localhost](http://localhost)