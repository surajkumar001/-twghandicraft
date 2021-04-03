



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
       <center><h2><u><strong>Add Color</strong></u> </h2></center>
    <form name="form3" method="post" action="<?php echo base_url('Admin/AddColor');?>" class="form-group">
<br>
          
         
        
     

        <label>Color Name</label>
        <input name="material" type="text" class="form-control">
          
         <label>Color code</label>
        <input name="code" type="text" class="form-control"> 

        <br>        
      <center><button type="submit" id="submit" value="submit" class="btn btn-primary">Submit </button></center>
    </form>
                                        </section>
                                    </div>
                                </div>
                            </div>

<?php
include 'footer.php';
?>
