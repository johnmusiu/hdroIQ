# HydroIQ Task Management System (Backend)

## Introduction

This a system that can be used to create, assign tasks in a firm.

## Hosted version

Currently, the system is not being hosted.

### Available admins <to sign in to the system>

1. akamanu@hydroiq.com, Password: secret

2. eondiek@hydroiq.com, Password: secret

## Setting up

### Prerequisites

- git and composer installed
- laravel basic knowledge
- a mailtrap account
- optionally have homestead (linux, windows) or valet(mac) installed

### Setting up on local machine

1. Navigate to a directory of your choice, for instance

        cd /var/www

2. Clone the repository

        git clone https://github.com/johnmusiu/hdroIQ

3. cd into the project folder

        cd hydroIQ/

4. Run

        composer install

5. Setup .env file

        cp .env.example .env

6. Generate app key

        php artisan key:gen

7. Setup database in your app.

    If you are on Homestead you only need specify your database name on .env file and update your Homestead.yaml file with the new site configurations.

    Otherwise, setup your local sql server and create the database then update the database username and password on the .env file.

8. Run migrations and seeders

        php artisan migrate --seed

9. Configure mailtrap on your app

10. If not on homestead run

        php artisan serve

    Now visit <http://127.0.0.1:8000> on Postman(below is a collection to get you started) or any other preferred app.
    
    [![Run in Postman](https://run.pstmn.io/button.svg)](https://app.getpostman.com/run-collection/96fa7aac12e4e3d4a6bd)
    
    If on homestead, visit <http://the.url.you.set.on.yaml.file.domain>
    
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Author

John Musiu
