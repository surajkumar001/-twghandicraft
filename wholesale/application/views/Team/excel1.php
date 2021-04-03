
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
    <form name="form3" method="post" action="<?php echo base_url('Admin/excel');?>" class="form-group"  enctype="multipart/form-data">
<br>

       <label>Add Excel CSV File</label>
       
        <br>
             
        
     

        <label>Category</label>
        <input name="excel" type="file"   id="category_name"  class="form-control">
          <span id="category_name_message1"></span> 


        <br>        
      <center><button type="submit" id="submit" value="Upload" class="btn btn-primary">Submit </button></center>
    </form>
                                        </section>
                                    </div>
                                </div>
                            </div>

<?php
include 'footer.php';
?>
