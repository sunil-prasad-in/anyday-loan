@extends('user.include.app')
@section('content')

	
<!-- end of admin-wrapper -->
<div class="login-wrapper topup-loan-sec">
	<div class="right" style="background:#fff">
		<div class="inner-sec">
			<div class="details ">
				<div class="header-sec">
					@if(session()->has('loan_type') && Session::get('loan_type') == "PL")
						<h2>Personal Loan</h2>
					@elseif(session()->has('loan_type') && Session::get('loan_type') == "BL")
					    <h2>Business Loan</h2>
					@elseif(session()->has('loan_type') && Session::get('loan_type') == "ML")
					    <h2>Medical Loan</h2>
					@elseif(session()->has('loan_type') && Session::get('loan_type') == "EL")
					    <h2>Education Loan</h2>
					@endif  
				</div>
				
				<div class="data-content">
			<div class="inner-sec">
				<!-- <div class="loan-calcu-top">
					<a href="#" title="My loan">My Loan</a>
					<a href="#" class="active" title="To-up Loan">To-up Loan</a>
				</div> -->
				<!-- end of main-content -->
				
                <input type="hidden" id="session_amt" name="session_amt" value="{{ isset(Session::get('user_loan_details')['amount'])?Session::get('user_loan_details')['amount']:'' }}">
                <input type="hidden" id="session_roi" name="session_roi" value="{{ isset(Session::get('user_loan_details')['roi'])?Session::get('user_loan_details')['roi']:'' }}">
                <input type="hidden" id="session_tenure" name="session_tenure" value="{{ isset(Session::get('user_loan_details')['tenure'])?Session::get('user_loan_details')['tenure']:'' }}">
				<h2 class="loan-title">How much do you need?</h2>

				<div class="calculater-admin">
					<div class="inner-sec">
						<div class="range-box">
				<div class="slidecontainer">
					<p>Loan Amount (Lakhs)
					<input type="text" id="input-with-keypress-1">
					<input type="text" id="input-with-keypress-0">	
					 </p>	
	  				<div id="amount-slider"></div>
	  				<div class="slidertext">
	  				</div>			
				</div>
				<!-- end of slidecontainer -->				

				<div class="slidecontainer">
					<p>Tenure (Months)
					<input type="text" id="tenureinput-1">
					<input type="text" id="tenureinput-2">	
					</p>
					 	
	  				<div id="period-slider"></div>
	  				<div class="slidertext">
	  				</div>			
				</div>
				<!-- end of slidecontainer -->

				<div class="slidecontainer">
					<p>Interest (Annum)
					<input type="text" id="rateinput-1">
					<input type="text" id="rateinput-2"> 
						</p>	
	  				<div id="rate-slider"></div>
	  				<div class="slidertext">
	  				</div>			
				</div>
				<!-- end of slidecontainer -->
				</div>
							</div>
			<!-- end of left-side -->
			
					</div>
					<!-- end of calculater-admin -->
                <div class="emi-cover-sec">
    				<div class="right-sec emi-right">
    					<div class="right-inner">
    						<div class="emi-sec monthly-emi">
    							<h4 class="monthly_emi">₹6,666</h4>
    							<span>Loan EMI</span>
    						</div>
    						<div class="total-sec">
    							<div class="interest-rate">
    								<h4  class="interest_amt">20,208</h4>
    								<span>Total Interest</span>
    							</div>
    							<div class="total-amount">
    								<h4 class="total_amt">₹1,00,208</h4>
    								<span>Total Payment</span>
    							</div>
    						</div>
    					
    						<a href="#" class="emi-btn" id="emi-btn">Apply Now</a>
    						
    							<p class="finalnotes"><span><img src="{{ asset('assets/images/ic_note.png') }}" title="" alt="" /></span>Final EMI amount may vary depending on the loan criteria and credit assessment </p>
    					</div>
    					<!-- end of right-inner -->
    				</div>
    				<!-- end of right-sec -->
				</div>
				<!-- end of emi-cover -->

				<div class="final-amount">
					<div class="final-inner">
						
						<ul class="final-amul">
							<li class="howworks"><a href="#"><span><img src="{{ asset('assets/images/howwork-icon.png') }}" alt="" title="" /></span>How it works?</a></li>
							<li class="benifits-li"><a href="#"><span><img src="{{ asset('assets/images/benits-icon.png') }}" alt="" title="" /></span>Benefits</a></li>
							<li class="eligi-cri"><a href="#"><span><img src="{{ asset('assets/images/eligi-icon.png') }}" alt="" title="" /></span>Eligibility Criteria</a></li>
							<li class="docu-req"><a href="#"><span><img src="{{ asset('assets/images/requ-doc-icon.png') }}" alt="" title="" /></span>Documents Required</a></li>
						</ul>

						<div class="adhaar-bg"></div>	
						<div class="howwork-pop final-list">
							<div class="innerpop">
								<h2>Features and benefits</h2>
								<ul>
									<li><a href="#"><span><img src="{{ asset('assets/images/quick-app-appli.png') }}" alt="" title="" /></span>Quick Approvals</a></li>
									<li><a href="#"><span><img src="{{ asset('assets/images/no-force-closure.png') }}" alt="" title="" /></span> No Fore-Closure Charges</a></li>
									<li><a href="#"><span><img src="{{ asset('assets/images/easy-digi-loan.png') }}" alt="" title="" /></span> Easy Digital Loan Application</a></li>
									<li><a href="#"><span><img src="{{ asset('assets/images/instant-dis.png') }}" alt="" title="" /></span> Instant Disbursal</a></li>
									<li><a href="#"><span><img src="{{ asset('assets/images/flexible-tuner.png') }}" alt="" title="" /></span> Flexible Tenure</a></li>
									<li><a href="#"> <span><img src="{{ asset('assets/images/no-prepaymnet.png') }}" alt="" title="" /></span> No Pre-Payment Charges</a></li>
								</ul>

								<span class="closepop">X</span>
							</div>
						</div>
						<!-- end of howwork-pop -->


							
						<div class="eligi-cri-pop final-list">
							<div class="innerpop">
								<h2>Eligibility Criteria </h2>
								<ul>
									<li>Eligible <span>Salaried individuals	</span></li>
									<li>Minimum Age <span>21 Years and above	</span></li>
									<li>Loan Amount <span>₹5,000 onwards</span></li>
									
								</ul>

								<span class="closepop">X</span>
							</div>
						</div>
						<!-- end of eligi-cri-pop -->


						
						<div class="howworks-pop-con final-list">
							<div class="innerpop">
								<h2>How it works?</h2>
								<ul>
									<li><span><img src="{{ asset('assets/images/quick-app.png') }}" alt="" title="" /></span>Quick Application<span class="discri">Enter basic details to<br/> build your profile</span></li>

									<li><span><img src="{{ asset('assets/images/pre-approved.png') }}" alt="" title="" /></span>Pre-approved Eligibility<span class="discri">Your eligibility will be<br/> calculated on the basis<br/> of your profile details	</span></li>

									<li><span><img src="{{ asset('assets/images/easy-process.png') }}" alt="" title="" /></span>Submit Documents<span class="discri">Upload your necessary<br/> documents digitally<br/> for quick credit approval</span></li>

									<li><span><img src="{{ asset('assets/images/disbursment-img.png') }}" alt="" title="" /></span>Disbursement<span class="discri">Approved loan amount<br/> credited to your<br/> bank account</span></li>	
								</ul>

								<span class="closepop">X</span>
							</div>
						</div>
						<!-- end of howwork-pop-con -->
						
						
						
						<div class="document-required final-list">
							<div class="innerpop">
								<h2>Documents Required</h2>
								<ul>
									<li><span><img src="https://webdemoservice.online/anyday/assets/images/pancard.png" alt="" title=""></span>ID Proof<span class="discri">Pan Card (mandatory)</span></li>

									<li><span><img src="https://webdemoservice.online/anyday/assets/images/address-icon.png" alt="" title=""></span>Address proof <br/>Permanent Address (any one)<span class="discri">Aadhar card, Passport, Driving License	</span></li>

									<li>Current Address (any one)<br/> <a style="text-decoration:underline;margin-bottom: 5px;display: block;" href="#"><i>If permanent address differs from current address</i></a>
									<span class="discri">Latest Gas Bill (within 2 months)<br/>
Latest Electricity Bill, Registered<br/>
Agreement, (valid for next 6 months)<br/>
Bank Passbook front copy, Latest Bank<br/>
Statement (within 2 months)
</span></li>

									<li><span><img src="https://webdemoservice.online/anyday/assets/images/bank-statement.png" alt="" title=""></span>Income Proof<span class="discri">Last 6 months Salary<br/>
                                        Account Bank Statement
                                        
                                    </span>
                                    </li>
                                    
                                    <li><span><img src="https://webdemoservice.online/anyday/assets/images/selfie.png" alt="" title=""></span>Selfie
                                        
                                    
                                    </li>	
								</ul>

								<span class="closepop">X</span>
							</div>
						</div>
						<!-- end of howwork-pop-con -->
						
					</div>
				</div>
				<!-- end of final-amount -->
						</div>


			</div>
			<!-- end of inner-sec -->
	</div>
	<!-- end of main-content -->
				

			</div>
			<!-- end of verification-cover -->			
		</div>

	<div class="left"  style="background: url({{ asset('assets/images/application-img.jpg') }}) 0% 0% / cover;
    background-position: 11px 30px;
    background-size: 125%;
    background-repeat: no-repeat;
    background-color: #1fa4b1;">
		<div class="inner-sec">
		
		
		</div>
	</div>
	
</div>

<!-- end of login-wrapper -->
@endsection
@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script> 
$("#emi-btn").click(function(){
    
    var loan_amount = $("#input-with-keypress-0").val();
    var loan_period = $("#tenureinput-2").val();
    var loan_rate = $("#rateinput-2").val();
    
    //console.log(loan_amount+"  "+loan_period+"  "+loan_rate);
    var passData = {loan_amount:loan_amount,loan_period:loan_period,loan_rate:loan_rate};
        $.ajax({
          type: "GET",
          url: "loan-calculation-fill",
          data:passData,
          success: function(data){
              window.location.href='personal-detail';
          }
        });
});
</script>
<script>
$(document).ready(function(){
  $(".employment-details-cover .form-action input").click(function(){
    $(".details-step").addClass("employment-sec");
     $(".profileimg").hide();
     $(".checkimg").show();
  });

   $(".perma-tab").click(function(){
    $(this).toggleClass("active");
    $(".permanennt-address").toggle();

  });


  /*how work js*/ 
  $(".benifits-li a").click(function(){
    $('.adhaar-bg').fadeIn();
    $('.howwork-pop').fadeIn();
  });

  $(".eligi-cri a").click(function(){
    $('.eligi-cri-pop').fadeIn();
    $('.adhaar-bg').fadeIn();
    
  });

  $(".howworks a").click(function(){
    $('.howworks-pop-con').fadeIn();
    $('.adhaar-bg').fadeIn();
    
  });
  
  
  $(".docu-req a").click(function(){
    $('.document-required').fadeIn();
    $('.adhaar-bg').fadeIn();
    
  });

  $(".closepop, .adhaar-bg").click(function(){
    $('.adhaar-bg').fadeOut();
    $('.howwork-pop').fadeOut();
    $('.eligi-cri-pop').fadeOut();
    $('.howworks-pop-con').fadeOut();
    $('.document-required').fadeOut();
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
<script src="{{ asset('assets/js/nouislider.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/wNumb.min.js') }}" type="text/javascript"></script>
<script>

var slider = document.getElementById('amount-slider');
var amt_session = ($('#session_amt').val() != "")?$('#session_amt').val():600000;
var amountInput0 = document.getElementById('input-with-keypress-0');
var amountInput1 = document.getElementById('input-with-keypress-1');
var inputs = [amountInput0, amountInput1];

noUiSlider.create(slider, {
    start: amt_session,
      	step:5000, 
      	connect: [false, true],
	         
      	pips: {
          	mode: 'values',
          	values: [5000,1000000],
          	density: 12
      	},

      	format: wNumb({
          	decimals:0,
          	thousand: ',',
          	prefix: '₹',
      	}),
      	range: {
          	'min': 5000,
          	'max': 1000000
      	},
});

slider.noUiSlider.on('update', function (values, handle) {
    inputs[handle].value = values[handle];
    emiCalculator();
});


// Listen to keydown events on the input field.
inputs.forEach(function (input, handle) {

    input.addEventListener('change', function () {
        slider.noUiSlider.setHandle(handle, this.value);
    });

    input.addEventListener('keydown', function (e) {

        var values = slider.noUiSlider.get();
        var value = Number(values[handle]);

        // [[handle0_down, handle0_up], [handle1_down, handle1_up]]
        var steps = slider.noUiSlider.steps();

        // [down, up]
        var step = steps[handle];

        var position;

        // 13 is enter,
        // 38 is key up,
        // 40 is key down.
        switch (e.which) {

            case 13:
                slider.noUiSlider.setHandle(handle, this.value);
                break;

            case 38:

                // Get step to go increase slider value (up)
                position = step[1];

                // false = no step is set
                if (position === false) {
                    position = 1;
                }

                // null = edge of slider
                if (position !== null) {
                    slider.noUiSlider.setHandle(handle, value + position);
                }

                break;

            case 40:

                position = step[0];

                if (position === false) {
                    position = 1;
                }

                if (position !== null) {
                    slider.noUiSlider.setHandle(handle, value - position);
                }

                break;
        }
    });
});


var slider1 = document.getElementById('rate-slider');
var roi_session = ($('#session_roi').val() != "")?$('#session_roi').val():18;
var rateinput1 = document.getElementById('rateinput-1');
var rateinput2 = document.getElementById('rateinput-2');
var inputs1 = [ rateinput2,rateinput1];

noUiSlider.create(slider1, {
	    step:1, 
	     start: [roi_session],
	    connect: [false, true],
	       
	    pips: {
	       mode: 'values',
	        values: [12,36],
	        density:20
	    },
	    range: {
	        'min': 12,
	        'max': 36
	    },	

	    format: wNumb({
	        decimals:0,
	        thousand: ',',
	        suffix: '%',
	    }),

    });

slider1.noUiSlider.on('update', function (values, handle) {
    inputs1[handle].value = values[handle];
    emiCalculator();
});


// Listen to keydown events on the input field.
inputs1.forEach(function (input, handle) {

    input.addEventListener('change', function () {
        slider1.noUiSlider.setHandle(handle, this.value);
    });

    input.addEventListener('keydown', function (e) {

        var values = slider1.noUiSlider.get();
        var value = Number(values[handle]);

        // [[handle0_down, handle0_up], [handle1_down, handle1_up]]
        var steps = slider1.noUiSlider.steps();

        // [down, up]
        var step = steps[handle];

        var position;

        // 13 is enter,
        // 38 is key up,
        // 40 is key down.
        switch (e.which) {

            case 13:
                slider1.noUiSlider.setHandle(handle, this.value);
                break;

            case 38:

                // Get step to go increase slider value (up)
                position = step[1];

                // false = no step is set
                if (position === false) {
                    position = 1;
                }

                // null = edge of slider
                if (position !== null) {
                    slider1.noUiSlider.setHandle(handle, value + position);
                }

                break;

            case 40:

                position = step[0];

                if (position === false) {
                    position = 1;
                }

                if (position !== null) {
                    slider1.noUiSlider.setHandle(handle, value - position);
                }

                break;
        }
    });
});


 var slider2 = document.getElementById('period-slider');
var tenure_session = ($('#session_tenure').val() != "")?$('#session_tenure').val():4;
var tenureinput1 = document.getElementById('tenureinput-1');
var tenureinput2 = document.getElementById('tenureinput-2');
var inputs2	 = [tenureinput2 , tenureinput1];

noUiSlider.create(slider2, {
	    step:1, 
	     start: [tenure_session],
	    connect: [false, true],
	       
	    pips: {
	         mode: 'values',
	        values: [1,48],
	        density:20
	    },
	    range: {
	        'min': 1,
	        'max': 48
	    },

	    format: wNumb({
	        decimals:0,
	        thousand: ',',
	        suffix: '',
	    }),

    });

slider2.noUiSlider.on('update', function (values, handle) {
    inputs2[handle].value = values[handle];
    emiCalculator();
});


// Listen to keydown events on the input field.
inputs2.forEach(function (input, handle) {

    input.addEventListener('change', function () {
        slider2.noUiSlider.setHandle(handle, this.value);
    });

    input.addEventListener('keydown', function (e) {

        var values = slider2.noUiSlider.get();
        var value = Number(values[handle]);

        // [[handle0_down, handle0_up], [handle1_down, handle1_up]]
        var steps = slider2.noUiSlider.steps();

        // [down, up]
        var step = steps[handle];

        var position;

        // 13 is enter,
        // 38 is key up,
        // 40 is key down.
        switch (e.which) {

            case 13:
                slider2.noUiSlider.setHandle(handle, this.value);
                break;

            case 38:

                // Get step to go increase slider value (up)
                position = step[1];

                // false = no step is set
                if (position === false) {
                    position = 1;
                }

                // null = edge of slider
                if (position !== null) {
                    slider2.noUiSlider.setHandle(handle, value + position);
                }

                break;

            case 40:

                position = step[0];

                if (position === false) {
                    position = 1;
                }

                if (position !== null) {
                    slider2.noUiSlider.setHandle(handle, value - position);
                }

                break;
        }
    });
});

    function emiCalculator()
    {
        var p = jQuery('#input-with-keypress-0').val().split('₹')[1];
        var pAmount = p.split(',');
        var loanAmount = "";
        if(pAmount.length > 0){
            for(var k=0;k<pAmount.length;k++){
                loanAmount += pAmount[k];
            }
        }
        loanAmount = parseFloat(loanAmount);
        var numberOfMonths = jQuery('#tenureinput-2').val();
        var rateOfInterest = parseFloat(jQuery('#rateinput-2').val());
        var monthlyInterestRatio = (rateOfInterest/12/100); 
        var top = Math.pow((1+monthlyInterestRatio),numberOfMonths);
        
        // new calculation reference https://emicalculator.net/
        //E = p*r*((1-r)^n/(1-r)^n-1)
        // EMI = ₹10,00,000 * 0.00875 * (1 + 0.00875)120 / ((1 + 0.00875)120 - 1
        //console.log(loanAmount);
        var emi = parseFloat(loanAmount)*monthlyInterestRatio*(top/(top-1));
        var full = numberOfMonths * emi;
        var interest = full - loanAmount;
        var total_payable = parseFloat(loanAmount)+parseFloat(interest);
        $('.monthly_emi').html(emi.toLocaleString('en-US', {maximumFractionDigits:0}));
        $('.interest_amt').html(interest.toLocaleString('en-US', {maximumFractionDigits:0}));
        $('.total_amt').html(total_payable.toLocaleString('en-US', {maximumFractionDigits:0}));
    }	
</script>
@endsection