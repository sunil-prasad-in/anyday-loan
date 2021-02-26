@include('web::layout.header')
@include('web::layout.sidebar')

<div class="thankyou-sec">
    <div class="inner-sec">
        <img src="{{url('frontend/images/thankyouimg.png')}}" title="" alt="" />
        <h2>Thank you for your message. </h2>
        <p>One of our sales representative will be in touch with you shortly</p>
    </div>
</div>


@include('web::layout.footer')
