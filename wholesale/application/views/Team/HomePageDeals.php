
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
    <form name="form3" method="post" action="<?php echo base_url('Admin/AddHome_Page_Deals');?>" class="form-group">
<br>
  
        <label>Home Page Category</label>
        <input name="Name" type="text"   id="parent"  class="form-control" placeholder="Enter Home Category Name" required>
        <br>
          <label>Position</label>
          <input name="position" type="text"   id="parent"  class="form-control" placeholder="Enter Home Category Position" required>
          <span id="category_name_message1"></span> 


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
