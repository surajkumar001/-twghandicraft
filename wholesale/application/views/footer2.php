  <!-- ============================================================= FOOTER ============================================================= -->
 <footer class="xs-footer-section">
    <div class="xs-footer-main">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-8 row xs-footer-info-and-payment">
                    <div class="col-lg-12">
                        <div class="xs-footer-logo footer-logo-v2">
                            <a href="">
                                <img src="<?php echo base_url(); ?>assets/images/ft-logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 media">
                        <span class="icon icon-support d-flex"></span>
                        <div class="media-body">
                            <h5>Got Question? Call us 24/7 <strong>+91-8800576868</strong></h5>
                            <address>
                            12/57,Site-2 Industrial Area,Opp ITS College,Mohan Nagar Ghaziabaad-201007,UP, INDIA
                            </address>
                            <a href="https://www.google.com/maps/dir/28.628223,77.389849/art+n+hub/@28.6579283,77.3523822,13z/data=!3m1!4b1!4m9!4m8!1m1!4e1!1m5!1m1!1s0x390ce517478c639b:0x6d433e4a117e3af5!2m2!1d77.3891853!2d28.6812314" class="xs-map-popup btn btn-primary" style="width:60%;"><i class="icon icon-placeholder"></i>View On Map</a>
                        </div>
                    </div><!-- .media END -->   
                    <div class="col-lg-6 col-md-6 media">
                        
                        <div class="media-body">
                            
                            <div class="xs-footer-secure-info">
                               
                                <ul class="footer-secured-by-icons">
                                    <li>
                                        <img src="<?php echo base_url(); ?>assets/images/norton_av_logo.png" alt="norton">
                                    </li>
                                    <li>
                                        <img src="<?php echo base_url(); ?>assets/images/mcAfee_logo.png" alt="mcafee">
                                    </li>
                                </ul>
                            </div><!-- .xs-footer-secure-info END -->
                        </div>
                    </div><!-- .media END -->   
                </div>
                <div class="col-xs-6 col-md-6 col-lg-2 footer-widget">
                    <h3 class="widget-title">Customer Services</h3>
                    <ul class="xs-list">
                          <?php if(empty($_SESSION['session_id'])){ ?>
                          <li><a style="line-height: 20px;
    font-size: 16px;
    letter-spacing: .1px;
    "  href="<?php echo base_url('login'); ?>">Login & Signup</a></li>
              <?php } else{ ?>   
              <li><a href="<?php echo base_url('profile'); ?>">My Account</a></li>
                        <li><a href="<?php echo base_url('orders'); ?>">Order History</a></li>
                         <?php } ?>
                        <li><a href="<?php echo base_url('faq'); ?>">FAQ</a></li>
                        <!--<li><a href="#">Specials</a></li>-->
						 <?php if(empty($_SESSION['session_id'])){ ?>
						 <li><a href="<?php echo base_url('login'); ?>">Customer Service</a></li>
						  <?php } else{ ?> 
                        <li><a href="<?php echo base_url('orders'); ?>">Customer Service</a></li>
                          <?php } ?>
						 <?php if(empty($_SESSION['session_id'])){ ?>
						 <li><a href="<?php echo base_url('login'); ?>">Help Center</a></li>
						  <?php } else{ ?> 
                        <li><a href="<?php echo base_url('orders'); ?>">Help Center</a></li>
                          <?php } ?>
                    </ul><!-- .xs-list END -->
                </div><!-- .footer-widget END -->
                <div class="col-xs-6 col-md-6 col-lg-2 footer-widget">
                    <h3 class="widget-title">Corporation</h3>
                    <ul class="xs-list">
                        <li><a href="<?php echo base_url('about');?>">About us</a></li>
                        <li><a href="<?php echo base_url('termsandconditions');?>">Terms & Condition</a></li>                        
                       <!-- <li><a href="#">Company</a></li>
                        <li><a href="#">Investor Relations</a></li>-->
                        <li><a href="<?php echo base_url('contact'); ?>">Contact Us</a></li>
                         <li><a href="<?php echo base_url('returnpolicy');?>">Return Policy</a></li>
                    </ul><!-- .xs-list END -->
                </div><!-- .footer-widget END -->
            </div>
        </div>
    </div><!-- .xs-footer-main END -->
    <div class="xs-copyright copyright-gray">
        <div class="container">
           <div class="row">
                
                <div class="col-md-6 col-xs-12 col-sm-12">
                    <ul class="xs-social-list version-2">
                        <li><a href="https://www.facebook.com/artnhubshop/" target="_blank"><i class="fa fa-facebook"></i>Facebook</a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i>Linkedin</a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i>Instagram</a></li>
                    </ul><!-- .xs-social-list END -->
                </div>
                <div class="col-md-6 col-xs-12 col-sm-12" style="margin-top: -17px;">
                    <img src="<?php echo base_url(); ?>assets/assets/images/payment.jpg">
                </div>
            </div>
        </div>
    </div><!-- .xs-copyright .copyright-gray END -->
    <!-- back to top -->
    <div class="xs-back-to-top-wraper">
        <a href="#" class="xs-back-to-top btn btn-success"><i class="icon icon-arrow-right" style="margin-right: 20px;"></i></a>
    </div>
    <!-- End back to top -->
</footer> 
<!-- ============================================================= FOOTER : END============================================================= -->
<!-- Modal -->
<div class="modal fade" id="enquiry" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bulk Enquiry</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="Email">Name</label>
                                <input type="text" class="form-control" placeholder="Enter Your Name" required="">
                        </div>
                        <div class="col-md-6">
                            <label for="Email">Email Id</label>
                                <input type="email" class="form-control" placeholder="Enter Your Email Id" required="">
                        </div>
                    </div>

                    <div class="row" style="margin-top: 1%;">
                        <div class="col-md-6">
                            <label for="Phone no.">Phone No.</label>
                                <input type="text" class="form-control" placeholder="Enter Your Phone no." required="">
                        </div>
                        <div class="col-md-6">
                            <label for="Address">Address</label>
                                <input type="text" class="form-control" placeholder="Enter Your Address" required="">
                        </div>
                    </div>

                    <div class="row" style="margin-top: 1%;">
                        <div class="col-md-12">
                            <label for="Message">Message</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 2%;">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
$("ul .tab_list").focus(function () {
    $('.megamenu-tabs-nav').find('.megamenu-tabs-pane').removeClass("active");
    $(this).next().addClass('active');  
});
$("ul.megamenu-tabs-nav .tab_list a").click(function (e) {
    $('.megamenu-tabs-nav').find('.megamenu-tabs-pane').removeClass("active");
    //$('.megamenu-tabs-nav').find('.megamenu-tabs-pane').css({'display':'none'}), 
    e.preventDefault();
    $(this).next().addClass('active');
});
/*$("ul.megamenu-tabs-nav .tab_list").focus(function (e) {
    //$('.megamenu-tabs-nav').find('.megamenu-tabs-pane').removeClass("active");
    //$('.megamenu-tabs-nav').find('.megamenu-tabs-pane').css({'display':'none'}), 
    e.preventDefault();
    
    $(this).addClass('focus active');
    $(this).next().addClass('active');
});
*/
$(".open_menu").click(function(){
    $(".menu_container").toggleClass("active");
});

$(".open_left_menu").click(function(){
    $(".slide_left").toggleClass("active");
    $(".overflow").toggleClass("active");
    $(".close_menu").toggleClass("active");    
});
$(".close_menu").click(function(){
    $(".slide_left").removeClass("active");
    $(this).removeClass("active");
    $(".overflow").removeClass("active");
    $(".left_nav.collapse").removeClass("in");
    $(".navbar-toggle.open_left_menu").addClass("collapsed");    
});

/*Navigation JS*/
$(".open_nav").click(function(e){
    e.preventDefault(); // prevent the default action
    $(this).toggleClass("active");
    $(this).next(".open_nev").toggleClass("active");
});
/*Navigation JS*/
$(document).ready(function() {
    if ($(window).width() <= 768) {
        $('.tab_list').removeClass('active');
    }
});

</script>
 <div class="overflow"></div>
</body>


</html>