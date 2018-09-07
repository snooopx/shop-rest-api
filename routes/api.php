<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\BrandsController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources([
    'brands' => 'API\BrandsController'
]);

Route::apiResources([
    'size' => 'API\SizeController'
]);

Route::apiResources([
    'category' => 'API\CategoryController'
]);


Route::apiResources([
    'product' => 'API\ProductController'
]);
