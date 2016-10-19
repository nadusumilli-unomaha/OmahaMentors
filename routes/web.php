<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//##################################################################
//The below are the routes that are the welcome page of the website.
//##################################################################
Route::get('/', function () {
    return view('welcome');
});

//####################################################################
//The below are the routes that are the authentication of the website.
//####################################################################
Auth::routes();

//###############################################################
//The below are the routes that are only accessible by the Admin.
//###############################################################
Route::group(['middleware' => 'roles', 'roles'=>'Admin'], function()
{
	Route::resource('users','UserController',['only'=>'index']);
	Route::get('/assign', array('as' => 'users.assign', 'uses' => 'UserController@postAdminAssignRoles'));
	Route::post('assign', [
		'uses' => 'UserController@postAdminAssignRoles',
		'before' => 'guest'
	]);
	Route::resource('users','UserController',['only'=>'destroy']);
});

//############################################################################
//The below are the routes that are only accessible by the Admin and Employee.
//############################################################################
Route::group(['middleware' => 'roles', 'roles'=>['Admin', 'Employee']], function()
{
	Route::resource('users','UserController',['only'=>'create']);
	Route::resource('users','UserController',['only'=>'show']);
});

//###################################################################################
//The below are the routes that are only accessible by the Admin, Employee and Mentor.
//###################################################################################
Route::group(['middleware' => 'roles', 'roles'=>['Admin', 'Employee', 'Mentor']], function()
{
	Route::get('/home', 'HomeController@index');
	Route::get('resetPassword', 'HomeController@resetPassword');
	Route::post('updatePassword', 'HomeController@updatePassword');
	Route::resource('students','StudentController');
	Route::resource('visits','VisitController');
	Route::resource('grades','GradeController');
	Route::resource('notes','NoteController');
	Route::resource('notifications','NotificationController');
	//The below is how we can restrict access to defenitive users. Create a group and define access.
	Route::resource('users','UserController',['only'=>'edit']);
	Route::resource('users','UserController',['only'=>'update']);
});

//###################################################################################################################
//The below are the routes that are only accessible by anyone on the website but they have to authenticated to do so.
//###################################################################################################################
Route::get('/afterLogin', 'HomeController@afterLogin');

//#######################################################################################
//Wildcard Route is all the random routes that can throw an error in the web application.
//#######################################################################################
Route::get('/{any}', function ($any) {
	return redirect('/');
})->where('any', '.*');