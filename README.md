# APPUS

APPUS is a very simple E-Library System make with Laravel 9.

## Requirements
1. PHP 8
2. MySQL Database
3. Composer

For point 1 and 2 you can use XAMPP, LAMPP, MAMPP or similar apps

## Installation
After install all apps need and download this app, Use composer to install dependencies in your terminal and rename file .env.example to .env

```bash
composer install
```
when completed download all dependecies, migrate all database don't forget to make database in MySQL (You can search tutorial in internet) and change config .env file

```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1 # Your Localhost
DB_PORT=3306
DB_DATABASE=laravel # Database Name
DB_USERNAME=root # Database Username
DB_PASSWORD= #Database Password
```
and run migrate

```bash
php artisan migrate --seed
```
and run app

```bash
php artisan serve
```
open in your favorite and type address 127.0.0.1:8000. Login with username admin password admin 127.0.0.1:8000/login

## Usage
You can change all config about this app on .env file to
```php
APP_NAME=APPUS  #Application Name
APP_ALIASES_NAME="E-Library System"  # App Alias name
APP_ADDRESS_1="ZZZZZ YYYYY NNNN MMMM" # First Address
APP_ADDRESS_2="AAA BBBB CCCC DDDDD"  # Second Address
APP_ADDRESS_CITY="Texas" # City App
FINE_DAY=2000  # Fine per Day
APP_YEAR_BEGIN=2018 # Year begin
APP_LEADER="John Doe" # Name librarian
APP_LEADER_NUMBER="1234567890" # Number librarian
APP_LEADER_POSITION="Librarian" # librarion position
APP_INVOICE=PP-UN # For format number in borrow
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)