
<?php
//pr($message1);die;
include('header.php');
include('sidebar.php');
?>








	<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-4">

<section>
       <center><h2><u><strong>Update </strong></u> </h2></center>
    <form name="form3" id="form3" method="post" action="<?php echo base_url('Admin/updatesubcategory');?>" enctype="multipart/form-data" class="form-group"><br>

    
         <input type="hidden" name="id" value="<?=$messages[0]['id']?>">
		
		

    
         <div class="col-md-12">
            <label>Category</label>
        <select class="form-control" name="catid" id="category">
          
        <?php foreach ($message1 as  $value) ?>
          <option value="<?php echo $value['id'];?>"<?php if($value['id']==$messages[0]['cat_id']){echo 'selected';}?>><?php echo $value['name'];?></option>
          
        </select>
        
       </div>
        <div class="col-md-12"></div>  

       <label>Name </label><input type="text" name="cname"  value="<?php echo $messages[0]['subcategory_name']?>" class="form-control"><br>
     
     
      <label>Meta Tag </label>
        <input name="meta_tag" type="text"   id="meta_tag"  value="<?php echo $messagess[0]['meta_tag']?>"  class="form-control">
       <label>Meta Key</label>
        <input name="meta_key" type="text"   id="meta_key"   value="<?php echo $messagess[0]['meta_key']?>" class="form-control">
       <label>Meta Des</label>
        <!--<input name="meta_des" type="text"   id="meta_des"   value="<?php echo $messagess[0]['meta_des']?>" class="form-control">-->
     <textarea type="text"  name="meta_des"  class="form-control"><?php echo $messagess[0]['meta_des']?></textarea>

      <center><button type="submit" id="submit" value="submit" class="btn btn-primary">Update </button></center>
    </form>
                                       
            </section>
        </div>
    </div>
</div>
	
<input type="hidden" value="<?php echo base_url()?>" id="url">
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
 
</script>