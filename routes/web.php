<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'EventController@index');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/events/{event}', 'EventController@show')->middleware('eventshow')->name('events.show');
Route::get('/post/{id}', 'PostController@show')->name('post.post');
Route::post('posts/submit', 'PostController@submit')->name('post.submit');
Route::get('/event/create', 'EventController@create')->name('events.create');
Route::get('/event/myevent', 'EventController@myevents')->name('events.mine');
Route::post('/ev/post', 'EventController@post')->name('events.post');
Route::post('/eve/apply/{id}', 'EventController@apply')->name('events.apply');
Route::get('/even/applicants', 'EventController@applicants')->name('applicants.eve');
Route::get('event/allevents', 'EventController@allevents')->name('allevents');
Route::get('/organization/{organization}', 'OrganizationController@index')->name('organization.index');
Route::get('evens/{id}', 'EventController@showpost')->name('show.post');
Route::get('eventss/pending', 'EventController@pending')->name('pending');
Route::post('/applications/{id}','EventController@apply')->name('apply');
Route::post('/applications/{id}}/{u_id}','EventController@approve')->name('organization.approval');
Route::post('/application/{id}}/{u_id}','EventController@deny')->name('organization.denial');
Route::post('eventsss/delete/{id}','EventController@delete')->name('events.delete');

//volunteer
Route::get('user/profile', 'UserProfileController@index')->middleware('volunteer')->name('profile.create');
Route::post('profile/store', 'UserProfileController@store')->name('profile.store');
Route::post('profile1/store1', 'UserProfileController@store1')->name('profile1.store1');
Route::post('profile/picture', 'UserProfileController@picture')->name('profile.picture');
//organization
Route::view('org/register', 'auth.org-register')->name('organization.registration');
Route::post('organization1/profile1/store', 'OrganizationProfileController@store')->name('organization.store');
Route::get('/org1/create', 'OrganizationController@create')->name('organization.create');
Route::post('/org2/store', 'OrganizationController@store')->name('organization.store1');
Route::post('org/cover', 'OrganizationController@coverphoto')->name('org.cover');
Route::post('org/logo', 'OrganizationController@logo')->name('org.logo');
