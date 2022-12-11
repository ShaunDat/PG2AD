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


Auth::routes();

Route::group(['middleware' => ['auth', 'preventBackHistory']], function (){

    Route::get('/', 'DashboardController@index');

    Route::resource('course', 'CourseController');
    Route::resource('topic', 'TopicController');
    Route::resource('trainers', 'TrainerController');
    Route::get('trainees/get-trainee/{course}', 'TraineeController@getTrainee')->name('get-trainee');
    Route::resource('trainees', 'TraineeController');
    Route::resource('attendances', 'AttendanceController');

    //Course Routine.........
    Route::get('course-routine', function (){
        return view('course_routine.index');
    })->name('course-routine.index');

    //Topic Routine.........
    Route::get('topic-routine', function (){
        return view('topic_routine.index');
    })->name('topic-routine.index');

    //Report................
    Route::get('reports', 'ReportController@index')->name('reports.index');
    Route::post('reports-create', 'ReportController@create')->name('reports.create');

    //Admin profile Routes.....................................
    Route::get('profile', 'UserController@showProfile')->name('profile');
    Route::post('profile', 'UserController@updateProfile')->name('profile');

    //Password Change.......................................
    Route::get('change-password', 'UserController@changePassword')->name('changePassword');
    Route::post('change-password', 'UserController@updatePassword')->name('changePassword');

    //Adminstration...........
    Route::resource('permissions','Adminstration\PermissionController');
    Route::resource('roles','Adminstration\RoleController');
    Route::get('assign-roles/{user}','Adminstration\AssignRoleController@edit')->name('assign-role.edit');
    Route::post('assign-roles/{user}','Adminstration\AssignRoleController@update')->name('assign-role.update');

    Route::resource('index','UserController');

    // User
    Route::resource('users','UserController');

});



