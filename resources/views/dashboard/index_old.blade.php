@extends('dashboard.include.app')
@section('content')
<div class="inner-sec">
	<div class="active-loan">
		<h3 class="dash-title">Active Loan</h3>
		@if(isset($data) && count($data) > 0)
		   
        		<div class="active-loanbox">
        			<div class="inner-ac"> 
        				<h4>Personal Loan</h4>
        				<div class="loan-range">
        					<span class="first">Loan Amount: ₹50,000</span>
        					<span class="last">EMI <br/> <span class="time">1/12</span></span>
        					<div class="loan-range-slider">
        					</div>
        				</div>
        				<!-- end of loan-range -->
        				<div class="loan-details">
        					<ul>
        						<li><h5>₹7,500</h5><span> EMI Amount </span></li>
        						<li><h5>5 Aug 2020</h5><span> EMI due date </span></li>
        					</ul>
        				</div>
        				<div class="active-action">
        					<a href="#">Pay Now</a>
        					<a href="#">Top up loan</a>
        				</div>
        			</div>
        			<!-- end of inner-ac -->
        		</div>
        		<!-- end active-loanbox -->
        	
		@endif
	</div>
	
	<div class="loan-option">
		<a href="#" class="how-work"><span><img src="{{ asset('assets/dashboard/images/how-work.png') }}" title="Medical Loan" alt="Medical Loan"></span>How It Works</a>
		<ul>
			<li><a href="{{ url('dashboard/apply-now') }}"><span><img src="{{ asset('assets/dashboard/images/apply-now.png') }}" title="Apply Now" alt="Apply Now"></span>Apply Now</a></li>
			<li><a href="#"><span><img src="{{ asset('assets/dashboard/images/emi_calc.png') }}" title="Apply Now" alt="Apply Now"></span>EMI Calculator</a></li>
		</ul>
	</div>
</div>
@endsection