<footer>
    <div class="site-container">
        <div class="column-4">
            <div class="inner-column conatct-sec">

                <a href="{{url('web')}}" title="Anyday Money">
                    <img class="img-responsive" src="{{url('frontend/images/footer-logo.png')}}" title="Anyday Money" alt="Anyday Money" />
                </a>

                <p class="address">{!!get_page_detail('address','theme-settings')!!}</p>

                <a class="teliphone" href="tel:{{get_page_detail('phone_number','theme-settings')}}">
                  <p class="contact">Contact Us: {{get_page_detail('phone_number','theme-settings')}}</p>
                </a>

                <a href="mailto:{{get_page_detail('email_address','theme-settings')}}">
                  <p class="email">Email: {{get_page_detail('email_address','theme-settings')}}</p>
                </a>

            </div>
        </div>
        <!-- end of column-4 -->
        <div class="column-3">
            <div class="inner-column footermenu">
                <h2>Quick Links</h2>
                <ul class="list-stylenone footermenu">
                    <li><a href="{{url('web/terms-conditions')}}" title="Terms of use">Terms of use</a></li>
                    <li><a href="{{url('web/privacy-policy')}}" title="Privacy Policy">Privacy Policy</a></li>
                   <!--  <li><a href="#" title="Disclosure">Disclosure</a></li> -->
                   
                </ul>
            </div>
        </div>
        <!-- end of column-3 -->
        <div class="column-3">
            <div class="inner-column footermenu">
                <h2>Navigate</h2>
                <ul class="list-stylenone">
                    <li><a href="{{url('web')}}" title="AnyDay Money">AnyDay Money</a></li>

                    @if(count(get_products()) > 0)

                      @foreach(get_products() as $val)

                        <li><a href="{{url('web/product/product-detail/'.$val->id)}}" title="Business Loan">{{$val->product_name}}</a></li>
                      @endforeach
                     
                    @endif
                    <li><a href="{{url('web/faq')}}" title="FAQ">FAQ</a></li>
                </ul>
            </div>
        </div>
        <!-- end of column-3 -->

        <div class="column-2">
            <div class="inner-column socialicon">
                <h2>Social Media</h2>
                <ul class="list-stylenone">
                    <!-- <li>
                      <a href="{{get_page_detail('twitter_link','theme-settings')}}">
                          <img src="{{url('frontend/images/twitter-img.png')}}"  title="twitter" alt="twitter" >
                      </a>
                    </li> -->
                    <li>
                      <a href="{{get_page_detail('facebook_link','theme-settings')}}" target="_blank">
                          <img src="{{url('frontend/images/facebook.png')}}"  title="facebook" alt="facebook" >
                      </a>
                    </li>

                     <li>
                      <a href="#" target="_blank">
                          <img src="{{url('frontend/images/instaimg.png')}}"  title="instagram" alt="instagram" >
                      </a>
                    </li>
                   <!--  <li>
                      <a href="{{get_page_detail('pinterest_link','theme-settings')}}">
                          <img src="{{url('frontend/images/pintrest.png')}}"  title="pintrest" alt="pintrest" >
                      </a>
                    </li> -->
                    <li>
                      <a href="{{get_page_detail('linkdin_link','theme-settings')}}" target="_blank">
                          <img src="{{url('frontend/images/linked-in.png')}}"  title ="linked-in" alt="linked-in" >
                      </a>
                    </li>
                    
                </ul>
            </div>
        </div>
        <!-- end of column-3 -->
    </div>
</footer>
<div class="copyright">
    <div class="site-container">
        <div class="left-sec">
        <a href="#">Disclaimer</a>
        <a href="{{url('web/privacy-policy')}}">Privacy Policy</a>
        </div>
        <div class="right-sec">
            <p>© {{date('Y')}} {{get_page_detail('copyright_text','theme-settings')}}</p>
        </div>
    </div>
</div>  
<!-- end of copyright -->

<script src="{{url('frontend/js/slick.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" ></script>
<script src="{{url('frontend/js/nouislider.js')}}"></script>
<script src="{{url('frontend/js/wNumb.min.js')}}"></script>
<script src="{{url('frontend/js/custom.js')}}" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $(document).on('ready', function() {
      
      $(".mainslider").slick({
        dots:false,
        infinite: true,
        centerMode:true,
        arrows:true,
        loop:true,  
        autoplay:true,     
        slidesToShow:1,
        slidesToScroll:0, 
      });
      // $(".loan-application .site-container").slick({
      //   dots:false,
      //   infinite: true,
      //   centerMode:true,
      //   arrows:true,
      //   loop:true,
      //    auto:true,
      //   slidesToShow:3,
      //   autoplay:true,
      //   centerPadding: '0px',
      //   slidesToScroll:0, 

      //   responsive: [
      //    {
      //     breakpoint:1100,
      //     settings: {
      //       slidesToShow:2
      //     }
      //   },
      //   {
      //     breakpoint: 991,
      //     settings: {
      //       slidesToShow:2
      //     }
      //   },
      //   {
      //     breakpoint:767,
      //     settings: {
      //       arrows:true,
      //       centerMode: true,
      //       centerPadding: '0',
      //       slidesToShow:1
      //     }
      //   }
      // ] 
      // });

      $(".why-anyday .site-container").slick({
        dots:false,
        infinite: true,
        centerMode:true,
        arrows:true,
        loop:true,
         auto:true,
        slidesToShow:6,
        autoplay:true,
        centerPadding: '0px',
        slidesToScroll:0, 

        responsive: [
         {
          breakpoint:1100,
          settings: {
            slidesToShow:3
          }
        },
        {
          breakpoint: 991,
          settings: {
            slidesToShow:2
          }
        },
        {
          breakpoint:767,
          settings: {
            arrows:true,
            centerMode: true,
            centerPadding: '0',
            slidesToShow:3
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
        adaptiveHeight: true,
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
      $('body').addClass("open-popup");
  });

   $(".popbg").click(function(){
    $(".ragisterpage").fadeOut();
    $(".popbg").fadeOut();
     $(".login-pop").hide();
     $(".form-box .dropmenu").hide();  
      $('.slick-prev, .slick-next').show();  
      $('body').removeClass("open-popup"); 
  });


$(".drop-arrow, .drop-arrow + input").click(function(){
    $(".form-box .dropmenu").toggle();
   
  });

  });
</script>
<script>
// When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
    document.getElementById("navbar").style.padding = "8px 0 2px";
    document.getElementById("logo").style.fontSize = "25px";
  } else {
    document.getElementById("navbar").style.padding = "8px 0 2px";
    document.getElementById("logo").style.fontSize = "35px";
  }
}
</script>
</body>
</html>