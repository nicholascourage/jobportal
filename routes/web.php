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

// jobs

Route::get('/', 'JobController@index');

Route::get('/jobs/create', 'JobController@create')->name('job.create');

Route::post('/jobs/create', 'JobController@store')->name('job.store');

Route::get('/jobs/{id}/edit', 'JobController@edit')->name('job.edit');

Route::post('/jobs/{id}/edit', 'JobController@update')->name('job.update');

Route::get('/jobs/applications', 'JobController@applicant')->name('applicant');

Route::get('/jobs/my-job', 'JobController@myjob')->name('my.job');

Route::get('/jobs/alljobs', 'JobController@allJobs')->name('alljobs');

//Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/jobs/{id}/{job}', 'JobController@show')->name('jobs.show');

//Company

Route::get('/company/{id}/{company}', 'CompanyController@index')->name('company.index');

Route::get('/company/create', 'CompanyController@create')->name('company.view');

Route::post('company/create', 'CompanyController@store')->name('company.store');

Route::post('company/coverphoto', 'CompanyController@coverPhoto')->name('cover.photo');

Route::post('company/logo', 'CompanyController@companyLogo')->name('company.logo');

//Users
Route::get('user/profile', 'UserController@index')->name('user.profile');

Route::post('user/profile/create', 'UserController@store')->name('profile.create');

Route::post('user/coverletter', 'UserController@coverletter')->name('cover.letter');

Route::post('user/resume', 'UserController@resume')->name('resume');

Route::post('user/avatar', 'UserController@avatar')->name('avatar');

//Employer View
Route::view('employer/register', 'auth.employer-register')->name('employer.register');

Route::post('employer/register', 'EmployerRegisterController@employerRegister')->name('emp.register');


Route::post('/applications/{id}', 'JobController@apply')->name('apply');

// Save and unsave jobs

Route::post('/save/{id}', 'FavouriteController@saveJob');

Route::post('/unsave/{id}', 'FavouriteController@unSaveJob');


//Search

Route::get('jobs/search', 'JobController@searchJobs');

// email

Route::post('/job/mail', 'EmailController@send')->name('mail');

//Admin
Route::get('/dashboard', 'DashboardController@index')->middleware('admin');

Route::get('/dashboard/create', 'DashboardController@create')->middleware('admin');

Route::post('/dashboard/create', 'DashboardController@store')->name('post.store')->middleware('admin');

Route::post('/dashboard/destroy', 'DashboardController@destroy')->name('post.delete')->middleware('admin');
