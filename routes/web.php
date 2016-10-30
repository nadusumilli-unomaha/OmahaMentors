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
	Route::resource('users','UserController',['only'=>'create']);
	Route::resource('users','UserController',['only'=>'destroy']);
	Route::resource('users','UserController',['only'=>'store']);
	Route::resource('students','StudentController',['only'=>'destroy']);
	Route::resource('grades','GradeController',['only'=>'destroy']);
	Route::resource('visits','VisitController',['only'=>'destroy']);
});

//############################################################################
//The below are the routes that are only accessible by the Admin and Employee.
//############################################################################
Route::group(['middleware' => 'roles', 'roles'=>['Admin', 'Employee']], function()
{
	Route::resource('users','UserController',['only'=>'edit']);
	Route::resource('users','UserController',['only'=>'update']);
	Route::resource('students','StudentController',['only'=>'create']);
	Route::resource('students','StudentController',['only'=>'store']);
	Route::resource('students','StudentController',['only'=>'edit']);
	Route::resource('students','StudentController',['only'=>'update']);
	Route::resource('grades','GradeController',['only'=>'create']);
	Route::resource('grades','GradeController',['only'=>'store']);
	Route::resource('grades','GradeController',['only'=>'edit']);
	Route::resource('grades','GradeController',['only'=>'update']);
	Route::resource('visits','VisitController',['only'=>'create']);
	Route::resource('visits','VisitController',['only'=>'store']);
	Route::resource('visits','VisitController',['only'=>'edit']);
	Route::resource('visits','VisitController',['only'=>'update']);
});

//###################################################################################
//The below are the routes that are only accessible by the Admin, Employee and Mentor.
//###################################################################################
Route::group(['middleware' => 'roles', 'roles'=>['Admin', 'Employee', 'Mentor']], function()
{
	Route::get('/home', 'HomeController@index');
	Route::get('resetPassword', 'HomeController@resetPassword');
	Route::post('updatePassword', 'HomeController@updatePassword');
	Route::resource('students','StudentController',['only'=>'index']);
	Route::resource('students','StudentController',['only'=>'show']);
	Route::resource('grades','GradeController',['only'=>'index']);
	Route::resource('grades','GradeController',['only'=>'show']);
	Route::resource('visits','VisitController',['only'=>'index']);
	Route::resource('visits','VisitController',['only'=>'show']);
	Route::resource('notes','NoteController');
	Route::resource('notifications','NotificationController');
	//The below is how we can restrict access to defenitive users. Create a group and define access.
	Route::resource('users','UserController',['only'=>'show']);
});

//###################################################################################################################
//The below are the routes that are only accessible by anyone on the website but they have to authenticated to do so.
//###################################################################################################################
Route::get('/afterLogin', 'HomeController@afterLogin');

//#######################################################################################
//This is the Route to sent a mail and is only accessible when called.
//#######################################################################################
Route::post('/sendmail', function (\Illuminate\Http\Request $request, \Illuminate\Mail\Mailer $mailer) {
	$mailer
		->to($request->input('email'))
		->send(new \App\Mail\Notify($request->input('messages')));
	return redirect()->back();
})->name('sendmail');

Route::get('/generatePDF/{id}','PDFController@generatePDF');
Route::get('/PDF', 'PDFController@index');
Route::resource('PDF','PDFController',['only'=>'show']);
Route::get('/getImport', 'ExcelController@getImport');
Route::post('/postImport', 'ExcelController@postImport');
Route::get('/getExport', 'ExcelController@getExport');


//#######################################################################################
//Wildcard Route is all the random routes that can throw an error in the web application.
//#######################################################################################
Route::get('/{any}', function ($any) {
	return redirect('/');
})->where('any', '.*');