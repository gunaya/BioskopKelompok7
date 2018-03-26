<?php
namespace App\Providers;
use App\Kategori;// write model name here
use Illuminate\Support\ServiceProvider;

class KategoriProvider extends ServiceProvider
{
	public function boot()
	{
		view()->composer('*',function($view){
			$view->with('kategori_array', Kategori::all());
		});
	}
}