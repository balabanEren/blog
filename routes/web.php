<?php

use Illuminate\Support\Facades\Route;




/*__________
 * Back Router(admin)
 * _______
 * */
Route::get("admin/panel",[
    'as' => 'admin_dasboard',
    'uses' => 'App\Http\Controllers\AdminControl@index',
]);

Route::get("/admin/login",[
    'as' => 'login',
    'uses' => 'App\Http\Controllers\AdminControl@login',
]);

Route::post("/admin/log",[
    'as' => 'login_post',
    'uses' => 'App\Http\Controllers\AdminControl@loginPost',
]);



/*__________
 * Front Router
 * _______
 * */
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

Route::post("/contact",[
    'as'=>'contact_post',
    'uses'=>'App\Http\Controllers\HomepageController@postContact'

]);
