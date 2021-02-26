@extends('user.include.app')
@section('content')

<div class="innerpage-banner otherpage text-center">
	<img src="{{ asset('assets/images/education-loan.png') }}" class="img-fluid" title="" alt="" />
	<div class="site-container">
		<div class="breadcumbs-sec loan-sec">
			<h4><span>Education Loans</span><br>
Enabling higher education<br>
to meet your life goals</h4><br>
			<a href="#" class="redbtn ragister">Apply Now</a>
		</div>
		<!-- end of breadcumbs-sec -->
	</div>
</div>
<!-- end of innerpage-banner -->

<section class="other-sec">
	<div class="site-container flex-none page-descrip">
		<h2>Education Loan</h2>
		<p>We all have dreams of higher education for ourselves or our family members which often face hurdles because of financial constraints.</p>
<p>
Now let that dream grow wings to fly towards a better future. Do not let these financial constraints become a barrier to meeting your or your child’s career aspirations. </p>
<p>
Be it tuition fees or the living cost outside home, AnyDay Money Loans for Education helps you meet your short-term education related financial needs, thereby paying the way towards a better and confident future.</p>


	</div>
</section>

<section class="loan-application">
<h2 class="text-center second-title"><span><strong>AnyDay Education Loan </strong> - Features and benefits</span></h2>
	
	<div class="site-container flex-none">
		<div class="applica-box easy-getloan">
			<div class="appli-inner">
				<div class="appli-img">
				</div>
				<!-- end of appli-img -->
				<div class="appli-text">
					<h2>Easy Digital Loan Application</h2>
					<p>Apply online through either Mobile Application or our<br>
					Website within minutes </p>
				</div>	
				<!-- end of appli-img -->			
			</div>
			<!-- end of appli-inner -->
		</div>
		<!-- end of applica-box -->

		<div class="applica-box instant-disbursal">
			<div class="appli-inner">
				<div class="appli-img">
				</div>
				<!-- end of appli-img -->
				<div class="appli-text">
					<h2>Instant Disbursal </h2>
					<p>Instant Disbursal to your bank account post approval </p>
				</div>	
				<!-- end of appli-img -->			
			</div>
			<!-- end of appli-inner -->
		</div>
		<!-- end of applica-box -->

		<div class="applica-box flexible-tenure">
			<div class="appli-inner">
				<div class="appli-img">
				</div>
				<!-- end of appli-img -->
				<div class="appli-text">
					<h2>Flexible Tenure</h2>
					<p>Choose your loan tenure as per your convenience  </p>
				</div>	
				<!-- end of appli-img -->			
			</div>
			<!-- end of appli-inner -->
		</div>
		<!-- end of applica-box -->


		<div class="applica-box no-partpaymnet">
			<div class="appli-inner">
				<div class="appli-img">
				</div>
				<!-- end of appli-img -->
				<div class="appli-text">
					<h2>No Pre-payment Charges</h2>
					<p>Pay in parts as per your convenience </p>
				</div>	
				<!-- end of appli-img -->			
			</div>
			<!-- end of appli-inner -->
		</div>
		<!-- end of applica-box -->


		<div class="applica-box quick-app-appli">
			<div class="appli-inner">
				<div class="appli-img">
				</div>
				<!-- end of appli-img -->
				<div class="appli-text">
					<h2>Quick Approvals </h2>
					<p>Digital verification process for faster loan approval  </p>
				</div>	
				<!-- end of appli-img -->			
			</div>
			<!-- end of appli-inner -->
		</div>
		<!-- end of applica-box -->


		<div class="applica-box no-force-closure">
			<div class="appli-inner">
				<div class="appli-img">
				</div>
				<!-- end of appli-img -->
				<div class="appli-text">
					<h2>No Fore-closure Charges</h2>
					<p>Now save money by prepaying at your convenience<br>
with no extra charge, unlike traditional banks/NBFC</p>
				</div>	
				<!-- end of appli-img -->			
			</div>
			<!-- end of appli-inner -->
		</div>
		<!-- end of applica-box -->
	</div>
</section>

<section class="eligibility-personalloan">
	<h2 class="text-center second-title"><span><strong>AnyDay Money Education Loan </strong>  - Features and benefits</span></h2>
	<div class="site-container">
		<ul class="eligibility-points">
			<li>
				<h3>Eligible </h3>
				<p>Salaried Individuals</p>
			</li>

			<li>
				<h3>Minimum Age </h3>
				<p>21 or above</p>
			</li>

			<li>
				<h3>Minimum Salary Required </h3>
				<p>Rs. 15,000</p>
			</li>

			<li>
				<h3>Loan Amount </h3>
				<p>Rs. 10,000 onwards</p>
			</li>
		</ul>
		<!-- end of eligibility-points -->
	</div>
</section>
<!-- end of eligibility-personalloan -->

<section class="calculater-sec">
	<h2 class="text-center second-title"><span><strong>AnyDay Education Loan</strong>  EMI Calculator</span></h2>
	<p class="text-center subtitle">Check Your Loan EMI With The Calculator Given As Per Your Convenience. You Can Check <br>Your Repayment Amount By Choosing Loan Amount, Tenure And Interest </p>
	<div class="site-container">
		<div class="cal-box">
			<div class="left-side">
				<div class="form-field">
					<div class="select-box">
						<select>
							<option>Select Loan Type</option>
							<option>Personal Loan</option>
							<option>Business Loan</option>
							<option>Medical Loan</option>
							<option>Education Loan</option>
						</select>
				    </div>
				</div>
				<div class="range-box">
				<div class="slidecontainer">
					<p>Loan Amount <span id="loan-amount">&#x20B9;10,00,000</span> <label class="last-span">INR</label></p>	
	  				<div id="amount-slider"></div>
	  				<div class="slidertext">
	  				</div>			
				</div>
				<!-- end of slidecontainer -->				

				<div class="slidecontainer">
					<p>Loan Tenure <span id="loan-period">10</span> <label class="last-span">Months</label></p>	
	  				<div id="period-slider"></div>
	  				<div class="slidertext">
	  				</div>			
				</div>
				<!-- end of slidecontainer -->

				<div class="slidecontainer">
					<p>Interest Rate <span id="loan-rate">12%</span></p>	
	  				<div id="rate-slider"></div>
	  				<div class="slidertext">
	  				</div>			
				</div>
				<!-- end of slidecontainer -->
				</div>
			</div>
			<!-- end of left-side -->
			<div class="right-side">
				<div class="inner-right">
				<div class="total-amount">
					<p>Total Amount</p>
					<h2>10,00,000<span>INR</span></h2>
				</div>
				<div class="emi-details">
					<div class="monthly-emi">
						<p>Monthly EMI</p>
					<h2>35,100<span>INR</span></h2>
					</div>
					<!-- end of monthly-emi -->
					<div class="interest-rate">
						<p>Interest Amount</p>
					<h2>7000<span>INR</span></h2>
					</div>
					<!-- end of interest-rate -->
				</div>
				<!-- end of emi-details -->
				<a href="javascript:void();" class="redbtn ragister">Apply Now</a>
			</div>
			</div>
			<!-- end of right-side -->
		</div>
	</div>
	
</section>
<!-- end of calculater-sec -->

<section class="how-its-work text-center" id="howapply">
	<h2 class="sub-title text-center"><span>How to Apply?</span></h2>
	<p class="text-center">4 easy and quick steps to apply for <br>Anyday Money Loan</p>
	<div class="site-container">	
		<div class="step-box quick-appli">
			<div class="step-inner">
				<div class="stepimgbox">
				</div>
				<!-- end of whyimgbox -->
				<h2>Quick Application</h2>
				<p>Enter basic details to<br>build your profile</p>
			</div>
			<!-- end of whyinner -->
		</div>
		<!-- end of step-box -->

		<div class="step-box Pre-approved">
			<div class="step-inner">
				<div class="stepimgbox">
				</div>
				<!-- end of whyimgbox -->
				<h2>Pre-approved eligibility</h2>
				<p> Your eligibility will be<br/>
calculated on the basis<br/>
of your profile details</p>
			</div>
			<!-- end of whyinner -->
		</div>
		<!-- end of step-box -->


		<div class="step-box submit-doc">
			<div class="step-inner">
				<div class="stepimgbox">
				</div>
				<!-- end of whyimgbox -->
				<h2>Submit documents</h2>
				<p>Upload necessary<br/>
documents digitally<br/>
for quick credit approval</p>
			</div>
			<!-- end of whyinner -->
		</div>
		<!-- end of step-box -->


		<div class="step-box disbursement">
			<div class="step-inner">
				<div class="stepimgbox">
				</div>
				<!-- end of whyimgbox -->
				<h2>Disbursement</h2>
				<p>Approved loan amount<br/>
credited to your<br/>
bank account </p>
			</div>
			<!-- end of whyinner -->
		</div>
		<!-- end of step-box -->
	</div>
<!-- end of site-container -->
	<a href="#" class="redbtn ragister">Apply Now</a>
</section>
<!-- end of how-its-work -->

<section class="download-app">
	<div class="site-container">
		<div class="left-side">
			<img src="images/anyday-logo.svg" title="Anyday Money" alt="Anyday Money">
			<h2>Download<br> <strong>AnyDay</strong> Money <br> Mobile App</h2>
			<p>Instant loan at finger tips</p>
			<div class="app-img">
				<a href="#"><img class="img-fluid" src="images/googleplay.png" title="" alt=""></a>
				<a href="#"><img class="img-fluid" src="images/app-store-img.png" title="" alt=""></a>
			</div>
		</div>
	</div>		
</section>
<!-- end of download-app -->

@endsection
@section('script')
<script src="{{ asset('assets/js/slick.js') }}" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript">
    $(document).on('ready', function() {
      
       $(".mainslider").slick({
        dots:false,
        infinite: true,
        centerMode:true,
        arrows:true,
        auto:true,
        loop:true,  
        autoplay:true,
        slidesToShow:1,
        slidesToScroll:0, 
      });

      $(".why-anyday .site-container").slick({
        dots:false,
        infinite: true,
        centerMode:true,
        arrows:false,
        loop:true,
         auto:true,
        slidesToShow:6,
        autoplay:true,
        centerPadding: '100px',
        slidesToScroll:0, 
        responsive: [
         {
	      breakpoint:1100,
	      settings: {
	        centerPadding: '200px',
	        slidesToShow:1
	      }
	    },
	    {
	      breakpoint: 991,
	      settings: {
	        centerPadding: '100px',
	        slidesToShow:4
	      }
	    },
	    {
	      breakpoint:767,
	      settings: {
	        arrows:true,
	        centerMode: true,
	        centerPadding: '30px',
	        slidesToShow: 1
	      }
	    }
	  ] 
      });
    });
</script>

<script type="text/javascript">
    $(document).on('ready', function() {
      
      $(".loan-application .site-container").slick({
        dots:false,
        infinite: true,
        centerMode:true,
        arrows:true,
         centerPadding: '200px',
        slidesToShow:2,
        slidesToScroll:0,
        responsive: [
         {
	      breakpoint:1100,
	      settings: {
	        centerPadding: '30px',
	        slidesToShow:2
	      }
	    },
	    {
	      breakpoint: 991,
	      settings: {
	        centerPadding: '30px',
	        slidesToShow:2
	      }
	    },
	    {
	      breakpoint:767,
	      settings: {
	        arrows:true,
	        centerMode: true,
	        centerPadding: '0px',
	        slidesToShow: 1
	      }
	    }
	  ]        
      });
      
    });
</script>

  <script type="text/javascript">
    $(document).on('ready', function() {
      
      $(".center").slick({
        dots:false,
        infinite: true,
        centerMode:true,
        arrows:true,
         centerPadding: '400px',
        slidesToShow:1,
        slidesToScroll:0,
        responsive: [
         {
	      breakpoint:1100,
	      settings: {
	        centerPadding: '200px',
	        slidesToShow:1
	      }
	    },
	    {
	      breakpoint: 991,
	      settings: {
	        centerPadding: '100px',
	        slidesToShow:1
	      }
	    },
	    {
	      breakpoint:767,
	      settings: {
	        arrows:true,
	        centerMode: true,
	        centerPadding: '30px',
	        slidesToShow: 1
	      }
	    }
	  ]        
      });
      
    });
</script>



<script src="{{ asset('assets/js/nouislider.js') }}"></script>
<script src="{{ asset('assets/js/wNumb.min.js') }}"></script>
<script>
/*amount slider*/	
var slider = document.getElementById('amount-slider');
var loanAmount = document.getElementById('loan-amount');

	noUiSlider.create(slider, {

     start: 600000,
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
        'min': 0,
        'max': 1000000
    },

    
	});



	var range = [
    '5000','1000000'
];
	
	slider.noUiSlider.on('update', function (values, handle) {
		 loanAmount.innerHTML = values[handle];
	});





/*rate slider*/	
var slider1 = document.getElementById('rate-slider');
var loanRate = document.getElementById('loan-rate');
	noUiSlider.create(slider1, {
	step:1,	
     start: [18],
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
		 loanRate.innerHTML = values[handle];
	});

/*period slider*/	
var slider2 = document.getElementById('period-slider');
var loanTime = document.getElementById('loan-period');
	noUiSlider.create(slider2, {
	step:1,	
     start: [4],
    connect: [false, true],
       
    pips: {
         mode: 'values',
        values: [1,12],
        density:20
    },
    range: {
        'min': 1,
        'max': 12
    },

    format: wNumb({
        decimals:0,
        thousand: ',',
        suffix: '',
    }),

	});
	
	slider2.noUiSlider.on('update', function (values, handle) {
		 loanTime.innerHTML = values[handle];
	});	
</script>
<script>
	$(document).ready(function(){
  $(".container-wrap").click(function(){
    $(".nav-cover").toggleClass('open');
  });

  $(".nav-cover ul li a").click(function(){
    $(this).next('.dropmenu').slideToggle();
  });

  $("#login").click(function(){
    $(".login-pop").slideToggle();
  });

   $(".ragister").click(function(){
    $(".ragisterpage").fadeIn();
    $(".popbg").fadeIn();
     $(".login-pop").hide();
     $('.slick-prev, .slick-next').hide();
  });

   $(".popbg").click(function(){
    $(".ragisterpage").fadeOut();
    $(".popbg").fadeOut();
     $(".login-pop").hide();
     $(".form-box .dropmenu").hide();  
      $('.slick-prev, .slick-next').show();   
  });


$(".drop-arrow, .drop-arrow + input").click(function(){
    $(".form-box .dropmenu").toggle();
   
  });

  });
</script>
@endsection