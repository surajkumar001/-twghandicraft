
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>				
	<title>Invoice</title>
	<style>
		body{margin:0;padding:0;}
		@page { margin-top: 10px; margin-bottom: 10px; margin-left: 10px; margin-right: 10px; font-size:12px;}
	</style>
</head>
<body>
<?php
 foreach ($iddd as $loop) {

    $id=$loop;
            $where='order_rand_id';
            $table='order_detail';
            $orderde=$this->Model->select_common_where($table,$where,$id); 
         
     $id=$orderde[0]['order_rand_id'];
            $where='order_id';
            $table='orders';
            $orderd[]=$this->Model->select_common_where($table,$where,$id); 
         }
        //  pr($orderd);
       
         foreach ($orderd as $order_detailss) {
             $orderss[]=$order_detailss[0]['id'];
          
            }

            $final=array_unique($orderss);
             foreach ($final as $order_details) {
             $id=$order_details;
             $where='id';
             $table='orders';
             $order_detail=$this->Model->select_common_where($table,$where,$id); 
          
          // pr($order_detail)
       ?>
<table style="max-width:100%; width:100%;" width="100%">
   <tr>
      <td>
         <table style="width:100%;">
            <tbody>
				<tr>
					<td align="right" colspan="2">
						<font style="font-family: calibri; text-align:right; font-size:12px;padding: 5px;"> Orisssginal For Receipient </font>
					</td>
				</tr>				 
				<tr>
					<td align="center" colspan="2">
						<font style="font-family: calibri; text-align:center; font-size:30px;font-weight: bold;padding: 5px;"> TAX INVOICE </font>
					</td>
				</tr>
            </tbody>
         </table>
		 <table style="width:100%;">
            <tbody>
				<tr>
					<td align="center" colspan="2" style="padding: 5px;">
						<img src="<?php echo $_SERVER['DOCUMENT_ROOT']; ?>/art/assets/assets/images/logo.png" style="width: 200px;background: #2874f0;padding: 0 5px;"/>
					</td>
				</tr>
				<tr>
					<td align="center" colspan="2">
						<font style="font-family: calibri; text-align:center; font-size:12px;"> 12/57 SITE -2 LONI ROAD INDUSTRIAL AREA,MOHAN NAGR GHAZIABAD201007 U.P</font>
					</td>
				</tr>
				<tr>
					<td align="center" colspan="2">
						<font style="font-family: calibri; text-align:center; font-size:12px;"><b>GSTIN NO: 09AFOPA5904N1Z3   PAN: AFOPA5904N</b></font>
					</td>
				</tr>
				<tr>
					<td align="center" colspan="2">
						<font style="font-family: calibri; text-align:center; font-size:12px;">TEL:9312885768 EMAIL: jaishreead@gmail.com</font>
					</td>
				</tr>
				<tr>
					<td align="center" colspan="2">
						<font style="font-family: calibri; text-align:center; font-size:12px;">Deals In: Handicraft items ,painting Corporates Gift & Customized items etc</font>
					</td>
				</tr>				
            </tbody>
         </table>
         <table>
            <tbody>
               <tr>
                  <td>
                     <table cellspacing="0" cellpadding="0" style="font-family: calibri; width:100%;margin-bottom:0;">
                        <tr>
                           <td height="5px" colspan="2">
                              <p></p>
                           </td>
                        </tr>
                        <?php

            $id=$order_detail[0]['address_id'];
            $where='id';
            $table='user_address';
            $user_address=$this->Model->select_common_where($table,$where,$id); 
               ?>
                        <tr>
                           <td width="70%"  style="width:70%;" valign="top" align="left" style="font-family: calibri; font-size:12px;text-transform:uppercase !important;">
                              <table style="border-collapse: collapse; width: 100%;" cellpadding="0" cellspacing="0">
                                 <tbody>
                                    <tr>
                                       <td align="left" height="21px" style="font-family: calibri;color: #000000;" valign="top"><b>Party Details:</b></td>
                                    </tr>
                                    <tr>
                                       <td align="left" height="21px" style="font-family: calibri;color: #000000;"><?php echo $user_address[0]['name']; ?>.</td>
                                    </tr>
									<tr>
                                       <td align="left" height="21px" style="font-family: calibri;color: #000000;"><?php echo $user_address[0]['address']; ?> </td>
                                    </tr>
									<tr>
                                       <td align="left" height="21px" style="font-family: calibri;color: #000000;"><?php echo $user_address[0]['locality']; ?>, <?php echo $user_address[0]['city']; ?>,<?php echo $user_address[0]['pincode']; ?>. MOB:- <?php echo $user_address[0]['mobile']; ?></td>
                                    </tr>
									<tr> <?php  if($order_detail[0]['gstno']=='0'){ }else{  ?>
                                       <td align="left" height="21px" style="font-family: calibri;color: #000000;"><b>GSTIN :</b> <?php echo $order_detail[0]['gstno']; ?></td>
                                    <?php } ?>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                           <td align="right" width="30%"  style="width:30%;" valign="top">
                              <table style="width:100%;">
                                 <tr>
                                    <td align="right" height="12px" style="font-family: calibri; font-size:12px;"><b>Invoice No</b> </td>
                                    <td align="right" height="12px" style="font-family: calibri; font-size:12px;"><?php echo $order_detail[0]['invoice_id']; ?> </td>
                                 </tr>
                                 <tr>
                                    <td align="right" height="12px" style="font-family: calibri; font-size:12px;"><b>Invoice Date</b></td>
                                    <td align="right" height="12px" style="font-family: calibri; font-size:12px;"><?php echo $order_detail[0]['invoice_date']; ?></td>
                                 </tr>
                                 <tr>
                                    <td align="right" height="12px" style="font-family: calibri; font-size:12px;"><b>Place of supply</b> </td>
                                    <td align="right" height="12px" style="font-family: calibri; font-size:12px;"> <?php

            $id=$order_detail[0]['address_id'];
            $where='id';
            $table='user_address';
            $user_address=$this->Model->select_common_where($table,$where,$id); 
            echo $user_address[0]['city'];
               ?></td>
                                 </tr>
                                 <tr>
                                    <td align="right" height="12px" style="font-family: calibri; font-size:12px;"><b>Order Id</b></td>
                                    <td align="right" height="12px" style="font-family: calibri; font-size:12px;"> <?php echo $order_detail[0]['order_id']; ?> </td>
                                 </tr>
								  <tr>
                                    <td align="right" height="12px" style="font-family: calibri; font-size:12px;"><b>Order Date.</b></td>
                                    <td align="right" height="12px" style="font-family: calibri; font-size:12px;"> <?php echo $order_detail[0]['order_Date']; ?></td>
                                 </tr>
								 
                              </table>
                           </td>
                        </tr>
                        <tr>
                           <td height="10px" colspan="2">
                              <p></p>
                           </td>
                        </tr>
                     </table>
                     <table style="border-collapse: collapse; width: 100%; margin-bottom: 0;font-family:calibri">
                        <tr>
                           <td style="font-family: calibri; font-size:12px;">
                              <table style="width: 710px;margin:0;border-collapse: collapse;">
                                 <thead>
                                    <tr>
                                      <th style="width:30px;padding: 5px; font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" align="center"><b>S No.</b></th>
                                       <th style="width:190px; padding: 5px; font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" align="left"> <b> Description of Goods </b> </th>
                                    <th width="30px" style=" padding: 5px;font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" align="center"><b >Item id</b></th> 
                                       <th width="30px" style="padding: 5px; font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" align="center"> <b>QTY</b></th>
                                        <th width="30px" style=" padding: 5px;font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" align="center"> <b>Dis. Price (before GST)</b></th>
                                       <th width="30px" style="padding: 5px; font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" align="center"> <b>FRE<br/>IGHT</b></th>
                                       <th width="30px" style="padding: 5px; font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" align="center"><b>CGST<br/>Rate</b></th>
                                       <th width="30px" style="padding: 5px; font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" align="center"><b>CGST<br/>Amount</b></th>
                                       <th width="30px" style="padding: 5px; font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" align="center"><b>SGST<br/>Rate</b></th>
                                       <th width="30px" style="padding: 5px; font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" align="center"><b>SGST<br/>Amount</b></th>
                                       <th width="30px" style="padding: 5px; font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" align="center"><b>IGST<br/>Rate</b></th>
                                       <th width="30px" style=" padding: 5px;font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" align="center"><b>IGST<br/>Amount</b></th>
                                       <th width="30px" style="padding: 5px; font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" align="center"><b>Amount</b></th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php
                                     $id=$order_detail[0]['order_id'];
            $where='order_rand_id';
            $table='order_detail';
            $variable=$this->Model->select_common_where($table,$where,$id); 


                                   $i=1; foreach ($variable as $value) { 

                                     $id=$value['product_id'];
            $where='sku_code';
            $table='product_detail';
            $product_detail=$this->Model->select_common_where($table,$where,$id);  
            if(empty($product_detail)){
               $id=$value['product_id'];
            $where='sku_code';
            $table='product';
            $product_detail=$this->Model->select_common_where($table,$where,$id);  
            }
            if(empty($product_detail)){
               $id=$value['product_id'];
            $where='sku_code';
            $table='giftproduct';
            $product_detail=$this->Model->select_common_where($table,$where,$id);  
            }
            if(empty($value['discount_price'])){
              $dis=$value['cart_price'];
              $fsgt= $value['gst']- $value['productgst'];
            }else{
               $dis=$value['discount_price'];
                $fsgt= $value['gst']- $value['productgst'];

            }
                                    ?>                                    <tr class="data">
										<td width="" style="padding: 5px; font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" colspan="" valign="top" align="center"><?php echo $i++;  ?></td>
                                       <td width="" style="padding: 5px; font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" align="left" valign="top"><?php echo $product_detail[0]['pro_name']; ?>
										<br/>SKU-<?php echo $product_detail[0]['sku_code']; ?></td>
                                       <td width="" style=" padding: 5px;font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" align="center" valign="top"><?php echo $value['id']; ?></td> 
                                       <td width="" style="padding: 5px; font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" colspan="" valign="top" align="center"><?php echo $value['quantity']; ?></td>
                                       <td width="" style="padding: 5px; font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" colspan="" valign="top" align="center"><?php if($value['gst_inc']==1){ echo $dis- $value['gst']; } else{ echo $dis; }?></td>
                                       <td width="" style="padding: 5px; font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" colspan="" valign="top" align="center"><?php echo $value['frieght']; ?></td>
                                       <td width="" style="padding: 5px; font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" colspan="" valign="top" align="center"><?php if($user_address[0]['state']!='up'){
                                          echo $product_detail[0]['gst_per']/2;
                                       } ?></td>
                                       <td width="" style=" padding: 5px;font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" colspan="" valign="top" align="center"><?php if($user_address[0]['state']!='up'){
                                          echo $value['gst']/2;
                                       } ?></td>
                                       <td width="" style=" padding: 5px;font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" colspan="" valign="top" align="center"><?php if($user_address[0]['state']!='up'){
                                          echo $product_detail[0]['gst_per']/2;
                                       } ?></td>
                                       <td width="" style=" padding: 5px;font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" colspan="" valign="top" align="center"><?php if($user_address[0]['state']!='up'){
                                          echo $value['gst']/2;
                                       } ?></td>
                                       <td width="" style=" padding: 5px;font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" colspan="" valign="top" align="center"><?php if($user_address[0]['state']=='up'){
                                          echo $product_detail[0]['gst_per'];
                                       } ?></td>
                                       <td width="" style="padding: 5px; font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" colspan="" valign="top" align="center"><?php if($user_address[0]['state']=='up'){ echo $value['gst']; } ?></td>
                                     
                                       <td width="" style=" padding: 5px;font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" colspan="" valign="top" align="center"><?php if($value['gst_inc']==1){ echo $dis+$value['frieght']+$fsgt; } else{ echo $dis+$value['gst']+$value['frieght']+$fsgt; } ?></td>                                       
                                    </tr>

                                 <?php } ?>
								
                                 </tbody>
								 <tfoot>
		
									<tr>
										<td colspan="11" style=" font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;padding: 0;" colspan="" valign="top" align="center">
											<table style="width: 100%;border-collapse: collapse;">
												<tr>
													<td colspan="" style="padding: 5px;font-size: 12px;font-family: calibri;color: #000000;width: 62.5%;text-align: center;border-right: 1px solid #000;" colspan="" valign="top" align="center">Grant Total :</td>
													<td colspan="" style="width:12%;padding: 5px; font-size:12px;font-family: calibri;color: #000000;border-right: 1px solid #000;" colspan="" valign="top" align="center"></td>
													<td style="width: 71%;">&nbsp;</td>
												</tr>
												<tr>
													<td colspan="3" style="padding: 5px;border-top: 1px solid #000; font-size:12px;font-family: calibri;color: #000000;width:100%;text-align: center;" colspan="" valign="top" align="center"><b><?php if($order_detail[0]['cod_charge']!=0) { echo  'Cod Charge '.$order_detail[0]['cod_charge'].',';  } ?> &nbsp;&nbsp;<?php if($order_detail[0]['shipping_charge']!=0) { echo  'Shipping Charge '.round($order_detail[0]['shipping_charge']).',';  } ?> &nbsp;&nbsp;<?php if($order_detail[0]['couponcharge']!=0) { echo  'Coupon Discount '.$order_detail[0]['couponcharge'].','; } ?>  &nbsp;&nbsp;Total Sales=<?php echo $order_detail[0]['finalamount']; ?>  </b></td>													
												</tr>
											</table>
										</td>
										<td colspan="" style="padding: 5px; font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" colspan="" valign="middle" align="center"> <b>Rs</td>
										<td colspan="" style="padding: 5px; font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" colspan="" valign="middle" align="center"> <b><?php echo $order_detail[0]['finalamount']; ?></b></td>
									</tr>
									<tr>
										<td colspan="13" style=" padding: 5px;font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" colspan="" valign="middle" align="center">Rupees <?php $f = new NumberFormatter("En", NumberFormatter::SPELLOUT); echo $f->format($order_detail[0]['finalamount']);?></td>  
									</tr>
									<tr>
										<td colspan="13" style="padding: 5px;font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" colspan="" valign="middle" align="left"><b>terms & Conditions :-<b>  </td>  
									</tr>
									<tr>
										<td colspan="13" style=" padding: 5px;font-size:12px;font-family: calibri;color: #000000;border:1px solid #000;" colspan="" valign="middle" align="left"><b>E.& O.E<b></td>  
									</tr>
									<tr>
							<td align="center" colspan="3"  height="" valign="middle" style="font-family: calibri;font-size:12px;color: #000000;width: 33.33%;border: 1px solid #000;">
							   <table style="text-align: center; width: 100%;"  cellspacing="0" cellpadding="0">
                                 <tr>
									<td align="center"  height="50px;" valign="middle" style="font-family: calibri;font-size:12px;color: #000000;padding: 5px;">
										<p style="margin:0; padding:7px 0;"> <b>1. Goods return acceptable as per our retun policy only.</b></p>
									</td>
                                 </tr>  
								<tr>
									<td align="center"  height="" valign="middle" style="font-family: calibri;font-size:12px;color: #000000;height: 60px;border-top: 1px solid #000;">
										
									</td>
                                 </tr> 								 
                              </table>							   
							</td>
							<td align="center" colspan="5" height="" valign="middle" style="font-family: calibri;font-size:12px;color: #000000;">
							   <table style="text-align: center; width: 100%;"  cellspacing="0" cellpadding="0">
                                 <tr>
									<td align="center"  height="" valign="middle" style="font-family: calibri;font-size:12px;color: #000000;padding: 5px;">
										<p style="margin:0; padding:7px 0;">&nbsp;</p>
									</td>
                                 </tr>                                
                              </table>							   
							</td>
							<td align="center" colspan="5" height="" valign="middle" style="font-family: calibri;font-size:12px;color: #000000;width: 33.33%;border: 1px solid #000;">
							   <table style="text-align: center; width: 100%;"  cellspacing="0" cellpadding="0">
                                 <tr>
									<td align="center"  height="50px;" valign="middle" style="font-family: calibri;font-size:12px;color: #000000;padding: 5px;">
										<p style="margin:0; padding:7px 0;"> <b>For JAISHREE ADVERTISING</b></p>
									</td>
                                 </tr>  
								<tr>
									<td align="center"  height="" valign="bottom" style="padding: 5px;font-family: calibri;font-size:12px;color: #000000;height: 60px;border-top: 1px solid #000;">
										Authorised Signatory
									</td>
                                 </tr> 								 
                              </table>							   
							</td>      
                        </tr>
								 </tfoot>
                              </table>
                           </td>
                        </tr>
                     </table>
					 <table>
						
					 </table>
                  </td>
               </tr>
            </tbody>
         </table>
      </td>
   </tr>
</table>
<?php } ?>
</body>
</html>
 <!-- 
<div style="page-break-after: always;"></div> -->