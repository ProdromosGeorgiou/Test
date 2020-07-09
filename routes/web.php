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

/*
 * Auth default routes of laravel.
 */
Auth::routes();

/*
 * Default route. The form with the four inputs.
 */
Route::get('/', 'CompanyController@create');

/*
 * Resource controller for companies symbols and dates.
 * The resource controller does not include edit, update and destroy functions.
 */
Route::resource('companies', 'CompanyController')->except(['edit', 'update', 'destroy']);

/*
 * Post Route for fetching the next records which are saved in the database.
 */
//Route::get('companies/fetch', 'CompanyController@fetch')->name('company.fetch');
Route::get('pagination/fetch_data', 'CompanyController@fetch_data');
//Route::group(['middleware'=>['auth']],function(){
//
////    Route::get('/home', 'HomeController@index')->name('home');
//});



