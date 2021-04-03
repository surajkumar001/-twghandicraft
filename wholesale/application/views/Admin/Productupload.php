<?php
 // /pr($message);die;
include('header.php');
include('sidebar.php');
?>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" />
<link rel="stylesheet" type="text/css" href="https://select2.github.io/select2-bootstrap-theme/css/select2-bootstrap.css">

<script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
<aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>Product</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="#">Product</a>
                    </li>
                    <li class="active">Product List</li>
                </ol>
            </section>

  <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary ">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> Product List
                            </h4>
                        </div>
                                             <?php  if($this->session->flashdata('msg')){ ?>
                        <div class="row alert alert-danger" >
                            
                            <h5>
                                <?php echo $this->session->flashdata('msg') ;  ?>
                            </h5>
                            
                        </div>
                        <?php } ?>

		<div class="col-md-12">
	<form method="post" action="<?php echo base_url('Admin/upload');?>" enctype="multipart/form-data">
		<br>
		
	
		<div class="col-md-6">
		Product name<input type="text" name="name" class="form-control"><br></div>

		<div class="col-md-3">
		 Wholesale Price<input type="text" name="sprice" class="form-control"><br></div>
		 <div class="col-md-3">
		Retail Price<input type="text" name="aprice" class="form-control"><br></div>
			<div class="col-md-4">
		Product Sku Code<input type="text" name="sku" class="form-control"><br></div>
		<div class="col-md-4">
		product_image1<input type="file" name="file" class="form-control"><br></div>
		<div class="col-md-4">
		product_image2<input type="file" name="file1" class="form-control"><br></div>
		<div class="col-md-4">
		product_image3<input type="file" name="file2" class="form-control"><br></div>
		<div class="col-md-4">
		 product_image4<input type="file" name="file3" class="form-control"><br></div>
		 		<div class="col-md-4">
		 product_image5<input type="file" name="file4" class="form-control"><br></div>
<div class="col-md-6">
		Parent Category
		
		    
<select class="locationMultiple1 form-control" name="pcat[]" onchange="sub()" >
    	<option>please choose</option>
		          <?php foreach ($pcat as  $value){  ?>
		          <option value="<?php echo $value['id'];?>" <?php if($mes[0]['parent_cat']==$value['id']){echo 'selected';} ?>><?php echo $value['name'];?></option>
		         <?php }?>
</select>

		        </div>

		<div class="col-md-6">
		    
		category<select class="locationMultiple2 form-control" name="cat[]"  onchange="subcat()" id="category" multiple="multiple">
		
			
		<option value="<?php echo $mes[0]['category_id']?>"><?=$mes[0]['name']?></option>
			
		</select><br></div>
		
		<div class="col-md-6" id="subcathide">
		sub category<select class="locationMultiple3 form-control" name="sub_cat[]" id="subcategory" multiple="multiple">
			
		
			<option value="<?php echo $mes[0]['sub_category']?>"><?=$mes[0]['subcatname']?></option>
			
		</select><br></div>
	<script>
    $.fn.select2.defaults.set("theme", "bootstrap");
        $(".locationMultiple1").select2({
            
            width: null
            
        })
        $.fn.select2.defaults.set("theme", "bootstrap");
        $(".locationMultiple2").select2({
            width: null
        })
         $.fn.select2.defaults.set("theme", "bootstrap");
        $(".locationMultiple3").select2({
            width: null
        })
</script>
		

		 <div class="col-md-3">
		 Weight<input type="text" name="weight" class="form-control" placeholder="KG"><br></div>

		<div class="col-md-3">
			Material
			
			<input type="text" name="material" class="form-control">
			
	
		<br></div>


		<div class="col-md-3">
		Color
			<input type="text" name="color" class="form-control" style="text-transform: capitalize;">
			
		<br></div>

		<div class="col-md-3">
		Size
			<input type="text" name="size" class="form-control">
		<br></div>
		<div class="col-md-3">
		Volumetric Weight
			<input type="text" name="volume"  class="form-control">
		
		<br></div>
		
			<div class="col-md-3">
		Availability
			<input type="text" name="avail"  class="form-control">
		
		<br></div><div class="col-md-3">
		Minimum Order Quantity
			<input type="text" name="minimum"  class="form-control">
		
		<br></div>
		<div class="col-md-3">
		Low Alert
			<input type="text" name="lowalert"  class="form-control">
		
		<br></div>
	    <div class="col-md-3">
		HSN Code
			<input type="text" name="hsncode"  class="form-control">
		
		<br></div>
		
  <div class="col-md-3">
		Billing Name
			<input type="text" name="billing_name"  class="form-control">
		
		<br></div>
		
  <div class="col-md-3">
	New Arrivel 
			<!--<input type="text" name="new_arrivel"  class="form-control">-->
			<select class="form-control" name="new_arrivel" >
            	<option>please choose</option>
	    		<option value="1">Yes</option>
        		<option value="0" >No</option>		         
            </select>
		<br></div>
		
  <div class="col-md-3">
		Size Filter
		<select class="form-control" name="size_filter" >
    	<option>please choose</option>
		<option value="s" >Small</option>
		<option value="m">Medium</option>
		<option value="l">Large</option>
		         
</select>

		<br></div>
		
		
			<input type="hidden" name="avail" value="1000"  class="form-control">
		
		
		

		<div class="col-md-12">
		Bullet Point 1<textarea  name="point1" class="form-control"></textarea><br></div>
		<div class="col-md-12">
		Bullet Point 2<textarea  name="point2" class="form-control"></textarea><br></div>
		<div class="col-md-12">
		Bullet Point 3<textarea  name="point3" class="form-control"></textarea><br></div>
		<div class="col-md-12">
		Bullet Point 4<textarea  name="point4" class="form-control"></textarea><br></div>
		<div class="col-md-12">
		Bullet Point 5<textarea  name="point5" class="form-control"></textarea><br></div>
		<div class="col-md-12">
		Product description<textarea  name="desc" class="form-control"></textarea><br></div>
        	<div class="col-md-12">
		Other<textarea  name="other" class="form-control"></textarea><br></div>
	<!--	<div class="col-md-12">
		Highlights 1<textarea  name="highlights1" class="form-control"></textarea><br></div>
		<div class="col-md-12">
		Highlights 2<textarea  name="highlights2" class="form-control"></textarea><br></div>
		<div class="col-md-12">
		Highlights 3<textarea  name="highlights3" class="form-control"></textarea><br></div>-->

		<div class="col-md-12">
		Meta title<textarea  name="metatag" class="form-control"></textarea><br></div>
			<div class="col-md-12">
		Meta Keyword<textarea  name="metakey" class="form-control"></textarea><br></div>
		<div class="col-md-12">
		Meta Description<textarea  name="metadesc" class="form-control"></textarea><br></div>
		 <div class="col-md-6" >
		GST %<select class="form-control"   name="gstper">
			<option value="5"> 5%</option>
			<option value="12"> 12%</option>
			<option value="18"> 18%</option>
			<option value="28"> 28%</option>
			
		</select><br></div>
		<!--	<div class="col-md-12">
		Pincode Type <input type="checkbox" name="local"  value="local">Local 
		 <input type="checkbox" name="metro"  value="metro"> Metro
		 <input type="checkbox" name="other"  value="other"> Other<br><br></div>-->
		 	<div class="col-md-12">
		  <input type="hidden" name="cod"  value="0" >
		 <!-- <?php 
		 		 $data=$this->Adminmodel->discountslab();
				 foreach ($data as $value) {
				  ?>
		 &nbsp;&nbsp;&nbsp;Discount Slab <input type="checkbox" name="discount[]"  value="<?php echo $value['disc_code']; ?>" multiple><?php echo $value['disc_show']; ?> 
		<?php } ?><br><br>-->
	
		<!-- <input type="hidden" name="gst"  value="2"> 
        &nbsp;&nbsp;&nbsp;GST :  <input type="radio" name="gst"  value="1" checked>INCLUSIVE 
		 <input type="radio" name="gst"  value="2"> EXCLUSIVE<br><br>-->
		<!--&nbsp;&nbsp;&nbsp;Cancellation :  <input type="radio" name="cancel_pro"  value="1" checked>Yes 
		 <input type="radio" name="cancel_pro"  value="2"> No<br><br>-->
		&nbsp;&nbsp;&nbsp;Gift ByOccasion : 

    		  <div class="col-md-12">
    		 <?php  foreach ($occasion as  $occval) { ?>
      				    	
      			<input type="checkbox" name="occval[]" value=" <?php echo $occval['code']; ?>"> <?php echo $occval['name']; ?>
      		<?php } ?> <br><br>
		</div><br><br>

		<!--&nbsp;&nbsp;&nbsp;Gift By Recipient : 

    		  <div class="col-md-12">
    		 <?php  foreach ($recipient as  $reci) { ?>
      				    	
      			<input type="checkbox" name="reci[]" value=" <?php echo $reci['code']; ?>" > <?php echo $reci['name']; ?>
      		<?php } ?> <br><br>
		</div>-->
    	
		
		
		</div>
		<div class="col-md-6">
		<input type="submit" name="submit" value="submit" class="btn btn-success">
		</div>
	</form>
</div>
	</div>
	</div>
</section>
</aside>
<input type="hidden" id="url" value="<?=base_url();?>">
<?php
include 'footer.php';
?>
<script type="text/javascript">
	function sub(){
		var urls=$("#url").val();
	
		
		
		 var catid = [];
        $.each($(".locationMultiple1 option:selected"), function(){            
            catid.push($(this).val());
        });
		
// 		alert( catid) ;
		
		 $.ajax({
            type: "POST",
            url: urls+"Admin/cati",
            data: {id:catid},
            cache: false,
            success: function(result){
                
                // alert(result) ;
                
                
              $("#category").html(result);
                }
            });
	
	    
	}
	function subcat(){
		var urls=$("#url").val();
		
		var sub= $("#category").val();
		
			 var sub = [];
        $.each($(".locationMultiple2 option:selected"), function(){            
            sub.push($(this).val());
        });
		
		$.ajax({
            type: "POST",
            url: urls+"Admin/subcat",
            data: {id:sub},
            cache: false,
            success: function(result){
            	if(result==''){
            		$("#subcathide").hide();
            	}else{
            		$("#subcathide").show();

              $("#subcategory").html(result);
          }
                }
            });
	}
</script>
     