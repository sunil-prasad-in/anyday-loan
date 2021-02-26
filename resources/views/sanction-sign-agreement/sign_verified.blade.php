@extends('user.include.app')
@section('content')


<div class="login-wrapper otp-varification">
	<div class="right">
		<div class="inner-sec">
			<div class="details employment-details-cover">
				
				
				<!-- end of header-sec -->

				<div class="complete-login loan-app-com">
					<h1 style="margin:40px 0 0">Congratulations</h1>

					<img src="{{ asset('assets/images/check-icon.png') }}" style="max-width:110px " title="" alt="" />
					
					<div>
					<p>Your Agreement has been successfully signed 
and a copy of the same has been sent to 
your registered mail id</p>
					</div>

					<div class="form-action">
	                        <input type="submit" title="Submit" id="phase" name="submit" value="Continue">
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
$(document).ready(function(){
  $("#phase").click(function(){
      window.location.href='dashboard/';
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

 });   
$(window).resize(function(){
    $('.left, .right').equalHeights();
});

</script>
@endsection