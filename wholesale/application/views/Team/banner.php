<?php
 // /pr($message);die;
include('header.php');
include('sidebar.php');
?>




		<div class="col-md-9">
	<form method="post" action="<?php echo base_url('Admin/upload_banner');?>" enctype="multipart/form-data">
		<br>
		<div class="col-md-3">
		Banner_image 1<input type="file" name="file" class="form-control" ><br></div>
			<div class="col-md-3">
		Link 1<input type="text" name="link1"  class="form-control"   value="<?php echo @$banner[0]['link1']; ?>"><br></div>
			<div class="col-md-3">
		Headline 1<input type="text" name="head1"  class="form-control"   value="<?php echo @$banner[0]['head1']; ?>"><br></div>
			<div class="col-md-3">
		Content 1<input type="text" name="con1"  class="form-control"   value="<?php echo @$banner[0]['content1']; ?>"><br></div>
		<div class="col-md-3">
		Banner_image 2<input type="file" name="file1" class="form-control"  ><br></div>
			<div class="col-md-3">
				Link 2<input type="text" name="link2"  class="form-control"  value="<?php echo @$banner[0]['link2']; ?>"  ><br></div>
				<div class="col-md-3">
		Headline 2<input type="text" name="head2"  class="form-control"   value="<?php echo @$banner[0]['head1']; ?>"><br></div>
			<div class="col-md-3">
		Content 2<input type="text" name="con2"  class="form-control"  value="<?php echo @$banner[0]['content2']; ?> "><br></div>
		<div class="col-md-3">
		Banner_image 3<input type="file" name="file2" class="form-control"  ><br></div>

			<div class="col-md-3">
				Link 3<input type="text" name="link3"   class="form-control"  value="<?php echo @$banner[0]['link3']; ?>"><br></div>
				<div class="col-md-3">
		Headline 3<input type="text" name="head3"  class="form-control"  value="<?php echo @$banner[0]['head3']; ?> "><br></div>
			<div class="col-md-3">
		Content 3<input type="text" name="con3"  class="form-control"  value="<?php echo @$banner[0]['content3']; ?> "><br></div>




		
		<div class="col-md-6 ">
		<input type="submit" name="submit" value="submit" class="btn btn-success" >
		</div>

	
		<input type="hidden" name="id" value="<?php echo @$banner[0]['id']; ?>">

	</form>
</div>
	</div>
	

<input type="hidden" id="url" value="<?=base_url();?>">
<?php
include 'footer.php';
?>
