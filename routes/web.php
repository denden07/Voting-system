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



Route::get('/home', 'AdminEvent@landing')->name('home');

Route::get('/admin',function (){
    return view('admin.index');
});

Route::resource('admin/judge','JudgeController',['names'=>[
        'index'=>'admin.judge.index',
        'create'=>'admin.judge.create',
        'store'=>'admin.judge.store',
        'edit'=>'admin.judge.edit',
    ]]);

Route::get('admin/landing','AdminEvent@landing')->name('admin.landing');