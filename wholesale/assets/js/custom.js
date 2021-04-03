function emailtest(){
  //alert("sdsd");exit();
      var urls = $("#url").val();
            var email = $("#emails").val();
             var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            //var address = document.getElementById[email].value;
            if (reg.test(email) == false) 
            {
                $(".alert.alert-danger.emailvalid").fadeTo(2000, 500).slideUp(500, function(){
               $(".alert.alert-danger.emailvalid").slideUp(500);
                $("#emails").val(test);
                }); 
                return (false);
            }
         var test ='';
            $.ajax({

                    type: "POST",

                    url: urls+"Artnhub/useremail",

                    data: {email:email},

                    cache: false,

                    success: function(result){
                      if(result=='already'){
               $(".alert.alert-danger.email").fadeTo(2000, 500).slideUp(500, function(){
               $(".alert.alert-danger.email").slideUp(500);
                $("#emails").val(test);
                });   
                      }
                      // window.location.reload();
                    }

                    });

}

function nametest(){
      var urls = $("#url").val();
            var name = $("#names").val();
      
            $.ajax({

                    type: "POST",

                    url: urls+"Artnhub/username",

                    data: {name:name},

                    cache: false,

                    success: function(result){
                     
                   /*   if(result=='already'){
               $(".alert.alert-danger").fadeTo(2000, 500).slideUp(500, function(){
               $(".alert.alert-danger").slideUp(500);
                });   
                      }*/
                      // window.location.reload();
                    }

                    });

}
    
    function phonetest(){
      var urls = $("#url").val();
            var number = $("#number").val();
            var test ='';
        if(!$('#number').val().match('[0-9]{10}'))  {
                
               
                  $(".alert.alert-danger.phone").fadeTo(2000, 500).slideUp(500, function(){
               $(".alert.alert-danger.phone").slideUp(500);
                }); 
                  $("#number").val(test);
                exit();
            }  
            $.ajax({

                    type: "POST",

                    url: urls+"Artnhub/usernumber",

                    data: {number:number},

                    cache: false,

                    success: function(result){
                       if(result=='already')  {
                
               
                  $(".alert.alert-danger.phonevalid").fadeTo(2000, 500).slideUp(500, function(){
               $(".alert.alert-danger.phonevalid").slideUp(500);

                });  
              
                $("#number").val(test);
                 exit();
            } else{
                      $("#otpno").html(number);
                     
              }
                    }

                    });

}         
 
  function passtest(){
      var urls = $("#url").val();
            var pass = $("#passed").val();

    
        
              
            $.ajax({

                    type: "POST",

                    url: urls+"Artnhub/userpass",

                    data: {pass:pass},

                    cache: false,

                    success: function(result){
                      //alert(result);
                   
                    }

                    });

}        
function cpasstest(){
      var urls = $("#url").val();
            var cpass = $("#cpass").val();
             var pass = $("#passed").val();

    
              var name = $("#names").val();
                var email = $("#emails").val();
     
        var phone = $("#number").val();
        var test='';

           
            $.ajax({

                    type: "POST",

                    url: urls+"Artnhub/usercpass",

                    data: {cpass:cpass},

                    cache: false,

                    success: function(result){
                     // alert(result);exit();
                      if(result=='notmached'){
               $(".alert.alert-danger.matches").fadeTo(2000, 500).slideUp(500, function(){
               $(".alert.alert-danger.matches").slideUp(500);
                });   
                 $("#cpass").val(test);

                      }else{
                         $("#showsignup").show();
                      $("#hidesignup").hide();
                      }
                    
                     
                    
             
                    }

                    });

}         
 
      

 $('.example-p-1.signup').on('click', function(){

 var urls = $("#url").val();
            var number = $("#number").val();
             var email = $("#emails").val();
             var pass = $("#passed").val();

              var cpass = $("#cpass").val();
          
        if(number==''){
              $.alert({
                            title: 'Enter Number',
                            content: 'Please Enter Number',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Ok',
                                     className: 'add_button',
                                  
                             
                                }
                         
                            }
                        });
        }
         if(email==''){
              $.alert({
                            title: 'Enter Email',
                            content: 'Please Enter Email',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Ok',
                                     className: 'add_button',
                                  
                             
                                }
                         
                            }
                        });
        }
         if(pass==''){
              $.alert({
                            title: 'Enter Password',
                            content: 'Please Enter Password',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Ok',
                                     className: 'add_button',
                                  
                             
                                }
                         
                            }
                        });
        }
        if(cpass==''){
              $.alert({
                            title: 'Enter Confirm Password',
                            content: 'Please Enter Confirm Password',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Ok',
                                     className: 'add_button',
                                  
                             
                                }
                         
                            }
                        });
        }      
                    });
 function signupotp(){

  var urls = $("#url").val();
            var number = $("#number").val();

    $.ajax({

                    type: "POST",

                      url: urls+"Artnhub/newotp",

                    data: {number:number},

                    cache: false,

                    success: function(result){
                    
              
                    }

                    });
 }

 function validotp(){

  var urls = $("#url").val();
            var otp = $("#enterotp").val();
    $.ajax({

                    type: "POST",

                      url: urls+"Artnhub/validotp",

                    data: {otp:otp},

                    cache: false,

                    success: function(result){
                       location.reload();
                      if(result=='invalid'){
                       $.alert({
                            title: 'OTP',
                            content: 'Please Enter Valid OTP',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Ok',
                                     className: 'add_button',
                                    
                             
                                }
                         
                            }
                        });
                     
                     }
                     else if(result=='done'){
                      $.alert({
                            title: 'Success',
                            content: 'You have Successfully Registered',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Ok',
                                     className: 'add_button',
                                     action: function () {
                              location.reload();
                               }
                             
                                }
                         
                            }
                        });
                     }
              
                    }

                    });
 }
 function signmail(){
            var email = $("#signemail").val();
             var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
               var test ='';
            //var address = document.getElementById[email].value;
            if (reg.test(email) == false) 
            {
                $(".alert.alert-danger.signemail").fadeTo(2000, 500).slideUp(500, function(){
               $(".alert.alert-danger.signemail").slideUp(500);
               
                }); 
                 $("#signemail").val(test);
                return (false);
            }
}

$('.login').on('click', function(){

            var urls = $("#url").val();
             var email = $("#signemail").val();
             var pass = $("#pass").val();
             
             
           
             if(pass == ''  || email ==''){
                 
                //  alert('exit');
                 
                 exit;
             }
             else{

        $.ajax({

                    type: "POST",

                      url: urls+"Artnhub/login",

                    data: {email:email,pass:pass},

                    cache: false,

                    success: function(result){
                       
                    //   alert(result) ;
                       
                       
                      window.location.reload();
                      if(result=='invalid'){
                       $.alert({
                            title: 'Enter Valid Detail',
                            content: 'Please Enter Valid Email/Phone Number',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Ok',
                                     className: 'add_button',
                                    
                             
                                }
                         
                            }
                        });
                     
                     }
                     else if(result=='done'){
                         
 
                      $.alert({
                            title: 'Success',
                            content: 'You have Successfully login',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Ok',
                                     className: 'add_button',
                                     action: function () {
                              location.reload();
                               }
                             
                                }
                         
                            }
                        });
                     }
               location.reload(true);
                    }
           
                    });
                    
             }
          });



 function pincode(){

  var urls = $("#url").val();
            var pincodecheck = $("#pincodecheck").val();
              var pro_id=$("#pro_id").val();

    $.ajax({

                    type: "POST",

                      url: urls+"Artnhub/pincode",

                    data: {pincodecheck:pincodecheck,pro_id:pro_id},

                    cache: false,

                    success: function(result){
                      //alert(result);
                  

                    if (result=='not') {
                    $(".login_result.error").show();
                    $(".login.success").hide();


                   }else{
                    
                     $(".login.success").show();
                       $(".login_result.error").hide();
                        $(".login.success").html(result);
                   }
              
                    }

                    });
}

/*
 function discountslab(){

  var urls = $("#url").val();
            var quantity = $("#quantity").val();
            var discount_code = $("#discount_code").val();
            var selling_price = $("#selling_price").val();

    $.ajax({

                    type: "POST",

                      url: urls+"Artnhub/discountslab",

                    data: {quantity:quantity,discount_code:discount_code,selling_price:selling_price},

                    cache: false,

                    success: function(result){
                      alert(result);
                
                    }

                    });
}*/
    function diplaycat(id){
        var urls=$("#url").val();
      
        var type = $("#"+id+"_flag").val();
       
        $.ajax({
            type: "POST",
            url: urls+"Admin/flag",
            data: {id:id,type:type},
            cache: false,
            success: function(result){
             
              
                }
            });

    }

 function buynow(){


        var pincodecheck = $("#pincodecheck").val();
       
        if(pincodecheck==''){
          alert("please enter pincode");exit();
        }
        var urls=$("#url").val();
        var selling_price=$("#selling_price").val();
        var quantity=$("#quantity").val();
        var pro_id=$("#pro_id").val();
         var gst=$("#gst").val();
        var gstinc=$("#gstinc").val();

    $.ajax({

                    type: "POST",

                      url: urls+"Artnhub/pincode",

                    data: {pincodecheck:pincodecheck,pro_id:pro_id},

                    cache: false,

                    success: function(result){
                    
                   if(result!='not'){
                     $.ajax({
            type: "POST",
            url: urls+"Artnhub/cartsession",
            data: {selling_price:selling_price,quantity:quantity,pro_id:pro_id,gst:gst,gstinc:gstinc},
            cache: false,
            success: function(result){
              //alert(result);
           window.location.href=urls+'cart';
              
                }
            });

                   }else{
                    alert("please enter Valid pincode");exit();
                   }
              
                    }

                    });
       

    }

     function cart(){


        var pincodecheck = 201301 ;// $("#pincodecheck").val();
        
        
      
     
      /*   if (!$('li.btnss').hasClass('active') ) {
          alert("please Select Option");exit();
    /*$('#btnvarient').effect("shake");*/
 /* }*/
       
       
        if(pincodecheck==''){
          alert("please enter pincode");exit();
        }
        var urls=$("#url").val();
        var selling_price=$("#selling_price").val();
        var gst=$("#gst").val();
        var gstinc=$("#gstinc").val();
        var quantity=$("#quantity").val();
        var pro_id=$("#pro_id").val();
        
      
        
    $.ajax({

                    type: "POST",

                      url: urls+"Artnhub/pincode",

                    data: {pincodecheck:pincodecheck,pro_id:pro_id},

                    cache: false,

                    success: function(results){
                      //alert(result);
                   if(results!='not'){
                   
                     $.ajax({
            type: "POST",
            url: urls+"Artnhub/cartsession",
            data: {selling_price:selling_price,quantity:quantity,pro_id:pro_id,gst:gst,gstinc:gstinc},
            cache: false,
            success: function(result){
             // alert(result);
            location.reload();
              
                }
            });

                   }else{
                    alert("please enter Valid pincode");exit();
                   }
              
                    }

                    });
       

    }
    
    
         function cart2(id ){
             
             
      var pincodecheck = 201301 ; 
       
        var urls=$(".url").val();
        
    
        var selling_price=$("#selling_price_"+id).val();
        
        //  alert(selling_price) ;
       
        var gst=$("#gst_"+id).val();
        var gstinc=$("#gstinc_"+id).val();
        var quantity= $("#min_qty_"+id).val(); 
       
        var cart_count_val = $("#cart_count_val").val();
        
        var pro_id= id  ; //$(".pro_id").val();
        
        $.ajax({
                    type: "POST",

                      //alert(result);
                
            type: "POST",
            url: urls+"Artnhub/cartsession3",
            data: {selling_price:selling_price,quantity:quantity,pro_id:pro_id,gst:gst,gstinc:gstinc},
            cache: false,
            success: function(result){
                
                
                      var obj = JSON.parse(result);
                      if(obj.status==true){
                        
                var final_cart_val = Number(cart_count_val) + Number(1) ; 
                 $("#cart_count_val").val(final_cart_val);
                 $("#cart_count_span").html(final_cart_val);
                 
                 
                //   alert('Product Adde in Cart');
                   
                     $.alert({
                            title: 'Success',
                            content: 'Product Added in Cart',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                          
                        });
                 
                      }
                      else{
                             $.alert({
                            title: 'Success',
                            content: 'Product Already in Cart',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                          
                        });
                          
                        //   alert('Product Already in Cart');
                          
                      }
                
                //   alert(result);
            // location.reload();
              
                }
          

              
                    

                    });
       
        
         $.ajax({

                    type: "POST",

                      url: urls+"Artnhub/pincode",

                    data: {pincodecheck:pincodecheck,pro_id:pro_id},

                    cache: false,

                    success: function(results){
        

                    }
       
                    });

    }
    
    
    
    function production_cart2(id ){
             
          var pincodecheck = 201301 ; 
          var urls=$(".url").val();
          var selling_price=$("#selling_price_"+id).val();
          var gst=$("#gst_"+id).val();
          var gstinc=$("#gstinc_"+id).val();
          var quantity= $("#min_qty_"+id).val();
          var pro_id= id  ; //$(".pro_id").val();
        
        //   alert(selling_price) ;
         
        //  alert(quantity);
        
         $.ajax({
                    type: "POST",
                      url: urls+"Artnhub/pincode",
                    data: {pincodecheck:pincodecheck,pro_id:pro_id},
                    cache: false,
                    success: function(results){
        
                $.ajax({
                        type: "POST",
    
                          //alert(result);
                type: "POST",
                url: urls+"Artnhub/addproduction",
                data: {selling_price:selling_price,quantity:quantity,pro_id:pro_id,gst:gst,gstinc:gstinc},
                cache: false,
                success: function(result){
                //   alert(result);
                location.reload();
                  
                    }
    
                });

            }

            });

    }
    
    
    function production_cart3(id ){
             
          var pincodecheck = 201301 ; 
          var urls=$(".url").val();
          var selling_price=$("#selling_price_"+id).val();
          var gst=$("#gst_"+id).val();
          var gstinc=$("#gstinc_"+id).val();
          var quantity= $("#min_qty_"+id).val();
          var pro_id= id  ; //$(".pro_id").val();
        
        //   alert(selling_price) ;
         
        //  alert(quantity);
        
         $.ajax({
                    type: "POST",
                      url: urls+"Artnhub/pincode",
                    data: {pincodecheck:pincodecheck,pro_id:pro_id},
                    cache: false,
                    success: function(results){
        
                $.ajax({
                        type: "POST",
    
                          //alert(result);
                type: "POST",
                url: urls+"Artnhub/addproduction",
                data: {selling_price:selling_price,quantity:quantity,pro_id:pro_id,gst:gst,gstinc:gstinc},
                cache: false,
                success: function(result){
                //   alert(result);
                var pathArray = window.location.pathname.split('/login');
                 location.assign(pathArray);
                     location.assign('http://adsfly.in/wholesale/login');
             
                // $( "#login_production" ).trigger( "click" );
                  
                    }
    
                });

            }

            });

    }

 function production_cart4(id ){
             
           var pincodecheck = 201301 ; 
          var urls= $("#url").val();
          var selling_price=$("#selling_price").val();
          var gst=$("#gst").val();
          var gstinc=$("#gstinc").val();
          var quantity= $("#quantity").val();
          var pro_id= id  ; //$(".pro_id").val();
        
        //   alert(selling_price) ;
         
        //  alert(quantity);
        
         $.ajax({
                    type: "POST",
                      url: urls+"Artnhub/pincode",
                    data: {pincodecheck:pincodecheck,pro_id:pro_id},
                    cache: false,
                    success: function(results){
        
                $.ajax({
                        type: "POST",
    
                          //alert(result);
                type: "POST",
                url: urls+"Artnhub/addproduction",
                data: {selling_price:selling_price,quantity:quantity,pro_id:pro_id,gst:gst,gstinc:gstinc},
                cache: false,
                success: function(result){
                //   alert(result);
                var pathArray = window.location.pathname.split('/login');
                 location.assign(pathArray);
                     location.assign('http://adsfly.in/wholesale/login');
             
                // $( "#login_production" ).trigger( "click" );
                  
                    }
    
                });

            }

            });

    }

 function production_cart(){


        var pincodecheck = 201301 ;// $("#pincodecheck").val();
      
     
      /*   if (!$('li.btnss').hasClass('active') ) {
          alert("please Select Option");exit();
    /*$('#btnvarient').effect("shake");*/
 /* }*/
       
       
        if(pincodecheck==''){
          alert("please enter pincode");exit();
        }
        var urls=$("#url").val();
        var selling_price=$("#selling_price").val();
        var gst=$("#gst").val();
        var gstinc=$("#gstinc").val();
        var quantity=$("#quantity").val();
        var pro_id=$("#pro_id").val();
        //alert(gst);exit();
    $.ajax({

                    type: "POST",

                      url: urls+"Artnhub/pincode",

                    data: {pincodecheck:pincodecheck,pro_id:pro_id},

                    cache: false,

                    success: function(results){
                      //alert(result);
                   if(results!='not'){
                   
                     $.ajax({
            type: "POST",
            url: urls+"Artnhub/addproduction",
            data: {selling_price:selling_price,quantity:quantity,pro_id:pro_id,gst:gst,gstinc:gstinc},
            cache: false,
            success: function(result){
             // alert(result);
            location.reload();
              
                }
            });

                   }else{
                    alert("please enter Valid pincode");exit();
                   }
              
                    }

                    });
       

    }


     function cartgift(){


        var pincodecheck = $("#pincodecheck").val();
        var cartimg = $("#cartimg").val();
        var txtEditor = $(".Editor-editor").html();
     
      /*   if (!$('li.btnss').hasClass('active') ) {
          alert("please Select Option");exit();
    /*$('#btnvarient').effect("shake");*/
 /* }*/
       
       
        if(pincodecheck==''){
          alert("please enter pincode");exit();
        }
          if(txtEditor==''){
          alert("please enter text");exit();
        }

        var urls=$("#url").val();
        var selling_price=$("#selling_price").val();
        var gst=$("#gst").val();
        var gstinc=$("#gstinc").val();
        var quantity=$("#quantity").val();
        var pro_id=$("#pro_id").val();
        //alert(gst);exit();
    $.ajax({

                    type: "POST",

                      url: urls+"Artnhub/pincode",

                    data: {pincodecheck:pincodecheck,pro_id:pro_id},

                    cache: false,

                    success: function(results){
                      //alert(result);
                   if(results!='not'){
                   
                     $.ajax({
            type: "POST",
            url: urls+"Artnhub/cartsession",
            data: {selling_price:selling_price,quantity:quantity,pro_id:pro_id,gst:gst,gstinc:gstinc,txtEditor:txtEditor,cartimg:cartimg},
            cache: false,
            success: function(result){
             // alert(result);
            location.reload();
              
                }
            });

                   }else{
                    alert("please enter Valid pincode");exit();
                   }
              
                    }

                    });
       

    }
     function delcart(id){
        var urls=$("#url").val();
        
        $.ajax({
            type: "POST",
            url: urls+"Artnhub/delcartsession",
            data: {id:id},
            cache: false,
            success: function(result){
              //alert(result);
            location.reload();
              
                }
            });

    }
    
    
      function del_productiocart(id){
        var urls=$("#url").val();
        
        $.ajax({
            type: "POST",
            url: urls+"Artnhub/delproduction_session",
            data: {id:id},
            cache: false,
            success: function(result){
              //alert(result);
            location.reload();
              
                }
            });

    }

        function delusercart(id){
        var urls=$("#url").val();
        
        $.ajax({
            type: "POST",
            url: urls+"Artnhub/delusercartsession",
            data: {id:id},
            cache: false,
            success: function(result){
              //alert(result);
            location.reload();
              
                }
            });

    }
    
    
    function delproduction_user(id){
        
         var urls=$("#url").val();
        
        $.ajax({
            type: "POST",
            url: urls+"Artnhub/delproduction_user",
            data: {id:id},
            cache: false,
            success: function(result){
              //alert(result);
            location.reload();
              
                }
            });

    }

        function quantity(id){
            
        
        var urls=$("#url").val();
        var selling_price=$("#selling_price_"+id).val();
        var gst=$("#gst_"+id).val();
        var gstinc=$("#gstinc_"+id).val();
        //alert(selling_price);exit();
        var quantity=$("#quantity_"+id).val();
          $.ajax({
            type: "POST",
            url: urls+"Artnhub/cartsession",
            data: {selling_price:selling_price,quantity:quantity,pro_id:id,gst:gst,gstinc:gstinc},
            cache: false,
            success: function(result){
                
            alert(result);
            
            location.reload();
              
                }
            });

    }
    
    
      function quantity_production(id){
          
        var urls=$("#url").val();
        var selling_price=$("#selling_price_"+id).val();
        var gst=$("#gst_"+id).val();
        var gstinc=$("#gstinc_"+id).val();
        //alert(selling_price);exit();
        var quantity=$("#quantity_"+id).val();
          $.ajax({
            type: "POST",
            url: urls+"Artnhub/addproduction",
            data: {selling_price:selling_price,quantity:quantity,pro_id:id,gst:gst,gstinc:gstinc},
            cache: false,
            success: function(result){
                
            // alert(result);
            
            location.reload();
              
                }
            });

    }


//=============Admin update product Quantity =======
        function admin_quantity(id){
            
           
        var urls=$("#url").val();
        var selling_price=$("#selling_price_"+id).val();
        var gst=$("#gst_"+id).val();
        var gstinc=$("#gstinc_"+id).val();
        
          var user_id = $("#user_id_"+id).val();
          
            var req_id = $("#request_id").val();
        //   alert(req_id) ;
            
          
        //alert(selling_price);exit();
        var quantity=$("#quantity_"+id).val();
        
        var box_volume=$("#box_volume_"+id).val();
        
        // alert(box_volume) ;
        
        
          $.ajax({
            type: "POST",
            url: urls+"Artnhub/update_product_admin",
            data: {selling_price:selling_price,quantity:quantity,pro_id:id,gst:gst,gstinc:gstinc , user_id:user_id , req_id: req_id},
            cache: false,
            success: function(result){
                
            
            
             var obj = JSON.parse(result);
                
                      if(obj.status==false){
                          
                          alert('Product Not Update ! Low Inventory') ;
                          
                         location.reload();
                         exit ; 
                           var totalprice= $("#totalprice").val();
                           
                           
                           
                      }else{
                          
                          
                          var totalprice= obj.total ;
                    
                      
                    //   alert(totalprice);
                      
           var finalvolume=   obj.final_volume ;    //  $("#finalvolume").val(); // quantity* box_volume ;
            
           
           var delievry= "CourierByroad" ; //$("input[name='optradio']:checked").val();
           
            //   alert(finalvolume) ;    
           
           
                 $.ajax({
                    type: "POST",
                    url: urls+"Artnhub/checkout_admin",
                    data: {finalvolume:finalvolume,delievry:delievry,totalprice:totalprice , req_id:req_id ,user_id:user_id },
                    cache: false,
                    success: function(result){
                    //   alert(result);
                      
                   // location.reload();
                   
                   var obj = JSON.parse(result);
           
               $("#shipcharges").html(obj.charge);
               $("#pricereplaces").html(obj.totalprice);
                      
                        }
                    });
            
            
            location.reload();
              
                }
                
            }
            
            });

    }

//=======================================


        function checkout(){
           var finalvolume=$("#finalvolume").val();
           var totalprice=$("#totalprice").val();
           var delievry=$("input[name='optradio']:checked").val();
           //alert(delievry);exit();
         // alert(finalvolume);exit();
        var urls=$("#url").val();
        //alert(selling_price);exit();
        
          $.ajax({
            type: "POST",
            url: urls+"Artnhub/checkout",
            data: {finalvolume:finalvolume,delievry:delievry,totalprice:totalprice},
            cache: false,
            success: function(result){
            //   alert(result);
           // location.reload();
              
                }
            });

    }

   function couponapply(){

           var totalprice=$("#pricereplace").val();
           var coupon=$("#coupon").val();
           if(coupon==''){
            alert("Enter Valid Coupon");exit();
           }
           //alert(delievry);exit();
         // alert(finalvolume);exit();
        var urls=$("#url").val();
        //alert(selling_price);exit();
        
          $.ajax({
            type: "POST",
            url: urls+"Artnhub/couponapply",
            data: {totalprice:totalprice,coupon:coupon},
            cache: false,
            success: function(result){
             
              if(result=='empty'){
            alert("coupon not valid");exit();
           }else{
             
          location.reload();
          }    
                
              
                }
            });

    }


   function couponremove(){

      
        var urls=$("#url").val();
       
          $.ajax({
            type: "POST",
            url: urls+"Artnhub/couponremove",
            data: {},
            cache: false,
            success: function(result){
             
          location.reload();
             
                }
            });

    }

  function logout(){
     var urls=$("#url").val();
    $.ajax({
            type: "POST",
            url: urls+"Artnhub/userlogout",
            data: {},
            cache: false,
            success: function(result){
             
          location.reload();
             
                }
            });
  }

  $('.example-p-1.save').on('click', function(){
      
 
            var urls = $("#url").val();
             var name = $("#name").val();
             var mobile = $("#mobile").val();
             var pin = $("#Pincode").val();
             var locality = $("#locality").val();
             var address = $("#address").val();
             var city = $("#city").val();
             var state = $("#State").val();
             var landmark = $("#landmark").val();
             var alternate = $("#alternate").val();
             var optradio = 'home' ;    //$("#optradio").val();

      var finalvolume = $("#finalvolume").val();
      var delievry = $("#delievry").val();
      var totalprice = $("#totalprice").val();
      var pinocde = $("#pinocde").val();
             if(name=='' || mobile==''  || locality==''   || address==''  || pin=='' ){
               $.alert({
                            title: 'Required',
                            content: 'Enter Detail',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Ok',
                                     className: 'add_button',
                              
                             
                                }
                         
                            }
                        });
                        
                exit();
             }

        $.ajax({

                    type: "POST",

                      url: urls+"Artnhub/adduser_address",

                    data: {name:name,mobile:mobile,pin:pin,locality:locality,address:address,city:city,state:state,landmark:landmark,alternate:alternate,optradio:optradio},

                    cache: false,

                    success: function(result){
                        
                        
      $.ajax({
            type: "POST",
            url: urls+"Artnhub/checkout", 
            data: {finalvolume:finalvolume,delievry:delievry,totalprice:totalprice},
            cache: false,
            success: function(result){
              var obj = JSON.parse(result);
           
               $("#shipcharges").html(obj.charge);
               $("#pricereplaces").html(obj.totalprice);
            
            // alert(result);
           // location.reload();
              
                }
            });
                      $.alert({
                            title: 'Success',
                            content: 'Successfully',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Ok',
                                     className: 'add_button',
                                action: function () {
                                    
                                    location.reload();
                               }
                             
                                }
                         
                            }
                        });
                     
              
                    }
           
                    });
          });

 function pincodecheck(id){

  var urls = $("#url").val();
  var finalvolume = $("#cartvolume").val();
  var delievry = $("#delievry").val();
  var totalprice = $("#totalprice").val();
  var pinocde = $("#pinocde").val();
  var pro_id = $("#pro_id").val();
  var cutomeraddress = $("input[name='optradios']:checked").val();
//   alert(address) ;

  if(id==pinocde){
exit();
  }
          

          $.ajax({
                    type: "POST",
                    url: urls+"Artnhub/pincode_check",
                    data: {pincodecheck:id,pro_id:pro_id,cutomeraddress:cutomeraddress},
                    cache: false,
                    success: function(result){
                        
                        //  alert(result) ;
                         
                           var obj = JSON.parse(result);
                
                      if(obj.status==true){
                        
                   
          $.ajax({
            type: "POST",
            url: urls+"Artnhub/checkout",
            data: {finalvolume:finalvolume,delievry:delievry,totalprice:totalprice},
            cache: false,
            success: function(result){
                
                //   alert(result) ;
                
              var obj = JSON.parse(result);
               $("#shipcharges").html(obj.charge);
               $("#pricereplaces").html(obj.totalprice);
               
             location.reload();
              
                }
            });
        }
        else{
          alert("Pincode Not Available ,Please Change Pincode");
          location.reload();
        }
              
                    }

                    });
}
 function pincodenew(){

  var urls = $("#url").val();
  var pin = $("#pin").val();
    var finalvolume = $("#finalvolume").val();
  var delievry = $("#delievry").val();
  var totalprice = $("#pricereplaces").html();
       var pinocde = $("#pinocde").val();
      var pro_id = $("#pro_id").val(); 
  if(pin==pinocde){
exit();
  }   

    $.ajax({

                    type: "POST",

                      url: urls+"Artnhub/pincode",

                    data: {pincodecheck:pin,pro_id:pro_id},

                    cache: false,

                    success: function(result){
                    if(result!='not'){
                              
                 }else{
                 $("#pin").val("");
                 }
              
                    }

                    });
}

function cod(){

  var urls = $("#url").val();
  var cod=$("input[name='credit']:checked").val();
    var codprice = $("#pricereplaces").html();
  if(codprice>1500 && cod=='cod'){
 $.alert({
                            title: 'Cash on Delievery',
                            content: 'COD not available on order value above Rs. 1500/',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Ok',
                                     className: 'add_button',
                                action: function () {
                            location.reload(); 
                               }
                             
                                }
                         
                            }
                        });exit();
  }

    $.ajax({

                    type: "POST",

                      url: urls+"Artnhub/codcheck",
                      data:{codprice:codprice,cod:cod},
                    cache: false,

                    success: function(result){
                     var obj = JSON.parse(result);
           
               $("#codcharges").html(obj.codcharge);
               $("#pricereplaces").html(obj.codprice);
              
                    }

                    });
}

function placeorder(){

    var urls = $("#url").val();
  var shipcharges = $("#shipcharges").html();
  var pricereplaces = $("#pricereplaces").html();
  var subtotal = $("#subtotal").val();
//   var coupon = $("#coupondis").html();
  var finalvolume = $("#finalvolume").val();

      var ui = urls + 'Artnhub/placeorderonline?shipcharges=' + shipcharges +  '&subtotal=' + subtotal +'&pricereplaces=' + pricereplaces +  '&finalvolume=' + finalvolume;
  window.open(ui);


 
}
function addwishlist(id){
    var urls = $("#url").val();
    $.ajax({

                    type: "POST",

                      url: urls+"Artnhub/addwishlist",
                      data:{id:id},
                    cache: false,

                    success: function(result){
                         location.reload(); 
                 $.alert({
                            title: 'Added',
                            content: 'Added to your Wishlist',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Ok',
                                     className: 'add_button',
                                action: function () {
                            location.reload(); 
                               }
                             
                                }
                         
                            }
                        });
              
                    }

                    });
}

function removewishlist(id){
    var urls = $("#url").val();
    $.ajax({

                    type: "POST",

                      url: urls+"Artnhub/removewishlist",
                      data:{id:id},
                    cache: false,

                    success: function(result){
                        location.reload(); 
                        
                 $.alert({
                            title: 'Remove',
                            content: 'Remove to your Wishlist',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Ok',
                                     className: 'btn btn-default',
                                action: function () {
                            location.reload(); 
                               }
                             
                                }
                         
                            }
                        });
              
                    }

                    });
}


function default_add(id){
    
             var urls = $("#url").val();
            var idd = $("#addrid_"+id).val();

             var name = $("#names_"+id).val();
             var mobile = $("#mobiles_"+id).val();

             var pin = $("#pins_"+id).val();
             var locality = $("#citys_"+id).val();
             var address = $("#addresss_"+id).val();
             var city = $("#citys_"+id).val();
             var state = $("#state_"+id).val();
             var landmark = $("#landmarks_"+id).val();
             var alternate = $("#alternates_"+id).val();
             var optradio = 'home' ;
             
             
            
        $.ajax({

                    type: "POST",

                      url: urls+"Artnhub/default_user",

                    data: {id:id,name:name,mobile:mobile,pin:pin,locality:locality,address:address,city:city,state:state,landmark:landmark,alternate:alternate,optradio:optradio},
                    
                    cache: false,

                    success: function(result){
            
            
        
                      $.alert({
                            title: 'Success',
                            content: 'Successfully',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Ok',
                                     className: 'add_button',
                                action: function () {
                                  
                             location.reload();
                               }
                             
                                }
                         
                            }
                        });
                     
              
                    }
           
                    });
          
    
    
}

function updateaddr(id){
    
    
            var urls = $("#url").val();
            var idd = $("#addrid").val();

             var name = $("#names_"+id).val();
             var mobile = $("#mobiles_"+id).val();

             var pin = $("#pins_"+id).val();
             var locality = $("#localitys_"+id).val();
             var address = $("#addresss_"+id).val();
             var city = $("#city_"+id).val();
             var state = $("#state_"+id).val();
             var landmark = $("#landmarks_"+id).val();
             var alternate = $("#alternates_"+id).val();
             var optradio =   'home' ;    //$("#optradios_"+id).val();
             
             
        
             
        $.ajax({

                    type: "POST",

                      url: urls+"Artnhub/updateuser_address",

                    data: {id:id,name:name,mobile:mobile,pin:pin,locality:locality,address:address,city:city,state:state,landmark:landmark,alternate:alternate,optradio:optradio},
                    
                    cache: false,

                    success: function(result){
                        
                        
                
         
                      $.alert({
                            title: 'Success',
                            content: 'Successfully',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Ok',
                                     className: 'add_button',
                                action: function () {
                                  
                             location.reload();
                               }
                             
                                }
                         
                            }
                        });
                     
              
                    }
           
                    });
          }
          function deladdr(id){
            var urls = $("#url").val();
         
        $.ajax({

                    type: "POST",

                      url: urls+"Artnhub/deluser_address",

                    data: {id:id},

                    cache: false,

                    success: function(result){
         
                      $.alert({
                            title: 'Success',
                            content: 'Successfully',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Ok',
                                     className: 'add_button',
                                action: function () {
                                  
                             location.reload();
                               }
                             
                                }
                         
                            }
                        });
                     
              
                    }
           
                    });
          }


    function setCookie() 
        {

            var customObject = {};

    customObject.names = document.getElementById("cookieurl").value;

    var jsonString = JSON.stringify(customObject);

    document.cookie = "cookieObject=" + jsonString;
        }

        function getCookie() 
        {
               var nameValueArray = document.cookie.split("=");

    var customObject = JSON.parse(nameValueArray[1]);

    document.getElementById("txtName").value = customObject.names;
        }

        function clearTextBoxes() 
        {
            document.getElementById("txtName").value = "";
            document.getElementById("txtEmail").value = "";
            document.getElementById("txtGender").value = "";
        }
        function varient(id){
          
          var urls = $("#url").val();
          var imgrep = $("#imgid").val();
          var relation = $("#relvar").val();
          
        $.ajax({

                    type: "POST",

                      url: urls+"Artnhub/varientselect",

                    data: {id:id},

                    cache: false,

                    success: function(result){
                    
                        var obj = JSON.parse(result);
           
               $("#relation").html(obj.varient);
                $("#imgrep").attr('src',obj.image);

                 $(".varrep").mouseleave(function(){
                $("#imgrep").attr('src',imgrep);
               $("#relation").html(relation);

                   });

                     
                    }
           
                    });
        }

         function forgot(){
             
              $(".alert").hide();
              
  $("#showforget").show();
  
   $("#backbtn").show();
  
  $("#resend").show();
  $("#hidebtn").hide();
  $("#forgetpass").hide();
  $("#hideforget").hide();
  $("#forpass").hide();
}         
function sendforgototp(){
    
  
    var urls = $("#url").val();
    var email=$("#foremail").val();
    if(email==""){
        
              alert("Please enter Email/phone number");exit();
              
            }

        $.ajax({
                    type: "POST",

                     url: urls+"Artnhub/forgetotp",
                     data: {email:email},
                     cache: false,

                    success: function(result){
                         var obj = JSON.parse(result);
                
                      if(obj.status==false){
                       $.alert({
                            title: 'Enter Valid Detail',
                            content: 'Please Enter Valid Email/Phone Number',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Ok',
                                     className: 'add_button',
                             
                                }
                         
                            }
                        });
                        
                        exit ; 
                     
                     }else if(obj.status==true){
                         
                            $.alert({
                            title: 'OTP Sent Succesfully',
                            content: 'OTP Sent Succesfully',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Ok',
                                     className: 'add_button',
                                    
                             
                                }
                         
                            }
                        });
                        $("#foregetotp").show();
                        $("#showbtn").show();
                        $("#resendotp").show();
                        $("#forgetpass2").show();
                        $("#resend").hide();


                     }
                     else{
                         
                         
                         
                       $.alert({
                            title: 'Enter Valid Detail',
                            content: 'You are not Eligible',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Ok',
                                     className: 'add_button',
                                    
                             
                                }
                         
                            }
                        });
                        
                        exit ; 
                     
                     
                         
                     }
            
              
                    }
           
                    });
}

function resendotp(){
    
//   alert('fdsfd') ;
  
var urls = $("#url").val();
var email=$("#foremail").val();
if(email==""){
    
  alert("Please enter Email/phone number");exit();
}


        $.ajax({

                    type: "POST",

                      url: urls+"Artnhub/resendotp",

                    data: {email:email},

                    cache: false,

                    success: function(result){
                        
                //   alert(result) ;
                        
                         var obj = JSON.parse(result);
                
                      if(obj.status==false){
                       $.alert({
                            title: 'Enter Valid Detail',
                            content: 'Please Enter Valid Email/Phone Number',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Ok',
                                     className: 'add_button',
                                    
                             
                                }
                         
                            }
                        });
                        
                        exit ; 
                     
                     }else if(obj.status==true){
                         
                            $.alert({
                            title: 'OTP Sent Succesfully',
                            content: 'OTP Sent Succesfully',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Ok',
                                     className: 'add_button',
                                    
                             
                                }
                         
                            }
                        });
                            $("#foregetotp").show();
                $("#showbtn").show();
                $("#resendotp").show();
                $("#forgetpass").show();
                $("#resend").hide();


                     }
                     else{
                         
                         
                         
                       $.alert({
                            title: 'Enter Valid Detail',
                            content: 'You are not eligible',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Ok',
                                     className: 'add_button',
                                    
                             
                                }
                         
                            }
                        });
                        
                        exit ; 
                     
                     
                         
                     }
            
              
                    }
           
                    });
}



function fetchforgototp(){
var urls = $("#url").val();
 var otp = $("#forgetotp").val();
 var pass = $("#pass").val();
var email=$("#foremail").val();


   $.ajax({

                    type: "POST",

                      url: urls+"Artnhub/validforgetotp",

                    data: {otp:otp,email:email,pass:pass},

                    cache: false,

                    success: function(result){
                    
                      if(result=='invalid'){
                       $.alert({
                            title: 'OTP',
                            content: 'Please Enter Valid OTP',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Ok',
                                     className: 'add_button',
                                    
                             
                                }
                         
                            }
                        });
                     
                     }
                     else if(result=='send'){
                      $.alert({
                            title: 'Success',
                            content: 'Password Changed Successfully',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Ok',
                                     className: 'add_button',
                                     action: function () {
                              location.reload();
                               }
                             
                                }
                         
                            }
                        });
                     }
              
                    }

                    });
}


 $("#Pincode").keyup(function(){
        
        
  var pincode  = $("#Pincode").val();
  
  if (pincode.length ==6 ) {
      
     var urls = $("#url").val();
 
  
     $.ajax({

                    type: "POST",

                      url: urls+"Artnhub/fetchbypincode",

                    data: {pincode:pincode  },

                    cache: false,

                    success: function(result){
                        
                         
                      if(result){
                          
                          var data = JSON.parse(result);
                          
                         if(data.status == false){
                               alert('Please Enter Valid Pin Code');
                             
                              $("#Pincode").val(null);
                              
                                $("#city").val(null);
                            $("#State").val(null); 
                         
                         }else{
                               $("#city").val(data.post_office);
                            $("#State").val(data.state); 
                           
                         }
                      }
                        
                    }

                    });
                    
  }
            
  
});


    function validationforget(){
        
var urls = $("#url").val();
 var otp = $("#forgetotp").val();
  var pass = $("#forgot_pass").val();
var email=$("#foremail").val();
 
 if(otp == ''){
     
     alert('Please Enter OTP') ;
     exit;
 }
 
  if(pass == ''){
     
     alert('Please Enter New Password') ;
     exit;
 }
 

   $.ajax({
                    type: "POST",
                      url: urls+"Artnhub/validforgetotp",
                    data: {otp:otp,email:email,pass:pass},
                    cache: false,

                    success: function(result){
                       var obj = JSON.parse(result);
                      if(obj.status==false){
                       $.alert({
                            title: 'OTP',
                            content: 'Please Enter Valid OTP',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Ok',
                                     className: 'add_button',
                                    
                                }
                         
                            }
                        });
                        
                        exit;
                     
                     }
                     else{
                        //   location.reload();
                      $.alert({
                            title: 'Success',
                            content: 'Password Changed Successfully',
                            icon: 'fa fa-user',
                            animation: 'scale',
                            closeAnimation: 'scale',
                            buttons: {
                                okay: {
                                    text: 'Ok',
                                     className: 'add_button',
                                     action: function () {
                              location.reload();
                               }
                             
                                }
                         
                            }
                        });
                     }
              
                    }

                    });
}


  $("#Certificate").on("change", function() {
          var fileExtension = ['jpeg', 'jpg', 'png', 'pdf'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        alert("Only '.jpeg','.jpg', '.png', '.pdf' formats are allowed.");
        
        $("#Certificate").val(null);
        }

    });
            $("#Certificate1").on("change", function() {
          var fileExtension = ['jpeg', 'jpg', 'png', 'pdf'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        alert("Only '.jpeg','.jpg', '.png', '.pdf' formats are allowed.");
        
        $("#Certificate1").val(null);
        }

    });
        $("#file1").on("change", function() {
        var fileExtension = ['jpeg', 'jpg', 'png', 'pdf', 'bmp'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
        alert("Only '.jpeg','.jpg', '.png', '.pdf' formats are allowed.");
        
        $("#file1").val(null);
        }

    });
    
    
    
    //=======================
    
     $(document).ready(function(){

        $(document).bind("contextmenu",function(e){

            return false;

            });

    });
    
      $(function() {
            $(this).bind("contextmenu", function(e) {
                e.preventDefault();
            });
        }); 
    
    document.onkeydown = function(e) {
  if(event.keyCode == 123) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey  && e.keyCode == 'A'.charCodeAt(0)) {
     return false;
  }
  if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
     return false;
  }
}

 
          
//================================

/*    (function()
{
  if( window.localStorage )
  {
    if( !localStorage.getItem('firstLoad') )
    {
      localStorage['firstLoad'] = true;
      window.location.reload();
    }  
    else
      localStorage.removeItem('firstLoad');
  }
})();*/

/*        function searchsuggestion(){

  var urls =$("#url").val();



  var search = $("#search").val();



  $.ajax({

    type: "POST",

    url: urls +"Artnhub/search",

    data: {data:search},

    cache: false,

    success: function(result){

      $("#sea_list").html(result);



      }

      });*/

/*}*/
