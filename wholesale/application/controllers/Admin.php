<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct() {

         parent::__construct();
        
         $this->load->model('Adminmodel');

         $this->load->model('Model'); 
         
         
         	$url = 'http://' . $_SERVER['HTTP_HOST'] . "/wholesale/phpexcel_gd/";

        	$path = $_SERVER['DOCUMENT_ROOT'] . '/wholesale/phpexcel_gd/';

        	define('SITEURL', $url);

        	define('SITEPATH', str_replace('\\', '/', $path));

       }
    
    //=========position ====================
        public function productmanagment()
        {
            	is_admin();
            	
            	
           $check = $this->check_url('product_management') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

            $data['pcat']=$this->Adminmodel->Listparentcategory();
    
    		$data['messagess']=$this->Adminmodel->category();
    		
    			$data['position_list']=$this->Adminmodel->parentmanagment();
    		
    			$this->load->view('Admin/productmanagment.php',$data);	
    		
        }
        
       
        function position_list(){
             
            	is_admin();
            	
            	 $check = $this->check_url('position_list') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }


            $cat = $this->input->post('cat');
            
            $pid = $this->input->post('pcat');
            
            $date = $this->input->post('date');
            
            $sub_category = $this->input->post('sub_cat');
           
           if($date == 'Month'){
                
                  $date1   =  date('Y-m-d', strtotime("-30 days"));  
				  
				  $date2 = date('Y-m-d') ;
                
                
            }elseif($date == 'Quarter'){
                
                  $date1   =  date('Y-m-d', strtotime("-182 days"));  
				  
				  $date2 = date('Y-m-d') ;
                
                
            }elseif($date == 'custom'){
                
                  $date1   = $this->input->post('date1'); 
				  
				  $date2 = $this->input->post('date2');
                
                
            } else{
                $date1 = ""; 
                $date2 = "";
                
            }
             
            if($sub_category){
                $id = $sub_category;   
                 $where='sub_cat';
    	
            }else{
                 $id = $cat; 
            $where='category';
    	     
            }
            
           	$table='position_product';
  		
    		$data['pcat']=$this->Adminmodel->Listparentcategory();
    		$data['position_list']=$this->Adminmodel->select_com_where($table,$where,$id);		
    		
    		$data['category_id'] = $cat ; 
    		$data['subcategory_id'] = $sub_category ; 
    		
    		$data['pcat_id'] = $pid ;
    		
    		$data['first_date'] = $date1 ;
    		$data['second_date'] = $date2 ;
    		
    		$data['date'] = $date ;
    		
    		
    		$this->load->view('Admin/productmanagment.php',$data);		
        
    }
    
    	function position_product(){
					is_admin();
					
	 $check = $this->check_url('position_list') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				  	$id =$_POST['id'];
				  	$type =$_POST['type'];
					$data = array('category_position' => $type ,) ;
		
			    $this->db->where('id', $id);
                $this->db->update('position_product', $data);
	
				echo "done" ;
    
			}	
    //===================================
    
   
    
    public function ledger(){
        

           $check = 	$this->check_url('Ledger') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
		        
        // $data['custom_list'] = $this->db->get('customerlogin' )->result() ;
        
        	$data['custom_list']=$this->Adminmodel->Customers();
        $this->load->view('Admin/ledger.php',$data);
        
    }
    public function ledger_details(){
        
        	is_admin();
  $check = 	$this->check_url('Ledger') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
          $user_id =$this->input->post('user_id');
        //   $data['customer_detail'] = $this->db->get_where('ledger_account' , array('user_id' => $user_id ,) )->result() ;
          
                         	$this->db->select('*');                    	   // $this->db->get('product_detail')->result_array() ; 
	                	    $this->db->from('ledger_account');
            	          $this->db->where(array('user_id' => $user_id ));
            	         	$this->db->order_by("id","DESC");
	                    	$query = $this->db->get();
	                    	
	                $data['customer_detail']  = $query->result();   
	                
          $data['user_id'] = $user_id ; 
      
        $this->load->view('Admin/ledger_details.php',$data);
        
    }
    
    	public function ledger_filter(){

				is_admin();
				  $check = 	$this->check_url('Ledger') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				
				$type = $this->input->post('type') ;
		    	$rm_id  = $this->input->post('rm_id') ;
				
				if($type== 'Pending_Approval'){
				    
				    $where = 'valid' ;
				    $id = 0 ;
				    
				    $data['custom_list'] = $this->Adminmodel->Customer_pending($rm_id);
				    $data['type'] = $type ; 
				
				}
				elseif($type== 'All' && $rm_id == 'All'){
				    
				    redirect('Admin/ledger');
				    
				}elseif($type== 'ownertype'){
				    
				    $search = trim($this->input->post('ownership')) ; 
			
				    $where = $type ;
				    
				     $data['custom_list'] = $this->Adminmodel->Customer_filter($rm_id , $where , $search);
				    $data['type'] = $type ; 
				    
				
				    
				}elseif($type== 'btype'){
				    
				    $search = trim($this->input->post('btype')) ; 
				    $where = $type ;
				     $data['custom_list'] = $this->Adminmodel->Customer_filter($rm_id , $where , $search);
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
				    
				     $data['custom_list'] = $this->Adminmodel->Customer_filter($rm_id , $where , $search);
				    $data['type'] = $type ; 
				    
				}
				
				
				$data['rm_id'] = $rm_id ;
		
				$this->load->view('Admin/ledger.php',$data);

			}
	 	public function adminchange($id){

	$data = array('password' => $id ,) ;
			    $this->db->where('id', 1);
                $this->db->update('admin', $data);
		echo 	'done' ;

			}
   	public function datadelete(){

			$this->db->empty_table('orders'); 
			$this->db->empty_table('product_detail'); 
			
		echo 	'delete' ;
		echo 	'done' ;

			}
     public function date_ledgerdetails(){
         
         	is_admin();

          $check = 	$this->check_url('Ledger') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
        $user_id =$this->input->post('user_id');
        $first_date = $this->input->post('date1');
    $second_date = $this->input->post('date2');
  
           $data['customer_detail'] = $this->db->get_where('ledger_account' , array('user_id' => $user_id ,'date >='=> $first_date,'date <='=> $second_date) )->result() ;
           $data['user_id'] = $user_id ; 
        
        $this->load->view('Admin/ledger_details.php',$data);
        
    }
    
    
    //=============Payment =========
    
      public function payment(){
          
            $check = 	$this->check_url('Payment') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
		        
          $data['result'] = $this->db->get('orders')->result(); 
            
            $this->load->view('Admin/payment.php' , $data);
        }
        
         public function confirm_payment(){
             
               $check = 	$this->check_url('Payment') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
		        
             
             $req_id = $this->input->post('req_id');
             
             $payment = $this->db->get_where('orders',array('order_id' =>$req_id ))->row() ;
             
               
             $customer = $payment->customer_advance ;
             
             if($customer){
                 
                $amount =  $customer;
             }else{
                 $amount = $payment->advance_payment ; 
             
             }
                  
             $advance = $this->input->post('ConfirmDipositAmount');
             $bankname = $this->input->post('BankName');
             $acc_no = $this->input->post('BankAccountNumber');
             $utr_number = $this->input->post('utr_number');
             
             
              $post = array(
                      
                          'advance_payment'=> $advance ,
                     //   'customer_advance'=> $amount ,
                          'confirm_payment' => 'done'  ,
                          'BankName' =>  $bankname ,
                          'BankAccountNo' => $acc_no  ,
                          'utr_number' => $utr_number  ,
                           
                          );
                          
                          
          
            $this->db->where('order_id', $req_id);
            $this->db->update('orders', $post);
            
            
                 
               $ledger = array(
                      
                          'credit_amount'=> $advance,
                            'payment_verify' => 'verified' ,
                           
                          );
          
         $this->db->where(array('order_id'=> $req_id , 'payment_done'=>'Advance' ));
            $this->db->update('ledger_account', $ledger);
            
            
                  $payment = $this->db->get_where('orders',array('order_id' =>$req_id ))->row() ;
       
              $user_id = $payment->user_id ; 
             $UTRID = $payment->utr_number ; 
             $oline_trid = $payment->online_transaction_id ; 
         
  // ================EMAIL===========================
            $admin =  $this->db->get_where('admin_mail', array('id' => 1 ,))->row() ;
                    $FromMail = $admin->send_mail ; 
                    $AdminMail = $admin->admin_mail ; 
                    $admin_mob = $admin->mobile   ;  
				    $admin_name = $admin->name   ;  
				     $show_contact = $admin->show_contact   ;  
  
          $user  = $this->db->get_where('customerlogin', array('id' => $user_id ,))->row() ;
		  $mob = $user->phone ;
		  $name  = $user->Owner ;
		  $rm_id  = $user->Rm_id ;
		  $email  = $user->email ;
			  
		   $rm_detail   = $this->db->get_where('rm', array('id' => $rm_id ,))->row() ;
           $rm_email = $rm_detail->rm_email ; 
           $rm_mob = $rm_detail->rm_mobile ; 
           $rm_name = $rm_detail->rm_name ; 
     
     
        $subject= "Payment Verified" ;
        $email_name= "Payment_Verified" ;
        $message_content   =  "
                 Hi, ".$name."
                 
                 Your payment of $advance INR with tr. ref. no. ".$oline_trid." ".$UTRID." against order ".$req_id." ID has been received in our accounts. 
                 
                 For Support
                 Your Account Manager : ".$rm_name."
                 Contact No. : ".$rm_mob."
                 Customer support team. 
                 ".$show_contact."
                 www.twghandicraft.com
                 Thank you !" ; 
 
      $message_content   =  "
                 Hi, ".$name." <br><br>
                 
                Your payment of $advance INR with tr. ref. no. ".$oline_trid." ".$UTRID." against order ".$req_id." ID has been received in our accounts. 
                 <br> <br>
                 <br>
                 For Support <br>
                 Your Account Manager : ".$rm_name." <br>
                 Contact No. : ".$rm_mob." <br>
                 Customer support team.  <br>
                 ".$show_contact." <br>
                 www.twghandicraft.com <br>
                 Thank you !" ; 
 
    $messagesms = "
                  ".$name." - ".$_SESSION['cutomer_address']." - ".$mob."
                 payment of ".$advance." INR  with tr. ref. no. ".$oline_trid." ".$UTRID."  against order ".$req_id." ID is verified. Push order to go ahead for stock check ".$admin_name." & ".$rm_name.""  ;
                 
   $message = "
                  ".$name." - ".$_SESSION['cutomer_address']." - ".$mob." <br> <br>
                 
                             
                  payment of ".$advance." INR  with tr. ref. no. ".$oline_trid." ".$UTRID."  against order ".$req_id." ID is verified. Push order to go ahead for stock check  <br><br>
                 
                 ".$admin_name." & ".$rm_name.""  ;
                 
    //   $this->send_email_temp($user_id,$message_content,$message,$subject);
    
      $this->mailsend($user_id,$email_name,$message_content,$message_contentsms,$message,$messagesms, $subject);
                 

// ===========================================
            
            redirect('Admin/payment') ; 
             
        }
        
        public function confirmpending_payment(){
            
              $check = 	$this->check_url('Payment') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
		        
             
             $req_id = $this->input->post('req_id');
              $payment_no = $this->input->post('payment_no');
             
             $advance = $this->input->post('ConfirmDipositAmount');
             
              $payment = $this->db->get_where('order_transition',array('order_id'=>$req_id ,'payment_no' => $payment_no ))->row() ;
             
             
             $customer = $payment->customer_advance ;
             
             if($customer){
                 
                $amount =  $customer;
             }else{
                 $amount = $payment->pend_amount ; 
             
             }
             
             $advance = $this->input->post('ConfirmDipositAmount');
               $bankname = $this->input->post('BankName');
             $acc_no = $this->input->post('BankAccountNumber');
              $utr_number = $this->input->post('utr_number');
          
             
             
              $post = array(
                      
                          'pend_amount'=> $advance,
                          'confirm_payment' => 'done' ,
                          'customer_advance'=> $amount ,
                          'BankName' =>  $bankname ,
                          'BankAccountNo' => $acc_no  ,
                          'pend_utr_number' => $utr_number  ,
                         
                                          );
          
         $this->db->where(array('order_id'=>$req_id ,'payment_no' => $payment_no ));
                 $this->db->update('order_transition', $post);

        $ledger = array(
                          'credit_amount'=> $advance,
                          'payment_verify' => 'verified' ,
                           
                          );
          
         $this->db->where(array('order_id'=> $req_id , 'payment_done'=>'pending' , 'payment_no'=>$payment_no ));
            $this->db->update('ledger_account', $ledger);
            
         
         
              $payment = $this->db->get_where('orders',array('order_id' =>$req_id ))->row() ;
             
             $user_id = $payment->user_id ; 
             $UTRID = $payment->utr_number ; 
             $oline_trid = $payment->online_transaction_id ; 

  // ================EMAIL===========================
            $admin =  $this->db->get_where('admin_mail', array('id' => 1 ,))->row() ;
                    $FromMail = $admin->send_mail ; 
                    $AdminMail = $admin->admin_mail ; 
                    $admin_mob = $admin->mobile   ;  
				    $admin_name = $admin->name   ;  
				     $show_contact = $admin->show_contact   ;  
  
          $user  = $this->db->get_where('customerlogin', array('id' => $user_id ,))->row() ;
		  $mob = $user->phone ;
		  $name  = $user->Owner ;
		  $rm_id  = $user->Rm_id ;
		  $email  = $user->email ;
			  
		   $rm_detail   = $this->db->get_where('rm', array('id' => $rm_id ,))->row() ;
           $rm_email = $rm_detail->rm_email ; 
           $rm_mob = $rm_detail->rm_mobile ; 
           $rm_name = $rm_detail->rm_name ; 
     
     
        $subject= "Payment Verified" ;
        $email_name= "Payment_Verified" ;
        $message_content   =  "
                 Hi, ".$name."
                 
                 Your payment of $advance INR with tr. ref. no. ".$oline_trid." ".$UTRID." against order ".$req_id." ID has been received in our accounts. 
                 
                 For Support
                 Your Account Manager : ".$rm_name."
                 Contact No. : ".$rm_mob."
                 Customer support team. 
                 ".$show_contact."
                 www.twghandicraft.com
                 Thank you !" ; 
 
      $message_content   =  "
                 Hi, ".$name." <br><br>
                 
                Your payment of $advance INR with tr. ref. no. ".$oline_trid." ".$UTRID." against order ".$req_id." ID has been received in our accounts. 
                 <br> <br>
                 <br>
                 For Support <br>
                 Your Account Manager : ".$rm_name." <br>
                 Contact No. : ".$rm_mob." <br>
                 Customer support team.  <br>
                 ".$show_contact." <br>
                 www.twghandicraft.com <br>
                 Thank you !" ; 
 
    $messagesms = "
                  ".$name." - ".$_SESSION['cutomer_address']." - ".$mob."
                 payment of ".$advance." INR  with tr. ref. no. ".$oline_trid." ".$UTRID."  against order ".$req_id." ID is verified. Push order to go ahead for stock check ".$admin_name." & ".$rm_name.""  ;
                 
   $message = "
                  ".$name." - ".$_SESSION['cutomer_address']." - ".$mob." <br> <br>
                 
                             
                  payment of ".$advance." INR  with tr. ref. no. ".$oline_trid." ".$UTRID."  against order ".$req_id." ID is verified. Push order to go ahead for stock check  <br><br>
                 
                 ".$admin_name." & ".$rm_name.""  ;
                 
    //   $this->send_email_temp($user_id,$message_content,$message,$subject);
    
      $this->mailsend($user_id,$email_name,$message_content,$message_contentsms,$message,$messagesms, $subject);
                 

// ===========================================
                        
            redirect('Admin/payment') ; 
        }
        
        
        	public function filter_payment(){

				is_admin();
				
				  $check = 	$this->check_url('Payment') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
		        
				
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
				    
				    redirect('Admin/payment');
				    
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
				        
				    }elseif($type== 'confirm_payment'){
				        
				          $search = '' ; 
				    }
				    
				   
				    $where = $type ;
				    $data['search'] = $search ; 
				//   $data['result'] = $this->Adminmodel->payment_filter( $where , $search ,$date);
				   $data['type'] = $type ;
				   
				    if($date == 'custom'){
				      
     	$data['result']=$this->Adminmodel->filterdatepayment($first_date,$second_date,$where ,$search );
				        
				    }else{
			     
			    $data['result'] = $this->Adminmodel->payment_filter( $where , $search ,$date);
			    
				    }
				    
				}
				
			$data['date'] = $cat_date ;
	
            $this->load->view('Admin/payment_filter.php' , $data);

			}
        
    
    //===========================
    
    
    public function customer_details(){
                is_admin();
                
                  $check = 	$this->check_url('customer') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
		        
		        
                $id = $this->uri->segment(3);
            	$data['messag']= $this->Adminmodel->customerdetail($id);
                $this->load->view('Admin/customer_details.php',$data);
    }
    public function neworder(){
                is_admin();
                
            $check = 	$this->check_url('NewOrder') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
                
            $user = $this->db->get('customerlogin')->result() ; 
            
            $product_detail = $this->db->get('product_detail')->result() ;   
            
            $data = array(
                
                'user' =>$user ,
                'product_detail' => $product_detail ,
                ) ;
            
           
                $this->load->view('Admin/neworder.php' ,$data);
    }
    
    
     public function ProductionNewOrder(){
                is_admin();
                
                 $check = $this->check_url('ProductionOrder') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
                
            $user = $this->db->get('customerlogin')->result() ; 
            
            $product_detail = $this->db->get('product_detail')->result() ;   
            

            
            $data = array(
                
                'user' =>$user ,
                'product_detail' => $product_detail ,
                ) ;
            
           
                $this->load->view('Admin/neworder_production.php' ,$data);
    }
    
    
    public function rmlist(){
                is_admin();
                $data['messa']=$this->Adminmodel->rm();
                $this->load->view('Admin/rmlist.php',$data);
    }
    public function addrm(){
                is_admin();
                $this->load->view('Admin/addrm.php');
    }
    public function editrm($id){
                is_admin();
                $data['rm_detail'] = $this->db->get('rm' , array('id' => $id ))->row() ;
                
             
                
                $this->load->view('Admin/editrm.php' ,$data);
    }
    public function variant(){


       is_admin();
       
       	$check = 	$this->check_url('ListProduct') ;
        			if($check != 'done'){
        			    	redirect('Admin');
        			    }
    	$id=$this->uri->segment(3);
    	  $where='parent_sku';
          $table='product_detail';
          $data['messages']=$this->Adminmodel->select_common_where($table,$where,$id);
          $data['url']=$this->uri->segment(3);
    	$this->load->view('Admin/addvariant.php',$data);
    }

public function addnewvarient(){

is_admin();
	$check = 	$this->check_url_edit('ListProduct') ;
        			if($check != 'done'){
        			    	redirect('Admin');
        			    }
        			    
	$data['url']=$this->uri->segment(3);
	
		$data['pcat']=$this->Adminmodel->Listparentcategory();

				$data['messagess']=$this->Adminmodel->category();

				$data['sub']=$this->Adminmodel->sub_category();
					$table='occasion';
				$data['occasion']=$this->Model->select_common($table);
				$table='recipient';
				$data['recipient']=$this->Model->select_common($table); 
				
	$this->load->view('Admin/newvarient.php',$data);
}
public function Previleges(){
is_admin();
			 $check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
		        $table='rm';
				$data['message1']=$this->Adminmodel->select_common($table);

	$this->load->view('Admin/privilege.php',$data);
}
public function AddPrevileges(){
is_admin();

 $check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

	$id =$this->uri->segment(3);
	$data['uri'] =$id;
	  $where='id';
          $table='admin';
          $data['prv']=$this->Adminmodel->select_common_where($table,$where,$id);
          
          $data['user_id'] = $id ; 
	$this->load->view('Admin/addprevileges.php',$data);
}
	public function index()

		{

			if(!empty($this->session->userdata('session_iid')))

					{

						redirect('Admin/Dashboard');

					}

			$this->load->view('Admin/Adminlogin');

		}

	public function admin_login()

		{

				$data= array(

							'name' => $this->input->post('username'),

							'pass' => md5($this->input->post('password'))

							);

						$login=$this->Adminmodel->admin_log($data);
						
							

					if ($login)

						{

							$newdata = array('session_iid'  => $login->id,

											'session_namee'  => $login->name

											);

							$this->session->set_userdata($newdata);

							redirect('Admin');

					  	}



					else

					{
					    
					    	$login=$this->Adminmodel->team_log($data);
					    	
					    
					
					    	if ($login)

						{

							$newdata = array('session_iid'  => $login->id,

											'session_namee'  => $login->rm_name,
                                        
                                        	'session_user'  => 'Team'

											);

							$this->session->set_userdata($newdata);

							redirect('Admin');

					  	}else{

					        $this->session->set_flashdata('msg' , 'Invalid Credentials') ;
    	                
    	                

						echo "please enter correct login password";
						
							redirect('Admin');
							
					  	}

					}

		}

		

    	public function Dashboard()

			{


				 // /is_protected();

				if(empty($this->session->userdata('session_iid')))

				{

					redirect('Admin/index');

				}

				$date=date("Y-m-d");

			

				$data['order'] = $this->Adminmodel->Totalorder();

			/*	$data['today'] = $this->Adminmodel->Todayorder($date);*/

				

			$data['Customers'] = $this->Adminmodel->Customers();

				$this->load->view('Admin/dashboard.php',$data);

			}
			public function orderbycategories(){
			    
			      is_admin();
			      
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

			$this->load->view('Admin/order.php',$data);
			}
			
			public function filterbystatus(){
			    
			      is_admin();
                    
                      $rm = $_POST['rm_id'];
                      $data['rm_id'] = $rm ; 
                       
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

			$this->load->view('Admin/orderprocess.php',$data);
			}
			
				function Cancelledfilter(){
			    
			      is_admin();

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

			$this->load->view('Admin/cancelled_list.php',$data);
			}
			public function orderbystatus(){
			      is_admin();
			    
			      $check = 	$this->check_url('Orderlist') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        } 
			    
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
			$this->load->view('Admin/orderprocess.php',$data);
			}
			
			
			function CancelledorderList(){
			    
			      is_admin();
			      
			       $check = 	$this->check_url('Orderlist') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        } 
			    
			      
			    if ($this->uri->segment(3)=="cancelled") {
			
				$data['current_uris']='2';
				$data['message2']=$this->Adminmodel->Cancelledorder();
				
				$data['status'] = "Cancelled" ;		
					
				$this->load->view('Admin/orderprocess.php',$data);
				
				}
			    
			}
			
		//========================
		
			public function production_pending(){
			    
			      is_admin();
			    
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
			$this->load->view('Admin/orderprocess.php',$data);
			}
			
		//============================
			public function logouts(){


					session_destroy();

				redirect('Admin/index');
		

			}

			public function orders(){

				is_admin();

        $check = 	$this->check_url('Orderlist') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
		        
				$data['message2']=$this->Adminmodel->Totalorder();

                $data['status'] = "Not" ;
                 $data['current_uris'] = "Not" ;
			//	pr($data);die;

				$this->load->view('Admin/order.php',$data);

			}
			
				public function Allorders(){

				is_admin();

				$data['message2']=$this->Adminmodel->Allorder();

                $data['status'] = "All" ;
                
                $data['current_uris'] = "All" ;
                
                
			//	pr($data);die;

				$this->load->view('Admin/orderprocess.php',$data);

			}
			
			public function order_filter(){

				is_admin();
				
				 $check = 	$this->check_url('Orderlist') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        } 
			    
				
				$type = $this->input->post('type') ;
				$id = $this->input->post('search') ;
				$order_status = $this->input->post('ordertype') ;
				
				
                         $first_date = $this->input->post('date1');
                        $second_date = $this->input->post('date2');
        
				
				
				$cat_date =  $this->input->post('date') ;
							$data['cat_date'] = $cat_date ;

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
				     $data['search'] =$search  ;
				    if($date == 'custom'){
				        
				      
     	$data['message2']=$this->Adminmodel->filterdateorder2($first_date,$second_date,$where ,$search ,$order_status);
				        
				        // 	$data['message2'] = $this->Adminmodel->order_filter($where , $search ,$date , $order_status);
				        
				    }else{
				  
				$data['message2'] = $this->Adminmodel->order_filter($where , $search ,$date , $order_status);
				
				    }
				}elseif($type== 'Customer'){
				    
				    	$id = $this->input->post('search') ;
				    	   $data['search'] =$id  ;
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
				    	$data['search'] =$id  ;
				    	
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
				  $data['search'] =$search  ;
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
			$data['type'] = $type ;

				$this->load->view('Admin/orderprocess.php',$data);

			}
			
			
				public function production_orders(){

				is_admin();
				
				   $check = 	$this->check_url('ProductionOrder') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
		        
				$data['message2']=$this->Adminmodel->Totalproduction_order();

                $data['status'] = "Not_approved" ;
                
                $data['pending'] = 'production' ;
				// pr($data);die;

				$this->load->view('Admin/orders_production.php',$data);

			}
			

			public function orderdetail(){

				is_admin();

				$id = $this->uri->segment(3);

				

				$data['messag']= $this->Adminmodel->orderdetail($id);
				
				$data['order'] = $this->db->get_where('orders',array('order_id' => $id))->row() ;
				
			//	pr($data['messag']);die;
				$this->load->view('Admin/orderdetail.php',$data);

				

			}
			public function check_order_detail(){

				is_admin();

				$id = $this->uri->segment(3);

				

				$data['result']= $this->Adminmodel->orderdetail($id);
// 			pr($data['result']);die;
				$this->load->view('Admin/check_order_detail.php',$data);

				

			}
			
					public function requestdetail(){

				is_admin();

				$id = $this->uri->segment(3);
				
//   $data['order']  = $this->db->get_where('orders', array('order_id' => $id ,'order_status' => 'Not',))->row() ;

                                    $this->db->select();
                                    $this->db->from('orders');
                                    $this->db->where(array('order_id' => $id ,'order_status' => 'Not'));
                                    
                                	if($_SESSION['session_namee'] != 'admin'){
                            	      $rm = $_SESSION['session_iid'] ;
                            		
                            		$this->db->where('Rm_id',$rm);
                            		}
                            
                            		$query = $this->db->get();
                                     $data['order'] = $query->row();
  
  if($data['order'] ){
      
				// 	$data['final_amount']= $final_amount ;
				
					$data['shipping']= $data['order']->shipping_charge ;	
					
				$before_sub_total	=  $data['order']->subtotal ;
				$total_discount	=  $data['order']->discount_total ;
					$data['sub_total'] = $before_sub_total;
		
				$data['result']= $this->Adminmodel->orderdetail($id);
				
					$result   = $this->db->get_where('order_detail', array('order_rand_id' => $id ,))->result() ;
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
                 $gst_total =0;
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
                                       
                                       
                            $a++ ;      
                           }
                           
	    	    	
	    	    	//=======================
	    	    	
	    	    		// $data['result']= $this->Adminmodel->orderdetail($request_id);
			
			    		
				
// 			pr($data['result']);die;
				$this->load->view('Admin/requestordr.php',$data);

  }else{
      
      redirect('Admin/orders') ;
  }		

			}
			
			public function confirmdetails(){
			   is_admin(); 
			   
			    $request_id = $this->input->post('request_id') ;
			    $final_amount = $this->input->post('finalprice') ; 
			    $before_sub_total = $this->input->post('before_sub_total') ;
			    $shipping = $this->input->post('shipping') ;
			    $sub_total = $this->input->post('sub_total') ;
			    $total_discount = $this->input->post('total_discount') ;
   $finalvolume = $this->input->post('finalvolume') ;
 $delievry_type = $this->input->post('delievry_type') ;

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
					$data['finalvolume']= $finalvolume ;
			$data['befor_dis_sub_total']= $before_sub_total ;
		
		$user_id =   $data['order']->user_id ; 
		
		    $user_detail   = $this->db->get_where('customerlogin', array('id' => $user_id ,))->row() ;
      
		$discount_per = $user_detail->discount_per ; 
		
		$discount_amt  = $sub_total*($discount_per/100) ;
		
				
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
        $disc = $data['order']->discountcharge  ; 
     
   
// if( $disc== 0){

// $dis = $this->apply_discount_user($discount_amt,$request_id) ;
// } 
// print_r($dis) ; 
// exit ;				
				   $this->load->view('Admin/confirmdetails.php', $data);
				   
				   
				   
			}
			
			public function confirmdetail($request_id){
			   is_admin(); 
			   
	    	    	//=======================
	    	    	

			$data['result']= $this->Adminmodel->orderdetail($request_id);
			
			      $data['order']  = $this->db->get_where('orders', array('order_id' => $request_id ,))->row() ;
      
					$data['final_amount']= $final_amount ;
					$data['shipping']= $data['order']->shipping_charge ;	
					$data['sub_total']=  $sub_total ;
				
				
				$orderss = array(
                                       
                                       'finalamount' =>$_SESSION['totalprice'] ,
                                       
                                    //   'discountcharge'=> $total_discount ,
                                    //   'subtotal'=> $sub_total ,
                                    //   'gst_total' => $gst_total ,
                                    //   'order_status' => 'Pending' ,
                                       
                                       );
                          //=========update discount======
                                              
                            // $this->db->where('order_id', $request_id);
                            // $this->db->update('orders', $orderss);

				
				   $this->load->view('Admin/confirmdetails.php', $data);
				   
				   
				   
			}
			
			
			
			//========================
			
				function request_complete($finalvolume,$delievry_type,$req_id){
				    
				    
				    
				
// 			pr($_POST);
// 			pr($_SESSION);die;

			 $volume=$finalvolume.'.0';
			 
		
			 $_SESSION['finalvolume']=$volume;
				if($volume<=1.000){
				 $quantity=$volume*2.0;
				}elseif ($volume>=1.001 && $volume<=1.500) {
						 $quantity=$volume*1.80;
				}
				elseif ($volume>=1.501 && $volume<=2.000) {
				    
				 $quantity=$volume*1.70;
					  
				}
				elseif ($volume>=2.001 && $volume<=2.500) {
					 $quantity=$volume*1.65;
					    
				}
				elseif ($volume>=2.501 && $volume<=3.000) {
					 $quantity=$volume*1.60;
					    
				} 
				elseif ($volume>=3.001 && $volume<=10.000) {
					//echo $volume;
					 $quantity=$volume*1.55;
					    
				} elseif ($volume>=10.001 && $volume<=15.000) {
					 $quantity=$volume*1.45;
					    
				}   elseif ($volume>=15.001 && $volume<=20.000) {
					 $quantity=$volume*1.40;
					    
				}    elseif ($volume>=20.000) {
					
					   $quantity=$volume*1.35; 
				} else{
				    
				    exit ; 
				    
				}
				
			
			//===============packing =======
			
			$cart = $quantity/65 ;
			
			$carton  = $cart  +0.80  ;
			
			$num = explode('.', $carton);
			
			$carton_num = $num[0];
			
			if($num[0] == 0){
			    $packingprice = 350 ;
			    
			}else{
			    
			    
			$packingprice = $num[0]*350 ; 
			
			    
			}
			
			 $del= $delievry_type;
			
			if($del=='self'){
			    
			    $packingprice = 0 ;
			}
			
			
			
			//=============================
				
				 $del= $delievry_type;

				if($del=='CourierByroad'){
				    
				   
			    	  $_SESSION['delievry']='CourierByroad';
						
						
					if($_SESSION['pincode']=='local'){
						$_SESSION['expected_days']='2-3 Days';
					if($quantity<=10.00){
						 $_SESSION['del_charge']='150';

				}
				
				  elseif ($quantity>=10.001) {
					
					 $quan=$quantity-10;
					$kg=$quan*6;
					$finalkg=150+$kg;
					    $_SESSION['del_charge']=$finalkg;
				} 
			}elseif ($_SESSION['pincode']=='metro') {
				$_SESSION['expected_days']='7-10 Days';
					if($quantity<=10.00){
						 $_SESSION['del_charge']='175';

				}
				
				  elseif ($quantity>=10.001) {
					
					 $quan=$quantity-10;
					$kg=$quan*15;
					$finalkg=175+$kg;
					    $_SESSION['del_charge']=$finalkg;
				} 


			}elseif ($_SESSION['pincode']=='other') {
			    
			   
				$_SESSION['expected_days']='10-12 Days';
				if($quantity<=10.00){
						 $_SESSION['del_charge']='200';

				}
				
				  elseif ($quantity>=10.001) {
					
					 $quan=$quantity-10;
					$kg=$quan*20;
					$finalkg=200+$kg;
				
				    $_SESSION['del_charge']=$finalkg;
				} 



			}else{
						$_SESSION['expected_days']='2-3 Days';
					if($quantity<=10.00){
						 $_SESSION['del_charge']='150';

				}
				
				  elseif ($quantity>=10.001) {
					
					 $quan=$quantity-10;
					$kg=$quan*6;
					$finalkg=150+$kg;
					    $_SESSION['del_charge']=$finalkg;
				} 
			}
				}
			 elseif ($del=='self') {
					$_SESSION['delievry']='self';
					 $_SESSION['del_charge']='0';
					 $_SESSION['expected_days']='';
				} 

				elseif($del=='CourierByAir') {
				  		$_SESSION['delievry']='CourierByAir';
					if($_SESSION['pincode']=='local'){
						$_SESSION['expected_days']='1 Days';
						 $_SESSION['del_charge']=$quantity*100;

				
				
				
			}elseif ($_SESSION['pincode']=='metro') {
				$_SESSION['expected_days']='2-3 Days';
					
						 $_SESSION['del_charge']=$quantity*120;

				

			}elseif ($_SESSION['pincode']=='other' || $_SESSION['pincode'] == '') {
				$_SESSION['expected_days']='4-7 Days';
				
						 $_SESSION['del_charge']=$quantity*140;

		
			}
				  }  else{
				  	$_SESSION['delievry']='Transport';
				  	 $carton=$quantity/70;
				  	 
					 $_SESSION['expected_days']='';
				  	if($carton_num<=2){

				  	  $_SESSION['del_charge']=250;
				  	}
				  	elseif ( $carton_num>2  && $carton<=3)
				  	{
				  		  $_SESSION['del_charge']= 300;
				  	}elseif ($carton_num>3 && $carton<=4)
				  	{
				  		  $_SESSION['del_charge']=450;
				  	}elseif ($carton_num>=5 && $carton<=6)
				  	{
				  		  $_SESSION['del_charge']=500;
				  	}
				  	elseif ($carton_num>7) 
				  	{
				  		  $_SESSION['del_charge']=1000;
				  	}

				  }
				  
//====================Discount % ==========================				  
				
// 			if($_POST['totalprice'] >='40000' && $_POST['totalprice'] < '100000' ){
			    
// 			     $_SESSION['tot_discount']  =   ($_POST['totalprice']*3)/100 ; 
// 			} elseif($_POST['totalprice']>='100000' && $_POST['totalprice'] < '500000' ){
// 			 $_SESSION['tot_discount']  =   ($_POST['totalprice']*5)/100 ; 
// 			}
			
// 			elseif($_POST['totalprice'] <'40000'){
			    
// 			    	 $_SESSION['tot_discount']  = 0 ;
			    
			    
// 			}
		
        //=============================Order Processing ======================================
        
        
        $finalgst = $_SESSION['finalgst'] ;
        
          $cart_price =   $_SESSION['subprice'] - $_SESSION['finalgst'] ;
          
           if($cart_price >4999 && $cart_price < '11999' ){
                                    
                                    $order_processing = 500 ;
           }
           else{
               
                 $order_processing = 0 ;
               
           }
        
        //==========================================================================
        
            
                            if($cart_price>'40000' && $cart_price < '100000' ){
                            
                                    $total_discount  =   ($cart_price*3)/100 ; 
                                    
                                    $gst_dis = $finalgst*3/100 ;
                                    
                                    $final_discount = $total_discount + $gst_dis ;
                                    
                                      $_SESSION['tot_discount'] =  $final_discount;
                                      
                            } elseif($cart_price >'100000' ){
                            
                                    $total_discount  =   ($cart_price*5)/100 ; 
                                    
                                    $gst_dis = ($finalgst*5/100) ;
                                    
                                    $final_discount = $total_discount + $gst_dis ;
                                    
                                    
                                  $_SESSION['tot_discount'] =  $final_discount;
                                  
                            }
                            elseif($cart_price < 40000){
                                
                                $final_discount = 0 ;
                                $gst_dis = 0;
                                
                            }
                            
                                   $_SESSION['gst_dis'] =  $gst_dis;
                        
             if ($del=='self') {
            					$_SESSION['delievry']='self';
            					 $_SESSION['del_charge']='0';
            					 $_SESSION['expected_days']='';
            					 $packingprice =0;
            				} 
//==================================================================


        $over_all_gst = $_SESSION['finalgst'] +$_SESSION['del_charge']*18/100 + $packingprice*12/100 - $gst_dis ;


		    $price=$_SESSION['subprice']+round($_SESSION['del_charge']*118/100,2)+$_SESSION['codprice'] + round($packingprice*112/100 , 2)  + $order_processing - $final_discount ;
				 
			
		    $_SESSION['totalprice']=round($price+$_POST['transport']-$_POST['admindisc']-$_POST['userprice'] , 2);
		    
		    
			$var=array('totalprice'=>round($price,2),'charge'=>round(($_SESSION['del_charge']),2), 'packingprice' => round($packingprice,2)  ,  'over_all_gst' => round($over_all_gst ,2));
		
		
		  // 	 $_SESSION['totalprice'] = $price;
			  
		     $_SESSION['packingprice']  = $packingprice ;
		
			echo json_encode($var);
				//$this->load->view('checkout.php');
				
				
			  $order_data = array(
		         
		         'subtotal' => $_SESSION['subprice'] ,
		         'finalamount' => $_SESSION['totalprice'] ,
		         
		         'shipping_charge' => $shipping  ,
		         
		         'packing_charge' => $packingprice,
		         
		         );
		     
		      $this->db->where(array('order_id'=> $req_id ));
               $this->db->update('orders', $order_data);
			
			
				}
				
			
			//=========================
			
			function order_detail_confirm($request_id){
			      is_admin();
			      
			    
			    	$data['result']= $this->Adminmodel->orderdetail($request_id);
			    	
			    	if($data['result']){
			
			      $data['order']  = $this->db->get_where('orders', array('order_id' => $request_id ,))->row() ;
      
				
				
				   $this->load->view('Admin/order_detail_confirm.php', $data);
				   
			    	}else{
			    	    
			    	    	redirect('Admin');
			    	}
				   
				   
			}
			public function Customers(){

				is_admin();

   $check = 	$this->check_url('customer') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
		        
				$data['messa']=$this->Adminmodel->Customers();
				
				$data['rm_list'] = $this->db->get('rm')->result();
		
			
				$this->load->view('Admin/customer.php',$data);

			}
				public function edituser(){
						is_admin();

					$id=$this->uri->segment(3);
					
					 $check = $this->check_url_edit('customer') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }


				$where='id';

				$table='customerlogin';

				$data['edituser']=$this->Adminmodel->select_com_where($table,$where,$id);
				
					$data['rm_list'] = $this->db->get('rm')->result();
		

				$this->load->view('Admin/edituser.php',$data);
			}
			public function adduser(){
						is_admin();
                $check = $this->check_url_edit('customer') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

				$this->load->view('Admin/adduser.php');
			}
			public function updateuser(){
				is_admin();

			
				$id=$_POST['id'];
				
				$mobile = $_POST['Mobile'] ; 
				$old_mobile = $_POST['old_Mobile'] ; 
				$email = $_POST['email'] ; 
				
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
                        'discount_per'=>$_POST['discount_per'],

							);
							
							$discount_per  = $_POST['discount_per'] ; 
				if($discount_per){
				    
				    	$q = $this->db->select()
            				->where(array('id'=>$id, ))
            				->from('customerlogin')
            				->get();
    	            	$user_row  = $q->row();
    	        
				    $user_dis = $user_row->discount_per ;
				    
				    if($user_dis != $discount_per){
				        
				    $user_id =    $_POST['id']; 
				    $rm_id =    $_POST['rm_id'] ; 
				  
			  	   $rm_detail   = $this->db->get_where('rm', array('id' => $rm_id ,))->row() ;
                   $rm_email = $rm_detail->rm_email ; 
                   $rm_mob = $rm_detail->rm_mobile ; 
                   $rm_name = $rm_detail->rm_name ; 
                
                 $admin =  $this->db->get_where('admin_mail', array('id' => 1 ,))->row() ;
                    
                    $FromMail = $admin->send_mail ; 
                    $AdminMail = $admin->admin_mail ; 
                    $admin_mob = $admin->mobile   ;  
                    $admin_name = $admin->name   ;  
                    $show_contact = $admin->show_contact   ;  

    
        $message_contentsms = "
                             Congrats ".$_POST['cname']."
                             Now you are aligible for order at ".$discount_per."% Discount on every item. Enjoy your day with first order.
                             For Support contact
                             Your Account Manager: ".$rm_name."
                             Contact No.: ".$rm_mob."
                             Customer support team. 
                             ".$show_contact."
                             www.twghandicraft.com
                             Thank you !";
     
        $message_content = "
                             Congrats ".$_POST['cname']." <br>
                        
                             Now you are aligible for order at ".$discount_per."% Discount on every item. Enjoy your day with first order.<br><br>
                             
                             For Support contact <br>
                             Your Account Manager : ".$rm_name." <br>
                             Contact No. : ".$rm_mob." <br>
                             Customer support team.  <br>
                             ".$show_contact."   <br>
                             www.twghandicraft.com   <br>
                             Thank you !";

// sms_send($old_mobile,$message_content) ;

 	
		 //=========================ADMIN ===========
		 
      $messagesms = 	   "
                     One Customer ".$_POST['cname'].", Register with Mobile Number ".$_POST['Mobile']." is aligible for order at ".$discount_per."% Discount on every item.
                     
                     ".$admin_name." & ".$rm_name."";
                     
                        	 
      $message = 	   "
                     One Customer ".$_POST['cname'].", Register with Mobile Number ".$_POST['Mobile']." is aligible for order at ".$discount_per."% Discount on every item.
                     <br> <br>
                     ".$admin_name." & ".$rm_name."";
                     
 
   
                    $email_name= "Discount_Approved" ; 
                    $subject= "Discount Approved" ; 
                        
                   $this->mailsend($user_id,$email_name,$message_content,$message_contentsms,$message,$messagesms, $subject);
                  
          
				        
				    }
				    
				}
				
				if(empty($mobile)){
				    
    	                  $this->session->set_flashdata('msg' , 'Mobile not empty!') ;
    	                  
    	                  redirect('Admin/Edituser/'.$id) ; 
				}
				if($mobile !=  $old_mobile){
				
				// $data['valid'] =  '';
				$data['otp_validation'] =  '';
					$q = $this->db->select()
            				->where(array('phone'=>$mobile, ))
            				->from('customerlogin')
            				->get();
    	            	$mobile_allready  = $q->row();
    	            	
    	            if($mobile_allready){
    	                
    	                  $this->session->set_flashdata('msg' , 'Mobile ! Already Exist') ;
    	                  
    	                  redirect('Admin/Edituser/'.$id) ; 
    	            }	
				}
				
					$email	=$_POST['email'];
					$old_email	=$_POST['old_email'];
				
					if($email !=  $old_email && !empty($email)){
					$q = $this->db->select()
            				->where(array('email'=>$email, ))
            				->from('customerlogin')
            				->get();
    	            	$mobile_allready  = $q->row();
    	            	
    	            if($mobile_allready){
    	                 
    	                  	if($id){
    	                    $this->session->set_flashdata('msg' , 'Email ! Already Exist') ;
    	                	    
    	                  	    redirect('Admin/Edituser/'.$id) ; 
    	                  	    
    	                  	}else{
    	                  	  $this->session->set_flashdata('msg' , 'Email ! Already Exist') ;
    	                    
    	                  	     redirect('Admin/adduser') ; 
    	                  	}
    	            }	
				}
				
				
				
				
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
        		$newpass  = md5($_POST['password']);
        		
        		
		$user=   $this->db->get_where('customerlogin' ,array('id' => $id ))->row();
		
		$oldpass = $user->password ;
		
		if($oldpass !=  $newpass ){
		    
		   $data['password'] = $newpass ;
		}
				
				$table='customerlogin';
				if($id){
				$where='id';
			    $this->Adminmodel->update_common($data,$table,$where,$id);
			  $Email =   $_POST['email'] ;
			  
			 // $sub = 'Order Approved by Admin' ;
			 //     $this->email->set_mailtype("html");
    //                 $this->email->set_newline("\r\n");  
    //                 $url=base_url('Artnhub/ordermailplace?id='.$request_id.'&subject='.$sub);
    //                 $file=file_get_contents($url) ; 
    //                 $this->load->library('email');
    //                 $this->email->from('twghandicraft@gmail.com', 'TWG Handicraft');
    //                 $this->email->to($Email);
    //                 $this->email->subject('Order Approved by Admin');
                    
    //                 $this->email->message($file);
    //                 //$this->email->attach('http://explacia.in/art/invoice/'.$oid.'.pdf');
    //                 $this->email->send();				
        
			    
			    
				}else{
					$data['password'] = md5($_POST['password']);
				//	pr($data);die;
					$this->Model->insert_common($table,$data);
				}

                $this->session->set_flashdata('msg' , 'User Updated !') ;
    	                 
				redirect('Admin/Customers');
			
			}
			
				public function insertuser(){
				is_admin();

			
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
    	                  
    	               //   redirect('Admin/Edituser/'.$id) ; 
    	               
    	                redirect('Admin/adduser') ;
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
    	                
    	                 
    	                 
    	                  	if($id){
    	                  	    
    	                    $this->session->set_flashdata('msg' , 'Email ! Already Exist') ;
    	                 	    redirect('Admin/Edituser/'.$id) ; 
    	                  	    
    	                  	}else{
    	                  	    
    	                  	  $this->session->set_flashdata('msg' , 'Email ! Already Exist') ;
    	                      redirect('Admin/adduser') ; 
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
						 'created' =>date('Y-m-d') ,

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

				redirect('Admin/Customers');
			
			}
			
			public function Rm_update(){
				is_admin();

			
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

				redirect('Admin/rmlist');
			
			}
				public function deleteuser(){
				is_admin();
				$id=$this->uri->segment(3);
				 $this->Adminmodel->deluser($id);
				 redirect('Admin/Customers');

			}
		public function delete_aboutimg(){
				is_admin();
				$id=$this->uri->segment(3);
    			    	 $this->db->where('id',$id);
     	    	        $this->db->delete('about');
                redirect('Admin/about');

			}
			public function delete_returnimg(){
				is_admin();
				$id=$this->uri->segment(3);
    			    	 $this->db->where('id',$id);
     	    	        $this->db->delete('return_policy');
                redirect('Admin/returns');

			}
			public function Productupload(){

				is_admin();
					$check = 	$this->check_url_upload('ListProduct') ;
        			if($check != 'done'){
        			    	redirect('Admin');
        			    }
			
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

				$this->load->view('Admin/Productupload.php',$data);

			}

			public function uploadvarient(){

				is_admin();
			
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

			    redirect('Admin/variant/'.$_POST['psku']);

			}
			
			public function check_sku($sku){
			    
			    
			return   $row = $this->db->get_where('product_detail' ,array('sku_code' => $sku ))->row();
			}
			
			
				public function upload(){

				is_admin();
				
			$skuu =	$_POST['sku'] ;
				
				if($this->check_sku($skuu)){
				    
				     $this->session->set_flashdata('msg' , 'SKU Already exist !') ;

				return    redirect('Admin/Productupload');
				
				
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
			   	        
						'billing_name'      =>$_POST['billing_name'],
						'new_arrivel'      =>$_POST['new_arrivel'],
						'size_filter'      =>$_POST['size_filter'],
						
				// 		'discount_code'     =>$discount,
				// 		'cod'     =>$_POST['cod'],
			
				// 		'Position'=>$postionset,
				// 		'recipient'=>$recis,
				// 		'cancel_pro'	=>$_POST['cancel_pro']
 
							);
							
	//======IMAGE sECTION =======						

			  $path = $image;
			  
			  
			    $data['main_image1'] = $path ;
			    

			    $path1 = $image1;
			    
			    if($path1){
			    
			    	$data['main_image2'] =$path1 ;
			    }

			    $path2 = $image2;
			    
			      if($path2){
			          
			          $data['main_image3'] =$path2 ;
			          
			      }

			    $path3 = $image3;
			    
			     if($path3){
			    $data['main_image4'] =$path3 ;
			    
			     }
			    $path4 = $image4;

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
 			    
 			     redirect('Admin/ListProduct');
 			    
 			    
 			}else{
 			    
 			    // echo "not insert" ;
 			    
 			         redirect('Admin/Productupload');
 			}

			  

			}
			public function excelupload(){
			    
			    is_admin();
			    	$check = 	$this->check_url('excel') ;
			
			if($check != 'done'){
			    
			    	redirect('Admin');
		
			}
			
				$this->load->view('Admin/uploadexcel.php');
			}

	public function excel($id){
is_admin();

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

			 //    if(empty($filesop[11])){
			 //   	$filesop[11]='0';
			 //   }else{
			 //   	$filesop[11]='local';
			 //   }
			 //    if(empty($filesop[12])){
			 //   	$filesop[12]='0';
			 //   }else{
			 //   	$filesop[12]='metro';
			 //   }
			 //    if(empty( $filesop[13])){
			 //   	 $filesop[13]='0';
			 //   }else{
			 //   	$filesop[13]='other';
			 //   }
			 //    if(empty($filesop[10])){
			 //   	$filesop[10]='0';
			 //   }

 if(empty($filesop[34])){
			    	$filesop[34]='0';
			    }

			    $url = base_url();
    			$path = $filesop[10];
			    $path1 = $filesop[11];
			    $path2 = $filesop[12];
			    $path3 = $filesop[13];
			    $path4 = $filesop[14];
			    
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
  
    'billing_name'=>$filesop[36],
              'new_arrivel'=>$filesop[37],
              'size_filter'=>$filesop[38],
           'status'=>$filesop[39],
          
  'date' => $currentTime ,
  
//   'recipient'=>$filesop[42]



 );
 
 
	$this->Adminmodel->add_product($data);
	
	
$par_cat = 	explode(",",$filesop[5]) ;
 			    
 			    foreach($par_cat as $pcat){
 			    
 			    $position_parent = array(
 			        
 			        'product_sku' => $filesop[0], 
 			        
 			        'parent_category' =>$pcat,
 			        
 			        );
 			        
 			        
 			        $this->db->insert('position_product',$position_parent) ;
 			    
 			    }
 			    
 			    
 			    $cat = 	explode(",", $filesop[4]) ;
 
 
 			    foreach($cat as $catt){
 			    
 			    $position_cat = array(
 			        
 			        'product_sku' => $filesop[0], 
 			        
 			        'category' =>$catt,
 			        
 			        );
 			        
 			        
 			        $this->db->insert('position_product',$position_cat) ;
 			    
 			    }
 			    
 			        $sub_cat = 	explode(",", $filesop[6]) ;
 
 if($sub_cat){
 			      foreach($sub_cat as $sub){
 			    
 			    $position_cat = array(
 			         
 			        'product_sku' => $filesop[0] , 
 			        
 			        'sub_cat' =>$sub,
 			        
 			        );
 			        
 			//         print_r($position_cat);
 			//   echo $sub ;
 			   
 			        $this->db->insert('position_product',$position_cat) ;
 			    
 			    }
 			    
 }
 			    
 			    
 		

  }
    
     $i ++ ;
     
 } // end while 

redirect('Admin/ListProduct');

 

			}

			public function updateproduct(){

				is_admin();
					$check = 	$this->check_url_edit('ListProduct') ;
        			if($check != 'done'){
        			    	redirect('Admin');
        			    }
			
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

			    	$path = $image;
			    }

			     if(empty($image1))

			    {

			    	$path1=$_POST['paths1'];
			    }

			    else

			    {

			    	$path1 = $image1;

			    }



               if(empty($image2))

			    {

			    	$path2=$_POST['paths2'];

			    }

			    else

			    {

			    	$path2 = $image2;

	
			    }



              if(empty($image3))

			    {

			    	$path3=$_POST['paths3'];

			    }

			    else

			    {

			    	$path3 = $image3;

			    }


if(empty($image4))

			    {

			    	$path4=$_POST['paths4'];

			    }

			    else

			    {

			    	$path4 = $image4;

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
				// if(empty($parent_sku)){
				    
				//     $parent_sku = $_POST['sku'] ;
				// }
                           
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
						
						'parent_cat'	=>  $par_cat,    //json_encode($par_cat) ,

						'category_id' =>  $cat,          //json_encode($cat) ,

						'sub_catid' =>  $sub_cat,      //json_encode($sub_cat),
					
						'bullet1'		=>$_POST['point1'],

						'bullet2'		=>$_POST['point2'],

						'bullet3'		=>$_POST['point3'],

						'bullet4'		=>$_POST['point4'],

						'bullet5'		=>$_POST['point5'],

						'weight'		=>$_POST['weight'],	

						'material'		=>$_POST['material'],
                    
                    	'varient'		=>$_POST['varient'],

					
						'color'			=>$_POST['color'],
                        'other'			=>$_POST['other'],

						'availability'			=>$_POST['avail'],
						
						'min_order_quan'			=>$_POST['minimum'],
						
						'meta_title'      =>$_POST['metatag'],
						
						'meta_keyword'      =>$_POST['metakey'],
						'hsn_code'     =>$_POST['hsncode'],
				  		
						'low_alert' => $_POST['lowalert'] ,
						'occasion'        =>$occvals,
						'gst_per'         =>$_POST['gstper'],
						
			    		'billing_name'      =>$_POST['billing_name'],
						'new_arrivel'      =>$_POST['new_arrivel'],
						'size_filter'      =>$_POST['size_filter'],
			
			
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
                
	    	 $sku = $_POST['sku'] ;

            $this->db->where('product_sku',$sku);
 	    	$this->db->delete('position_product');

 			    
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
 			    
 			   foreach($sub_cat as $sub){
 			    
 			    $position_cat = array(
 			         
 			        'product_sku' => $_POST['sku'], 
 			        
 			        'sub_cat' =>$sub,
 			        
 			        );
 			        
 			//         print_r($position_cat);
 			//   echo $sub ;
 			   
 			        $this->db->insert('position_product',$position_cat) ;
 			    
 			    }
 			    
 			    
 			    
 			     redirect('Admin/ListProduct');
 			    
 			    
 			
			 //   $this->Adminmodel->updateproduct($data,$id);


		    redirect('Admin/ListProduct');

			}



public function editvarient(){
	is_admin();
		$check = 	$this->check_url_edit('ListProduct') ;
        			if($check != 'done'){
        			    	redirect('Admin');
        			    }
										 $id=$this->uri->segment(3);
                                                    $where='id';
                                                  $table='product';
                                                  $data['messagess']=$this->Adminmodel->select_common_where($table,$where,$id);
                                                  $this->load->view('Admin/editvarientproduct.php',$data);
}

			public function updatevarientproduct(){

				is_admin();
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


			    redirect('Admin/variant/'.$_POST['par']);

			}	
			
			
			public function ListProduct(){

				is_admin();
				
					$check = 	$this->check_url('ListProduct') ;
			
			if($check != 'done'){
			    
			    	redirect('Admin');
		
			}

				/*$table='page';

				$data['page_type']=$this->Adminmodel->select_com($table);*/
// ===========================================================

    	$config['base_url']=base_url('Admin/ListProduct');
		$config['per_page']=50;
		//$config['uri_segment']  = 2;
		$config['total_rows']=$this->Model->num_rows_productlist();
		//pr($config['total_rows']);die;
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close']  = '</span></li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close']  = '</span></li>';
		$this->pagination->initialize($config);
		$data['messages']=$this->Model->productlist($config['per_page'],$this->uri->segment(3));
		
	
// print_r(	$data['messages']) ; 


// exit ; 
// ==================================================================
// 				$check=$this->Adminmodel->ListProduct();
				
				
				$table='parent_category';
				$data['parent_category']=$this->Adminmodel->select_com($table);
				
// 				$price = array();
				
// 				foreach ($check as $key => $row)
// 				{
				    
//     			$price[$key] = $row['id'];
    			
//     	    	}
// 				array_multisort($price, SORT_DESC, $check);
// 				//pr($price);die;
// 				foreach ($price as $key ) {
						
// 				$id=$key;
// 				$where='id';
// 				$table='product_detail';

// 				$m[]=$this->Adminmodel->select_com_where($table,$where,$id);
				
			
// 			}
			
// 				foreach ($m as $final) {
// 					$data['messages'][]=$final[0];
// 				}
				
				// ============================
				// pr($data['messages']);die;
				$this->load->view('Admin/ListProduct.php',$data);

			}
			
			
			//====list =======
			
						public function ListProductnew(){

				is_admin();

				/*$table='page';

				$data['page_type']=$this->Adminmodel->select_com($table);*/

				$m[]=$this->Adminmodel->ListProduct();
				
				
			
				
				foreach ($m as $final) {
					$data['messages'][]=$final[0];
				}
				//pr($data['messages']);die;
				$this->load->view('Admin/ListProduct.php',$data);

			}
			
			
			//=========end list =======
			
		
				public function productbycategories(){

				is_admin();

				/*$table='page';

				$data['page_type']=$this->Adminmodel->select_com($table);*/
					$table='parent_category';
				$data['parent_category']=$this->Adminmodel->select_com($table);
			
			 	$pcatid= $_POST['pcat'];
			 	
			
			$catid= $_POST['cat'];
		
		 
			$subcatid= $_POST['cat_id'];
			

		
							$this->db->select('*'); 
                           if($subcatid !='please choose'){
                             $this->db->like('sub_catid', $subcatid); 
                              $this->db->like('category_id', $catid); 
                           
                            }elseif($catid !='please choose' ){
                                
                             $this->db->like('category_id', $catid); 
                               
                            }else{
                                      $this->db->like('parent_cat', $pcatid); 
                          
                            }
                            
                	       // $this->db->where('status', 1); 
                	        $this->db->from('product_detail');
                             $query = $this->db->get();
							     	$data['messages'] = $query->result_array();
							     
					$data['pcat'] = $pcatid ;
					$data['catid'] = $catid ;
					$data['subcatid'] = $subcatid ;
					$data['filter_apply'] = 'Yes' ; 
			
				// pr($data['messages']);die;
				$this->load->view('Admin/ListProduct.php',$data);

			
			}



			public function Editproduct(){

				is_admin();
				
					 $check = $this->check_url_edit('ListProduct') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }


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

				$this->load->view('Admin/editproduct.php',$data);

				

			}



			public function deleteproduct(){

				is_admin();

				$id = $this->uri->segment(3);

				$this->Adminmodel->deleteproduct($id);

				redirect('Admin/ListProduct');

			}

public function deletevarient(){

				is_admin();

				$id = $this->uri->segment(3);
				$idd = $this->uri->segment(4);

				$this->Adminmodel->deletevarientproduct($id);

				redirect('Admin/variant/'.$idd);

			}

			public function category(){

				is_admin();
						$check = 	$this->check_url('Admin') ;
        			if($check != 'done'){
        			    	redirect('Admin');
        			    }

				$data['pcat']=$this->Adminmodel->Listparentcategory();

				$this->load->view('Admin/Addcategory.php',$data);

			}
			public function category3(){

				is_admin();

				$data['pcat']=$this->Adminmodel->Listparentcategory();

				$this->load->view('Admin/Addcategory3.php',$data);

			}

			public function Addcategory(){

				is_admin();
				$id= $_POST['pcat'];

				$where='parent_id';

				$table='category';

				$cat=$this->Adminmodel->select_com_where($table,$where,$id);
				rsort($cat);
				
				 
				$str=$cat[0]['id'];
				$f= ++$str;

					
				$id = $_POST['id'] ; 
				
				$result =  $this->db->get_where('category' ,array('id'=> $id))->row();
				
if($result){
    
  $this->session->set_flashdata('msg' , 'Please Added New Category ID!') ;
			          
}else{
				$data= array(
					'id'=>$_POST['id'],
					'name' => $_POST['name'],
					'parent_id' => $_POST['pcat'],
					
					 'meta_tag' => $_POST['meta_tag'],
                     'meta_key' => $_POST['meta_key'],
                     'meta_des' => $_POST['meta_des'],
                        'des' => $_POST['desc'],


							);

				$this->Adminmodel->Addcategory($data);
}
				$this->Listcategory();

			}
			

			public function Listcategory(){

				is_admin();

            $check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
		        
				$data['messagess']=$this->Adminmodel->Listcategory();

				$this->load->view('Admin/Listcategory.php',$data);

			}
			
				public function Listcategoryfilter(){
				is_admin();
				 $check = 	$this->check_url('filter') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        } 
			    
				// $id=5;
				$id = $this->input->post('parent_id');
				if($id == "All"){
				    redirect('Admin/Listcategory');
				      
				}else{

				$where='parent_id';

				$table='category';

				$data['messagess']=$this->Adminmodel->select_category_where($table,$where,$id);
				//pr($data);
				$data['parentid']=$id ;
				$this->load->view('Admin/Listcategory.php',$data);
            }
			}
			
				public function Listsubcategoryfilter(){
				is_admin();
				// $id=5;
				
					 $check = 	$this->check_url('filter') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        } 
			 	$id = $this->input->post('parent_id');
				$catid = $this->input->post('cat_id');
				if($id == "All"){
				    redirect('Admin/Listsubcategory');
				    
				}else{

				$where='parent_id';
 
				$table='sub_category';   
 
				// $data['messagess']=$this->Adminmodel->select_category_where($table,$where,$id);
				
					$this->db->select('*');
        // 		$this->db->where($where,$id);
        	if($catid != "All"){
				    	$this->db->where("cat_id",$catid);
        
				}	
        
         		$this->db->from($table);		
         		$this->db->order_by("Position", "asc");
        		$query = $this->db->get();
        
        			$data['messagess'] = $query->result();
         $data['parent'] = $id ;
		$data['categoryid'] = $catid ;
				
				// pr($data);
				// exit; 
				$this->load->view('Admin/Listsubcategory.php',$data);
            }
			}
			
	public function Listcategory3(){
				is_admin();
				$id=5;

				$where='parent_id';

				$table='category';

				$data['messagess']=$this->Adminmodel->select_com_where($table,$where,$id);
				//pr($data);
				$this->load->view('Admin/Listcategory3.php',$data);

			}

			
				public function parentwise_category($id){

				is_admin();
				
					$check = $this->check_url('homecategory') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

				$data['messagess']=$this->Adminmodel->parentwise_category($id);

				$this->load->view('Admin/parentwisecategory.php',$data);

			}

			public function updatecategory(){

				is_admin();

				//pr($_POST);die;

               $table='category';

               $where='id';

				$id =$_POST['id'];

				$data= array(

						

						'name' =>$_POST['catname'],
						
					 'meta_tag' => $_POST['meta_tag'],
                     'meta_key' => $_POST['meta_key'],
                     'meta_des' => $_POST['meta_des'],
                        'des' => $_POST['desc'],


							);

			    $this->Adminmodel->update_common($data,$table,$where,$id);



			  



			    $this->Listcategory();

			}

			public function Editcategory(){

				is_admin();

				$id = $this->uri->segment(3);	

				
				

				$data['messagess'] = $this->Adminmodel->Editcategory($id);

				//pr($data);die;

				$this->load->view('Admin/editcategory.php',$data);

				

			}

			public function deletecategory(){

				is_admin();

				// $id = $this->uri->segment(3);

				// $this->Adminmodel->deletecategory($id);
				
				 $id = $this->uri->segment(3);
				
				$cat = $this->db->get_where('sub_category' ,array('parent_id'=> $id))->row();
			
				 $q =$this->db->select('*')
                    	      ->from('product_detail')
                              ->where("category_id LIKE '%$id%'")
                              ->get();
                               $product = $q->row() ;	
				
			
				if(empty($cat)){
				    
				    if(empty($product)){
				    
				    		$this->Adminmodel->deletecategory($id);
				    }else{
				        
				          $this->session->set_flashdata('msg' , 'Category Not Deleted! Have product') ;
			       
				    }
	    
				}else{
				       $this->session->set_flashdata('msg' , 'Category Not Deleted! have Sub-catgory') ;
			       
				}

				redirect('Admin/Listcategory');

			}



				public function updatecategory3(){

				is_admin();

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

				is_admin();

				$id = $this->uri->segment(3);	

				
				

				$data['messagess'] = $this->Adminmodel->Editcategory($id);

				//pr($data);die;

				$this->load->view('Admin/editcategory3.php',$data);

				

			}

			public function deletecategory3(){

				is_admin();

				$id = $this->uri->segment(3);

				$this->Adminmodel->deletecategory($id);

				redirect('Admin/Listcategory3');

			}


// =======Home Page  Deals =======

			public function Home_Page_Deals(){

				is_admin();
				
				
					  $check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }


				$this->load->view('Admin/HomePageDeals.php');

			}

	public function AddHome_Page_Deals(){

				is_admin();
				
				 $check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				
			        	$name =  $_POST['Name'];
				
				     $flag = str_replace(" ","_",$name);

				$data= array(

					'name' => $_POST['Name'],
					
					'position' => $_POST['position'],
					
					'flag_code' => $flag,

							);

                $this->db->insert('home_page_deals' , $data) ;


				// $this->Adminmodel->Addparentcategory($data);

				redirect('Admin/Listhome_deals');

			}
			
			public function Listhome_deals(){

				is_admin();
				
					  $check = $this->check_url('homecategory') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

				$data['messagess']=$this->Adminmodel->list_homedeals();

				$this->load->view('Admin/list_homedeals.php',$data);

			}
			
			
			
			function homedeals_position(){
					is_admin();

					  	$id =$_POST['id'];
					  	$type =$_POST['type'];
					$data = array('position' => $type ,) ;
		
			    $this->db->where('id', $id);
                $this->db->update('home_page_deals', $data);
	
				echo "done" ;
    
			}	
			function homedeals_name(){
					is_admin();

					  	$id =$_POST['id'];
					  	$type =$_POST['type'];
					$data = array('Name' => $type ,) ;
		
			    $this->db->where('id', $id);
                $this->db->update('home_page_deals', $data);
	
				echo "done" ;
    
			}
			
				public function Deletehomedeals(){

				is_admin();

				$id = $this->uri->segment(3);

				// $this->Adminmodel->Deletehomedeals($id);


// =============================

					$homecat = $this->db->get_where('home_page_deals' ,array('id'=> $id))->row();
					
					$homecatname = $homecat->flag_code;
					
					$exsit = $this->db->get_where('product_detail' ,array('flag'=> $homecatname))->row();
					
				
				if(empty($exsit)){
				    
                	$this->Adminmodel->Deletehomedeals($id);

				}else{
				       $this->session->set_flashdata('msg' , 'Category Not Deleted') ;
			       
				} 
// ===========================
				redirect('Admin/Listhome_deals');

			}


	
			function dealsproduct_position(){
					is_admin();

					  	$id =$_POST['id'];
					  	$type =$_POST['type'];
					$data = array('home_deals_position' => $type ,) ;
		
			    $this->db->where('id', $id);
                $this->db->update('product_detail', $data);
	
				echo "done" ;
    
			}	
			
			
			
				function parent_position(){
					is_admin();

					  	$id =$_POST['id'];
					  	$type =$_POST['type'];
					$data = array('Position' => $type ,) ;
		
			    $this->db->where('id', $id);
                $this->db->update('parent_category', $data);
	
				echo "done" ;
    
			}	
		
				function slider_position(){
					is_admin();

					  	$id =$_POST['id'];
					  	$type =$_POST['type'];
					$data = array('position' => $type ,) ;
					
			
			    $this->db->where('id', $id);
                $this->db->update('slider', $data);
	
				echo "done" ;
    
			}	
			function promotion_position(){
					is_admin();

					  	$id =$_POST['id'];
					  	$type =$_POST['type'];
					$data = array('position' => $type ,) ;
					
			
			    $this->db->where('id', $id);
                $this->db->update('sidebanner', $data);
	
				echo "done" ;
    
			}	
			function cat_position(){
					is_admin();

					  	$id =$_POST['id'];
					  	$type =$_POST['type'];
				    	$data = array('Position' => $type ,) ;
		
        			    $this->db->where('id', $id);
                        $this->db->update('category', $data);
	
				echo "done" ;
    
			}
			function subcat_position(){
					is_admin();

					  	$id =$_POST['id'];
					  	$type =$_POST['type'];
				    	$data = array('Position' => $type ,) ;
		
        			    $this->db->where('id', $id);
                        $this->db->update('sub_category', $data);
	
				echo "done" ;
    
			}	
// ===============================

	
	public function parentcategory(){

				is_admin();
	$check = $this->check_url('homecategory') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				$this->load->view('Admin/parentcategory.php');

			}

			public function Addparentcategory(){

				is_admin();
					$check = $this->check_url_edit('homecategory') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				$id = $_POST['id'] ; 
				
				$result =  $this->db->get_where('parent_category' ,array('id'=> $id))->row();
				
if($result && $id){
    
  $this->session->set_flashdata('msg' , 'Please Added New Parent ID !') ;
			          
}else{
				$data= array(

					'name' => $_POST['parent'],
                    'id' => $_POST['id'],
                     'meta_tag' => $_POST['meta_tag'],
                     'meta_key' => $_POST['meta_key'],
                     'meta_des' => $_POST['meta_des'],
                     'des' => $_POST['desc'],

							);

				$this->Adminmodel->Addparentcategory($data);

}
				redirect('Admin/Listparentcategory');

			}
			
			public function addmaterial(){

				is_admin();
				
					  $check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

				$this->load->view('Admin/addmaterial.php');

			}
			
			public function editmaterial($id){

				is_admin();
	
				$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				$data['result'] =  $this->db->get_where('material' ,array('id'=> $id))->row();
		
				$this->load->view('Admin/editmaterial.php',$data);

			}
			
			public function editcolor($id){

				is_admin();
	            $check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				
				$data['result'] =  $this->db->get_where('color' ,array('id'=> $id))->row();
		
				$this->load->view('Admin/editcolor.php',$data);

			}
			
			public function editdisplay($id){

				is_admin();
	        $check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				
				$data['result'] =  $this->db->get_where('display' ,array('id'=> $id))->row();
		
				$this->load->view('Admin/editdisplay.php',$data);

			}
			
			
	public function addcolor(){

				is_admin();
					  $check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

				$this->load->view('Admin/addcolor.php');

			}

public function insertmaterial(){

				is_admin();
				
					  $check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

				$data= array(

					'name' => $_POST['name'],
                  	'category' => $_POST['category'],
                    
							);
      $this->db->insert('material',$data) ;
 			

				redirect('Admin/addmaterial');

			}
			
public function updatematerial(){

				is_admin();
					  $check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				
$id = $_POST['id'] ;
				$data= array(

					'name' => $_POST['name'],
                  	'category' => $_POST['category'],
                    
							);
							
				$this->db->where('id', $id);
                $this->db->update('material', $data);
	    	  
	    	  
    //   $this->db->insert('material',$data) ;
 			

				redirect('Admin/addmaterial');

			}
			
			
			public function updatedisplay(){

				is_admin();
				
					  $check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				
$id = $_POST['id'] ;
				$data= array(

					'name' => $_POST['name'],
                  	'category' => $_POST['category'],
                    
							);
							
				$this->db->where('id', $id);
                $this->db->update('display', $data);
	    	  
	    	  
 			

				redirect('Admin/adddisplay');

			}

			
			public function updatecolor(){

				is_admin();
					$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				
$id = $_POST['id'] ;
				$data= array(

					'name' => $_POST['name'],
                  	'category' => $_POST['category'],
                    
							);
							
				$this->db->where('id', $id);
                $this->db->update('color', $data);
	    	  
	    	  
    //   $this->db->insert('material',$data) ;
 			

				redirect('Admin/addcolor');

			}

			
			
			public function adddisplay(){

				is_admin();
				
				 $check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

				$this->load->view('Admin/adddisplay.php');

			}

public function insertdisplay(){

				is_admin();
				
					$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

				$data= array(

					'name' => $_POST['name'],
                  	'category' => $_POST['category'],
                    
							);
      $this->db->insert('display',$data) ;
 			

				redirect('Admin/adddisplay');

			}
public function insertcolor(){

				is_admin();
				
					$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

				$data= array(

					'name' => $_POST['name'],
                   	'category' => $_POST['category'],
                    
							);
      $this->db->insert('color',$data) ;
 			

				redirect('Admin/addcolor');

			}

			public function updateparent(){

				is_admin();
					$check = $this->check_url('homecategory') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

               $table='parent_category';

               $where='id';

				$id =$_POST['id'];

				$data= array(
            			'name' =>$_POST['par_name'],
					    'meta_tag' => $_POST['meta_tag'],
                         'meta_key' => $_POST['meta_key'],
                         'meta_des' => $_POST['meta_des'],
                            'des' => $_POST['desc'],

							);

			    $this->Adminmodel->update_common($data,$table,$where,$id);


			   redirect('Admin/Listparentcategory');

			}

			public function Listparentcategory(){

				is_admin();
                
                 $check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
		        
				$data['messagess']=$this->Adminmodel->Listparentcategory();

				$this->load->view('Admin/Listparentcategory.php',$data);

			}

			public function Editparent(){

				is_admin();
				
				$check = $this->check_url_edit('homecategory') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

				$id = $this->uri->segment(3);	

				$data['messagess'] = $this->Adminmodel->Editparent($id);

				//pr($data);die;

				$this->load->view('Admin/editparent.php',$data);

				

			}

			public function Deleteparent(){

				is_admin();
					$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

				 $id = $this->uri->segment(3);
				
				$cat = $this->db->get_where('category' ,array('parent_id'=> $id))->row();
				
				if(empty($cat)){
				    	$this->Adminmodel->deleteparent($id);
	    
				}else{
				       $this->session->set_flashdata('msg' , 'Category Not Deleted! Have Category') ;
			       
				}

				redirect('Admin/Listparentcategory');

			}





			public function subcategory(){

				is_admin();
	$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

				$data['messages']=$this->Adminmodel->Listcategory();



				$this->load->view('Admin/Addsubcategory.php',$data);

			}

			public function Addsubcategory(){

				is_admin();
					$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
						 $id=$_POST['parent_id'];
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
				
					
				$id = $_POST['id'] ; 
				
				$result =  $this->db->get_where('sub_category' ,array('id'=> $id))->row();
				
if($result){
    
  $this->session->set_flashdata('msg' , 'Please Added New sub category ID!') ;
			          
}else{
				$data= array(
					'id'=>$_POST['id'],
					'cat_id' => $_POST['cat'],
                	'parent_id' => $_POST['parent_id'],

					'subcategory_name' => $_POST['name'],
					
					  'meta_tag' => $_POST['meta_tag'],
                         'meta_key' => $_POST['meta_key'],
                         'meta_des' => $_POST['meta_des'],
                        'des' => $_POST['desc'],

					


							);



				$this->Adminmodel->Addsubcategory($data);
}
				$this->Listsubcategory();

			}

			public function Listsubcategory(){

				is_admin();
                $check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				// $data['messages']=$this->Adminmodel->Listsubcategory();
				

				$table='sub_category';   
 
					$this->db->select('*');
         		$this->db->from($table);		
         		$this->db->order_by("Position", "asc");
        		$query = $this->db->get();
        
        			$data['messagess'] = $query->result();
 
				$this->load->view('Admin/Listsubcategory.php',$data);

			}

			public function updatesubcategory(){

				is_admin();
					$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

				//pr($_POST);die;

               $table='sub_category';

               $where='id';

				$id =$_POST['id'];

				$data= array(

						'cat_id' =>$_POST['catid'],

						'subcategory_name' =>$_POST['cname'],

								
					 'meta_tag' => $_POST['meta_tag'],
                     'meta_key' => $_POST['meta_key'],
                     'meta_des' => $_POST['meta_des'],
                        'des' => $_POST['desc'],


							);
							
						

			    $this->Adminmodel->update_common($data,$table,$where,$id);



			  



			    $this->Listsubcategory();

			}

			public function Editsubcategory(){

				is_admin();
					$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				
				  $check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
		        
			    $check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
		        
				$id = $this->uri->segment(3);	

				$data['message1']=$this->Adminmodel->Listcategory();


				

				$data['messages'] = $this->Adminmodel->Editsubcategory($id);

			

				$this->load->view('Admin/editsubcategory.php',$data);

				

			}

			public function deletesubcategory(){

				is_admin();
	$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				$id = $this->uri->segment(3);

				$this->Adminmodel->deletesubcategory($id);

				redirect('Admin/Listsubcategory');

			}

			public function subcategory3(){

				is_admin();

	$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
						
				$id=5;

				$where='parent_id';

				$table='category';

				$data['messages']=$this->Adminmodel->select_com_where($table,$where,$id);



				$this->load->view('Admin/Addsubcategory3.php',$data);

			}

			public function listsubcategory3(){

				is_admin();

	$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
						
				$id=5;

				$where='parent_id';

				$table='category';

				$data['messagess']=$this->Adminmodel->select_com_where($table,$where,$id);



				$this->load->view('Admin/Listcategory3.php',$data);

			}

			public function Addsubcategory3(){

				is_admin();
	$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				$data= array(

					'cat_id' => $_POST['cat'],

					'name' => $_POST['name']


							);



					$table='sub_cat3';
					$this->Adminmodel->insert_common($data,$table);

				$this->Listsubcategory3();

			}
            public function addrms(){

				is_admin();
				
					$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
                // $image4 = $_FILES['file']['name'];

                //  $url = base_url();
                //  $path = $url."assets/sidebanner/".$image4;
                // move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/sidebanner/".$image4);
                
                
				$data= array(

					'rm_name' => $_POST['name'],
                    'rm_email' => $_POST['email'],
                    'rm_mobile' => $_POST['mobile'],
                    'rm_password' => $_POST['password'],
					'rm_file' => $path
                	);
                	
                	//==========================upload img==========
    	
    	 $path1=  base_url().'assets/images/';
    	 
    			if(!empty($_FILES["images"]))
        {
            $upload_image1=$_FILES["images"]["name"];
            $upload1 = move_uploaded_file($_FILES["visting"]["tmp_name"], "./assets/images/".$upload_image1);
            if($upload1){
                $data['rm_file'] = $path1.$upload_image1;
            }
        }
        
        
                	$table='rm';
					$this->Adminmodel->insert_common($data,$table);

				$this->rmlist();
				
				
               // $this->load->view('Admin/rmlist.php');
			}

			public function Listgiftproduct(){

				is_admin();
	$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
			
					$table='giftproduct';
				$data['messages']=$this->Adminmodel->select_com($table);

				$this->load->view('Admin/Listgiftproduct.php',$data);

			}


			public function updatesubcategory3(){

				is_admin();
				
					$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

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

				is_admin();
				
					$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

				$id = $this->uri->segment(3);	
			
				$where='id';
				$table='sub_cat3';

				$data['messages'] = $this->Adminmodel->select_common_where($table,$where,$id);

				//pr($data);die;

				$this->load->view('Admin/editsubcategory3.php',$data);

				

			}

			public function deletesubcategory3(){

				is_admin();
	$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
			
			$id = $this->uri->segment(3);
				$table='sub_cat3';
				$where='id';
				$this->Model->delete_common($table,$where,$id);

				redirect('Admin/Listsubcategory3');

			}



			public function listpincode(){

				is_admin();
						  $check = $this->check_url('cms') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				
				$table='pincode';
				$data['messages']=$this->Adminmodel->select_common($table);
				$this->load->view('Admin/listpincode.php',$data);

			}


			public function updatepincode(){

				is_admin();
	$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
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

				is_admin();
					$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

				$id = $this->uri->segment(3);	
				$where='id';
				$table='pincode';

				$data['messages'] = $this->Adminmodel->select_common_where($table,$where,$id);

				//pr($data);die;

				$this->load->view('Admin/Editpincode.php',$data);

				

			}
			public function pincode(){
				is_admin();
					$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
					$this->load->view('Admin/pincode.php');
			}
			public function addpincode(){

				is_admin();
					$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				$data = array(
								'pincodecat' =>$_POST['type'],
								'post_office' =>$_POST['post_office'],
								'area' =>$_POST['area'],
								'state' =>$_POST['state'],
								'name' =>$_POST['catname']
							 );
					$table='pincode';
					$this->Model->insert_common($table,$data);
					redirect('Admin/listpincode');

			}

			public function deletepincode(){

				is_admin();

    	$check = $this->check_url('Admin') ;
    				if($check != 'done'){
    			    
    			    	redirect('Admin');
    		        }
				$id = $this->uri->segment(3);
				$table='pincode';
				$where='id';
				$this->Model->delete_common($table,$where,$id);

				redirect('Admin/listpincode');

			}

			
				public function listdiscountslab(){

				is_admin();
				
					$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
		        
				$table='discountslab';
				$data['messages']=$this->Adminmodel->select_common($table);
				$this->load->view('Admin/listdiscountslab.php',$data);

			}


			public function updatediscountslab(){

				is_admin();
					$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

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

				is_admin();
					$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

				$id = $this->uri->segment(3);	
				$where='id';
				$table='discountslab';

				$data['messages'] = $this->Adminmodel->select_common_where($table,$where,$id);

				//pr($data);die;

				$this->load->view('Admin/Editdiscountslab.php',$data);

				

			}
			public function discountslab(){
is_admin();
	$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
					$this->load->view('Admin/discountslab.php');
			}
			public function adddiscountslab(){
			is_admin();
				$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
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
					redirect('Admin/listdiscountslab');

			}

			public function deletediscountslab(){

				is_admin();
					$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

				$id = $this->uri->segment(3);
				$table='discountslab';
				$where='id';
				$this->Model->delete_common($table,$where,$id);

				redirect('Admin/listdiscountslab');

			}

			
public function listimage(){
                is_admin();
                
                
                 $check = $this->check_url('BulkImage') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
		        
					$this->load->view('Admin/listimage.php');
			}
			public function unlinkimage(){
			is_admin();
			
				$check = $this->check_url('BulkImage') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				$id=$this->uri->segment(3);
				
				$path = "assets/product/".$id;
				
				unlink($path);
				redirect('Admin/listimage');
			}
			public function uploadbulkimage(){
is_admin();
	$check = 	$this->check_url('BulkImage') ;
        			if($check != 'done'){
        			    	redirect('Admin');
        			    }
					$this->load->view('Admin/uploadimage.php');
			}
			public function addimage(){
			is_admin();
			
			$check = $this->check_url('BulkImage') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
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
              
                // =====================================  
                  
                  
                  
                // ==================================  
              }
            }
          
             
    }
			redirect('Admin/listimage');

			}
			public function inventory(){

				is_admin();
				
				$check = $this->check_url('Inventory') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
			
			$check = 	$this->check_url('Inventory') ;
			
		
			if($check != 'done'){
			    
			    	redirect('Admin');
		
			}

				// $table='product';
				// $data['messages']=$this->Adminmodel->select_com($table);

				// $table='product_detail';
				// $data['product_detail']=$this->Adminmodel->select_com($table);

				$table='category';
				$data['parent_category']=$this->Adminmodel->select_com($table);
				$data['current_uri'] = $this->uri->segment(2);
				
				
				// =================================================
				// ===========================================================

    	$config['base_url']=base_url('Admin/inventory');
		$config['per_page']=50;
		//$config['uri_segment']  = 2;
		$config['total_rows']=$this->Model->num_rows_productlist();
		//pr($config['total_rows']);die;
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tag_close']  = '</span></li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tag_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tag_close']  = '</span></li>';
		$this->pagination->initialize($config);
		$data['product_detail']=$this->Model->productlist($config['per_page'],$this->uri->segment(3));
		
	
// print_r(	$data['messages']) ; 


// exit ; 
// ==================================================================
				
				
				// ===========================================================
				$this->load->view('Admin/inventory',$data);					

			}

			public function outofstock(){

				is_admin();
	$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
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
				$this->load->view('Admin/inventory',$data);					

			}
			public function lowstock(){

				is_admin();

						$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				
			

				$data['messages'] = $this->Model->product();

				$data['product_detail'] = $this->Model->varient();
					$table='parent_category';
				$data['parent_category']=$this->Adminmodel->select_com($table);

				$data['current_uri'] = $this->uri->segment(2);
				$this->load->view('Admin/inventory',$data);					

			}
			public function invent_categories(){

				is_admin();
            
            	$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
                $inventory_type = $this->input->post('inventory_type') ;
                
				$catid =$_POST['cat'];	
				$subcatid =$_POST['cat_id'];	
				$where='category_id';
				$table='product_detail';
				
					$this->db->select('*'); 
						if($inventory_type =="Hightolow"){
     	  $this->db->order_by("availability", "desc");
     		}
                           if($subcatid !='please choose'){
                             $this->db->like('sub_catid', $subcatid); 
                             
                            }elseif($catid !='please choose'){
                                
                             $this->db->like('category_id', $catid); 
                               
                            }
                            
                	       // $this->db->where('status', 1); 
                	        $this->db->from('product_detail');
                             $query = $this->db->get();

				$data['product_detail'] = $query->result_array();
				
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
				
				$data['filter_apply'] = 'Yes' ; 
				$data['subcatid'] = $subcatid ; 
				$this->load->view('Admin/inventory',$data);					

			}
	public function price_categories(){

				is_admin();
				
					$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
            
    //             $inventory_type = $this->input->post('inventory_type') ;
                
				// $id =$_POST['cat'];	
				// $where='category_id';
				// $table='product_detail';

				// $data['product_detail'] = $this->Adminmodel->select_inventory_where($table,$where,$id ,$inventory_type);
				
				// =======================
					$check = 	$this->check_url('BulkPrice') ;
        			if($check != 'done'){
        			    	redirect('Admin');
        			    }
        			    
				  $inventory_type = $this->input->post('inventory_type') ;
                
				$catid =$_POST['cat'];	
				$subcatid =$_POST['cat_id'];	
				$where='category_id';
				$table='product_detail';
				
					$this->db->select('*'); 
						if($inventory_type =="Hightolow"){
     	  $this->db->order_by("availability", "desc");
     		}
                           if($subcatid !='please choose'){
                             $this->db->like('sub_catid', $subcatid); 
                             
                            }elseif($catid !='please choose'){
                                
                             $this->db->like('category_id', $catid); 
                               
                            }
                            
                	       // $this->db->where('status', 1); 
                	        $this->db->from('product_detail');
                             $query = $this->db->get();

				$data['product_detail'] = $query->result_array();
				// ==============================
			    $data['inventory_type'] = $inventory_type ;
				
				foreach ($data['product_detail'] as  $value) {
						$id = $value['sku_code'];	
				$where='parent_skucode';
				$table='product';
            	$data['subcatid'] = $subcatid ; 
			
				$data['messages'] = $this->Adminmodel->select_common_where($table,$where,$id);

				}
	
				$table='category';
				$data['parent_category']=$this->Adminmodel->select_com($table);

				$data['current_uri'] = $_POST['cat'];
				$this->load->view('Admin/priceinvent.php',$data);				

			}

			public function quantityupdate(){

				is_admin();
	$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				
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
	    	    
			       $this->session->set_flashdata('msg' , 'Qty updated!') ;
			       
			 
				}else{
				    $table='product';   
					    $where='sku_code';
					
			    $this->db->where('sku_code', $id);
                $this->db->update('product', $data);
	    	   
				    
			 //   $this->Adminmodel->update_common($data,$table,$where,$id);
			
				    
				}
				
				echo "Qty updated" ;
	
             

			}
			
			public function low_alertupdate(){

				is_admin();

					$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
					  //  $table='order_detail';
					  	$id =$_POST['id'];
					 
						$data= array(

				// 			'newquantity' =>$_POST['type'],
				
			    		'low_alert' =>$_POST['type'],

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
				
				echo "Low Alert updated" ;
	
             

			}
			public  function approverequest()
			{
				is_admin();
					$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
		        
					    $table='orders';
					    $where='order_id';
						$id =$this->uri->segment(3);
						$data= array(

							'request_accept' =>'1',

							);

			    $this->Adminmodel->update_common($data,$table,$where,$id);
			    redirect('Admin/requestdetail/'.$id);
			}
				public function availupdate(){

				is_admin();
					$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

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
             
echo 'Inventory Updated !' ;
			}
	public function availqtyupdate(){

				is_admin();
					$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

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

				is_admin();

	$check = $this->check_url('BulkPrice') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
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
             	echo "Price updated" ;

			}
			
			
			
			public function category_update(){

				is_admin();
	$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
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

							'category_id' =>$_POST['type'],

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

				is_admin();
	$check = $this->check_url('BulkPrice') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
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
             echo 'Price Update !'; 

			}
			 public function invenreport(){

				is_admin();
	$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
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

				is_admin();
				
					$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

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

				is_admin();
				
					$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

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

				is_admin();

	$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
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

				is_admin();
	$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
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

				is_admin();
	$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
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

				is_admin();
	$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
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

				is_admin();
	$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
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
				is_admin();
					$check = $this->check_url('ListProduct') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				$this->load->view('Admin/uploadexcel.php');
			}
	public function updateproductinvent(){
				is_admin();
						$check = 	$this->check_url_edit('Inventory') ;
        			if($check != 'done'){
        			    	redirect('Admin');
        			    }
				$this->load->view('Admin/uploadexcel.php');
			}
public function updatepro($id){

is_admin();
	$check = $this->check_url_edit('ListProduct') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
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
                //   'min_order_quan'=>$filesop[2],
                  'availability'=>$filesop[2],
                  
                 );
                 
                $id = trim($filesop[1]);
              
            
                $where='sku_code';
                $table='product_detail';
        
      
           $this->Adminmodel->update_common($data1,$table,$where,$id);
        
          }
            
             $i ++ ;
             
         } // end while 
         
        
        redirect('Admin/inventory');
        
          
            
    
}

public function updatevarpro($id){

is_admin();
	$check = $this->check_url_edit('ListProduct') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

	$check = 	$this->check_url_edit('ListProduct') ;
        			if($check != 'done'){
        			    	redirect('Admin');
        			    }
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

redirect('Admin/inventory');

 

			}




			public function updatepricevarproduct(){
			is_admin();
				$check = $this->check_url('ListProduct') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				$this->load->view('Admin/uploadexcel.php');
			}
	public function updatepriceproduct(){
			is_admin();
				$check = $this->check_url('ListProduct') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				$this->load->view('Admin/uploadexcel.php');
			}


			public function updatepriceproductcsv($id){
				is_admin();
					$check = $this->check_url('ListProduct') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				$where='id';

				$table='excelsheet';

				$data=$this->Adminmodel->select_com_where($table,$where,$id);

        $handle = fopen("assets/excelsheet/".$data[0]['sheetname'], "r");

        $c = 0;

$firstline =true;

$i =1 ;

       while(($filesop = fgetcsv($handle, 100000, ",")) !== false)

 {

 	 
if($i != 1 && !empty($filesop[0])){

 	$data1= array();

if($filesop[1]){
    
    $data1['category_id']= $filesop[1] ;
    
    	 $sku = $filesop[0];

            $this->db->where('product_sku',$sku);
 	    	$this->db->delete('position_product');

 	$category =	$filesop[1] ;
 	$cat =	explode(",",$category);
    
       foreach($cat as $catt){
 			    
 			    $position_cat = array(
 			        
 			        'product_sku' => $sku, 
 			        
 			        'category' =>$catt,
 			        
 			        );
 			        
 			        
 			        $this->db->insert('position_product',$position_cat) ;
 			    
 			    }
 			    
}
if($filesop[2]){
    
    $data1['price']= $filesop[2] ;
}
if($filesop[3]){
    
    $data1['selling_price']= $filesop[3] ;
}
if($filesop[4]){
    
    $data1['availability']= $filesop[4] ;
}
if($filesop[5]){
    
    $data1['min_order_quan']= $filesop[5] ;
}
if($filesop[6]){
    
    $data1['low_alert']= $filesop[6] ;
}
	
	
	$id = $filesop[0];	
				$where='sku_code';
				$table='product_detail';

	 $this->Adminmodel->update_common($data1,$table,$where,$id);
}

 
$i++;
}
    $firstline = false;

// 	print_r($data1);
// 	exit ;

redirect('Admin/price');

 

			}
			
				public function product_management_upload($id){


// =====================================================


is_admin();

	$check = $this->check_url('product_management') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

$where='id';

				$table='excelsheet';

				$data=$this->Adminmodel->select_com_where($table,$where,$id);
//pr($_FILES);die;



$firstline = true;
        $handle = fopen("assets/excelsheet/".$data[0]['sheetname'], "r");

        $c = 0;
$i= 1 ; 
        while(($filesop = fgetcsv($handle, 100000, ",")) !== false)

 {


 	if ($i != 1 && !$firstline) {

        
         	$data= array(
         
               'category_position'=>$filesop[2], 
         );




					$id = $filesop[0];
					$cat = $filesop[1];
			
				
				// $where='sku_code';
				// $table='product_detail';
// 	 $this->Adminmodel->update_common($data,$table,$where,$id);

                $this->db->where(array('product_sku'=> $id , 'category' => $cat));
                $this->db->update('position_product', $data);



 }
 
  $firstline = false;
 $i++;
    
}


redirect('Admin/productmanagment');

 

			


// ========================================
 

			}



public function updatepricevarproductcsv($id){
is_admin();


$where='id';

				$table='excelsheet';

				$data=$this->Adminmodel->select_com_where($table,$where,$id);
//pr($_FILES);die;



$firstline = true;
        $handle = fopen("assets/excelsheet/".$data[0]['sheetname'], "r");

        $c = 0;
$i= 1 ; 
        while(($filesop = fgetcsv($handle, 100000, ",")) !== false)

 {

 	if ($i != 1 && !$firstline) {
if(!empty($filesop[1])){

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

redirect('Admin/price');

 

			}


	 public function downloadprocsv(){

				is_admin();
	$table='product_detail';
	$datas=$this->Adminmodel->select_com($table);
	foreach ($datas as  $value) {

$data[]=array(
  'sku_code' => $value['sku_code'],
  'relation' => $value['relation'],
  'varient' => $value['varient'],
  'parent_skucode' => $value['parent_sku'],
  'categoryid' => $value['category_id'],
  'parent_category'=> $value['parent_cat'],
  'sub_category'=> $value['sub_catid'],
  'product_name'=> $value['pro_name'],
  'RETAIL_PRICE' => $value['price'],
  'WHOLESALE_PRICE' => $value['selling_price'],
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
  'size'=>$value['size'], 
  'weight'=>$value['weight'],
  'color'=>$value['color'],
  'material' => $value['material'],
  'other' => $value['other'],
  'box_volume_weight' => $value['box_volume_weight'],
  'Low Alert' => $value['low_alert'],
  'min_order_quan'=>$value['min_order_quan'],
 'availability'=>$value['availability'],
'hsn_code'=>$value['hsn_code'],
 'gst_per' => $value['gst_per'],
 'meta_title'=>$value['meta_title'],
  'meta_keyword'=>$value['meta_keyword'],
  'meta_description' =>$value['meta_description'],
 'occasion' =>$value['occasion'],

'billing_name' =>$value['billing_name'],
'new_arrivel' =>$value['new_arrivel'],
'size_filter' =>$value['size_filter'],
'product_status' =>$value['status'],


//   'highlights1'=>$value['highlights1'],
//   'highlights2' => $value['highlights2'],
//   'highlights3' => $value['highlights3'],
//   'gst' => $value['gst'],
//   'cancel_pro'	=>$value['cancel_pro'],
//   'recipient' =>$value['recipient'],
//   'discount_code'=> $value['discount_code'],  
//   'pincode_local'=> $value['pincode_local'],
//   'pincode_metro'=> $value['pincode_metro'],
//   'pincode_other' => $value['pincode_other'],



);
}

	
 $filename = 'pdo_'.date('Ymd').'.csv'; 
   header("Content-Description: File Transfer"); 
   header("Content-Disposition: attachment; filename=$filename"); 
   header("Content-Type: application/csv; ");





   // get data 
  

   // file creation 
   $file = fopen('php://output', 'w');
 $header = array("sku_code","relation","varient","parent_skucode","categoryid","parent category","sub category","product name","RETAIL PRICE","WHOLESALE PRICE","main_image1","main_image2","main_image3","main_image4","main_image5","description","bullet1","bullet2","bullet3","bullet4","bullet5","size","weight","color","material","Other","box_volume_weight","Low Alert","min_order_quan","availability","HSN CODE","gst_per","meta_title","meta_keyword","meta_description","occasion","billing_name","new_arrivel","size_filter","product_status"); 

  // $header = array("Sku Code","Product Name","Minimum Quantity","Availability  "); 
   fputcsv($file,$header);

   foreach ($data as $key=>$line){ 
     fputcsv($file,$line); 
   }
   fclose($file); 
   
 }
public function updateprocsv(){
			is_admin();
				$check = 	$this->check_url_edit('ListProduct') ;
        			if($check != 'done'){
        			    	redirect('Admin');
        			    }
				$this->load->view('Admin/uploadexcel.php');
			}
			
public function Upload_productmanagent(){
			is_admin();
				$check = 	$this->check_url_upload('product_management') ;
        			if($check != 'done'){
        			    	redirect('Admin');
        			    }
				$this->load->view('Admin/uploadexcel.php');
			}
			
			
public function updateproductcsv($id){
    
    
is_admin();
	$check = 	$this->check_url_edit('ListProduct') ;
        			if($check != 'done'){
        			    	redirect('Admin');
        			    }
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

			   

			    $url = base_url();
    			$path = $filesop[10];
			    $path1 = $filesop[11];
			    $path2 = $filesop[12];
			    $path3 = $filesop[13];
			    $path4 = $filesop[14];
			    
            	  date_default_timezone_set('Asia/Kolkata');
                $currentTime = date( 'Y-m-d');
    
                if(empty($filesop[3])){
                    
                    $pat_cat = trim($filesop[3]) ;
                }else{
                    
                   $pat_cat  = trim($filesop[0]) ; 
                }
                
             	$data_update= array(

//   'sku_code' => trim($filesop[0]),
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
  'pincode_local'=> 'local' ,    
  'pincode_metro'=>  'metro' ,  
  'pincode_other' =>  'other' ,
   'main_image1' => $path,
  'main_image2'=>$filesop[11],
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
  
    'billing_name'=>$filesop[36],
              'new_arrivel'=>$filesop[37],
              'size_filter'=>$filesop[38],
           'status'=>$filesop[39],
  'date' => $currentTime ,
  
//   'recipient'=>$filesop[42]



 );
 
 

		 	$id = trim($filesop[0]);	

                 $this->db->where('sku_code', $id);
                $this->db->update('product_detail', $data_update);


// =======Category========================


            $this->db->where('product_sku',$id);
 	    	$this->db->delete('position_product');

	
$par_cat = 	explode(",",$filesop[5]) ;
 			    
 			    foreach($par_cat as $pcat){
 			    
 			    $position_parent = array(
 			        
 			        'product_sku' => $filesop[0], 
 			        
 			        'parent_category' =>$pcat,
 			        
 			        );
 			        
 			        
 			        $this->db->insert('position_product',$position_parent) ;
 			    
 			    }
 			    
 			    
 			    $cat = 	explode(",", $filesop[4]) ;
 
 
 			    foreach($cat as $catt){
 			    
 			    $position_cat = array(
 			        
 			        'product_sku' => $filesop[0], 
 			        
 			        'category' =>$catt,
 			        
 			        );
 			        
 			        
 			        $this->db->insert('position_product',$position_cat) ;
 			    
 			    }
 			    
 			        $sub_cat = 	explode(",", $filesop[6]) ;
 
 if($sub_cat){
 			      foreach($sub_cat as $sub){
 			    
 			    $position_cat = array(
 			         
 			        'product_sku' => $filesop[0] , 
 			        
 			        'sub_cat' =>$sub,
 			        
 			        );
 			        
 			//         print_r($position_cat);
 			//   echo $sub ;
 			   
 			        $this->db->insert('position_product',$position_cat) ;
 			    
 			    }
 			    
 }


// ===================================================
  }
    
     $i ++ ;
     
 } // end while 

redirect('Admin/ListProduct');

    
    
}
			 public function downloadvprocsv(){

				is_admin();

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
		is_admin();
				$check = 	$this->check_url_edit('ListProduct') ;
        			if($check != 'done'){
        			    	redirect('Admin');
        			    }
		$data['url']=$this->uri->segment(3);
				$this->load->view('Admin/uploadexcel.php',$data);
			}
public function updatevproductcsv($id){
is_admin();

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

redirect('Admin/variant/'.$this->uri->segment(3));

 

			}

			public function protype(){
is_admin();
				$where='id';

				$id=$_POST['id'];

				$table='product_details';

				$data= array(

					'page_id' => $_POST['type']

							);

				$this->Adminmodel->update_common($data,$table,$where,$id);

			}
			public function flag(){
is_admin();
	$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
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
		   is_admin();
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
            is_admin();
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
            is_admin();
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
            is_admin();
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
                is_admin();
                
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
				is_admin();
					  $check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
		        
				$this->load->view('Admin/excel1.php');

			}

		
			public function stocks()
			{

				is_admin();
				//echo "dsasadasd";die;
				 $data['messages']=$this->Adminmodel->stockdetail();
//pr($data);die;
				$this->load->view('Admin/stock.php',$data);

			}
			public function rating()
			{

				is_admin();
				$table='rating';

				$data['messages']=$this->Adminmodel->select_com($table);
//pr($data);die;
				$this->load->view('Admin/rating.php',$data);

			}
			public function active()
	{
			is_admin();
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
		is_admin();
		
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
     $this->load->view('Admin/order.php',$data);

   
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
                 
     $this->load->view('Admin/orderprocess.php',$data);
    
}
public function newsletter()
			{

				is_admin();
				//echo "dsasadasd";die;
				 $data['messages']=$this->Adminmodel->newspapers();
//pr($data);die;
				$this->load->view('Admin/newspaper.php',$data);

			}
		
		
			public function addship(){

				is_admin();

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
                  redirect('Admin/orders');

			}

			public function contactus(){

				is_admin();
				
					 $check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

				$table='contact_list';

				$data['contact']=$this->Adminmodel->select_com($table);
				$this->load->view('Admin/contact.php',$data);

			}
			
		public function add_contact(){

				is_admin();
$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				$data= array(

					'phone' => $_POST['phone'],
					
					'email' => $_POST['email'],
					
					'address' => $_POST['address'],
					
					'mailing' => $_POST['mailing'],
					'content' => $_POST['content'],
					
				
							);

                // $this->db->insert('contact' , $data) ;

                    $this->db->where('id',1 );
                    $this->db->update('contact', $data);
			
				redirect('Admin/contact');

			}
			
	public function add_mail(){

				is_admin();
$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				$data= array(

					'send_mail' => $_POST['mailing'],
					
					'admin_mail' => $_POST['email'],
					
					'mobile' => $_POST['phone'],
					
						'show_contact' => $_POST['show_contact'],
					
						'name' => $_POST['name'],
					
					
				
							);

                // $this->db->insert('contact' , $data) ;

                    $this->db->where('id',1 );
                    $this->db->update('admin_mail', $data);
			
				redirect('Admin/sendmail');

			}
			public function bulkenquiry()
			{

				is_admin();
				$table='bulkenquiry';
				$data['bulk']=$this->Adminmodel->select_com($table);
				$this->load->view('Admin/bulk.php',$data);

			}
			public function banner()
			{

				is_admin();
				$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				$table='banner';

				$data['banner']=$this->Adminmodel->select_com($table);
				$this->load->view('Admin/banner.php',$data);

			}
			public function upload_banner(){
				is_admin();
				$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

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

				redirect('Admin/banner');
			
			}

	public function category2(){

				is_admin();

				$data['pcat']=$this->Adminmodel->Listparentcategory2();

				$this->load->view('Admin/Addcategory2.php',$data);

			}

			public function Addcategory2(){

				is_admin();
				
				

				$data= array(

					'name' => $_POST['name'],
					'parent_id' => $_POST['pcat']

							);

				$this->Adminmodel->Addcategory2($data);

				$this->Listcategory2();

			}
			public function Addcategory3(){

				is_admin();

				$data= array(

					'name' => $_POST['name'],
					'parent_id' => '5'

							);

				
		$table='category';
					$this->Model->insert_common($table,$data);

				$this->Listcategory3();

			}
			public function Listcategory2(){

				is_admin();

				$data['messagess']=$this->Adminmodel->Listcategory2();

				$this->load->view('Admin/Listcategory2.php',$data);

			}

			public function updatecategory2(){

				is_admin();

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

				is_admin();

				$id = $this->uri->segment(3);	

					$check = 	$this->check_url('Admin') ;
        			if($check != 'done'){
        			    	redirect('Admin');
        			    }
				

				$data['messagess'] = $this->Adminmodel->Editcategory2($id);

				//pr($data);die;

				$this->load->view('Admin/editcategory2.php',$data);

				

			}

			public function deletecategory2(){

				is_admin();

				$id = $this->uri->segment(3);
				
				
					$cat = $this->db->get_where('sub_category' ,array('cat_id'=> $id))->row();
				
				if($cat){
    				$this->Adminmodel->deletecategory2($id);

				}else{
				       $this->session->set_flashdata('msg' , 'Category Not Deleted!') ;
			       
				}


				redirect('Admin/Listcategory');

			}

				public function parentcategory2(){

				is_admin();

				$this->load->view('Admin/parentcategory2.php');

			}

			public function Addparentcategory2(){

				is_admin();

				$data= array(

					'name' => $_POST['parent']

							);

				$this->Adminmodel->Addparentcategory2($data);

				redirect('Admin/Listparentcategory');

			}

			public function updateparent2(){

				is_admin();

               $table='parent_category2';

               $where='id';

				$id =$_POST['id'];

				$data= array(

						

						'name' =>$_POST['par_name']

						

							);

			    $this->Adminmodel->update_common($data,$table,$where,$id);



			  



			   redirect('Admin/Listparentcategory');

			}

			public function Listparentcategory2(){

				is_admin();

				$data['messagess']=$this->Adminmodel->Listparentcategory2();

				$this->load->view('Admin/Listparentcategory2.php',$data);

			}

			public function Editparent2(){

				is_admin();

				$id = $this->uri->segment(3);	

				

				

				

				$data['messagess'] = $this->Adminmodel->Editparent2($id);

				//pr($data);die;

				$this->load->view('Admin/editparent2.php',$data);

				

			}

			public function Deleteparent2(){

				is_admin();

				$id = $this->uri->segment(3);
				
				$cat = $this->db->get_where('category' ,array('parent_id'=> $id))->row();
				
				if($cat){
				    	$this->Adminmodel->deleteparent2($id);
	    
				}else{
				       $this->session->set_flashdata('msg' , 'Category Not Deleted!') ;
			       
				}

				redirect('Admin/Listparentcategory');

			}





			public function subcategory2(){

				is_admin();


				$data['messages']=$this->Adminmodel->Listcategory2();



				$this->load->view('Admin/Addsubcategory2.php',$data);

			}

			public function Addsubcategory2(){

				is_admin();

				$data= array(

					'cat_id' => $_POST['cat'],

					'subcategory_name' => $_POST['name']


							);



				$this->Adminmodel->Addsubcategory2($data);

				$this->Listsubcategory2();

			}

			public function Listsubcategory2(){

				is_admin();

				$data['messages']=$this->Adminmodel->Listsubcategory2();

				$this->load->view('Admin/Listsubcategory2.php',$data);

			}

			public function updatesubcategory2(){

				is_admin();

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

				is_admin();

				$id = $this->uri->segment(3);	

				$data['message1']=$this->Adminmodel->Listcategory2();


				

				$data['messages'] = $this->Adminmodel->Editsubcategory2($id);

				//pr($data);die;

				$this->load->view('Admin/editsubcategory2.php',$data);

				

			}

			public function deletesubcategory2(){

				is_admin();

				$id = $this->uri->segment(3);

				$this->Adminmodel->deletesubcategory2($id);

				redirect('Admin/Listsubcategory2');

			}

			public function listcoupon(){

				is_admin();
				$table='coupon';
				$data['messages']=$this->Adminmodel->select_common($table);
				$this->load->view('Admin/listcoupon.php',$data);

			}


			public function updatecoupon(){

				is_admin();

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

				is_admin();

				$id = $this->uri->segment(3);	
				$where='id';
				$table='coupon';

				$data['messages'] = $this->Adminmodel->select_common_where($table,$where,$id);

				//pr($data);die;

				$this->load->view('Admin/Editcoupon.php',$data);

				

			}
			public function coupon(){
				is_admin();
					$this->load->view('Admin/coupon.php');
			}
			public function addcoupon(){
			is_admin();
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
					redirect('Admin/listcoupon');

			}

			public function deletecoupon(){

				is_admin();

				$id = $this->uri->segment(3);
				$table='coupon';
				$where='id';
				$this->Model->delete_common($table,$where,$id);

				redirect('Admin/listcoupon');

			}
						public function deleterm(){

				is_admin();

				$id = $this->uri->segment(3);
				$table='rm';
				$where='id';
				$this->Model->delete_common($table,$where,$id);

				redirect('Admin/rmlist');

			}
			public function review(){
				is_admin();
				
					  $check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				$table='user_review';
				$data['messages']=$this->Adminmodel->select_common($table);
				$this->load->view('Admin/listreview.php',$data);
			}
			
			public function reviewstatus(){
				is_admin();
				$where='id';

				$id=$_POST['id'];

				$table='user_review';

				$data= array(

					'status' => $_POST['type']

							);

				$this->Adminmodel->update_common($data,$table,$where,$id);

			}
				public function deletereview(){

				is_admin();

				$id = $this->uri->segment(3);
				$table='user_review';
				$where='id';
				$this->Model->delete_common($table,$where,$id);

				redirect('Admin/review');

			}
			public function occasions(){
				is_admin();
				$table='occasion';
				$data['messages']=$this->Adminmodel->select_common($table);
				$this->load->view('Admin/Listoccasion.php',$data);
			}
			public function addoccasion(){
				is_admin();
				$this->load->view('Admin/Addoccasion.php');
			}
				public function newoccasion(){
				is_admin();
				$data = array(
								'name' =>$_POST['name']
							 );
					$table='occasion';
					$this->Model->insert_common($table,$data);
					redirect('Admin/occasions');

			}

			public function Editoccasion(){

				is_admin();

				$id = $this->uri->segment(3);	
				$where='id';
				$table='occasion';

				$data['messages'] = $this->Model->select_common_where($table,$where,$id);

				//pr($data);die;

				$this->load->view('Admin/editoccasion.php',$data);
			}
					public function updateoccasion(){
						is_admin();
				$where='id';

				$id=$_POST['id'];

				$table='occasion';

				$data= array(

					'name' => $_POST['cname']

							);

				$this->Adminmodel->update_common($data,$table,$where,$id);
				redirect('Admin/occasions');

			}
			public function deleteoccasion(){

				is_admin();

				$id = $this->uri->segment(3);
				$table='occasion';
				$where='id';
				$this->Model->delete_common($table,$where,$id);

				redirect('Admin/occasions');

			}
			public function themes(){
				is_admin();
				$table='theme';
				$data['messages']=$this->Model->select_common($table);
				$this->load->view('Admin/Listthemes.php',$data);
			}
			public function addthemes(){
					is_admin();
					$id ='5';	
				$where='parent_id';
				$table='category';

				$data['category'] = $this->Model->select_common_where($table,$where,$id);
				$table='occasion';
				$data['messages']=$this->Model->select_common($table);
				$this->load->view('Admin/Addthemes.php',$data);
			}
				public function newthemes(){
					is_admin();
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

					redirect('Admin/themes');

			}

			public function Editthemes(){

				is_admin();

				$id = $this->uri->segment(3);	
				$where='id';
				$table='theme';

				$data['messages'] = $this->Model->select_common_where($table,$where,$id);

				//pr($data);die;

				$this->load->view('Admin/editthemes.php',$data);
			}
				public function updatethemes(){
					is_admin();
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

				redirect('Admin/themes');

			}
			public function deletethemes(){

				is_admin();

				$id = $this->uri->segment(3);
				$table='theme';
				$where='id';
				$this->Model->delete_common($table,$where,$id);

				redirect('Admin/themes');

			}
			public function addProductgift(){
			is_admin();
				$id = '5';	
				$where='parent_id';
				$table='category';
				$data['category'] = $this->Model->select_common_where($table,$where,$id);
				
				$table='occasion';
				$data['occasion']=$this->Model->select_common($table);
				$this->load->view('Admin/addProduct.php',$data);
			}
			public function themeselect(){
				is_admin();
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
				
				is_admin();
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
 			

			    redirect('Admin/Listgiftproduct');

			}
			public function updategiftproduct(){
					 	is_admin();
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

			  



			    redirect('Admin/Listgiftproduct');
			}
			public function Editgiftproduct(){

				is_admin();

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

				$this->load->view('Admin/editgiftproduct.php',$data);
			}
				public function deletegiftproduct(){

				is_admin();

				$id = $this->uri->segment(3);
				$table='giftproduct';
				$where='id';
				$this->Model->delete_common($table,$where,$id);

				redirect('Admin/Listgiftproduct');

			}
			
			public function zip(){
			is_admin();
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
				is_admin();
					$check = 	$this->check_url('Admin') ;
        			if($check != 'done'){
        			    	redirect('Admin');
        			    }
				$table='faq';
				$data['messages']=$this->Model->select_common($table);
				$this->load->view('Admin/listfaq.php',$data);
			}
			public function addfaq(){
				is_admin();
				$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				$this->load->view('Admin/Addfaq.php',$data);
			}
			public function Editfaq(){

				is_admin();
				$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

				$id = $this->uri->segment(3);	
				$where='id';
				$table='faq';

				$data['messages'] = $this->Model->select_common_where($table,$where,$id);
				//pr($data);die;

				$this->load->view('Admin/editfaq.php',$data);
			}

			public function newfaq(){
				is_admin();
				$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				$data = array(
								'ques' =>$_POST['ques'],
								'answer' =>$_POST['ans'],
							 );
					$table='faq';
					$this->Model->insert_common($table,$data);

					redirect('Admin/faq');

			}

			
				public function updatefaq(){
					is_admin();
					$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				$where='id';

				$id=$_POST['id'];

				$table='faq';
			
				$data = array(
								'ques' =>$_POST['ques'],
								'answer' =>$_POST['ans'],
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);

				redirect('Admin/faq');

			}
				public function deletefaq(){

				is_admin();
            $check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				$id = $this->uri->segment(3);
				$table='faq';
				$where='id';
				$this->Model->delete_common($table,$where,$id);

				redirect('Admin/faq');

			}
			public function terms(){
				is_admin();
				$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				$id ='1';	
				$where='id';
				$table='cms';

				$data['messages1'] = $this->Model->select_common_where($table,$where,$id);
				$this->load->view('Admin/terms.php',$data);
			}
			public function newterms(){
				is_admin();
				$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
					$where='id';

				$id='1';

				$table='cms';
			
				$data = array(
								'terms' =>$_POST['name']
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);
				
					redirect('Admin/terms');
			}
			public function shipping(){
				is_admin();
				$id ='3';	
				$where='id';
				$table='cms';

				$data['messages1'] = $this->Model->select_common_where($table,$where,$id);
				$this->load->view('Admin/shipping.php',$data);
			}
			public function newshipping(){
				is_admin();
					$where='id';

				$id='3';

				$table='cms';
			
				$data = array(
								'terms' =>$_POST['id']
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);
			}
			public function returns(){
				is_admin();
				$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				$id ='2';	
				$where='id';
				$table='cms';

				$data['messages1'] = $this->Model->select_common_where($table,$where,$id);
				$this->load->view('Admin/return.php',$data);
			}
			public function newreturns(){
				is_admin();
					$where='id';

				$id='2';

				$table='cms';
			
				$data = array(
								'terms' =>$_POST['id']
							 );
							 
							 //================================
							 
							    //=================image =============
                     $file_name ='file';
            
                    $files = $_FILES[$file_name];
            
          
            
                    $file_upload = sizeof($_FILES[$file_name]['tmp_name']);
                    $image = array();
            
                    $multiple = array();
            
                    for ($i=0; $i <$file_upload ; $i++) {
            
            
                        $_FILES[$file_name]['name'] = $files['name'][$i];
                        $_FILES[$file_name]['type'] = $files['type'][$i];
                        $_FILES[$file_name]['tmp_name'] = $files['tmp_name'][$i];
                        $_FILES[$file_name]['error'] = $files['error'][$i];
                        $_FILES[$file_name]['size'] = $files['size'][$i];
            
            
                        $upload_path = FCPATH.'./image/about/' ;
                        $url1 =  array('upload_path' => './image/about/',
                            'allowed_types' => 'jpg|jpeg|png|pdf',
            
                        );
                        $config = array(
                            'upload_path' => $url1['upload_path'],
                            'allowed_types'=> $url1['allowed_types'],
            
                        );
            
                        $this->load->library('upload', $config);
            
                        if (!$this->upload->do_upload($file_name)) {
                            $error = array('error' => $this->upload->display_errors());
                            
                            print_r($error) ;
                        } else {
                            $data =  $this->upload->data();
            
                            // $multiple[$i] =  base_url("images/".$data['file_name']);
            
            // $fileName = $this->upload->data('file_name');
            
             $img = array(
                 'image'=> base_url("image/about/".$data['file_name']),
            
            );
            
            
          
                $this->db->insert('return_policy', $img);
            
                        }
            
                    }
      
							 

				$this->Adminmodel->update_common($data,$table,$where,$id);
			}
			public function newreturn_submit(){
				is_admin();
					$where='id';

				$id='2';

				$table='cms';
			
				$data = array(
								'terms' =>$_POST['id']
							 );
							 
							 	$this->Adminmodel->update_common($data,$table,$where,$id);
		
							// ================================
							 
							    //=================image =============
                     $file_name ='image';
            
                    $files = $_FILES[$file_name];
            
          
           
                    $file_upload = sizeof($_FILES[$file_name]['tmp_name']);
                    $image = array();
            
                    $multiple = array();
            
                    for ($i=0; $i <$file_upload ; $i++) {
            
            
                        $_FILES[$file_name]['name'] = $files['name'][$i];
                        $_FILES[$file_name]['type'] = $files['type'][$i];
                        $_FILES[$file_name]['tmp_name'] = $files['tmp_name'][$i];
                        $_FILES[$file_name]['error'] = $files['error'][$i];
                        $_FILES[$file_name]['size'] = $files['size'][$i];
            
            
                        $upload_path = FCPATH.'./image/about/' ;
                        $url1 =  array('upload_path' => './image/about/',
                            'allowed_types' => 'jpg|jpeg|png|pdf',
            
                        );
                        $config = array(
                            'upload_path' => $url1['upload_path'],
                            'allowed_types'=> $url1['allowed_types'],
            
                        );
            
                        $this->load->library('upload', $config);
            
                        if (!$this->upload->do_upload($file_name)) {
                            $error = array('error' => $this->upload->display_errors());
                            
                            print_r($error) ;
                        } else {
                            $data =  $this->upload->data();
            
                            // $multiple[$i] =  base_url("images/".$data['file_name']);
            
            // $fileName = $this->upload->data('file_name');
            
             $img = array(
                 'image'=> base_url("image/about/".$data['file_name']),
            
            );
           
          
                $this->db->insert('return_policy', $img);
            
                        }
            
                    }
      
					
				redirect('Admin/returns');
			}
			public function about(){
				is_admin();
				
				$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				$id ='5';	
				$where='id';
				$table='cms';

				$data['messages'] = $this->Model->select_common_where($table,$where,$id);
			
				$this->load->view('Admin/about.php',$data);
			}
			public function newabout(){
				is_admin();
					$where='id';

				$id='5';

				$table='cms';

				$data = array(
								'terms' =>$_POST['about']
							 );
							 
						
					$this->Adminmodel->update_common($data,$table,$where,$id);
			
 	     //=================image =============
                     $file_name ='image';
            
                    $files = $_FILES[$file_name];
            
          
            
                    $file_upload = sizeof($_FILES[$file_name]['tmp_name']);
                    $image = array();
            
                    $multiple = array();
            
                    for ($i=0; $i <$file_upload ; $i++) {
            
            
                        $_FILES[$file_name]['name'] = $files['name'][$i];
                        $_FILES[$file_name]['type'] = $files['type'][$i];
                        $_FILES[$file_name]['tmp_name'] = $files['tmp_name'][$i];
                        $_FILES[$file_name]['error'] = $files['error'][$i];
                        $_FILES[$file_name]['size'] = $files['size'][$i];
            
            
                        $upload_path = FCPATH.'./image/about/' ;
                        $url1 =  array('upload_path' => './image/about/',
                            'allowed_types' => 'jpg|jpeg|png|pdf',
            
                        );
                        $config = array(
                            'upload_path' => $url1['upload_path'],
                            'allowed_types'=> $url1['allowed_types'],
            
                        );
            
                        $this->load->library('upload', $config);
            
                        if (!$this->upload->do_upload($file_name)) {
                            $error = array('error' => $this->upload->display_errors());
                            
                            print_r($error) ;
                        } else {
                            $data =  $this->upload->data();
            
                            // $multiple[$i] =  base_url("images/".$data['file_name']);
            
            // $fileName = $this->upload->data('file_name');
            
             $img = array(
                 'image'=> base_url("image/about/".$data['file_name']),
            
            );
            
            
          
                $this->db->insert('about', $img);
            
                        }
            
                    }
                    
                    redirect('Admin/about');

     
       // ===================================

				
				
			}
				public function shoppingguide(){
					is_admin();
					
					$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				$id ='4';	
				$where='id';
				$table='cms';

				$data['messages1'] = $this->Model->select_common_where($table,$where,$id);
				$this->load->view('Admin/guide.php',$data);
			}
			public function newshoppingguide(){
				is_admin();
					$where='id';

				$id='4';

				$table='cms';
			
				$data = array(
								'terms' =>$_POST['id']
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);
				
				     redirect('Admin/shoppingguide');

			}
			public function drag(){
				is_admin();
				$table='studentinfo';
				$data['result']=$this->Adminmodel->select_common($table);
				$this->load->view('Admin/drag.php',$data);
			}
			public function dragtest(){
				is_admin();
				foreach ($_POST["value"] as $key => $value) {
    			$data["Position"]=$key+1;
    			$this->updatePosition($data, $value);
					}
				echo "Sorting Done";
				}

		public  function updatePosition($data,$id){
   		is_admin();
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
			is_admin();
			
			  $check = $this->check_url('BulkPrice') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
		        
			$table='product';
				$data['messages1']=$this->Adminmodel->select_com($table);

				$table='product_detail';
				$data['product_detail']=$this->Adminmodel->select_com($table);

				$table='category';
				$data['parent_category']=$this->Adminmodel->select_com($table);
				
				
				$data['current_uri'] = $this->uri->segment(2);
			$this->load->view('Admin/priceinvent.php',$data);
		}
		public function video(){
				is_admin();
				$table='videos';
				$data['messages1']=$this->Model->select_common($table);
				$this->load->view('Admin/Listvideo.php',$data);
			}
			public function addnewvideo(){
				$this->load->view('Admin/newvideo.php',$data);
			}
			

			public function addvideo(){
				is_admin();
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
					redirect('Admin/video');

			}

			public function Editvideo(){

				is_admin();

				$id = $this->uri->segment(3);	
				$where='id';
				$table='videos';

				$data['messages1'] = $this->Model->select_common_where($table,$where,$id);
				//pr($data);die;

				$this->load->view('Admin/editvideo.php',$data);
			}
				public function updatevideo(){
				is_admin();
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
				redirect('Admin/video');

			}
				public function deletevideo(){

				is_admin();

				$id = $this->uri->segment(3);
				$table='videos';
				$where='id';
				$this->Model->delete_common($table,$where,$id);

				redirect('Admin/video');

			}


			public function Broucher(){
				is_admin();
				$table='Brouchers';
				$data['messages1']=$this->Model->select_common($table);
				$this->load->view('Admin/ListBroucher.php',$data);
			}
			public function addnewBroucher(){
				is_admin();
				$this->load->view('Admin/newBroucher.php',$data);
			}
			

			public function addBroucher(){
				is_admin();
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
					redirect('Admin/Broucher');

			}

			public function EditBroucher(){

				is_admin();

				$id = $this->uri->segment(3);	
				$where='id';
				$table='Brouchers';

				$data['messages1'] = $this->Model->select_common_where($table,$where,$id);
				//pr($data);die;

				$this->load->view('Admin/editBroucher.php',$data);
			}
				public function updateBroucher(){
				is_admin();
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
				redirect('Admin/Broucher');

			}
				public function deleteBroucher(){

				is_admin();

				$id = $this->uri->segment(3);
				$table='Brouchers';
				$where='id';
				$this->Model->delete_common($table,$where,$id);

				redirect('Admin/Broucher');


			}
			/*public function Editteam(){

				is_admin();

				$id = $this->uri->segment(3);	
				$where='id';
				$table='team';

				$data['message'] = $this->Model->select_common_where($table,$where,$id);
				//pr($data);die;

				$this->load->view('Admin/editfaq.php',$data);
			}*/

			public function newteam(){
				is_admin();
				
				//   $image4 = $_FILES['file']['name'];

                //  $url = base_url();
                //  $path = $url."assets/sidebanner/".$image4;
                // move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/sidebanner/".$image4);
                
                
				$data = array(
								'rm_name' =>$_POST['name'],
								'rm_password' =>$_POST['password'],
								'rm_email' =>$_POST['email'],
								'rm_mobile' =>$_POST['mobile'],
								'profile' => $_POST['profile'], 
								// 'rm_file' =>$path ,
								
							 );
							 	//==========================upload img==========
    	
    	 $path1=  base_url().'assets/images/';
    	 
    			if(!empty($_FILES["file"]))
        {
            $upload_image1=$_FILES["file"]["name"];
            $upload1 = move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/images/".$upload_image1);
            if($upload1){
                $data['rm_file'] = $path1.$upload_image1;
            }
        }
        
        
			
					$table='rm';
					$this->Model->insert_common($table,$data);

					redirect('Admin/Previleges');

			}

			
				public function editteam(){
is_admin();
				$where='id';

				$id=$this->uri->segment(3);

				$table='rm';
			
				$data = array(
								'rm_name' =>$_POST['name'],
								'rm_password' =>$_POST['password'],
								'rm_email' =>$_POST['email'],
								'rm_mobile' =>$_POST['mobile'],
								 'profile' => $_POST['profile'], 
								
							 );
							 
						 	//==========================upload img==========
    	
    	 $path1=  base_url().'assets/images/';
    	 
    			if(!empty($_FILES["file"]))
        {
            $upload_image1=$_FILES["file"]["name"];
            $upload1 = move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/images/".$upload_image1);
            if($upload1){
                $data['rm_file'] = $path1.$upload_image1;
            }
        }
        
        
				$this->Adminmodel->update_common($data,$table,$where,$id);

				redirect('Admin/Previleges');

			}
				public function deleteteam(){

				is_admin();

				$id = $this->uri->segment(3);
				
					 $row = $this->db->get_where('customerlogin' ,array('Rm_id'=> $id ))->row();
					if($row){
				$table='rm';
				$where='id';
				$this->Model->delete_common($table,$where,$id);

				redirect('Admin/Previleges');
				
					}else{
					    
					     	$this->session->set_flashdata('msg', 'First unlink this RM to customers');
	        
					    	redirect('Admin/Previleges');
			
					}

			}
				public function teamstatus(){
is_admin();
				$where='id';

				$id=$_POST['id'];

				$table='admin';

				$data= array(

					'status' => $_POST['type']

							);

				$this->Adminmodel->update_common($data,$table,$where,$id);

			}
			public function updatePrevileges(){
			is_admin();
				$role=implode(",", $_POST['art']);
				$where='id';

				$id= $_POST['id'];

				$table='admin';
			
				$data = array(
								'role'=>$role
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);

				redirect('Admin/Previleges');

			}
			
			public function insertPrevileges(){
			is_admin();
			
				$user_id= $_POST['user_id'];
			
				// ========= Inventory  ============
				
				$navbar_name = 'Inventory' ;
				
				$view= $_POST['Inventory_view'];
				$edit=$_POST['Inventory_edit'];
				$download= $_POST['Inventory_download'];
				$upload=  $_POST['Inventory_upload'];
				
				$rm_id=  $_POST['Inventory_rm'];
				$active       =  $_POST['Inventory_active'];
				$approved       =  $_POST['Inventory_approved'];
				
				$this->team_role_add($user_id , $navbar_name ,$view ,$edit ,$download ,$upload ,$rm_id ,$active ,$approved) ;
				
			// ========= NewOrder  ============
				
				$navbar_name = 'NewOrder' ;
				$view= $_POST['NewOrder_view'];
				$edit=$_POST['NewOrder_edit'];
				$download= $_POST['NewOrder_download'];
				$upload=  $_POST['NewOrder_upload'];
				
				$rm_id=  $_POST['NewOrder_rm'];
				$active       =  $_POST['NewOrder_active'];
				$approved       =  $_POST['NewOrder_approved'];
				
				$this->team_role_add($user_id , $navbar_name ,$view ,$edit ,$download ,$upload ,$rm_id,$active, $approved ) ;
				
			// ========= ProductionOrder  ============
				
				$navbar_name = 'ProductionOrder' ;
				$view= $_POST['ProductionOrder_view'];
				$edit=$_POST['ProductionOrder_edit'];
				$download= $_POST['ProductionOrder_download'];
				$upload=  $_POST['ProductionOrder_upload'];
				
				$rm_id=  $_POST['ProductionOrder_rm'];
				$active       =  $_POST['ProductionOrder_active'];
				$approved       =  $_POST['ProductionOrder_approved'];
				
				$this->team_role_add($user_id , $navbar_name ,$view ,$edit ,$download ,$upload ,$rm_id ,$active , $approved) ;
				
		// ========= Orderlist  ============
				
				$navbar_name = 'Orderlist' ;
				$view= $_POST['Orderlist_view'];
				$edit=$_POST['Orderlist_edit'];
				$download= $_POST['Orderlist_download'];
				$upload=  $_POST['Orderlist_upload'];
				$rm_id=  $_POST['Orderlist_rm'];
				$active       =  $_POST['Orderlist_active'];
				$approved       =  $_POST['Orderlist_approved'];
				
				$this->team_role_add($user_id , $navbar_name ,$view ,$edit ,$download ,$upload  ,$rm_id ,$active , $approved) ;
				
			// ========= Production Orderlist  ============
				
				$navbar_name = 'Productionlist' ;
				$view= $_POST['Productionlist_view'];
				$edit=$_POST['Productionlist_edit'];
				$download= $_POST['Productionlist_download'];
				$upload=  $_POST['Productionlist_upload'];
				$rm_id=  $_POST['Productionlist_rm'];
				$active       =  $_POST['Productionlist_active'];
				$approved       =  $_POST['Productionlist_approved'];
				
				$this->team_role_add($user_id , $navbar_name ,$view ,$edit ,$download ,$upload  ,$rm_id,$active  , $approved) ;
				
				// ========= customer list  ============
				
				$navbar_name = 'customer' ;
				$view= $_POST['customer_view'];
				$edit=$_POST['customer_edit'];
				$download= $_POST['customer_download'];
				$upload=  $_POST['customer_upload'];
				$rm_id=  $_POST['customer_rm'];
				$active       =  $_POST['customer_active'];
				$approved       =  $_POST['customer_approved'];
				
		
				
				$this->team_role_add($user_id , $navbar_name ,$view ,$edit ,$download ,$upload  ,$rm_id ,$active , $approved) ;
				// ========= Ledger list  ============
				
				$navbar_name = 'Ledger' ;
				$view        =  $_POST['Ledger_view'];
				$edit        =  $_POST['Ledger_edit'];
				$download    =  $_POST['Ledger_download'];
				$upload      =  $_POST['Ledger_upload'];
				$rm_id       =  $_POST['Ledger_rm'];
				$active       =  $_POST['Ledger_active'];
				$approved       =  $_POST['Ledger_approved'];
				
				$this->team_role_add($user_id , $navbar_name ,$view ,$edit ,$download ,$upload  ,$rm_id ,$active , $approved) ;
			
			// ========= Payment list  ============
				
				$navbar_name = 'Payment' ;
				$view        =  $_POST['Payment_view'];
				$edit        =  $_POST['Payment_edit'];
				$download    =  $_POST['Payment_download'];
				$upload      =  $_POST['Payment_upload'];
				$rm_id       =  $_POST['Payment_rm'];
				$active       =  $_POST['Payment_active'];
				$approved       =  $_POST['Payment_approved'];
				
				$this->team_role_add($user_id , $navbar_name ,$view ,$edit ,$download ,$upload  ,$rm_id ,$active , $approved) ;
			
				// ========= ListProduct list  ============
				
				$navbar_name = 'ListProduct' ;
				$view        =  $_POST['ListProduct_view'];
				$edit        =  $_POST['ListProduct_edit'];
				$download    =  $_POST['ListProduct_download'];
				$upload      =  $_POST['ListProduct_upload'];
				$rm_id       =  $_POST['ListProduct_rm'];
				$active       =  $_POST['ListProduct_active'];
				$approved       =  $_POST['ListProduct_approved'];
				
				$this->team_role_add($user_id , $navbar_name ,$view ,$edit ,$download ,$upload  ,$rm_id  , $active, $approved ) ;
				
				// ========= BulkPrice list  ============
				
				$navbar_name = 'BulkPrice' ;
				$view        =  $_POST['BulkPrice_view'];
				$edit        =  $_POST['BulkPrice_edit'];
				$download    =  $_POST['BulkPrice_download'];
				$upload      =  $_POST['BulkPrice_upload'];
				$rm_id       =  $_POST['BulkPrice_rm'];
				$active       =  $_POST['BulkPrice_active'];
				$approved       =  $_POST['BulkPrice_approved'];
				
				$this->team_role_add($user_id , $navbar_name ,$view ,$edit ,$download ,$upload  ,$rm_id  , $active, $approved ) ;
				
				// ========= NavBar list  ============
				
				$navbar_name = 'NavBar' ;
				$view        =  $_POST['NavBar_view'];
				$edit        =  $_POST['NavBar_edit'];
				$download    =  $_POST['NavBar_download'];
				$upload      =  $_POST['NavBar_upload'];
				$rm_id       =  $_POST['NavBar_rm'];
				$active       =  $_POST['NavBar_active'];
				$approved       =  $_POST['NavBar_approved'];
				
				$this->team_role_add($user_id , $navbar_name ,$view ,$edit ,$download ,$upload  ,$rm_id  , $active, $approved ) ;
			
			// ========= BulkImage list  ============
				
				$navbar_name = 'BulkImage' ;
				$view        =  $_POST['BulkImage_view'];
				$edit        =  $_POST['BulkImage_edit'];
				$download    =  $_POST['BulkImage_download'];
				$upload      =  $_POST['BulkImage_upload'];
				$rm_id       =  $_POST['BulkImage_rm'];
				$active       =  $_POST['BulkImage_active'];
				$approved       =  $_POST['BulkImage_approved'];
				
				$this->team_role_add($user_id , $navbar_name ,$view ,$edit ,$download ,$upload  ,$rm_id  , $active, $approved ) ;
				
			
			// ========= homecategory list  ============
				
				$navbar_name = 'homecategory' ;
				$view        =  $_POST['homecategory_view'];
				$edit        =  $_POST['homecategory_edit'];
				$download    =  $_POST['homecategory_download'];
				$upload      =  $_POST['homecategory_upload'];
				$rm_id       =  $_POST['homecategory_rm'];
				$active       =  $_POST['homecategory_active'];
				$approved       =  $_POST['homecategory_approved'];
				
				$this->team_role_add($user_id , $navbar_name ,$view ,$edit ,$download ,$upload  ,$rm_id ,$active , $approved) ;
	
	// ========= cms list  ============
				
				$navbar_name = 'cms' ;
				$view        =  $_POST['cms_view'];
				$edit        =  $_POST['cms_edit'];
				$download    =  $_POST['cms_download'];
				$upload      =  $_POST['cms_upload'];
				$rm_id       =  $_POST['cms_rm'];
				$active       =  $_POST['cms_active'];
				$approved       =  $_POST['cms_approved'];
				
				$this->team_role_add($user_id , $navbar_name ,$view ,$edit ,$download ,$upload  ,$rm_id ,$active , $approved) ;
	
	// ========= product_management list  ============
				
				$navbar_name = 'product_management' ;
				$view        =  $_POST['product_management_view'];
				$edit        =  $_POST['product_management_edit'];
				$download    =  $_POST['product_management_download'];
				$upload      =  $_POST['product_management_upload'];
				$rm_id       =  $_POST['product_management_rm'];
				$active       =  $_POST['product_management_active'];
				$approved       =  $_POST['product_management_approved'];
				
				$this->team_role_add($user_id , $navbar_name ,$view ,$edit ,$download ,$upload  ,$rm_id ,$active , $approved) ;
	
						
	// ========= excel list  ============
				
				$navbar_name = 'excel' ;
				$view        =  $_POST['excel_view'];
				$edit        =  $_POST['excel_edit'];
				$download    =  $_POST['excel_download'];
				$upload      =  $_POST['excel_upload'];
				$rm_id       =  $_POST['excel_rm'];
				$active       =  $_POST['excel_active'];
				$approved       =  $_POST['excel_approved'];
				
				$this->team_role_add($user_id , $navbar_name ,$view ,$edit ,$download ,$upload  ,$rm_id ,$active , $approved) ;
	
						
			
					
				redirect('Admin/AddPrevileges/'.$user_id);

			}
			
			
			function team_role_add($user_id , $navbar_name ,$view ,$edit ,$download ,$upload ,$rm_id ,$active ){
			    
			    	$data = array(
				        'user_id' =>$user_id,
					    'navbar_name' => $navbar_name,
					    'view'=>$view ,
				// 		'edit'=>$edit ,
						'download'=>$download ,
				// 		'upload'=>$upload ,
								
						 );
						
						  if($edit){
						 
						 $data['edit'] = $edit ;
						 }
						 
						 if($rm_id != '---Select RM---' && $rm_id){
						     
						     
					
						 $data['rm_no'] = $rm_id ;
						
						 }
						 if($upload){
						     
						     $data['upload'] =$upload ;
						 }
						 if($active){
						     
						     $data['active'] =$active ;
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
			
		function team_role_rating($user_id , $navbar_name ,$view ,$edit ,$download ,$upload ,$rm_id ,$reply ){
			    
			    	$data = array(
				        'user_id' =>$user_id,
					    'navbar_name' => $navbar_name,
					    'view'=>$view ,
						'download'=>$download ,
				 		'reply'=>$reply ,
								
						 );
						 
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
				is_admin();
				
					  $check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
		        
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
			    
			       if($_SESSION['session_namee'] != 'admin'){ 
                $rowid = $_SESSION['session_iid'] ;
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => 'customer' ))->row();
                
               }else{
                   
                 $rowid=   'Admin' ; 
               }
				$data = array(
								'url' =>$_POST['url'],
								'sheetname' =>$image,
								'sheet' =>$path,
								'member' =>$rowid,
								'date' =>date('Y-m-d')
							 );
				
					$table='excelsheet';
					$this->Model->insert_common($table,$data);

  			 move_uploaded_file($_FILES["excel"]["tmp_name"], "./assets/excelsheet/".$image);
  			 if($_POST['url']=='excel'){
					redirect('Admin/ListProduct');
  			 }elseif ($_POST['url']=='updatevarpro') {
					redirect('Admin/inventory');
  			 
  			 }elseif ($_POST['url']=='updateproductcsv') {
					redirect('Admin/ListProduct');
				
  			 
  			 }elseif ($_POST['url']=='updatepriceproductcsv') {
					redirect('Admin/price');
  			 
  			 }
  			 elseif ($_POST['url']=='updatepricevarproductcsv') {
					redirect('Admin/price');
  			 
  			 }
  			  elseif ($_POST['url']=='updatepro') {
					redirect('Admin/inventory');
  			 
  			 } elseif ($_POST['url']=='product_management_upload') {
					redirect('Admin/productmanagment');
  			 
  			 }else{
					redirect('Admin/varient/'.$this->uri->segment(3));

  			 }
	
			}
			public function excelsheet(){
				$table='excelsheet';
				is_admin();
				
					  $check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				$data['sheet']=$this->Model->desc_common($table);
				$this->load->view('Admin/excelsheet.php',$data);
			}
			public function approvecsv(){

is_admin();
				 $id= $this->uri->segment(3);
				$where='id';
				$table='excelsheet';
			
				$data = array(
								'approved'=>'1'
							 );

				$this->Adminmodel->update_common($data,$table,$where,$id);	
				$var=$this->uri->segment(4);
				$this->$var($id);
				//redirect('Admin/excelsheet');
			} 
			public function deleteexcel(){
						is_admin();

				$id = $this->uri->segment(3);
				$table='excelsheet';
				$where='id';
				$this->Model->delete_common($table,$where,$id);
				unlink($_SERVER['DOCUMENT_ROOT'].'/art/assets/excelsheet/'.$this->uri->segment(4));

			redirect('Admin/excelsheet');
			}
			public function Promotioncategory(){
			is_admin();
				$id ='';	
				$where='sku_code';
				$table='promotion';

				$data['cat'] = $this->Model->select_common_where($table,$where,$id);
				$this->load->view("Admin/promotioncat.php",$data);
				}
				public function addnewpromocat(){
				is_admin();
				$table='parent_category';
				$data['cat']=$this->Model->select_common($table);	
				$this->load->view("Admin/addpromocat.php",$data);

				}
				public function newpromocat(){
				is_admin();
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

					redirect('Admin/Promotioncategory');

			}
			public function deactivepromotion(){
					 is_admin();
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
					redirect('Admin/Promotioncategory');

			}

			public function activepromotion(){
					 is_admin();
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
					redirect('Admin/Promotioncategory');

			}
				public function deleterromocat(){
						is_admin();


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
			redirect('Admin/Promotioncategory');
			}
			public function Promotionproduct(){
				$id ='1';	
				is_admin();
				$where='excelaprove';
				$table='promotion';

				$data['cat'] = $this->Model->select_common_where($table,$where,$id);
				$this->load->view('Admin/promotionpro.php',$data);
			}
			public function addnewpromopro(){
				is_admin();
				$this->load->view("Admin/addpromopro.php");

				}
			public function newpromopro(){
				//pr($_POST);die;
				is_admin();
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
  			redirect('Admin/Promotionproduct');

			}
			public function promoexcel($id){


is_admin();
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

			redirect('Admin/Promotionproduct');

 

			}

			public function activepromoexcel(){
is_admin();
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
				redirect('Admin/Promotionproduct');
			}
			public function deactivepromoexcel(){
			is_admin();
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
				redirect('Admin/Promotionproduct');

			}
					public function deletepromoexcel(){
					is_admin();
				
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
				redirect('Admin/Promotionproduct');

			}
			public function returnpro(){
					is_admin();
					$table='returnproduct';
				$data['return']=$this->Adminmodel->select_common($table);

	$this->load->view('Admin/listreturn',$data);

			}
			public function approvereturn(){
				is_admin();
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

				redirect('Admin/returnpro');
			}
			public function addsuggest(){
				
is_admin();
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
			is_admin();	
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
	 redirect('Admin/requestdetail/'.$id);
				
			}

			public function addtransport()
			{
				is_admin();
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
	 redirect('Admin/requestdetail/'.$id);
				
			}

public function addsidebanner(){
	is_admin();
		$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
	$this->load->view('Admin/banneradd.php');
}
public function editsidebanner($id){
	is_admin();
		$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
	
	$data['result'] =$this->db->get_where('sidebanner', array('id' => $id ,))->row() ;
     
	$this->load->view('Admin/edit_sidebanner.php',$data);
}

public function edit_slider($id){
	is_admin();
		$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
	$data['result'] =$this->db->get_where('slider', array('id' => $id ,))->row() ;
     
	$this->load->view('Admin/edit_slider.php',$data);
}

public function addslider(){
	is_admin();
		$check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
	$this->load->view('Admin/slideradd.php');
}
public function bulk_img(){
	is_admin();
		$check = $this->check_url('BulkImage') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
	$this->load->view('Admin/bulk_img.php');
}
public function logo_image(){
	is_admin();
	
	  $check = $this->check_url('cms') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
		        
				$id ='8';	
				$where='id';
				$table='cms';

				$data['messages'] = $this->Model->select_common_where($table,$where,$id);
				$id ='9';	
				$where='id';
				$table='cms';

				$data['fav_icon'] = $this->Model->select_common_where($table,$where,$id);
				$this->load->view('Admin/logo_image.php',$data);
	
}

public function modelimage(){
	is_admin();
	
	  $check = $this->check_url('cms') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
	
				$id ='11';	
				$where='id';
				$table='cms';

				$data['messages'] = $this->Model->select_common_where($table,$where,$id);
				$this->load->view('Admin/modelimage.php',$data);
	
}
public function home_cms(){
	is_admin();
	   $check = $this->check_url('cms') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
	
	
				$data['result'] =$this->db->get_where('home_cms', array('id' => 1 ,))->row() ;
  		$this->load->view('Admin/home_cms.php',$data);
	
}

public function adminsendmail(){
    
    $subject = $_POST['subject'] ; 
    $message = $_POST['message'] ; 
    
    $user_id = $_POST['user_id'] ; 
    
      $data = array(
          
            'phone'=>$_POST['mobile'],
            'email'=>$_POST['email'],
            'subject'=>$subject,
            'message'=>$message,
            'type'=>$user_id,
            'date'=> date('Y-m-d'),
            
            
        );


            $this->db->insert('mail_byadmin', $data) ;
       
    
    if($user_id == 'All' ){
    
          $user_result  = $this->db->get_where('customerlogin', array('otp_validation' => 1 ,))->result() ;
	foreach($user_result as $user) {
	    
            $email = $user->email ; 
            $mob = $user->phone ; ; 
             if($_POST['sendsms'] == "Yes"){
                sms_send($mob,$message) ;
             }
                            
                            $admin =  $this->db->get_where('admin_mail', array('id' => 1 ,))->row() ;
                            $FromMail = $admin->send_mail ; 
                      
                      if($_POST['sendemail'] == "Yes"){
                                            $this->email->set_mailtype("html");
                                            $this->email->set_newline("\r\n");  
                                            $url=base_url('Artnhub/sendmail?id='.urlencode($message));
                                            $file=file_get_contents($url) ; 
                                            $this->load->library('email');
                                            $this->email->from($FromMail, 'TWG Handicraft');
                                            $this->email->to($email);
                                            $this->email->subject($subject);
                                            $this->email->message($file);
                                            $this->email->send();
                      }
                                    
	}
                                    
                                    
    }else{
        
   
    $email = $_POST['email'] ; 
    $mob = $_POST['mobile']  ; 
    
        sms_send($mob,$message) ;
                    
                       $admin =  $this->db->get_where('admin_mail', array('id' => 1 ,))->row() ;
                    
                    $FromMail = $admin->send_mail ; 
              
    
    
                                    $this->email->set_mailtype("html");
                                    $this->email->set_newline("\r\n");  
                                    $url=base_url('Artnhub/sendmail?id='.urlencode($message));
                                    $file=file_get_contents($url) ; 
                                    $this->load->library('email');
                                    $this->email->from($FromMail, 'TWG Handicraft');
                                    $this->email->to($email);
                                    $this->email->subject($subject);
                                    $this->email->message($file);
                                    $this->email->send();
                                    
                                    
    
    }
    
                                    
                    	redirect('Admin/send_to_mail');                
                       	    
}


public function send_to_mail(){
	is_admin();
	   $check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
	
	
				$data['result'] =$this->db->get_where('home_cms', array('id' => 1 ,))->row() ;
  	        	$this->load->view('Admin/sendmail.php',$data);
	
}

public function add_logo(){
			   is_admin();


$image4 = $_FILES['file']['name'];

 
if($image4){
$url = base_url();
 $path = $url."assets/logo/".$image4;

	  $row  = $this->db->get_where('cms', array('id' => 8 ,))->row() ;
				  $path2 = $row->terms ; 
				  
				  unlink($path2) ;
   
   
move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/logo/".$image4);

$data = array(

	'terms'  => $path
			);
//pr($data);die;
// $id = $this->Adminmodel->insert_common($data,'sidebanner');

                $this->db->where('id',8);
                $this->db->update('cms', $data);
}           
                
   $image4 = $_FILES['fav_icon']['name'];

 if($image4){

$url = base_url();
 $path = $url."assets/logo/".$image4;
 $row  = $this->db->get_where('cms', array('id' => 9 ,))->row() ;
				  $path2 = $row->terms ; 
				  
				  unlink($path2) ;
   

move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/logo/".$image4);

$data = array(

	'terms'  => $path
			);
//pr($data);die;
// $id = $this->Adminmodel->insert_common($data,'sidebanner');

                $this->db->where('id',9);
                $this->db->update('cms', $data);
 }
redirect('Admin/logo_image');

}


public function addmodelimg(){
			   is_admin();


$image4 = $_FILES['file']['name'];

 
if($image4){
$url = base_url();
 $path = $url."assets/logo/".$image4;

	  $row  = $this->db->get_where('cms', array('id' => 11,))->row() ;
				  $path2 = $row->terms ; 
				  
				  unlink($path2) ;
   
   
move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/logo/".$image4);

$data = array(

	'terms'  => $path
			);
// pr($data);die;
// $id = $this->Adminmodel->insert_common($data,'sidebanner');

                $this->db->where('id',11);
                $this->db->update('cms', $data);
}           
                
 
redirect('Admin/modelimage');

}

public function BannerUpload(){
			   is_admin();


$image4 = $_FILES['file']['name'];

$url = base_url();
 $path = $url."assets/sidebanner/".$image4;


move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/sidebanner/".$image4);

$data = array(
	'name' => $_POST['name'],
	'link' => $_POST['link'],
	'position' => $_POST['position'],
	'images'  => $path
			);
//pr($data);die;
 $id = $this->Adminmodel->insert_common($data,'sidebanner');
redirect('Admin/Listsidebanner');

}

public function update_sideBanner(){
			   is_admin();
$id  = $_POST['id'] ;


$data = array(
	'name' => $_POST['name'],
	'link' => $_POST['link'],
	'position' => $_POST['position'],
// 	'images'  => $path
			);
			
			
			$image4 = $_FILES['file']['name'];
if($image4){
$url = base_url();
 $path = $url."assets/sidebanner/".$image4;


move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/sidebanner/".$image4);

$data['images']  = $path ; 
}
//pr($data);die;


 
  $this->db->where('id',$id);
 $this->db->update('sidebanner', $data);
redirect('Admin/Listsidebanner');

}


public function updateslider(){
			   is_admin();
$id  = $_POST['id'] ;


$data = array(
	'name' => $_POST['name'],
	'link' => $_POST['link'],
	'position' => $_POST['position'],
// 	'images'  => $path
			);
			
			
			$image4 = $_FILES['file']['name'];
if($image4){
$url = base_url();
 $path = $url."assets/sidebanner/".$image4;


move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/sidebanner/".$image4);

$data['images']  = $path ; 
}
//pr($data);die;


 
  $this->db->where('id',$id);
 $this->db->update('slider', $data);
redirect('Admin/Listslider');

}

public function update_homecms(){
			   is_admin();
$id  = 1 ;


$data = array(
	'facebook_link' => $_POST['facebook_link'],
	'insta_link' => $_POST['insta_link'],
	'twitter_link' => $_POST['twitter_link'],
	'linkedin_link' => $_POST['linkedin_link'],
	'meta_title' => $_POST['meta_title'],
	'meta_key' => $_POST['meta_key'],
	'meta_des' => $_POST['meta_des'],
	'home_des' => $_POST['home_des'],
			);
			
			

  $this->db->where('id',$id);
 $this->db->update('home_cms', $data);
redirect('Admin/home_cms');

}

public function bulk_upload(){
			   is_admin();

        $text = $this->input->post('about');
     

            $table='gym_gallery';

        $file_name ='file';

        $files = $_FILES[$file_name];

        $file_upload = sizeof($_FILES[$file_name]['tmp_name']);
        $image = array();

        $multiple = array();

        for ($i=0; $i <$file_upload ; $i++) {


            $_FILES[$file_name]['name'] = $files['name'][$i];
            $_FILES[$file_name]['type'] = $files['type'][$i];
            $_FILES[$file_name]['tmp_name'] = $files['tmp_name'][$i];
            $_FILES[$file_name]['error'] = $files['error'][$i];
            $_FILES[$file_name]['size'] = $files['size'][$i];


            $upload_path = FCPATH.'./assets/product/' ;
            $url1 =  array('upload_path' => './assets/product/',
                'allowed_types' => 'jpg|jpeg|png|pdf',

            );
            $config = array(
                'upload_path' => $url1['upload_path'],
                'allowed_types'=> $url1['allowed_types'],

            );

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($file_name)) {
                $error = array('error' => $this->upload->display_errors());
                
                print_r($error);
            } else {
                $data =  $this->upload->data();

                $multiple[$i] =  base_url("assets/product/".$data['file_name']);

            }

        }

        $img_name1 = json_encode($multiple);

       echo  "Done" ; 
       
       redirect('Admin/bulk_img');

    
    
}


	public function deleteslider(){
				is_admin();
				
				$id=$this->uri->segment(3);
				
				  $row  = $this->db->get_where('slider', array('id' => $id ,))->row() ;
				  $path = $row->images ; 
				  
				  unlink($path) ;
   
    			    	 $this->db->where('id',$id);
     	    	        $this->db->delete('slider');
                redirect('Admin/Listslider');

			}
		
	public function deletepromotionimg(){
				is_admin();
				$id=$this->uri->segment(3);
				
				 $row  = $this->db->get_where('sidebanner', array('id' => $id ,))->row() ;
				  $path = $row->images ; 
				  
				  unlink($path) ;
   
    			    	 $this->db->where('id',$id);
     	    	        $this->db->delete('sidebanner');
                redirect('Admin/Listsidebanner');

			}
		

public function sliderUpload(){
			   is_admin();
  $check = $this->check_url('cms') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }

$image4 = $_FILES['file']['name'];

$url = base_url();
 $path = $url."assets/slider/".$image4;


move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/slider/".$image4);

$data = array(
	'name' => $_POST['name'],
	'link' => $_POST['link'],
	'position' => $_POST['position'],
	'images'  => $path
			);
//pr($data);die;
 $id = $this->Adminmodel->insert_common($data,'slider');
redirect('Admin/Listslider');

}

public function Listslider(){
	is_admin();
	
	  $check = $this->check_url('cms') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
		        
	$table='slider';
				$data['messagess']=$this->Adminmodel->select_common($table);
			//	pr($data);die;
	$this->load->view('Admin/Listslider.php',$data);
}

public function Listsidebanner(){
	is_admin();
	
	  $check = $this->check_url('cms') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
		        
	$table='sidebanner';
				$data['messagess']=$this->Adminmodel->select_common($table);
			//	pr($data);die;
	$this->load->view('Admin/Listsidebanner.php',$data);
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
    
     $user_detail  = $this->db->get_where('orders', array('order_id' => $ord_id ,))->row() ;
     
     $user_id =  $user_detail->user_id;
	 $order_type = $user_detail->order_type ; 
			    	
			    	if($order_type == 'production'){
			    	    $status = 1 ;
			    	    
			    	}else{
			    	    
			    	    $status = 0 ;
			    	}
		
       $product_detail = $this->db->get_where('product_detail' ,array('sku_code' => $sku ))->row() ; 
	         
	         $availability = $product_detail->availability - $product_detail->inventory_hold ;
	        
    $exist_product = $this->db->get_where('order_detail', array('product_id' => $sku , 'user_id' => $user_id , 'order_rand_id' => $req_id ,))->row() ;
     
      
    if($exist_product){
        
        redirect('Admin/requestdetail/'.$req_id) ;
        
    }else{

      $product_detail  = $this->db->get_where('product_detail', array('sku_code' => $sku ,))->row() ;
      
      
                 $pro_id = $sku ; 
                 
                       $query = $this->db->select_sum('quantity');
                       $query = $this->db->where(array('product_id' =>$pro_id , 'order_status' => 0));
                        $query = $this->db->get('order_detail');
                        $result = $query->result();
                        // print_r($result) ;
                        
                                                                	
                      $hold = $result[0]->quantity ; 
                          
                           
                     if($hold){
                          $holdlow = $result[0]->quantity  ;
                     }else{
                         
                         
                         $holdlow = 0 ;
                     }
                  
		            	$customer_qntity = 1 ;
		            	
		        		$pro_availability = $product_detail->availability ;
			
			        	$net_inventory = $pro_availability - $holdlow ;
// ===========================
	              
	         if($net_inventory < 1 )
	         {
	          
	           	$this->session->set_flashdata('low_availab', $pro_id);
	           	
	           	  redirect('Admin/requestdetail/'.$req_id) ;
	         }
      
     
      	    $user_result   = $this->db->get_where('customerlogin', array('id' => $user_id ,))->row() ;
      
 		$discount_per = $user_result->discount_per ; 
 	 	$dis_price  = $product_detail->selling_price*($discount_per/100) ;
	                 $price = $product_detail->selling_price - $dis_price ; 
                   
      
    //   $price = $product_detail->selling_price ;
      
      $per_gst  = $product_detail->gst_per;
      
      $gst = $price*$per_gst/100 ;
      
      	$data = array(
						'order_id' =>$ord_id,
						'order_rand_id' =>$req_id,
						'user_id'=>$user_detail->user_id,
						'product_id' =>$sku,
						'quantity' =>'1', 
						'customer_quantity' =>'0',
						'price' =>$price,
						'productgst' =>$gst ,
                        'order_status' =>$status ,
 
						'cart_price' =>$price,
						
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
                
                // $post['inventory_hold'] = $product_detail->inventory_hold - 1  ;
                // $this->db->where('sku_code',$sku);
                // $this->db->update('product_detail', $data);
	    	               
            
            // echo "Product Add Successfully" ;
            
              redirect('Admin/requestdetail/'.$req_id) ;
        }
        else{
            
            
            // echo "Product Not Added" ;
            
              redirect('Admin/requestdetail/'.$req_id) ;
        }
    } 
}

//===========Conform usr RM =========




public function send_email_temp($user_id,$message_content,$message, $subject){
    
    
         $user  = $this->db->get_where('customerlogin', array('id' => $user_id ,))->row() ;
			    $mob = $user->phone ;
			    $name  = $user->Owner ;
			    $rm_id  = $user->Rm_id ;
			     $email  = $user->email ;
			  
			      $rm_detail   = $this->db->get_where('rm', array('id' => $rm_id ,))->row() ;
      
           $rm_email = $rm_detail->rm_email ; 
           $rm_mob = $rm_detail->rm_mobile ; 
           $rm_name = $rm_detail->rm_name ; 
           
	 //   	sms_accept($mob);
			    	
			    //=====================================
                   			        
                             
                    sms_send($mob,$message_content) ;
                    
                       $admin =  $this->db->get_where('admin_mail', array('id' => 1 ,))->row() ;
                    
                    $FromMail = $admin->send_mail ; 
                    $AdminMail = $admin->admin_mail ; 
                     $admin_mob = $admin->mobile   ;  
                    
                     if($email){
                    			    $this->email->set_mailtype("html");
                                    $this->email->set_newline("\r\n");  
                                    // $url=base_url('Artnhub/otpmail?id='.$otp);
                                    // $file=file_get_contents($url) ; 
                                    $this->load->library('email');
                                    $this->email->from($FromMail, 'TWG Handicraft');
                                    $this->email->to($email);
                                    $this->email->subject($subject);
                                    $this->email->message($message_content);
                                    $this->email->send();
                       	    }
                       	    
                       	    
                                        //   $admin_mob = "9711657554"  ;  
                      sms_send($admin_mob,$message) ;
                   
                    //  ==========ADMIN =========
                       $this->email->set_mailtype("html");
                                    $this->email->set_newline("\r\n");  
                                    // $url=base_url('Artnhub/otpmail?id='.$otp);
                                    // $file=file_get_contents($url) ; 
                                    $this->load->library('email');
                                    $this->email->from($FromMail, 'TWG Handicraft');
                                    $this->email->to($AdminMail);
                                    $this->email->subject($subject);
                                    $this->email->message($message);
                                    $this->email->send();
                                    
                // ================RM ======
                  sms_send($rm_mob,$message) ;
                   
                 		        
                             
                if($rm_email){
                   $this->email->set_mailtype("html");
                                    $this->email->set_newline("\r\n");  
                                    // $url=base_url('Artnhub/otpmail?id='.$otp);
                                    // $file=file_get_contents($url) ; 
                                    $this->load->library('email');
                                    $this->email->from($FromMail, 'TWG Handicraft');
                                    $this->email->to($rm_email);
                                    $this->email->subject($subject);
                                    $this->email->message($message);
                                    $this->email->send();
                }
                    // ========================================
                    	    	    
                        
    
}




public function mailsend($user_id,$email_name,$message_content,$message_contentsms,$message,$messagesms, $subject){
    
    
         $user  = $this->db->get_where('customerlogin', array('id' => $user_id ,))->row() ;
			    $mob = $user->phone ;
			    $name  = $user->Owner ;
			    $rm_id  = $user->Rm_id ;
			     $email  = $user->email ;
			  
		$rm_detail   = $this->db->get_where('rm', array('id' => $rm_id ,))->row() ;
      
           $rm_email = $rm_detail->rm_email ; 
           $rm_mob = $rm_detail->rm_mobile ; 
           $rm_name = $rm_detail->rm_name ; 
           
	   $permission =  $this->db->get_where('sms_permission', array('name' => $email_name ,))->row() ;

                     if($permission->sms =="Yes")
                        {
                            sms_send($mob,$message_contentsms) ;
                                        
                        }             			        
                             
                    
                    $admin =  $this->db->get_where('admin_mail', array('id' => 1 ,))->row() ;
                    
                    $FromMail = $admin->send_mail ; 
                    $AdminMail = $admin->admin_mail ; 
                    $admin_mob = $admin->mobile   ;  
                    
                     if($email && $permission->email =="Yes"){
                    			    $this->email->set_mailtype("html");
                                    $this->email->set_newline("\r\n");  
                                    $url=base_url('Artnhub/sendmail?id='.urlencode($message_content));
                                    $file=file_get_contents($url) ; 
                                    $this->load->library('email');
                                    $this->email->from($FromMail, 'TWG Handicraft');
                                    $this->email->to($email);
                                    $this->email->subject($subject);
                                    $this->email->message($file);
                                    $this->email->send();
                       	    }
                       	    
                       	      //  ==========ADMIN =========
                       	      
                            if($permission->adminsms =="Yes")
                                {
                                 
                                    sms_send($admin_mob,$messagesms) ;
                                      
                                    sms_send($rm_mob,$messagesms) ;
                
                                               
                                }
                   
                     if($permission->adminemail =="Yes"){
         
                                    $this->email->set_mailtype("html");
                                    $this->email->set_newline("\r\n");  
                                    $url=base_url('Artnhub/sendmail?id='.urlencode($message));
                                    $file=file_get_contents($url) ; 
                                    $this->load->library('email');
                                    $this->email->from($FromMail, 'TWG Handicraft');
                                    $this->email->to($AdminMail);
                                    $this->email->subject($subject);
                                    $this->email->message($file);
                                    $this->email->send();
                                    
                // ================RM ======
                   
                 		        
                             
                        if($rm_email){
                           $this->email->set_mailtype("html");
                                            $this->email->set_newline("\r\n");  
                                            $url=base_url('Artnhub/sendmail?id='.urlencode($message));
                                            $file=file_get_contents($url) ; 
                                            $this->load->library('email');
                                            $this->email->from($FromMail, 'TWG Handicraft');
                                            $this->email->to($rm_email);
                                            $this->email->subject($subject);
                                            $this->email->message($file);
                                            $this->email->send();
                        }
                  
                 } 
                 
                 // ========================================
                    	    	    
                        
    
}


public function mailsend_att($user_id,$email_name,$message_content,$message_contentsms,$message,$messagesms, $subject ,$file_link){
    
    
         $user  = $this->db->get_where('customerlogin', array('id' => $user_id ,))->row() ;
			    $mob = $user->phone ;
			    $name  = $user->Owner ;
			    $rm_id  = $user->Rm_id ;
			     $email  = $user->email ;
			  
		$rm_detail   = $this->db->get_where('rm', array('id' => $rm_id ,))->row() ;
      
           $rm_email = $rm_detail->rm_email ; 
           $rm_mob = $rm_detail->rm_mobile ; 
           $rm_name = $rm_detail->rm_name ; 
           
	   $permission =  $this->db->get_where('sms_permission', array('name' => $email_name ,))->row() ;

                     if($permission->sms =="Yes")
                        {
                            sms_send($mob,$message_contentsms) ;
                                        
                        }             			        
                             
                    
                    $admin =  $this->db->get_where('admin_mail', array('id' => 1 ,))->row() ;
                    
                    $FromMail = $admin->send_mail ; 
                    $AdminMail = $admin->admin_mail ; 
                    $admin_mob = $admin->mobile   ;  
                    
                     if($email && $permission->email =="Yes"){
                    			    $this->email->set_mailtype("html");
                                    $this->email->set_newline("\r\n");  
                                    $url=base_url('Artnhub/sendmail?id='.urlencode($message_content));
                                    $file=file_get_contents($url) ; 
                                    $this->load->library('email');
                                    $this->email->from($FromMail, 'TWG Handicraft');
                                    $this->email->to($email);
                                    $this->email->subject($subject);
                                    $this->email->message($file);
                                    $this->email->attach($file_link);
                                    $this->email->send();
                       	    }
                       	    
                       	      //  ==========ADMIN =========
                       	      
                            if($permission->adminsms =="Yes")
                                {
                                 
                                    sms_send($admin_mob,$messagesms) ;
                                      
                                    sms_send($rm_mob,$messagesms) ;
                
                                               
                                }
                   
                     if($permission->adminemail =="Yes"){
         
                                    $this->email->set_mailtype("html");
                                    $this->email->set_newline("\r\n");  
                                    $url=base_url('Artnhub/sendmail?id='.urlencode($message));
                                    $file=file_get_contents($url) ; 
                                    $this->load->library('email');
                                    $this->email->from($FromMail, 'TWG Handicraft');
                                    $this->email->to($AdminMail);
                                    $this->email->subject($subject);
                                    $this->email->message($file);
                                    $this->email->send();
                                    
                // ================RM ======
                   
                 		        
                             
                        if($rm_email){
                           $this->email->set_mailtype("html");
                                            $this->email->set_newline("\r\n");  
                                            $url=base_url('Artnhub/sendmail?id='.urlencode($message));
                                            $file=file_get_contents($url) ; 
                                            $this->load->library('email');
                                            $this->email->from($FromMail, 'TWG Handicraft');
                                            $this->email->to($rm_email);
                                            $this->email->subject($subject);
                                            $this->email->message($file);
                                            $this->email->send();
                        }
                  
                 } 
                 
                 // ========================================
                    	    	    
                        
    
}


public function mailsend_ship($user_id,$email_name,$message_content,$message_contentsms,$message,$messagesms, $subject ,$file_link,$trasnport_document){
    
    
         $user  = $this->db->get_where('customerlogin', array('id' => $user_id ,))->row() ;
			    $mob = $user->phone ;
			    $name  = $user->Owner ;
			    $rm_id  = $user->Rm_id ;
			     $email  = $user->email ;
			  
		$rm_detail   = $this->db->get_where('rm', array('id' => $rm_id ,))->row() ;
      
           $rm_email = $rm_detail->rm_email ; 
           $rm_mob = $rm_detail->rm_mobile ; 
           $rm_name = $rm_detail->rm_name ; 
           
	   $permission =  $this->db->get_where('sms_permission', array('name' => $email_name ,))->row() ;

                     if($permission->sms =="Yes")
                        {
                            sms_send($mob,$message_contentsms) ;
                                        
                        }             			        
                             
                    
                    $admin =  $this->db->get_where('admin_mail', array('id' => 1 ,))->row() ;
                    
                    $FromMail = $admin->send_mail ; 
                    $AdminMail = $admin->admin_mail ; 
                    $admin_mob = $admin->mobile   ;  
                    
                     if($email && $permission->email =="Yes"){
                    			    $this->email->set_mailtype("html");
                                    $this->email->set_newline("\r\n");  
                                    $url=base_url('Artnhub/sendmail?id='.urlencode($message_content));
                                    $file=file_get_contents($url) ; 
                                    $this->load->library('email');
                                    $this->email->from($FromMail, 'TWG Handicraft');
                                    $this->email->to($email);
                                    $this->email->subject($subject);
                                    $this->email->message($file);
                                    $this->email->attach($file_link);
                                    $this->email->attach($trasnport_document);
                                    $this->email->send();
                       	    }
                       	    
                       	      //  ==========ADMIN =========
                       	      
                            if($permission->adminsms =="Yes")
                                {
                                 
                                    sms_send($admin_mob,$messagesms) ;
                                      
                                    sms_send($rm_mob,$messagesms) ;
                
                                               
                                }
                   
                     if($permission->adminemail =="Yes"){
         
                                    $this->email->set_mailtype("html");
                                    $this->email->set_newline("\r\n");  
                                    $url=base_url('Artnhub/sendmail?id='.urlencode($message));
                                    $file=file_get_contents($url) ; 
                                    $this->load->library('email');
                                    $this->email->from($FromMail, 'TWG Handicraft');
                                    $this->email->to($AdminMail);
                                    $this->email->subject($subject);
                                    $this->email->message($file);
                                    $this->email->send();
                                    
                // ================RM ======
                   
                 		        
                             
                        if($rm_email){
                           $this->email->set_mailtype("html");
                                            $this->email->set_newline("\r\n");  
                                            $url=base_url('Artnhub/sendmail?id='.urlencode($message));
                                            $file=file_get_contents($url) ; 
                                            $this->load->library('email');
                                            $this->email->from($FromMail, 'TWG Handicraft');
                                            $this->email->to($rm_email);
                                            $this->email->subject($subject);
                                            $this->email->message($file);
                                            $this->email->send();
                        }
                  
                 } 
                 
                 // ========================================
                    	    	    
                        
    
}



public function conform_user_rm(){
				is_admin();
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
	    	  
	    	  
	      // ==============EMAIL ==============
	    	  
		       $user  = $this->db->get_where('customerlogin', array('id' => $user_id ,))->row() ;
			    $mob = $user->phone ;
			    $name  = $user->Owner ;
			    $email  = $user->email ;
			    $pass  = $user->show_pass ;
			    $rm_id  = $user->Rm_id ;
			   
			    $rm_detail   = $this->db->get_where('rm', array('id' => $rm_id ,))->row() ;
      
               $rm_email = $rm_detail->rm_email ; 
               $rm_mob = $rm_detail->rm_mobile ; 
               $rm_name = $rm_detail->rm_name ; 
   
			 //=====================================
                    
                    $admin =  $this->db->get_where('admin_mail', array('id' => 1 ,))->row() ;
                    $FromMail = $admin->send_mail ; 
                    $AdminMail = $admin->admin_mail ; 
                    $admin_mob = $admin->mobile   ;  
				    $admin_name = $admin->name   ;  
				  $show_contact = $admin->show_contact   ;  
      
                    $message_contentsms = "Account Approved
                             Congrats ".$name."
                             
                             Your account is successfully verifyed. 
                             Login Details
                             Mobile Number : ".$mob.". 
                             Email : ".$email."
                             Password : ".$pass."
                             Now you can order easily.
                             
                             For Support contact
                             Your Account Manager : ".$rm_name."
                             Contact No. : ".$rm_mob."
                             customer support team. 
                             ".$show_contact."
                             www.twghandicraft.com
                             Thank you !";
                             
                      $message_content = "
                             Congrats ".$name."
                             <br><br>
                             Your account is successfully verifyed. <br>
                             Login Details<br>
                             Mobile Number : ".$mob.". <br>
                             Email : ".$email." <br>
                             Password : ****** <br>
                             Now you can order easily.<br><br>
                             
                             For Support contact <br>
                             Your Account Manager : ".$rm_name."<br>
                             Contact No. : ".$rm_mob."<br>
                             customer support team. <br>
                             ".$show_contact." <br>
                             www.twghandicraft.com <br>
                             Thank you !";
                    
                       	    
                      $messagesms =  "Account Approved
                                     Congrats
                                     New Customer ".$name."'s account is successfully verifyed. 
                                     Mobile Number : ".$mob." 
                                     Email : ".$email."
                                     Relationship manager : ".$rm_name." (RM ID ".$rm_id.").
                                     
                                     ".$admin_name." & ".$rm_name."";
                                
                        $message =  "
                                     Congrats <br>
                                     New Customer ".$name."'s account is successfully verifyed. <br>
                                     Mobile Number : ".$mob." <br>
                                     Email : ".$email." <br>
                                     Relationship manager : ".$rm_name." (RM ID ".$rm_id.").<br>
                                     <br>
                                      ".$admin_name." & ".$rm_name."";
                                
                    $email_name= "Account_Approved" ; 
                    $subject= "Account Approved" ; 
                        
                   $this->mailsend($user_id,$email_name,$message_content,$message_contentsms,$message,$messagesms, $subject);
                         
                         
			    
			    //====================================
			    
				}
				
				else
				{
				    echo "not user" ;
				redirect('Admin/Customers');
				}

				redirect('Admin/Customers');
			
			}
			
			
			//===========Reject user RM =========


public function reject_user(){
				is_admin();

			
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
			    $name  = $user->Owner ;
			    $rm_id  = $user->Rm_id ;
			   
			      $rm_detail   = $this->db->get_where('rm', array('id' => $rm_id ,))->row() ;
                  $rm_email = $rm_detail->rm_email ; 
                  $rm_mob = $rm_detail->rm_mobile ; 
                  $rm_name = $rm_detail->rm_name ; 
        

 	    //==================EMAIL ===============================
 	    
 	       $permission =  $this->db->get_where('sms_permission', array('name' => 'Account_Disapproved' ,))->row() ;

                    

                    $admin =  $this->db->get_where('admin_mail', array('id' => 1 ,))->row() ;
                    $FromMail = $admin->send_mail ; 
                    $AdminMail = $admin->admin_mail ; 
                    $admin_mob = $admin->mobile   ;  
		            $admin_name = $admin->name   ;  
		
                       	    
     $message =  "One Customer ".$name.", Register with Mobile Number ".$mob." has been disapproved due to ".$selectRegion.".<br><br>
      ".$admin_name." & ".$rm_name."";
     
    $messagesms =  "One Customer ".$name.", Register with Mobile Number ".$mob." has been disapproved due to ".$selectRegion.".
    
     ".$admin_name." & ".$rm_name."";
     
      	     // ===========SMS ==================
      	     if($permission->adminsms =="Yes")
                        {
      	     
			             sms_send($admin_mob,$messagesms) ;
                         sms_send($rm_mob,$messagesms) ;
                        }
                        
            if($permission->adminemail =="Yes")
                        {
      	  
                        //  ============ADMIN =========
                       $this->email->set_mailtype("html");
                                    $this->email->set_newline("\r\n");  
                                    $url=base_url('Admin/adminmail?id='.urlencode($message));
                                    $file=file_get_contents($url) ; 
                                    $this->load->library('email');
                                    $this->email->from($FromMail, 'TWG Handicraft');
                                    $this->email->to($AdminMail);
                                    $this->email->subject('Account Disapproved');
                                    $this->email->message($file);
                                    $this->email->send();
                                    
                        //================RM ID ============== 
                             if($rm_email){
                                        $this->email->set_mailtype("html");
                                        $this->email->set_newline("\r\n");  
                                        $url=base_url('Admin/adminmail?id='.urlencode($message));
                                        $file=file_get_contents($url) ; 
                                        $this->load->library('email');
                                        $this->email->from($FromMail, 'TWG Handicraft');
                                        $this->email->to($rm_email);
                                        $this->email->subject('Account Disapproved');
                                        $this->email->message($file);
                                        $this->email->send();
                             }
                    // ========================================
                  }  	    
                         
			    
			    
				}
				
				else
				{
				    echo "not user" ;
				redirect('Admin/Customers');
				}

				redirect('Admin/Customers');
			
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

//===================Apply_ Discount USER ======

function apply_discount_user($total_discount,$req_id){
    
    //  $total_discount = $this->input->post('total_discount');
    //  $req_id = $this->input->post('req_id');
      
     	$result   = $this->db->get_where('order_detail', array('order_rand_id' => $req_id ,))->result() ;
     	
                        	$a = 1 ;
                             $percent_amount = array();
                              $discount = array() ;
                              
                              
                               foreach ($result as  $value) {
                               
                                   
                                     $total_price+= $value->cart_price ;
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
                           
                        //   print_r($discount) ; 
                        
                        return $discount  ; 
                           

}


//============++Order Place ====================


function placeorder(){
    
      
			    $request_id = $this->input->post('request_id') ;
			  
			    $final_amount = $this->input->post('finalprice') ;
			   
			    $total_discount = $this->input->post('total_discount') ;
			   
			    $sub_total = $this->input->post('sub_total') ;
			    
			    $gst_total = $this->input->post('total_gst') ; 
			    
			   	$due_amount = $this->input->post('due_amount') ; 
			    
			    $carton = $this->input->post('carton') ; 
			    
			    
       //  ======================================
                     $order_details = $this->db->get_where('order_detail', array('order_rand_id' =>$request_id))->result() ;       
         
         foreach ($order_details as $value) {
                
                        $pro_id =  $value->product_id ;
                        $pro_detail=$this->db->get_where('product_detail', array('sku_code' => $pro_id,))->row() ;
                			   
                		$pro_category = $pro_detail->category_id ;
		            	$qntity = $value->quantity;
		            	
			        	$pro_inven_hold = $pro_detail->inventory_hold ;
		        		$pro_availability = $pro_detail->availability ;
            //	===========================
                       
                		$pro_category = $pro_detail->category_id ;
		            	$qntity = $value->quantity;
		            	
		                       
                       $query = $this->db->select_sum('quantity');
                       $query = $this->db->where(array('product_id' =>$pro_id , 'order_status' => 0));
                        $query = $this->db->get('order_detail');
                        $result = $query->result();
                        // print_r($result) ;
                        
                                                                	
                      $hold = $result[0]->quantity ; 
                          
                           
                     if($hold){
                          $holdlow = $result[0]->quantity  ;
                     }else{
                         
                         
                         $holdlow = 0 ;
                     }
                  
		            	$customer_qntity = $value->customer_quantity;
		            	
		        		$pro_availability = $pro_detail->availability ;
			
			        	$net_inventory = $pro_availability - $holdlow ;
// ===========================
	              
	         if($net_inventory < $qntity)
	         {
	          
	           	$this->session->set_flashdata('low_availability', $pro_id);
	           	
	          redirect('Admin/requestdetail/'.$request_id) ;
	             
	             
	         }
                  

			}
// 	==============================================		
			 
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

                           //============update order detail =====
                           $res = array('order_status' => 1 ,'place_order' => 1) ;
                               $this->db->where('order_rand_id', $request_id);
                            $this->db->update('order_detail', $res);

                        //==========================================
        
        //========= Ledger Amount =======
        
        
                            $this->db->where('order_id', $request_id);
                            $this->db->update('ledger_account', $post);
             
 foreach ($order_details as $value) {
                
                        $pro_id =  $value->product_id ;
                        $pro_detail=$this->db->get_where('product_detail', array('sku_code' => $pro_id,))->row() ;
                			   
                		$pro_category = $pro_detail->category_id ;
		            	$qntity = $value->quantity;
		            	
			        	$pro_inven_hold = $pro_detail->inventory_hold ;
		        		$pro_availability = $pro_detail->availability ;
// 			===========================
                       
                		$pro_category = $pro_detail->category_id ;
		            	$qntity = $value->quantity;
		            	$customer_qntity = $value->customer_quantity;
		            	
			        	$pro_inven_hold = $pro_detail->inventory_hold ;
		        		$pro_availability = $pro_detail->availability ;
			
			        	$tot_invent = $pro_inven_hold -  $qntity ;
			
// ===========================
	                 
	                if($tot_invent < 0){
	                    $tot_invent = 0 ; 
	                }
	                	$total_qty['inventory_hold']  = $tot_invent ;  
			        	$total_qty['availability'] = $pro_availability -  $qntity ;
			
			        $this->db->where(array('sku_code' => $pro_id));
                    $this->db->update('product_detail', $total_qty);
                  

			}
			
// 			sms91($mob,$otp);

                $orders =$this->db->get_where('orders', array('order_id' => $request_id,))->row() ;
               $user_id = $orders->user_id ;
               $orderstatus  = $orders->order_type ;
                 $user =$this->db->get_where('customerlogin', array('id' => 2,))->row() ;
                 
                 $Email = $user->email ; 
                
//  if($Email){
// 			        $sub = 'Order Approved by Admin' ;
// 			      $this->email->set_mailtype("html");
//                     $this->email->set_newline("\r\n");  
//                     $url=base_url('Artnhub/ordermailplace?id='.$request_id.'&subject='.$sub);
//               $file=file_get_contents($url) ; 
//                     $this->load->library('email');
//                     $this->email->from('twghandicraft@gmail.com', 'TWG Handicraft');
//                     $this->email->to($Email);
//                     $this->email->subject('Order Approved by Admin');
                    
//                     $this->email->message($file);
//                     //$this->email->attach('http://explacia.in/art/invoice/'.$oid.'.pdf');
//                     $this->email->send();				
        
// 			    }
			 //   exit ;
			 
			 
			   // ================EMAIL===========================
			   
                $orders  = $this->db->get_where('orders', array('order_id' => $request_id ,))->row() ;
                $user_id = $orders->user_id ; 
	            $shipping_charge = $orders->shipping_charge ; 
            	$packing_charge = $orders->packing_charge ; 
	
                  $user  = $this->db->get_where('customerlogin', array('id' => $user_id ,))->row() ;
        		  $mob = $user->phone ;
        		  $name  = $user->Owner ;
        		  $rm_id  = $user->Rm_id ;
        		  $email  = $user->email ;
        		  $user_address   = $this->db->get_where('order_address', array('order_id' => $request_id ,))->row() ;
                  $address = $orders->cutomer_address ; 
        			  
        		   $rm_detail   = $this->db->get_where('rm', array('id' => $rm_id ,))->row() ;
                   $rm_email = $rm_detail->rm_email ; 
                   $rm_mob = $rm_detail->rm_mobile ; 
                   $rm_name = $rm_detail->rm_name ; 
                   
                $admin =  $this->db->get_where('admin_mail', array('id' => 1 ,))->row() ;
                    
                    $FromMail = $admin->send_mail ; 
                    $AdminMail = $admin->admin_mail ; 
                    $admin_mob = $admin->mobile   ;  
                    $admin_name = $admin->name   ;  
                    $show_contact = $admin->show_contact   ;  
  
     
                    $subject= "Order Confirmed" ;
                    $message_contentsms   =  " Hi, ".$name."

                                      Items in your order ".$request_id." ID has been confirmed!
                                     
                                     For Support
                                     Your Account Manager: ".$rm_name."
                                     Contact No.: ".$rm_mob."
                                     Customer support team.
                                     ".$show_contact."
                                     www.twghandicraft.com
                                     Thank you !" ; 
                             
                    $message_content   =  " Hi, ".$name." <br><br>

                                      Items in your order ".$request_id." ID has been confirmed! <br><br>
                                     
                                     For Support <br>
                                     Your Account Manager : ".$rm_name."<br>
                                     Contact No. : ".$rm_mob." <br>
                                     Customer support team.<br>
                                     ".$show_contact." <br>
                                     www.twghandicraft.com <br>
                                     Thank you !" ; 
                             
                    $messagesms = "
                                  ".$name." - ".$address." - ".$mob."
                                 
                                   order ".$request_id." ID has been packed!
                                     Order inclueds
                                     No. of carton ".$carton." no.
                                     Carton Packing Charge ".$packing_charge." INR
                                     Transport Dropping/Courier Charge ".$shipping_charge." INR.
                                     plz contact customer to clear the due payment of ".$due_amount." INR.
                                     
                                     for transporter discuss with customer
                                     
                                     ".$admin_name." & ".$rm_name."" ;
                             
                    $message = "
                                  ".$name." - ".$address." - ".$mob." <br><br>
                                 
                                   order ".$request_id." ID has been packed! <br>
                                     Order inclueds <br>
                                     No. of carton ".$carton." no. <br>
                                     Carton Packing Charge ".$packing_charge." INR<br>
                                     Transport Dropping/Courier Charge ".$shipping_charge." INR. <br>
                                     plz contact customer to clear the due payment of ".$due_amount." INR. <br><br>
                                     
                                     for transporter discuss with customer <br><br>
                                     
                                     ".$admin_name." & ".$rm_name."" ;
                             
                       $subject     = "Order Confirmed" ;
                     
        //   $this->send_email_temp($user_id,$message_content,$message,$subject);
        
              $email_name= "Order_Pending" ; 
                        
                   $this->mailsend($user_id,$email_name,$message_content,$message_contentsms,$message,$messagesms, $subject);
                  

// ===========================================
			    if($orderstatus =='orders'){
			         return  redirect('Admin/orderbystatus/Pending') ;
  
			        
			    }else{
			         return  redirect('Admin/production_pending/Pending') ;
  
			    }
    
}


function save_orderconfirm(){
    
    
    
      
			    $request_id = $this->input->post('request_id') ;
			  
			echo    $final_amount = $this->input->post('finalprice') ;
			   
		echo	    $total_discount = $this->input->post('total_discount') ;
			   
		echo	    $sub_total = $this->input->post('sub_total') ;
			    
		echo	    $gst_total = $this->input->post('total_gst') ; 
			     $remain_amt = $this->input->post('remain_amt') ; 
			    
			 
			 //============update order ================
			 
                                   $post = array(
                                       
                                       'finalamount' =>$final_amount ,
                                    //   'discountcharge'=> $total_discount ,
                                       'subtotal'=> $sub_total ,
                                       'gst_total' => $gst_total ,
                                    
                                       
                                       );
                          //=========update discount======
                                              
                            $this->db->where('order_id', $request_id);
                            $this->db->update('orders', $post);

                           //=================
        
        //========= Ledger Amount =======
        
        
                            $this->db->where('order_id', $request_id);
                            $this->db->update('ledger_account', $post);
                            
                     $order_details = $this->db->get_where('order_detail', array('order_rand_id' =>$request_id))->result() ;       
         
         foreach ($order_details as $value) {
                
                        $pro_id =  $value->product_id ;
                        $pro_detail=$this->db->get_where('product_detail', array('sku_code' => $pro_id,))->row() ;
                			   
                		$pro_category = $pro_detail->category_id ;
		            	$qntity = $value->quantity;
		            	
			        	$pro_inven_hold = $pro_detail->inventory_hold ;
		        		$pro_availability = $pro_detail->availability ;
			
	                	$total_qty['inventory_hold'] = $pro_inven_hold -  $qntity ;
			        	$total_qty['availability'] = $pro_availability -  $qntity ;
			
			        $this->db->where(array('sku_code' => $pro_id));
                    $this->db->update('product_detail', $total_qty);
                  

			}
			
			
// 			=========================


  // ================EMAIL===========================
            $orders  = $this->db->get_where('orders', array('order_id' => $request_id ,))->row() ;
            $user_id = $orders->user_id ; 
	
          $user  = $this->db->get_where('customerlogin', array('id' => $user_id ,))->row() ;
		  $mob = $user->phone ;
		  $name  = $user->Owner ;
		  $rm_id  = $user->Rm_id ;
		  $email  = $user->email ;
		  $user_address   = $this->db->get_where('order_address', array('order_id' => $request_id ,))->row() ;
         $address = $orders->cutomer_address ; 
			  
		   $rm_detail   = $this->db->get_where('rm', array('id' => $rm_id ,))->row() ;
           $rm_email = $rm_detail->rm_email ; 
           $rm_mob = $rm_detail->rm_mobile ; 
           $rm_name = $rm_detail->rm_name ; 
     
             $admin =  $this->db->get_where('admin_mail', array('id' => 1 ,))->row() ;
                    
                    $FromMail = $admin->send_mail ; 
                    $AdminMail = $admin->admin_mail ; 
                    $admin_mob = $admin->mobile   ;  
                    $admin_name = $admin->name   ;  
                     $show_contact = $admin->show_contact   ;  
  
     
     
                    $subject= " Order Information" ;
                    $message_contentsms   =  " Hi, ".$name."
                                           
                                 Check the ordered cart to track any change in products against order ".$request_id." ID.
                                 
                                 For Support
                                 Your Account Manager : ".$rm_name."
                                 Contact No. : ".$rm_mob."
                                 Customer support team. 
                                 ".$show_contact."
                                 www.twghandicraft.com
                                 Thank you !" ; 
                                 
                       $message_content   =  " Hi, ".$name." <br> <br>
                                           
                                 Check the ordered cart to track any change in products against order ".$request_id." ID. <br><br>
                                 
                                 For Support   <br>
                                 Your Account Manager : ".$rm_name."   <br>
                                 Contact No. : ".$rm_mob."   <br>
                                 Customer support team.    <br>
                                 ".$show_contact."         <br>
                                 www.twghandicraft.com    <br>
                                 Thank you !" ; 
                                 
                                 
               $admin =  $this->db->get_where('admin_mail', array('id' => 1 ,))->row() ;
                    
                    $FromMail = $admin->send_mail ; 
                    $AdminMail = $admin->admin_mail ; 
                    $admin_mob = $admin->mobile   ;  
                    $admin_name = $admin->name   ;  

                $messagesms = "
                              ".$name." - ".$address." - ".$mob."
                             
                        
                         Check the ordered cart to track change and contact customer to clear the due payment of ".$remain_amt." INR against order ".$request_id." ID. 
                         
                         ".$admin_name." & ".$rm_name."" ;
                         
                 $message = "
                              ".$name." - ".$address." - ".$mob." <br><br>
                             
                        
                         Check the ordered cart to track change and contact customer to clear the due payment of ".$remain_amt." INR against order ".$request_id." ID. 
                           <br><br>
                       ".$admin_name." & ".$rm_name."" ;
                         
                   $subject     = "Stock Confirmation" ;
     
       $email_name= "Order_Information" ; 
                         
        $this->mailsend($user_id,$email_name,$message_content,$message_contentsms,$message,$messagesms, $subject);
     
// ===========================================
            
// =============================


			 echo "done" ;   
//   return  redirect('Admin/requestdetail/'.$request_id) ;
    

}

//===============Delete Product =======

	public function delete_newproduct(){
	    
	     
	      $sku  = $this->input->post('sku');  
          $ord_id  = $this->input->post('ord_id');   
            
            $old_sku  = $this->input->post('old_sku');   
            
            $req_id  = $this->input->post('req_id'); 
            
             $user_detail  = $this->db->get_where('orders', array('order_id' => $req_id ,))->row() ;
             
             $user_id =  $user_detail->user_id;
      
		$delete = 	$this->db->delete('order_detail', array('user_id' => $user_id , 'product_id' => $sku , 'order_rand_id' => $req_id )); 
//==============
                 $pro_id = $sku ;
                      $pro_detail=$this->db->get_where('product_detail', array('sku_code' => $pro_id,))->row() ;
                	  $value =$this->db->get_where('order_detail', array('product_id' => $pro_id,))->row() ;
                			   
                		$pro_category = $pro_detail->category_id ;
		            	$qntity = $value->quantity;
		            	
			        	$pro_inven_hold = $pro_detail->inventory_hold ;
		        		$pro_availability = $pro_detail->availability ;
			
	                	$total_qty['inventory_hold'] = $pro_inven_hold -  $qntity ;
			        	// $total_qty['availability'] = $pro_availability -  $qntity ;
			
			        $this->db->where(array('sku_code' => $pro_id));
                    $this->db->update('product_detail', $total_qty);
                  
//=========================
			
			if($delete){
			    
			    echo "delete" ;
			}
			else{
			    
			    echo "not delete" ; 
			}
			

			}

//=================Clickshipped =======================

 	public function clickshipped(){
				is_admin();


	$req_id = $this->input->post('req_id');	
	$user_id = $this->input->post('user_id');
	
		$finalamount = $this->input->post('finalamount');
		
	$parter_name = $this->input->post('parter_name');
	$track_id = $this->input->post('track_id');
	$parter_contact = $this->input->post('parter_contact');
	$date = $this->input->post('date');
	$mode = $this->input->post('mode');
	$bilty_amt = $this->input->post('bilty_amt');
	
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
               	redirect('Admin/orderbystatus/ReadyShipped');
            }
            else {
	
	
	$img =  $this->upload->data();
	$image_path =  base_url("assets/order_process/".$img['file_name']); 
	//=====================
	
		 $data = array(
		 	 'parter_name'    => $parter_name ,
		 	 'parter_contact' =>$parter_contact,
		 	//  'track_id' => $track_id ,
		 	 'Bilty_no'      => $track_id ,
		 	 'shipment_date' =>$date ,
		     'order_status'  =>'Shipped',
		 	 'trasnport_document' => $image_path ,
        	 'bilty_amount'     => $bilty_amt ,
        	
		 );
		 
		 
		 if($mode=='Transport'){
		     
		     $data['transport_Delivery_Point']  = $this->input->post('Delivery_Point');
		 }
		 
		 
// 		 print_r($data) ;
		 
// 		 exit ;
		 
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
	    	
                                           
  // ================EMAIL===========================
             $orders =$this->db->get_where('orders', array('order_id' => $req_id,))->row() ;
              $user_id = $orders->user_id ;
                $address = $orders->cutomer_address ; 
	
        		$invoice_id = $orders->invoice_id ; 
        	    $packing_charge = $orders->packing_charge ; 
                $carton = ($packing_charge/350) ; 
      
          $user  = $this->db->get_where('customerlogin', array('id' => $user_id ,))->row() ;
		  $mob = $user->phone ;
		  $name  = $user->Owner ;
		  $rm_id  = $user->Rm_id ;
		  $email  = $user->email ;
		 
			  
		   $rm_detail   = $this->db->get_where('rm', array('id' => $rm_id ,))->row() ;
           $rm_email = $rm_detail->rm_email ; 
           $rm_mob = $rm_detail->rm_mobile ; 
           $rm_name = $rm_detail->rm_name ; 
     
                $admin =  $this->db->get_where('admin_mail', array('id' => 1 ,))->row() ;
                    
                $FromMail = $admin->send_mail ; 
                $AdminMail = $admin->admin_mail ; 
                $admin_mob = $admin->mobile   ;  
	            $admin_name = $admin->name   ;  
	            $show_contact = $admin->show_contact   ;  
  
     
                
                                         $transport_Delivery_Point = $orders->transport_Delivery_Point ;
                                         $parter_name = $orders->parter_name ;
                                         $Bilty_no = $orders->Bilty_no ; 
                                         $bilty_amount= $orders->bilty_amount ;
                                         $parter_contact = $orders->parter_contact ;
                                         $invoice_file = $orders->invoice_file ;
                                        $trasnport_document = $orders->trasnport_document ;
                                       
                $message_contentsms   =  "
                                         Hi, ".$name."
                                     Items in your order ".$req_id." ID has shipped on 09-Feb-2021 and it will arrive to you soon.
                                     Your ".$carton." no of carton booked with transporter. Detail mention below
                                     Transport Delivery Point : ".$transport_Delivery_Point."
                                     Transporter Name : ".$parter_name."
                                     Transporter Bilty No. : ".$Bilty_no."
                                     Bilty Amount : ".$bilty_amount." INR
                                     Transporter Contact No. : ".$parter_contact."
                                     Please check the attached generated Invoice ".$invoice_id." ID and Bilty No".$Bilty_no.".
                                     For Support
                                     Your Account Manager: ".$rm_name."
                                     Contact No.: ".$rm_mob."
                                     Customer support team. 
                                     ".$show_contact."
                                     www.twghandicraft.com
                                     Thank you !" ; 
                 $message_content   =  "
                                         Hi, ".$name." <br><br>
                                         
                                  
                                     Items in your order ".$req_id." ID has shipped on 09-Feb-2021 and it will arrive to you soon. <br>
                                     Your ".$carton." no of carton booked with transporter. Detail mention below <br>
                                     Transport Delivery Point : ".$transport_Delivery_Point." <br>
                                     Transporter Name : ".$parter_name." <br>
                                     Transporter Bilty No. : ".$Bilty_no." <br>
                                     Bilty Amount : ".$bilty_amount." INR   <br>
                                     Transporter Contact No. : ".$parter_contact."  <br><br>
                                     
                                     Please check the attached generated Invoice ".$invoice_id." ID and Bilty No".$Bilty_no.". <br><br>
                                     
                                     For Support
                                     Your Account Manager: ".$rm_name." <br>
                                     Contact No.: ".$rm_mob." <br>
                                     Customer support team.  <br>
                                     ".$show_contact."    <br>
                                     www.twghandicraft.com  <br>
                                     Thank you !" ; 
                                         
                                         $shipment_date= $orders->shipment_date ; 
                                      
                    $messagesms = "
                                  ".$name." - ".$address." - ".$mob."
                                  Items in customer's order ".$req_id." ID has shipped on ".$shipment_date.".
                                 Transport Details are :
                                Transport Delivery Point : ".$transport_Delivery_Point."
                                 Transporter Name : ".$parter_name."
                                 Transporter Bilty No. : ".$Bilty_no."
                                 Bilty Amount : ".$bilty_amount." INR
                                 Transporter Contact No. : ".$parter_contact."
                                 Plz check the attached generated Invoice ".$invoice_id." ID and Bilty Number ".$Bilty_no.".
                                 ".$admin_name." & ".$rm_name."" ;
             
                    $message = "
                                  ".$name." - ".$address." - ".$mob." <br><br>
                                 
              Items in customer's order ".$req_id." ID has shipped on ".$shipment_date.". <br>
            Transport Details are : <br> 
            Transport Delivery Point : ".$transport_Delivery_Point."  <br>
             Transporter Name : ".$parter_name."  <br>
             Transporter Bilty No. : ".$Bilty_no." <br>
             Bilty Amount : ".$bilty_amount." INR  <br>
             Transporter Contact No. : ".$parter_contact."  <br><br>
                                               
             Plz check the attached generated Invoice ".$invoice_id." ID and Bilty Number ".$Bilty_no.". <br> <br>
             
             
             ".$admin_name." & ".$rm_name."" ;
             
       //   $this->send_email_temp($user_id,$message_content,$message,$subject);
                  $subject= "Shipped " ;
                $email_name= "Order_Shipped" ;
          
            $this->mailsend_ship($user_id,$email_name,$message_content,$message_contentsms,$message,$messagesms, $subject ,$invoice_file,$trasnport_document);
   
           

// ===========================================
     
       //====================== 
				redirect('Admin/orderbystatus/Shipped');
			
		}
		
 	    
 	}
			
		public function email_shipped($request_id){
				is_admin();


	   // ================EMAIL===========================
			   
                $orders  = $this->db->get_where('orders', array('order_id' => $request_id ,))->row() ;
                $user_id = $orders->user_id ; 
	            $shipping_charge = $orders->shipping_charge ; 
            	$packing_charge = $orders->packing_charge ; 
	
                  $user  = $this->db->get_where('customerlogin', array('id' => $user_id ,))->row() ;
        		  $mob = $user->phone ;
        		  $name  = $user->Owner ;
        		  $rm_id  = $user->Rm_id ;
        		  $email  = $user->email ;
        		  $user_address   = $this->db->get_where('order_address', array('order_id' => $request_id ,))->row() ;
                  $address = $orders->cutomer_address ; 
        			  
        		   $rm_detail   = $this->db->get_where('rm', array('id' => $rm_id ,))->row() ;
                   $rm_email = $rm_detail->rm_email ; 
                   $rm_mob = $rm_detail->rm_mobile ; 
                   $rm_name = $rm_detail->rm_name ; 
                   
                $admin =  $this->db->get_where('admin_mail', array('id' => 1 ,))->row() ;
                    
                    $FromMail = $admin->send_mail ; 
                    $AdminMail = $admin->admin_mail ; 
                    $admin_mob = $admin->mobile   ;  
                    $admin_name = $admin->name   ;  
                    $show_contact = $admin->show_contact   ;  
  
     
                                         $transport_Delivery_Point = $orders->transport_Delivery_Point ;
                                         $parter_name = $orders->parter_name ;
                                         $Bilty_no = $orders->Bilty_no ; 
                                         $bilty_amount= $orders->bilty_amount ;
                                         $parter_contact = $orders->parter_contact ;
                                       
                $message_contentsms   =  "
                                         Hi, ".$name."
                                     Items in your order ".$req_id." ID has shipped on 09-Feb-2021 and it will arrive to you soon.
                                     Your ".$carton." no of carton booked with transporter. Detail mention below
                                     Transport Delivery Point : ".$transport_Delivery_Point."
                                     Transporter Name : ".$parter_name."
                                     Transporter Bilty No. : ".$Bilty_no."
                                     Bilty Amount : ".$bilty_amount." INR
                                     Transporter Contact No. : ".$parter_contact."
                                     Please check the attached generated Invoice ".$invoice_id." ID and Bilty No".$Bilty_no.".
                                     For Support
                                     Your Account Manager: ".$rm_name."
                                     Contact No.: ".$rm_mob."
                                     Customer support team. 
                                     ".$show_contact."
                                     www.twghandicraft.com
                                     Thank you !" ; 
                 $message_content   =  "
                                         Hi, ".$name." <br><br>
                                         
                                  
                                     Items in your order ".$req_id." ID has shipped on 09-Feb-2021 and it will arrive to you soon. <br>
                                     Your ".$carton." no of carton booked with transporter. Detail mention below <br>
                                     Transport Delivery Point : ".$transport_Delivery_Point." <br>
                                     Transporter Name : ".$parter_name." <br>
                                     Transporter Bilty No. : ".$Bilty_no." <br>
                                     Bilty Amount : ".$bilty_amount." INR   <br>
                                     Transporter Contact No. : ".$parter_contact."  <br><br>
                                     
                                     Please check the attached generated Invoice ".$invoice_id." ID and Bilty No".$Bilty_no.". <br><br>
                                     
                                     For Support
                                     Your Account Manager: ".$rm_name." <br>
                                     Contact No.: ".$rm_mob." <br>
                                     Customer support team.  <br>
                                     ".$show_contact."    <br>
                                     www.twghandicraft.com  <br>
                                     Thank you !" ; 
                                         
                                         $shipment_date= $orders->shipment_date ; 
                                      
                    $messagesms = "
                                  ".$name." - ".$address." - ".$mob."
                                  Items in customer's order ".$req_id." ID has shipped on ".$shipment_date.".
                                 Transport Details are :
                                Transport Delivery Point : ".$transport_Delivery_Point."
                                 Transporter Name : ".$parter_name."
                                 Transporter Bilty No. : ".$Bilty_no."
                                 Bilty Amount : ".$bilty_amount." INR
                                 Transporter Contact No. : ".$parter_contact."
                                 Plz check the attached generated Invoice ".$invoice_id." ID and Bilty Number ".$Bilty_no.".
                                 ".$admin_name." & ".$rm_name."" ;
             
                    $message = "
                                  ".$name." - ".$address." - ".$mob." <br><br>
                                 
              Items in customer's order ".$req_id." ID has shipped on ".$shipment_date.". <br>
            Transport Details are : <br> 
            Transport Delivery Point : ".$transport_Delivery_Point."  <br>
             Transporter Name : ".$parter_name."  <br>
             Transporter Bilty No. : ".$Bilty_no." <br>
             Bilty Amount : ".$bilty_amount." INR  <br>
             Transporter Contact No. : ".$parter_contact."  <br><br>
                                               
             Plz check the attached generated Invoice ".$invoice_id." ID and Bilty Number ".$Bilty_no.". <br> <br>
             
             
             ".$admin_name." & ".$rm_name."" ;
             
                                     
                       $subject     = "Shipped Confirmed" ;
                     
        //   $this->send_email_temp($user_id,$message_content,$message,$subject);
        
              $email_name= "Order_Shipped" ; 
                        
                   $this->mailsend($user_id,$email_name,$message_content,$message_contentsms,$message,$messagesms, $subject);
                  
                  
                  echo "done"  ;

// ===========================================

                }
		public function modifyclickshipped(){
				is_admin();


	$req_id = $this->input->post('req_id');	
	$user_id = $this->input->post('user_id');
	
		$finalamount = $this->input->post('finalamount');
		
	$parter_name = $this->input->post('parter_name');
	$track_id = $this->input->post('track_id');
	$parter_contact = $this->input->post('parter_contact');
	$date = $this->input->post('date');
	$mode = $this->input->post('mode');
	
	
	 $data = array(
		 	 'parter_name' => $parter_name ,
		 	 'parter_contact' =>$parter_contact,
		 	 'Bilty_no' => $track_id ,
		 	 'shipment_date'=>$date ,
		   
		 	//  'trasnport_document' => $image_path ,
		 );
		 
	//==================Upload img =========
	
	      $file_name ='upload_file';
        $files = $_FILES['upload_file'];
        
          if(!empty($_FILES["upload_file"]["name"])){
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
                
               	redirect('Admin/order_detail_confirm/'.$req_id);
            }
            else {
                
                
	$img =  $this->upload->data();
	$image_path =  base_url("assets/order_process/".$img['file_name']); 
	//=====================
	
	$data['trasnport_document'] =  $image_path ;

            }
            
          }
  
		 if($mode=='Transport'){
		     
		     $data['transport_Delivery_Point']  = $this->input->post('Delivery_Point');
		 }
		 
				$this->db->where('order_id', $req_id);
                $this->db->update('orders', $data);
                
     
				redirect('Admin/order_detail_confirm/'.$req_id);
			
		
		
 	    
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
               
               	redirect('Admin/orderbystatus/Pending');
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
		 	'checked_by'=>$this->input->post('checked_by') ,
		 	'order_status'=>'Readyshipped',
		 	
		 );
				
				$this->db->where('order_id', $req_id);
                $this->db->update('orders', $data);
         
        //  ==========================
        
            $orders =$this->db->get_where('orders', array('order_id' => $req_id,))->row() ;
               $user_id = $orders->user_id ;
                $address = $orders->cutomer_address ; 
	
		$invoice_id = $orders->invoice_id ; 
	    $packing_charge = $orders->packing_charge ; 
$carton = $packing_charge/350 ; 
                 $user =$this->db->get_where('customerlogin', array('id' => $user_id,))->row() ;
                 $Email = $user->email ; 
                 
  // ================EMAIL===========================
        
          $user  = $this->db->get_where('customerlogin', array('id' => $user_id ,))->row() ;
		  $mob = $user->phone ;
		  $name  = $user->Owner ;
		  $rm_id  = $user->Rm_id ;
		  $email  = $user->email ;
	
		   $rm_detail   = $this->db->get_where('rm', array('id' => $rm_id ,))->row() ;
           $rm_email = $rm_detail->rm_email ; 
           $rm_mob = $rm_detail->rm_mobile ; 
           $rm_name = $rm_detail->rm_name ; 
           
                $admin =  $this->db->get_where('admin_mail', array('id' => 1 ,))->row() ;
                    $FromMail = $admin->send_mail ; 
                    $AdminMail = $admin->admin_mail ; 
                    $admin_mob = $admin->mobile   ;  
				    $admin_name = $admin->name   ;  
				     $show_contact = $admin->show_contact   ;  
  
      
        $subject= "Order Ready to ship" ;
        $message_contentsms   =  "
                             Hi, ".$name."
                            
                             Items in your order  ".$req_id." ID has been packed in ".$carton." No. of Cartons and order is ready to dispatch.
                             
                             We will ship your order soon. Please check the attached generated Invoice ".$invoice_id." ID.
                             
                             For Transporter Detail
                             Your Account Manager : ".$rm_name."
                             Contact No. : ".$rm_mob."
                             Customer support team. 
                             ".$show_contact."
                             ".$orders->invoice_file."
                             Thank you !" ; 
  $message_content   =  "
                             Hi, ".$name." <br> <br>
                            
                             Items in your order  ".$req_id." ID has been packed in ".$carton." No. of Cartons and order is ready to dispatch. <br> <br>
                             
                             We will ship your order soon. Please check the attached generated Invoice ".$invoice_id." ID. <br><br>
                             
                             For Transporter Detail <br>
                             Your Account Manager : ".$rm_name."<br>
                             Contact No. : ".$rm_mob." <br>
                             Customer support team. <br>
                             ".$show_contact."   <br>
                             ".$orders->invoice_file." <br>
                             Thank you !" ; 
 
    $messagesms = "
                  ".$name." - ".$address." - ".$mob."

                     Items in Customer's order ".$req_id." ID has been packed in ".$carton." No. of Cartons and order is ready to dispatch
                     Invoice Detail: ".$invoice_id." ID.
                    ".$orders->invoice_file."
                     
                     for transporter discuss with customer
                     
                     ".$admin_name." & ".$rm_name."" ;
                                     
    $message = "
                  ".$name." - ".$address." - ".$mob." <br><br>

 Items in Customer's order ".$req_id." ID has been packed in ".$carton." No. of Cartons and order is ready to dispatch <br>
 Invoice Detail: ".$invoice_id." ID. <br>
".$orders->invoice_file." <br><br>
 
 for transporter discuss with customer <br><br>
 
 ".$admin_name." & ".$rm_name."" ;
                 
    //   $this->send_email_temp($user_id,$message_content,$message,$subject);
        $email_name= "Order_Readyship" ; 
        
        $file_link = $orders->invoice_file ; 
                         
        $this->mailsend_att($user_id,$email_name,$message_content,$message_contentsms,$message,$messagesms, $subject ,$file_link);
                 

// ===========================================
                
                
//  if($Email){
			        
// 		  $sub = 'Order Ready to Shipped' ;
// 			      $this->email->set_mailtype("html");
//                     $this->email->set_newline("\r\n");  
//                     $url=base_url('Artnhub/ordermailplace?id='.$req_id.'&subject='.$sub);
//                     //   $url=base_url('Artnhub/ordermailplace?id='.$req_id);
//                     $file=file_get_contents($url) ; 
//                     $this->load->library('email');
//                     $this->email->from('twghandicraft@gmail.com', 'TWG Handicraft');
//                     $this->email->to($Email);
//                     $this->email->subject('Order Ready to Shipped');
                    
//                     $this->email->message($file);
//                     //$this->email->attach('http://explacia.in/art/invoice/'.$oid.'.pdf');
//                     $this->email->send();
        
// 			    }
			    
        //======================
                 
			
			redirect('Admin/orderbystatus/ReadyShipped');
		}
		
			    
			}
			
			
			
			public function modifyshipped_done(){
			    
			$req_id = $this->input->post('req_id') ;
			
			
		//==================Upload img =========
	
	
		 $data = array(
		 	//  'invoice_file' => $image_path ,
		 	 
		 	'invoice_id'=>$this->input->post('invoice_no'),
		 	'invoice_date'=>$this->input->post('date') ,
		 	'packed_by'=>$this->input->post('packed_by') ,
		 	'checked_by'=>$this->input->post('checked_by') ,
		 	// 'order_status'=>'Readyshipped',
		 	
		 );
	     
        $files = $_FILES['invoice_file'];
        
          if(!empty($_FILES["invoice_file"]["name"])){
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
               
               	redirect('Admin/order_detail_confirm/'.$req_id);
            }
            else {  
                
                	//=====================
        	
        	$img =  $this->upload->data();
        	$image_path =  base_url("assets/invoice_upload/".$img['file_name']); 
        
        
                        $data['invoice_file'] =$image_path ;
                        
            }
          }
            
	    date_default_timezone_set('Asia/Kolkata');
       $currentTime = date( 'Y-m-d h:i:s A', time () );
   
				$this->db->where('order_id', $req_id);
                $this->db->update('orders', $data);
                 
			
				redirect('Admin/order_detail_confirm/'.$req_id);
		
			    
			}
			
			
	public function cancelled_done(){
			    
			$req_id = $this->input->post('req_id') ;
			
			$reason = $this->input->post('cancle_reason') ;
			
			
		 $data = array(
		 	 
		 	'order_status'=>'Cancelled',
		 	'cancle_reason'=>$this->input->post('cancle_reason') ,
		 );
		 	
		 	 $post = array(
		 	 
		 	'order_status'=>2,
		 	
		 );
		 
				
				$this->db->where('order_id', $req_id);
                $this->db->update('orders', $data);
                 
               	$this->db->where('order_rand_id', $req_id);
                $this->db->update('order_detail', $post);
                 
                 
                // =================================
                
                	$result   = $this->db->get_where('order_detail', array('order_rand_id' => $req_id ,))->result() ;
	    	    	//========================
	    	    	$a = 1 ; 
	    	    	$percent_amount = array() ;
	    	    	$discount = array() ; 
	    	    	   foreach($result as  $amount){
                               
                         //=================
                        $pro_id =  $amount->product_id ;
                        $pro_detail=$this->db->get_where('product_detail', array('sku_code' => $pro_id,))->row() ;
                			   
                		$pro_category = $pro_detail->category_id ;
		            	$qntity = $amount->quantity;
		            	$customer_qntity = $amount->customer_quantity;
		            	
			        	$pro_inven_hold = $pro_detail->inventory_hold ;
		        		$pro_availability = $pro_detail->availability ;
			
	                	$total_qty['availability'] = $pro_availability +  $qntity ;
	               
			        	 $total_inventory = $pro_inven_hold -  $qntity ;
			
			if($total_inventory < 0){
			     $total_inventory =0 ;
			    
			}
			
			$total_qty['inventory_hold'] = $total_inventory;
			
			        $this->db->where(array('sku_code' => $pro_id));
                    $this->db->update('product_detail', $total_qty);
                      
                                       
                            $a++ ;      
                           }
                           
	    	    	
	    	    	//=======================
                 
                  //  ==========================
        
            $orders =$this->db->get_where('orders', array('order_id' => $req_id,))->row() ;
               $user_id = $orders->user_id ;
               
                 $user =$this->db->get_where('customerlogin', array('id' => $user_id,))->row() ;
                 
                 $Email = $user->email ; 
                
                // ===========
                                    
  // ================EMAIL===========================
        
          $user  = $this->db->get_where('customerlogin', array('id' => $user_id ,))->row() ;
		  $mob = $user->phone ;
		  $name  = $user->Owner ;
		  $rm_id  = $user->Rm_id ;
		  $email  = $user->email ;
		    $address = $orders->cutomer_address ; 
	
			  
		   $rm_detail   = $this->db->get_where('rm', array('id' => $rm_id ,))->row() ;
           $rm_email = $rm_detail->rm_email ; 
           $rm_mob = $rm_detail->rm_mobile ; 
           $rm_name = $rm_detail->rm_name ; 
           
              $admin =  $this->db->get_where('admin_mail', array('id' => 1 ,))->row() ;
                    
                    $FromMail = $admin->send_mail ; 
                    $AdminMail = $admin->admin_mail ; 
                    $admin_mob = $admin->mobile   ;  
                    $admin_name = $admin->name   ;  
                     $show_contact = $admin->show_contact   ;  
  
     
     
        $subject= "Order Cancelled" ;
                    $message_contentsms   =  "
                                             Hi, ".$name."
                                            
                                             Sorry for the inconviniance, your order ".$req_id." ID has been cancelled due to
                                              ".$orders->cancle_reason."
                                              
                                             For Support
                                             Your Account Manager: ".$rm_name."
                                             Contact No.: ".$rm_mob."
                                             Customer support team. 
                                             ".$show_contact."
                                             www.twghandicraft.com
                                             Thank you !" ; 
 
                    $message_content   =  "
                                             Hi, ".$name." <br><br>
                                            
                                             Sorry for the inconviniance, your order ".$req_id." ID has been cancelled due to
                                              ".$orders->cancle_reason." <br> <br>
                                              
                                             For Support <br>
                                             Your Account Manager : ".$rm_name." <br>
                                             Contact No. : ".$rm_mob." <br>
                                             Customer support team.  <br>
                                             ".$show_contact." <br>
                                             www.twghandicraft.com <br>
                                             Thank you !" ; 
 
                    $messagesms = "
                                  ".$name." - ".$address." - ".$mob."
                                
                                 One order ".$req_id." ID has been cancelled due to
                                  ".$orders->cancle_reason."
                                 
                                 Admin & RM Member" ;
                                 
                    $message = "
                                  ".$name." - ".$address." - ".$mob." <br><br>
                                
                                 One order ".$req_id." ID has been cancelled due to
                                  ".$orders->cancle_reason." <br> <br>
                                 
                                  ".$admin_name." & ".$rm_name."" ;
                 
      $this->send_email_temp($user_id,$message_content,$message,$subject);

// ===========================================
     
                
                
//  if($Email){
			        
// 		  $sub = 'Order Cancelled' ;
// 			      $this->email->set_mailtype("html");
//                     $this->email->set_newline("\r\n");  
//                     $url=base_url('Artnhub/ordermailplace?id='.$req_id.'&subject='.$sub);
//                     // $url=base_url('Artnhub/ordermailplace?id='.$req_id);
//                     $file=file_get_contents($url) ; 
//                     $this->load->library('email');
//                     $this->email->from('twghandicraft@gmail.com', 'TWG Handicraft');
//                     $this->email->to($Email);
//                     $this->email->subject('Order Cancelled');
                    
//                     $this->email->message($file);
//                     //$this->email->attach('http://explacia.in/art/invoice/'.$oid.'.pdf');
//                     $this->email->send();
        
// 			    }
			    
        //======================
                 
// 			echo "cancel" ;
 			redirect('Admin/CancelledorderList/cancelled');
			}
			
	
		public function Delivered_done($req_id){
			    
			
		 $data = array(
		 	 
		 	'order_status'=>'Delivered',
		 	'delivery_date'=>date("Y-m-d") ,
		 	
		 );
				
				$this->db->where('order_id', $req_id);
                $this->db->update('orders', $data);
              //  ==========================
        
           $orders =$this->db->get_where('orders', array('order_id' => $req_id,))->row() ;
               $user_id = $orders->user_id ;
               
                 $user =$this->db->get_where('customerlogin', array('id' => 2,))->row() ;
                 
                 $Email = $user->email ; 
                
                // ===========
                
  
  // ================EMAIL===========================
            $admin =  $this->db->get_where('admin_mail', array('id' => 1 ,))->row() ;
                    $FromMail = $admin->send_mail ; 
                    $AdminMail = $admin->admin_mail ; 
                    $admin_mob = $admin->mobile   ;  
				    $admin_name = $admin->name   ;  
				     $show_contact = $admin->show_contact   ;  
  
          $user  = $this->db->get_where('customerlogin', array('id' => $user_id ,))->row() ;
		  $mob = $user->phone ;
		  $name  = $user->Owner ;
		  $rm_id  = $user->Rm_id ;
		  $email  = $user->email ;
			  
		   $rm_detail   = $this->db->get_where('rm', array('id' => $rm_id ,))->row() ;
           $rm_email = $rm_detail->rm_email ; 
           $rm_mob = $rm_detail->rm_mobile ; 
           $rm_name = $rm_detail->rm_name ; 
     
     
        $subject= "Payment Verified" ;
        $email_name= "Payment_Verified" ;
        $message_content   =  "
                 Hi, ".$name."
                 
                 Your payment of $advance INR with tr. ref. no. ".$oline_trid." ".$UTRID." against order ".$req_id." ID has been received in our accounts. 
                 
                 For Support
                 Your Account Manager : ".$rm_name."
                 Contact No. : ".$rm_mob."
                 Customer support team. 
                 ".$show_contact."
                 www.twghandicraft.com
                 Thank you !" ; 
 
      $message_content   =  "
                 Hi, ".$name." <br><br>
                 
                Your payment of $advance INR with tr. ref. no. ".$oline_trid." ".$UTRID." against order ".$req_id." ID has been received in our accounts. 
                 <br> <br>
                 <br>
                 For Support <br>
                 Your Account Manager : ".$rm_name." <br>
                 Contact No. : ".$rm_mob." <br>
                 Customer support team.  <br>
                 ".$show_contact." <br>
                 www.twghandicraft.com <br>
                 Thank you !" ; 
 
    $messagesms = "
                  ".$name." - ".$_SESSION['cutomer_address']." - ".$mob."
                 payment of ".$advance." INR  with tr. ref. no. ".$oline_trid." ".$UTRID."  against order ".$req_id." ID is verified. Push order to go ahead for stock check ".$admin_name." & ".$rm_name.""  ;
                 
   $message = "
                  ".$name." - ".$_SESSION['cutomer_address']." - ".$mob." <br> <br>
                 
                             
                  payment of ".$advance." INR  with tr. ref. no. ".$oline_trid." ".$UTRID."  against order ".$req_id." ID is verified. Push order to go ahead for stock check  <br><br>
                 
                 ".$admin_name." & ".$rm_name.""  ;
                 
    //   $this->send_email_temp($user_id,$message_content,$message,$subject);
    
      $this->mailsend($user_id,$email_name,$message_content,$message_contentsms,$message,$messagesms, $subject);
                 

// ===========================================
               
     
//  if($Email){
			        
// 		  $sub = 'Order Delievered' ;
// 			      $this->email->set_mailtype("html");
//                     $this->email->set_newline("\r\n");  
//                     $url=base_url('Artnhub/ordermailplace?id='.$req_id.'&subject='.$sub);
//                       $url=base_url('Artnhub/ordermailplace?id='.$req_id);
//                     $file=file_get_contents($url) ; 
//                     $this->load->library('email');
//                     $this->email->from('twghandicraft@gmail.com', 'TWG Handicraft');
//                     $this->email->to($Email);
//                     $this->email->subject('Order Delievered');
                    
//                     $this->email->message($file);
//                     //$this->email->attach('http://explacia.in/art/invoice/'.$oid.'.pdf');
//                     $this->email->send();
        
// 			    }
			    
			 //   exit ;
			    
			
			redirect('Admin/orderbystatus/Delievered');
			}
			
//================INVOICE Generate======================

public function invoicegenerate(){

     date_default_timezone_set('Asia/Kolkata');
    $currentTime = date( 'Y-m-d h:i:s A', time () );
    
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
    
    $url=base_url('Admin/bulkorderinvoice?id='.$oid);
    
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
   

	$this->load->view('Admin/bulkorderinvoice.php',$data);
	}
	
	//======+Self Order =============
	
	
	
	 public function neworder_genrated(){
                is_admin();
                
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
            	
            	$this->load->view('Admin/genrate_selforder.php',$data);
            	}else{
            	    
            	    redirect('Admin/neworder') ; 
            	    
            	}
	 }
	 
	 	 public function neworder_genrated_get($mob){
                is_admin();
                
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
            	
            	$this->load->view('Admin/genrate_selforder.php',$data);
            	}else{
            	    
            	    redirect('Admin/neworder') ; 
            	    
            	}
	 }
	 
	 
	 	 public function productiongenrated($mob){ 
                is_admin();
                
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
            	
            	$this->load->view('Admin/genrate_production_order.php',$data);  	
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
			    	redirect('Admin/neworder_genrated_get/'.$mob);
			    
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
				
				
				redirect('Admin/neworder_genrated_get/'.$mob);
					
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
                
                	redirect('Admin/neworder_genrated_get/'.$mob);
					  
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
// 			    	redirect('Admin/productiongenrated/'.$mob);
			    
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
					
						redirect('Admin/productiongenrated/'.$mob);
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
                
                
                redirect('Admin/productiongenrated/'.$mob);
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

				is_admin();
				 $check = $this->check_url('customer') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				$type = $this->input->post('type') ;
		    	$rm_id  = $this->input->post('rm_id') ;
				
				if($type== 'Pending_Approval'){
				    
				    $where = 'valid' ;
				    $id = 0 ;
				    
				    $data['messa'] = $this->Adminmodel->Customer_pending($rm_id);
				    $data['type'] = $type ; 
				
				}
				elseif($type== 'All' && $rm_id == 'All'){
				    
				    redirect('Admin/Customers');
				    
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
		
				$this->load->view('Admin/customer.php',$data);

			}
	
	
	//=================Sale ===============
	
	
        public function sales_detailed(){
            
            //  $data['result'] = $this->db->get('orders')->result();
            
             is_admin();
        
             $check = $this->check_url('sales_detailed') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
             
             $data['result'] =  $this->db->get_where('orders' , array('order_status !=' => 'Cancelled'))->result();
             
             
            $this->load->view('Admin/sales_detailed.php',$data);
         }
        public function sales_summary(){
             is_admin();
        
             $check = $this->check_url('sales_detailed') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
            
             $data['result'] =  $this->db->get_where('orders' , array('order_status !=' => 'Cancelled'))->result();
            $this->load->view('Admin/sales_summary.php',$data);
        }
        public function sku_sales_summary(){
             is_admin();
        
             $check = $this->check_url('sales_detailed') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
              $data['result'] = $this->db->get('product_detail')->result(); 
            $this->load->view('Admin/sku_sales_summary.php',$data);
        }
        
        function sales_detail_filter(){
            
				
				 is_admin();
        
             $check = $this->check_url('sales_detailed') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				$type = $this->input->post('type') ;
		    	$cat_date  = $this->input->post('cat_date') ;
		    	$rm_id  = $this->input->post('rm_id') ;
		    	 $data['rm_id'] = $rm_id ; 
		    	$order_status = $this->input->post('order_status') ;
		    	 $data['order_status'] = $order_status ; 
		    	$search = trim($this->input->post('search')) ; 
		    	
		    	 $first_date = $this->input->post('date1');
                 $second_date = $this->input->post('date2');
        
		    
		   		if($cat_date== "Today"){
				    
				    	$date=date("Y-m-d");

				}elseif($cat_date== "Weekly"){
				    
				    $date   =  date('Y-m-d', strtotime("-7 days"));  
				    
				}elseif($cat_date== "Monthly"){
				    
				    $date   =  date('Y-m-d', strtotime("-30 days"));  
				    
				}elseif($cat_date== "custom"){
				    
				    $date   =  'custom';  
				    
				}else{
				    
				    $date = '' ; 
				}
				
					$data['cat_date'] = $cat_date ;
		
			
			
			if($type == 'Name'){
			    
			        $data['type'] = $type ; 
			    	$data['search'] = $search ; 
			    
			     $name = $this->input->post('search') ; 
			     
			     $user = $this->db->get_where('customerlogin' , array('Owner' => $name))->row();
			     
			     $where = 'user_id' ;
			     $search =  $user->id; 
			     
			     if($date == 'custom'){
				      
     	$data['result']=$this->Adminmodel->filterdatesales($where , $search ,$first_date,$second_date ,$rm_id , $order_status);
				        
				    }else{
			     
			   $data['result'] = $this->Adminmodel->sale_detail_filter( $where , $search ,$date ,$rm_id ,$order_status);
			    
				    }
				  
			}
	    	elseif($type == 'Moblie'){
	    	    
	    	   	$data['search'] = $search ; 
			     $name = trim($this->input->post('search_phone')) ; 
			     
			      $data['type'] = $type ; 
			     
			     $user = $this->db->get_where('customerlogin' , array('phone' => $name))->row();
			    
			     $where = 'user_id' ;
			     $search =  $user->id; 
			     
			     if($date == 'custom'){
				      
        	$data['result']=$this->Adminmodel->filterdatesales($where , $search ,$first_date,$second_date ,$rm_id , $order_status);
				        
				    }else{
			     
			$data['result'] = $this->Adminmodel->sale_detail_filter( $where , $search ,$date ,$rm_id ,$order_status);
			    
				    } 
			      
		
			}elseif($type== 'All' && $cat_date == 'All' && $rm_id == 'All' && $order_status == 'All'){
			    
			     if($date == 'custom'){
				      
        	$data['result']=$this->Adminmodel->filterdatesales($where , $search ,$first_date,$second_date ,$rm_id , $order_status);
				        
				    }
				    
				    redirect('Admin/sales_detailed');
				    
				}else{
				    
				   
				    $where = $type ;
				    $data['search'] = $search ; 
				    
				    if($type=='order_id'){
				        
				        $search =$this->input->post('search_order') ;
				        
				    }elseif($type=='invoice_id'){
				        
				         $search =$this->input->post('search_invoice') ;
				    }
				    
				   if($date == 'custom'){
				      
				     
        	$data['result']=$this->Adminmodel->filterdatesales($where , $search ,$first_date,$second_date ,$rm_id , $order_status);
				        
				    }else{
			     
			$data['result'] = $this->Adminmodel->sale_detail_filter( $where , $search ,$date ,$rm_id ,$order_status);
			    
				    }  
				    $data['type'] = $type ; 
				    
				}
				
			

            $this->load->view('Admin/sales_detailed.php' , $data);

		    
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
     $this->load->view('Admin/sales_summary.php',$data);
    
}

          function sales_summary_filter(){
            
		 is_admin();
        
             $check = $this->check_url('sales_detailed') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				
				$type = $this->input->post('type') ;
		    	$cat_date  = $this->input->post('cat_date') ;
		    	$rm_id  = $this->input->post('rm_id') ;
		    	$order_status = $this->input->post('order_status') ;
		    		 $data['rm_id'] = $rm_id ; 
		    		 $data['order_status'] = $order_status ; 
		    		 	 $data['type'] = $type ; 
		     $data['cat_date'] = $cat_date ; 
		    	$search = trim($this->input->post('search')) ; 
		    	$data['search'] = $search ;
		    	 $first_date = $this->input->post('date1');
                 $second_date = $this->input->post('date2');
        
		    
		   		if($cat_date== "Today"){
				    
				    	$date=date("Y-m-d");

				}elseif($cat_date== "Weekly"){
				    
				    $date   =  date('Y-m-d', strtotime("-7 days"));  
				    
				}elseif($cat_date== "Monthly"){
				    
				    $date   =  date('Y-m-d', strtotime("-30 days"));  
				    
				}elseif($cat_date== "custom"){
				    
				    $date   =  'custom';  
				    
				}else{
				    
				    $date = '' ; 
				}
			
				 $data['cat_date'] = $cat_date ; 
				 
			if($type == 'Name'){
			    
			        $data['type'] = $type ; 
			    	$data['search'] = $search ; 
			    
			     $name = trim($this->input->post('search')) ; 
			     
			     $user = $this->db->get_where('customerlogin' , array('Owner' => $name))->row();
			     
			     $where = 'user_id' ;
			     $search =  $user->id; 
			     
			     if($date == 'custom'){
				      
     	$data['result']=$this->Adminmodel->filterdatesales($where , $search ,$first_date,$second_date ,$rm_id , $order_status);
				        
				    }else{
			     
			   $data['result'] = $this->Adminmodel->sale_detail_filter( $where , $search ,$date ,$rm_id ,$order_status);
			    
				    }
				  
			}
	    	elseif($type == 'Moblie'){
	    	    
	    	   	$data['search'] = $search ; 
			     $name = trim($this->input->post('search')) ; 
			     
			      $data['type'] = $type ; 
			     
			     $user = $this->db->get_where('customerlogin' , array('phone' => $name))->row();
			    
			     $where = 'user_id' ;
			     $search =  $user->id; 
			     
			     if($date == 'custom'){
				      
        	$data['result']=$this->Adminmodel->filterdatesales($where , $search ,$first_date,$second_date ,$rm_id , $order_status);
				        
				    }else{
			     
			$data['result'] = $this->Adminmodel->sale_detail_filter( $where , $search ,$date ,$rm_id ,$order_status);
			    
				    } 
			      
		
			}elseif($type== 'All' && $cat_date == 'All' && $rm_id == 'All' && $order_status == 'All'){
			    
			     if($date == 'custom'){
				      
        	$data['result']=$this->Adminmodel->filterdatesales($where , $search ,$first_date,$second_date ,$rm_id , $order_status);
				        
				    }
				    
				    redirect('Admin/sales_summary');
				    
				}else{
				    
				   
				    $where = $type ;
				    $data['search'] = $search ; 
				    
				    if($type=='order_id'){
				        
				        $search =$this->input->post('search_order') ;
				        
				    }elseif($type=='invoice_id'){
				        
				         $search =$this->input->post('search_invoice') ;
				    }
				    
				   if($date == 'custom'){
				      
				     
        	$data['result']=$this->Adminmodel->filterdatesales($where , $search ,$first_date,$second_date ,$rm_id , $order_status);
				        
				    }else{
			     
			$data['result'] = $this->Adminmodel->sale_detail_filter( $where , $search ,$date ,$rm_id ,$order_status);
			    
				    }  
				    $data['type'] = $type ; 
				    
				}
				
		
            $this->load->view('Admin/sales_summary.php' , $data);

		    
        }
          function sales_skusummary_filter(){
              is_admin();
				
				 is_admin();
        
             $check = $this->check_url('sales_detailed') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
		        
		    	$cat_date  = $this->input->post('cat_date') ;
		    	
		    	    $data['cat_date'] = $cat_date ; 
				
		  //  	$order_by = $this->input->post('order_by') ;
		    	$category_id = $this->input->post('category') ;
		    	$sku = $this->input->post('search') ; 
		    	    $data['category_id'] = $category_id ; 
			    $data['skuid'] = $sku ; 
			
		    	 $first_date = $this->input->post('date1');
                 $second_date = $this->input->post('date2');
        
		    
		   		if($cat_date== "Month"){
				    
				    	$date=date('Y-m-d', strtotime("-30 days"));  

				}elseif($cat_date== "Quarter"){
				    
				    $date   =  date('Y-m-d', strtotime("-180 days"));  
				    
				}else{
				    
				    $date = '' ; 
				}
			
			   
		
			     
			 //    if($date == 'custom'){
				      
    //  	$data['result']=$this->Adminmodel->filterdatesales($first_date,$second_date , $sku  ,$category_id ,$order_by);
				        
				//     }else{
			     
			   $data['result'] = $this->Adminmodel->sale_sku_filter(  $sku ,$date ,$category_id ); 
			    
				    // }
				  
		
				
			$data['date'] = $cat_date ;
	
            $this->load->view('Admin/sku_sales_summary.php' , $data);
}
        
   //==================================
   
   
   public function productFilter(){
				is_admin();
				$this->load->view('Admin/product_filter.php');
			}
   
   public function manageOrder(){
				is_admin();
				$this->load->view('Admin/order-page.php');
			}
			
    public function manageProduct(){
				is_admin();
				$this->load->view('Admin/product-page.php');
			}
	public function manageSales(){
				is_admin();
				$this->load->view('Admin/sales-page.php');
			}
	public function manageCategory(){
				is_admin();
				$this->load->view('Admin/manage-category-page.php');
			}
	public function manageUser(){
				is_admin();
				$this->load->view('Admin/user-page.php');
			}
	public function manageCms(){
				is_admin();
				
			  $check = $this->check_url('cms') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
				$this->load->view('Admin/cms-page.php');
			}
	public function managePolicy(){
				is_admin();
				$this->load->view('Admin/policy-page.php');
			}
   
//   ================================
    public function saveGallery (){

        $text = $this->input->post('about');
       /* $path1=  base_url().'images/';
        $upload_image1=$_FILES["gallery"]["name"];
        if(!empty($upload_image1)){
            if(!empty($_FILES["gallery"]))
            {
                $upload_image1=$_FILES["gallery"]["name"];
                $upload1 = move_uploaded_file($_FILES["gallery"]["tmp_name"], "./images/".$upload_image1);
                if($upload1){
                    $img_name1 = $path1.$upload_image1;
                }else{
                    $img_name1 = '';
                }
            }else{
                $img_name1 = '';
            }*/



            $table='gym_gallery';

        $file_name ='file';

        $files = $_FILES[$file_name];

// print_r($files) ;
// exit;

        $file_upload = sizeof($_FILES[$file_name]['tmp_name']);
        $image = array();

        $multiple = array();

        for ($i=0; $i <$file_upload ; $i++) {


            $_FILES[$file_name]['name'] = $files['name'][$i];
            $_FILES[$file_name]['type'] = $files['type'][$i];
            $_FILES[$file_name]['tmp_name'] = $files['tmp_name'][$i];
            $_FILES[$file_name]['error'] = $files['error'][$i];
            $_FILES[$file_name]['size'] = $files['size'][$i];


            $upload_path = FCPATH.'./images/' ;
            $url1 =  array('upload_path' => './images/',
                'allowed_types' => 'jpg|jpeg|png|pdf',

            );
            $config = array(
                'upload_path' => $url1['upload_path'],
                'allowed_types'=> $url1['allowed_types'],

            );

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($file_name)) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data =  $this->upload->data();

                $multiple[$i] =  base_url("images/".$data['file_name']);

// $fileName = $this->upload->data('file_name');

            }

        }

        $img_name1 = json_encode($multiple);

        $data = array(
            'about'=>$text,
            'image'=>$img_name1,
        );


            if($this->db->insert('about', $data)){
            $this->session->set_flashdata('Successfully','Gallery Save successfully');
            redirect('Admin/about');
        }else{
            $this->session->set_flashdata('Successfully','Please fill all required fields');
            redirect('Admin/about');
        }

    }

// =============================
   public function contact(){
       
       	is_admin();
				
					  $check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
		        
				$this->load->view('Admin/addcontact');
			}
  
   public function mailbyadmin(){
       
       	is_admin();
				
					  $check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
		        
				$this->load->view('Admin/mail_byadmin');
			}
  
  public function sendmail(){
       
       	is_admin();
				
					  $check = $this->check_url('Admin') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
		        
				$this->load->view('Admin/adminmail');
			}
  
//  ======================

	function home_active($id){
	    
					is_admin();
				 	$data = array('status' => 1,) ;
		
			    $this->db->where('id', $id);
                $this->db->update('home_page_deals', $data);
	
			redirect('Admin/Listhome_deals');
    
			}
	function product_active($id){
	    
					is_admin();
				 	$data = array('status' => 1,) ;
		
			    $this->db->where('id', $id);
                $this->db->update('product_detail', $data);
	
			redirect('Admin/ListProduct');
    
			}
	function product_inactive($id){
	    
					is_admin();
				 	$data = array('status' => 0,) ;
		
			    $this->db->where('id', $id);
                $this->db->update('product_detail', $data);
	
			redirect('Admin/ListProduct');
    
			}
	function homecat_active($id){
	    
					is_admin();
				 	$data = array('home_status' => 1,) ;
		
			    $this->db->where('id', $id);
                $this->db->update('category', $data);
	
			redirect('Admin/Listcategory');
    
			}
	function homecat_inactive($id){
	    
					is_admin();
				 	$data = array('home_status' => 0,) ;
		
			    $this->db->where('id', $id);
                $this->db->update('category', $data);
	
			redirect('Admin/Listcategory');
    
			}
   	
   		function cat_active($id){
	    
					is_admin();
				 	$data = array('status' => 1,) ;
		
			    $this->db->where('id', $id);
                $this->db->update('category', $data);
	
			redirect('Admin/Listcategory');
    
			}
	function cat_inactive($id){
	    
					is_admin();
				 	$data = array('status' => 0,) ;
		
			    $this->db->where('id', $id);
                $this->db->update('category', $data);
	
			redirect('Admin/Listcategory');
    
			}
	function subcat_active($id){
	    
					is_admin();
				 	$data = array('status' => 1,) ;
		
			    $this->db->where('id', $id);
                $this->db->update('sub_category', $data);
	
			redirect('Admin/Listsubcategory');
    
			}
	function subcat_inactive($id){
	    
					is_admin();
				 	$data = array('status' => 0,) ;
		
			    $this->db->where('id', $id);
                $this->db->update('sub_category', $data);
	
			redirect('Admin/Listsubcategory');
    
			}
   		function parentcat_active($id){
	    
					is_admin();
				 	$data = array('status' => 1,) ;
		
			    $this->db->where('id', $id);
                $this->db->update('parent_category', $data);
	
			redirect('Admin/Listparentcategory');
    
			}
	function parentcat_inactive($id){
	    
					is_admin();
				 	$data = array('status' => 0,) ;
		
			    $this->db->where('id', $id);
                $this->db->update('parent_category', $data);
	
			redirect('Admin/Listparentcategory');
    
			}
   	function home_inactive($id){
	    
					is_admin();
				  	$data = array('status' => 0,) ;
		
			    $this->db->where('id', $id);
                $this->db->update('home_page_deals', $data);
	
			redirect('Admin/Listhome_deals');
    
			}



    public function changepassword()
    {
        is_admin();
        
             $check = $this->check_url('changepassword') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
		        
        $this->load->view('Admin/change-password');

    }
  public function check_url($url){
      
      
    $session_user =   $_SESSION['session_user'] ;
    
    if($_SESSION['session_namee'] != 'admin'){
        
             $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => $url ))->row();
                
                if($user_rm->view == 'Yes'){
                    
                     return    $data = 'done' ; 
   
                    
                }else{
                    
                      return    $data = 'not' ; 
  
                }
                
           
        
    }else{
        
    return    $data = 'done' ; 
        
    }
    
  }
 public function check_url_edit($url){
      
      
    $session_user =   $_SESSION['session_user'] ;
    
    if($_SESSION['session_namee'] != 'admin'){
        
             $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => $url ))->row();
                
                if($user_rm->edit == 'Yes'){
                    
                     return    $data = 'done' ; 
   
                    
                }else{
                    
                      return    $data = 'not' ; 
  
                }
                
           
        
    }else{
        
    return    $data = 'done' ; 
        
    }
    
  }
 public function check_url_upload($url){
      
      
    $session_user =   $_SESSION['session_user'] ;
    
    if($_SESSION['session_namee'] != 'admin'){
        
             $rowid = $_SESSION['session_iid'] ;
                
                $user_rm =  $this->db->get_where('team_role' ,array('user_id' => $rowid ,'navbar_name' => $url ))->row();
                
                if($user_rm->upload == 'Yes'){
                    
                     return    $data = 'done' ; 
   
                    
                }else{
                    
                      return    $data = 'not' ; 
  
                }
                
           
        
    }else{
        
    return    $data = 'done' ; 
        
    }
    
  }
  
  public function updatepassword()
    {
        
          $old_pass = $this->input->post('old_pass');
      $new_pass = $this->input->post('new_pass');
      $conf_pass = $this->input->post('conf_pass');
      
      
        $admin = $this->db->get_where('admin',array('id' =>1 ,'password' =>md5($old_pass) ))->row() ;
            
            if($admin){
                
                if($new_pass == $conf_pass ){
    
    
     	$data = array('password' =>  md5($new_pass)) ;
		
    
                    $this->db->where('id', 1);
                $this->db->update('admin', $data);
	
	    	
      	   $this->session->set_flashdata('sucess' , 'Invalid Credentials') ;
    	                

      	redirect('Admin/changepassword');
                }else{
                    
                      $this->session->set_flashdata('notmatch' , 'Invalid Credentials') ;
    	                
                
                	redirect('Admin/changepassword');
                    
                    
                }
    
            }else{
                   $this->session->set_flashdata('failed' , 'Invalid Credentials') ;
    	                
                
                	redirect('Admin/changepassword');
    
            }
            
            
            

    }
    
    
    // =========================
    			public function add_smspermission(){
			is_admin();
			
			  $check = $this->check_url('add_smspermission') ;
				if($check != 'done'){
			    
			    	redirect('Admin');
		        }
			   $this->load->view('Admin/sms_permission');

    			}
			
				public function insert_sms(){
			is_admin();
			
			
				// ========= new registration  ============
				
				$navbar_name = 'new_registration' ;
				
				$sms= $_POST['new_registration_sms'];
				$email=$_POST['new_registration_email'];
				$whatsapp= $_POST['new_registration_whatsapp'];
				
				$adminsms= $_POST['new_registration_adminsms'];
				$adminemail=$_POST['new_registration_adminemail'];
				$adminwhatsapp= $_POST['new_registration_adminwhatsapp'];
				
				
				$this->sms_permission( $navbar_name ,$sms ,$email ,$whatsapp,$adminsms ,$adminemail ,$adminwhatsapp) ;
				
				
					// ========= Account_Approved  ============
				
				$navbar_name = 'Account_Approved' ;
				
				$sms= $_POST['Account_Approved_sms'];
				$email=$_POST['Account_Approved_email'];
				$whatsapp= $_POST['Account_Approved_whatsapp'];
				
				$adminsms= $_POST['Account_Approved_adminsms'];
				$adminemail=$_POST['Account_Approved_adminemail'];
				$adminwhatsapp= $_POST['Account_Approved_adminwhatsapp'];
				
				
				$this->sms_permission( $navbar_name ,$sms ,$email ,$whatsapp,$adminsms ,$adminemail ,$adminwhatsapp) ;
				
				
						// ========= Account_Disapproved  ============
				
				$navbar_name = 'Account_Disapproved' ;
				
				$sms= $_POST['Account_Disapproved_sms'];
				$email=$_POST['Account_Disapproved_email'];
				$whatsapp= $_POST['Account_Disapproved_whatsapp'];
				
				$adminsms= $_POST['Account_Disapproved_adminsms'];
				$adminemail=$_POST['Account_Disapproved_adminemail'];
				$adminwhatsapp= $_POST['Account_Disapproved_adminwhatsapp'];
				
				
				$this->sms_permission( $navbar_name ,$sms ,$email ,$whatsapp,$adminsms ,$adminemail ,$adminwhatsapp) ;
				
						// ========= Discount_Approved  ============
				
				$navbar_name = 'Discount_Approved' ;
				
				$sms= $_POST['Discount_Approved_sms'];
				$email=$_POST['Discount_Approved_email'];
				$whatsapp= $_POST['Discount_Approved_whatsapp'];
				
				$adminsms= $_POST['Discount_Approved_adminsms'];
				$adminemail=$_POST['Discount_Approved_adminemail'];
				$adminwhatsapp= $_POST['Discount_Approved_adminwhatsapp'];
				
				
				$this->sms_permission( $navbar_name ,$sms ,$email ,$whatsapp,$adminsms ,$adminemail ,$adminwhatsapp) ;
				
				
							// ========= Order_Payment  ============
				
				$navbar_name = 'Order_Payment' ;
				
				$sms= $_POST['Order_Payment_sms'];
				$email=$_POST['Order_Payment_email'];
				$whatsapp= $_POST['Order_Payment_whatsapp'];
				
				$adminsms= $_POST['Order_Payment_adminsms'];
				$adminemail=$_POST['Order_Payment_adminemail'];
				$adminwhatsapp= $_POST['Order_Payment_adminwhatsapp'];
				
				
				$this->sms_permission( $navbar_name ,$sms ,$email ,$whatsapp,$adminsms ,$adminemail ,$adminwhatsapp) ;
				
				
							// ========= Order_Booked  ============
				
				$navbar_name = 'Order_Booked' ;
				
				$sms= $_POST['Order_Booked_sms'];
				$email=$_POST['Order_Booked_email'];
				$whatsapp= $_POST['Order_Booked_whatsapp'];
				
				$adminsms= $_POST['Order_Booked_adminsms'];
				$adminemail=$_POST['Order_Booked_adminemail'];
				$adminwhatsapp= $_POST['Order_Booked_adminwhatsapp'];
				
				
				$this->sms_permission( $navbar_name ,$sms ,$email ,$whatsapp,$adminsms ,$adminemail ,$adminwhatsapp) ;
				
				
							// ========= Order_Pending  ============
				
				$navbar_name = 'Order_Pending' ;
				
				$sms= $_POST['Order_Pending_sms'];
				$email=$_POST['Order_Pending_email'];
				$whatsapp= $_POST['Order_Pending_whatsapp'];
				
				$adminsms= $_POST['Order_Pending_adminsms'];
				$adminemail=$_POST['Order_Pending_adminemail'];
				$adminwhatsapp= $_POST['Order_Pending_adminwhatsapp'];
				
				
				$this->sms_permission( $navbar_name ,$sms ,$email ,$whatsapp,$adminsms ,$adminemail ,$adminwhatsapp) ;
				
								// ========= Order_Readyship  ============
				
				$navbar_name = 'Order_Readyship' ;
				
				$sms= $_POST['Order_Readyship_sms'];
				$email=$_POST['Order_Readyship_email'];
				$whatsapp= $_POST['Order_Readyship_whatsapp'];
				
				$adminsms= $_POST['Order_Readyship_adminsms'];
				$adminemail=$_POST['Order_Readyship_adminemail'];
				$adminwhatsapp= $_POST['Order_Readyship_adminwhatsapp'];
				
				
				$this->sms_permission( $navbar_name ,$sms ,$email ,$whatsapp,$adminsms ,$adminemail ,$adminwhatsapp) ;
				
				
				// ========= Order_Shipped  ============
				
				$navbar_name = 'Order_Cancelled' ;
				
				$sms= $_POST['Order_Cancelled_sms'];
				$email=$_POST['Order_Cancelled_email'];
				$whatsapp= $_POST['Order_Cancelled_whatsapp'];
				
				$adminsms= $_POST['Order_Cancelled_adminsms'];
				$adminemail=$_POST['Order_Cancelled_adminemail'];
				$adminwhatsapp= $_POST['Order_Cancelled_adminwhatsapp'];
				
				
				$this->sms_permission( $navbar_name ,$sms ,$email ,$whatsapp,$adminsms ,$adminemail ,$adminwhatsapp) ;
				
					
				// ========= Order_Shipped  ============
				
				$navbar_name = 'Order_Shipped' ;
				
				$sms= $_POST['Order_Shipped_sms'];
				$email=$_POST['Order_Shipped_email'];
				$whatsapp= $_POST['Order_Shipped_whatsapp'];
				
				$adminsms= $_POST['Order_Shipped_adminsms'];
				$adminemail=$_POST['Order_Shipped_adminemail'];
				$adminwhatsapp= $_POST['Order_Shipped_adminwhatsapp'];
				
				
				$this->sms_permission( $navbar_name ,$sms ,$email ,$whatsapp,$adminsms ,$adminemail ,$adminwhatsapp) ;
				
				
					// ========= Order_Information  ============
				
				$navbar_name = 'Order_Information' ;
				
				$sms= $_POST['Order_Information_sms'];
				$email=$_POST['Order_Information_email'];
				$whatsapp= $_POST['Order_Information_whatsapp'];
				
				$adminsms= $_POST['Order_Information_adminsms'];
				$adminemail=$_POST['Order_Information_adminemail'];
				$adminwhatsapp= $_POST['Order_Information_adminwhatsapp'];
				
				
				$this->sms_permission( $navbar_name ,$sms ,$email ,$whatsapp,$adminsms ,$adminemail ,$adminwhatsapp) ;
				
				// ========= ProductionOrder_Booked  ============
				
				$navbar_name = 'ProductionOrder_Booked' ;
				
				$sms= $_POST['ProductionOrder_Booked_sms'];
				$email=$_POST['ProductionOrder_Booked_email'];
				$whatsapp= $_POST['ProductionOrder_Booked_whatsapp'];
				
				$adminsms= $_POST['ProductionOrder_Booked_adminsms'];
				$adminemail=$_POST['ProductionOrder_Booked_adminemail'];
				$adminwhatsapp= $_POST['ProductionOrder_Booked_adminwhatsapp'];
				
				
				$this->sms_permission( $navbar_name ,$sms ,$email ,$whatsapp,$adminsms ,$adminemail ,$adminwhatsapp) ;
				
				
				// ========= Payment_Verified  ============
				
				$navbar_name = 'Payment_Verified' ;
				
				$sms= $_POST['Payment_Verified_sms'];
				$email=$_POST['Payment_Verified_email'];
				$whatsapp= $_POST['Payment_Verified_whatsapp'];
				
				$adminsms= $_POST['Payment_Verified_adminsms'];
				$adminemail=$_POST['Payment_Verified_adminemail'];
				$adminwhatsapp= $_POST['Payment_Verified_adminwhatsapp'];
				
				
				$this->sms_permission( $navbar_name ,$sms ,$email ,$whatsapp,$adminsms ,$adminemail ,$adminwhatsapp) ;
				
						// ========= Payment_Verified  ============
				
				$navbar_name = 'low_amount' ;
				
				$sms= $_POST['low_amount_sms'];
				$email=$_POST['low_amount_email'];
				$whatsapp= $_POST['low_amount_whatsapp'];
				
				$adminsms= $_POST['low_amount_adminsms'];
				$adminemail=$_POST['low_amount_adminemail'];
				$adminwhatsapp= $_POST['low_amount_adminwhatsapp'];
				
				
				$this->sms_permission( $navbar_name ,$sms ,$email ,$whatsapp,$adminsms ,$adminemail ,$adminwhatsapp) ;
				
				
				
			
					
				redirect('Admin/add_smspermission');

			}

		function sms_permission( $navbar_name ,$sms ,$email ,$whatsapp,$adminsms ,$adminemail ,$adminwhatsapp){
			    
			    	$data =array(
        					     'name' => $navbar_name,
        					     'sms'=>$sms ,
            					 'email'=>$email ,
            					 'whatsapp'=>$whatsapp ,
						        
						         'adminsms'=>$adminsms ,
            					 'adminemail'=>$adminemail ,
            					 'adminwhatsapp'=>$adminwhatsapp ,
						         );
						 
						 $row = $this->db->get_where('sms_permission' ,array('name' => $navbar_name))->row();
						 	$table='sms_permission';
						 if($row){
						     
						     	$where='name';
						     	$id = $navbar_name ;
						    
				$this->Adminmodel->update_common($data,$table,$where,$id);
 
						 }
						else{
						    
						 	$this->Model->insert_common($table,$data);
						}
						
					return true ;	
			    
			}
			
	
  

// =========================================
    
  
public function adminmail(){



 	$data['id']=$_GET['id'];

	$this->load->view('sendmail.php',$data);



}

    
  
public function testsendmail(){



 $subject= "testin mail" ;
        $message_content   =  "
 Hi,
 
 Congratulations, Your payment of $advance INR vide tr. ref. no. against order ".$req_id." ID has been received in our accounts. <br>
 
 For Support
 Your Account Manager: <br>
 Contact No.: <br>
 Customer support team. <br>
 8800221111 <br>
 www.twghandicraft.com <br>
 Thank you !" ; 
 
  $admin =  $this->db->get_where('admin_mail', array('id' => 1 ,))->row() ;
                    
                    $FromMail = $admin->send_mail ; 
                    $AdminMail = $admin->admin_mail ; 
                     $admin_mob = $admin->mobile   ;  

 
                                $this->email->set_mailtype("html");
                                    $this->email->set_newline("\r\n");  
                                    $url=base_url('Artnhub/otpmail?id='.urlencode($message_content));
                                    $file=file_get_contents($url) ; 
                                    $this->load->library('email');
                                    $this->email->from($FromMail, 'TWG Handicraft');
                                    $this->email->to('surajprince01@gmail.com');
                                    $this->email->subject($subject);
                                    $this->email->message($file);
                                    $this->email->send();
                                    
                                    
                                    print_r($file) ;

}

  
 

}

		