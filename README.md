# Laravel-Auth-API

---
is a simple authentication API created with **Laravel** and the **Laravel Sanctum** package.

### Routes:
- **api/sign-up**  
**Fields**: first_name; last_name; email; password; password_confirmation 
- **api/login** <br>
**Fields**: email; password; 
- **api/logout** <br>
(Protected: autentication required via Bearer Token)
<br>

## Installation

---

Get a clone of this repository:
```bash
git clone https://github.com/noFrontendSolutions/laravel-auth-api
```
Change into the newly created directory and install all dependencies:

```bash
composer install
```

Then log into **MySql** and create a database:

```bash
mysql --user <user> --password <password>
create database <databaseName>;
```

Rename **.env.example** file into **.env** and change the database related fields accordingly. The default would be this:
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD
```
Create **users** and **personal_access_tokens** tables with the following command:
```bash
php artisan migrate
```
And now you should be good to go:
```bash
php artisan serve
```


Happy coding :)
............................................................................................................................................................................................................................................................................................................................................................................................................................................................................
