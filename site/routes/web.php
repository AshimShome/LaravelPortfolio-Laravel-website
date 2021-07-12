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

Route::get('/','homeController@homeIndex');

Route::post('/contact','homeController@contactSend');


Route::get('/course','courseController@coursePage');
Route::get('/project','projectController@projectPage');
Route::get('/policy','policyController@policyPage');
Route::get('/terms','termsController@termsPage');

Route::get('/ContactPage','contactController@ContactPage');





