<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Traits\Api_client;
use File;

class KycDocument extends Controller{
	use Api_client;
	public $user_info, $user_detail, $getSysAppConfig;

	public function kyc_documents(){
	    $this->user_detail = empty($this->user_detail)?Session::get('user_detail'):$this->user_detail;
	    
		$applicant_code = $this->user_detail['applicant_code'];
		$loan_app_no = isset($this->user_detail['loan_app_no'])?$this->user_detail['loan_app_no']:"";
		
	    $body = [
		    "applicant_code"=>$applicant_code,
		    "loan_app_no"=>$loan_app_no,
		    ];
		$doc_list = $this->post_req("getDocumentList",$body);
		Session::put('doc_list', $doc_list);
        Session::save();
		$data_check = Session::get('user_loan_details');
		return view('kyc-documentation.kyc_documents')->with(array('doc_list'=> $doc_list['data'], 'data_check'=> $data_check));
	}
	public function kyc_documents_check(){
	    $doc_list = Session::get('doc_list');
		return $doc_list;
	}
	public function kyc_documents_fill(Request $request){
	    $this->user_detail = empty($this->user_detail)?Session::get('user_detail'):$this->user_detail;
	    
		$applicant_code = $this->user_detail['applicant_code'];
		$loan_app_no = isset($this->user_detail['loan_app_no'])?$this->user_detail['loan_app_no']:"";
		
	    if(empty($this->user_detail)){
	        return redirect('login');
	    }
	    
	    $label = $request->label;
	    $password = "";
	    if($request->password != null){
	        $password = $request->password;
	    }
	    
	    /* Save Into Sever */
	    $fnew_image = $request->image;
        $fileName = date('dmyhisa') . '-' . $fnew_image->getClientOriginalName();
        $fileName = str_replace(" ", "-", $fileName);
        $upload_path_default = 'images/loans/';
        $upload_path = public_path($upload_path_default);
        if (!is_dir($upload_path)) {
			mkdir($upload_path, 0777, TRUE);
			@chmod($upload_path,0777);
		}
		
        $fnew_image->move($upload_path, $fileName);
        $ffile = $upload_path.$fileName;
        $img_cont = file_get_contents($ffile);
        /* Save Into End */
        
	    $body = [
	        "applicant_code"=>$applicant_code,
	        "loan_app_no"=>$loan_app_no,
	        "label"=>$label,
	        "password"=>$password,
	        ];
        $multipart = [
            [
                'name'      => 'image',
                'filename' => $fileName,
                'contents' => $img_cont,
            ],
        ];
        
		$data = $this->post_req_files("uploadLoanApplicationKYCDocument",$body,$multipart);
		
		/*removed tempory saved image*/
		if(File::exists(public_path($upload_path_default.$fileName))){
            File::delete(public_path($upload_path_default.$fileName));
        }
		$body2 = [
		    "applicant_code"=>$applicant_code,
		    "loan_app_no"=>$loan_app_no,
		    ];

		$doc_list = $this->post_req("getDocumentList",$body2);
		$data['doc_list'] = $doc_list;
        /*tempory session edit start*/
        if(isset($request->label_class)){
            $label_class = $request->label_class;
            $doc_list_kyc_temp = Session::get('doc_list_kyc_temp');
            
            $doc_list_kyc_temp[$label_class] = 1;
            
            Session::put('doc_list_kyc_temp', $doc_list_kyc_temp);
        	Session::save();
        	$data['doc_list_kyc_temp'] = $doc_list_kyc_temp;
        }
        /*end*/
		
		return $data;
	}
	public function bank_details(){
	    if(!(Session::has('getSysAppConfig'))){
	        $this->getSysAppConfig = $this->post_req("getSysAppConfig",[]);
	        Session::put('getSysAppConfig', $this->getSysAppConfig);
        	Session::save();
	    }
	    $data = empty($this->getSysAppConfig)?$this->getSysAppConfig = Session::get('getSysAppConfig'):$this->getSysAppConfig;
	    
	    $data_check = Session::get('user_loan_details');
		return view('kyc-documentation.bank_details')->with(array('data'=> $data['data'], 'data_check'=> $data_check));
	}
	public function bank_details_fill(Request $request){
	    $this->user_detail = empty($this->user_detail)?Session::get('user_detail'):$this->user_detail;
	    
		$applicant_code = $this->user_detail['applicant_code'];
		$loan_app_no = isset($this->user_detail['loan_app_no'])?$this->user_detail['loan_app_no']:"";
		
		$body = $request->all();
        $body['applicant_code'] = $applicant_code;
        $body['loan_app_no'] = $loan_app_no;
	    
		$data = $this->post_wt_token_req("submitLoanApplicationBankDetails",$body);
		//dd($data);
		if($data['status'] == 1){
			
        	Session::put('loan_status', $data['data']);
        	Session::save();
        	
        	$user_filled_details = Session::get('user_filled_details');
    		$user_filled_details['bank'] = $body;
    		Session::put('user_filled_details', $user_filled_details);
            Session::save();
            
            $loan_details = Session::get('user_loan_details');
            $loan_details['loan_status']['next_status']['loan_status'] = "sanction_letter";
            Session::put('user_loan_details', $loan_details);
            Session::save();
        	
			return redirect()->route('dash.loan_application_complete_evalution')->withSuccess($data['message']);
		} else if($data['status'] == 2){
        	$request->session()->flash('apiError', $data['data']);
			return redirect()->back()->withInput();
		} else if($data['status'] == 0){
			$request->session()->flash('error', $data['message']);
			return redirect()->back()->withInput();
		}
        return redirect()->route('dash.bank-details');
	}
	public function bank_info_ifsc(Request $request){
	    $this->user_detail = empty($this->user_detail)?Session::get('user_detail'):$this->user_detail;
		$applicant_code = $this->user_detail['applicant_code'];
		$loan_app_no = isset($this->user_detail['loan_app_no'])?$this->user_detail['loan_app_no']:"";
	    $ifsc = $request->ifsc;
	    $body = [
	                "applicant_code"=>$applicant_code, 
	                "ifsc"=>$ifsc, 
	                "loan_app_no"=>$loan_app_no
	           ];
		$data = $this->post_req("verifyIFSC",$body);
		return $data;
	}
	public function loan_application_complete_evalution(){
		return view('kyc-documentation.loan_application_complete_evalution');
	}
	
}
