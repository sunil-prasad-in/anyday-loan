@include('web::layout.header')
@include('web::layout.sidebar')

<div class="innerpage-banner text-center partnerpage">
    <img src="{{url('uploads/'.get_page_detail('banner_image','partner-with-us'))}}" class="img-fluid" title="" alt="" />
    <div class="site-container">
        <div class="breadcumbs-sec">
            <h2>{{get_page_detail('title','partner-with-us')}}</h2>
        </div>
    </div>
</div>
<div class="inner-page-con partner-page">
    <div class="site-container flex-none">
        {!!get_page_detail('main_content','partner-with-us')!!}
        
        <section class="form-section">
            <h2 class="text-center second-title">
                <span><strong>{{get_page_detail('form_title_first','partner-with-us')}} </strong>  {{get_page_detail('form_title_second','partner-with-us')}}</span>
            </h2>
            <div class="enquiry-form">
                <form action="{{url('web/add-contact-form')}}" method="post" name="loginform" id="login-form">
                    @csrf
                    <input type="hidden" name="type" value="partner-with-us">
                    <div class="form-box">
                        <input type="text" title="Full Name" name="full_name" placeholder="Full Name" required>
                        {{ $errors->first('full_name') }}
                    </div>
                    <div class="form-box">
                        <input type="text" title="Email" name="email" placeholder="Email" required>
                        {{ $errors->first('email') }}
                    </div>
                    <div class="form-box">
                        <input type="text" title="Phone" name="phone" placeholder="Phone"required>
                        {{ $errors->first('phone') }}
                    </div>
                    
                    <div class="form-box">
                        <textarea name="message" placeholder="Message" required></textarea>
                        {{ $errors->first('message') }}
                    </div>
                    <div class="form-action">
                        <input type="submit" title="Submit" name="submit" value="Submit">
                    </div>
                </form>
            </div>      
        </section>      
    </div>
</div>
@include('web::layout.footer')

<script>
    @if(session('success'))
        toastr.success("{{session('success')}}");
    @elseif(session('error'))
        toastr.error("{{session('error')}}");
    @endif
</script>