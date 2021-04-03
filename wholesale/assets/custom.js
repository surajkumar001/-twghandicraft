function email(){
      var urls = $("#url").val();
            var email = $("#email").val();
         alert(email);
         alert(url);exit();
            $.ajax({

                    type: "POST",

                    url: urls+"Admin/chat",

                    data: {userid:userid,proid:proid,text:text,queryid:queryid},

                    cache: false,

                    success: function(result){
                       window.location.reload();
                    }

                    });
}