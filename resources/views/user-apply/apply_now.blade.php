@extends('user.include.app')
@section('content')


<!--newer start-->
<div class="login-wrapper topup-loan-sec">
	<div class="right">
		<div class="inner-sec">
			<div class="details ">
				<div class="header-sec">
					<h2>Apply Now</h2>
				</div>
				
				<div class="data-content">
			<div class="inner-sec">

				<div class="loan-option option-type apply-now-sec">
            		<ul>
            			<li><a href="#" class="apply-btn" id="PL"><span><img src="{{ asset('assets/dashboard/images/personal-loan.png') }}" title="Apply Now" alt="Apply Now"></span>Personal Loan</a></li>
            			<li><a href="#" class="apply-btn" id="BL"><span><img src="{{ asset('assets/dashboard/images/business-loan.png') }}" title="Apply Now" alt="Apply Now"></span>Business Loan</a></li>
            			<li><a href="#" class="apply-btn" id="EL"><span><img src="{{ asset('assets/dashboard/images/education-loan.png') }}" title="Apply Now" alt="Apply Now"></span>Education Loan</a></li>
            			<li><a href="#" class="apply-btn" id="ML"><span><img src="{{ asset('assets/dashboard/images/medical-loan.png') }}" title="Apply Now" alt="Apply Now"></span>Medical Loan</a></li>
            		</ul>
            	</div>
				</div>
				
			</div>
				<!-- end of data-content -->
	</div>
	<!-- end of main-content -->
				

			</div>
			<!-- end of verification-cover -->			
		</div>

	<div class="left">
		<div class="inner-sec">
		
		
		</div>
	</div>
	
</div>
<!-- end of login-wrapper -->
<!--newer end-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script> 
$(".apply-btn").click(function(){
    var loan_type = $(this).attr('id');
    
    var passData = {loan_type:loan_type};
        $.ajax({
          type: "GET",
          url: "loan-calculation-type",
          data:passData,
          success: function(data){
              window.location.href='loan-calculation';
          }
        });
});
</script>
@endsection