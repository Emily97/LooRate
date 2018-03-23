# LooRate
- Install XAMPP.
- To install this program you must install composer follow the link provided.
```
https://getcomposer.org/
```
- Next open the command line and make sure your in your htdocs directory in xampp.
```js
composer global require "laravel/installer"
```
- Place the project folder into the htdocs folder.
- Edit the .env file to include the database access details - App URL, database, username, password.
- Turn on Apache and MySQL on XAMPP.
- The url to access the the file is
```
http://localhost/loorate/public/
```
- Go to the /loorate file in the file explorer window.
- In a tab in your browser enter the following URL
```
http://localhost/phpmyadmin/
```
- Take the file loorate.sql and import the database.
- To login into the application there are two logins made for different roles such as users and admins.
```
Admin
Email: mary@bloggs.ie       Password: secret

User
Email: joe@bloggs.ie        Password: secret
```
