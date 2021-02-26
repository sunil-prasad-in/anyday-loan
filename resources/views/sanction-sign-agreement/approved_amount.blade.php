@extends('dashboard.include.app')
@section('content')


	
		<div class="data-content">
			<div class="inner-sec loan-amount-main">
                <!--<h3 class="dash-title"><span>Your loan application has been approved. Please click on the button below to get your Sanction Letter.</span></h3>-->
				<div class="loanamount-sec blue-bar-cover">
					<h2>₹{{ isset($data['loanstatus']['approved_amount'])?number_format(ceil($data['loanstatus']['approved_amount'])):0 }}</h2>
					<h4>{{ isset($data['loanstatus']['is_approved'])?$data['loanstatus']['is_approved']:"" }} Loan Amount</h4>
					<div class="blue-bar">
					</div>
					<!-- end of blue-bar -->
				</div>
				<!-- end of loanamount-sec -->

				<div class="loan-rate-details blue-bar-cover">
					<ul class="details-box">
						<li>{{ isset($data['loanstatus']['tenure'])?$data['loanstatus']['tenure']:0 }} Months<span>Tenure</span></li>
						<li>₹{{ isset($data['loanstatus']['emi'])?number_format(ceil($data['loanstatus']['emi'])):0 }}<span>EMI</span></li>
						<li>{{ isset($data['loanstatus']['processing_fee'])?$data['loanstatus']['processing_fee']:0 }} <span>Processing Fees</span></li>
						<li>{{ (isset($data['loanstatus']['interest']) && $data['loanstatus']['interest'] != 0)?number_format((float)($data['loanstatus']['interest'])/12, 2, '.', ''):0 }} %<span>Interest <br/>
(per month)</span></li>
					</ul>
					<div class="blue-bar">
					</div>
					<!-- end of blue-bar -->
				</div>
				<!-- end of loan-rate-details -->
			
				<div class="loan-action">
					<p><img src="http://webdemoservice.online/anyday/assets/images/ic_note.png" style="margin:0px 5px 0 0px;verticle-align:middle" title="" alt=""> Approved loan amount is the final eligibility based 
on evaluation</p>
					<h5>Click below to get your Sanction Letter</h5>	
					<a href="{{ url('sanction-letter') }}" class="redbtn">Sanction Letter</a>
				</div>
				
			</div>
		</div>
	
	<!-- end of main-content -->
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $(".dropdown").click(function(){
    $(".dropdown > .dropmenu").slideToggle("slow");
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
@endsection