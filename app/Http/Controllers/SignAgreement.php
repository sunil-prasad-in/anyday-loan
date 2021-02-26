<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Traits\Api_client;

class SignAgreement extends Controller{
	use Api_client;
	public $user_detail;
	
	public function approved_amount(){
	    
	    $user_infoLoan = Session::get('loan_status');
	    //if(isset($user_infoLoan['is_approved']) && $user_infoLoan['is_approved'] == "Approved"){
    		$data['data']['loanstatus'] = $user_infoLoan;
    		return view('sanction-sign-agreement.approved_amount')->with('data', $data['data']);
	   // }else{
	   //     //not approved
	   //     return redirect()->route('dash.apply_now');
	   // }
	}
	public function sanction_letter(){
	    $this->user_detail = empty($this->user_detail)?Session::get('user_detail'):$this->user_detail;
	    
		$applicant_code = $this->user_detail['applicant_code'];
		$loan_app_no = isset($this->user_detail['loan_app_no'])?$this->user_detail['loan_app_no']:"";
		
	    $body = [
		    "applicant_code"=>$applicant_code,
		    "loan_app_no"=>$loan_app_no,
		    ];
		$data = $this->post_req("getSanctionLetter",$body);
		if($data['status'] == 1){
		    return view('sanction-sign-agreement.sanction_letter')->with(array('data'=> $data['data']));
		} else if($data['status'] == 2){
			return redirect()->route('dash.approved_amount')->withErrors($data['error']);
		} else if($data['status'] == 0){
			$request->session()->flash('error', $data['message']);
			return redirect()->route('dash.approved_amount');
		}
	}
	public function sanction_letter_upload(){
	    $this->user_detail = empty($this->user_detail)?Session::get('user_detail'):$this->user_detail;
	    
		$applicant_code = $this->user_detail['applicant_code'];
		$loan_app_no = isset($this->user_detail['loan_app_no'])?$this->user_detail['loan_app_no']:"";
	   
	    $body = ["applicant_code"=>$applicant_code,
                  "loan_app_no"=>$loan_app_no,
                  "document_status"=>"signed"
                ];
		$data = $this->post_wt_token_req("updateSanctionLetterStatus",$body);
		if($data['status'] == 1){
			return redirect()->route('dash.sign_eligibilty')->withSuccess($data['message']);
		} else if($data['status'] == 2){
        	$request->session()->flash('apiError', $data['data']);
			return redirect()->back();
		} else if($data['status'] == 0){
			$request->session()->flash('error', $data['message']);
			return redirect()->back();
		}
        return redirect()->route('dash.sanction_letter');
	}
	public function sign_eligibilty(){
	    /*reform the array value*/
	    $user_infoLoan = Session::get('loan_status');
	    if(!empty($user_infoLoan)){
    	    $loan_amount = isset($user_infoLoan['approved_amount'])?$user_infoLoan['approved_amount']:0;
    	    $emi = isset($user_infoLoan['emi'])?$user_infoLoan['emi']:0;
    	    if($emi == "NA"){
    	        $emi = 0;
    	    }
    	    $loan_amount = str_replace("₹","",$loan_amount);
    	    $loan_amount = str_replace(",","",$loan_amount);
    	    
    	    $loan_period = isset($user_infoLoan['tenure'])?$user_infoLoan['tenure']:0;
    	    $loan_period = str_replace(" Month","",$loan_period);
    	    $loan_rate = isset($user_infoLoan['interest'])?$user_infoLoan['interest']:0;
    	    $loan_rate = str_replace(" %","",$loan_rate);
    	    $loan_rate = (float)$loan_rate;
    	    
    	    $user_infoLoan["emi"] = $emi;
    	    $user_infoLoan["tenure"] = $loan_period;
    	    $user_infoLoan["approved_amount"] = $loan_amount;
    	    $user_infoLoan["interest"] = ($loan_rate == "")?0:$loan_rate;
    	    Session::put('loan_status', $user_infoLoan);
            Session::save();
	    }else{
	        $loan_details = Session::get('user_loan_details');
		    //dd($loan_details);
	        $user_infoLoan['approved_amount'] = isset($loan_details['amount'])?$loan_details['amount']:0;
	        $user_infoLoan['tenure'] = isset($loan_details['tenure'])?$loan_details['tenure']:0;
	        $user_infoLoan['processing_fee'] = isset($loan_details['processing_fee'])?$loan_details['processing_fee']:0;
	        $user_infoLoan['emi'] = isset($loan_details['emi_amount'])?$loan_details['emi_amount']:0;
	        $user_infoLoan['interest'] = isset($loan_details['roi'])?$loan_details['roi']:0;
	    }
        /*End loan_status array value reformation*/
        
	    $this->user_detail = empty($this->user_detail)?Session::get('user_detail'):$this->user_detail;
		$applicant_code = $this->user_detail['applicant_code'];
		$loan_app_no = isset($this->user_detail['loan_app_no'])?$this->user_detail['loan_app_no']:"";
	    
	    $body = [
	                "applicant_code"=>$applicant_code,
	                "loan_app_no"=>$loan_app_no,
                    "platform"=>"ios"
                ];
		$data = $this->post_req("startEAgreement",$body);
		if($data['status'] == 1){
		    $data['data']['personal'] = $this->user_detail;
		    $data['data']['redirect_url'] = url(route("signed-proceding"));
		    $data['data']['platform'] = "web";
			$data['data']['loanstatus'] = $user_infoLoan;
		    return view('sanction-sign-agreement.sign_eligibilty')->with('data', $data['data']);
		} else if($data['status'] == 2){
		    return redirect()->route('dash.apply_now');
		} else if($data['status'] == 0){
			return redirect()->route('dash.apply_now');
		}
	}
	
    /*unused method start*/
	public function sign_agreement(){
	    $user_info = Session::get('user_detail');
	    $applicant_code = $user_info['applicant_code'];
        $loan_app_no = $user_info['loan_app_no'];
        $body = ["applicant_code"=>$applicant_code,"loan_app_no"=>$loan_app_no];
		$data = $this->post_req("getSOA",$body);
		if(isset($data['data']['url']) && $data['data']['url'] != ""){
		    //return redirect('dashboard/');
		}
        $body = ["applicant_code"=>$applicant_code,
              "loan_app_no"=>$loan_app_no,
              "platform"=>"ios"
            ];
		$data = $this->post_req("startEAgreement",$body);
		//dd($data);
		if($data['status'] == 1){
		    
		    $data['data']['personal'] = $user_info;
		    $data['data']['redirect_url'] = url("signed-proceding");
		    $data['data']['platform'] = "web";
			return view('sanction-sign-agreement.sign_agreement')->with('data', $data['data']);
		} else if($data['status'] == 2){
		    return redirect('apply-now');
		} else if($data['status'] == 0){
			return redirect('apply-now');
		}
	    
	}
	/*unused method end*/
	
	public function signed_proceding(Request $request){
	    $success = isset($request->success)?$request->success:0;
	    if($success == 1){
			//return redirect('pre-proceding');
			return redirect()->route('dash.sign_agreement_success');
		} else{
		    // return redirect()->route('dash.loan_reject');
			return redirect('dashboard/');
		}
	}
	public function sign_agreement_success(){
	    return view('sanction-sign-agreement.sign_agreement_success');
	}
	public function loan_reject(){
	    return view('sanction-sign-agreement.loan_reject');
	}
}
