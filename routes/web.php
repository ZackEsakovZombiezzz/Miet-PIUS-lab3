<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/api/docs/swagger.json', function () {
    $openapi = \OpenApi\scan(app_path('Http/Controllers/Api'));
    return $openapi->toJson();
});
Route::get('/', function () {
    return view('welcome');
});
