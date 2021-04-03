<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Team extends CI_Controller {

	function __construct() {

         parent::__construct();
        
         $this->load->model('Adminmodel');

         $this->load->model('Model');

       }
    
    //=========position ====================
        public function productmanagment()
        {
            	is_team();

            $data['pcat']=$this->Adminmodel->Listparentcategory();
    
    		$data['messagess']=$this->Adminmodel->category();
            $this->load->view('Team/productmanagment.php',$data);
        }
        
       
        function position_list(){
            
            	is_team();

            $id = $this->input->post('cat');
            
            $where='category';
    		$table='position_product';
  		
    		$data['pcat']=$this->Adminmodel->Listparentcategory();
    		$data['position_list']=$this->Adminmodel->select_com_where($table,$where,$id);		
    		
    		
    		$this->load->view('Team/productmanagment.php',$data);		
        
    }
    
    	function position_product(){
					is_team();

				  	$id =$_POST['id'];
				  	$type =$_POST['type'];
					$data = array('category_position' => $type ,) ;
		
			    $this->db->where('id', $id);
                $this->db->update('position_product', $data);
	
				echo "done" ;
    
			}	
    //===================================
    
   
    
    public function ledger(){
        
        	is_team();

        
        $data['custom_list'] = $this->db->get('customerlogin' )->result() ;
        $this->load->view('Team/ledger.php',$data);
        
    }
    public function ledger_details(){
        
        	is_team();

          $user_id =$this->input->post('user_id');
          $data['customer_detail'] = $this->db->get_where('ledger_account' , array('user_id' => $user_id ,) )->result() ;
          $data['user_id'] = $user_id ; 
      
        $this->load->view('Team/ledger_details.php',$data);
        
    }
    
     public function date_ledgerdetails(){
         
         	is_team();

        
        $user_id =$this->input->post('user_id');
        $second_date = $this->input->post('date2');
  
           $data['customer_detail'] = $this->db->get_where('ledger_account' , array('user_id' => $user_id ,'date >='=> $first_date,'date <='=> $second_date) )->result() ;
           $data['user_id'] = $user_id ; 
        
        $this->load->view('Team/ledger_details.php',$data);
        
    }
    
    
    //=============Payment =========
    
      public function payment(){
          
          $data['result'] = $this->db->get('orders')->result(); 
            
            $this->load->view('Team/payment.php' , $data);
        }
        
         public function confirm_payment(){
             
             $req_id = $this->input->post('req_id');
             
             $advance = $this->input->post('ConfirmDipositAmount');
             
             
              $post = array(
                      
                          'advance_payment'=> $advance,
                           'confirm_payment' => 'done' ,
                           
                          );
          
            $this->db->where('order_id', $req_id);
            $this->db->update('orders', $post);
                 
               $ledger = array(
                      
                          'credit_amount'=> $advance,
                            'payment_verify' => 'verified' ,
                           
                          );
          
         $this->db->where(array('order_id'=> $req_id , 'payment_done'=>'Advance' ));
            $this->db->update('ledger_account', $ledger);
                 
                 

            
            redirect('Team/payment') ; 
        }
        
        public function confirmpending_payment(){
             
             $req_id = $this->input->post('req_id');
             
             $advance = $this->input->post('ConfirmDipositAmount');
             
             
              $post = array(
                      
                          'pend_amount'=> $advance,
                           'confirm_payment' => 'done' ,
                           
                          );
          
         $this->db->where('order_id', $req_id);
                 $this->db->update('order_transition', $post);

        $ledger = array(
                          'credit_amount'=> $advance,
                          'payment_verify' => 'verified' ,
                           
                          );
          
         $this->db->where(array('order_id'=> $req_id , 'payment_done'=>'pending' ));
            $this->db->update('ledger_account', $ledger);
            
            redirect('Team/payment') ; 
        }
        
        
        	public function filter_payment(){

				is_team();
				
				$type = $this->input->post('type') ;
		    	$cat_date  = $this->input->post('cat_date') ;
		    	$search = trim($this->input->post('search')) ; 
		    	
		    	
                        $first_date = $this->input->post('date1');
                        $second_date = $this->input->post('date2');
        
		   
		   		if($cat_date== "Today"){
				    
				    	$date=date("Y-m-d");

				}elseif($cat_date== "3Days"){
				    
				    $date   =  date('Y-m-d', strtotime("-3 days"));  
				    
				    
				}elseif($cat_date== "week"){
				    
				    $date   =  date('Y-m-d', strtotime("-7 days"));  
				    
				    
				}elseif($cat_date== "Month"){
				    
				    $date   =  date('Y-m-d', strtotime("-30 days"));  
				    
				    
				}elseif($cat_date== "custom"){
				    
				    $date   =  'custom' ;  
				    
				    
				}else{
				    
				    $date = '' ; 
				}
			
			
			if($type == 'Name'){
			    
			     $data['type'] = $type ; 
			    	$data['search'] = $search ; 
			    
			     $name = trim($this->input->post('search')) ; 
			     
			     $user = $this->db->get_where('customerlogin' , array('Owner' => $name))->row();
			     
			     $where = 'user_id' ;
			     $search =  $user->id; 
			     
			     if($date == 'custom'){
				      
     	$data['result']=$this->Adminmodel->filterdatepayment($first_date,$second_date,$where ,$search );
				        
				    }else{
			     
			    $data['result'] = $this->Adminmodel->payment_filter( $where , $search ,$date);
			    
				    }
			}
	    	elseif($type == 'phone'){
	    	    
	    	    $search = trim($this->input->post('search_phone')) ; 
	    	    
	    	    	$data['search'] = $search ; 
			    
			     $name = trim($this->input->post('search')) ; 
			     
			      $data['type'] = $type ; 
			     
			     $user = $this->db->get_where('customerlogin' , array('phone' => $name))->row();
			     
			     $where = 'user_id' ;
			    
			     $search =  $user->id; 
			    
			      $data['result'] = $this->Adminmodel->payment_filter( $where , $search ,$date);
			      
			      
		
			}elseif($type== 'All' && $cat_date == 'All'){
				    
				    redirect('Team/payment');
				    
				}else{
				    
				    if($type== 'order_id'){
				        
				          $search = trim($this->input->post('search_order')) ; 
				        
				    } elseif($type== 'utr_number'){
				        
				          $search = trim($this->input->post('search_order')) ; 
				        
				    }elseif($type== 'online_transaction_id'){
				        
				          $search = trim($this->input->post('search_transaction_id')) ; 
				        
				    }elseif($type== 'payment_mode'){
				        
				          $search = trim($this->input->post('search_mode')) ; 
				        
				    }elseif($type== 'Rm_id'){
				        
				          $search = trim($this->input->post('search_rm')) ; 
				        
				    }
				    
				   
				    $where = $type ;
				    $data['search'] = $search ; 
				  $data['result'] = $this->Adminmodel->payment_filter( $where , $search ,$date);
				   $data['type'] = $type ; 
				    
				}
				
			$data['date'] = $cat_date ;
	
            $this->load->view('Team/payment.php' , $data);

			}
        
    
    //===========================
    
    
    public function customer_details(){
                is_team();
                $id = $this->uri->segment(3);
            	$data['messag']= $this->Adminmodel->customerdetail($id);
                $this->load->view('Team/customer_details.php',$data);
    }
    public function neworder(){
                is_team();
                
            $user = $this->db->get('customerlogin')->result() ; 
            
            $product_detail = $this->db->get('product_detail')->result() ;   
            
            $data = array(
                
                'user' =>$user ,
                'product_detail' => $product_detail ,
                ) ;
            
           
                $this->load->view('Team/neworder.php' ,$data);
    }
    
    
     public function ProductionNewOrder(){
                is_team();
                
            $user = $this->db->get('customerlogin')->result() ; 
            
            $product_detail = $this->db->get('product_detail')->result() ;   
            

            
            $data = array(
                
                'user' =>$user ,
                'product_detail' => $product_detail ,
                ) ;
            
           
                $this->load->view('Team/neworder_production.php' ,$data);
    }
    
    
    public function rmlist(){
                is_team();
                $data['messa']=$this->Adminmodel->rm();
                $this->load->view('Team/rmlist.php',$data);
    }
    public function addrm(){
                is_team();
                $this->load->view('Team/addrm.php');
    }
    public function editrm($id){
                is_team();
                $data['rm_detail'] = $this->db->get('rm' , array('id' => $id ))->row() ;
                
             
                
                $this->load->view('Team/editrm.php' ,$data);
    }
    public function variant(){


       is_team();
    	$id=$this->uri->segment(3);
    	  $where='parent_sku';
          $table='product_detail';
          $data['messages']=$this->Adminmodel->select_common_where($table,$where,$id);
          $data['url']=$this->uri->segment(3);
    	$this->load->view('Team/addvariant.php',$data);
    }

public function addnewvarient(){

is_team();
	$data['url']=$this->uri->segment(3);
	
		$data['pcat']=$this->Adminmodel->Listparentcategory();

				$data['messagess']=$this->Adminmodel->category();

				$data['sub']=$this->Adminmodel->sub_category();
					$table='occasion';
				$data['occasion']=$this->Model->select_common($table);
				$table='recipient';
				$data['recipient']=$this->Model->select_common($table); 
				
	$this->load->view('Team/newvarient.php',$data);
}
public function Previleges(){
is_team();
				$table='rm';
				$data['message1']=$this->Adminmodel->select_common($table);

	$this->load->view('Team/privilege.php',$data);
}
public function AddPrevileges(){
is_team();
	$id =$this->uri->segment(3);
	$data['uri'] =$id;
	  $where='id';
          $table='admin';
          $data['prv']=$this->Adminmodel->select_common_where($table,$where,$id);
          
          $data['user_id'] = $id ; 
	$this->load->view('Team/addprevileges.php',$data);
}
	public function index()

		{

			if(!empty($this->session->userdata('session_iid')))

					{

						redirect('Team/Dashboard');

					}

			$this->load->view('Team/Adminlogin');

		}

	public function admin_login()

		{

				$data= array(

							'name' => $this->input->post('username'),

							'pass' => $this->input->post('password'),

							);

						$login=$this->Adminmodel->team_log($data);
						
							

					if ($login)

						{

							$newdata = array('session_iid'  => $login->id,

											'session_namee'  => $login->name

											);

							$this->session->set_userdata($newdata);

							redirect('Team');

					  	}



					else

					{

						echo "please enter correct login password";
						
							redirect('Team/Dashboard');

					}

		}

		

    	public function Dashboard()

			{


				 // /is_protected();

				if(empty($this->session->userdata('session_iid')))

				{

					redirect('Team/index');

				}

				$date=date("Y-m-d");

			

				$data['order'] = $this->Adminmodel->Totalorder();

			/*	$data['today'] = $this->Adminmodel->Todayorder($date);*/

				

			$data['Customers'] = $this->Adminmodel->Customers();

				$this->load->view('Team/dashboard.php',$data);

			}
			public function orderbycategories(){
			    
			      is_team();
			      
			      					$id=$_POST['ordertype'];
			      				

				if($_POST['cats']=="today"){
					$id=$_POST['ordertype'];
					$date=date("Y-m-d");
						$data['message2']=$this->Adminmodel->Todayorder($date,$id);
				$data['current_uri']='today';
				$data['current_uris']=$_POST['ordertype'];


				}elseif ($_POST['cats']=="week") {
					$id=$_POST['ordertype'];

						$data['message2']=$this->Adminmodel->weekorder($id);
				$data['current_uris']=$_POST['ordertype'];

				$data['current_uri']='week';
					
				}elseif ($_POST['cats']=="month") {
					$id=$_POST['ordertype'];

				$data['current_uri']='month';
					$data['message2']=$this->Adminmodel->monthorder($id);	
				$data['current_uris']=$_POST['ordertype'];

				}else{
					$id=$_POST['ordertype'];

				$data['message2']=$this->Adminmodel->Totalorder();
				$data['current_uri']='order';
				$data['current_uris']="";
					$data['status'] = $_POST['ordertype']; ;

				}

			$this->load->view('Team/order.php',$data);
			}
			
			public function filterbystatus(){
			    
			      is_team();
                    
                      $rm = $_POST['rm_id'];
                      
                       
                      if($_POST['cats']=="today"){
				    
				  
				    
					$id=$_POST['ordertype'];
					$date=date("Y-m-d");
						$data['message2']=$this->Adminmodel->Todayorder($date,$id , $rm );
			        	$data['current_uri']='today';
			        	$data['current_uris']=$_POST['ordertype'];


				}elseif ($_POST['cats']=="week") {
				    
				    
					$id=$_POST['ordertype'];

						$data['message2']=$this->Adminmodel->weekorder($id , $rm );
				$data['current_uris']=$_POST['ordertype'];

				$data['current_uri']='week';
					
				}elseif ($_POST['cats']=="month") {
				
					$id=$_POST['ordertype'];
				
			

				$data['current_uri']='month';
				
					
					$data['message2']=$this->Adminmodel->monthorder($id ,$rm );	
				$data['current_uris']=$_POST['ordertype'];

				}else{
					$id=$_POST['ordertype'];

				$data['message2']=$this->Adminmodel->all_rm_order($rm , $id );
				$data['current_uri']='order';
				$data['current_uris']="";

				}
				
					$data['status'] = $_POST['ordertype']; 

			$this->load->view('Team/orderprocess.php',$data);
			}
			
				function Cancelledfilter(){
			    
			      is_team();

				if($_POST['cats']=="today"){
					$id=$_POST['ordertype'];
					$date=date("Y-m-d");
						$data['message2']=$this->Adminmodel->Todayorder($date,$id);
				$data['current_uri']='today';
				$data['current_uris']=$_POST['ordertype'];


				}elseif ($_POST['cats']=="week") {
					$id=$_POST['ordertype'];

						$data['message2']=$this->Adminmodel->weekorder($id);
				$data['current_uris']=$_POST['ordertype'];

				$data['current_uri']='week';
					
				}elseif ($_POST['cats']=="month") {
					$id=$_POST['ordertype'];

				$data['current_uri']='month';
					$data['message2']=$this->Adminmodel->monthorder($id);	
				$data['current_uris']=$_POST['ordertype'];

				}else{
					$id=$_POST['ordertype'];

				$data['message2']=$this->Adminmodel->Totalorder();
				$data['current_uri']='order';
				$data['current_uris']="";
				
			

				}
				
					$data['status'] = $_POST['ordertype']; 

			$this->load->view('Team/cancelled_list.php',$data);
			}
			public function orderbystatus(){
			      is_team();
			    
			    
				if($this->uri->segment(3)=="Delievered"){
				    
					
				$data['message2']=$this->Adminmodel->Deliveredorder();
				// $data['current_uris']='0';
            
            	$data['status'] = "Delivered" ;
                	
				}elseif ($this->uri->segment(3)=="Pending") {
				    
				$data['message2']=$this->Adminmodel->Pendingorder();
				$data['current_uris']='5';
				
				$data['status'] = "Pending" ;
					
				}
				elseif ($this->uri->segment(3)=="ReadyShipped") {
				$data['message2']=$this->Adminmodel->Readyshipped();
				$data['current_uris']='6';
				
				
				$data['status'] = "ReadyShipped" ;
					
				}
				
				elseif ($this->uri->segment(3)=="Shipped") {
				    
				$data['message2']=$this->Adminmodel->Shippedorder();
				$data['current_uris']='1';
				
				$data['status'] = "Shipped" ;
				
					
				}elseif ($this->uri->segment(3)=="Cancelled") {
			
				$data['current_uris']='2';
				$data['message2']=$this->Adminmodel->Cancelledorder();
				
				$data['status'] = "Cancelled" ;		
					
				}else{
				    
				$data['message2']=$this->Adminmodel->Totalorder();
				$data['current_uris']='3';
				
				}
			$this->load->view('Team/orderprocess.php',$data);
			}
			
			
			function CancelledorderList(){
			    
			      is_team();
			      
			    if ($this->uri->segment(3)=="cancelled") {
			
				$data['current_uris']='2';
				$data['message2']=$this->Adminmodel->Cancelledorder();
				
				$data['status'] = "Cancelled" ;		
					
				$this->load->view('Team/orderprocess.php',$data);
				
				}
			    
			}
			
		//========================
		
			public function production_pending(){
			    
			      is_team();
			    
				if($this->uri->segment(3)=="Delivered"){
				    
					
				$data['message2']=$this->Adminmodel->Deliveredorder();
				$data['current_uris']='0';
            
            	$data['status'] = "Delivered" ;
                	
				}elseif ($this->uri->segment(3)=="Pending") {
						$data['message2']=$this->Adminmodel->production_pending();
				$data['current_uris']='5';
				
				$data['status'] = "Pending" ;
					
				}
				elseif ($this->uri->segment(3)=="ReadyShipped") {
				$data['message2']=$this->Adminmodel->Readyshipped();
				$data['current_uris']='6';
				
				
				$data['status'] = "ReadyShipped" ;
					
				}
				
				elseif ($this->uri->segment(3)=="Shipped") {
				    
				$data['message2']=$this->Adminmodel->Shippedorder();
				$data['current_uris']='1';
				
				$data['status'] = "Shipped" ;
				
					
				}elseif ($this->uri->segment(3)=="Cancelled") {
			
				$data['current_uris']='2';
				$data['message2']=$this->Adminmodel->Cancelledorder();
				
				$data['status'] = "Cancelled" ;		
					
				}else{
				    
				$data['message2']=$this->Adminmodel->Totalorder();
				$data['current_uris']='3';
				
				}
			$this->load->view('Team/orderprocess.php',$data);
			}
			
		//============================
			public function logouts(){


					session_destroy();

				redirect('Team/index');
		

			}

			public function orders(){

				is_team();

				$data['message2']=$this->Adminmodel->Totalorder();

                $data['status'] = "Not" ;
                 $data['current_uris'] = "Not" ;
			//	pr($data);die;

				$this->load->view('Team/order.php',$data);

			}
			
				public function Allorders(){

				is_team();

				$data['message2']=$this->Adminmodel->Allorder();

                $data['status'] = "All" ;
                
                $data['current_uris'] = "All" ;
                
                
			//	pr($data);die;

				$this->load->view('Team/orderprocess.php',$data);

			}
			
			public function order_filter(){

				is_team();
				
				$type = $this->input->post('type') ;
				$id = $this->input->post('search') ;
				$order_status = $this->input->post('ordertype') ;
				
				
                         $first_date = $this->input->post('date1');
                        $second_date = $this->input->post('date2');
        
				
				
				$cat_date =  $this->input->post('date') ;
				
				if($cat_date== "today"){
				    
				    	$date=date("Y-m-d");

				}elseif($cat_date== "week"){
				    
				    $date   =  date('Y-m-d', strtotime("-7 days"));  
				    
				    
				}elseif($cat_date== "Month"){
				    
				    $date   =  date('Y-m-d', strtotime("-30 days"));  
				    
				    
				}elseif($cat_date== "custom"){
				    
				    $date   =  'custom' ;  
				    
				    
				}else{
				    
				    $date = '' ; 
				}
				
				
				
				if($type== 'date'){
				    
				    $where = 'order_Date' ;
				    
				}elseif($type== 'Rm'){
				    
				     $where = 'Rm_id' ;
				     $table='orders';

				$data['message2'] = $this->Adminmodel->order_filter($where , $search ,$date , $order_status) ;
				
				    
				}elseif($type== 'order_id'){
				    
				     $where = 'order_id' ;
				     $search = $this->input->post('search_order') ;
				    
				    if($date == 'custom'){
				        
				      
     	$data['message2']=$this->Adminmodel->filterdateorder2($first_date,$second_date,$where ,$search ,$order_status);
				        
				        // 	$data['message2'] = $this->Adminmodel->order_filter($where , $search ,$date , $order_status);
				        
				    }else{
				  
				$data['message2'] = $this->Adminmodel->order_filter($where , $search ,$date , $order_status);
				
				    }
				}elseif($type== 'Customer'){
				    
				    	$id = $this->input->post('search') ;
				    $customer_detail = $this->db->get_where('customerlogin' , array('Owner' =>$id ))->row() ;
				    
				    $search = $customer_detail->id ; 
				     $where = 'user_id' ;
				     $table='orders';
				     
				      if($date == 'custom'){
				        
				      
     	$data['message2']=$this->Adminmodel->filterdateorder2($first_date,$second_date,$where ,$search ,$order_status);
				        
				        // 	$data['message2'] = $this->Adminmodel->order_filter($where , $search ,$date , $order_status);
				        
				    }else{

				$data['message2'] = $this->Adminmodel->order_filter($where , $search ,$date , $order_status);
				
				    }  
				}elseif($type== 'Moblie'){
				    
				    	$id = $this->input->post('search_phone') ;
				    $customer_detail = $this->db->get_where('customerlogin' , array('phone' =>$id ))->row() ;
				    
				    $search = $customer_detail->id ; 
				     $where = 'user_id' ;
				     $table='orders';
if($date == 'custom'){
				        
				      
     	$data['message2']=$this->Adminmodel->filterdateorder2($first_date,$second_date,$where ,$search ,$order_status);
				        
				        // 	$data['message2'] = $this->Adminmodel->order_filter($where , $search ,$date , $order_status);
				        
				    }else{
				$data['message2'] = $this->Adminmodel->order_filter($where , $search ,$date , $order_status);
				    }
				    
				}elseif($type== 'Payment_Mode'){
				    
				       
				     $where = 'payment_mode' ;
				    //  $table='orders';
				// $data['message2'] = $this->Adminmodel->select_like_where($table,$where,$id);
				
				    $search =  $this->input->post('search_mode') ;
				  
				  if($date == 'custom'){
				        
				      
     	$data['message2']=$this->Adminmodel->filterdateorder2($first_date,$second_date,$where ,$search ,$order_status);
				        
				        // 	$data['message2'] = $this->Adminmodel->order_filter($where , $search ,$date , $order_status);
				        
				    }else{
				$data['message2'] = $this->Adminmodel->order_filter($where , $search ,$date , $order_status);
				    }
				    
				}elseif($type== 'Receved_Amount'){
				    
				    
				     $where = 'advance_payment' ;
				     $table='orders';

				$data['message2'] = $this->Adminmodel->select_like_where($table,$where,$id);
				
				}
				
			
                $data['status'] =$order_status ;
                
                 $data['current_uris'] = $order_status ;
			//	pr($data);die;

				$this->load->view('Team/orderprocess.php',$data);

			}
			
			
				public function production_orders(){

				is_team();
				$data['message2']=$this->Adminmodel->Totalproduction_order();

                $data['status'] = "Not_approved" ;
                
                $data['pending'] = 'production' ;
			//	pr($data);die;

				$this->load->view('Team/orders_production.php',$data);

			}
			

			public function orderdetail(){

				is_team();

				$id = $this->uri->segment(3);

				

				$data['messag']= $this->Adminmodel->orderdetail($id);
				
				$data['order'] = $this->db->get_where('orders',array('order_id' => $id))->row() ;
				
			//	pr($data['messag']);die;
				$this->load->view('Team/orderdetail.php',$data);

				

			}
			public function check_order_detail(){

				is_team();

				$id = $this->uri->segment(3);

				

				$data['result']= $this->Adminmodel->orderdetail($id);
// 			pr($data['result']);die;
				$this->load->view('Team/check_order_detail.php',$data);

				

			}
			
					public function requestdetail(){

				is_team();

				$id = $this->uri->segment(3);

				$data['result']= $this->Adminmodel->orderdetail($id);
// 			pr($data['result']);die;
				$this->load->view('Team/requestordr.php',$data);

				

			}
			
			public function confirmdetails(){
			   is_team(); 
			   
			    $request_id = $this->input->post('request_id') ;
			    $final_amount = $this->input->post('finalprice') ; 
			    $before_sub_total = $this->input->post('before_sub_total') ;
			    $shipping = $this->input->post('shipping') ;
			    $sub_total = $this->input->post('sub_total') ;
			    $total_discount = $this->input->post('total_discount') ;

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
                                       
                                       
                            $a++ ;      
                           }
                           
	    	    	
	    	    	//=======================
	    	    	

			$data['result']= $this->Adminmodel->orderdetail($request_id);
			
			      $data['order']  = $this->db->get_where('orders', array('order_id' => $request_id ,))->row() ;
      
					$data['final_amount']= $final_amount ;
				
					$data['shipping']= $data['order']->shipping_charge ;	
					
					$data['sub_total']=  $sub_total ;
				
				
				   $this->load->view('Team/confirmdetails.php', $data);
				   
				   
				   
			}
			
			
			function order_detail_confirm($request_id){
			      is_team();
			    
			    	$data['result']= $this->Adminmodel->orderdetail($request_id);
			
			      $data['order']  = $this->db->get_where('orders', array('order_id' => $request_id ,))->row() ;
      
				
				
				   $this->load->view('Team/order_detail_confirm.php', $data);
				   
				   
			}
			public function Customers(){

				is_team();

				$data['messa']=$this->Adminmodel->Customers();
				
				$data['rm_list'] = $this->db->get('rm')->result();
		
			
				$this->load->view('Team/customer.php',$data);

			}
				public function edituser(){
						is_team();

					$id=$this->uri->segment(3);

				$where='id';

				$table='customerlogin';

				$data['edituser']=$this->Adminmodel->select_com_where($table,$where,$id);
				
					$data['rm_list'] = $this->db->get('rm')->result();
		

				$this->load->view('Team/edituser.php',$data);
			}
			public function adduser(){
						is_team();


				$this->load->view('Team/adduser.php');
			}
			public function updateuser(){
				is_team();

			
				$id=$_POST['id'];
				
				$mobile = $_POST['Mobile'] ; 
				$old_mobile = $_POST['old_Mobile'] ; 
				
				if($mobile !=  $old_mobile){
				
					$q = $this->db->select()
            				->where(array('phone'=>$mobile, ))
            				->from('customerlogin')
            				->get();
    	            	$mobile_allready  = $q->row();
    	            	
    	            if($mobile_allready){
    	                
    	                  $this->session->set_flashdata('msg' , 'Mobile ! Already Exist') ;
    	                  
    	                  redirect('Team/Edituser/'.$id) ; 
    	            }	
				}
					$email	=$_POST['email'];
					$old_email	=$_POST['old_email'];
				
					if($email !=  $old_email && empty($old_email)){
					$q = $this->db->select()
            				->where(array('email'=>$email, ))
            				->from('customerlogin')
            				->get();
    	            	$mobile_allready  = $q->row();
    	            	
    	            if($mobile_allready){
    	                
    	                  $this->session->set_flashdata('msg' , 'Email ! Already Exist') ;
    	                  
    	                 
    	                  	if($id){
    	                  	    
    	                  	    redirect('Team/Edituser/'.$id) ; 
    	                  	    
    	                  	}else{
    	                  	    
    	                  	     redirect('Team/adduser') ; 
    	                  	}
    	            }	
				}
				
				
				
				
				$data= array(

						'Owner' =>$_POST['cname'],
						'email'	=>$_POST['email'],
				 		'phone' =>$_POST['Mobile'],
						'Rm_id' =>$_POST['rm_id'],
						'Business' =>$_POST['bname'],
						'landline' =>$_POST['landline'],
						'PinCode' =>$_POST['pincode'],
						'Address' =>$_POST['address'],
						'ownertype'=>$_POST['ownertype'],
                        'btype'=>$_POST['btype'],

							);
							
				
					$pan_no = $_POST['pan_no'] ; 
					$adhar_no = $_POST['aadhar'] ; 
					$gst = $_POST['gst'] ; 
					
					
					
					if($pan_no){
					    
					    $data['PANNumber'] = $pan_no ;
					    
					}
					
					if($adhar_no){
					    
					    $data['	adhaar_no'] = $adhar_no ;
					    
					}
					
					if($gst){
					    
					    $data['GSTNumber'] = $gst ;
					    
					}
					
		 //==========================upload img==========
    	
    	 $path1=  base_url().'assets/visiting/';
    	 
    			if(!empty($_FILES["visting"]))
        {
            $upload_image1=$_FILES["visting"]["name"];
            $upload1 = move_uploaded_file($_FILES["visting"]["tmp_name"], "./assets/visiting/".$upload_image1);
            if($upload1){
                $data['vcard'] = $path1.$upload_image1;
            }
        }
        
        
					
		  //===================document =======================
        	 $path2=  base_url().'assets/images/';
        
        				if(!empty($_FILES["Certificate"]))
              {
            
            
            $upload_image1=$_FILES["Certificate"]["name"];
            $upload1 = move_uploaded_file($_FILES["Certificate"]["tmp_name"], "./assets/images/".$upload_image1);
            if($upload1){
                $data['gstimg'] = $path2.$upload_image1;
                
                
            }
        }
        
         $path3=  base_url().'assets/adhaar/';
         
         if(!empty($_FILES["Certificate1"])){
            
             $upload_image1=$_FILES["Certificate1"]["name"];
            $upload1 = move_uploaded_file($_FILES["Certificate1"]["tmp_name"], "./assets/adhaar/".$upload_image1);
            if($upload1){
                $data['adhaar_img'] = $path3.$upload_image1;
                
               
            }
        }
        
        
       
        //==================================
				
				$table='customerlogin';
				if($id){
				$where='id';
			
			    $this->Adminmodel->update_common($data,$table,$where,$id);
				}else{
					$data['password'] = md5($_POST['password']);
				//	pr($data);die;
					$this->Model->insert_common($table,$data);
				}

				redirect('Team/Customers');
			
			}
			
				public function insertuser(){
				is_team();

			
				// $id=$_POST['id'];
				
				$mobile = $_POST['Mobile'] ; 
				$old_mobile = $_POST['old_Mobile'] ; 
				
				if($mobile !=  $old_mobile){
				
					$q = $this->db->select()
            				->where(array('phone'=>$mobile, ))
            				->from('customerlogin')
            				->get();
    	            	$mobile_allready  = $q->row();
    	            	
    	            if($mobile_allready){
    	                
    	                  $this->session->set_flashdata('msg' , 'Mobile ! Already Exist') ;
    	                  
    	               //   redirect('Team/Edituser/'.$id) ; 
    	               
    	                redirect('Team/adduser') ;
    	            }	
				}
					$email	=$_POST['email'];
					$old_email	=$_POST['old_email'];
				
					if($email !=  $old_email && empty($old_email)){
					$q = $this->db->select()
            				->where(array('email'=>$email, ))
            				->from('customerlogin')
            				->get();
    	            	$mobile_allready  = $q->row();
    	            	
    	            if($mobile_allready){
    	                
    	                  $this->session->set_flashdata('msg' , 'Email ! Already Exist') ;
    	                  
    	                 
    	                  	if($id){
    	                  	    
    	                  	    redirect('Team/Edituser/'.$id) ; 
    	                  	    
    	                  	}else{
    	                  	    
    	                  	     redirect('Team/adduser') ; 
    	                  	}
    	            }	
				}
				
				
				$data= array(

						'Owner' =>$_POST['cname'],
						'email'	=>$_POST['email'],
				 		'phone' =>$_POST['Mobile'],
						'Rm_id' =>$_POST['rm_id'],
						'Business' =>$_POST['bname'],
						'landline' =>$_POST['landline'],
						'PinCode' =>$_POST['pincode'],
						'Address' =>$_POST['address'],
						'ownertype'=>$_POST['ownertype'],
						 'btype'=>$_POST['btype'],

							);
							
				
					$pan_no = $_POST['pan_no'] ; 
					$adhar_no = $_POST['aadhar'] ; 
					$gst = $_POST['gst'] ; 
					
					
					
					if($pan_no){
					    
					    $data['PANNumber'] = $pan_no ;
					    
					}
					
					if($adhar_no){
					    
					    $data['	adhaar_no'] = $adhar_no ;
					    
					}
					
					if($gst){
					    
					    $data['GSTNumber'] = $gst ;
					    
					}
					
		 //==========================upload img==========
    	
    	 $path1=  base_url().'assets/visiting/';
    	 
    			if(!empty($_FILES["visting"]))
        {
            $upload_image1=$_FILES["visting"]["name"];
            $upload1 = move_uploaded_file($_FILES["visting"]["tmp_name"], "./assets/visiting/".$upload_image1);
            if($upload1){
                $data['vcard'] = $path1.$upload_image1;
            }
        }
        
        
					
		  //===================document =======================
        	 $path2=  base_url().'assets/images/';
        
        				if(!empty($_FILES["Certificate"]))
              {
            
            
            $upload_image1=$_FILES["Certificate"]["name"];
            $upload1 = move_uploaded_file($_FILES["Certificate"]["tmp_name"], "./assets/images/".$upload_image1);
            if($upload1){
                $data['gstimg'] = $path2.$upload_image1;
                
                
            }
        }
        
         $path3=  base_url().'assets/adhaar/';
         
         if(!empty($_FILES["Certificate1"])){
            
             $upload_image1=$_FILES["Certificate1"]["name"];
            $upload1 = move_uploaded_file($_FILES["Certificate1"]["tmp_name"], "./assets/adhaar/".$upload_image1);
            if($upload1){
                $data['adhaar_img'] = $path3.$upload_image1;
                
               
            }
        }
        
        
      
        //==================================
				
				$table='customerlogin';
				if($id){
				$where='id';
			
			    $this->Adminmodel->update_common($data,$table,$where,$id);
				}else{
					$data['password'] = md5($_POST['password']);
				//	pr($data);die;
					$this->Model->insert_common($table,$data);
				}

				redirect('Team/Customers');
			
			}
			
			public function Rm_update(){
				is_team();

			
				$id=$_POST['id'];
				$data= array(

						'rm_name' =>$_POST['name'],
						'rm_email'	=>$_POST['email'],
						'rm_mobile' =>$_POST['Mobile']

							);
				
			$pass= 	$_POST['password'];
				$old_pass= 	$_POST['old_password'];
				
				if($old_pass != $pass ){
				    
				    $data['rm_password'] = md5($pass) ;
				}
				
				
				$table='rm';
				if($id){
				$where='id';
			
			    $this->Adminmodel->update_common($data,$table,$where,$id);
				}else{
					$data['password'] = md5($_POST['password']);
				//	pr($data);die;
					$this->Model->insert_common($table,$data);
				}

				redirect('Team/rmlist');
			
			}
				public function deleteuser(){
				is_team();
				$id=$this->uri->segment(3);
				 $this->Adminmodel->deluser($id);
				 redirect('Team/Customers');

			}
			public function Productupload(){

				is_team();

				/*$data['finish'] = $this->Model->finish();

				$data['Material'] = $this->Model->Material();

				$data['shape'] = $this->Model->shape();

				$data['color'] = $this->Model->colors();

				$data['Size'] = $this->Model->Size();

				*/
				$data['pcat']=$this->Adminmodel->Listparentcategory();

				$data['messagess']=$this->Adminmodel->category();

				$data['sub']=$this->Adminmodel->sub_category();
					$table='occasion';
				$data['occasion']=$this->Model->select_common($table);
				$table='recipient';
				$data['recipient']=$this->Model->select_common($table);

				$this->load->view('Team/Productupload.php',$data);

			}

			public function uploadvarient(){

				is_team();
			
				$arr=$_POST['discount'];
				$discount=implode(",",$arr);

				$image = $_FILES['file']['name'];

				$image1 = $_FILES['file1']['name'];

				$image2 = $_FILES['file2']['name'];

				$image3 = $_FILES['file3']['name'];
				$image4 = $_FILES['file4']['name'];

			    $url = base_url();




			    $path = $url."assets/product/".$image;

			    $path1 = $url."assets/product/".$image1;

			    $path2 = $url."assets/product/".$image2;

			    $path3 = $url."assets/product/".$image3;
			    $path4 = $url."assets/product/".$image4;





			    @unlink($path);

			    @unlink($path1);

			    @unlink($path2);

			    @unlink($path3);
			    @unlink($path4);


			    if(empty($_POST['sub_cat'])){
			    	$_POST['sub_cat']='0';
			    }

			     if(empty($_POST['local'])){
			    	$_POST['local']='0';
			    }
			     if(empty($_POST['metro'])){
			    	$_POST['metro']='0';
			    }
			     if(empty($_POST['other'])){
			    	$_POST['other']='0';
			    }
			     if(empty($discount)){
			    	$discount='0';
			    }
 							$m=$_POST['name'];
                            $title=$m.$_POST['sku'];
                           $name= str_replace(" ","-",$title);
				$data= array(

						'sku_code' =>$_POST['sku'],
						'parent_skucode' =>$_POST['psku'],

						'selling_price' =>$_POST['sprice'],

						'price' =>$_POST['aprice'],

						'pro_name' =>$_POST['name'],

						'main_image1' =>$path,

						'main_image2' =>$path1,

						'main_image3' =>$path2,

						'main_image4' =>$path3,

						'main_image5' =>$path4,

						'description' =>$_POST['desc'],

						'relation' =>$_POST['Rel'],

						'varient' =>$_POST['var'],

						'bullet1'		=>$_POST['point1'],

						'bullet2'		=>$_POST['point2'],

						'bullet3'		=>$_POST['point3'],

						'bullet4'		=>$_POST['point4'],

						'bullet5'		=>$_POST['point5'],

					
						'availability'			=>$_POST['avail'],
						'min_order_quan'			=>$_POST['minimum'],
						

						'highlights1'      =>$_POST['highlights1'],
						'highlights2'      =>$_POST['highlights2'],
						'highlights3'      =>$_POST['highlights3'],
						'pincode_local'     => 'local'  , //$_POST['local'],
						'pincode_metro'     =>  'metro',  //$_POST['metro'],
						'pincode_other'     =>  'other' , //$_POST['other'],
						
						'box_volume_weight'     =>$_POST['volume'],
						'discount_code'     =>$discount,
						'url'     =>$name,
						'gst'     =>$_POST['gst'],
						'gst_per'     =>$_POST['gstper'],
						'cod'     =>$_POST['cod']
						
						


							);

	





			    move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/product/".$image);

			    move_uploaded_file($_FILES["file1"]["tmp_name"], "./assets/product/".$image1);

			    move_uploaded_file($_FILES["file2"]["tmp_name"], "./assets/product/".$image2);

			    move_uploaded_file($_FILES["file3"]["tmp_name"], "./assets/product/".$image3);

			    move_uploaded_file($_FILES["file4"]["tmp_name"], "./assets/product/".$image4);
 				$this->Adminmodel->add_productvarient($data);

			    redirect('Team/variant/'.$_POST['psku']);

			}
			
			public function check_sku($sku){
			    
			    
			return   $row = $this->db->get_where('product_detail' ,array('sku_code' => $sku ))->row();
			}
			
			
				public function upload(){

				is_team();
				
			$skuu =	$_POST['sku'] ;
				
				if(!empty($this->check_sku($skuu))){
				    
				return    redirect('Team/Productupload');
				
				
				exit ;
				}
				$pro=$this->Adminmodel->productdesc();
				 $postionset=$pro[0]['Position']+1;
			
				$arr=$_POST['discount'];
				
					$parent_sku =$_POST['psku'];
					
				if(empty($parent_sku)){
				    
				    $parent_sku = $_POST['sku'] ;
				}
				
					$varient =$_POST['varient'];
					
					if(empty($varient)){
				    
				    $varient = 'parent' ;
				}	
				
				$discount=implode(",",$arr);

				$occval=$_POST['occval'];
				 $occvals=implode(",",$occval);

				$reci=$_POST['reci'];
				 $recis=implode(",",$reci);
				$image = $_FILES['file']['name'];

				$image1 = $_FILES['file1']['name'];

				$image2 = $_FILES['file2']['name'];

				$image3 = $_FILES['file3']['name'];
				$image4 = $_FILES['file4']['name'];

			    $url = base_url();
			    $returngift=$_POST['returngift'];
			    $rgift=implode(",", $returngift);
			    if(empty($rgift)){
			    	$rgift='0';
			    }


			    if(empty($_POST['sub_cat'])){
			    	$_POST['sub_cat']='0';
			    }

			     if(empty($_POST['local'])){
			    	$_POST['local']='0';
			    }
			     if(empty($_POST['metro'])){
			    	$_POST['metro']='0';
			    }
			     if(empty($_POST['other'])){
			    	$_POST['other']='0';
			    }
			     if(empty($discount)){
			    	$discount='0';
			    }
 						$m=$_POST['name'];
                        $title=$m.$_POST['sku'];
                        $name= str_replace(" ","-",$title);
                           
                         $par_cat =     $_POST['pcat'] ;
                         $cat =    $_POST['cat'] ;
                         $sub_cat =    $_POST['sub_cat'];
                         
	  date_default_timezone_set('Asia/Kolkata');
    $currentTime = date( 'Y-m-d');
    
                         
                         
				$data= array(

				    	'sku_code' =>$_POST['sku'],
						
				    	 'parent_sku' => $parent_sku ,
				 	 
				    	 'varient' => $varient ,

						'selling_price' =>$_POST['sprice'],   

						'price' =>$_POST['aprice'],

						'pro_name' =>$_POST['name'],

				// 		'main_image1' =>$path,

				//		'main_image2' =>$path1,

				// 		'main_image3' =>$path2,

				// 		'main_image4' =>$path3,

				// 		'main_image5' =>$path4,

						'parent_cat'	=>  implode(",",$par_cat),    //json_encode($par_cat) ,

						'category_id' => implode(",",$cat),          //json_encode($cat) ,

						'sub_catid' =>  implode(",",$sub_cat),      //json_encode($sub_cat),
						
						'weight'		=>$_POST['weight'],	
						
						'material'		=>$_POST['material'],
						
						'color'			=>$_POST['color'],
						
						'size'			 =>	 $_POST['size'],
						
						'box_volume_weight'     =>$_POST['volume'],
						
						'availability'			=>$_POST['avail'],
				
			    		'min_order_quan'			=>$_POST['minimum'],
	//new=========================================					
						
						 'low_alert' => $_POST['lowalert'] ,
						  
				  		'hsn_code'     =>$_POST['hsncode'],
				  		
				  		'other'  => $_POST['other'] ,
//====new===============================

						'bullet1'		=>$_POST['point1'],

						'bullet2'		=>$_POST['point2'],

						'bullet3'		=>$_POST['point3'],

						'bullet4'		=>$_POST['point4'],

						'bullet5'		=>$_POST['point5'],

						'description' =>$_POST['desc'],
						
                    	'meta_title'      =>$_POST['metatag'],
					
                    	'meta_keyword'	=>$_POST['metakey'],
					
                    	'meta_description'     =>$_POST['metadesc'],

                    	'gst_per'     =>$_POST['gstper'],
                   		'gst'     =>'2',
						'occasion'=>$occvals,
						
						'pincode_local'     => 'local' ,      //$_POST['local'],
						'pincode_metro'     => 'metro' ,      //$_POST['metro'],
						'pincode_other'     =>   'other' ,   //$_POST['other'],

			   	        'url'     =>$name,
			   	        'date' => $currentTime,
			   	        
				// 		'highlights1'      =>$_POST['highlights1'],
				// 		'highlights2'      =>$_POST['highlights2'],
				// 		'highlights3'      =>$_POST['highlights3'],
				// 		'discount_code'     =>$discount,
				// 		'cod'     =>$_POST['cod'],
			
				// 		'Position'=>$postionset,
				// 		'recipient'=>$recis,
				// 		'cancel_pro'	=>$_POST['cancel_pro']
 
							);
							
	//======IMAGE sECTION =======						

			  $path = $url."assets/product/".$image;
			  
			  
			    $data['main_image1'] = $path ;
			    

			    $path1 = $url."assets/product/".$image1;
			    
			    if($path1){
			    
			    	$data['main_image2'] =$path1 ;
			    }

			    $path2 = $url."assets/product/".$image2;
			    
			      if($path2){
			          
			          $data['main_image3'] =$path2 ;
			          
			      }

			    $path3 = $url."assets/product/".$image3;
			    
			     if($path3){
			    $data['main_image4'] =$path3 ;
			    
			     }
			    $path4 = $url."assets/product/".$image4;

             if($path3){
            	$data['main_image5'] =$path4 ;
            }

			    @unlink($path);

			    @unlink($path1);

			    @unlink($path2);

			    @unlink($path3);
			    @unlink($path4);

			     // pr($data);die;


			    move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/product/".$image);

			    move_uploaded_file($_FILES["file1"]["tmp_name"], "./assets/product/".$image1);

			    move_uploaded_file($_FILES["file2"]["tmp_name"], "./assets/product/".$image2);

			    move_uploaded_file($_FILES["file3"]["tmp_name"], "./assets/product/".$image3);

			    move_uploaded_file($_FILES["file4"]["tmp_name"], "./assets/product/".$image4);
			 //   pr($data);die;
			 
			 
			 
 			if($this->db->insert('product_detail',$data) ){
 			    
 			    foreach($par_cat as $pcat){
 			    
 			    $position_parent = array(
 			        
 			        'product_sku' => $_POST['sku'], 
 			        
 			        'parent_category' =>$pcat,
 			        
 			        );
 			        
 			        
 			        $this->db->insert('position_product',$position_parent) ;
 			    
 			    }
 			    
 			    foreach($cat as $catt){
 			    
 			    $position_cat = array(
 			        
 			        'product_sku' => $_POST['sku'], 
 			        
 			        'category' =>$catt,
 			        
 			        );
 			        
 			        
 			        $this->db->insert('position_product',$position_cat) ;
 			    
 			    }
 			    
 			     redirect('Team/ListProduct');
 			    
 			    
 			}else{
 			    
 			    // echo "not insert" ;
 			    
 			         redirect('Team/Productupload');
 			}

			  

			}
			public function excelupload(){
				$this->load->view('Team/uploadexcel.php');
			}

	public function excel($id){
is_team();

	$where='id';

				$table='excelsheet';

				$data=$this->Adminmodel->select_com_where($table,$where,$id);

        $handle = fopen("assets/excelsheet/".$data[0]['sheetname'], "r");

        $c = 0;

$firstline =true;

$i =1 ;

       while(($filesop = fgetcsv($handle, 100000, ",")) !== false)

 {
     
     if($i != 1 && $filesop[0]){
         
    						$m=$filesop[7];
                            $title=$m.$filesop[0];
                           $name= str_replace(" ","-",$title);

 	 if(empty($filesop[6])){
			    	$filesop[6]='0';
			    }

			     if(empty($filesop[11])){
			    	$filesop[11]='0';
			    }else{
			    	$filesop[11]='local';
			    }
			     if(empty($filesop[12])){
			    	$filesop[12]='0';
			    }else{
			    	$filesop[12]='metro';
			    }
			     if(empty( $filesop[13])){
			    	 $filesop[13]='0';
			    }else{
			    	$filesop[13]='other';
			    }
			     if(empty($filesop[10])){
			    	$filesop[10]='0';
			    }

 if(empty($filesop[34])){
			    	$filesop[34]='0';
			    }

			    $url = base_url();
    			$path = $url."/assets/product/".$filesop[10];
			    $path1 = $url."/assets/product/".$filesop[11];
			    $path2 = $url."/assets/product/".$filesop[12];
			    $path3 = $url."/assets/product/".$filesop[13];
			    $path4 = $url."/assets/product/".$filesop[14];
			    
            	  date_default_timezone_set('Asia/Kolkata');
                $currentTime = date( 'Y-m-d');
    

 	$data= array(

  'sku_code' => trim($filesop[0]),
  'relation' => $filesop[1] ,
  'varient' => $filesop[2] ,
  'parent_sku'  => $filesop[3],
  'category_id' => $filesop[4],
  'url' => trim($name),
  'parent_cat'=> $filesop[5],
  'sub_catid'=> $filesop[6],
  'pro_name'=> $filesop[7],
  'price' => $filesop[8],
  'selling_price' => $filesop[9],
  'pincode_local'=> 'local' ,     // $filesop[11],
  'pincode_metro'=>  'metro' ,   //$filesop[12],
  'pincode_other' =>  'other' ,  //  $filesop[13],
   'main_image1' => $path,
  'main_image2'=>$path1,
  'main_image3'=>$path2,
  'main_image4'=>$path3,
  'main_image5' => $path4,
  'description' => $filesop[15],
  'bullet1'=>$filesop[16],
  'bullet2'=>$filesop[17],
  'bullet3'=>$filesop[18],
  'bullet4'=>$filesop[19],  
  'bullet5'=>$filesop[20],

  'size'=>$filesop[21], 
  'weight'=>$filesop[22],
  'color'=>$filesop[23],
  'material' => $filesop[24],
  'other' => $filesop[25],
  'box_volume_weight' => $filesop[26],
 'low_alert' => $filesop[27],
  'min_order_quan'=>$filesop[28],
  'availability'=>$filesop[29],
  'hsn_code' => $filesop[30],
//   'gst' => $filesop[29],
  
  'gst_per' => $filesop[31],
  
  'meta_title'=>$filesop[32],
  'meta_keyword'=>$filesop[33],
  'meta_description' =>$filesop[34],
  
  'occasion'=>$filesop[35],
  'date' => $currentTime ,
  
//   'recipient'=>$filesop[42]



 );

	$this->Adminmodel->add_product($data);

  }
    
     $i ++ ;
     
 } // end while 

redirect('Team/ListProduct');

 

			}

			public function updateproduct(){

				is_team();
				
			
				//pr($_FILES);die;
				
				 	$id=$_POST['idds'];
			
				 		$arr=$_POST['discount'];
				$discount=implode(",",$arr);

				$image = $_FILES['file']['name'];

				$image1 = $_FILES['file1']['name'];

				$image2 = $_FILES['file2']['name'];

				$image3 = $_FILES['file3']['name'];
				$image4 = $_FILES['file4']['name'];

			    $url = base_url();
 					$returngift=$_POST['returngift'];

			    $rgift=implode(",", $returngift);
			    	$occval=$_POST['occval'];
				 $occvals=implode(",",$occval);
				 
				 
			

				$reci=$_POST['reci'];
				 $recis=implode(",",$reci);
			    if(empty($image))

			    {

			    	$path=$_POST['paths'];

			    }

			    else

			    {

			    	$path = $url."/assets/product/".$image;
			    }

			     if(empty($image1))

			    {

			    	$path1=$_POST['paths1'];
			    }

			    else

			    {

			    	$path1 = $url."/assets/product/".$image1;

			    }



               if(empty($image2))

			    {

			    	$path2=$_POST['paths2'];

			    }

			    else

			    {

			    	$path2 = $url."assets/product/".$image2;

	
			    }



              if(empty($image3))

			    {

			    	$path3=$_POST['paths3'];

			    }

			    else

			    {

			    	$path3 = $url."assets/product/".$image3;

			    }


if(empty($image4))

			    {

			    	$path4=$_POST['paths4'];

			    }

			    else

			    {

			    	$path4 = $url."assets/product/".$image4;

			    }



			    @unlink($path);
			    @unlink($path1);
			    @unlink($path2);
			    @unlink($path3);
			    @unlink($path4);

			    if(empty($_POST['sub_cat'])){
			    	$_POST['sub_cat']='0';
			    }

			      if(empty($_POST['local'])){
			    	$_POST['local']='0';
			    }
			     if(empty($_POST['metro'])){
			    	$_POST['metro']='0';
			    }
			     if(empty($_POST['other'])){
			    	$_POST['other']='0';
			    }
			     if(empty($discount)){
			    	$discount='0';
			    }

			    $m=$_POST['name'];
                          $title=$m.$_POST['sku'];
                         $name= str_replace(" ","-",$title);
                         $par_cat =     $_POST['pcat'] ;
                         $cat =    $_POST['cat'] ;
                         $sub_cat =    $_POST['sub_cat'];
                         
                       	$parent_sku =$_POST['psku'];
				if(empty($parent_sku)){
				    
				    $parent_sku = $_POST['sku'] ;
				}
                           
				$data= array(

						'sku_code' =>$_POST['sku'],
						
					 	 'parent_sku' => $parent_sku ,

						'selling_price' =>$_POST['sprice'],

						'price' =>$_POST['aprice'],

						'pro_name' =>$_POST['name'],

						'main_image1' =>$path,

						'main_image2' =>$path1,

						'main_image3' =>$path2,

						'main_image4' =>$path3,

						'main_image5' =>$path4,

						'description' =>$_POST['desc'],
						
						'parent_cat'	=>  implode(",",$par_cat),    //json_encode($par_cat) ,

						'category_id' => implode(",",$cat),          //json_encode($cat) ,

						'sub_catid' =>  implode(",",$sub_cat),      //json_encode($sub_cat),
					
						'bullet1'		=>$_POST['point1'],

						'bullet2'		=>$_POST['point2'],

						'bullet3'		=>$_POST['point3'],

						'bullet4'		=>$_POST['point4'],

						'bullet5'		=>$_POST['point5'],

						'weight'		=>$_POST['weight'],	

						'material'		=>$_POST['material'],

					
						'color'			=>$_POST['color'],

						'availability'			=>$_POST['avail'],
						
						'min_order_quan'			=>$_POST['minimum'],
						
						'meta_title'      =>$_POST['metatag'],
						
						'meta_keyword'      =>$_POST['metakey'],
						'hsn_code'     =>$_POST['hsncode'],
				  		
						'low_alert' => $_POST['lowalert'] ,
						'occasion'        =>$occvals,
						'gst_per'         =>$_POST['gstper'],
						
			    	
				// 		'gst'             =>$_POST['gst'],
				// 		'highlights1'      =>$_POST['highlights1'],
				// 		'highlights2'      =>$_POST['highlights2'],
				// 		'highlights3'      =>$_POST['highlights3'],
				// 		'size'			 =>	 $_POST['size'],	
						'meta_description'     =>$_POST['metadesc'],

						'pincode_local'     =>  'local'  ,//$_POST['local'],
						'pincode_metro'     =>  'metro' ,      //$_POST['metro'],
						'pincode_other'     =>     'other' ,      //$_POST['other'],
						'box_volume_weight'     =>$_POST['volume'],
						'discount_code'     =>$discount,
						'url'     =>$name,
				// 		'cod'     =>$_POST['cod'],
					
				// 		'recipient'=>$recis,
					
				// 		'meta_keyword'	=>$_POST['metakey'],
				// 		'cancel_pro'	=>$_POST['cancel_pro']

							);


			    move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/product/".$image);
			    move_uploaded_file($_FILES["file1"]["tmp_name"], "./assets/product/".$image1);
			    move_uploaded_file($_FILES["file2"]["tmp_name"], "./assets/product/".$image2);
			    move_uploaded_file($_FILES["file3"]["tmp_name"], "./assets/product/".$image3);
			    move_uploaded_file($_FILES["file4"]["tmp_name"], "./assets/product/".$image4);
			    	
                $this->db->where('id', $id);
                $this->db->update('product_detail', $data);
	    	 

			 //   $this->Adminmodel->updateproduct($data,$id);


		    redirect('Team/ListProduct');

			}



public function editvarient(){
	is_team();
										 $id=$this->uri->segment(3);
                                                    $where='id';
                                                  $table='product';
                                                  $data['messagess']=$this->Adminmodel->select_common_where($table,$where,$id);
                                                  $this->load->view('Team/editvarientproduct.php',$data);
}

			public function updatevarientproduct(){

				is_team();
				//pr($_FILES);die;
				 	$id=$_POST['idd'];
				 		$arr=$_POST['discount'];
				$discount=implode(",",$arr);

				$image = $_FILES['file']['name'];

				$image1 = $_FILES['file1']['name'];

				$image2 = $_FILES['file2']['name'];

				$image3 = $_FILES['file3']['name'];
				$image4 = $_FILES['file4']['name'];

			    $url = base_url();

			    if(empty($image))

			    {

			    	$path=$_POST['paths'];

			    	



			    }

			    else

			    {

			    	$path = $url."/assets/product/".$image;

			    	



			    }

			     if(empty($image1))

			    {

			    	$path1=$_POST['paths1'];

			    	



			    }

			    else

			    {

			    	$path1 = $url."/assets/product/".$image1;

			    	



			    }



               if(empty($image2))

			    {

			    	$path2=$_POST['paths2'];

			    	



			    }

			    else

			    {

			    	$path2 = $url."assets/product/".$image2;

			    	



			    }



              if(empty($image3))

			    {

			    	$path3=$_POST['paths3'];

			    	



			    }

			    else

			    {

			    	$path3 = $url."assets/product/".$image3;

			    	



			    }


if(empty($image4))

			    {

			    	$path4=$_POST['paths4'];

			    	



			    }

			    else

			    {

			    	$path4 = $url."assets/product/".$image4;

			    	



			    }







			    @unlink($path);

			    @unlink($path1);

			    @unlink($path2);

			    @unlink($path3);
			    @unlink($path4);

			  

			   


			    if(empty($_POST['sub_cat'])){
			    	$_POST['sub_cat']='0';
			    }

			      if(empty($_POST['local'])){
			    	$_POST['local']='0';
			    }
			     if(empty($_POST['metro'])){
			    	$_POST['metro']='0';
			    }
			     if(empty($_POST['other'])){
			    	$_POST['other']='0';
			    }
			     if(empty($discount)){
			    	$discount='0';
			    }

			    $m=$_POST['name'];
                            $title=$m.$_POST['sku'];
                           $name= str_replace(" ","-",$title);
					$data= array(

						'sku_code' =>$_POST['sku'],
						

						'selling_price' =>$_POST['sprice'],

						'price' =>$_POST['aprice'],

						'pro_name' =>$_POST['name'],

						'main_image1' =>$path,

						'main_image2' =>$path1,

						'main_image3' =>$path2,

						'main_image4' =>$path3,

						'main_image5' =>$path4,

						'description' =>$_POST['desc'],

						'relation' =>$_POST['Rel'],

						'varient' =>$_POST['var'],

						'bullet1'		=>$_POST['point1'],

						'bullet2'		=>$_POST['point2'],

						'bullet3'		=>$_POST['point3'],

						'bullet4'		=>$_POST['point4'],

						'bullet5'		=>$_POST['point5'],

					
						'availability'			=>$_POST['avail'],
						'min_order_quan'			=>$_POST['minimum'],
						

						'highlights1'      =>$_POST['highlights1'],
						'highlights2'      =>$_POST['highlights2'],
						'highlights3'      =>$_POST['highlights3'],
						'pincode_local'     =>$_POST['local'],
						'pincode_metro'     =>$_POST['metro'],
						'pincode_other'     =>$_POST['other'],
						
						'box_volume_weight'     =>$_POST['volume'],
						'discount_code'     =>$discount,
						'url'     =>$name,
						'gst'     =>$_POST['gst'],
						'gst_per'     =>$_POST['gstper'],
						'cancel_pro'	=>$_POST['cancel_pro']
						
						


							);




			    move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/product/".$image);

			    move_uploaded_file($_FILES["file1"]["tmp_name"], "./assets/product/".$image1);

			    move_uploaded_file($_FILES["file2"]["tmp_name"], "./assets/product/".$image2);

			    move_uploaded_file($_FILES["file3"]["tmp_name"], "./assets/product/".$image3);
			    move_uploaded_file($_FILES["file4"]["tmp_name"], "./assets/product/".$image4);
			    	




			    $this->Adminmodel->updateproductvarient($data,$id);


			    redirect('Team/variant/'.$_POST['par']);

			}	
			
			
			public function ListProduct(){

				is_team();

				/*$table='page';

				$data['page_type']=$this->Adminmodel->select_com($table);*/

				$check=$this->Adminmodel->ListProduct();
				
				
				$table='parent_category';
				$data['parent_category']=$this->Adminmodel->select_com($table);
				
				$price = array();
				
				foreach ($check as $key => $row)
				{
				    
    			$price[$key] = $row['id'];
    			
    	    	}
				array_multisort($price, SORT_DESC, $check);
				//pr($price);die;
				foreach ($price as $key ) {
						
				$id=$key;
				$where='id';
				$table='product_detail';

				$m[]=$this->Adminmodel->select_com_where($table,$where,$id);
				
			
			}
			
				foreach ($m as $final) {
					$data['messages'][]=$final[0];
				}
				
				
				// pr($data['messages']);die;
				$this->load->view('Team/ListProduct.php',$data);

			}
			
			
			//====list =======
			
						public function ListProductnew(){

				is_team();

				/*$table='page';

				$data['page_type']=$this->Adminmodel->select_com($table);*/

				$m[]=$this->Adminmodel->ListProduct();
				
				
			
				
				foreach ($m as $final) {
					$data['messages'][]=$final[0];
				}
				//pr($data['messages']);die;
				$this->load->view('Team/ListProduct.php',$data);

			}
			
			
			//=========end list =======
			
			public function Listcategory3(){
				is_team();
				$id=5;

				$where='parent_id';

				$table='category';

				$data['messagess']=$this->Adminmodel->select_com_where($table,$where,$id);
				//pr($data);
				$this->load->view('Team/Listcategory3.php',$data);

			}

				public function productbycategories(){

				is_team();

				/*$table='page';

				$data['page_type']=$this->Adminmodel->select_com($table);*/
				$id= $_POST['cat'];
				$data['messages']=$this->Adminmodel->ListcatProduct($id);
				$data['current_uri'] = $_POST['cat'];
					$table='parent_category';
				$data['parent_category']=$this->Adminmodel->select_com($table);

				$this->load->view('Team/ListProduct.php',$data);

			}



			public function Editproduct(){

				is_team();

				$id = $this->uri->segment(3);	

			
				$data['pcat']=$this->Adminmodel->Listparentcategory();

				$data['cat']=$this->Adminmodel->category();

				$data['sub']=$this->Adminmodel->sub_category();

				$data['mes'] = $this->Adminmodel->Editproduct_detail($id);

				// pr($data['mes']);die;
				$table='occasion';
				$data['occasion']=$this->Model->select_common($table);
				$table='recipient';
				$data['recipient']=$this->Model->select_common($table);
				//pr($data['message']);die;

				$this->load->view('Team/editproduct.php',$data);

				

			}



			public function deleteproduct(){

				is_team();

				$id = $this->uri->segment(3);

				$this->Adminmodel->deleteproduct($id);

				redirect('Team/ListProduct');

			}

public function deletevarient(){

				is_team();

				$id = $this->uri->segment(3);
				$idd = $this->uri->segment(4);

				$this->Adminmodel->deletevarientproduct($id);

				redirect('Team/variant/'.$idd);

			}

			public function category(){

				is_team();

				$data['pcat']=$this->Adminmodel->Listparentcategory();

				$this->load->view('Team/Addcategory.php',$data);

			}
			public function category3(){

				is_team();

				$data['pcat']=$this->Adminmodel->Listparentcategory();

				$this->load->view('Team/Addcategory3.php',$data);

			}

			public function Addcategory(){

				is_team();
				$id= $_POST['pcat'];

				$where='parent_id';

				$table='category';

				$cat=$this->Adminmodel->select_com_where($table,$where,$id);
				rsort($cat);
				
				 
				$str=$cat[0]['id'];
				$f= ++$str;

				
				$data= array(
					'id'=>$f,
					'name' => $_POST['name'],
					'parent_id' => $_POST['pcat']

							);

				$this->Adminmodel->Addcategory($data);

				$this->Listcategory();

			}
			

			public function Listcategory(){

				is_team();

				$data['messagess']=$this->Adminmodel->Listcategory();

				$this->load->view('Team/Listcategory.php',$data);

			}
			
				public function parentwise_category($id){

				is_team();

				$data['messagess']=$this->Adminmodel->parentwise_category($id);

				$this->load->view('Team/parentwisecategory.php',$data);

			}

			public function updatecategory(){

				is_team();

				//pr($_POST);die;

               $table='category';

               $where='id';

				$id =$_POST['id'];

				$data= array(

						

						'name' =>$_POST['catname']

						

							);

			    $this->Adminmodel->update_common($data,$table,$where,$id);



			  



			    $this->Listcategory();

			}

			public function Editcategory(){

				is_team();

				$id = $this->uri->segment(3);	

				
				

				$data['messagess'] = $this->Adminmodel->Editcategory($id);

				//pr($data);die;

				$this->load->view('Team/editcategory.php',$data);

				

			}

			public function deletecategory(){

				is_team();

				$id = $this->uri->segment(3);

				$this->Adminmodel->deletecategory($id);

				redirect('Team/Listcategory');

			}



				public function updatecategory3(){

				is_team();

				//pr($_POST);die;

               $table='category';

               $where='id';

				$id =$_POST['id'];

				$data= array(

						

						'name' =>$_POST['catname']

						

							);

			    $this->Adminmodel->update_common($data,$table,$where,$id);



			  



			    $this->Listcategory3();

			}

			public function Editcategory3(){

				is_team();

				$id = $this->uri->segment(3);	

				
				

				$data['messagess'] = $this->Adminmodel->Editcategory($id);

				//pr($data);die;

				$this->load->view('Team/editcategory3.php',$data);

				

			}

			public function deletecategory3(){

				is_team();

				$id = $this->uri->segment(3);

				$this->Adminmodel->deletecategory($id);

				redirect('Team/Listcategory3');

			}


// =======Home Page  Deals =======

			public function Home_Page_Deals(){

				is_team();

				$this->load->view('Team/HomePageDeals.php');

			}

	public function AddHome_Page_Deals(){

				is_team();
				
			        	$name =  $_POST['Name'];
				
				     $flag = str_replace(" ","_",$name);

				$data= array(

					'name' => $_POST['Name'],
					
					'position' => $_POST['position'],
					
					'flag_code' => $flag,

							);

                $this->db->insert('home_page_deals' , $data) ;


				// $this->Adminmodel->Addparentcategory($data);

				redirect('Team/Listhome_deals');

			}
			
			public function Listhome_deals(){

				is_team();

				$data['messagess']=$this->Adminmodel->list_homedeals();

				$this->load->view('Team/list_homedeals.php',$data);

			}
			
			
			
			function homedeals_position(){
					is_team();

					  	$id =$_POST['id'];
					  	$type =$_POST['type'];
					$data = array('position' => $type ,) ;
		
			    $this->db->where('id', $id);
                $this->db->update('home_page_deals', $data);
	
				echo "done" ;
    
			}	
			function homedeals_name(){
					is_team();

					  	$id =$_POST['id'];
					  	$type =$_POST['type'];
					$data = array('Name' => $type ,) ;
		
			    $this->db->where('id', $id);
                $this->db->update('home_page_deals', $data);
	
				echo "done" ;
    
			}
			
				public function Deletehomedeals(){

				is_team();

				$id = $this->uri->segment(3);

				$this->Adminmodel->Deletehomedeals($id);

				redirect('Team/Listhome_deals');

			}


	
			function dealsproduct_position(){
					is_team();

					  	$id =$_POST['id'];
					  	$type =$_POST['type'];
					$data = array('home_deals_position' => $type ,) ;
		
			    $this->db->where('id', $id);
                $this->db->update('product_detail', $data);
	
				echo "done" ;
    
			}	
			
			
			
				function parent_position(){
					is_team();

					  	$id =$_POST['id'];
					  	$type =$_POST['type'];
					$data = array('Position' => $type ,) ;
		
			    $this->db->where('id', $id);
                $this->db->update('parent_category', $data);
	
				echo "done" ;
    
			}		function cat_position(){
					is_team();

					  	$id =$_POST['id'];
					  	$type =$_POST['type'];
				    	$data = array('Position' => $type ,) ;
		
        			    $this->db->where('id', $id);
                        $this->db->update('category', $data);
	
				echo "done" ;
    
			}	
// ===============================

			public function parentcategory(){

				is_team();

				$this->load->view('Team/parentcategory.php');

			}

			public function Addparentcategory(){

				is_team();

				$data= array(

					'name' => $_POST['parent']

							);

				$this->Adminmodel->Addparentcategory($data);

				redirect('Team/Listparentcategory');

			}

			public function updateparent(){

				is_team();

               $table='parent_category';

               $where='id';

				$id =$_POST['id'];

				$data= array(

						

						'name' =>$_POST['par_name']

						

							);

			    $this->Adminmodel->update_common($data,$table,$where,$id);



			  



			   redirect('Team/Listparentcategory');

			}

			public function Listparentcategory(){

				is_team();

				$data['messagess']=$this->Adminmodel->Listparentcategory();

				$this->load->view('Team/Listparentcategory.php',$data);

			}

			public function Editparent(){

				is_team();

				$id = $this->uri->segment(3);	

				$data['messagess'] = $this->Adminmodel->Editparent($id);

				//pr($data);die;

				$this->load->view('Team/editparent.php',$data);

				

			}

			public function Deleteparent(){

				is_team();

				$id = $this->uri->segment(3);

				$this->Adminmodel->deleteparent($id);

				redirect('Team/Listparentcategory');

			}





			public function subcategory(){

				is_team();


				$data['messages']=$this->Adminmodel->Listcategory();



				$this->load->view('Team/Addsubcategory.php',$data);

			}

			public function Addsubcategory(){

				is_team();
						 $id=$_POST['cat'];

				$where='cat_id';

				$table='sub_category';

				$scat=$this->Adminmodel->select_com_where($table,$where,$id);
				if(empty($scat)){
				$f=$_POST['cat'].'01';
				}else{
				rsort($scat);
				
				// $id=$scat[0]['id']+1;
			 $str=$scat[0]['id'];
				 $f= ++$str;
				}
				$data= array(
					'id'=>$f,
					'cat_id' => $_POST['cat'],

					'subcategory_name' => $_POST['name']


							);



				$this->Adminmodel->Addsubcategory($data);

				$this->Listsubcategory();

			}

			public function Listsubcategory(){

				is_team();

				$data['messages']=$this->Adminmodel->Listsubcategory();

				$this->load->view('Team/Listsubcategory.php',$data);

			}

			public function updatesubcategory(){

				is_team();

				//pr($_POST);die;

               $table='sub_category';

               $where='id';

				$id =$_POST['id'];

				$data= array(

						'cat_id' =>$_POST['catid'],

						'subcategory_name' =>$_POST['cname']

						

							);

			    $this->Adminmodel->update_common($data,$table,$where,$id);



			  



			    $this->Listsubcategory();

			}

			public function Editsubcategory(){

				is_team();

				$id = $this->uri->segment(3);	

				$data['message1']=$this->Adminmodel->Listcategory();


				

				$data['messages'] = $this->Adminmodel->Editsubcategory($id);

				//pr($data);die;

				$this->load->view('Team/editsubcategory.php',$data);

				

			}

			public function deletesubcategory(){

				is_team();

				$id = $this->uri->segment(3);

				$this->Adminmodel->deletesubcategory($id);

				redirect('Team/Listsubcategory');

			}

			public function subcategory3(){

				is_team();


						
				$id=5;

				$where='parent_id';

				$table='category';

				$data['messages']=$this->Adminmodel->select_com_where($table,$where,$id);



				$this->load->view('Team/Addsubcategory3.php',$data);

			}

			public function listsubcategory3(){

				is_team();


						
				$id=5;

				$where='parent_id';

				$table='category';

				$data['messagess']=$this->Adminmodel->select_com_where($table,$where,$id);



				$this->load->view('Team/Listcategory3.php',$data);

			}

			public function Addsubcategory3(){

				is_team();

				$data= array(

					'cat_id' => $_POST['cat'],

					'name' => $_POST['name']


							);



					$table='sub_cat3';
					$this->Adminmodel->insert_common($data,$table);

				$this->Listsubcategory3();

			}
            public function addrms(){

				is_team();
                $image4 = $_FILES['file']['name'];

                 $url = base_url();
                 $path = $url."assets/sidebanner/".$image4;
                move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/sidebanner/".$image4);
				$data= array(

					'rm_name' => $_POST['name'],
                    'rm_email' => $_POST['email'],
                    'rm_mobile' => $_POST['mobile'],
                    'rm_password' => $_POST['password'],
					'rm_file' => $path
                	);
                	$table='rm';
					$this->Adminmodel->insert_common($data,$table);

				$this->rmlist();
               // $this->load->view('Team/rmlist.php');
			}

			public function Listgiftproduct(){

				is_team();

			
					$table='giftproduct';
				$data['messages']=$this->Adminmodel->select_com($table);

				$this->load->view('Team/Listgiftproduct.php',$data);

			}


			public function updatesubcategory3(){

				is_team();

				//pr($_POST);die;

               $table='sub_cat3';

               $where='id';

				$id =$_POST['id'];

				$data= array(

						'cat_id' =>$_POST['catid'],

						'name' =>$_POST['cname']

						

							);

			    $this->Adminmodel->update_common($data,$table,$where,$id);



			  



			    $this->Listsubcategory3();

			}

			public function Editsubcategory3(){

				is_team();

				$id = $this->uri->segment(3);	
			
				$where='id';
				$table='sub_cat3';

				$data['messages'] = $this->Adminmodel->select_common_where($table,$where,$id);

				//pr($data);die;

				$this->load->view('Team/editsubcategory3.php',$data);

				

			}

			public function deletesubcategory3(){

				is_team();

			
			$id = $this->uri->segment(3);
				$table='sub_cat3';
				$where='id';
				$this->Model->delete_common($table,$where,$id);

				redirect('Team/Listsubcategory3');

			}



			public function listpincode(){

				is_team();
				$table='pincode';
				$data['messages']=$this->Adminmodel->select_common($table);
				$this->load->view('Team/listpincode.php',$data);

			}


			public function updatepincode(){

				is_team();

				//pr($_POST);die;

               $table='pincode';

               $where='id';

				$id =$_POST['id'];

				$data= array(

						'pincodecat' =>$_POST['type'],
							'post_office' =>$_POST['post_office'],
								'area' =>$_POST['area'],
								'state' =>$_POST['state'],
						'name' =>$_POST['catname']

						

							);

			    $this->Adminmodel->update_common($data,$table,$where,$id);



			  



			    $this->listpincode();

			}

			public function Editpincode(){

				is_team();

				$id = $this->uri->segment(3);	
				$where='id';
				$table='pincode';

				$data['messages'] = $this->Adminmodel->select_common_where($table,$where,$id);

				//pr($data);die;

				$this->load->view('Team/Editpincode.php',$data);

				

			}
			public function pincode(){
				is_team();
					$this->load->view('Team/pincode.php');
			}
			public function addpincode(){

				is_team();
				$data = array(
								'pincodecat' =>$_POST['type'],
								'post_office' =>$_POST['post_office'],
								'area' =>$_POST['area'],
								'state' =>$_POST['state'],
								'name' =>$_POST['catname']
							 );
					$table='pincode';
					$this->Model->insert_common($table,$data);
					redirect('Team/listpincode');

			}

			public function deletepincode(){

				is_team();

				$id = $this->uri->segment(3);
				$table='pincode';
				$where='id';
				$this->Model->delete_common($table,$where,$id);

				redirect('Team/listpincode');

			}

			
				public function listdiscountslab(){

				is_team();
				$table='discountslab';
				$data['messages']=$this->Adminmodel->select_common($table);
				$this->load->view('Team/listdiscountslab.php',$data);

			}


			public function updatediscountslab(){

				is_team();

				//pr($_POST);die;
$str = $_POST['discount'];
preg_match_all('!\d+!', $str, $matches);
 $var = implode(' ', $matches[0]);

$stra = $_POST['quan'];
preg_match_all('!\d+!', $stra, $matches);
 $quan = implode(' ', $matches[0]);

               $table='discountslab';

               $where='id';

				$id =$_POST['id'];

				$data= array(

							'disc_slab' =>$_POST['quan'],
								'disc_per' =>$_POST['discount'],
								'disc_code' =>$_POST['code'],
								'discount' =>$var,
								'quanity' =>$quan,
								'disc_show' =>$_POST['pgeshow']

						

							);

			    $this->Adminmodel->update_common($data,$table,$where,$id);



			  



			    $this->listdiscountslab();

			}

			public function Editdiscountslab(){

				is_team();

				$id = $this->uri->segment(3);	
				$where='id';
				$table='discountslab';

				$data['messages'] = $this->Adminmodel->select_common_where($table,$where,$id);

				//pr($data);die;

				$this->load->view('Team/Editdiscountslab.php',$data);

				

			}
			public function discountslab(){
is_team();
					$this->load->view('Team/discountslab.php');
			}
			public function adddiscountslab(){
			is_team();
				$str = $_POST['discount'];
preg_match_all('!\d+!', $str, $matches);
 $var = implode(' ', $matches[0]);

 $stra = $_POST['quan'];
preg_match_all('!\d+!', $stra, $matches);
 $quan = implode(' ', $matches[0]);
				$data = array(
								'disc_slab' =>$_POST['quan'],
								'disc_per' =>$_POST['discount'],
								'disc_code' =>$_POST['code'],
								'discount' =>$var,
								'quanity' =>$quan,
								'disc_show' =>$_POST['pgeshow']
							 );
				$table='discountslab';
					$this->Model->insert_common($table,$data);
					redirect('Team/listdiscountslab');

			}

			public function deletediscountslab(){

				is_team();

				$id = $this->uri->segment(3);
				$table='discountslab';
				$where='id';
				$this->Model->delete_common($table,$where,$id);

				redirect('Team/listdiscountslab');

			}

			
public function listimage(){
is_team();
					$this->load->view('Team/listimage.php');
			}
			public function unlinkimage(){
			is_team();
				$id=$this->uri->segment(3);
				
				$path = "assets/product/".$id;
				
				unlink($path);
				redirect('Team/listimage');
			}
			public function uploadbulkimage(){
is_team();
					$this->load->view('Team/uploadimage.php');
			}
			public function addimage(){
			is_team();	
				$val=count($_FILES['file']['name']);
		
			     
    for($i = 0; $i <= $val ; $i++) {
        $name       = $_FILES['file']['name'][$i];
        $type       = $_FILES['file']['type'][$i];
        $tmp_name   = $_FILES['file']['tmp_name'][$i];
        $error     = $_FILES['file']['error'][$i];
        $size       = $_FILES['file']['size'][$i];

       
          if ($error > 0)
            {
            echo "Return Code: " .$error . "<br>";
            }
          else
            {               
            if (file_exists("assets/product/" . $name))
              {
              echo $aFile["file"]["name"] . " already exists. ";
              }
            else
              {
              move_uploaded_file($tmp_name,
              "assets/product/" . $name); 
              echo "Image Uploaded Successfully";
              }
            }
          
             
    }
			redirect('Team/listimage');

			}
			public function inventory(){

				is_team();

				$table='product';
				$data['messages']=$this->Adminmodel->select_com($table);

				$table='product_detail';
				$data['product_detail']=$this->Adminmodel->select_com($table);

				$table='category';
				$data['parent_category']=$this->Adminmodel->select_com($table);
				$data['current_uri'] = $this->uri->segment(2);
				$this->load->view('Team/inventory',$data);					

			}

			public function outofstock(){

				is_team();

					$id = '0';	
				$where='availability';
				$table='product';

				$data['messages'] = $this->Adminmodel->select_common_where($table,$where,$id);


					$id = '0';	
				$where='availability';
				$table='product_detail';

				$data['product_detail'] = $this->Adminmodel->select_common_where($table,$where,$id);

					$table='parent_category';
				$data['parent_category']=$this->Adminmodel->select_com($table);

				$data['current_uri'] = $this->uri->segment(2);
				$this->load->view('Team/inventory',$data);					

			}
			public function lowstock(){

				is_team();

					
				
			

				$data['messages'] = $this->Model->product();

				$data['product_detail'] = $this->Model->varient();
					$table='parent_category';
				$data['parent_category']=$this->Adminmodel->select_com($table);

				$data['current_uri'] = $this->uri->segment(2);
				$this->load->view('Team/inventory',$data);					

			}
			public function invent_categories(){

				is_team();
            
                $inventory_type = $this->input->post('inventory_type') ;
                
				$id =$_POST['cat'];	
				$where='category_id';
				$table='product_detail';

				$data['product_detail'] = $this->Adminmodel->select_like_where($table,$where,$id);
				
			    $data['inventory_type'] = $inventory_type ;
				
				foreach ($data['product_detail'] as  $value) {
						$id = $value['sku_code'];	
				$where='parent_skucode';
				$table='product';

				$data['messages'] = $this->Adminmodel->select_common_where($table,$where,$id);

				}
	
				$table='category';
				$data['parent_category']=$this->Adminmodel->select_com($table);

				$data['current_uri'] = $_POST['cat'];
				$this->load->view('Team/inventory',$data);					

			}

			public function quantityupdate(){

				is_team();

				
					  //  $table='order_detail';
					  	$id =$_POST['id'];
					 
						$data= array(

				// 			'newquantity' =>$_POST['type'],
				
			    		'min_order_quan' =>$_POST['type'],

							);
							
			  $product_detail  = $this->db->get_where('product_detail', array('sku_code' => $id ,))->row() ;
			  
			  
		
				
				if(!empty($product_detail)){
				    
				       $table='product_detail';   
					    $where='sku_code';
					
				    
			 //   $this->Adminmodel->update_common($data,$table,$where,$id);
			   
			    $this->db->where('sku_code', $id);
                $this->db->update('product_detail', $data);
	    	    
			    
			 
				}else{
				    $table='product';   
					    $where='sku_code';
					
			    $this->db->where('sku_code', $id);
                $this->db->update('product', $data);
	    	   
				    
			 //   $this->Adminmodel->update_common($data,$table,$where,$id);
			
				    
				}
				
				echo "done" ;
	
             

			}
			public  function approverequest()
			{
				is_team();
					    $table='orders';
					    $where='order_id';
						$id =$this->uri->segment(3);
						$data= array(

							'request_accept' =>'1',

							);

			    $this->Adminmodel->update_common($data,$table,$where,$id);
			    redirect('Team/requestdetail/'.$id);
			}
				public function availupdate(){

				is_team();

					$id = $_POST['id'];	
				$where='sku_code';
				$table='product';

				$data = $this->Adminmodel->select_common_where($table,$where,$id);

					$id = $_POST['id'];	
				$where='sku_code';
				$table='product_detail';

				$product_detail = $this->Adminmodel->select_common_where($table,$where,$id);
				if(empty($data)){
					    $table='product_detail';
					    $where='sku_code';
						$id =$_POST['id'];
						$data= array(

							'availability' =>$_POST['type'],

							);

			    $this->Adminmodel->update_common($data,$table,$where,$id);
				}else{
					   $table='product';
					    $where='sku_code';
						$id =$_POST['id'];
						$data= array(

							'availability' =>$_POST['type'],

							);

			    $this->Adminmodel->update_common($data,$table,$where,$id);
				}
             

			}

			public function priceupdate(){

				is_team();

					$id = $_POST['id'];	
				$where='sku_code';
				$table='product';

				$data = $this->Adminmodel->select_common_where($table,$where,$id);

					$id = $_POST['id'];	
				$where='sku_code';
				$table='product_detail';

				$product_detail = $this->Adminmodel->select_common_where($table,$where,$id);
				if(empty($data)){
					    $table='product_detail';
					    $where='sku_code';
						$id =$_POST['id'];
						$data= array(

							'selling_price' =>$_POST['type'],

							);

			    $this->Adminmodel->update_common($data,$table,$where,$id);
				}else{
					   $table='product';
					    $where='sku_code';
						$id =$_POST['id'];
						$data= array(

							'selling_price' =>$_POST['type'],

							);

			    $this->Adminmodel->update_common($data,$table,$where,$id);
				}
             

			}
				public function onlypriceupdate(){

				is_team();

					$id = $_POST['id'];	
				$where='sku_code';
				$table='product';

				$data = $this->Adminmodel->select_common_where($table,$where,$id);

					$id = $_POST['id'];	
				$where='sku_code';
				$table='product_detail';

				$product_detail = $this->Adminmodel->select_common_where($table,$where,$id);
				if(empty($data)){
					    $table='product_detail';
					    $where='sku_code';
						$id =$_POST['id'];
						$data= array(

							'price' =>$_POST['type'],

							);

			    $this->Adminmodel->update_common($data,$table,$where,$id);
				}else{
					   $table='product';
					    $where='sku_code';
						$id =$_POST['id'];
						$data= array(

							'price' =>$_POST['type'],

							);

			    $this->Adminmodel->update_common($data,$table,$where,$id);
				}
             

			}
			 public function invenreport(){

				is_team();

		$data=$this->Model->productcsv();
		//pr($data);die;
 $filename = 'inventory_'.date('Ymd').'.csv'; 
   header("Content-Description: File Transfer"); 
   header("Content-Disposition: attachment; filename=$filename"); 
   header("Content-Type: application/csv; ");





   // get data 
  

   // file creation 
   $file = fopen('php://output', 'w');
 
  $header = array("Sku Code","Product Name","Minimum Quantity","Availability  "); 
   fputcsv($file,$header);

   foreach ($data as $key=>$line){ 
     fputcsv($file,$line); 
   }
   fclose($file); 
   
 }

 public function invenvarreport(){

				is_team();

		$data=$this->Model->productvarcsv();
		//pr($data);die;
 $filename = 'inventory_'.date('Ymd').'.csv'; 
   header("Content-Description: File Transfer"); 
   header("Content-Disposition: attachment; filename=$filename"); 
   header("Content-Type: application/csv; ");





   // get data 
  

   // file creation 
   $file = fopen('php://output', 'w');
 
 $header = array("Sku Code","Product Name","Minimum Quantity","Availability  "); 
   fputcsv($file,$header);

   foreach ($data as $key=>$line){ 
     fputcsv($file,$line); 
   }
   fclose($file); 
   
 }
 	 public function invenpricereport(){

				is_team();

		$data=$this->Model->productpricecsv();
		//pr($data);die;
 $filename = 'Productprice_'.date('Ymd').'.csv'; 
   header("Content-Description: File Transfer"); 
   header("Content-Disposition: attachment; filename=$filename"); 
   header("Content-Type: application/csv; ");


   // file creation 
   $file = fopen('php://output', 'w');
 
  $header = array("Sku Code","Product Name","Selling Price","Price  "); 
   fputcsv($file,$header);

   foreach ($data as $key=>$line){ 
     fputcsv($file,$line); 
   }
   fclose($file); 
   
 }

 public function invenpricevarreport(){

				is_team();

		$data=$this->Model->productpricevarcsv();
		//pr($data);die;
 $filename = 'varientprice_'.date('Ymd').'.csv'; 
   header("Content-Description: File Transfer"); 
   header("Content-Disposition: attachment; filename=$filename"); 
   header("Content-Type: application/csv; ");

   // file creation 
   $file = fopen('php://output', 'w');
 
  $header = array("Sku Code","Product Name","Selling Price","Price  "); 

   fputcsv($file,$header);

   foreach ($data as $key=>$line){ 
     fputcsv($file,$line); 
   }
   fclose($file); 
   
 }
 public function lowstockarreport(){

				is_team();

		$data=$this->Model->lowvarcsv();
		//pr($data);die;
 $filename = 'lowstockvarpro_'.date('Ymd').'.csv'; 
   header("Content-Description: File Transfer"); 
   header("Content-Disposition: attachment; filename=$filename"); 
   header("Content-Type: application/csv; ");





   // get data 
  

   // file creation 
   $file = fopen('php://output', 'w');
 
 $header = array("Sku Code","Product Name","Minimum Quantity","Availability  "); 
   fputcsv($file,$header);

   foreach ($data as $key=>$line){ 
     fputcsv($file,$line); 
   }
   fclose($file); 
   
 }
 public function outstockarreport(){

				is_team();

		$data=$this->Model->outvarcsv();
		//pr($data);die;
 $filename = 'outstockvarpro_'.date('Ymd').'.csv'; 
   header("Content-Description: File Transfer"); 
   header("Content-Disposition: attachment; filename=$filename"); 
   header("Content-Type: application/csv; ");

   // file creation 
   $file = fopen('php://output', 'w');
 
 $header = array("Sku Code","Product Name","Minimum Quantity","Availability  "); 
   fputcsv($file,$header);

   foreach ($data as $key=>$line){ 
     fputcsv($file,$line); 
   }
   fclose($file); 
   
 }
 public function lowstockreport(){

				is_team();

		$data=$this->Model->lowcsv();
		//pr($data);die;
 $filename = 'lowstockpr_'.date('Ymd').'.csv'; 
   header("Content-Description: File Transfer"); 
   header("Content-Disposition: attachment; filename=$filename"); 
   header("Content-Type: application/csv; ");

   // file creation 
   $file = fopen('php://output', 'w');
 
 $header = array("Sku Code","Product Name","Minimum Quantity","Availability  "); 
   fputcsv($file,$header);

   foreach ($data as $key=>$line){ 
     fputcsv($file,$line); 
   }
   fclose($file); 
   
 }
 public function outstockreport(){

				is_team();

		$data=$this->Model->outcsv();
		//pr($data);die;
 $filename = 'outstockpr_'.date('Ymd').'.csv'; 
   header("Content-Description: File Transfer"); 
   header("Content-Disposition: attachment; filename=$filename"); 
   header("Content-Type: application/csv; ");

   // file creation 
   $file = fopen('php://output', 'w');
 
 $header = array("Sku Code","Product Name","Minimum Quantity","Availability  "); 
   fputcsv($file,$header);

   foreach ($data as $key=>$line){ 
     fputcsv($file,$line); 
   }
   fclose($file); 
   
 }
	public function uploadvarproduct(){
				is_team();
				$this->load->view('Team/uploadexcel.php');
			}
	public function updateproductinvent(){
				is_team();
				$this->load->view('Team/uploadexcel.php');
			}
public function updatepro($id){

is_team();
            	$where='id';
				$table='excelsheet';
				$data=$this->Adminmodel->select_com_where($table,$where,$id);
                $handle = fopen("assets/excelsheet/".$data[0]['sheetname'], "r");
                $c = 0;
                $firstline =true;
                
                $i =1 ;

       while(($filesop = fgetcsv($handle, 100000, ",")) !== false)
         {
             
             if($i != 1 && $filesop[0]){
            	$data1= array(
                  'min_order_quan'=>$filesop[2],
                  'availability'=>$filesop[3],
                  
                 );
                 
                 $id = $filesop[0];
                $where='sku_code';
                $table='product_detail';
        
           $this->Adminmodel->update_common($data1,$table,$where,$id);
        
          }
            
             $i ++ ;
             
         } // end while 
        
        redirect('Team/inventory');
        
          
            
    
}

public function updatevarpro($id){

is_team();

    $where='id';

				$table='excelsheet';

				$data=$this->Adminmodel->select_com_where($table,$where,$id);



$firstline = true;
        $handle = fopen("assets/excelsheet/".$data[0]['sheetname'], "r");

        $c = 0;
$firstline = true;
        while(($filesop = fgetcsv($handle, 100000, ",")) !== false)

 {

if (!$firstline) {
 
if(!empty($filesop[0])){

 	$data= array(

 

  
 
  'min_order_quan'=>$filesop[2],

  'availability'=>$filesop[3],
 );



					$id = $filesop[0];	
				$where='sku_code';
				$table='product';

	 $this->Adminmodel->update_common($data,$table,$where,$id);
}
}
$firstline = false;


}

redirect('Team/inventory');

 

			}




			public function updatepricevarproduct(){
			is_team();
				$this->load->view('Team/uploadexcel.php');
			}
	public function updatepriceproduct(){
			is_team();
				$this->load->view('Team/uploadexcel.php');
			}


			public function updatepriceproductcsv($id){
				is_team();
				$where='id';

				$table='excelsheet';

				$data=$this->Adminmodel->select_com_where($table,$where,$id);
//pr($_FILES);die;



$firstline = true;
        $handle = fopen("assets/excelsheet/".$data[0]['sheetname'], "r");

        $c = 0;

        while(($filesop = fgetcsv($handle, 100000, ",")) !== false)

 
 {
 	if (!$firstline) {
if(!empty($filesop[0])){

 	$data= array(
 
  'selling_price'=>$filesop[1],

  'price'=>$filesop[2], 
 );


					$id = $filesop[0];	
				$where='sku_code';
				$table='product_detail';

	 $this->Adminmodel->update_common($data,$table,$where,$id);
}

 }
    $firstline = false;
}

redirect('Team/price');

 

			}



public function updatepricevarproductcsv($id){
is_team();


$where='id';

				$table='excelsheet';

				$data=$this->Adminmodel->select_com_where($table,$where,$id);
//pr($_FILES);die;



$firstline = true;
        $handle = fopen("assets/excelsheet/".$data[0]['sheetname'], "r");

        $c = 0;

        while(($filesop = fgetcsv($handle, 100000, ",")) !== false)

 {

 	if (!$firstline) {
if(!empty($filesop[0])){

 	$data= array(

 
  'selling_price'=>$filesop[1],

  'price'=>$filesop[2],
 );


				echo	$id = $filesop[0];	
				$where='sku_code';
				$table='product';

	 $this->Adminmodel->update_common($data,$table,$where,$id);
}

 }
    $firstline = false;
}

redirect('Team/price');

 

			}


	 public function downloadprocsv(){

				is_team();
	$table='product_detail';
	$datas=$this->Adminmodel->select_com($table);
	foreach ($datas as  $value) {

$data[]=array(
  'sku_code' => $value['sku_code'],

  'category_id' => $value['category_id'],

  'parent_cat'=> $value['parent_cat'],

  'sub_catid'=> $value['sub_catid'],

  'pro_name'=> $value['pro_name'],

  'price' => $value['price'],

  'selling_price' => $value['selling_price'],

  'discount_code'=> $value['discount_code'],  

  'pincode_local'=> $value['pincode_local'],

  'pincode_metro'=> $value['pincode_metro'],

  'pincode_other' => $value['pincode_other'],

   'main_image1' => $value['main_image1'],

  'main_image2'=>$value['main_image2'],

  'main_image3'=>$value['main_image3'],

  'main_image4'=>$value['main_image4'],

  'main_image5' => $value['main_image5'],

  'description' => $value['description'],

  'bullet1'=>$value['bullet1'],

  'bullet2'=>$value['bullet2'],

  'bullet3'=>$value['bullet3'],

  'bullet4'=>$value['bullet4'],  

  'bullet5'=>$value['bullet5'],

  'highlights1'=>$value['highlights1'],

  'highlights2' => $value['highlights2'],

  'highlights3' => $value['highlights3'],

  'size'=>$value['size'], 

  'weight'=>$value['weight'],

  'color'=>$value['color'],

  'material' => $value['material'],
 'box_volume_weight' => $value['box_volume_weight'],

  'min_order_quan'=>$value['min_order_quan'],

  'availability'=>$value['availability'],

  'gst' => $value['gst'],

  'gst_per' => $value['gst_per'],

  'meta_title'=>$value['meta_title'],

  'meta_keyword'=>$value['meta_keyword'],
  'meta_description' =>$value['meta_description'],
  'cancel_pro'	=>$value['cancel_pro'],
  'occasion' =>$value['occasion'],
  'recipient' =>$value['recipient']


);
}

	
 $filename = 'pdo_'.date('Ymd').'.csv'; 
   header("Content-Description: File Transfer"); 
   header("Content-Disposition: attachment; filename=$filename"); 
   header("Content-Type: application/csv; ");





   // get data 
  

   // file creation 
   $file = fopen('php://output', 'w');
 $header = array("sku_code","category_id","parent_cat","sub_catid","pro_name","price","selling_price","discount_code","pincode_local","pincode_metro","pincode_other","main_image1","main_image2","main_image3","main_image4","main_image5","description","bullet1","bullet2","bullet3","bullet4","bullet5","highlights1","highlights2","highlights3","size","weight","color","material","box_volume_weight","min_order_quan","availability","gst","gst_per","meta_title","meta_keyword","meta_description","cancel_pro","occasion","recipient"); 

  // $header = array("Sku Code","Product Name","Minimum Quantity","Availability  "); 
   fputcsv($file,$header);

   foreach ($data as $key=>$line){ 
     fputcsv($file,$line); 
   }
   fclose($file); 
   
 }
public function updateprocsv(){
			is_team();
				$this->load->view('Team/uploadexcel.php');
			}
public function updateproductcsv($id){
    
    
is_team();

	$where='id';

				$table='excelsheet';

				$data=$this->Adminmodel->select_com_where($table,$where,$id);

        $handle = fopen("assets/excelsheet/".$data[0]['sheetname'], "r");

        $c = 0;

$firstline =true;

$i =1 ;

       while(($filesop = fgetcsv($handle, 100000, ",")) !== false)

 {
     
     if($i != 1 && $filesop[0]){
         
				$m=$filesop[7];
                $title=$m.$filesop[0];
                $name= str_replace(" ","-",$title);

 	 if(empty($filesop[6])){
			    	$filesop[6]='0';
			    }

			     if(empty($filesop[11])){
			    	$filesop[11]='0';
			    }else{
			    	$filesop[11]='local';
			    }
			     if(empty($filesop[12])){
			    	$filesop[12]='0';
			    }else{
			    	$filesop[12]='metro';
			    }
			     if(empty( $filesop[13])){
			    	 $filesop[13]='0';
			    }else{
			    	$filesop[13]='other';
			    }
			     if(empty($filesop[10])){
			    	$filesop[10]='0';
			    }

                if(empty($filesop[34])){
			    	$filesop[34]='0';
			    }

			    $url = base_url();
    			$path = $url."/assets/product/".$filesop[10];
			    $path1 = $url."/assets/product/".$filesop[11];
			    $path2 = $url."/assets/product/".$filesop[12];
			    $path3 = $url."/assets/product/".$filesop[13];
			    $path4 = $url."/assets/product/".$filesop[14];
			    
            	  date_default_timezone_set('Asia/Kolkata');
                $currentTime = date( 'Y-m-d');
    
                if(empty($filesop[3])){
                    
                    $pat_cat = trim($filesop[3]) ;
                }else{
                    
                   $pat_cat  = trim($filesop[0]) ; 
                }
                
             	$data_update= array(
            
              'sku_code' => trim($filesop[0]),
              'relation' => $filesop[1] ,
              'varient' => $filesop[2] ,
              'parent_sku'  =>$pat_cat,
              'category_id' => $filesop[4],
              'url' => trim($name),
              'parent_cat'=> $filesop[5],
              'sub_catid'=> $filesop[6],
              'pro_name'=> $filesop[7],
              'price' => $filesop[8],
              'selling_price' => $filesop[9],
              'pincode_local'=> 'local' ,     // $filesop[11],
              'pincode_metro'=>  'metro' ,   //$filesop[12],
              'pincode_other' =>  'other' ,  //  $filesop[13],
            //   'main_image1' => $path,
            //   'main_image2'=>$path1,
            //   'main_image3'=>$path2,
            //   'main_image4'=>$path3,
            //   'main_image5' => $path4,
              'description' => $filesop[15],
              'bullet1'=>$filesop[16],
              'bullet2'=>$filesop[17],
              'bullet3'=>$filesop[18],
              'bullet4'=>$filesop[19],  
              'bullet5'=>$filesop[20],
            
              'size'=>$filesop[21], 
              'weight'=>$filesop[22],
              'color'=>$filesop[23],
              'material' => $filesop[24],
              'other' => $filesop[25],
              'box_volume_weight' => $filesop[26],
             'low_alert' => $filesop[27],
              'min_order_quan'=>$filesop[28],
              'availability'=>$filesop[29],
              'hsn_code' => $filesop[30],
            //   'gst' => $filesop[29],
              
              'gst_per' => $filesop[31],
              
              'meta_title'=>$filesop[32],
              'meta_keyword'=>$filesop[33],
              'meta_description' =>$filesop[34],
              
              'occasion'=>$filesop[35],
              'date' => $currentTime ,
              
            //   'recipient'=>$filesop[42]
            
            
            
             );

		 	$id = trim($filesop[0]);	

                 $this->db->where('sku_code', $id);
                $this->db->update('product_detail', $data_update);

  }
    
     $i ++ ;
     
 } // end while 

redirect('Team/ListProduct');

    
    
}
			 public function downloadvprocsv(){

				is_team();

					$id =$this->uri->segment(3);	
				$where='parent_skucode';
				$table='product';

				$datas = $this->Adminmodel->select_common_where($table,$where,$id);
	foreach ($datas as  $value) {

$data[]=array(
  'sku_code' => $value['sku_code'],
 
  'pro_name'=> $value['pro_name'],

  'relation'=> $value['relation'],

  'varient'=> $value['varient'],

  'price' => $value['price'],

  'selling_price' => $value['selling_price'],

  'discount_code'=> $value['discount_code'],  

  'pincode_local'=> $value['pincode_local'],

  'pincode_metro'=> $value['pincode_metro'],

  'pincode_other' => $value['pincode_other'],

   'main_image1' => $value['main_image1'],

  'main_image2'=>$value['main_image2'],

  'main_image3'=>$value['main_image3'],

  'main_image4'=>$value['main_image4'],

  'main_image5' => $value['main_image5'],

  'description' => $value['description'],

  'bullet1'=>$value['bullet1'],

  'bullet2'=>$value['bullet2'],

  'bullet3'=>$value['bullet3'],

  'bullet4'=>$value['bullet4'],  

  'bullet5'=>$value['bullet5'],

  'highlights1'=>$value['highlights1'],

  'highlights2' => $value['highlights2'],

  'highlights3' => $value['highlights3'],

  'material' => $value['material'],

 'box_volume_weight' => $value['box_volume_weight'],

  'min_order_quan'=>$value['min_order_quan'],

  'availability'=>$value['availability'],


  'gst' => $value['gst'],
  'gst_per' => $value['gst_per'],
  'cancel_pro'	=>$value['cancel_pro']
);
}

	
 $filename = 'vpdo_'.date('Ymd').'.csv'; 
   header("Content-Description: File Transfer"); 
   header("Content-Disposition: attachment; filename=$filename"); 
   header("Content-Type: application/csv; ");





   // get data 
  

   // file creation 
   $file = fopen('php://output', 'w');

  $header = array("sku_code","pro_name","relation","varient","price","selling_price","discount_code","pincode_local","pincode_metro","pincode_other","main_image1","main_image2","main_image3","main_image4","main_image5","description","bullet1","bullet2","bullet3","bullet4","bullet5","highlights1","highlights2","highlights3","material","box_volume_weight","min_order_quan","availability","gst","gst_per","cancel Pro"); 

  // $header = array("Sku Code","Product Name","Minimum Quantity","Availability  "); 
   fputcsv($file,$header);

   foreach ($data as $key=>$line){ 
     fputcsv($file,$line); 
   }
   fclose($file); 
   
 }
public function updatevprocsv(){
		is_team();
		$data['url']=$this->uri->segment(3);
				$this->load->view('Team/uploadexcel.php',$data);
			}
public function updatevproductcsv($id){
is_team();

$where='id';

				$table='excelsheet';

				$data=$this->Adminmodel->select_com_where($table,$where,$id);

        $handle = fopen("assets/excelsheet/".$data[0]['sheetname'], "r");
        $c = 0;
$firstline = true;

        while(($filesop = fgetcsv($handle, 100000, ",")) !== false)

 {
 	if (!$firstline) {
 							$m=$filesop[1];
                            $title=$m.$filesop[0];
                           $name= str_replace(" ","-",$title);
if(!empty($filesop[0])){

 	$data= array(

  'pro_name'=> $filesop[1],

'relation'=> $filesop[2],

'varient'=> $filesop[3],

'price' => $filesop[4],

'selling_price' => $filesop[5],

'url'=>$name,

  'discount_code'=> $filesop[6],

  

  'pincode_local'=> $filesop[7],



  'pincode_metro'=> $filesop[8],



  'pincode_other' => $filesop[9],



   'main_image1' => $filesop[10],


  'main_image2'=>$filesop[11],


  'main_image3'=>$filesop[12],


  'main_image4'=>$filesop[13],


  'main_image5' => $filesop[14],


  'description' => $filesop[15],


  'bullet1'=>$filesop[16],

  'bullet2'=>$filesop[17],

  'bullet3'=>$filesop[18],

  'bullet4'=>$filesop[19],  

  'bullet5'=>$filesop[20],

  'highlights1'=>$filesop[21],

  'highlights2' => $filesop[22],

  'highlights3' =>$filesop[23] ,

  'material' =>$filesop[24],

 'box_volume_weight' =>$filesop[25] ,

  'min_order_quan'=>$filesop[26],

  'availability'=>$filesop[27],

  'gst' => $filesop[28],
  'gst_per' =>$filesop[29],
  'cancel_pro'	=>$filesop[30]
 );

		
					$id = $filesop[0];	
				
				$where='sku_code';
				$table='product';

	 $this->Adminmodel->update_common($data,$table,$where,$id);
}

}
$firstline = false;

}

redirect('Team/variant/'.$this->uri->segment(3));

 

			}

			public function protype(){
is_team();
				$where='id';

				$id=$_POST['id'];

				$table='product_details';

				$data= array(

					'page_id' => $_POST['type']

							);

				$this->Adminmodel->update_common($data,$table,$where,$id);

			}
			public function flag(){
is_team();
				$where='id';

				$id=$_POST['id'];

				$table='product_detail';

				$data= array(

					'flag' => $_POST['type']

							);
				//pr($data);

				$this->Adminmodel->update_common($data,$table,$where,$id);

			}


			public function updateorderstatus(){
		   is_team();
				$where='order_rand_id';

				$id=$_POST['orderid'];

				$table='order_detail';

				$data= array(

					'order_status' => $_POST['status']

							);
				$this->Adminmodel->update_common($data,$table,$where,$id);
				/*if($_POST['status']==1){
					$to_email =$_POST['email'];
				$subject = "Order Cancellation Detail".$_POST['order_no'];
			$message =  "Dear ".$_POST['username']."
			\n Product Name -".$_POST['p_name'].
			" (".$_POST['p_code'].") 
			\n Quantity - ".$_POST['quan'].
			"\n Price - ".$_POST['price'];
			$headers = 'From:excellentinfocom8@gmail.com';
			$headers .= 'Cc: excellentinfocom8@gmail.com';
			mail($to_email,$subject,$message,$headers);
			}
				elseif($_POST['status']==2){


					$oid= $_POST['order_id'];
					$reward=$this->Adminmodel->reward_order($oid);
					
					$num= count($reward);
					foreach ($reward as  $re) {
						if($re['status']==2){
							$a[]=$re['orderdetail_id'];
						}}
					$delie= count($a);
					if($num==$delie){
				$sum=$_POST['sum'];
				$div=$sum/50;
				$rew=intval($div);
				$userid=$_POST['userid'];
				$userewards=$this->Adminmodel->select_reward($userid);
				$uid=$userewards[0]['user_id'];
				$point=$userewards[0]['points'];
				if(!empty($uid)){
					$id2=$_POST['userid'];
					$where2="user_id";
					$userpoint=$point+$rew;
					$table2="Rewards";
					$data2 = array( 
                              'points' => $userpoint
                              );
					$this->Adminmodel->update_rewards($data2,$table2,$where2,$id2);

				}

					}

$to_email =$_POST['email'];			
$subject = "Order Delivered- Your Order with Excellentcrafts.in[".$_POST['order_no']."]has been delivered!";
$message =  "Dear ".$_POST['username'].",
			\n Product Name -".$_POST['p_name'].
			" (".$_POST['p_code'].") 
			\n Quantity - ".$_POST['quan'].
			"\n Price - ".$_POST['price'];
$headers = 'From:excellentinfocom8@gmail.com';
$headers .= 'Cc: excellentinfocom8@gmail.com';
mail($to_email,$subject,$message,$headers);

				}
*/
				

			}

			public function cati(){
            is_team();
				$post=$_POST['id'];
				
			$i= 0 ;
				 foreach($post as $idd => $id)  {
				    
				     
				$where='parent_id';

				$table='category';

				$data[]=$this->Adminmodel->select_com_where($table,$where,$id);
				
				$i++ ;

	 }


				?>

				<option>please choose</option><?



			 foreach($data as $val)  {
			 
			foreach($val as $value){
			    
			    print_r($value);
			    
			 ?>



			<option value="<?php echo $value['id']?>"><?=$value['name']?></option>

			<?php }
		          
		          	}
			
			
			}
			
	public function positioncati(){
            is_team();
				$id=$_POST['id'];
				
				$where='parent_id';
				$table='category';
				$data=$this->Adminmodel->select_com_where($table,$where,$id);
				$i++ ;
				?>
				<option>please choose</option><?
			 foreach($data as $value)  {
			 ?>

			<option value="<?php echo $value['id']?>"><?=$value['name']?></option>
			<?php 
		          	}
			
			}

	public function positionSubcati(){
            is_team();
				$id=$_POST['id'];
				
				$where='cat_id';
				$table='sub_category';
				$data=$this->Adminmodel->select_com_where($table,$where,$id);
				$i++ ;
				?>
				<option>please choose</option><?
			 foreach($data as $value)  {
			 ?>

			<option value="<?php echo $value['id']?>"><?=$value['subcategory_name']?></option>
			<?php 
		          	}
			
			}



			public function subcat(){
		
			//==========================
                is_team();
				$post=$_POST['id'];
				
			$i= 0 ;
				 foreach($post as $idd => $id)  {
				    
				     
				$where='cat_id';

				$table='sub_category';

				$data[]=$this->Adminmodel->select_com_where($table,$where,$id);
				
				$i++ ;

	 }

				?>

				<option>please choose</option><?



			 foreach($data as $val)  {
			 
			foreach($val as $value){
			    
			  
			    
			 ?>



			<option value="<?php echo $value['id']?>"><?=$value['subcategory_name']?></option>

			<?php }
		          
		          	}
			
			
			
			
			//===========================

		

			}

			public function viewexcel()

			{
				is_team();
				$this->load->view('Team/excel1.php');

			}

		
			public function stocks()
			{

				is_team();
				//echo "dsasadasd";die;
				 $data['messages']=$this->Adminmodel->stockdetail();
//pr($data);die;
				$this->load->view('Team/stock.php',$data);

			}
			public function rating()
			{

				is_team();
				$table='rating';

				$data['messages']=$this->Adminmodel->select_com($table);
//pr($data);die;
				$this->load->view('Team/rating.php',$data);

			}
			public function active()
	{
			is_team();
	    $id=$_POST['id'];
	    $where='id';
		$table='rating';
        $data=array(
				'status' =>$_POST['status']
				
			);
		$this->Adminmodel->update_common($data,$table,$where,$id);
   
	}      
			public function orderbydate()
	{
		is_team();
		
		$date=$_POST['from'];
		
	$first_date=date_format($date,"Y-m-d");
		$date1= $_POST['to']  ;

		$second_date=date_format($date1,"Y-m-d");
		$id=$_POST['ordertype'];
		
   		$data['message2']=$this->Adminmodel->selectdate($first_date,$second_date,$id);
   	// 	pr($data);die;
   		$data['current_uris']=$_POST['ordertype'];
   	   $data['fromdate']=$_POST['from'];
   	   $data['todate']=$_POST['to'];
     $this->load->view('Team/order.php',$data);

   
}


function filter_orderdate(){
    
         $user_id =$this->input->post('user_id');
        $first_date = $this->input->post('date1');
        $second_date = $this->input->post('date2');
        
        
  
        //   $data['customer_detail'] = $this->db->get_where('order' , array('user_id' => $user_id ,'date >='=> $first_date,'date <='=> $second_date) )->result() ;
        //   $data['user_id'] = $user_id ; 
           
          	$id=$_POST['ordertype'];
          	
     	$data['message2']=$this->Adminmodel->filterdateorder($first_date,$second_date,$id);
   	// pr($data);die;
   		$data['current_uris']=$_POST['ordertype'];
   	   $data['fromdate']=$_POST['from'];
   	   $data['todate']=$_POST['to'];
   	   
   	   $data['status'] =$id ;
                
       $data['current_uris'] = $id ;
                 
     $this->load->view('Team/orderprocess.php',$data);
    
}
public function newsletter()
			{

				is_team();
				//echo "dsasadasd";die;
				 $data['messages']=$this->Adminmodel->newspapers();
//pr($data);die;
				$this->load->view('Team/newspaper.php',$data);

			}
		
		
			public function addship(){

				is_team();

				//pr($_POST);die;

               $table='orders';
                //echo $m;die;


               $where='order_id';

				$id =$_POST['orderid'];
				  if(!empty($_POST['indiapost'])){


				$data= array(

						'shipment' =>$_POST['name'],
						'shipment_status' =>$_POST['indiapost'],
						
						


							);
			}else{
				$data= array(

						'shipment' =>$_POST['name'],
						'shipment_status' =>$_POST['dtdc']
						


							);
			}
				//pr($data);die;
				if($_POST['indiapost']=='DTDC'){
	   $to_email = $_POST['email'];
		$subject = " Shippment Status -". $_POST['order_no'];
		$message =  "Dear ".$_POST['uname'].
		" \n Shipment id -".$_POST['name'].
		" \n Check Your Order Status-http://www.dtdc.in/tracking/shipment-tracking.asp
		  \n Order Amount-".$_POST['order_amount'].
		" \n Payment Type-".$_POST['payment_type'].
		" \n Order Date-".$_POST['created'];
		$headers = 'From:excellentinfocom8@gmail.com';
		$headers .= 'Cc: excellentinfocom8@gmail.com';
		mail($to_email,$subject,$message,$headers);
	}
	else{

        $to_email = $_POST['email'];
		$subject = " Shippment Status -". $_POST['order_no'];
		$message =  "Dear ".$_POST['uname'].
		" \n Shipment id -".$_POST['name'].
		" \n Check Your Order Status-https://www.indiapost.gov.in/_layouts/15/dop.portal.tracking/trackconsignment.aspx
		  \n Order Amount-".$_POST['order_amount'].
		" \n Payment Type-".$_POST['payment_type'].
		" \n Order Date-".$_POST['created'];
		$headers = 'From:excellentinfocom8@gmail.com';
		$headers .= 'Cc: excellentinfocom8@gmail.com';
		mail($to_email,$subject,$message,$headers);
		

	}
	  $this->Adminmodel->update_common($data,$table,$where,$id);
                  redirect('Team/orders');

			}

			public function contactus(){

				is_team();

				$table='contact';

				$data['contact']=$this->Adminmodel->select_com($table);
				$this->load->view('Team/contact.php',$data);

			}
			public function bulkenquiry()
			{

				is_team();
				$table='bulkenquiry';
				$data['bulk']=$this->Adminmodel->select_com($table);
				$this->load->view('Team/bulk.php',$data);

			}
			public function banner()
			{

				is_team();
				$table='banner';

				$data['banner']=$this->Adminmodel->select_com($table);
				$this->load->view('Team/banner.php',$data);

			}
			public function upload_banner(){
				is_team();

				if(empty($_POST['id'])){
				$image = $_FILES['file']['name'];

				$image1 = $_FILES['file1']['name'];

				$image2 = $_FILES['file2']['name'];

			    $url = base_url();
			    $path = $url."Products/".$image;

			    $path1 = $url."Products/".$image1;

			    $path2 = $url."Products/".$image2;


			    @unlink($path);

			    @unlink($path1);

			    @unlink($path2);
				$data= array(

						'link1' =>$_POST['link1'],

						'link2' =>$_POST['link2'],

						'link3'	=>$_POST['link3'],

						'head1' =>$_POST['head1'],

						'head2' =>$_POST['head2'],

						'head3'	=>$_POST['head3'],

						'content1' =>$_POST['con1'],

						'content2' =>$_POST['con2'],

						'content3'	=>$_POST['con3'],

						'image1' =>$path,

						'image2' =>$path1,

						'image3' =>$path2
							);
							$table='banner';
				 move_uploaded_file($_FILES["file"]["tmp_name"], "./Products/".$image);

			    move_uploaded_file($_FILES["file1"]["tmp_name"], "./Products/".$image1);

			    move_uploaded_file($_FILES["file2"]["tmp_name"], "./Products/".$image2);
			    $this->Adminmodel->insert_common($data,$table);
			}
			else{
				$table='banner';

				$banner=$this->Adminmodel->select_com($table);
				$id=$_POST['id'];
				$where='id';
				$image = $_FILES['file']['name'];

				$image1 = $_FILES['file1']['name'];

				$image2 = $_FILES['file2']['name'];

			    $url = base_url();
			    if(empty($image)){
			    	$path=$banner[0]['image1'];
			    }
			    else{
			    $path = $url."Products/".$image;
			}
              if(empty($image1)){
              		$path1=$banner[0]['image2'];
			    }
			    else{
			    $path1 = $url."Products/".$image1;
			}
			  if(empty($image2)){
			  		$path2=$banner[0]['image3'];
			    }
			    else{
			    $path2 = $url."Products/".$image2;
			}


			    @unlink($path);

			    @unlink($path1);

			    @unlink($path2);
				$data= array(

						'link1' =>$_POST['link1'],

						'link2' =>$_POST['link2'],

						'link3'	=>$_POST['link3'],

						'head1' =>$_POST['head1'],

						'head2' =>$_POST['head2'],

						'head3'	=>$_POST['head3'],

						'content1' =>$_POST['con1'],

						'content2' =>$_POST['con2'],

						'content3'	=>$_POST['con3'],

						'image1' =>$path,

						'image2' =>$path1,

						'image3' =>$path2
							);
				//pr($data);die;
							$table='banner';
				 move_uploaded_file($_FILES["file"]["tmp_name"], "./Products/".$image);

			    move_uploaded_file($_FILES["file1"]["tmp_name"], "./Products/".$image1);

			    move_uploaded_file($_FILES["file2"]["tmp_name"], "./Products/".$image2);
			  $this->Adminmodel->update_common($data,$table,$where,$id);
			}

				redirect('Team/banner');
			
			}

	public function category2(){

				is_team();

				$data['pcat']=$this->Adminmodel->Listparentcategory2();

				$this->load->view('Team/Addcategory2.php',$data);

			}

			public function Addcategory2(){

				is_team();

				$data= array(

					'name' => $_POST['name'],
					'parent_id' => $_POST['pcat']

							);

				$this->Adminmodel->Addcategory2($data);

				$this->Listcategory2();

			}
			public function Addcategory3(){

				is_team();

				$data= array(

					'name' => $_POST['name'],
					'parent_id' => '5'

							);

				
		$table='category';
					$this->Model->insert_common($table,$data);

				$this->Listcategory3();

			}
			public function Listcategory2(){

				is_team();

				$data['messagess']=$this->Adminmodel->Listcategory2();

				$this->load->view('Team/Listcategory2.php',$data);

			}

			public function updatecategory2(){

				is_team();

				//pr($_POST);die;

               $table='category2';

               $where='id';

				$id =$_POST['id'];

				$data= array(

						

						'name' =>$_POST['catname']

						

							);

			    $this->Adminmodel->update_common($data,$table,$where,$id);



			  



			    $this->Listcategory();

			}

			public function Editcategory2(){

				is_team();

				$id = $this->uri->segment(3);	

				
				

				$data['messagess'] = $this->Adminmodel->Editcategory2($id);

				//pr($data);die;

				$this->load->view('Team/editcategory2.php',$data);

				

			}

			public function deletecategory2(){

				is_team();

				$id = $this->uri->segment(3);

				$this->Adminmodel->deletecategory2($id);

				redirect('Team/Listcategory');

			}

				public function parentcategory2(){

				is_team();

				$this->load->view('Team/parentcategory2.php');

			}

			public function Addparentcategory2(){

				is_team();

				$data= array(

					'name' => $_POST['parent']

							);

				$this->Adminmodel->Addparentcategory2($data);

				redirect('Team/Listparentcategory');

			}

			public function updateparent2(){

				is_team();

               $table='parent_category2';

               $where='id';

				$id =$_POST['id'];

				$data= array(

						

						'name' =>$_POST['par_name']

						

							);

			    $this->Adminmodel->update_common($data,$table,$where,$id);



			  



			   redirect('Team/Listparentcategory');

			}

			public function Listparentcategory2(){

				is_team();

				$data['messagess']=$this->Adminmodel->Listparentcategory2();

				$this->load->view('Team/Listparentcategory2.php',$data);

			}

			public function Editparent2(){

				is_team();

				$id = $this->uri->segment(3);	

				

				

				

				$data['messagess'] = $this->Adminmodel->Editparent2($id);

				//pr($data);die;

				$this->load->view('Team/editparent2.php',$data);

				

			}

			public function Deleteparent2(){

				is_team();

				$id = $this->uri->segment(3);

				$this->Adminmodel->deleteparent2($id);

				redirect('Team/Listparentcategory');

			}





			public function subcategory2(){

				is_team();


				$data['messages']=$this->Adminmodel->Listcategory2();



				$this->load->view('Team/Addsubcategory2.php',$data);

			}

			public function Addsubcategory2(){

				is_team();

				$data= array(

					'cat_id' => $_POST['cat'],

					'subcategory_name' => $_POST['name']


							);



				$this->Adminmodel->Addsubcategory2($data);

				$this->Listsubcategory2();

			}

			public function Listsubcategory2(){

				is_team();

				$data['messages']=$this->Adminmodel->Listsubcategory2();

				$this->load->view('Team/Listsubcategory2.php',$data);

			}

			public function updatesubcategory2(){

				is_team();

				//pr($_POST);die;

               $table='sub_category2';

               $where='id';

				$id =$_POST['id'];

				$data= array(

						'cat_id' =>$_POST['catid'],

						'subcategory_name' =>$_POST['cname']

						

							);

			    $this->Adminmodel->update_common($data,$table,$where,$id);



			  



			    $this->Listsubcategory2();

			}

			public function Editsubcategory2(){

				is_team();

				$id = $this->uri->segment(3);	

				$data['message1']=$this->Adminmodel->Listcategory2();


				

				$data['messages'] = $this->Adminmodel->Editsubcategory2($id);

				//pr($data);die;

				$this->load->view('Team/editsubcategory2.php',$data);

				

			}

			public function deletesubcategory2(){

				is_team();

				$id = $this->uri->segment(3);

				$this->Adminmodel->deletesubcategory2($id);

				redirect('Team/Listsubcategory2');

			}

			public function listcoupon(){

				is_team();
				$table='coupon';
				$data['messages']=$this->Adminmodel->select_common($table);
				$this->load->view('Team/listcoupon.php',$data);

			}


			public function updatecoupon(){

				is_team();

				//pr($_POST);die;
				$originalDate=$_POST['start_date'];
				$newDate = date("Y-m-d", strtotime($originalDate));

				$originalDate1=$_POST['end_date'];
				$endDate = date("Y-m-d", strtotime($originalDate1));
                $table='coupon';

               $where='id';

				$id =$_POST['id'];

				$data= array(

							'coupon_name' =>$_POST['coupon_name'],
								'coupon_percent' =>$_POST['coupon_percent'],
								'max_discount' =>$_POST['max_discount'],
								'start_date' =>$newDate,
								'end_date' =>$endDate
						

							);

			    $this->Adminmodel->update_common($data,$table,$where,$id);

			    $this->listcoupon();

			}

			public function Editcoupon(){

				is_team();

				$id = $this->uri->segment(3);	
				$where='id';
				$table='coupon';

				$data['messages'] = $this->Adminmodel->select_common_where($table,$where,$id);

				//pr($data);die;

				$this->load->view('Team/Editcoupon.php',$data);

				

			}
			public function coupon(){
				is_team();
					$this->load->view('Team/coupon.php');
			}
			public function addcoupon(){
			is_team();
				$originalDate=$_POST['start_date'];
				$newDate = date("Y-m-d", strtotime($originalDate));

				$originalDate1=$_POST['end_date'];
				$endDate = date("Y-m-d", strtotime($originalDate1));
				$data = array(
								'coupon_name' =>$_POST['coupon_name'],
								'coupon_percent' =>$_POST['coupon_percent'],
								'max_discount' =>$_POST['max_discount'],
								'start_date' =>$newDate,
								'end_date' =>$endDate
							 );
					$table='coupon';
					$this->Model->insert_common($table,$data);
					redirect('Team/listcoupon');

			}

			public function deletecoupon(){

				is_team();

				$id = $this->uri->segment(3);
				$table='coupon';
				$where='id';
				$this->Model->delete_common($table,$where,$id);

				redirect('Team/listcoupon');

			}
						public function deleterm(){

				is_team();

				$id = $this->uri->segment(3);
				$table='rm';
				$where='id';
				$this->Model->delete_common($table,$where,$id);

				redirect('Team/rmlist');

			}
			public function review(){
				is_team();
				$table='user_review';
				$data['messages']=$this->Adminmodel->select_common($table);
				$this->load->view('Team/listreview.php',$data);
			}
			
			public function reviewstatus(){
				is_team();
				$where='id';

				$id=$_POST['id'];

				$table='user_review';

				$data= array(

					'status' => $_POST['type']

							);

				$this->Adminmodel->update_common($data,$table,$where,$id);

			}
				public function deletereview(){

				is_team();

				$id = $this->uri->segment(3);
				$table='user_review';
				$where='id';
				$this->Model->delete_common($table,$where,$id);

				redirect('Team/review');

			}
			public function occasions(){
				is_team();
				$table='occasion';
				$data['messages']=$this->Adminmodel->select_common($table);
				$this->load->view('Team/Listoccasion.php',$data);
			}
			public function addoccasion(){
				is_team();
				$this->load->view('Team/Addoccasion.php');
			}
				public function newoccasion(){
				is_team();
				$data = array(
								'name' =>$_POST['name']
							 );
					$table='occasion';
					$this->Model->insert_common($table,$data);
					redirect('Team/occasions');

			}

			public function Editoccasion(){

				is_team();

				$id = $this->uri->segment(3);	
				$where='id';
				$table='occasion';

				$data['messages'] = $this->Model->select_common_where($table,$where,$id);

				//pr($data);die;

				$this->load->view('Team/editoccasion.php',$data);
			}
					public function updateoccasion(){
						is_team();
				$where='id';

				$id=$_POST['id'];

				$table='occasion';

				$data= array(

					'name' => $_POST['cname']

							);

				$this->Adminmodel->update_common($data,$table,$where,$id);
				redirect('Team/occasions');

			}
			public function deleteoccasion(){

				is_team();

				$id = $this->uri->segment(3);
				$table='occasion';
				$where='id';
				$this->Model->delete_common($table,$where,$id);

				redirect('Team/occasions');

			}
			public function themes(){
				is_team();
				$table='theme';
				$data['messages']=$this->Model->select_common($table);
				$this->load->view('Team/Listthemes.php',$data);
			}
			public function addthemes(){
					is_team();
					$id ='5';	
				$where='parent_id';
				$table='category';

				$data['category'] = $this->Model->select_common_where($table,$where,$id);
				$table='occasion';
				$data['messages']=$this->Model->select_common($table);
				$this->load->view('Team/Addthemes.php',$data);
			}
				public function newthemes(){
					is_team();
					$image = $_FILES['file']['name'];
					$url=base_url();
				$path = $url."/assets/product/".$image;
					 @unlink($path);

				$data = array(
								'occasion_id' =>$_POST['name'],
								'cat_id' =>$_POST['pname'],
								'image' =>$path
							 );
					$table='theme';
					$this->Model->insert_common($table,$data);
				 move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/product/".$image);

					redirect('Team/themes');

			}

			public function Editthemes(){

				is_team();

				$id = $this->uri->segment(3);	
				$where='id';
				$table='theme';

				$data['messages'] = $this->Model->select_common_where($table,$where,$id);

				//pr($data);die;

				$this->load->view('Team/editthemes.php',$data);
			}
				public function updatethemes(){
					is_team();
				$where='id';

				$id=$_POST['id'];

				$table='theme';
				$url=base_url();
				$image = $_FILES['file']['name'];
				$path = $url."/assets/product/".$image;
					 @unlink($path);
					 if(empty($image)){
					 	$path=$_POST['files'];
					 }
				$data = array(
								'occasion_id' =>$_POST['cname'],
								'image' =>$path
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);
				 move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/product/".$image);

				redirect('Team/themes');

			}
			public function deletethemes(){

				is_team();

				$id = $this->uri->segment(3);
				$table='theme';
				$where='id';
				$this->Model->delete_common($table,$where,$id);

				redirect('Team/themes');

			}
			public function addProductgift(){
			is_team();
				$id = '5';	
				$where='parent_id';
				$table='category';
				$data['category'] = $this->Model->select_common_where($table,$where,$id);
				
				$table='occasion';
				$data['occasion']=$this->Model->select_common($table);
				$this->load->view('Team/addProduct.php',$data);
			}
			public function themeselect(){
				is_team();
				$id=$_POST['id'];

				$where='occasion_id';

				$table='theme';

				$data=$this->Adminmodel->select_com_where($table,$where,$id);

		

				 foreach($data as $value){ 

			 	?>

		

	  <option value="<?php echo $value['id']?>" data-thumbnail="<?php echo $value['image']?>"><?=$value['id']?></option>
			<?php } 

			}
			public function uploadprogift(){
				
				is_team();
				$arr=$_POST['discount'];
				$discount=implode(",",$arr);
				$arrs=$_POST['cat'];
				$cat=implode(",",$arrs);
				$image = $_FILES['file']['name'];

				$image1 = $_FILES['file1']['name'];

				$image2 = $_FILES['file2']['name'];

				$image3 = $_FILES['file3']['name'];
				$image4 = $_FILES['file4']['name'];

			    $url = base_url();


			    $path = $url."assets/product/".$image;

			    $path1 = $url."assets/product/".$image1;

			    $path2 = $url."assets/product/".$image2;

			    $path3 = $url."assets/product/".$image3;
			    $path4 = $url."assets/product/".$image4;





			    @unlink($path);

			    @unlink($path1);

			    @unlink($path2);

			    @unlink($path3);
			    @unlink($path4);


			    if(empty($_POST['sub_cat'])){
			    	$_POST['sub_cat']='0';
			    }

			     if(empty($_POST['local'])){
			    	$_POST['local']='0';
			    }
			     if(empty($_POST['metro'])){
			    	$_POST['metro']='0';
			    }
			     if(empty($_POST['other'])){
			    	$_POST['other']='0';
			    }
			     if(empty($discount)){
			    	$discount='0';
			    }
 							$m=$_POST['name'];
                            $title=$m.$_POST['sku'];
                           $name= str_replace(" ","-",$title);
				$data= array(

						'sku_code' =>$_POST['sku'],

						'selling_price' =>$_POST['sprice'],

						'price' =>$_POST['aprice'],

						'pro_name' =>$_POST['name'],

						'main_image1' =>$path,

						'main_image2' =>$path1,

						'main_image3' =>$path2,

						'main_image4' =>$path3,

						'main_image5' =>$path4,

						'description' =>$_POST['desc'],

						'occasion' =>$cat,

						'theme' =>$_POST['sub_cat'],

						'bullet1'		=>$_POST['point1'],

						'bullet2'		=>$_POST['point2'],

						'bullet3'		=>$_POST['point3'],

						'bullet4'		=>$_POST['point4'],

						'bullet5'		=>$_POST['point5'],

						'weight'		=>$_POST['weight'],	

						'material'		=>$_POST['material'],

						'cat_id'	=>$_POST['pcat'],

						'color'			=>$_POST['color'],

						'availability'			=>$_POST['avail'],
						'min_order_quan'			=>$_POST['minimum'],
						'meta_title'      =>$_POST['metatag'],
						'size'			 =>	 $_POST['size'],	
						'meta_description'     =>$_POST['metadesc'],

						'highlights1'      =>$_POST['highlights1'],
						'highlights2'      =>$_POST['highlights2'],
						'highlights3'      =>$_POST['highlights3'],
						'pincode_local'     =>$_POST['local'],
						'pincode_metro'     =>$_POST['metro'],
						'pincode_other'     =>$_POST['other'],
						
						'box_volume_weight'     =>$_POST['volume'],
						'url'     =>$name,
						'cod'     =>$_POST['cod'],
						'gst'     =>$_POST['gst'],
						'gst_per'     =>$_POST['gstper'],
						'discount_code'=>$discount,
						'meta_keyword'	=>$_POST['metakey'],
						'cancel_pro'	=>$_POST['cancel_pro']


							);

			//	pr($data);die;




		$table='giftproduct';
					$this->Model->insert_common($table,$data);

			    move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/product/".$image);

			    move_uploaded_file($_FILES["file1"]["tmp_name"], "./assets/product/".$image1);

			    move_uploaded_file($_FILES["file2"]["tmp_name"], "./assets/product/".$image2);

			    move_uploaded_file($_FILES["file3"]["tmp_name"], "./assets/product/".$image3);

			    move_uploaded_file($_FILES["file4"]["tmp_name"], "./assets/product/".$image4);
 			

			    redirect('Team/Listgiftproduct');

			}
			public function updategiftproduct(){
					 	is_team();
					 	$id=$_POST['idds'];
				 		$arr=$_POST['discount'];
				$discount=implode(",",$arr);
				$arrs=$_POST['cat'];
				$cat=implode(",",$arrs);
				$image = $_FILES['file']['name'];

				$image1 = $_FILES['file1']['name'];

				$image2 = $_FILES['file2']['name'];

				$image3 = $_FILES['file3']['name'];
				$image4 = $_FILES['file4']['name'];

			    $url = base_url();

			    if(empty($image))

			    {

			    	$path=$_POST['paths'];

			    	



			    }

			    else

			    {

			    	$path = $url."/assets/product/".$image;

			    	



			    }

			     if(empty($image1))

			    {

			    	$path1=$_POST['paths1'];

			    	



			    }

			    else

			    {

			    	$path1 = $url."/assets/product/".$image1;

			    	



			    }



               if(empty($image2))

			    {

			    	$path2=$_POST['paths2'];

			    	



			    }

			    else

			    {

			    	$path2 = $url."assets/product/".$image2;

			    	



			    }



              if(empty($image3))

			    {

			    	$path3=$_POST['paths3'];

			    	



			    }

			    else

			    {

			    	$path3 = $url."assets/product/".$image3;

			    	



			    }


if(empty($image4))

			    {

			    	$path4=$_POST['paths4'];

			    	



			    }

			    else

			    {

			    	$path4 = $url."assets/product/".$image4;

			    	



			    }







			    @unlink($path);

			    @unlink($path1);

			    @unlink($path2);

			    @unlink($path3);
			    @unlink($path4);

			  

			   


			    if(empty($_POST['sub_cat'])){
			    	$_POST['sub_cat']='0';
			    }

			      if(empty($_POST['local'])){
			    	$_POST['local']='0';
			    }
			     if(empty($_POST['metro'])){
			    	$_POST['metro']='0';
			    }
			     if(empty($_POST['other'])){
			    	$_POST['other']='0';
			    }
			     if(empty($discount)){
			    	$discount='0';
			    }

			    $m=$_POST['name'];
                            $title=$m.$_POST['sku'];
                           $name= str_replace(" ","-",$title);
				$data= array(

						'sku_code' =>$_POST['sku'],

						'selling_price' =>$_POST['sprice'],

						'price' =>$_POST['aprice'],

						'pro_name' =>$_POST['name'],

						'main_image1' =>$path,

						'main_image2' =>$path1,

						'main_image3' =>$path2,

						'main_image4' =>$path3,

						'main_image5' =>$path4,

						'description' =>$_POST['desc'],

						'occasion' =>$cat,

						'theme' =>$_POST['sub_cat'],

						'bullet1'		=>$_POST['point1'],

						'bullet2'		=>$_POST['point2'],

						'bullet3'		=>$_POST['point3'],

						'bullet4'		=>$_POST['point4'],

						'bullet5'		=>$_POST['point5'],

						'weight'		=>$_POST['weight'],	

						'material'		=>$_POST['material'],

						'cat_id'	=>$_POST['pcat'],

						'color'			=>$_POST['color'],

						'availability'			=>$_POST['avail'],
						'min_order_quan'			=>$_POST['minimum'],
						'meta_title'      =>$_POST['metatag'],
						'highlights1'      =>$_POST['highlights1'],
						'highlights2'      =>$_POST['highlights2'],
						'highlights3'      =>$_POST['highlights3'],
						'size'			 =>	 $_POST['size'],	
						'meta_description'     =>$_POST['metadesc'],

						'pincode_local'     =>$_POST['local'],
						'pincode_metro'     =>$_POST['metro'],
						'pincode_other'     =>$_POST['other'],
						'box_volume_weight'     =>$_POST['volume'],
						'url'     =>$name,
						'cod'     =>$_POST['cod'],
						'gst'     =>$_POST['gst'],
							'discount_code'=>$discount,
						'gst_per'     =>$_POST['gstper'],
						'meta_keyword'	=>$_POST['metakey'],
						'cancel_pro'	=>$_POST['cancel_pro']


							);

//pr($_POST);die;


			    move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/product/".$image);

			    move_uploaded_file($_FILES["file1"]["tmp_name"], "./assets/product/".$image1);

			    move_uploaded_file($_FILES["file2"]["tmp_name"], "./assets/product/".$image2);

			    move_uploaded_file($_FILES["file3"]["tmp_name"], "./assets/product/".$image3);
			    move_uploaded_file($_FILES["file4"]["tmp_name"], "./assets/product/".$image4);
			    	




			  

			    $table='giftproduct';
			    $where='id';
				$this->Adminmodel->update_common($data,$table,$where,$id);

			  



			    redirect('Team/Listgiftproduct');
			}
			public function Editgiftproduct(){

				is_team();

				$id = $this->uri->segment(3);	
				$where='id';
				$table='giftproduct';

				$data['messages'] = $this->Model->select_common_where($table,$where,$id);
				$id = '5';	
				$where='parent_id';
				$table='category';
				$data['category'] = $this->Model->select_common_where($table,$where,$id);
				$table='occasion';
				$data['occasion']=$this->Model->select_common($table);
				//pr($data);die;

				$this->load->view('Team/editgiftproduct.php',$data);
			}
				public function deletegiftproduct(){

				is_team();

				$id = $this->uri->segment(3);
				$table='giftproduct';
				$where='id';
				$this->Model->delete_common($table,$where,$id);

				redirect('Team/Listgiftproduct');

			}
			
			public function zip(){
			is_team();
				$image_link_raw =$_POST['image'];
				$p=parse_url($image_link_raw);

	
				 $content = $_POST['note'];
				$rand=rand(0000,1111);
				$names=$rand.'content.html';
			$fp = fopen($_SERVER['DOCUMENT_ROOT'] . "/art/assets/textfile/".$names,"wb");
			fwrite($fp,$content);
			fclose($fp);
				$this->load->library('zip');

			$zip_file = $this->zip->get_zip();

			$this->zip->clear_data();

			$name = 'Content('.$_POST['name'].').jpg';
			$this->zip->read_file($_SERVER['DOCUMENT_ROOT']."/art/assets/textfile/".$names); 

			$this->zip->read_file($_SERVER['DOCUMENT_ROOT'].$p['path']);
			$path =$_SERVER['DOCUMENT_ROOT']."/art/assets/textfile/".$names;
				unlink($path);
				$this->zip->download($name);
				
			}
			public function faq(){
				is_team();
				$table='faq';
				$data['messages']=$this->Model->select_common($table);
				$this->load->view('Team/listfaq.php',$data);
			}
			public function addfaq(){
				is_team();
				$this->load->view('Team/Addfaq.php',$data);
			}
			public function Editfaq(){

				is_team();

				$id = $this->uri->segment(3);	
				$where='id';
				$table='faq';

				$data['messages'] = $this->Model->select_common_where($table,$where,$id);
				//pr($data);die;

				$this->load->view('Team/editfaq.php',$data);
			}

			public function newfaq(){
				is_team();
				$data = array(
								'ques' =>$_POST['ques'],
								'answer' =>$_POST['ans'],
							 );
					$table='faq';
					$this->Model->insert_common($table,$data);

					redirect('Team/faq');

			}

			
				public function updatefaq(){
					is_team();
				$where='id';

				$id=$_POST['id'];

				$table='faq';
			
				$data = array(
								'ques' =>$_POST['ques'],
								'answer' =>$_POST['ans'],
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);

				redirect('Team/faq');

			}
				public function deletefaq(){

				is_team();

				$id = $this->uri->segment(3);
				$table='faq';
				$where='id';
				$this->Model->delete_common($table,$where,$id);

				redirect('Team/faq');

			}
			public function terms(){
				is_team();
				$id ='1';	
				$where='id';
				$table='cms';

				$data['messages1'] = $this->Model->select_common_where($table,$where,$id);
				$this->load->view('Team/terms.php',$data);
			}
			public function newterms(){
				is_team();
					$where='id';

				$id='1';

				$table='cms';
			
				$data = array(
								'terms' =>$_POST['id']
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);
			}
			public function shipping(){
				is_team();
				$id ='3';	
				$where='id';
				$table='cms';

				$data['messages1'] = $this->Model->select_common_where($table,$where,$id);
				$this->load->view('Team/shipping.php',$data);
			}
			public function newshipping(){
				is_team();
					$where='id';

				$id='3';

				$table='cms';
			
				$data = array(
								'terms' =>$_POST['id']
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);
			}
			public function returns(){
				is_team();
				$id ='2';	
				$where='id';
				$table='cms';

				$data['messages1'] = $this->Model->select_common_where($table,$where,$id);
				$this->load->view('Team/return.php',$data);
			}
			public function newreturns(){
				is_team();
					$where='id';

				$id='2';

				$table='cms';
			
				$data = array(
								'terms' =>$_POST['id']
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);
			}
			public function about(){
				is_team();
				$id ='5';	
				$where='id';
				$table='cms';

				$data['messages'] = $this->Model->select_common_where($table,$where,$id);
				$this->load->view('Team/about.php',$data);
			}
			public function newabout(){
				is_team();
					$where='id';

				$id='5';

				$table='cms';
			
				$data = array(
								'terms' =>$_POST['id']
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);
			}
				public function shoppingguide(){
					is_team();
				$id ='4';	
				$where='id';
				$table='cms';

				$data['messages1'] = $this->Model->select_common_where($table,$where,$id);
				$this->load->view('Team/guide.php',$data);
			}
			public function newshoppingguide(){
				is_team();
					$where='id';

				$id='4';

				$table='cms';
			
				$data = array(
								'terms' =>$_POST['id']
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);
			}
			public function drag(){
				is_team();
				$table='studentinfo';
				$data['result']=$this->Adminmodel->select_common($table);
				$this->load->view('Team/drag.php',$data);
			}
			public function dragtest(){
				is_team();
				foreach ($_POST["value"] as $key => $value) {
    			$data["Position"]=$key+1;
    			$this->updatePosition($data, $value);
					}
				echo "Sorting Done";
				}

		public  function updatePosition($data,$id){
   		is_team();
  		  if(array_key_exists("Name", $data)){
        $data["Name"]=$this->real_escape_string($data["Name"]);
   		 }
   		
  		  foreach ($data as $key => $value) {
   		
  		  	
        $updates[]=$value;
   		 }
  		  $imploadAray=  implode(",", $updates);
  		  
  		//  $query="Update studentinfo Set $imploadAray Where Id='$id'";
  			$where='Id';

				$id=$id;

				$table='product_detail';
			
				$data = array(
								'Position' =>$imploadAray
							 );

	$resulrt=$this->Adminmodel->update_common($data,$table,$where,$id);

	      if($result){
            return "Category is position";
        }
        else
        {
            return "Error while updating position";
        }

		}
		public function price(){
			is_team();
			$table='product';
				$data['messages1']=$this->Adminmodel->select_com($table);

				$table='product_detail';
				$data['product_detail']=$this->Adminmodel->select_com($table);

				$table='parent_category';
				$data['parent_category']=$this->Adminmodel->select_com($table);
				$data['current_uri'] = $this->uri->segment(2);
			$this->load->view('Team/priceinvent.php',$data);
		}
		public function video(){
				is_team();
				$table='videos';
				$data['messages1']=$this->Model->select_common($table);
				$this->load->view('Team/Listvideo.php',$data);
			}
			public function addnewvideo(){
				$this->load->view('Team/newvideo.php',$data);
			}
			

			public function addvideo(){
				is_team();
				$image = $_FILES['file']['name'];

			    $url = base_url();

			    if(empty($image))

			    {

			    	$path='';

			    }
			    else

			    {
			    	$path = $url."/assets/product/".$image;

			    }
				$data = array(
								'name' =>$_POST['name'],
								'video' =>$path
							 );

					$table='videos';
					$this->Model->insert_common($table,$data);

  			 move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/product/".$image);
					redirect('Team/video');

			}

			public function Editvideo(){

				is_team();

				$id = $this->uri->segment(3);	
				$where='id';
				$table='videos';

				$data['messages1'] = $this->Model->select_common_where($table,$where,$id);
				//pr($data);die;

				$this->load->view('Team/editvideo.php',$data);
			}
				public function updatevideo(){
				is_team();
				$image = $_FILES['file']['name'];

			    $url = base_url();

			    if(empty($image))

			    {

			    	$path=$_POST['files'];

			    }
			    else

			    {
			    	$path = $url."/assets/product/".$image;

			    }
				$where='id';

				$id=$_POST['id'];

				$table='videos';
			
				$data = array(
								'name' =>$_POST['name'],
								'video' =>$path,
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);
				   move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/product/".$image);
				redirect('Team/video');

			}
				public function deletevideo(){

				is_team();

				$id = $this->uri->segment(3);
				$table='videos';
				$where='id';
				$this->Model->delete_common($table,$where,$id);

				redirect('Team/video');

			}


			public function Broucher(){
				is_team();
				$table='Brouchers';
				$data['messages1']=$this->Model->select_common($table);
				$this->load->view('Team/ListBroucher.php',$data);
			}
			public function addnewBroucher(){
				is_team();
				$this->load->view('Team/newBroucher.php',$data);
			}
			

			public function addBroucher(){
				is_team();
				$image = $_FILES['file']['name'];

			    $url = base_url();

			    if(empty($image))

			    {

			    	$path='';

			    }
			    else

			    {
			    	$path = $url."/assets/product/".$image;

			    }
				$data = array(
								'name' =>$_POST['name'],
								'Broucher' =>$path
							 );
				
					$table='Brouchers';
					$this->Model->insert_common($table,$data);

  			 move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/product/".$image);
					redirect('Team/Broucher');

			}

			public function EditBroucher(){

				is_team();

				$id = $this->uri->segment(3);	
				$where='id';
				$table='Brouchers';

				$data['messages1'] = $this->Model->select_common_where($table,$where,$id);
				//pr($data);die;

				$this->load->view('Team/editBroucher.php',$data);
			}
				public function updateBroucher(){
				is_team();
				$image = $_FILES['file']['name'];

			    $url = base_url();

			    if(empty($image))

			    {

			    	$path=$_POST['files'];

			    }
			    else

			    {
			    	$path = $url."/assets/product/".$image;

			    }
				$where='id';

				$id=$_POST['id'];

				$table='Brouchers';
			
				$data = array(
								'name' =>$_POST['name'],
								'Broucher' =>$path,
							 );
				
				$this->Adminmodel->update_common($data,$table,$where,$id);
				   move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/product/".$image);
				redirect('Team/Broucher');

			}
				public function deleteBroucher(){

				is_team();

				$id = $this->uri->segment(3);
				$table='Brouchers';
				$where='id';
				$this->Model->delete_common($table,$where,$id);

				redirect('Team/Broucher');


			}
			/*public function Editteam(){

				is_team();

				$id = $this->uri->segment(3);	
				$where='id';
				$table='team';

				$data['message'] = $this->Model->select_common_where($table,$where,$id);
				//pr($data);die;

				$this->load->view('Team/editfaq.php',$data);
			}*/

			public function newteam(){
				is_team();
				$data = array(
								'rm_name' =>$_POST['name'],
								'rm_password' =>md5($_POST['password']),
								'rm_email' =>$_POST['email'],
								'rm_mobile' =>$_POST['mobile'],
								'profile' => $_POST['profile'], 
								
							 );
					$table='rm';
					$this->Model->insert_common($table,$data);

					redirect('Team/Previleges');

			}

			
				public function editteam(){
is_team();
				$where='id';

				$id=$this->uri->segment(3);

				$table='rm';
			
				$data = array(
								'rm_name' =>$_POST['name'],
								'rm_password' =>md5($_POST['password']),
								'rm_email' =>$_POST['email'],
								'rm_mobile' =>$_POST['mobile'],
								// 'profile' => $_POST['profile'], 
								
							 );
				$this->Adminmodel->update_common($data,$table,$where,$id);

				redirect('Team/Previleges');

			}
				public function deleteteam(){

				is_team();

				$id = $this->uri->segment(3);
				$table='admin';
				$where='rm';
				$this->Model->delete_common($table,$where,$id);

				redirect('Team/Previleges');

			}
				public function teamstatus(){
is_team();
				$where='id';

				$id=$_POST['id'];

				$table='admin';

				$data= array(

					'status' => $_POST['type']

							);

				$this->Adminmodel->update_common($data,$table,$where,$id);

			}
			public function updatePrevileges(){
			is_team();
				$role=implode(",", $_POST['art']);
				$where='id';

				$id= $_POST['id'];

				$table='admin';
			
				$data = array(
								'role'=>$role
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);

				redirect('Team/Previleges');

			}
			
			public function insertPrevileges(){
			is_team();
			
				$user_id= $_POST['user_id'];
			
				// ========= Inventory  ============
				
				$navbar_name = 'Inventory' ;
				
				$view= $_POST['Inventory_view'];
				$edit=$_POST['Inventory_edit'];
				$download= $_POST['Inventory_download'];
				$upload=  $_POST['Inventory_upload'];
				
				$rm_id=  $_POST['Orderlist_rm'];
				
				$this->team_role_add($user_id , $navbar_name ,$view ,$edit ,$download ,$upload ,$rm_id ) ;
				
			// ========= NewOrder  ============
				
				$navbar_name = 'NewOrder' ;
				$view= $_POST['NewOrder_view'];
				$edit=$_POST['NewOrder_edit'];
				$download= $_POST['NewOrder_download'];
				$upload=  $_POST['NewOrder_upload'];
				
				$rm_id=  $_POST['Orderlist_rm'];
				
				$this->team_role_add($user_id , $navbar_name ,$view ,$edit ,$download ,$upload ,$rm_id ) ;
				
			// ========= ProductionOrder  ============
				
				$navbar_name = 'ProductionOrder' ;
				$view= $_POST['ProductionOrder_view'];
				$edit=$_POST['ProductionOrder_edit'];
				$download= $_POST['ProductionOrder_download'];
				$upload=  $_POST['ProductionOrder_upload'];
				
				$rm_id=  $_POST['Orderlist_rm'];
				
				$this->team_role_add($user_id , $navbar_name ,$view ,$edit ,$download ,$upload ,$rm_id) ;
				
		// ========= Orderlist  ============
				
				$navbar_name = 'Orderlist' ;
				$view= $_POST['Orderlist_view'];
				$edit=$_POST['Orderlist_edit'];
				$download= $_POST['Orderlist_download'];
				$upload=  $_POST['Orderlist_upload'];
				$rm_id=  $_POST['Orderlist_rm'];
				
				$this->team_role_add($user_id , $navbar_name ,$view ,$edit ,$download ,$upload  ,$rm_id ) ;
				
				// $data = array(
				//         'user_id' =>$user_id,
				// 	    'navbar_name' => 'Inventory',
				// 	    'view'=>$view ,
				// 		'edit'=>$edit ,
				// 		'download'=>$download ,
				// 		'upload'=>$upload ,
				// 		 );
				// 		 $row = $this->db->get_where('team_role' ,array('user_id'=> $user_id , 'navbar_name' => 'Inventory'))->row();
				// 		 	$table='team_role';
				// 		 if($row){
				// 		     	$where='id';
		    	// 		     	$id = $row->id ;
				// $this->Adminmodel->update_common($data,$table,$where,$id);
				// 		 }
				// 		else{
				// 		 	$this->Model->insert_common($table,$data);
				// 		}	 
						
						
						
			
					
				redirect('Team/AddPrevileges/'.$user_id);

			}
			
			
			
			function team_role_add($user_id , $navbar_name ,$view ,$edit ,$download ,$upload ,$rm_id){
			    
			    	$data = array(
				        'user_id' =>$user_id,
					    'navbar_name' => $navbar_name,
					    'view'=>$view ,
						'edit'=>$edit ,
						'download'=>$download ,
				// 		'upload'=>$upload ,
								
						 );
						 
						 if($rm_id){
						 
						 $data['rm_no'] = $rm_id ;
						 }
						 
						 if($upload){
						     
						     $data['upload'] =$upload ;
						 }
						 
						 $row = $this->db->get_where('team_role' ,array('user_id'=> $user_id , 'navbar_name' => $navbar_name))->row();
						 	$table='team_role';
						 if($row){
						     
						     	$where='id';
						     	$id = $row->id ;
						    
				$this->Adminmodel->update_common($data,$table,$where,$id);
 
						 }
						else{
						    
						 	$this->Model->insert_common($table,$data);
						    
						    
						}
						
					return true ;	
			    
			    
			}
			
			
			public function allexcel(){
				is_team();
				$image = $_FILES['excel']['name'];

			    $url = base_url();

			    if(empty($image))

			    {

			    	$path='';

			    }
			    else

			    {
			    	$path = $url."/assets/excelsheet/".$image;

			    }
				$data = array(
								'url' =>$_POST['url'],
								'sheetname' =>$image,
								'sheet' =>$path,
								'date' =>date('Y-m-d')
							 );
				
					$table='excelsheet';
					$this->Model->insert_common($table,$data);

  			 move_uploaded_file($_FILES["excel"]["tmp_name"], "./assets/excelsheet/".$image);
  			 if($_POST['url']=='excel'){
					redirect('Team/ListProduct');
  			 }elseif ($_POST['url']=='updatevarpro') {
					redirect('Team/inventory');
  			 
  			 }elseif ($_POST['url']=='updateproductcsv') {
					redirect('Team/inventory');
  			 
  			 }elseif ($_POST['url']=='updatepriceproductcsv') {
					redirect('Team/price');
  			 
  			 }
  			 elseif ($_POST['url']=='updatepricevarproductcsv') {
					redirect('Team/price');
  			 
  			 }
  			  elseif ($_POST['url']=='updatepro') {
					redirect('Team/ListProduct');
  			 
  			 }else{
					redirect('Team/varient/'.$this->uri->segment(3));

  			 }
	
			}
			public function excelsheet(){
				$table='excelsheet';
				is_team();
				$data['sheet']=$this->Model->select_common($table);
				$this->load->view('Team/excelsheet.php',$data);
			}
			public function approvecsv(){

is_team();
				 $id= $this->uri->segment(3);
				$where='id';
				$table='excelsheet';
			
				$data = array(
								'approved'=>'1'
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);	
				$var=$this->uri->segment(4);
				$this->$var($id);
				//redirect('Team/excelsheet');
			}
			public function deleteexcel(){
						is_team();

				$id = $this->uri->segment(3);
				$table='excelsheet';
				$where='id';
				$this->Model->delete_common($table,$where,$id);
				unlink($_SERVER['DOCUMENT_ROOT'].'/art/assets/excelsheet/'.$this->uri->segment(4));

			redirect('Team/excelsheet');
			}
			public function Promotioncategory(){
			is_team();
				$id ='';	
				$where='sku_code';
				$table='promotion';

				$data['cat'] = $this->Model->select_common_where($table,$where,$id);
				$this->load->view("Team/promotioncat.php",$data);
				}
				public function addnewpromocat(){
				is_team();
				$table='parent_category';
				$data['cat']=$this->Model->select_common($table);	
				$this->load->view("Team/addpromocat.php",$data);

				}
				public function newpromocat(){
				is_team();
				//pr($_POST);die;
				$cat=implode(",", $_POST['cat']);
				$data = array(
								'occasion' =>$_POST['name'],
								'per' =>$_POST['per'],
								'maxdiscount' =>$_POST['max'],
								'catid' =>$cat,
							 );
				//pr($data);
					$table='promotion';
					$this->Model->insert_common($table,$data);
					$image = $_FILES['file']['name'];

			    $url = base_url();

			    if(empty($image))

			    {

			    	$path='';

			    }
			    else
 				{
			    	$path = $url."/assets/product/".$image;

			    }
					$table='promotion';
				$promotion=$this->Model->select_common($table);
				rsort($promotion);
				$data = array(
								'url' =>$_POST['name'],
								'banner' =>$path,
								'pid' =>$promotion[0]['id'],
							 );
				
					$table='banner';
					$this->Model->insert_common($table,$data);
				   move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/product/".$image);

					redirect('Team/Promotioncategory');

			}
			public function deactivepromotion(){
					 is_team();
					 $id= $this->uri->segment(3);
				$where='id';
				$table='promotion';
			
				$data = array(
								'status'=>'0'
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);

				$id= $this->uri->segment(3);
				$where='pid';
				$table='banner';
			
				$data = array(
								'status'=>'0'
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);

				 $id =$this->uri->segment(3);	
				$where='id';
				$table='promotion';

				$promotion = $this->Model->select_common_where($table,$where,$id);
				$cat=explode(",", $promotion[0]['catid']);
				foreach ($cat as $value) {
				   
				   $id =$value;	
				$where='parent_cat';
				$table='product_detail';

				$parcat = $this->Model->select_common_where($table,$where,$id);
				foreach ($parcat as  $pae) {
					
				$id= $pae['sku_code'];
				$where='sku_code';
				$table='product_detail';
			
				$data = array(
								'promotion_price'=>''
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);
					  $id =$pae['sku_code'];	
				$where='parent_skucode';
				$table='product';

				$product = $this->Model->select_common_where($table,$where,$id);
				foreach ($product as $key) {
				
				 $id= $key['sku_code'];
				$where='sku_code';
				$table='product';
			
				$data = array(
								'promotion_price'=>''
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);
			}
				}
				if($value=='5'){
				$table='giftproduct';
				$giftproduct=$this->Model->select_common($table);
				foreach ($giftproduct as $gift) {
				
				 $id= $gift['sku_code'];
				$where='sku_code';
				$table='giftproduct';
			
				$data = array(
								'promotion_price'=>''
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);
			}
			//pr($giftproduct);
			}
			}
					redirect('Team/Promotioncategory');

			}

			public function activepromotion(){
					 is_team();
					 $id= $this->uri->segment(3);
				$where='id';
				$table='promotion';
			
				$data = array(
								'status'=>'1'
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);

				$id= $this->uri->segment(3);
				$where='pid';
				$table='banner';
			
				$data = array(
								'status'=>'1'
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);

				 $id =$this->uri->segment(3);	
				$where='id';
				$table='promotion';

				$promotion = $this->Model->select_common_where($table,$where,$id);
				$cat=explode(",", $promotion[0]['catid']);
				//pr($promotion);
				foreach ($cat as $value) {
				   
				   $id =$value;	
				$where='parent_cat';
				$table='product_detail';

				$parcat = $this->Model->select_common_where($table,$where,$id);
				foreach ($parcat as  $pae) {
					$val = $pae['selling_price']/100*$promotion[0]['per'];
				
				if($val>$promotion[0]['maxdiscount']){
				
					$val =$promotion[0]['maxdiscount'];
				}
				//pr($pae);


				 $id= $pae['sku_code'];
				$where='sku_code';
				$table='product_detail';
			
				$data = array(
								'promotion_price'=>round($pae['selling_price']-$val)
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);

				  $id =$pae['sku_code'];	
				$where='parent_skucode';
				$table='product';

				$product = $this->Model->select_common_where($table,$where,$id);
				foreach ($product as $key) {
					$val = $key['selling_price']/100*$promotion[0]['per'];
				
				if($val>$promotion[0]['maxdiscount']){
				
					$val =$promotion[0]['maxdiscount'];
				}
				 $id= $key['sku_code'];
				$where='sku_code';
				$table='product';
			
				$data = array(
								'promotion_price'=>round($key['selling_price']-$val)
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);
			}
				//pr($product);
				}
				if($value=='5'){
				$table='giftproduct';
				$giftproduct=$this->Model->select_common($table);
				foreach ($giftproduct as $gift) {
					$val = $gift['selling_price']/100*$promotion[0]['per'];
				
				if($val>$promotion[0]['maxdiscount']){
				
					$val =$promotion[0]['maxdiscount'];
				}
				 $id= $gift['sku_code'];
				$where='sku_code';
				$table='giftproduct';
			
				$data = array(
								'promotion_price'=>round($gift['selling_price']-$val)
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);
			}
			//pr($giftproduct);
			}

			}
					redirect('Team/Promotioncategory');

			}
				public function deleterromocat(){
						is_team();


					 $id =$this->uri->segment(3);	
				$where='id';
				$table='promotion';

				$promotion = $this->Model->select_common_where($table,$where,$id);
				$cat=explode(",", $promotion[0]['catid']);
				foreach ($cat as $value) {
				   
				   $id =$value;	
				$where='parent_cat';
				$table='product_detail';

				$parcat = $this->Model->select_common_where($table,$where,$id);
				foreach ($parcat as  $pae) {
					
				$id= $pae['sku_code'];
				$where='sku_code';
				$table='product_detail';
			
				$data = array(
								'promotion_price'=>''
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);
					  $id =$pae['sku_code'];	
				$where='parent_skucode';
				$table='product';

				$product = $this->Model->select_common_where($table,$where,$id);
				foreach ($product as $key) {
				
				 $id= $key['sku_code'];
				$where='sku_code';
				$table='product';
			
				$data = array(
								'promotion_price'=>''
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);
			}
				}
				if($value=='5'){
				$table='giftproduct';
				$giftproduct=$this->Model->select_common($table);
				foreach ($giftproduct as $gift) {
				
				 $id= $gift['sku_code'];
				$where='sku_code';
				$table='giftproduct';
			
				$data = array(
								'promotion_price'=>''
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);
			}
			//pr($giftproduct);
			}
			}

				$id = $this->uri->segment(3);
				$table='promotion';
				$where='id';
				$this->Model->delete_common($table,$where,$id);

				$id = $this->uri->segment(3);
				$table='banner';
				$where='pid';
				$this->Model->delete_common($table,$where,$id);
			redirect('Team/Promotioncategory');
			}
			public function Promotionproduct(){
				$id ='1';	
				is_team();
				$where='excelaprove';
				$table='promotion';

				$data['cat'] = $this->Model->select_common_where($table,$where,$id);
				$this->load->view('Team/promotionpro.php',$data);
			}
			public function addnewpromopro(){
				is_team();
				$this->load->view("Team/addpromopro.php");

				}
			public function newpromopro(){
				//pr($_POST);die;
				is_team();
				$images = $_FILES['excel']['name'];

			    $url = base_url();

			    if(empty($images))

			    {

			    	$paths='';

			    }
			    else

			    {
			    	$paths = $url."/assets/excelsheet/".$images;

			    }
				$data = array(
								'occasion' =>$_POST['name'],
								'per' =>$_POST['per'],
								'maxdiscount' =>$_POST['max'],
								'sku_code'=>$paths
							 );
				//pr($data);
					$table='promotion';
					$this->Model->insert_common($table,$data);
					$image = $_FILES['file']['name'];

			    $url = base_url();

			    if(empty($image))

			    {

			    	$path='';

			    }
			    else
 				{
			    	$path = $url."/assets/product/".$image;

			    }

			   
					$table='promotion';
				$promotion=$this->Model->select_common($table);
				rsort($promotion);
				$data = array(
								'url' =>$_POST['name'],
								'banner' =>$path,
								'pid' =>$promotion[0]['id'],
							 );
				
					$table='banner';
					$this->Model->insert_common($table,$data);
				   move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/product/".$image);

				   
				$image = $_FILES['excel']['name'];

			    $url = base_url();

			    if(empty($image))

			    {

			    	$path='';

			    }
			    else

			    {
			    	$path = $url."/assets/excelsheet/".$image;

			    }
				$data = array(
								'url' =>'promoexcel',
								'sheetname' =>$image,
								'sheet' =>$path,
								'promoid' =>$promotion[0]['id'],
								'date' =>date('Y-m-d')
							 );
				//pr($data);
					$table='excelsheet';
					$this->Model->insert_common($table,$data);

  			 move_uploaded_file($_FILES["excel"]["tmp_name"], "./assets/excelsheet/".$image);
  			redirect('Team/Promotionproduct');

			}
			public function promoexcel($id){


is_team();
					$where='id';

				$table='excelsheet';

				$data=$this->Adminmodel->select_com_where($table,$where,$id);

//pr($_FILES);die;
				$id= $data[0]['promoid'];
				$where='id';
				$table='promotion';
			
				$data = array(
								'excelaprove'=>'1'
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);

			redirect('Team/Promotionproduct');

 

			}

			public function activepromoexcel(){
is_team();
				$id=$this->uri->segment(3);
				$where='pid';
				$table='banner';

				$data = array(
								'status'=>'1'
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);

				$id=$this->uri->segment(3);
				$where='id';
				$table='promotion';

				$data = array(
								'status'=>'1'
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);

				
				$data12=$this->Adminmodel->select_com_where($table,$where,$id);



				$firstline = true;
        $handle = fopen($data12[0]['sku_code'], "r");

        $c = 0;

        while(($filesop = fgetcsv($handle, 100000, ",")) !== false)

 			{

 			if (!$firstline) {
			if(!empty($filesop[0])){

 		
 				$id = $filesop[0];	
				$where='sku_code';
				$table='product';

				$datas=$this->Adminmodel->select_com_where($table,$where,$id);

 			$val = $datas[0]['selling_price']/100*$data12[0]['per'];
				
				if($val>$data12[0]['maxdiscount']){
				
					$val =$data12[0]['maxdiscount'];
				}

				$id = $filesop[0];	
				$where='sku_code';
				$table='product';
				$data = array(
								'promotion_price'=>round($datas[0]['selling_price']-$val)
							 );

	 $this->Adminmodel->update_common($data,$table,$where,$id);

				 $id = $filesop[0];	
				$where='sku_code';
				$table='product_detail';

				$data2=$this->Adminmodel->select_com_where($table,$where,$id);
				
 			$val = $data2[0]['selling_price']/100*$data12[0]['per'];
				
				if($val>$data12[0]['maxdiscount']){
				
					$val =$data12[0]['maxdiscount'];
				}

				 $id = $filesop[0];	
				$where='sku_code';
				$table='product_detail';
				$data = array(
								'promotion_price'=>round($data2[0]['selling_price']-$val)
							 );
				
	 $this->Adminmodel->update_common($data,$table,$where,$id);


	 		 $id = $filesop[0];	
				$where='sku_code';
				$table='giftproduct';

				$data3=$this->Adminmodel->select_com_where($table,$where,$id);

 			$val = $data3[0]['selling_price']/100*$data12[0]['per'];
				
				if($val>$data12[0]['maxdiscount']){
				
					$val =$data12[0]['maxdiscount'];
				}

			 $id = $filesop[0];	
				$where='sku_code';
				$table='giftproduct';
				$data = array(
								'promotion_price'=>round($data3[0]['selling_price']-$val)
							 );
				
	 $this->Adminmodel->update_common($data,$table,$where,$id);
					}

				 }
 					   $firstline = false;
				}
				redirect('Team/Promotionproduct');
			}
			public function deactivepromoexcel(){
			is_team();
					$id=$this->uri->segment(3);
				$where='pid';
				$table='banner';

				$data = array(
								'status'=>'0'
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);
				
				$id=$this->uri->segment(3);
				$where='id';
				$table='promotion';

				$data = array(
								'status'=>'0'
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);

					$data12=$this->Adminmodel->select_com_where($table,$where,$id);


				$firstline = true;
        $handle = fopen($data12[0]['sku_code'], "r");

        $c = 0;

        while(($filesop = fgetcsv($handle, 100000, ",")) !== false)

 			{

 			if (!$firstline) {
			if(!empty($filesop[0])){

 		
				$id = $filesop[0];	
				$where='sku_code';
				$table='product';
				$data = array(
								'promotion_price'=>''
							 );

	 $this->Adminmodel->update_common($data,$table,$where,$id);

			

				 $id = $filesop[0];	
				$where='sku_code';
				$table='product_detail';
				$data = array(
								'promotion_price'=>''
							 );
				
	 $this->Adminmodel->update_common($data,$table,$where,$id);


	 		
			 $id = $filesop[0];	
				$where='sku_code';
				$table='giftproduct';
				$data = array(
								'promotion_price'=>''
							 );
				
	 $this->Adminmodel->update_common($data,$table,$where,$id);
					}

				 }
 					   $firstline = false;
				}
				redirect('Team/Promotionproduct');

			}
					public function deletepromoexcel(){
					is_team();
				
				$id=$this->uri->segment(3);
				$where='id';
				$table='promotion';

					$data12=$this->Adminmodel->select_com_where($table,$where,$id);


				$firstline = true;
        $handle = fopen($data12[0]['sku_code'], "r");

        $c = 0;

        while(($filesop = fgetcsv($handle, 100000, ",")) !== false)

 			{

 			if (!$firstline) {
			if(!empty($filesop[0])){

 		
				$id = $filesop[0];	
				$where='sku_code';
				$table='product';
				$data = array(
								'promotion_price'=>''
							 );

	 $this->Adminmodel->update_common($data,$table,$where,$id);

			

				 $id = $filesop[0];	
				$where='sku_code';
				$table='product_detail';
				$data = array(
								'promotion_price'=>''
							 );
				
	 $this->Adminmodel->update_common($data,$table,$where,$id);


	 		
			 $id = $filesop[0];	
				$where='sku_code';
				$table='giftproduct';
				$data = array(
								'promotion_price'=>''
							 );
				
	 $this->Adminmodel->update_common($data,$table,$where,$id);
					}

				 }
 					   $firstline = false;
				}
				
				$id = $this->uri->segment(3);
				$table='promotion';
				$where='id';
				$this->Model->delete_common($table,$where,$id);

				$id = $this->uri->segment(3);
				$table='banner';
				$where='pid';
				$this->Model->delete_common($table,$where,$id);
				redirect('Team/Promotionproduct');

			}
			public function returnpro(){
					is_team();
					$table='returnproduct';
				$data['return']=$this->Adminmodel->select_common($table);

	$this->load->view('Team/listreturn',$data);

			}
			public function approvereturn(){
				is_team();
				 $id = $this->uri->segment(3);	
				$where='id';
				$table='returnproduct';
				$data = array(
								'approved'=>'1'
							 );
				
	 $this->Adminmodel->update_common($data,$table,$where,$id);


	 		
			 $id = $this->uri->segment(4);	
				$where='id';
				$table='order_detail';
				$data = array(
								'order_status'=>'3'
							 );
				
	 $this->Adminmodel->update_common($data,$table,$where,$id);

				redirect('Team/returnpro');
			}
			public function addsuggest(){
				
is_team();
					$data= array(

					'order_id' => $_POST['id'],
					'sku_code' => $_POST['name'],
					'pid' => $_POST['pid'],

					'quantity' => $_POST['quantity']


							);


				//pr($data);
					$table='suggest_order';
					$this->Adminmodel->insert_common($data,$table);
			}
			public function adddiscount()
			{
			is_team();	
				 $id = $_POST['orderid'];	

				$where='order_id';
				$table='orders';

				$data = $this->Adminmodel->select_common_where($table,$where,$id);
				 $price=$data[0]['subtotal']*$_POST['dprice']/100;
				 $fprice=$data[0]['subtotal']-$price;

				 $id = $_POST['orderid'];
				$where='order_id';
				$table='orders';
				$data = array(
								'finalamount'=>round($data[0]['finalamount']-$price),

								'admindiscount'=>round($data[0]['admindiscount']+$price)
							 );
				
	 $this->Adminmodel->update_common($data,$table,$where,$id);
	 redirect('Team/requestdetail/'.$id);
				
			}

			public function addtransport()
			{
				is_team();
				 $id = $_POST['orderid'];	

				$where='order_id';
				$table='orders';

				$data = $this->Adminmodel->select_common_where($table,$where,$id);
				 $price=$_POST['tprice'];

				 $id = $_POST['orderid'];
				$where='order_id';
				$table='orders';
				$data = array(
								'transportcharge'=>round($price),
								'finalamount'=>round($data[0]['finalamount']+$price)
							 );
				
	 $this->Adminmodel->update_common($data,$table,$where,$id);
	 redirect('Team/requestdetail/'.$id);
				
			}

public function addsidebanner(){
	is_team();
	$this->load->view('Team/banneradd.php');
}
public function BannerUpload(){
			   is_team();


$image4 = $_FILES['file']['name'];

$url = base_url();
 $path = $url."assets/sidebanner/".$image4;


move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/sidebanner/".$image4);

$data = array(
	'name' => $_POST['name'],
	'images'  => $path
			);
//pr($data);die;
 $id = $this->Adminmodel->insert_common($data,'sidebanner');
redirect('Team/Listsidebanner');

}
public function Listsidebanner(){
	is_team();
	$table='sidebanner';
				$data['messagess']=$this->Adminmodel->select_common($table);
			//	pr($data);die;
	$this->load->view('Team/Listsidebanner.php',$data);
}


//==============new product for order list =====
public function new_product_add(){
    
    $sku  = $this->input->post('sku');  
    
    $ord_id  = $this->input->post('ord_id');   
    
    $old_sku  = $this->input->post('old_sku');   
    
    $req_id  = $this->input->post('req_id'); 
    
     $user_detail  = $this->db->get_where('orders', array('order_id' => $req_id ,))->row() ;
     
     $user_id =  $user_detail->user_id;
      
      
    $exist_product = $this->db->get_where('order_detail', array('product_id' => $sku , 'user_id' => $user_id , 'order_rand_id' => $req_id ,))->row() ;
    
    
    if($exist_product){
        
        
        echo "All ready exist" ;
        
    }else{

      $product_detail  = $this->db->get_where('product_detail', array('sku_code' => $sku ,))->row() ;
      
      if(empty($product_detail)){
          
          
             $product_detail=$this->db->get_where('product', array('sku_code' => $sku,))->row() ;
                			        
      }
      
      $price = $product_detail->selling_price ;
      
      $per_gst  = $product_detail->gst_per;
      
      $gst = $pricer*$per_gst/100 ;
      
      	$data = array(
						'order_id' =>$ord_id,
						'order_rand_id' =>$req_id,
						'user_id'=>$user_detail->user_id,
						'product_id' =>$sku,
						'quantity' =>'1',
						'price' =>$product_detail->selling_price,
						'productgst' =>$gst ,
						
						'cart_price' =>$product_detail->price,
						
					//	'gst'=>round($value['gst']+$fgst),
						'gst'=>$product_detail->gst_per,
						'gst_inc'=>$product_detail->gst,
						'frieght' =>0,
					    'series_product' => $old_sku ,
						
						 );
						 
				// 	pr($data);
				// 	exit; 
			$table='order_detail';
			$lid=$this->Adminmodel->insert_common($data,$table);

        if($lid){
            echo "Product Add Successfully" ;
        }
        else{
            echo "Product Not Added" ;
        }
    } 
}


//==============line new product for order list =====
public function  link_product_add(){
    
     $sku  = $this->input->get('sku');  
    
    $ord_id  = $this->input->get('orderid');   
    
    $old_sku  = $this->input->get('old_sku');   
    
     $req_id  = $this->input->get('orderid'); 
    
     $user_detail  = $this->db->get_where('orders', array('order_id' => $req_id ,))->row() ;
     
     $user_id =  $user_detail->user_id;
      
      
    $exist_product = $this->db->get_where('order_detail', array('product_id' => $sku , 'user_id' => $user_id , 'order_rand_id' => $req_id ,))->row() ;
    
    
    if($exist_product){
        
       redirect('Team/requestdetail/'.$req_id) ;
        
    }else{

      $product_detail  = $this->db->get_where('product_detail', array('sku_code' => $sku ,))->row() ;
      
      if(empty($product_detail)){
          
          
             $product_detail=$this->db->get_where('product', array('sku_code' => $sku,))->row() ;
                			        
      }
      
      $price = $product_detail->selling_price ;
      
      $per_gst  = $product_detail->gst_per;
      
      $gst = $pricer*$per_gst/100 ;
      
      	$data = array(
						'order_id' =>$ord_id,
						'order_rand_id' =>$req_id,
						'user_id'=>$user_detail->user_id,
						'product_id' =>$sku,
						'quantity' =>'1',
						'price' =>$product_detail->selling_price,
						'productgst' =>$gst ,
						
						'cart_price' =>$product_detail->price,
						
					//	'gst'=>round($value['gst']+$fgst),
						'gst'=>$product_detail->gst_per,
						'gst_inc'=>$product_detail->gst,
						'frieght' =>0,
					    'series_product' => $old_sku ,
						
						 );
						 
				// 	pr($data);
				// 	exit; 
			$table='order_detail';
			$lid=$this->Adminmodel->insert_common($data,$table);

        if($lid){
            
            
            // echo "Product Add Successfully" ;
            
              redirect('Team/requestdetail/'.$req_id) ;
        }
        else{
            
            
            // echo "Product Not Added" ;
            
              redirect('Team/requestdetail/'.$req_id) ;
        }
    } 
}

//===========Conform usr RM =========


public function conform_user_rm(){
				is_team();

			
				$user_id=$_POST['user_id'];	
				$rm_id=$this->input->post('rm_id');
				
				$data= array(

						'valid' =>'1',
						'Rm_id'=>$rm_id , 

							);
							
						
				
				$table='customerlogin';
				if($user_id){
				    
				$where='id';
			
			    $this->Adminmodel->update_common($data,$table,$where,$id);
			    
			     $this->db->where('id', $user_id);
                $this->db->update('customerlogin', $data);
	    	    
			    
			    
			    
			    
		       $user  = $this->db->get_where('customerlogin', array('id' => $user_id ,))->row() ;
			        
			        
      
			    $mob = $user->phone ;
			    	sms_accept($mob);
			    	
			    	
			    
				}
				
				else
				{
				    echo "not user" ;
				redirect('Team/Customers');
				}

				redirect('Team/Customers');
			
			}
			
			
			//===========Reject user RM =========


public function reject_user(){
				is_team();

			
				$user_id=$this->input->post('user_id');	
				$selectRegion=$this->input->post('selectRegion');
				
			
					$region_details =$this->input->post('region_details');
					
					 
			    if($selectRegion == 'Other'){
			        
			        $selectRegion = $region_details ;
			        
			    }
			    
				
				$data= array(

						'valid' =>'2',
					'reason' =>$selectRegion ,

							);
							
				
				$table='customerlogin';
				if($user_id){
				    
				$where='id';
			
			    $this->Adminmodel->update_common($data,$table,$where,$id);
			    
			      $this->db->where('id', $user_id);
                $this->db->update('customerlogin', $data);
	    	    
			    
			        $user  = $this->db->get_where('customerlogin', array('id' => $user_id ,))->row() ;
      
			    $mob = $user->phone ;
			   
			    	sms_reject($mob ,$selectRegion );
			    
				}
				
				else
				{
				    echo "not user" ;
				redirect('Team/Customers');
				}

				redirect('Team/Customers');
			
			}

//===================Apply_ Discount ======

function apply_discount(){
    
     $total_discount = $this->input->post('total_discount');
     $req_id = $this->input->post('req_id');
      
     	$result   = $this->db->get_where('order_detail', array('order_rand_id' => $req_id ,))->result() ;
     	
                        	$a = 1 ;
                             $percent_amount = array();
                              $discount = array() ;
                              
                              
                               foreach ($result as  $value) {
                               
                                   
                                  echo   $total_price+= $value->cart_price ;
                               }
                             
                                  
                           foreach($result as  $amount){
                               
                               $price = $amount->cart_price ;
                               
                               $one_item_price = $amount->price_after_discount ;
                               
                               $id = $amount->id ; 
                               $qty = $amount->quantity ;
                               
                               
                               $item_amt = $one_item_price*$qty;
                               
                               $gst_per = $amount->gst ;
                       //==================== % ratio =====                                
                                  
                              $percent_amount[$a] =round(($price / $total_price)*100,2); 
                               $discount[$a] =   $total_discount*($percent_amount[$a]/100);
                               
                               $per_item_discount =  $discount[$a] /$qty ;
                                   
                //==========GST Calculate =========
                
                
                
                 $real_price = $one_item_price  - $per_item_discount ;
                 
                 $sub_price = $real_price*$qty  ;
                 
                 $gst_amt =  $sub_price*($gst_per/100) ;
                
                //=========================
                                   
                                   $post = array(
                                       
                                       'discount_price' =>round($per_item_discount,2) ,
                                       
                                      'cart_price' => $sub_price,
                                       
                                       'productgst'=> round($gst_amt,2) ,
                                       
                                       
                                       );
                          //=========update discount======
                                              
                            $this->db->where('id', $id);
                            $this->db->update('order_detail', $post);

                          //=================
                                       
                                       
                            $a++ ;      
                           }
                           
                           
                            $discount = array(
                                       
                                       'discountcharge' =>$total_discount ,
                                       
                                     
                                       );
                           
                             //=========update Admin discount======
                                              
                            $this->db->where('order_id', $req_id);
                            $this->db->update('orders', $discount);

                          //===========================
                           
                            $_SESSION['total_discount'] =  $total_discount ;
                           
                           print_r($discount) ; 
                           

}


//============++Order Place ====================


function placeorder(){
    
      
			    $request_id = $this->input->post('request_id') ;
			  
			    $final_amount = $this->input->post('finalprice') ;
			   
			    $total_discount = $this->input->post('total_discount') ;
			   
			    $sub_total = $this->input->post('sub_total') ;
			    
			    $gst_total = $this->input->post('total_gst') ; 
			    
			 
			 //============update order ================
			 
                                   $post = array(
                                       
                                       'finalamount' =>$final_amount ,
                                       
                                    //   'discountcharge'=> $total_discount ,
                                       
                                       'subtotal'=> $sub_total ,
                                       
                                       'gst_total' => $gst_total ,
                                       
                                       'order_status' => 'Pending' ,
                                       
                                       );
                          //=========update discount======
                                              
                            $this->db->where('order_id', $request_id);
                            $this->db->update('orders', $post);

                           //=================
        
        //========= Ledger Amount =======
        
        
                            $this->db->where('order_id', $request_id);
                            $this->db->update('ledger_account', $post);
         
                          
			    
   return  redirect('Team/orderbystatus/Pending') ;
    
}


//===============Delete Product =======

	public function delete_newproduct(){
	    
	    
	   
	    
	      $sku  = $this->input->post('sku');  
    
            $ord_id  = $this->input->post('ord_id');   
            
            $old_sku  = $this->input->post('old_sku');   
            
            $req_id  = $this->input->post('req_id'); 
            
             $user_detail  = $this->db->get_where('orders', array('order_id' => $req_id ,))->row() ;
             
             $user_id =  $user_detail->user_id;
             
             
      
	    

		$delete = 	$this->db->delete('order_detail', array('user_id' => $user_id , 'product_id' => $sku )); 
			
			
			if($delete){
			    
			    echo "delete" ;
			}
			else{
			    
			    echo "not delete" ; 
			}
			

			}

//=================Clickshipped =======================

 	public function clickshipped(){
				is_team();


	$req_id = $this->input->post('req_id');	
	$user_id = $this->input->post('user_id');
	
		$finalamount = $this->input->post('finalamount');
		
	$parter_name = $this->input->post('parter_name');
	$track_id = $this->input->post('track_id');
	$parter_contact = $this->input->post('parter_contact');
	$date = $this->input->post('date');
	$mode = $this->input->post('mode');
	
	//==================Upload img =========
	
	      $file_name ='upload_file';
        $files = $_FILES['upload_file'];
        
	      $upload_path = FCPATH.'./images/' ;
        $url1 =  array('upload_path' => './assets/order_process/',
                'allowed_types' => 'jpg|jpeg|png|pdf',

            );
            $config = array(
                'upload_path' => $url1['upload_path'],
                'allowed_types'=> $url1['allowed_types'],

            );

            $this->load->library('upload', $config);
             if (!$this->upload->do_upload('upload_file')) {
                $error = array('error' => $this->upload->display_errors());
               	redirect('Team/orderbystatus/ReadyShipped');
            }
            else {
	
	
	$img =  $this->upload->data();
	$image_path =  base_url("assets/order_process/".$img['file_name']); 
	//=====================
	
		 $data = array(
		 	 'parter_name' => $parter_name ,
		 	 'parter_contact' =>$parter_contact,
		 	 'track_id' => $track_id ,
		 	 'shipment_date'=>$date ,
		     'order_status'=>'Shipped',
		 	 'trasnport_document' => $image_path ,
		 );
		 
		 if($mode=='Transport'){
		     
		     $data['transport_Delivery_Point']  = $this->input->post('Delivery_Point');
		 }
		 
				$this->db->where('order_id', $req_id);
                $this->db->update('orders', $data);
                
       //========Ledger ==========
       
      	$ledger = array(
	    	    
	    	    'order_id' => $req_id ,
	    		'user_id'=>$user_id,
	       		'transaction_mode' => 'Order dispatched' ,
	    		'ledger_status' => 'Order Done' ,
	    		'debit' => 	$finalamount ,
	    		'date' => date("Y-m-d")  ,
	    		
	    	    ) ;
	    	    
	    	$table2='ledger_account';
	    	$ledger_id =$this->Adminmodel->insert_common($ledger,$table2);
	    	
                
       //====================== 
				redirect('Team/orderbystatus/Shipped');
			
		}
		
 	    
 	}
			
			
//==========================click ===

			public function shipped_done(){
			    
			$req_id = $this->input->post('req_id') ;
			
			
		//==================Upload img =========
	
	
	     
        $files = $_FILES['invoice_file'];
        
   	      $upload_path = FCPATH.'./images/' ;
	      
        $url1 =  array('upload_path' => './assets/invoice_upload/',
                'allowed_types' => 'jpg|jpeg|png|pdf',

            );
            $config = array(
                'upload_path' => $url1['upload_path'],
                'allowed_types'=> $url1['allowed_types'],

            );

            $this->load->library('upload', $config);
            
            
             if (!$this->upload->do_upload('invoice_file')) {
                 
                 
                $error = array('error' => $this->upload->display_errors());
                
            //   print_r($error) ;
               
               	redirect('Team/orderbystatus/Pending');
            }
            else {
	
	//=====================
	
	$img =  $this->upload->data();
	$image_path =  base_url("assets/invoice_upload/".$img['file_name']); 
	
	
	  date_default_timezone_set('Asia/Kolkata');
    $currentTime = date( 'Y-m-d h:i:s A', time () );
    
	
			
		 $data = array(
		 	 'invoice_file' => $image_path ,
		 	 
		 	'invoice_id'=>$this->input->post('invoice_no'),
		 	
		 	'invoice_date'=>$this->input->post('date') ,
		 	'packed_by'=>$this->input->post('packed_by') ,
		 	'invoice_date'=>$this->input->post('checked_by') ,
		 	'order_status'=>'Readyshipped',
		 	
		 );
				
				$this->db->where('order_id', $req_id);
                $this->db->update('orders', $data);
                 
			
			redirect('Team/orderbystatus/ReadyShipped');
		}
		
			    
			}
			
			
	public function cancelled_done(){
			    
			$req_id = $this->input->post('req_id') ;
			
			$reason = $this->input->post('cancle_reason') ;
			
			
		 $data = array(
		 	 
		 	'order_status'=>'Cancelled',
		 	'cancle_reason'=>$reason ,
		 );
				
				$this->db->where('order_id', $req_id);
                $this->db->update('orders', $data);
                 
// 			echo "cancel" ;
 			redirect('Team/CancelledorderList/Cancelled');
			}
			
	
		public function Delivered_done($req_id){
			    
			
		 $data = array(
		 	 
		 	'order_status'=>'Delivered',
		 	
		 );
				
				$this->db->where('order_id', $req_id);
                $this->db->update('orders', $data);
                 
			
			redirect('Team/orderbystatus/Delievered');
			}
			
//================INVOICE Generate======================

public function invoicegenerate(){

     date_default_timezone_set('Asia/Kolkata');
    $currentTime = date( 'd-m-Y h:i:s A', time () );
    
	$req_id =$this->input->post('req_id') ;
	    
		 $table='orders';
		 $data = array(
		 	 
		 	'invoice_id'=>rand(0000,1111),
		 	'invoice_date'=>$currentTime ,
		 );
		 $where='order_id';
		 $id=$req_id ;
		 
		 //pr($data);
        $this->Model->update_common($data,$table,$where,$id);
	


    $oid= $req_id;    //implode(",", $_POST['data']);  
    
    $url=base_url('Team/bulkorderinvoice?id='.$oid);
    
    $file=file_get_contents($url) ;
    
    $dompdf = new Dompdf();
            $dompdf->setPaper('A4', 'portrait');
          //  $dompdf->set_option('isHtml5ParserEnabled', TRUE);
    $bookingno=$oid;
    	$fname = $_POST['data'][0];
            $dompdf->loadHtml($file);
            $dompdf->render();
          //  $dompdf->stream("sample.pdf", array("Attachment"=>0));
            $output = $dompdf->output();
    	file_put_contents('invoice/bulk'.$fname.'.pdf', $output);
    	echo 'bulk'.$fname.'.pdf';
}


//==============invoice Page ==========

public function bulkorderinvoice(){
	$id=explode(",", $_GET['id']);

 			 $data['iddd']=$id;
   

	$this->load->view('Team/bulkorderinvoice.php',$data);
	}
	
	//======+Self Order =============
	
	
	
	 public function neworder_genrated(){
                is_team();
                
            // $user = $this->db->get('customerlogin')->result() ; 
            
           $product_detail = $this->db->get('product_detail')->result() ;   
            
//==================
            
            $mob = $this->input->post('customer') ;
            
            	$user = $this->db->get_where('customerlogin' ,array('phone' => $mob))->row() ;
            	
            	if($user){
            	
            	$user_id = $user->id ;
            	
            
            $cart = $this->db->get_where('cart' ,array('user_id' => $user_id))->result() ;
            	
            	$data = array(
            	     'result' => $user,
            	     'cart' => $cart , 
             	    'product_detail' => $product_detail
            	    );
            	
            	$this->load->view('Team/genrate_selforder.php',$data);
            	}else{
            	    
            	    redirect('Team/neworder') ; 
            	    
            	}
	 }
	 
	 	 public function neworder_genrated_get($mob){
                is_team();
                
            // $user = $this->db->get('customerlogin')->result() ; 
            
           $product_detail = $this->db->get('product_detail')->result() ;   
            
//==================
            
            // $mob = $this->input->post('customer') ;
            
            	$user = $this->db->get_where('customerlogin' ,array('phone' => $mob))->row() ;
            	
            	if($user){
            	
            	$user_id = $user->id ;
            
            $cart = $this->db->get_where('cart' ,array('user_id' => $user_id))->result() ;
            	
            	$data = array(
            	     'result' => $user,
            	     'cart' => $cart , 
             	    'product_detail' => $product_detail
            	    );
            	
            	$this->load->view('Team/genrate_selforder.php',$data);
            	}else{
            	    
            	    redirect('Team/neworder') ; 
            	    
            	}
	 }
	 
	 
	 	 public function productiongenrated($mob){ 
                is_team();
                
            // $user = $this->db->get('customerlogin')->result() ; 
            
           $product_detail = $this->db->get('product_detail')->result() ;   
            
//==================
            
            // $mob = $this->input->post('customer') ;
            
                $id = $this->uri->segment(3);  				  			
            	$user = $this->db->get_where('customerlogin' ,array('phone' => $mob))->row() ;
            	
            	$user_id = $user->id ;
            	
            
            $cart = $this->db->get_where('cart_production' ,array('user_id' => $user_id))->result() ;
            	
            	$data = array(
            	     'result' => $user,
            	     'cart' => $cart , 
             	    'product_detail' => $product_detail
            	    );
            	
            	$this->load->view('Team/genrate_production_order.php',$data);  	
	 }
	 
//==========   Add To cart By Admin ==========  

function addcartadmin2(){
    
			$id=$this->input->get('product_sku') ; 
			$user_id = $this->input->get('user_id') ;
			
			$mob = $this->input->get('mobile') ; 
// 			$quantity = $this->input->post('qunatity') ;
			$value = $this->db->get_where('product_detail', array('sku_code' => $id , ))->row() ;
			
			$quantity = $value->min_order_quan ;
			
			$avble = $value->availability ;
			
			if($quantity > $avble ){
			    
			      $this->session->set_flashdata('msg' , 'Product Not Available!') ;
			    	redirect('Team/neworder_genrated_get/'.$mob);
			    
			}
			
			$cart=$this->db->get_where('cart', array('product_id' => $id , 'user_id'=> $user_id ))->row() ;
	            	//$cart =$this->Model->select_common_where($table,$where,$id);
			
	    	$selling_price = 	$value->selling_price ;
			$cart_price = 	$selling_price*$quantity ;
			$gst_per = $value->gst_per ;
			$gstinc = $value->gst ;
			
		    $gst=$cart_price*$gst_per/100; 
				
			if(empty($cart)){

			$data = array(
							'product_id' =>$id,
							'quantity' =>$quantity,
							'price' =>$selling_price,
							'cart_price' =>$selling_price*$quantity ,
							'discount_price' =>0,
							'discount_slab' =>0,
							'gst'=>$gst,
							'gstinc' =>$gstinc ,
							'notepad' =>0,
							'image' =>0,
							'user_id' =>$user_id ,
							 );
							 
				$table='cart';
				$this->Model->insert_common($table,$data);
				
				
				redirect('Team/neworder_genrated_get/'.$mob);
					
				// 	echo "Product Added Successfully" ;
					
				// 	exit ; 
				
				
			}else{

				$data = array(
							'product_id' =>$id,
							'quantity' =>$quantity,
							'price' =>$value->selling_price,
							'cart_price' =>$selling_price*$quantity ,
							'discount_price' =>0,
							'discount_slab' =>0,
							'gst'=>$gst,
							'gstinc' =>$value->gst,
							'notepad' =>0,
							'image' =>0,
							'user_id' =>$user_id ,
							 );
	
				$this->db->where(array('product_id' => $id , 'user_id'=> $user_id ));
                $this->db->update('cart', $data);
                
                
                // echo "Product Updated Successfully" ;
                
                // exit ; 
                
                	redirect('Team/neworder_genrated_get/'.$mob);
					  
			}	
			}
			
			

function qty_addcart(){
    
    echo "dfvdsgsg";
    
    exit ; 
    
			$id=$this->input->post('product_sku') ; 
			$user_id = $this->input->post('user_id') ;
			
			$mob = $this->input->post('mobile') ; 
			$quantity = $this->input->post('qunatity') ;
			$value = $this->db->get_where('product_detail', array('sku_code' => $id , ))->row() ;
			
// 			$quantity = $value->min_order_quan ;
			
			$avble = $value->availability ;
			
			if($quantity > $avble ){
			    
			  
			    	echo "Product Added Successfully" ;
					
					exit ; 
			}
			
			$cart=$this->db->get_where('cart', array('product_id' => $id , 'user_id'=> $user_id ))->row() ;
	            	//$cart =$this->Model->select_common_where($table,$where,$id);
			
	    	$selling_price = 	$value->selling_price ;
			$cart_price = 	$selling_price*$quantity ;
			$gst_per = $value->gst_per ;
			$gstinc = $value->gst ;
			
		    $gst=$cart_price*$gst_per/100; 
				
			if(empty($cart)){

			$data = array(
							'product_id' =>$id,
							'quantity' =>$quantity,
							'price' =>$selling_price,
							'cart_price' =>$selling_price*$quantity ,
							'discount_price' =>0,
							'discount_slab' =>0,
							'gst'=>$gst,
							'gstinc' =>$gstinc ,
							'notepad' =>0,
							'image' =>0,
							'user_id' =>$user_id ,
							 );
							 
				$table='cart';
				$this->Model->insert_common($table,$data);
				
			
					
					echo "Product Added Successfully" ;
					
					exit ; 
				
				
			}else{

				$data = array(
							'product_id' =>$id,
							'quantity' =>$quantity,
							'price' =>$value->selling_price,
							'cart_price' =>$selling_price*$quantity ,
							'discount_price' =>0,
							'discount_slab' =>0,
							'gst'=>$gst,
							'gstinc' =>$value->gst,
							'notepad' =>0,
							'image' =>0,
							'user_id' =>$user_id ,
							 );
	
				$this->db->where(array('product_id' => $id , 'user_id'=> $user_id ));
                $this->db->update('cart', $data);
                
                
                echo "Product Updated Successfully" ;
                
                exit ; 
                
             
					  
			}	
			}

//========================================

function addcartadmin(){
    
			$id=$this->input->post('product_sku') ; 
			$user_id = $this->input->post('user_id') ;
			$quantity = $this->input->post('qunatity') ;
			$value = $this->db->get_where('product_detail', array('sku_code' => $id , ))->row() ;
			$cart=$this->db->get_where('cart', array('product_id' => $id , 'user_id'=> $user_id ))->row() ;
	            	//$cart =$this->Model->select_common_where($table,$where,$id);
			
	    	$selling_price = 	$value->selling_price ;
			$cart_price = 	$selling_price*$quantity ;
			$gst_per = $value->gst_per ;
			$gstinc = $value->gst ;
			
		    $gst=$cart_price*$gst_per/100; 
				
			if(empty($cart)){

			$data = array(
							'product_id' =>$id,
							'quantity' =>$quantity,
							'price' =>$selling_price,
							'cart_price' =>$selling_price*$quantity ,
							'discount_price' =>0,
							'discount_slab' =>0,
							'gst'=>$gst,
							'gstinc' =>$gstinc ,
							'notepad' =>0,
							'image' =>0,
							'user_id' =>$user_id ,
							 );
							 
				$table='cart';
				$this->Model->insert_common($table,$data);
					
					echo "Product Added Successfully" ;
					
					exit ; 
			}else{

				$data = array(
							'product_id' =>$id,
							'quantity' =>$quantity,
							'price' =>$value->selling_price,
							'cart_price' =>$selling_price*$quantity ,
							'discount_price' =>0,
							'discount_slab' =>0,
							'gst'=>$gst,
							'gstinc' =>$value->gst,
							'notepad' =>0,
							'image' =>0,
							'user_id' =>$user_id ,
							 );
	
				$this->db->where(array('product_id' => $id , 'user_id'=> $user_id ));
                $this->db->update('cart', $data);
                
                
                echo "Product Updated Successfully" ;
                
                exit ; 
					  
			}	
			}

//========================================
           
//========== Add To Prodution By Admin ==========  

function addprodutionadmin(){
    
			$id=$this->input->post('product_sku') ; 
			$user_id = $this->input->post('user_id') ;
			$quantity = $this->input->post('qunatity') ;
			$value = $this->db->get_where('product_detail', array('sku_code' => $id , ))->row() ;
			$cart=$this->db->get_where('cart_production', array('product_id' => $id , 'user_id'=> $user_id ))->row() ;
	            	//$cart =$this->Model->select_common_where($table,$where,$id);
			
	    	$selling_price = 	$value->selling_price ;
			$cart_price = 	$selling_price*$quantity ;
			$gst_per = $value->gst_per ;
			$gstinc = $value->gst ;
			
		    $gst=$cart_price*$gst_per/100; 
				
			if(empty($cart)){

			$data = array(
							'product_id' =>$id,
							'quantity' =>$quantity,
							'price' =>$selling_price,
							'cart_price' =>$selling_price*$quantity ,
							'discount_price' =>0,
							'discount_slab' =>0,
							'gst'=>$gst,
							'gstinc' =>$gstinc ,
							'notepad' =>0,
							'image' =>0,
							'user_id' =>$user_id ,
							 );
							 
				$table='cart_production';
				$this->Model->insert_common($table,$data);
					
					echo "Product Added Successfully" ;
					
					exit ; 
			}else{

				$data = array(
							'product_id' =>$id,
							'quantity' =>$quantity,
							'price' =>$value->selling_price,
							'cart_price' =>$selling_price*$quantity ,
							'discount_price' =>0,
							'discount_slab' =>0,
							'gst'=>$gst,
							'gstinc' =>$value->gst,
							'notepad' =>0,
							'image' =>0,
							'user_id' =>$user_id ,
							 );
	
				$this->db->where(array('product_id' => $id , 'user_id'=> $user_id ));
                $this->db->update('cart_production', $data);
                
                
                echo "Product Updated Successfully" ;
                
                exit ; 
					  
			}	
			}

//========================================          
//========== link To Prodution By Admin ==========  

function addprodutionadmin2(){
    
			$id=$this->input->get('product_sku') ; 
			$user_id = $this->input->get('user_id') ;
			$mob = $this->input->get('mobile') ; 
			$value = $this->db->get_where('product_detail', array('sku_code' => $id , ))->row() ;
			
			$quantity = $value->min_order_quan ;
			
			$avble = $value->availability ;
			
// 			if($quantity > $avble ){
			    
// 			      $this->session->set_flashdata('msg' , 'Product Not Available!') ;
// 			    	redirect('Team/productiongenrated/'.$mob);
			    
// 			}
			
			$cart=$this->db->get_where('cart_production', array('product_id' => $id , 'user_id'=> $user_id ))->row() ;
	            	//$cart =$this->Model->select_common_where($table,$where,$id);
			
	    	$selling_price = 	$value->selling_price ;
			$cart_price = 	$selling_price*$quantity ;
			$gst_per = $value->gst_per ;
			$gstinc = $value->gst ;
			
		    $gst=$cart_price*$gst_per/100; 
				
			if(empty($cart)){

			$data = array(
							'product_id' =>$id,
							'quantity' =>$quantity,
							'price' =>$selling_price,
							'cart_price' =>$selling_price*$quantity ,
							'discount_price' =>0,
							'discount_slab' =>0,
							'gst'=>$gst,
							'gstinc' =>$gstinc ,
							'notepad' =>0,
							'image' =>0,
							'user_id' =>$user_id ,
							 );
							 
				$table='cart_production';
				$this->Model->insert_common($table,$data);
					
						redirect('Team/productiongenrated/'.$mob);
				// 	echo "Product Added Successfully" ;
				// 	exit ; 
			}else{

				$data = array(
							'product_id' =>$id,
							'quantity' =>$quantity,
							'price' =>$value->selling_price,
							'cart_price' =>$selling_price*$quantity ,
							'discount_price' =>0,
							'discount_slab' =>0,
							'gst'=>$gst,
							'gstinc' =>$value->gst,
							'notepad' =>0,
							'image' =>0,
							'user_id' =>$user_id ,
							 );
	
				$this->db->where(array('product_id' => $id , 'user_id'=> $user_id ));
                $this->db->update('cart_production', $data);
                
                
                redirect('Team/productiongenrated/'.$mob);
                // echo "Product Updated Successfully" ;
                // exit ; 
					  
			}	
			}

//========================================

	function self_order(){
	    
	    $customer_mobile = $this->input->post('customer') ;
	    
	    $product_sku = $this->input->post('product_sku') ;
	    
	    $quantity = $this->input->post('quantity') ;
	    
	    
	    $product_detail  = $this->db->get_where('product_detail', array('sku_code' => $product_sku ,))->row() ;
	      
	      
	     $user_detail  = $this->db->get_where('customerlogin', array('phone' => $customer_mobile ,))->row() ;
	      
	      if(empty($product_detail) && empty($user_detail) ){
	          
	          
	          echo "invaild Product SKu" ;
	          exit; 
	          
	      }else{
	          
	          
	       $price = $product_detail->selling_price ;
           $per_gst  = $product_detail->gst_per;
           
           $sub_total = $price * $quantity ;
		   $gst = $sub_total*$per_gst/100 ;
		
		
		$finalvolume = 
	    
	    $data = array(
						'order_id' =>$_SESSION['onlineorderid'] ,
						'user_id'=>$_SESSION['session_id'],
						'shipping_charge' =>$shippingcharge ,
						
						'packing_charge' =>$packingprice ,
						
						'finalamount' =>$finalamount,
						'couponcharge' =>$couponcharge ,
						'discountcharge' =>$discountcharge ,
						 
						'discount_total' =>  $_SESSION['tot_discount'] ,
						'order_processing' =>  $_SESSION['order_processing'],
						
						
						'subtotal' =>$subtotal ,
						'delievry_type' =>$delievry ,
						'box_volume' =>$finalvolume ,
						'address_id' =>$address_id ,
						'expected_days' =>$_SESSION['expected_days'] ,
						'gst_total' =>$_SESSION['finalgst'],
						
						'pincode' =>$_SESSION['pincodeno'] ,

						'transportcharge' =>$_SESSION['transportcharge'], 
						'admindiscount' =>$_SESSION['admindiscount'],
						
						'advance_payment' => $advance_price ,
                        
                        'order_status' => 'Not' ,
						'order_Date' =>date("Y-m-d") 
						
						 );
        // 		pr($data);
        // 		die;
        		
        		$table='orders';
        		$lastid=$this->Adminmodel->insert_common($data,$table);

}
	}
	
// ================delete cart by admin =============	
		public function delcartadmin(){
 		    
		$id=$_POST['id'];
		$user_id= $_POST['user_id'];
		
		$id=$_POST['id'];
		@unlink($_SESSION['gift'][$id]['link']);

		unset($_SESSION['cart'][$id]);
			unset($_SESSION['gift'][$id]);

	  $this->Adminmodel->delusercart($id,$user_id);
   $data=$this->Adminmodel->cartproduct($user_id,$id);

									$id= $_POST['user_id'];
                                                 $where='user_id';

                                                    $table='cart';

                                                 $cart=$this->Adminmodel->select_com_where($table,$where,$id);
  if(empty($cart)){
                                        	unset($_SESSION['discount']);
                                        	unset($_SESSION['gift']);
                                        	unset($_SESSION['subprice']);
                                        	unset($_SESSION['totalprice']);
                                        	unset($_SESSION['pincode']);
                                        	unset($_SESSION['pincodeno']);
                                        	
                                        	unset($_SESSION['delievry']);
                                        	unset($_SESSION['expected_days']);
                                        	unset($_SESSION['del_charge']);
                                        	unset($_SESSION['coupon']);
                                        	unset($_SESSION['couponapplyprice']);
                                        	unset($_SESSION['couponname']);
                                        	unset($_SESSION['finalvolume']);
                                        	unset($_SESSION['codprice']);
                                        	unset($_SESSION['cod']);
                                        	unset($_SESSION['allgst']);
                                        	unset($_SESSION['finalgst']);


                                        }else{

                                         foreach ($cart as  $value) {
                                            //pr($value);
                                                $id=$value['product_id'];

                                                 $where='sku_code';

                                                    $table='product';

                                                 $product=$this->Adminmodel->select_com_where($table,$where,$id);

                                                 	if(empty($product)){
                                                       $id=$value['product_id'];

                                                 $where='sku_code';

                                                    $table='product_detail';

                                                 $product=$this->Adminmodel->select_com_where($table,$where,$id); 
                                                 }
                                                  	if(empty($product)){
                                                       $id=$value['product_id'];

                                                 $where='sku_code';

                                                    $table='giftproduct';

                                                 $product=$this->Adminmodel->select_com_where($table,$where,$id); 
                                                 }

                                                // pr($value);
                                               $cartsums+=$value['cart_price'];
                                                $volume=$product[0]['box_volume_weight']*$value['quantity'];
                                                 if(!empty($value['discount_price'])){
                                                $disarr['disc'][]=$cart;

                                               }else{
                                                    $pricearr['price'][]=$cart;
                                               }
                                                
                                                    
                                                    

                                                   }
      
                 foreach ($disarr['disc'] as $key ) {
                  
                  $allgst2+= $key['gst'];
                   if($key['gstinc']==2){
                   $finalgst2+= $key['gst'];
                   }else{
                   
                    $finalgst2= 0;
                   }  
                  $cartprice+=$key['cart_price'];
                  $discount_prices+=$key['discount_price'];

                 }
                 foreach ($pricearr['price'] as $pricea ) {
                    $ctprice+=$pricea['cart_price'];
                    $allgst1+= $pricea['gst'];
                  if($pricea['gstinc']==2){
                
                   $finalgst1+= $pricea['gst'];
                }else{

                 $finalgst1= 0;
                }
                 }
                
                 $finalgst=$finalgst1+$finalgst2;

                  $_SESSION['allgst']=$allgst1+$allgst2;
                
                  $totalprice=$discount_prices+$ctprice+$finalgst;
                  
                  $_SESSION['finalgst']= $finalgst;
                 $disc=$cartprice-$discount_prices;
                  $onlyprice=$discount_prices+$ctprice;
                   $_SESSION['discount']=$disc;
                    $_SESSION['totalprice']= $totalprice;
                    $_SESSION['subprice']=$onlyprice;
                                                   	unset($_SESSION['couponapplyprice']);
                                                   	unset($_SESSION['couponname']);
													unset($_SESSION['coupon']);
                                               }
	}
	
//======================================

// ================delete cart by admin =============	
		public function delproductionadmin(){
 		    
		$id=$_POST['id'];
		$user_id= $_POST['user_id'];
		
		$id=$_POST['id'];
		@unlink($_SESSION['gift'][$id]['link']);

		unset($_SESSION['cart'][$id]);
			unset($_SESSION['gift'][$id]);

	  $this->Adminmodel->deluserproduction($id,$user_id);
   $data=$this->Adminmodel->cartproduct($user_id,$id);

									$id= $_POST['user_id'];
                                                 $where='user_id';

                                                    $table='cart';

                                                 $cart=$this->Adminmodel->select_com_where($table,$where,$id);
  if(empty($cart)){
                                        	unset($_SESSION['discount']);
                                        	unset($_SESSION['gift']);
                                        	unset($_SESSION['subprice']);
                                        	unset($_SESSION['totalprice']);
                                        	unset($_SESSION['pincode']);
                                        	unset($_SESSION['pincodeno']);
                                        	
                                        	unset($_SESSION['delievry']);
                                        	unset($_SESSION['expected_days']);
                                        	unset($_SESSION['del_charge']);
                                        	unset($_SESSION['coupon']);
                                        	unset($_SESSION['couponapplyprice']);
                                        	unset($_SESSION['couponname']);
                                        	unset($_SESSION['finalvolume']);
                                        	unset($_SESSION['codprice']);
                                        	unset($_SESSION['cod']);
                                        	unset($_SESSION['allgst']);
                                        	unset($_SESSION['finalgst']);


                                        }else{

                                         foreach ($cart as  $value) {
                                            //pr($value);
                                                $id=$value['product_id'];

                                                 $where='sku_code';

                                                    $table='product';

                                                 $product=$this->Adminmodel->select_com_where($table,$where,$id);

                                                 	if(empty($product)){
                                                       $id=$value['product_id'];

                                                 $where='sku_code';

                                                    $table='product_detail';

                                                 $product=$this->Adminmodel->select_com_where($table,$where,$id); 
                                                 }
                                                  	if(empty($product)){
                                                       $id=$value['product_id'];

                                                 $where='sku_code';

                                                    $table='giftproduct';

                                                 $product=$this->Adminmodel->select_com_where($table,$where,$id); 
                                                 }

                                                // pr($value);
                                               $cartsums+=$value['cart_price'];
                                                $volume=$product[0]['box_volume_weight']*$value['quantity'];
                                                 if(!empty($value['discount_price'])){
                                                $disarr['disc'][]=$cart;

                                               }else{
                                                    $pricearr['price'][]=$cart;
                                               }
                                                
                                                    
                                                    

                                                   }
      
                 foreach ($disarr['disc'] as $key ) {
                  
                  $allgst2+= $key['gst'];
                   if($key['gstinc']==2){
                   $finalgst2+= $key['gst'];
                   }else{
                   
                    $finalgst2= 0;
                   }  
                  $cartprice+=$key['cart_price'];
                  $discount_prices+=$key['discount_price'];

                 }
                 foreach ($pricearr['price'] as $pricea ) {
                    $ctprice+=$pricea['cart_price'];
                    $allgst1+= $pricea['gst'];
                  if($pricea['gstinc']==2){
                
                   $finalgst1+= $pricea['gst'];
                }else{

                 $finalgst1= 0;
                }
                 }
                
                 $finalgst=$finalgst1+$finalgst2;

                  $_SESSION['allgst']=$allgst1+$allgst2;
                
                  $totalprice=$discount_prices+$ctprice+$finalgst;
                  
                  $_SESSION['finalgst']= $finalgst;
                 $disc=$cartprice-$discount_prices;
                  $onlyprice=$discount_prices+$ctprice;
                   $_SESSION['discount']=$disc;
                    $_SESSION['totalprice']= $totalprice;
                    $_SESSION['subprice']=$onlyprice;
                                                   	unset($_SESSION['couponapplyprice']);
                                                   	unset($_SESSION['couponname']);
													unset($_SESSION['coupon']);
                                               }
	}
	
//======================================


public function Freight_change(){
    
    
   
    $freight = $this->input->post('freight');
    
    $order_id = $this->input->post('req_id');
    
       	$data = array('shipping_charge' => $freight , ) ;
    	
    	
	    $this->db->where('order_id', $order_id);
        $this->db->update('orders', $data);
        
        echo 'update' ; 
                
        exit ;         
}


public function carton_update(){
    
    $carton = $this->input->post('carton');
    $order_id = $this->input->post('req_id');
    $packing_charge = $carton* 350 ; 
   	$data = array('packing_charge' => $packing_charge , ) ;
    	
   	
	$this->db->where('order_id', $order_id);
    $this->db->update('orders', $data);
        
    echo 'update' ; 
    exit ;         
}


	public function customer_filter(){

				is_team();
				
				$type = $this->input->post('type') ;
		    	$rm_id  = $this->input->post('rm_id') ;
				
				if($type== 'Pending_Approval'){
				    
				    $where = 'valid' ;
				    $id = 0 ;
				    
				    $data['messa'] = $this->Adminmodel->Customer_pending($rm_id);
				    $data['type'] = $type ; 
				
				}
				elseif($type== 'All' && $rm_id == 'All'){
				    
				    redirect('Team/Customers');
				    
				}elseif($type== 'ownertype'){
				    
				    $search = trim($this->input->post('ownership')) ; 
			
				    $where = $type ;
				    
				     $data['messa'] = $this->Adminmodel->Customer_filter($rm_id , $where , $search);
				    $data['type'] = $type ; 
				    
				
				    
				}elseif($type== 'btype'){
				    
				    $search = trim($this->input->post('btype')) ; 
				    $where = $type ;
				     $data['messa'] = $this->Adminmodel->Customer_filter($rm_id , $where , $search);
				    $data['type'] = $type ; 
				    
				
				    
				}else{
				    
				    if($type=='Owner'){
				    $search = trim($this->input->post('search')) ; 
				    
				    }elseif($type=='Business'){
				        
				       $search = trim($this->input->post('search_business')) ; 
				     
				    }elseif($type=='phone'){
				        
				       $search = trim($this->input->post('search_phone')) ; 
				     
				    }elseif($type=='city'){
				        
				       $search = trim($this->input->post('search_city')) ; 
				     
				    }elseif($type=='state'){
				        
				       $search = trim($this->input->post('search_state')) ; 
				     
				    }elseif($type=='email'){
				        
				       $search = trim($this->input->post('search_email')) ; 
				     
				    }else{
				        
				        $search = '';
				    }
				    
				    
				    $where = $type ;
				    
				     $data['messa'] = $this->Adminmodel->Customer_filter($rm_id , $where , $search);
				    $data['type'] = $type ; 
				    
				}
				
				
				$data['rm_id'] = $rm_id ;
		
				$this->load->view('Team/customer.php',$data);

			}
	
	
	//=================Sale ===============
	
	
        public function sales_detailed(){
            
             $data['result'] = $this->db->get('orders')->result(); 
            $this->load->view('Team/sales_detailed.php',$data);
         }
        public function sales_summary(){
            
              $data['result'] = $this->db->get('orders')->result(); 
            $this->load->view('Team/sales_summary.php',$data);
        }
        public function sku_sales_summary(){
              $data['result'] = $this->db->get('orders')->result(); 
            $this->load->view('Team/sku_sales_summary.php',$data);
        }
        
        function sales_detail_filter(){
            
				is_team();
				
				$type = $this->input->post('type') ;
		    	$cat_date  = $this->input->post('cat_date') ;
		    	$rm_id  = $this->input->post('rm_id') ;
		    	$order_status = $this->input->post('order_status') ;
		    	
		    	$search = trim($this->input->post('search')) ; 
		    	 
		    
		   		if($cat_date== "today"){
				    
				    	$date=date("Y-m-d");

				}elseif($cat_date== "week"){
				    
				    $date   =  date('Y-m-d', strtotime("-7 days"));  
				    
				    
				}elseif($cat_date== "Month"){
				    
				    $date   =  date('Y-m-d', strtotime("-30 days"));  
				    
				    
				}else{
				    
				    $date = '' ; 
				}
			
			
			if($type == 'Name'){
			    
			     $data['type'] = $type ; 
			    	$data['search'] = $search ; 
			    
			     $name = trim($this->input->post('search')) ; 
			     
			     $user = $this->db->get_where('customerlogin' , array('Owner' => $name))->row();
			     
			     $where = 'user_id' ;
			    
			     $search =  $user->id; 
			     
			    $data['result'] = $this->Adminmodel->sale_detail_filter( $where , $search ,$date ,$rm_id ,$order_status);
			    
				  
			}
	    	elseif($type == 'phone'){
	    	    
	    	    	$data['search'] = $search ; 
			    
			     $name = trim($this->input->post('search')) ; 
			     
			      $data['type'] = $type ; 
			     
			     $user = $this->db->get_where('customerlogin' , array('phone' => $name))->row();
			     
			     $where = 'user_id' ;
			    
			     $search =  $user->id; 
			    
			      $data['result'] = $this->Adminmodel->sale_detail_filter( $where , $search ,$date ,$rm_id ,$order_status);
			      
			      
		
			}elseif($type== 'All' && $cat_date == 'All' && $rm_id == 'All' && $order_status == 'All'){
				    
				    redirect('Team/sales_detailed');
				    
				}else{
				    
				   
				    $where = $type ;
				    $data['search'] = $search ; 
				  $data['result'] = $this->Adminmodel->sale_detail_filter( $where , $search ,$date ,$rm_id ,$order_status);
				    $data['type'] = $type ; 
				    
				}
				
			$data['date'] = $cat_date ;
	
            $this->load->view('Team/sales_detailed.php' , $data);

			
            
            
        }
        
        function saledetail_date(){
    
        //  $user_id =$this->input->post('user_id');
        $first_date = $this->input->post('date1');
        $second_date = $this->input->post('date2');
        
        
  
        //   $data['customer_detail'] = $this->db->get_where('order' , array('user_id' => $user_id ,'date >='=> $first_date,'date <='=> $second_date) )->result() ;
        //   $data['user_id'] = $user_id ; 
           
          	$id=$_POST['ordertype'];
          	
     	 $data['result'] =$this->Adminmodel->saledetail_date($first_date,$second_date,$id);
   	// pr($data);die;
   	
   	// 	$data['current_uris']=$_POST['ordertype'];
   	   $data['fromdate']=$_POST['from'];
   	   $data['todate']=$_POST['to'];
     $this->load->view('Team/sales_summary.php',$data);
    
}

          function sales_summary_filter(){
            
				is_team();
				
				$type = $this->input->post('type') ;
		    	$cat_date  = $this->input->post('cat_date') ;
		    	$rm_id  = $this->input->post('rm_id') ;
		    	$order_status = $this->input->post('order_status') ;
		    	
		    	$search = trim($this->input->post('search')) ; 
		    	 
		    
		   		if($cat_date== "today"){
				    
				    	$date=date("Y-m-d");

				}elseif($cat_date== "week"){
				    
				    $date   =  date('Y-m-d', strtotime("-7 days"));  
				    
				    
				}elseif($cat_date== "Month"){
				    
				    $date   =  date('Y-m-d', strtotime("-30 days"));  
				    
				    
				}else{
				    
				    $date = '' ; 
				}
			
			
			if($type == 'Name'){
			    
			     $data['type'] = $type ; 
			    	$data['search'] = $search ; 
			    
			     $name = trim($this->input->post('search')) ; 
			     
			     $user = $this->db->get_where('customerlogin' , array('Owner' => $name))->row();
			     
			     $where = 'user_id' ;
			    
			     $search =  $user->id; 
			     
			    $data['result'] = $this->Adminmodel->sale_detail_filter( $where , $search ,$date ,$rm_id ,$order_status);
			    
				  
			}
	    	elseif($type == 'phone'){
	    	    
	    	    	$data['search'] = $search ; 
			    
			     $name = trim($this->input->post('search')) ; 
			     
			      $data['type'] = $type ; 
			     
			     $user = $this->db->get_where('customerlogin' , array('phone' => $name))->row();
			     
			     $where = 'user_id' ;
			    
			     $search =  $user->id; 
			    
			      $data['result'] = $this->Adminmodel->sale_detail_filter( $where , $search ,$date ,$rm_id ,$order_status);
			      
			      
		
			}elseif($type== 'All' && $cat_date == 'All' && $rm_id == 'All' && $order_status == 'All'){
				    
				    redirect('Team/sales_summary');
				    
				}else{
				    
				   
				    $where = $type ;
				    $data['search'] = $search ; 
				  $data['result'] = $this->Adminmodel->sale_detail_filter( $where , $search ,$date ,$rm_id ,$order_status);
				    $data['type'] = $type ; 
				     
				}
				
			$data['date'] = $cat_date ;
	
            $this->load->view('Team/sales_summary.php' , $data);

			
            
            
        }
        
   //==================================
}

		