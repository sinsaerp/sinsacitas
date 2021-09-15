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





Route::group(['middleware' => ['guest']], function () {

    Route::get('/','Auth\LoginController@showLoginForm')->name('view.login');
    Route::get('/login','Auth\LoginController@showLoginForm')->name('login');
    Route::get('/registrar','Auth\LoginController@register')->name('register');
    Route::post('/login', 'Auth\LoginController@login')->name('login');


});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    Route::get('citas','ViewController@citas')->name('citas');
    Route::get('eps','ViewController@eps')->name('eps');
    Route::get('especialidades','ViewController@especialidades')->name('especialidades');
    Route::get('medicos','ViewController@medicos')->name('medicos');
    Route::get('tipo-consultas','ViewController@tipoConsultas')->name('tipo-consultas');
    Route::get('horarios','ViewController@horarios')->name('horarios');
    Route::get('historial','ViewController@historial')->name('historial');
    Route::get('perfil','ViewController@perfil')->name('perfil');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');


});

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

