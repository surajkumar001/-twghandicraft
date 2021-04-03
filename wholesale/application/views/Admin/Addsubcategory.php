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
    <form name="form3" method="post" action="<?php echo base_url('Admin/Addsubcategory');?>" class="form-group">
<br>
                  <label>Parent Category</label> 
            
                                    <?php   $pcat = $this->db->get('parent_category')->result()?>
                                     <select class="form-control" onchange="sub()" id="cat"  name="parent_id" required>
                    		        	<option value="">please choose</option>
                    		          <?php foreach ($pcat as  $value) { ?>
                    		          <option value="<?php echo $value->id;?>" <?php if($parent == $value->id){echo 'selected';} ?>  ><?php echo $value->name;?></option>
                    		          <?php } ?>
                    		        </select>
                                
                                 
    
            <label>Category</label>
     
         <?php   $category = $this->db->get('category')->result()?>
                                     
                                     
                                     
                                       <select class="form-control" onchange="subcat()" id="category"  name="cat" required>
			                            <option value="">please choose</option>
			                            	<?php 
                            			 	 $cat_id = $this->db->get_where('category' , array('parent_id' => $parent))->result() ;
                            			foreach($cat_id as $catt) { 
                            			?>
                            		<option value="<?=  $catt->id ?>"  <?php if($categoryid == $catt->id ){echo 'selected';} ?> ><?=  $catt->name ?></option>
                            				<?php }  ?>
			                    	</select>
        <br>
        
     

        <label>Sub Category ID</label>
        <input name="id" type="text"   id="sub_cat_id"  class="form-control">
        <label>Sub Category</label>
        <input name="name" type="text"   id="sub_cat"  class="form-control">
          
    <label>Meta Title </label>
        <input name="meta_tag" type="text"   id="meta_tag"  class="form-control">
       <label>Meta Key</label>
        <input name="meta_key" type="text"   id="meta_key"  class="form-control">
       <label>Meta Des</label>
        <!--<input name="meta_des" type="text"   id="meta_des"  class="form-control">-->
      <textarea type="text" rows="8" name="meta_des"  class="form-control"></textarea>
    
        Description     
        <textarea type="text" id='editor2' name="desc" rows="8" class="form-control"></textarea>
        <br>
   
    
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
		var catid= $("#cat").val();
		 $.ajax({
            type: "POST",
            url: urls+"Admin/positioncati",
            data: {id:catid},
            cache: false,
            success: function(result){
              $("#category").html(result);
                }
            });
	}
</script>