# laravel-project-management-system
BIT Sprint 5. Task: create projects management system based on two relations based entities in MySQL database with authentication.

## Launch 

- Clone repository to `www` folder of AMPPS  
![image](https://user-images.githubusercontent.com/59610142/107220144-ada68f00-6a1a-11eb-8d69-ddbab463d86a.png)  
- Run these commands on terminal:
```
composer install
npm install
cp .env.example .env
php artisan key:generate
```
- Create empty database and configure .env file to connect to database.
- Run this command on terminal:
```
php artisan migrate:refresh --seed 
```
- Enter localhost/sprint5 address to browser
- Register new user or login with  email: admin@example.com/ password: admin123 to see content.
