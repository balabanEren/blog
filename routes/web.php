<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [
    'as' => 'homepage',
    'uses' => 'App\Http\Controllers\HomepageController@index',
]);

Route::get('/paginateArtical', [
    'as' => 'paginate_article',
    'uses' => 'App\Http\Controllers\HomepageController@index',
]);

Route::get('/category/{slug}', [
    'as' => 'blok_single',
    'uses' => 'App\Http\Controllers\HomepageController@single',
]);

Route::get('/selected_category/{category}', [
    'as' => 'category_name',
    'uses' => 'App\Http\Controllers\HomepageController@category',
]);

Route::get('/page', [
    'as' => 'page',
    'uses' => 'App\Http\Controllers\HomepageController@getPage',
]);
