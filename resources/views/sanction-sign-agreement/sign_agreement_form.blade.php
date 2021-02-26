@extends('user.include.app')
@section('content')


<div class="login-wrapper otp-varification">
	<div class="right">
		<div class="inner-sec">
			<div class="details employment-details-cover">
				<div class="header-sec">
					<h2>Sign Agreement</h2>
				</div>
				

				<div class="deatils-form">
					
					<form method="post" id="login-form" class="login-form" action="{{ url('http://3.7.86.3/api/loans/eagreement') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="applicant_code" value="333e9d543be19b7b5cc3324088e1232f">
                    <input type="hidden" name="loan_app_no" value="ANYDAY1605005769">
                    
					<div class="form-box half lname">
                        <input type="text" title="Full Name" name="fname" placeholder="Full Name" required="">                        
                    </div>	
					
                    <div class="form-box half mobilenum">
                        <input type="text" id="mobile_number" title="Mobile Number" name="mobilenumber" placeholder="Mobile Number" required="">                         
                    </div>
                     <div class="form-box half email">                        
                       <input type="text" title="Email" name="email" placeholder="Email" required="">                          
                    </div>   

                                           
                    

                    <p class="note">By clicking on ‘Generate OTP’ button, I agree to receive OTP
on mobile provided for the purpose of electronic signature
on agreement</p>

                    <div class="form-action">
                        <input type="submit" title="Submit" name="submit" value="Generate OTP">
                    </div>


				</form>
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
<!-- end of login-wrapper -->

@endsection
@section('script')
<script>
$(document).ready(function(){
  
});
$("#mobile_number").keydown(function(event) {
  k = event.which;
  if ((k >= 96 && k <= 105) || k == 8) {
    if ($(this).val().length == 10) {
      if (k == 8) {
        return true;
      } else {
        event.preventDefault();
        return false;

      }
    }
  } else if ((k > 47 && k < 58) || k == 8) {
    if ($(this).val().length == 10) {
      if (k == 8) {
        return true;
      } else {
        event.preventDefault();
        return false;

      }
    }
  }else {
    event.preventDefault();
    return false;
  }

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

    $(window).resize(function(){
        $('.left, .right').equalHeights();
    });
});


</script>

@endsection