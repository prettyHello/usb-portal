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

Route::get('/', 'WelcomeController@index');



















Route::get('users', 'UsersController@getInfos');
Route::post('users', 'UsersController@postInfos');


//Route::get('article/{n}', 'ArticleController@show')->where('n', '[0-9]+');
//
//Route::get('facture/{n}', function($n) {
//    return view('article')->with('numero', $n);
//    return view('article')->withNumero($n);
//    return view('facture', ['numero' => $n]);
//})->where('n', '[0-9]+');


//Route::get('article/{n}', function($n) {
//    return view('article')->with('numero', $n);
//    return view('article')->withNumero($n);
//    return view('article', ['numero' => $n]);
//})->where('n', '[0-9]+');

//Route::get('/', function()
//{
//    return view('view1');
//});

//Route::get('1', function () {
//    return response('Je suis la page 1 !', 200);
//});
