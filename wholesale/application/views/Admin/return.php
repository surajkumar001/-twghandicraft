
<?php
include 'header.php';
include('sidebar.php');
?>

<style>
    .cke_inner.cke_reset {
        margin-right: 10px;
    }
    
</style>
<input type="hidden" id="url" value="<?php echo base_url(); ?>" name="">


<center><h1 style="font-style: arial; color: red;" id="success"> </h1></center>
<div class="container">
  <div class="row">
    <div class="col-md-12 col-md-offset-1">

<section>
       <center><h2><u><strong>Return Policy </strong></u> </h2></center>
    <form name="form3" method="post" action="<?php echo base_url('Admin/newreturn_submit');?>" class="form-group" enctype="multipart/form-data">
<br>

     
    <textarea name="id" id='editor2' class="form-control"> <?php echo $messages1[0]['terms']; ?> </textarea>
        
        

        <br>  
        <div style="margin-left: 10px;">
            <input class="form-control" type="file" id="file" name="image[]" multiple> 
        </div>
        <br>
        
         <div class="row" style="padding: 0; margin: 0 -15px 0 -5px;">
                        <?php $about_img  = $this->db->get('return_policy')->result(); 
                            foreach($about_img as $row) { ?>
                        <div class="col-md-3" style="margin-bottom:10px;">
                            <div class="image-area">
                              <img src="<?= $row->image ; ?>" alt="Preview" style="height:155px; width: 100%;">
                              <a class="remove-image" href="<?= base_url("Admin/delete_returnimg/".$row->id); ?>" style="display: inline;">&#215;</a>
                            </div>
                        </div>
                        <?php } ?>
                    
                    </div>
                    
        <!--<button type="submit" id="submit2"  class="btn btn-primary">Submit2 </button>-->
      <center><button type="submit" id="submit" value="submit"  class="btn btn-primary">Submit </button></center>
    </form>
                                        </section>
                                    </div>
                                </div>
                            </div>

<?php
include 'footer.php';
?>
<script>
  var colorPalette = ['000000', 'FF9966', '6699FF', '99FF66', 'CC0000', '00CC00', '0000CC', '333333', '0066FF', 'FFFFFF'];
var forePalette = $('.fore-palette');
var backPalette = $('.back-palette');

for (var i = 0; i < colorPalette.length; i++) {
  forePalette.append('<a href="#" data-command="forecolor" data-value="' + '#' + colorPalette[i] + '" style="background-color:' + '#' + colorPalette[i] + ';" class="palette-item"></a>');
  backPalette.append('<a href="#" data-command="backcolor" data-value="' + '#' + colorPalette[i] + '" style="background-color:' + '#' + colorPalette[i] + ';" class="palette-item"></a>');
}

$('.toolbar a').click(function(e) {
  var command = $(this).data('command');
  if (command == 'h1' || command == 'h2' || command == 'p') {
    document.execCommand('formatBlock', false, command);
  }
  if (command == 'forecolor' || command == 'backcolor') {
    document.execCommand($(this).data('command'), false, $(this).data('value'));
  }
    if (command == 'createlink' || command == 'insertimage') {
  url = prompt('Enter the link here: ','http:\/\/'); document.execCommand($(this).data('command'), false, url);
  }
  else document.execCommand($(this).data('command'), false, null);
});

function send(){
  var urls= $("#url").val();
  var occid= $("#editor2").val();
  
  alert(occid) ;
  
 var file= $("#file").val();

    $.ajax({
      url: urls+"Admin/newreturns",
      type: "POST",
      data: {id:occid , file:file},
      cache: false, 
       success: function(result){
     // alert(result);

//   location.reload(); 

$( "#submit2" ).trigger( "click" );


    }
    });
}
</script>