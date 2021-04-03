
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
    <form name="form3" method="post" action="<?php echo base_url('Admin/Addparentcategory');?>" class="form-group">
<br>


        <label>Parent ID</label>
        <input name="id" type="text" required class="form-control">
       <label>Parent Category</label>
        <input name="parent" type="text"   id="parent" required class="form-control">
       <label>Meta Title </label>
        <input name="meta_tag" type="text"   id="meta_tag" required  class="form-control">
       <label>Meta Key</label>
        <input name="meta_key" type="text"   id="meta_key" required  class="form-control">
       <label>Meta Des</label>
        <!--<input name="meta_des" type="text"   id="meta_des"  class="form-control">-->
        <textarea type="text"  name="meta_des" rows="8" required class="form-control"></textarea>
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
