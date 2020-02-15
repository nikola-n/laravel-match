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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware(['auth','checkUserRole']);;

Route::get('/admin','AdminController@admin')->name('admin');

Route::get('/admin/teams','AdminController@teams')->name('teams');
Route::post('/admin/teams','AdminController@storeTeam')->name('storeTeam');
Route::get('/admin/teams/show','AdminController@showTeams')->name('showTeams');
Route::get('/admin/teams/edit/{id}','AdminController@editTeams')->name('editTeams');
Route::get('/admin/teams/delete/{id}','AdminController@deleteTeams')->name('deleteTeams');
Route::post('/admin/teams/update/{id}','AdminController@updateTeams')->name('updateTeams');


Route::get('/admin/players','AdminController@players')->name('players');
Route::post('/admin/players','AdminController@storePlayers')->name('storePlayers');
Route::get('/admin/players/show','AdminController@showPlayers')->name('showPlayers');
Route::get('/admin/players/edit/{id}','AdminController@editPlayers')->name('editPlayers');
Route::get('/admin/players/delete/{id}','AdminController@deletePlayers')->name('deletePlayers');
Route::post('/admin/players/update/{id}','AdminController@updatePlayers')->name('updatePlayers');

Route::get('/admin/matches','AdminController@matches')->name('matches');
Route::post('/admin/matches','AdminController@storeMatches')->name('storeMatches');
Route::get('/admin/matches/show','AdminController@showMatches')->name('showMatches');
