
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
    <form name="form3" id="form3" method="post" action="<?php echo base_url('Admin/updatethemes');?>" enctype="multipart/form-data" class="form-group"><br>

    
         <input type="hidden" name="id" value="<?=$messages[0]['id']?>">
		
		

    
         <div class="col-md-12">
            <label>Occasion</label>
        <select class="form-control" name="cname" id="category">
          
        <?php
        $id = $messages[0]['occasion_id']; 
          $where='id';
        $table='occasion';

        $message1 = $this->Model->select_common_where($table,$where,$id);
        foreach ($message1 as  $value) ?>
          <option value="<?php echo $value['id'];?>"<?php if($value['id']==$messages[0]['occasion_id']){echo 'selected';}?>><?php echo $value['name'];?></option>
          
        </select>
        
       </div>
        <div class="col-md-12">
          <input type="hidden" name="files" value="<?php echo $messages[0]['image']?>">
     Theme<input type="file" name="file"  value="" class="form-control"><br></div>  
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