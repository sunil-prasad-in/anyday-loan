<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Traits\Api_client;

class RegisterAutoDebit extends Controller{
	use Api_client;
	public $user_detail;
	
	public function pre_proceding(){
	    $this->user_detail = empty($this->user_detail)?Session::get('user_detail'):$this->user_detail;
	    
		$data['data']['payload'] = $this->get_api_url()."enach";
		$data['data']['personal'] = $this->user_detail;
		$data['data']['redirect_url'] = url(route("payment_registration"));
		$data['data']['platform'] = "web";
		$data_check = Session::get('user_loan_details');

		return view('auto-debit.pre_proceding')->with(array('data'=>$data['data'],"data_check"=>$data_check));
	}
	public function confirm_payment_detail(){
	    $this->user_detail = empty($this->user_detail)?Session::get('user_detail'):$this->user_detail;
	    
		$applicant_code = $this->user_detail['applicant_code'];
		$loan_app_no = isset($this->user_detail['loan_app_no'])?$this->user_detail['loan_app_no']:"";
		
	    $body = ["applicant_code"=>$applicant_code,
                  "loan_app_no"=>$loan_app_no,
                  "platform"=>"web"
                ];
		$payload = $this->post_req("getENachDetails",$body);
		
		$data['data']['payload'] = $payload['data']['payload'];
		$data['data']['payloads'] = $this->get_api_url()."enach";
		$data['data']['personal'] = $this->user_detail;
		$data['data']['redirect_url'] = url(route("payment_registration"));
		$data['data']['platform'] = "web";
		
		$data_check = Session::get('user_loan_details');
		
		return view('auto-debit.payment_registration')->with(array('data'=>$data['data'],"data_check"=>$data_check));
	}
	public function payment_registration(Request $request){
	    $status = isset($request->nach_status)?$request->nach_status:0;
	    
	    if($status == "Success"){
			return redirect()->route('dash.enach_success');
		} else{
		    // return redirect()->route('dash.loan_reject');
			return redirect('dashboard/');
		}
	}
	public function enach_success(){
	    return view('auto-debit.enach_success');
	}
}
