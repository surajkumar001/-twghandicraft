



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
       <center><h2><u><strong>Edit </strong></u> </h2></center>
    <form name="form3" method="post" action="<?php echo base_url('Admin/updatevideo');?>" class="form-group" enctype="multipart/form-data">
<br><input type="hidden" name="id" value="<?php echo $messages1[0]['id']; ?>">
          
            
    
           <label>Name</label>
        <input name="name" type="text"   id="sub_cat"  class="form-control" value="<?php echo $messages1[0]['name']; ?>">

        <br>    
     

        <label>Video</label>
        <input name="file" type="file"   id="sub_cat"  class="form-control">
          <input type="hidden" name="files" value="<?php echo $messages1[0]['video']; ?>">

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