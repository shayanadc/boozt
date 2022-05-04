# boozt


## The .env file is the project environment variable (Don't need to change anything for local development in docker)

### The structure
The integration tests are in tests/ directory.
You can add migration for database in migrations directory
The mvc bootsrap with public/bootstrap.php file
The fron end project is implemented with Reactjs

# Installation and Running using docker

Navigate to the project root directory and run docker-compose up -d --build
Install dependencies - docker-compose exec app composer install
Run migrations - docker-compose exec app php migrations.php
Run migrations - docker-compose exec app php seeder.php
Open the project front-end in browser http://127.0.0.1:3000
Open the project backend-end in browser http://127.0.0.1:8082
