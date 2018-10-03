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

// Route::get('/', function () {
//     return view('welcome');
// });

// Home Page
Route::get('/', 'HomeController@index')->name('home');
Route::resource('/event', 'EventsPageController');
Route::resource('/blog', 'BlogPageController');
Route::resource('/gallery', 'GalleryPageController');

Route::resource('comment', 'CommentsController',['only'=>['store']]);

Route::post('comment/create/{post}', 'CommentsController@addPostComment')->name('comment.add');
Route::post('reply/create/{comment}', 'CommentsController@addReplyComment')->name('reply.add');

Auth::routes();
Route::prefix('manage')->group(function(){
	Route::get('/', 'ManageController@index');
	Route::get('/dashboard', 'ManageController@dashboard')->name('manage.dashboard');
	Route::resource('/users', 'UserController');
	Route::resource('/permissions', 'PermissionController', ['except' => 'destroy']);
  	Route::resource('/roles', 'RoleController', ['except' => 'destroy']);
	Route::resource('/posts', 'PostController');
	Route::resource('/events', 'EventsController');
	Route::resource('/galleries', 'GalleriesController');
	Route::resource('/dogs', 'DogsController');
	Route::resource('/groups', 'GroupsController');
	Route::resource('/breeds', 'BreedsController');
	Route::resource('/entries', 'ShowEntriesController', ['except' => 'show']);
	Route::get('/entries/add/{event}', 'ShowEntriesController@applyToEvent')->name('apply.event'); //found in manage.entries.index.blade.php the apply button in the
	Route::get('/show/application', 'ShowEntriesController@showApplications')->name('entries.application'); // found in nav.manage.blade.php the all applicaion link
	Route::get('/show/all/application', 'ShowEntriesController@showAllApplications')->name('entries.all.application'); // found in nav.manage.blade.php the manage all applicaion link
});

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');
