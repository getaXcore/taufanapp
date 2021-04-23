<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'v1','middleware' => ['basicAuth']],function ($router){
	Route::post('chkLogin','Erajaya\ErajayaController@cekLogin');
	Route::post('saveLogin','Erajaya\ErajayaController@saveLogin');
	Route::post('changePassword','Erajaya\ErajayaController@changePassword');
	Route::post('addUSer','Erajaya\ErajayaController@addUser');
	Route::get('getAll','Erajaya\ErajayaController@getAllUSer');
	Route::post('delSess','Erajaya\ErajayaController@delSess');
});

Route::get('signin','Erajaya\ErajayaController@index');
Route::get('dashboard','Erajaya\ErajayaController@dashboard');
Route::get('changepass','Erajaya\ErajayaController@changePass');
Route::get('masteruser','Erajaya\ErajayaController@masterUser');


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
