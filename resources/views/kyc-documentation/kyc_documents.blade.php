@extends('user.include.app')
@section('content')

<!--<div id="camera" style="height:auto;width:auto; text-align:left;"></div>-->
<!--FOR THE SNAPSHOT-->
<!--<input type="button" value="Take a Snap" id="btPic" onclick="takeSnapShot()" /> -->
<!--<p id="snapShot"></p>-->
<style>
.help-blocks{color:red;}
.left, .right{height:auto !important;}    
.progress-wrp {
    border: 1px solid #0099CC;
    margin: 10px;
    box-shadow: inset 1px 3px 6px rgba(0, 0, 0, 0.12);
    background: transparent;
    border-radius: 20px;
    color: #d71f26;
    height: 37px;
    border: 1px solid #d71f26;
    font-weight: 400;
    font-size: 15px;
    letter-spacing: 1px;
    display: inline-block;
    width: 100%;
    cursor: pointer;
    padding: 6px 8px;
    text-align: center;
    max-width: 88%;
    line-height: 32px;
    overflow: hidden;
    position:relative;
}
.progress-wrp .progress-bar{
	    height: 100%;
    border-radius: 0;
    background-color: #243e8f;
    width: 0;
    box-shadow: inset 1px 1px 10px rgba(0, 0, 0, 0.11);
    display: block;
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
}
.progress-wrp .status{
	top: 2px;
    left: 0;
    right: 0;
    display: block;
    color: #000000;
    bottom: 0;
    margin: auto;
    position: absolute;
}
.login-wrapper .left .inner-sec{position:fixed;
    left: 0;
    width: 50%;}
.copyright{position:relative;z-index:1;}    
@media (max-width:767px){
.login-wrapper .left .inner-sec{position:static;left:0;width:100%;}    
}    
</style>

<div class="login-wrapper otp-varification new-kyc-doc">
	<div class="left" style="background:transparent;background-color:#f5f5f5">
		<div class="inner-sec">
			<div class="details employment-details-cover">
			    <input type="hidden" id="p_eq_c" value="{{ isset(Session::get('user_detail')['p_eq_c'])?Session::get('user_detail')['p_eq_c']:0 }}">
				<div class="loancomple-step" style="margin-top:0;" >

					<ul>
					    <li class="active"><a href="{{ url('employment-info') }}">Loan<br/>Application</a></li>
					    @if(isset($data_check['loan_status']['next_status']['loan_status']) && ($data_check['loan_status']['next_status']['loan_status'] == "bank_details" || $data_check['loan_status']['next_status']['loan_status'] == "sanction_letter" || $data_check['loan_status']['next_status']['loan_status'] == "e_agreement" || $data_check['loan_status']['next_status']['loan_status'] == "e_nach" || $data_check['loan_status']['next_status']['loan_status'] == "disbursed" || $data_check['loan_status']['next_status']['loan_status'] == "awaiting_approval"))
						
						    <li class="active"><a href="{{ url('kyc-documents') }}">KYC<br/>Documents</a></li>
						 @else
						    <li><a href="#">KYC<br/>Documents</a></li>
						 @endif
						 @if(isset($data_check['loan_status']['next_status']['loan_status']) && ($data_check['loan_status']['next_status']['loan_status'] == "e_nach" || $data_check['loan_status']['next_status']['loan_status'] == "disbursed"))
						
						    <li class="active"><a href="{{ url('dashboard/') }}">Sign<br/>Agreement</a></li>
						 @else
						    <li><a href="#">Sign<br/>Agreement</a></li>
						 @endif
						@if(isset($data_check['loan_status']['next_status']['loan_status']) && ($data_check['loan_status']['next_status']['loan_status'] == "disbursed"))
						
						    <li class="active"><a href="{{ url('dashboard/') }}">Register<br/>Auto Debit</a></li>
						 @else
						    <li><a href="#">Register<br/>Auto Debit</a></li>
						 @endif
						
					</ul>
					
				</div>
				<!-- end of header-sec -->

				<div class="complete-login" >

                    <divv class="kyc-doc-center">
					<ul>
						<li class="pan"><a href="#"><span><img src="{{ asset('assets/images/kyc-pan.png') }}" title="Apply Now" alt="Apply Now"></span>PAN Card</a>
							<div class="attach-files">
								
							</div>
						</li>
						<li class="permanent-add"><a href="#"><span><img src="{{ asset('assets/images/address-icon.png') }}" title="Apply Now" alt="Apply Now"></span>Permanent Address Proof</a>
							<div class="attach-files">
							
							</div>
						</li>
						<li class="Current-add" style="display:{{ (isset(Session::get('user_detail')['p_eq_c']) && Session::get('user_detail')['p_eq_c'] == 0)?'block;':'none;' }}"><a href="#"><span><img src="{{ asset('assets/images/address-icon.png') }}" title="Apply Now" alt="Apply Now"></span>Current Address Proof</a>
							<div class="attach-files">
								
							</div>
						</li>
							<li class="bank-statement"><a href="#"><span><img src="{{ asset('assets/images/bank-statement.png') }}" title="Apply Now" alt="Apply Now"></span>Bank Statement</a>
								<div class="attach-files">
									
								</div>
							</li>
						<li class="salary-slip"><a href="#"><span><img src="{{ asset('assets/images/bank-statement.png') }}" title="Apply Now" alt="Apply Now"></span>Salary Slips</a>
							<div class="attach-files">
								
							</div>
						</li>
						<li class="photo-selfie"><a href="#"><span><img src="{{ asset('assets/images/selfie.png') }}" title="Apply Now" alt="Apply Now"></span>Photo / Selfie</a>
							<div class="attach-files">
								
							</div>
						</li>
					</ul>
					<span class="help-blocks" id="kyc_error"></span>
					<div class="form-action">
                        <input class="white-btn" type="button" title="Submit" id="phase" name="submit" value="Continue">
                        <!--disabled-->
                    </div>
			
				</div>


			</div>
			<!-- end of verification-cover -->			
		</div>
	</div>
	<div class="right" style="height:auto">
		<div class="inner-sec">

				<div class="adhaar-bg"></div>
				<div class="pancard-doc" style="display:block;">
					<div class="doc-title">
						<h3>PAN Card</h3>
					</div>
					<p class="upload-msg">Please upload PAN Card as
Identification Proof </p>
                    <span class="help-blocks status-failed"></span>	
                    @php
                		$is_uploaded = 0;
                		$uploaded_url = "";
                	@endphp
                	@if(isset($doc_list[3]['min_req_completed']) && $doc_list[3]['min_req_completed'] == "Y")
                		@php
                			$is_uploaded = 1;
                			$uploaded_url = $doc_list[3]['sub_doc_list'][0]['url'];
                		@endphp
                	@endif
				<div class="upload-box {{ ($is_uploaded == 1)?'uploaded-img':''}}">
				    
				    
                
				    <div class="uploaded-image">
				        <img src="{{ $uploaded_url }}" title="" alt="" />
				    </div>    
                <input type="hidden" class="is_uploaded" name="is_uploaded" value="{{ $is_uploaded }}">
                <input type="hidden" class="uploaded_url" nam="uploaded_url" value="{{ $uploaded_url }}">	
				<div class="upload-now">		

				<div class="camera-option pan-camera">
						<div class="adhar-pop-inner">						
						<!--<div class="adhar-pop-box">-->

						<!--	<div class="adhar-in">-->
						<!--		<span><img src="{{ asset('assets/images/selfie.png') }}" title="" alt="" /></span>-->
						<!--	<label class="upload-text">Take Photo of Pan Card</label>-->
						<!--	</div>-->
						<!--</div>-->
						<!-- end of adhar-pop-box -->
						<div class="adhar-pop-box">
							<div class="adhar-in">						
							<input type="file" class="upd_file" data-lbl="PAN" id="p_pan" name="upd_pan" hidden>
							<span><img src="{{ asset('assets/images/upload-pic.png') }}" title="" alt="" /></span>
							<?php if(isset($doc_list[3]['min_req_completed']) && $doc_list[3]['min_req_completed'] == "Y"){
                                  $uploaded_img = $doc_list[3]['sub_doc_list'][0]['url'];
                              } else {
                                  $uploaded_img = "";
                              }
                              ?>
                              <!--<img src="{{$uploaded_img}}">-->
							<label class="upload-text" for="p_pan">Choose PAN Card from Device</label>
							</div>
						</div>
						<!-- end of adhar-pop-box -->
						
							<div class="form-action">
                                <div class="progress-wrp">
                                    <div class="progress-bar" style="width:0%"></div >
                                    <div class="status">Uploading</div>
                                </div>
                            </div>
                    
					</div>
				</div>
				<!-- end of camera-option -->



					
						
						<!-- <input type="file" id="actual-btn3" hidden=""> -->
							
							<label class="after_remove">Select File</label>
					</div>

					<div class="card-type pancard-tyep">
						<div class="update-image"><img src="{{ asset('assets/images/update-icon.png') }}" title="" alt=""></div>
						<div class="update-options">
							<!--<a href="{{$uploaded_img}}" target="_blank" download>Download</a>-->
							<a href="#" class="update-now">Update</a>
						</div>
						<!-- end of update-options -->
						<span class="icon-sec"><img src="{{ asset('assets/images/kyc-pan.png') }}" title="" alt=""></span><span>PAN Card</span>
						<span class="instru-icon-sec instruction-tooltip"><img src="{{ asset('assets/images/ic_note.png') }}" title="" alt="">
						<span class="tooltiptext">
						    <div class="note-sec">
						<p>Instructions:</p>
						<ul>
							<li>Ensure to take the photo of the original document</li>
							<li>Do not take photo of computer or any device screen</li>
							<li>Document should be clear, colored and readable  </li>
							<li>Do not upload black and white image </li>
							<li>All 4 corners of the document should be visible </li>
							<li>Please upload documents in JPG, JPEG and PNG format only </li>
						</ul>
					</div>    
						    
						</span>
						</span>
					</div>
					
				</div>	
				

				<div class="cardpopbg">
				</div>
				
				
				</div>
				<!-- end of pancard-doc -->

				<div class="permanennt-address-doc" style="display:none;">

					<div class="adhaar-bg"></div>
				
					
					<div class="doc-title">
						<h3>Permanent Address Proof</h3>
					</div>
					<p class="upload-msg">Please upload any one of the following </p>
                    <span class="help-blocks status-failed"></span>	
				    @php
                		$is_uploaded = 0;
                		$is_uploaded_one = 0;
                		$is_uploaded_left = 0;
                		$is_uploaded_right = 0;
                		$uploaded_url = "";
                		$uploaded_url_back = "";
                	@endphp
                	@if(isset($doc_list[4]['min_req_completed']) && $doc_list[4]['min_req_completed'] == "Y")
                		@php
                			$is_uploaded = 1;
                			$is_uploaded_left = 1;
                		    $is_uploaded_right = 1;
                			$uploaded_url = $doc_list[4]['sub_doc_list'][0]['url'];
                			$uploaded_url_back = $doc_list[4]['sub_doc_list'][1]['url'];
                		@endphp
                	@else
                	    @if(isset($doc_list[4]['sub_doc_list'][0]['is_uploaded']) && $doc_list[4]['sub_doc_list'][0]['is_uploaded'] == "Y")
                    		@php
                    		    $is_uploaded_one = 1;
                    		    $is_uploaded_left = 1;
                    			$uploaded_url = $doc_list[4]['sub_doc_list'][0]['url'];
                    		@endphp
                    	@endif
                    	@if(isset($doc_list[4]['sub_doc_list'][1]['is_uploaded']) && $doc_list[4]['sub_doc_list'][1]['is_uploaded'] == "Y")
                    		@php
                    		    $is_uploaded_right = 1;
                    		    $is_uploaded_one = 1;
                    			$uploaded_url_back = $doc_list[4]['sub_doc_list'][1]['url'];
                    		@endphp
                    	@endif
                	@endif
				    
				    
				
				
				<div class="upload-box adhaar-box extra-files {{ ($is_uploaded == 1 || $is_uploaded_one == 1)?'uploaded-img':''}}">
				    
                     <div class="uploaded-image forntview double-view">
				        <img src="{{ $uploaded_url }}" title="" alt="" />
				    </div>
				    
				    <div class="uploaded-image back-view double-view">
				        <img src="{{ $uploaded_url_back }}" title="" alt="" />
				    </div>
				    
                <input type="hidden" class="is_uploaded" name="is_uploaded" value="{{ $is_uploaded }}">
                <input type="hidden" class="uploaded_url" nam="uploaded_url" value="{{ $uploaded_url }}">
                <input type="hidden" class="uploaded_url_back" nam="uploaded_url_back" value="{{ $uploaded_url_back }}">
					<div class="upload-now">
			
				<div class="camera-option adhaar-camera">
						<div class="adhar-pop-inner">						
						<!--<div class="adhar-pop-box">-->

						<!--	<div class="adhar-in">-->
						<!--		<span><img src="{{ asset('assets/images/selfie.png') }}" title="" alt="" /></span>-->
						<!--	<label class="upload-text">Take Photo of Aadhar Card</label>-->
						<!--	</div>-->
						<!--</div>-->
						<!-- end of adhar-pop-box -->
						<div class="adhar-pop-box">
							<div class="adhar-in">						
							<!-- <input type="file" id="actual-btn4" hidden=""> -->
							<span><img src="{{ asset('assets/images/upload-pic.png') }}" title="" alt="" /></span>			
							<!--<input type="file" class="upd_file" id="p_lblaadhar" name="upd_aadhar" data-lbl="PADHR" hidden="">-->
							<label class="upload-text" >Choose Aadhaar Card from Device</label>
							
							</div>
						</div>
						<!-- end of adhar-pop-box -->
						
						    <div class="form-action">
                                <div class="progress-wrp">
                                    <div class="progress-bar" style="width:0%"></div >
                                    <div class="status">Uploading</div>
                                </div>
                            </div>
                            
					</div>
				</div>
				<!-- end of camera-option -->

					
						
						<!-- <input type="file" id="actual-btn3" hidden/>
							 -->
							<label class="after_remove front_lbl split-view {{ ($is_uploaded_left == 1)?' box-none':''}}">Upload front side</label>
							<label class="after_remove back_lbl split-view {{ ($is_uploaded_right == 1)?' box-none':''}}">Upload back side </label>
							
					</div>
					<div class="card-type pancard-tyep">
						<div class="update-image"><img src="{{ asset('assets/images/update-icon.png') }}" title="" alt="" /></div>
						<div class="update-options">
							<!--<a href="{{$uploaded_img}}" target="_blank" download>Download</a>-->
							<a href="#" class="update-now">Update</a>
						</div>
						<!-- end of update-options -->
						<span class="icon-sec"><img src="{{ asset('assets/images/kyc-pan.png') }}" title="" alt=""></span><span>Aadhaar Card</span>
						
						<span class="instru-icon-sec instruction-tooltip"><img src="{{ asset('assets/images/ic_note.png') }}" title="" alt="">
						<span class="tooltiptext">
						    <div class="note-sec">
						<p>Instructions:</p>
						<ul>
							<li>Name and address should be clearly visible in the document</li>
							<li>Ensure to take the photo of the original document</li>
							<li>Do not take photo of computer or any device screen</li>
							<li>Document should be clear, colored and readable  </li>
							<li>Do not upload black and white image </li>
							<li>All 4 corners of the document should be visible  </li>
							<li>Please upload documents in JPG, JPEG and PNG format only</li>
						</ul>
					</div>    
						    
						</span>
						</span>
						
					</div>
				</div>	
				<!-- end of upload-box -->
				
				<div class="adhaar-bg"></div>
				<div class="adhar-card-pop adhaar">
					<div class="adhar-pop-inner">
					    <button type="button" class="close" style="float:right;color:red;">&times;</button>
						<h4>Permanent Address Proof</h4>
						<div class="adhar-pop-box">
							<div class="adhar-in">
						
						<input type="file" class="upd_file permanent" id="p_lblaadhar" name="upd_aadhar" data-lbl="PADHR" hidden>
							
							<label class="upload-text" for="p_lblaadhar">Aadhaar Card - Front Side</label>
							@php
                        		$is_uploaded = 0;
                        		$uploaded_url = "";
                        		$uploaded_url_back = "";
                        	@endphp
                        	@if(isset($doc_list[4]['sub_doc_list'][0]['is_uploaded']) && $doc_list[4]['sub_doc_list'][0]['is_uploaded'] == "Y")
                        		@php
                        			$is_uploaded = 1;
                        			$uploaded_url = $doc_list[4]['sub_doc_list'][0]['url'];
                        		@endphp
                        	@endif
							<label class="upload-btn" for="p_lblaadhar" style="{{ ($is_uploaded == 1)?'color:green; border:2px solid green;':'' }}">{{ ($is_uploaded == 1)?'DONE':'ADD' }}</label>
							</div>
						</div>
						  <!-- end of adhar-pop-box -->

						<div class="adhar-pop-box">
							<div class="adhar-in">
						
						<input type="file" class="upd_file permanent" id="p_lblaadhar_back" name="upd_aadhar" data-lbl="PADHR1" hidden>
							
							<label class="upload-text" for="p_lblaadhar_back">Aadhaar Card - Back Side</label>
							@php
                        		$is_uploaded = 0;
                        		$uploaded_url = "";
                        		$uploaded_url_back = "";
                        	@endphp
                        	@if(isset($doc_list[4]['sub_doc_list'][1]['is_uploaded']) && $doc_list[4]['sub_doc_list'][1]['is_uploaded'] == "Y")
                        		@php
                        			$is_uploaded = 1;
                        			$uploaded_url = $doc_list[4]['sub_doc_list'][1]['url'];
                        			$uploaded_url_back = $doc_list[4]['sub_doc_list'][1]['url'];
                        		@endphp
                        	@endif
							<label class="upload-btn" for="p_lblaadhar_back" style="{{ ($is_uploaded == 1)?'color:green; border:2px solid green;':'' }}">{{ ($is_uploaded == 1)?'DONE':'ADD' }}</label>
							</div>
						</div>
						 <!-- end of adhar-pop-box --> 
						
						<div class="form-action">
                                <div class="progress-wrp">
                                    <div class="progress-bar" style="width:0%"></div >
                                    <div class="status">Uploading</div>
                                </div>
                            </div>

					</div>
					<!-- end of adhar-pop-inner -->
				</div>	
				<!-- end of adhar-card-pop -->			
				
				
                    @php
                		$is_uploaded = 0;
                		$is_uploaded_one = 0;
                		$is_uploaded_left = 0;
                		$is_uploaded_right = 0;
                		$uploaded_url = "";
                		$uploaded_url_back = "";
                	@endphp
                	@if(isset($doc_list[10]['min_req_completed']) && $doc_list[10]['min_req_completed'] == "Y")
                		@php
                			$is_uploaded = 1;
                			$is_uploaded_left = 1;
                		    $is_uploaded_right = 1;
                			$uploaded_url = $doc_list[10]['sub_doc_list'][0]['url'];
                			$uploaded_url_back = $doc_list[10]['sub_doc_list'][1]['url'];
                		@endphp
                	@else
                	    @if(isset($doc_list[10]['sub_doc_list'][0]['is_uploaded']) && $doc_list[10]['sub_doc_list'][0]['is_uploaded'] == "Y")
                    		@php
                    		    $is_uploaded_one = 1;
                    		    $is_uploaded_left = 1;
                    			$uploaded_url = $doc_list[10]['sub_doc_list'][0]['url'];
                    		@endphp
                    	@endif
                    	@if(isset($doc_list[10]['sub_doc_list'][1]['is_uploaded']) && $doc_list[10]['sub_doc_list'][1]['is_uploaded'] == "Y")
                    		@php
                    		    $is_uploaded_one = 1;
                    		    $is_uploaded_right = 1;
                    			$uploaded_url_back = $doc_list[10]['sub_doc_list'][1]['url'];
                    		@endphp
                    	@endif
                	@endif
				
				<div class="upload-box passport-box extra-files {{ ($is_uploaded == 1 || $is_uploaded_one == 1)?'uploaded-img':''}}">
				    
                    <div class="uploaded-image forntview double-view">
				        <img src="{{ $uploaded_url }}" title="" alt="" />
				    </div>   
				    <div class="uploaded-image back-view double-view">
				        <img src="{{ $uploaded_url_back }}" title="" alt="" />
				    </div>
                <input type="hidden" class="is_uploaded" name="is_uploaded" value="{{ $is_uploaded }}">
                <input type="hidden" class="uploaded_url" nam="uploaded_url" value="{{ $uploaded_url }}">
                <input type="hidden" class="uploaded_url_back" nam="uploaded_url_back" value="{{ $uploaded_url_back }}">
					<div class="upload-now">
				
				<div class="camera-option adhaar-camera">
						<div class="adhar-pop-inner">						
						<!--<div class="adhar-pop-box">-->

						<!--	<div class="adhar-in">-->
						<!--		<span><img src="{{ asset('assets/images/selfie.png') }}" title="" alt="" /></span>-->
						<!--	<label class="upload-text">Take Photo of Passport Card</label>-->
						<!--	</div>-->
						<!--</div>-->
						<!-- end of adhar-pop-box -->
						<div class="adhar-pop-box">
							<div class="adhar-in">						
							<!--<input type="file" class="upd_file" data-lbl="PPassport" id="p_lblpass" name="upd_pass" hidden>-->
							<span><img src="{{ asset('assets/images/upload-pic.png') }}" title="" alt="" /></span>							
							<label class="upload-text">Choose Passport Card from Device</label>
							</div>
						</div>
						<!-- end of adhar-pop-box -->
						
						<div class="form-action">
                                <div class="progress-wrp">
                                    <div class="progress-bar" style="width:0%"></div >
                                    <div class="status">Uploading</div>
                                </div>
                            </div>
                            
					</div>
				</div>
				<!-- end of camera-option -->

					
						
						<!-- <input type="file" id="actual-btn3" hidden=""> -->
							
							<label class="after_remove front_lbl split-view {{ ($is_uploaded_left == 1)?'box-none':''}}">Upload front side</label>
							<label class="after_remove back_lbl split-view {{ ($is_uploaded_right == 1)?'box-none':''}}">Upload back side </label>
					</div>
					<div class="card-type pancard-tyep">
						<div class="update-image"><img src="{{ asset('assets/images/update-icon.png') }}" title="" alt="" /></div>
						<div class="update-options">
							<!--<a href="{{$uploaded_img}}" target="_blank" download>Download</a>-->
							<a href="#" class="update-now">Update</a>
						</div>
						<!-- end of update-options -->
						<span class="icon-sec"><img src="{{ asset('assets/images/Passport.png') }}" title="" alt=""></span><span>Passport</span>
						
						<span class="instru-icon-sec instruction-tooltip"><img src="{{ asset('assets/images/ic_note.png') }}" title="" alt="">
						<span class="tooltiptext">
						    <div class="note-sec">
						<p>Instructions:</p>
						<ul>
							<li>Name and address should be clearly visible in the document</li>
							<li>Ensure to take the photo of the original document</li>
							<li>Do not take photo of computer or any device screen</li>
							<li>Document should be clear, colored and readable  </li>
							<li>Do not upload black and white image </li>
							<li>All 4 corners of the document should be visible  </li>
							<li>Please upload documents in JPG, JPEG and PNG format only</li>
						</ul>
					</div>    
						    
						</span>
						</span>
						
						
					</div>
				</div>	
				<!-- end of upload-box -->
				
				
				<div class="adhaar-bg"></div>
				<div class="adhar-card-pop passport">
					<div class="adhar-pop-inner">
					    <button type="button" class="close" style="float:right;color:red;">&times;</button>
						<h4>Permanent Address Proof</h4>
						<div class="adhar-pop-box">
							<div class="adhar-in">
						
						<input type="file" class="upd_file permanent" id="p_lblpassport" name="upd_passport" data-lbl="Passport" hidden>
							
							<label class="upload-text" for="p_lblpassport">Passport - Front Side</label>
							@php
                        		$is_uploaded = 0;
                        		$uploaded_url = "";
                        	@endphp
                        	@if(isset($doc_list[10]['sub_doc_list'][0]['is_uploaded']) && $doc_list[10]['sub_doc_list'][0]['is_uploaded'] == "Y")
                        		@php
                        			$is_uploaded = 1;
                        			$uploaded_url = $doc_list[10]['sub_doc_list'][0]['url'];
                        		@endphp
                        	@endif
							<label class="upload-btn" for="p_lblpassport" style="{{ ($is_uploaded == 1)?'color:green; border:2px solid green;':'' }}">{{ ($is_uploaded == 1)?'DONE':'ADD' }}</label>
							</div>
						</div>
						  <!-- end of adhar-pop-box -->

						<div class="adhar-pop-box">
							<div class="adhar-in">
						
						<input type="file" class="upd_file permanent" id="p_lblpassport_back" name="upd_passport_back" data-lbl="Passport1" hidden>
							
							<label class="upload-text" for="p_lblpassport_back">Passport - Back Side</label>
							@php
                        		$is_uploaded = 0;
                        		$uploaded_url = "";
                        	@endphp
                        	@if(isset($doc_list[10]['sub_doc_list'][1]['is_uploaded']) && $doc_list[10]['sub_doc_list'][1]['is_uploaded'] == "Y")
                        		@php
                        			$is_uploaded = 1;
                        			$uploaded_url = $doc_list[10]['sub_doc_list'][1]['url'];
                        		@endphp
                        	@endif
							<label class="upload-btn" for="p_lblpassport_back" style="{{ ($is_uploaded == 1)?'color:green; border:2px solid green;':'' }}">{{ ($is_uploaded == 1)?'DONE':'ADD' }}</label>
							</div>
						</div>
						 <!-- end of adhar-pop-box --> 
						
						<div class="form-action">
                                <div class="progress-wrp">
                                    <div class="progress-bar" style="width:0%"></div >
                                    <div class="status">Uploading</div>
                                </div>
                            </div>

					</div>
					<!-- end of adhar-pop-inner -->
				</div>	
				<!-- end of adhar-card-pop -->	
				
				

                    @php
                		$is_uploaded = 0;
                		$is_uploaded_one = 0;
                		$is_uploaded_left = 0;
                		$is_uploaded_right = 0;
                		$uploaded_url = "";
                		$uploaded_url_back = "";
                	@endphp
                	@if(isset($doc_list[6]['min_req_completed']) && $doc_list[6]['min_req_completed'] == "Y")
                		@php
                			$is_uploaded = 1;
                			$is_uploaded_left = 1;
                		    $is_uploaded_right = 1;
                			$uploaded_url = $doc_list[6]['sub_doc_list'][0]['url'];
                			$uploaded_url_back = $doc_list[6]['sub_doc_list'][1]['url'];
                		@endphp
                	@else
                	    @if(isset($doc_list[6]['sub_doc_list'][0]['is_uploaded']) && $doc_list[6]['sub_doc_list'][0]['is_uploaded'] == "Y")
                    		@php
                    		    $is_uploaded_one = 1;
                    		    $is_uploaded_left = 1;
                    			$uploaded_url = $doc_list[6]['sub_doc_list'][0]['url'];
                    		@endphp
                    	@endif
                    	@if(isset($doc_list[6]['sub_doc_list'][1]['is_uploaded']) && $doc_list[6]['sub_doc_list'][1]['is_uploaded'] == "Y")
                    		@php
                    		    $is_uploaded_one = 1;
                    		    $is_uploaded_right = 1;
                    			$uploaded_url_back = $doc_list[6]['sub_doc_list'][1]['url'];
                    		@endphp
                    	@endif
                	@endif
				
                
                <div class="upload-box voterid-box extra-files {{ ($is_uploaded == 1 || $is_uploaded_one == 1)?'uploaded-img':''}}">
                    
                    <div class="uploaded-image forntview double-view">
				        <img src="{{ $uploaded_url }}" title="" alt="" />
				    </div>
				    
				    <div class="uploaded-image back-view double-view">
				        <img src="{{ $uploaded_url_back }}" title="" alt="" />
				    </div>
				    
                <input type="hidden" class="is_uploaded" name="is_uploaded" value="{{ $is_uploaded }}">
                <input type="hidden" class="uploaded_url" name="uploaded_url" value="{{ $uploaded_url }}">
                <input type="hidden" class="uploaded_url_back" name="uploaded_url_back" value="{{ $uploaded_url_back }}">
					<div class="upload-now">


					<div class="camera-option adhaar-camera">
						<div class="adhar-pop-inner">						
						<!--<div class="adhar-pop-box">-->

						<!--	<div class="adhar-in">-->
						<!--		<span><img src="{{ asset('assets/images/selfie.png') }}" title="" alt="" /></span>-->
						<!--	<label class="upload-text">Take Photo of Voter ID Card</label>-->
						<!--	</div>-->
						<!--</div>-->
						<!-- end of adhar-pop-box -->
						<div class="adhar-pop-box">
							<div class="adhar-in">						
							<!--<input type="file" class="upd_file" id="p_lblvoter" name="upd_voter" data-lbl="PVI" hidden>-->
							<span><img src="{{ asset('assets/images/upload-pic.png') }}" title="" alt="" /></span>							
							<label class="upload-text">Choose Voter ID Card from Device</label>
							</div>
						</div>
						<!-- end of adhar-pop-box -->
						
						<div class="form-action">
                                <div class="progress-wrp">
                                    <div class="progress-bar" style="width:0%"></div >
                                    <div class="status">Uploading</div>
                                </div>
                            </div>
                            
					</div>
				</div>
				<!-- end of camera-option -->


					
						
						<!-- <input type="file" id="actual-btn3" hidden=""> -->
							
							<label class="after_remove front_lbl split-view {{ ($is_uploaded_left == 1)?'box-none':'' }}">Upload front side</label>
							<label class="after_remove back_lbl split-view {{ ($is_uploaded_right == 1)?'box-none':'' }}">Upload back side </label>
					</div>
					<div class="card-type pancard-tyep">
						<div class="update-image"><img src="{{ asset('assets/images/update-icon.png') }}" title="" alt="" /></div>
						<div class="update-options">
							<!--<a href="{{$uploaded_img}}" target="_blank" download>Download</a>-->
							<a href="#" class="update-now">Update</a>
						</div>
						<!-- end of update-options -->
						<span class="icon-sec"><img src="{{ asset('assets/images/kyc-pan.png') }}" title="" alt=""></span><span>Voter ID</span>
						<span class="instru-icon-sec instruction-tooltip"><img src="{{ asset('assets/images/ic_note.png') }}" title="" alt="">
						<span class="tooltiptext">
						    <div class="note-sec">
						<p>Instructions:</p>
						<ul>
							<li>Name and address should be clearly visible in the document</li>
							<li>Ensure to take the photo of the original document</li>
							<li>Do not take photo of computer or any device screen</li>
							<li>Document should be clear, colored and readable  </li>
							<li>Do not upload black and white image </li>
							<li>All 4 corners of the document should be visible  </li>
							<li>Please upload documents in JPG, JPEG and PNG format only </li>
						</ul>
					</div>    
						    
						</span>
						</span>
						
					</div>
				</div>	
				<!-- end of upload-box -->
				
				
				
				<div class="adhaar-bg"></div>
				<div class="adhar-card-pop voterid">
					<div class="adhar-pop-inner">
					    <button type="button" class="close" style="float:right;color:red;">&times;</button>
						<h4>Permanent Address Proof</h4>
						<div class="adhar-pop-box">
							<div class="adhar-in">
						
						<input type="file" class="upd_file permanent" id="p_lblvoterid" name="upd_voterid" data-lbl="PVI" hidden>
							
							<label class="upload-text" for="p_lblvoterid">Voter ID - Front Side</label>
							@php
                        		$is_uploaded = 0;
                        		$uploaded_url = "";
                        	@endphp
                        	@if(isset($doc_list[6]['sub_doc_list'][0]['is_uploaded']) && $doc_list[6]['sub_doc_list'][0]['is_uploaded'] == "Y")
                        		@php
                        			$is_uploaded = 1;
                        			$uploaded_url = $doc_list[6]['sub_doc_list'][0]['url'];
                        		@endphp
                        	@endif
							<label class="upload-btn" for="p_lblvoterid" style="{{ ($is_uploaded == 1)?'color:green; border:2px solid green;':'' }}">{{ ($is_uploaded == 1)?'DONE':'ADD' }}</label>
							</div>
						</div>
						  <!-- end of adhar-pop-box -->

						<div class="adhar-pop-box">
							<div class="adhar-in">
						
						<input type="file" class="upd_file permanent" id="p_lblvoterid_back" name="upd_voterid_back" data-lbl="PVI1" hidden>
							
							<label class="upload-text" for="p_lblvoterid_back">Voter ID - Back Side</label>
							@php
                        		$is_uploaded = 0;
                        		$uploaded_url = "";
                        	@endphp
                        	@if(isset($doc_list[6]['sub_doc_list'][1]['is_uploaded']) && $doc_list[6]['sub_doc_list'][1]['is_uploaded'] == "Y")
                        		@php
                        			$is_uploaded = 1;
                        			$uploaded_url = $doc_list[6]['sub_doc_list'][1]['url'];
                        		@endphp
                        	@endif
							<label class="upload-btn" for="p_lblvoterid_back" style="{{ ($is_uploaded == 1)?'color:green; border:2px solid green;':'' }}">{{ ($is_uploaded == 1)?'DONE':'ADD' }}</label>
							</div>
						</div>
						 <!-- end of adhar-pop-box --> 
						
						<div class="form-action">
                                <div class="progress-wrp">
                                    <div class="progress-bar" style="width:0%"></div >
                                    <div class="status">Uploading</div>
                                </div>
                            </div>

					</div>
					<!-- end of adhar-pop-inner -->
				</div>	
				<!-- end of adhar-card-pop -->

                    @php
                		$is_uploaded = 0;
                		$uploaded_url = "";
                	@endphp
                	@if(isset($doc_list[5]['min_req_completed']) && $doc_list[5]['min_req_completed'] == "Y")
                		@php
                			$is_uploaded = 1;
                			$uploaded_url = $doc_list[5]['sub_doc_list'][0]['url'];
                		@endphp
                	@endif
                
                <div class="upload-box driving-box {{ ($is_uploaded == 1)?'uploaded-img':''}}">
                    
                    <div class="uploaded-image">
				        <img src="{{ $uploaded_url }}" title="" alt="" />
				    </div>         
                <input type="hidden" class="is_uploaded" name="is_uploaded" value="{{ $is_uploaded }}">
                <input type="hidden" class="uploaded_url" nam="uploaded_url" value="{{ $uploaded_url }}">
					<div class="upload-now">


					<div class="camera-option adhaar-camera">
						<div class="adhar-pop-inner">						
						<!--<div class="adhar-pop-box">-->

						<!--	<div class="adhar-in">-->
						<!--		<span><img src="{{ asset('assets/images/selfie.png') }}" title="" alt="" /></span>-->
						<!--	<label class="upload-text">Take Driving Licence of Aadhar Card</label>-->
						<!--	</div>-->
						<!--</div>-->
						<!-- end of adhar-pop-box -->
						<div class="adhar-pop-box">
							<div class="adhar-in">						
							<input type="file" class="upd_file permanent" id="p_lbldl" name="upd_dl" data-lbl="PDRV" hidden>
							<span><img src="{{ asset('assets/images/upload-pic.png') }}" title="" alt="" /></span>							
							<label class="upload-text" for="p_lbldl">Choose Driving Licence Card from Device</label>
							</div>
						</div>
						<!-- end of adhar-pop-box -->
						
						<div class="form-action">
                                <div class="progress-wrp">
                                    <div class="progress-bar" style="width:0%"></div >
                                    <div class="status">Uploading</div>
                                </div>
                            </div>
                            
					</div>
				</div>
				<!-- end of camera-option -->


					
						
						<!-- <input type="file" id="actual-btn3" hidden=""> -->
							
							<label class="after_remove">Upload Now</label>
					</div>
					<div class="card-type pancard-tyep">
						<div class="update-image"><img src="{{ asset('assets/images/update-icon.png') }}" title="" alt="" /></div>
						<div class="update-options">
							<!--<a href="{{$uploaded_img}}" target="_blank" download>Download</a>-->
							<a href="#" class="update-now">Update</a>
						</div>
						<!-- end of update-options -->
						<span class="icon-sec"><img src="{{ asset('assets/images/kyc-pan.png') }}" title="" alt=""></span><span>Driving Licence</span>
						
						<span class="instru-icon-sec instruction-tooltip"><img src="{{ asset('assets/images/ic_note.png') }}" title="" alt="">
						<span class="tooltiptext">
						    <div class="note-sec">
						<p>Instructions:</p>
						<ul>
							<li>Name and address should be clearly visible in the document</li>
							<li>Ensure to take the photo of the original document</li>
							<li>Do not take photo of computer or any device screen</li>
							<li>Document should be clear, colored and readable  </li>
							<li>Do not upload black and white image </li>
							<li>All 4 corners of the document should be visible  </li>
							<li>Please upload documents in JPG, JPEG and PNG format only</li>
						</ul>
					</div>    
						    
						</span>
						</span>
						
					</div>
				</div>	
				<!-- end of upload-box -->	

                
                    			
				<div class="cardpopbg">
				</div>
				<!-- end of popbg -->

				
                    @php
                		$is_uploaded = 0;
                		$uploaded_url = "";
                	@endphp
                	@if(isset($doc_list[13]['min_req_completed']) && $doc_list[13]['min_req_completed'] == "Y")
                		@php
                			$is_uploaded = 1;
                			$uploaded_url = $doc_list[13]['sub_doc_list'][0]['url'];
                		@endphp
                	@endif

	        <div class="upload-box electricity-box {{ ($is_uploaded == 1)?'uploaded-img':''}}">
				    
                    <div class="uploaded-image">
				        <img src="{{ $uploaded_url }}" title="" alt="" />
				    </div>
                <input type="hidden" class="is_uploaded" name="is_uploaded" value="{{ $is_uploaded }}">
                <input type="hidden" class="uploaded_url" nam="uploaded_url" value="{{ $uploaded_url }}">
					<div class="upload-now">

					<div class="camera-option adhaar-camera">
						<div class="adhar-pop-inner">						
						<!--<div class="adhar-pop-box">-->

						<!--	<div class="adhar-in">-->
						<!--		<span><img src="{{ asset('assets/images/selfie.png') }}" title="" alt="" /></span>-->
						<!--	<label class="upload-text">Take Photo of Electricity Bill</label>-->
						<!--	</div>-->
						<!--</div>-->
						<!-- end of adhar-pop-box -->
						<div class="adhar-pop-box">
							<div class="adhar-in">						
							<input type="file" class="upd_file permanent" id="lbl_pass" name="upd_pass" data-lbl="ELECTRICITY_BILL" hidden>
							<span><img src="{{ asset('assets/images/upload-pic.png') }}" title="" alt="" /></span>							
							<label class="upload-text" for="lbl_pass">Choose Electricity Bill from Device</label>
							</div>
						</div>
						<!-- end of adhar-pop-box -->
						
						<div class="form-action">
                                <div class="progress-wrp">
                                    <div class="progress-bar" style="width:0%"></div >
                                    <div class="status">Uploading</div>
                                </div>
                            </div>
                            
					</div>
				</div>
				<!-- end of camera-option -->

					
						
						<!-- <input type="file" id="actual-btn3" hidden=""> -->
							
							<label class="after_remove">Upload Now</label>
					</div>
					<div class="card-type pancard-tyep">
						<div class="update-image"><img src="{{ asset('assets/images/update-icon.png') }}" title="" alt="" /></div>
						<div class="update-options">
							<!--<a href="{{$uploaded_img}}" target="_blank" download>Download</a>-->
							<a href="#" class="update-now">Update</a>
						</div>
						<!-- end of update-options -->
						<span class="icon-sec"><img src="{{ asset('assets/images/Passport.png') }}" title="" alt=""></span><span>Electricity Bill</span>
						
						<span class="instru-icon-sec instruction-tooltip"><img src="{{ asset('assets/images/ic_note.png') }}" title="" alt="">
						<span class="tooltiptext">
						    <div class="note-sec">
						<p>Instructions:</p>
						<ul>
							<li>Name and address should be clearly visible in the document</li>
							<li>Ensure to take the photo of the original document</li>
							<li>Do not take photo of computer or any device screen</li>
							<li>Document should be clear, colored and readable  </li>
							<li>Do not upload black and white image </li>
							<li>All 4 corners of the document should be visible  </li>
							<li>Please upload documents in JPG, JPEG and PNG format only</li>
						</ul>
					</div>    
						    
						</span>
						</span>
						
					</div>
				</div>	
				<!-- end of upload-box -->

                    @php
                		$is_uploaded = 0;
                		$uploaded_url = "";
                	@endphp
                	@if(isset($doc_list[12]['min_req_completed']) && $doc_list[12]['min_req_completed'] == "Y")
                		@php
                			$is_uploaded = 1;
                			$uploaded_url = $doc_list[12]['sub_doc_list'][0]['url'];
                		@endphp
                	@endif
				<div class="upload-box gas-box {{ ($is_uploaded == 1)?'uploaded-img':''}}">
                    
                    <div class="uploaded-image">
				        <img src="{{ $uploaded_url }}" title="" alt="" />
				    </div>          
                <input type="hidden" class="is_uploaded" name="is_uploaded" value="{{ $is_uploaded }}">
                <input type="hidden" class="uploaded_url" nam="uploaded_url" value="{{ $uploaded_url }}">
					<div class="upload-now">

					<div class="camera-option adhaar-camera">
						<div class="adhar-pop-inner">						
						<!--<div class="adhar-pop-box">-->

						<!--	<div class="adhar-in">-->
						<!--		<span><img src="{{ asset('assets/images/selfie.png') }}" title="" alt="" /></span>-->
						<!--	<label class="upload-text">Take Photo of Gas Bill</label>-->
						<!--	</div>-->
						<!--</div>-->
						<!-- end of adhar-pop-box -->
						<div class="adhar-pop-box">
							<div class="adhar-in">						
							<input type="file" class="upd_file permanent" id="lbldl" name="upd_dl" data-lbl="GAS_BILL" hidden>
							<span><img src="{{ asset('assets/images/upload-pic.png') }}" title="" alt="" /></span>							
							<label class="upload-text" for="lbldl">Choose Gas Bill from Device</label>
							</div>
						</div>
						<!-- end of adhar-pop-box -->
						
						<div class="form-action">
                                <div class="progress-wrp">
                                    <div class="progress-bar" style="width:0%"></div >
                                    <div class="status">Uploading</div>
                                </div>
                            </div>
					</div>
				</div>
				<!-- end of camera-option -->


					
						
						<!-- <input type="file" id="actual-btn3" hidden=""> -->
							
							<label class="after_remove">Upload Now</label>
					</div>
					<div class="card-type pancard-tyep">
						<div class="update-image"><img src="{{ asset('assets/images/update-icon.png') }}" title="" alt="" /></div>
						<div class="update-options">
							<!--<a href="{{$uploaded_img}}" target="_blank" download>Download</a>-->
							<a href="#" class="update-now">Update</a>
						</div>
						<!-- end of update-options -->
						<span class="icon-sec"><img src="{{ asset('assets/images/kyc-pan.png') }}" title="" alt=""></span><span>Gas Bill</span>
						
						<span class="instru-icon-sec instruction-tooltip"><img src="{{ asset('assets/images/ic_note.png') }}" title="" alt="">
						<span class="tooltiptext">
						    <div class="note-sec">
						<p>Instructions:</p>
						<ul>
							<li>Name and address should be clearly visible in the document</li>
							<li>Ensure to take the photo of the original document</li>
							<li>Do not take photo of computer or any device screen</li>
							<li>Document should be clear, colored and readable  </li>
							<li>Do not upload black and white image </li>
							<li>All 4 corners of the document should be visible  </li>
							<li>Please upload documents in JPG, JPEG and PNG format only</li>
						</ul>
					</div>    
						    
						</span>
						</span>
					</div>
				</div>	
				<!-- end of upload-box -->	

                   				

				<div class="cardpopbg">
				</div>
				<!-- end of popbg -->
				
				
				
				</div>
				<!-- end of permanennt-address-doc -->

                @if(isset(Session::get('user_detail')['p_eq_c']) && Session::get('user_detail')['p_eq_c'] == 0)
				<div class="current-address-doc" style="display:none;">
					
					<div class="doc-title">
						<h3>Current Address Proof</h3>
					</div>
					<p class="upload-msg">Please upload any one of the following </p>
					<span class="help-blocks status-failed"></span>	
                    @php
                		$is_uploaded = 0;
                		$is_uploaded_one = 0;
                		$is_uploaded_left = 0;
                		$is_uploaded_right = 0;
                		$uploaded_url = "";
                		$uploaded_url_back = "";
                	@endphp
                	@if(isset($doc_list[7]['min_req_completed']) && $doc_list[7]['min_req_completed'] == "Y")
                		@php
                			$is_uploaded = 1;
                			$is_uploaded_left = 1;
                		    $is_uploaded_right = 1;
                			$uploaded_url = $doc_list[7]['sub_doc_list'][0]['url'];
                			$uploaded_url_back = $doc_list[7]['sub_doc_list'][1]['url'];
                		@endphp
                	@else
                	    @if(isset($doc_list[7]['sub_doc_list'][0]['is_uploaded']) && $doc_list[7]['sub_doc_list'][0]['is_uploaded'] == "Y")
                    		@php
                    		    $is_uploaded_one = 1;
                    		    $is_uploaded_left = 1;
                    			$uploaded_url = $doc_list[7]['sub_doc_list'][0]['url'];
                    		@endphp
                    	@endif
                    	@if(isset($doc_list[7]['sub_doc_list'][1]['is_uploaded']) && $doc_list[7]['sub_doc_list'][1]['is_uploaded'] == "Y")
                    		@php
                    		    $is_uploaded_one = 1;
                    		    $is_uploaded_right = 1;
                    			$uploaded_url_back = $doc_list[7]['sub_doc_list'][1]['url'];
                    		@endphp
                    	@endif
                	@endif
				
				
				
				<div class="upload-box adhaar-box extra-files {{ ($is_uploaded == 1 || $is_uploaded_one == 1)?'uploaded-img':''}}">
				    
                     <div class="uploaded-image forntview double-view">
				        <img src="{{ $uploaded_url }}" title="" alt="" />
				    </div>
				    
				    <div class="uploaded-image back-view double-view">
				        <img src="{{ $uploaded_url_back }}" title="" alt="" />
				    </div>
				    
                <input type="hidden" class="is_uploaded" name="is_uploaded" value="{{ $is_uploaded }}">
                <input type="hidden" class="uploaded_url" nam="uploaded_url" value="{{ $uploaded_url }}">
                <input type="hidden" class="uploaded_url_back" nam="uploaded_url_back" value="{{ $uploaded_url_back }}">
					<div class="upload-now">
			
				<div class="camera-option adhaar-camera">
						<div class="adhar-pop-inner">						
						<!--<div class="adhar-pop-box">-->

						<!--	<div class="adhar-in">-->
						<!--		<span><img src="{{ asset('assets/images/selfie.png') }}" title="" alt="" /></span>-->
						<!--	<label class="upload-text">Take Photo of Aadhar Card</label>-->
						<!--	</div>-->
						<!--</div>-->
						<!-- end of adhar-pop-box -->
						<div class="adhar-pop-box">
							<div class="adhar-in">						
							<!-- <input type="file" id="actual-btn4" hidden=""> -->
							<span><img src="{{ asset('assets/images/upload-pic.png') }}" title="" alt="" /></span>			
							<!--<input type="file" class="upd_file" id="p_lblaadhar" name="upd_aadhar" data-lbl="PADHR" hidden="">-->
							<label class="upload-text" >Choose Aadhaar Card from Device</label>
							
							</div>
						</div>
						<!-- end of adhar-pop-box -->
						
						    <div class="form-action">
                                <div class="progress-wrp">
                                    <div class="progress-bar" style="width:0%"></div >
                                    <div class="status">Uploading</div>
                                </div>
                            </div>
                            
					</div>
				</div>
				<!-- end of camera-option -->

					
						
						<!-- <input type="file" id="actual-btn3" hidden/>
							 -->
							<label class="after_remove front_lbl split-view {{ ($is_uploaded_left == 1)?'box-none':'' }}">Upload front side</label>
							<label class="after_remove back_lbl split-view {{ ($is_uploaded_right == 1)?'box-none':'' }}">Upload back side </label>
							
					</div>
					<div class="card-type pancard-tyep">
						<div class="update-image"><img src="{{ asset('assets/images/update-icon.png') }}" title="" alt="" /></div>
						<div class="update-options">
							<!--<a href="{{$uploaded_img}}" target="_blank" download>Download</a>-->
							<a href="#" class="update-now">Update</a>
						</div>
						<!-- end of update-options -->
						<span class="icon-sec"><img src="{{ asset('assets/images/kyc-pan.png') }}" title="" alt=""></span><span>Aadhaar Card</span>
						
						<span class="instru-icon-sec instruction-tooltip"><img src="{{ asset('assets/images/ic_note.png') }}" title="" alt="">
						<span class="tooltiptext">
						    <div class="note-sec">
						<p>Instructions:</p>
						<ul>
							<li>Name and address should be clearly visible in the document</li>
							<li>Ensure to take the photo of the original document</li>
							<li>Do not take photo of computer or any device screen</li>
							<li>Document should be clear, colored and readable  </li>
							<li>Do not upload black and white image </li>
							<li>All 4 corners of the document should be visible  </li>
							<li>Please upload documents in JPG, JPEG and PNG format only</li>
						</ul>
					</div>    
						    
						</span>
						</span>
						
					</div>
				</div>	
				<!-- end of upload-box -->
				
				<div class="adhaar-bg"></div>
				<div class="adhar-card-pop adhaar">
					<div class="adhar-pop-inner">
					    <button type="button" class="close" style="float:right;color:red;">&times;</button>
						<h4>Current Address Proof</h4>
						<div class="adhar-pop-box">
							<div class="adhar-in">
						
						<input type="file" class="upd_file current" id="c_p_lblaadhar" name="upd_aadhar" data-lbl="ADHR" hidden>
							
							<label class="upload-text" for="c_p_lblaadhar">Aadhaar Card - Front Side</label>
							@php
                        		$is_uploaded = 0;
                        		$uploaded_url = "";
                        		$uploaded_url_back = "";
                        	@endphp
                        	@if(isset($doc_list[7]['sub_doc_list'][0]['is_uploaded']) && $doc_list[7]['sub_doc_list'][0]['is_uploaded'] == "Y")
                        		@php
                        			$is_uploaded = 1;
                        			$uploaded_url = $doc_list[7]['sub_doc_list'][0]['url'];
                        			$uploaded_url_back = $doc_list[7]['sub_doc_list'][1]['url'];
                        		@endphp
                        	@endif
							<label class="upload-btn" for="c_p_lblaadhar" style="{{ ($is_uploaded == 1)?'color:green; border:2px solid green;':'' }}">{{ ($is_uploaded == 1)?'DONE':'ADD' }}</label>
							</div>
						</div>
						  <!-- end of adhar-pop-box -->

						<div class="adhar-pop-box">
							<div class="adhar-in">
						
						<input type="file" class="upd_file current" id="c_p_lblaadhar_back" name="upd_aadhar" data-lbl="ADHR1" hidden>
							
							<label class="upload-text" for="c_p_lblaadhar_back">Aadhar Card - Back Side</label>
							@php
                        		$is_uploaded = 0;
                        		$uploaded_url = "";
                        		$uploaded_url_back = "";
                        	@endphp
                        	@if(isset($doc_list[7]['sub_doc_list'][1]['is_uploaded']) && $doc_list[7]['sub_doc_list'][1]['is_uploaded'] == "Y")
                        		@php
                        			$is_uploaded = 1;
                        			$uploaded_url = $doc_list[7]['sub_doc_list'][1]['url'];
                        			$uploaded_url_back = $doc_list[7]['sub_doc_list'][1]['url'];
                        		@endphp
                        	@endif
							<label class="upload-btn" for="c_p_lblaadhar_back" style="{{ ($is_uploaded == 1)?'color:green; border:2px solid green;':'' }}">{{ ($is_uploaded == 1)?'DONE':'ADD' }}</label>
							</div>
						</div>
						 <!-- end of adhar-pop-box --> 
						
						<div class="form-action">
                                <div class="progress-wrp">
                                    <div class="progress-bar" style="width:0%"></div >
                                    <div class="status">Uploading</div>
                                </div>
                            </div>

					</div>
					<!-- end of adhar-pop-inner -->
				</div>	
				<!-- end of adhar-card-pop -->			
				
				
                    @php
                		$is_uploaded = 0;
                		$is_uploaded_one = 0;
                		$is_uploaded_left = 0;
                		$is_uploaded_right = 0;
                		$uploaded_url = "";
                		$uploaded_url_back = "";
                	@endphp
                	@if(isset($doc_list[9]['min_req_completed']) && $doc_list[9]['min_req_completed'] == "Y")
                		@php
                			$is_uploaded = 1;
                			$is_uploaded_left = 1;
                		    $is_uploaded_right = 1;
                			$uploaded_url = $doc_list[9]['sub_doc_list'][0]['url'];
                			$uploaded_url_back = $doc_list[9]['sub_doc_list'][1]['url'];
                		@endphp
                	@else
                	    @if(isset($doc_list[9]['sub_doc_list'][0]['is_uploaded']) && $doc_list[9]['sub_doc_list'][0]['is_uploaded'] == "Y")
                    		@php
                    		    $is_uploaded_one = 1;
                    		    $is_uploaded_left = 1;
                    			$uploaded_url = $doc_list[9]['sub_doc_list'][0]['url'];
                    		@endphp
                    	@endif
                    	@if(isset($doc_list[9]['sub_doc_list'][1]['is_uploaded']) && $doc_list[9]['sub_doc_list'][1]['is_uploaded'] == "Y")
                    		@php
                    		    $is_uploaded_one = 1;
                    		    $is_uploaded_right = 1;
                    			$uploaded_url_back = $doc_list[9]['sub_doc_list'][1]['url'];
                    		@endphp
                    	@endif
                	@endif
				
				<div class="upload-box passport-box extra-files {{ ($is_uploaded == 1 || $is_uploaded_one == 1)?'uploaded-img':''}}">
				    
                    <div class="uploaded-image forntview double-view">
				        <img src="{{ $uploaded_url }}" title="" alt="" />
				    </div>   
				    <div class="uploaded-image back-view double-view">
				        <img src="{{ $uploaded_url_back }}" title="" alt="" />
				    </div>
                <input type="hidden" class="is_uploaded" name="is_uploaded" value="{{ $is_uploaded }}">
                <input type="hidden" class="uploaded_url" nam="uploaded_url" value="{{ $uploaded_url }}">
                <input type="hidden" class="uploaded_url_back" nam="uploaded_url_back" value="{{ $uploaded_url_back }}">
					<div class="upload-now">
				
				<div class="camera-option adhaar-camera">
						<div class="adhar-pop-inner">						
						<!--<div class="adhar-pop-box">-->

						<!--	<div class="adhar-in">-->
						<!--		<span><img src="{{ asset('assets/images/selfie.png') }}" title="" alt="" /></span>-->
						<!--	<label class="upload-text">Take Photo of Passport Card</label>-->
						<!--	</div>-->
						<!--</div>-->
						<!-- end of adhar-pop-box -->
						<div class="adhar-pop-box">
							<div class="adhar-in">						
							<!--<input type="file" class="upd_file" data-lbl="PPassport" id="p_lblpass" name="upd_pass" hidden>-->
							<span><img src="{{ asset('assets/images/upload-pic.png') }}" title="" alt="" /></span>							
							<label class="upload-text">Choose Passport Card from Device</label>
							</div>
						</div>
						<!-- end of adhar-pop-box -->
						
						<div class="form-action">
                                <div class="progress-wrp">
                                    <div class="progress-bar" style="width:0%"></div >
                                    <div class="status">Uploading</div>
                                </div>
                            </div>
                            
					</div>
				</div>
				<!-- end of camera-option -->

					
						
						<!-- <input type="file" id="actual-btn3" hidden=""> -->
							
							<label class="after_remove front_lbl split-view {{ ($is_uploaded_left == 1)?'box-none':'' }}">Upload front side</label>
							<label class="after_remove back_lbl split-view {{ ($is_uploaded_right == 1)?'box-none':'' }}">Upload back side </label>
					</div>
					<div class="card-type pancard-tyep">
						<div class="update-image"><img src="{{ asset('assets/images/update-icon.png') }}" title="" alt="" /></div>
						<div class="update-options">
							<!--<a href="{{$uploaded_img}}" target="_blank" download>Download</a>-->
							<a href="#" class="update-now">Update</a>
						</div>
						<!-- end of update-options -->
						<span class="icon-sec"><img src="{{ asset('assets/images/Passport.png') }}" title="" alt=""></span><span>Passport</span>
						
						<span class="instru-icon-sec instruction-tooltip"><img src="{{ asset('assets/images/ic_note.png') }}" title="" alt="">
						<span class="tooltiptext">
						    <div class="note-sec">
						<p>Instructions:</p>
						<ul>
							<li>Name and address should be clearly visible in the document</li>
							<li>Ensure to take the photo of the original document</li>
							<li>Do not take photo of computer or any device screen</li>
							<li>Document should be clear, colored and readable  </li>
							<li>Do not upload black and white image </li>
							<li>All 4 corners of the document should be visible  </li>
							<li>Please upload documents in JPG, JPEG and PNG format only</li>
						</ul>
					</div>    
						    
						</span>
						</span>
						
						
					</div>
				</div>	
				<!-- end of upload-box -->
				
				
				<div class="adhaar-bg"></div>
				<div class="adhar-card-pop passport">
					<div class="adhar-pop-inner">
					    <button type="button" class="close" style="float:right;color:red;">&times;</button>
						<h4>Current Address Proof</h4>
						<div class="adhar-pop-box">
							<div class="adhar-in">
						
						<input type="file" class="upd_file current" id="c_p_lblpassport" name="upd_passport" data-lbl="Passport" hidden>
							
							<label class="upload-text" for="c_p_lblpassport">Passport - Front Side</label>
							@php
                        		$is_uploaded = 0;
                        		$uploaded_url = "";
                        	@endphp
                        	@if(isset($doc_list[9]['sub_doc_list'][0]['is_uploaded']) && $doc_list[9]['sub_doc_list'][0]['is_uploaded'] == "Y")
                        		@php
                        			$is_uploaded = 1;
                        			$uploaded_url = $doc_list[9]['sub_doc_list'][0]['url'];
                        		@endphp
                        	@endif
							<label class="upload-btn" for="c_p_lblpassport" style="{{ ($is_uploaded == 1)?'color:green; border:2px solid green;':'' }}">{{ ($is_uploaded == 1)?'DONE':'ADD' }}</label>
							</div>
						</div>
						  <!-- end of adhar-pop-box -->

						<div class="adhar-pop-box">
							<div class="adhar-in">
						
						<input type="file" class="upd_file current" id="c_p_lblpassport_back" name="upd_passport_back" data-lbl="Passport1" hidden>
							
							<label class="upload-text" for="c_p_lblpassport_back">Passport - Back Side</label>
							@php
                        		$is_uploaded = 0;
                        		$uploaded_url = "";
                        	@endphp
                        	@if(isset($doc_list[9]['sub_doc_list'][1]['is_uploaded']) && $doc_list[9]['sub_doc_list'][1]['is_uploaded'] == "Y")
                        		@php
                        			$is_uploaded = 1;
                        			$uploaded_url = $doc_list[9]['sub_doc_list'][1]['url'];
                        		@endphp
                        	@endif
							<label class="upload-btn" for="c_p_lblpassport_back" style="{{ ($is_uploaded == 1)?'color:green; border:2px solid green;':'' }}">{{ ($is_uploaded == 1)?'DONE':'ADD' }}</label>
							</div>
						</div>
						 <!-- end of adhar-pop-box --> 
						
						<div class="form-action">
                                <div class="progress-wrp">
                                    <div class="progress-bar" style="width:0%"></div >
                                    <div class="status">Uploading</div>
                                </div>
                            </div>

					</div>
					<!-- end of adhar-pop-inner -->
				</div>	
				<!-- end of adhar-card-pop -->	
				
				

                    @php
                		$is_uploaded = 0;
                		$is_uploaded_one = 0;
                		$is_uploaded_left = 0;
                		$is_uploaded_right = 0;
                		$uploaded_url = "";
                		$uploaded_url_back = "";
                	@endphp
                	@if(isset($doc_list[8]['min_req_completed']) && $doc_list[8]['min_req_completed'] == "Y")
                		@php
                			$is_uploaded = 1;
                			$is_uploaded_left = 1;
                		    $is_uploaded_right = 1;
                			$uploaded_url = $doc_list[8]['sub_doc_list'][0]['url'];
                			$uploaded_url_back = isset($doc_list[8]['sub_doc_list'][1]['url'])?$doc_list[8]['sub_doc_list'][1]['url']:"";
                		@endphp
                	@else
                	    @if(isset($doc_list[8]['sub_doc_list'][0]['is_uploaded']) && $doc_list[8]['sub_doc_list'][0]['is_uploaded'] == "Y")
                    		@php
                    		    $is_uploaded_one = 1;
                    		    $is_uploaded_left = 1;
                    			$uploaded_url = $doc_list[8]['sub_doc_list'][0]['url'];
                    		@endphp
                    	@endif
                    	@if(isset($doc_list[8]['sub_doc_list'][1]['is_uploaded']) && $doc_list[8]['sub_doc_list'][1]['is_uploaded'] == "Y")
                    		@php
                    		    $is_uploaded_one = 1;
                    		    $is_uploaded_right = 1;
                    			$uploaded_url_back = $doc_list[8]['sub_doc_list'][1]['url'];
                    		@endphp
                    	@endif
                	@endif
				
                
                <div class="upload-box voterid-box extra-files {{ ($is_uploaded == 1 || $is_uploaded_one == 1)?'uploaded-img':''}}">
                    
                    <div class="uploaded-image forntview double-view">
				        <img src="{{ $uploaded_url }}" title="" alt="" />
				    </div>
				    
				    <div class="uploaded-image back-view double-view">
				        <img src="{{ $uploaded_url_back }}" title="" alt="" />
				    </div>
				    
                <input type="hidden" class="is_uploaded" name="is_uploaded" value="{{ $is_uploaded }}">
                <input type="hidden" class="uploaded_url" name="uploaded_url" value="{{ $uploaded_url }}">
                <input type="hidden" class="uploaded_url_back" name="uploaded_url_back" value="{{ $uploaded_url_back }}">
					<div class="upload-now">


					<div class="camera-option adhaar-camera">
						<div class="adhar-pop-inner">						
						<!--<div class="adhar-pop-box">-->

						<!--	<div class="adhar-in">-->
						<!--		<span><img src="{{ asset('assets/images/selfie.png') }}" title="" alt="" /></span>-->
						<!--	<label class="upload-text">Take Photo of Voter ID Card</label>-->
						<!--	</div>-->
						<!--</div>-->
						<!-- end of adhar-pop-box -->
						<div class="adhar-pop-box">
							<div class="adhar-in">						
							<!--<input type="file" class="upd_file" id="p_lblvoter" name="upd_voter" data-lbl="PVI" hidden>-->
							<span><img src="{{ asset('assets/images/upload-pic.png') }}" title="" alt="" /></span>							
							<label class="upload-text">Choose Voter ID Card from Device</label>
							</div>
						</div>
						<!-- end of adhar-pop-box -->
						
						<div class="form-action">
                                <div class="progress-wrp">
                                    <div class="progress-bar" style="width:0%"></div >
                                    <div class="status">Uploading</div>
                                </div>
                            </div>
                            
					</div>
				</div>
				<!-- end of camera-option -->


					
						
						<!-- <input type="file" id="actual-btn3" hidden=""> -->
							
							<label class="after_remove front_lbl split-view {{ ($is_uploaded_left == 1)?'box-none':'' }}">Upload front side</label>
							<label class="after_remove back_lbl split-view {{ ($is_uploaded_right == 1)?'box-none':'' }}">Upload back side </label>
					</div>
					<div class="card-type pancard-tyep">
						<div class="update-image"><img src="{{ asset('assets/images/update-icon.png') }}" title="" alt="" /></div>
						<div class="update-options">
							<!--<a href="{{$uploaded_img}}" target="_blank" download>Download</a>-->
							<a href="#" class="update-now">Update</a>
						</div>
						<!-- end of update-options -->
						<span class="icon-sec"><img src="{{ asset('assets/images/kyc-pan.png') }}" title="" alt=""></span><span>Voter ID</span>
						<span class="instru-icon-sec instruction-tooltip"><img src="{{ asset('assets/images/ic_note.png') }}" title="" alt="">
						<span class="tooltiptext">
						    <div class="note-sec">
						<p>Instructions:</p>
						<ul>
							<li>Name and address should be clearly visible in the document</li>
							<li>Ensure to take the photo of the original document</li>
							<li>Do not take photo of computer or any device screen</li>
							<li>Document should be clear, colored and readable  </li>
							<li>Do not upload black and white image </li>
							<li>All 4 corners of the document should be visible  </li>
							<li>Please upload documents in JPG, JPEG and PNG format only</li>
						</ul>
					</div>    
						    
						</span>
						</span>
						
					</div>
				</div>	
				<!-- end of upload-box -->
				
				
				
				<div class="adhaar-bg"></div>
				<div class="adhar-card-pop voterid">
					<div class="adhar-pop-inner">
					    <button type="button" class="close" style="float:right;color:red;">&times;</button>
						<h4>Current Address Proof</h4>
						<div class="adhar-pop-box">
							<div class="adhar-in">
						
						<input type="file" class="upd_file current" id="c_p_lblvoterid" name="upd_voterid" data-lbl="PVI" hidden>
							
							<label class="upload-text" for="c_p_lblvoterid">Voter ID - Front Side</label>
							@php
                        		$is_uploaded = 0;
                        		$uploaded_url = "";
                        	@endphp
                        	@if(isset($doc_list[8]['sub_doc_list'][0]['is_uploaded']) && $doc_list[8]['sub_doc_list'][0]['is_uploaded'] == "Y")
                        		@php
                        			$is_uploaded = 1;
                        			$uploaded_url = $doc_list[8]['sub_doc_list'][0]['url'];
                        		@endphp
                        	@endif
							<label class="upload-btn" for="c_p_lblvoterid" style="{{ ($is_uploaded == 1)?'color:green; border:2px solid green;':'' }}">{{ ($is_uploaded == 1)?'DONE':'ADD' }}</label>
							</div>
						</div>
						  <!-- end of adhar-pop-box -->

						<div class="adhar-pop-box">
							<div class="adhar-in">
						
						<input type="file" class="upd_file current" id="c_p_lblvoterid_back" name="upd_voterid_back" data-lbl="PVI1" hidden>
							
							<label class="upload-text" for="c_p_lblvoterid_back">Voter ID - Back Side</label>
							@php
                        		$is_uploaded = 0;
                        		$uploaded_url = "";
                        	@endphp
                        	@if(isset($doc_list[8]['sub_doc_list'][1]['is_uploaded']) && $doc_list[8]['sub_doc_list'][1]['is_uploaded'] == "Y")
                        		@php
                        			$is_uploaded = 1;
                        			$uploaded_url = $doc_list[8]['sub_doc_list'][1]['url'];
                        		@endphp
                        	@endif
							<label class="upload-btn" for="c_p_lblvoterid_back" style="{{ ($is_uploaded == 1)?'color:green; border:2px solid green;':'' }}">{{ ($is_uploaded == 1)?'DONE':'ADD' }}</label>
							</div>
						</div>
						 <!-- end of adhar-pop-box --> 
						
						<div class="form-action">
                                <div class="progress-wrp">
                                    <div class="progress-bar" style="width:0%"></div >
                                    <div class="status">Uploading</div>
                                </div>
                            </div>

					</div>
					<!-- end of adhar-pop-inner -->
				</div>	
				<!-- end of adhar-card-pop -->

                    @php
                		$is_uploaded = 0;
                		$uploaded_url = "";
                	@endphp
                	@if(isset($doc_list[5]['min_req_completed']) && $doc_list[5]['min_req_completed'] == "Y")
                		@php
                			$is_uploaded = 1;
                			$uploaded_url = $doc_list[5]['sub_doc_list'][0]['url'];
                		@endphp
                	@endif
                
                <div class="upload-box driving-box {{ ($is_uploaded == 1)?'uploaded-img':''}}">
                    
                    <div class="uploaded-image">
				        <img src="{{ $uploaded_url }}" title="" alt="" />
				    </div>         
                <input type="hidden" class="is_uploaded" name="is_uploaded" value="{{ $is_uploaded }}">
                <input type="hidden" class="uploaded_url" nam="uploaded_url" value="{{ $uploaded_url }}">
					<div class="upload-now">


					<div class="camera-option adhaar-camera">
						<div class="adhar-pop-inner">						
						<!--<div class="adhar-pop-box">-->

						<!--	<div class="adhar-in">-->
						<!--		<span><img src="{{ asset('assets/images/selfie.png') }}" title="" alt="" /></span>-->
						<!--	<label class="upload-text">Take Driving Licence of Aadhar Card</label>-->
						<!--	</div>-->
						<!--</div>-->
						<!-- end of adhar-pop-box -->
						<div class="adhar-pop-box">
							<div class="adhar-in">						
							<input type="file" class="upd_file current" id="c_p_lbldl" name="upd_dl" data-lbl="PDRV" hidden>
							<span><img src="{{ asset('assets/images/upload-pic.png') }}" title="" alt="" /></span>							
							<label class="upload-text" for="c_p_lbldl">Choose Driving Licence Card from Device</label>
							</div>
						</div>
						<!-- end of adhar-pop-box -->
						
						<div class="form-action">
                                <div class="progress-wrp">
                                    <div class="progress-bar" style="width:0%"></div >
                                    <div class="status">Uploading</div>
                                </div>
                            </div>
                            
					</div>
				</div>
				<!-- end of camera-option -->


					
						
						<!-- <input type="file" id="actual-btn3" hidden=""> -->
							
							<label class="after_remove">Upload Now</label>
					</div>
					<div class="card-type pancard-tyep">
						<div class="update-image"><img src="{{ asset('assets/images/update-icon.png') }}" title="" alt="" /></div>
						<div class="update-options">
							<!--<a href="{{$uploaded_img}}" target="_blank" download>Download</a>-->
							<a href="#" class="update-now">Update</a>
						</div>
						<!-- end of update-options -->
						<span class="icon-sec"><img src="{{ asset('assets/images/kyc-pan.png') }}" title="" alt=""></span><span>Driving Licence</span>
						
						<span class="instru-icon-sec instruction-tooltip"><img src="{{ asset('assets/images/ic_note.png') }}" title="" alt="">
						<span class="tooltiptext">
						    <div class="note-sec">
						<p>Instructions:</p>
						<ul>
							<li>Name and address should be clearly visible in the document</li>
							<li>Ensure to take the photo of the original document</li>
							<li>Do not take photo of computer or any device screen</li>
							<li>Document should be clear, colored and readable  </li>
							<li>Do not upload black and white image </li>
							<li>All 4 corners of the document should be visible  </li>
							<li>Please upload documents in JPG, JPEG and PNG format only</li>
						</ul>
					</div>    
						    
						</span>
						</span>
						
					</div>
				</div>	
				<!-- end of upload-box -->	

                
                    			
				<div class="cardpopbg">
				</div>
				<!-- end of popbg -->

				
                    @php
                		$is_uploaded = 0;
                		$uploaded_url = "";
                	@endphp
                	@if(isset($doc_list[13]['min_req_completed']) && $doc_list[13]['min_req_completed'] == "Y")
                		@php
                			$is_uploaded = 1;
                			$uploaded_url = $doc_list[13]['sub_doc_list'][0]['url'];
                		@endphp
                	@endif

	        <div class="upload-box electricity-box {{ ($is_uploaded == 1)?'uploaded-img':''}}">
				    
                    <div class="uploaded-image">
				        <img src="{{ $uploaded_url }}" title="" alt="" />
				    </div>
                <input type="hidden" class="is_uploaded" name="is_uploaded" value="{{ $is_uploaded }}">
                <input type="hidden" class="uploaded_url" nam="uploaded_url" value="{{ $uploaded_url }}">
					<div class="upload-now">

					<div class="camera-option adhaar-camera">
						<div class="adhar-pop-inner">						
						<!--<div class="adhar-pop-box">-->

						<!--	<div class="adhar-in">-->
						<!--		<span><img src="{{ asset('assets/images/selfie.png') }}" title="" alt="" /></span>-->
						<!--	<label class="upload-text">Take Photo of Electricity Bill</label>-->
						<!--	</div>-->
						<!--</div>-->
						<!-- end of adhar-pop-box -->
						<div class="adhar-pop-box">
							<div class="adhar-in">						
							<input type="file" class="upd_file current" id="c_lbl_pass" name="upd_pass" data-lbl="ELECTRICITY_BILL" hidden>
							<span><img src="{{ asset('assets/images/upload-pic.png') }}" title="" alt="" /></span>							
							<label class="upload-text" for="c_lbl_pass">Choose Electricity Bill from Device</label>
							</div>
						</div>
						<!-- end of adhar-pop-box -->
						
						<div class="form-action">
                                <div class="progress-wrp">
                                    <div class="progress-bar" style="width:0%"></div >
                                    <div class="status">Uploading</div>
                                </div>
                            </div>
                            
					</div>
				</div>
				<!-- end of camera-option -->

					
						
						<!-- <input type="file" id="actual-btn3" hidden=""> -->
							
							<label class="after_remove">Upload Now</label>
					</div>
					<div class="card-type pancard-tyep">
						<div class="update-image"><img src="{{ asset('assets/images/update-icon.png') }}" title="" alt="" /></div>
						<div class="update-options">
							<!--<a href="{{$uploaded_img}}" target="_blank" download>Download</a>-->
							<a href="#" class="update-now">Update</a>
						</div>
						<!-- end of update-options -->
						<span class="icon-sec"><img src="{{ asset('assets/images/Passport.png') }}" title="" alt=""></span><span>Electricity Bill</span>
						
						<span class="instru-icon-sec instruction-tooltip"><img src="{{ asset('assets/images/ic_note.png') }}" title="" alt="">
						<span class="tooltiptext">
						    <div class="note-sec">
						<p>Instructions:</p>
						<ul>
							<li>Name and address should be clearly visible in the document</li>
							<li>Ensure to take the photo of the original document</li>
							<li>Do not take photo of computer or any device screen</li>
							<li>Document should be clear, colored and readable  </li>
							<li>Do not upload black and white image </li>
							<li>All 4 corners of the document should be visible  </li>
							<li>Please upload documents in JPG, JPEG and PNG format only</li>
						</ul>
					</div>    
						    
						</span>
						</span>
						
					</div>
				</div>	
				<!-- end of upload-box -->

                    @php
                		$is_uploaded = 0;
                		$uploaded_url = "";
                	@endphp
                	@if(isset($doc_list[12]['min_req_completed']) && $doc_list[12]['min_req_completed'] == "Y")
                		@php
                			$is_uploaded = 1;
                			$uploaded_url = $doc_list[12]['sub_doc_list'][0]['url'];
                		@endphp
                	@endif
				<div class="upload-box gas-box {{ ($is_uploaded == 1)?'uploaded-img':''}}">
                    
                    <div class="uploaded-image">
				        <img src="{{ $uploaded_url }}" title="" alt="" />
				    </div>          
                <input type="hidden" class="is_uploaded" name="is_uploaded" value="{{ $is_uploaded }}">
                <input type="hidden" class="uploaded_url" nam="uploaded_url" value="{{ $uploaded_url }}">
					<div class="upload-now">

					<div class="camera-option adhaar-camera">
						<div class="adhar-pop-inner">						
						<!--<div class="adhar-pop-box">-->

						<!--	<div class="adhar-in">-->
						<!--		<span><img src="{{ asset('assets/images/selfie.png') }}" title="" alt="" /></span>-->
						<!--	<label class="upload-text">Take Photo of Gas Bill</label>-->
						<!--	</div>-->
						<!--</div>-->
						<!-- end of adhar-pop-box -->
						<div class="adhar-pop-box">
							<div class="adhar-in">						
							<input type="file" class="upd_file current" id="c_lbldl" name="upd_dl" data-lbl="GAS_BILL" hidden>
							<span><img src="{{ asset('assets/images/upload-pic.png') }}" title="" alt="" /></span>							
							<label class="upload-text" for="c_lbldl">Choose Gas Bill from Device</label>
							</div>
						</div>
						<!-- end of adhar-pop-box -->
						
						<div class="form-action">
                                <div class="progress-wrp">
                                    <div class="progress-bar" style="width:0%"></div >
                                    <div class="status">Uploading</div>
                                </div>
                            </div>
					</div>
				</div>
				<!-- end of camera-option -->


					
						
						<!-- <input type="file" id="actual-btn3" hidden=""> -->
							
							<label class="after_remove">Upload Now</label>
					</div>
					<div class="card-type pancard-tyep">
						<div class="update-image"><img src="{{ asset('assets/images/update-icon.png') }}" title="" alt="" /></div>
						<div class="update-options">
							<!--<a href="{{$uploaded_img}}" target="_blank" download>Download</a>-->
							<a href="#" class="update-now">Update</a>
						</div>
						<!-- end of update-options -->
						<span class="icon-sec"><img src="{{ asset('assets/images/kyc-pan.png') }}" title="" alt=""></span><span>Gas Bill</span>
						
						<span class="instru-icon-sec instruction-tooltip"><img src="{{ asset('assets/images/ic_note.png') }}" title="" alt="">
						<span class="tooltiptext">
						    <div class="note-sec">
						<p>Instructions:</p>
						<ul>
							<li>Name and address should be clearly visible in the document</li>
							<li>Ensure to take the photo of the original document</li>
							<li>Do not take photo of computer or any device screen</li>
							<li>Document should be clear, colored and readable  </li>
							<li>Do not upload black and white image </li>
							<li>All 4 corners of the document should be visible  </li>
							<li>Please upload documents in JPG, JPEG and PNG format only</li>
						</ul>
					</div>    
						    
						</span>
						</span>
					</div>
				</div>	
				<!-- end of upload-box -->	

                    @php
                		$is_uploaded = 0;
                		$uploaded_url = "";
                	@endphp
                	@if(isset($doc_list[11]['min_req_completed']) && $doc_list[11]['min_req_completed'] == "Y")
                		@php
                			$is_uploaded = 1;
                			$uploaded_url = $doc_list[11]['sub_doc_list'][0]['url'];
                		@endphp
                	@endif
				<div class="upload-box rent-box {{ ($is_uploaded == 1)?'uploaded-img':''}}">
                    
                    <div class="uploaded-image">
				        <img src="{{ $uploaded_url }}" title="" alt="" />
				    </div>          
                <input type="hidden" class="is_uploaded" name="is_uploaded" value="{{ $is_uploaded }}">
                <input type="hidden" class="uploaded_url" nam="uploaded_url" value="{{ $uploaded_url }}">
					<div class="upload-now">

					<div class="camera-option adhaar-camera">
						<div class="adhar-pop-inner">						
						<!--<div class="adhar-pop-box">-->

						<!--	<div class="adhar-in">-->
						<!--		<span><img src="{{ asset('assets/images/selfie.png') }}" title="" alt="" /></span>-->
						<!--	<label class="upload-text">Take Photo of Rent Agreement</label>-->
						<!--	</div>-->
						<!--</div>-->
						<!-- end of adhar-pop-box -->
						<div class="adhar-pop-box">
							<div class="adhar-in">						
							<input type="file" class="upd_file current" id="lblvoter" name="upd_voter" data-lbl="RENT_AGREEMENT" hidden>
							<span><img src="{{ asset('assets/images/upload-pic.png') }}" title="" alt="" /></span>							
							<label class="upload-text" for="lblvoter">Choose Rent Agreement from Device</label>
							</div>
						</div>
						<!-- end of adhar-pop-box -->
						
						<div class="form-action">
                                <div class="progress-wrp">
                                    <div class="progress-bar" style="width:0%"></div >
                                    <div class="status">Uploading</div>
                                </div>
                            </div>
                            
					</div>
				</div>
				<!-- end of camera-option -->

					
						
						<!-- <input type="file" id="actual-btn3" hidden=""> -->
							
							<label class="after_remove">Upload Now</label>
					</div>
					<div class="card-type pancard-tyep">
						<div class="update-image"><img src="{{ asset('assets/images/update-icon.png') }}" title="" alt="" /></div>
						<div class="update-options">
							<!--<a href="{{$uploaded_img}}" target="_blank" download>Download</a>-->
							<a href="#" class="update-now">Update</a>
						</div>
						<!-- end of update-options -->
						<span class="icon-sec"><img src="{{ asset('assets/images/kyc-pan.png') }}" title="" alt=""></span><span>Rent Agreement</span>
						
						<span class="instru-icon-sec instruction-tooltip"><img src="{{ asset('assets/images/ic_note.png') }}" title="" alt="">
						<span class="tooltiptext">
						    <div class="note-sec">
						<p>Instructions:</p>
						<ul>
							<li>Name and address should be clearly visible in the document</li>
							<li>Ensure to take the photo of the original document</li>
							<li>Do not take photo of computer or any device screen</li>
							<li>Document should be clear, colored and readable  </li>
							<li>Do not upload black and white image </li>
							<li>All 4 corners of the document should be visible  </li>
							<li>Please upload documents in JPG, JPEG and PNG format only</li>
						</ul>
					</div>    
						    
						</span>
						</span>
						
					</div>
				</div>	
				<!-- end of upload-box -->				

				<div class="cardpopbg">
				</div>
				<!-- end of popbg -->
				    
				</div>
				<!-- end of current-address-doc -->
                @endif

				<div class="bank-statement-doc" style="display:none; ">
							
					<div class="doc-title">
						<h3>Bank Statement</h3>
					</div>
					<p class="upload-msg">Please upload latest six months 
Bank Statements (PDF only) 
<br>Note: Provision to upload more than one file is available. Please click on "Upload Now" to know more.</p>	
                    
                    <span class="help-blocks status-failed"></span>	
				
                    @php
                		$is_uploaded = 0;
                		$uploaded_url = "";
                	@endphp
                	@if(isset($doc_list[2]['min_req_completed']) && $doc_list[2]['min_req_completed'] == "Y")
                		@php
                			$is_uploaded = 1;
                			$uploaded_url = $doc_list[2]['sub_doc_list'][0]['url'];
                		@endphp
                	@endif
				<div class="upload-box adhaar-box extra-or-files {{ ($is_uploaded == 1)?'uploaded-img':''}}">
                    
                    <div class="uploaded-image">
				        <!--<img src="{{ $uploaded_url }}" title="" alt="" />-->
				        <iframe src="{{ $uploaded_url }}" style="width:100%;"></iframe>
				    </div>         
                <input type="hidden" class="is_uploaded" name="is_uploaded" value="{{ $is_uploaded }}">
                <input type="hidden" class="uploaded_url" nam="uploaded_url" value="{{ $uploaded_url }}">
					<div class="upload-now">

					<div class="camera-option adhaar-camera">
						<div class="adhar-pop-inner">						
						<!--<div class="adhar-pop-box">-->

						<!--	<div class="adhar-in">-->
						<!--		<span><img src="{{ asset('assets/images/selfie.png') }}" title="" alt="" /></span>-->
						<!--	<label class="upload-text">Take Photo of Bank Statement</label>-->
						<!--	</div>-->
						<!--</div>-->
						<!-- end of adhar-pop-box -->
						<div class="adhar-pop-box">
							<div class="adhar-in">						
							<!-- <input type="file" id="actual-btn4" hidden=""> -->
							<span><img src="{{ asset('assets/images/upload-pic.png') }}" title="" alt="" /></span>							
							<label class="upload-text" >Choose Bank Statement from Device</label>
							</div>
						</div>
						<!-- end of adhar-pop-box -->
						
						<div class="form-action">
                                <div class="progress-wrp">
                                    <div class="progress-bar" style="width:0%"></div >
                                    <div class="status">Uploading</div>
                                </div>
                            </div>
					</div>
				</div>
				<!-- end of camera-option -->

					
						
						<!-- <input type="file" id="actual-btn3" hidden=""> -->
							
							<label class="after_remove">Upload Now</label>
					</div>
					<div class="card-type pancard-tyep">
						<div class="update-image"><img src="{{ asset('assets/images/update-icon.png') }}" title="" alt="" /></div>
						<div class="update-options">
							<!--<a href="{{$uploaded_img}}" target="_blank" download>Download</a>-->
							<a href="#" class="update-now">Update</a>
						</div>
						<!-- end of update-options -->
						<span class="icon-sec"><img src="{{ asset('assets/images/bank-statement.png') }}" title="" alt=""></span><span>Bank Statement </span>
						
						<span class="instru-icon-sec instruction-tooltip"><img src="{{ asset('assets/images/ic_note.png') }}" title="" alt="">
						<span class="tooltiptext">
						    <div class="note-sec">
						<p>Instructions:</p>
						<ul>
							<li>Name and address should be clearly visible in the document</li>
							<li>Ensure to take the photo of the original document</li>
							<li>Do not take photo of computer or any device screen</li>
							<li>Document should be clear, colored and readable  </li>
							<li>Do not upload black and white image </li>
							<li>All 4 corners of the document should be visible  </li>
							<li>Please upload documents PDF format only</li>
						</ul>
					</div>    
						    
						</span>
						</span>
						
					</div>
				</div>	
				<!-- end of upload-box -->
				<!--<div class="upload-box">-->
    <!--                <div class="uploaded-image">-->
				<!--        <img src="" title="" alt="" />-->
				<!--    </div>    -->
				<!--	<div class="upload-now">-->

				<!--	<div class="camera-option adhaar-camera" style="width:475px;">-->
				<!--		<div class="adhar-pop-inner">						-->
				<!--		<div class="adhar-pop-box">-->

				<!--			<div class="adhar-in">-->
				<!--				<span><img src="{{ asset('assets/images/selfie.png') }}" title="" alt="" /></span>-->
				<!--			<label class="upload-text">Take Photo of Bank Statement Online</label>-->
				<!--			</div>-->
				<!--		</div>-->
						 <!-- end of adhar-pop-box -->
				<!--		<div class="adhar-pop-box">-->
				<!--			<div class="adhar-in">						-->
				<!--			<input type="file" class="upd_file" id="lbl_bnk2" name="lbl_bnk2" data-lbl="BSTMT1" hidden>-->
				<!--			<span><img src="{{ asset('assets/images/upload-pic.png') }}" title="" alt="" /></span>							-->
				<!--			<label class="upload-text" for="lbl_bnk2">Choose Bank Statement Online from Device</label>-->
				<!--			</div>-->
				<!--		</div>-->
						 <!-- end of adhar-pop-box --> 
				<!--	</div>-->
				<!--</div>-->
				 <!-- end of camera-option -->

					
						
				<!--		 <input type="file" id="actual-btn3" hidden=""> -->
							
				<!--			<label>Upload Now</label>-->
				<!--	</div>-->
				<!--	<div class="card-type pancard-tyep">-->
				<!--		<div class="update-image"><img src="{{ asset('assets/images/update-icon.png') }}" title="" alt=""></div>-->
				<!--		<div class="update-options">-->
				<!--			<a href="{{$uploaded_img}}" target="_blank" download>Download</a>-->
				<!--			<a href="#" class="update-now">Update</a>-->
				<!--		</div>-->
						 <!-- end of update-options -->
				<!--		<span class="icon-sec"><img src="{{ asset('assets/images/bank-statement.png') }}" title="" alt=""></span><span>Fetch Bank Statement Online </span>-->
				<!--	</div>-->
				<!--</div>	-->
				 <!-- end of upload-box -->

				<div class="pass-cover create-password">
					<p class="bank-pass">*Bank Statement password if applicable</p>
					<form method="post" id="login-form" class="login-form">
						<div class="form-box">
								
		                        <input type="password" title="Password" id="pass" name="password" placeholder="Password" required=""> 
		                        <div class="show-password" onclick="myFunction()" style="top:14px"></div>
		                                          
		                </div>
		            </form>
	            </div> 

				<div class="cardpopbg">
				</div>
				<!-- end of popbg -->

<!--					<div class="note-sec">-->
<!--						<p>Instructions:</p>-->
<!--						<ul>-->
<!--							<li>Please ensure to take the photo of the original document</li>-->
<!--							<li>Do not take photo of screenshot or from device screen-->
<!--</li>-->
<!--							<li>Please ensure to take clear, bright, readable and colored photo-->
<!--</li>-->
<!--							<li>All 4 corners of the document should be clearly visible -->
<!--</li>-->
<!--							<li>Name, PAN No., Father’s name and DOB should be clearly visible-->
<!--in the photo</li>-->
<!--						</ul>-->
<!--					</div>-->

					<div class="adhaar-bg"></div>
				<div class="adhar-card-pop">
					<div class="adhar-pop-inner">
					    <button type="button" class="close" style="float:right;color:red;">&times;</button>
						<h4>Bank Statement<br/>
							<span class="dynamic_month_six">(Required for month April 2020-September 2020)</span>
							
						</h4>
						<div class="adhar-pop-box">
							<div class="adhar-in">
						
						<input type="file" class="upd_file" id="bnk_stmt_whole" name="bnk_stmt_whole" data-lbl="BSTMT" hidden>
							
							<label class="upload-text" for="bnk_stmt_whole">Single file (6 months)</label>
							@php
                        		$is_uploaded = 0;
                        		$uploaded_url = "";
                        	@endphp
                        	@if(isset($doc_list[2]['sub_doc_list'][0]['is_uploaded']) && $doc_list[2]['sub_doc_list'][0]['is_uploaded'] == "Y")
                        		@php
                        			$is_uploaded = 1;
                        			$uploaded_url = $doc_list[2]['sub_doc_list'][0]['url'];
                        		@endphp
                        	@endif
							<label class="upload-btn" for="bnk_stmt_whole" style="{{ ($is_uploaded == 1)?'color:green; border:2px solid green;':'' }}">{{ ($is_uploaded == 1)?'DONE':'ADD' }}</label>
							</div>
						</div>
						<!-- end of adhar-pop-box -->

						<div class="adhar-pop-box" style="text-align:center;">
							<div class="adhar-in">
						
								<span style="color:#d71f26">OR</span>
							</div>
						</div>
						<!-- end of adhar-pop-box -->

						<div class="adhar-pop-box half-input">
							<div class="adhar-in">
						
						<input type="file" class="upd_file" id="bnk_stmt_one" name="bnk_stmt_one" data-lbl="BSTMT1" hidden>
							
							<label class="upload-text" for="bnk_stmt_one">File 1</label>
							@php
                        		$is_uploaded = 0;
                        		$uploaded_url = "";
                        	@endphp
                        	@if(isset($doc_list[2]['sub_doc_list'][1]['is_uploaded']) && $doc_list[2]['sub_doc_list'][1]['is_uploaded'] == "Y")
                        		@php
                        			$is_uploaded = 1;
                        			$uploaded_url = $doc_list[2]['sub_doc_list'][1]['url'];
                        		@endphp
                        	@endif
							<label class="upload-btn" for="bnk_stmt_one" style="{{ ($is_uploaded == 1)?'color:green; border:2px solid green;':'' }}">{{ ($is_uploaded == 1)?'DONE':'ADD' }}</label>
							</div>
						</div>
						<!-- end of adhar-pop-box -->

						<div class="adhar-pop-box half-input">
							<div class="adhar-in">
						
						<input type="file" class="upd_file" id="bnk_stmt_two" name="bnk_stmt_two" data-lbl="BSTMT2" hidden>
							
							<label class="upload-text" for="bnk_stmt_two">File 2</label>
							@php
                        		$is_uploaded = 0;
                        		$uploaded_url = "";
                        	@endphp
                        	@if(isset($doc_list[2]['sub_doc_list'][2]['is_uploaded']) && $doc_list[2]['sub_doc_list'][2]['is_uploaded'] == "Y")
                        		@php
                        			$is_uploaded = 1;
                        			$uploaded_url = $doc_list[2]['sub_doc_list'][2]['url'];
                        		@endphp
                        	@endif
							<label class="upload-btn" for="bnk_stmt_two" style="{{ ($is_uploaded == 1)?'color:green; border:2px solid green;':'' }}">{{ ($is_uploaded == 1)?'DONE':'ADD' }}</label>
							</div>
						</div>
						<!-- end of adhar-pop-box -->

						<div class="adhar-pop-box half-input">
							<div class="adhar-in">
						
						<input type="file" class="upd_file" id="bnk_stmt_three" name="bnk_stmt_three" data-lbl="BSTMT3" hidden>
							
							<label class="upload-text" for="bnk_stmt_three">File 3</label>
							@php
                        		$is_uploaded = 0;
                        		$uploaded_url = "";
                        	@endphp
                        	@if(isset($doc_list[2]['sub_doc_list'][3]['is_uploaded']) && $doc_list[2]['sub_doc_list'][3]['is_uploaded'] == "Y")
                        		@php
                        			$is_uploaded = 1;
                        			$uploaded_url = $doc_list[2]['sub_doc_list'][3]['url'];
                        		@endphp
                        	@endif
							<label class="upload-btn" for="bnk_stmt_three" style="{{ ($is_uploaded == 1)?'color:green; border:2px solid green;':'' }}">{{ ($is_uploaded == 1)?'DONE':'ADD' }}</label>
							</div>
						</div>
						<!-- end of adhar-pop-box -->

						<div class="adhar-pop-box half-input">
							<div class="adhar-in">
						
						<input type="file" class="upd_file" id="bnk_stmt_four" name="bnk_stmt_four" data-lbl="BSTMT4" hidden>
							
							<label class="upload-text" for="bnk_stmt_four">File 4</label>
							@php
                        		$is_uploaded = 0;
                        		$uploaded_url = "";
                        	@endphp
                        	@if(isset($doc_list[2]['sub_doc_list'][4]['is_uploaded']) && $doc_list[2]['sub_doc_list'][4]['is_uploaded'] == "Y")
                        		@php
                        			$is_uploaded = 1;
                        			$uploaded_url = $doc_list[2]['sub_doc_list'][4]['url'];
                        		@endphp
                        	@endif
							<label class="upload-btn" for="bnk_stmt_four" style="{{ ($is_uploaded == 1)?'color:green; border:2px solid green;':'' }}">{{ ($is_uploaded == 1)?'DONE':'ADD' }}</label>
							</div>
						</div>
						<!-- end of adhar-pop-box -->

						<div class="adhar-pop-box half-input">
							<div class="adhar-in">
						
						<input type="file" class="upd_file" id="bnk_stmt_five" name="bnk_stmt_five" data-lbl="BSTMT5" hidden>
							
							<label class="upload-text" for="bnk_stmt_five">File 5</label>
							@php
                        		$is_uploaded = 0;
                        		$uploaded_url = "";
                        	@endphp
                        	@if(isset($doc_list[2]['sub_doc_list'][5]['is_uploaded']) && $doc_list[2]['sub_doc_list'][5]['is_uploaded'] == "Y")
                        		@php
                        			$is_uploaded = 1;
                        			$uploaded_url = $doc_list[2]['sub_doc_list'][5]['url'];
                        		@endphp
                        	@endif
							<label class="upload-btn" for="bnk_stmt_five" style="{{ ($is_uploaded == 1)?'color:green; border:2px solid green;':'' }}">{{ ($is_uploaded == 1)?'DONE':'ADD' }}</label>
							</div>
						</div>
						<!-- end of adhar-pop-box -->

						<div class="adhar-pop-box half-input">
							<div class="adhar-in">
						
						<input type="file" class="upd_file" id="bnk_stmt_six" name="bnk_stmt_six" data-lbl="BSTMT6" hidden>
							
							<label class="upload-text" for="bnk_stmt_six">File 6</label>
							@php
                        		$is_uploaded = 0;
                        		$uploaded_url = "";
                        	@endphp
                        	@if(isset($doc_list[2]['sub_doc_list'][6]['is_uploaded']) && $doc_list[2]['sub_doc_list'][6]['is_uploaded'] == "Y")
                        		@php
                        			$is_uploaded = 1;
                        			$uploaded_url = $doc_list[2]['sub_doc_list'][6]['url'];
                        		@endphp
                        	@endif
							<label class="upload-btn" for="bnk_stmt_six" style="{{ ($is_uploaded == 1)?'color:green; border:2px solid green;':'' }}">{{ ($is_uploaded == 1)?'DONE':'ADD' }}</label>
							</div>
						</div>
						<!-- end of adhar-pop-box -->
						
						<div class="form-action">
                                <div class="progress-wrp">
                                    <div class="progress-bar" style="width:0%"></div >
                                    <div class="status">Uploading</div>
                                </div>
                            </div>

					</div>
					<!-- end of adhar-pop-inner -->
				</div>	
				<!-- end of adhar-card-pop -->


				
				</div>
				<!-- end of bank-statement-doc -->

				<div class="salary-slip-doc" style="display:none;">
					
					<div class="doc-title">
						<h3>Salary Slips</h3>
					</div>
					<p class="upload-msg">Please upload last three months 
Salary Slips </p>
                    <span class="help-blocks status-failed"></span>	
                    @php
                		$is_uploaded = 0;
                		$uploaded_url = "";
                	@endphp
                	@if(isset($doc_list[1]['min_req_completed']) && $doc_list[1]['min_req_completed'] == "Y")
                		@php
                			$is_uploaded = 1;
                			$uploaded_url = $doc_list[1]['sub_doc_list'][0]['url'];
                		@endphp
                	@endif
				<div class="upload-box adhaar-box extra-files {{ ($is_uploaded == 1)?'uploaded-img':''}}">
                    
                    <div class="uploaded-image">
				        <!--<img src="{{ $uploaded_url }}" title="" alt="" />-->
				        <iframe src="{{ $uploaded_url }}" style="width:100%;"></iframe>
				    </div>          
                <input type="hidden" class="is_uploaded" name="is_uploaded" value="{{ $is_uploaded }}">
                <input type="hidden" class="uploaded_url" nam="uploaded_url" value="{{ $uploaded_url }}">
					<div class="upload-now">

					<div class="camera-option adhaar-camera">
						<div class="adhar-pop-inner">						
						<!--<div class="adhar-pop-box">-->

						<!--	<div class="adhar-in">-->
						<!--		<span><img src="{{ asset('assets/images/selfie.png') }}" title="" alt="" /></span>-->
						<!--	<label class="upload-text">Take Photo of Salary Slips Online</label>-->
						<!--	</div>-->
						<!--</div>-->
						<!-- end of adhar-pop-box -->
						<div class="adhar-pop-box">
							<div class="adhar-in">						
							<!-- <input type="file" id="actual-btn4" hidden=""> -->
							<span><img src="{{ asset('assets/images/upload-pic.png') }}" title="" alt="" /></span>							
							<label class="upload-text">Choose Salary Slips from Device</label>
							</div>
						</div>
						<!-- end of adhar-pop-box -->
					</div>
				</div>
				<!-- end of camera-option -->

					
						
						<!-- <input type="file" id="actual-btn3" hidden=""> -->
							
							<label class="after_remove">Upload Now</label>
					</div>
					<div class="card-type pancard-tyep">
						<div class="update-image"><img src="{{ asset('assets/images/update-icon.png') }}" title="" alt=""></div>
						<div class="update-options">
							<!--<a href="{{$uploaded_img}}" target="_blank" download>Download</a>-->
							<a href="#" class="update-now">Update</a>
						</div>
						<!-- end of update-options -->
						<span class="icon-sec"><img src="{{ asset('assets/images/bank-statement.png') }}" title="" alt=""></span><span>Salary Slips </span>
						
						<span class="instru-icon-sec instruction-tooltip"><img src="{{ asset('assets/images/ic_note.png') }}" title="" alt="">
						<span class="tooltiptext">
						    <div class="note-sec">
						<p>Instructions:</p>
						<ul>
							<li>Name and address should be clearly visible in the document</li>
							<li>Ensure to take the photo of the original document</li>
							<li>Do not take photo of computer or any device screen</li>
							<li>Document should be clear, colored and readable  </li>
							<li>Do not upload black and white image </li>
							<li>All 4 corners of the document should be visible  </li>
							<li>Please upload documents JPG, JPEG ,PNG and .PDF format only</li>
						</ul>
					</div>    
						    
						</span>
						</span>
						
					</div>
				</div>	
				<!-- end of upload-box -->
				<!--<div class="upload-box">-->
    <!--                <div class="uploaded-image">-->
				<!--        <img src="" title="" alt="" />-->
				<!--    </div>   -->
				<!--	<div class="upload-now">-->

				<!--	<div class="camera-option adhaar-camera" style="width:475px;">-->
				<!--		<div class="adhar-pop-inner">						-->
				<!--		<div class="adhar-pop-box">-->

				<!--			<div class="adhar-in">-->
				<!--				<span><img src="{{ asset('assets/images/selfie.png') }}" title="" alt="" /></span>-->
				<!--			<label class="upload-text">Take Photo of Bank Statement Online</label>-->
				<!--			</div>-->
				<!--		</div>-->
						<!-- end of adhar-pop-box -->
				<!--		<div class="adhar-pop-box">-->
				<!--			<div class="adhar-in">						-->
				<!--			<input type="file" class="upd_file" id="salslponl" name="salslponl" data-lbl="PS1" hidden>-->
				<!--			<span><img src="{{ asset('assets/images/upload-pic.png') }}" title="" alt="" /></span>							-->
				<!--			<label class="upload-text" for="salslponl">Choose Bank Statement Online from Device</label>-->
				<!--			</div>-->
				<!--		</div>-->
						<!-- end of adhar-pop-box -->
				<!--	</div>-->
				<!--</div>-->
				<!-- end of camera-option -->

					
						
						<!-- <input type="file" id="actual-btn3" hidden=""> -->
							
				<!--			<label>Upload Now</label>-->
				<!--	</div>-->
				<!--	<div class="card-type pancard-tyep">-->
				<!--		<div class="update-image"><img src="{{ asset('assets/images/update-icon.png') }}" title="" alt=""></div>-->
				<!--		<div class="update-options">-->
				<!--			<a href="{{$uploaded_img}}" target="_blank" download>Download</a>-->
				<!--			<a href="#" class="update-now">Update</a>-->
				<!--		</div>-->
						<!-- end of update-options -->
				<!--		<span class="icon-sec"><img src="{{ asset('assets/images/bank-statement.png') }}" title="" alt=""></span><span>Fetch Bank Statement Online </span>-->
				<!--	</div>-->
				<!--</div>	-->
				<!-- end of upload-box -->

				<div class="pass-cover create-password">
					<p class="bank-pass">*Salary Slip password if applicable</p>
					<form method="post" id="login-form" class="login-form">
						<div class="form-box">
								
		                        <input type="password" title="Password" id="pass" name="password" placeholder="Password" required=""> 
		                        <div class="show-password" onclick="myFunction()" style="top:14px"></div>
		                                          
		                </div>
		            </form> 
	            </div> 

				<div class="cardpopbg">
				</div>
				<!-- end of popbg -->

				

<!--					<div class="note-sec">-->
<!--						<p>Instructions:</p>-->
<!--						<ul>-->
<!--							<li>Please upload last three months latest salary slips in PDF format</li>-->
<!--							<li>Please ensure to upload the clear, readable copy of the-->
<!--salary slips-->
<!--</li>-->
							

<!--						</ul>-->
<!--					</div>-->


					<div class="adhaar-bg"></div>
				<div class="adhar-card-pop">
					<div class="adhar-pop-inner">
					    <button type="button" class="close" style="float:right;color:red;">&times;</button>
						<h4>Salary Slip<br/>
							<span class="dynamic_month_three">(Required for months July 2020-September 2020)</span>
						</h4>
												

						<div class="adhar-pop-box half-input">
							<div class="adhar-in">
						
						<input type="file" class="upd_file" id="salslp1" name="salslp1" data-lbl="PS1" hidden>
							
							<label class="upload-text" for="salslp1">File 1</label>
							@php
                        		$is_uploaded = 0;
                        		$uploaded_url = "";
                        	@endphp
                        	@if(isset($doc_list[1]['sub_doc_list'][0]['is_uploaded']) && $doc_list[1]['sub_doc_list'][0]['is_uploaded'] == "Y")
                        		@php
                        			$is_uploaded = 1;
                        			$uploaded_url = $doc_list[1]['sub_doc_list'][0]['url'];
                        		@endphp
                        	@endif
							<label class="upload-btn" for="salslp1" style="{{ ($is_uploaded == 1)?'color:green; border:2px solid green;':'' }}">{{ ($is_uploaded == 1)?'DONE':'ADD' }}</label>
							</div>
						</div>
						<!-- end of adhar-pop-box -->

						<div class="adhar-pop-box half-input">
							<div class="adhar-in">
						
						<input type="file" class="upd_file" id="salslp2" name="salslp2" data-lbl="PS2" hidden>
							
							<label class="upload-text" for="salslp2">File 2</label>
							@php
                        		$is_uploaded = 0;
                        		$uploaded_url = "";
                        	@endphp
                        	@if(isset($doc_list[1]['sub_doc_list'][1]['is_uploaded']) && $doc_list[1]['sub_doc_list'][1]['is_uploaded'] == "Y")
                        		@php
                        			$is_uploaded = 1;
                        			$uploaded_url = $doc_list[1]['sub_doc_list'][1]['url'];
                        		@endphp
                        	@endif
							<label class="upload-btn" for="salslp2" style="{{ ($is_uploaded == 1)?'color:green; border:2px solid green;':'' }}">{{ ($is_uploaded == 1)?'DONE':'ADD' }}</label>
							</div>
						</div>
						<!-- end of adhar-pop-box -->

						<div class="adhar-pop-box half-input">
							<div class="adhar-in">
				
						<input type="file" class="upd_file" id="salslp3" name="salslp3" data-lbl="PS3" hidden>
							
							<label class="upload-text" for="salslp3">File 3</label>
							@php
                        		$is_uploaded = 0;
                        		$uploaded_url = "";
                        	@endphp
                        	@if(isset($doc_list[1]['sub_doc_list'][2]['is_uploaded']) && $doc_list[1]['sub_doc_list'][2]['is_uploaded'] == "Y")
                        		@php
                        			$is_uploaded = 1;
                        			$uploaded_url = $doc_list[1]['sub_doc_list'][2]['url'];
                        		@endphp
                        	@endif
							<label class="upload-btn" for="salslp3" style="{{ ($is_uploaded == 1)?'color:green; border:2px solid green;':'' }}">{{ ($is_uploaded == 1)?'DONE':'ADD' }}</label>
							</div>
						</div>
						<!-- end of adhar-pop-box -->

					</div>
					<!-- end of adhar-pop-inner -->

					<div class="form-action">
                        <!--<input style="background:transparent;border-radius:20px;color:#d71f26 " type="submit" title="Submit" name="submit" value="Uploading">-->
                        <div class="progress-wrp">
                            <div class="progress-bar" style="width:0%"></div >
                            <div class="status">Uploading</div>
                        </div>
                    </div>
				</div>	
				<!-- end of adhar-card-pop -->
				
				</div>
				<!-- end of salary-slip-doc -->



				<div class="photo-selfie-details" style="display:none;">
					<div class="doc-title">
						<h3>Selfie</h3>
					</div>
					<p class="upload-msg">Please upload your Selfie captured in bright environment </p>
					<span class="help-blocks status-failed"></span>	
                    @php
                		$is_uploaded = 0;
                		$uploaded_url = "";
                	@endphp
                	@if(isset($doc_list[0]['min_req_completed']) && $doc_list[0]['min_req_completed'] == "Y")
                		@php
                			$is_uploaded = 1;
                			$uploaded_url = $doc_list[0]['sub_doc_list'][0]['url'];
                		@endphp
                	@endif
				<div class="upload-box {{ ($is_uploaded == 1)?'uploaded-img':''}}">	
				    
                    <div class="uploaded-image">
				        <img src="{{ $uploaded_url }}" title="" alt="" />
				    </div>          
                <input type="hidden" class="is_uploaded" name="is_uploaded" value="{{ $is_uploaded }}">
                <input type="hidden" class="uploaded_url" nam="uploaded_url" value="{{ $uploaded_url }}">
				<div class="upload-now">		

				<div class="camera-option pan-camera">
						<div class="adhar-pop-inner">						
						<!--<div class="adhar-pop-box">-->

						<!--	<div class="adhar-in">-->
						<!--		<span><img src="{{ asset('assets/images/selfie.png') }}" title="" alt=""></span>-->
						<!--	<label class="upload-text">Take your photo</label>-->
						<!--	</div>-->
						<!--</div>-->
						<!-- end of adhar-pop-box -->
						<div class="adhar-pop-box">
							<div class="adhar-in">						
							<input type="file" class="upd_file" id="selfiedvc" name="selfiedvc" data-lbl="PHOTO" hidden>
							<span><img src="{{ asset('assets/images/upload-pic.png') }}" title="" alt=""></span>							
							<label class="upload-text" for="selfiedvc">Choose your selfie from device</label>
							</div>
						</div>
						<!-- end of adhar-pop-box -->
						
						    <div class="form-action">
                                <div class="progress-wrp">
                                    <div class="progress-bar" style="width: 4%;"></div>
                                    <div class="status">Uploading</div>
                                </div>
                            </div>
					</div>
				</div>
				<!-- end of camera-option -->



					
						
						<!-- <input type="file" id="actual-btn3" hidden=""> -->
							
							<label class="after_remove">Select File</label>
					</div>

					<div class="card-type pancard-tyep">
						<div class="update-image"><img src="{{ asset('assets/images/update-icon.png') }}" title="" alt=""></div>
						<div class="update-options">
							<!--<a href="{{$uploaded_img}}" target="_blank" download>Download</a>-->
							<a href="#" class="update-now">Update</a>
						</div>
						<!-- end of update-options -->
						<span class="icon-sec"><img src="{{ asset('assets/images/kyc-pan.png') }}" title="" alt=""></span><span>Selfie</span>
						
						<span class="instru-icon-sec instruction-tooltip"><img src="{{ asset('assets/images/ic_note.png') }}" title="" alt="">
						<span class="tooltiptext">
						    <div class="note-sec">
						<p>Instructions:</p>
						<ul>
							<li>Selfie should be bright with your face visible </li>
							<li>Unclear/Dark light selfie will not be accepted</li>
							<li> Take the selfie while standing or sitting</li>
							<li>Selfie taken while lying down will not be accepted </li>
							<li>Take a selfie while wearing a Shirt/T-shirt </li>
							<li>Please upload documents in JPG, JPEG and PNG format only</li>
						</ul>
					</div>    
						    
						</span>
						</span>
						
					</div>
					
				</div>	
				

				<div class="cardpopbg">
				</div>
				
<!--					<div class="note-sec">-->
<!--						<p>Instructions:</p>-->
<!--						<ul>-->
<!--							<li>Please ensure to take the photo of the original document</li>-->
<!--							<li>Do not take photo of screenshot or from device screen-->
<!--</li>-->
<!--							<li>Please ensure to take clear, bright, readable and colored photo-->
<!--</li>-->
<!--							<li>All 4 corners of the document should be clearly visible -->
<!--</li>-->
<!--							<li>Name, PAN No., Father’s name and DOB should be clearly visible-->
<!--in the photo</li>-->
<!--						</ul>-->
<!--					</div>-->
				
				</div>


		</div>
	</div>
	
</div>
<!-- end of login-wrapper -->

<style>
	body{    background: #f7f7f7;}
.loancomple-step li a{font-weight:400;padding-top:35px;font-size: 13px;}	
.loancomple-step li.active a{font-weight:700;}
.kyc-doc-center li{width:calc(100% - 40px);border-radius:10px;margin:0 20px 10px;cursor:pointer;}	
.kyc-doc-center li:hover{box-shadow: 1px 3px 3px #c7c7c7;}
.login-wrapper{float:left;width:100%;padding-bottom:50px;}
.login-wrapper .left{width:50%;}
.login-wrapper .right{width: 50%;padding:0;position:static;}
.complete-login {
    padding: 0 110px;
}
.login-wrapper .form-action input[type="submit"], .login-wrapper .form-action input[type="button"]{border-radius:5px;text-transform: capitalize;max-width:154px;/*background:#d71f26;color:#fff;*/font-weight: 400;font-size: 15px;letter-spacing:1px;}
.loancomple-step li a:before{width: 28px;
    height: 28px;}
.loancomple-step li.active a:before{width: 28px;
    height: 28px;}
.loancomple-step li.active a:before{background-size: 11px;}  
.doc-title h3 {
    font-weight: 400;
    font-size: 18px;
}
.doc-title{padding:20px 15px;}
.upload-msg{color:#000;margin:30px 0 19px;font-size:15px;font-weight:700;} 
.note-sec li{color: #828282;font-size:13px;margin-bottom:9px;padding-left: 11px;} 
.note-sec li:before{background: #828282;    width: 5px;
    height: 5px;} 
.upload-box{padding:46px 0 5px;border-radius:10px;box-shadow: 2px 3px 3px #c7c7c7;
}
  
.upload-now label{    font-size: 14px;
    margin-top: 28px;
    display: block;color:#000;font-weight:700;}  

.adhar-card-pop{       position: absolute;
    
    top: 195px;
    bottom: inherit;
    left: 0;
    right: 0;
    height: auto;
    margin: auto;
    background: #fff;
    width: 485px;
    height:auto;
    padding: 15px 20px;
    z-index: 10;
    border-radius: 20px;
    display: none;} 

.bank-statement-doc .adhar-card-pop{width: 800px;}    
 
.bank-statement-doc .adhar-pop-box {padding:0 15px;}        
.bank-statement-doc .adhar-pop-box.half-input{width:50%;float:left;} 
.adhar-card-pop h4{text-align:left;} 
.current-address-doc .doc-title, .permanennt-address-doc .doc-title, .bank-statement-doc .doc-title, .salary-slip-doc .doc-title{margin:0;
}
   
@media (max-width:767px){
.login-wrapper .left{width:100%;}
.login-wrapper .right{width:100%;}
.complete-login {
    padding: 0 20px;
}
.details {
    margin: -40px 0px 0;
}
.loancomple-step li a:after {
    top: 14px;
    right: -22px;
}	
}       
</style>
@endsection
@section('script')

<script>
    // CAMERA SETTINGS.
    // Webcam.set({
    //     width: 220,
    //     height: 190,
    //     image_format: 'jpeg',
    //     jpeg_quality: 100
    // });
    // Webcam.attach('#camera');

    // // SHOW THE SNAPSHOT.
    // takeSnapShot = function () {
    //     Webcam.snap(function (data_uri) {
    //         //$('.upload-box').find('.uploaded_url').val(data_uri);
    //         $('.pancard-doc .upload-box').find(".uploaded-image img").attr("src",data_uri);
    //         // $('.pancard-doc .upload-box').find(".upd_file").val(data_uri);
    //         //$('.pancard-doc .upload-box').find(".upd_file").trigger("change");
    //         //console.log(data_uri);
    //         // document.getElementById('snapShot').innerHTML = 
    //             // '<img src="' + data_uri + '" width="70px" height="50px" />';
    //     });
    // }
</script>
<script>	
const actualBtn = document.getElementById('actual-btn3');
const fileChosen = document.getElementById('file-chosen');

</script>
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".close").click(function(){
    $(".update-options").fadeOut();
    $(".adhaar-bg").fadeOut();
    $('.camera-option').fadeOut(); 
    $('.adhar-card-pop').fadeOut(); 
});

$(document).ready(function(){
    var maxDate = "";
    
    function get_range_date(gap){
        var dtToday = new Date();//mm-dd-yyyy
        var MonthArray = ["January","February","March","April","May","June","July","August","September","October","November","December"];
        //alert(dtToday.getMonth()); // 2
        //var month = Math.abs(dtToday.getMonth() - gap);
        var month = dtToday.getMonth() - gap;
        if(month <= 0){
            //minus
            month = 12 - Math.abs(month);
            if(month >= 12){
                month = 0;
            }
        }

        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        //alert(dtToday.getMonth() - gap);
        if((dtToday.getMonth() - gap) < 0){
            var year = dtToday.getFullYear() - 1;
        }
        if((dtToday.getMonth() - gap) == 0){
            var year = dtToday.getFullYear();
        }
        maxDate = MonthArray[month] + ' ' + year;
        //alert(maxDate);
        return maxDate;
        
    }
    //get_range_date(3);
    $(".dynamic_month_six").html("(Required for month "+get_range_date(6)+"-"+get_range_date(1)+")");
    $(".dynamic_month_three").html("(Required for month "+get_range_date(3)+"-"+get_range_date(1)+")");
    
    
    $(".pan").click(function(){
        $(".pancard-doc").fadeIn();
        $(".permanennt-address-doc").fadeOut();
        $(".current-address-doc").fadeOut();   
        $(".salary-slip-doc").fadeOut(); 
        $(".bank-statement-doc").fadeOut();
        $(".photo-selfie-details").fadeOut();
    });


    $(".permanent-add").click(function(){
        $(".pancard-doc").fadeOut();
        $(".permanennt-address-doc").fadeIn();
        $(".current-address-doc").fadeOut();   
        $(".salary-slip-doc").fadeOut(); 
        $(".bank-statement-doc").fadeOut();
        $(".photo-selfie-details").fadeOut();
    });
      

    $(".Current-add").click(function(){
        $(".pancard-doc").fadeOut();
        $(".permanennt-address-doc").fadeOut();
        $(".current-address-doc").fadeIn();   
        $(".salary-slip-doc").fadeOut(); 
        $(".bank-statement-doc").fadeOut();
        $(".photo-selfie-details").fadeOut();
    });
     

    $(".salary-slip").click(function(){
        $(".pancard-doc").fadeOut();
        $(".permanennt-address-doc").fadeOut();
        $(".current-address-doc").fadeOut();   
        $(".salary-slip-doc").fadeIn(); 
        $(".bank-statement-doc").fadeOut();
        $(".photo-selfie-details").fadeOut();
    });
     

    $(".bank-statement").click(function(){
        $(".pancard-doc").fadeOut();
        $(".permanennt-address-doc").fadeOut();
        $(".current-address-doc").fadeOut();   
        $(".salary-slip-doc").fadeOut(); 
        $(".bank-statement-doc").fadeIn();
        $(".photo-selfie-details").fadeOut();
    });

    
    $(".photo-selfie").click(function(){
        $(".pancard-doc").fadeOut();
        $(".permanennt-address-doc").fadeOut();
        $(".current-address-doc").fadeOut();   
        $(".salary-slip-doc").fadeOut(); 
        $(".bank-statement-doc").fadeOut();
        $(".photo-selfie-details").fadeIn();
    
    });
     
    
    $(".upload-box").click(function(){
        $(".upload-box + .doc-popup").fadeIn();
        $(".doc-popup + .cardpopbg").fadeIn();
    });

    $(".cardpopbg").click(function(){
        $(".upload-box + .doc-popup").fadeOut();
        $(".doc-popup + .cardpopbg").fadeOut();
        $(".cardpopbg + .take-photopop").fadeOut(); 
    });

    $(".add-pan").click(function(){
        $(".upload-box + .doc-popup").fadeOut(); 
        $(".cardpopbg + .take-photopop").fadeIn();   
    });


/*Camera js*/

    $(".upload-now").click(function(){
        $(this).find('.camera-option').fadeIn();
        $('.adhaar-bg').fadeIn();
    });
    $(".update-now").click(function(){
        $(this).closest(".upload-box").find('.upload-now .camera-option').fadeIn();
        $('.adhaar-bg').fadeIn();
    });


 /*update image js*/

    $(".update-image").click(function(){
        $(this).next('.update-options').fadeToggle();   
    });


/*Adhaar card back front pop js*/
    $(".permanennt-address-doc .adhaar-box .camera-option, .current-address-doc .adhaar-box .camera-option").click(function(){
        $(".adhaar-bg").fadeIn(); 
        $(".adhar-card-pop.adhaar").fadeIn();   
    });
    
     $(".permanennt-address-doc .passport-box .camera-option, .current-address-doc .passport-box .camera-option").click(function(){
        $(".adhaar-bg").fadeIn(); 
        $(".adhar-card-pop.passport").fadeIn();   
    });
    
     $(".permanennt-address-doc .voterid-box .camera-option, .current-address-doc .voterid-box .camera-option").click(function(){
        $(".adhaar-bg").fadeIn(); 
        $(".adhar-card-pop.voterid").fadeIn();   
    });

    // $(".current-address-doc .adhaar-box .camera-option").click(function(){
    //     $(".adhaar-bg").fadeIn(); 
    //     $(".adhar-card-pop").fadeIn();   
    // });

    $(".bank-statement-doc .adhaar-box .camera-option").click(function(){
        $(".adhaar-bg").fadeIn(); 
        $(".adhar-card-pop").fadeIn();   
    });

    $(".salary-slip-doc .adhaar-box .camera-option").click(function(){
        $(".adhaar-bg").fadeIn(); 
        $(".adhar-card-pop").fadeIn();   
    });		

    $(".adhaar-bg").click(function(){
        $(".adhaar-bg").fadeOut(); 
        $(".adhar-card-pop").fadeOut(); 
        $('.camera-option').fadeOut(); 
    });
});
</script>
<script>

$.fn.equalHeights = function(){
	var max_height = 0;
	$(this).each(function(){
		max_height = Math.max($(this).height(), max_height);
	});
	$(this).each(function(){
		$(this).height(max_height);
	});
};

</script>
<script>
function myFunction() {
  var pass = document.getElementById("pass");
  var conpass = document.getElementById("conpass");
  if (pass.type === "password") {
    pass.type = "text";
  } else {
    pass.type = "password";
  }
 }
 var flagger = 0;
 var p_eq_c = $("#p_eq_c").val();
function set_green_check(){
    var all_complete = 0;
    
    $(".upload-text").css("font-size","17px");
    
    if($(".pancard-doc").find(".is_uploaded").val() == 1){
        $(".pan").addClass("active");
        all_complete = all_complete + 1;
        $(".pancard-doc").find(".after_remove").css("display","none");
    }
    // permanent start
    if($(".permanennt-address-doc").find(".adhaar-box").css("display") == 'block' && $(".permanennt-address-doc").find(".adhaar-box .is_uploaded").val() == 1){
        $(".permanent-add").addClass("active");
        all_complete = all_complete + 1;
        $(".permanennt-address-doc").find(".adhaar-box .after_remove").css("display","none");
        
    }else if($(".permanennt-address-doc").find(".passport-box").css("display") == 'block' && $(".permanennt-address-doc").find(".passport-box .is_uploaded").val() == 1){
        $(".permanent-add").addClass("active");
        all_complete = all_complete + 1;
        $(".permanennt-address-doc").find(".passport-box .after_remove").css("display","none");
        
    }else if($(".permanennt-address-doc").find(".voterid-box").css("display") == 'block' && $(".permanennt-address-doc").find(".voterid-box .is_uploaded").val() == 1){
        $(".permanent-add").addClass("active");
        all_complete = all_complete + 1;
        $(".permanennt-address-doc").find(".voterid-box .after_remove").css("display","none");
        
    }else if($(".permanennt-address-doc").find(".is_uploaded").length > 0){
        var validator = $(".permanennt-address-doc").find("input[type='hidden']");
        if(validator.length > 0){
            for(var i=0;i<validator.length;i++){
                //console.log($(validator[i]).val());
                if($(validator[i]).val() == "1" && $(validator[i]).parent().css("display") == 'block'){
                    $(".permanent-add").addClass("active");
                    all_complete = all_complete + 1;
                    $(validator[i]).closest(".after_remove").css("display","none");
                    break;
                }
            }
        }
    }
    // end permanent
    
    // Cureent Address strat
    if(p_eq_c == 0){
       // var isVisible = $(".permanennt-address-doc").find(".adhaar-box").css("display");
        //console.log(isVisible);
        if($(".current-address-doc").find(".adhaar-box").css("display") == 'block' && $(".current-address-doc").find(".adhaar-box .is_uploaded").val() == 1){
            $(".Current-add").addClass("active");
            all_complete = all_complete + 1;
            $(".current-address-doc").find(".adhaar-box .after_remove").css("display","none");
            
        }else if($(".current-address-doc").find(".passport-box").css("display") == 'block' && $(".current-address-doc").find(".passport-box .is_uploaded").val() == 1){
            //console.log("paasport fire");
            $(".Current-add").addClass("active");
            all_complete = all_complete + 1;
            $(".current-address-doc").find(".passport-box .after_remove").css("display","none");
            
        }else if($(".current-address-doc").find(".voterid-box").css("display") == 'block' && $(".current-address-doc").find(".voterid-box .is_uploaded").val() == 1){
            //console.log("voterid fire");
            $(".Current-add").addClass("active");
            all_complete = all_complete + 1;
            $(".current-address-doc").find(".voterid-box .after_remove").css("display","none");
            
        }else if($(".current-address-doc").find(".is_uploaded").length > 0){
            var validator = $(".current-address-doc").find("input[type='hidden']");
            if(validator.length > 0){
                for(var i=0;i<validator.length;i++){
                    //console.log($(validator[i]).val());
                    //console.log($(validator[i]).parent().attr('class'));
                    if($(validator[i]).val() == "1" && $(validator[i]).parent().css("display") == 'block'){
                        $(".Current-add").addClass("active");
                        all_complete = all_complete + 1;
                        $(validator[i]).closest(".after_remove").css("display","none");
                        break;
                    }
                }
            }
        }
    }
    // Cureent Address End
    
    // bank-statement start
    if($(".bank-statement-doc").find(".extra-or-files .is_uploaded").val() == 1){
        $(".bank-statement").addClass("active");
        all_complete = all_complete + 1;
        $(".bank-statement-doc").find(".after_remove").css("display","none");
    }
    // bank-statement end
    
    // salary-slip start
    if($(".salary-slip-doc").find(".extra-files .is_uploaded").val() == 1){
        $(".salary-slip").addClass("active");
        all_complete = all_complete + 1;
        $(".salary-slip-doc").find(".after_remove").css("display","none");
    }
    // salary-slip end
    
    // photo-selfie start
    if($(".photo-selfie-details").find(".is_uploaded").val() == 1){
        $(".photo-selfie").addClass("active");
        all_complete = all_complete + 1;
        $(".photo-selfie-details").find(".after_remove").css("display","none");
    }
    // photo-selfie end
    flagger = all_complete;
    if(all_complete == 6 || (p_eq_c == 1 && all_complete == 5)){
        //$("#phase").removeAttr("disabled");
        $("#phase").addClass("redbtn");
        $(".loancomple-step").find("li:eq(1)").addClass("active");
    }
}
function current_parmanent_toggle_ifExist(data,doc_list_kyc_temp = ""){
    if(data == ""){
      $.ajax({
          type: "GET",
          dataType: 'JSON',
          url: "kyc-documents-check",
          success: function(data){
              
            if(data.status == 2){
                window.location.href='login';
            }else if(data.status == 0){
                window.location.href='login';
            }else{
                data = data.data;
                current_parmanent_toggle_ifExist(data);
            }
            
          }
        });  
    }
    if(data != ""){
        //console.log(doc_list_kyc_temp);
        if(data[4]['min_req_completed'] == "Y"){
            // hide addhar card from current address
            $(".current-address-doc").find(".adhaar-box").css("display","none");
            // end hide code 
            if(((doc_list_kyc_temp['current.ADHR'] != undefined) && doc_list_kyc_temp['current.ADHR'] == 1) && ((doc_list_kyc_temp['current.ADHR1'] != undefined) && doc_list_kyc_temp['current.ADHR1'] == 1)){
                $(".current-address-doc").find(".adhaar-box").css("display","block");
            }
        }else{
            if(data[7]['min_req_completed'] == "Y"){
            // hide addhar card from current address
                $(".permanennt-address-doc").find(".adhaar-box").css("display","none");
                // end hide code 
                if(((doc_list_kyc_temp['permanent.PADHR'] != undefined) && doc_list_kyc_temp['permanent.PADHR'] == 1) && ((doc_list_kyc_temp['permanent.PADHR1'] != undefined) && doc_list_kyc_temp['permanent.PADHR1'] == 1)){
                    $(".permanennt-address-doc").find(".adhaar-box").css("display","block");
                }
            }
        }
        
        if(data[10]['min_req_completed'] == "Y"){
            // hide addhar card from current address
            $(".current-address-doc").find(".passport-box").css("display","none");
            // end hide code 
            if(((doc_list_kyc_temp['current.Passport'] != undefined) && doc_list_kyc_temp['current.Passport'] == 1) && ((doc_list_kyc_temp['current.Passport1'] != undefined) && doc_list_kyc_temp['current.Passport1'] == 1)){
                $(".current-address-doc").find(".passport-box").css("display","block");
            }
        }else{
            if(data[9]['min_req_completed'] == "Y"){
                // hide addhar card from current address
                $(".permanennt-address-doc").find(".passport-box").css("display","none");
                // end hide code 
                if(((doc_list_kyc_temp['permanent.Passport'] != undefined) && doc_list_kyc_temp['permanent.Passport'] == 1) && ((doc_list_kyc_temp['permanent.Passport1'] != undefined) && doc_list_kyc_temp['permanent.Passport1'] == 1)){
                    $(".permanennt-address-doc").find(".passport-box").css("display","block");
                }
            }
        }
        
        if(data[6]['min_req_completed'] == "Y"){
            // hide addhar card from current address
            $(".current-address-doc").find(".voterid-box").css("display","none");
            //console.log(doc_list_kyc_temp['current.PVI']);
            // end hide code 
            if(((doc_list_kyc_temp['current.PVI'] != undefined) && doc_list_kyc_temp['current.PVI'] == 1) && ((doc_list_kyc_temp['current.PVI1'] != undefined) && doc_list_kyc_temp['current.PVI1'] == 1)){
                $(".current-address-doc").find(".voterid-box").css("display","block");
            }
        }else{
            if(data[8]['min_req_completed'] == "Y"){
                // hide addhar card from current address
                $(".permanennt-address-doc").find(".voterid-box").css("display","none");
                // end hide code 
                if(((doc_list_kyc_temp['permanent.PVI'] != undefined) && doc_list_kyc_temp['permanent.PVI'] == 1) && ((doc_list_kyc_temp['permanent.PVI1'] != undefined) && doc_list_kyc_temp['permanent.PVI1'] == 1)){
                    $(".permanennt-address-doc").find(".voterid-box").css("display","block");
                }
            }
        }
        
        
        
        if(data[5]['min_req_completed'] == "Y"){
            // hide addhar card from current address
            if($(".permanennt-address-doc").find(".driving-box").hasClass("uploaded-img")){
                $(".current-address-doc").find(".driving-box").css("display","none");
                if(((doc_list_kyc_temp['current.PDRV'] != undefined) && doc_list_kyc_temp['current.PDRV'] == 1)){
                    $(".current-address-doc").find(".voterid-box").css("display","block");
                }
            }else if($(".current-address-doc").find(".driving-box").hasClass("uploaded-img")){
                $(".permanennt-address-doc").find(".driving-box").css("display","none");
                if(((doc_list_kyc_temp['permanent.PDRV'] != undefined) && doc_list_kyc_temp['permanent.PDRV'] == 1)){
                    $(".permanennt-address-doc").find(".driving-box").css("display","block");    
                }
            }
            
            // end hide code 
        }
        
        if(data[13]['min_req_completed'] == "Y"){
            // hide addhar card from current address
            if($(".current-address-doc").find(".electricity-box").hasClass("uploaded-img")){
                $(".permanennt-address-doc").find(".electricity-box").css("display","none");
                if(((doc_list_kyc_temp['permanent.ELECTRICITY_BILL'] != undefined) && doc_list_kyc_temp['permanent.ELECTRICITY_BILL'] == 1)){
                    $(".permanennt-address-doc").find(".electricity-box").css("display","block");    
                }
            }else if($(".permanennt-address-doc").find(".electricity-box").hasClass("uploaded-img")){
                
                $(".current-address-doc").find(".electricity-box").css("display","none");
                if(((doc_list_kyc_temp['current.ELECTRICITY_BILL'] != undefined) && doc_list_kyc_temp['current.ELECTRICITY_BILL'] == 1)){
                    $(".current-address-doc").find(".electricity-box").css("display","block");
                }
            }
            
            
            // end hide code 
        }
        
        if(data[12]['min_req_completed'] == "Y"){
            // hide addhar card from current address
            if($(".current-address-doc").find(".gas-box").hasClass("uploaded-img")){
                $(".permanennt-address-doc").find(".gas-box").css("display","none");
                if(((doc_list_kyc_temp['permanent.GAS_BILL'] != undefined) && doc_list_kyc_temp['permanent.GAS_BILL'] == 1)){
                    $(".permanennt-address-doc").find(".gas-box").css("display","block");    
                }
            }else if($(".permanennt-address-doc").find(".gas-box").hasClass("uploaded-img")){
                $(".current-address-doc").find(".gas-box").css("display","none");
                if(((doc_list_kyc_temp['current.GAS_BILL'] != undefined) && doc_list_kyc_temp['current.GAS_BILL'] == 1)){
                    $(".current-address-doc").find(".gas-box").css("display","block");    
                }
            }
            
            
            // end hide code 
        }
        set_green_check();
    }
}
$("#phase").click(function(){
    if(flagger == 6 || (p_eq_c == 1 && flagger == 5)){
        window.location.href='bank-details';
    }else{
        $("#kyc_error").html("Please upload all KYC docs and continue");
    }
});
$(document).ready(function(){ 
    $(".progress-wrp").css("display","none");
    
    current_parmanent_toggle_ifExist("");
    // set_green_check();
    $(".upd_file").change(function(e){
        
        _thh = $(this);
        formData = new FormData();
        label = $(this).data("lbl");
        formData.append('image',e.target.files[0]);
        password = "";
        if($(this).closest(".bank-statement-doc").length > 0){
            password = $(this).closest(".bank-statement-doc").find("input[name='password']").val();
        } else if($(this).closest(".salary-slip-doc").length > 0){
            password = $(this).closest(".salary-slip-doc").find("input[name='password']").val();
        }
        formData.append('label',label);
        formData.append('password',password);
        
        // File type for bank statement
        var avatarok = 1;
        var avatar = _thh.val();
        var extension = avatar.split('.').pop().toUpperCase();
        if (extension!="PDF" && (label == "BSTMT" || label == "BSTMT1" || label == "BSTMT2" || label == "BSTMT3" || label == "BSTMT4" || label == "BSTMT5" || label == "BSTMT6")){
            avatarok = 0;
        }
        if(_thh.hasClass("permanent")){
            formData.append('label_class','permanent.'+label);
        }else if(_thh.hasClass("current")){
            formData.append('label_class','current.'+label);
        }
        if(avatarok == 1){
             $.ajax({
              url:  "{{ url('kyc-documents-fill') }}",
              type: "POST",
              data: formData,
              dataType : "json",
              processData: false,
              contentType: false,
              encode: true,
              xhr: function(){
    			//upload Progress
    			var xhr = $.ajaxSettings.xhr();
    			if (xhr.upload) {
    				xhr.upload.addEventListener('progress', function(event) {
    					var percent = 0;
    					var position = event.loaded || event.position;
    					var total = event.total;
    					if (event.lengthComputable)
    					{
    						percent = Math.ceil(position / total * 100);
    					}
    					//update progressbar
    					//console.log(percent);
    					_thh.closest('.upload-box').find('.progress-wrp').css("display","block");
    					_thh.closest('.upload-box').find(".progress-bar").css("width", + percent +"%");
    				// 	if it is from aadhar
    					_thh.closest(".permanennt-address-doc").find('.adhar-card-pop .progress-wrp').css("display","block");
    					_thh.closest(".permanennt-address-doc").find('.adhar-card-pop .progress-bar').css("width", + percent +"%");
    					//console.log(_thh.closest(".current-address-doc").css("dispay","none"));
    					_thh.closest(".current-address-doc").find('.adhar-card-pop .progress-wrp').css("display","block");
    					_thh.closest(".current-address-doc").find('.adhar-card-pop .progress-bar').css("width", + percent +"%");
    					
    				// end from aadhar
    				// 	if it is from bank statement
    					_thh.closest(".bank-statement-doc").find('.adhar-card-pop .progress-wrp').css("display","block");
    					_thh.closest(".bank-statement-doc").find('.adhar-card-pop .progress-bar').css("width", + percent +"%");
    				// end from bank statement
    				
    				// 	if it is from bank salary slip
    					_thh.closest('.salary-slip-doc').find('.adhar-card-pop .progress-wrp').css("display","block");
    					_thh.closest('.salary-slip-doc').find('.adhar-card-pop .progress-bar').css("width", + percent +"%");
    				// end from bank salary slip
    				
    				
    				
    				
    					//$(".status").text(percent +"%");
    				}, true);
    			}
    			return xhr;
    		  }
            }).done(function(data){
                var doc_list_kyc_temp = "";
                if(data.hasOwnProperty('doc_list_kyc_temp')){
                    doc_list_kyc_temp = data.doc_list_kyc_temp;
                }
                $("#kyc_error").html('');
                $(".progress-wrp").css("display","none");
                
    
                $(".update-options").css("display","none");
                if(data.status == 1){
                    
                    _thh.closest(".adhar-in").find(".upload-btn").html("DONE");
                    _thh.closest(".adhar-in").find(".upload-btn").css("color","green");
                    _thh.closest(".adhar-in").find(".upload-btn").css("border","2px solid green");
                    
                    if(label == "PADHR" || label == "PADHR1"){
                        //console.log(data.doc_list.data[4]['min_req_completed']);
                        if(data.doc_list.data[4]['min_req_completed'] == "Y" | (data.doc_list.data[4]['sub_doc_list'][0]['is_uploaded'] == "Y" | data.doc_list.data[4]['sub_doc_list'][1]['is_uploaded'] == "Y")){
                            
                            if(data.doc_list.data[4]['min_req_completed'] == "Y"){
                                $(".adhaar-bg").fadeOut();
                                $('.camera-option').fadeOut(); 
                                $('.adhar-card-pop').fadeOut(); 
                                
                                _thh.closest('.permanennt-address-doc').find('.adhaar-box .is_uploaded').val(1);
                            }
                            _thh.closest(".permanennt-address-doc").find('.adhaar-box').addClass("uploaded-img");
                            
                            
                            if(label == "PADHR"){
                                //console.log("test fired");
                                _thh.closest('.permanennt-address-doc').find(".adhaar-box  .forntview img").attr("src",data.data.url);
                                _thh.closest('.permanennt-address-doc').find('.adhaar-box .uploaded_url').val(data.data.url);
                                _thh.closest('.permanennt-address-doc').find('.adhaar-box .upload-now .front_lbl').addClass("box-none");
                            }else if(label == "PADHR1"){
                                _thh.closest('.permanennt-address-doc').find(".adhaar-box  .back-view img").attr("src",data.data.url);
                                _thh.closest('.permanennt-address-doc').find('.adhaar-box .uploaded_url_back').val(data.data.url);
                                _thh.closest('.permanennt-address-doc').find('.adhaar-box .upload-now .back_lbl').addClass("box-none");
                            }
                            set_green_check();
                        }
                    }else if(label == "ADHR" || label == "ADHR1"){
                        
                        if(data.doc_list.data[7]['min_req_completed'] == "Y" | (data.doc_list.data[7]['sub_doc_list'][0]['is_uploaded'] == "Y" | data.doc_list.data[7]['sub_doc_list'][1]['is_uploaded'] == "Y")){
                            
                            if(data.doc_list.data[7]['min_req_completed'] == "Y"){
                                $(".adhaar-bg").fadeOut();
                                $('.camera-option').fadeOut(); 
                                $('.adhar-card-pop').fadeOut(); 
                                
                                _thh.closest('.current-address-doc').find('.adhaar-box .is_uploaded').val(1);
                            }
                            _thh.closest(".current-address-doc").find('.adhaar-box').addClass("uploaded-img");
                            
                            
                            if(label == "ADHR"){
                                _thh.closest('.current-address-doc').find(".adhaar-box  .forntview img").attr("src",data.data.url);
                                _thh.closest('.current-address-doc').find('.adhaar-box .uploaded_url').val(data.data.url);
                                _thh.closest('.current-address-doc').find('.adhaar-box .upload-now .front_lbl').addClass("box-none");
                            }else if(label == "ADHR1"){
                                _thh.closest('.current-address-doc').find(".adhaar-box  .back-view img").attr("src",data.data.url);
                                _thh.closest('.current-address-doc').find('.adhaar-box .uploaded_url_back').val(data.data.url);
                                _thh.closest('.current-address-doc').find('.adhaar-box .upload-now .back_lbl').addClass("box-none");
                            }
                            set_green_check();
                        }
                    }
                    
                    else if(label == "Passport" || label == "Passport1"){
                        if(_thh.hasClass("permanent")){
                            
                            //console.log("if fired");
                            if(data.doc_list.data[10]['min_req_completed'] == "Y" | (data.doc_list.data[10]['sub_doc_list'][0]['is_uploaded'] == "Y" | data.doc_list.data[10]['sub_doc_list'][1]['is_uploaded'] == "Y")){
                                
                                if(data.doc_list.data[10]['min_req_completed'] == "Y"){
                                    $(".adhaar-bg").fadeOut();
                                    $('.camera-option').fadeOut(); 
                                    $('.adhar-card-pop').fadeOut(); 
                                    
                                    _thh.closest('.permanennt-address-doc').find('.passport-box .is_uploaded').val(1);
                                }    
                                _thh.closest(".permanennt-address-doc").find('.passport-box').addClass("uploaded-img");
                            
                            
                                if(label == "Passport"){
                                    _thh.closest('.permanennt-address-doc').find(".passport-box  .forntview img").attr("src",data.data.url);
                                    _thh.closest('.permanennt-address-doc').find('.passport-box .uploaded_url').val(data.data.url);
                                    _thh.closest('.permanennt-address-doc').find('.passport-box .upload-now .front_lbl').addClass("box-none");
                                }else if(label == "Passport1"){
                                    _thh.closest('.permanennt-address-doc').find(".passport-box .back-view img").attr("src",data.data.url);
                                    _thh.closest('.permanennt-address-doc').find('.passport-box .uploaded_url_back').val(data.data.url);
                                    _thh.closest('.permanennt-address-doc').find('.passport-box .upload-now .back_lbl').addClass("box-none");
                                }
                            set_green_check();
                        }
                            
                        }else{
                            if(data.doc_list.data[9]['min_req_completed'] == "Y" | (data.doc_list.data[9]['sub_doc_list'][0]['is_uploaded'] == "Y" | data.doc_list.data[9]['sub_doc_list'][1]['is_uploaded'] == "Y")){
                                if(data.doc_list.data[9]['min_req_completed'] == "Y"){
                            
                                    $(".adhaar-bg").fadeOut();
                                    $('.camera-option').fadeOut(); 
                                    $('.adhar-card-pop').fadeOut(); 
                                    _thh.closest('.current-address-doc').find('.passport-box .is_uploaded').val(1);
                                }
                            _thh.closest(".current-address-doc").find('.passport-box').addClass("uploaded-img");
                            
                            
                            
                            if(label == "Passport"){
                                _thh.closest('.current-address-doc').find(".passport-box  .forntview img").attr("src",data.data.url);
                                _thh.closest('.current-address-doc').find('.passport-box .uploaded_url').val(data.data.url);
                                _thh.closest('.current-address-doc').find('.passport-box .upload-now .front_lbl').addClass("box-none");
                            }else if(label == "Passport1"){
                                _thh.closest('.current-address-doc').find(".passport-box  .back-view img").attr("src",data.data.url);
                                _thh.closest('.current-address-doc').find('.passport-box .uploaded_url_back').val(data.data.url);
                                _thh.closest('.current-address-doc').find('.passport-box .upload-now .back_lbl').addClass("box-none");
                            }
                            set_green_check();
                        } 
                        }
                    }
                    
                    else if(label == "PVI" || label == "PVI1"){
                        if(_thh.hasClass("permanent")){
                            
                            if(data.doc_list.data[6]['min_req_completed'] == "Y" | (data.doc_list.data[6]['sub_doc_list'][0]['is_uploaded'] == "Y" | data.doc_list.data[6]['sub_doc_list'][1]['is_uploaded'] == "Y")){
                                if(data.doc_list.data[6]['min_req_completed'] == "Y"){
                                    $(".adhaar-bg").fadeOut();
                                    $('.camera-option').fadeOut(); 
                                    $('.adhar-card-pop').fadeOut(); 
                                    
                                    _thh.closest('.permanennt-address-doc').find('.voterid-box .is_uploaded').val(1);
                                }
                            
                            
                            _thh.closest(".permanennt-address-doc").find('.voterid-box').addClass("uploaded-img");
                            
                            
                            
                            if(label == "PVI"){
                                _thh.closest('.permanennt-address-doc').find(".voterid-box  .forntview img").attr("src",data.data.url);
                                _thh.closest('.permanennt-address-doc').find('.voterid-box .uploaded_url').val(data.data.url);
                                _thh.closest('.permanennt-address-doc').find('.voterid-box .upload-now .front_lbl').addClass("box-none");
                            }else if(label == "PVI1"){
                                _thh.closest('.permanennt-address-doc').find(".voterid-box  .back-view img").attr("src",data.data.url);
                                _thh.closest('.permanennt-address-doc').find('.voterid-box .uploaded_url_back').val(data.data.url);
                                _thh.closest('.permanennt-address-doc').find('.voterid-box .upload-now .back_lbl').addClass("box-none");
                            }
                            set_green_check();
                        }
                            
                        }else{
                            if(data.doc_list.data[8]['min_req_completed'] == "Y" | (data.doc_list.data[8]['sub_doc_list'][0]['is_uploaded'] == "Y" | data.doc_list.data[8]['sub_doc_list'][1]['is_uploaded'] == "Y")){
                                if(data.doc_list.data[8]['min_req_completed'] == "Y"){
                            
                                    $(".adhaar-bg").fadeOut();
                                    $('.camera-option').fadeOut(); 
                                    $('.adhar-card-pop').fadeOut();
                                    
                                    _thh.closest('.current-address-doc').find('.voterid-box .is_uploaded').val(1);
                                }
                            _thh.closest(".current-address-doc").find('.voterid-box').addClass("uploaded-img");
                            
                            
                            
                            if(label == "PVI"){
                                _thh.closest('.current-address-doc').find(".voterid-box  .forntview img").attr("src",data.data.url);
                                _thh.closest('.current-address-doc').find('.voterid-box .uploaded_url').val(data.data.url);
                                _thh.closest('.current-address-doc').find('.voterid-box .upload-now .front_lbl').addClass("box-none");
                            }else if(label == "PVI1"){
                                _thh.closest('.current-address-doc').find(".voterid-box  .back-view img").attr("src",data.data.url);
                                _thh.closest('.current-address-doc').find('.voterid-box .uploaded_url_back').val(data.data.url);
                                _thh.closest('.current-address-doc').find('.voterid-box .upload-now .back_lbl').addClass("box-none");
                            }
                            set_green_check();
                        } 
                        }
                    }
                    
                    else if(label == "BSTMT" || label == "BSTMT1" || label == "BSTMT2" || label == "BSTMT3" || label == "BSTMT4" || label == "BSTMT5" || label == "BSTMT6"){
                        //console.log(data.doc_list.data[2]['min_req_completed']);
                        if(data.doc_list.data[2]['sub_doc_list'][0]['is_uploaded'] == "Y"){
                            $(".adhaar-bg").fadeOut();
                            $('.camera-option').fadeOut(); 
                            $('.adhar-card-pop').fadeOut(); 
                            _thh.closest(".bank-statement-doc").find('.extra-or-files').addClass("uploaded-img");
                            _thh.closest('.bank-statement-doc').find(".extra-or-files .uploaded-image img").attr("src",data.data.url);
                            _thh.closest('.bank-statement-doc').find(".extra-or-files .uploaded-image iframe").attr("src",data.data.url);
                            _thh.closest('.bank-statement-doc').find('.extra-or-files .is_uploaded').val(1);
                            _thh.closest('.bank-statement-doc').find('.extra-or-files .uploaded_url').val(data.data.url);
                            set_green_check();
                        }else{
                            var six_month_uploaded = 0;
                            for(var j=1;j<data.doc_list.data[2]['sub_doc_list'].length;j++){
                                if(data.doc_list.data[2]['sub_doc_list'][j]['is_uploaded'] == "Y"){
                                    six_month_uploaded = 1;
                                }else{
                                    six_month_uploaded = 0;
                                    break;
                                }
                            }
                            if(six_month_uploaded == 1){
                                $(".adhaar-bg").fadeOut();
                                $('.camera-option').fadeOut(); 
                                $('.adhar-card-pop').fadeOut(); 
                                _thh.closest(".bank-statement-doc").find('.extra-or-files').addClass("uploaded-img");
                                _thh.closest('.bank-statement-doc').find(".extra-or-files .uploaded-image img").attr("src",data.data.url);
                                _thh.closest('.bank-statement-doc').find(".extra-or-files .uploaded-image iframe").attr("src",data.data.url);
                                _thh.closest('.bank-statement-doc').find('.extra-or-files .is_uploaded').val(1);
                                _thh.closest('.bank-statement-doc').find('.extra-or-files .uploaded_url').val(data.data.url);
                                set_green_check();
                            }
                        }
                        
                    }else if(label == "PS1" || label == "PS2" || label == "PS3"){
                        if(data.doc_list.data[1]['min_req_completed'] == "Y"){
                            $(".adhaar-bg").fadeOut();
                            $('.camera-option').fadeOut(); 
                            $('.adhar-card-pop').fadeOut(); 
                            _thh.closest('.salary-slip-doc').find('.extra-files').addClass("uploaded-img");
                            _thh.closest('.salary-slip-doc').find(".extra-files .uploaded-image img").attr("src",data.data.url);
                            _thh.closest('.salary-slip-doc').find(".extra-files .uploaded-image iframe").attr("src",data.data.url);
                            _thh.closest('.salary-slip-doc').find('.extra-files .is_uploaded').val(1);
                            _thh.closest('.salary-slip-doc').find('.extra-files .uploaded_url').val(data.data.url);
                            set_green_check();
                        }
                    }else{
                        //console.log("else fired");
                        $(".adhaar-bg").fadeOut();
                        $('.camera-option').fadeOut(); 
                        $('.adhar-card-pop').fadeOut(); 
                        _thh.closest('.upload-box').addClass("uploaded-img");
                        _thh.closest('.upload-box').find(".uploaded-image img").attr("src",data.data.url);
                        _thh.closest('.upload-box').find('.is_uploaded').val(1);
                        _thh.closest('.upload-box').find('.uploaded_url').val(data.data.url);
                        set_green_check();
                    }
                    $('.status-failed').html("");
                    _thh.closest('.upload-box').find('.lbl_error').remove();
                    current_parmanent_toggle_ifExist(data.doc_list.data,doc_list_kyc_temp);
                    // adstr = '<div class="lbl_success">Uploaded</div>';
                    // adstr += '<a href="'+data.data.url+'" target="_blank">View</a>';
                    // _thh.closest('.upload-box').append(adstr);
                } else if(data.status == 2 && data.error.length > 0){
                    $(".adhaar-bg").fadeOut();
                    $('.camera-option').fadeOut(); 
                    $('.adhar-card-pop').fadeOut(); 
                    if(_thh.hasClass("permanent") && (label == "PADHR" || label == "PADHR1" || label == "Passport" || label == "Passport1" || label == "PVI" || label == "PVI1")){
                        _thh.closest(".permanennt-address-doc").find('.status-failed').html(data.data['image'][0]);
                        
                    }else if(!_thh.hasClass("permanent") && (label == "ADHR" || label == "ADHR1" || label == "Passport" || label == "Passport1" || label == "PVI" || label == "PVI1")){
                        _thh.closest(".current-address-doc").find('.status-failed').html(data.data['image'][0]);
                        
                    }else if(label == "BSTMT" || label == "BSTMT1" || label == "BSTMT2" || label == "BSTMT3" || label == "BSTMT4" || label == "BSTMT5" || label == "BSTMT6"){
                        _thh.closest(".bank-statement-doc").find('.status-failed').html(data.data['image'][0]);
                    }else if(label == "PS1" || label == "PS2" || label == "PS3"){
                        _thh.closest('.salary-slip-doc').find('.status-failed').html(data.data['image'][0]);
                    }else{
                        _thh.closest('.upload-box').parent().find('.status-failed').html(data.data['image'][0]);
                    }
                } else if(data.status == 0){
                    $(".adhaar-bg").fadeOut();
                    $('.camera-option').fadeOut(); 
                    $('.adhar-card-pop').fadeOut(); 
                    if(_thh.hasClass("permanent") && (label == "PADHR" || label == "PADHR1" || label == "Passport" || label == "Passport1" || label == "PVI" || label == "PVI1")){
                        _thh.closest(".permanennt-address-doc").find('.status-failed').html(data.data['image'][0]);
                        
                    }else if(!_thh.hasClass("permanent") && (label == "ADHR" || label == "ADHR1" || label == "Passport" || label == "Passport1" || label == "PVI" || label == "PVI1")){
                        _thh.closest(".current-address-doc").find('.status-failed').html(data.data['image'][0]);
                        
                    }else if(label == "BSTMT" || label == "BSTMT1" || label == "BSTMT2" || label == "BSTMT3" || label == "BSTMT4" || label == "BSTMT5" || label == "BSTMT6"){
                        _thh.closest(".bank-statement-doc").find('.status-failed').html(data.message);
                        //console.log(data.message);
                    }else if(label == "PS1" || label == "PS2" || label == "PS3"){
                        _thh.closest('.salary-slip-doc').find('.status-failed').html(data.message);
                    }else{
                        _thh.closest('.upload-box').parent().find('.status-failed').html(data.message);
                    }
                }
            });
        }else{
            $(".adhaar-bg").fadeOut();
            $('.camera-option').fadeOut(); 
            $('.adhar-card-pop').fadeOut(); 
            $(".update-options").css("display","none");
            if (extension!="PDF" && (label == "BSTMT" || label == "BSTMT1" || label == "BSTMT2" || label == "BSTMT3" || label == "BSTMT4" || label == "BSTMT5" || label == "BSTMT6")){
                _thh.closest(".bank-statement-doc").find('.status-failed').html("failed to upload document pdf required!");    
            }
            
        }
    });//change
});
function download_file(fileURL, fileName) {
    // for non-IE
    if (!window.ActiveXObject) {
        var save = document.createElement('a');
        save.href = fileURL;
        save.target = '_blank';
        var filename = fileURL.substring(fileURL.lastIndexOf('/')+1);
        save.download = fileName || filename;
	       if ( navigator.userAgent.toLowerCase().match(/(ipad|iphone|safari)/) && navigator.userAgent.search("Chrome") < 0) {
				document.location = save.href; 
// window event not working here
			}else{
		        var evt = new MouseEvent('click', {
		            'view': window,
		            'bubbles': true,
		            'cancelable': false
		        });
		        save.dispatchEvent(evt);
		        (window.URL || window.webkitURL).revokeObjectURL(save.href);
			}	
    }

    // for IE < 11
    else if ( !! window.ActiveXObject && document.execCommand)     {
        var _window = window.open(fileURL, '_blank');
        _window.document.close();
        _window.document.execCommand('SaveAs', true, fileName || fileURL)
        _window.close();
    }
}
</script>
@endsection