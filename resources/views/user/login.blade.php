@extends('user.include.app')
@section('content')
<div class="login-wrapper">
	<div class="right">
		<div class="inner-sec">
		    <div class="details ">
		    <div class="header-sec">
					<h2>Login</h2>
			</div>
			</div>
			<div class="login-formcover">
				<!--<h2 class="lg-title"><span>Login </span></h2>-->

					@include('user.include.action_msg')

				<form method="post" id="login-form" class="login-form" action="{{ url('do-login') }}">
					{{ csrf_field() }}
                    <div class="form-box mobilenum">
                        <input type="text" max="10" title="Mobile Number" name="mobile_number" id="mobile_number" placeholder="Mobile Number" value="{{ old('mobile_number')}}" required="">
                        
                        <span class="help-block" style="display:{{ isset(session('apiError')['mobile_number']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['mobile_number']['0'])?session('apiError')['mobile_number']['0']:"" }}
                        </span>
                    </div>
                    <div class="form-action">
                        <input type="submit" class="white-btn class-changer" title="Submit" name="submit" value="Send otp">
                    </div>

                    <div class="otp-sec" style="width:100%;float:left;display:none;">
                    	<p>OTP</p>
						<input type="text" name="otp" maxlength="1" class="otp-input">
						<input type="text" name="otp" maxlength="1" class="otp-input">
						<input type="text" name="otp" maxlength="1" class="otp-input">
						<input type="text" name="otp" maxlength="1" class="otp-input">
						<input type="text" name="otp" maxlength="1" class="otp-input">
						<input type="text" name="otp" maxlength="1" class="otp-input">
						<p class="otp-time" style="margin:13px 0;">54 Sec</p>
					</div>
					<div class="form-action otp-send" style="display:none;">
                        <input type="submit" title="Submit" name="submit" value="Login">
                    </div>
				</form>

				
				<p class="quick-login">New User, <a href="{{ url('register') }}">Register Here</a></p>

			</div>
			<!-- end of login-form -->

			
		</div>
	</div>
	<div class="left" style="background: url({{ asset('assets/images/login-img.jpg') }}) 0% 0% / cover;
    background-repeat: no-repeat;
    background-position: -100px 2px;background-color:#dfe0db">
		<div class="inner-sec" style="padding:25px;">	
				
		</div>
	</div>
	
</div>
@endsection

@section('script')
<script>
$("#mobile_number").change(function() {
    if ($(this).val().length == 10) {
        $(".class-changer").removeClass("white-btn");
        $(".class-changer").addClass("redbtn");
    }
});
    // mobile_number
$("#mobile_number").keydown(function(event) {
    $(".class-changer").removeClass("redbtn");
    $(".class-changer").addClass("white-btn");
    
  k = event.which;
  if ((k >= 96 && k <= 105) || k == 8) {
    if ($(this).val().length == 10) {
      if (k == 8) {
          $(".class-changer").removeClass("white-btn");
        $(".class-changer").addClass("redbtn");
        return true;
      } else {
        event.preventDefault();
        return false;

      }
    }
  } else if ((k > 47 && k < 58) || k == 8) {
    if ($(this).val().length == 10) {
      if (k == 8) {
          $(".class-changer").removeClass("white-btn");
        $(".class-changer").addClass("redbtn");
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
@endsection