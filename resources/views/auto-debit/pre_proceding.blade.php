@extends('user.include.app')
@section('content')

<div class="login-wrapper otp-varification">
	<div class="right">
		<div class="inner-sec">
			<div class="details employment-details-cover">
				
				<div class="loancomple-step" >

					<ul>
					    <li class="active"><a href="{{ url(route('dash.employment_info')) }}">Loan<br/>Application</a></li>
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

				<div class="complete-login payment-ragis-cover" >

                    <div class="kyc-doc-center payment-ragis-cover">

                    	<div class="payment-ragis-img">
                    		<img src="{{ asset('assets/images/bank-icon.png') }}" title="" alt="" />
                    	</div>

                    	<p>Proceeding to register your<br/> 
bank account for payment registration</p>
					    <form method="post" id="login-form" class="login-form" action="{{ url($data['payload']) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="applicant_code" value="{{ isset($data['personal']['applicant_code'])?$data['personal']['applicant_code']:'' }}">
                            <input type="hidden" name="loan_app_no" value="{{ isset($data['personal']['loan_app_no'])?$data['personal']['loan_app_no']:'' }}">
                            
                            <input type="hidden" name="redirect_url" value="{{ isset($data['redirect_url'])?$data['redirect_url']:'' }}">
                            <input type="hidden" name="platform" value="{{ isset($data['platform'])?$data['platform']:'' }}">
					    <div class="form-action">
                            <input type="submit" class="redbtn" title="Submit" name="submit" value="Continue">
                             <!--id="phase"-->
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="left">
		<div class="inner-sec">
		
		
		</div>
	</div>
	
</div>

@endsection
@section('script')
<script>
    $("#phase").click(function(){
        window.location.href='payment-registration';
    });
</script>
@endsection


