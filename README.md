# Time To Buy
A free app for current and historical foreign exchange rates published by the [European Central Bank](https://exchangeratesapi.io/) developed using the [Symfony PHP Framework](https://symfony.com/doc/current/index.html).

## Features
- An API endpoit at /api where is possible to manage users and groups powered by [API Platform](https://api-platform.com/).
- An ADMIN endpoint where administrators can manage users and groups powered by [EasyAdmin](https://symfony.com/doc/current/bundles/EasyAdminBundle/index.html).
- A DASHBOARD prototype where will be possible to normal users view historical foreign exchange rates published by the [European Central Bank](https://exchangeratesapi.io/) #wip.

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
docker-compose run --rm php php bin/console doctrine:database:migrate
docker-compose run --rm php php bin/console doctrine:fixtures:load
```
4. Browser [//localhost:8000](//localhost:8000)

### Credits
_Icon by [Icons8](https://icons8.com)_
