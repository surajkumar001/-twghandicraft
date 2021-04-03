<?php
class Load_model extends CI_Model
{
 function kirim_data($limit, $start)
 {

  $this->db->select("*");
  $this->db->from("product_detail");
  $this->db->order_by("id", "DESC");
  $this->db->limit($limit, $start);
  $query = $this->db->get();
  return $query;
 }
 
 
 
 	//  ========++Filter New =============
	
	public function filterpcatproNew($where,$id,$min,$max,$occ,$size,$material,$resc,$flag){

		$this->db->select('*');
        $this->db->from('product_detail');
        $this->db->where('id',$id);
        	$this->db->where('status',1);
	
        if(!empty($min && $max)){
		$this->db->where('selling_price>=',$min);
		$this->db->where('selling_price<=',$max);
		}
		if(!empty($occ)){
		$this->db->like('occasion', $occ, 'both'); 
			}
			if(!empty($size)){
		$this->db->like('size', $size, 'both'); 
			}
		if(!empty($material)){
		$this->db->like('material', $material, 'both'); 
			}
				if(!empty($resc)){
		$this->db->like('recipient', $resc, 'both'); 
			}	
			
		if(!empty($flag)){
		$this->db->where('flag', $flag, 'both'); 
			}
			else{
			    
			     $this->db->where('parent_cat',$where);
			    
			}	
			
       
 		$this->db->order_by('selling_price','asc');		

        	$query = $this->db->get();
		$result = $query->result_array();

		 return $result;

	}
	
	//=====================
	
			public function categoryfilter($min,$max,$id,$size,$material,$resc){
 
		$this->db->select('*');
        $this->db->from('product_detail');
        
       	$this->db->where('status',1);
       	
 	   $where='(category_id LIKE "%'.$id.'%")';
       

      	      $this->db->where($where);
      	   
        if(!empty($min && $max)){
		$this->db->where('selling_price>=',$min);
		$this->db->where('selling_price<=',$max);
		}

			if(!empty($size)){
		$this->db->like('size', $size, 'both'); 
			}
			
	
			
        $query = $this->db->get();
		$result = $query->result_array();

		 return $result;

	}



// =========================================================================


	public function filtercat($min,$max,$id,$size,$material,$resc,$color){
	    
 	
	$query = "SELECT * FROM product_detail WHERE  status = 1  AND category_id LIKE '%".$id."%'" ;
	

	if(isset($min,$max) && !empty($min)&& !empty($max)){
	    
	    $query .= "AND selling_price BETWEEN '".$min."'AND'".$max."' " ;
	    
	    
	    
	}
	
		if(isset($material) ){
		    $m= 0 ;
		   foreach($material as $material_filter){
	    if($m==0){
	      
	         $query .= "AND material LIKE '%".$material_filter."%'  " ;
	
	    }else{
	        
	     
	         $query .= "OR (status = 1  AND category_id LIKE '%".$id."%' AND material LIKE '%".$material_filter."%' )" ;
	
	    }
	   	  
		  $m++; }
	    
	    
	}
		
		if(isset($size) ){
		    	$size_filter=implode(",",$size);
		    	
		    if($size[0] && $size[1] && $size[2]){ 
	   $query .= "AND (size_filter IN ('".$size[0]."') OR size_filter IN ('".$size[1]."')  OR size_filter IN ('".$size[2]."') )" ;
		    }elseif($size[0] && $size[1] ){
		        
		     	   $query .= "AND (size_filter IN ('".$size[0]."') OR size_filter IN ('".$size[1]."')   )" ;
   
		    }elseif($size[0]){
		        
		        	   $query .= "AND size_filter IN ('".$size[0]."')" ;

		    }
	  
	    
	}
		
		if(isset($color) ){
		  //  	$color_filter=implode(",",$color);
		    
	   if($color[0] && $color[1] && $color[2]&& $color[3]&& $color[4]){ 
  $query .= "AND (color LIKE '%".$color[0]."%' OR color LIKE '%".$color[1]."%' OR color LIKE '%".$color[2]."%' OR color LIKE '%".$color[3]."%' OR color LIKE '%".$color[4]."%' )" ;
	
	   		    }elseif($color[0] && $color[1] && $color[2]&& $color[3]){ 
  $query .= "AND (color LIKE '%".$color[0]."%' OR color LIKE '%".$color[1]."%' OR color LIKE '%".$color[2]."%' OR color LIKE '%".$color[3]."%' )" ;
	
	   		    }elseif($color[0] && $color[1] && $color[2]){ 
	   $query .= "AND (color LIKE '%".$color[0]."%' OR color LIKE '%".$color[1]."%' OR color LIKE '%".$color[2]."%' )" ;
		    }elseif($color[0] && $color[1] ){
		        
		     	   $query .= "AND (color LIKE '%".$color[0]."%' OR color LIKE '%".$color[1]."%' )" ;
   
		    }elseif($color[0]){
		        
		        	   $query .= "AND color LIKE '%".$color[0]."%'" ;
		    }
	}
	if(isset($resc) ){
		  //  	$color_filter=implode(",",$color);
		    
	   if($resc[0] && $resc[1] && $resc[2]&& $resc[3]&& $resc[4]){ 
  $query .= "AND (color other '%".$resc[0]."%' OR other LIKE '%".$resc[1]."%' OR other LIKE '%".$resc[2]."%' OR other LIKE '%".$resc[3]."%' OR other LIKE '%".$resc[4]."%' )" ;
	
	   		    }elseif($resc[0] && $resc[1] && $resc[2]&& $resc[3]){ 
  $query .= "AND (other LIKE '%".$resc[0]."%' OR other LIKE '%".$resc[1]."%' OR other LIKE '%".$resc[2]."%' OR other LIKE '%".$resc[3]."%' )" ;
	
	   		    }elseif($resc[0] && $resc[1] && $resc[2]){ 
	   $query .= "AND (other LIKE '%".$resc[0]."%' OR other LIKE '%".$resc[1]."%' OR other LIKE '%".$resc[2]."%' )" ;
		    }elseif($resc[0] && $resc[1] ){
		        
		     	   $query .= "AND (other LIKE '%".$resc[0]."%' OR other LIKE '%".$resc[1]."%' )" ;
   
		    }elseif($resc[0]){
		        
		        	   $query .= "AND other LIKE '%".$resc[0]."%'" ;
		    }
	}
	


// 	echo $query ; 
// 	exit ; 

	$data = $this->db->query($query) ; 
	
		$result = $data->result_array();
			  $sql = $this->db->last_query();
		
		return $result;
	
	
	}

	
// 	=============================
		public function flagcategory($min,$max,$id,$size,$material,$resc,$limit,$start){
 	
	$query = "SELECT * FROM product_detail WHERE  status = 1  AND flag LIKE '%".$id."%'" ;
	
	if(isset($min,$max) && !empty($min)&& !empty($max)){
	    
	    $query .= "AND selling_price BETWEEN '".$min."'AND'".$max."' " ;
	    
	}
	
		if(isset($material) ){
		    $m= 0 ;
		   foreach($material as $material_filter){
	    if($m==0){
	      
	         $query .= "AND material LIKE '%".$material_filter."%'  " ;
	
	    }else{
	        
	     
	         $query .= "OR (status = 1  AND flag LIKE '%".$id."%' AND material LIKE '%".$material_filter."%' )" ;
	
	    }
	   	  
		  $m++; }
	    
	    
	}
		
		if(isset($size) ){
		    	$size_filter=implode(",",$size);
		    	
		    if($size[0] && $size[1] && $size[2]){ 
	   $query .= "AND (size_filter IN ('".$size[0]."') OR size_filter IN ('".$size[1]."')  OR size_filter IN ('".$size[2]."') )" ;
		    }elseif($size[0] && $size[1] ){
		        
		     	   $query .= "AND (size_filter IN ('".$size[0]."') OR size_filter IN ('".$size[1]."')   )" ;
   
		    }elseif($size[0]){
		        
		        	   $query .= "AND size_filter IN ('".$size[0]."')" ;

		    }
	  
	    
	}
		
		if(isset($color) ){
		    	$color_filter=implode(",",$color);
		    
	   $query .= "AND color IN ('".$color_filter."') " ;
	   
	   
	    
	}
	if($limit){
	   $query .= " LIMIT ".$limit." offset  ".$start."" ;
	}
		
	
// 	echo $query ; 
// 	exit ; 

	$data = $this->db->query($query) ; 
	
		$result = $data->result_array();
			  $sql = $this->db->last_query();
		
		return $result;
	
	
	
	}
	
	//=====================
	
		public function filtermodelsub($min,$max,$id,$size,$material,$resc,$color){
		
	
 	
	$query = "SELECT * FROM product_detail WHERE  status = 1  AND sub_catid LIKE '%".$id."%'" ;
	
	if(isset($min,$max) && !empty($min)&& !empty($max)){
	    
	    $query .= "AND selling_price BETWEEN '".$min."'AND'".$max."' " ;
	    
	}
	
		if(isset($material) ){
		    $m= 0 ;
		   foreach($material as $material_filter){
	    if($m==0){
	      
	         $query .= "AND material LIKE '%".$material_filter."%'  " ;
	
	    }else{
	        
	     
	         $query .= "OR (status = 1  AND sub_catid LIKE '%".$id."%' AND material LIKE '%".$material_filter."%' )" ;
	
	    }
	   	  
		  $m++; }
	    
	    
	}
		
		if(isset($size) ){
		    	$size_filter=implode(",",$size);
		    	
		    if($size[0] && $size[1] && $size[2]){ 
	   $query .= "AND (size_filter IN ('".$size[0]."') OR size_filter IN ('".$size[1]."')  OR size_filter IN ('".$size[2]."') )" ;
		    }elseif($size[0] && $size[1] ){
		        
		     	   $query .= "AND (size_filter IN ('".$size[0]."') OR size_filter IN ('".$size[1]."')   )" ;
   
		    }elseif($size[0]){
		        
		        	   $query .= "AND size_filter IN ('".$size[0]."')" ;

		    }
	  
	    
	}
		
		if(isset($color) ){
		  //  	$color_filter=implode(",",$color);
		    
	   if($color[0] && $color[1] && $color[2]&& $color[3]){ 
  $query .= "AND (color LIKE '%".$color[0]."%' OR color LIKE '%".$color[1]."%' OR color LIKE '%".$color[2]."%' OR color LIKE '%".$color[3]."%' )" ;
	
	   		    }elseif($color[0] && $color[1] && $color[2]){ 
	   $query .= "AND (color LIKE '%".$color[0]."%' OR color LIKE '%".$color[1]."%' OR color LIKE '%".$color[2]."%' )" ;
		    }elseif($color[0] && $color[1] ){
		        
		     	   $query .= "AND (color LIKE '%".$color[0]."%' OR color LIKE '%".$color[1]."%' )" ;
   
		    }elseif($color[0]){
		        
		        	   $query .= "AND color LIKE '%".$color[0]."%'" ;
		    }
	}
	
	
	if(isset($resc) ){
		    
	   if($resc[0] && $resc[1] && $resc[2]&& $resc[3]&& $resc[4]){ 
  $query .= "AND (other IN ('".$resc[0]."') OR other IN ('".$resc[1]."')  OR other IN ('".$resc[2]."') OR other IN ('".$resc[3]."') OR other IN ('".$resc[4]."') )" ;
	
	   		    }elseif($resc[0] && $resc[1] && $resc[2]&& $resc[3]){ 
  $query .= "AND (other IN ('".$resc[0]."') OR other IN ('".$resc[1]."')  OR other IN ('".$resc[2]."') OR other IN ('".$resc[3]."') )" ;
	
	   		    }elseif($resc[0] && $resc[1] && $resc[2]){ 
	   $query .= "AND (other IN ('".$resc[0]."') OR other IN ('".$resc[1]."')  OR other IN ('".$resc[2]."') )" ;
		    }elseif($resc[0] && $resc[1] ){
		        
		     	   $query .= "AND (other IN ('".$resc[0]."') OR other IN ('".$resc[1]."')   )" ;
   
		    }elseif($resc[0]){
		        
		        	   $query .= "AND other IN ('".$resc[0]."')" ;

		    }
	  	}
	
	
// 	echo $query ; 
// 	exit ; 

	$data = $this->db->query($query) ;
	
	
	
	
		$result = $data->result_array();
		
	
			  $sql = $this->db->last_query();
		
		return $result;
	
	
	
	}


	public function search($name, $min,$max,$size,$material,$resc){
	    
	    	$par_category = $this->db->get_where('parent_category', array('name' => $name))->row() ;
	$category = $this->db->get_where('category', array('name' => $name))->row() ;
	$subcategory = $this->db->get_where('sub_category', array('subcategory_name' => $name))->row() ;
        if($subcategory){
           $subcat =  $subcategory->id ;
        }else{
            $subcat = 'null' ; 
        }

			$this->db->select('*');
// 			$this->db->from('product_detail');
      	   $where='(pro_name LIKE "%'.$name.'%" or meta_keyword LIKE  "'.$name.'%" or sku_code LIKE  "'.$name.'%"or sub_catid LIKE  "'.$subcat.'%")';
       

      	      $this->db->where($where);
      	      
      	     // ===============
      	     
      	     	if(!empty($min && $max)){
		$this->db->where('selling_price>=',$min);
		$this->db->where('selling_price<=',$max);
		}
		$this->db->like('sub_catid',$id);

			if(!empty($size)){
		$this->db->like('size', $size, 'both'); 
			}
			if(!empty($material)){
		$this->db->like('material', $material, 'both'); 
			}
			if(!empty($resc)){
		$this->db->like('recipient', $resc, 'both'); 
			}		
 		$this->db->from('product_detail');		
 		$this->db->order_by('selling_price','asc');		


// =============================
    	    $query = $this->db->get();
		$result = $query->result_array();
	
		return $result;				
	}

// =========================
	
	
}
?>