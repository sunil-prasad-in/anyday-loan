@extends('user.include.app')
@section('content')
<style>
.hasDatepicker{    position: relative;
    z-index: 1;
    background: transparent;}    
</style>
<div class="login-wrapper otp-varification">
	<div class="right">
		<div class="inner-sec">
			<div class="details step-details personal-details-cover">
				
				<div class="header-sec">
					<h2>Loan Application</h2>
				</div>
				<!-- end of header-sec -->

				<!--<div class="details-step">-->
				<!--	<h3><span><img src="{{ asset('assets/images/profille-detais.png') }}" class="profileimg" title="" alt="" /> <img src="{{ asset('assets/images/check-icon.png') }}" title="" alt="" class="checkimg" style="display:none;" /></span>Profile Information</h3>-->
				<!--</div>-->
				<!-- end of details-step -->
				
				<div class="loancomple-step person-details fill_checker" style="margin-top:0;">
					<ul>
						<li class="{{ isset(Session::get('user_filled_details')['profile'])?'active':'' }}"><a href="{{ isset(Session::get('user_filled_details')['profile'])?url('personal-detail'):'#' }}">Personal Information</a></li>
						<li class="{{ isset(Session::get('user_filled_details')['address'])?'active':'' }}"><a href="{{ isset(Session::get('user_filled_details')['address'])?url('address-info'):'#' }}">Address Information</a></li>
						<li class="{{ isset(Session::get('user_filled_details')['employer'])?'active':'' }}"><a href="{{ isset(Session::get('user_filled_details')['employer'])?url('employment-info'):'#' }}">Employment Information </a></li>
					</ul>
				</div>

				<div class="deatils-form">
				    @include('user.include.action_msg')
				    <span class="help-block mainHd">
                        {{ isset(session('apiError')['amount']['0'])?session('apiError')['amount']['0']:"" }}
                        {{ isset(session('apiError')['roi']['0'])?session('apiError')['roi']['0']:"" }}
                        {{ isset(session('apiError')['tenure']['0'])?session('apiError')['tenure']['0']:"" }}
                        {{ isset(session('apiError')['loan_type']['0'])?session('apiError')['loan_type']['0']:"" }}
                    </span>
					<form method="post" id="login-form" class="login-form"  action="{{ url(route('personal_detail_fill')) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="amount" value="{{ isset($data['loan']['loan_amount'])?$data['loan']['loan_amount']:"" }}">
                    <input type="hidden" name="tenure" value="{{ isset($data['loan']['loan_period'])?$data['loan']['loan_period']:"" }}">
                    <input type="hidden" name="roi" value="{{ isset($data['loan']['loan_rate'])?$data['loan']['loan_rate']:"" }}">
					<div class="form-box half pancard">
                        <input type="text" title="PAN Number" name="pan_nummber" value="{{ isset(Session::get('user_filled_details')['profile']['pan'])?Session::get('user_filled_details')['profile']['pan']:old('pan_nummber') }}" placeholder="PAN Number" required="" class="{{ isset(session('apiError')['pan']['0'])?'invalid':'' }}"> 
                            <span class="help-block" style="display:{{ isset(session('apiError')['pan']['0'])?'block;':'none;' }}">
                                {{ isset(session('apiError')['pan']['0'])?session('apiError')['pan']['0']:"" }}
                            </span>
                        
                    </div>	
					<div class="form-box half fname">
                        <input type="text" title="Full Name as per PAN" name="full_name" value="{{ isset(Session::get('user_filled_details')['profile']['name'])?Session::get('user_filled_details')['profile']['name']:old('full_name') }}" placeholder="Full Name as per PAN" required="" class="{{ isset(session('apiError')['name']['0'])?'invalid':'' }}">                        
                        <span class="help-block" style="display:{{ isset(session('apiError')['name']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['name']['0'])?session('apiError')['name']['0']:"" }}
                        </span>
                    </div>
                    <div class="form-box half lname">
                        <input type="text" title="Father's Name" name="father_name" value="{{ isset(Session::get('user_filled_details')['profile']['father_full_name'])?Session::get('user_filled_details')['profile']['father_full_name']:old('father_name') }}" placeholder="Father's Name" required="" class="{{ isset(session('apiError')['father_full_name']['0'])?'invalid':'' }}">                        
                        <span class="help-block" style="display:{{ isset(session('apiError')['father_full_name']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['father_full_name']['0'])?session('apiError')['father_full_name']['0']:"" }}
                        </span>
                    </div>
                     <div class="form-box half dob calender-f">                        
                       <input type="text" placeholder="dd-mm-yy" readonly="readonly" id="birthday" name="birthday" value="{{ isset(Session::get('user_filled_details')['profile']['dob'])?date('d-m-Y',strtotime(Session::get('user_filled_details')['profile']['dob'])):old('birthday') }}" class="{{ isset(session('apiError')['dob']['0'])?' invalid':'' }}">                       
                        <span class="help-block" style="display:{{ isset(session('apiError')['dob']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['dob']['0'])?session('apiError')['dob']['0']:"" }}
                        </span>
                    </div>   

                    <div class="form-box half gender select">                        
                       <select  name="gender" required="" class="{{ isset(session('apiError')['gender']['0'])?'invalid':'' }}">
                           <option value="" disabled hidden selected>Gender</option>
                           @if(isset($data['gender']) && count($data['gender']) > 0)
                            @foreach($data['gender'] as $k=>$v)
                           	  <option value="{{ $v['value'] }}" {{ (isset(Session::get('user_filled_details')['profile']['gender']) && Session::get('user_filled_details')['profile']['gender'] == $v['value'])?"selected":((old('gender') == $v['value'])?"selected":"") }} >{{ $v['label'] }}</option>
                       	    @endforeach
                       	  @endif
                       </select> 
                       <span class="help-block" style="display:{{ isset(session('apiError')['gender']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['gender']['0'])?session('apiError')['gender']['0']:"" }}
                        </span>
                    </div>   

                    <div class="form-box half marital-status select">                        
                       <select name="marital_status" required="" class="{{ isset(session('apiError')['marital_status']['0'])?'invalid':'' }}">
                           <option value="" disabled hidden selected>Marital Status</option>
                       	  @if(isset($data['marital_status']) && count($data['marital_status']) > 0)
                            @foreach($data['marital_status'] as $k=>$v)
                           	  <option value="{{ $v['value'] }}"  {{ (isset(Session::get('user_filled_details')['profile']['marital_status']) && Session::get('user_filled_details')['profile']['marital_status'] == $v['value'])?"selected":((old('marital_status') == $v['value'])?"selected":"") }} >{{ $v['label'] }}</option>
                       	    @endforeach
                       	  @endif
                       	</select>  
                       	<span class="help-block" style="display:{{ isset(session('apiError')['marital_status']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['marital_status']['0'])?session('apiError')['marital_status']['0']:"" }}
                        </span>
                    </div>

                    <div class="form-box half education select">                        
                       <select name="education" required="" class="{{ isset(session('apiError')['education']['0'])?'invalid':'' }}">
                           <option value="" disabled hidden selected>Education</option>
                       	  @if(isset($data['education']) && count($data['education']) > 0)
                            @foreach($data['education'] as $k=>$v)
                           	  <option value="{{ $v['value'] }}"  {{ (isset(Session::get('user_filled_details')['profile']['education']) && Session::get('user_filled_details')['profile']['education'] == $v['value'])?"selected":((old('education') == $v['value'])?"selected":"") }} >{{ $v['label'] }}</option>
                       	    @endforeach
                       	  @endif
                       	</select> 
                       	<span class="help-block" style="display:{{ isset(session('apiError')['education']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['education']['0'])?session('apiError')['education']['0']:"" }}
                        </span>
                    </div>

                    <div class="form-box half email">
                        <input type="text" title="Personal Email ID" name="personal_email_id" value="{{ isset(Session::get('user_filled_details')['profile']['personal_email_id'])?Session::get('user_filled_details')['profile']['personal_email_id']:old('personal_email_id') }}" placeholder="Personal Email ID" required="" class="{{ isset(session('apiError')['personal_email_id']['0'])?'invalid':'' }}">                        
                        <span class="help-block" style="display:{{ isset(session('apiError')['personal_email_id']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['personal_email_id']['0'])?session('apiError')['personal_email_id']['0']:"" }}
                        </span>
                    </div>
                    <div class="form-action">
                        @if(isset(Session::get('user_filled_details')['profile']) && isset(Session::get('user_filled_details')['address']) && isset(Session::get('user_filled_details')['employer']))
                            <input type="button" class="redbtn viewmode" title="Continue" name="continue" value="Continue">
                        @else
                            <input type="submit" class="white-btn class-changer" title="Submit" name="submit" value="Continue">
                        @endif
                        
                        
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
    // disable all input start
    $(".viewmode").click(function(){
        window.location.href='address-info';
    });
    if($(".form-action").find("input").hasClass("viewmode")){
        $("form").find("input").each(function(i,v){
            if($(v).hasClass("viewmode")){
                // Do Nothing
            }else{
                $(v).attr("disabled","disabled");
            }
        });
        $("form").find("select").each(function(i,v){
            $(v).attr("disabled","disabled");
        });
    }
    // disable all input end
    
    var validator = ["pan_nummber","full_name","father_name","birthday","gender","marital_status","education","personal_email_id"];
    $("input").change(function(){
        myValidation_function(validator);
    });
    $("select").change(function(){
        myValidation_function(validator);
    });
    if(myValidation_function(validator)){
        
        $(".details-step").addClass("profile-sec");
        $(".profileimg").hide();
        $(".checkimg").show();
    } 
    $(".personal-details-cover .form-action input").click(function(){
        if(myValidation_function(validator)){
            $(".details-step").addClass("profile-sec");
            $(".profileimg").hide();
            $(".checkimg").show();
            $(".fill_checker").find("li:eq(0)").addClass("active");
        }   
    });
});
function myValidation_function(validator){
    $(".class-changer").removeClass("redbtn");
    $(".class-changer").addClass("white-btn");
    
    // $("input").removeClass("invalid");
    // $("select").removeClass("invalid");
    // $(".help-block").css("display","none");
    if(validator.length > 0){
        for(var i=0;i<validator.length;i++){
            if($("input[name='"+validator[i]+"']").val() == ""){
                //$("input[name='"+validator[i]+"']").addClass("invalid");
                // console.log(validator[i]+" :: "+$("input[name='"+validator[i]+"']").val());
                return false;
                break;
                
            }
            if($("input[name='"+validator[i]+"']").val() == undefined && ($("select[name='"+validator[i]+"']").val() == "" || $("select[name='"+validator[i]+"']").val() == null)){
                //$("select[name='"+validator[i]+"']").addClass("invalid");
                // console.log(validator[i]+" :: "+$("input[select='"+validator[i]+"']").val());
                return false;
                break;
            }
        }
        // console.log("reached");
        $(".class-changer").removeClass("white-btn");
        $(".class-changer").addClass("redbtn");
        return true;
    }
}
</script>
<script>
	$(document).ready(function() {


var rightheight = $(".right").height();
$(".left").height(rightheight);
});
	$(window).resize(function() {
var rightheight = $(".right").height();
$(".left").height(rightheight);
});
</script>


 <link href= 
'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css' 
          rel='stylesheet'> 
     <script src= 
"https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"> 
        </script> 
        <script src= 
"https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"> 
        </script>
<script> 
    $(document).ready(function() { 
        // var maxDate = "";
        // $(function(){
        //     var dtToday = new Date();
            
        //     var month = dtToday.getMonth() + 1;
        //     var day = dtToday.getDate();
        //     var year = dtToday.getFullYear()-18;
        //     if(month < 10)
        //         month = '0' + month.toString();
        //     if(day < 10)
        //         day = '0' + day.toString();
            
        //     maxDate = year + '-' + month + '-' + day;
        //     // alert(maxDate);
        //     $('#birthday').attr('max', maxDate);
        // });
        $(function() { 
            //$("#birthday").datepicker({endDate:maxDate}); 
            $('#birthday').datepicker({
               defaultDate: "-18y",
               changeMonth: true,
               changeYear: true,
               dateFormat: "dd-mm-yy",
               maxDate: "-18y",
                yearRange: '-121:-18'
            });
        }); 
        
    }) 
</script>
</script> 
@endsection