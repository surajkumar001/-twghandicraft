<?php
include('header.php');

?>
<table class="table table-bordered table-striped" id="tablelist">
    <thead>
        <tr>
            <th>ID</th><th>Name</th><th>Roll</th><th>Position</th>
        </tr>
    </thead>
    <tbody>
        <?php 
      
            foreach ($result as $row) {
                ?>
               <tr id="<?php echo $row["Id"]; ?>">
                    <td><?php echo $row["Id"]; ?></td>
                    <td><?php echo $row["Name"]; ?></td>
                    <td><?php echo $row["Roll"]; ?></td>
                    <td><?php echo $row["Position"]; ?></td>
                </tr>
                
                <?php 
            
        }
        ?>
        <input type="hidden" id="url" value="<?=base_url();?>">
    </tbody>
</table>
        </aside>
<?php
include 'footer.php';
?>
<script type="text/javascript">
      var $sortable = $( "#tablelist > tbody" );
   
  $sortable.sortable({
      stop: function ( event, ui ) {
          var parameters = $sortable.sortable( "toArray" );


          $.post("<?php echo base_url(); ?>/Admin/dragtest",{value:parameters},function(result){
              alert(result);
          });
      }
  });
</script>
  