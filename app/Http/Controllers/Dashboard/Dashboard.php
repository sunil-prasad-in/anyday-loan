<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Traits\Api_client;

class Dashboard extends Controller{
	use Api_client;
	public $user_detail;
	
	public function index(){
		$this->user_detail = empty($this->user_detail)?Session::get('user_detail'):$this->user_detail;
	    
		$applicant_code = $this->user_detail['applicant_code'];
		$loan_app_no = isset($this->user_detail['loan_app_no'])?$this->user_detail['loan_app_no']:"";
		
		$loan = Session::get('loan');
		$loan_type = Session::get('loan_type');
 		
		$body = ["applicant_code"=>$applicant_code];
		$data = $this->post_req("getLoanApplications",$body);
		
		if($data['status'] == 1){
		    
		    $loan_details = array();
		    $next_status = "";
		    $display_label = "";
		    $pending_fill_application = "";
		    
		    /*Get A data of not disbursed loan from getLoanApplication, this data will show as current applying loan*/
		    if(count($data['data']) > 0){
		        foreach($data['data'] as $k=>$v){
		            if($v['loan_details']['loan_status']['current_status']['loan_status'] != "disbursed"){
		                $loan_details = isset($v['loan_details'])?$v['loan_details']:array();
		                $next_status = isset($loan_details['loan_status']['next_status']['loan_status'])?$loan_details['loan_status']['next_status']['loan_status']:"";
		                $display_label = isset($loan_details['loan_status']['next_status']['description'])?$loan_details['loan_status']['next_status']['description']:"";
		                $pending_fill_application = $next_status;
		                break;
		            }
		        }
		    }
		    
		    if($next_status != ""){
                $redirect_array = $this->get_next_status();
                $next_status =  isset($redirect_array[$next_status])?$redirect_array[$next_status]:"apply-now"; 
                if($next_status == "sanction-letter"){
                    $next_status = "approved-amount";   
                }
		    }else{
		        $next_status = "apply-now";
		    }
		    return view('dashboard.index')->with(
		        array(
		                'data'                    =>   $data['data'], 
		                'loan'                    =>   $loan, 
		                'loan_type'               =>   $loan_type, 
		                'user_detail'             =>   $this->user_detail, 
		                'next_status'             =>   $next_status, 
		                'display_label'           =>   $display_label,
		                'pending_fill_application'=>   $pending_fill_application
		          )
		    ); 
		} else if($data['status'] == 2){
			return view('dashboard.index')->withErrors($data['error']); 
		} else if($data['status'] == 0){
		    $request->session()->flash('error', $data['message']);
			return view('dashboard.index'); 
		}
		return view('dashboard.index');
	}
	public function get_loan_card(Request $request){
	    $loan_card = array("soa"=>"#","agreement"=>"#");
	    $loan_app_no = $request->loan_app_no;
	    $user_info = Session::get('user_detail');
	    
		$applicant_code = $user_info['applicant_code'];
        if($applicant_code == ""){
            return redirect('login');
        }
	    $body = ["applicant_code"=>$applicant_code,"loan_app_no"=>$loan_app_no];
		$data = $this->post_req("getSOA",$body);
		if(isset($data['data']['url'])){
		    $loan_card['soa'] = $data['data']['url'];
		}
		
		$data = $this->post_req("getSignedEagreement",$body);
		if(isset($data['data']['url'])){
		    $loan_card['agreement'] = $data['data']['url'];
		}
		return ["loan_card"=>$loan_card];
	}
}
