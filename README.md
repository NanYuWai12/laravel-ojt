#Laravel OJT CRUD

##project setup
```
composer create-project laravel/laravel laravel-ojt-crud
```
###Create table 
```
php artisan make:migration create_products_table --create=products
```
###Create Migration
```
php artisan migrate
```
###Add Controller and Model
```
php artisan make:controller ProductController --resource --model=Product
```
###Run Laravel App
```
php artisan serve
```

###project url
```
http://localhost:8000/products
```

