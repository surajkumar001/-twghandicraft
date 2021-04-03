
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
    <form name="form3" method="post" action="<?php echo base_url('Admin/Addcategory');?>" class="form-group">
<br>

         <label>Parent Category</label>
        <select class="form-control" name="pcat" id="category">
         <option>please choose</option>
          <?php foreach ($pcat as  $value) { ?>
          <option value="<?php echo $value['id'];?>"  ><?php echo $value['name'];?></option>
          <?php } ?> 
         
        </select>
        <br>
     

        <label>Category ID</label>
        <input name="id" type="text" required   id="id"  class="form-control">
        <label>Category</label>
        <input name="name" type="text"  required id="category_name"  class="form-control">
          <label>Meta Title </label>
        <input name="meta_tag" type="text" required  id="meta_tag"  class="form-control">
       <label>Meta Key</label>
        <input name="meta_key" type="text"  required id="meta_key"  class="form-control">
       <label>Meta Des</label>
        <!--<input name="meta_des" type="text"   id="meta_des"  class="form-control">-->
       <textarea type="text" rows="8" name="meta_des" required class="form-control"></textarea>
           
       Description     
        <textarea type="text" id='editor2' name="desc" rows="8" class="form-control"></textarea>
        <br>
        
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
