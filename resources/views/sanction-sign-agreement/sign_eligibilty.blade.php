@extends('user.include.app')
@section('content')


<div onload="deciFunction();" id="loan-amt-page" class="login-wrapper otp-varification">
	<div class="right">
		<div class="inner-sec">
			<div class="details employment-details-cover">
				
				
				<div class="loan-approved">

					<!--<img src="{{ asset('assets/images/anyday-logo.png') }}" title="" alt="" />-->
					<br/>

					<div class="approved-amount">
						<h1>₹{{ isset($data['loanstatus']['approved_amount'])?number_format(ceil($data['loanstatus']['approved_amount'])):0 }}</h1>
						<h3><span style="vertical-align: top;
    margin-right: 9px;">Approved Loan Amount</span><img class="loan-amt-img" src="{{ asset('assets/images/ic_note.png') }}" style="margin:5px 0 0" title="" alt="" /></h3>
					</div>
					<!-- end of approved-amount -->

					<div class="loan-time">
						<div class="lt-side">
							<div class="month topsec">
								<h3>{{ isset($data['loanstatus']['tenure'])?$data['loanstatus']['tenure']:0 }} Months<br><span>Tenure</span></h3>
								<h3>{{ isset($data['loanstatus']['processing_fee'])?$data['loanstatus']['processing_fee']:0 }}<br><span>Processing Fees</span></h3>
							</div>
						</div>
						<div class="rt-side">
							<div class="month topsec">
								<h3>₹{{ isset($data['loanstatus']['emi'])?number_format(ceil($data['loanstatus']['emi'])):0 }}<br><span>EMI</span></h3>
								<h3>{{ (isset($data['loanstatus']['interest']) && $data['loanstatus']['interest'] != 0)?number_format((float)($data['loanstatus']['interest'])/12, 2, '.', ''):0 }} %<br><span>Interest<br/>(per month)</span></h3>
							</div>
						</div>
					</div>
					<!-- end of loan-time -->

					<p class="approved-notes"><img src="{{ asset('assets/images/ic_note.png') }}" style="margin:0" title="" alt="" /><span style="vertical-align: top;
    margin-left: 9px;">Approved loan amount is the final eligibility based
on evaluation</span></p>


				<div class="get-sanc">
					<p>Now let's get your agreement signed to credit  your money in your bank account.</p>
					<div class="form-action">
					    <form method="post" id="login-form" class="login-form" action="{{ url($data['url']) }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="applicant_code" value="{{ isset($data['personal']['applicant_code'])?$data['personal']['applicant_code']:'' }}">
                        <input type="hidden" name="loan_app_no" value="{{ isset($data['personal']['loan_app_no'])?$data['personal']['loan_app_no']:'' }}">
                        
                        <input type="hidden" name="redirect_url" value="{{ isset($data['redirect_url'])?$data['redirect_url']:'' }}">
                        <input type="hidden" name="platform" value="{{ isset($data['platform'])?$data['platform']:'' }}">
                        
    				    <input type="submit" class="redbtn" title="Submit" id="phase" name="submit" value="Sign Agreement">
                	</form>
                        
                </div>
				</div>
				
				</div>
				<!-- end of loan-approved -->
				

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
<!-- end of login-wrapper -->

@endsection
@section('script')
<script>
    $("#phase").click(function(){
        window.location.href='sign-agreement';
    });
</script>
<script>
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
  
  $(".loan-amt-img").click(function(){
      $(".approved-notes").toggleClass("blinking");
  });
  
  var fixedDeci = $(".login-wrapper");

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

$(document).ready(function(){
$('.left, .right').equalHeights();  


 $(".pan .attach-files").click(function(){
    $(".right, .left").css("min-height", "580px");        
 });

 $(".Current-add .attach-files, .permanent-add .attach-files").click(function(){
    $(".right, .left").css("min-height", "675px");        
 });

 $(".bank-statement .attach-files").click(function(){
    $(".right, .left").css("min-height", "610px");        
 });

 $(".back").click(function(){
    $(".right, .left").css("min-height", "550px");        
 });

 });   
$(window).resize(function(){
    $('.left, .right').equalHeights();
});


</script>


@endsection