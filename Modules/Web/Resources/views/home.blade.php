@include('web::layout.header')
@include('web::layout.sidebar')

@if(count($slider) > 0)
    <section class="slider-sec">
        <div class="mainslider">  
            @foreach($slider as $val)  
                <div class="slide"> 
                    <a href="javascript:void(0)" class="visible-xs"> 
                        <img class="img-fluid firstoanimg visible-xs" src="{{url('frontend/images/mobile-banner1.jpg')}}" alt="Anyday Money" title="Anyday Money" />    
                    </a>
                    <img class="img-fluid firstoanimg hidden-xs" src="{{url('uploads/'.$val->banner_image)}}" alt="Anyday Money" title="Anyday Money" />
                    <div class="site-container banner-con hidden-xs">
                        <div class="caption-sec">

                            <h2>{!!$val->main_title!!}
                            <h4>{!!$val->title!!}</h4>
                            <div class="normal-para">{!!$val->sub_title!!}</div>
                            @php $content = explode(",",$val->content); @endphp
                            @if($content[0])
                                <p class="easy-process">{{$content[0]}}</p>
                            @endif
                            @if($content[1])
                                <p class="norepayment">{{$content[1]}}</p>
                            @endif
                            @if($content[2])
                                <p class="no-distu">{{$content[2]}}</p>
                            @endif

                            <div class="action-btn">

                                <a href="#" title="Apply Now" class="redbtn ragister">Apply Now</a>             
                            </div>
                            <!-- end of action-btn-->
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endif
@if(count($product) > 0)
    <section class="product-sec">
        <h2 class="sub-title text-center"><span>Products</span></h2>
        <div class="site-container">
            @foreach($product as $val)
                <div class="pro-column text-center">
                    <div class="inner-col addmoney">
                        <div class="img-box">
                        </div>
                        <h2>{{$val->product_name}}</h2>
                        <a href="{{url('web/product/product-detail/'.$val->id)}}">Learn More ></a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endif
<section class="why-anyday">
    <h2 class="sub-title text-center"><span>{{get_page_detail('title','why-any-day-money')}}</span></h2>
    <p class="subtitle text-center">{{get_page_detail('sub_title','why-any-day-money')}}</p>

    <div class="site-container text-center">
        <div class="whybox easy-paperless">
            <div class="whyinner">
                <div class="whyimgbox">
                </div>
                <h2>{{get_page_detail('content_tile_1','why-any-day-money')}}</h2>
            </div>
        </div>
        <div class="whybox quick-app">
            <div class="whyinner">
                <div class="whyimgbox">
                </div>
                <h2>{{get_page_detail('content_tile_2','why-any-day-money')}}</h2>
            </div>
        </div>
        <div class="whybox flexible-tuner">
            <div class="whyinner">
                <div class="whyimgbox">
                </div>
                <h2>{{get_page_detail('content_tile_3','why-any-day-money')}}</h2>
            </div>
        </div>
        <div class="whybox no-collaterals">
            <div class="whyinner">
                <div class="whyimgbox">
                </div>
                <h2>{{get_page_detail('content_tile_4','why-any-day-money')}}</h2>
            </div>
        </div>
        <div class="whybox minimum-doc">
            <div class="whyinner">
                <div class="whyimgbox">
                </div>
                <h2>{{get_page_detail('content_tile_5','why-any-day-money')}}</h2>
            </div>
        </div>
        <div class="whybox no-prepaymnet">
            <div class="whyinner">
                <div class="whyimgbox">
                </div>
                <h2>{{get_page_detail('content_tile_6','why-any-day-money')}}</h2>
            </div>
        </div>
        <div class="whybox no-foreclosure">
            <div class="whyinner">
                <div class="whyimgbox">
                </div>
                <h2>{{get_page_detail('content_tile_7','why-any-day-money')}}</h2>
            </div>
        </div>
        <div class="whybox easy-process">
            <div class="whyinner">
                <div class="whyimgbox">
                </div>
                <h2>{{get_page_detail('content_tile_8','why-any-day-money')}}</h2>
            </div>
        </div>
        <div class="whybox no-hiddencharge">
            <div class="whyinner">
                <div class="whyimgbox">
                </div>
                <h2>{{get_page_detail('content_tile_9','why-any-day-money')}}</h2>
            </div>
        </div>
    </div>
</section>
<section class="how-its-work text-center" id="howapply">
    <h2 class="sub-title text-center">
        <span>{{get_page_detail('title','how-to-apply')}}</span>
    </h2>
    <p class="text-center">{!!get_page_detail('sub_title','how-to-apply')!!}</p>
    <div class="site-container">    
        <div class="step-box quick-appli">
            <div class="step-inner">
                <div class="stepimgbox"></div>
                <h2>{{get_page_detail('content_tile_1','how-to-apply')}}</h2>
                <p>{{get_page_detail('content_sub_title_1','how-to-apply')}}</p>
            </div>
        </div>
        <div class="step-box Pre-approved">
            <div class="step-inner">
                <div class="stepimgbox"></div>
                <h2>{{get_page_detail('content_tile_2','how-to-apply')}}</h2>
                <p>{{get_page_detail('content_sub_title_2','how-to-apply')}}</p>
            </div>
        </div>
        <div class="step-box submit-doc">
            <div class="step-inner">
                <div class="stepimgbox"></div>
                <h2>{{get_page_detail('content_tile_3','how-to-apply')}}</h2>
                <p>{{get_page_detail('content_sub_title_3','how-to-apply')}}</p>
            </div>
        </div>
        <div class="step-box disbursement">
            <div class="step-inner">
                <div class="stepimgbox"></div>
                <h2>{{get_page_detail('content_tile_4','how-to-apply')}}</h2>
                <p>{{get_page_detail('content_sub_title_4','how-to-apply')}}</p>
            </div>
        </div>
    </div>
    <a href="#" class="redbtn ragister">Apply Now</a>
</section>
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
                    <div class="slidecontainer">
                        <p>Loan Tenure <span id="loan-period">10</span> <label class="last-span">Months</label></p> 
                        <div id="period-slider"></div>
                        <div class="slidertext">
                        </div>          
                    </div>
                    <div class="slidecontainer">
                        <p>Interest Rate <span id="loan-rate">12%</span></p>    
                        <div id="rate-slider"></div>
                        <div class="slidertext">
                        </div>          
                    </div>
                </div>
            </div>
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
                        <div class="interest-rate">
                            <p>Interest Amount</p>
                            <h2 class="interest_amt"></h2>
                        </div>
                    </div>
                    
                    <a href="javascript:void(0)" class="redbtn ragister">Apply Now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="download-app">
    <div class="site-container">
        <div class="left-side">
            <img src="{{url('frontend/images/anyday-logo.svg')}}" title="Anyday Money" alt="Anyday Money">
            <h2>Download<br> <strong>AnyDay Money</strong> <br> Mobile App</h2>
            <p>Loans to suit all your short-term needs</p>
            <div class="app-img">
                <a href="https://play.google.com/store/apps/details?id=in.publicam.advancesalary" target="_blank"><img class="img-fluid" src="{{url('frontend/images/googleplay.png')}}" title="" alt=""></a>
                <a href="https://apps.apple.com/in/app/anyday-money/id1445823067" target="_blank"><img class="img-fluid" src="{{url('frontend/images/app-store-img.png')}}" title="" alt=""></a>
            </div>
        </div>
    </div>      
</section>
@if(count($testimonial) > 0)
    <section class="testimonial-sec">
        <h2 class="sub-title text-center"><span>Testimonials</span></h2>
        <div class="center slider">
            @foreach($testimonial as $val)
                <div>
                    <div class="testimonial-box">
                        <img class="img-fluid" src="{{url('frontend/images/tsimo-star.png')}}" title="" alt="">
                        <div class="testi-con">{!!$val->content!!}</div>
                        <h5 class="authername">{{$val->name}}</h5>
                        
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endif

@include('web::layout.footer')

