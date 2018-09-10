# shop-rest-api

## Requirements
php 7.2
laravel 5.7

## Installation

clone repo,
run composer install
update .env file with your DB credentials
run php artisan migrate

## DB Tables
products <br >
brands<br >
categories<br >
product_categories<br >
sizes<br >
gallery<br >

## API
### Size
#### create
(POST)<api.loc>/api/size
params: 
    name
#### update
(PUT)<api.loc>/api/size/[id]
params: 
    name
#### delete
(DELETE)<api.loc>/api/size/[id]
#### read
(GET)<api.loc>/api/size/[id]
#### read all
(GET)<api.loc>/api/size

### Brands
#### create
(POST)<api.loc>/api/brands
params: 
    name<br >
    website(optional)
####update
(PUT)<api.loc>/api/brands/[id]
params: 
    name<br >
    website(optional)
#### delete
(DELETE)<api.loc>/api/brands/[id]
#### read
(GET)<api.loc>/api/brands/[id]
#### read all
(GET)<api.loc>/api/brands

### Categories
#### create
(POST)<api.loc>/api/category
params: 
    name<br >
    parent_id(optional)
#### update
(PUT)<api.loc>/api/category/[id]
params: 
    name<br >
    parent_id(optional)
#### delete
(DELETE)<api.loc>/api/category/[id]
#### read
(GET)<api.loc>/api/category/[id]
#### read all
(GET)<api.loc>/api/category


### Products
#### create
(POST)<api.loc>/api/product
params: 
    upc<br >
    name<br >
    brand_id<br >
    size_id<br >
    category_id<br >
    sub_cat_id(optional)<br >
    description(optional)<br >
    count(optional)<br >
#### update
(PUT)<api.loc>/api/product/[id]
params: 
    upc
        name<br >
        brand_id<br >
        size_id<br >
        category_id<br >
        sub_cat_id(optional)<br >
        description(optional)<br >
        count(optional)<br >
#### delete
(DELETE)<api.loc>/api/product/[id]
#### read
(GET)<api.loc>/api/product/[id]
#### read all
(GET)<api.loc>/api/product