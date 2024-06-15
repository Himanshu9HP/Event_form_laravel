
# Laravel event form

Event form to save field and value

## Installation

Clone the repository-
```
https://github.com/Himanshu9HP/Event_form_laravel.git
```

Then cd into the folder with this command-
```
cd Event_form_laravel
```

Then do a composer install and update
```
composer install
composer update
```

Then create a environment file using this command-
```
cp .env.example .env
```

Then run key genrate command
```
php artisan key:generate
```

Then edit `.env` file with  credential for  database server.
Then create a database named `event_form_laravel` and then do a database migration using this command-
```
php artisan migrate
```


## Run server

Run server using this command-
```
php artisan serve
```

## Seeder
(optional) Run seeder for default form
```
php artisan make:seeder EventCategoricalDataKeysSeeder
```

