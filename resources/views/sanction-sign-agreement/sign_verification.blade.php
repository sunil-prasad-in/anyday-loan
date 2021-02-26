@extends('user.include.app')
@section('content')


<div class="login-wrapper otp-varification">
	<div class="right">
		<div class="inner-sec">
			<div class="verification-cover">
				
				<img src="{{ asset('assets/images/sign-agreement.png') }}" style="max-width:100px;" title="" alt="" />

				<h2>Sign Agreement</h2>

				<p>OTP has been sent to your mobile number <br/>
<span class="starer">86*****1726</span>. Please enter OTP below </p>
				
                <form method="post" id="login-form" class="login-form" action="{{ url('sign-verified') }}">
					{{ csrf_field() }}
					<input type="hidden" name="mobile_number" value="" />
				<div class="otp-sec" id="otp">
					<input type="text" name="otp1" maxlength="1" class="otp-input" id="100" onkeyup="OTPInput(this.value)" />
					<input type="text" name="otp2" maxlength="1" class="otp-input" id="101" onkeyup="OTPInput(this.value)" />
					<input type="text" name="otp3" maxlength="1" class="otp-input" id="102" onkeyup="OTPInput(this.value)" />
					<input type="text" name="otp4" maxlength="1" class="otp-input" id="103" onkeyup="OTPInput(this.value)" />
					<input type="text" name="otp5" maxlength="1" class="otp-input" id="104" onkeyup="OTPInput(this.value)" />
					<input type="text" name="otp6" maxlength="1" class="otp-input" id="105" onkeyup="OTPInput(this.value)" />
					<p class="otp-time"></p>
					<a href="javascript:;" id="timeoff" class="resent_otp" title="Resend OTP" style="display:none;">Resend OTP</a>

					<p style="margin:12px 0 0;float:left;width:100%;">I understand that by clicking the ‘Sign Now’ button, I would be electronically signing the document. I have read and understood and agree to electronically sign all pages of the said document and agree to be abide by them</p>
				</div>
                

				<div class="form-action">
                        <input type="submit" title="Submit" name="submit" value="Sign Now">
                        <div class="bottom-sec">
                        	<!-- <a href="#" title="Edit Number">Edit Number?</a> -->
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
				<input type="hidden" name="hid_mobile" value="8320126020" />
			</form>
			<!-- end of login-form -->

			
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
$(document).ready(function() {
	$(".resent_otp").click(function(e){
		$(".resend-form").submit();
	});
	var starerPate = $("input[name='hid_mobile']").val();
	var patterner = "";
	if(starerPate.length == 10){
	    for(var i=0;i<starerPate.length;i++){
	        if(i < 2 || i > 6){
	            patterner += starerPate[i];  
	        }else{
	            patterner += '*';
	        }
	        
	    }
	}
	$(".starer").html(patterner);
});
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
  
$(document).ready(function() {
    var rightheight = $(".right").height();
    $(".left").height(rightheight + 15);
});

$(window).onload(function() {
    var rightheight = $(".right").height();
    $(".left").height(rightheight + 15);
});

$(window).resize(function() {
    var rightheight = $(".right").height();
    $(".left").height(rightheight + 15);
});
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
      	$('#timeoff').css("display","block");
        return;
    }else{
        $('#timeoff').css("display","none");
    	$('.otp-time').text(counter+" Seconds");
    //   console.log("Timer --> " + counter);
    }
}, 1000);
</script>
@endsection