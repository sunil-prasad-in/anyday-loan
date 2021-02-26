		</div><!-- end of data-content -->
	</div><!-- end of main-content -->
</div><!-- end of admin-wrapper -->
<!-- end of admin-wrapper -->
           
                 

<script> 
$(document).ready(function(){
  $(".dropdown").click(function(){
    $(".dropdown > .dropmenu").slideToggle("slow");
  });
if ( $(window).width() > 767 ) {
  /*toggle menu js*/
 $(".toggle-menu").click(function(){
    $(".left-sidebar").toggleClass('open');
      $("body").toggleClass('menu-open');
  });
 
  /*tlogin dropdown js*/
 $(".top-right li").click(function(){
    $(".top-right li > .rightdrop").toggle();
    
  });
}

if ( $(window).width() < 767 ) {

$(".toggle-menu").click(function(){
    $(".main-menu").toggleClass('open-slide');      
  });

	}
});
</script>

   
</body>
</html>