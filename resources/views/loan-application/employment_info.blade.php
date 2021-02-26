@extends('user.include.app')
@section('content')
<style>
.hasDatepicker{    position: relative;
    z-index: 1;
    background: transparent;}    
.ui-datepicker-calendar {
    display: none;
    }
</style>
<div class="login-wrapper otp-varification">
  <div class="right">
    <div class="inner-sec">
      <div class="details step-details employment-details-cover">
        
        <div class="header-sec">
          <h2>Loan Application</h2>
        </div>
        <!-- end of header-sec -->

        <!--<div class="details-step backstep">-->
        <!--  <h3><span><img src="{{ asset('assets/images/employment-info.png') }}" class="profileimg" title="" alt="" /> <img src="{{ asset('assets/images/check-icon.png') }}" title="" alt="" class="checkimg" style="display:none;" /></span>Employment Information</h3>-->
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
          <form method="post" id="login-form" class="login-form" action="{{ url('employment-info-fill') }}">
              <!--action="pre-approved.html"-->
                    {{ csrf_field() }}
          <div class="form-box half company">
                        <input type="text" title="Company name (currently working)" name="company_name" value="{{ isset(Session::get('user_filled_details')['employer']['company_name'])?Session::get('user_filled_details')['employer']['company_name']:old('company_name') }}" placeholder="Company name (currently working)" required="" class="{{ isset(session('apiError')['company_name']['0'])?'invalid':'' }}">                        
                        <span class="help-block" style="display:{{ isset(session('apiError')['company_name']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['company_name']['0'])?session('apiError')['company_name']['0']:"" }}
                        </span>
                        <input type="hidden" name="loan_app_no" value="{{ isset(Session::get('user_detail')['loan_app_no'])?Session::get('user_detail')['loan_app_no']:"" }}">
                    </div>  
          <div class="form-box half company select">
                        <!--<input type="text" title="Company type" name="company_type" placeholder="Company type" required="">   -->
                        <select name="company_type" required class="{{ isset(session('apiError')['company_type']['0'])?'invalid':'' }}">
                          <option value="" disabled hidden selected>Company type</option>
                          @if(isset($data['company_type']) && count($data['company_type']) > 0)
                            @foreach($data['company_type'] as $k=>$v)
                              <option value="{{ $v['value'] }}" {{ (isset(Session::get('user_filled_details')['employer']['company_type']) && Session::get('user_filled_details')['employer']['company_type'] == $v['value'])?'selected':((old('company_type') == $v['value'])?"selected":"") }}>{{ $v['label'] }}</option>
                            @endforeach
                          @endif
                       </select> 
                       <span class="help-block" style="display:{{ isset(session('apiError')['company_type']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['company_type']['0'])?session('apiError')['company_type']['0']:"" }}
                        </span>
                    </div>
                    
                    <div class="form-box half calender-left">
                        <div class="inner-field" style="margin:0 -10px">
                        <div class="form-box full calender-left">
                          
                           <input type="text" title="Years & months in current company" name="years_in_current_company_show" placeholder="Years & months in current company" required="" value="{{ isset(Session::get('user_filled_details')['employer']['years_in_current_company'])?explode('.',Session::get('user_filled_details')['employer']['years_in_current_company'])[0].' Years - '.explode('.',Session::get('user_filled_details')['employer']['years_in_current_company'])[1].' Months':'' }}" readonly class="{{ isset(session('apiError')['years_in_current_company']['0'])?'invalid':'' }}">
                            <span class="help-block" style="display:{{ isset(session('apiError')['years_in_current_company']['0'])?'block;':'none;' }}">
                                {{ isset(session('apiError')['years_in_current_company']['0'])?session('apiError')['years_in_current_company']['0']:"" }}
                            </span>
                           <div class="select-date">
                           	
                           	    <div class="date-header">
                           		<div class="date-drop-box">
                           			<select class="year-select" name="years_in_current_company"required>
                                      <option value="" disabled hidden selected>Years</option>
                                      @for($i=0;$i<=60;$i++)
                                        <option value="{{ $i }}" {{ (isset(Session::get('user_filled_details')['employer']['years_in_current_company']) && explode('.',Session::get('user_filled_details')['employer']['years_in_current_company'])[0] == $i)?'selected':((old('years_in_current_company') == $i)?"selected":"") }}>{{ $i." Years " }}</option>
                                      @endfor
                                      
                                    </select> 
                           			
                                    <select class="month-select" name="month_in_current_company" required>
                                      <option value="0">Month</option>
                                      @for($i=0;$i<=11;$i++)
                                        <option value="{{ $i }}" {{ (isset(Session::get('user_filled_details')['employer']['years_in_current_company']) && explode('.',Session::get('user_filled_details')['employer']['years_in_current_company'])[1] == $i)?'selected':((old('month_in_current_company') == $i)?"selected":"") }}>{{ $i." Months " }}</option>
                                      @endfor
                                   </select>
                           			
                           		</div>
                           	</div>
                           	
                           </div>
                       </div>
                        </div>
                      
                    </div>
                     <div class="form-box half email">                        
                     <input type="text" title="Official email address" name="company_email_address" value="{{ isset(Session::get('user_filled_details')['employer']['company_email_address'])?Session::get('user_filled_details')['employer']['company_email_address']:old('company_email_address') }}" placeholder="Official email address" required="" class="{{ isset(session('apiError')['company_email_address']['0'])?'invalid':'' }}">                          
                    <span class="help-block" style="display:{{ isset(session('apiError')['company_email_address']['0'])?'block;':'none;' }}">
                        {{ isset(session('apiError')['company_email_address']['0'])?session('apiError')['company_email_address']['0']:"" }}
                    </span>
                    </div>   

                    <div class="form-box half designation">                        
                       <!--<select name="designation" required>-->
                       <!--   <option value="">Designation</option>-->
                       <!--   <option vaue="1">1</option>-->
                       <!--   <option value="2">2</option>-->
                       <!--   <option value="3">3</option>-->
                       <!--   <option value="4">4</option>-->
                       <!--   <option value="5">5</option>-->
                       <!--   <option value="6">6</option>-->
                       <!--   <option value="7">7</option>-->
                       <!--   <option value="8">8</option>-->
                       <!--   <option value="9">9</option>-->
                       <!--   <option value="10">10</option>-->
                       <!--</select>-->
                       <input type="text" title="Designation" name="designation" value="{{ isset(Session::get('user_filled_details')['employer']['designation'])?Session::get('user_filled_details')['employer']['designation']:old('designation') }}" placeholder="Designation" required="" class="{{ isset(session('apiError')['designation']['0'])?'invalid':'' }}">                          
                       <span class="help-block" style="display:{{ isset(session('apiError')['designation']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['designation']['0'])?session('apiError')['designation']['0']:"" }}
                        </span>
                    </div>   

                    <div class="form-box half designation select">                        
                       <select name="job_type" required class="{{ isset(session('apiError')['job_type']['0'])?'invalid':'' }}">
                          <option value="" disabled hidden selected>Job type</option>
                          @if(isset($data['job_type']) && count($data['job_type']) > 0)
                            @foreach($data['job_type'] as $k=>$v)
                              <option value="{{ $v['value'] }}" {{ (isset(Session::get('user_filled_details')['employer']['job_type']) && Session::get('user_filled_details')['employer']['job_type'] == $v['value'])?'selected':((old('job_type') == $v['value'])?"selected":"") }}>{{ $v['label'] }}</option>
                            @endforeach
                          @endif
                       </select> 
                       <span class="help-block" style="display:{{ isset(session('apiError')['job_type']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['job_type']['0'])?session('apiError')['job_type']['0']:"" }}
                        </span>
                    </div>   

                    <div class="form-box half rupee">                        
                        <input type="text" title="Net monthly salary" name="net_monthly_salary" value="{{ isset(Session::get('user_filled_details')['employer']['net_monthly_salary'])?number_format(Session::get('user_filled_details')['employer']['net_monthly_salary']):old('net_monthly_salary') }}" placeholder="Net monthly salary" required="" class="comma_sep_digit {{ isset(session('apiError')['net_monthly_salary']['0'])?'invalid':'' }}">                       
                        <span class="help-block" style="display:{{ isset(session('apiError')['net_monthly_salary']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['net_monthly_salary']['0'])?session('apiError')['net_monthly_salary']['0']:"" }}
                        </span>
                    </div>

                    <div class="form-box half rupee">                        
                      <input type="text" title="Total monthly EMIs being paid" name="currently_any_emi_paying" value="{{ isset(Session::get('user_filled_details')['employer']['currently_any_emi_paying'])?number_format(Session::get('user_filled_details')['employer']['currently_any_emi_paying']):old('currently_any_emi_paying') }}" placeholder="Total monthly EMIs being paid" class="comma_sep_digit {{ isset(session('apiError')['currently_any_emi_paying']['0'])?'invalid':'' }}">                       
                        <span class="help-block" style="display:{{ isset(session('apiError')['currently_any_emi_paying']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['currently_any_emi_paying']['0'])?session('apiError')['currently_any_emi_paying']['0']:"" }}
                        </span>
                    </div>
                    <div class="form-box half address">
                        <input type="text" max="6" title="PIN code" name="pin_code" value="{{ isset(Session::get('user_filled_details')['employer']['employer_pin_code'])?Session::get('user_filled_details')['employer']['employer_pin_code']:old('pin_code') }}" placeholder="Company address PIN code" required="" class="pinc {{ isset(session('apiError')['pin_code']['0'])?'invalid':'' }}">                        
                        <span class="help-block" style="display:{{ isset(session('apiError')['pin_code']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['pin_code']['0'])?session('apiError')['pin_code']['0']:"" }}
                        </span>
                    </div>  
                   <p class="note"><input type="checkbox" id="terms-con" title="" name="terms-con"  required="" {{ isset(Session::get('user_filled_details')['employer'])?'checked':'' }}><label for="terms-con">I hereby confirm that all the information provided by me are true and valid. I also agree to AnyDay Money’s  terms and conditions, privacy policy and user consent form.</label></p>
                    <div class="form-action">
                        <div class="check_click" style="color:red;padding:10px;display:none;">Kindly tick and agree to the terms and conditions above</div>
                        
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
// $(document).ready(function(){
//   $(".employment-details-cover .form-action input").click(function(){
//     $(".details-step").addClass("employment-sec");
//      $(".profileimg").hide();
//      $(".checkimg").show();
//   });

//   $(".perma-tab").click(function(){
//     $(this).toggleClass("active");
//     $(".permanennt-address").toggle();

//   });
// });
$(".calender-left input").click(function(){  
    //alert("find");
    $(".select-date").css("display","none");
    $(this).parent().find(".select-date").toggle();
  });
$("select").change(function(){
    var _selThis = $(this);
    if(_selThis.hasClass('year-select') && _selThis.next(".month-select").val() != "" && _selThis.val() != "" && _selThis.val() != undefined){
        _selThis.closest(".select-date").toggle();
        
        var showText = _selThis.val()+" Years - "+_selThis.next(".month-select").val()+" Months";
        //console.log(showText);
        _selThis.closest(".select-date").parent().find("input").val(showText);
        
    }
    if(_selThis.hasClass('month-select') && _selThis.parent().find(".year-select").val() != "" && _selThis.val() != "" && _selThis.val() != undefined){
        _selThis.closest(".select-date").toggle();
        
        var showText = _selThis.parent().find(".year-select").val()+" Years - "+_selThis.val()+" Months";
        //console.log(showText);
        _selThis.closest(".select-date").parent().find("input").val(showText);
        
    }
});
 
$(document).ready(function(){
    // disable all input start
    $(".viewmode").click(function(){
        window.location.href='kyc-documents';
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
    
    var validator = ["company_name","company_type","company_email_address","net_monthly_salary","years_in_current_company","designation","job_type","pin_code"];
    //,"currently_any_emi_paying"
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
    $("#terms-con").click(function(){
        myValidation_function(validator);
        if($("#terms-con").prop("checked") != true){
            $(".check_click").css("display","block");
        }else{
           $(".check_click").css("display","none"); 
        } 
    });
    $(".employment-details-cover .form-action input").click(function(){
        $(".check_click").css("display","none");
        if($("#terms-con").prop("checked") != true){
            $(".check_click").css("display","block");
        }
        if(myValidation_function(validator)){
            $(".details-step").addClass("profile-sec");
            $(".profileimg").hide();
            $(".checkimg").show();
            $(".fill_checker").find("li:eq(2)").addClass("active");
        }   
    });
});
function myValidation_function(validator){
    $(".class-changer").removeClass("redbtn");
    $(".class-changer").addClass("white-btn");
    if(validator.length > 0){
        for(var i=0;i<validator.length;i++){
            if($("input[name='"+validator[i]+"']").val() == ""){
                return false;
                break;
            }
            if($("input[name='"+validator[i]+"']").val() == undefined && ($("select[name='"+validator[i]+"']").val() == "" || $("select[name='"+validator[i]+"']").val() == null)){
                return false;
                break;
            }
        }
        if($("#terms-con").prop("checked") == true){
            $(".class-changer").removeClass("white-btn");
            $(".class-changer").addClass("redbtn");
        }
        
        return true;
    }
}
</script>
<script>
    $(document).ready(function(){
    $(".comma_sep_digit").keyup(function(event){
      // skip for arrow keys
      if(event.which >= 37 && event.which <= 40){
          event.preventDefault();
      }
      var $this = $(this);
      var num = $this.val().replace(/,/gi, "");
      var num2 = num.split(/(?=(?:\d{3})+$)/).join(",");
      //console.log(num2);
      // the following line has been simplified. Revision history contains original.
      $this.val(num2);
  });
});
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
@endsection