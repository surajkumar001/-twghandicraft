
<?php
include 'header.php';
include('sidebar.php');
?>

<input type="hidden" id="url" value="<?php echo base_url(); ?>" name="">


<center><h1 style="font-style: arial; color: red;" id="success"> </h1></center>
<div class="container">
  <div class="row">
    <div class="col-md-12 col-md-offset-1">

<section>
       <center><h2><u><strong>Shopping </strong></u> </h2></center>
    <form name="form3" method="post" action="<?php echo base_url('Admin/newshipping');?>" class="form-group">
<br>

    <textarea id='editor2' name="name" class="form-control"> <?php echo $messages1[0]['terms']; ?> </textarea>
        

        <br>        
      <center><button type="button" id="submit" value="submit" onclick="send();" class="btn btn-primary">Submit </button></center>
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
      url: urls+"Admin/newshipping",
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