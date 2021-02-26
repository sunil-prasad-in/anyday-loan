        <div class="nav-cover">
            <ul>
                <li><a href="javascript:void();" title="home">Products</a>
                    <ul class="dropmenu">
                        @if(count(get_products()) > 0)

                          @foreach(get_products() as $val)
                          
                            <li class="personal-loan">
                                <a href="{{url('web/product/product-detail/'.$val->id)}}" title="Personall Loan">{{$val->product_name}}</a>
                            </li>

                          @endforeach
                         
                        @endif
                        
                        
                    </ul>
                </li>
                <li><a href="{{url('web/about-us')}}" title="About Us">About Us</a></li>
                <li><a href="{{url('web/'.'#howapply')}}" title="How it Works">How it Works</a></li>
                <li><a href="{{url('web/partner-with-us')}}" title="Partner with us">Partner with us</a></li>
                <li><a href="{{url('web/contact-us')}}" title="Contact Us">Contact Us</a></li>
            </ul>           
        </div>
        <div class="login-option">
            <a href="javascript:void();" class="ragister" title="Register">
                <span>Apply Now</span>
            </a>
        </div>
    </div>
</div>
       
<div class="ragisterpage smallpop">
    <div class="inner-popup">
        
        <form method="post" action="{{url('web/apply-now')}}" name="loginform" id="login-form">
            @csrf
            <div class="form-box">
                <input type="text" title="Full Name" name="full_name" placeholder="Full Name" required/>
            </div>
            <div class="form-box">
                
                <input type="text" title="Email" name="email" placeholder="Email" required/>
            </div>
            <div class="form-box">
            
                <input type="text" title="Enetr Phone Number" name="phone" placeholder="Enter Phone Number" required/>
            </div>
            <div class="form-box">  
                <span class="drop-arrow"></span>                        
                <input type="text" title="Select loan Type" name="loan_type" id="loan-type" placeholder="Select Loan Type" required/>
                <ul class="dropmenu menu-hide">
                    <li class="personal-loan"><a href="javascript:void(0)" class="loan-type">Personal Loan</a></li>
                    <li class="business-loan"><a href="javascript:void(0)" class="loan-type">Business Loan</a></li>
                    <li class="medical-loan"><a href="javascript:void(0)" class="loan-type">Medical Loan</a></li>
                    <li class="education-loan"><a href="javascript:void(0)" class="loan-type">Education Loan</a></li>
                </ul>
            </div>
            <div class="form-box">                          
                <input type="text" title="City" name="city" placeholder="City" required/>
            </div>
            <div class="form-box">                          
                <input type="text" title="State" name="state" placeholder="State" required/>
            </div>
            <div class="form-action">
                <input type="submit" title="Submit" name="submit" value="Submit" />
            </div>
        </form>
    </div>
 </div></div>
<div class="popbg"></div>
</div>  
</header>