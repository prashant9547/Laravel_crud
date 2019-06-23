<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('auth.login');
    // return Cache::get('key');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/slider/data','SliderController@sliderList');
Route::resource('/slider', 'SliderController');

Route::get('/newsletter/data','NewsletterController@newsletterList');
Route::resource('/newsletter', 'NewsletterController');

Route::get('/website/data','WebsiteController@websiteList');
Route::resource('/website', 'WebsiteController');

Route::get('/parent_category/data','ParentCategoryController@pcatList');
Route::resource('/parent_category', 'ParentCategoryController');

Route::get('/categories/data','CategoryController@catList');
Route::resource('/categories', 'CategoryController');


Route::get('/subcategories/data','SubCategoryController@subcatList');
Route::resource('/subcategories', 'SubCategoryController');

Route::get('/unit/data','UnitController@unitList');
Route::resource('/unit', 'UnitController');

Route::get('/role/data','RoleController@roleList');
Route::resource('/role', 'RoleController');

Route::get('/contentpage/data','ContentPageController@cpageList');
Route::resource('/contentpage', 'ContentPageController');