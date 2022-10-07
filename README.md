# Patient App

Application that records json file for patient records. Transactions are done with endpoints. 

## Technical 

- [Laravel 9](https://laravel.com/docs/9.x)
- [Heroku](https://www.heroku.com/)

## Features

-  Patient add on medical, kin, people, patient. 
-  list, create, update, delete, get, import endpoints
-  User add on users table.
-  Patient.json import.

Patient, Medical, Kin, Person User model actions is done with service-repository pattern.

## Installation

Patient App requires [Docker](https://www.docker.com/) to run.

Install the dependencies and devDependencies and start the server.

```sh
cd patient-app
sail up -d OR docker-compose up -d
```

Database migration...

```sh
sail artisan migrate
```

[For Heroku actions](https://devcenter.heroku.com/articles/git)

## ENV or HEROKU Config Vars

```
APP_DEBUG = true
APP_ENV = production
APP_KEY = ***
APP_NAME = ***
APP_URL = http://localhost or heroku url

DATABASE_URL = heroku db url
DB_CONNECTION = pqsql
DB_DATABASE = your database
DB_HOST = your db host
DB_PASSWORD = your db pass
DB_PORT = your db port
DB_USERNAME = your db username

```
