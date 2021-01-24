<?php

use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('pages.home');
});

Route::get('/user/del/{id}', 'GameController@userDel');

Route::view('login', 'pages.login')->name('login');
Route::post('login', 'LoginController@store')->name('login.store');

Route::prefix('game')->middleware(['auth'])->group(function () {

    Route::get('/', 'GameController@index')->name('game');

    Route::get('/clear/{any?}', 'GameController@clear')->name('game.clear');

    Route::get('/join/{game}', 'GameController@joinGame')->name('game.join');

    Route::get('/create', 'GameController@create')->name('game.create');


    Route::post('/store', 'GameController@store')->name('game.store');

    Route::get('/questions', 'GameplayController@index')->name('gameplay.index');
    Route::get('/start/{any?}', 'GameplayController@startGame')->name('start.index');
    Route::post('/save-result', 'GameplayController@store')->name('start.save');

    Route::post('/start', 'GameplayController@start')->name('start');
    Route::get('/waiting-results', 'GameplayController@waiting')->name('waiting');


    Route::get('/test', 'ResultsController@makeShuffle');
    # API
    Route::get('/get-users/{gid}', 'ApiController@getOnlineUsers');
    Route::get('/check-start/{gid}', 'ApiController@checkStart');
    Route::get('/check-results', 'ApiController@checkForResults');

    # Results
    Route::get('/results', 'ResultsController@index')->name('results');
    Route::get('/playa-gain', 'GameController@start_again')->name('again');

});
