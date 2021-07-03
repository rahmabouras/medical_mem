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
Route::post('login', ['as' => 'login', 'uses' => 'LoginController@do']);

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::group(['middleware' => ['auth']], function () {
    Route::get('getChartsPatient', 'HomeController@getChartsPatient');
    Route::get('getChartsOperation', 'HomeController@getChartsOperation');

    Route::get('/getAllRdv','RendezvousController@indexAjax');
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');
    Route::get('/users', 'UserController@index')->name('users');
//Route::get('/patient/edit/{id}', 'UserController@index')->name('users');
    Route::resource('patient', 'DossiermedicalController');
    Route::get('patient/destroy/{id}', ['as' => 'patient.destroy', 'uses' => 'DossiermedicalController@destroy']);
    Route::resource('consultation', 'ConsultationController');
    Route::get('consultation/destroy/{id}', ['as' => 'consultation.destroy', 'uses' => 'ConsultationController@destroy']);
    Route::get('/search', 'DossiermedicalController@search');
    Route::resource('rendezvous', 'RendezvousController');
    Route::get('rendezvous/destroy/{id}', ['as' => 'rendezvous.destroy', 'uses' => 'RendezvousController@destroy']);
    Route::get('consultation/show/{id}', ['as' => 'consultation.show', 'uses' => 'ConsultationController@show']);
    Route::resource('certificat', 'CertificatController');
    Route::get('certificat/destroy/{id}', ['as' => 'certificat.destroy', 'uses' => 'CertificatController@destroy']);

    Route::resource('antecedent', 'AntecedentController');
    Route::get('antecedent/destroy/{id}', ['as' => 'antecedent.destroy', 'uses' => 'AntecedentController@destroy']);
    Route::resource('diagnostic', 'DiagnosticController');
    Route::get('diagnostic/destroy/{id}', ['as' => 'diagnostic.destroy', 'uses' => 'DiagnosticController@destroy']);
    Route::resource('analyse', 'OperationAnalyseController');
    Route::get('analyse/destroy/{id}', ['as' => 'analyse.destroy', 'uses' => 'OperationAnalyseController@destroy']);
    Route::resource('ordonnance', 'OrdonnanceController');
    Route::get('ordonnance/destroy/{id}', ['as' => 'ordonnance.destroy', 'uses' => 'OrdonnanceController@destroy']);
    Route::get('details','ConsultationController@details')->name('details');

});



