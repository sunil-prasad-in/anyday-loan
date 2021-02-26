@include('web::layout.header')
@include('web::layout.sidebar')

<div class="innerpage-banner text-center">
    <img src="{{url('uploads/'.get_page_detail('banner_image','about-us'))}}" class="img-fluid" title="" alt="" />
    <div class="site-container">
        <div class="breadcumbs-sec">
            <h4>{{get_page_detail('title','about-us')}}</h4>
            <h2>{{get_page_detail('sub_title','about-us')}}</h2>
        </div>
    </div>
</div>
<div class="inner-page-con">
    <div class="site-container flex-none">
       <!--  <p><a href="index.html" title="Anyday Money">AnyDay Money</a> --> {!! get_page_detail('main_content','about-us') !!}
        <div class="action-btn">
            <a href="#" title="Apply Now" class="redbtn ragister">Apply Now</a>
        </div>
    </div>
</div>
<section class="loan-application new">
    <h2 class="text-center second-title">
        <span><strong>{{get_page_detail('anyday_money_title','about-us')}}</strong>  - {{get_page_detail('anyday_money_sub_title','about-us')}}</span>
    </h2>
    <div class="site-container flex-none">
        <div class="applica-box easy-getloan">
            <div class="appli-inner">
                <div class="appli-img">
                </div>
                <div class="appli-text">
                    <h2>{{get_page_detail('content_tile_1','about-us')}}</h2>
                    <p>{{get_page_detail('content_sub_title_1','about-us')}}</p>
                </div>  
            </div>
        </div>
        <div class="applica-box instant-disbursal">
            <div class="appli-inner">
                <div class="appli-img">
                </div>
                <div class="appli-text">
                    <h2>{{get_page_detail('content_tile_2','about-us')}} </h2>
                    <p>{{get_page_detail('content_sub_title_2','about-us')}}</p>
                </div>  
            </div>
        </div>
        <div class="applica-box flexible-tenure">
            <div class="appli-inner">
                <div class="appli-img">
                </div>
                <div class="appli-text">
                    <h2>{{get_page_detail('content_tile_3','about-us')}}</h2>
                    <p>{{get_page_detail('content_sub_title_3','about-us')}}</p>
                </div>  
            </div>
        </div>
        <div class="applica-box no-partpaymnet">
            <div class="appli-inner">
                <div class="appli-img">
                </div>
                <div class="appli-text">
                    <h2>{{get_page_detail('content_tile_4','about-us')}}</h2>
                    <p>{{get_page_detail('content_sub_title_4','about-us')}}</p>
                </div>  
            </div>
        </div>
        <div class="applica-box quick-app-appli">
            <div class="appli-inner">
                <div class="appli-img">
                </div>
                <div class="appli-text">
                    <h2>{{get_page_detail('content_tile_5','about-us')}}</h2>
                    <p>{{get_page_detail('content_sub_title_5','about-us')}}</p>
                </div>  
            </div>
        </div>
        <div class="applica-box no-force-closure">
            <div class="appli-inner">
                <div class="appli-img">
                </div>
                <div class="appli-text">
                    <h2>{{get_page_detail('content_tile_6','about-us')}}</h2>
                    <p>{{get_page_detail('content_sub_title_6','about-us')}}</p>
                </div>  
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