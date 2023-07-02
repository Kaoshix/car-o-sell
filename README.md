# README

Install dependencies.

```shell
composer install
```

Change .env file with your infos.
Exemples : 

```php
DATABASE_URL="mysql://root:root@127.0.0.1:8889/car-o-sell"
DATABASE_URL="mysql://root@127.0.0.1:3306/car-o-sell"
```

Create database.

```shell
php bin/console doctrine:database:create
```

Migration file already there, just migrate datas.

```shell
php bin/console doctrine:migration:migrate
```

Load fixtures.

```shell
php bin/console doctrine:fixtures:load
```

Launch server.

```shell
symfony serve
```
