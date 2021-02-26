<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Traits\Api_client;

class LoanApplication extends Controller{
	use Api_client;
	public $user_info, $user_detail, $getSysAppConfig;
	
	public function personal_detail(){
	    $loan = Session::get('loan');
	    if(empty($loan)){
	        return redirect('apply-now');    
	    }
	    if(!(Session::has('getSysAppConfig'))){
	        $this->getSysAppConfig = $this->post_req("getSysAppConfig",[]);
	        Session::put('getSysAppConfig', $this->getSysAppConfig);
        	Session::save();
	    }
	    $data = empty($this->getSysAppConfig)?$this->getSysAppConfig = Session::get('getSysAppConfig'):$this->getSysAppConfig;

		$data['data']['loan'] = $loan;
		$this->user_detail = empty($this->user_detail)?Session::get('user_detail'):$this->user_detail;
        
		return view('loan-application.personal_detail')->with('data', $data['data']);
	}
	public function personal_detail_fill(Request $request){
	   //dd($request);
	    $this->user_detail = empty($this->user_detail)?Session::get('user_detail'):$this->user_detail;
	    
	    $loan_type = Session::get('loan_type');
		$applicant_code = $this->user_detail['applicant_code'];
		$loan_app_no = isset($this->user_detail['loan_app_no'])?$this->user_detail['loan_app_no']:"";
	    
	    $pan = $request->pan_nummber;
	    $name = $request->full_name;
	    $father_full_name = $request->father_name;
	    $dob = date("Y-m-d",strtotime($request->birthday));
	    $gender = $request->gender;
	    $marital_status = $request->marital_status;
	    $education = $request->education;
	    $personal_email_id = $request->personal_email_id;
	    
	    $amount = sprintf("%.2f", $request->amount);
	    $roi = sprintf("%.2f", $request->roi);
	    $tenure = $request->tenure;
	    
	    $body = [
	                'amount'=>$amount, 
	                'roi'=>$roi, 
	                'tenure'=>$tenure, 
	                'applicant_code'=>$applicant_code, 
	                'loan_app_no'=>$loan_app_no, 
	                'loan_type'=>$loan_type, 
	                'pan'=>$pan, 
	                'name'=>$name, 
	                'father_full_name'=>$father_full_name, 
	                'dob'=>$dob, 'gender'=>$gender, 
	                'marital_status'=>$marital_status, 
	                'education'=>$education, 
	                'personal_email_id'=>$personal_email_id
	           ];
		$data = $this->post_wt_token_req("submitLoanApplicationProfileInformation",$body);
		if($data['status'] == 1){
		    
		    $user_filled_details = Session::get('user_filled_details');
    		$user_filled_details['profile'] = $body;
    		Session::put('user_filled_details', $user_filled_details);
            Session::save();
            
            $loan_details = Session::get('user_loan_details');
            $loan_details['loan_status']['next_status']['loan_status'] = "address";
            Session::put('user_loan_details', $loan_details);
            Session::save();
            
			$user_info = $data['data'];
        	$this->user_detail['loan_app_no'] = isset($user_info['loan_app_no'])?$user_info['loan_app_no']:"";
        	Session::put('user_detail', $this->user_detail);
        	Session::save();
			return redirect()->route('dash.address_info')->withSuccess($data['message']);
		} else if($data['status'] == 2){
        	$request->session()->flash('apiError', $data['data']);
			return redirect()->back()->withInput();
		} else if($data['status'] == 0){
			$request->session()->flash('error', $data['message']);
			return redirect()->back()->withInput();
		}
        return redirect()->route('dash.personal_detail');
	}
	public function address_info(){
	    if(!(Session::has('getSysAppConfig'))){
	        $this->getSysAppConfig = $this->post_req("getSysAppConfig",[]);
	        Session::put('getSysAppConfig', $this->getSysAppConfig);
        	Session::save();
	    }
	    $data = empty($this->getSysAppConfig)?$this->getSysAppConfig = Session::get('getSysAppConfig'):$this->getSysAppConfig;
	    
		return view('loan-application.address_info')->with('data', $data['data']);
	}
	public function address_info_pincode(Request $request){
	    $this->user_detail = empty($this->user_detail)?Session::get('user_detail'):$this->user_detail;
 		
		$applicant_code = $this->user_detail['applicant_code'];
	    $pincode = $request->pincode;
	    $body = ["applicant_code"=>$applicant_code, "pin_code"=>$pincode];
		$data = $this->post_req("getPinCodeInformation",$body);
		
		return $data;
	}
	public function address_info_fill(Request $request){
	    
        $this->user_detail = empty($this->user_detail)?Session::get('user_detail'):$this->user_detail;
        
        $applicant_code = $this->user_detail['applicant_code'];
        $loan_app_no = $this->user_detail['loan_app_no'];
	    $p_eq_c = $request->p_eq_c;

        $pin_code = $request->pin_code;
        $city_of_residence = $request->city_of_residence;
        $years_in_current_city = sprintf($request->years_in_current_city.".".$request->month_in_current_city);
        $residence_type = $request->residence_type;
        $years_in_current_residence = sprintf($request->years_in_current_residence.".".$request->month_in_current_residence);
        $current_address_line1 = $request->current_address_line1;
        $current_address_line2 = $request->current_address_line2;
        $state = $request->state;

        $permanent_pin_code = ($request->permanent_pin_code != null)?$request->permanent_pin_code:$pin_code;
        $permanent_city_of_residence = ($request->permanent_city_of_residence != null)?$request->permanent_city_of_residence:$city_of_residence;
        $years_in_permanent_city = ($request->years_in_permanent_city != null && $request->month_in_permanent_city != null)?sprintf($request->years_in_permanent_city.".".$request->month_in_permanent_city):$years_in_current_city;
        $years_in_permanent_residence = ($request->years_in_permanent_residence != null && $request->month_in_permanent_residence != null)?sprintf($request->years_in_permanent_residence.".".$request->month_in_permanent_residence):$years_in_current_residence;
        $permanent_residence_type = ($request->permanent_residence_type != null)?$request->permanent_residence_type:$residence_type;
        $permanent_address_line1 = ($request->permanent_address_line1 != null)?$request->permanent_address_line1:$current_address_line1;
        $permanent_address_line2 = ($request->permanent_address_line2 != null)?$request->permanent_address_line2:$current_address_line2;
        $permanent_state = ($request->permanent_state != null)?$request->permanent_state:$state; 
      
        $current_address = array(
  			"pin_code"=>$pin_code,        
  			"city_of_residence"=>$city_of_residence,        
  			"years_in_current_city"=>$years_in_current_city,
  			"residence_type"=>$residence_type,        
  			"years_in_current_residence"=>$years_in_current_residence,        
  			"current_address_line1"=>$current_address_line1,
  			"current_address_line2"=>$current_address_line2,
  			"state"=>$state, 
        );
        $permanent_address = array(
  			"permanent_pin_code" => $permanent_pin_code,
			"permanent_city_of_residence" => $permanent_city_of_residence,
		    "years_in_permanent_city" => $years_in_permanent_city,
		    "years_in_permanent_residence" => $years_in_permanent_residence,
			"permanent_residence_type" => $permanent_residence_type,
			"permanent_address_line1" => $permanent_address_line1,
			"permanent_address_line2" => $permanent_address_line2,
			"permanent_state" => $permanent_state,
        );
        array_walk_recursive($current_address,function(&$item){$item=strval($item);});
        array_walk_recursive($permanent_address,function(&$item){$item=strval($item);});
	    $body = [
	                "applicant_code"=>$applicant_code,
	                "loan_app_no"=>$loan_app_no,
	                "p_eq_c"=>$p_eq_c,
	                "current_address"=>$current_address,
	                "permanent_address"=>$permanent_address
	           ];
		$data = $this->post_wt_token_req("submitLoanApplicationAddressInformation",$body);
		if($data['status'] == 1){
		    $user_filled_details = Session::get('user_filled_details');
		    $body['current'] = $body['current_address'];
		    $body['permanent'] = $body['permanent_address'];
    		$user_filled_details['address'] = $body;
    		Session::put('user_filled_details', $user_filled_details);
            Session::save();
            
            $loan_details = Session::get('user_loan_details');
            $loan_details['loan_status']['next_status']['loan_status'] = "employment";
            Session::put('user_loan_details', $loan_details);
            Session::save();
            
		    $this->user_detail['p_eq_c'] = $p_eq_c;
		    Session::put('user_detail', $this->user_detail);
        	Session::save();
			return redirect()->route('dash.employment_info')->withSuccess($data['message']);
		} else if($data['status'] == 2){
        	$request->session()->flash('apiError', $data['data']);
			return redirect()->back()->withInput();
		} else if($data['status'] == 0){
			$request->session()->flash('error', $data['message']);
			return redirect()->back()->withInput();
		}
        return redirect()->route('dash.address_info');
	}
	public function employment_info(){
	    if(!(Session::has('getSysAppConfig'))){
	        $this->getSysAppConfig = $this->post_req("getSysAppConfig",[]);
	        Session::put('getSysAppConfig', $this->getSysAppConfig);
        	Session::save();
	    }
	    $data = empty($this->getSysAppConfig)?$this->getSysAppConfig = Session::get('getSysAppConfig'):$this->getSysAppConfig;
	    
		return view('loan-application.employment_info')->with('data', $data['data']);
	}
	public function employment_info_fill(Request $request){
        $this->user_detail = empty($this->user_detail)?Session::get('user_detail'):$this->user_detail;
        
        $applicant_code = $this->user_detail['applicant_code'];
        $loan_app_no = $this->user_detail['loan_app_no'];
	    
        $company_name = $request->company_name;
        $company_type = $request->company_type;
        $company_email_address = $request->company_email_address;
        $request->net_monthly_salary = str_replace(',', '', $request->net_monthly_salary);
        $net_monthly_salary = sprintf("%.2f", $request->net_monthly_salary);
        $years_in_current_company = sprintf($request->years_in_current_company.".".$request->month_in_current_company);
        $designation = $request->designation;
        $request->currently_any_emi_paying = str_replace(',', '', $request->currently_any_emi_paying);
        $currently_any_emi_paying = sprintf("%.2f", $request->currently_any_emi_paying);
        $job_type = $request->job_type;
        $pin_code = $request->pin_code;

	    $body = ["applicant_code"=>$applicant_code,
                  "loan_app_no"=>$loan_app_no,
                  "company_name"=>$company_name,
                  "company_type"=>$company_type,
                  "company_email_address"=>$company_email_address,
                  "net_monthly_salary"=>$net_monthly_salary,
                  "years_in_current_company"=>$years_in_current_company,
                  "designation"=>$designation,
                  "currently_any_emi_paying"=>$currently_any_emi_paying,
                  "job_type"=>$job_type,
                  "pin_code"=>$pin_code
                ];
		$data = $this->post_wt_token_req("submitLoanApplicationEmploymentInformation",$body);
		if($data['status'] == 1){
		    $user_filled_details = Session::get('user_filled_details');
    		$user_filled_details['employer'] = $body;
    		Session::put('user_filled_details', $user_filled_details);
            Session::save();
            
            $loan_details = Session::get('user_loan_details');
            $loan_details['loan_status']['next_status']['loan_status'] = "document";
            Session::put('user_loan_details', $loan_details);
            Session::save();
            
		    Session::put('loan_application_phase_result', $data['data']);
            Session::save();
		    
			return redirect()->route('dash.pre_approved')->withSuccess($data['message']);
		} else if($data['status'] == 2){
        	$request->session()->flash('apiError', $data['data']);
			return redirect()->back()->withInput();
		} else if($data['status'] == 0){
			$request->session()->flash('error', $data['message']);
			return redirect()->back()->withInput();
		}
        return redirect()->route('dash.employment_info');
	}
	public function pre_approved(){
	    
		$data['data']['result'] = Session::get('loan_application_phase_result');
		$data_check = Session::get('user_loan_details');
		return view('loan-application.pre_approved')->with(array('data'=>$data['data'],"data_check"=>$data_check));
	}
}
