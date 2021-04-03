<?php
include('header.php');
include('sidebar.php');

?>
<style>
.img50{
    height:50px;
    width:50px;
}
</style>

 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1> Production New Order</h1>
                <ol class="breadcrumb">
                    <li>
                        <a href="<?php echo base_url('Admin/Dashboard');?>">
                            <i class="livicon" data-name="home" data-size="14" data-color="#000"></i> Dashboard
                        </a>
                    </li>
                   
                    <li class="active">Production New Order</li>
                </ol>
            </section>
            <!-- Main content -->
            <section class="content paddingleft_right15">
                <div class="row">
                    <div class="panel panel-primary filterable">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i> 
                            </h4>
                        </div>
                     
                        <br /> 
                        <div class="panel-body" style="overflow-x: auto;">
                            <form action="<?= base_url('Admin/productionorder_genrated');?>" method="post">
                            <div class="row">
                                                   
                                <div class="col-md-6">
                                  <label>Select Customer</label>
                                   
                                    <br>
                                    
                                     <input type="text" class="form-control" id="textInput" onkeyup="myFunction()" placeholder="Search by Customer Name or Mobile Number">
                                    <!-- <ul id="myUL" style="display:none;border: 1px solid #418bca;padding: 5px;">-->
                                            <ul id="myUL" style="display:none;border: 1px solid #418bca;padding: 5px;">
                                         
                                            <?php foreach($user as $row ){ ?>
                                                <?php  $phon = $row->phone ; ?>
                                                           
                                                      
                                                         <li><a href="<?= base_url('Admin/productiongenrated/'.$phon) ; ?>" ><?=$row->Owner ; ?> ( <?= $phon ; ?> )</a></li>
                                                       <?php  }?>
                                         
                                         
                                        </ul>
                                    </div>
                              
                                            
                                             <div class="col-md-6">
                                                   <label>  </label>
                                                 
                                                
                               <!--<p>  <button type="submit"  class="btn btn-primary" > Submit</button></p>-->
                                    </div> 
                                    
                                    </form>
                                     <ul id="myUL" style="display:none;border: 1px solid #418bca;padding: 5px;">
                                          <li style="border-bottom: 1px solid #418bca;"><a href="javascript:void(0)" id="insert-more">Add Product</a></li>
                                         <!-- <li><a href="javascript:void(0)">Agnes</a></li>
                                          <li><a href="javascript:void(0)">Billy</a></li>
                                          <li><a href="javascript:void(0)">Bob</a></li>
                                          <li><a href="javascript:void(0)">Calvin</a></li>
                                          <li><a href="javascript:void(0)">Christina</a></li>
                                          <li><a href="javascript:void(0)">Cindy</a></li>-->
                                        </ul>
                                </div>
                            </div>
                            
                           <table class="table table-striped table-bordered" id="mytable" style="display:none;">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Image</th>
                                        <th>Sku</th>
                                        <th>Qty</th>
                                        <th>Ready Stock</th>
                                        <th>Rate (before tax)</th>
                                        <th>Discount Rate (before tax)</th>
                                        <th>Amount</th>
                                        <th>GST %</th>
                                        <th>GST Amount</th>
                                    </tr>
                                </thead>
                                 <tbody>
                                     <tr style="display:none;">
                                         <td>1.</td>
                                         <td><img src="" class="img50"></td>
                                         <td>90X0073M</td>
                                         <td><input type="number" class="form-control" name="quantity" min="1" value="1"></td>
                                         <td></td>
                                         <td>350</td>
                                         <td>175</td>
                                         <td>875</td>
                                         <td>12</td>
                                         <td>105</td>
                                    </tr>
                                  </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-offset-11 col-md-1">
                                    <a href="<?php echo base_url('Admin/confirmdetails'); ?>" class="btn btn-primary" id="continue" style="display:none;">Continue</a>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
                <!-- row-->
            </section>
        </aside><input type="hidden" id="url" value="<?=base_url();?>">
<?php
include 'footer.php';
?>

<script>
function myFunction() {
   var ins = $("#textInput").val();
  
   if(ins != ''){
$('#myUL').show();
  var input, filter, ul, li, a, i;
  input = document.getElementById("textInput");
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUL");
  li = ul.getElementsByTagName("li");
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}else{
  $('#myUL').hide();
}
}
</script>

<script type="text/javascript">
    function protype(id){
        var urls=$("#url").val();
      
        var type = $("#"+id+"_protype").val();
       
        $.ajax({
            type: "POST",
            url: urls+"Admin/protype",
            data: {id:id,type:type},
            cache: false,
            success: function(result){
             
              
                }
            });

    }

</script>
<script type="text/javascript">
$('#chkSelectAll').click(function(event) {   
    if(this.checked) {
        // Iterate each checkbox
        $(':checkbox').each(function() {
            this.checked = true;                        
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;                       
        });
    }
  
});

function quan(id){

        var urls=$("#url").val();
      
        var type = $("#min_"+id).val();
     $.ajax({
            type: "POST",
            url: urls+"Admin/quantityupdate",
            data: {id:id,type:type},
            cache: false,
            success: function(result){
             
              location.reload();
                }
            });
}
 function add(id){
   var urls=$("#url").val();
      
        var name = $("#name_"+id).val();
        var quantity = $("#quantity_"+id).val();
        var pid = $("#pid_"+id).val();
      
           $.ajax({
            type: "POST",
            url: urls+"Admin/addsuggest",
            data: {id:id,name:name,quantity:quantity,pid:pid},
            cache: false,
            success: function(result){
            // alert(result);
             location.reload();
                }
            });
 }
</script>
<script>

    $("#insert-more").click(function () {
        $('#mytable').show();
     $("#mytable").each(function () {
         var tds = '<tr>';
         jQuery.each($('tr:last td', this), function () {
             tds += '<td>' + $(this).html() + '</td>';
         });
         tds += '</tr>';
         if ($('tbody', this).length > 0) {
             $('tbody', this).append(tds);
              $('#continue').show();
         } else {
             $(this).append(tds);
         }
     });
});


</script>