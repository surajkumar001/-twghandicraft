<?php
 // /pr($message);die;
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
	<form method="post" action="<?php echo base_url('Admin/uploadprogift');?>" enctype="multipart/form-data">
		<br>
		
		<div class="col-md-6">
		Product Sku Code<input type="text" name="sku" class="form-control"><br></div>
		<div class="col-md-6">
		Product name<input type="text" name="name" class="form-control"><br></div>

		<div class="col-md-6">
		 Selling Price<input type="text" name="sprice" class="form-control"><br></div>
		 <div class="col-md-6">
		MRP<input type="text" name="aprice" class="form-control"><br></div>
		<div class="col-md-6">
		product_image1<input type="file" name="file" class="form-control"><br></div>
		<div class="col-md-6">
		product_image2<input type="file" name="file1" class="form-control"><br></div>
		<div class="col-md-6">
		product_image3<input type="file" name="file2" class="form-control"><br></div>
		<div class="col-md-6">
		 product_image4<input type="file" name="file3" class="form-control"><br></div>
		 		<div class="col-md-6">
		 product_image5<input type="file" name="file4" class="form-control"><br></div>
 <div class="col-md-6">
		Category
		        <select class="form-control" id="cat"  name="pcat">
		        	<option>please choose</option>
		          <?php foreach ($category as  $value) { ?>
		          <option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
		          <?php } ?>
		        </select>
		        </div>

		<div class="col-md-6">
		Occasion<select class="form-control" onchange="subcat()" id="category"  name="cat">
		
			<option>please choose</option>
		          <?php foreach ($occasion as  $values) { ?>
		          <option value="<?php echo $values['id'];?>"><?php echo $values['name'];?></option>
		          <?php } ?>
		</select><br></div>
		<div class="col-md-6" id="subcathide">
		Themes<select class="form-control"  id="subcategory" name="sub_cat">
			<option>please choose</option>
			
		</select><br></div>
		

		 <div class="col-md-6">
		 Weight<input type="text" name="weight" class="form-control"><br></div>

		<div class="col-md-6">
			Material
			
			<input type="text" name="material" class="form-control">
			
	
		<br></div>


		<div class="col-md-6">
		Color
			<input type="text" name="color" class="form-control">
			
		<br></div>

		<div class="col-md-6">
		Size
			<input type="text" name="size" class="form-control">
		<br></div>
		<div class="col-md-6">
		Volumetric Weight
			<input type="text" name="volume"  class="form-control">
		
		<br></div>
		<div class="col-md-6">
		Availability
			<input type="text" name="avail"  class="form-control">
		
		<br></div><div class="col-md-6">
		Minimum Order Quantity
			<input type="text" name="minimum"  class="form-control">
		
		<br></div>

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
		Highlights 1<textarea  name="highlights1" class="form-control"></textarea><br></div>
		<div class="col-md-12">
		Highlights 2<textarea  name="highlights2" class="form-control"></textarea><br></div>
		<div class="col-md-12">
		Highlights 3<textarea  name="highlights3" class="form-control"></textarea><br></div>

		<div class="col-md-12">
		Meta title<textarea  name="metatag" class="form-control"></textarea><br></div>
			<div class="col-md-12">
		Meta Keyword<textarea  name="metakey" class="form-control"></textarea><br></div>
		<div class="col-md-12">
		Meta Description<textarea  name="metadesc" class="form-control"></textarea><br></div>
			<div class="col-md-12">
		Pincode Type <input type="checkbox" name="local"  value="local">Local 
		 <input type="checkbox" name="metro"  value="metro"> Metro
		 <input type="checkbox" name="other"  value="other"> Other<br><br></div>
		  <div class="col-md-12">
		 <?php 
				 $data=$this->Adminmodel->discountslab();
				 foreach ($data as $value) {
				  ?>
		 Discount Slab <input type="checkbox" name="discount[]"  value="<?php echo $value['disc_code']; ?>" <?php if($message[0]['discount_code']==$value['disc_code']){ echo "checked"; } ?>><?php echo $value['disc_show']; ?> 
		<?php } ?><br><br>
		</div>
		 	<div class="col-md-12">
		COD Available :  <input type="radio" name="cod"  value="1" checked>Yes 
		 <input type="radio" name="cod"  value="2"> No<br><br></div>
		  
		&nbsp;&nbsp;&nbsp;GST :  <input type="radio" name="gst"  value="1" checked>INCLUSIVE 
		 <input type="radio" name="gst"  value="2"> EXCLUSIVE<br><br>
		 <div class="col-md-12">
		 		&nbsp;&nbsp;&nbsp;Cancellation :  <input type="radio" name="cancel_pro"  value="1" checked>Yes 
		 <input type="radio" name="cancel_pro"  value="2"> No<br><br>
		 </div>
		 <div class="col-md-6" >
		GST %<select class="form-control"   name="gstper">
			<option value="5"> 5%</option>
			<option value="12"> 12%</option>
			<option value="18"> 18%</option>
			<option value="28"> 28%</option>
			
		</select><br></div>
		
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
            url: urls+"Admin/themeselect",
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