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

	// Route::resource('/results', 'ResultsController');
	Route::get('/results/all/events', 'ResultsController@showAllEvents')->name('results.all'); // to show all current events for the judge, found in nav.manage.blade.php
	Route::get('/results/event/groups/judge-area/{eventId}', 'ResultsController@index')->name('results.index'); // to show all application regarding an event for the judge
	Route::get('/results/event/classes/judge-area/{eventId}/{groupId}', 'ResultsController@showClasses')->name('results.classes'); // to show all classes inside a group for event for the judge
	Route::get('/results/event/participate/dogs', 'ResultsController@participate')->name('results.participate'); // to show all application regarding an event for the judge
	Route::get('/results/create/judgement/{dogInShowId}', 'ResultsController@create')->name('results.create'); // create a form of the dog information so the judge can rate the dog
	Route::post('/results', 'ResultsController@store')->name('results.store');

	// second Round
	Route::get('/results/event/second/round/sex/choose/{eventId}/{groupId}', 'ResultsController@chooseSex')->name('results.chooseSex'); // to show sex of the second round
	Route::get('/results/event/second/round/judge-area', 'ResultsController@showSecondRound')->name('results.secondRound'); // to show all the winner dogs of the first round
	Route::get('/results/create/second/round/judgement/{showEntriesId}/{resultId}', 'ResultsController@createSecondRound')->name('results.createSecond'); // create a form of the dog information so the judge can rate the dog
	Route::put('/results/second/round/{id}', 'ResultsController@storeSecondRound')->name('results.storeSecondRound'); //update the record

	//Third Round
	Route::get('/results/event/third/round/judge-area/{eventId}/{groupId}', 'ResultsController@showThirdRound')->name('results.thirdRound'); // to show all the winner dogs of the first round
	Route::get('/results/create/third/round/judgement/{showEntriesId}/{resultId}', 'ResultsController@createThirdRound')->name('results.createThird');
	Route::put('/results/third/round/{id}', 'ResultsController@storeThirdRound')->name('results.storeThirdRound'); //update the record

	// Final Round
	Route::get('/results/event/final/round/judge-area/{eventId}', 'ResultsController@showFinalRound')->name('results.finalRound'); // to show all the winner dogs of the first round
	Route::get('/results/create/final/round/judgement/{showEntriesId}/{resultId}', 'ResultsController@createFinalRound')->name('results.createFinal');
	Route::put('/results/final/round/{id}', 'ResultsController@storeFinalRound')->name('results.storeFinalRound'); //update the record

	Route::get('/results/all/show', 'ManageController@showAll')->name('results.showAll'); //update the record

	Route::resource('/entries', 'ShowEntriesController', ['except' => 'show']);
	Route::get('/entries/add/{event}', 'ShowEntriesController@applyToEvent')->name('apply.event'); //found in manage.entries.index.blade.php the apply button in the
	Route::post('entries/dynamic_dependent/fetch', 'ShowEntriesController@fetch')->name('dynamicdependent.fetch');
	Route::get('/show/application', 'ShowEntriesController@showApplications')->name('entries.application'); // found in nav.manage.blade.php the all applicaion link
	Route::get('/show/all/application', 'ShowEntriesController@showAllApplications')->name('entries.all.application'); // found in nav.manage.blade.php the manage all applicaion link
});

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');
