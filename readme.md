## How to setup:

### Clone repository
`$ git clone https://github.com/2018/news-reader.git directoryname`

### Go to the project directory
`$ cd directoryname`

### Update dependencies
`$ composer install`

### Create .env file from .env.example
`$ cp .env.example .env`

### Configuration
- Configure your http server url for project.
- Create mariadb or mysql database for example "news_reader" and
Update DB_* property in `.env` file depending on your database settings.

### Run migrations
$ php artisan migrate

### Run seeders
$ php artisan db:seed

### Go to the URL of your project.
(for example http//:localhost:80)

### Login to app
 - user name: `admin`
 - password: `admin`