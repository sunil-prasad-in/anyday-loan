/*amount slider*/ 
    jQuery(document).on('click','.loan-type',function(){
        var loanType = jQuery(this).html();
        jQuery('#loan-type').val(loanType);
        jQuery('.menu-hide').hide();
    }); 
     
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
       emiCalculator();
  	});

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
     	emiCalculator();
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
         emiCalculator();
    });



    function emiCalculator()
    {
        var p = jQuery('#loan-amount').html().split('₹')[1];
        var pAmount = p.split(',');
        var loanAmount = pAmount[0]+pAmount[1];
        var numberOfMonths = jQuery('#loan-period').html();
        var rateOfInterest = parseFloat(jQuery('#loan-rate').html());
        var monthlyInterestRatio = (rateOfInterest/100)/12; 
        var top = Math.pow((1+monthlyInterestRatio),numberOfMonths);
        var bottom = top -1;
        var sp = top / bottom;
        var emi = ((loanAmount * monthlyInterestRatio) * sp);
        var full = numberOfMonths * emi;
        var interest = full - loanAmount;
        var int_pge =  (interest / full) * 100;
        jQuery('.monthly_emi').html(Math.round(emi).toLocaleString('en-US', {maximumFractionDigits:2})+'<span>INR</span>');
        jQuery('.interest_amt').html(Math.round(interest).toLocaleString('en-US', {maximumFractionDigits:2})+'<span>INR</span>');
          //console.log(Math.round(emi).toLocaleString('en-US', {maximumFractionDigits:2}));
        //jQuery('.monthly_emi').html(emi.toLocaleString('en-US', {maximumFractionDigits:2})+'<span>INR</span>');
       // jQuery('.interest_amt').html(interest.toLocaleString('en-US', {maximumFractionDigits:2})+'<span>INR</span>');
        jQuery('.total_amt').html(p+'<span>INR</span>');
    }
