# Laravel-Auth-API

---
is a basic **Auth2** authentication API created with **Laravel** and the **Laravel Sanctum** package. It may come in handy as a scaffolding for a bigger project that also requires authentication. The user credentials and the personal access token (**Bearer Token**) can be stored in any SQL database that is supported by Laravel. 

### Routes:
- **api/sign-up**  
**Fields**: first_name; last_name; email; password; password_confirmation 
- **api/login** <br>
**Fields**: email; password; 
- **api/logout** <br>
(Protected: authorization is required to delete the Bearer Token from the DB)
<br>

## Installation for MySQL

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

Rename **.env.example** file into **.env** and change the database related fields accordingly. The MySQL default would be this:
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
And now you should be ready to start the server:
```bash
php artisan serve
```


Happy coding :)
............................................................................................................................................................................................................................................................................................................................................................................................................................................................................
