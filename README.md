# Time To Buy
A free app for current and historical foreign exchange rates published by the [European Central Bank](https://exchangeratesapi.io/) developed using the [Symfony PHP Framework](https://symfony.com/doc/current/index.html).

## Features
- An API endpoit at /api where is possible to manage users and groups powered by [API Platform](https://api-platform.com/).
- An ADMIN endpoint where administrators can manage users and groups powered by [EasyAdmin](https://symfony.com/doc/current/bundles/EasyAdminBundle/index.html).
- A DASHBOARD where is possible see a chart with historical foreign exchange rates information published by the [European Central Bank](https://exchangeratesapi.io/)

## UML Diagrams
- [Database ER](https://app.lucidchart.com/documents/view/fab19c66-dac6-4593-8c3e-db541dd7c595)
- [Domain Model](https://app.lucidchart.com/documents/view/cf232d10-2eb4-46f1-ae75-574167070460)

## Running locally
1. Download the project
2. Configure the database into .env file and run:
3. Run the commands bellow
```
mkdir timetobuy
cd timetobuy
git init
git remote add origin https://github.com/rezehnde/timetobuy.git
git pull origin master
docker-compose up -d --build
docker-compose run --rm composer update
docker-compose run --rm php php bin/console doctrine:database:create
docker-compose run --rm php php bin/console doctrine:migrations:migrate
docker-compose run --rm php php bin/console doctrine:fixtures:load
```
4. Browser [//localhost:8000](//localhost:8000)

### Build with
- [API Platform](https://api-platform.com/)
- [ExchangeRatesAPI](https://github.com/benmajor/ExchangeRatesAPI)
- [EasyAdmin](https://github.com/EasyCorp/EasyAdminBundle)
- [Docker](https://www.docker.com/)

### Credits
_Icon by [Icons8](https://icons8.com)_
