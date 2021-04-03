
  
   
 <div style="width:100%;height:100%;margin:10px auto;padding:0;background-color:#f1f2f3;font-family:'Roboto-Regular',Arial,Tahoma,Verdana,sans-serif;font-weight:300;font-size:13px;text-align:center"> 
  <table width="100%" cellspacing="0" cellpadding="0" height="60"> 
   <tbody>
    <tr style="background:#2175ff"> 
     <td> 
      <table width="100%" style="max-width:600px;margin:0 auto"> 
       <tbody>
        <tr> 
         <td style="width:50%;text-align:left;padding-left:16px"> <a style="text-decoration:none;outline:none;color:#ffffff;font-size:13px" href="<?php echo base_url(); ?>" target="_blank" data-saferedirecturl="https://www.google.com/url?q=<?php echo base_url(); ?>" data-mt-detrack-inspected="true"> <img border="0" height="30" src="<?php echo base_url(); ?>assets/assets/images/logo.png" alt="artnhub.com" style="border:none" class="CToWUd"> </a> </td> 
         <td style="width:50%;text-align:right;color:rgba(255,255,255,0.8);font-family:'Roboto-Medium',sans-serif;font-size:14px;font-style:normal;font-stretch:normal;padding-right:16px"> Order Approved by Admin </td> 
        </tr> 
       </tbody>
      </table> </td> 
    </tr> 
   </tbody>
  </table> 
   
   
  <table width="100%" cellspacing="0" cellpadding="0" style="margin:0 auto;padding:10px;background-color:#f1f2f3"> 
   <tbody> 
    <tr> 
     <td> 
      <table width="100%" cellspacing="0" cellpadding="0" style="margin:0 auto;max-width:600px;background:#ffffff"> 
       <tbody>
        <tr> 
         <td align="left" valign="top" class="m_-1395459101624560752container" style="display:block;margin:0 auto;clear:both;padding:0px 40px"> 
          <table width="100%" cellspacing="0" cellpadding="0" style="margin:0 auto;max-width:600px;background:#ffffff"> 
           <tbody>
            <tr> 
             <td align="left" valign="top" class="m_-1395459101624560752container" style="color:#212121;display:block;margin:0 auto;clear:both;padding:3px 0 0 0"> 
              <table width="100%" cellspacing="0" cellpadding="0"> 
               <tbody> 
                <?php
                  $id=$message[0]['user_id'];
                $where='id';
                $table='customerlogin';
                $data=$this->Adminmodel->select_com_where($table,$where,$id); 
                 ?>
                <tr> 
                 <td id="m_-1395459101624560752journey" valign="top" align="left" style="float:right;background-color:#fafafa;padding:0;text-align:center;vertical-align:middle"> <img border="0" src="<?php echo base_url(); ?>assets/images/confirmorder.png" alt="Order Jouney" style="border:none;width:80%" class="CToWUd"> </td> 
                 <td valign="top" align="left" style="float:left;vertical-align:middle"> <p style="font-family:'Roboto-Medium',sans-serif;font-size:18px;font-weight:normal;font-style:normal;line-height:1.5;font-stretch:normal;color:#212121;margin:16px 0px">Hi <?php echo $data[0]['name']; ?>,</p> </td> 
                </tr> 
               </tbody> 
              </table> </td> 
            </tr> 
           </tbody>
          </table> 
          <table width="100%" cellspacing="0" cellpadding="0" style="margin:0 auto;max-width:600px;background:#ffffff"> 
           <tbody>
            <tr style="color:#212121;display:block;margin:0 auto;clear:both;padding:24px 0 4px 0"> 
             <td align="left" valign="top" class="m_-1395459101624560752container"> <p style="padding:0;margin:0;font-size:16px;font-family:'Roboto-Medium',sans-serif"> <?= $subject ; ?> </p> <br> </td> 
            </tr> 
           
            <tr> 
              
             <td align="left" valign="top" class="m_-1395459101624560752container" style="color:#212121;display:block;margin:0 auto;clear:both;padding:0px 0 20px 0"> <p style="color:#212121;padding:0;margin:0;font-size:12px;font-family:'Roboto-Medium',sans-serif;font-weight:400"> </p><p></p> Item in order with order id  <?php echo $message[0]['order_id']; ?> has been Confirmed! We have attached a copy of the invoice along with this email. Hope you liked our service. We would love to get your feedback. <p></p> 
               <p style="padding:0;margin:0;font-size:12px;font-family:'Roboto',sans-serif"> 
                </p> <a href="<?php echo base_url('Artnhub/orders'); ?>" class="m_-1395459101624560752fk-email-button" style="font-family:'Roboto-Medium',sans-serif;box-sizing:border-box;text-decoration:none;background-color:rgb(41,121,251);color:#fff;min-width:160px;padding:7px 16px;border-radius:2px;margin-top:18px;text-align:center;display:inline-block;font-size:12px" target="_blank" data-saferedirecturl="https://www.google.com/url?q=<?php echo base_url('orders'); ?>" data-mt-detrack-inspected="true">Manage order</a> </td> 
            </tr> 
         
           </tbody>
          </table> 
          <table width="100%" cellspacing="0" cellpadding="0" style="padding:0 0 8px 0;max-width:600px;background:#ffffff;margin:0 auto" border="0"> 
           <tbody>
            <tr> 
            
            </tr> 
            <tr align="left"> 
          
            </tr> 
            <tr> 
             
            </tr> 
           </tbody>
          </table> 
          <table width="100%" border="0" cellpadding="0" cellspacing="0"> 
           <tbody> 
            <tr> 
             <td height="1" style="background-color:#f0f0f0;font-size:0px;line-height:0px" bgcolor="#f0f0f0"></td> 
            </tr> 
           </tbody> 
          </table> 
          <table width="100%" cellspacing="0" cellpadding="0" style="margin:0 auto;max-width:600px;background:#ffffff"> 
           <tbody>
            <tr> 
             <td align="left" valign="top" class="m_-1395459101624560752container" style="color:#212121;display:block;margin:0 auto;clear:both;border-bottom:solid 1px #f0f0f0;padding:10px 0"> 
              <table width="100%" cellspacing="0" cellpadding="0"> 
               <tbody> 
                   <?php
                  $id=$message[0]['order_id'];
                $where='order_rand_id';
                $table='order_detail';
                $order=$this->Adminmodel->select_com_where($table,$where,$id); 
                foreach ($order as  $value) {
                  $id=$value['product_id'];
                $where='id';
                $table='product';
                $product=$this->Adminmodel->select_com_where($table,$where,$id);
                if(empty($product)){
                 $id=$value['product_id'];
                $where='id';
                $table='product_detail';
                $product=$this->Adminmodel->select_com_where($table,$where,$id);
                }
                 ?>
                <tr> 
                 <!--<td width="120" valign="top" align="left">  <img border="0" src="<?php echo $product[0]['main_image1']; ?>" alt="Deals4you Men And Boys Office Use Genuine Leather Wedding Formal Slip on Shoes Slip On For Men" style="border:none;width:fit-content;margin-left:auto;margin-right:auto;display:block ;width: 80px;margin-bottom: 28px; " class="CToWUd">  </td> -->
                 <!--<td width="8"></td> -->
                 <!--<td valign="top" align="left"> <p style="margin-bottom:13px"><?php echo $product[0]['pro_name']; ?> </p> <span style="font-family:'Roboto-Medium',sans-serif;font-size:12px;font-weight:normal;font-style:normal;line-height:1.5;font-stretch:normal;color:#878787;margin:0px 0px;border:1px solid #dfdfdf;display:inline;border-radius:3px;padding:3px 10px">Qty: <?php echo $value['quantity']; ?></span> </td> -->
                </tr> 
              <?php } ?>
               </tbody> 
              </table> </td> 
            </tr> 
           </tbody>
          </table> 
          <table width="100%" border="0" cellpadding="0" cellspacing="0"> 
           <tbody> 
            <tr> 
             <td height="1" style="background-color:#f0f0f0;font-size:0px;line-height:0px" bgcolor="#f0f0f0"></td> 
            </tr> 
           </tbody> 
          </table> </td> 
        </tr> 
       </tbody>
      </table> 
      <table width="100%" cellspacing="0" cellpadding="0" style="margin:0 auto;max-width:600px;margin-top:24px"> 
       <tbody>
        <tr> 
         <td align="left" valign="top" class="m_-1395459101624560752container" style="color:#2c2c2c;display:block;line-height:20px;font-weight:300;margin:0 auto;clear:both;background-color:transparent"> 
          <table class="m_-1395459101624560752body-wrapper"> 
           <tbody>
            <tr> 
             <td style="width:75%;text-align:left"> <a style="color:#027cd8;text-decoration:none;outline:none;color:#ffffff;font-size:13px" href="<?php echo base_url(); ?>" target="_blank" data-saferedirecturl="https://www.google.com/url?q=<?php echo base_url(); ?>" data-mt-detrack-inspected="true"> <img border="0" height="24" src="<?php echo base_url(); ?>assets/assets/images/logo.png" alt="Flipkart.com" style="border:none" class="CToWUd"> </a> </td> 
             <td style="width:15%;text-align:left"> <a style="text-decoration:none;outline:none;color:#ffffff;font-size:13px" href="<?php echo base_url(); ?>" target="_blank" data-saferedirecturl="https://www.google.com/url?q=<?php echo base_url(); ?>" data-mt-detrack-inspected="true"> <img border="0" height="24" src="https://ci6.googleusercontent.com/proxy/3QE9kvI6a_sNZY1yz9h1e9UTtBEe6bvUPfsokYVFhigLrmrCJxcv1_CZk0b5cJWyTHa1prcEfHSGUl1QMcg36fPaTs0H7MVxDk0pgC8ujoEedjfg26Rdff_eNArN9_s=s0-d-e1-ft#http://img6a.flixcart.com/www/promos/new/20160910-183744-google-play-min.png" alt="Flipkart.com" style="border:none" class="CToWUd"> </a> </td> 
             <td style="width:10%;text-align:right"> <a style="text-decoration:none;outline:none;color:#ffffff;font-size:13px" href="<?php echo base_url(); ?>" target="_blank" data-saferedirecturl="https://www.google.com/url?q=<?php echo base_url(); ?>" data-mt-detrack-inspected="true"> <img border="0" height="24" src="https://ci4.googleusercontent.com/proxy/QypvFRQDLBLrj10OMzTKLzSZQuMK2CfotEga4oOV9lbsjq3-KGtkoYz3K2w-hbkiqilkj7EORpiOpODCSSxAgpHd-y3FC1hCd2g7ocbGtAcBgHC1Xdyzc1tRoePbQXA=s0-d-e1-ft#http://img5a.flixcart.com/www/promos/new/20160910-183649-apple-store-min.png" alt="Artnhub.com" style="border:none" class="CToWUd"> </a> </td> 
            </tr> 
           </tbody>
          </table> </td> 
        </tr> 
       </tbody>
      </table> </td> 
    </tr> 
   </tbody> 
  </table> 
    
 
