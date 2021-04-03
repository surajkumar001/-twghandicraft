



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
    <form name="form3" method="post" action="<?php echo base_url('Admin/Addsubcategory2');?>" class="form-group">
<br>
          
            
    
            <label>Category</label>
        <select class="form-control" name="cat" id="category">
         <option>please choose</option>
          <?php foreach ($messages as  $value) { ?>
          <option value="<?php echo $value['id'];?>"  ><?php echo $value['name'];?></option>
          <?php } ?> 
         
        </select>
        <br>
        
     

        <label>Sub Category</label>
        <input name="name" type="text"   id="sub_cat"  class="form-control">
          

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