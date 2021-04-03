<?php 

include 'headcss.php';
include 'header.php';
?>


<style type="text/css">
    .w3_megamenu .dropdown a,
.w3_megamenu .dropdown-menu  a {
    color:#656565;
}
.w3_megamenu .dropdown-menu > li > a {
    padding:6px 15px;
}
.w3_megamenu .navbar-nav > li > .dropdown-menu {
    margin-top:1px;
}
.w3_megamenu i {
    color:#BFBFBF
}
.w3_megamenu .dropdown-menu {
    box-shadow:none;
    border:1px solid #efefef;
    padding:0;
}
.w3_megamenu .form-control {
    margin-top:10px;
    border:1px solid #efefef;
}
.w3_megamenu .btn {
    margin:10px 0 20px
}
.w3_megamenu video {
    max-width: 100%;
    height: auto;
}
.w3_megamenu iframe,
.w3_megamenu embed,
.w3_megamenu object {
    max-width: 100%;
}
.w3_megamenu .google-map {
    width:100%;
    border:1px solid rgba(255, 255, 255, 0.5);
    min-height:200px;
}
.w3_megamenu div.google-map {
    background:rgba(255, 255, 255, 0.5);
    background: #ffffff;
    height: 200px;
    margin: 0 0 0px 0;
    width: 100%;
}
#googlemaps img{
    max-width:none;
}
.w3_megamenu .dropdown-menu .withoutdesc{
    margin-top:0;
    padding:15px 20px;
    display: block;
    text-align: left;
    text-transform: none;
    width: 100%;
}
.w3_megamenu a:hover {
    text-decoration:none
}
.w3_megamenu .dropdown-menu .withoutdesc ul li {
    padding:3px 10px;
}
.w3_megamenu .dropdown-menu .withoutdesc ul li:hover,
.w3_megamenu .dropdown-menu .withoutdesc ul li:focus{
    color:#262626;
    text-decoration:none;
    background-color:#f5f5f5 !important
}
.w3_megamenu .dropdown-menu .withoutdesc li:last-child {
    border-bottom:0 solid #fff;
}
.w3_megamenu .w3_megamenu-content.withdesc a:after {
    color: #CFCFCF;
    content: attr(data-description);
    display: block;
    font-size: 11px;
    font-weight: 400;
    line-height: 0;
    margin: 10px 0 15px;
    text-transform: uppercase;
}

.w3_megamenu .dropdown-submenu{
    position:relative;
}
.w3_megamenu .dropdown-submenu>.dropdown-menu{
    top:0;
    left:100%;
    margin-top:0;
    margin-left:-1px;
    -webkit-border-radius:0 6px 6px 6px;
    -moz-border-radius:0 6px 6px 6px;
    border-radius:0 6px 6px 6px;
}
.w3_megamenu .dropdown-submenu:hover>.dropdown-menu{
    display:block;
}

.w3_megamenu .dropdown-submenu>a:after{
    display:block;
    content:" ";
    float:right;
    width:0;
    height:0;
    border-color:transparent;
    border-style:solid;
    border-width:5px 0 5px 5px;
    border-left-color:#cccccc;
    margin-top:5px;
    margin-right:-10px;
}
.w3_megamenu .dropdown-submenu:hover>a:after{
    border-left-color:#ffffff;
}
.w3_megamenu .dropdown-submenu.pull-left{
    float:none;
}
.w3_megamenu .dropdown-submenu.pull-left>.dropdown-menu{
    left:-100%;
    margin-left:10px;
    -webkit-border-radius:6px 0 6px 6px;
    -moz-border-radius:6px 0 6px 6px;
    border-radius:6px 0 6px 6px;
}
.w3_megamenu p {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 13px;
    color:#656565;
}
.w3_megamenu .nav,
.w3_megamenu .collapse,
.w3_megamenu .dropup,
.w3_megamenu .dropdown {
    position: static;
}
.w3_megamenu .half {
    width: 50%;
    left: auto !important;
    right: auto !important;
}
.w3_megamenu .container {
    position: relative;
}
.w3_megamenu .dropdown-menu {
    left: auto;
}
.w3_megamenu .nav.navbar-right .dropdown-menu {
    left: auto;
    right: 0;
}
.w3_megamenu .w3_megamenu-content {
    padding: 15px 25px;
    background:#fafafa;
}
.w3_megamenu .dropdown.w3_megamenu-fw .dropdown-menu {
    left: 0;
    right: 0;
}
.w3_megamenu .title {
    font-size:13px;
    font-weight:bold;
    margin-top:15px;
    text-transform:uppercase;
    border-bottom:1px solid #efefef;
    padding-bottom:10px;
}
.w3_megamenu ul {
    list-style:none;
    padding-left:0px;
}













@import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
body {
  font-family: 'Open Sans', 'sans-serif';
}
.mega-dropdown {
  position: static !important;
}
.mega-dropdown-menu {
    padding: 20px 0px;
    width: 100%;
    box-shadow: none;
    -webkit-box-shadow: none;
}
.mega-dropdown-menu > li > ul {
  padding: 0;
  margin: 0;
}
.mega-dropdown-menu > li > ul > li {
  list-style: none;
}
.mega-dropdown-menu > li > ul > li > a {
  display: block;
  color: #222;
  padding: 3px 5px;
}
.mega-dropdown-menu > li ul > li > a:hover,
.mega-dropdown-menu > li ul > li > a:focus {
  text-decoration: none;
}
.mega-dropdown-menu .dropdown-header {
  font-size: 18px;
  color: #ff3546;
  padding: 5px 60px 5px 5px;
  line-height: 30px;
}

.carousel-control {
  width: 30px;
  height: 30px;
  top: -35px;

}
.left.carousel-control {
  right: 30px;
  left: inherit;
}
.carousel-control .glyphicon-chevron-left, 
.carousel-control .glyphicon-chevron-right {
  font-size: 12px;
  background-color: #fff;
  line-height: 30px;
  text-shadow: none;
  color: #333;
  border: 1px solid #ddd;
}
</style>
<script type="text/javascript">
    $(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideDown("400");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true,true).slideUp("400");
            $(this).toggleClass('open');       
        }
    );
});
</script>

<div class="container">
    <div class="row">
<nav class="navbar navbar-default w3_megamenu" role="navigation">
                <div class="navbar-header">
          			<button type="button" data-toggle="collapse" data-target="#defaultmenu" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="#" class="navbar-brand"><i class="fa fa-home"></i></a>
				</div><!-- end navbar-header -->
        
            <div id="defaultmenu" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="javascript:;">Home</a></li>	
                    <!-- Mega Menu -->
					<li class="dropdown w3_megamenu-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">W3lessons<b class="caret"></b></a>
                        <ul class="dropdown-menu fullwidth">
                            <li class="w3_megamenu-content">
                                <div class="row">
                                    <div class="col-sm-4">
                                  		<h3 class="title">Facebook Wall Script</h3>
										<iframe width="400" height="225" src="//www.youtube.com/embed/IHYVUjSK4vA" frameborder="0" allowfullscreen></iframe>
                                    </div><!-- end col-4 -->
                                    <div class="col-sm-4">
                                  		<h3 class="title">HTML5 Tutorials</h3>
                                        <ul class="media-list">
                                            <li class="media"><a href="http://w3lessons.info/2014/04/13/html5-inline-edit-with-php-mysql-jquery-ajax/" class="pull-right"><img src="http://w3lessons.info/wp-content/uploads/2014/04/html5.png" alt="" width="70" class="img-thumbnail media-object"></a>
                                                <div class="media-body">
                                                    <p>HTML5 Inline Edit with PHP, MYSQL & jQuery Ajax</p>
                                                </div>
                                            </li>
                                            <li class="media"><a href="http://w3lessons.info/2014/03/22/advanced-html5-tutorials-client-side-offline-geolocation-part-i/" class="pull-right"><img src="http://w3lessons.info/wp-content/uploads/2014/03/Advanced-HTML5-Tutorials-332x187.png" alt="" width="70" class="img-thumbnail media-object"></a>
                                                <div class="media-body">
                                                    <p>Advanced HTML5 Tutorials - Working Offline, Geolocation, Client Side Data Storage</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div><!-- end col-4 -->
                                    <div class="col-sm-4">
                                  		<h3 class="title">Add Google Map</h3>
                                    		<img src="https://maps.googleapis.com/maps/api/staticmap?center=chennai&zoom=12&size=160x105&maptype=roadmap&markers=color:red%7Cchennai&sensor=false&scale=2">
                                    </div><!-- end col-4 -->
                                </div><!-- end row -->
                                <hr>
                                <div class="row">
                                	<div class="col-sm-6">
                                  		<h3 class="title">About W3lessons.info</h3>
                                    	<p>W3lessons.info is a web2.0 programming blog maintained by Karthikeyan. Tutorials focused on Programming, Jquery, Ajax, CSS3, HTML5, PHP, Web Services etc</p>
                                    </div><!-- end col-6 -->
                                	<div class="col-sm-3">
                                  		<h3 class="title">Follow W3lessons.info</h3>
                                    	<p>  <iframe src="https://www.facebook.com/plugins/like.php?href=https://www.facebook.com/w3lessons.info" scrolling="no" frameborder="0" style="border:none; width:300px; height:120px"></iframe></p>
                                    </div><!-- end col-3 -->
                                	<div class="col-sm-3">
                                  		<h3 class="title">Subscribe</h3>
                                    	<p>        <form  class="fbf-widget" action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onSubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=nextweb2', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
        <input class="subscription_email" type="text" name="email" placeholder="Enter email" /><input type="hidden" value="nextweb2" name="uri"/>
        <input type="hidden" name="loc" value="en_US"/>
        <input class="subscription_btn" type="submit" value ="Go"/>
        </form></p>
                               
                               <p><img src="http://feeds.feedburner.com/~fc/nextweb2?bg=FF9900&amp;fg=000&amp;anim=1&amp;label=readers" height="26" width="88" style="border:0" alt="" /></p>     </div>               
                                </div>
							</li>
                        </ul>
                    </li>
					<li class="dropdown w3_megamenu-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Mega DropDown<b class="caret"></b></a>
                        <ul class="dropdown-menu fullwidth">
                            <li class="w3_megamenu-content withdesc">
                                <div class="row">
                                    <div class="col-sm-3">
                                    	<h3 class="title">CSS3</h3>
                                        <ul>
                                        	<li><a data-description="Image Animation" href="http://w3lessons.info/2014/02/15/animate-images-on-page-scroll-using-jquery-css3/">Animate Images on Page Scroll using jQuery & CSS3</a></li>
                                        	<li><a data-description="Tooltips" href="http://w3lessons.info/2014/02/13/fancy-tooltips-using-css3/">Fancy Tooltips using CSS3</a></li>
                                        	<li><a data-description="Image Animation" href="http://w3lessons.info/2013/11/14/image-hover-effects-using-css3/">Image Hover Effects using CSS3</a></li>
                                        	<li><a data-description="Metro Style Boxes" href="http://w3lessons.info/2013/08/26/animated-windows-metro-boxes-using-css3/">Animated Windows Metro Boxes using CSS3</a></li>
                                        	<li><a data-description="Css3 Skill bar" href="http://w3lessons.info/2013/06/04/skill-bar-with-jquery-css3/">Skill Bar with jQuery & CSS3</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                    	<h3 class="title">jQuery</h3>
                                        <ul>
                                        	<li><a data-description="DropDown Menu" href="http://w3lessons.info/2013/12/26/mashable-style-ajax-drop-down-menu-using-php-mysql-jquery/">Mashable Style Ajax Drop Down Menu using PHP, Mysql & jQuery</a></li>
                                        	<li><a data-description="Facebook Friends Search" href="http://w3lessons.info/2013/12/12/facebook-style-search-friends-using-jquery/">Facebook Style Search Friends using jQuery</a></li>
                                        	<li><a data-description="Text Search" href="http://w3lessons.info/2013/12/11/live-text-search-using-jquery/">Live Text Search using jQuery</a></li>
                                        	<li><a data-description="Security" href="http://w3lessons.info/2013/10/28/secure-web-page-content-using-jquery/">Protect / Secure your Website Content using jQuery</a></li>
                                        	<li><a data-description="Page Speed" href="http://w3lessons.info/2013/07/11/how-to-reduce-web-page-loading-time-with-jquery/">How to reduce web page loading time with jQuery</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                    	<h3 class="title">PHP</h3>
                                        <ul>
                                        	<li><a data-description="Checking Expired Sessions" href="http://w3lessons.info/2014/01/01/how-to-check-expired-sessions-using-php-jquery-ajax/">How to Check Expired Sessions using PHP & jQuery Ajax</a></li>
                                        	<li><a data-description="Smiley Parser" href="http://w3lessons.info/2013/08/11/smiley-parser-with-php/">Smiley Parser with PHP</a></li>
                                        	<li><a data-description="IP address validation" href="http://w3lessons.info/2013/04/01/validate-ipv4-address-in-php/">Validate IPv4 Address in PHP</a></li>
                                        	<li><a data-description="PHP TimeZones" href="http://w3lessons.info/2012/11/11/php-country-time-zones/">PHP Country Time Zones</a></li>
                                        	<li><a data-description="Fixing Urls" href="http://w3lessons.info/2012/09/14/fixing-url-using-php-by-adding-http-https/">Fixing url using PHP by adding http & https</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                    	<h3 class="title">HTMl5</h3>
                                        <ul>
                                        <li><a data-description="HTML5 Inline Edit" href="http://w3lessons.info/2014/04/13/html5-inline-edit-with-php-mysql-jquery-ajax/">HTML5 Inline Edit with PHP, MYSQL & jQuery Ajax</a></li>
                                        	<li><a data-description="Advanced HTML5 Tutorials" href="http://w3lessons.info/2014/03/22/advanced-html5-tutorials-client-side-offline-geolocation-part-i/">Advanced HTML5 Tutorials – Client Side, Offline, Geolocation – Part I</a></li>
                                        	<li><a data-description="HTML5 Chart" href="http://w3lessons.info/2013/04/08/html5-chart/">HTML5 Chart</a></li>
                                        	<li><a data-description="HTML5 Whiteboard Marker" href="http://w3lessons.info/2012/12/22/white-board-drawing-widget-using-html5/">WhiteBoard Drawing Widget using HTML5</a></li>
                                        	<li><a data-description="Free HTML5 Ebook" href="http://w3lessons.info/2012/03/23/free-html5-and-css3-ebook/">Free HTML5 and CSS3 Ebook</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
					</li>
					<li class="dropdown w3_megamenu-fw"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Mega Menu 2 <b class="caret"></b></a>
                        <ul class="dropdown-menu half">
                            <li class="w3_megamenu-content withoutdesc">
                                <div class="row">
                                    <div class="col-sm-6">
                                         <h3 class="title">PHP</h3>
                                        <ul>
                                            <li><a data-description="Facebook Url Expander" href="http://w3lessons.info/2015/06/01/facebook-url-expander-with-jquery-ajax-and-php/">Facebook Url Expander with jQuery Ajax and PHP</a></li>
                                            <li><a data-description="Google oAuth login" href="http://w3lessons.info/2015/05/19/google-oauth-2-0-ajax-login-using-jquery-php-mysql/">Google OAuth 2.0 Ajax Login using jQuery, PHP & MYSQL</a></li>
                                            <li><a data-description="Instant Soundcloud Search" href="http://w3lessons.info/2014/10/01/instant-soundcloud-search-using-php-jquery-ajax/">Instant Soundcloud Search using PHP & jQuery Ajax</a></li>
                                            <li><a data-description="PHP TimeZones" href="http://w3lessons.info/2012/11/11/php-country-time-zones/">PHP Country Time Zones</a></li>
                                            <li><a data-description="Fixing Urls" href="http://w3lessons.info/2012/09/14/fixing-url-using-php-by-adding-http-https/">Fixing url using PHP by adding http & https</a></li>
                                        </ul>

                                    </div>
                                    <div class="col-sm-6">
<h3 class="title">HTMl5</h3>
                                        <ul>
                                        <li><a data-description="HTML5 Inline Edit" href="http://w3lessons.info/2014/04/13/html5-inline-edit-with-php-mysql-jquery-ajax/">HTML5 Inline Edit with PHP, MYSQL & jQuery Ajax</a></li>
                                            <li><a data-description="Advanced HTML5 Tutorials" href="http://w3lessons.info/2014/03/22/advanced-html5-tutorials-client-side-offline-geolocation-part-i/">Advanced HTML5 Tutorials – Client Side, Offline, Geolocation – Part I</a></li>
                                            <li><a data-description="HTML5 Chart" href="http://w3lessons.info/2013/04/08/html5-chart/">HTML5 Chart</a></li>
                                            <li><a data-description="HTML5 Whiteboard Marker" href="http://w3lessons.info/2012/12/22/white-board-drawing-widget-using-html5/">WhiteBoard Drawing Widget using HTML5</a></li>
                                            <li><a data-description="Free HTML5 Ebook" href="http://w3lessons.info/2012/03/23/free-html5-and-css3-ebook/">Free HTML5 and CSS3 Ebook</a></li>
                                        </ul>

                                    </div>
                                </div>
                            </li>
                        </ul>
					</li>
					<li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Facebook <b class="caret"></b></a>
                        <ul class="dropdown-menu" role="menu">

	<li><a href="http://w3lessons.info/2013/10/29/facebook-style-tag-selector-using-jquery-css3/">Facebook Style Tag Selector</a></li>
	<li><a href="http://w3lessons.info/2013/10/17/facebook-style-homepage-design-with-registration-form-login-form-using-css3/">Facebook Style Home Page</a></li>
	<li><a href="http://w3lessons.info/2013/03/22/facebook-like-tooltip-using-jquery-css/">Facebook Style ToolTip</a></li>
	<li><a href="http://w3lessons.info/2012/12/28/css3-facebook-style-buttons/">Facebook Style Buttons</a></li>
	<li><a href="http://w3lessons.info/2012/01/03/facebook-like-fetch-url-data-using-php-curl-jquery-and-ajax/">Facebook Style Url Data Extracter</a></li>
	<li><a href="http://w3lessons.info/2013/05/25/facebook-style-youtube-video-vimeo-video-soundcloud-audio-url-expander-with-jquery-php/">Facebook Style Video Url Expander</a></li>
                            <li class="dropdown-submenu">
                                <a href="#">Wall Scripts</a>
								<ul class="dropdown-menu">
																	<li><a href="http://w3lessons.info/2013/09/24/facebook-wall-script-4-0-with-php-codeigniter-mvc-framework/">Facebook Wall Script 4.0 &#8211; Codeigniter</a></li>
	<li><a href="http://w3lessons.info/2013/04/21/facebook-wall-script-3-0-timeline-oauth-location-sharing-smileys-many-more/">Facebook Wall Script 3.0</a></li>
	<li><a href="http://w3lessons.info/2013/03/24/facebook-timeline-wall-script-2-0-with-php-mysql-jquery/">Facebook Wall Script 2.0</a></li>
								</ul><!-- end dropdown-menu -->
                            </li><!-- end dropdown-submenu -->
                        </ul><!-- end dropdown-menu -->
					</li><!-- end standard drop down -->
					<!-- end dropdown w3_megamenu-fw -->
                </ul><!-- end nav navbar-nav -->
                
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle">Contact Us<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <form id="contact1" action="#" name="contactform" method="post">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <input type="text" name="name" id="name1" class="form-control" placeholder="Name"> 
                                        <input type="text" name="email" id="email1" class="form-control" placeholder="Email"> 
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                        <input type="text" name="phone" id="phone1" class="form-control" placeholder="Phone">
                                        <input type="text" name="subject" id="subject1" class="form-control" placeholder="Subject"> 
                                    </div>
                                    <div class="clearfix"></div>                   
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <textarea class="form-control" name="comments" id="comments1" rows="6" placeholder="Your Message ..."></textarea>
                                    </div>   
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="pull-right">
                                            <input type="submit" value="SEND" id="submit1" class="btn btn-primary small">
                                        </div>  
                                    </div>
                                </form>
                            </li>
                        </ul>
					</li>
				</ul><!-- end nav navbar-nav navbar-right -->
			</div><!-- end #navbar-collapse-1 -->
            
			</nav><!-- end navbar navbar-default w3_megamenu -->



<br><br>



</div>
</div>
<?php 
include 'footer.php';
      ?>