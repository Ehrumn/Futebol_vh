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

Route::get('/', 'ControllerFutebol@openHome');

Route::get('home', 'ControllerFutebol@openHome');
Route::get('listplayers', 'ControllerPlayers@listPlayers');
Route::get('insertplayer', 'ControllerPlayers@insertPlayer');
Route::post('setplayer', 'ControllerPlayers@setPlayer');
Route::get('removeplayer/{id}', 'ControllerPlayers@removePlayer');
Route::get('editplayer/{id}', 'ControllerPlayers@editPlayer');
Route::get('exportplayers', 'ControllerPlayers@exportPlayers');
Route::post('updateplayer/{id}', 'ControllerPlayers@updatePlayer');
Route::get('getcepplayer/{cep}', 'ControllerPlayers@getCEPPlayer');

Route::get('listteams', 'ControllerTeams@listTeams');
Route::get('insertteam', 'ControllerTeams@InsertTeam');
Route::post('setteam', 'ControllerTeams@setTeam');
Route::get('removeteam/{id}', 'ControllerTeams@removeTeam');
Route::get('editteam/{id}', 'ControllerTeams@editTeam');
Route::get('exportteams', 'ControllerTeams@exportTeams');
Route::get('getteams', 'ControllerTeams@getTeams');
Route::post('updateteam/{id}', 'ControllerTeams@updateTeam');
Route::get('getcepteam/{cep}', 'ControllerTeams@getCEPTeam');

Route::post('setteamplayer', 'ControllerTeamPlayers@setTeamPlayer');
Route::get('insertteamplayer', 'ControllerTeamPlayers@insertTeamPlayer');
Route::get('getteamplayers/{id}', 'ControllerTeamPlayers@getTeamPlayers');
Route::get('exportteamplayers', 'ControllerTeamPlayers@exportTeamPlayers');
