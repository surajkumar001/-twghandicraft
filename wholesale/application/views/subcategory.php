<?php 
// pr($product);die;


$meta_result =  $this->db->get_where('category', array('id' => $uri))->row() ;

$cat_desc = $meta_result->des ; 
  $catid  = $uri ;  

$meta_tag = $meta_result->meta_tag ; 
$meta_key = $meta_result->meta_key ; 
$meta_des = $meta_result->meta_des ; 

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
.products .product img {
    display: block;
    margin: 0 auto 6px;
    height: 140px;
}
.hover-area {
    margin-top: 15px;
}
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
.slick-initialized .slick-slide {
    display: block;
    /*height: 300px !important;*/
}
</style>
<style>
    @media screen and (max-width: 480px) {
  .wdth100 {
    width:100% !important;
  }
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
    top: 70%;
    z-index: 20;
}
}
</style>
<!-- ============================================== HEADER : END ============================================== -->
<div class="xs-breadcumb">
    <div class="container">
        <?php $parent  =  $this->db->get_where('parent_category' ,array('id' => $parent_id))->row(); 
                
                ?>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo base_url('index'); ?>"> Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $parent->name ; ?></li>
               <li class="breadcrumb-item active" aria-current="page"> <?php echo $cat_name ; ?></li>
            </ol>
        </nav>
    </div>
</div>
<div class="body-content">
  <div class='container-fluid'>
    <div class="row">
        <div class="col-md-12">
        <!-- ============================================== filter-start ============================================== -->
<div >
   <!--  <div class="row marg01">
        <div class="col col-sm-3 col-md-3 no-padding">
            <div class="lbl-cnt"> <span class="lbl">Select Occasion</span>
                <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Birthday <span class="caret"></span> </button>
                            <ul role="menu" class="dropdown-menu">
                                <li role="presentation"><a href="#">Birthday</a></li>
                                <li role="presentation"><a href="#">Anniversary</a></li>
                                <li role="presentation"><a href="#">Wedding</a></li>
                                <li role="presentation"><a href="#">Home Inaugration</a></li>
                                <li role="presentation"><a href="#">Business Inaugration</a></li>
                                <li role="presentation"><a href="#">Love & Romance</a></li>
                                <li role="presentation"><a href="#">Retirement</a></li>
                                <li role="presentation"><a href="#">New Year</a></li>
                                <li role="presentation"><a href="#">Lohri</a></li>
                                <li role="presentation"><a href="#">Guru Poornima</a></li>
                            </ul>                                 
                    </div>
                </div>
                  
            </div>
              
        </div>
        <div class="col col-sm-3 col-md-3 no-padding">
            <div class="lbl-cnt"> <span class="lbl">Gift Recipients</span>
                <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Kidz <span class="caret"></span> </button>
                            <ul role="menu" class="dropdown-menu">
                                <li role="presentation"><a href="#">Kidz</a></li>
                                <li role="presentation"><a href="#">Boys</a></li>
                                <li role="presentation"><a href="#">Girls</a></li>
                                <li role="presentation"><a href="#">Couple</a></li>
                                <li role="presentation"><a href="#">Men</a></li>
                                <li role="presentation"><a href="#">Women</a></li>
                            </ul>
                    </div>
                </div>
               
            </div>
              
        </div>
             
        <div class="col col-sm-3 col-md-3 no-padding">
            <div class="lbl-cnt"> <span class="lbl">Price Filter</span>
                <div class="fld inline">
                    <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Gifts Below Rs. 99/- <span class="caret"></span> </button>
                            <ul role="menu" class="dropdown-menu">
                                <li role="presentation"><a href="#">Gifts Below Rs. 99/-</a></li>
                                <li role="presentation"><a href="#">Gifts Below Rs. 199/-</a></li>
                                <li role="presentation"><a href="#">Gifts Below Rs. 399/-</a></li>
                                <li role="presentation"><a href="#">Gifts Below Rs. 499/-</a></li>
                                <li role="presentation"><a href="#">Gifts Below Rs. 999/-</a></li>
                                <li role="presentation"><a href="#">Price High to Low</a></li>
                                <li role="presentation"><a href="#">Price Low to High</a></li>
                            </ul>                                 
                    </div>
                </div>
                
            </div>
             
        </div>
     
  <div class="col col-sm-3 col-md-3 no-padding">
            <div class="lbl-cnt text-center"> 
        <a class="btn btn-color-1 btn-lg" style="padding: 4px 15px;font-size: 14px;">Apply</a>
                  
            </div>  
        </div>
      
    </div> -->
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
          <!--<h1 class="size24" style="display: block;margin: 0;width: 100%;"><span class="red bb-red" style="color: #2874f0"> <?php echo $search; ?></span> -->
          <div style="float: right;font-size: 14px;line-height: 39px;">Total Product: <?php echo count($product_dat); ?></div></h1>         
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
  <input type="checkbox"  name="resc[]" value="<?php echo $vale->name; ?>" onchange="pricefilterNew();">
  <span class="checkmark"></span>
</label>
<?php }   ?>
        </div>
     

       
            </div>
          
          <section class="col-md-10 column-2"    style="width: 100%;">
                       
             <div class="products-carousel carousel-without-attributes">
               <div class="woocommerce columns-7">                 
                  <div class="products  slick-initialized slick-slider slick-dotted" role="toolbar" style="padding-bottom: 70px;">
                     <!-- /.product-outer -->
                     <div aria-live="polite" class="slick-list draggable">
                      <div class="slick-track"  id="filtereplace" style="">
                       
                        <div id="load_data"></div>



                        <div id="load_data_message"></div>
        
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
        <div class="container" style="padding: 25px 0px;">
          <div class="col-md-12">
            <span class="more">
             <?php echo $cat_desc; ?>
            </span>
          </div>
        </div>
    </div>
    </div>
    <!-- /.row --> 



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
 
//  alert(catid) ;
 

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
 var color = new Array();

$("input[name='color[]']:checked").each( function () {

    color.push($(this).val());
     
   });
 var resc = new Array();

$("input[name='resc[]']:checked").each( function () {

    resc.push($(this).val());
     
   });


 $.ajax({

    type: "POST",

    url: urls +"Artnhub/filter",

    data: {data:myCheckboxes,catid:catid,returnid:returnid,pcatreturn:pcatreturn,occ:occasion,size:size,material:material,resc:resc,uri:uriii,search:search,color:color},

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
    
    
    
    function pricefilterNew() {
  var limit = 25;
    var start = 0;
 var urls = $("#url").val();
 var catid = $("#catid").val();
 var returnid = $("#returnid").val();
 var pcatreturn = $("#pcatreturn").val();
 var uriii = $("#uriii").val();
 var search = $("#search").val();
 
var flag = $('#flag').val() ;

// alert(flag) ;

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
   
    var color = new Array();

$("input[name='color[]']:checked").each( function () {

    color.push($(this).val());
     
   });
   
   
 

 var resc = new Array();

$("input[name='resc[]']:checked").each( function () {

    resc.push($(this).val());
     
   });

 $.ajax({

    type: "POST",

    url: urls +"loadscroll/categoryfilter",

    data: {data:myCheckboxes,catid:catid,returnid:returnid,pcatreturn:pcatreturn,occ:occasion,size:size,material:material,resc:resc,uri:uriii,search:search , flag: flag ,color:color},

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
 var catid = $("#catid").val();

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
      $.ajax({
        url:"<?php echo base_url('loadscroll/kirim'); ?>",
        method:"POST",
        data:{limit:limit, start:start,catid:catid},
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
