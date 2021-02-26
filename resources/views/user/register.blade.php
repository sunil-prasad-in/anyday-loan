@extends('user.include.app')
@section('content')
<div class="login-wrapper">
	<div class="right">
		<div class="inner-sec">
			<div class="login-formcover">
				<h2 class="lg-title"><span>Register with Us </span></h2>
				
				@include('user.include.action_msg')
				<form method="post" id="login-form" class="login-form" action="{{ url('do-register') }}">
					{{ csrf_field() }}
					<div class="form-box fname">
                        <input type="text"  title="First Name" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" required="">    
                        <span class="help-block" style="display:{{ isset(session('apiError')['first_name']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['first_name']['0'])?session('apiError')['first_name']['0']:"" }}
                        </span>
                    </div>
                    <div class="form-box lname">
                        <input type="text"  title="Last Name" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" required="">     
                        <span class="help-block" style="display:{{ isset(session('apiError')['last_name']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['last_name']['0'])?session('apiError')['last_name']['0']:"" }}
                        </span>
                    </div>
                    <div class="form-box mobilenum">
                        <input type="text" title="Mobile Number" name="mobile_number" id="mobile_number" placeholder="Mobile Number" value="{{ old('mobile_number') }}" required="">                   
                        <span class="help-block" style="display:{{ isset(session('apiError')['mobile_number']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['mobile_number']['0'])?session('apiError')['mobile_number']['0']:"" }}
                        </span>
                    </div>
                    <div class="form-action">
                        <input type="submit" title="Submit" class="white-btn class-changer" name="submit" value="Generate otp">
                    </div>
				</form>
				<p class="quick-login">Already have an account, <a href="{{ url('login') }}">Login here</a></p>

			</div>
			<!-- end of login-form -->

			
		</div>
	</div>
	<div class="left">
		<div class="inner-sec" style="padding:25px;">	
				
		</div>
	</div>
	
</div>
@endsection

@section('script')
<script>
$("input").keyup(function(){
    if($("#first_name").val() != "" && $("#last_name").val() != "" && $("#mobile_number").val().length == 10){
        $(".class-changer").removeClass("white-btn");
        $(".class-changer").addClass("redbtn");
    }else{
        $(".class-changer").removeClass("redbtn");
        $(".class-changer").addClass("white-btn");
    }
});
    // mobile_number
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
  } else {
    event.preventDefault();
    return false;
  }

});
</script>
@endsection