<?php

function my_constants(){
	$url = 'http://' . $_SERVER['HTTP_HOST'] . "/phpexcel_gd/";
	$path = $_SERVER['DOCUMENT_ROOT'] . '/phpexcel_gd/';
	define('SITEURL', $url);
	define('SITEPATH', str_replace('\\', '/', $path));
}

function report_details($display = null) {
	
	if($display){
		$imagePath = SITEURL . "images/";
	} else {
		$imagePath = SITEPATH . "images/";
	}	

	$reportdetails = array(
		array('Product Image' => $imagePath . "33X0074M000TSAS-1.jpg",'Product SKU' => "76X0076M",'Product WP' => "840",'Product Status' => "Low Stock"),
		array('Product Image' => $imagePath . "40_TEA_LIGHT_CANDLE_STAND(CORP_ITEMS).png",'Product SKU' => "80X0098G",'Product WP' => "620",'Product Status' => "In Stock"),
		array('Product Image' => $imagePath . "39_CANVAS_PAINTING_KRISHNA_GANESHA.png",'Product SKU' => "83X0055Y",'Product WP' => "480",'Product Status' => "Outof Stock"),
	);
	return $reportdetails;

}
/**
* Create excel by from direct request
*/
function xlscreation_direct() {

	$reportdetails = report_details();

	require_once SITEPATH . 'PHPExcel/Classes/PHPExcel.php';

 	$objPHPExcel = new PHPExcel(); 
	$objPHPExcel->getProperties()
			->setCreator("user")
    		->setLastModifiedBy("user")
			->setTitle("Office 2007 XLSX Test Document")
			->setSubject("Office 2007 XLSX Test Document")
			->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
			->setKeywords("office 2007 openxml php")
			->setCategory("Test result file");

	// Set the active Excel worksheet to sheet 0
	$objPHPExcel->setActiveSheetIndex(0); 

	// Initialise the Excel row number
	$rowCount = 0; 

	// Sheet cells
	$cell_definition = array(
		'A' => 'Product Image',
		'B' => 'Product SKU',
		'C' => 'Product WP',
		'D' => 'Product Status'
	);

	// Build headers
	foreach( $cell_definition as $column => $value )
	{
		$objPHPExcel->getActiveSheet()->getColumnDimension("{$column}")->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->setCellValue( "{$column}1", $value ); 
	}

	// Build cells
	while( $rowCount < count($reportdetails) ){ 
		$cell = $rowCount + 2;
		foreach( $cell_definition as $column => $value ) {

			$objPHPExcel->getActiveSheet()->getRowDimension($rowCount + 2)->setRowHeight(75); 
			
			switch ($value) {
				case 'Product Image':
					if (file_exists($reportdetails[$rowCount][$value])) {
				        $objDrawing = new PHPExcel_Worksheet_Drawing();
				        $objDrawing->setName('Customer Signature');
				        $objDrawing->setDescription('Customer Signature');
				        //Path to signature .jpg file
				        $signature = $reportdetails[$rowCount][$value];    
				        $objDrawing->setPath($signature);
				        $objDrawing->setOffsetX(25);                     //setOffsetX works properly
				        $objDrawing->setOffsetY(10);                     //setOffsetY works properly
				        $objDrawing->setCoordinates($column.$cell);             //set image to cell 
				        $objDrawing->setWidth(75);  
				        $objDrawing->setHeight(75);                     //signature height  
				        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());  //save 
				    } else {
				    	$objPHPExcel->getActiveSheet()->setCellValue($column.$cell, "Image not found" ); 
				    }
				    break;
				case 'Product Status':
					//set the value of the cell
					$objPHPExcel->getActiveSheet()->SetCellValue($column.$cell, $reportdetails[$rowCount][$value]);
					//change the data type of the cell
					$objPHPExcel->getActiveSheet()->getCell($column.$cell)->setDataType(PHPExcel_Cell_DataType::TYPE_STRING2);
					///now set the link
					$objPHPExcel->getActiveSheet()->getCell($column.$cell)->getHyperlink()->setUrl(strip_tags($reportdetails[$rowCount][$value]));
					break;

				default:
					$objPHPExcel->getActiveSheet()->setCellValue($column.$cell, $reportdetails[$rowCount][$value] ); 
					break;
			}

		}
			
	    $rowCount++; 
	} 

	$rand = rand(1234, 9898);
	$presentDate = date('YmdHis');
	$fileName = "TWG_" . $rand . "_" . $presentDate . ".xlsx";

	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment;filename="'.$fileName.'"');
	header('Cache-Control: max-age=0');

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save('php://output');
    die();
}

/**
* Create excel by from ajax request
*/
function xlscreation_ajax() {

	$reportdetails = report_details();

	require_once SITEPATH . 'PHPExcel/Classes/PHPExcel.php';

 	$objPHPExcel = new PHPExcel(); 
	$objPHPExcel->getProperties()
			->setCreator("user")
    		->setLastModifiedBy("user")
			->setTitle("Office 2007 XLSX Test Document")
			->setSubject("Office 2007 XLSX Test Document")
			->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
			->setKeywords("office 2007 openxml php")
			->setCategory("Test result file");

	// Set the active Excel worksheet to sheet 0
	$objPHPExcel->setActiveSheetIndex(0); 

	// Initialise the Excel row number
	$rowCount = 0; 

	// Sheet cells
	$cell_definition = array(
		'A' => 'Product Image',
		'B' => 'Product SKU',
		'C' => 'Product WP',
		'D' => 'Product Status'
	);

	// Build headers
	foreach( $cell_definition as $column => $value )
	{
		$objPHPExcel->getActiveSheet()->getColumnDimension("{$column}")->setAutoSize(true);
		$objPHPExcel->getActiveSheet()->setCellValue( "{$column}1", $value ); 
	}

	// Build cells
	while( $rowCount < count($reportdetails) ){ 
		$cell = $rowCount + 2;
		foreach( $cell_definition as $column => $value ) {

			$objPHPExcel->getActiveSheet()->getRowDimension($rowCount + 2)->setRowHeight(75); 
			
			switch ($value) {
				case 'Product Image':
					if (file_exists($reportdetails[$rowCount][$value])) {
				        $objDrawing = new PHPExcel_Worksheet_Drawing();
				        $objDrawing->setName('TWG Handicraft');
				        $objDrawing->setDescription('TWG Handicraft');
				        //Path to signature .jpg file
				        $signature = $reportdetails[$rowCount][$value];    
				        $objDrawing->setPath($signature);
				        $objDrawing->setOffsetX(25);                     //setOffsetX works properly
				        $objDrawing->setOffsetY(10);                     //setOffsetY works properly
				        $objDrawing->setCoordinates($column.$cell);             //set image to cell 
				        $objDrawing->setWidth(75);  
				        $objDrawing->setHeight(75);                     //signature height  
				        $objDrawing->setWorksheet($objPHPExcel->getActiveSheet());  //save 
				    } else {
				    	$objPHPExcel->getActiveSheet()->setCellValue($column.$cell, "Image not found" ); 
				    }
				    break;
				case 'Product Status':
					//set the value of the cell
					$objPHPExcel->getActiveSheet()->SetCellValue($column.$cell, $reportdetails[$rowCount][$value]);
					//change the data type of the cell
					$objPHPExcel->getActiveSheet()->getCell($column.$cell)->setDataType(PHPExcel_Cell_DataType::TYPE_STRING2);
					///now set the link
					$objPHPExcel->getActiveSheet()->getCell($column.$cell)->getHyperlink()->setUrl(strip_tags($reportdetails[$rowCount][$value]));
					break;

				default:
					$objPHPExcel->getActiveSheet()->setCellValue($column.$cell, $reportdetails[$rowCount][$value] ); 
					break;
			}

		}
			
	    $rowCount++; 
	} 

	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$saveExcelToLocalFile = saveExcelToLocalFile($objWriter);
	$response = array(
	     'success' => true,
	     'filename' => $saveExcelToLocalFile['filename'],
	     'url' => $saveExcelToLocalFile['filePath']
 	);
	echo json_encode($response);
    die();
}

function saveExcelToLocalFile($objWriter) {

	$rand = rand(1234, 9898);
	$presentDate = date('YmdHis');
	$fileName = "TWG_" . $rand . "_" . $presentDate . ".xlsx";

    // make sure you have permission to write to directory
    $filePath = SITEPATH . 'reports/' . $fileName;
    $objWriter->save($filePath);
    $data = array(
    	'filename' => $fileName,
    	'filePath' => $filePath
	);
    return $data;

}

?>