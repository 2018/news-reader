Simple RSS feed reader for RBC news portal.
Created in PHP with Laravel Framework v5.7.

## Project setup:

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
- Create mysql database (for example "news_reader") and update DB_* property
 in `.env` file.

### Run migrations
`$ php artisan migrate`

### Run seeders
`$ php artisan db:seed`

### Go to the URL of your project.
(for example http//:localhost:80)

### Login to the app
 - user name: `admin`
 - password: `admin`