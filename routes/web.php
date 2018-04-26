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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::post('/home', ['uses' => 'HomeController@home', 'as' => 'home.custom']);

Route::post('/login/custom', ['uses'=>'LoginController@login', 
    'as' => 'login.custom'
]);

Route::group(['middleware' => 'auth'], function(){
    Route::get('/user_home', function(){
        return view('user_home');
    })->name('user_home');
    Route::get('/admin_home', function(){
        return view('admin_home');
    })->name('admin_home');
});

Route::resource('admin-film','FilmController');

Route::get('/user_home','FilmController@show_film')->name('user_home');
Route::get('/tayang','TayangController@show');

// Search Route
Route::get('query','FilmController@search');
Route::get('queryKat','KategoriController@search');
Route::get('queryGen','GenreController@search');

Route::resource('kategori','KategoriController');
Route::resource('genre','GenreController');

Route::get('/film/{film_id}','DetFilmController@index');
Route::get('/film/{film_id}/{id_tayang}','DetFilmController@kursi');

Route::resource('film','DetFilmController');

Route::resource('profile','ProfilController');