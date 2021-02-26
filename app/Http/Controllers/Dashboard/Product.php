<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class Product extends Controller{
	
	public function index(){
		return view('dashboard.application-products.products');
	}
}




