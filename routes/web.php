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
Route::get('user_home/cari', 'FilmController@loadData');
Route::get('queryKat','KategoriController@search');
Route::get('queryGen','GenreController@search');

Route::resource('kategori','KategoriController');
Route::resource('genre','GenreController');

Route::get('/film/{film_id}','DetFilmController@index');
Route::get('/film/{film_id}/{id_tayang}','DetFilmController@kursi');

Route::resource('film','DetFilmController');
Route::get('profile/{user_id}','ProfilController@index');
Route::post('profile/{user_id}','ProfilController@update');


Route::get('transaksi/{list_id}','TransaksiController@index');
Route::post('transaksi','TransaksiController@kirimData')->name('booking');
Route::get('transaksi/checkout/{user_id}','TransaksiController@check')->name('checkout');
Route::match(['get', 'post'],'transaksi/pembayaran/','TransaksiController@pembayaran')->name('pembayaran');
Route::match(['get', 'post'],'transaksi/pembayaran/kredit','TransaksiController@kredit')->name('success_kredit');
Route::match(['get', 'post'],'transaksi/pembayaran/transfer','TransaksiController@transfer')->name('success_transfer');
Route::get('transaksi/status/{user_id}','TransaksiController@status')->name('status');

Route::get('konfirmasi','AdminController@index')->name('konfirmasi');
Route::match(['get', 'post'],'konfirmasi/sukses','AdminController@confirm')->name('conf');


Route::match(['get', 'post'],'transaksi/cancel','TransaksiController@cancel')->name('cancel');


