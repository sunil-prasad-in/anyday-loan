@extends('user.include.app')
@section('content')


<div class="login-wrapper otp-varification">
  <div class="right">
    <div class="inner-sec">
      <div class="details step-details employment-details-cover">
        <div class="header-sec">
          <h2>Bank Account Details</h2>
        </div>
        <div class="loancomple-step">

          <ul>
              <li class="active"><a href="{{ url('employment-info') }}">Loan<br/>Application</a></li>
              @if(isset($data_check['loan_status']['next_status']['loan_status']) && ($data_check['loan_status']['next_status']['loan_status'] == "bank_details" || $data_check['loan_status']['next_status']['loan_status'] == "sanction_letter" || $data_check['loan_status']['next_status']['loan_status'] == "e_agreement" || $data_check['loan_status']['next_status']['loan_status'] == "e_nach" || $data_check['loan_status']['next_status']['loan_status'] == "disbursed" || $data_check['loan_status']['next_status']['loan_status'] == "awaiting_approval"))
            
                <li class="active"><a href="{{ url('kyc-documents') }}">KYC<br/>Documents</a></li>
             @else
                <li><a href="#">KYC<br/>Documents</a></li>
             @endif
             @if(isset($data_check['loan_status']['next_status']['loan_status']) && ($data_check['loan_status']['next_status']['loan_status'] == "e_nach" || $data_check['loan_status']['next_status']['loan_status'] == "disbursed"))
            
                <li class="active"><a href="{{ url('dashboard/') }}">Sign<br/>Agreement</a></li>
             @else
                <li><a href="#">Sign<br/>Agreement</a></li>
             @endif
            @if(isset($data_check['loan_status']['next_status']['loan_status']) && ($data_check['loan_status']['next_status']['loan_status'] == "disbursed"))
            
                <li class="active"><a href="{{ url('dashboard/') }}">Register<br/>Auto Debit</a></li>
             @else
                <li><a href="#">Register<br/>Auto Debit</a></li>
             @endif
            
          </ul>
          
        </div>
        <!-- end of header-sec -->

        <div class="deatils-form">
          @include('user.include.action_msg')
          <form method="post" id="login-form" class="login-form" action="{{ url('bank-details-fill') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="loan_app_no" id="loan_app_no" value="{{ isset(Session::get('user_detail')['loan_app_no'])?Session::get('user_detail')['loan_app_no']:"" }}">
          <div class="form-box half bank">
                        <input type="text" title="Bank account number*" name="bank_account_number" placeholder="Bank account number*" value="{{ isset(Session::get('user_filled_details')['bank']['bank_account_number'])?Session::get('user_filled_details')['bank']['bank_account_number']:old('bank_account_number') }}" required="" class="form-control required {{ isset(session('apiError')['bank_account_number']['0'])?'invalid':'' }}">                        
                        <span class="help-block" style="display:{{ isset(session('apiError')['bank_account_number']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['bank_account_number']['0'])?session('apiError')['bank_account_number']['0']:"" }}
                        </span>
                    </div>  
                    <div class="form-box half bank">                        
                       <input type="password" title="Confirm bank account number*" name="confirm_bank_account_number" placeholder="Confirm bank account number*" value="{{ isset(Session::get('user_filled_details')['bank']['bank_account_number'])?Session::get('user_filled_details')['bank']['bank_account_number']:old('confirm_bank_account_number') }}"  required="">  
                       <span class="help-block cbank" style="display:none;">
                        </span>
                    </div> 
                    <div class="form-box half bank">
                        <input type="text" title="Bank IFSC code*" class="ifscode" id="ifsc" name="ifsc" placeholder="Bank IFSC code*" value="{{ isset(Session::get('user_filled_details')['bank']['ifsc'])?Session::get('user_filled_details')['bank']['ifsc']:old('ifsc') }}"  required="" class="{{ isset(session('apiError')['ifsc']['0'])?'invalid':'' }}">                         
                        <span class="help-block" style="display:{{ isset(session('apiError')['ifsc']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['ifsc']['0'])?session('apiError')['ifsc']['0']:"" }}
                        </span>
                    </div>
                      

                    <div class="form-box half bank">                        
                       <input type="text" title="Bank name*" name="bank_name" id="bank_name" placeholder="Bank name*" value="{{ isset(Session::get('user_filled_details')['bank']['bank_name'])?Session::get('user_filled_details')['bank']['bank_name']:old('bank_name') }}"  required="" class="{{ isset(session('apiError')['bank_name']['0'])?'invalid':'' }}">                     
                        <span class="help-block" style="display:{{ isset(session('apiError')['bank_name']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['bank_name']['0'])?session('apiError')['bank_name']['0']:"" }}
                        </span>
                    </div>   

                    <div class="form-box half bank">                        
                        <input type="text" title="Bank branch" name="branch" id="branch" placeholder="Bank branch" value="{{ isset(Session::get('user_filled_details')['bank']['branch'])?Session::get('user_filled_details')['bank']['branch']:old('branch') }}" required="" class="{{ isset(session('apiError')['branch']['0'])?'invalid':'' }}">                       
                        <span class="help-block" style="display:{{ isset(session('apiError')['branch']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['branch']['0'])?session('apiError')['branch']['0']:"" }}
                        </span>
                    </div>

                    <div class="form-box half bank">                        
                      <!--<input type="text" title="Reason for availing loan*" name="reason" placeholder="Reason for availing loan*" value="{{ isset(Session::get('user_filled_details')['bank']['reason'])?Session::get('user_filled_details')['bank']['reason']:old('reason') }}" required="" class="{{ isset(session('apiError')['reason']['0'])?'invalid':'' }}">-->
                      <select name="reason" required="" class="{{ isset(session('apiError')['reason']['0'])?'invalid':'' }}">
                          <option value="" disabled hidden selected>Reason for availing loan</option>
                          @if(isset($data['loan_purpose']) && count($data['loan_purpose']) > 0)
                            @foreach($data['loan_purpose'] as $k=>$v)
                              <option value="{{ $v['value'] }}" {{ (isset(Session::get('user_filled_details')['bank']['reason']) && Session::get('user_filled_details')['bank']['reason'] == $v['value'])?"selected":((old('reason') == $v['value'])?"selected":"") }} >{{ $v['label'] }}</option>
                            @endforeach
                          @endif
                       </select> 
                        <span class="help-block" style="display:{{ isset(session('apiError')['reason']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['reason']['0'])?session('apiError')['reason']['0']:"" }}
                        </span>
                    </div>
                    <div class="form-box half address select">                        
                       <select name="account_type" required="" class="{{ isset(session('apiError')['account_type']['0'])?'invalid':'' }}">
                          <option value="" disabled hidden selected>Account type</option>
                          @if(isset($data['account_type']) && count($data['account_type']) > 0)
                            @foreach($data['account_type'] as $k=>$v)
                              <option value="{{ $v['value'] }}" {{ (isset(Session::get('user_filled_details')['bank']['account_type']) && Session::get('user_filled_details')['bank']['account_type'] == $v['value'])?"selected":((old('account_type') == $v['value'])?"selected":"") }} >{{ $v['label'] }}</option>
                            @endforeach
                          @endif
                       </select>  
                       <span class="help-block" style="display:{{ isset(session('apiError')['account_type']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['account_type']['0'])?session('apiError')['account_type']['0']:"" }}
                        </span>
                    </div> 
                    
                    <p class="note"><input type="checkbox" id="terms-con" title="" name="terms-con" required=""{{ isset(Session::get('user_filled_details')['bank'])?'checked':'' }}><label for="terms-con">I hereby authorize AnyDay Money to link my bank account for further loan purposes as per
terms and conditions.</label></p>
                    

                    <div class="form-action">
                        <div class="check_click" style="color:red;padding:10px;display:none;">Kindly tick and agree to the terms and conditions above</div>
                        
                        @if(isset(Session::get('user_filled_details')['bank']) )
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
$('form').bind("cut copy paste drop",function(e) {
  e.preventDefault();
});
$(".ifscode").change(function(){
    var _this = $(this);
    var ifsc = $(this).val();
    var loan_app_no = $("#loan_app_no").val();
    // console.log(loan_app_no+"  "+ifsc);
    var passData = {ifsc:ifsc,loan_app_no:loan_app_no};
        $.ajax({
          type: "GET",
          dataType: 'JSON',
          url: "bank-info-ifsc",
          data:passData,
          success: function(data){
              
            if(data.status == 2){
                _this.val("");
            }else if(data.status == 0){
                _this.val("");
                _this.focus();
            }else{
                $("#bank_name").val(data.data.bank);
                $("#branch").val(data.data.branch);
            }
            
          }
        });
});
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
$(document).ready(function(){
    // disable all input start
    $(".viewmode").click(function(){
        window.location.href='dashboard';
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
    
    var validator = ["bank_account_number","ifsc","bank_name","branch","reason","account_type","terms-con"];
    $("input").change(function(){
        myValidation_function(validator);
    });
    $("select").change(function(){
        myValidation_function(validator);
    });
    $("#terms-con").click(function(){
        if($("#terms-con").prop("checked") != true){
            $(".class-changer").removeClass("redbtn");
            $(".class-changer").addClass("white-btn");
            $(".check_click").css("display","block");
        }else{
            $(".check_click").css("display","none"); 
        } 
    });
    $(".employment-details-cover .form-action input").click(function(e){
        $(".check_click").css("display","none");
        if($("#terms-con").prop("checked") != true){
            $(".check_click").css("display","block");
        }
        if(myValidation_function(validator)){
            $(".details-step").addClass("profile-sec");
            $(".profileimg").hide();
            $(".checkimg").show();
        }else{
            e.preventDefault();
        }   
    });
});
function myValidation_function(validator){
    $(".cbank").html("");
    $(".cbank").css("display","none");
    $(".help-block").html("");
    $(".help-block").css("display","none");
    
    $(".class-changer").removeClass("redbtn");
    $(".class-changer").addClass("white-btn");
    $("input[name='confirm_bank_account_number']").removeClass("invalid");
    if($("input[name='confirm_bank_account_number']").val() != $("input[name='bank_account_number']").val()){
        $("input[name='confirm_bank_account_number']").addClass("invalid");
        $(".cbank").html("Confirm bank account no must be same as above");
        $(".cbank").css("display","block");
        return false;
    }
    else if(validator.length > 0){
        for(var i=0;i<validator.length;i++){
            if($("input[name='"+validator[i]+"']").val() == ""){
                // $("input[name='"+validator[i]+"']").parent().find(".help-block").html("This field is required");
                // $("input[name='"+validator[i]+"']").parent().find(".help-block").css("display","block");
                return false;
                break;
            }
            if($("#terms-con").prop("checked") != true){
                return false;
                break;
            }
            if($("input[name='"+validator[i]+"']").val() == undefined && ($("select[name='"+validator[i]+"']").val() == "" || $("select[name='"+validator[i]+"']").val() == null)){
                // $("select[name='"+validator[i]+"']").parent().find(".help-block").html("This field is required");
                // $("select[name='"+validator[i]+"']").parent().find(".help-block").css("display","block");
                return false;
                break;
            }
        }
        $(".class-changer").removeClass("white-btn");
        $(".class-changer").addClass("redbtn");
        return true;
    }
}
</script>

<script>
// $(document).ready(function() {
//    var rightheight = $(".right").height();
// $(".left").height(rightheight + 15);
//  $(".attach-files").click(function(){
//  var rightheight = $(".right").height();   
// $(".left").height(rightheight + 15);
//  });
// });
// $(window).resize(function() {
// var rightheight = $(".right").height();
// $(".left").height(rightheight + 15);
// });

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