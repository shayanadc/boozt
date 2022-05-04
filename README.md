# BOOZT


## The .env file is the project environment variable (Don't need to change anything for local development in docker)

### The structure
The integration tests are in tests/ directory.
You can add migration for database in migrations directory
The mvc bootsrap with public/bootstrap.php file
The front end project is implemented with Reactjs
###Endpoints
- get the summary report for orders, customers and revenue:
- ``` /?orders=1&revenue&customers=1&from=2020-01-02&to=2020-05-04 ```


## Installation and Running using docker

1. Navigate to the project root directory and run docker-compose up -d --build
2. Install dependencies - docker-compose exec app composer install
3. Run migrations - docker-compose exec app php migrations.php
4. Run migrations - docker-compose exec app php seeder.php

- Open the project front-end in browser http://127.0.0.1:3000
- Open the project backend-end in browser http://127.0.0.1:8082
