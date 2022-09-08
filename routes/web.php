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

Route::get('/page/contact',[
    'as'=>'contact_page',
    'uses' => 'App\Http\Controllers\HomepageController@contact',
]);

Route::get('/page/{pageName}', [
    'as' => 'page',
    'uses' => 'App\Http\Controllers\HomepageController@getPage',
]);

Route::post("contact",[
    'as'=>'contact_post',
    'uses'=>'App\Http\Controllers\HomepageController@postContact'

]);
