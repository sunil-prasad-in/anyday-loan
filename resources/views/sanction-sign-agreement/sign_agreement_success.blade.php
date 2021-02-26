@extends('user.include.app')
@section('content')


	
<div class="login-wrapper otp-varification">
	<div class="right congra-screen">
		<div class="inner-sec">
			<div class="details employment-details-cover">
				
				
				<!-- end of header-sec -->
                <input type="hidden" id="redirect_url" value="{{ url(route('dash.pre_proceding')) }}">
				<div class="complete-login loan-app-com">
					<h1 style="margin:20px 0 0">Congratulations</h1>

					<img src="{{ asset('assets/images/check-icon.png') }}" style="max-width:110px " title="" alt="" />
					
					<div>
					<p>Your Agreement has been successfully signed<br>
and a copy of the same has been sent to<br>
your registered email</p>
					</div>

					<div class="form-action">
	                        <input class="redbtn" type="submit" title="Submit" name="submit" id="phase" value="Continue">
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
<!-- end of login-wrapper -->

@endsection
@section('script')
<script>
    $("#phase").click(function(){
        var redirect_url_val = $("#redirect_url").val();
        window.location.href=redirect_url_val;
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