@extends('user.include.app')
@section('content')


<div class="login-wrapper otp-varification">
	<div class="right">
		<div class="inner-sec">
			<div class="details employment-details-cover">
				
				
				<!-- end of header-sec -->

				<div class="complete-login loan-app-com">
					<img src="images/loan-app-complete.png" title="" alt="" />
					<h1>Great!</h1>
					<p>You have successfully completed your loan application.</p>

					<p>Your documents are being verified</p>
					
                  
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