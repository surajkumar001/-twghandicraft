<?php 
//pr($product);die;
if($uri=='returngiftcat'){
    foreach ($products as  $pre) {
     $product[]=$pre[0];
    } ?>
    <input type="hidden" id="returnid" value="<?php echo $value2; ?>">
    <input type="hidden" id="pcatreturn" value="<?php echo $pcat; ?>">
    <?php 
}
if($uri=='Occasion'){
    foreach ($producst as  $pres) {
     $product[]=$pres[0];
    }
}
include 'headcss.php';
include 'header.php';
?>
<?php include 'navbar.php'; ?>

<style>
#cover-spin {
    position:fixed;
    width:100%;
    left:0;right:0;top:0;bottom:0;
    background-color: rgba(255,255,255,0.7);
    z-index:9999;
    display:none;
}

@-webkit-keyframes spin {
    from {-webkit-transform:rotate(0deg);}
    to {-webkit-transform:rotate(360deg);}
}

@keyframes spin {
    from {transform:rotate(0deg);}
    to {transform:rotate(360deg);}
}

#cover-spin::after {
    content:'';
    display:block;
    position:absolute;
    left:48%;top:40%;
    width:40px;height:40px;
    border-style:solid;
    border-color:black;
    border-top-color:transparent;
    border-width: 4px;
    border-radius:50%;
    -webkit-animation: spin .8s linear infinite;
    animation: spin .8s linear infinite;
}</style>

<div id="cover-spin"></div>

<style>
.featured-product .products {
    margin-right: 0;
    padding-bottom: 15px;
    padding-right: 15px;
    padding-left: 15px;
}
.section-products-carousel-tabs .columns-8::after, .section-products-carousel-tabs .columns-8::before, .section-products-carousel-tabs .columns-7::after, .section-products-carousel-tabs .columns-7::before, .section-products-carousel-tabs .columns-5::after, .section-products-carousel-tabs .columns-5::before, .section-products-carousel-tabs .columns-6::after, .section-products-carousel-tabs .columns-6::before, .section-products-carousel .columns-8::after, .section-products-carousel .columns-8::before, .section-products-carousel .columns-7::after, .section-products-carousel .columns-7::before, .section-products-carousel .columns-5::after, .section-products-carousel .columns-5::before, .section-products-carousel .columns-6::after, .section-products-carousel .columns-6::before {
    background-color: transparent;
}
.product_cat_list{
  
}
</style>

<style>
/* The container */
.cont {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 14px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.cont input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 20px;
  width: 20px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.cont:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.cont input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.cont input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.cont .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

</style>

<style>
    @media (min-width: 1140px){
.products .product:focus .hover-area, .products .product:hover .hover-area {
    opacity: 1;
    border-color: #ebebeb;
    -webkit-transform: translate(0, 0px);
    -ms-transform: translate(0, 0px);
    -o-transform: translate(0, 0px);
    transform: translate(0, 0px);
    top: 76%;
    z-index: 20;
}
}
</style>
<!-- ============================================== HEADER : END ============================================== -->
<div class="xs-breadcumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index'); ?>"> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Category</li>
            </ol>
        </nav>
    </div>
</div>
<div class="body-content">
  <div class='container-fluid'>
    <div class="row">
        <div class="col-md-12">
        <!-- ============================================== filter-start ============================================== -->
<div class="clearfix filters-container" style="margin-bottom: 1%;
    padding-bottom: 1%;">
   
    <!-- /.row --> 
</div>
</div>
<!-- ============================================== filter-end ============================================== -->
    </div>
    <div class='row'>
    
      <!-- /.sidebar -->
      <div class='col-md-12'> 
        <!-- ========================================== SECTION – HERO ========================================= -->       
      
    <?php if($url=='searchpage'){ ?>
      <input type="hidden" id="uriii" value="<?php echo $url; ?>">
      <input type="hidden" id="search" value="<?php echo $search; ?>">
      <div class="clearfix filters-container" style="margin-bottom: 1%;padding-bottom: 1%;">
        <div class="">
          <h1 class="size24" style="display: block;margin: 0;width: 100%;"><span class="red bb-red" style="color: #2874f0"> <?php echo $search; ?></span> 
          <div style="float: right;font-size: 14px;line-height: 39px;">Total Product: <?php echo count($product); ?></div></h1>         
        </div>
      </div>
    <?php } ?>  
        <div class="search-result-container ">
          
      
        <div class="row featured-product fadeInUp animated section wow" style="padding:15px 0% 4% 0%;">
          <div class="col-md-2 pd-35" style="border-right: 2px solid #2874f0;">
              
              <h5 style="    font-size: 16px;">Price Range <span style="float: right;"><i data-toggle="collapse" data-target="#demo" class="fa fa-caret-down"></i></span></h5>
              <div id="demo" class="collapse">

             <label class="cont">Rs. 99 to Rs. 299
              <input type="checkbox"  name="filterprice" value="99-299"  onchange="pricefilterNew();">
              <span class="checkmark"></span>
            </label>
            <label class="cont">Rs. 299 to Rs. 599
              <input type="checkbox" name="filterprice" value="299-599" onchange="pricefilterNew();">
              <span class="checkmark"></span>
            </label>
            <label class="cont">Rs. 599 to Rs. 999
              <input type="checkbox" name="filterprice" value="599-999" onchange="pricefilterNew();">
              <span class="checkmark"></span>
            </label>
            <label class="cont">Rs. 999 to Rs. 1999
              <input type="checkbox" name="filterprice" value="999-1999" onchange="pricefilterNew();">
              <span class="checkmark"></span>
            </label>
            <label class="cont">Rs. 1999 to Rs. 4999
              <input type="checkbox" name="filterprice" value="1999-4999" onchange="pricefilterNew();">
              <span class="checkmark"></span>
            </label>
            <label class="cont">Rs. 4999 to Rs. 9999
              <input type="checkbox" name="filterprice" value="4999-9999" onchange="pricefilterNew();">
              <span class="checkmark"></span>
            </label>

        </div>
        <?php if(empty($uri)){ $uri ='all' ; } ?> 
        <input type="hidden" id="catid" value="<?php echo $uri; ?>">
         <input type="hidden" id="flag" value="<?php echo $flag; ?>">
        
        
       <?php 
                  $id=$uri;

        $where='id';

        $table='category';

        $m=$this->Adminmodel->select_com_where($table,$where,$id);
           $id=$m[0]['parent_id'];

        $where='id';

        $table='parent_category';

        $parent_category=$this->Adminmodel->select_com_where($table,$where,$id);
       ?>
        <h5 style="    font-size: 16px;">Size <span style="float: right;"><i data-toggle="collapse" data-target="#demo2" class="fa fa-caret-down"></i></span></h5>
              <div id="demo2" class="collapse">
          
                             <label class="cont">Small
                              <input type="checkbox"  name="size" value="S" onchange="pricefilterNew();">
                              <span class="checkmark"></span>
                            </label>
                
                   
                           <label class="cont">Medium
                          <input type="checkbox"  name="size" value="M" onchange="pricefilterNew();">
                          <span class="checkmark"></span>
                        </label>
                   
                           <label class="cont">Large 
                          <input type="checkbox"  name="size" value="L" onchange="pricefilterNew();">
                          <span class="checkmark"></span>
                        </label>
        </div>
   
     


 
        <h5 style="    font-size: 16px;">Material  <span style="float: right;"><i data-toggle="collapse" data-target="#demo1" class="fa fa-caret-down"></i></span></h5>
              <div id="demo1" class="collapse">
                <?php 
                
                // =================================
              
                    $this->db->distinct();
                    $this->db->select();
                    $this->db->like('category', $catid);
                   $qury  = $this->db->get('material');
                   
                   $mateial_detail = $qury->result() ; 
                                    
                  // ===================================

                foreach ($mateial_detail as  $vale) {
                  
                 ?>
               <label class="cont"><?php echo $vale->name; ?>
  <input type="checkbox"  name="mat[]" value="<?php echo $vale->name; ?>" onchange="pricefilterNew();">
  <span class="checkmark"></span>
</label>
<?php }   ?>
        </div>
     


       
        <h5 style="    font-size: 16px;">Color <span style="float: right;"><i data-toggle="collapse" data-target="#demo4" class="fa fa-caret-down"></i></span></h5>
              <div id="demo4" class="collapse">
             
        <?php 
                     $this->db->distinct();
                     $this->db->select();
                     $this->db->like('category', $catid);
                
                   $qury  = $this->db->get('color');
                   $color_detail = $qury->result() ; 
                   
                  
             foreach ($color_detail as  $color) {
                 
                      ?>  <label class="cont"><?php echo $color->name;?>
  <input type="checkbox"  name="color[]" value="<?php echo $color->name; ?>" onchange="pricefilterNew();">
  <span class="checkmark"></span>

</label>

        
        
        <?php } ?>
        </div>
        
        
        <h5 style="    font-size: 16px;">Display  <span style="float: right;"><i data-toggle="collapse" data-target="#demodsplay" class="fa fa-caret-down"></i></span></h5>
              <div id="demodsplay" class="collapse">
                <?php 
                
                // =================================
                
                    $this->db->distinct();
                    $this->db->select();
                    $this->db->like('category', $catid);
                   $qury  = $this->db->get('display');
                   
                   $mateial_detail = $qury->result() ; 
                                    
                  // ===================================

                foreach ($mateial_detail as  $vale) {
                  
                 ?>
               <label class="cont"><?php echo $vale->name; ?>
  <input type="checkbox"  name="display[]" value="<?php echo $vale->name; ?>" onchange="pricefilterNew();">
  <span class="checkmark"></span>
</label>
<?php }   ?>
        </div>
     

       
            </div>
            
          <section class="col-md-10 column-2"   style="width: 100%;">
                       
             <div class="products-carousel carousel-without-attributes">
               <div class="woocommerce columns-7">                 
                  <div class="products  slick-initialized slick-slider slick-dotted" role="toolbar" style="padding-bottom: 70px;">
                     <!-- /.product-outer -->
                     <div aria-live="polite" class="slick-list draggable">
                      <div class="slick-track"  id="filtereplace" style="">
                        <div id="load_data"></div>



                        <div id="load_data_message"></div>
        
                      <input type="hidden" id="url" class="url" value="<?php echo base_url(); ?>">
                                          
                      </div>
                     </div>
                  </div>
                
               </div>
               <!-- .woocommerce -->
             </div>
             <!-- .products-carousel -->
          </section>  
        </div>
      </div>
      <!-- /.col --> 
    </div>
    </div>
    <!-- /.row --> 


<!-- ============================================== slider ============================================== -->
 <!--    <section class="section-hot-new-arrivals section-products-carousel-tabs">
                                    <div class="section-products-carousel-tabs-wrap container-fluid slider-color">
                                        <div class="section-header">
                                            <h2 class="section-title">You may like</h2>
                                        </div>
                                      
                                        <div class="tab-content">
                                            <div id="tab-59f89f08825d50" class="tab-pane active" role="tabpanel">
                                                <div class="products-carousel" data-ride="tm-slick-carousel" data-wrap=".products" data-slick="{&quot;infinite&quot;:false,&quot;slidesToShow&quot;:7,&quot;slidesToScroll&quot;:7,&quot;dots&quot;:true,&quot;arrows&quot;:false,&quot;responsive&quot;:[{&quot;breakpoint&quot;:700,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesToScroll&quot;:2}},{&quot;breakpoint&quot;:780,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesToScroll&quot;:3}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesToScroll&quot;:4}},{&quot;breakpoint&quot;:1400,&quot;settings&quot;:{&quot;slidesToShow&quot;:5,&quot;slidesToScroll&quot;:5}}]}">
                                                    <div class="container-fluid">
                                                        <div class="woocommerce">
                                                            <div class="products">
                                                                <div class="product">
                                                                    <div class="yith-wcwl-add-to-wishlist">
                                                                        <a href="wishlist.html" rel="nofollow" class="add_to_wishlist"> Add to Wishlist</a>
                                                                    </div>
                                                                    <a href="detail.html" class="woocommerce-LoopProduct-link">
                                                                        <img src="assets/images/deals/d15.jpg" width="224" height="197" class="wp-post-image" alt="">
                                                                        <span class="price">
                                                                            <ins>
                                                                                <span class="amount"> </span>
                                                                            </ins>
                                                                            <span class="amount"> 456.00</span>
                                                                        </span>
                                                                        
                                                                        <h2 class="woocommerce-loop-product__title">hourse painting</h2>
                                                                    </a>
                                                                    <div class="hover-area">
                                                                        <a class="button add_to_cart_button" href="cart.html" rel="nofollow">Add to cart</a>
                                                                        <a class="add-to-compare-link" href="compare.html">Add to compare</a>
                                                                    </div>
                                                                </div>
                                                                  
                                                               
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                
                                                </div>
                                             
                                            </div>
                                           
                                        </div>
                                     
                                    </div>
                                    
</section> -->
</div>
  <!-- /.container --> 

</div>
<!-- /.body-content --> 
<!-- ============================================================= FOOTER ============================================================= -->
      <?php 
include 'footer.php';
      ?>
<script>
$(document).ready(function(){
  $("#demo").on("hide.bs.collapse", function(){
    $(".btn").html('<i class="fa fa-caret-down"></i> Open');
  });
  $("#demo").on("show.bs.collapse", function(){
    $(".btn").html('<i class="fa fa-caret-up"></i> Close');
  });
});
</script>
<script>
$(document).ready(function(){
  $("#demo1").on("hide.bs.collapse", function(){
    $(".btn").html('<i class="fa fa-caret-down"></i> Open');
  });
  $("#demo1").on("show.bs.collapse", function(){
    $(".btn").html('<i class="fa fa-caret-up"></i> Close');
  });
});
</script>

<script>
$(document).ready(function(){
  $("#demo2").on("hide.bs.collapse", function(){
    $(".btn").html('<i class="fa fa-caret-down"></i> Open');
  });
  $("#demo2").on("show.bs.collapse", function(){
    $(".btn").html('<i class="fa fa-caret-up"></i> Close');
  });
});
</script>
<script>
$(document).ready(function(){
  $("#demo3").on("hide.bs.collapse", function(){
    $(".btn").html('<i class="fa fa-caret-down"></i> Open');
  });
  $("#demo3").on("show.bs.collapse", function(){
    $(".btn").html('<i class="fa fa-caret-up"></i> Close');
  });
});
</script>
<script>
$(document).ready(function(){
  $("#demo4").on("hide.bs.collapse", function(){
    $(".btn").html('<i class="fa fa-caret-down"></i> Open');
  });
  $("#demo4").on("show.bs.collapse", function(){
    $(".btn").html('<i class="fa fa-caret-up"></i> Close');
  });
});
</script>
<script>
$(document).ready(function(){
  $("#demo5").on("hide.bs.collapse", function(){
    $(".btn").html('<i class="fa fa-caret-down"></i> Open');
  });
  $("#demo5").on("show.bs.collapse", function(){
    $(".btn").html('<i class="fa fa-caret-up"></i> Close');
  });
});

function pricefilter() {

 var urls = $("#url").val();
 var catid = $("#catid").val();
 var returnid = $("#returnid").val();
 var pcatreturn = $("#pcatreturn").val();
 var uriii = $("#uriii").val();
 var search = $("#search").val();

 $("#cover-spin").show(); 
  var myCheckboxes = new Array();

$("input[name='filterprice']:checked").each( function () {

    myCheckboxes.push($(this).val());
     
   });
  var occasion = new Array();

$("input[name='occasion[]']:checked").each( function () {

    occasion.push($(this).val());
     
   });
  var size = new Array();

$("input[name='size']:checked").each( function () {

    size.push($(this).val());
     
   });

  var material = new Array();

$("input[name='mat[]']:checked").each( function () {

    material.push($(this).val());
     
   });
 var resc = new Array();

$("input[name='resc[]']:checked").each( function () {

    resc.push($(this).val());
     
   });


 $.ajax({

    type: "POST",

    url: urls +"Artnhub/filter",

    data: {data:myCheckboxes,catid:catid,returnid:returnid,pcatreturn:pcatreturn,occ:occasion,size:size,material:material,resc:resc,uri:uriii,search:search},

    cache: false,

    success: function(result){
        
          alert(result);

       $("#cover-spin").fadeOut(200); 
      $("#filtereplace").html(result);
    //  alert(result);
    // location.reload();
     



      }

      });
}
</script>

<script>
    
    
    
    function pricefilterNew() {
        
         var urls = $("#url").val();
         var catid = $("#flag").val();
         var returnid = $("#returnid").val();
         var pcatreturn = $("#pcatreturn").val();
         var uriii = $("#uriii").val();
         var search = $("#search").val();
         
        var flag = $('#flag').val() ;
        
        //  alert(flag) ;
        
         $("#cover-spin").show(); 
          var myCheckboxes = new Array();
        
        $("input[name='filterprice']:checked").each( function () {
        
            myCheckboxes.push($(this).val());
             
           });
          var occasion = new Array();
        
        $("input[name='occasion[]']:checked").each( function () {
        
            occasion.push($(this).val());
             
           });
          var size = new Array();
        
        $("input[name='size']:checked").each( function () {
        
            size.push($(this).val());
             
           });
        
          var material = new Array();
        
        $("input[name='mat[]']:checked").each( function () {
        
            material.push($(this).val());
             
           });
         var resc = new Array();
        
        $("input[name='resc[]']:checked").each( function () {
        
            resc.push($(this).val());
             
           });
        
        
         $.ajax({
        
            type: "POST",
        
            url: urls +"loadscroll/flagcategory",
        
            data: {data:myCheckboxes,catid:catid,returnid:returnid,pcatreturn:pcatreturn,occ:occasion,size:size,material:material,resc:resc,uri:uriii,search:search , flag: flag},
        
            cache: false,
        
            success: function(result){
                
                //   alert(result);
        
               $("#cover-spin").fadeOut(200); 
              $("#filtereplace").html(result);
            //  alert(result);
            // location.reload();
             
        
        
        
              }
        
              });
}

</script>

<script>
  $(document).ready(function(){

    var limit = 25;
    var start = 0;
    var action = 'inactive';
//  var catid = $("#catid").val();
  var catid = $('#flag').val() ;
        
        
// alert(catid) ; 

    function load_limit(limit)
    {
      var output = '';
      for(var count=0; count<limit; count++)
      {
        output += '<div class="post_data">';
      
        output += '</div>';
      }
      $('#load_data_message').html(output);
    }

    load_limit(limit);

    function load_data(limit, start)
    {
              var urls = $("#url").val();
         var catid = $('#flag').val() ;
         var returnid = $("#returnid").val();
         var pcatreturn = $("#pcatreturn").val();
         var uriii = $("#uriii").val();
         var search = $("#search").val();
         
        var flag = $('#flag').val() ;
        
        //  alert(flag) ;
        
        //  $("#cover-spin").show(); 
          var myCheckboxes = new Array();
        
        $("input[name='filterprice']:checked").each( function () {
        
            myCheckboxes.push($(this).val());
             
           });
          var occasion = new Array();
        
        $("input[name='occasion[]']:checked").each( function () {
        
            occasion.push($(this).val());
             
           });
          var size = new Array();
        
        $("input[name='size']:checked").each( function () {
        
            size.push($(this).val());
             
           });
        
          var material = new Array();
        
        $("input[name='mat[]']:checked").each( function () {
        
            material.push($(this).val());
             
           });
         var resc = new Array();
        
        $("input[name='resc[]']:checked").each( function () {
        
            resc.push($(this).val());
             
           });
        
        
      $.ajax({
        url:"<?php echo base_url('loadscroll/flagcategory'); ?>",
        method:"POST",
        // data:{limit:limit, start:start,catid:catid},
          data: {data:myCheckboxes,limit:limit, start:start,catid:catid,returnid:returnid,pcatreturn:pcatreturn,occ:occasion,size:size,material:material,resc:resc,uri:uriii,search:search , flag: flag},
         cache: false,
        success:function(data)
        {
            
            // alert(data) ; 
          if(data == '')
          {
            $('#load_data_message').html('</br></br><h3  align="center">finish </h3>');
            action = 'active';
          }
          else
          {
            $('#load_data').append(data);
            $('#load_data_message').html("");
            action = 'inactive';
          }
        }
      })
    }

    if(action == 'inactive')
    {
      action = 'active';
      load_data(limit, start);
    }

    $(window).scroll(function(){
      if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
      {
        load_limit(limit);
        action = 'active';
        start = start + limit;
        setTimeout(function(){
          load_data(limit, start);
        }, 1000);
      }
    });

  });
</script>
