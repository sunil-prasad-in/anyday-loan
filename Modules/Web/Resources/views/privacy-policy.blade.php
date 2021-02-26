@include('web::layout.header')
@include('web::layout.sidebar')

<div class="innerpage-banner text-center">
    <img src="{{url('uploads/'.get_page_detail('banner_image','privacy-policy'))}}" class="img-fluid" title="" alt="" />
    <div class="site-container">
        <div class="breadcumbs-sec">
            <h2>{{get_page_detail('title','privacy-policy')}}</h2>
        </div>
    </div>
</div>
<div class="inner-page-con faq-content">
    <div class="site-container flex-none content-sec terms-faq">{!!get_page_detail('main_content','privacy-policy')!!}</div>
</div>
@include('web::layout.footer')