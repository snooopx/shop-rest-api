# shop-rest-api

## Requirements
php 7.2<br >
laravel 5.7<br >
PostgreSQL 10.5<br >

## Installation

clone repo,<br >
run composer install,<br >
update .env file with your DB credentials,<br >
run php artisan migrate<br >
test with bellow endpoints in your preferred tool

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
(POST)<api.loc>/api/size<br >
params: <br >
    name
#### update
(PUT)<api.loc>/api/size/[id]<br >
params: <br >
    name
#### delete
(DELETE)<api.loc>/api/size/[id]
#### read
(GET)<api.loc>/api/size/[id]
#### read all
(GET)<api.loc>/api/size

### Brands
#### create
(POST)<api.loc>/api/brands<br >
params: <br >
    name<br >
    website(optional)
#### update
(PUT)<api.loc>/api/brands/[id]<br >
params: <br >
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
(POST)<api.loc>/api/category<br >
params: <br >
    name<br >
    parent_id(optional)
#### update
(PUT)<api.loc>/api/category/[id]<br >
params: <br >
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
(POST)<api.loc>/api/product<br >
params: <br >
    upc<br >
    name<br >
    brand_id<br >
    size_id<br >
    category_id<br >
    sub_cat_id(optional)<br >
    description(optional)<br >
    count(optional)<br >
#### update
(PUT)<api.loc>/api/product/[id]<br >
params: <br >
    upc<br >
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