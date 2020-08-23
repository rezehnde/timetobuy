# Time To Buy
A free app for current and historical foreign exchange rates published by the [European Central Bank](https://exchangeratesapi.io/) developed using the [Symfony PHP Framework](https://symfony.com/doc/current/index.html).

## Features
- An API endpoit at /api where is possible to manage users and groups powered by [API Platform](https://api-platform.com/).
- An ADMIN endpoint where administrators can manage users and groups powered by [EasyAdmin](https://symfony.com/doc/current/bundles/EasyAdminBundle/index.html).
- A DASHBOARD prototype where will be possible to normal users view historical foreign exchange rates published by the [European Central Bank](https://exchangeratesapi.io/) #wip.

## Running locally
1. Download the project
```
mkdir timetobuy
cd timetobuy
git init
git remote add origin https://github.com/rezehnde/timetobuy.git
git pull origin master
composer update
```
2. Configure the database into .env file and run:
```
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load
```

_Icon by [Icons8](https://icons8.com)_
