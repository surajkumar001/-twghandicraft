<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Adminmodel extends CI_Model{

				

	public function admin_log($data)

			{

				$ads = array();

				$this->db->select('*');
    			$this->db->where('password',$data['pass']);
				$this->db->where('name',$data['name']);
				$this->db->or_where('email',$data['name']);


				$fetch_query= $this->db->get('admin');



				$query=$fetch_query->result();

				foreach ($query as $row)

				 {

					$ads = $row;

				 }

				return $ads;

			}
			
			
	public function team_log($data)

			{

				$ads = array();

				$this->db->select('*');
    			$this->db->where('rm_password',$data['pass']);
				$this->db->where('rm_mobile',$data['name']);
				$this->db->or_where('rm_email',$data['name']);


				$fetch_query= $this->db->get('rm');



				$query=$fetch_query->result();

				foreach ($query as $row)

				 {

					$ads = $row;

				 }

				return $ads;

			}

	public function Totalorder(){




		$this->db->select('o.*,u.*,o.order_status as ostatus');

		$this->db->from('orders as o');

		$this->db->join('customerlogin as u','u.id=o.user_id');
		//$this->db->join('order_detail as od','od.order_rand_id=o.order_id','left');
        
        	$this->db->where(array('o.order_status'=>'Not' , 'o.order_type' => 'orders'));
        		if($_SESSION['session_namee'] != 'admin'){
	      $rm = $_SESSION['session_iid'] ;
		
		$this->db->where('o.Rm_id',$rm);
		}
        	
		$this->db->order_by("o.id","DESC");

		$query = $this->db->get();

		$result = $query->result_array();

		return $result;

    }
    
    public function Allorder(){



		$this->db->select('o.*,u.*,o.order_status as ostatus');

		$this->db->from('orders as o');

		$this->db->join('customerlogin as u','u.id=o.user_id');
		//$this->db->join('order_detail as od','od.order_rand_id=o.order_id','left');
        
        	$this->db->where(array('o.order_type' => 'orders'));
        	
		if($_SESSION['session_namee'] != 'admin'){
	      $rm = $_SESSION['session_iid'] ;
		
		$this->db->where('o.Rm_id',$rm);
		}
		$this->db->order_by("o.id","DESC");

		$query = $this->db->get();

		$result = $query->result_array();

		return $result;

    }
    	public function all_rm_order($rm ,$id ){
     
//=====

		$this->db->select('o.*,u.*,o.order_status as ostatus');

		$this->db->from('orders as o');

		$this->db->join('customerlogin as u','u.id=o.user_id');
		
			 if($id != 'All'){
			 
        $this->db->where(array('o.order_status'=>$id , 'o.order_type' => 'orders' ));
			 }else{
			     
			   $this->db->where(array('o.order_type' => 'orders' ));
	    
			 }
       	
       	 if($rm != 'All'){
            
            $this->db->where(array('o.Rm_id'=>$rm));
            
        }
       	
		$this->db->order_by("o.id","DESC");
		

		$query = $this->db->get();
		$result = $query->result_array();
		
		return $result;

    }
    
    
    
    	public function Totalproduction_order(){



		$this->db->select('o.*,u.*,o.order_status as ostatus');

		$this->db->from('orders as o');

		$this->db->join('customerlogin as u','u.id=o.user_id');
		//$this->db->join('order_detail as od','od.order_rand_id=o.order_id','left');
        
        	$this->db->where(array('o.order_status'=>'Not' , 'o.order_type' => 'production'));
        	
		$this->db->order_by("o.id","DESC");

		$query = $this->db->get();

		$result = $query->result_array();

		return $result;

    }
    
    
public function filterdateorder($first_date,$second_date,$id){


		$this->db->select('o.*,u.*,o.order_status as ostatus');

		$this->db->from('orders as o');

		$this->db->join('customerlogin as u','u.id=o.user_id');
		//$this->db->join('order_detail as od','od.order_rand_id=o.order_id','left');
        
        // 	$this->db->where(array('o.order_status'=>'Not' , 'o.order_type' => 'orders'));
        	
		$this->db->order_by("o.id","DESC");
		 $this->db->where('o.order_Date >=', $first_date);
       $this->db->where('o.order_Date <=', $second_date);
       
       if($id != "All" && $id !=" "){
           
          $this->db->where('o.order_status', $id);
        
       }
      
		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

    }
    
    public function saledetail_date($first_date,$second_date){



		$this->db->select();

		$this->db->from('orders');

		$this->db->order_by("id","DESC");
		 $this->db->where('order_Date >=', $first_date);
       $this->db->where('order_Date <=', $second_date);
      
		$query = $this->db->get();



		$result = $query->result();

		return $result;

    }
        
public function selectdate($first_date,$second_date,$id){



		$this->db->select('o.*,u.*,od.*,o.order_status as ostatus');

		$this->db->from('order_detail as o');

		$this->db->join('customerlogin as u','u.id=o.user_id');
		$this->db->join('orders as od','od.order_id=o.order_rand_id');

		$this->db->order_by("o.order_rand_id","DESC");
		 $this->db->where('od.order_Date >=', $first_date);
       $this->db->where('od.order_Date <=', $second_date);
       if(!empty($id)){
       $this->db->where('o.order_status',$id);
   }
		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

    }
    
    
    

    public function productdesc(){

		$this->db->select('*');

		$this->db->from('product_detail');

		$this->db->order_by("Position","DESC");

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

    }	
  public function Todayorder($date,$id ,$rm){

	
		//==========================
	

		$this->db->select('o.*,u.*,o.order_status as ostatus');
		$this->db->from('orders as o');
		$this->db->join('customerlogin as u','u.id=o.user_id');
		//$this->db->join('order_detail as od','od.order_rand_id=o.order_id','left');
        
       
         if($id != 'All'){
             
       $this->db->where(array('o.order_status'=>$id , 'o.order_type' => 'orders' , 'o.order_Date'=> $date ));
        
			 }else{
			     
			   $this->db->where(array('o.order_type' => 'orders' , 'o.order_Date'=> $date ));
	    
			 }
        
        if($rm != 'All'){
            
            $this->db->where(array('o.Rm_id'=>$rm , ));
            
        }
        	
		$this->db->order_by("o.id","DESC");

		$query = $this->db->get();

		$result = $query->result_array();
	return $result;

    

    }
 public function weekorder($id, $rm ){

		
         $expire    =    date('Y-m-d', strtotime("-7 days"));  
//=====

		$this->db->select('o.*,u.*,o.order_status as ostatus');

		$this->db->from('orders as o');

		$this->db->join('customerlogin as u','u.id=o.user_id');
		
			 if($id != 'All'){
        $this->db->where(array('o.order_status'=>$id , 'o.order_type' => 'orders' ));
			 }else{
			     
			   $this->db->where(array('o.order_type' => 'orders' ));
	    
			 }
			 
        // $this->db->where(array('o.order_status'=>$id , 'o.order_type' => 'orders' ));
       	$this->db->where('o.order_Date >', $expire);	
       	
       	
       	
       	 if($rm != 'All'){
            
            $this->db->where(array('o.Rm_id'=>$rm , ));
            
        }
       	
		$this->db->order_by("o.id","DESC");
		

		$query = $this->db->get();
		$result = $query->result_array();
		
		return $result;

    }	
    public function monthorder($id ,$rm ){
        
        $expire    =    date('Y-m-d', strtotime("-30 days")); 
        
    
//=====

		$this->db->select('o.*,u.*,o.order_status as ostatus');

		$this->db->from('orders as o');

		$this->db->join('customerlogin as u','u.id=o.user_id');
		
		 if($id != 'All'){
        $this->db->where(array('o.order_status'=>$id , 'o.order_type' => 'orders' ));
			 }else{
			     
			   $this->db->where(array('o.order_type' => 'orders' ));
	    
			 }
		
        // $this->db->where(array('o.order_status'=>$id , 'o.order_type' => 'orders' ));
        
        	$this->db->where('o.order_Date >', $expire);	
       	
       	
       	 if($rm != 'All'){
            
            $this->db->where(array('o.Rm_id'=>$rm ));
            
        }  
        
		$this->db->order_by("o.id","DESC");

		$query = $this->db->get();
		$result = $query->result_array();
		
		return $result;
        
        
    }
     public function Deliveredorder(){
	//=========================
	
		$this->db->select('o.*,u.*,o.order_status as ostatus');

		$this->db->from('orders as o');

		$this->db->join('customerlogin as u','u.id=o.user_id');
		//$this->db->join('order_detail as od','od.order_rand_id=o.order_id','left');
		
    	$this->db->where('o.order_status','Delivered');
		$this->db->order_by("o.id","DESC");

		$query = $this->db->get();

		$result = $query->result_array();

		return $result;
		
		
		

    }	
     public function Shippedorder(){
	//=========================
	
		$this->db->select('o.*,u.*,o.order_status as ostatus');

		$this->db->from('orders as o');

		$this->db->join('customerlogin as u','u.id=o.user_id');
		//$this->db->join('order_detail as od','od.order_rand_id=o.order_id','left');
		
    	$this->db->where('o.order_status','Shipped');
		$this->db->order_by("o.id","DESC");

		$query = $this->db->get();

		$result = $query->result_array();

		return $result;
		
		
		

    }	
     public function Cancelledorder(){
	//=========================
	
		$this->db->select('o.*,u.*,o.order_status as ostatus');

		$this->db->from('orders as o');

		$this->db->join('customerlogin as u','u.id=o.user_id');
		//$this->db->join('order_detail as od','od.order_rand_id=o.order_id','left');
		
    	$this->db->where('o.order_status','Cancelled');
    	
    		if($_SESSION['session_namee'] != 'admin'){
	      $rm = $_SESSION['session_iid'] ;
		
		$this->db->where('o.Rm_id',$rm);
		}
		
		$this->db->order_by("o.id","DESC");

		$query = $this->db->get();

		$result = $query->result_array();

		return $result;
		
		
		

    }
    
    
//=============Pending  oder ===============

     public function Pendingorder(){
	//=========================
	
		$this->db->select('o.*,u.*,o.order_status as ostatus');

		$this->db->from('orders as o');

		$this->db->join('customerlogin as u','u.id=o.user_id');
		//$this->db->join('order_detail as od','od.order_rand_id=o.order_id','left');
		
    	$this->db->where(array('o.order_status'=>'Pending' , 'o.order_type' => 'orders'));
		$this->db->order_by("o.id","DESC");

		$query = $this->db->get();

		$result = $query->result_array();

		return $result;
		
		
		

    }
    
     public function production_pending(){
	//=========================
	
		$this->db->select('o.*,u.*,o.order_status as ostatus');

		$this->db->from('orders as o');

		$this->db->join('customerlogin as u','u.id=o.user_id');
		//$this->db->join('order_detail as od','od.order_rand_id=o.order_id','left');
		
    	$this->db->where(array('o.order_status'=>'Pending' , 'order_type' => 'production'));
		$this->db->order_by("o.id","DESC");

		$query = $this->db->get();

		$result = $query->result_array();

		return $result;
		
		
		

    }
    
   //=============Ready Shipped  oder ===============

     public function Readyshipped(){
	//=========================
	
		$this->db->select('o.*,u.*,o.order_status as ostatus');

		$this->db->from('orders as o');

		$this->db->join('customerlogin as u','u.id=o.user_id');
		//$this->db->join('order_detail as od','od.order_rand_id=o.order_id','left');
		
    	$this->db->where('o.order_status','Readyshipped');
		$this->db->order_by("o.id","DESC");

		$query = $this->db->get();

		$result = $query->result_array();

		return $result;
		
		
		

    }
    
    //==========================
    
     public function Customers(){

		$this->db->select('*');
		$this->db->from('customerlogin');
		$query = $this->db->get();
		$result = $query->result_array();

		return $result;

    }	
    
    
    
     public function Customer_pending($rm ){
         
        
		$this->db->select('*');
		$this->db->from('customerlogin');
		
	 	$this->db->where('valid != ',1);
	 	
	 	 if($rm != 'All'){
           $this->db->where(array('Rm_id'=>$rm , ));
            
        }
        
		$query = $this->db->get();
		$result = $query->result_array();

		return $result;

    }
    
    public function Customer_filter($rm , $where , $search ){
         
        
		$this->db->select('*');
		$this->db->from('customerlogin');
		 if($where != 'All'){
	 	$this->db->where($where ,$search);
		 }
	 	
	 	 if($rm != 'All'){
           $this->db->where(array('Rm_id'=>$rm , ));
            
        }
        
		$query = $this->db->get();
		$result = $query->result_array();

		return $result;

    }	
    public function rm(){



		$this->db->select('*');

		$this->db->from('rm');

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

    }
  public function product_list(){



		$this->db->select('*');

		$this->db->from('product_detail');
        //   $this->db->limit(50);
		$query = $this->db->get();

         

		$result = $query->result_array();

		return $result;

    }
 	public function orderdetail($id){

 		$this->db->select('o.*,u.*,od.*,od.*');

 		

		$this->db->from('orders as o');

		$this->db->where('o.order_id',$id);
		
		$this->db->order_by("series_product", "asc");

		$this->db->join('customerlogin as u','u.id=o.user_id');

		$this->db->join('order_detail as od','od.order_rand_id=o.order_id');
        
        	if($_SESSION['session_namee'] != 'admin'){
	      $rm = $_SESSION['session_iid'] ;
		
		$this->db->where('o.Rm_id',$rm);
		}
	
		/*$this->db->select('o.*,u.username,u.lastname,u.email,u.phones,od.orderdetail_id,od.product_id,od.quantity,od.product_price as price,pd.product_amount,pd.product_name,ua.*');

 		

		$this->db->from('orders as o');

		$this->db->where('o.order_id',$id);

		$this->db->join('users as u','u.id=o.user_id');

		$this->db->join('orderdetails as od','od.order_id=o.order_id');

		$this->db->join('product_details as pd','pd.id=od.product_id');

		$this->db->join('users_address as ua','ua.id=o.address_id');*/

		$query = $this->db->get();



		$result = $query->result_array();

		//pr($result);die;

		return $result;

 	}

	public function userorderdetail($id , $userid){

 		$this->db->select('o.*,u.*,od.*,od.*');

		$this->db->from('orders as o');

		$this->db->where('o.order_id',$id);
		$this->db->where('o.user_id',$userid);
	
		$this->db->order_by("series_product", "asc");

		$this->db->join('customerlogin as u','u.id=o.user_id');

		$this->db->join('order_detail as od','od.order_rand_id=o.order_id');

		$query = $this->db->get();



		$result = $query->result_array();

		//pr($result);die;

		return $result;

 	}

    public function customerdetail($id){
        $this->db->select();
        $this->db->from('customerlogin');
        $this->db->where('id',$id);
        
    	if($_SESSION['session_namee'] != 'admin'){
	      $rm = $_SESSION['session_iid'] ;
		
		$this->db->where('Rm_id',$rm);
		}


		$query = $this->db->get();
        $result = $query->result_array();
        //print_r($result);die();
       return $result;
    }
 	public function category(){

 		$this->db->select('*');

		$this->db->from('category');

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}

 	public function sub_category(){

 		$this->db->select('*');

		$this->db->from('sub_category');

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}

 	public function add_product($data){

 	return 	$this->db->insert('product_detail',$data);

 	}

 		public function add_productvarient($data){

 		$this->db->insert('product',$data);

 	}


 	public function add_varientproduct($data){

 		$this->db->insert('product',$poductsize);

 	}



 	public function ListProduct(){

 		$this->db->select('p.*,s.subcategory_name as subname,c.name as categoryname');

		$this->db->from('product_detail as p');

 			//	$this->db->group_by('p.Position'); 
		$this->db->join('category as c','c.id=p.category_id','left');

		$this->db->join('sub_category as s','s.id=p.sub_catid','left');
 		//$this->db->order_by("p.Position", "asc");

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}

	public function ListcatProduct($id){

 		$this->db->select('p.*,s.subcategory_name as subname,c.name as categoryname');

		$this->db->from('product_detail as p');
 		$this->db->order_by("p.Position", "asc");

		$this->db->where('p.parent_cat',$id);

		$this->db->join('category as c','c.id=p.category_id','left');

		$this->db->join('sub_category as s','s.id=p.sub_catid','left');

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}

 	public function Editproduct($id){

 		

 		$this->db->select('*,,pd.id as proid,p.name as parentname,c.name as catename,sc.subcategory_name as subcatname');

 		$this->db->where('pd.id',$id);

		$this->db->from('product_detail as pd');

		$this->db->join('parent_category as p','p.id=pd.parent_cat','left');

		$this->db->join('category as c','c.id=pd.category_id','left');

		$this->db->join('sub_category as sc','sc.id=pd.sub_catid','left');





		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}
 	
 	
 		public function Editproduct_detail($id){

 	
 		$this->db->select('*');
 		$this->db->where('id',$id);
		$this->db->from('product_detail');
		$query = $this->db->get();
		$result = $query->result_array();

		return $result;

 	}
 	public function select_common($table){

		$this->db->select('*');

 		$this->db->from($table);	

 		//$this->db->order_by("Position", "asc");
		$query = $this->db->get();

		$result = $query->result_array();

		return $result;

	}

 	public function updateproduct($data,$id){

//pr($data);die;

 		$this->db->where('id',$id);

 		$this->db->update('product_detail',$data);

 	}

public function updateproductvarient($data,$id){

//pr($data);die;

 		$this->db->where('id',$id);

 		$this->db->update('product',$data);

 	}
 	public function updateproductsize($poductsize,$product_id){

 		

 		$this->db->where('p_id',$product_id);

 		$this->db->update('poductsize',$poductsize);

 	}

 	public function deleteproduct($id){

 		$this->db->where('id',$id);

 		$this->db->delete('product_detail');

 	
 	}

public function deletevarientproduct($id){

 		$this->db->where('id',$id);

 		$this->db->delete('product');

 	
 	}

 		public function Addcategory($data){

 		$this->db->insert('category',$data);



 	}
	public function Addcategory2($data){

 		$this->db->insert('category2',$data);



 	}
public function Editcategory($id){

 		

 		$this->db->select('*');

 		$this->db->where('id',$id);

		$this->db->from('category');

		

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}
 	public function Editcategory2($id){

 		

 		$this->db->select('*');

 		$this->db->where('id',$id);

		$this->db->from('category2');

		

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}

 	
 	public function updatecategory($data,$id){

 		$this->db->where('category_id',$id);

 		$this->db->update('category',$data);

 	}

 	public function deletecategory($id){

 		$this->db->where('id',$id);

 		$this->db->delete('category');
 		
 		return ;

 	}
 	public function deletecategory2($id){

 		$this->db->where('id',$id);

 		$this->db->delete('category2');

 	}
 	public function deluser($id){

 		$this->db->where('id',$id);

 		$this->db->delete('customerlogin');

 	}

 	public function Addparentcategory($data){

 		$this->db->insert('parent_category',$data);

 	}
 	public function Addparentcategory2($data){

 		$this->db->insert('parent_category2',$data);

 	}
 	 	public function Listcategory(){

 		

 		$this->db->select('*');

		$this->db->from('category');
		$this->db->order_by("Position", "asc");

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}
 	
 	public function select_category_where($table,$where,$id){

		$this->db->select('*');
		$this->db->where($where,$id);

 		$this->db->from($table);		
 		$this->db->order_by("Position", "asc");
		$query = $this->db->get();

		$result = $query->result_array();

		return $result;

	}
	
 	
 	public function parentwise_category($id){

 
 		$this->db->select('*');
 		
 		$this->db->where('parent_id' , $id);
		$this->db->order_by("Position", "asc");

		$this->db->from('category');
		
		$query = $this->db->get();


		$result = $query->result_array();

		return $result;

 	}
 	public function Listcategory2(){

 		

 		$this->db->select('*');

		$this->db->from('category2');

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}

 	public function newspapers(){

 		

 		$this->db->select('*');

		$this->db->from('newspaper');

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}

 	public function Listparentcategory(){

 		

 		$this->db->select('*');



		$this->db->from('parent_category');

		$this->db->order_by("Position", "asc");

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}
 	public function parentmanagment(){


 		$this->db->select('*');
		$this->db->from('position_product');
		$query = $this->db->get();
		$result = $query->result_array();

		return $result;

 	}
 	
 	public function list_homedeals(){

 		

 		$this->db->select('*');



		$this->db->from('home_page_deals');

		$this->db->order_by("position", "asc");

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}

 	public function Listparentcategory2(){

 		

 		$this->db->select('*');



		$this->db->from('parent_category2');

		$this->db->order_by("id", "asc");

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}
 	public function Editparent($id){

 		

 		$this->db->select('*');

 		$this->db->where('id',$id);

		$this->db->from('parent_category');

		

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}

 	

 	public function deleteparent($id){

 		$this->db->where('id',$id);

 		$this->db->delete('parent_category');

 	}
 	public function Deletehomedeals($id){

 		$this->db->where('id',$id);
 		$this->db->delete('home_page_deals');

 	}
 	
public function Editparent2($id){

 		

 		$this->db->select('*');

 		$this->db->where('id',$id);

		$this->db->from('parent_category2');

		

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}

 	

 	public function deleteparent2($id){

 		$this->db->where('id',$id);

 		$this->db->delete('parent_category2');

 	}

 	public function Addsubcategory($data){

 		$this->db->insert('sub_category',$data);

 	}
public function Addsubcategory2($data){

 		$this->db->insert('sub_category2',$data);

 	}

 	public function Listsubcategory(){

 		

 		$this->db->select('*,c.name as catname,sc.subcategory_name as subcatname,sc.id as subid');

		$this->db->from('sub_category as sc');

		$this->db->join('category as c','c.id=sc.cat_id');

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}
 	public function Listsubcategory2(){

 		

 		$this->db->select('*,c.name as catname,sc.subcategory_name as subcatname,sc.id as subid');

		$this->db->from('sub_category2 as sc');

		$this->db->join('category2 as c','c.id=sc.cat_id');

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}

 	public function Editsubcategory($id){

 		

 		$this->db->select('*');

 		$this->db->where('id',$id);

		$this->db->from('sub_category');

		

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}
 	public function Editsubcategory2($id){

 		

 		$this->db->select('*');

 		$this->db->where('id',$id);

		$this->db->from('sub_category2');

		

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;


 	}

 	public function deletesubcategory2($id){

 		$this->db->where('id',$id);

 		$this->db->delete('sub_category2');

 	}
 	public function updatesubcategory($data,$id){

 		$this->db->where('sub_id',$id);

 		$this->db->update('sub_category',$data);

 	}

 	public function deletesubcategory($id){

 		$this->db->where('id',$id);

 		$this->db->delete('sub_category');

 	}
 	public function deletecoupan($id){

 		$this->db->where('id',$id);

 		$this->db->delete('coupon');

 	}

 	public function insert_common($data,$table){

 		$this->db->insert($table,$data);
 		//echo $this->db->last_query();die;
 		 return $this->db->insert_id();
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
	public function select_inventory_where($table,$where,$id , $inventory_type){

		$this->db->select('*');
		$this->db->like($where,$id);

 		$this->db->from($table);
 		if($inventory_type ="Hightolow"){
 	  $this->db->order_by("availability", "desc");
 		}
		$query = $this->db->get();

		$result = $query->result_array();

		return $result;

	}
	
	public function download_inventory_where($table,$where,$id , $inventory_type){

		$this->db->select('*');
		$this->db->like($where,$id);

 		$this->db->from($table);
 		if($inventory_type ="Hightolow"){
 	  $this->db->order_by("availability", "desc");
 		}
 		      $this->db->limit(40);

		$query = $this->db->get();

		$result = $query->result_array();

		return $result;

	}

 	public function Editmaterial($id){

 		

 		$this->db->select('*');

 		$this->db->where('material_id',$id);

		$this->db->from('Material');

		

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}

 	public function updatematerial($data,$product_id){

 		$this->db->where('material_id',$id);

 		$this->db->update('Material',$data);

 	}

 	public function deletematerial($id){

 		$this->db->where('material_id',$id);

 		$this->db->delete('Material');

 	}

 	public function Editfinish($id){

 		

 		$this->db->select('*');

 		$this->db->where('finish_id',$id);

		$this->db->from('finish');

		

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}

 	public function updatefinish($data,$product_id){

 		$this->db->where('finish_id',$id);

 		$this->db->update('finish',$data);

 	}

 	public function deletefinish($id){

 		$this->db->where('finish_id',$id);

 		$this->db->delete('finish');

 	}



 	public function Editsize($id){

 		

 		$this->db->select('*');

 		$this->db->where('size_id',$id);

		$this->db->from('Size');

		

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}

 	public function updatesize($data,$product_id){

 		$this->db->where('size_id',$id);

 		$this->db->update('Size',$data);

 	}

 	public function deletesize($id){

 		$this->db->where('size_id',$id);

 		$this->db->delete('Size');

 	}

 	public function Editcolor($id){

 		

 		$this->db->select('*');

 		$this->db->where('id',$id);

		$this->db->from('colors');

		

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}

 	public function updatecolor($data,$id){

 		$this->db->where('id',$id);

 		$this->db->update('colors',$data);

 	}

 	public function deletecolor($id){

 		$this->db->where('id',$id);

 		$this->db->delete('colors');

 	}

 	public function Editshape($id){

 		

 		$this->db->select('*');

 		$this->db->where('shape_id',$id);

		$this->db->from('Shapes');

		

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}

 	public function updateshape($data,$id){

 		$this->db->where('shape_id',$id);

 		$this->db->update('Shapes',$data);

 	}

 	public function deleteshape($id){

 		$this->db->where('shape_id',$id);

 		$this->db->delete('Shapes');

 	}





 	public function select_com($table){

 		

 		$this->db->select('*');

		$this->db->from($table);

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}



 	public function select_com_where($table,$where,$id){

 		

 		$this->db->select('*');

		$this->db->from($table);

		$this->db->where($where,$id);

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}




 	public function update_common($data,$table,$where,$id){

 		$this->db->where($where,$id);

 		$this->db->update($table,$data);

 	}

 		public function common_delete($id,$where,$table){

 		$this->db->where($where,$id);

 		$this->db->delete($table);

 	}
 		public function delusercart($id,$user_id){

 		$this->db->where('product_id',$id);
 		$this->db->where('user_id',$user_id);

 		$this->db->delete('cart');

 	}	
 	public function deluserproduction($id,$user_id){

 		$this->db->where('product_id',$id);
 		$this->db->where('user_id',$user_id);

 		$this->db->delete('cart_production');

 	}
 	
 	public function delproductionuser($id,$user_id){

 		$this->db->where('product_id',$id);
 		$this->db->where('user_id',$user_id);

 		$this->db->delete('cart_production');

 	}

 	public function insertexcel($data,$data1){

 		$this->db->insert('product_details',$data);

 		$this->db->insert('poductsize',$data1);

 

 	}
 	public function stockdetail(){



 $this->db->select('pd.product_id,pd.product_code,pd.product_name,ps.availability,pc.p_cat_name,c.name as catname,sc.name as subcat');

		$this->db->from('poductsize as ps');

		$this->db->join('product_details as pd','pd.product_id=ps.p_id');
		$this->db->join('parent_category as pc','pc.parent_cat_id=pd.pcat');
		$this->db->join('category as c','c.category_id=ps.cat_id');
		$this->db->join('sub_category as sc','sc.sub_id=ps.subcat_id');

		$query = $this->db->get();
//echo $str = $this->db->last_query();die;
		$result = $query->result_array();

		return $result;



    }	
    public function reward_order($oid){

 		

 		$this->db->select('*');

		$this->db->from('orderdetails');

		$this->db->where('order_id',$oid);

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}
 	public function select_reward($userid){

 		

 		$this->db->select('*');

		$this->db->from('Rewards');

		$this->db->where('user_id',$userid);

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}
 	public function update_rewards($data2,$table2,$where2,$id2){

 		$this->db->where($where2,$id2);

 		$this->db->update($table2,$data2);

 	}
 	public function insert_rewards($data1,$table1){

 		$this->db->insert($table1,$data1);

 	}

 	public function discountslab(){

 		

 		$this->db->select('*');

		$this->db->from('discountslab');

		$this->db->order_by('discount','desc');

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}
 	 public function cartproduct($user_id,$id){

 		

 		$this->db->select('*');

		$this->db->from('cart');

		$this->db->where('user_id',$user_id);
		$this->db->where('product_id',$id);

		$query = $this->db->get();



		$result = $query->result_array();

		return $result;

 	}
 	
 	
 	//======================self order======================
 	
 		public function self_ordercart($mob){

 		$this->db->select('o.*,u.*,od.*,od.*');
		$this->db->from('customerlogin as o');
		$this->db->where('o.phone',$mob);
		$this->db->join('cart as u','u.user_id=o.id');
		$query = $this->db->get();

		$result = $query->result_array();

		//pr($result);die;

		return $result;

 	}
 	
 	//============================
 	
 	function payment_filter($where , $search ,$date ){
 
 		$this->db->select('*');
		$this->db->from('orders');
		
		if($where !="All"){
		
		$this->db->where($where,$search);
		}

		if($date){
		  $this->db->where('order_Date >=', $date );
		}

		$query = $this->db->get();

		$result = $query->result();
 
		return $result;
	    
 	}
 	
 	function filterdatepayment($first_date,$second_date,$where ,$search ){
 
 		$this->db->select('*');
		$this->db->from('orders');
		
		if($where !="All"){
		
		$this->db->where($where,$search);
		}

		$this->db->where('order_Date >=', $first_date);
        $this->db->where('order_Date <=', $second_date);
      

		$query = $this->db->get();
		$result = $query->result();
		return $result;
 	}
 	
 	function sale_detail_filter($where , $search ,$date ,$rm , $order_status){
 
 		$this->db->select('*');
		$this->db->from('orders');
		
		if($where !="All"){
		
		$this->db->where($where,$search);
		}
		if($rm !="All"){
		
		$this->db->where('Rm_id',$rm);
		}
		if($order_status !="All"){
		
		$this->db->where('order_status',$order_status);
		}

		if($date){
		  $this->db->where('order_Date >=', $date );
		}

		$query = $this->db->get();

		$result = $query->result();
 
		return $result;
	    
 	}
 		function filterdatesales($where , $search ,$first_date,$second_date ,$rm , $order_status){
 		    
     
 
 		$this->db->select('*');
		$this->db->from('orders');
		
		if($where !="All"){
		
		$this->db->where($where,$search);
		}
		if($rm !="All"){
		
		$this->db->where('Rm_id',$rm);
		}
		if($order_status !="All"){
		
		$this->db->where('order_status',$order_status);
		}

		$this->db->where('order_Date >=', $first_date);
        $this->db->where('order_Date <=', $second_date);
      

		$query = $this->db->get();

		$result = $query->result();
 
		return $result;
	    
 	}
 		function order_filter($where , $search ,$date , $order_status){
 

 		$this->db->select('*');
		$this->db->from('orders');
		
		if($where !="All"){
		
		$this->db->where($where,$search);
		}
	if($_SESSION['session_namee'] != 'admin'){
	      $rm = $_SESSION['session_iid'] ;
		
		$this->db->where('Rm_id',$rm);
		}
		
		if($order_status !="All"){
		
		$this->db->where('order_status',$order_status);
		}

		if($date){
		  $this->db->where('order_Date >=', $date );
		}

		$query = $this->db->get();

		$result = $query->result_array();
		
	
		return $result;
	    
 	}
 	
 	function filterdateorder2($first_date,$second_date,$where ,$search ,$order_status){
 

 		$this->db->select('*');
		$this->db->from('orders');
		
		if($where !="All"){
		
		$this->db->where($where,$search);
		}

	if($_SESSION['session_namee'] != 'admin'){
	      $rm = $_SESSION['session_iid'] ;
		
		$this->db->where('Rm_id',$rm);
		}
	
		
		if($order_status !="All"){
		
		$this->db->where('order_status',$order_status);
		}

		$this->db->where('order_Date >=', $first_date);
       $this->db->where('order_Date <=', $second_date);
       
		$query = $this->db->get();

		$result = $query->result_array();
		
	
		return $result;
	    
 	}
 	
 	//==========Sku ===============
 	
 	function sale_sku_filter(  $sku ,$date ,$category_id )
 	{
  
 		$this->db->select('*');
		$this->db->from('product_detail');
		
			if($sku){
		
		$this->db->where('sku_code',$sku);
		}
		
		if($category_id !="All"){
		
		$this->db->like('category_id',$category_id);
		}
		
// 		if($order_by =="high"){
		
// 		$this->db->order_by('quantity','desc');
// 		}else{
// 		    	$this->db->order_by('quantity','asc');
		    
// 		}

// 	if($date){
// 		  $this->db->where('date >=', $date );
// 		}
   

		$query = $this->db->get();

		$result = $query->result();
 
		return $result;
	    
 	}
 	
 	function filterdate_sku(  $first_date,$second_date , $sku  ,$category_id ,$order_by)
 	{
 
 		$this->db->select('*');
		$this->db->from('order_detail');
		
		if($sku){
		
		$this->db->where('product_id',$sku);
		}
		
		if($category_id !="All"){
		
		$this->db->like('pro_category',$category_id);
		}
		
		if($order_by =="high"){
		
		$this->db->order_by('quantity','desc');
		}else{
		    	$this->db->order_by('quantity','asc');
		    
		}

			$this->db->where('order_Date >=', $first_date);
       $this->db->where('order_Date <=', $second_date);
    
		$query = $this->db->get();

		$result = $query->result();
 
		return $result;
	    
 	}
 	//=======================================
 	

}