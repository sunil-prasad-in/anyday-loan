<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pages extends Controller{
	function __construct(){

	}
	public function index(){
    	echo 'inside index';
	}
	public function terms(){
    	return view('user.pages.terms');
	}
	public function privacy(){
    	return view('user.pages.privacy');
	}

	public function contact(){
    	return view('user.pages.contact');
	}
	public function about(){
    	return view('user.pages.about');
	}
	public function faq(){
    	return view('user.pages.faq');
	}
	public function personal_loan(){
    	return view('dashboard.personal_loan');
	}
	public function business_loan(){
    	return view('dashboard.business_loan');
	}
	public function medical_loan(){
    	return view('dashboard.medical_loan');
	}
	public function education_loan(){
    	return view('dashboard.education_loan');
	}
	
}



