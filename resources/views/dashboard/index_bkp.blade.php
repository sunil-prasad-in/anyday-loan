@extends('dashboard.include.app')
@section('content')


		<div class="data-content">
			<div class="inner-sec">
				<h3 class="dash-title"><span>Welcome</span> {{ (session()->has('user_detail'))?Session::get('user_detail')['name']:"" }}</h3>
				<div class="active-loan">
					<div class="application-loan">
					<div class="apploan">
						
						<div class="right-menu">
						<a href="#" class="how-work blinking"><span><img src="{{ asset('assets/dashboard/images/how-work.png') }}" title="Medical Loan" alt="Medical Loan"></span>How It Works</a>

						<a href="#" class="benifits"><span style="margin-top: 1px;"><img src="{{ asset('assets/dashboard/images/benifits.png') }}" title="Medical Loan" alt="Medical Loan"></span>Benefits</a>
						</div>
						<div class="appli-option">
							<div class="product option-app">
								<p><img src="{{ asset('assets/dashboard/images/feedback.png') }}" title="" alt="" />Product</p>
								@if(isset($loan_type) && $loan_type == "PL")
									<span>Personal Loan - {{ isset($user_detail['loan_app_no'])?$user_detail['loan_app_no']:"" }}</span>
								@elseif(isset($loan_type) && $loan_type == "BL")
								    <span>Business Loan - {{ isset($user_detail['loan_app_no'])?$user_detail['loan_app_no']:"" }}</span>
								@elseif(isset($loan_type) && $loan_type == "ML")
								    <span>Medical Loan - {{ isset($user_detail['loan_app_no'])?$user_detail['loan_app_no']:"" }}</span>
								@elseif(isset($loan_type) && $loan_type == "EL")
								    <span>Education Loan - {{ isset($user_detail['loan_app_no'])?$user_detail['loan_app_no']:"" }}</span>
								@endif  
								
							</div>
							<div class="amount option-app">
								<p><img src="{{ asset('assets/dashboard/images/instant-dis.png') }}" title="" alt="" />Amount-</p>							
								<span>Rs.{{ isset($loan['loan_amount'])?$loan['loan_amount']:0 }}/-</span>
							</div>
							<div class="next-step option-app">
								<p><img src="{{ asset('assets/dashboard/images/next-step.png') }}" title="" alt="" />Next Step</p>
								<span>Your loan application is being evaluted. You will be notified shortly</span>
							</div>

							<div class="action option-app">
								
							</div>	


							<div class="blue-bar">
								<a href="{{ url($next_status) }}" class="continue-btn">Continue ></a>
								 <!--id="phase"-->
							<!--<a href="#" class="fifty-fifty">See Details</a>-->

						</div>
						<!-- end of blue-bar -->						
						</div>
					</div>


				</div>
				<!-- end of application-loan -->
                    <!--NOT REQUIRED NOW FROM STRAT HERE-->
					<!--<h2 class="dash-title">Active Loan</h2>-->
					<!--<div class="active-loanbox">						-->
					<!--	<div class="inner-ac">-->

					<!--		<div class="loanbox-right">-->
					<!--			<div class="loan-range">-->
					<!--				<span class="first">Remaining Amount: ₹100,000</span>-->
					<!--				<span class="last">EMI <br/> <span class="time">1/12</span></span>-->
					<!--				<div class="loan-range-slider">-->

					<!--				</div>-->
					<!--			</div>-->
								 <!--end of loan-range -->
					<!--			<div class="loan-details">-->
					<!--				<ul>-->
					<!--					<li><h5>₹33,333</h5><span> EMI Amount </span></li>-->
					<!--					<li><h5>7 Dec 2020</h5><span> EMI due date </span></li>-->
					<!--				</ul>-->
					<!--			</div>-->
					<!--			<div class="active-action">-->
					<!--			<a href="#" class="redbtn">Pay Now</a>-->
					<!--			<a href="#" class="redbtn">Top up loan</a>-->
					<!--			</div>-->
					<!--		</div>-->
							 <!--end of loanbox-right -->

					<!--		<div class="loanbox-left">-->
					<!--			<h4>Personal Loan</h4>-->
					<!--			<span class="loanamount">₹1,50,000</span>-->
					<!--			<p><span>Loan ID : ANYDAY1606455029</span></p>-->
					<!--			<p><span>Issued Nov.12,2018</span></p>-->
								
					<!--		</div>-->
					<!--		<div class="center-sec">-->
					<!--			<div class="emi-details">-->
					<!--				<ul class="emilist">-->
					<!--				<li><h3>Next EMI due date</h3>-->
					<!--					<span>5th August 2020</span>-->
					<!--				</li>-->
					<!--			   </ul>-->

					<!--				<ul class="emilist">-->
					<!--				<li><h3>EMI end date</h3>-->
					<!--					<span>5th August 2020</span>-->
					<!--				</li>-->
					<!--				</ul>-->
					<!--			</div>-->
								 <!--end of emi-details -->
					<!--		</div>-->
							 <!--end of center-sec -->

							
					<!--	</div>-->
						 <!--end of inner-ac -->
					<!--	<div class="blue-bar">-->
					<!--		<a href="#">See Details</a>-->
					<!--	</div>-->
						 <!--end of blue-bar -->
					<!--</div>-->
					<!--NOT REQUIRED NOW TO END HERE-->
					<!-- end active-loanbox -->

                    <!--NOT REQUIRED NOW FROM STRAT HERE-->
					<!--<h2 class="dash-title">Other Loans</h2>-->
					<!--<div class="active-loanbox">						-->
					<!--	<div class="inner-ac">-->

					<!--		<div class="loanbox-right">-->
					<!--			<div class="loan-range">-->
					<!--				<span class="first">Remaining Amount: ₹100,000</span>-->
					<!--				<span class="last">EMI <br/> <span class="time">1/12</span></span>-->
					<!--				<div class="loan-range-slider">-->

					<!--				</div>-->
					<!--			</div>-->
								<!-- end of loan-range -->
					<!--			<div class="loan-details">-->
					<!--				<ul>-->
					<!--					<li><h5>₹33,333</h5><span> EMI Amount </span></li>-->
					<!--					<li><h5>7 Dec 2020</h5><span> EMI due date </span></li>-->
					<!--				</ul>-->
					<!--			</div>-->
					<!--			<div class="active-action">-->
					<!--			<a href="#" class="redbtn">Pay Now</a>-->
					<!--			<a href="#" class="redbtn">Top up loan</a>-->
					<!--			</div>-->
					<!--		</div>-->
							<!-- end of loanbox-right -->

					<!--		<div class="loanbox-left">-->
					<!--			<h4>Business Loan</h4>-->
					<!--			<span class="loanamount">₹1,50,000</span>-->
					<!--			<p><span>Loan ID : ANYDAY1606455029</span></p>-->
					<!--			<p><span>Issued Nov.12,2018</span></p>-->
								
					<!--		</div>-->
					<!--		<div class="center-sec">-->
					<!--			<div class="emi-details">-->
					<!--				<ul class="emilist">-->
					<!--				<li><h3>Next EMI due date</h3>-->
					<!--					<span>5th August 2020</span>-->
					<!--				</li>-->
					<!--			   </ul>-->

					<!--				<ul class="emilist">-->
					<!--				<li><h3>EMI end date</h3>-->
					<!--					<span>5th August 2020</span>-->
					<!--				</li>-->
					<!--				</ul>-->
					<!--			</div>-->
								<!-- end of emi-details -->
					<!--		</div>-->
							<!-- end of center-sec -->

							
					<!--	</div>-->
						<!-- end of inner-ac -->
					<!--	<div class="blue-bar">-->
					<!--		<a href="#">See Details</a>-->
					<!--	</div>-->
						<!-- end of blue-bar -->
					<!--</div>-->
					<!--NOT REQUIRED NOW TO END HERE-->
					<!-- end active-loanbox -->
					<div class="popbg"></div>
					<div class="popup-howworks">
						<div class="inner=pupup">
							<div class="header">
								<h3>How its Work</h3>
								<a class="close" title="" alt="">X</a>
							</div>
							<div class="content">
								<div class="points-sec">
									<h2><span><img src="{{ asset('assets/dashboard/images/quick-app.png') }}" alt="" title="" />Quick Application</span></h2>
									<p>Enter basic details to build your profile</p>
								</div>
								<!-- end points-sec -->

								<div class="points-sec">
									<h2><span><img src="{{ asset('assets/dashboard/images/pre-approved.png') }}" alt="" title="" />Pre Approved Eligibiity</span></h2>
									<p>Your eligibility will be calculated on the basis of your profile detais</p>
								</div>
								<!-- end points-sec -->


								<div class="points-sec">
									<h2><span><img src="{{ asset('assets/dashboard/images/paybill.png') }}" alt="" title="" />Submit Documents</span></h2>
									<p>Upload necessary documents digitally for quick credit approval </p>
								</div>
								<!-- end points-sec -->

								<div class="points-sec">
									<h2><span><img src="{{ asset('assets/dashboard/images/disbursment-img.png') }}" alt="" title="" />Disbursement</span></h2>
									<p>Approved loan amount credited to your bank account</p>
								</div>
								<!-- end points-sec -->
							</div>
						</div>
					</div>
					<!-- end popup-howworks -->

					<div class="popup-benifit">
						<div class="inner=pupup">
							<div class="header">
								<h3>Features and Benifits</h3>
								<a class="close" title="" alt="">X</a>
							</div>
							<div class="content">
								<div class="points-sec">
									<h2><span><img src="{{ asset('assets/dashboard/images/quick-app-appli.png') }}" alt="" title="" />Quick Approvals</span></h2>
									
								</div>
								<!-- end points-sec -->

								<div class="points-sec">
									<h2><span><img src="{{ asset('assets/dashboard/images/no-force-closure.png') }}" alt="" title="" />No fore-closure Charges</span></h2>
									
								</div>
								<!-- end points-sec -->


								<div class="points-sec">
									<h2><span><img src="{{ asset('assets/dashboard/images/easy-digi-loan.png') }}" alt="" title="" />Easy Digital Loan Application</span></h2>
									
								</div>
								<!-- end points-sec -->

								<div class="points-sec">
									<h2><span><img src="{{ asset('assets/dashboard/images/instant-dis.png') }}" alt="" title="" />Instant Disbursal</span></h2>
									
								</div>
								<!-- end points-sec -->

								<div class="points-sec">
									<h2><span><img src="{{ asset('assets/dashboard/images/flexible-tuner.png') }}" alt="" title="" />Flexible Tenure</span></h2>
									
								</div>
								<!-- end points-sec -->

								<div class="points-sec">
									<h2><span><img src="{{ asset('assets/dashboard/images/no-prepaymnet.png') }}" alt="" title="" />No Pre-Payment</span></h2>
									
								</div>
								<!-- end points-sec -->
							</div>
						</div>
					</div>
					<!-- end popup-howworks -->
					<h2 class="dash-title" style="display:none;">Previous/Closed Loan</h2>
					<!--NOT REQUIRED NOW FROM STRAT HERE-->
					<div class="active-loanbox complete-loan" style="display:none;">						
						<div class="inner-ac">

							<div class="loanbox-right">
								<div class="loan-range">
									<span class="first">Remaining Amount: ₹0</span>
									<span class="last">EMI <br/> <span class="time">1/12</span></span>
									<div class="loan-range-slider">

									</div>
								</div>
								<!-- end of loan-range -->
								<div class="loan-details">
									<ul>
										<li><h5>₹0</h5><span> EMI Amount </span></li>
										<li><h5>NA</h5><span> EMI due date </span></li>
									</ul>
								</div>
								<div class="active-action">
								<a href="#" class="redbtn">Completed</a>
								</div>
							</div>
							<!-- end of loanbox-right -->

							<div class="loanbox-left">
								<h4>Personal Loan</h4>
								<span class="loanamount">₹2,00,000</span>
								<p><span>Loan ID : ANYDAY1606455029</span></p>
								<p><span>Issued Nov.12,2018</span></p>
								
							</div>
							<div class="center-sec">
								<div class="emi-details">
									<ul class="emilist">
									<li><h3>Next EMI due date</h3>
										<span>NA</span>
									</li>									
									</ul>

									<ul class="emilist">
									<li><h3>EMI end date</h3>
										<span>NA</span>
									</li>									
									</ul>
								</div>
								<!-- end of emi-details -->


							</div>
							<!-- end of center-sec -->

							
						</div>
						<!-- end of inner-ac -->


						<div class="blue-bar">
							<a href="#">See Details</a>
						</div>
						<!-- end of blue-bar -->
					</div>
					<!--NOT REQUIRED NOW TO END HERE-->
					<!-- end active-loanbox -->
				</div>
<!--			    <div class="active-loan loan-account-active">-->
<!--					<h3 class="dash-title">Active Loan</h3>-->
<!--					<div class="activeloan-cover">-->
<!--					<div class="active-loanbox">						<div class="blue-bar">-->
<!--							<div class="active-action">-->
<!--								<a href="javascript:void();" class="see-details">See Details</a>-->
<!--								<a style="display:none;" href="javascript:void();" class="hide-details">Hide Details</a>-->
<!--								<a href="#" class="paynow">Pay Now</a>-->

<!--<a class="right-side-btn" href="javascript:void();" class="see-details">Download SOA <img src="{{ asset('assets/dashboard/images/download.png') }}" title="" alt="" /></a>-->
<!--								<a class="right-side-btn" href="#" class="paynow">Agreement <img src="{{ asset('assets/dashboard/images/download.png') }}" title="" alt="" /></a>										-->
<!--							</div>-->
<!--						</div>-->
						<!-- end of blue-bar -->
<!--						<div class="inner-ac">-->
							
<!--							<div class="col-sm-12 loan-left-sec">-->
<!--							<h4>Personal Loan Account - 1234354</h4>-->
<!--							<div class="loan-range">-->
<!--								<span class="first">Loan Amount: ₹50,000</span>-->
<!--								<span class="last">EMI <br/> <span class="time">1/12</span></span>-->
<!--								<div class="loan-range-slider">-->

<!--								</div>-->
<!--							</div>-->
							<!-- end of loan-range -->
<!--							<div class="loan-details">-->
<!--								<ul>-->
<!--									<li><h5>₹7,500</h5><span> EMI Amount </span></li>-->
<!--									<li><h5>5 Aug 2020</h5><span> EMI due date </span></li>-->
<!--								</ul>-->
<!--							</div>-->
							
<!--						</div>-->

<!--						<div class="col-sm-6 loan-right-sec">-->
<!--							<h4>Loan Account - 1234354</h4>-->
<!--					<div class="details-box">-->
<!--						<div class="account-left">-->
<!--							<div class="list">-->
<!--								<h6>EMI start date</h6>-->
<!--								<span>5th July’20  </span>-->
<!--							</div>-->
							<!-- end list -->
<!--							<div class="list">-->
<!--								<h6>EMI end date</h6>-->
<!--								<span>5th July’20  </span>-->
<!--							</div>-->
<!--						</div>-->
						<!-- end account-left -->	
											
<!--					</div>-->
<!--						</div>-->
						<!-- end of loan-right-sec -->
<!--						</div>-->
						<!-- end of inner-ac -->

						
<!--					</div>-->
					<!-- end active-loanbox -->

<!--					<div class="loan-account-details">-->
<!--					<h4>Loan Account - 1234354</h4>-->
<!--					<div class="details-box">-->
<!--						<div class="account-left">-->
<!--							<div class="list">-->
<!--								<h6>Next EMI due date</h6>-->
<!--								<span>5th August’20 </span>-->
<!--							</div>-->
							<!-- end list -->
<!--							<div class="list">-->
<!--								<h6>Last payment date</h6>-->
<!--								<span>5th July’20 </span>-->
<!--							</div>-->
							<!-- end list -->
							
<!--							<div class="list">-->
<!--								<h6>Repayment frequency</h6>-->
<!--								<span>Monthly  </span>-->
<!--							</div>-->
							<!-- end list -->
<!--							<div class="list">-->
<!--								<h6>Total EMIs</h6>-->
<!--								<span>12 </span>-->
<!--							</div>-->
							<!-- end list -->
<!--							<div class="list">-->
<!--								<h6>Paid EMIs</h6>-->
<!--								<span>1 </span>-->
<!--							</div>-->
							<!-- end list -->
<!--							<div class="list">-->
<!--								<h6>EMI to pay</h6>-->
<!--								<span>11 </span>-->
<!--							</div>-->
							<!-- end list -->
<!--							<div class="list">-->
<!--								<h6>Repayment mode</h6>-->
<!--								<span>Auto debit </span>-->
<!--							</div>-->
							<!-- end list -->
<!--						</div>-->
						<!-- end account-left -->	
												
<!--					</div>-->
<!--				</div>-->
<!--				</div>-->
				<!-- end of activeloan-cover -->




<!--				<div class="activeloan-cover">-->
<!--					<div class="active-loanbox">						<div class="blue-bar">-->
<!--							<div class="active-action">-->
<!--								<a href="javascript:void();" class="see-details">See Details</a>-->
<!--								<a style="display:none;" href="javascript:void();" class="hide-details">Hide Details</a>-->
<!--								<a href="#" class="paynow">Pay Now</a>-->

<!--								<a class="right-side-btn" href="javascript:void();" class="see-details">Download SOA <img src="{{ asset('assets/dashboard/images/download.png') }}" title="" alt="" /></a>-->
<!--								<a class="right-side-btn" href="#" class="paynow">Agreement <img src="{{ asset('assets/dashboard/images/download.png') }}" title="" alt="" /></a>								-->
<!--							</div>-->
<!--						</div>-->
						<!-- end of blue-bar -->
<!--						<div class="inner-ac">-->
							
<!--							<div class="col-sm-12 loan-left-sec">-->
<!--							<h4>Business Loan Account - 1234354</h4>-->
<!--							<div class="loan-range">-->
<!--								<span class="first">Loan Amount: ₹50,000</span>-->
<!--								<span class="last">EMI <br/> <span class="time">1/12</span></span>-->
<!--								<div class="loan-range-slider">-->

<!--								</div>-->
<!--							</div>-->
							<!-- end of loan-range -->
<!--							<div class="loan-details">-->
<!--								<ul>-->
<!--									<li><h5>₹7,500</h5><span> EMI Amount </span></li>-->
<!--									<li><h5>5 Aug 2020</h5><span> EMI due date </span></li>-->
<!--								</ul>-->
<!--							</div>-->
							
<!--						</div>-->

<!--						<div class="col-sm-6 loan-right-sec">-->
<!--							<h4>Loan Account - 1234354</h4>-->
<!--					<div class="details-box">-->
<!--						<div class="account-left">-->
<!--							<div class="list">-->
<!--								<h6>EMI start date</h6>-->
<!--								<span>5th July’20  </span>-->
<!--							</div>-->
							<!-- end list -->
<!--							<div class="list">-->
<!--								<h6>EMI end date</h6>-->
<!--								<span>5th July’20  </span>-->
<!--							</div>-->
<!--						</div>-->
						<!-- end account-left -->	
											
<!--					</div>-->
<!--						</div>-->
<!--						</div>-->
						<!-- end of inner-ac -->

						
<!--					</div>-->
					<!-- end active-loanbox -->

<!--					<div class="loan-account-details">-->
<!--					<h4>Loan Account - 1234354</h4>-->
<!--					<div class="details-box">-->
<!--						<div class="account-left">-->
<!--							<div class="list">-->
<!--								<h6>Next EMI due date</h6>-->
<!--								<span>5th August’20 </span>-->
<!--							</div>-->
							<!-- end list -->
<!--							<div class="list">-->
<!--								<h6>Last payment date</h6>-->
<!--								<span>5th July’20 </span>-->
<!--							</div>-->
							<!-- end list -->
							
<!--							<div class="list">-->
<!--								<h6>Repayment frequency</h6>-->
<!--								<span>Monthly  </span>-->
<!--							</div>-->
							<!-- end list -->
<!--							<div class="list">-->
<!--								<h6>Total EMIs</h6>-->
<!--								<span>12 </span>-->
<!--							</div>-->
							<!-- end list -->
<!--							<div class="list">-->
<!--								<h6>Paid EMIs</h6>-->
<!--								<span>1 </span>-->
<!--							</div>-->
							<!-- end list -->
<!--							<div class="list">-->
<!--								<h6>EMI to pay</h6>-->
<!--								<span>11 </span>-->
<!--							</div>-->
							<!-- end list -->
<!--							<div class="list">-->
<!--								<h6>Repayment mode</h6>-->
<!--								<span>Auto debit </span>-->
<!--							</div>-->
							<!-- end list -->
<!--						</div>-->
						<!-- end account-left -->	
												
<!--					</div>-->
<!--				</div>-->
<!--				</div>-->
				<!-- end of activeloan-cover -->



<!--				<h3 class="dash-title">Closed Loan</h3>-->
<!--				<div class="activeloan-cover">-->
<!--					<div class="active-loanbox">						<div class="blue-bar">-->
<!--							<div class="active-action">-->
<!--								<a href="javascript:void();" class="see-details" style="width:100%;">See Details</a>-->
<!--								<a style="display:none;width:100%;" href="javascript:void();" class="hide-details">Hide Details</a>-->
								<!-- <a href="#" class="paynow">Pay Now</a> -->

<!--								<a class="right-side-btn" href="javascript:void();" class="see-details">Download SOA <img src="{{ asset('assets/dashboard/images/download.png') }}" title="" alt="" /></a>-->
<!--								<a class="right-side-btn" href="#" class="paynow">Agreement <img src="{{ asset('assets/dashboard/images/download.png') }}" title="" alt="" /></a>								-->
<!--							</div>-->
<!--						</div>-->
						<!-- end of blue-bar -->
<!--						<div class="inner-ac">-->
							
<!--							<div class="col-sm-12 loan-left-sec">-->
<!--							<h4>Business Loan Account - 1234354</h4>-->
<!--							<div class="loan-range">-->
<!--								<span class="first">Loan Amount: ₹50,000</span>-->
<!--								<span class="last">EMI <br/> <span class="time">12/12</span></span>-->
<!--								<div class="loan-range-slider complete">-->

<!--								</div>-->
<!--							</div>-->
							<!-- end of loan-range -->
<!--							<div class="loan-details">-->
<!--								<ul>-->
<!--									<li><h5>₹0</h5><span> EMI Amount </span></li>-->
<!--									<li><h5>NA</h5><span> EMI due date </span></li>-->
<!--								</ul>-->
<!--							</div>-->
							
<!--						</div>-->

<!--						<div class="col-sm-6 loan-right-sec">-->
<!--							<h4>Loan Account - 1234354</h4>-->
<!--					<div class="details-box">-->
<!--						<div class="account-left">-->
<!--							<div class="list">-->
<!--								<h6>EMI start date</h6>-->
<!--								<span>5th July’20  </span>-->
<!--							</div>-->
							<!-- end list -->
<!--							<div class="list">-->
<!--								<h6>EMI end date</h6>-->
<!--								<span>5th July’20  </span>-->
<!--							</div>-->
<!--						</div>-->
						<!-- end account-left -->	
											
<!--					</div>-->
<!--						</div>-->
<!--						</div>-->
						<!-- end of inner-ac -->

						
<!--					</div>-->
					<!-- end active-loanbox -->

<!--					<div class="loan-account-details">-->
<!--					<h4>Loan Account - 1234354</h4>-->
<!--					<div class="details-box">-->
<!--						<div class="account-left">-->
<!--							<div class="list">-->
<!--								<h6>Next EMI due date</h6>-->
<!--								<span>5th August’20 </span>-->
<!--							</div>-->
							<!-- end list -->
<!--							<div class="list">-->
<!--								<h6>Last payment date</h6>-->
<!--								<span>5th July’20 </span>-->
<!--							</div>-->
							<!-- end list -->
							
<!--							<div class="list">-->
<!--								<h6>Repayment frequency</h6>-->
<!--								<span>Monthly  </span>-->
<!--							</div>-->
							<!-- end list -->
<!--							<div class="list">-->
<!--								<h6>Total EMIs</h6>-->
<!--								<span>12 </span>-->
<!--							</div>-->
							<!-- end list -->
<!--							<div class="list">-->
<!--								<h6>Paid EMIs</h6>-->
<!--								<span>12 </span>-->
<!--							</div>-->
							<!-- end list -->
<!--							<div class="list">-->
<!--								<h6>EMI to pay</h6>-->
<!--								<span>12 </span>-->
<!--							</div>-->
							<!-- end list -->
<!--							<div class="list">-->
<!--								<h6>Repayment mode</h6>-->
<!--								<span>Auto debit </span>-->
<!--							</div>-->
							<!-- end list -->
<!--						</div>-->
						<!-- end account-left -->	
												
<!--					</div>-->
<!--				</div>-->
<!--				</div>-->
				<!-- end of activeloan-cover -->
<!--				</div>-->
			


<!--				<div class="fixed-box">-->
<!--					<div class="fixed-box-cover">-->
						
<!--							<h4>Loan Account - 1234354</h4>-->
<!--					<div class="details-box">-->
<!--						<div class="account-left">-->
<!--							<div class="list">-->
<!--								<h6>EMI start date</h6>-->
<!--								<span>5th July’20  </span>-->
<!--							</div>-->
							<!-- end list -->
<!--							<div class="list">-->
<!--								<h6>EMI end date</h6>-->
<!--								<span>5th July’20  </span>-->
<!--							</div>-->
<!--						</div>-->
						<!-- end account-left -->	
											
<!--					</div>-->
<!--					<div class="blue-bar">-->
<!--							<div class="active-action">-->
								

<!--<a class="" href="javascript:void();">Download SOA <img src="{{ asset('assets/dashboard/images/download.png') }}" title="" alt=""></a>-->
<!--								<a class="" href="#">Agreement <img src="{{ asset('assets/dashboard/images/download.png') }}" title="" alt=""></a>										-->
<!--							</div>-->
<!--						</div>-->
<!--						</div>-->
						<!-- end of loan-right-sec -->
<!--				</div>-->
				<!-- end of fixed-box -->
			</div>
		</div>
	</div>
	<!-- end of main-content -->


</div>
<!-- end of admin-wrapper -->
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script> 
$("#phase").click(function(){
    window.location.href='../approved-amount';
});
$(document).ready(function(){
    $(".dropdown").click(function(){
        $(".dropdown > .dropmenu").slideToggle("slow");
    });
  /*how its work js*/
    $(".how-work").click(function(){
        $(".popup-howworks").fadeIn("");
        $(".popbg").fadeIn("");
        $("body").addClass("popopen");
    });

    $(".close, .popbg").click(function(){
        $(".popup-howworks").fadeOut("");
        $(".popbg").fadeOut("");
        $("body").removeClass("popopen");
    });

  /*how its work js*/
    $(".benifits").click(function(){
        $(".popup-benifit").fadeIn("");
        $(".popbg").fadeIn("");
        $("body").addClass("popopen");
    });

    $(".close, .popbg").click(function(){
        $(".popup-benifit").fadeOut("");
        $(".popbg").fadeOut("");
        $("body").removeClass("popopen");
    });

    if ( $(window).width() > 767 ) {
  /*toggle menu js*/
    $(".toggle-menu").click(function(){
        $(".left-sidebar").toggleClass('open');
        $("body").toggleClass('menu-open');
    });
 
  /*tlogin dropdown js*/
    $(".top-right li").click(function(){
        $(".top-right li > .rightdrop").toggle();
    
    });
}

    if ( $(window).width() < 767 ) {
    
        $(".toggle-menu").click(function(){
            $(".main-menu").toggleClass('open-slide');      
        });
    }
});
</script>
<script> 
$(document).ready(function(){
    $(".dropdown").click(function(){
        $(".dropdown > .dropmenu").slideToggle("slow");
    });

    var header = $(".fixed-box");
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();
        if (scroll >= window.innerHeight) {
            header.addClass("fixed");
        } else {
            header.removeClass("fixed");
        }
    });
});
/*active loan js*/
$(document).ready(function(){
  // $(".active-loanbox .inner-ac").click(function(){
  //   $(this).parents(".activeloan-cover").animate({height: "auto",width:"100%"});
  //   $(this).children(".loan-left-sec").animate({height:"auto",width:"50%"});
  //   $(this).children(".loan-left-sec").addClass("col-sm-6");
  //    $(this).children(".loan-right-sec").addClass("autoheight");
  //    $(this).children(".loan-right-sec").animate({width:"50%",padding:"0px 15px"});
  //    $(this).siblings(".blue-bar").addClass('show-sec');
  //     $(this).parents(".active-loanbox").nextAll(".loan-account-details").animate({width:"50%"});
  //     $(this).parents(".active-loanbox").nextAll(".loan-account-details").slideDown();
  //     	$(this).siblings(".blue-bar").children(".active-action").children('.see-details').hide();
  //     	$(this).siblings(".blue-bar").children('.active-action').children('.hide-details').show();

  // });
    $(".see-details").click(function(){
        $(this).parents(".active-loanbox").nextAll(".loan-account-details").slideDown();
      	$(this).siblings(".hide-details").show();
        $(this).hide();
    });

    $(".hide-details").click(function(){
  	    $(this).parents(".active-loanbox").nextAll(".loan-account-details").slideUp();
  		$(this).siblings(".see-details").show();
        $(this).hide();
  	});


    //   jQuery(function($) {
    //   $(window).scroll(function fix_element() {
    //     $('.fixed-box').css(
    //       $(window).scrollTop() > 200
    //         ? { 'position': 'fixed', 'width':'33.33%' }
    //         : { 'position': 'absolute', 'top': 'auto', 'width':'33.33%'}
    //     );
    //     return fix_element;
    //   }());
    // });
    // });

    if ( $(window).width() > 767 ) {
  /*toggle menu js*/
    $(".toggle-menu").click(function(){
        $(".left-sidebar").toggleClass('open');
        $("body").toggleClass('menu-open');
    });
 
  /*tlogin dropdown js*/
    $(".top-right li").click(function(){
        $(".top-right li > .rightdrop").toggle();
    });
}

    if ( $(window).width() < 767 ) {
    
        $(".toggle-menu").click(function(){
            $(".main-menu").toggleClass('open-slide');      
        });
    }
});
</script>
@endsection