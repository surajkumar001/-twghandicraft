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
        <div class="col-md-12 col-md-offset-2">
        <section>
            <center><h2><u><strong>Model Image </strong></u> </h2></center>
            <form  method="post" action="<?php echo base_url('Admin/addmodelimg');?>" class="form-group" enctype="multipart/form-data">
                <br>
                <link href='https://fonts.googleapis.com/css?family=Dosis|Candal' rel='stylesheet' type='text/css'>
                
                  
                    <br><label>Model Image</label>
                    <div style="margin-left: 10px;">
                        <input class="form-control" type="file" name="file" > 
                    </div>
                    <br>
                    <div class="row" style="padding: 0; margin: 0 -15px 0 -5px;">
                       <?php if($messages[0]['terms']){ ?>
                        <div class="col-md-3" style="margin-bottom: 10px;">
                            <div class="image-area">
                              <img src="<?php echo $messages[0]['terms']; ?>" alt="Preview" style="height:155px;;">
                              </div>
                        </div>
                      <?php } ?>
                    </div>
                    
                <center>
                        <button type="submit" id="submit" value="submit"  class="btn btn-primary">Submit </button>
                    </center>
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
  var occid= $("#editor").html();

    $.ajax({
      url: urls+"Admin/newreturns",
      type: "POST",
      data: {id:occid},
      cache: false, 
       success: function(result){
     // alert(result);

  location.reload(); 


    }
    });
}
</script>