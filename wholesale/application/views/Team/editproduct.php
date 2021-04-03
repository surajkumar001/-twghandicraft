<?php
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

		<div class="col-md-12">
	<form method="post" action="<?php echo base_url('Admin/updateproduct');?>" enctype="multipart/form-data">
		<br>
		<input type="hidden" name="paths" value="<?php echo $mes[0]['main_image1']?>">
		<input type="hidden" name="paths1" value="<?php echo $mes[0]['main_image2']?>">
		<input type="hidden" name="paths2" value="<?php echo $mes[0]['main_image3']?>">
		<input type="hidden" name="paths3" value="<?php echo $mes[0]['main_image4']?>">  
		<input type="hidden" name="paths4" value="<?php echo $mes[0]['main_image5']?>">


		
		<input type="hidden" name="idds" value="<?php echo $mes[0]['id']?>">
	
		<div class="col-md-6">
		Product name<input type="text" value="<?php echo $mes[0]['pro_name']?>" name="name" class="form-control"><br></div>
		
		<div class="col-md-3">
		 Wholesale Price<input type="text" value="<?php echo $mes[0]['selling_price']?>" name="sprice" class="form-control"><br></div>
		 <div class="col-md-3">
		Retail Price<input type="text" value="<?php echo $mes[0]['price']?>" name="aprice" class="form-control"><br></div>
			<div class="col-md-4">
		Sku Code<input type="text" value="<?php echo $mes[0]['sku_code']?>" name="sku" class="form-control"><br>
		Parent Sku Code
	        	<input type="text" value="<?php echo $mes[0]['parent_sku']?>" name="psku" class="form-control">
		</div>
		<div class="col-md-4">
			<img src="<?php echo $mes[0]['main_image1']?>" height="100" width="100">
		product_image1<input type="file" name="file" class="form-control" value="<?php echo $mes[0]['main_image1']?>"><br></div>
		<div class="col-md-4">
			<img src="<?php echo $mes[0]['main_image2']?>" height="100" width="100">
		product_image2<input type="file" name="file1" class="form-control" value="<?php echo $mes[0]['main_image2']?>"><br></div>
		<div class="col-md-4">
			<img src="<?php echo $mes[0]['main_image3']?>" height="100" width="100">
		product_image3<input type="file" name="file2" class="form-control" placeholder="<?php echo $mes[0]['main_image3']?>"><br></div>
		<div class="col-md-4">
			<img src="<?php echo $mes[0]['main_image4']?>" height="100" width="100">
		 product_image4<input type="file" name="file3" class="form-control" value="<?php echo $mes[0]['main_image4']?>"><br></div>
		 <div class="col-md-4">
			<img src="<?php echo $mes[0]['main_image5']?>" height="100" width="100">
		 product_image5<input type="file" name="file4" class="form-control" value="<?php echo $mes[0]['main_image5']?>"><br></div>
		 <div class="col-md-6">
		Parent Category
		
		    
<select class="locationMultiple1 form-control" name="pcat[]" onchange="sub()" multiple="multiple">
    	<option>please choose</option>
		          <?php 
		         $parent_cat = $mes[0]['parent_cat']  ; 
		           $pat_cat =   explode(",",$parent_cat) ; json_decode();

		          foreach ($pcat as  $value){  
		          
		         
		          ?>
		          <option value="<?php echo $value['id'];?>" <?php foreach($pat_cat as $pat) if($pat ==$value['id']){echo 'selected';} ?>><?php echo $value['name'];?></option>
		         <?php }?>
</select>

		        </div>

		<div class="col-md-6">
		    
		Category<select class="locationMultiple2 form-control" name="cat[]"  onchange="subcat()" id="category" multiple="multiple">
		
			<?php 
			
			 // $cat = json_decode($mes[0]['category_id'] );
			 
			    $cat =   explode(",",$mes[0]['category_id']) ;
			  
			  
			 //  $pat_cat = json_decode($mes[0]['parent_cat'] );
			   
			    $pat_cat =   explode(",",$parent_cat) ;
			   
			  foreach($pat_cat as $pc ){
			      
			      
			 $cat_id = $this->db->get_where('category' , array('parent_id' => $pc))->result() ;
			 
			 
			foreach($cat_id as $catt) { 
			
			?>
		<option value="<?=  $catt->id ?>"  <?php foreach($cat as $c) {if($c== $catt->id ){echo 'selected';} }?> ><?=  $catt->name ?></option>
				<?php } } ?>
		</select><br>
	
		</div>
		
		<div class="col-md-6" id="subcathide">
		    
		 
		    
		Sub Category<select class="locationMultiple3 form-control" name="sub_cat[]" id="subcategory" multiple="multiple">
			
		  <?php 
			//  $cat = json_decode($mes[0]['category_id'] );
			  
			   $cat =   explode(",",$mes[0]['category_id']) ;
			   
			 //  $sub_cat = json_decode($mes[0]['sub_catid'] );
			   
			    $sub_cat =   explode(",",$mes[0]['sub_catid']) ;
			    
			  foreach($cat as $pc ){
			      
			      
			 $cat_id = $this->db->get_where('sub_category' , array('cat_id' => $pc))->result() ;
			 
			 
			foreach($cat_id as $catt) { 
			
			?>
			<option value="<?php echo $catt->id ?>"   <?php foreach($sub_cat as $c) {if($c== $catt->id ){echo 'selected';} }?>    ><?= $catt->subcategory_name ; ?></option>
			
	
		
		<?php }  } ?>
		
			</select><br> 
		</div>
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
		 Weight<input type="text" name="weight" value="<?php echo $mes[0]['weight']?>" class="form-control"><br></div>

		<div class="col-md-3">
			Material
			
			<input type="text" name="material" value="<?php echo $mes[0]['material']?>" class="form-control">
		<br></div>
		<div class="col-md-3">
		Color
			<input type="text" name="color" value="<?php echo $mes[0]['color']?>" class="form-control">
		
		<br></div>

		<div class="col-md-3">
		Size
			<input type="text" name="size" value="<?php echo $mes[0]['size']?>" class="form-control">
		
		<br></div>
				<div class="col-md-3">
		Volumetric Weight
			<input type="text" name="volume" value="<?php echo $mes[0]['box_volume_weight']?>" class="form-control">
		
		<br></div>
		
			<div class="col-md-3">
		Availability
			<input type="text" name="avail" value="<?php echo $mes[0]['availability']?>"  class="form-control">
		
		<br></div><div class="col-md-3">
		Minimum Order Quantity
			<input type="text" name="minimum" value="<?php echo $mes[0]['min_order_quan']?>"  class="form-control">
		
		<br></div>
		<div class="col-md-3">
		Low Alert
			<input type="text" name="lowalert" value="<?php echo $mes[0]['low_alert'] ;?>"   class="form-control">
		
		<br></div>
	    <div class="col-md-3">
		HSN Code
			<input type="text" name="hsncode" value="<?php  print_r($mes[0]['hsn_code']) ;?>" class="form-control">
		
		<br></div>
		
		
		 <div class="col-md-3">
		Billing Name
			<input type="text" name="billing_name"  value="<?php  print_r($mes[0]['billing_name']) ;?>" class="form-control">
		
		<br></div>
		
  <div class="col-md-3">
	New Arrivel 
			<input type="text" name="new_arrivel"  value="<?php  print_r($mes[0]['new_arrivel']) ;?>" class="form-control">
		
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
		
				<div class="col-md-12">
		Bullet Point 1<textarea  name="point1"  class="form-control"><?php echo $mes[0]['bullet1']?></textarea><br></div>
		<div class="col-md-12">
		Bullet Point 2<textarea  name="point2" class="form-control"><?php echo $mes[0]['bullet2']?></textarea><br></div>
		<div class="col-md-12">
		Bullet Point 3<textarea  name="point3" class="form-control"><?php echo $mes[0]['bullet3']?></textarea><br></div>
		<div class="col-md-12">
		Bullet Point 4<textarea  name="point4" class="form-control"><?php echo $mes[0]['bullet4']?></textarea><br></div>
		<div class="col-md-12">
		Bullet Point 5<textarea  name="point5" class="form-control"><?php echo $mes[0]['bullet5']?></textarea><br></div>
		<div class="col-md-12">
		Product Description<textarea  name="desc" class="form-control"><?php echo $mes[0]['description']?></textarea><br></div>
        <div class="col-md-12">
		other<textarea  name="other" class="form-control"><?php echo $mes[0]['other']?></textarea><br></div>
		
		<!--<div class="col-md-12">-->
		<!--Highlights 1<textarea  name="highlights1" class="form-control"><?php echo $mes[0]['highlights1']?></textarea><br></div>-->
		<!--<div class="col-md-12">-->
		<!--Highlights 2<textarea  name="highlights2" class="form-control"><?php echo $mes[0]['highlights2']?></textarea><br></div>-->
		<!--<div class="col-md-12">-->
		<!--Highlights 3<textarea  name="highlights3" class="form-control"><?php echo $mes[0]['highlights3']?></textarea><br></div>-->
		
<div class="col-md-12">
		Meta title<textarea  name="metatag" class="form-control"><?php echo $mes[0]['meta_title']?></textarea><br></div>
			<div class="col-md-12">
		Meta Keyword<textarea  name="metakey" class="form-control"><?php echo $mes[0]['meta_keyword']?></textarea><br></div>
		<div class="col-md-12">
		Meta Description<textarea  name="metadesc" class="form-control"><?php echo $mes[0]['meta_description']?></textarea><br></div>
		<!--<div class="col-md-12">
		Pincode Type <input type="checkbox" name="local"  value="local" <?php if($mes[0]['pincode_local']=='local'){ echo "checked"; } ?>>Local 
		 <input type="checkbox" name="metro"  value="metro" <?php if($mes[0]['pincode_metro']=='metro'){ echo "checked"; } ?>> Metro
		 <input type="checkbox" name="other"  value="other" <?php if($mes[0]['pincode_other']=='other'){ echo "checked"; } ?>> Other<br><br></div>-->
		
		
		<!-- <input type="hidden" name="cod"  value="1"> 
		    <input type="hidden" name="gst"  value="2"> 
        &nbsp;&nbsp;&nbsp;GST :  <input type="radio" name="gst"  value="1" checked>INCLUSIVE 
		 <input type="radio" name="gst"  value="2"> EXCLUSIVE<br><br>-->
	
		 <input type="hidden" name="gst"  value="2" >
		  <!-- <div class="col-md-12">
			&nbsp;&nbsp;&nbsp;Cancellation :  <input type="radio" name="cancel_pro"  value="1" <?php if($mes[0]['cancel_pro']=='1'){ echo "checked"; } ?>>Yes 
		 <input type="radio" name="cancel_pro"  value="2" <?php if($mes[0]['cancel_pro']=='2'){ echo "checked"; } ?>> No<br><br></div>-->
		 <div class="col-md-12">
		GST %<select class="form-control"   name="gstper">
			<option value="5" <?php if($mes[0]['gst_per']=='5'){ echo "selected"; } ?>> 5%</option>
			<option value="12" <?php if($mes[0]['gst_per']=='12'){ echo "selected"; } ?>> 12%</option>
			<option value="18" <?php if($mes[0]['gst_per']=='18'){ echo "selected"; } ?>> 18%</option>
			<option value="28" <?php if($mes[0]['gst_per']=='28'){ echo "selected"; } ?>> 28%</option>
			
		</select><br></div>
	 <div class="col-md-12">
			&nbsp;&nbsp;&nbsp;Gift By Occasion : 
			
             <?php  foreach ($occasion as  $occval) { 
             
            //  print_r($occval['code']);
             
            //  echo "<br>" ; 
             
            $occ_select = $mes[0]['occasion'] ;
             
              $occ = explode(",",$occ_select) ;
              
?>
   
			 <input type="checkbox" name="occval[]"  value="<?php echo $occval['code']; ?>" 
			            <?php   foreach ($occ as $code){
                  
                if(trim($code) == trim($occval['code'])){
                    
                    echo "checked" ;
                
                }
                }?>
			 
			 ><?php echo $occval['name']; 
		
	
		
		}?> <br><br></div>
				<!--   <div class="col-md-12">
			 &nbsp;&nbsp;&nbsp;Gift By Recipient : 
   <?php  foreach ($recipient as  $reci) { ?>
			 <input type="checkbox" name="reci[]"  value="<?php echo $reci['code']; ?>" <?php if($mes[0]['recipient']==$reci['code']){ echo "checked"; } ?>> <?php echo $reci['name']; ?>
			 <?php } ?> <br><br></div>-->

		 <!--<div class="col-md-12">
		
		 <?php 
				 $data=$this->Adminmodel->discountslab();
				 foreach ($data as $value) {
				  ?>
		 Discount Slab <input type="checkbox" name="discount[]"  value="<?php echo $value['disc_code']; ?>" <?php if($mes[0]['discount_code']==$value['disc_code']){ echo "checked"; } ?>><?php echo $value['disc_show']; ?> 
		<?php } ?><br></div>-->
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