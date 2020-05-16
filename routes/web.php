<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'Controller@index')->name('home');
Route::get('/home', 'Controller@index')->name('home');

//autenticaçao
Auth::routes(['verify' => true]);
Route::get('/logout', 'Auth\LoginController@logout');

//perfil
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::put('/profile_update', 'HomeController@profile_update')->name('profile_update');
Route::delete('/profile_destroy', 'HomeController@profile_destroy')->name('profile_destroy');

//users
Route::patch('/users/{user}/bloquear', 'UsersController@bloquear')->name('users.bloquear');
Route::patch('/users/{user}/TipoUtilizador', 'UsersController@mudarTipoUtilizador')->name('users.mudarTipoUtilizador');
Route::get('/users','UsersController@index')->name('users.index');
Route::get('/users/filter','UsersController@indexFilter')->name('users.indexFilter');

//dados PacketTracer
Route::get('/dadosPacketTracer','DadosController@listarDados')->name('dados.listar');
