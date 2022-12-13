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

Route::post('inseriscicat', 'StaffController@insertcat')
        ->name('insertcat');

Route::get('inseriscicat', 'StaffController@insertcatform')
        ->name('insertcat');

Route::get('/search', 'PublicController@search1')
        ->name('search1');

Route::get('/selMacCat/{macCatId}/search', 'PublicController@search2')
        ->name('search2');

Route::get('/selMacCat/{macCatId}/selCat/{catId}/search', 'PublicController@search3')
        ->name('search3');

Route::get('/selMacCat/{macCatId}/selCat/{catId}', 'PublicController@showCatalog3')
        ->name('catalog3');

Route::get('showStaffList', 'AdminController@showStaff')
        ->name('listastaff');

Route::post('modificastaff/{id}', 'AdminController@modificaStaff')
        ->name('modificast');

Route::get('modificastaff/{id}', 'AdminController@formModificaS')
        ->name('modificast');

Route::post('eliminastaff', 'AdminController@eliminaStaff')
        ->name('eliminastaff');

Route::post('/inserimentostaff', 'AdminController@inseriscistaff')
        ->name('inserimentostaff');

Route::get('/inserimentostaff', 'AdminController@showformstaff')
        ->name('inserimentostaff');

Route::get('listautenti', 'AdminController@showUsers')
        ->name('listautenti');

Route::post('eliminautenti', 'AdminController@eliminaUtenti')
        ->name('eliminautenti');

Route::get('/admin', 'AdminController@index')
        ->name('admin');

Route::post('eliminaprodotto/{prodId}', 'StaffController@deleteProduct')
        ->name('eliminaprodotto');

Route::get('/showProducts', 'StaffController@showProducts' )
        ->name('showProducts');

Route::post('modificaprodotto/{prodId}', 'StaffController@editProduct')
        ->name('modificaprodotto');

Route::post('confermamodifica/{prodId}', 'StaffController@confermamodifica')
        ->name('confermamodifica');

Route::get('/inserimento', 'StaffController@addProduct')
        ->name('inserimento');

Route::post('/staff/inserimento', 'StaffController@storeProduct')
        ->name('inserimento.store');

Route::get('/staff', 'StaffController@index')
        ->name('staff');

Route::get('modificaprof', 'UserController@modificaprof')
        ->name('modificaprof');

Route::post('modificaprof', 'UserController@showmodificaform');

Route::post('modificaPassword', 'UserController@modificaPass');
 
Route::get('modificaPassword', 'UserController@showPassword')
        ->name('modificaPassword');

Route::get('/selMacCat/{macCatId}', 'PublicController@showCatalog2')
        ->name('catalog2');

Route::get('/', 'PublicController@showCatalog1')
        ->name('home');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')
        ->name('register');

Route::post('register', 'Auth\RegisterController@register');
/* Route::view('/home','welcome')
  ->name('home'); */

Route::get('/user', 'UserController@index')
        ->name('user')->middleware('can:isUser');

Route::get('login', 'Auth\LoginController@showLoginForm')
        ->name('login');

Route::post('login', 'Auth\LoginController@login');

Route::post('logout', 'Auth\LoginController@logout')
        ->name('logout');

Route::view('/where', 'where')
        ->name('where');

Route::view('/who', 'who')
        ->name('who');

Route::view('/privacyPolicy', 'PrivacyPolicy')
        ->name('privacy');

Route::view('/modalitacquisto', 'modacquisto')
        ->name('modalita');

Route::view('/modalitaiscrizione', 'modiscrizione')
        ->name('iscrizione');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
