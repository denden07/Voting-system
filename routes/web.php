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

Route::get('/', function () {
    return view('layouts.login');
});

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Auth::routes();



//Admin

Route::group(['middleware'=>'admin'],function (){

    Route::get('/home', 'AdminEvent@landing')->name('home');

    Route::get('/admin',function (){
        return view('admin.index');
    });

    Route::resource('admin/judge','JudgeController',['names'=>[
        'index'=>'admin.judge.index',
        'store'=>'admin.judge.store',
        'edit'=>'admin.judge.edit',
    ]]);

    Route::resource('admin/event','AdminEvent',['names'=>[
        'index'=>'admin.event.index',
        'create'=>'admin.event.create',
        'store'=>'admin.event.store',
        'edit'=>'admin.event.edit',
    ]]);


    Route::get('admin/landing','AdminEvent@landing')->name('admin.landing');
    Route::get('/admin/active/{event_id}','HomeAdmin@homeWithId')->name('admin.index');

    Route::get('admin/judge/create/{event_id}','JudgeController@create')->name('admin.judge.create');
    Route::post('admin/judge/save/{event_id}','JudgeController@inputJudge')->name('admin.judge.save');

    Route::get('admin/contestant/create/{event_id}','ContestantController@create')->name('admin.contestant.create');
    Route::post('admin/contestant/save/{event_id}','ContestantController@inputContestant')->name('admin.contestant.save');

    Route::get('admin/criteria/create/{event_id}','CriteriaController@create')->name('admin.criteria.create');
    Route::post('admin/criteria/save/{event_id}','CriteriaController@inputCriteria')->name('admin.criteria.save');

    Route::get('admin/score/view/{event_id}','ScoreController@viewContestant')->name('admin.contestant.view');
    Route::get('admin/score/show/{event_id}/{contestant_id}','ScoreController@viewScore')->name('admin.contestant.score.view');



});



//Judge


Route::group(['middleware'=>'judge'],function () {

    Route::get('judge','JudgeHome@index')->name('judge.landing');

    Route::get('judge/criteria/{criteria_id}','JudgeHome@indexWithCriteria')->name('judge.select.criteria');


    Route::get('judge/try',function (){
        return view('judge.try');
    });

    Route::post('judge/score/submit/{event_id}/{criteria_selector}','JudgeHome@inputScore')->name('judge.score.save');
    Route::get('judge/score/compute/{event_id}','JudgeHome@computeScore')->name('judge.score.compute');
});





