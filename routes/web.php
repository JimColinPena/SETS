<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
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

Route::get('/', [
    'uses' => 'UserController@getProfile',
    'as' => 'user.profile',
   ]);

Route::get('/calculator', function () {
            return view('dashboard.calculator.index');
        });

Route::post('/calculation', [
                'uses' => 'CalculatorController@index',
                'as' => 'user.calculation',
            ]);

Route::group(['prefix' => 'user'], function(){
    Route::group(['middleware' => 'guest'], function() {
        Route::get('signup', [
                'uses' => 'UserController@getSignup',
                'as' => 'user.signup',
            ]);
        Route::post('signup', [
                'uses' => 'UserController@postSignup',
                'as' => 'user.signup',
            ]);
        Route::get('signin', [
                'uses' => 'UserController@getSignin',
                'as' => 'user.signin',
            ]);
        Route::post('signin', [
                'uses' => 'userController@postSignin',
                'as' => 'user.signin',
            ]);
        });

    Route::group(['middleware' => 'auth'], function() {
        Route::get('profile', [
             'uses' => 'UserController@getProfile',
             'as' => 'user.profile',
            ]);
        Route::get('info', [
             'uses' => 'UserController@getInfo',
             'as' => 'user.info',
            ]);
        Route::get('logout', [
                'uses' => 'UserController@getLogout',
                'as' => 'user.logout',
            ]);
        Route::post('/search',['uses' => 'DictionaryController@search','as' => 'search'] );
        Route::get('notes', [
             'uses' => 'NoteController@index',
             'as' => 'user.notes',
            ]);
        Route::get('createnotes', [
             'uses' => 'NoteController@create',
             'as' => 'user.createnotes',
            ]);
        Route::post('addnotes', [
             'uses' => 'NoteController@store',
             'as' => 'user.addnotes',
            ]);
        Route::get('deletenotes/{id}', [
             'uses' => 'NoteController@delete',
             'as' => 'user.deletenotes',
            ]);

        Route::get('post', [
             'uses' => 'CommentsController@index',
             'as' => 'user.post',
            ]);
        Route::get('createposts', [
             'uses' => 'CommentsController@create',
             'as' => 'user.createposts',
            ]);
        Route::post('addposts', [
             'uses' => 'CommentsController@store',
             'as' => 'user.addposts',
            ]);
        Route::get('deleteposts/{id}', [
             'uses' => 'CommentsController@delete',
             'as' => 'user.deleteposts',
            ]);

        Route::get('subpost/{id}', [
             'uses' => 'CommentsController@subindex',
             'as' => 'user.subpost',
            ]);
        Route::get('createsubposts/{id}', [
             'uses' => 'CommentsController@subcreate',
             'as' => 'user.createsubposts',
            ]);
        Route::post('addsubposts', [
             'uses' => 'CommentsController@substore',
             'as' => 'user.addsubposts',
            ]);
        Route::get('deletesubposts/{id}', [
             'uses' => 'CommentsController@subdelete',
             'as' => 'user.deletesubposts',
            ]);

        });
   });

Route::delete('venues/destroy', ['uses' => 'VenueController@massDestroy', 'as' => 'venues.massDestroy']);
Route::resource('venues', VenueController::class);

Route::get('full-calendar', [EventController::class, 'index']);
Route::post('full-calendar/action', [EventController::class, 'action']);

Route::get('search/index', [
    'uses' => 'DictionaryController@index',
    'as' => 'search.index',
   ]);
Route::get('search/show/{word}', [
    'uses' => 'DictionaryController@show',
    'as' => 'search.show',
   ]);
Route::get('search/back', [
    'uses' => 'DictionaryController@back',
    'as' => 'search.back',
   ]);

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function (){
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('calculator', [
    'uses' => 'CalculatorController@calculator',
    'as' => 'calculator.index',
   ]);
});