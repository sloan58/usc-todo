<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
 * Route Model Binding
 */
Route::model('todos', 'App\Todo');
Route::model('projects', 'App\Project');

/*
 * The home page
 */
Route::get('/', [
    'as' => 'home',
    'uses' =>'PagesController@home'
]);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/*
 *  Project Routes
 */
Route::resource('projects', 'ProjectController');

/*
 * Nested Todos Routes
 */
Route::resource('projects.todos', 'TodosController');

/*
 * Get all Todos
 */
Route::get('/todos/all', [
    'as' => 'todos.all',
    'uses' => 'TodosController@all'
]);