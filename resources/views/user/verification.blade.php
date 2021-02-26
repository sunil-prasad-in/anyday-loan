@extends('user.include.app')
@section('content')
<div class="login-wrapper otp-varification">
	<div class="right">
		<div class="inner-sec">
			<div class="verification-cover">
				<img src="{{ asset('assets/images/verification-img.png') }}" title="" alt="" />
				<form method="post" id="login-form" class="login-form" action="{{ url('verify-otp') }}">
					{{ csrf_field() }}
					<input type="hidden" name="mobile_number" value="{{ session()->get('mobile') }}" />
					@if(session()->has('is_reg') && session()->has('is_reg') == 1)
					<input type="hidden" name="is_reg" value="{{ session()->get('is_reg') }}" />
					@endif
					<h2>Verification</h2>
					<p>Enter 6 digit OTP sent on your mobile number</p>
					<!--@include('user.include.msg')-->
					<a href="javascript:;">(+91) {{ session()->get('mobile') }}</a>

					<div class="otp-sec" id="otp">
						<input type="text" name="otp1" maxlength="1" class="otp-input" id="100" onkeyup="OTPInput(this.value)" />
						<input type="text" name="otp2" maxlength="1" class="otp-input" id="101" onkeyup="OTPInput(this.value)" />
						<input type="text" name="otp3" maxlength="1" class="otp-input" id="102" onkeyup="OTPInput(this.value)" />
						<input type="text" name="otp4" maxlength="1" class="otp-input" id="103" onkeyup="OTPInput(this.value)" />
						<input type="text" name="otp5" maxlength="1" class="otp-input" id="104" onkeyup="OTPInput(this.value)" />
						<input type="text" name="otp6" maxlength="1" class="otp-input" id="105" onkeyup="OTPInput(this.value)" />
						@if(session()->has('error'))
						<span class="otp-invalid" style="color:red;">Invalid OTP, please enter again</span>
						@elseif(session()->has('errors'))
						<span class="otp-invalid" style="color:red;">Invalid mobile no., please enter again</span>
						@endif
						<p class="otp-time"></p>
						
						<a href="javascript:;" id="timeoff" class="resent_otp" title="Resend OTP" style="display:none;">Resend OTP</a>
					</div>
					<div class="form-action">
						<input type="submit" class="white-btn class-changer" title="Submit" name="submit" value="Submit">
						<div class="bottom-sec">
							<a href="{{ url('login') }}" title="Edit Number">Edit Number?</a>
							<a href="javascript:;" class="resent_otp" title="Resend OTP">Resend OTP?</a>
						</div>
					</div>
				</form>
			</div>
			<form method="post" id="resend-form" class="resend-form" action="{{ url('resend-otp') }}">
				{{ csrf_field() }}
				
				@if(session()->has('is_reg') && session()->has('is_reg') == 1)
				<input type="hidden" name="is_reg" value="{{ session()->get('is_reg') }}" />
				@endif
				<input type="hidden" name="hid_mobile" value="{{ session()->get('mobile') }}" />
			</form>
			<!-- end of login-form -->
			<p class="quick-login">By Pressing ‘Submit’ you agree to our<br/><a href="{{ url('terms-condition') }}" class="terms-con">Terms and Conditions</a></p>
		</div>
	</div>
	<div class="left" style="background: url({{ asset('assets/images/login-img.jpg') }}) 0% 0% / cover;
    background-repeat: no-repeat;
    background-position: -100px 2px;background-color:#dfe0db">
		<div class="inner-sec">
			
			<!-- <img src="images/login-img.png" title="" alt="" /> -->
		</div>
	</div>
	
</div>
@endsection
@section('script')
<script>
$("input").keyup(function(){
    if($("input[name='otp1']").val() != "" && $("input[name='otp2']").val() != "" && $("input[name='otp3']").val() != "" && $("input[name='otp4']").val() != "" && $("input[name='otp5']").val() != "" && $("input[name='otp6']").val() != ""){
        $(".class-changer").removeClass("white-btn");
        $(".class-changer").addClass("redbtn");
    }else{
        $(".class-changer").removeClass("redbtn");
        $(".class-changer").addClass("white-btn");
    }
});
// var fM = 60;
// var SimTimer;
$(document).ready(function() {
// 	elem = $(".login-form").find('p.otp-time');
// 	stTimer(fM, elem);
	$(".resent_otp").click(function(e){
		$(".resend-form").submit();
	});
});
// function stTimer(dur, disEle, resendHtm = "Resend OTP") {
// 	disEle.css('pointer-events', 'none');
//     var timer = dur, minutes, seconds;
//     SimTimer = setInterval(function () {
//         minutes = parseInt(timer / 60, 10)
//         seconds = parseInt(timer % 60, 10);

//         minutes = minutes < 10 ? "0" + minutes : minutes;
//         seconds = seconds < 10 ? "0" + seconds : seconds;
//         //opt = minutes + ":" + seconds;;
//         opt = seconds+' Sec';
//         disEle.html(opt);
//         if(opt == "00 Sec" && resendHtm != ''){
//         	disEle.html(resendHtm);
//         	disEle.removeAttr('style');
//     		clearInterval(SimTimer);
//         }
//         if (--timer < 0) {
//             timer = dur;
//         }
//     }, 1000);
// }
// function clrTmr(disEle, resendHtm = "Resend OTP") {
// 	disEle.html(resendHtm);
// 	disEle.removeAttr('style');
// 	clearInterval(SimTimer);
// }
(function($) {
  $.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  };
}(jQuery));

$(".otp-input").inputFilter(function(value) {
  return /^-?\d*$/.test(value); });
</script>
<script>
function OTPInput() {
  const inputs = document.querySelectorAll('#otp > *[id]');
  for (let i = 0; i < inputs.length; i++) {
    inputs[i].addEventListener('keydown', function(event) {
      if (event.key === "Backspace") {
        inputs[i].value = '';
        if (i !== 0)
          inputs[i - 1].focus();
      } else {
        //alert(event.keyCode);  
        if (i === inputs.length - 1 && inputs[i].value !== '') {
          return true;
          //return false;
        }else if (event.keyCode > 47 && event.keyCode < 58) {
          inputs[i].value = event.key;
          if (i !== inputs.length - 1)
            inputs[i + 1].focus();
          event.preventDefault();
        }else if (event.keyCode > 95 && event.keyCode < 106) {
          inputs[i].value = event.key;
          if (i !== inputs.length - 1)
            inputs[i + 1].focus();
          event.preventDefault();
        }else if (event.keyCode > 64 && event.keyCode < 91) {
        //   inputs[i].value = String.fromCharCode(event.keyCode);
        //   if (i !== inputs.length - 1)
        //     inputs[i + 1].focus();
        //   event.preventDefault();
            inputs[i].value = '';
            return false;
        }else{
            inputs[i].value = '';
            return false;
        }
      }
    });
  }
}
OTPInput();
var counter = 60;
var interval = setInterval(function() {
    counter--;
    // Display 'counter' wherever you want to display it.
    if (counter <= 0) {
     		clearInterval(interval);
    //   	$('.otp-time').html("<h3 class='resent_otp'>Resend OTP</h3>");  
      	$('.otp-time').html("");  
      	//$('#timeoff').css("display","block");
        return;
    }else{
        $('#timeoff').css("display","none");
    	$('.otp-time').text(counter+" Seconds");
    //   console.log("Timer --> " + counter);
    }
}, 1000);
</script>
@endsection