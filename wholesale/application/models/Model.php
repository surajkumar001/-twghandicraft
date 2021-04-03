	<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model extends CI_Model{
				
	public function user_log($data,$table)
			{
				$ads = array();
				$this->db->select('*');
				$this->db->where('email',$data['name']);
				$this->db->where(array('password'=>$data['pass'] ,'valid' => '1'));
				$fetch_query= $this->db->get($table);

				$query=$fetch_query->result();
				
				
					if(empty($query)){
				    
				$this->db->select('*');
				$this->db->where('phone',$data['name']);
		
				$this->db->where(array('password'=>$data['pass'] ,'valid' => '1'));
				$fetch_query2= $this->db->get($table);

				
				//========================

				$query2=$fetch_query2->result();
				
								foreach ($query2 as $row2)
				 {
					$ads = $row2;
				 }
				 	return $ads;
				
				}else{
				
				foreach ($query as $row)
				 {
					$ads = $row;
				 }
				return $ads;
				}
			}
	public function insert_common($table,$data){

		$this->db->insert($table,$data);
	
	}
  	public function update_common($data,$table,$where,$id){

 		$this->db->where($where,$id);

 		$this->db->update($table,$data);

 	}
 	public function delete_common($table,$where,$id){

 		$this->db->where($where,$id);

 		$this->db->delete($table);

 	}
 	public function select_common($table){

		$this->db->select('*');

 		$this->db->from($table);	

 		//$this->db->order_by("Position", "asc");
		$query = $this->db->get();

		$result = $query->result_array();

		return $result;

	}
	
	public function desc_common($table){

		$this->db->select('*');

 		$this->db->from($table);	

 		$this->db->order_by("id", "desc");
		$query = $this->db->get();

		$result = $query->result_array();

		return $result;

	}
	public function select_common_where($table,$where,$id){

		$this->db->select('*');
		$this->db->where($where,$id);

 		$this->db->from($table);		
 		//$this->db->order_by("Position", "asc");
		$query = $this->db->get();

		$result = $query->result_array();

		return $result;

	}
	
	
	
		public function select_like_where($table,$where,$id){

		$this->db->select('*');
		$this->db->like($where,$id);

 		$this->db->from($table);		
 		//$this->db->order_by("Position", "asc");
		$query = $this->db->get();

		$result = $query->result_array();

		return $result;

	}
	
	
		public function select_order_where($table,$where,$id){

		$this->db->select('*');
		$this->db->where($where,$id);

 		$this->db->from($table);		
 		$this->db->order_by("id", "desc");
		$query = $this->db->get();

		$result = $query->result_array();

		return $result;

	}
	
	
	public function select_common_nav($table,$where,$id){

		$this->db->select('*');
		$this->db->where($where,$id);

 		$this->db->from($table);		
 		$this->db->order_by("Position", "asc");
		$query = $this->db->get();

		$result = $query->result_array();

		return $result;

	}
	public function validotp($mob,$otp){

		$this->db->select('*');
		$this->db->where('phone',$mob);
		$this->db->where('otp',$otp);

 		$this->db->from('customerlogin');		

		$query = $this->db->get();

		$result = $query->row();

		return $result;

	}
	public function validotpemail($mob,$otp){

		$this->db->select('*');
		$this->db->where('email',$mob);
		$this->db->where('otp',$otp);

 		$this->db->from('customerlogin');		

		$query = $this->db->get();

		$result = $query->row();

		return $result;

	}
	public function discountslab($id){

		$this->db->select('*');
		$this->db->where('disc_code',$id);

 		$this->db->from('discountslab');		
 		$this->db->order_by('discount','asc');		

		$query = $this->db->get();

		$result = $query->result_array();

		return $result;

	}
 	
 	public function wishlist($userid,$pid){

		$this->db->select('*');
		$this->db->where('user_id',$userid);
		$this->db->where('product_id',$pid);

 		$this->db->from('wishlist');				

		$query = $this->db->get();

		$result = $query->result_array();

		return $result;

	}
 	public function delwishlist($user_id,$id){

 		$this->db->where('user_id',$user_id);
 		$this->db->where('product_id',$id);

 		$this->db->delete('wishlist');


 	}

 		public function product(){

		$this->db->select('*');
		
			$this->db->where('availability<=',20);
			$this->db->where('availability!=',0);
 		$this->db->from('product_detail');		

		$query = $this->db->get();

		$result = $query->result_array();
 $sql = $this->db->last_query();

		return $result;

	}
		public function varient(){

		$this->db->select('*');
		
		$this->db->where('availability<=',20);
			$this->db->where('availability!=',0);


 		$this->db->from('product');		

		$query = $this->db->get();

		$result = $query->result_array();

		return $result;

	}
		public function productcsv(){

 		$this->db->select('sku_code,pro_name,min_order_quan,availability');		
		$this->db->from('product_detail');
	
		$query = $this->db->get();

		$result = $query->result_array();
		//pr($result);die;
		return $result;

	}

	public function productvarcsv(){

 		$this->db->select('sku_code,pro_name,min_order_quan,availability');		
		$this->db->from('product');
	
		$query = $this->db->get();

		$result = $query->result_array();
		//pr($result);die;
		return $result;

	}

	public function productpricecsv(){

 		$this->db->select('sku_code,pro_name,selling_price,price');		
 		
		$this->db->from('product_detail');
	
		$query = $this->db->get();

		$result = $query->result_array();
		//pr($result);die;
		return $result;

	}

	public function productpricevarcsv(){

 		$this->db->select('sku_code,pro_name,selling_price,price');		
		$this->db->from('product');
	
		$query = $this->db->get();

		$result = $query->result_array();
		//pr($result);die;
		return $result;

	}


	public function lowvarcsv(){

 		$this->db->select('sku_code,pro_name,min_order_quan,availability');		
	
		
			$this->db->where('availability<=',20);
			$this->db->where('availability!=',0);
 		$this->db->from('product');		

		$query = $this->db->get();

		$result = $query->result_array();
 $sql = $this->db->last_query();

		return $result;

	}
		public function lowcsv(){

 		$this->db->select('sku_code,pro_name,min_order_quan,availability');		
	
		
			$this->db->where('availability<=',20);
			$this->db->where('availability!=',0);
 		$this->db->from('product_detail');		

		$query = $this->db->get();

		$result = $query->result_array();
 $sql = $this->db->last_query();

		return $result;

	}
	public function outvarcsv(){

 		$this->db->select('sku_code,pro_name,min_order_quan,availability');			
		$this->db->where('availability','0');
 		$this->db->from('product');		
		$query = $this->db->get();
		$result = $query->result_array();
		$sql = $this->db->last_query();
		return $result;

	}
	public function outcsv(){

 		$this->db->select('sku_code,pro_name,min_order_quan,availability');		
		$this->db->where('availability','0');
 		$this->db->from('product_detail');		
		$query = $this->db->get();
		$result = $query->result_array();
 		$sql = $this->db->last_query();
		return $result;

	}
	public function searchproduct($id){


		$query=$this->db->query("select  pro_name from product  where pro_name  regexp '(^| )".$id."( |$)'");
   		 return $query->result_array();

	}

	public function giftprice($id){

		$this->db->select('*');
		
		$this->db->where('selling_price<=',$id);


 		$this->db->from('product_detail');		

		$query = $this->db->get();

		$result = $query->result_array();

		return $result;

	}
public function giftpriceabove($id){

		$this->db->select('*');
		
		$this->db->where('selling_price>=',$id);


 		$this->db->from('product_detail');		

		$query = $this->db->get();

		$result = $query->result_array();

		return $result;

	}

	public function review($uid,$pid){

		$this->db->select('*');
		$this->db->where('user_id',$uid);
		$this->db->where('product_id',$pid);

 		$this->db->from('user_review');		

		$query = $this->db->get();

		$result = $query->result_array();

		return $result;

	}
	
	public function rate($id){

		$this->db->select('sum(rating)as rates,count(product_id) as total');
        $this->db->from('user_review');
        $this->db->where('product_id',$id);
        	$query = $this->db->get();
		$result = $query->result_array();
		 return $result;

	}
	public function search($name){
	    
	    	$par_category = $this->db->get_where('parent_category', array('name' => $name))->row() ;
	$category = $this->db->get_where('category', array('name' => $name))->row() ;
	$subcategory = $this->db->get_where('sub_category', array('subcategory_name' => $name))->row() ;
        if($subcategory){
           $subcat =  $subcategory->id ;
        }else{
            $subcat = 'null' ; 
        }

			$this->db->select('*');
			$this->db->from('product_detail');
      	   $where='(pro_name LIKE "%'.$name.'%" or meta_keyword LIKE  "'.$name.'%" or sku_code LIKE  "'.$name.'%"or sub_catid LIKE  "'.$subcat.'%")';
       

      	      $this->db->where($where);
    	    $query = $this->db->get();
		$result = $query->result_array();
	
		return $result;				
	}
	
	
		public function search_new($name){

			$this->db->select('*');
			$this->db->from('parent_category');
      	   $where='(name LIKE "'.$name.'%")';
       

      	      $this->db->where($where);
    	    $query = $this->db->get();
		$result = $query->result_array();
	
		return $result;				
	}
		public function search_category($name){

			$this->db->select('*');
			$this->db->from('category');
      	   $where='(name LIKE "%'.$name.'%")';
       
   $this->db->where('Status' , 1);
	       	      $this->db->where($where);
    	    $query = $this->db->get();
		$result = $query->result_array();
	
		return $result;				
	}
	public function search_subcategory($name){

			$this->db->select('*');
			$this->db->from('sub_category');
      	   $where='(subcategory_name LIKE "%'.$name.'%")';
       

      	      $this->db->where($where);
    	    $query = $this->db->get();
		$result = $query->result_array();
	
		return $result;				
	}
		public function search_occasion($name){

			$this->db->select('*');
			$this->db->from('occasion');
      	   $where='(name LIKE "%'.$name.'%")';
       

      	      $this->db->where($where);
    	    $query = $this->db->get();
		$result = $query->result_array();
	
		return $result;				
	}
	
	
	public function searchvideo($id){

			$this->db->select('*');
			$this->db->from('videos');
      	   $where='(name LIKE "%'.$id.'%")';
      	      $this->db->where($where);
    	    $query = $this->db->get();
		$result = $query->result_array();
	
		return $result;				
	}
	public function searchBrouchers($id){

			$this->db->select('*');
			$this->db->from('Brouchers');
      	   $where='(Broucher LIKE "%'.$id.'%")';
      	      $this->db->where($where);
    	    $query = $this->db->get();
		$result = $query->result_array();
	
		return $result;				
	}

	public function catpro($where,$id){

		$this->db->select('*');
        $this->db->from('product_detail');
        $this->db->where('id',$id);
        $this->db->where('category_id',$where);
        	$query = $this->db->get();
		$result = $query->result_array();
		 return $result;

	}

	public function filtermodel($min,$max,$id,$occ,$size,$material,$resc,$color){
	    
 	
	$query = "SELECT * FROM product_detail WHERE  status = 1 " ;
	

	if(isset($min,$max) && !empty($min)&& !empty($max)){
	    
	    $query .= "AND selling_price BETWEEN '".$min."'AND'".$max."' " ;
	    
	    
	    
	}
		if(isset($size) ){
		    
		    $size_filter  = implode("','",$size);
	    
	    $query .= "AND size_filter IN ('".$size_filter."') " ;
	    
	    
	    
	}
		
		if(isset($material) ){
		    
		    $material_filter  = implode("','",$material);
	    
	    $query .= "AND material IN ('".$material_filter."') " ;
	    
	    
	    
	}
		if(isset($color) ){
		    
		    $color_filter  = implode("','",$color);
	    
	    $query .= "AND color IN ('".$color_filter."') " ;
	    
	    
	    
	}
	
	

	$data = $this->db->query($query) ; 
	
		$result = $data->result_array();
			  $sql = $this->db->last_query();
		
		return $result;
	
	
	}
	
	

	
	
	public function filtermodelnewarrival($min,$max,$id,$occ,$size,$material,$resc){
	
		 $expire    =    date('Y-m-d', strtotime("-30 days"));  
	
		$this->db->select('*');
		if(!empty($min && $max)){
		$this->db->where('selling_price>=',$min);
		$this->db->where('selling_price<=',$max);
		}
// 		$this->db->where('date >' ,$expire );
		$this->db->where('new_arrivel' , 1 );
		if(!empty($occ)){
		$this->db->like('occasion', $occ, 'both'); 
			}
			if(!empty($size)){
		$this->db->like('size_filter', $size, 'both'); 
			}
			if(!empty($material)){
		$this->db->like('material', $material, 'both'); 
			}
			if(!empty($resc)){
		$this->db->like('recipient', $resc, 'both'); 
			}		
 		$this->db->from('product_detail');		
 		$this->db->order_by('selling_price','asc');		


		$query = $this->db->get();

		$result = $query->result_array();
			  $sql = $this->db->last_query();
		
		return $result;

	}

	public function filtermodelsub($min,$max,$id,$occ,$size,$material,$resc){
		
		$this->db->select('*');
		if(!empty($min && $max)){
		$this->db->where('selling_price>=',$min);
		$this->db->where('selling_price<=',$max);
		}
		$this->db->like('sub_catid',$id);
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
 		$this->db->from('product_detail');		
 		$this->db->order_by('selling_price','asc');		


		$query = $this->db->get();

		$result = $query->result_array();
			  $sql = $this->db->last_query();
		
		return $result;

	}


	public function withoutcatfiltermodel($min,$max,$occ,$size,$material,$resc){

		$this->db->select('*');
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
 		$this->db->from('product_detail');		
 		$this->db->order_by('selling_price','asc');		


		$query = $this->db->get();

		$result = $query->result_array();

		return $result;

	}
	
	//=============flag  Filter =========
	
		public function flagfilter($min,$max,$occ,$size,$material,$resc ,$flag){



$arr = explode(",",$occ);

		$this->db->select('*');
		if(!empty($min && $max)){
		$this->db->where('selling_price>=',$min);
		$this->db->where('selling_price<=',$max);
		}
		if(!empty($arr)){
		    foreach($arr as $oc ){
		        
		$this->db->like('occasion', $oc, 'both'); 
		    }
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
			
		$this->db->where('flag' , $flag);
 		$this->db->from('product_detail');		
//  		$this->db->order_by('selling_price','asc');	
 		
    	$this->db->order_by('home_deals_position','asc');		


		$query = $this->db->get();

		$result = $query->result_array();

		return $result;

	}
	//================
	
		public function withoutcatandfiltermodel(){

		$this->db->select('*');
		
 		$this->db->from('product_detail');		
 		$this->db->order_by('Position','asc');		


		$query = $this->db->get();

		$result = $query->result_array();

		return $result;

	}
	
	//==============flag filter no data ======
		public function flagfilternodata($flag){

		$this->db->select('*');
		
 		$this->db->from('product_detail');		
 		$this->db->order_by('Position','asc');	
 		
       	$this->db->where('flag' , $flag);

		$query = $this->db->get();

		$result = $query->result_array();

		return $result;

	}
	//==========================
	
	public function filtermodelgift($min,$max,$id,$occ,$size,$material,$resc){

		$this->db->select('*');
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
		$this->db->where('cat_id',$id);

 		$this->db->from('giftproduct');		
 		$this->db->order_by('selling_price','asc');		

		$query = $this->db->get();

		$result = $query->result_array();

		return $result;

	}
	
		public function withoutfiltermodel($id){
  
		$this->db->select('*');
		
		$this->db->like('category_id',$id);

 		$this->db->from('product_detail');		
 		$this->db->order_by('Position','asc');		


		$query = $this->db->get();

		$result = $query->result_array();

		return $result;

	}
	public function withoutfiltermodelsub($id){
  
		$this->db->select('*');
		
		$this->db->like('sub_catid',$id);

 		$this->db->from('product_detail');		
 		$this->db->order_by('Position','asc');		


		$query = $this->db->get();

		$result = $query->result_array();

		return $result;

	}
	public function searchfilter($min,$max,$occ,$size,$material,$resc,$search){
		
		$this->db->select('*');
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


		   $where='(pro_name LIKE "%'.$search.'%" or meta_keyword LIKE  "%'.$search.'%")';
       

      	      $this->db->where($where);
 		$this->db->from('product_detail');		
 		$this->db->order_by('selling_price','asc');		


		$query = $this->db->get();

		$result = $query->result_array();
			  $sql = $this->db->last_query();
		
		return $result;

	}
		public function withoutsearch($search){

			$this->db->select('*');
			$this->db->from('product_detail');
      	   $where='(pro_name LIKE "%'.$search.'%" or meta_keyword LIKE  "%'.$search.'%")';
       

      	      $this->db->where($where);
    	    $query = $this->db->get();
		$result = $query->result_array();
	
		return $result;				
	}
	public function withoutfiltermodelgift($id){

		$this->db->select('*');
		$this->db->where('cat_id',$id);

 		$this->db->from('giftproduct');		
 		$this->db->order_by('selling_price','asc');		

		$query = $this->db->get();

		$result = $query->result_array();

		return $result;

	}
	public function filtercatpro($where,$id,$min,$max,$occ,$size,$material,$resc){

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
        $this->db->where('category_id',$where);
 		$this->db->order_by('selling_price','asc');		

        	$query = $this->db->get();
		$result = $query->result_array();
		 return $result;

	}

		public function filterpcatpro($where,$id,$min,$max,$occ,$size,$material,$resc){

		$this->db->select('*');
        $this->db->from('product_detail');
        $this->db->where('id',$id);
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
        $this->db->where('parent_cat',$where);
 		$this->db->order_by('selling_price','asc');		

        	$query = $this->db->get();
		$result = $query->result_array();

		 return $result;

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
	
	
	
		public function filterproduct($min,$max,$occ,$resc){
		
		$this->db->select('*');
		
		$this->db->where('selling_price>=',$min);
		$this->db->where('selling_price<=',$max);
		$this->db->where('status',1);
	
		$this->db->like('occasion', $occ, 'both'); 

// 		$this->db->like('recipient', $resc, 'both'); 
	 
 		$this->db->from('product_detail');		
 		$this->db->order_by('selling_price','asc');		


		$query = $this->db->get();

		$result = $query->result_array();
			  $sql = $this->db->last_query();
		
		return $result;

	}

	public function filterproductlowtohigh($occ,$resc){
		
		$this->db->select('*');
        	$this->db->where('status',1);
	
		$this->db->like('occasion', $occ, 'both'); 

// 		$this->db->like('recipient', $resc, 'both'); 
	 
 		$this->db->from('product_detail');		
 		$this->db->order_by('selling_price','asc');		


		$query = $this->db->get();

		$result = $query->result_array();
			  $sql = $this->db->last_query();
		
		return $result;

	}
	public function filterproducthightolow($occ,$resc){
		
		$this->db->select('*');

		$this->db->like('occasion', $occ, 'both'); 

// 		$this->db->like('recipient', $resc, 'both'); 
	 
 		$this->db->from('product_detail');		
 		$this->db->order_by('selling_price','desc');		


		$query = $this->db->get();

		$result = $query->result_array();
			  $sql = $this->db->last_query();
		
		return $result;

	}
	
	
	function category_list($id){
	    
	 
	    $this->db->select('*');
        $this->db->where('parent_id' , $id);
            $this->db->where('status' , 1);
 
	    $this->db->from('category');
    	$this->db->order_by("Position","ASC");
    	$query = $this->db->get();
    	
    	
    return $query->result_array(); 
}
	function subcategory_list($id){
	    
	 
	    $this->db->select('*');
        $this->db->where('cat_id' , $id);
	    $this->db->where('Status' , 1);
	    $this->db->from('sub_category');
    	$this->db->order_by("Position","ASC");
    	$query = $this->db->get();
    	
    	
    return $query->result_array(); 
}



public function num_rows_productlist()
	{
		$this->db->select('*');
		$this->db->from('product_detail');
	
		$query=$this->db->get();
		//echo $this->db->last_query();die;
		return $query->num_rows();

	}
	
	
	public function productlist($offset,$limit)
	{
		$this->db->select('*');
		$this->db->from('product_detail');
		$this->db->limit($offset,$limit);		
	
		$query=$this->db->get();

		//echo $this->db->last_query();die;
		return $query->result_array();

	}

}
