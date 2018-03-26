<?php
namespace App\Providers;
use App\tb_genre_film; 
use App\Kategori;// write model name here
use Illuminate\Support\ServiceProvider;
class GenreProvider extends ServiceProvider
{
	public function boot()
	{
		view()->composer('*',function($view){
			$view->with('genre_array', tb_genre_film::all());
		});
	}
}

class KategoriProvider extends ServiceProvider
{
	public function boot()
	{
		view()->composer('*',function($view){
			$view->with('kategori_array', Kategori::all());
		});
	}
}