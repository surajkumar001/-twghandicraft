
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
       <center><h2><u><strong>Update </strong></u> </h2></center>
    <form name="form3" method="post" action="<?php echo base_url('Admin/updatefaq');?>" class="form-group">
<br>

         <label>Question </label>
      <input name="ques" type="text"   id="category_name"  class="form-control" value="<?php echo $messages[0]['ques']; ?>">
        <br>
     
<input type="hidden" name="id" value="<?php echo $messages[0]['id']; ?>">
        <label>Answer </label>
        <input name="ans" type="text"   id="category_name"  class="form-control" value="<?php echo $messages[0]['answer']; ?>">
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