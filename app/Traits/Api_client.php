<?php
namespace App\Traits;

use GuzzleHttp\Client;
use Session;

trait Api_client{
	
	function __construct() {
	    
	}
	private function get_obj() {
		return new Client();
	}
	private function get_api_url() {
		return "http://3.7.86.3/api/loans/";
	}
	public function get_req($action,$body = []) {
	    $obj = $this->get_obj();
		$api_url = $this->get_api_url();
	    $url = $api_url.$action;
	    $response = $obj->request('GET', $url,$body);
	    $results = $response->getBody()->getContents();
	    $results = json_decode($results,true);
	    return $results;
	}
	public function post_req($action,$body = []) {
	    $obj = $this->get_obj();
		$api_url = $this->get_api_url();
	    $url = $api_url.$action;
	    $response = $obj->request('POST', $url, [
	        'form_params' => $body
	    ]);

	    $results = $response->getBody()->getContents();
	    $results = json_decode($results, true);
	    return $results;
	}
	public function post_req_files($action,$body = [],$multipart = []) {
	    $obj = $this->get_obj();
		$api_url = $this->get_api_url();
	    $url = $api_url.$action;
	    $headers = [
		    'cache-control'        => 'no-cache',
		    'content-type'        => 'multipart/form-data;',
		];
	    $response = $obj->request('POST', $url, [
	        'query'=>$body,
	        'multipart' => $multipart,
	    ]);

	    $results = $response->getBody()->getContents();
	    $results = json_decode($results, true);
	    return $results;
	}
	
	public function post_wt_token_req($action,$body = []) {
		$user_info = Session::get('user_detail');
		$token = $user_info['token'];
		$obj = $this->get_obj();
		$api_url = $this->get_api_url();
	    $url = $api_url.$action;
		$headers = [
		    'Authorization' => 'Bearer ' . $token,
		    'Accept'        => 'application/json',
		];

	    //$url = $this->url.$action;
	    $response = $obj->request('POST', $url, [
	        'form_params' => $body,
	        'headers' => $headers
	    ]);
	    $results = $response->getBody()->getContents();
	    $results = json_decode($results, true);
	    return $results;
	}
	public function get_next_status(){
        return array(   "loan_creation"=>"personal-detail",
                        "address"=>"address-info",
                        "employment"=>"employment-info",
                        "document"=>"kyc-documents",
                        "bank_details"=>"bank-details",
                        "sanction_letter"=>"sanction-letter",
                        "e_agreement"=>"sign-eligibilty",
                        "e_nach"=>"pre-proceding",
                        "disbursed"=>"disbursed",
                        "awaiting_approval"=>"awaiting_approval"
                    );
	}
}
?>








