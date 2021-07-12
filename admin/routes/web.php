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

Route::get('/','homeController@homeIndex')->middleware('loginCheck');
Route::get('/visitor','visitorController@visitorIndex')->middleware('loginCheck');

//admin panal service management
Route::get('/service','serviceController@serviceIndex')->middleware('loginCheck');
Route::get('/servicedata','serviceController@getServiceData')->middleware('loginCheck');
Route::post('/deleteservicedata','serviceController@deleteServiceData')->middleware('loginCheck');
Route::post('/getServiceDetails','serviceController@getServiceDetails')->middleware('loginCheck');
Route::post('/updateServiceData','serviceController@updateServiceData')->middleware('loginCheck');
Route::post('/serviceAdd','serviceController@serviceAdd')->middleware('loginCheck');

//admin panal courses management

Route::get('/courses','coursesController@CoursesIndex')->middleware('loginCheck');
Route::get('/coursesData','coursesController@getCoursesData')->middleware('loginCheck');
Route::post('/deleteCoursesData','coursesController@deleteCoursesData')->middleware('loginCheck');
Route::post('/getcoursesDetails','coursesController@getCoursesDetails')->middleware('loginCheck');
Route::post('/updatecoursesData','coursesController@updateCoursesData')->middleware('loginCheck');
Route::post('/coursesAdd','coursesController@CoursesAdd')->middleware('loginCheck');
Route::post('/detailsCourses','coursesController@detailsCourses')->middleware('loginCheck');


//admin panal project management

Route::get('/Project','projectController@projectIndex')->middleware('loginCheck');
Route::get('/ProjectData','projectController@getProjectData')->middleware('loginCheck');
Route::post('/deleteProjectData','projectController@deleteProjectData')->middleware('loginCheck');
Route::post('/getProjectDetails','projectController@getProjectDetails')->middleware('loginCheck');
Route::post('/updateProjectData','projectController@updateProjectData')->middleware('loginCheck');
Route::post('/ProjectAdd','projectController@AddProject')->middleware('loginCheck');


//admin panal Contact management
Route::get('/Contact','ContactController@ContacttIndex')->middleware('loginCheck');
Route::get('/ContactData','ContactController@getContacttData')->middleware('loginCheck');
Route::post('/ContactDatatDelete','ContactController@ContactDatatDelete')->middleware('loginCheck');

//admin panal review management

Route::get('/review','reviewController@reviewIndex')->middleware('loginCheck');
Route::get('/reviewData','reviewController@getreviewData')->middleware('loginCheck');
Route::post('/deletereviewData','reviewController@deletereviewData')->middleware('loginCheck');
Route::post('/getreviewDetails','reviewController@getreviewDetails')->middleware('loginCheck');
Route::post('/updatereviewData','reviewController@updatereviewData')->middleware('loginCheck');
Route::post('/reviewAdd','reviewController@reviewAdd')->middleware('loginCheck');


//admin panal login management
Route::get('/login','loginController@loginIndex');
Route::post('/onLogin','loginController@onLogin');
Route::get('/logout','loginController@onLogout');




// Admin Photo Gallery
Route::get('/Photo', 'PhotoController@PhotoIndex')->middleware('loginCheck');
Route::post('/PhotoUpload', 'PhotoController@PhotoUpload')->middleware('loginCheck');
Route::get('/PhotoJSON', 'PhotoController@PhotoJSON')->middleware('loginCheck');
Route::get('/PhotoJSONByID/{id}', 'PhotoController@PhotoJSONByID')->middleware('loginCheck');
Route::post('/PhotoDelete', 'PhotoController@PhotoDelete')->middleware('loginCheck');
Route::post('/getPhotoDetails','PhotoController@getPhotoDetails')->middleware('loginCheck');





