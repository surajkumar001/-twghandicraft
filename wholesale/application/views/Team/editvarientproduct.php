<?php
//pr($message);die;
include('header.php');
include('sidebar.php');
?>
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
	<form method="post" action="<?php echo base_url('Admin/updatevarientproduct');?>" enctype="multipart/form-data">
		<br>
		<input type="hidden" name="paths" value="<?php echo $messagess[0]['main_image1']?>">
		<input type="hidden" name="paths1" value="<?php echo $messagess[0]['main_image2']?>">
		<input type="hidden" name="paths2" value="<?php echo $messagess[0]['main_image3']?>">
		<input type="hidden" name="paths3" value="<?php echo $messagess[0]['main_image4']?>">
		<input type="hidden" name="paths4" value="<?php echo $messagess[0]['main_image5']?>">
				<input type="hidden" name="par" value="<?php echo $messagess[0]['parent_skucode']?>">

		
		<input type="hidden" name="idd" value="<?php echo $messagess[0]['id']?>">
		 <div class="col-md-4">
		Relation
		        <select class="form-control" id="cat"  name="Rel">
		        	<option>please choose</option>
		          
		          <option value="Color" <?php if($messagess[0]['relation']=='Color'){ echo "selected"; } ?>>Color</option>
		          <option value="Size" <?php if($messagess[0]['relation']=='Size'){ echo "selected"; } ?>>Size</option>
		          <option value="Design" <?php if($messagess[0]['relation']=='Design'){ echo "selected"; } ?>>Design</option>
		          <option value="Frame" <?php if($messagess[0]['relation']=='Frame'){ echo "selected"; } ?>>Frame</option>
		          
		        </select>
		        </div>
		                	<div class="col-md-4">
		Varient <input type="text" name="var" class="form-control" value="<?php  echo $messagess[0]['varient']; ?> "><br></div>
		<div class="col-md-4">
		Product Sku Code<input type="text" value="<?php echo $messagess[0]['sku_code']?>" name="sku" class="form-control"><br></div>
		<div class="col-md-4">
		Product name<input type="text" value="<?php echo $messagess[0]['pro_name']?>" name="name" class="form-control"><br></div>
		
		<div class="col-md-4">
		 Wholesale Price<input type="text" value="<?php echo $messagess[0]['selling_price']?>" name="sprice" class="form-control"><br></div>
		 <div class="col-md-4">
		Retail Price<input type="text" value="<?php echo $messagess[0]['price']?>" name="aprice" class="form-control"><br></div>
		<div class="col-md-4">
			<img src="<?php echo $messagess[0]['main_image1']?>" height="100" width="100">
		product_image1<input type="file" name="file" class="form-control" value="<?php echo $messagess[0]['main_image1']?>"><br></div>
		<div class="col-md-4">
			<img src="<?php echo $messagess[0]['main_image2']?>" height="100" width="100">
		product_image2<input type="file" name="file1" class="form-control" value="<?php echo $messagess[0]['main_image2']?>"><br></div>
		<div class="col-md-4">
			<img src="<?php echo $messagess[0]['main_image3']?>" height="100" width="100">
		product_image3<input type="file" name="file2" class="form-control" placeholder="<?php echo $messagess[0]['main_image3']?>"><br></div>
		<div class="col-md-4">
			<img src="<?php echo $messagess[0]['main_image4']?>" height="100" width="100">
		 product_image4<input type="file" name="file3" class="form-control" value="<?php echo $messagess[0]['main_image4']?>"><br></div>
		 <div class="col-md-4">
			<img src="<?php echo $messagess[0]['main_image5']?>" height="100" width="100">
		 product_image5<input type="file" name="file4" class="form-control" value="<?php echo $messagess[0]['main_image5']?>"><br></div>
		

		
	
		
				<div class="col-md-4">
		Volumetric Weight
			<input type="text" name="volume" value="<?php echo $messagess[0]['box_volume_weight']?>" class="form-control">
		
		<br><br><br></div>
		<div class="col-md-4">
		Availability
			<input type="text" name="avail"  class="form-control">
		
		<br></div><div class="col-md-4">
		Minimum Order Quantity
			<input type="text" name="minimum"  class="form-control">
		
		<br></div>
	    <div class="col-md-4">
		HSN Code
			<input type="text" name="hsncode"  class="form-control">
		
		<br></div>
		<div class="col-md-4">
		GST %<select class="form-control"   name="gstper">
			<option value="5" <?php if($messagess[0]['gst_per']=='5'){ echo "selected"; } ?>> 5%</option>
			<option value="12" <?php if($messagess[0]['gst_per']=='12'){ echo "selected"; } ?>> 12%</option>
			<option value="18" <?php if($messagess[0]['gst_per']=='18'){ echo "selected"; } ?>> 18%</option>
			<option value="28" <?php if($messagess[0]['gst_per']=='28'){ echo "selected"; } ?>> 28%</option>
			
		</select><br></div>
			<input type="hidden" name="avail" value="<?php echo $messagess[0]['availability']?>" class="form-control">
		
			<input type="hidden" name="minimum" value="<?php echo $messagess[0]['min_order_quan']?>" class="form-control">
		
		<div class="col-md-12">
		Bullet Point 1<textarea  name="point1"  class="form-control"><?php echo $messagess[0]['bullet1']?></textarea><br></div>
		<div class="col-md-12">
		Bullet Point 2<textarea  name="point2" class="form-control"><?php echo $messagess[0]['bullet2']?></textarea><br></div>
		<div class="col-md-12">
		Bullet Point 3<textarea  name="point3" class="form-control"><?php echo $messagess[0]['bullet3']?></textarea><br></div>
		<div class="col-md-12">
		Bullet Point 4<textarea  name="point4" class="form-control"><?php echo $messagess[0]['bullet4']?></textarea><br></div>
		<div class="col-md-12">
		Bullet Point 5<textarea  name="point5" class="form-control"><?php echo $messagess[0]['bullet5']?></textarea><br></div>
		<div class="col-md-12">
		Product Description<textarea  name="desc" class="form-control"><?php echo $messagess[0]['description']?></textarea><br></div>
		<div class="col-md-12">
	    Other<textarea  name="desc" class="form-control"><?php echo $messagess[0]['other']?></textarea><br></div>

		<!--<div class="col-md-12">
		Highlights 1<textarea  name="highlights1" class="form-control"><?php echo $messagess[0]['highlights1']?></textarea><br></div>
		<div class="col-md-12">
		Highlights 2<textarea  name="highlights2" class="form-control"><?php echo $messagess[0]['highlights2']?></textarea><br></div>
		<div class="col-md-12">
		Highlights 3<textarea  name="highlights3" class="form-control"><?php echo $messagess[0]['highlights3']?></textarea><br></div>

	
		<div class="col-md-12">
		Pincode Type <input type="checkbox" name="local"  value="local" <?php if($messagess[0]['pincode_local']=='local'){ echo "checked"; } ?>>Local 
		 <input type="checkbox" name="metro"  value="metro" <?php if($messagess[0]['pincode_metro']=='metro'){ echo "checked"; } ?>> Metro
		 <input type="checkbox" name="other"  value="other" <?php if($messagess[0]['pincode_other']=='other'){ echo "checked"; } ?>> Other<br><br></div>-->
		
		 <input type="hidden" name="cod"  value="1" >
		 <!--<div class="col-md-12">
		 <?php 
				 $data=$this->Adminmodel->discountslab();
				 foreach ($data as $value) {
				  ?>
		 Discount Slab <input type="checkbox" name="discount[]"  value="<?php echo $value['disc_code']; ?>" <?php if($messagess[0]['discount_code']==$value['disc_code']){ echo "checked"; } ?>><?php echo $value['disc_show']; ?> 
		<?php } ?><br><br>
		</div>-->
		
		 <input type="hidden" name="gst"  value="2" >
	<!--	 &nbsp;&nbsp;&nbsp;GST :  <input type="radio" name="gst"  value="1" checked>INCLUSIVE 
		 <input type="radio" name="gst"  value="2"> EXCLUSIVE<br><br>-->
		    <!--<div class="col-md-12">
			&nbsp;&nbsp;&nbsp;Cancellation :  <input type="radio" name="cancel_pro"  value="1" <?php if($messagess[0]['cancel_pro']=='1'){ echo "checked"; } ?>>Yes 
		 <input type="radio" name="cancel_pro"  value="2" <?php if($messagess[0]['cancel_pro']=='2'){ echo "checked"; } ?>> No<br><br></div>-->
		 &nbsp;&nbsp;&nbsp;Gift ByOccasion : 

    		  <div class="col-md-12">
    		 <?php  foreach ($occasion as  $occval) { ?>
      				    	
      			<input type="checkbox" name="occval[]" value=" <?php echo $occval['code']; ?>"> <?php echo $occval['name']; ?>
      		<?php } ?> <br><br>
		</div><br><br>

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
		catid= $("#cat").val();
		 $.ajax({
            type: "POST",
            url: urls+"Admin/cati",
            data: {id:catid},
            cache: false,
            success: function(result){
              $("#category").html(result);
                }
            });
	}
	function subcat(){
		var urls=$("#url").val();
		var sub= $("#category").val();
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