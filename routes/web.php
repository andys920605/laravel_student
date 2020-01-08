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


Route::get('/', function () {
    return view('welcome');
});

*/

Route::get('/', 'HomeController@index' );

Route::prefix('board')->group(function(){
    Route::get('/', 'BoardController@getIndex')->name('board.index');
    Route::get('/name', 'BoardController@getName')->name('board.name');
});

//學生成績路由
Route::group(['prefix'=> 'students'],function(){
    Route::get('{student_no}',[
        'as'=>'students',
        'uses'=>'StudentsController@getStudentData'
    ]);

    Route::get('{student_no}/score/{subject?}',[
        'as'=>'students.score',
        'uses'=>'StudentsController@getStudentScore'
    ])->where(['subject'=>'(chinese|english|math)']);
});

