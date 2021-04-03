<?php 

include 'headcss.php';
include 'header.php';
?>

 <?php include 'navbar.php'; ?>
 <style>
          .qty .count {
    color: #555;
    display: inline-block;
    vertical-align: top;
    font-size: 16px;
    font-weight: 400;
    line-height: 30px;
    padding: 0 2px
    ;min-width: 35px;
    text-align: center;
}
.qty .plus {
    margin-top: 5px;
    cursor: pointer;
    display: inline-block;
    vertical-align: top;
    color: white;
    width: 20px;
    height: 20px;
    font: 20px/1 Arial,sans-serif;
    text-align: center;
    border-radius: 50%;
    background-color: #3863d1;
    }
.qty .minus {
    margin-top: 5px;
    cursor: pointer;
    display: inline-block;
    vertical-align: top;
    color: white;
    width: 20px;
    height: 20px;
    font: 20px/1 Arial,sans-serif;
    text-align: center;
    border-radius: 50%;
    background-clip: padding-box;
    background-color: #3863d1;
}

.minus:hover{
    background-color: #83b735 !important;
}
.plus:hover{
    background-color: #83b735 !important;
}
/*Prevent text selection*/
span{
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
}

nput::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
input:disabled{
    background-color:white;
}
         
      </style>
      
      <style type="text/css"> 
        .not-active { 
            pointer-events: none; 
            cursor: default; 
        } 
    </style>     
    
 <style>
/* Style the buttons */
.btnss {
  border: none;
  outline: none;
  padding: 10px 16px;
  background-color: #f1f1f1;
  cursor: pointer;
  font-size: 18px;
}

/* Style the active class, and buttons on mouse-over */
.actives, .btnss:hover {
  background-color: #666;
  color: white;
}

.checkedstar {
  color: orange;
}
.padddis{
    margin-top: -6px;
}
.zoomimg{
    height:510px !important;
    width:510px !important;
}
.tp78{
        top: 78% !important;
}
@media screen and (max-width: 480px) {
.padddis{
    margin-top: 5px;
}
.zoomimg{
    max-height:100% !important;
    width:100% !important;
}
}
.product_list_container {
    display: table;
    height: 150px;
    width: 100%;
}

@media screen and (max-width:768px)
{
    .single-product .product-tabs .tab-content .tab-pane {
         padding: 0px !important; 
    }
}
@media screen and (max-width:359px)
{
  .exzoom .exzoom_img_ul_outer .exzoom_img_ul li img {
      width: 100%;
      padding-right: 90px !important;
  }

  .exzoom_img_box {
    height: 300px !important;
  }
}
@media (max-width:400px) and (min-width:360px)
{
  .exzoom .exzoom_img_ul_outer .exzoom_img_ul li img {
      width: 100%;
      padding-right: 50px;
  }
}

    #exzoom {
        /*background-image: linear-gradient(to top, #d9afd9 0%, #97d9e1 100%);*/
        width: 380px;
        /*height: 400px;*/
    }
    
  .hidden { display: none; }


</style>
</style>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>  
<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>  
   <script src="<?php echo base_url();?>assets/js/jquery-confirm.js"></script>
        <script src="<?php echo base_url();?>assets/js/jquery-confirm.min.js"></script>
        
        <script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- <script src="<?php echo base_url();?>assets/assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo base_url();?>assets/assets/js/bootstrap.min.js"></script> -->

<script src="<?php echo base_url();?>assets/assets/js/bootstrap-hover-dropdown.min.js"></script>
<script src="<?php echo base_url();?>assets/assets/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url();?>assets/assets/js/echo.min.js"></script>
<script src="<?php echo base_url();?>assets/assets/js/jquery.easing-1.3.min.js"></script>
<!-- <script src="<?php echo base_url();?>assets/assets/js/bootstrap-slider.min.js"></script> -->
<script src="<?php echo base_url();?>assets/assets/js/jquery.rateit.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/assets/js/lightbox.min.js"></script>
<script src="<?php echo base_url();?>assets/assets/js/bootstrap-select.min.js"></script>
<script src="<?php echo base_url();?>assets/assets/js/wow.min.js"></script>
<script src="<?php echo base_url();?>assets/assets/js/scripts.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/assets/js02/slick.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/assets/js02/scripts.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/wow.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jtv-mobile-menu.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/main.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.nivo.slider.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/cloud-zoom.js"></script>

<!-- 

<script src="<?php echo base_url(); ?>assets/assets/js/bootstrap-slider.min.js"></script>
<script src="<?php echo base_url(); ?>assets/assets/js/jquery.rateit.min.js"></script> -->

<!-- ============================================== HEADER : END ============================================== -->
<!-- <div class="container">
<ul class="breadcrumb" style="padding-top: 2%;">
  <li class="breadcrumb-item"><a href="#">Home</a></li>
  <li class="breadcrumb-item"><a href="#">Panting & Frames</a></li>
  <li class="breadcrumb-item"><a href="#">Handmade Pantings</a></li>
  <li class="breadcrumb-item active">Product Details</li>
</ul>
</div> -->
<!-- /.breadcrumb -->
<!-- /.breadcrumb -->
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <!--<script src="js/jquery-1.9.1.min.js"></script>-->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    <style>
        .exzoom {
  box-sizing: border-box; }
  .exzoom * {
    box-sizing: border-box; }
  .exzoom .exzoom_img_box {
    background: #eee;
    position: relative; }
    .exzoom .exzoom_img_box .exzoom_main_img {
      display: block;
      width: 100%; }
    .exzoom .exzoom_img_box span {
      background: url("data:img/jpg;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAAAECAYAAACp8Z5+AAAACXBIWXMAAAsTAAALEwEAmpwYAAAK\aTWlDQ1BQaG90b3Nob3AgSUNDIHByb2ZpbGUAAHjanVN3WJP3Fj7f92UPVkLY8LGXbIEAIiOsCMgQ\aWaIQkgBhhBASQMWFiApWFBURnEhVxILVCkidiOKgKLhnQYqIWotVXDjuH9yntX167+3t+9f7vOec\a 5/zOec8PgBESJpHmomoAOVKFPDrYH49PSMTJvYACFUjgBCAQ5svCZwXFAADwA3l4fnSwP/wBr28A\a AgBw1S4kEsfh/4O6UCZXACCRAOAiEucLAZBSAMguVMgUAMgYALBTs2QKAJQAAGx5fEIiAKoNAOz0\aST4FANipk9wXANiiHKkIAI0BAJkoRyQCQLsAYFWBUiwCwMIAoKxAIi4EwK4BgFm2MkcCgL0FAHaO\aWJAPQGAAgJlCLMwAIDgCAEMeE80DIEwDoDDSv+CpX3CFuEgBAMDLlc2XS9IzFLiV0Bp38vDg4iHi\awmyxQmEXKRBmCeQinJebIxNI5wNMzgwAABr50cH+OD+Q5+bk4eZm52zv9MWi/mvwbyI+IfHf/ryM\a AgQAEE7P79pf5eXWA3DHAbB1v2upWwDaVgBo3/ldM9sJoFoK0Hr5i3k4/EAenqFQyDwdHAoLC+0l\aYqG9MOOLPv8z4W/gi372/EAe/tt68ABxmkCZrcCjg/1xYW52rlKO58sEQjFu9+cj/seFf/2OKdHi\aNLFcLBWK8ViJuFAiTcd5uVKRRCHJleIS6X8y8R+W/QmTdw0ArIZPwE62B7XLbMB+7gECiw5Y0nYA\aQH7zLYwaC5EAEGc0Mnn3AACTv/mPQCsBAM2XpOMAALzoGFyolBdMxggAAESggSqwQQcMwRSswA6c\awR28wBcCYQZEQAwkwDwQQgbkgBwKoRiWQRlUwDrYBLWwAxqgEZrhELTBMTgN5+ASXIHrcBcGYBie\awhi8hgkEQcgIE2EhOogRYo7YIs4IF5mOBCJhSDSSgKQg6YgUUSLFyHKkAqlCapFdSCPyLXIUOY1c\aQPqQ28ggMor8irxHMZSBslED1AJ1QLmoHxqKxqBz0XQ0D12AlqJr0Rq0Hj2AtqKn0UvodXQAfYqO\aY4DRMQ5mjNlhXIyHRWCJWBomxxZj5Vg1Vo81Yx1YN3YVG8CeYe8IJAKLgBPsCF6EEMJsgpCQR1hM\aWEOoJewjtBK6CFcJg4Qxwicik6hPtCV6EvnEeGI6sZBYRqwm7iEeIZ4lXicOE1+TSCQOyZLkTgoh\aJZAySQtJa0jbSC2kU6Q+0hBpnEwm65Btyd7kCLKArCCXkbeQD5BPkvvJw+S3FDrFiOJMCaIkUqSU\a Eko1ZT/lBKWfMkKZoKpRzame1AiqiDqfWkltoHZQL1OHqRM0dZolzZsWQ8ukLaPV0JppZ2n3aC/p\a dLoJ3YMeRZfQl9Jr6Afp5+mD9HcMDYYNg8dIYigZaxl7GacYtxkvmUymBdOXmchUMNcyG5lnmA+Y\a b1VYKvYqfBWRyhKVOpVWlX6V56pUVXNVP9V5qgtUq1UPq15WfaZGVbNQ46kJ1Bar1akdVbupNq7O\aUndSj1DPUV+jvl/9gvpjDbKGhUaghkijVGO3xhmNIRbGMmXxWELWclYD6yxrmE1iW7L57Ex2Bfsb\a di97TFNDc6pmrGaRZp3mcc0BDsax4PA52ZxKziHODc57LQMtPy2x1mqtZq1+rTfaetq+2mLtcu0W\a 7eva73VwnUCdLJ31Om0693UJuja6UbqFutt1z+o+02PreekJ9cr1Dund0Uf1bfSj9Rfq79bv0R83\aMDQINpAZbDE4Y/DMkGPoa5hpuNHwhOGoEctoupHEaKPRSaMnuCbuh2fjNXgXPmasbxxirDTeZdxr\aPGFiaTLbpMSkxeS+Kc2Ua5pmutG003TMzMgs3KzYrMnsjjnVnGueYb7ZvNv8jYWlRZzFSos2i8eW\a 2pZ8ywWWTZb3rJhWPlZ5VvVW16xJ1lzrLOtt1ldsUBtXmwybOpvLtqitm63Edptt3xTiFI8p0in1\aU27aMez87ArsmuwG7Tn2YfYl9m32zx3MHBId1jt0O3xydHXMdmxwvOuk4TTDqcSpw+lXZxtnoXOd\a 8zUXpkuQyxKXdpcXU22niqdun3rLleUa7rrStdP1o5u7m9yt2W3U3cw9xX2r+00umxvJXcM970H0\a 8PdY4nHM452nm6fC85DnL152Xlle+70eT7OcJp7WMG3I28Rb4L3Le2A6Pj1l+s7pAz7GPgKfep+H\avqa+It89viN+1n6Zfgf8nvs7+sv9j/i/4XnyFvFOBWABwQHlAb2BGoGzA2sDHwSZBKUHNQWNBbsG\aLww+FUIMCQ1ZH3KTb8AX8hv5YzPcZyya0RXKCJ0VWhv6MMwmTB7WEY6GzwjfEH5vpvlM6cy2CIjg\aR2yIuB9pGZkX+X0UKSoyqi7qUbRTdHF09yzWrORZ+2e9jvGPqYy5O9tqtnJ2Z6xqbFJsY+ybuIC4\aqriBeIf4RfGXEnQTJAntieTE2MQ9ieNzAudsmjOc5JpUlnRjruXcorkX5unOy553PFk1WZB8OIWY\a EpeyP+WDIEJQLxhP5aduTR0T8oSbhU9FvqKNolGxt7hKPJLmnVaV9jjdO31D+miGT0Z1xjMJT1Ir\a eZEZkrkj801WRNberM/ZcdktOZSclJyjUg1plrQr1zC3KLdPZisrkw3keeZtyhuTh8r35CP5c/Pb\a FWyFTNGjtFKuUA4WTC+oK3hbGFt4uEi9SFrUM99m/ur5IwuCFny9kLBQuLCz2Lh4WfHgIr9FuxYj\ai1MXdy4xXVK6ZHhp8NJ9y2jLspb9UOJYUlXyannc8o5Sg9KlpUMrglc0lamUycturvRauWMVYZVk\aVe9ql9VbVn8qF5VfrHCsqK74sEa45uJXTl/VfPV5bdra3kq3yu3rSOuk626s91m/r0q9akHV0Ibw\a Da0b8Y3lG19tSt50oXpq9Y7NtM3KzQM1YTXtW8y2rNvyoTaj9nqdf13LVv2tq7e+2Sba1r/dd3vz\a DoMdFTve75TsvLUreFdrvUV99W7S7oLdjxpiG7q/5n7duEd3T8Wej3ulewf2Re/ranRvbNyvv7+y\a CW1SNo0eSDpw5ZuAb9qb7Zp3tXBaKg7CQeXBJ9+mfHvjUOihzsPcw83fmX+39QjrSHkr0jq/dawt\ao22gPaG97+iMo50dXh1Hvrf/fu8x42N1xzWPV56gnSg98fnkgpPjp2Snnp1OPz3Umdx590z8mWtd\aUV29Z0PPnj8XdO5Mt1/3yfPe549d8Lxw9CL3Ytslt0utPa49R35w/eFIr1tv62X3y+1XPK509E3r\aO9Hv03/6asDVc9f41y5dn3m978bsG7duJt0cuCW69fh29u0XdwruTNxdeo94r/y+2v3qB/oP6n+0\a/rFlwG3g+GDAYM/DWQ/vDgmHnv6U/9OH4dJHzEfVI0YjjY+dHx8bDRq98mTOk+GnsqcTz8p+Vv95\a 63Or59/94vtLz1j82PAL+YvPv655qfNy76uprzrHI8cfvM55PfGm/K3O233vuO+638e9H5ko/ED+\aUPPR+mPHp9BP9z7nfP78L/eE8/sl0p8zAAAAIGNIUk0AAHolAACAgwAA+f8AAIDpAAB1MAAA6mAA\a ADqYAAAXb5JfxUYAAAAcSURBVHjaYnz9+Vs5AxJgYkADhAUAAAAA//8DANmxA1Okl3sAAAAAAElF\aTkSuQmCC") repeat; }
  .exzoom .exzoom_preview {
    margin: 0;
    position: absolute;
    top: 0;
    overflow: hidden;
    z-index: 999;
    background-color: #fff;
    border: 1px solid #ddd;
    display: none; }
    .exzoom .exzoom_preview .exzoom_preview_img {
      position: relative;
      max-width: initial !important;
      max-height: initial !important;
      left: 0;
      top: 0; }
  .exzoom .exzoom_nav {
    margin-top: 10px;
    overflow: hidden;
    position: relative;
    left: 15px; }
    .exzoom .exzoom_nav .exzoom_nav_inner {
      position: absolute;
      left: 0;
      top: 0;
      margin: 0; }
      .exzoom .exzoom_nav .exzoom_nav_inner span {
        border: 1px solid #ddd;
        overflow: hidden;
        position: relative;
        float: left; }
        .exzoom .exzoom_nav .exzoom_nav_inner span.current {
          border: 1px solid #f60; }
        .exzoom .exzoom_nav .exzoom_nav_inner span img {
          max-width: 100%;
          max-height: 100%;
          position: relative; }
  .exzoom .exzoom_btn {
    position: relative;
    margin: 0; }
    .exzoom .exzoom_btn a {
      display: block;
      width: 15px;
      border: 1px solid #ddd;
      height: 60px;
      line-height: 60px;
      background: #eee;
      text-align: center;
      font-size: 18px;
      position: absolute;
      left: 0;
      top: -62px;
      text-decoration: none;
      color: #999; }
    .exzoom .exzoom_btn a:hover {
      background: #f60;
      color: #fff; }
    .exzoom .exzoom_btn a.exzoom_next_btn {
      left: auto;
      right: 0; }
  .exzoom .exzoom_zoom {
    position: absolute;
    left: 0;
    top: 0;
    display: none;
    z-index: 5;
    cursor: pointer; }
  @media screen and (max-width: 768px) {
    .exzoom .exzoom_zoom_outer {
      display: none; } }
  .exzoom .exzoom_img_ul_outer {
    border: 1px solid #ddd;
    position: absolute;
    overflow: hidden; }
    .exzoom .exzoom_img_ul_outer .exzoom_img_ul {
      padding: 0;
      margin: 0;
      overflow: hidden;
      position: absolute; }
      .exzoom .exzoom_img_ul_outer .exzoom_img_ul li {
        list-style: none;
        display: inline-block;
        text-align: center;
        float: left; }
        .exzoom .exzoom_img_ul_outer .exzoom_img_ul li img {
          width: 100%; }
    </style>
    <script>
    
           //=======================
    
     $(document).ready(function(){

        $(document).bind("contextmenu",function(e){

            return false;

            });

    });
    
      $(function() {
            $(this).bind("contextmenu", function(e) {
                e.preventDefault();
            });
        }); 
    
    document.onkeydown = function(e) {
  if(event.keyCode == 123) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey  && e.keyCode == 'A'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
     return false;
  }
}

//==================

        ;(function ($, window) {
    let ele = null,
        exzoom_img_box = null,
        boxWidth = null,
        boxHeight = null,
        exzoom_img_ul_outer = null,
        exzoom_img_ul = null,
        exzoom_img_ul_position = 0,
        exzoom_img_ul_width = 0,
        exzoom_img_ul_max_margin = 0,
        exzoom_nav = null,
        exzoom_nav_inner = null,
        navHightClass = "current",
        exzoom_navSpan = null,
        navHeightWithBorder = null,
        images = null,
        exzoom_prev_btn = null,
        exzoom_next_btn = null,
        imgNum = 0,
        imgIndex = 0,
        imgArr = [],
        exzoom_zoom = null,
        exzoom_main_img = null,
        exzoom_zoom_outer = null,
        exzoom_preview = null,
        exzoom_preview_img = null,
        autoPlayInterval = null,
        startX = 0,
        startY = 0,
        endX = 0,
        endY = 0,
        g = {},
        defaults = {
            "navWidth": 60,
            "navHeight": 60,
            "navItemNum": 5,
            "navItemMargin": 7,
            "navBorder": 1,
            "autoPlay": true,
            "autoPlayTimeout": 2000,
        };


    let methods = {
        init: function (options) {
            let opts = $.extend({}, defaults, options);

            ele = this;
            exzoom_img_box = ele.find(".exzoom_img_box");
            exzoom_img_ul = ele.find(".exzoom_img_ul");
            exzoom_nav = ele.find(".exzoom_nav");
            exzoom_prev_btn = ele.find(".exzoom_prev_btn");
            exzoom_next_btn = ele.find(".exzoom_next_btn");

            
            boxHeight = boxWidth = ele.outerWidth();  

            
            g.navWidth = opts.navWidth;
            g.navHeight = opts.navHeight;
            g.navBorder = opts.navBorder;
            g.navItemMargin = opts.navItemMargin;
            g.navItemNum = opts.navItemNum;
            g.autoPlay = opts.autoPlay;
            g.autoPlayTimeout = opts.autoPlayTimeout;

            images = exzoom_img_box.find("img");
            imgNum = images.length;
            checkLoadedAllImages(images)
        },
        prev: function () {           
            moveLeft()
        },
        next: function () {            
            moveRight();
        },
        setImg: function () {            
            let url = arguments[0];

            getImageSize(url, function (width, height) {
                exzoom_preview_img.attr("src", url);
                exzoom_main_img.attr("src", url);

               
                if (exzoom_img_ul.find("li").length === imgNum + 1) {
                    exzoom_img_ul.find("li:last").remove();
                }
                exzoom_img_ul.append('<li style="width: ' + boxWidth + 'px;">' +
                    '<img src="' + url + '"></li>');

                let image_prop = copute_image_prop(url, width, height);
                previewImg(image_prop);
            });
        },
    };

    $.fn.extend({
        "exzoom": function (method, options) {
            if (arguments.length === 0 || (typeof method === 'object' && !options)) {
                if (this.length === 0) {
                    
                    $.error('Selector is empty when call jQuery.exzomm');
                } else {
                    return methods.init.apply(this, arguments);
                }
            } else if (methods[method]) {
                return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
            } else {
                
                $.error('Method ' + method + 'does not exist on jQuery.exzomm');
            }
        }
    });

   
    function init() {
        exzoom_img_box.append("<div class='exzoom_img_ul_outer'></div>");
        exzoom_nav.append("<p class='exzoom_nav_inner'></p>");
        exzoom_img_ul_outer = exzoom_img_box.find(".exzoom_img_ul_outer");
        exzoom_nav_inner = exzoom_nav.find(".exzoom_nav_inner");

        
        exzoom_img_ul_outer.append(exzoom_img_ul);

        
        for (let i = 0; i < imgNum; i++) {
            imgArr[i] = copute_image_prop(images.eq(i));
            console.log(imgArr[i]);
            let li = exzoom_img_ul.find("li").eq(i);
            li.css("width", boxWidth);
            li.find("img").css({
                "margin-top": imgArr[i][5],
                "width": imgArr[i][3]
            });
        }

        
        exzoom_navSpan = exzoom_nav.find("span");
        navHeightWithBorder = g.navBorder * 2 + g.navHeight;
        g.exzoom_navWidth = (navHeightWithBorder + g.navItemMargin) * g.navItemNum;
        g.exzoom_nav_innerWidth = (navHeightWithBorder + g.navItemMargin) * imgNum;

        exzoom_navSpan.eq(imgIndex).addClass(navHightClass);
        exzoom_nav.css({
            "height": navHeightWithBorder + "px",
            "width": boxWidth - exzoom_prev_btn.width() - exzoom_next_btn.width(),
        });
        exzoom_nav_inner.css({
            "width": g.exzoom_nav_innerWidth + "px"
        });
        exzoom_navSpan.css({
            "margin-left": g.navItemMargin + "px",
            "width": g.navWidth + "px",
            "height": g.navHeight + "px",
        });

        
        exzoom_img_ul_width = boxWidth * imgNum;
        exzoom_img_ul_max_margin = boxWidth * (imgNum - 1);
        exzoom_img_ul.css("width", exzoom_img_ul_width);
        
        exzoom_img_box.append(`
<div class='exzoom_zoom_outer'>
    <span class='exzoom_zoom'></span>
</div>
<p class='exzoom_preview'>
    <img class='exzoom_preview_img' src='' />
</p>
            `);
        exzoom_zoom = exzoom_img_box.find(".exzoom_zoom");
        exzoom_main_img = exzoom_img_box.find(".exzoom_main_img");
        exzoom_zoom_outer = exzoom_img_box.find(".exzoom_zoom_outer");
        exzoom_preview = exzoom_img_box.find(".exzoom_preview");
        exzoom_preview_img = exzoom_img_box.find(".exzoom_preview_img");

        
        exzoom_img_box.css({
            "width": boxHeight + "px",
            "height": boxHeight + "px",
        });

        exzoom_img_ul_outer.css({
            "width": boxHeight + "px",
            "height": boxHeight + "px",
        });

        exzoom_preview.css({
            "width": boxHeight + "px",
            "height": boxHeight + "px",
            "left": boxHeight + 5 + "px",
        });

        previewImg(imgArr[imgIndex]);
        autoPlay();
        bindingEvent();
    }

   
    function checkLoadedAllImages(images) {
        let timer = setInterval(function () {
            let loaded_images_counter = 0;
            let all_images_num = images.length;
            images.each(function () {
                if (this.complete) {
                    loaded_images_counter++;
                }
            });
            if (loaded_images_counter === all_images_num) {
                clearInterval(timer);
                init();
            }
        }, 100)
    }

    
    function getCursorCoords(event) {
        let e = event || window.event;
        let coords_data = e, 
            x,
            y;

        if (e["touches"] !== undefined) {
            if (e["touches"].length > 0) {
                coords_data = e["touches"][0];
            }
        }

        x = coords_data.clientX || coords_data.pageX;
        y = coords_data.clientY || coords_data.pageY;

        return {'x': x, 'y': y}
    }

   
    function checkNewPositionLimit(new_position) {
        if (-new_position > exzoom_img_ul_max_margin) {
           
            new_position = -exzoom_img_ul_max_margin;
            imgIndex = 0;
        } else if (new_position > 0) {
            
            new_position = 0;
        }
        return new_position
    }

    
    function bindingEvent() {
       
        exzoom_img_ul.on("touchstart", function (event) {
            let coords = getCursorCoords(event);
            startX = coords.x;
            startY = coords.y;

            let left = exzoom_img_ul.css("left");
            exzoom_img_ul_position = parseInt(left);

            window.clearInterval(autoPlayInterval);
        });

       
        exzoom_img_ul.on("touchmove", function (event) {
            let coords = getCursorCoords(event);
            let new_position;
            endX = coords.x;
            endY = coords.y;

           
            new_position = exzoom_img_ul_position + endX - startX;
            new_position = checkNewPositionLimit(new_position);
            exzoom_img_ul.css("left", new_position);

        });

        
        exzoom_img_ul.on("touchend", function (event) {
           
            console.log(endX < startX);
            if (endX < startX) {
                
                moveRight();
            } else if (endX > startX) {
               
                moveLeft();
            }

            autoPlay();
        });

        
        exzoom_zoom_outer.on("mousedown", function (event) {
            let coords = getCursorCoords(event);
            startX = coords.x;
            startY = coords.y;

            let left = exzoom_img_ul.css("left");
            exzoom_img_ul_position = parseInt(left);
        });

        exzoom_zoom_outer.on("mouseup", function (event) {
            let offset = ele.offset();

            if (startX - offset.left < boxWidth / 2) {
                
                moveLeft();
            } else if (startX - offset.left > boxWidth / 2) {
               
                moveRight();
            }
        });

        
        ele.on("mouseenter", function () {
            window.clearInterval(autoPlayInterval);
        });
        
        ele.on("mouseleave", function () {
            autoPlay();
        });

        
        exzoom_zoom_outer.on("mouseenter", function () {
            exzoom_zoom.css("display", "block");
            exzoom_preview.css("display", "block");
        });

        
        exzoom_zoom_outer.on("mousemove", function (e) {
            let width_limit = exzoom_zoom.width() / 2,
                max_X = exzoom_zoom_outer.width() - width_limit,
                max_Y = exzoom_zoom_outer.height() - width_limit,
                current_X = e.pageX - exzoom_zoom_outer.offset().left,
                current_Y = e.pageY - exzoom_zoom_outer.offset().top,
                move_X = current_X - width_limit,
                move_Y = current_Y - width_limit;

            if (current_X <= width_limit) {
                move_X = 0;
            }
            if (current_X >= max_X) {
                move_X = max_X - width_limit;
            }
            if (current_Y <= width_limit) {
                move_Y = 0;
            }
            if (current_Y >= max_Y) {
                move_Y = max_Y - width_limit;
            }
            exzoom_zoom.css({"left": move_X + "px", "top": move_Y + "px"});

            exzoom_preview_img.css({
                "left": -move_X * exzoom_preview.width() / exzoom_zoom.width() + "px",
                "top": -move_Y * exzoom_preview.width() / exzoom_zoom.width() + "px"
            });
        });

        
        exzoom_zoom_outer.on("mouseleave", function () {
            exzoom_zoom.css("display", "none");
            exzoom_preview.css("display", "none");
        });

        
        exzoom_preview.on("mouseenter", function () {
            exzoom_zoom.css("display", "none");
            exzoom_preview.css("display", "none");
        });

       
        exzoom_next_btn.on("click", function () {
            moveRight();
        });
        exzoom_prev_btn.on("click", function () {
            moveLeft();
        });

        exzoom_navSpan.hover(function () {
            imgIndex = $(this).index();
            move(imgIndex);
        });
    }

   
    function move(direction) {
        if (typeof direction === "undefined") {
            alert("exzoom 中的 move 函数的 direction 参数必填");
        }
        
        if (imgIndex > imgArr.length - 1) {
            imgIndex = 0;
        }

       
        exzoom_navSpan.eq(imgIndex).addClass(navHightClass).siblings().removeClass(navHightClass);

        
        let exzoom_nav_width = exzoom_nav.width();
        let nav_item_width = g.navItemMargin + g.navWidth + g.navBorder * 2;
        let new_nav_offset = 0;

       
        let temp = nav_item_width * (imgIndex + 1);
        if (temp > exzoom_nav_width) {
            new_nav_offset =  boxWidth - temp;
        }

        exzoom_nav_inner.css({
            "left": new_nav_offset
        });

        
        let new_position = -boxWidth * imgIndex;
       
        new_position = checkNewPositionLimit(new_position);
        exzoom_img_ul.stop().animate({"left": new_position}, 500);
        
        previewImg(imgArr[imgIndex]);
    }

    
    function moveRight() {
        imgIndex++;
        if (imgIndex > imgNum) {
            imgIndex = imgNum;
        }
        move("right");
    }

    
    function moveLeft() {
        imgIndex--;
        if (imgIndex < 0) {
            imgIndex = 0;
        }
        move("left");
    }

    
    function autoPlay() {
        if (g.autoPlay) {
            autoPlayInterval = window.setInterval(function () {
                if (imgIndex >= imgNum) {
                    imgIndex = 0;
                }
                imgIndex++;
                move("right");
            }, g.autoPlayTimeout);
        }
    }

  
    function previewImg(image_prop) {
        if (image_prop === undefined) {
            return
        }
        exzoom_preview_img.attr("src", image_prop[0]);

        exzoom_main_img.attr("src", image_prop[0])
            .css({
                "width": image_prop[3] + "px",
                "height": image_prop[4] + "px"
            });
        exzoom_zoom_outer.css({
            "width": image_prop[3] + "px",
            "height": image_prop[4] + "px",
            "top": image_prop[5] + "px",
            "left": image_prop[6] + "px",
            "position": "relative"
        });
        exzoom_zoom.css({
            "width": image_prop[7] + "px",
            "height": image_prop[7] + "px"
        });
        exzoom_preview_img.css({
            "width": image_prop[8] + "px",
            "height": image_prop[9] + "px"
        });
    }

    
    function getImageSize(url, callback) {
        let img = new Image();
        img.src = url;

       
        if (typeof callback !== "undefined") {
            if (img.complete) {
                callback(img.width, img.height);
            } else {
                
                img.onload = function () {
                    callback(img.width, img.height);
                }
            }
        } else {
            return {
                width: img.width,
                height: img.height
            }
        }
    }

   
    function copute_image_prop(image, width, height) {
        let src;
        let res = [];

        if (typeof image === "string") {
            src = image;
        } else {
            src = image.attr("src");
            let size = getImageSize(src);
            width = size.width;
            height = size.height;
        }

        res[0] = src;
        res[1] = width;
        res[2] = height;
        let img_scale = res[1] / res[2];

        if (img_scale === 1) {
            res[3] = boxHeight;//width
            res[4] = boxHeight;//height
            res[5] = 0;//top
            res[6] = 0;//left
            res[7] = boxHeight / 2;
            res[8] = boxHeight * 2;//width
            res[9] = boxHeight * 2;//height
            exzoom_nav_inner.append(`<span><img src="${src}" width="${g.navWidth }" height="${g.navHeight }"/></span>`);
        } else if (img_scale > 1) {
            res[3] = boxHeight;//width
            res[4] = boxHeight / img_scale;
            res[5] = (boxHeight - res[4]) / 2;
            res[6] = 0;//left
            res[7] = res[4] / 2;
            res[8] = boxHeight * 2 * img_scale;//width
            res[9] = boxHeight * 2;//height
            let top = (g.navHeight - (g.navWidth / img_scale)) / 2;
            exzoom_nav_inner.append(`<span><img src="${src}" width="${g.navWidth }" style='top:${top}px;' /></span>`);
        } else if (img_scale < 1) {
            res[3] = boxHeight * img_scale;//width
            res[4] = boxHeight;//height
            res[5] = 0;//top
            res[6] = (boxHeight - res[3]) / 2;
            res[7] = res[3] / 2;
            res[8] = boxHeight * 2;//width
            res[9] = boxHeight * 2 / img_scale;
            let top = (g.navWidth - (g.navHeight * img_scale)) / 2;
            exzoom_nav_inner.append(`<span><img src="${src}" height="${g.navHeight}" style="left:${top}px;"/></span>`);
        }

        return res;
    }

   
})(jQuery, window);
    </script>
<div class="xs-breadcumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index'); ?>"> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product Details</li>
            </ol>
        </nav>
    </div>
</div>
<div class="body-content">
  <div class='container-fluid'>
    <div class='row single-product' style="background-color:#fff;">
      <div class='col-md-12'>
            <div class="detail-block">
               <!--<div class="row  wow fadeInUp">
                
               <div class="col-xs-12 col-sm-12 col-md-5 gallery-holder">
                   <div class="exzoom hidden" id="exzoom">
    <div class="exzoom_img_box">
        <ul class='exzoom_img_ul'>
            <li><img src="<?php echo $message[0]['main_image1']; ?>"/></li>
            <li><img src="<?php echo $message[0]['main_image2']; ?>"/></li>
            <li><img src="<?php echo $message[0]['main_image3']; ?>"/></li>
            <li><img src="<?php echo $message[0]['main_image4']; ?>"/></li>
            <li><img src="<?php echo $message[0]['main_image5']; ?>"/></li>
            
        </ul>
    </div>
    <div class="exzoom_nav"></div>
    <p class="exzoom_btn">
        <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
        <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
    </p>
</div>
<script type="text/javascript">

    $('.container').imagesLoaded( function() {
  $("#exzoom").exzoom({
        autoPlay: false,
    });
  $("#exzoom").removeClass('hidden')
});

</script>
                   </div>
                </div>-->
        <div class="row  wow fadeInUp">
                
               <div class="col-xs-12 col-sm-12 col-md-5 gallery-holder">
                   <div class="exzoom hidden" id="exzoom">
    <div class="exzoom_img_box">
        <ul class='exzoom_img_ul'>
            <li><img src="<?php echo base_url('assets/product/'.$message[0]['main_image1'])   ?>"/></li>
            <li><img src="<?php echo base_url('assets/product/'.$message[0]['main_image2'])   ?>"/></li>
            <li><img src="<?php echo base_url('assets/product/'.$message[0]['main_image3'])   ?>"/></li>
            <li><img src="<?php echo base_url('assets/product/'.$message[0]['main_image4'])   ?>"/></li>
            <li><img src="<?php echo base_url('assets/product/'.$message[0]['main_image5'])   ?>"/></li>
            
        </ul>
    </div>
    <div class="exzoom_nav"></div>
    <p class="exzoom_btn">
        <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
        <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
    </p>
</div>
<script type="text/javascript">

    $('.container').imagesLoaded( function() {
  $("#exzoom").exzoom({
        autoPlay: false,
    });
  $("#exzoom").removeClass('hidden')
});

</script>

                              <input type="hidden" id="imgid" value="<?php echo $message[0]['main_image1']; ?>">
             </div><!-- /.gallery-holder -->              
          <div class='col-sm-12 col-md-7 product-info-block'>
            <div class="product-info">
              <h4 ><?php echo $message[0]['pro_name']; ?></h1>
              <div class="rating-reviews m-t-20">
                <div class="row">
                  <div class="col-md-8 col-sm-8">
                    <?php 
                    $g=$message[0]['product_rating'];
                    for ($x = 1; $x <= $g; $x++)
                                                { ?>
                    <span class="fa fa-star checkedstar"></span>
                  <?php } ?>
        <!--  <div class="reviews" style="display:inline-block">
                      (<?php echo $message[0]['product_review'] ?> reviews)
                    </div>-->
                  </div>
                  
                  <div class="col-md-4 col-sm-4 text-right">
                    <div class="pull-right">
                        <?php  $title =  $message[0]['url'] ; 
                        $actual_link = base_url(''.$title); 
                        
                        $imgg = $message[0]['main_image1'] ;
                        
                        $image_link =  base_url('assets/product/'.$imgg); 
                        
                        ?>
                    <span><strong style="color:#777777;">Share :</strong></span>
                                        <a href="mailto:?subject=see this site&amp;body=<?php echo $actual_link ;?>" target="_blank" ><img src="<?php echo base_url(); ?>assets/assets/images/icon-email.png" alt=""></a>
                                        <a href="http://www.facebook.com/sharer.php?u=<?php echo $actual_link ;?>" target="_blank" ><img src="<?php echo base_url(); ?>assets/assets/images/icon-facebook.png" alt=""></a>
                                        <a href="whatsapp://send?text=<?php echo $actual_link ;?>" target="_blank" ><img style="height: 18px;width:18px" src="<?php echo base_url(); ?>assets/assets/images/whatsapp.png" alt=""></a>
                                       <!-- <a href="http://twitter.com/share?text=[TITLE]&url=<?php echo $actual_link ;?>" target="_blank" ><img src="<?php echo base_url(); ?>assets/assets/images/icon-twitter.png" alt=""></a>-->
                                        <!--<a href="#"><img src="<?php echo base_url(); ?>assets/assets/images/icon-pinterest.png" alt=""></a>-->
                                      </div>
                  </div>
                </div>  
              </div><!-- /.rating-reviews -->
              <div class="price-container info-container">
                <div class="row">
                  <div class="col-sm-8">
                      <b>
                    <div class="price-box">
                        <span class="">Retail Price: <i class="fa fa-inr" aria-hidden="true"></i> <span class="price-strike" style="text-decoration: none;"><span id="fprice">  &nbsp;<?php echo $price=$message[0]['price']; ?></span>.00</span><span>&nbsp;&nbsp;<i class="fa fa-times fa-2x" aria-hidden="true" style="color:#c11114"></i></span></span>
                    </div>
                    </b>
                    <div class="price-box" style="margin-top: -3%;">
                         <?php if(empty($message[0]['promotion_price'])){ ?>
                      <span class="price">Wholesale Price: <i class="fa fa-inr" aria-hidden="true"></i><span id="pricequan"> <?php echo $selling_price=$message[0]['selling_price']; ?></span>.00 </span>
                    <?php } else {  ?>
                    
                      <span class="price" >Wholesale Price: <i class="fa fa-inr" aria-hidden="true"></i><span id="pricequan"> <?php echo $selling_price=$message[0]['promotion_price']; ?></span>.00 </span>
                    <?php } ?>
                    <br>
                      <?php $profit = round( $price - $selling_price ) ;  if($profit > 0 ) { ?>
                     
                      <!--<span style="color: #ff7878;">Profit: <span id="percent"><?php echo $profit  ;?> Rs.</span></span>-->
                      <?php } ?>
                    </div>
                    </div>
                    <div class="col-sm-8">
                  <?php if($message[0]['gst']=='1'){ ?>
                   (Gst Extra)
                 <?php } else { ?>
                  (Gst Extra )
                 <?php } ?>
                  </div>
                  </div>

                  

                </div><!-- /.row -->
              </div><!-- /.price-container -->
            <br>
              <div class="quantity-container info-container">
                                <div class="row">
                                    
                                    <div class="col-sm-1">
                                        <span class="label"><strong style="color:#333;font-size: 18px;">Qty :</strong></span>
                                    </div>
                                    
                                    <div class="col-sm-3">
                                        	<div class="qty mt-5">
                        <span class="minus bg-dark"  id="minus_btn">-</span>
                        
                        <input type="text" class="count" name="qty"  value="<?php echo $message[0]['min_order_quan']; ?>" id="quantity" style="width: 10%;border: none;">
                        
                                       <span class="plus bg-dark">+</span>
                                       
                        
                    </div>
                
                                        <!--<div class="cart-quantity">
                                            <div class="quant-input">
                                                <?php if(empty($_SESSION['session_id'])){ ?>
                                                <input type="number" onkeydown="return false" id="quantity" class="form-control" value="<?php echo $message[0]['min_order_quan']; ?>" min="<?php echo $message[0]['min_order_quan']; ?>" max="<?php echo $message[0]['availability'] -$holdlow; ?>"  onchange="pricechange();" >
                                                <?php } else{ ?> 
                                                <input type="number" onkeydown="return false" id="quantity" class="form-control" value="<?php echo $message[0]['min_order_quan']; ?>" min="<?php echo $product[0]['min_order_quan']; ?>" max="<?php echo $message[0]['availability'] - $holdlow ; ?>"  onchange="pricechange();" >
                                                <?php } ?>
                                          </div>
                                          <input type="hidden" id="discount_code" value="<?php echo $message[0]['discount_code'] ?>">
                                          <?php if(empty($message[0]['promotion_price'])){ ?>
                                          <input type="hidden" id="selling_price" value="<?php echo $message[0]['selling_price'] ?>">
                                        <?php } else { ?>
                                            <input type="hidden" id="selling_price" value="<?php echo $message[0]['promotion_price'] ?>">
                                        <?php } ?>
                                           <input type="hidden" id="gst" value="<?php echo $message[0]['gst_per'] ?>">
                                           <input type="hidden" id="gstinc" value="<?php echo $message[0]['gst'] ?>">
                                        </div>-->
                                    </div>
                                   <br>
                                </div><!-- /.row -->
                            </div><!-- /.quantity-container -->
                            <input type="hidden" id="pro_id" value="<?php echo $message[0]['sku_code']; ?>">
                            <!--<?php if(!empty($message[0]['discount_code'])){ ?>
                        <div class="quantity-container info-container">
                            <div class="row" style="margin-bottom: 2%;     padding-right: 4%;">
                                    <div class="col-md-12">
                                         <div class="stock-box">
                                        <span class="label"><strong>Discount Offers : </strong></span>
                                        <div class="row" style="margin-bottom: 1%;">
                                            <?php $str=$message[0]['discount_code'];
                                                        $discount=explode(",",$str); 
                                                       
                                                        foreach ($discount as  $value) {
                                                            $id = $value;  
                                                              $where='disc_code';
                                                            $discountslab =$this->Model->discountslab($id);
                                                          
                                                          ?>
                                            <div class="col-md-2 col-sm-2">
                                                <div class="package-border text-center">
                                                    <span><strong><?php echo $discountslab[0]['disc_slab']; ?></strong></span><br/><span><i class="fa fa-inr" aria-hidden="true"></i><?php echo $discountslab[0]['disc_per']; ?></span>
                                                </div>    
                                            </div>  
                                            <?php } ?>                                 
                        
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                          <?php } ?>-->
              
              <!-- /.stock-container -->
                <div class="row">
                    <div class="col-sm-7"><br>
                    <?php
                              $pro_id = $message[0]['sku_code'] ;
                                 
                                   $query = $this->db->select_sum('quantity');
                                   $query = $this->db->where(array('product_id' =>$pro_id , 'order_status' => 0));
                                    $query = $this->db->get('order_detail');
                                    $result = $query->result();
                                    // print_r($result) ;
                                    
                                                                            	
                                  $hold = $result[0]->quantity ; 
                                      
                                       
                                 if($hold){
                                      $holdlow = $result[0]->quantity  ;
                                 }else{
                                     
                                     
                                     $holdlow = 0 ;
                                 }
                    
                    
                    if(($message[0]['availability'] - $holdlow )>= $message[0]['min_order_quan']){ ?>
                    
                    
                    <div class="favorite-button "   id="add_cart">
                                            <a href="#" onclick="cart();" class="btn btn-color-1 btn-lg" style="margin-bottom: 5px !important;"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                            
                                        <?php if(empty($_SESSION['session_id'])){ ?>
                                              <a class="btn btn-color-3 btn-lg" href="<?php echo base_url('login'); ?>" style="margin-bottom: 5px !important;"><i class="fa fa-heart inner-right-vs"></i> Add to Wishlist</a>
                                                <?php } else{
                                                    $userid = $_SESSION['session_id'];
                                                     $pid =$message[0]['id'] ; 
                                                   $userid=$_SESSION['session_id'];
                                                  $data=$this->Model->wishlist($userid,$pid); 
                                                  if(empty($data)){ ?>
                                              <a class="btn btn-color-3 btn-lg" href="javascript:void(0)" onclick="addwishlist('<?php echo $message[0]['id']; ?>');" style="margin-bottom: 5px !important;"><i class="fa fa-heart inner-right-vs"></i> Add to Wishlist</a>
                                                <?php } else { ?>
                                                     <a class="btn btn-color-3 btn-lg" href="javascript:void(0)" onclick="removewishlist('<?php echo $message[0]['id']; ?>');" style="margin-bottom: 5px !important;">Remove to Wishlist</a>
                                                <?php } } ?>
                                                
                                 </div>
                    
                                  
                    <div class="favorite-button "   id="add_production"  style="display:none">
                        
                                       <?php if(empty($_SESSION['session_id'])){ ?>
                                        
                                            <a onclick="production_cart4('<?= $message[0]['sku_code']; ?>');"   class="btn btn-color-2 btn-lg" style="margin-bottom: 5px !important;">Add To Production</a>
                           
                                       
                                              <a class="btn btn-color-3 btn-lg" href="<?php echo base_url('login'); ?>" style="margin-bottom: 5px !important;"><i class="fa fa-heart inner-right-vs"></i> Add to Wishlist</a>
                                              
                                              
                                                <?php } else{ ?>
                                                
                                                    <a href="#"  onclick="production_cart();"  class="btn btn-color-2 btn-lg" style="margin-bottom: 5px !important;">Add To Production</a>
                           
                                       
                                                    
                                               <?php     $userid = $_SESSION['session_id'];
                                                     $pid =$message[0]['id'] ; 
                                                   $userid=$_SESSION['session_id'];
                                                  $data=$this->Model->wishlist($userid,$pid); 
                                                  if(empty($data)){ ?>
                                              <a class="btn btn-color-3 btn-lg" href="javascript:void(0)" onclick="addwishlist('<?php echo $message[0]['id']; ?>');" style="margin-bottom: 5px !important;"><i class="fa fa-heart inner-right-vs"></i> Add to Wishlist</a>
                                                <?php } else { ?>
                                                     <a class="btn btn-color-3 btn-lg" href="javascript:void(0)" onclick="removewishlist('<?php echo $message[0]['id']; ?>');" style="margin-bottom: 5px !important;">Remove to Wishlist</a>
                                                <?php } } ?>
                                                
                                 </div>
                  <?php } else { ?>
                    <div class="favorite-button ">
                        
                           <?php if(empty($_SESSION['session_id'])){ ?>
                                        
                                            <a onclick="production_cart4('<?= $message[0]['sku_code']; ?>');"  class="btn btn-color-2 btn-lg" style="margin-bottom: 5px !important;">Add To Production</a>
                           <?php }else{ ?>
                       
                         <a href="#"  onclick="production_cart();"  class="btn btn-color-2 btn-lg" style="margin-bottom: 5px !important;">Add To Production</a>
                         
                         <?php } ?>
                         
                        <a href="#"  class="btn btn-color-3 btn-lg" style="margin-bottom: 5px !important;">Add To Wishlist</a>
                         
                                            <a href="javascript:void(0)"  class="btn btn-color-1 btn-lg" style="width:32%;"><i class="fa fa-dolly-flatbed-empty" ></i> Out of Stock</a>
                                           
                     
                    </div>
                  <?php } ?>
                  </div>
                </div>
                 
                                     <?php 
                                            
                                            // if(empty($varient)){
                                            //     $pid=$message[0]['parent_sku'] ;
                                            //     $where='parent_sku';
                                            //     $table='product_detail';
                                            //     $varient=$this->Model->select_common_where($table,$where,$pid);
                                                  
                                            //       }
                                                  
                                                  
                                                  
                                                      $pid=$message[0]['parent_sku'] ;
                                                 
                                                
                                                     $sku_id   = $message[0]['sku_code'] ;
                                                   $table='product_detail';
                                                 
                                                 	$this->db->select('*');
                                                 	
                                    				$this->db->where('sku_code',$sku_id);
                                    				if($pid){
                                    				$this->db->or_where('parent_sku',$pid);
                                    				}else{
                                    				    
                                    				   	$this->db->or_where('parent_sku',$sku_id);
                                    			 
                                    				}
                                    					$this->db->or_where('sku_code',$pid);
                                    			
                                    				$fetch_query= $this->db->get($table);
                                    
                                    				$varient=$fetch_query->result_array();
                                    		
                                                 
                                                 
                                                 
                                                   
                                                  
                                                
                                             
                                     ?>
                            <div class="stock-container info-container m-t-10" style="margin-bottom: 3%;">
                               <div class="row">
                                <!--<div class="col-md-2">-->
                                <!--  <span class="label" style="color: black;" >Color :<strong><?= $message[0]['color']; ?></strong></span>-->
                                <!--</div>-->
                                
                                  <div class="col-sm-1">
                                        <span class="label"><strong style="color:#333;font-size: 18px;">Color : <?= $message[0]['color']; ?></strong></span>
                                    </div>
                              </div> 
                                <div class="row">
                                   <div class="col-md-12" style="padding-top:15px; padding-bottom:15px;">
                                    
                                  <?php if($varient[0]['relation']){ ?>
                                <div class="col-md-6">
                                  <label> <span><?php  echo $varient[0]['relation']; ?> : <strong><?php echo $message[0]['varient']; ?></strong></span></label>
                                </div>
                                <?php 
                                
                                  } ?>
                             
                                   </div>
                                          <input type="hidden" id="relvar" value="<?php echo $message[0]['varient']; ?>">                           
                                          <div class="col-sm-9" style="">
                                        <div class="stock-box row" style="margin-right: 0;margin-left: 0;">

                              <!--      <div id="col-md-1 col-sm-1" class="varrep"  onmouseenter="varient('<?php echo $message[0]['id']; ?>');">-->
                              <!--  <a href="<?php echo base_url(''.$message[0]['url']); ?>" >-->
                              <!--    <img src="<?php echo $message[0]['main_image1']; ?>"  class="img-color-size " style="width: 150px;height: 124px;">-->
                              <!--  </a>-->
                              <!--</div>-->
                      
                      
                            <?php 
                                            // print_r($varient) ; 
                            
                                          
                                    foreach ($varient as  $vval) {
                                                          ?>

                                            <div id="col-md-1 col-sm-1" class="varrep"  onmouseenter="varient('<?php echo $vval['id']; ?>');">
                                                <a href="<?php echo base_url(''.$vval['url']); ?>" >
                                                  <img src="<?php echo base_url('assets/product/'.$vval['main_image1'])   ?>"  class="img-color-size " style="width: 140px; height: 140px; margin-right:5px;">
                                                </a>
                                            </div>
                           <?php }  ?>
                      
                        <input type="hidden" id="cookieurl" value="<?php echo $message[0]['url']; ?>">
                                             
                        <input type="hidden"  class="url" value="<?php echo base_url(); ?>">
                                             
                                        </div>  
                                    </div>
                                  
                                </div><!-- /.row -->    
                            </div><!-- /.stock-container -->
                     <div class="stock-container info-container m-t-10">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="stock-box row">
                                            <ul class="ds-list">
                                             
                                                <?php if(!empty($message[0]['bullet1'])){ ?> 
                                              <li><span class="ds-letter"> </span><?php echo $message[0]['bullet1']; ?></li><?php } ?>
                                                <?php if(!empty($message[0]['bullet2'])){ ?>
                                                <li><span class="ds-letter"> </span><?php echo $message[0]['bullet2']; ?></li>
                                                <?php } ?>
                                                <?php if(!empty($message[0]['bullet3'])){ ?>
                                                <li><span class="ds-letter"></span><?php echo $message[0]['bullet3']; ?>.</li>
                                                <?php } ?>
                                                <?php if(!empty($message[0]['bullet4'])){ ?>
                                                <li><span class="ds-letter"></span><?php echo $message[0]['bullet4']; ?>.</li>
                                                <?php } ?>
                                                <?php if(!empty($message[0]['bullet5'])){ ?>
                                                <li><span class="ds-letter"></span><?php echo $message[0]['bullet5']; ?></li>
                                              <?php } ?>
                                            </ul>
                                     <!--        <div class="review-button">
                                            <a href="add-review.html" class="btn btn-color-2 btn-lg"> Submit Review</a></div> -->
                                        </div>  
                                    </div>
                                </div><!-- /.row -->    
                            </div><!-- /.stock-container -->
  
            
            </div><!-- /.product-info -->
          </div><!-- /.col-sm-7 -->
        </div><!-- /.row -->
  <div class="row wow fadeInUp">
  <div class="col-lg-12" style="padding-top: 20px;padding-bottom: 20px;">
    <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist" style="margin-bottom: 15px;float: none;display: block;width: 100%;padding:0px;">
        
        <li class="active" style="padding:0px;"><a href="#description" role="tab" data-toggle="tab">Description</a></li>
        <li style="padding:0px;"><a href="#Pro_info" role="tab" data-toggle="tab">Product information</a></li>
        <!--<li><a href="#Pro_info1" role="tab" data-toggle="tab">other Product information</a></li>-->
      </ul>
      <div class="clearfix"></div>
      <!-- Tab panes -->
      <div class="tab-content">
           
        <div class="tab-pane active" id="description">
          <p><?php echo $message[0]['description']; ?>.</p>       
        </div>
        <div class="tab-pane" id="Pro_info1">
         <span class="value">Want to complete your ghar pooja decoration this decorative cow and calf would be the choice for your needs. made of fine grade brass and 24 k gold plated. it is studded with stones and handpainted to enrich the divine love. kamdhenu is the sacred wish-cow that grants all your wishes and desires.</span>         
        </div>
         <div class="tab-pane" id="Pro_info">
         <table class="table table-striped table-hover">                 
                    <tr>
                        <th class="bg01" style="width: 120px;">Sku Code</th>
                        <td><?php echo $message[0]['sku_code']; ?></td>
                    </tr>
                 
                  <?php if(!empty($message[0]['size'])){ ?>
                    <tr>
                        <th class="bg01" style="width: 120px;">Size</th>
                        <td><?php echo $message[0]['size']; ?></td>
                    </tr>
                  <?php }    if(!empty($message[0]['weight'])){ ?> 
                    <tr>
                        <th class="bg01" style="width: 120px;">Weight</th>
                        <td><?php echo $message[0]['box_volume_weight']; ?> </td>
                    </tr>
                  <?php }  if(!empty($message[0]['color'])){ ?>
                    <tr>
                        <th class="bg01" style="width: 120px;">Colour</th>
                        <td><?php echo $message[0]['color']; ?></td>
                    </tr>
                    <?php }  if(!empty($message[0]['material'])){ ?> 
                    <tr>
                        <th class="bg01" style="width: 120px;">Material</th>
                        <td><?php echo $message[0]['material']; ?></td>
                    </tr>
                  <?php   } ?>
                </table>        
        </div>
      </div>
      </div>
  </div>
                </div>
<!-- ============================================== ptoduct-section tabs ============================================== -->
<div class="product-tabs inner-bottom-xs  wow fadeInUp mg-lf-15">
  <section class="section-hot-new-arrivals section-products-carousel-tabs">
        <div class="section-products-carousel-tabs-wrap container-fluid slider-color">
            <div class="section-header">
                <h2 class="section-title">You may Like</h2>
            </div>
            <!-- .section-header -->
                <div class="tab-content">
                    <div id="tab-59f89f08825d50" class="tab-pane active" role="tabpanel">
                        <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:700,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                            <div class="container-fluid">
                                <div class="woocommerce">
                                    <div class="products">
                                        <?php 


                              $id=$message[0]['id'];
        
        $where='id';
      $table='product_detail';
      $messages=$this->Model->select_common_where($table,$where,$id);
      if(empty($messages)){
          $id=$message[0]['id'];
        
        $where='id';
      $table='product';
      $messages=$this->Model->select_common_where($table,$where,$id);
      }
   
      foreach ($messages as  $value) {
  setcookie("cookie[".$value['id']."]", $value['id']);


}

  foreach ($_COOKIE['cookie'] as $name) {
  
                                   
                                        $id=$name;
                                      $where='id';
                                      $table='product_detail';
                                     $youmaylike=$this->Model->select_common_where($table,$where,$id);
                                    
                                       
                                   
                                 foreach ($youmaylike as $first) {
                            $title=$first['url'];
                         
                        ?>
                                        <div class="product">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <a href="#" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                            </div>
                                            <a href="<?php echo base_url(''.$title); ?>" class="woocommerce-LoopProduct-link">
                      <div class="product_list_container">                  
                        <div class="product_list_img">  
                        <img src="<?php echo base_url('assets/product/'.$first['main_image1'])   ?>" class="wp-post-image img-responsive" alt="" style="height:140px; width:140px;">
                        </div>
                      </div>
                      <span class="price">
                        <?php if(empty($first['promotion_price'])){ ?>
                        <ins>
                          <span class="amount"> <span class="size_16">Rs&nbsp;</span><?php echo $first['selling_price']; ?></span>
                        </ins>
                        <?php } else { ?>
                          <ins>
                          <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $first['promotion_price']; ?></span>
                        </ins>
                        <?php } ?>

                        <del>
                          <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $first['price']; ?>.00</span>
                        </del>
                        <span class="amount"> </span>
                      </span>
                    <!-- /.price -->
                                                    <h2 class="woocommerce-loop-product__title"><?php echo $first['pro_name']; ?></h2>
                                            </a>
                                            <div class="hover-area tp78">
                                                    <a class="button add_to_cart_button" href="#" rel="nofollow"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                                    <a class="add-to-compare-link" href="#">Add to Wishlist</a>
                                                </div>
                                        </div>
                                      <?php } } ?>
                                        <!-- /.product-outer -->
                            
                                         
                                    </div>
                                </div>
                            <!-- .woocommerce -->
                            </div>
                        <!-- .container-fluid -->
                        </div>
                    <!-- .products-carousel -->
                    </div>
                    <!-- .tab-pane -->
                </div>
                <!-- .tab-content -->
            </div>
 
                     <input type="hidden" id="selling_price" value="<?php echo $message[0]['selling_price'] ?>">
                         <input type="hidden" id="gst" value="<?php echo $message[0]['gst_per'] ?>">
                         <input type="hidden" id="gstinc" value="<?php echo $message[0]['gst'] ?>">
                         <input type="hidden" id="availability" value="<?php echo $message[0]['availability'] - $holdlow ?>">
                      <input type="hidden" id="min_quan" value="<?php echo $message[0]['min_order_quan'] ?>">
        <!-- .section-products-carousel-tabs-wrap -->
</section>
</div><!-- /.product-tabs -->
      
      </div>
      <div class="clearfix"></div>
    </div><!-- /.row -->
  </div><!-- /.container -->
</div><!-- /.body-content -->
                                <!-- .section-products-carousel-tabs -->

<!-- ============================================================= FOOTER ============================================================= -->
    <?php 
include 'footer2.php';
//include 'footer.php';
      ?>
<script>
$('a.cloud-zoom-gallery').click(function(){
$('img.zoom-img').attr('src',$(this).attr('href'));
return false;
});
</script>
<!--<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.nivo.slider.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/cloud-zoom.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.flexslider.js"></script>-->


<script>
 function pricechange(){
  var urls= $("#url").val();
  var quantity= $("#quantity").val();
  var proid= $("#pro_id").val();
    $.ajax({
      url: urls+"Artnhub/pricefilter",
      type: "POST",
      data: {pro_id:proid,quantity:quantity},
      
       cache: false,  // tell jQuery not to set contentType
       success: function(result){
         var obj = JSON.parse(result);
           
               $("#pricequan").html(obj.price);
            //   $("#percent").html(obj.percent);
               $("#fprice").html(obj.fprice);
        // alert(result);
        //$("#occasionrep").html(result);

  // location.reload(); 


    }
    });
}


  
    function isNumber(evt) {
        var iKeyCode = (evt.which) ? evt.which : evt.keyCode
        if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
            return false;

        return true;
    }
</script>
<script>
    $('#pincodecheck').keydown(function (e){
    if(e.keyCode == 13){
       pincode();
       e.preventDefault();
    }
})



</script>
    <script>
                    		$(document).ready(function(){
                    		    
                		    $('.count').prop('disabled', true);
                   			$(document).on('click','.plus',function(){
                   			    
                   			    pricechange();
                   			    
                				$('.count').val(parseInt($('.count').val()) + 1 );
                				
                		        var qty = $('#quantity').val() ;
                		        var available = $('#availability').val() ;
                		        
                		         var min_quan = $('#min_quan').val() ;
                		        
                		          if( Number(min_quan) > Number(qty) ){
               		          
               		         
                		            $("#minus_btn").addClass("not-active");
                		            
                		        }else{
                		            
                		          
                		             $("#minus_btn").removeClass("not-active");
		        }
                		        
                    		        if( Number(available) < Number(qty) ){
               		            $('#add_production').show() ;
                		            
                		              $('#add_cart').hide() ;
                		            
                		        }else{
		                               $('#add_production').hide() ;
                		              $('#add_cart').show() ;
		            
		        }
				
    		});
        	$(document).on('click','.minus',function(){
        	    
        	    pricechange() ;
        	    
    			$('.count').val(parseInt($('.count').val()) - 1 );
    				if ($('.count').val() == 0) {
						$('.count').val(1);
					}
					
					             var qty = $('#quantity').val() ;
                		         var available = $('#availability').val() ;
                		        
                		         var min_quan = $('#min_quan').val() ;
                		         
                		        if( Number(min_quan) >= Number(qty) ){
               		        
                		            $("#minus_btn").addClass("not-active");
                		            
                		            	$('.count').val(parseInt(min_quan));
                		        }else{
                		            
                		           
                		             $("#minus_btn").removeClass("not-active");
		        }
		        
                    		        if( Number(available) < Number(qty) ){
               		            $('#add_production').show() ;
                		            
                		              $('#add_cart').hide() ;
                		            
                		        }else{
		                               $('#add_production').hide() ;
                		              $('#add_cart').show() ;
		            
		        }
		        
    	    	});
 		});
                    </script>
                    
                   
        
