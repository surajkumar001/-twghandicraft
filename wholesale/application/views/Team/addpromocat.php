



<?php
include 'header.php';
include('sidebar.php');
?>

<input type="hidden" id="url" value="<?php echo base_url(); ?>" name="">


<center><h1 style="font-style: arial; color: red;" id="success"> </h1></center>
<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-4">

<section>
       <center><h2><u><strong>Add </strong></u> </h2></center>
    <form name="form3" method="post" action="<?php echo base_url('Admin/newpromocat');?>" class="form-group" enctype="multipart/form-data">
<br>
          
            
    
           <label>Occasion</label>
        <input name="name" type="text"   id="sub_cat"  class="form-control" >

        <br>    
     
          <label>Percent</label>
        <input name="per" type="text"   id="sub_cat"  class="form-control" >

        <br>     <label>Max. Discount</label>
        <input name="max" type="text"   id="sub_cat"  class="form-control" >

        <br>  
       
        <label>Banner</label>
        <input name="file" type="file"   id="sub_cat"  class="form-control">

        <br>
         <label>Select Category</label><br><?php foreach ($cat as  $value) {
           ?>
        <input type="checkbox" name="cat[]"  value="<?php echo $value['id']; ?>" ><?php echo $value['name']; ?><br>
      <?php } ?>
        <br>         
      <center><button type="submit" id="submit" value="submit" class="btn btn-primary">Submit </button></center>
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