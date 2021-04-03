<!DOCTYPE html>
<html>
    <head>
        <title>load scroll</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    </head>
    <body>
       
            <h2 align="center"><u>load scroll in codeigniter </u></h2>
            <hr>

            <br />
            <div id="load_data"></div>



            <div id="load_data_message"></div>
            <br />
            <br />
            <br />
            <br />
            <br />
            <br />
        
        <div class="footer">
          
        </div>
    </body>
</html>
<script>
  $(document).ready(function(){

    var limit = 3;
    var start = 0;
    var action = 'inactive';

    function load_limit(limit)
    {
      var output = '';
      for(var count=0; count<limit; count++)
      {
        output += '<div class="post_data">';
      
        output += '</div>';
      }
      $('#load_data_message').html(output);
    }

    load_limit(limit);

    function load_data(limit, start)
    {
      $.ajax({
        url:"loadscroll/kirim",
        method:"POST",
        data:{limit:limit, start:start},
        cache: false,
        success:function(data)
        {
          if(data == '')
          {
            $('#load_data_message').html('<h3  align="center">finish </h3>');
            action = 'active';
          }
          else
          {
            $('#load_data').append(data);
            $('#load_data_message').html("");
            action = 'inactive';
          }
        }
      })
    }

    if(action == 'inactive')
    {
      action = 'active';
      load_data(limit, start);
    }

    $(window).scroll(function(){
      if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
      {
        load_limit(limit);
        action = 'active';
        start = start + limit;
        setTimeout(function(){
          load_data(limit, start);
        }, 1000);
      }
    });

  });
</script>
