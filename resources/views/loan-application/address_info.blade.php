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
      <div class="details step-details address-details-cover">
        
        <div class="header-sec">
          <h2>Loan Application</h2>
        </div>
        <!-- end of header-sec -->

        <!--<div class="details-step backstep">-->
        <!--  <h3><span><img src="{{ asset('assets/images/profille-detais.png') }}" class="profileimg" title="" alt="" /> <img src="{{ asset('assets/images/check-icon.png') }}" title="" alt="" class="checkimg" style="display:none;" /></span>Address Information</h3>-->
        <!--</div>-->
        <!-- end of details-step -->
        
         <div class="loancomple-step person-details fill_checker" style="margin-top:0;">
					<ul>
						<li class="{{ isset(Session::get('user_filled_details')['profile'])?'active':'' }}"><a href="{{ isset(Session::get('user_filled_details')['profile'])?url('personal-detail'):'#' }}">Personal Information</a></li>
						<li class="{{ isset(Session::get('user_filled_details')['address'])?'active':'' }}"><a href="{{ isset(Session::get('user_filled_details')['address'])?url('address-info'):'#' }}">Address Information</a></li>
						<li class="{{ isset(Session::get('user_filled_details')['employer'])?'active':'' }}"><a href="{{ isset(Session::get('user_filled_details')['employer'])?url('employment-info'):'#' }}">Employment Information </a></li>
					</ul>
				</div>

        <div class="deatils-form person-data">
          <div class="perma-address">
            <span class="perma-tab {{ (isset(Session::get('user_filled_details')['p_eq_c']) && Session::get('user_filled_details')['p_eq_c'] == '1')?'active':'' }}"></span>Permanent Address same as Current Address
          </div>
          
          @include('user.include.action_msg')
          <form method="post" id="login-form" class="login-form" action="{{ url('address-info-fill') }}">
              <h3 class="second-title"><span>Current Address</span></h3>
                    {{ csrf_field() }}
                    <input type="hidden" name="loan_app_no" value="{{ isset(Session::get('user_detail')['loan_app_no'])?Session::get('user_detail')['loan_app_no']:"" }}">
                    <input type="hidden" name="p_eq_c" value="{{ isset(Session::get('user_filled_details')['p_eq_c'])?Session::get('user_filled_details')['p_eq_c']: old('p_eq_c',0)  }}">
          <div class="form-box half address">
                        <input type="text" max="6" title="Current Address PIN Code" name="pin_code" class="pinc" placeholder="Current Address PIN Code" value="{{ isset(Session::get('user_filled_details')['address']['current']['pin_code'])?Session::get('user_filled_details')['address']['current']['pin_code']: old('pin_code')  }}" required="" class="{{ isset(session('apiError')['pin_code']['0'])?'invalid':'' }}">                        
                        <span class="help-block" style="display:{{ isset(session('apiError')['pin_code']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['pin_code']['0'])?session('apiError')['pin_code']['0']:"" }}
                        </span>
                    </div>  
          <div class="form-box half city-ico">
                        <input type="text" title="City of Residence" name="city_of_residence" value="{{ isset(Session::get('user_filled_details')['address']['current']['city_of_residence'])?Session::get('user_filled_details')['address']['current']['city_of_residence']:old('city_of_residence') }}" id="city_residence" placeholder="City of Residence" required="" class="{{ isset(session('apiError')['city_of_residence']['0'])?'invalid':'' }}">                        
                        <span class="help-block" style="display:{{ isset(session('apiError')['city_of_residence']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['city_of_residence']['0'])?session('apiError')['city_of_residence']['0']:"" }}
                        </span>
                    </div>
                    
                    
                       <div class="form-box full address select">                        
                       <select name="residence_type" required class="{{ isset(session('apiError')['residence_type']['0'])?'invalid':'' }}">
                          <option value="" disabled hidden selected>Residence Type</option>
                          @if(isset($data['current_residency_type']) && count($data['current_residency_type']) > 0)
                            @foreach($data['current_residency_type'] as $k=>$v)
                              <option value="{{ $v['value'] }}" {{ (isset(Session::get('user_filled_details')['address']['current']['residence_type']) && Session::get('user_filled_details')['address']['current']['residence_type'] == $v['value'])?"selected":((old('residence_type') == $v['value'])?"selected":"") }} >{{ $v['label'] }}</option>
                            @endforeach
                          @endif
                       </select>   
                       <span class="help-block" style="display:{{ isset(session('apiError')['residence_type']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['residence_type']['0'])?session('apiError')['residence_type']['0']:"" }}
                        </span>
                    </div>  
                    
                    
                    <div class="form-box full calender-left">
                        <div class="inner-field" style="margin:0 -10px">
                        <div class="form-box half calender-left">
                          
                           <input type="text" title="Years & months in current city" name="years_in_current_city_show" placeholder="Years & months in current city" required="" value="{{ isset(Session::get('user_filled_details')['address']['current']['years_in_current_city'])?explode('.',Session::get('user_filled_details')['address']['current']['years_in_current_city'])[0].' Years - '.explode('.',Session::get('user_filled_details')['address']['current']['years_in_current_city'])[1].' Months':'' }}" readonly class="{{ isset(session('apiError')['years_in_current_city']['0'])?'invalid':'' }}">
                            <span class="help-block" style="display:{{ isset(session('apiError')['years_in_current_city']['0'])?'block;':'none;' }}">
                                {{ isset(session('apiError')['years_in_current_city']['0'])?session('apiError')['years_in_current_city']['0']:"" }}
                            </span>
                           <div class="select-date">
                           	
                           	    <div class="date-header">
                           		<div class="date-drop-box">
                           			<select class="year-select" name="years_in_current_city" required>
                                      <option value="" disabled hidden selected>Years</option>
                                      @for($i=0;$i<=60;$i++)
                                        <option value="{{ $i }}" {{ (isset(Session::get('user_filled_details')['address']['current']['years_in_current_city']) && explode('.',Session::get('user_filled_details')['address']['current']['years_in_current_city'])[0] == $i)?'selected':((old('years_in_current_city') == $i)?"selected":"") }}>{{ $i." Years " }}</option>
                                      @endfor
                                      
                                    </select> 
                           			
                                    <select class="month-select" name="month_in_current_city" value="{{ old('month_in_current_city') }}" required>
                                      <option value="0">Month</option>
                                      @for($i=0;$i<=11;$i++)
                                        <option value="{{ $i }}" {{ (isset(Session::get('user_filled_details')['address']['current']['years_in_current_city']) && explode('.',Session::get('user_filled_details')['address']['current']['years_in_current_city'])[1] == $i)?'selected':((old('month_in_current_city') == $i)?"selected":"") }}>{{ $i." Months " }}</option>
                                      @endfor
                                   </select>
                           			
                           		</div>
                           	</div>
                           	
                           </div>
                       </div>
                       <div class="form-box half calender-left">
                           <input type="text" title="Years & months in current residence" name="years_in_current_residence_show" placeholder="Years & months in current residence" value="{{ isset(Session::get('user_filled_details')['address']['current']['years_in_current_residence'])?explode('.',Session::get('user_filled_details')['address']['current']['years_in_current_residence'])[0].' Years - '.explode('.',Session::get('user_filled_details')['address']['current']['years_in_current_residence'])[1].' Months':'' }}" required="" readonly class="{{ isset(session('apiError')['years_in_current_residence']['0'])?'invalid':'' }}">
                            <span class="help-block" style="display:{{ isset(session('apiError')['years_in_current_residence']['0'])?'block;':'none;' }}">
                                {{ isset(session('apiError')['years_in_current_residence']['0'])?session('apiError')['years_in_current_residence']['0']:"" }}
                            </span>
                           <div class="select-date">
                           	
                           	    <div class="date-header">
                           		<div class="date-drop-box">
                           			
                                    <select class="year-select" name="years_in_current_residence" value="{{ old('years_in_current_residence') }}" required>
                                      <option value="" disabled hidden selected>Years</option>
                                      @for($i=0;$i<=60;$i++)
                                        
                                        <option value="{{ $i }}" {{ (isset(Session::get('user_filled_details')['address']['current']['years_in_current_residence']) && explode('.',Session::get('user_filled_details')['address']['current']['years_in_current_residence'])[0] == $i)?'selected':'' }}>{{ $i." Years " }}</option>
                                      @endfor
                                   </select>
                           			
                                   <select class="month-select" name="month_in_current_residence" value="{{ old('month_in_current_residence') }}" required>
                                      <option value="0">Month</option>
                                      @for($i=0;$i<=11;$i++)
                                        
                                        <option value="{{ $i }}" {{ (isset(Session::get('user_filled_details')['address']['current']['years_in_current_residence']) && explode('.',Session::get('user_filled_details')['address']['current']['years_in_current_residence'])[1] == $i)?'selected':'' }}>{{ $i." Months " }}</option>
                                      @endfor
                                   </select> 
                           			
                           		</div>
                           	</div>
                           	
                           </div>
                          
                       </div>
                       
                       </div>
                      
                    </div>
                      

               

                    <div class="form-box half address">                        
                        <input type="text" title="Address Line 1" name="current_address_line1" value="{{ isset(Session::get('user_filled_details')['address']['current']['current_address_line1'])?Session::get('user_filled_details')['address']['current']['current_address_line1']:old('current_address_line1') }}" placeholder="Address Line 1" required="" class="{{ isset(session('apiError')['current_address.current_address_line1']['0'])?'invalid':'' }}">                       
                        <span class="help-block" style="display:{{ isset(session('apiError')['current_address.current_address_line1']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['current_address.current_address_line1']['0'])?session('apiError')['current_address.current_address_line1']['0']:"" }}
                        </span>
                    </div>

                    <div class="form-box half address">                        
                      <input type="text" title="Address Line 2" name="current_address_line2" value="{{ isset(Session::get('user_filled_details')['address']['current']['current_address_line2'])?Session::get('user_filled_details')['address']['current']['current_address_line2']:old('current_address_line2') }}" placeholder="Address Line 2" required="" class="{{ isset(session('apiError')['current_address.current_address_line2']['0'])?'invalid':'' }}">                       
                        <span class="help-block" style="display:{{ isset(session('apiError')['current_address.current_address_line2']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['current_address.current_address_line2']['0'])?session('apiError')['current_address.current_address_line2']['0']:"" }}
                        </span>
                    </div>

                    <div class="form-box half city-ico">
                        <input type="text" title="State" name="state" value="{{ isset(Session::get('user_filled_details')['address']['current']['state'])?Session::get('user_filled_details')['address']['current']['state']:old('state') }}" id="state" placeholder="State" required="" class="{{ isset(session('apiError')['state']['0'])?'invalid':'' }}">                        
                        <span class="help-block" style="display:{{ isset(session('apiError')['state']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['state']['0'])?session('apiError')['state']['0']:"" }}
                        </span>
                    </div>
                    <div class="permanennt-address" style="display:{{ (isset(Session::get('user_filled_details')['p_eq_c']) && Session::get('user_filled_details')['p_eq_c'] == '1')?'none;':'block;' }}">
                    <h3 class="second-title"><span>Permanent Address</span></h3>
                      <div class="form-box half address">                        
                        <input type="text" title="Permanent Address PIN Code" name="permanent_pin_code" value="{{ isset(Session::get('user_filled_details')['address']['permanent']['permanent_pin_code'])?Session::get('user_filled_details')['address']['permanent']['permanent_pin_code']:old('permanent_pin_code') }}" placeholder="Permanent Address PIN Code" class="pinc {{ isset(session('apiError')['permanent_pin_code']['0'])?'invalid':'' }}">                       
                          <span class="help-block" style="display:{{ isset(session('apiError')['permanent_pin_code']['0'])?'block;':'none;' }}">
                                {{ isset(session('apiError')['permanent_pin_code']['0'])?session('apiError')['permanent_pin_code']['0']:"" }}
                            </span>
                      </div>

                      <div class="form-box half city-ico">
                          <input type="text" title="City of Residence" name="permanent_city_of_residence" value="{{ isset(Session::get('user_filled_details')['address']['permanent']['permanent_city_of_residence'])?Session::get('user_filled_details')['address']['permanent']['permanent_city_of_residence']:old('permanent_city_of_residence') }}" id="city_residence_per" placeholder="City of Residence" class="{{ isset(session('apiError')['permanent_city_of_residence']['0'])?'invalid':'' }}">                        
                          <span class="help-block" style="display:{{ isset(session('apiError')['permanent_city_of_residence']['0'])?'block;':'none;' }}">
                                {{ isset(session('apiError')['permanent_city_of_residence']['0'])?session('apiError')['permanent_city_of_residence']['0']:"" }}
                            </span>
                      </div>
                      
                      
                      <div class="form-box full address select">                        
                           <select name="permanent_residence_type" value="{{ old('permanent_residence_type') }}" class="{{ isset(session('apiError')['permanent_residence_type']['0'])?'invalid':'' }}">
                              <option value="" disabled hidden selected>Residence Type</option>
                              @if(isset($data['permanent_residency_type']) && count($data['permanent_residency_type']) > 0)
                                @foreach($data['permanent_residency_type'] as $k=>$v)
                                  <option value="{{ $v['value'] }}" {{ (isset(Session::get('user_filled_details')['address']['permanent']['permanent_residence_type']) && Session::get('user_filled_details')['address']['permanent']['permanent_residence_type'] == $v['value'])?'selected':'' }}>{{ $v['label'] }}</option>
                                @endforeach
                              @endif
                           </select>   
                           <span class="help-block" style="display:{{ isset(session('apiError')['permanent_residence_type']['0'])?'block;':'none;' }}">
                                {{ isset(session('apiError')['permanent_residence_type']['0'])?session('apiError')['permanent_residence_type']['0']:"" }}
                            </span>
                        </div> 
                        <div class="form-box full calender-left">
                            <div class="inner-field" style="margin:0 -10px">
                            <div class="form-box half calender-left">
                          
                                <input type="text" title="Years & months in permanent city" name="years_in_permanent_city_show" placeholder="Years & months in permanent city" required="" value="{{ isset(Session::get('user_filled_details')['address']['permanent']['years_in_permanent_city'])?explode('.',Session::get('user_filled_details')['address']['permanent']['years_in_permanent_city'])[0].' Years - '.explode('.',Session::get('user_filled_details')['address']['permanent']['years_in_permanent_city'])[1].' Months':'' }}" readonly class="{{ isset(session('apiError')['years_in_permanent_city']['0'])?'invalid':'' }}">
                                <span class="help-block" style="display:{{ isset(session('apiError')['years_in_permanent_city']['0'])?'block;':'none;' }}">
                                    {{ isset(session('apiError')['years_in_permanent_city']['0'])?session('apiError')['years_in_permanent_city']['0']:"" }}
                                </span>
                                <div class="select-date">
                           	
                               	    <div class="date-header">
                               		<div class="date-drop-box">
                                    <select class="year-select" name="years_in_permanent_city" value="{{ old('years_in_permanent_city') }}">
                                      <option value="" disabled hidden selected>Years</option>
                                      @for($i=0;$i<=60;$i++)
                                        <option value="{{ $i }}" {{ (isset(Session::get('user_filled_details')['address']['permanent']['years_in_permanent_city']) && explode('.',Session::get('user_filled_details')['address']['permanent']['years_in_permanent_city'])[0] == $i)?'selected':'' }}>{{ $i." Years " }}</option>
                                      @endfor
                                   </select>
                               			
                                        
                                   <select class="month-select" name="month_in_permanent_city" value="{{ old('month_in_permanent_city') }}">
                                      <option value="0">Month</option>
                                      @for($i=0;$i<12;$i++)
                                        <option value="{{ $i }}" {{ (isset(Session::get('user_filled_details')['address']['permanent']['years_in_permanent_city']) && explode('.',Session::get('user_filled_details')['address']['permanent']['years_in_permanent_city'])[1] == $i)?'selected':'' }}>{{ $i." Months " }}</option>
                                      @endfor
                                   </select> 
                               			
                               		</div>
                               	</div>
                               	
                               </div>
                       </div>
                       <div class="form-box half calender-left">
                          
                                <input type="text" title="Years & months in permanent residence" name="years_in_permanent_residence_show" placeholder="Years & months in permanent residence" required="" value="{{ isset(Session::get('user_filled_details')['address']['permanent']['years_in_permanent_residence'])?explode('.',Session::get('user_filled_details')['address']['permanent']['years_in_permanent_residence'])[0].' Years - '.explode('.',Session::get('user_filled_details')['address']['permanent']['years_in_permanent_residence'])[1].' Months':'' }}" readonly class="{{ isset(session('apiError')['years_in_permanent_residence']['0'])?'invalid':'' }}">
                                <span class="help-block" style="display:{{ isset(session('apiError')['permanent_address.years_in_permanent_residence']['0'])?'block;':'none;' }}">
                                    {{ isset(session('apiError')['permanent_address.years_in_permanent_residence']['0'])?session('apiError')['permanent_address.years_in_permanent_residence']['0']:"" }}
                                </span>
                                
                                <div class="select-date">
                           	
                               	    <div class="date-header">
                               		<div class="date-drop-box">
                                    <select class="year-select" name="years_in_permanent_residence" value="{{ old('years_in_permanent_residence') }}">
                                      <option value="" disabled hidden selected>Years in Permanent Residence</option>
                                      @for($i=0;$i<=60;$i++)
                                        <option value="{{ $i }}" {{ (isset(Session::get('user_filled_details')['address']['permanent']['years_in_permanent_residence']) && explode('.',Session::get('user_filled_details')['address']['permanent']['years_in_permanent_residence'])[0] == $i)?'selected':'' }}>{{ $i." Years " }}</option>
                                      @endfor
                                   </select>
                               			
                                        
                                   <select class="month-select" name="years_in_permanent_residence" value="{{ old('years_in_permanent_residence') }}">
                                      <option value="0">Month in Permanent Residence</option>
                                      @for($i=0;$i<12;$i++)
                                        <option value="{{ $i }}" {{ (isset(Session::get('user_filled_details')['address']['permanent']['years_in_permanent_residence']) && explode('.',Session::get('user_filled_details')['address']['permanent']['years_in_permanent_residence'])[1] == $i)?'selected':'' }}>{{ $i." Months " }}</option>
                                      @endfor
                                   </select> 
                               			
                               		</div>
                               	</div>
                               	
                               </div>
                                
                                
                                
                        </div>
                       </div>  
                           
                           
                        </div>
                           
    
                      <div class="form-box half address">                        
                        <input type="text" title="Address Line 1" name="permanent_address_line1" value="{{ isset(Session::get('user_filled_details')['address']['permanent']['permanent_address_line1'])?Session::get('user_filled_details')['address']['permanent']['permanent_address_line1']:old('permanent_address_line1') }}" placeholder="Address Line 1" class="{{ isset(session('apiError')['permanent_address.permanent_address_line1']['0'])?'invalid':'' }}">                       
                       <span class="help-block" style="display:{{ isset(session('apiError')['permanent_address.permanent_address_line1']['0'])?'block;':'none;' }}">
                            {{ isset(session('apiError')['permanent_address.permanent_address_line1']['0'])?session('apiError')['permanent_address.permanent_address_line1']['0']:"" }}
                        </span>
                       </div>

                      <div class="form-box half address">                        
                        <input type="text" title="Address Line 2" name="permanent_address_line2" value="{{ isset(Session::get('user_filled_details')['address']['permanent']['permanent_address_line2'])?Session::get('user_filled_details')['address']['permanent']['permanent_address_line2']:old('permanent_address_line2') }}" placeholder="Address Line 2" class="{{ isset(session('apiError')['permanent_address.permanent_address_line2']['0'])?'invalid':'' }}">                       
                          <span class="help-block" style="display:{{ isset(session('apiError')['permanent_address.permanent_address_line2']['0'])?'block;':'none;' }}">
                                {{ isset(session('apiError')['permanent_address.permanent_address_line2']['0'])?session('apiError')['permanent_address.permanent_address_line2']['0']:"" }}
                            </span>
                      </div>
                        <div class="form-box half city-ico">
                            <input type="text" title="State" name="permanent_state" value="{{ isset(Session::get('user_filled_details')['address']['permanent']['permanent_state'])?Session::get('user_filled_details')['address']['permanent']['permanent_state']:old('permanent_state') }}" id="permanent_state" placeholder="State" class="{{ isset(session('apiError')['permanent_state']['0'])?'invalid':'' }}">                        
                            <span class="help-block" style="display:{{ isset(session('apiError')['permanent_state']['0'])?'block;':'none;' }}">
                                {{ isset(session('apiError')['permanent_state']['0'])?session('apiError')['permanent_state']['0']:"" }}
                            </span>
                        </div>
                      
                      
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
$(".pinc").change(function(){
    var _this = $(this);
    var identify = $(this).attr("name");
    var pincode = $(this).val();
    // console.log(identify+"  "+pincode);
    var passData = {pincode:pincode};
        $.ajax({
          type: "GET",
          dataType: 'JSON',
          url: "address-info-pincode",
          data:passData,
          success: function(data){
              
            if(data.status == 2){
                _this.val("");
            }else if(data.status == 0){
                _this.val("");
                _this.focus();
            }else{
            
                if(identify == "pin_code"){
                  if(data.data.state){
                    $("#state").val(data.data.state);
                    $("#city_residence").val(data.data.district);
                  }
                }else{
                  if(data.data.state){
                    $("#permanent_state").val(data.data.state);
                    $("#city_residence_per").val(data.data.district);
                  }  
                }
            }
            
          }
        });
});

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
    if(_selThis.hasClass('month-select') && _selThis.parent().find(".year-select").val() != "" && _selThis.parent().find(".year-select").val() != null && _selThis.val() != "" && _selThis.val() != undefined){
        _selThis.closest(".select-date").toggle();
        
        var showText = _selThis.parent().find(".year-select").val()+" Years - "+_selThis.val()+" Months";
        //console.log(showText);
        _selThis.closest(".select-date").parent().find("input").val(showText);
        
    }
});
  var isSubmitMode = false;
  var p_eq_c = 0;
$(document).ready(function(){
    // disable all input start
    $(".viewmode").click(function(){
        window.location.href='employment-info';
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
    var validator = ["pin_code","city_of_residence","years_in_current_city","residence_type","years_in_current_residence_show","current_address_line1","current_address_line2"];
    var temporyValidator = ["permanent_pin_code","permanent_city_of_residence","years_in_permanent_city","years_in_permanent_residence_show","permanent_residence_type","permanent_address_line1","permanent_address_line2","permanent_state"];
    $("input").change(function(){
        myValidation_function(validator,temporyValidator);
    });
    $("select").change(function(){
        myValidation_function(validator,temporyValidator);
    });
    
    if(myValidation_function(validator,temporyValidator)){
        $(".details-step").addClass("adress-sec");
        $(".profileimg").hide();
        $(".checkimg").show();
        $(".fill_checker").find("li:eq(1)").addClass("active");
    }
    $(".address-details-cover .form-action input").click(function(){
        //console.log(myValidation_function(validator,temporyValidator));
        isSubmitMode = true;
        if(myValidation_function(validator,temporyValidator)){
            $(".details-step").addClass("adress-sec");
            $(".profileimg").hide();
            $(".checkimg").show();
            if(!$(".form-action").find("input").hasClass("viewmode")){
                $('form#login-form').submit();
            }
        }else{
           return false; 
        }   
        
    });
    $(".perma-tab").click(function(){
        
        $(this).toggleClass("active");
        myValidation_function(validator,temporyValidator);
        $(".permanennt-address").toggle();
        if($(".perma-tab").hasClass("active")){
            p_eq_c = 1;
            $("input[name='p_eq_c']").val(p_eq_c);
        }else{
            p_eq_c = 0;
            $("input[name='p_eq_c']").val(p_eq_c);   
        }
    });
    
});
function myValidation_function(validator,temporyValidator){
    $(".class-changer").removeClass("redbtn");
    $(".class-changer").addClass("white-btn");
    if(validator.length > 0){
        for(var i=0;i<validator.length;i++){
            if($("input[name='"+validator[i]+"']").val() == ""){
                // console.log("First "+validator[i]);
                return false;
                break;
            }
            // if(isSubmitMode && $("input[name='current_address_line1']").val().length <= 10){
            //     isSubmitMode = false;
            //     $("input[name='current_address_line1']").addClass("invalid");
            //   $("input[name='current_address_line1']").parent().find(".help-block").html("Minimum 10 characters required"); 
            //   $("input[name='current_address_line1']").parent().find(".help-block").css("display","block"); 
            //     return false;
            // }else{
            //     $("input[name='current_address_line1']").removeClass("invalid");
            //     $("input[name='current_address_line1']").parent().find(".help-block").css("display","none"); 
            // }
            if($("input[name='"+validator[i]+"']").val() == undefined && ($("select[name='"+validator[i]+"']").val() == "" || $("select[name='"+validator[i]+"']").val() == null)){
                // console.log("second "+validator[i]);
                return false;
                break;
            }
        }
        // return true;
    }
    var act = $('.perma-tab').hasClass("active");
    //console.log(act);
    if(act){
        // console.log("same both address");
        $(".class-changer").removeClass("white-btn");
        $(".class-changer").addClass("redbtn");
        return true;
    }else{
        $(".class-changer").removeClass("redbtn");
        $(".class-changer").addClass("white-btn");
        //console.log("diffrent address");
        if(temporyValidator.length > 0){
            for(var i=0;i<temporyValidator.length;i++){
                if($("input[name='"+temporyValidator[i]+"']").val() == ""){
                    return false;
                }
                // if(isSubmitMode && $("input[name='permanent_address_line1']").val().length <= 10){
                //     isSubmitMode = false;
                //     $("input[name='permanent_address_line1']").addClass("invalid");
                //   $("input[name='permanent_address_line1']").parent().find(".help-block").html("Minimum 10 characters required"); 
                //   $("input[name='permanent_address_line1']").parent().find(".help-block").css("display","block"); 
                //     return false;
                // }else{
                //     $("input[name='permanent_address_line1']").removeClass("invalid");
                //     $("input[name='permanent_address_line1']").parent().find(".help-block").css("display","none"); 
                // }
                if($("input[name='"+temporyValidator[i]+"']").val() == undefined && ($("select[name='"+temporyValidator[i]+"']").val() == "" || $("select[name='"+temporyValidator[i]+"']").val() == null)){
                    return false;
                }
            }
        }
    }
    $(".class-changer").removeClass("white-btn");
    $(".class-changer").addClass("redbtn");
    return true;
    
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

<script>
    $(document).ready(function(){
  $("form").change(validate);
  validate();
  $('.form-action input').click(validate);
  
 function validate() {
    if ($("#form1").parsley({excluded:":hidden"}).isValid()) {
      $('.form-action input').prop('disabled',false);
    }
    else {
      $('.form-action input').prop('disabled',true);
    }
  }
})
</script>


@endsection