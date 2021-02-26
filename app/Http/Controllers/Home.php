<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Traits\Api_client;

class Home extends Controller{
	use Api_client;
	public function __construct(){
        
	}
	public function index(){
		return view('user.home');
	}
	public function login(){
		if (Session::has('user_detail')) {
	      return redirect()->route('user.home');
	    }
    	return view('user.login');
	}
	public function do_login(Request $request){
	    
		$mobile_number = isset($request->mobile_number)?$request->mobile_number:"";
		$body = ['mobile_number'=>$mobile_number];
		$data = $this->post_req("getOtp",$body);
        
		if($data['status'] == 1){
			$request->session()->flash('mobile', $mobile_number);
			
			return redirect('verification')->withSuccess([$data['message'],$data['data']['otp']]);
		} else if($data['status'] == 2){
        	$request->session()->flash('apiError', $data['data']);
        	
			return redirect()->back()->withInput();
		} else if($data['status'] == 0){
		    $data['data']['mobile_number'][0] = "Your mobile number is not registered";
        	$request->session()->flash('apiError', $data['data']);
        	
			return redirect()->back()->withInput();
		}
	}
	public function resend_otp(Request $request){
		$hid_mobile = $request->hid_mobile;
		$body = ['mobile_number'=>$hid_mobile];
		$data = $this->post_req("getOtp",$body);
		if($request->is_reg != null){
        	$request->session()->flash('is_reg', 1);
        }
		if($data['status'] == 1){
			$request->session()->flash('mobile', $hid_mobile);
			return redirect('verification')->withSuccess([$data['message'],$data['data']['otp']]);
		} else if($data['status'] == 2){
			return redirect('login')->withErrors($data['error']);
		} else if($data['status'] == 0){
			$request->session()->flash('error', $data['message']);
			return redirect('login');
		}
	}
	public function verify_otp(Request $request){
	   
		$mobile_number = isset($request->mobile_number)?$request->mobile_number:"";
		$otp1 = isset($request->otp1)?$request->otp1:"";
		$otp2 = isset($request->otp2)?$request->otp2:"";
		$otp3 = isset($request->otp3)?$request->otp3:"";
		$otp4 = isset($request->otp4)?$request->otp4:"";
		$otp5 = isset($request->otp5)?$request->otp5:"";
		$otp6 = isset($request->otp6)?$request->otp6:"";
		$otp = $otp1.$otp2.$otp3.$otp4.$otp5.$otp6;
		$body = ['mobile_number'=>$mobile_number, 'otp'=>$otp];
		$data = $this->post_req("verifyOtp",$body);
		$request->session()->flash('mobile', $mobile_number);
		
		if($request->is_reg != null){
		     Session::flush();
        	$request->session()->flash('is_reg', 1);
        }
		if($data['status'] == 1){
        	Session::put('user_detail', $data['data']);
        	Session::save();
        	$redi = $this->get_loan_application($data['data']['applicant_code']);
        	//dd($request->session()->all());
        	if($request->is_reg != null){
                //$redi = 'safe-data';
        	}
			return redirect($redi)->withSuccess($data['message']);
		} else if($data['status'] == 2){
        	$request->session()->flash('apiError', $data['data']);
			
            return redirect()->back()->withErrors($data['error']);
		} else if($data['status'] == 0){
			$request->session()->flash('error', $data['message']);
            return redirect()->back();
		}
	}
	public function register(){
    	return view('user.register');
	}
	public function safe_data(){
    	return view('user.safe_data');
	}
	public function do_register(Request $request){
    
	    $body = $request->all();
		$data = $this->post_req("signUp",$body);
		
		if($data['status'] == 1){
            // 			$user_info = $data['data'];
            // 			Session::put('user_info', $user_info);
            //         	Session::save();
        	$request->session()->flash('mobile', $request->mobile_number);
        	$request->session()->flash('is_reg', 1);
			return redirect('verification')->withSuccess($data['message']." OTP :: ".$data['data']['otp']);
		} else if($data['status'] == 2){
        	$request->session()->flash('apiError', $data['data']);
			return redirect()->back()->withInput();
		} else if($data['status'] == 0){
			$request->session()->flash('error', $data['message']);
			return redirect()->back()->withInput();
		}
        return redirect()->route('user.home');
	}
	public function verification(){
    	return view('user.verification');
	}
	public function get_loan_application($applicant_code){
	    $body = ["applicant_code"=>$applicant_code];
		$data = $this->post_req("getLoanApplications",$body);
		if($data['status'] == 1){
		  //  For getting an information about last applied application
		    $loan_details = isset($data['data'][0]['loan_details'])?$data['data'][0]['loan_details']:array();
		    $loan_app_no = isset($data['data'][0]['loan_details']['loan_app_no'])?$data['data'][0]['loan_details']['loan_app_no']:"";
		    
		    /*Get More details about last applied application*/
		    if($loan_app_no != ""){
		        $body = ["applicant_code"=>$applicant_code,"loan_app_no"=>$loan_app_no];
		        $data_detail = $this->post_req("getLoanApplicationDetails",$body);
		        if($data_detail['status'] == 1){
		            Session::put('getLoanApplicationDetails', $data_detail['data']);
                    Session::save();
		            $loan_details['filled_details'] = $data_detail['data'];
		        }else{
		            $loan_details['filled_details'] = array();
		        }
		    }else{
		        $loan_details['filled_details'] = array();
		    }
		    
		    Session::put('user_loan_details', $loan_details);
            Session::save();
            
            /*Get the next status to redirect logged in user to last left page*/
            $next_status = isset($loan_details['loan_status']['next_status']['loan_status'])?$loan_details['loan_status']['next_status']['loan_status']:"";
            if($next_status != ""){
                $redirect_array = $this->get_next_status();
                $next_status =  isset($redirect_array[$next_status])?$redirect_array[$next_status]:"apply-now";  
                Session::put('next_status', $next_status);
            	Session::save();
                if($next_status == "sanction-letter"){
                    $next_status = "dashboard/";
                }
                
                /*Some default Sessions for redirection with data*/
                $body = ["applicant_code"=>$applicant_code,"loan_app_no"=>$loan_app_no];
		        $data_info = $this->post_req("getLoanApplicationInformation",$body);
		        if($data_info['status'] == 1){
		            $user_filled_details = $data_info['data'];
		            Session::put('user_filled_details', $user_filled_details);
                    Session::save();
                    Session::put('getLoanApplicationInformation', $user_filled_details);
                    Session::save();
                    
                    /*Current permanent address is same or not*/
                    $user_detail = Session::get('user_detail');
        		    $user_detail['p_eq_c'] = isset($user_filled_details['p_eq_c'])?$user_filled_details['p_eq_c']:0;
        		    Session::put('user_detail', $user_detail);
                	Session::save();
                	
                	
		            /* loan type default now */
                    $loan_type = isset($user_filled_details['profile']['loan_type'])?$user_filled_details['profile']['loan_type']:"PL";
            	    Session::put('loan_type', $loan_type);
                    Session::save();
                    
		        }else{
		            $user_filled_details = array();
		        }
		        
                /* Create different Session from response data*/
                $loan_period = isset($loan_details['tenure'])?$loan_details['tenure']:"";
                $loan_amount = isset($loan_details['amount'])?$loan_details['amount']:"";
                $loan_rate = isset($loan_details['roi'])?$loan_details['roi']:"";
                $emi = isset($loan_details['emi_amount'])?$loan_details['emi_amount']:"";
                
                $loan = ["loan_period"=>$loan_period, "loan_amount"=>$loan_amount, "loan_rate"=>$loan_rate, "emi"=>$emi];
        	    Session::put('loan', $loan);
                Session::save();
                $loan_st = ["tenure"=>$loan_period, "approved_amount"=>$loan_amount, "interest"=>$loan_rate, "emi"=>$emi];
                Session::put('loan_status', $loan_st);
                Session::save();
                
                
                
                /* loan app no user detail */
                $user_detail = Session::get('user_detail');
                $user_detail['loan_app_no'] = isset($loan_details['loan_app_no'])?$loan_details['loan_app_no']:"";
            	Session::put('user_detail', $user_detail);
            	Session::save();
            	
            }else{
                $next_status = "apply-now";
            }
            return $next_status;
		}elseif($data['status'] == 2){
		    return $next_status = "apply-now";
		}elseif($data['status'] == 0){
		    return $next_status = "apply-now";
		}
	}
	public function logout(){
	    Session::flush();
	    return redirect('login');
	}
}
