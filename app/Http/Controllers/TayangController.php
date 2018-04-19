<?php

namespace App\Http\Controllers;
use \App\Tayang;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TayangController extends Controller
{
	public function index(){

	}

    public function show(){
    	
    	$tayang = Tayang::all();
        return view('/user_home',compact('tayang'));
    }
}
