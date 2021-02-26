@extends('user.include.app')
@section('content')

<div class="login-wrapper otp-varification">
	<div class="right" style="height:600px;">
		<div class="inner-sec">
			<div class="details employment-details-cover">
				
				<div class="loancomple-step">

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

				<div class="complete-login">
					<h1>{{ isset($data['result']['title'])?$data['result']['title']:"" }}</h1>
					<p>{{ isset($data['result']['description'])?$data['result']['description']:"" }}</p>
					<h4>₹ {{ isset($data['result']['approved_amount'])?number_format(ceil($data['result']['approved_amount'])):0 }}</h4>

					<img src="{{ asset('assets/images/login-complete.png') }}" title="" alt="" />

					<div class="form-action">
                        <input type="submit" class="redbtn" title="Submit" id="phase" name="submit" value="Continue">
                    </div>

                    <div class="imp-notes">
                    	<strong>Important note:</strong>
                    	<p>Final loan approval is subject to further KYC checks and credit assessment  </p>
                    </div>
				</div>

				

			</div>
			<!-- end of verification-cover -->			
		</div>
	</div>
	<div class="left">
		<div class="inner-sec">
		
				<!-- <img src="images/login-img.png" title="" alt="" /> -->
		</div>
	</div>
	
</div>
</div>
</div>
<!-- end of login-wrapper -->

@endsection
@section('script')
<script>
$("#phase").click(function(){
    window.location.href='kyc-documents';
});
$(document).ready(function(){
  $(".employment-details-cover .form-action input").click(function(){
    $(".details-step").addClass("employment-sec");
     $(".profileimg").hide();
     $(".checkimg").show();
  });

   $(".perma-tab").click(function(){
    $(this).toggleClass("active");
    $(".permanennt-address").toggle();

  });
});
</script>
<script>
	$(document).ready(function() {
var rightheight = $(".right").height();
$(".left").height(rightheight);
});
	$(window).resize(function() {
var rightheight = $(".right").height();
$(".left").height(rightheight);
});
</script>
@endsection