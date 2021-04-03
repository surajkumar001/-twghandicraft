<?php

/*

Code modified by : SKP, satishkumarpawar@gmail.com

For: PHPExcel

*/

//ini_set('display_errors','1');



defined('BASEPATH') OR exit('No direct script access allowed');







class Product extends CI_Controller {



    



    



    



	function __construct() {







         parent::__construct();



        



         $this->load->model('Adminmodel');







       



         	$url = 'http://' . $_SERVER['HTTP_HOST'] . "/wholesale/phpexcel_gd/";



        	$path = $_SERVER['DOCUMENT_ROOT'] . '/wholesale/phpexcel_gd/';



        	define('SITEURL', $url);



        	define('SITEPATH', str_replace('\\', '/', $path));







       }



    



    





##################################### SKP



			function export_xls(){
	    	    	//=======================
                   $request_id = '1120X3' ;
			$data['result']= $this->Adminmodel->product_list();
			
		

			   //$this->load->view('Admin/confirmdetails.php', $data);
					$this->xlscreation_direct($data);
					die();

			}


	public function productbycategories(){
			  $pcatid = $_GET['pcat'] ;
                        
        				$catid =$_GET['cat'];	
        				$subcatid =$_GET['subcatid'];	
        		
			
		
							$this->db->select('*'); 
                           if($subcatid !='please choose'){
                             $this->db->like('sub_catid', $subcatid); 
                             
                            }elseif($catid !='please choose' ){
                                
                             $this->db->like('category_id', $catid); 
                               
                            }else{
                                      $this->db->like('parent_cat', $pcatid); 
                          
                            }
                            
                	       // $this->db->where('status', 1); 
                	        $this->db->from('product_detail');
                	         $this->db->limit(40);

                             $query = $this->db->get();
							     	$data['result'] = $query->result_array();
							     
				// 	$data['pcat'] = $pcatid ;
				// 	$data['catid'] = $catid ;
				// 	$data['subcatid'] = $subcatid ;
				
						$this->xlscreation_direct($data);
					die();
}



	    	    	//=======================
          	public function invent_categories(){

		 
                        $inventory_type = $_GET['inventorytype'] ;
                        
        		
        			
        			$catid =$_GET['cat'];	
        				$subcatid =$_GET['subcatid'];	
        				$where='category_id';
        				$table='product_detail';
				
    				    	$this->db->select('*'); 
    						if($inventory_type =="Hightolow"){
                     	     $this->db->order_by("availability", "desc");
                     		}
                            if($subcatid !='please choose'){
                             $this->db->like('sub_catid', $subcatid); 
                             $this->db->like('category_id', $catid); 
                            
                            }elseif($catid !='please choose'){
                             $this->db->like('category_id', $catid); 
                            }
                           
                	       // $this->db->where('status', 1); 
                	        $this->db->from('product_detail');
                             $query = $this->db->get();

				$data['result'] = $query->result_array();
				

					$this->inventory_filter($data,$inventory_type);
					die();
}

/**


/**

* Create excel by from direct request

*/

function xlscreation_direct($data) {





	$result = $data['result'];

	

	$total_price=0;

	$propertydetails=array();

 
	$i = 1 ;

	foreach ($result as  $value){

		 $product_id = $value['id'] ;

         $product_detail  =  $this->db->get_where('product_detail', array('id' => $product_id ,))->row() ;

     
          

		$img =$_SERVER['DOCUMENT_ROOT'] . '/wholesale/assets/product/'.$product_detail->main_image5;
		
		$pro_detail = $product_detail->pro_name ;

	
		$propertydetails[] =array('SNo' => $i++,'Image' => $img,'ProductSKU' => $value['sku_code'],'DemandedQty' => $pro_detail,'DispatchedQty' => $value['selling_price'],'DiscWPbeforetax' => $value['flag'],'NetPrice' => $value['Position'],'Amount' => $value['status'],'GST' => $value['status'],'GSTAmount' => $value['varient']);

	  


	

	}

	 

	 

	 $a = 1 ;



	 $percent_amount = array();



	 $discount = array() ;







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



	$rowCount = 3; 

	#SKP

	// Sheet cells

	$cell_definition = array(

		'A' => 'S.No',

		'B' => 'Image',

		'C' => 'Product SKU',

		'D' => 'Product Detail',

		'E' => 'Price',

		'F' => 'Display Category',

		'G' => 'Position ',

		'H' => 'Enble Disable',

		'I' => 'Action',

		'J' => 'Varient'

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





	$rand = rand(1234, 9898);

	$presentDate = date('YmdHis');

	$fileName = "TWG_product_" . $rand . "_" . $presentDate . ".xls";

	$object_writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

	 header('Content-Type: application/vnd.ms-excel');

	 header('Content-Disposition: attachment;filename="'.$fileName.'"');

	 $object_writer->save('php://output');

}

	#################################################SKP		


			function inventory_download(){
	    	    	//=======================
                //   $request_id = '1120X3' ;
			$data['result']= $this->Adminmodel->product_list();
			
			   //$this->load->view('Admin/confirmdetails.php', $data);
					$this->inventory_direct($data);
					die();

			}

/**


/**

* Create excel by from direct request

*/

function inventory_direct($data) {





	$result = $data['result'];

	

	$total_price=0;

	$propertydetails=array();

 
	$i = 1 ;

	foreach ($result as  $value){

		 $product_id = $value['id'] ;

         $product_detail  =  $this->db->get_where('product_detail', array('id' => $product_id ,))->row() ;

     
          

		$img =$_SERVER['DOCUMENT_ROOT'] . '/wholesale/assets/product/'.$product_detail->main_image5;
		
		$pro_detail = $product_detail->pro_name ;

	                   $query = $this->db->select_sum('quantity');
                       $query = $this->db->where(array('product_id' =>$value['sku_code'] , 'order_status' => 0));
                       $query = $this->db->get('order_detail');
                       $result = $query->result();
                        // print_r($result) ;
                        
                                                                	
                      $hold = $result[0]->quantity ; 
                          
                           
                     if($hold){
                          $holdlow = $result[0]->quantity  ;
                     }else{
                         
                         
                         $holdlow = 0 ;
                     }
                     
                     if($value['availability'] <= 0){ 
                         
                         $status = "Out" ; 
                     
                     }elseif($value['availability'] <= $value['low_alert'] &&  $value['availability'] > 0){
                         
                           
                         $status = "Low" ; 
                      
                     }else{
                            
                         $status = "In stock" ; 
                     
                         
                     } 
                     
                     $net_inventory = $value['availability'] - $holdlow ;
                  
// 		$propertydetails[] =array('SNo' => $i++,'Image' => $img,'ProductSKU' => $value['sku_code'],'DemandedQty' => $pro_detail,'DispatchedQty' => $value['selling_price'],'DiscWPbeforetax' => $value['flag'],'NetPrice' => $value['Position'],'Amount' => $value['status'],'GST' => $value['status'],'GSTAmount' => $value['varient']);

	  	$propertydetails[] =array('SNo' => $i++,'Image' => $img,'ProductSKU' => $value['sku_code'],'DemandedQty' => $value['selling_price'],
	  	'DispatchedQty' => $value['min_order_quan'],'DiscWPbeforetax' => $value['availability'],'NetPrice' => $holdlow,'Amount' => $net_inventory,'GST' => $status,'GSTAmount' => '');



	

	}

	 

	 

	 $a = 1 ;



	 $percent_amount = array();



	 $discount = array() ;



 


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



	$rowCount = 3; 

	#SKP

	// Sheet cells

	$cell_definition = array(

		'A' => 'S.No',

		'B' => 'Image',

		'C' => 'Product SKU',

		'D' => 'W.P',

		'E' => 'Min Qty',

		'F' => 'Inventory Qty',

		'G' => 'Invetory Hold ',

		'H' => 'Net Inventory',

		'I' => 'Status',

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





	$rand = rand(1234, 9898);

	$presentDate = date('YmdHis');

	$fileName = "TWG_inventory_" . $rand . "_" . $presentDate . ".xls";

	$object_writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

	 header('Content-Type: application/vnd.ms-excel');

	 header('Content-Disposition: attachment;filename="'.$fileName.'"');

	 $object_writer->save('php://output');

}

	#################################################SKP		

function inventory_filter($data,$inventory_type) {





	$result = $data['result'];

	

	$total_price=0;

	$propertydetails=array();

 
	$i = 1 ;

	foreach ($result as  $value){

		 $product_id = $value['id'] ;
         $product_detail  =  $this->db->get_where('product_detail', array('id' => $product_id ,))->row() ;

		$img =$_SERVER['DOCUMENT_ROOT'] . '/wholesale/assets/product/'.$product_detail->main_image5;
		
		$pro_detail = $product_detail->pro_name ;
	                   $query = $this->db->select_sum('quantity');
                       $query = $this->db->where(array('product_id' =>$value['sku_code'] , 'order_status' => 0));
                       $query = $this->db->get('order_detail');
                       $result = $query->result();
                        // print_r($result) ;
                        
                      $hold = $result[0]->quantity ; 
                           
                     if($hold){
                          $holdlow = $result[0]->quantity  ;
                     }else{
                         
                         
                         $holdlow = 0 ;
                     }
                     
                     if($value['availability'] <= 0){ 
                         
                         $status = "Out" ; 
                     
                     }elseif($value['availability'] <= $value['low_alert'] &&  $value['availability'] > 0){
                         
                           
                         $status = "Low" ; 
                      
                     }else{
                            
                         $status = "In stock" ; 
                     
                         
                     } 
                     
                     $net_inventory = $value['availability'] - $holdlow ;
                  

  if($inventory_type =="Low"){
                               if($value['availability'] <= $value['low_alert'] &&  $value['availability'] > 0){  
                                   
                                   
                                   
	  	$propertydetails[] =array('SNo' => $i++,'Image' => $img,'ProductSKU' => $value['sku_code'],'DemandedQty' => $value['selling_price'],
	  	'DispatchedQty' => $value['min_order_quan'],'DiscWPbeforetax' => $value['availability'],'NetPrice' => $holdlow,'Amount' => $net_inventory,'GST' => $status,'GSTAmount' => '');
}
}elseif($inventory_type =="Out"){
   if($value['availability'] <= 0){ 
       
       
    	  	$propertydetails[] =array('SNo' => $i++,'Image' => $img,'ProductSKU' => $value['sku_code'],'DemandedQty' => $value['selling_price'],
	  	'DispatchedQty' => $value['min_order_quan'],'DiscWPbeforetax' => $value['availability'],'NetPrice' => $holdlow,'Amount' => $net_inventory,'GST' => $status,'GSTAmount' => '');
}
    
}else{
    
    	  	$propertydetails[] =array('SNo' => $i++,'Image' => $img,'ProductSKU' => $value['sku_code'],'DemandedQty' => $value['selling_price'],
	  	'DispatchedQty' => $value['min_order_quan'],'DiscWPbeforetax' => $value['availability'],'NetPrice' => $holdlow,'Amount' => $net_inventory,'GST' => $status,'GSTAmount' => '');

}

	

			
		  
	 
}
	 $a = 1 ;



	 $percent_amount = array();



	 $discount = array() ;



 


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



	$rowCount = 3; 

	#SKP

	// Sheet cells

	$cell_definition = array(

		'A' => 'S.No',

		'B' => 'Image',

		'C' => 'Product SKU',

		'D' => 'W.P',

		'E' => 'Min Qty',

		'F' => 'Inventory Qty',

		'G' => 'Invetory Hold ',

		'H' => 'Net Inventory',

		'I' => 'Status',

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





	$rand = rand(1234, 9898);

	$presentDate = date('YmdHis');

	$fileName = "TWG_inventory_" . $rand . "_" . $presentDate . ".xls";

	$object_writer = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

	 header('Content-Type: application/vnd.ms-excel');

	 header('Content-Disposition: attachment;filename="'.$fileName.'"');

	 $object_writer->save('php://output');

}

	#################################################SKP		


}



	