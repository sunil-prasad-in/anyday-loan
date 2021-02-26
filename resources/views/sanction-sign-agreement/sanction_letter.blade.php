@extends('user.include.app')
@section('content')

<div class="login-wrapper otp-varification">
	<div class="right">
		<div class="inner-sec">
			<div class="details sanction-cover">
			

				<div class="header-sec">
					<h2>Sanction Letter</h2>
				</div>
				<!--<div class="sanction-top">-->
				<!--	<h3>Sanction Letter </h3>-->
					
				<!--</div>-->
                <input type="hidden" name="letter_url" id="letter_url" value="{{ isset($data['0']['url'])?$data['0']['url']:"" }}">
                <a href="{{ isset($data['0']['url'])?$data['0']['url']:"" }}" target="_blank" download style="display:none;">letter</a>
				<div class="confirm-text-wrapper sanction-text">
					<div class="inner-sec">
					    <iframe src="{{ isset($data['0']['url'])?$data['0']['url']:"" }}" frameborder="0" height="598px" width="100%">
                        </iframe>
					</div>
				</div>
				<div class="sanction-context">
					<p class="note"><input type="checkbox" id="terms-con" title="" name="terms-con" required=""><label for="terms-con">I have read and understood the terms and conditions of the Sanction letter and agree to be bound by them.</label></p>
					<div class="form-action">
	                        <input type="submit" title="Submit" name="submit" id="phase" value="Continue">
	                </div>
	                	<p class="note" style="width: 100%;
    text-align: center;
    font-size: 12px;"> A copy of the same has been sent to your personal Email address.</p>
	                
            	</div>


			</div>
			<!-- end of login-form -->

			
		</div>
	</div>
	<div class="left">
		<div class="inner-sec">
		
			<!-- 	<img src="images/login-img.png" title="" alt="" /> -->
		</div>
	</div>
	
</div>
<!-- end of login-wrapper -->

@endsection
@section('script')
<script>
$("#terms-con").click(function(){
    if ($("input[type=checkbox]").is( 
                      ":checked")) { 
        $("#phase").addClass("redbtn");              
    }else{
       $("#phase").removeClass("redbtn");               
    }
});
/* Helper function */
function download_file(fileURL, fileName) {
    // for non-IE
    if (!window.ActiveXObject) {
        var save = document.createElement('a');
        save.href = fileURL;
        save.target = '_blank';
        var filename = fileURL.substring(fileURL.lastIndexOf('/')+1);
        save.download = fileName || filename;
	       if ( navigator.userAgent.toLowerCase().match(/(ipad|iphone|safari)/) && navigator.userAgent.search("Chrome") < 0) {
				document.location = save.href; 
// window event not working here
			}else{
		        var evt = new MouseEvent('click', {
		            'view': window,
		            'bubbles': true,
		            'cancelable': false
		        });
		        save.dispatchEvent(evt);
		        (window.URL || window.webkitURL).revokeObjectURL(save.href);
			}	
    }

    // for IE < 11
    else if ( !! window.ActiveXObject && document.execCommand)     {
        var _window = window.open(fileURL, '_blank');
        _window.document.close();
        _window.document.execCommand('SaveAs', true, fileName || fileURL)
        _window.close();
    }
}
$(document).ready(function(){
    if ($("input[type=checkbox]").is( 
                      ":checked")) { 
        $("#phase").addClass("redbtn");              
    }else{
       $("#phase").removeClass("redbtn");               
    }
    var vld = $("#letter_url").val();
    //e.preventDefault();  //stop the browser from following
    //window.location.href = vld;
    // download_file(vld, "letter.pdf");
});
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
$("#phase").click(function(){
    // $("#terms-con").
     if ($("input[type=checkbox]").is( 
                      ":checked")) { 
            window.location.href='sanction-letter-upload';
        // alert("Check box in Checked"); 
    } else { 
        // alert("Check box is Unchecked"); 
    } 
});

</script>
@endsection