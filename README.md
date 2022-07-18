## Instructions
- ***Install Composer Dependencies***

````
composer install
````

- ***install npm***

````
npm install && npm run dev
````

- ***Set Env Credentials and run migrations***

````
php artisan migrate:fresh --seed
````

- ***Install Laravel passport***

````
php artisan passport:install
````

- ***Link Storage***

````
php artisan storage:link
````

- ***Start Socket server***

````
php artisan websockets:serve
````


- ***run the App***

````
php artisan serve
````

- **Dont't forget to Set app URL in ENV**
