<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Traits\Api_client;

class Apply extends Controller{
	use Api_client;
	public $user_info, $user_detail, $getSysAppConfig;
	
	public function __construct(){
        
	}
	public function safe_data(){
    	return view('user.safe_data');
	}
	public function apply_now(){
		return view('user-apply.apply_now');
	}
	public function loan_calculation(){
		return view('user-apply.loan_calculation');
	}
	public function loan_calculation_fill(Request $request){
	    
	    $loan_amount = isset($request->loan_amount)?$request['loan_amount']:"";
	    $loan_amount = str_replace("₹","",$loan_amount);
	    $loan_amount = str_replace(",","",$loan_amount);
	    
	    $loan_period = isset($request->loan_period)?$request['loan_period']:"";
	    $loan_period = str_replace(" Months","",$loan_period);
	    
	    $loan_rate = isset($request->loan_rate)?$request['loan_rate']:"";
	    $loan_rate = str_replace("%","",$loan_rate);
	    
	    $loan = [
	                "loan_period"=>$loan_period, 
	                "loan_amount"=>$loan_amount, 
	                "loan_rate"=>$loan_rate
	           ];
	    Session::put('loan', $loan);
        Session::save();
        
	    return redirect(route('dash.personal_detail'));
	}
	public function loan_calculation_type(Request $request){
	    $loan_type = isset($request->loan_type)?$request['loan_type']:"";
	    
	    Session::put('loan_type', $loan_type);
        Session::save();
        return;
	}
}
