<?php

/*

Code modified by : SKP, satishkumarpawar@gmail.com

For: PHPExcel

*/

//ini_set('display_errors','1');



defined('BASEPATH') OR exit('No direct script access allowed');







class Excel extends CI_Controller {



    



    



    



	function __construct() {







         parent::__construct();



        



         $this->load->model('Adminmodel');







       



         	$url = 'http://' . $_SERVER['HTTP_HOST'] . "/wholesale/phpexcel_gd/";



        	$path = $_SERVER['DOCUMENT_ROOT'] . '/wholesale/phpexcel_gd/';



        	define('SITEURL', $url);



        	define('SITEPATH', str_replace('\\', '/', $path));







       }



    



    



    public function confirmdetails(){



			



			   



			    $request_id = '1120X3' ;



			    $final_amount = '10561.4' ; 



			    $before_sub_total = '10561.4' ;



			    $shipping = '250' ;



			    $sub_total = '8370' ;



			    $total_discount = '0' ;



   $finalvolume = '1' ;



 $delievry_type = 'Transport' ;







	    	    	$result   = $this->db->get_where('order_detail', array('order_rand_id' => $request_id ,))->result() ;



	    	    	



	    	    



	    	    	//========================



	    	    	$a = 1 ; 



	    	    	$percent_amount = array() ;



	    	    	$discount = array() ; 



	    	    	   foreach($result as  $amount){



                               



                               $price = $amount->cart_price ;



                               $one_item_price = $amount->price ;



                               $id = $amount->id ; 



                               $qty = $amount->quantity ;



                               $item_amt = $one_item_price*$qty ;



                               $gst_per = $amount->gst ;



                       //==================== % ratio =====                                



                                  



                              $percent_amount[$a] =round(($item_amt / $before_sub_total)*100,2); 



                               $discount[$a] =   $total_discount*($percent_amount[$a]/100);



                               $per_item_discount =  $discount[$a] /$qty ;



                                   



                //==========GST Calculate =========



                



                 $real_price = $one_item_price  - $per_item_discount ;



                 $sub_price = $real_price*$qty  ;



                 $gst_amt =  $sub_price*($gst_per/100) ;



                $gst_total+= round($gst_amt,2) ;



                //=========================



                                   



                                   $post = array(



                                    //   'discount_price' =>round($per_item_discount,2) ,



                              



                                      'price_after_discount' =>round($real_price,2) ,



                                      'cart_price' => $sub_price,



                                      'productgst'=> round($gst_amt,2) ,



                                       



                                       



                                       );



                                  



                          //=========update discount======



                            $this->db->where('id', $id);



                            $this->db->update('order_detail', $post);



                          //=================



                        $pro_id =  $amount->product_id ;



                        $pro_detail=$this->db->get_where('product_detail', array('sku_code' => $pro_id,))->row() ;



                			   



                		$pro_category = $pro_detail->category_id ;



		            	$qntity = $amount->quantity;



		            	$customer_qntity = $amount->customer_quantity;



		            	



			        	$pro_inven_hold = $pro_detail->inventory_hold ;



		        		$pro_availability = $pro_detail->availability ;



			



			        	$total_qty['inventory_hold'] = $pro_inven_hold - $customer_qntity +  $qntity ;



			



			        $this->db->where(array('sku_code' => $pro_id));



                    $this->db->update('product_detail', $total_qty);



                      



                                       



                            $a++ ;      



                           }



                           



	    	    	



	    	    	//=======================



	    	    	







			$data['result']= $this->Adminmodel->orderdetail($request_id);



			



			      $data['order']  = $this->db->get_where('orders', array('order_id' => $request_id ,))->row() ;



      



					$data['final_amount']= $final_amount ;



					$data['shipping']= $data['order']->shipping_charge ;	



					$data['sub_total']=  $sub_total ;



				



				



				$orderss = array(



                                       



                                      'status' => 1,



                                               



                                    //   'finalamount' =>$_SESSION['totalprice'] ,



                                    //   'discountcharge'=> $total_discount ,



                                    //   'subtotal'=> $sub_total ,



                                    //   'gst_total' => $gst_total ,



                                    //   'order_status' => 'Pending' ,



                                       



                                       );



                          //=========update discount======



                                              



                            $this->db->where('order_id', $request_id);



                            $this->db->update('orders', $orderss);







				



				   $this->load->view('Admin/confirmdetails.php', $data);



				   



				   



				   



			}



##################################### SKP



			function export_xls(){

	

    $request_id = $this->input->post('request_id') ;

	
	    	    	//=======================



			$data['result']= $this->Adminmodel->orderdetail($request_id);
			   $data['order']  = $this->db->get_where('orders', array('order_id' => $request_id ,))->row() ;




				   //$this->load->view('Admin/confirmdetails.php', $data);

					$this->xlscreation_direct($data);

					die();



			}



/**

* Create excel by from direct request

*/

function xlscreation_direct($data) {





	$result = $data['result'];

	

	$total_price=0;

	$propertydetails=array();

    $order_id = $result[0]['order_rand_id'] ;

	$i = 1 ;

	foreach ($result as  $value){

		 $product_id = $value['product_id'] ;

         $product_detail  =  $this->db->get_where('product_detail', array('sku_code' => $product_id ,))->row() ;

         if(empty($product_detail)){

         	$product_detail  =  $this->db->get_where('product', array('sku_code' => $product_id ,))->row() ;

		 }

          

		//$img = 'http://adsfly.in/wholesale/assets/product/'.$product_detail->main_image5;
		
		//$img =str_replace('http://adsfly.in/wholesale/','/',$img);
		$img =$_SERVER['DOCUMENT_ROOT'] . '/wholesale/assets/product/'.$product_detail->main_image5;

		$real_price =   $value['price_after_discount'] -  $value['discount_price'];

		$sub_price = $real_price*$value['quantity'];

		$total_before+= $sub_price;

		$gst_val = round($sub_price*$value['gst']/100 ,2);

		$propertydetails[] =array('SNo' => $i++,'Image' => $img,'ProductSKU' => $value['product_id'],'DemandedQty' => $value['customer_quantity'],'DispatchedQty' => $value['quantity'],'DiscWPbeforetax' => $value['price_after_discount'],'NetPrice' => $real_price,'Amount' => $sub_price,'GST' => $value['gst']."%",'GSTAmount' => $gst_val);

	  

	    $volume= $product_detail->box_volume_weight *$value['quantity'];

	

	    $finalvolume+=$volume;

	

	    if($value['gst'] == '12'){

	

		  $totalgst_12+=$gst_val;

	

	    }elseif($value['gst']=='18'){

		 

		   $totalgst_18+=$gst_val ;

	

	    }elseif($value['gst']=='5'){

	

		   $totalgst_5+=$gst_val ;

	

	    }elseif($value['gst']=='28'){

	

		   $totalgst_28+=$gst_val;

	

	    }

	

	

	    $total_price+= $value['cart_price'];

	

	}

	 

	 

	 $a = 1 ;



	 $percent_amount = array();



	 $discount = array() ;



     foreach($result as $amount){

	   //==================== % ratio =====                                

		$percent_amount[$a] =round(($amount['cart_price'] / $total_price)*100,2); 

		$a++ ;       

     } 





	require_once SITEPATH . 'PHPExcel/Classes/PHPExcel.php';

	require_once SITEPATH . 'PHPExcel/Classes/PHPExcel/Helper/HTML.php';



 	$objPHPExcel = new PHPExcel(); 

	$objPHPExcel->getProperties()

			->setCreator("user")

    		->setLastModifiedBy("SKP")

			->setTitle("Order Details")

			->setSubject("Order Details")

			->setDescription("Order Details")

			->setKeywords("Order Details")

			->setCategory("Order Details");



	// Set the active Excel worksheet to sheet 0

	$objPHPExcel->setActiveSheetIndex(0); 



	// Initialise the Excel row number

	$rowCount = 0; 

	#SKP

	$objPHPExcel->getActiveSheet()->getStyle('A1:J1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

	$objPHPExcel->getActiveSheet()->getStyle("A1:J1")->getFont()->setBold(true);

	$objPHPExcel->getActiveSheet()->getStyle('A1:J1')->applyFromArray(

		array(

			'fill' => array(

				'type' => PHPExcel_Style_Fill::FILL_SOLID,

				'color' => array('rgb' => '000000')

			),

			'font'  => array(

				'bold'  => true,

				'color' => array('rgb' => 'FFFFFF'),

				'size'  => 15

				//'name'  => 'Verdana'

			)

		)

	);

	$objPHPExcel->getActiveSheet()->mergeCells('A1:J1');

	$objPHPExcel->getActiveSheet()->setCellValue('A1','Order Details');



	$htmlHelper = new PHPExcel_Helper_HTML();

	

	$objPHPExcel->getActiveSheet()->mergeCells('A3:E3');

	$objPHPExcel->getActiveSheet()->setCellValue('A3',$htmlHelper->toRichTextObject('<b>Order No : </b>'.$result[0]['order_rand_id']));

	$objPHPExcel->getActiveSheet()->mergeCells('A4:E4');

	$objPHPExcel->getActiveSheet()->setCellValue('A4',$htmlHelper->toRichTextObject('<b>Order Date : </b>'.$result[0]['show_date']));

	$oid =$result[0]['order_rand_id'];

    $customeradd = $this->db->get_where('order_address' , array('order_id' => $oid  ))->row(); 

	$objPHPExcel->getActiveSheet()->mergeCells('A5:E5');

	$objPHPExcel->getActiveSheet()->setCellValue('A5',$htmlHelper->toRichTextObject('<b>Owner Name : </b>'.$result[0]['customer_name']));

// 	$objPHPExcel->getActiveSheet()->mergeCells('A6:E6');

// 	$objPHPExcel->getActiveSheet()->setCellValue('A6',$htmlHelper->toRichTextObject('<b>Owner Name : </b>'.$result[0]['customer_name']));

// 	$objPHPExcel->getActiveSheet()->mergeCells('A7:E7');

// 	$objPHPExcel->getActiveSheet()->setCellValue('A7',$htmlHelper->toRichTextObject('<b>Email ID : </b>'.$result[0]['email']));

// 	$objPHPExcel->getActiveSheet()->mergeCells('A8:E8');

// 	$objPHPExcel->getActiveSheet()->setCellValue('A8',$htmlHelper->toRichTextObject('<b>Mobile No : </b>'.$result[0]['customer_mob']));

// 	$objPHPExcel->getActiveSheet()->mergeCells('A9:E9');

// 	$objPHPExcel->getActiveSheet()->setCellValue('A9',$htmlHelper->toRichTextObject('<b>Landline No : </b>'.$result[0]['landline']));

// 	$objPHPExcel->getActiveSheet()->mergeCells('A10:E10');

// 	$objPHPExcel->getActiveSheet()->setCellValue('A10',$htmlHelper->toRichTextObject('<b>Business Type & Ownership Type : </b>'.$result[0]['btype'].' & '.$result[0]['ownertype']));

	

	$objPHPExcel->getActiveSheet()->getStyle('F3:J3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

	$objPHPExcel->getActiveSheet()->getStyle('F4:J4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

	$objPHPExcel->getActiveSheet()->getStyle('F5:J5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

	$objPHPExcel->getActiveSheet()->getStyle('F6:J6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

// 	$objPHPExcel->getActiveSheet()->getStyle('F7:J7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

// 	$objPHPExcel->getActiveSheet()->getStyle('F8:J8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

// 	$objPHPExcel->getActiveSheet()->getStyle('F9:J9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

// 	$objPHPExcel->getActiveSheet()->getStyle('F10:J10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

	$objPHPExcel->getActiveSheet()->mergeCells('F3:J3');
	
		$pin =  $result[0]['pincode'];

	$pincode = $this->db->get_where('pincode' , array('name' => $pin  ))->row() ;


	$objPHPExcel->getActiveSheet()->setCellValue('F3',$htmlHelper->toRichTextObject('<b>City : </b>'.$pincode->area));

	$objPHPExcel->getActiveSheet()->mergeCells('F4:J4');
		$state =  $pincode->state;

	$objPHPExcel->getActiveSheet()->setCellValue('F4',$htmlHelper->toRichTextObject('<b>State : </b>'.$state));


	$objPHPExcel->getActiveSheet()->mergeCells('F5:J5');

	$objPHPExcel->getActiveSheet()->setCellValue('F5',$htmlHelper->toRichTextObject('<b>Delivery Mode : </b>'.$result[0]['delievry_type']));

// 	$objPHPExcel->getActiveSheet()->mergeCells('F6:J6');



// 	$objPHPExcel->getActiveSheet()->setCellValue('F6',$htmlHelper->toRichTextObject('<b>State : </b>'.$state));

// 	$objPHPExcel->getActiveSheet()->mergeCells('F7:J7');

// 	$objPHPExcel->getActiveSheet()->setCellValue('F7',$htmlHelper->toRichTextObject('<b>Delivery Mode : </b>'.$result[0]['delievry_type']));

// 	$objPHPExcel->getActiveSheet()->mergeCells('F8:J8');

// 	$objPHPExcel->getActiveSheet()->setCellValue('F8',$htmlHelper->toRichTextObject('<b>GST No : </b>'.$customeradd->customer_gst));

// 	$objPHPExcel->getActiveSheet()->mergeCells('F9:J9');

// 	$objPHPExcel->getActiveSheet()->setCellValue('F9',$htmlHelper->toRichTextObject('<b>PAN No. : </b>'.$customeradd->customer_pan));

// 	$objPHPExcel->getActiveSheet()->mergeCells('F10:J10');

// 	$objPHPExcel->getActiveSheet()->setCellValue('F10',$htmlHelper->toRichTextObject('<b>Aadhar No : </b>'.$customeradd->customer_adhaar));



	$rowCount = 7; 

	#SKP

	// Sheet cells

	$cell_definition = array(

		'A' => 'S.No',

		'B' => 'Image',

		'C' => 'Product SKU',

		'D' => 'Demanded Qty',

		'E' => 'Dispatched Qty',

		'F' => 'Disc. W.P.(before tax)',

		'G' => 'Net Price',

		'H' => 'Amount',

		'I' => 'GST %',

		'J' => 'GST Amount'

	);

	$cell_definition_index = array(

		'A' => 'SNo',

		'B' => 'Image',

		'C' => 'ProductSKU',

		'D' => 'DemandedQty',

		'E' => 'DispatchedQty',

		'F' => 'DiscWPbeforetax',

		'G' => 'NetPrice',

		'H' => 'Amount',

		'I' => 'GST',

		'J' => 'GSTAmount'

	);



	// Build headers

	$cell = $rowCount + 1;

	$objPHPExcel->getActiveSheet()->getStyle("A".$cell.":J".$cell)->getFont()->setBold(true);

	$border_row_start = $cell;

	foreach( $cell_definition_index as $column => $value )

	{

		/*if($value=='Image')$objPHPExcel->getActiveSheet()->getColumnDimension("{$column}")->setWidth(20);

		else $objPHPExcel->getActiveSheet()->getColumnDimension("{$column}")->setAutoSize(true);*/

		if($value=='SNo')$objPHPExcel->getActiveSheet()->getColumnDimension("{$column}")->setWidth(5);

		if($value=='Image')$objPHPExcel->getActiveSheet()->getColumnDimension("{$column}")->setWidth(20);

		if($value=='ProductSKU')$objPHPExcel->getActiveSheet()->getColumnDimension("{$column}")->setWidth(20);

	}

	foreach( $cell_definition as $column => $value )

	{

		$objPHPExcel->getActiveSheet()->setCellValue( "{$column}{$cell}", $value ); 

	}

	// Build cells

	$records_count=count($propertydetails)+$rowCount;

	$property_index=0;

$table_bg_arr=array(

					'fill' => array(

						'type' => PHPExcel_Style_Fill::FILL_SOLID,

						'color' => array('rgb' => 'f9f9f9')

					)

				);



	while( $rowCount < $records_count ){ 

		$cell = $rowCount + 2;

			if($cell%2!=0)$objPHPExcel->getActiveSheet()->getStyle('A'.$cell.':J'.$cell)->applyFromArray($table_bg_arr);



		foreach( $cell_definition_index as $column => $value ) {

			$objPHPExcel->getActiveSheet()->getRowDimension($rowCount + 2)->setRowHeight(50); 

			

			switch ($value) {

				case 'Image':

					if (file_exists($propertydetails[$property_index][$value])) {

				        $objDrawing = new PHPExcel_Worksheet_Drawing();

				        $objDrawing->setName('Product Image');

				        $objDrawing->setDescription('Product Image');

				        //Path to signature .jpg file

				        $signature = $propertydetails[$property_index][$value];    

				        $objDrawing->setPath($signature);

				        $objDrawing->setOffsetX(20);                     //setOffsetX works properly

				        $objDrawing->setOffsetY(10);                     //setOffsetY works properly

				        $objDrawing->setCoordinates($column.$cell);             //set image to cell 

				        $objDrawing->setWidth(50);  

				        $objDrawing->setHeight(50);                     //signature height  

				        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());  //save 

				    } else {

				    	$objPHPExcel->getActiveSheet()->setCellValue($column.$cell, "Image not found" ); 

				    }

				    break;

				case 'Link':

					//set the value of the cell

					$objPHPExcel->getActiveSheet()->SetCellValue($column.$cell, $propertydetails[$property_index][$value]);

					//change the data type of the cell

					$objPHPExcel->getActiveSheet()->getCell($column.$cell)->setDataType(PHPExcel_Cell_DataType::TYPE_STRING2);

					///now set the link

					$objPHPExcel->getActiveSheet()->getCell($column.$cell)->getHyperlink()->setUrl(strip_tags($propertydetails[$property_index][$value]));

					break;



				default:

					$objPHPExcel->getActiveSheet()->setCellValue($column.$cell, $propertydetails[$property_index][$value] ); 

					break;

			}



		}

		$property_index++;	

	    $rowCount++; 

	} 

	

	$cell = $rowCount + 1;

	$yellow_color=array(

			'fill' => array(

				'type' => PHPExcel_Style_Fill::FILL_SOLID,

				'color' => array('rgb' => 'FFFF00')

			)

		);

	$objPHPExcel->getActiveSheet()->getStyle('B'.($cell + 1))->getFont()->setBold(true);

	$objPHPExcel->getActiveSheet()->setCellValue('B'.($cell + 1),'Sub Total (Cart Value)');

	$objPHPExcel->getActiveSheet()->setCellValue('B'.($cell + 2),'Carton Packing');

	$delievry = $result[0]['delievry_type'];

	if($delievry == 'Transport')$delievry_type='Freight Charge';

	else $delievry_type='Freight Charge';

	$objPHPExcel->getActiveSheet()->setCellValue('B'.($cell + 3),$delievry_type);

	$objPHPExcel->getActiveSheet()->setCellValue('B'.($cell + 4),'Order Processing');

	$objPHPExcel->getActiveSheet()->getStyle('B'.($cell + 5))->getFont()->setBold(true);

	$objPHPExcel->getActiveSheet()->setCellValue('B'.($cell + 5),'Total Amount(Before Tax)');

	$objPHPExcel->getActiveSheet()->setCellValue('B'.($cell + 6),'Discount');

	$objPHPExcel->getActiveSheet()->setCellValue('B'.($cell + 7),'Net Amount ( Before Tax )');



		$objPHPExcel->getActiveSheet()->setCellValue('B'.($cell + 8),'GST @5%');

	    //$objPHPExcel->getActiveSheet()->getStyle('D'.($cell + 8))->applyFromArray($yellow_color);

		if($state != 'UTTAR PRADESH'){

			$objPHPExcel->getActiveSheet()->setCellValue('D'.($cell + 8),'IGST : '.$totalgst_5);

		} else {

	    	//$objPHPExcel->getActiveSheet()->getStyle('E'.($cell + 8))->applyFromArray($yellow_color);

			$objPHPExcel->getActiveSheet()->setCellValue('D'.($cell + 8),'CGST : '.round($totalgst_5/2,2));

			$objPHPExcel->getActiveSheet()->setCellValue('E'.($cell + 8),'SGST : '.round($totalgst_5/2 ,2));

		

		
		}
			$gst_5 = $totalgst_5;
		
			$objPHPExcel->getActiveSheet()->setCellValue('H'.($cell + 8),$totalgst_5);


// 	$cell++;

	

	$objPHPExcel->getActiveSheet()->setCellValue('B'.($cell + 9),'GST @12%');

	$objPHPExcel->getActiveSheet()->setCellValue('B'.($cell + 10),'GST @18%');



		$objPHPExcel->getActiveSheet()->setCellValue('B'.($cell + 11),'GST @28%');

	    //$objPHPExcel->getActiveSheet()->getStyle('D'.($cell + 10))->applyFromArray($yellow_color);

		if($state != 'UTTAR PRADESH'){

			$objPHPExcel->getActiveSheet()->setCellValue('D'.($cell + 11),'IGST : '.$totalgst_28);

		} else {

	    	//$objPHPExcel->getActiveSheet()->getStyle('E'.($cell + 10))->applyFromArray($yellow_color);

			$objPHPExcel->getActiveSheet()->setCellValue('D'.($cell + 11),'CGST : '.round($totalgst_28/2,2));

			$objPHPExcel->getActiveSheet()->setCellValue('E'.($cell + 11),'SGST : '.round($totalgst_28/2 ,2));

			$gst_28 = $totalgst_28;

			$objPHPExcel->getActiveSheet()->setCellValue('H'.($cell + 11),$gst_28);

		}

// 		$cell++;

	

	$objPHPExcel->getActiveSheet()->setCellValue('B'.($cell + 12),'Total Invoice Value');

	$objPHPExcel->getActiveSheet()->setCellValue('B'.($cell + 13),'Advance');

	$objPHPExcel->getActiveSheet()->setCellValue('B'.($cell + 14),'Used Credit');

	$objPHPExcel->getActiveSheet()->setCellValue('B'.($cell + 15),'Balance 2nd Payment Received');

	$objPHPExcel->getActiveSheet()->setCellValue('B'.($cell + 16),'Balance 3rd Payment Received');

	$objPHPExcel->getActiveSheet()->setCellValue('B'.($cell + 17),'Balance Amount');

	$objPHPExcel->getActiveSheet()->getRowDimension($cell + 18)->setRowHeight(30); 



	$objPHPExcel->getActiveSheet()->setCellValue('D'.($cell + 2),'No. of Carton');

	$paking = $result[0]['packing_charge'];   

	$paking_gst = round($paking*(12/100),2);

	$gst_12 = $totalgst_12 + $paking_gst;

	//$objPHPExcel->getActiveSheet()->getStyle('D'.($cell + 8))->applyFromArray($yellow_color);

	if($state != 'UTTAR PRADESH'){

		$objPHPExcel->getActiveSheet()->setCellValue('D'.($cell + 9),'IGST : '.$gst_12);

	} else {

	    //$objPHPExcel->getActiveSheet()->getStyle('E'.($cell + 8))->applyFromArray($yellow_color);

		$objPHPExcel->getActiveSheet()->setCellValue('D'.($cell + 9),'CGST : '.round($gst_12/2,2));

		$objPHPExcel->getActiveSheet()->setCellValue('E'.($cell + 9),'SGST : '.round($gst_12/2,2));

	}

	$cart_value  = round($total_price ,2);

	

if($cart_value < 12000){

     $order_processing = 500 ; 

     $order_processing_gst = 90 ; 

    

}else{ 

    $order_processing= 0 ;
    
    $order_processing_gst = 0 ; 


}
  
	$shipping=$result[0]['shipping_charge'];

	$shipping_gst = round($shipping*(18/100),2);

	$gst_18 =  $totalgst_18 + $shipping_gst+ $order_processing_gst;

	//$objPHPExcel->getActiveSheet()->getStyle('D'.($cell + 9))->applyFromArray($yellow_color);

	if($state != 'UTTAR PRADESH'){

		$objPHPExcel->getActiveSheet()->setCellValue('D'.($cell + 10),'IGST : '.$gst_18);

	} else {

	    //$objPHPExcel->getActiveSheet()->getStyle('E'.($cell + 9))->applyFromArray($yellow_color);

		$objPHPExcel->getActiveSheet()->setCellValue('D'.($cell + 10),'CGST : '.round($gst_18/2,2));

		$objPHPExcel->getActiveSheet()->setCellValue('E'.($cell + 10),'SGST : '.round($gst_18/2,2));

	}

	$payment_mode= $result[0]['payment_mode'];

	$objPHPExcel->getActiveSheet()->setCellValue('D'.($cell + 13),'Payment Mode : '.$payment_mode);

	if($payment_mode == 'Online' ) {

		$transaction_id=$result[0]['online_transaction_id']; 

	}else{

		if($result[0]['utr_number']){

			$transaction_id=$result[0]['utr_number'] ; 

		}

	}

	$objPHPExcel->getActiveSheet()->setCellValue('E'.($cell + 13),$transaction_id);

	if($result[0]['confirm_payment'] =='done')$confirm_payment='Verified';

	else $confirm_payment='Not Verified';

	$objPHPExcel->getActiveSheet()->setCellValue('F'.($cell + 13),$confirm_payment);



	$pend_row = $this->db->get_where('order_transition', array('order_id'=>$order_id ,'payment_no' => 2 ))->row();

    $payment_mode='';

	$payment_mode= $pend_row->pend_payment_type;

	$objPHPExcel->getActiveSheet()->setCellValue('D'.($cell + 15),'Payment Mode : '.$payment_mode);

	$transaction_id='';

	if($payment_mode == 'Online' ) {

		$transaction_id=$result[0]['online_transaction_id']; 

	}else{

		if($pend_row->pend_utr_number){

			$transaction_id=$pend_row->pend_utr_number; 

		}

	}

	$objPHPExcel->getActiveSheet()->setCellValue('E'.($cell + 15),$transaction_id);

	if($pend_row->confirm_payment == 'done' )$confirm_payment='Verified';

	else $confirm_payment='Not Verified';

	$objPHPExcel->getActiveSheet()->setCellValue('F'.($cell + 15),$confirm_payment);



	$pend_3_row = $this->db->get_where('order_transition', array('order_id'=>$order_id ,'payment_no' => 3 ))->row();

    $payment_mode='';

	$payment_mode= $pend_3_row->pend_payment_type;

	$objPHPExcel->getActiveSheet()->setCellValue('D'.($cell + 16),'Payment Mode : '.$payment_mode);

    $transaction_id='';

	if($payment_mode == 'Online' ) {

		$transaction_id=$result[0]['online_transaction_id']; 

	}else{

		if($pend_3_row->pend_utr_number){

			$transaction_id=$pend_3_row->pend_utr_number; 

		}

	}

	$objPHPExcel->getActiveSheet()->setCellValue('E'.($cell + 16),$transaction_id);

	if($pend_3_row->confirm_payment == 'done' )$confirm_payment='Verified';

	else $confirm_payment='Not Verified';

	$objPHPExcel->getActiveSheet()->setCellValue('F'.($cell + 16),$confirm_payment);



	$carton = $paking/350;

	$objPHPExcel->getActiveSheet()->setCellValue('E'.($cell + 2),$carton);

	



	$cart_value  = round($total_price ,2);

	

if($cart_value < 12000){

     $order_processing = 500 ; 

     $order_processing_gst = 90 ; 

    

}else{ 

    $order_processing= 0 ;
    
    $order_processing_gst = 0 ; 


}
           
	//$objPHPExcel->getActiveSheet()->getStyle('H'.($cell + 1))->applyFromArray($yellow_color);

	$objPHPExcel->getActiveSheet()->setCellValue('H'.($cell + 1),$cart_value);

	$objPHPExcel->getActiveSheet()->setCellValue('H'.($cell + 2),$paking);

	$objPHPExcel->getActiveSheet()->setCellValue('H'.($cell + 3),$shipping);

// 	$order_processing=$result[0]['order_processing'];

	$objPHPExcel->getActiveSheet()->setCellValue('H'.($cell + 4),$order_processing);

	$sub_amount = round($total_price + $order_processing +$paking + $shipping ,2);

	//$objPHPExcel->getActiveSheet()->getStyle('H'.($cell + 5))->applyFromArray($yellow_color);

	$objPHPExcel->getActiveSheet()->setCellValue('H'.($cell + 5),$sub_amount);

	$admin_discount =  $result[0]['discountcharge'];

	$objPHPExcel->getActiveSheet()->setCellValue('H'.($cell + 6),$admin_discount);

	$net_amount =  $sub_amount  - $admin_discount;

	//$objPHPExcel->getActiveSheet()->getStyle('H'.($cell + 7))->applyFromArray($yellow_color);

	$objPHPExcel->getActiveSheet()->setCellValue('H'.($cell + 7),$net_amount);


	$objPHPExcel->getActiveSheet()->setCellValue('H'.($cell + 9),$gst_12);

	$objPHPExcel->getActiveSheet()->setCellValue('H'.($cell + 10),$gst_18);

	$invoice = $net_amount +  $gst_5 + $gst_12 +  $gst_18+ $gst_28 ;

	//$objPHPExcel->getActiveSheet()->getStyle('H'.($cell + 10))->applyFromArray($yellow_color);

	$objPHPExcel->getActiveSheet()->setCellValue('H'.($cell + 12),$invoice);

	$advance = $data['order']->advance_payment;

	$objPHPExcel->getActiveSheet()->setCellValue('H'.($cell + 13),$advance);

	$pend_amount = $pend_row->pend_amount;

	$objPHPExcel->getActiveSheet()->setCellValue('H'.($cell + 15),$pend_amount);

	$pend_3_amount = $pend_3_row->pend_amount;

	$objPHPExcel->getActiveSheet()->setCellValue('H'.($cell + 16),$pend_3_amount);

	$final = $invoice - $advance -$pend_amount -$pend_3_amount ;

	$objPHPExcel->getActiveSheet()->setCellValue('H'.($cell + 17),round($final ,2 ));



	$objPHPExcel->getActiveSheet()->setCellValue('I'.($cell + 2),'12%');

	$objPHPExcel->getActiveSheet()->setCellValue('I'.($cell + 3),'18%');
if($order_processing == 500){
    $objPHPExcel->getActiveSheet()->setCellValue('I'.($cell + 4),'18%');
    $objPHPExcel->getActiveSheet()->setCellValue('J'.($cell + 4),'90');
}else{
	$objPHPExcel->getActiveSheet()->setCellValue('I'.($cell + 4),'18%');
	$objPHPExcel->getActiveSheet()->setCellValue('J'.($cell + 4),'18%');
	
}


	$objPHPExcel->getActiveSheet()->setCellValue('J'.($cell + 2),$paking_gst);

	$objPHPExcel->getActiveSheet()->setCellValue('J'.($cell + 3),$shipping_gst);

	if($result[0]['offline_file']){

		$objPHPExcel->getActiveSheet()->setCellValue('J'.($cell + 11),'Download File');

		$objPHPExcel->getActiveSheet()->getCell('J'.($cell + 11))->setDataType(PHPExcel_Cell_DataType::TYPE_STRING2);

		$objPHPExcel->getActiveSheet()->getCell('J'.($cell + 11))->getHyperlink()->setUrl(strip_tags($result[0]['offline_file']));

	}

	if($pend_row->pend_offline_file){

		$objPHPExcel->getActiveSheet()->setCellValue('J'.($cell + 13),'Download File');

		$objPHPExcel->getActiveSheet()->getCell('J'.($cell + 13))->setDataType(PHPExcel_Cell_DataType::TYPE_STRING2);

		$objPHPExcel->getActiveSheet()->getCell('J'.($cell + 13))->getHyperlink()->setUrl(strip_tags($pend_row->pend_offline_file));

	}

	if($pend_3_row->pend_offline_file){

		$objPHPExcel->getActiveSheet()->setCellValue('J'.($cell + 14),'Download File');

		$objPHPExcel->getActiveSheet()->getCell('J'.($cell + 14))->setDataType(PHPExcel_Cell_DataType::TYPE_STRING2);

		$objPHPExcel->getActiveSheet()->getCell('J'.($cell + 14))->getHyperlink()->setUrl(strip_tags($pend_3_row->pend_offline_file));

	}

	

	$objPHPExcel->getActiveSheet()->getStyle('A'.$border_row_start.":"."J".($cell + 15))->getAlignment()->setWrapText(true); 

	

	$border_row_end = ($cell + 15);

	

	for($c=1;$c<=15;$c++)if(($cell+$c)%2!=0)$objPHPExcel->getActiveSheet()->getStyle('A'.($cell+$c).':J'.($cell+$c))->applyFromArray($table_bg_arr);



	$objPHPExcel->getActiveSheet()->getStyle("A".$border_row_start.":"."J".$border_row_end)->applyFromArray(

		array(

			'borders' => array(

				'allborders' => array(

					'style' => PHPExcel_Style_Border::BORDER_THIN,

					'color' => array('rgb' => 'DDDDDD')

					)

				)

			)

		);





	$rand = rand(1234, 9898);

	$presentDate = date('YmdHis');

	$fileName = "TWG_order_details_" . $rand . "_" . $presentDate . ".xls";

	$object_writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

	 header('Content-Type: application/vnd.ms-excel');

	 header('Content-Disposition: attachment;filename="'.$fileName.'"');

	 $object_writer->save('php://output');

}

	#################################################SKP		

/**

* Create excel by from direct request

*/
			function requestresult($request_id){

    // $request_id = '0221X7' ;
			$data['result']= $this->Adminmodel->orderdetail($request_id);
			   $data['order']  = $this->db->get_where('orders', array('order_id' => $request_id ,))->row() ;
				$this->request_detail($data);
			die();

			}


function request_detail($data) {





	$result = $data['result'];

	

	$total_price=0;

	$propertydetails=array();

    $order_id = $result[0]['order_rand_id'] ;

	$i = 1 ;

	foreach ($result as  $value){

		 $product_id = $value['product_id'] ;

         $product_detail  =  $this->db->get_where('product_detail', array('sku_code' => $product_id ,))->row() ;

         if(empty($product_detail)){

         	$product_detail  =  $this->db->get_where('product', array('sku_code' => $product_id ,))->row() ;

		 }

         
                                        $price = $value['price'];
                                         $total_price_new+= $value['cart_price'] ;
                                         
                                         
                                        $befor_dis_sub_total+=  $value['price']*$value['quantity'];
                                         
                                        //  ======================================
                                         if($befor_dis_sub_total >= '40000'   && $befor_dis_sub_total < '100000'){
                                      
                                     
                                    //   echo $befor_dis_sub_total ;
                                       
                                           $total_discount  =   ($befor_dis_sub_total*3)/100 ; 
                                           
                                            $percent_amount[$a] =round(($price / $befor_dis_sub_total)*100,2); 
                                       
                                           $discount[$a] =   $total_discount*($percent_amount[$a]/100);
                                       
                                           $per_item_dicount[$a] = $discount[$a] / $value['quantity'] ;
                                          
                                  } elseif($befor_dis_sub_total >= '100000' ){
                                      
                                     
                                    //   echo $befor_dis_sub_total ;
                                       
                                           $total_discount  =   ($befor_dis_sub_total*5)/100 ; 
                                           
                                           
                                            $percent_amount[$a] =round(($item_price / $befor_dis_sub_total)*100,2); 
                                       
                                           $discount[$a] =   $total_discount*($percent_amount[$a]/100);
                                       
                                           $per_item_dicount[$a] = $discount[$a] / $value['quantity'] ;
                                          
                                  }
                                  else{
                                      
                                      $per_item_dicount[$a] = 0 ; 
                                  }
                                  
                                   
                                    $amount = round($price - $per_item_dicount[$a], 2)  ; $a++ ;
                                         
                                          $qty = $value['quantity'];
                                  
                                  if($qty== 0){
                                      
                                      $sub_price = 0 ;
                                      
                                  }else{
                                  
                                 $sub_price = $amount*$value['quantity'];
                             
                                  }
                                  
                                             
                                          
                                          
                                        $after_discount+= $sub_price ;
                                        
                                        // ==============================

		//$img = 'http://adsfly.in/wholesale/assets/product/'.$product_detail->main_image5;
		
		//$img =str_replace('http://adsfly.in/wholesale/','/',$img);
		$img =$_SERVER['DOCUMENT_ROOT'] . '/wholesale/assets/product/'.$product_detail->main_image5;

		$real_price =   $value['price_after_discount'] -  $value['discount_price'];

		$sub_price = $real_price*$value['quantity'];

		$total_before+= $sub_price;

		$gst_val = round($sub_price*$value['gst']/100 ,2);

		$propertydetails[] =array('SNo' => $i++,'Image' => $img,'ProductSKU' => $value['product_id'],'DemandedQty' => $value['customer_quantity'],'DispatchedQty' => $value['quantity'],'DiscWPbeforetax' => $value['price'],'NetPrice' => $value['price_after_discount'],'Amount' => $sub_price,'GST' => " ",'GSTAmount' => " ");

	  

	    $volume= $product_detail->box_volume_weight *$value['quantity'];

	

	    $finalvolume+=$volume;

	

	    if($value['gst'] == '12'){

	

		  $totalgst_12+=$gst_val;

	

	    }elseif($value['gst']=='18'){

		 

		   $totalgst_18+=$gst_val ;

	

	    }elseif($value['gst']=='5'){

	

		   $totalgst_5+=$gst_val ;

	

	    }elseif($value['gst']=='28'){

	

		   $totalgst_28+=$gst_val;

	

	    }

	

	

	    $total_price+= $value['cart_price'];

	

	}

	 

	 

	 $a = 1 ;



	 $percent_amount = array();



	 $discount = array() ;



     foreach($result as $amount){

	   //==================== % ratio =====                                

		$percent_amount[$a] =round(($amount['cart_price'] / $total_price)*100,2); 

		$a++ ;       

     } 





	require_once SITEPATH . 'PHPExcel/Classes/PHPExcel.php';

	require_once SITEPATH . 'PHPExcel/Classes/PHPExcel/Helper/HTML.php';



 	$objPHPExcel = new PHPExcel(); 

	$objPHPExcel->getProperties()

			->setCreator("user")

    		->setLastModifiedBy("SKP")

			->setTitle("Order Details")

			->setSubject("Order Details")

			->setDescription("Order Details")

			->setKeywords("Order Details")

			->setCategory("Order Details");



	// Set the active Excel worksheet to sheet 0

	$objPHPExcel->setActiveSheetIndex(0); 



	// Initialise the Excel row number

	$rowCount = 0; 

	#SKP

	$objPHPExcel->getActiveSheet()->getStyle('A1:J1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);

	$objPHPExcel->getActiveSheet()->getStyle("A1:J1")->getFont()->setBold(true);

	$objPHPExcel->getActiveSheet()->getStyle('A1:J1')->applyFromArray(

		array(

			'fill' => array(

				'type' => PHPExcel_Style_Fill::FILL_SOLID,

				'color' => array('rgb' => '000000')

			),

			'font'  => array(

				'bold'  => true,

				'color' => array('rgb' => 'FFFFFF'),

				'size'  => 15

				//'name'  => 'Verdana'

			)

		)

	);

	$objPHPExcel->getActiveSheet()->mergeCells('A1:J1');

	$objPHPExcel->getActiveSheet()->setCellValue('A1','Order Details');



	$htmlHelper = new PHPExcel_Helper_HTML();

	

	$objPHPExcel->getActiveSheet()->mergeCells('A3:E3');

	$objPHPExcel->getActiveSheet()->setCellValue('A3',$htmlHelper->toRichTextObject('<b>Order No : </b>'.$result[0]['order_rand_id']));

	$objPHPExcel->getActiveSheet()->mergeCells('A4:E4');

	$objPHPExcel->getActiveSheet()->setCellValue('A4',$htmlHelper->toRichTextObject('<b>Order Date : </b>'.$result[0]['show_date']));

	$oid =$result[0]['order_rand_id'];

    $customeradd = $this->db->get_where('order_address' , array('order_id' => $oid  ))->row(); 

	$objPHPExcel->getActiveSheet()->mergeCells('A5:E5');

	$objPHPExcel->getActiveSheet()->setCellValue('A5',$htmlHelper->toRichTextObject('<b>Owner Name : </b>'.$result[0]['customer_name']));

// 	$objPHPExcel->getActiveSheet()->mergeCells('A6:E6');

// 	$objPHPExcel->getActiveSheet()->setCellValue('A6',$htmlHelper->toRichTextObject('<b>Owner Name : </b>'.$result[0]['customer_name']));

// 	$objPHPExcel->getActiveSheet()->mergeCells('A7:E7');

// 	$objPHPExcel->getActiveSheet()->setCellValue('A7',$htmlHelper->toRichTextObject('<b>Email ID : </b>'.$result[0]['email']));

// 	$objPHPExcel->getActiveSheet()->mergeCells('A8:E8');

// 	$objPHPExcel->getActiveSheet()->setCellValue('A8',$htmlHelper->toRichTextObject('<b>Mobile No : </b>'.$result[0]['customer_mob']));

// 	$objPHPExcel->getActiveSheet()->mergeCells('A9:E9');

// 	$objPHPExcel->getActiveSheet()->setCellValue('A9',$htmlHelper->toRichTextObject('<b>Landline No : </b>'.$result[0]['landline']));

// 	$objPHPExcel->getActiveSheet()->mergeCells('A10:E10');

// 	$objPHPExcel->getActiveSheet()->setCellValue('A10',$htmlHelper->toRichTextObject('<b>Business Type & Ownership Type : </b>'.$result[0]['btype'].' & '.$result[0]['ownertype']));

	

	$objPHPExcel->getActiveSheet()->getStyle('F3:J3')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

	$objPHPExcel->getActiveSheet()->getStyle('F4:J4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

	$objPHPExcel->getActiveSheet()->getStyle('F5:J5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

	$objPHPExcel->getActiveSheet()->getStyle('F6:J6')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

// 	$objPHPExcel->getActiveSheet()->getStyle('F7:J7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

// 	$objPHPExcel->getActiveSheet()->getStyle('F8:J8')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

// 	$objPHPExcel->getActiveSheet()->getStyle('F9:J9')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

// 	$objPHPExcel->getActiveSheet()->getStyle('F10:J10')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);

	$objPHPExcel->getActiveSheet()->mergeCells('F3:J3');
	
		$pin =  $result[0]['pincode'];

	$pincode = $this->db->get_where('pincode' , array('name' => $pin  ))->row() ;


	$objPHPExcel->getActiveSheet()->setCellValue('F3',$htmlHelper->toRichTextObject('<b>City : </b>'.$pincode->area));

	$objPHPExcel->getActiveSheet()->mergeCells('F4:J4');
		$state =  $pincode->state;

	$objPHPExcel->getActiveSheet()->setCellValue('F4',$htmlHelper->toRichTextObject('<b>State : </b>'.$state));


	$objPHPExcel->getActiveSheet()->mergeCells('F5:J5');

	$objPHPExcel->getActiveSheet()->setCellValue('F5',$htmlHelper->toRichTextObject('<b>Delivery Mode : </b>'.$result[0]['delievry_type']));

// 	$objPHPExcel->getActiveSheet()->mergeCells('F6:J6');



// 	$objPHPExcel->getActiveSheet()->setCellValue('F6',$htmlHelper->toRichTextObject('<b>State : </b>'.$state));

// 	$objPHPExcel->getActiveSheet()->mergeCells('F7:J7');

// 	$objPHPExcel->getActiveSheet()->setCellValue('F7',$htmlHelper->toRichTextObject('<b>Delivery Mode : </b>'.$result[0]['delievry_type']));

// 	$objPHPExcel->getActiveSheet()->mergeCells('F8:J8');

// 	$objPHPExcel->getActiveSheet()->setCellValue('F8',$htmlHelper->toRichTextObject('<b>GST No : </b>'.$customeradd->customer_gst));

// 	$objPHPExcel->getActiveSheet()->mergeCells('F9:J9');

// 	$objPHPExcel->getActiveSheet()->setCellValue('F9',$htmlHelper->toRichTextObject('<b>PAN No. : </b>'.$customeradd->customer_pan));

// 	$objPHPExcel->getActiveSheet()->mergeCells('F10:J10');

// 	$objPHPExcel->getActiveSheet()->setCellValue('F10',$htmlHelper->toRichTextObject('<b>Aadhar No : </b>'.$customeradd->customer_adhaar));



	$rowCount = 7; 

	#SKP

	// Sheet cells

	$cell_definition = array(

		'A' => 'S.No',

		'B' => 'Image',

		'C' => 'Product SKU',

		'D' => 'Qty',

		'E' => 'Ready Qty',

		'F' => 'W.P.(before tax)',

		'G' => 'Disc. W.P.(before tax)',

		'H' => 'Amount',

		'I' => ' ',

		'J' => ' '

	);

	$cell_definition_index = array(

		'A' => 'SNo',

		'B' => 'Image',

		'C' => 'ProductSKU',

		'D' => 'DemandedQty',

		'E' => 'DispatchedQty',

		'F' => 'DiscWPbeforetax',

		'G' => 'NetPrice',

		'H' => 'Amount',

		'I' => 'GST',

		'J' => 'GSTAmount'

	);



	// Build headers

	$cell = $rowCount + 1;

	$objPHPExcel->getActiveSheet()->getStyle("A".$cell.":J".$cell)->getFont()->setBold(true);

	$border_row_start = $cell;

	foreach( $cell_definition_index as $column => $value )

	{

		/*if($value=='Image')$objPHPExcel->getActiveSheet()->getColumnDimension("{$column}")->setWidth(20);

		else $objPHPExcel->getActiveSheet()->getColumnDimension("{$column}")->setAutoSize(true);*/

		if($value=='SNo')$objPHPExcel->getActiveSheet()->getColumnDimension("{$column}")->setWidth(5);

		if($value=='Image')$objPHPExcel->getActiveSheet()->getColumnDimension("{$column}")->setWidth(20);

		if($value=='ProductSKU')$objPHPExcel->getActiveSheet()->getColumnDimension("{$column}")->setWidth(20);

	}

	foreach( $cell_definition as $column => $value )

	{

		$objPHPExcel->getActiveSheet()->setCellValue( "{$column}{$cell}", $value ); 

	}

	// Build cells

	$records_count=count($propertydetails)+$rowCount;

	$property_index=0;

$table_bg_arr=array(

					'fill' => array(

						'type' => PHPExcel_Style_Fill::FILL_SOLID,

						'color' => array('rgb' => 'f9f9f9')

					)

				);



	while( $rowCount < $records_count ){ 

		$cell = $rowCount + 2;

			if($cell%2!=0)$objPHPExcel->getActiveSheet()->getStyle('A'.$cell.':J'.$cell)->applyFromArray($table_bg_arr);



		foreach( $cell_definition_index as $column => $value ) {

			$objPHPExcel->getActiveSheet()->getRowDimension($rowCount + 2)->setRowHeight(50); 

			

			switch ($value) {

				case 'Image':

					if (file_exists($propertydetails[$property_index][$value])) {

				        $objDrawing = new PHPExcel_Worksheet_Drawing();

				        $objDrawing->setName('Product Image');

				        $objDrawing->setDescription('Product Image');

				        //Path to signature .jpg file

				        $signature = $propertydetails[$property_index][$value];    

				        $objDrawing->setPath($signature);

				        $objDrawing->setOffsetX(20);                     //setOffsetX works properly

				        $objDrawing->setOffsetY(10);                     //setOffsetY works properly

				        $objDrawing->setCoordinates($column.$cell);             //set image to cell 

				        $objDrawing->setWidth(50);  

				        $objDrawing->setHeight(50);                     //signature height  

				        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());  //save 

				    } else {

				    	$objPHPExcel->getActiveSheet()->setCellValue($column.$cell, "Image not found" ); 

				    }

				    break;

				case 'Link':

					//set the value of the cell

					$objPHPExcel->getActiveSheet()->SetCellValue($column.$cell, $propertydetails[$property_index][$value]);

					//change the data type of the cell

					$objPHPExcel->getActiveSheet()->getCell($column.$cell)->setDataType(PHPExcel_Cell_DataType::TYPE_STRING2);

					///now set the link

					$objPHPExcel->getActiveSheet()->getCell($column.$cell)->getHyperlink()->setUrl(strip_tags($propertydetails[$property_index][$value]));

					break;



				default:

					$objPHPExcel->getActiveSheet()->setCellValue($column.$cell, $propertydetails[$property_index][$value] ); 

					break;

			}



		}

		$property_index++;	

	    $rowCount++; 

	} 

	

	$cell = $rowCount + 1;

	$yellow_color=array(

			'fill' => array(

				'type' => PHPExcel_Style_Fill::FILL_SOLID,

				'color' => array('rgb' => 'FFFF00')

			)

		);

	$objPHPExcel->getActiveSheet()->getStyle('B'.($cell + 1))->getFont()->setBold(true);

	$objPHPExcel->getActiveSheet()->setCellValue('B'.($cell + 1),'');




	
	
	$objPHPExcel->getActiveSheet()->getRowDimension($cell + 18)->setRowHeight(30); 



	$objPHPExcel->getActiveSheet()->setCellValue('D'.($cell + 1),'Sub Total (Before Discount)');

	$objPHPExcel->getActiveSheet()->setCellValue('E'.($cell + 1),$befor_dis_sub_total);

	$objPHPExcel->getActiveSheet()->setCellValue('G'.($cell + 1),'Sub Total');




	$objPHPExcel->getActiveSheet()->setCellValue('H'.($cell + 1),$after_discount);

// 	$objPHPExcel->getActiveSheet()->setCellValue('H'.($cell + 2),$paking);



// 	$objPHPExcel->getActiveSheet()->setCellValue('I'.($cell + 2),'12%');

// 	$objPHPExcel->getActiveSheet()->setCellValue('I'.($cell + 3),'18%');



// 	$objPHPExcel->getActiveSheet()->setCellValue('J'.($cell + 2),$paking_gst);

// 	$objPHPExcel->getActiveSheet()->setCellValue('J'.($cell + 3),$shipping_gst);



	

	$objPHPExcel->getActiveSheet()->getStyle('A'.$border_row_start.":"."J".($cell + 15))->getAlignment()->setWrapText(true); 

	

	$border_row_end = ($cell + 15);

	

	for($c=1;$c<=15;$c++)if(($cell+$c)%2!=0)$objPHPExcel->getActiveSheet()->getStyle('A'.($cell+$c).':J'.($cell+$c))->applyFromArray($table_bg_arr);



	$objPHPExcel->getActiveSheet()->getStyle("A".$border_row_start.":"."J".$border_row_end)->applyFromArray(

		array(

			'borders' => array(

				'allborders' => array(

					'style' => PHPExcel_Style_Border::BORDER_THIN,

					'color' => array('rgb' => 'DDDDDD')

					)

				)

			)

		);





	$rand = rand(1234, 9898);

	$presentDate = date('YmdHis');

	$fileName = "TWG_order_details_" . $rand . "_" . $presentDate . ".xls";

	$object_writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

	 header('Content-Type: application/vnd.ms-excel');

	 header('Content-Disposition: attachment;filename="'.$fileName.'"');

	 $object_writer->save('php://output');

}


// ===========================================================

function listproduct() {

    

      $result =  $this->db->get('product_detail')->result() ;

      

    $i=1 ;

	$propertydetails=array();

	

	foreach ($result as  $value){

                 $pro_detail = $value->pro_name.' '.$value->sku_code;

          

           

		$propertydetails[] =array('SNo' => $i++,'Image' => str_replace('http://adsfly.in/wholesale/','.',$value->main_image5),'ProductDetail' => $pro_detail,'price' => $value->selling_price,'DisplayCat' => $value->flag,'Position' => $value->home_deals_position,'NetPrice' => $value->home_deals_position,'Amount' => $value->home_deals_position,'GST' => $value->home_deals_position,'GSTAmount' => $value->home_deals_position);

	  

	   

	}





	 

	require_once SITEPATH . 'PHPExcel/Classes/PHPExcel.php';

	require_once SITEPATH . 'PHPExcel/Classes/PHPExcel/Helper/HTML.php';



 	$objPHPExcel = new PHPExcel(); 

	$objPHPExcel->getProperties()

			->setCreator("user")

    		->setLastModifiedBy("SKP")

			->setTitle("Order Details")

			->setSubject("Order Details")

			->setDescription("Order Details")

			->setKeywords("Order Details")

			->setCategory("Order Details");



	// Set the active Excel worksheet to sheet 0

	$objPHPExcel->setActiveSheetIndex(0); 



	// Initialise the Excel row number

	$rowCount = 0; 

	#SKP



	$rowCount = 11; 

	#SKP

	// Sheet cells

	$cell_definition = array(

		'A' => 'S.No',

		'B' => 'Image',

		'C' => 'Product Detail',

		'D' => 'Listing Price',

		'E' => 'Display Category',

		'F' => 'Position',

		'G' => 'Enble',

		'H' => 'Amount',

		'I' => 'GST %',

		'J' => 'GST Amount'

	);

	$cell_definition_index = array(

		'A' => 'S.No',

		'B' => 'Image',

		'C' => 'Product Detail',

		'D' => 'Listing Price',

		'E' => 'Display Category',

		'F' => 'Position',

		'G' => 'Enble',

		'H' => 'Amount',

		'I' => 'GST %',

		'J' => 'GST Amount'

	);



	// Build headers

	$cell = $rowCount + 1;

	$objPHPExcel->getActiveSheet()->getStyle("A".$cell.":J".$cell)->getFont()->setBold(true);

	$border_row_start = $cell;

	foreach( $cell_definition_index as $column => $value )

	{

		/*if($value=='Image')$objPHPExcel->getActiveSheet()->getColumnDimension("{$column}")->setWidth(20);

		else $objPHPExcel->getActiveSheet()->getColumnDimension("{$column}")->setAutoSize(true);*/

		if($value=='SNo')$objPHPExcel->getActiveSheet()->getColumnDimension("{$column}")->setWidth(5);

		if($value=='Image')$objPHPExcel->getActiveSheet()->getColumnDimension("{$column}")->setWidth(20);

		if($value=='ProductSKU')$objPHPExcel->getActiveSheet()->getColumnDimension("{$column}")->setWidth(20);

	}

	foreach( $cell_definition as $column => $value )

	{

		$objPHPExcel->getActiveSheet()->setCellValue( "{$column}{$cell}", $value ); 

	}

	// Build cells

	$records_count=count($propertydetails)+$rowCount;

	$property_index=0;

$table_bg_arr=array(

					'fill' => array(

						'type' => PHPExcel_Style_Fill::FILL_SOLID,

						'color' => array('rgb' => 'f9f9f9')

					)

				);



	while( $rowCount < $records_count ){ 

		$cell = $rowCount + 2;

			if($cell%2!=0)$objPHPExcel->getActiveSheet()->getStyle('A'.$cell.':J'.$cell)->applyFromArray($table_bg_arr);



		foreach( $cell_definition_index as $column => $value ) {

			$objPHPExcel->getActiveSheet()->getRowDimension($rowCount + 2)->setRowHeight(50); 

			

			switch ($value) {

				case 'Image':

					if (file_exists($propertydetails[$property_index][$value])) {

				        $objDrawing = new PHPExcel_Worksheet_Drawing();

				        $objDrawing->setName('Product Image');

				        $objDrawing->setDescription('Product Image');

				        //Path to signature .jpg file

				        $signature = $propertydetails[$property_index][$value];    

				        $objDrawing->setPath($signature);

				        $objDrawing->setOffsetX(20);                     //setOffsetX works properly

				        $objDrawing->setOffsetY(10);                     //setOffsetY works properly

				        $objDrawing->setCoordinates($column.$cell);             //set image to cell 

				        $objDrawing->setWidth(50);  

				        $objDrawing->setHeight(50);                     //signature height  

				        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());  //save 

				    } else {

				    	$objPHPExcel->getActiveSheet()->setCellValue($column.$cell, "Image not found" ); 

				    }

				    break;

				case 'Link':

					//set the value of the cell

					$objPHPExcel->getActiveSheet()->SetCellValue($column.$cell, $propertydetails[$property_index][$value]);

					//change the data type of the cell

					$objPHPExcel->getActiveSheet()->getCell($column.$cell)->setDataType(PHPExcel_Cell_DataType::TYPE_STRING2);

					///now set the link

					$objPHPExcel->getActiveSheet()->getCell($column.$cell)->getHyperlink()->setUrl(strip_tags($propertydetails[$property_index][$value]));

					break;



				default:

					$objPHPExcel->getActiveSheet()->setCellValue($column.$cell, $propertydetails[$property_index][$value] ); 

					break;

			}



		}

		$property_index++;	

	    $rowCount++; 

	} 

	







	$rand = rand(1234, 9898);

	$presentDate = date('YmdHis');

	$fileName = "TWG_Productlist_" . $rand . "_" . $presentDate . ".xls";

	$object_writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

	 header('Content-Type: application/vnd.ms-excel');

	 header('Content-Disposition: attachment;filename="'.$fileName.'"');

	 $object_writer->save('php://output');

}

	#################################################SKP		



}







		