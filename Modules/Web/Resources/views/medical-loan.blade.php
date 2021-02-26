@include('web::layout.header')
@include('web::layout.sidebar')

<div class="innerpage-banner otherpage text-center">
    <img src="{{url('frontend/images/medicallloan.png')}}" class="img-fluid" title="" alt="" />
    <div class="site-container">
        <div class="breadcumbs-sec loan-sec">
            <h4>
                <span>{{get_page_detail('main_title','product-3')}}</span><br>
                {!!get_page_detail('title','product-3')!!}</h4>
                <p>{{get_page_detail('sub_title','product-3')}}</p>
            <a href="#" class="redbtn ragister">Apply Now</a>
        </div>
    </div>
</div>
<!-- end of innerpage-banner -->

<section class="other-sec">
    <div class="site-container flex-none page-descrip">
        <h2>{{get_page_detail('main_content_title','product-3')}}</h2>
        {!!get_page_detail('main_content','product-3')!!}
    </div>
</section>

<section class="loan-application">
    <h2 class="text-center second-title">
        <span><strong>{{get_page_detail('features_title','product-3')}}</strong> {{get_page_detail('features_title_second','product-2')}}</span>
    </h2>
    
    <div class="site-container flex-none">
        <div class="applica-box easy-getloan">
            <div class="appli-inner">
                <div class="appli-img">
                </div>
                <div class="appli-text">
                    <h2>{{get_page_detail('feature_tile_1','product-3')}}</h2>
                    <p>{{get_page_detail('feature_sub_title_1','product-3')}}</p>
                </div>  
            </div>
        </div>
        <div class="applica-box instant-disbursal">
            <div class="appli-inner">
                <div class="appli-img">
                </div>
                <div class="appli-text">
                    <h2>{{get_page_detail('feature_tile_2','product-3')}}</h2>
                    <p>{{get_page_detail('feature_sub_title_2','product-3')}}</p>
                </div>  
            </div>
        </div>
        <div class="applica-box flexible-tenure">
            <div class="appli-inner">
                <div class="appli-img">
                </div>
                <div class="appli-text">
                    <h2>{{get_page_detail('feature_tile_3','product-3')}}</h2>
                    <p>{{get_page_detail('feature_sub_title_3','product-3')}}</p>
                </div>  
            </div>
        </div>
        <div class="applica-box no-partpaymnet">
            <div class="appli-inner">
                <div class="appli-img">
                </div>
                <div class="appli-text">
                    <h2>{{get_page_detail('feature_tile_4','product-3')}}</h2>
                    <p>{{get_page_detail('feature_sub_title_4','product-3')}}</p>
                </div>  
            </div>
        </div>
        <div class="applica-box quick-app-appli">
            <div class="appli-inner">
                <div class="appli-img">
                </div>
                <div class="appli-text">
                    <h2>{{get_page_detail('feature_tile_5','product-3')}}</h2>
                    <p>{{get_page_detail('feature_sub_title_5','product-3')}}</p>
                </div>  
            </div>
        </div>
        <div class="applica-box no-force-closure">
            <div class="appli-inner">
                <div class="appli-img">
                </div>
                <div class="appli-text">
                    <h2>{{get_page_detail('feature_tile_6','product-3')}}</h2>
                    <p>{{get_page_detail('feature_sub_title_6','product-3')}}</p>
                </div>  
            </div>
        </div>
    </div>
</section>

<section class="eligibility-personalloan medical-loan">
    <h2 class="text-center second-title"><span>
        <strong>{{get_page_detail('e_title','product-3')}} </strong> {{get_page_detail('e_title_second','product-3')}}</span></h2>
        <div class="site-container">
            <ul class="eligibility-points">
                <li>
                    <h3>{{get_page_detail('content_tile_1','product-3')}}</h3>
                    <p>{{get_page_detail('content_sub_title_1','product-3')}}</p>
                </li>

                <li>
                    <h3>{{get_page_detail('content_tile_2','product-3')}}</h3>
                    <p>{{get_page_detail('content_sub_title_2','product-3')}}</p>
                </li>

                <li>
                    <h3>{{get_page_detail('content_tile_3','product-3')}}</h3>
                    <p>{{get_page_detail('content_sub_title_3','product-3')}}</p>
                </li>

                <li>
                    <h3>{{get_page_detail('content_tile_4','product-3')}}</h3>
                    <p>{{get_page_detail('content_sub_title_4','product-3')}}</p>
                </li>
            </ul>
        </div>
</section>
<!-- end of eligibility-personalloan -->

<section class="calculater-sec">
    <h2 class="sub-title text-center"><span>{{get_page_detail('title','emi-calculation')}}</span></h2>
    <div class="text-center subtitle">{!!get_page_detail('sub_title','emi-calculation')!!}</div>
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
                    <h2 class="total_amt"></h2>
                </div>
                <div class="emi-details">
                    <div class="monthly-emi">
                        <p>Monthly EMI</p>
                        <h2 class="monthly_emi"></h2>
                    </div>
                    <!-- end of monthly-emi -->
                    <div class="interest-rate">
                        <p>Interest Amount</p>
                        <h2 class="interest_amt"></h2>
                    </div>
                    <!-- end of interest-rate -->
                </div>
                <!-- end of emi-details -->
                <a href="javascript:void(0)" class="redbtn ragister">Apply Now</a>
            </div>
            </div>
            <!-- end of right-side -->
        </div>
    </div>
</section>
<!-- end of calculater-sec -->
<section class="how-its-work text-center" id="howapply">
    <h2 class="sub-title text-center"><span>{{get_page_detail('title','how-to-apply')}}</span></h2>
    <p class="text-center">{!!get_page_detail('sub_title','how-to-apply')!!}</p>
    <div class="site-container">    
        <div class="step-box quick-appli">
            <div class="step-inner">
                <div class="stepimgbox">
                </div>
                <h2>{{get_page_detail('content_tile_1','how-to-apply')}}</h2>
                <p>{!!get_page_detail('content_sub_title_1','how-to-apply')!!}</p>
            </div>
        </div>
        <div class="step-box Pre-approved">
            <div class="step-inner">
                <div class="stepimgbox">
                </div>
                <h2>{{get_page_detail('content_tile_2','how-to-apply')}}</h2>
                <p>{!!get_page_detail('content_sub_title_2','how-to-apply')!!}</p>
            </div>
        </div>

        <div class="step-box submit-doc">
            <div class="step-inner">
                <div class="stepimgbox">
                </div>
                <h2>{{get_page_detail('content_tile_3','how-to-apply')}}</h2>
                <p>{!!get_page_detail('content_sub_title_3','how-to-apply')!!}</p>
            </div>
        </div>
        
        <div class="step-box disbursement">
            <div class="step-inner">
                <div class="stepimgbox">
                </div>
                <h2>{{get_page_detail('content_tile_4','how-to-apply')}}</h2>
                <p>{!!get_page_detail('content_sub_title_4','how-to-apply')!!}</p>
            </div>
        </div>
    </div>
    <a href="#" class="redbtn ragister">Apply Now</a>
</section>

<section class="download-app">
    <div class="site-container">
        <div class="left-side">
            <img src="{{url('frontend/images/anyday-logo.svg')}}" title="Anyday Money" alt="Anyday Money">
            <h2>Download<br> <strong>AnyDay</strong> Money <br> Mobile App</h2>
            <p>Instant loan at finger tips</p>
            <div class="app-img">
               <a href="https://play.google.com/store/apps/details?id=in.publicam.advancesalary" target="_blank"><img class="img-fluid" src="{{url('frontend/images/googleplay.png')}}" title="" alt=""></a>
                <a href="https://apps.apple.com/in/app/anyday-money/id1445823067" target="_blank"><img class="img-fluid" src="{{url('frontend/images/app-store-img.png')}}" title="" alt=""></a>
            </div>
        </div>
    </div>      
</section>
@include('web::layout.footer')

<script>
    @if(session('success'))
        toastr.success("{{session('success')}}");
    @elseif(session('error'))
        toastr.error("{{session('error')}}");
    @endif
</script>