<?php



defined('BASEPATH') OR exit('No direct script access allowed');



//require_once APPPATH.'third_party/dompdf/autoload.inc.php';







//use Dompdf\Dompdf;



class Artnhub extends CI_Controller {







	function __construct() {



        parent::__construct();



        $this->load->model('Adminmodel');



        $this->load->model('Model');



         



      



    }



    public function home(){



        $this->load->view('index2.php');



    }


        public function slider(){



        $this->load->view('index3.php');



    }



     public function slidertest(){



        $this->load->view('index4.php');



    }



    public function my_ledger()



    {



          $user_id = $_SESSION['session_id'];



          if($user_id){



            //   $data['customer_detail'] = $this->db->get_where('ledger_account' , array('user_id' => $user_id ,) )->result() ;



               



               	$this->db->select('*');                    	   // $this->db->get('product_detail')->result_array() ; 



	                	    $this->db->from('ledger_account');



            	          $this->db->where(array('user_id' => $user_id ));



            	         	$this->db->order_by("id","DESC");



	                    	$query = $this->db->get();



	                    	



	                $data['customer_detail']  = $query->result();   



          $data['user_id'] = $user_id ; 



        



        $this->load->view('my_ledger.php', $data);



          



    }else{



			        redirect('user_login');



			    }



       



    }



    



      public function date_ledgerdetails(){



        



        $user_id =$this->input->post('user_id');



        $second_date = $this->input->post('date2');



  



           $data['customer_detail'] = $this->db->get_where('ledger_account' , array('user_id' => $user_id ,'date >='=> $first_date,'date <='=> $second_date) )->result() ;



           $data['user_id'] = $user_id ; 



        



        $this->load->view('my_ledger.php',$data);



        



    }



    public function forgot(){



        



        



        $this->load->view('forgot.php');



    }



    public function changemobile(){



        



          if($_SESSION['session_id']){



				  $this->load->view('changemobile.php');



			    }



			    else{



			        redirect('user_login');



			    }



      



    }



    



    



      public function ledger_details($user_id){



        



         



          $data['customer_detail'] = $this->db->get_where('ledger_account' , array('user_id' => $user_id ,) )->result() ;



          $data['user_id'] = $user_id ; 



      



        $this->load->view('my_ledger.php',$data);



        



    }



    



    



     public function updatemobile(){



         



         if(empty($_SESSION['session_id'])){



             



				   redirect('user_login');



			    }



         



         $new_mob = $this->input->post('New_mobile');



         



         



         	$q = $this->db->select()



    				->where(array('phone'=>$new_mob))



    				->from('customerlogin')



    				->get();



    		$result  = $q->row();



    		



    		if($result){



    		    



    		     $this->session->set_flashdata('msg' , 'Mobile Number Already Exist!') ;



    		    redirect('changemobile') ;



    		    



    	    	}else{



         



             	$otp='9999'; //rand(100000,999999);		



                sms91($new_mob,$otp);



                $data = array(



                        'otp' => $otp ,



    



                            );



                            



                    $id =  $_SESSION['session_id'] ;              



    			    $this->db->where(array('id' => $id));



                    $this->db->update('customerlogin', $data);	



           



           redirect('Artnhub/changemobileverify/'.$new_mob) ; 



       }



    		



    }



    



    



    



    



    public function changemobileverify($new_mob){



        



        if(empty($_SESSION['session_id'])){



             



				   redirect('user_login');



			    }



        



         $data['mobile'] = $new_mob ;



         



        $this->load->view('changemobileverify.php', $data);



    }



    



    



    function change_mobile(){



        



        if(empty($_SESSION['session_id'])){



             



				   redirect('user_login');



			    }



			    



        $moblie = $this->input->post('New_mobile');



	    $otp = $this->input->post('otp');







  $id =  $_SESSION['session_id'] ;     



  



	$q = $this->db->select()



    				->where(array('id'=>$id, 'otp'=> $otp))



    				->from('customerlogin')



    				->get();



    		$result  = $q->row();



    		



        	if($result){



	    	    



	    	    $data = array('phone'=> $moblie) ;



	    	    



	    	    $this->db->where('id', $id);



                $this->db->update('customerlogin', $data);



	    	    



	    	      	redirect('profile');



	    	    



	    	    



	    	}



	    	else{



	    	    



	    	      $this->session->set_flashdata('msg' , 'Wrong OTP') ;



	    	    



	    	     redirect('Artnhub/changemobileverify/'.$moblie) ; 



	    	    



	    	}



	    



    }



    



    



    public function otpverify(){



        



        $moblie = $this->input->post('mobile');



        



        	$q = $this->db->select()



    				->where('email',$moblie)



    				->or_where('phone' , $moblie)



    				->from('customerlogin')



    				->get();



    		$result  = $q->row();



    		



    			if($result){



    			    



                	date_default_timezone_set('Asia/Kolkata'); 



        			$date=date('Y-m-d');



            		$otp='9999'; //rand(100000,999999);		



        



        		$mob = $result->phone ;



                    $data = array(



                        



                        'otp' => $otp ,







                        );



                        



                    	  



			    $this->db->where(array('phone' => $mob));



                $this->db->update('customerlogin', $data);		      



                    



               	sms91($mob,$otp);



               	



                 $data['mobile'] = $mob ;



                    



                $this->load->view('otpverify.php',$data);



                



        



    			}else{



    			    



    			     $this->session->set_flashdata('message', 'Mobile Number not valid !');



    			     



    			     redirect('forgot') ;



            



    			}



    }



    public function testzoom(){



        $this->load->view('testzoom.php');



    }



    public function signup(){


//  	 $value2=$this->uri->segment(2);
 

$data['insertid'] = 	 $_SESSION['registration_id'];
 

        $this->load->view('signup.php',$data);



    }



    



    



    



    function  index(){



        



        



			if(empty($_GET['search_text'])){



		



            $where='flag';



			$table='product_detail';







                        	$this->db->select('*');                    	   // $this->db->get('product_detail')->result_array() ; 



	                	    $this->db->from('product_detail');

                             $this->db->where('status', 1);

            	         	$this->db->order_by("home_deals_position","ASC");



	                    	$query = $this->db->get();



	                    	



	                $data['product_list']  = $query->result_array();   







		



			$data['picmug']=$this->Model->select_common_where($table,$where,$id);



     	//	pr($data);die;



			$this->load->view('index.php',$data);



		}else{



				$id=$_GET['search_text'];



	  		$where='url';



			$table='product_detail';



			$message=$this->Model->select_common_where($table,$where,$id);



			if(!empty($message)){



				$data['url']=$this->uri->segment(2);



				$data['message']=$message;



			



			//pr($user);



			$this->load->view('product_detail.php',$data);



			}



			else{



				 $value2=$_GET['search_text'];



	 			 $name=str_replace("_"," ",$value2);



	 			



					$data['product_dat']=$this->Model->search($name);



					$data['url']='searchpage';



					$data['search']=$name;



					$this->load->view('search_result.php',$data);



				



				}



		}



			



        



        



        



        



    }



    public function index2()



		{



	



			if(empty($_GET['search_text'])){



			// add the value to the array and serialize



 /* changed $cookie to $cookieString */







// save the cookie



/*setcookie('recentviews', $cookieString , time()+3600);



	foreach ($cookieString as $h) { /* changed $_COOKIE['recentviews'] to $cookie */







     //  pr($_COOKIE['recentviews']);die;



/*pr($_COOKIE);



    $dataew = unserialize($_COOKIE['recentviews']);



pr($dataew);die;*/



            $where='flag';



			$table='product_detail';







			$id='youmaylike';



			



			$data['youmaylike']=$this->Model->select_common_where($table,$where,$id);



			



			$id='dealday';



		



			$data['dealday']=$this->Model->select_common_where($table,$where,$id);



			



			$id='hotproduct';



			



			$data['hotproduct']=$this->Model->select_common_where($table,$where,$id);



			



			$id='radhakrishan';



		



			$data['radhakrishan']=$this->Model->select_common_where($table,$where,$id);



			



			$id='animal';



			



			$data['animal']=$this->Model->select_common_where($table,$where,$id);







			$id='goldsilverstatue';



		



			$data['goldsilverstatue']=$this->Model->select_common_where($table,$where,$id); 







			$id='cardash';



		



			$data['cardash']=$this->Model->select_common_where($table,$where,$id);







			$id='decorative';



			



			$data['decorative']=$this->Model->select_common_where($table,$where,$id);







			$id='indoor';



			



			$data['indoor']=$this->Model->select_common_where($table,$where,$id);







			$id='hanging';



			



			$data['hanging']=$this->Model->select_common_where($table,$where,$id);







			$id='candlestand';



		



			$data['candlestand']=$this->Model->select_common_where($table,$where,$id);







			$id='tabledecoritem';



		



			$data['tabledecoritem']=$this->Model->select_common_where($table,$where,$id);



			



			$id='windchimes';



		



			$data['windchimes']=$this->Model->select_common_where($table,$where,$id);







			$id='tbleframe';



		



			$data['tbleframe']=$this->Model->select_common_where($table,$where,$id);



			



			$id='picwidphoto';



		



			$data['picwidphoto']=$this->Model->select_common_where($table,$where,$id);







			$id='nameplates';



			



			$data['nameplates']=$this->Model->select_common_where($table,$where,$id);



			



			$id='picmug';



			



			$data['picmug']=$this->Model->select_common_where($table,$where,$id);



	//	pr($data);die;



			$this->load->view('index.php',$data);



		}else{



				$id=$_GET['search_text'];



	  		$where='url';



			$table='product_detail';



			$message=$this->Model->select_common_where($table,$where,$id);



			if(!empty($message)){



				$data['url']=$this->uri->segment(2);



				$data['message']=$message;



			



			//pr($user);



			$this->load->view('product_detail.php',$data);



			}



			else{



				 $value2=$_GET['search_text'];



	 			 $name=str_replace("_"," ",$value2);



	 			



					$data['product_dat']=$this->Model->search($name);



					$data['url']='searchpage';



					$data['search']=$name;



					$this->load->view('subcategory.php',$data);



				



				}



		}



			}







      



			



	public function user_login()



		{



				if(!empty($_SESSION['session_id'])){



				redirect('index');



			}



		



			$this->load->view('signin.php');



		}



		public function useremail(){



			$id=$_POST['email'];



			$where='email';



			$table='customerlogin';



			$user=$this->Model->select_common_where($table,$where,$id);



			if(empty($user)){



				$_SESSION['useremail']=$_POST['email'];



			}



			else{



				echo "already";



			}



		}



		public function username(){



			



				$_SESSION['username']=$_POST['name'];



			//pr($_SESSION);



		}



		public function usernumber(){



			$id=$_POST['number'];



			$where='phone';



			$table='customerlogin';



			$user=$this->Model->select_common_where($table,$where,$id);



			if(empty($user)){



				$_SESSION['usernumber']=$_POST['number'];



			}



			else{



				echo "already";



			}



				



			//pr($_SESSION);



		}







		public function userpass(){



			



				$_SESSION['userpass']=$_POST['pass'];



			//pr($_POST);



		}



		public function usercpass(){



			



				if($_SESSION['userpass']==$_POST['cpass']){



			echo "test";



			}



			else{



				echo "notmached";



			}



			//pr($_SESSION);



		}



		public function newotp(){







			$id=$_POST['number'];



			



				$Business=$_POST['Business'];



				$Owner=$_POST['Owner'];



				$Email=$_POST['Email'];



				$Password=$_POST['Password'];



				



				$Address=$_POST['Address'];



				



				$State=$_POST['State'];



				$Pincode=$_POST['Pincode'];



				



                    	$PANNumber=$_POST['PANNumber'];



                    	



				$ownership=$_POST['ownership'];



				$btype=$_POST['btype'];



							



									



			



			



			$where='phone';



			$table='customerlogin';



			$user=$this->Model->select_common_where($table,$where,$id);



			if(empty($user)){



			date_default_timezone_set('Asia/Kolkata'); 



			$date=date('Y-m-d');



		$otp='9999'; //rand(100000,999999);		



		$mob=$_POST['number'];



			sms91($mob,$otp);



		 $table='customerlogin';



		 $data = array(



		 	'otp' =>$otp, 



		 	'phone' =>$mob, 



		 	'created' =>$date, 



		 	'email'=> $Email,



		 	'Business' => $Business,



		 	'Owner' => $Owner ,



		 );



        $this->Model->insert_common($table,$data);



		}



		



	}



	



	



		//==============registration ======



	



			public function pre_registration(){

	$mob=$_POST['Mobile'];
	$Owner=$_POST['name'];

		$where='phone';



    			$table='customerlogin';


			$user=$this->Model->select_common_where($table,$where,$mob);
			
		
  $password= $user[0]['password'] ; 



if(empty($user)){
	date_default_timezone_set('Asia/Kolkata'); 



			$date=date('Y-m-d');



    		$otp='9999'; //rand(100000,999999);		


			sms91($mob,$otp);



		  //  $table='customerlogin';

	 $data = array(
		 	'otp' =>$otp, 
		 	'phone' =>$mob, 
		 	'created' =>$date, 
		 	'Owner' => $Owner ,
		 );

	      if($this->db->insert('customerlogin', $data)){

        // 	redirect('Artnhub/otpcheck/'.$mob);
        
        
            $insert_id =     $this->db->insert_id() ;
            $_SESSION['registration_id'] = $insert_id ;
            
            	redirect('signup');

        }
}elseif(empty($password)){
    
     $_SESSION['registration_id'] =  $user->id  ;
            
            	redirect('signup');
    
    }else{
    
           	$this->session->set_flashdata('message_name', 'Mobile Number already Exist !');

    
    	redirect('Artnhub/preRegistration');

}


                    }
			    

		public function registration_user(){

				$Business=$_POST['Business'];
				$Owner=$_POST['Owner'];
				$Email=$_POST['Email'];
				$Password=$_POST['Password'];

				if(strlen($Password) < 6){
	 		          $this->session->set_flashdata('message_name', 'Password should be at least 6 characters !');
                    return	redirect('signup');
                    exit ;
				}

    $id=$_POST['id'];
	$user  = $this->db->get_where('customerlogin', array('id' => $id))->row() ;
    $mob = $user->phone ; 
	// $mob=$_POST['Mobile'];
	
				$GSTNumber =$_POST['GSTNumber'];
			    $adhaar_no = $_POST['aadhar'];
				$Address=$_POST['Address'];
				$State=$_POST['State'];
				$Pincode=$_POST['PinCode'];
				$ownertype=$_POST['ownertype'];
				$btype=$_POST['btype'];

//     			$where='phone';
//     			$table='customerlogin';
// 			$user=$this->Model->select_common_where($table,$where,$mob);

		    if(!empty($Email)){

			        $where='email';
    		    	$table='customerlogin';

		      	$email_detail =$this->Model->select_common_where($table,$where,$Email);

 		    if($email_detail){

 		          $this->session->set_flashdata('message_name', 'Email ID Already Exist');
                  return	redirect('signup');
                    exit ;

	 		    }

		    }

			date_default_timezone_set('Asia/Kolkata'); 
			$date=date('Y-m-d');
    		$otp=  '9999' ;   //rand(100000,999999);		

// 			sms91($mob,$otp);

		    $table='customerlogin';

		  //    if($Email){

        //           $admin =  $this->db->get_where('admin_mail', array('id' => 1 ,))->row() ;
        //           $FromMail = $admin->send_mail ; 
        //           $AdminMail = $admin->admin_mail ; 
        //           $admin_mob = $admin->mobile   ;  
			     // $show_contact = $admin->show_contact   ;  
			        
			 //   $this->email->set_mailtype("html");
    //             $this->email->set_newline("\r\n");  
    //             $url=base_url('Artnhub/otpmail?id='.$otp);
    //             $file=file_get_contents($url) ; 
    //             $this->load->library('email');
    //             $this->email->from($FromMail, 'TWG Handicraft');
    //             $this->email->to($Email);
    //             $this->email->subject('Forgot Password');
    //             $this->email->message($file);
    //             $this->email->send();


			 //   }
			 
			 
	
		 $data = array(

		 	'otp' =>$otp, 
	    	// 'phone' =>$mob, 
		 	'created' =>$date, 
		 	'email'=> $Email,
		 	'Business' => $Business,
		 	// 'Owner' => $Owner ,
    		// 	'gender'=>$gender ,
	 		'city' =>$_POST['city'],
		 	'password' =>md5($Password),
        	'show_pass' =>$Password,
		 	'Address'=> $Address,
		 	'state' => $State ,
		 	'PinCode'=>$Pincode ,
	        'ownertype'=> $ownertype ,
	        'btype'   =>$btype ,
	        'document' => $this->input->post('document') ,

		 );

        $document =	 $this->input->post('document') ;
		$gst_no = $_POST['GSTNumber'];
		$adhaar_no =  $_POST['aadhar'];
		$landline =  $_POST['landline'];
	 if($gst_no){

		      	$data['GSTNumber'] =$gst_no ;
		 }

	 if($adhaar_no){
		      	$data['adhaar_no'] =$adhaar_no ;
		 }

		$PANNumber=$_POST['PANNumber'];

       	if($PANNumber){
       	    $data['PANNumber'] = $PANNumber ;
       	}
	 if($landline){
		      	$data['landline'] =$landline ;
		 }

		 //==========================upload img==========

    	 $path1=  base_url().'assets/images/';

    // 	 ===========validation ======

             $file_name ='visting';
             $files = $_FILES[$file_name];
             if(!empty($_FILES["visting"]["name"])){

             $upload_path = FCPATH.'./images/' ;
             $url1 =  array('upload_path' => './assets/visiting/',

                        'allowed_types' => 'jpg|jpeg|png|pdf',

                    );

            $config = array(

                        'upload_path' => $url1['upload_path'],
                        'allowed_types'=> $url1['allowed_types'],
                    );

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($file_name)) {
                    $error = array('error' => $this->upload->display_errors());
                   	$this->session->set_flashdata('message_name', 'Please Upload Vising Card as Image/PDF');

             	redirect('signup');

                } else {
                        $upload_data =  $this->upload->data();
                        $data['vcard'] =  base_url("assets/visiting/".$upload_data['file_name']);
                    }
             }

    	//=========================================
        //===========validation ======

             $path2=  base_url().'assets/images/';
             $path3=  base_url().'assets/adhaar/';

	if(!empty($_FILES["Certificate"]["name"]))
        {
             $file_name2 ='Certificate';
             $files2 = $_FILES[$file_name2];
             $upload_path = FCPATH.'./images/' ;
             $url1 =  array(
                    'upload_path' => './assets/images/',
                    'allowed_types' => 'jpg|jpeg|png|pdf',

                    );
            $config = array(

                        'upload_path' => $url1['upload_path'],
                        'allowed_types'=> $url1['allowed_types'],

                    );

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload($file_name2)) {
                    $error = array('error' => $this->upload->display_errors());
                  	$this->session->set_flashdata('message_name', 'Please Upload Document as  Image/PDF');
                 	redirect('signup');
                    } else {

                        $upload_data =  $this->upload->data();
                        $data['gstimg'] =  base_url("assets/images/".$upload_data['file_name']);
                    }

            //==============================
        }
       elseif(!empty($_FILES["Certificate1"]["name"]))
       {
             $file_name2 ='Certificate1';
             $files2 = $_FILES[$file_name2];
          $upload_path = FCPATH.'./adhaar/' ;
                $url1 =  array('upload_path' => './assets/adhaar/',
                        'allowed_types' => 'jpg|jpeg|png|pdf',

                    );

                    $config = array(
                        'upload_path' => $url1['upload_path'],
                        'allowed_types'=> $url1['allowed_types'],
                    );

                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload($file_name2)) {
                     $error = array('error' => $this->upload->display_errors());
                  	$this->session->set_flashdata('message_name', 'Please Upload Document as  Image/PDF');

                 	redirect('signup');

                    } else {

                        $upload_data =  $this->upload->data();
                        $data['adhaar_img'] =  base_url("assets/adhaar/".$upload_data['file_name']);
                    }

            //==============================
	 
       }

    //   else{
    //       	$this->session->set_flashdata('message_name', 'Please Upload Document');
    //         	redirect('Artnhub/signup');
    //   }

      	//======================
      	
      		     $this->db->where('id', $id);
                $this->db->update('customerlogin', $data);
        //  =========================
        
            $admin =  $this->db->get_where('admin_mail', array('id' => 1 ,))->row() ;
                    
            $FromMail = $admin->send_mail ; 
            $AdminMail = $admin->admin_mail ; 
            $admin_mob = $admin->mobile   ;  
            $show_contact = $admin->show_contact   ;  
			    
           $customer =  $this->db->get_where('customerlogin', array('id' => $id ,))->row() ;
           
           $name = $customer->Owner ;
           
                 
      			 
        $subject= "Otp Password" ;
        $message_content   = "
                             Hi, ".$name."
                                                             
                                                            
                                 Your OTP is ".$otp." to reset the password. Don't share otp to anyone.
                                 for more information get in touch with our customer support team. 
                                 ".$show_contact."
                                 www.twghandicraft.com
                                 Thank you !" ; 
                             
     $message_email   = "
                             Hi, ".$name." <br><br>
                                                             
                                                            
                                 Your OTP is ".$otp." to reset the password.<br> 
                                 Don't share otp to anyone.<br><br>
                                 
                                 for more information get in touch with our customer support team. <br>
                                 ".$show_contact."<br>
                                 www.twghandicraft.com <br>
                                 Thank you !" ; 
                             
  //===============USER======================
              sms_send($mob,$message_content) ;
              
                 
                     if($Email){
                    			    $this->email->set_mailtype("html");
                                    $this->email->set_newline("\r\n");  
                                    $url=base_url('Artnhub/sendmail?id='.urlencode($message_email));
                                    $file=file_get_contents($url) ; 
                                    $this->load->library('email');
                                    $this->email->from($FromMail, 'TWG Handicraft');
                                    $this->email->to($Email);
                                    $this->email->subject($subject);
                                    $this->email->message($file);
                                    $this->email->send();
                       	    }
                       	    
// =====

	       	redirect('Artnhub/otpcheck/'.$mob);



      



        



		



		



		



	

        



		



	}







//==================================







	function low_amount_sms($sub_amt){
	    
	    
	    $id = $_SESSION['session_id'] ;
	    
				$q = $this->db->select()
    				->where('id',$id)
    				->from('customerlogin')
    				->get();
	    	$user  = $q->row();

  // ================EMAIL===========================

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
                    $admin_name = $admin->name ; 
                    $AdminMail = $admin->admin_mail ; 
                    $admin_mob = $admin->mobile   ;  
                   $show_contact = $admin->show_contact   ;  
                   
          	    
           $customer =  $this->db->get_where('customerlogin', array('id' => $id ,))->row() ;
           $name = $customer->Owner ;
         			 
        $subject= "Low Amount Order" ;
        $message_content   = "
                             Hi, ".$name." Sorry for the inconviniance, Minimum order value is 5000 INR. Your Cart value is ".$sub_amt." INR. Please add some more items in your cart and book order for further process.
                                 For Support Your Account Manager : ".$rm_name." Contact No. : ".$rm_mob." Customer support team. ".$show_contact."
                                 www.twghandicraft.com  Thank you !" ; 
                                                             
     $message_email   = "
                            Hi, ".$name." <br> <br>
                          
                                 Sorry for the inconviniance, Minimum order value is 5000 INR. Your Cart value is ".$sub_amt." INR. Please add some more items in your cart and book order for further process.  <br> <br>
                                 
                                 For Support   <br>
                                 Your Account Manager : ".$rm_name."  <br>
                                 Contact No. : ".$rm_mob."  <br>
                                 Customer support team.   <br>
                                 ".$show_contact."   <br>
                                 www.twghandicraft.com    <br>
                                 Thank you !" ; 
                             
    $message_sms   = "
    ".$name." - ".$_SESSION['cutomer_address']." - ".$mob."
                 
                         Customer is trying to order below 5000 INR. Plz contact to the customer and convey to book order above 5000 INR. 
                         
                           ".$admin_name." & ".$rm_name."" ; 
   $message   = "
                          
                              
                          ".$name." - ".$_SESSION['cutomer_address']." - ".$mob." <br><br>
                 
                         Customer is trying to order below 5000 INR. Plz contact to the customer and convey to book order above 5000 INR.  <br> <br>
                         
                           ".$admin_name." & ".$rm_name."" ; 
                                                     
  //===============USER======================
              sms_send($mob,$message_content) ;
              
                    //  if($email){
                    // 			    $this->email->set_mailtype("html");
                    //                 $this->email->set_newline("\r\n");  
                    //                 $url=base_url('Artnhub/sendmail?id='.urlencode($message_email));
                    //                 $file=file_get_contents($url) ; 
                    //                 $this->load->library('email');
                    //                 $this->email->from($FromMail, 'TWG Handicraft');
                    //                 $this->email->to($email);
                    //                 $this->email->subject($subject);
                    //                 $this->email->message($file);
                    //                 $this->email->send();
                    //   	    }
                       	    
      	      $permission =  $this->db->get_where('sms_permission', array('name' => 'low_amount' ,))->row() ;
// ================USER =====================
                       	    
          if($email && $permission->email =="Yes"){
			    $this->email->set_mailtype("html");
                $this->email->set_newline("\r\n");  
                $url=base_url('Artnhub/sendmail?id='.urlencode($message_email));
                $file=file_get_contents($url) ; 
                $this->load->library('email');
                $this->email->from($FromMail, 'TWG Handicraft');
                $this->email->to($email);
                $this->email->subject($subject);
                $this->email->message($file);
                $this->email->send();
   	    }
   	    
   	    
   	                 
 if($permission->adminsms =="Yes")
    {
      
   sms_send($admin_mob,$messagesms) ;
   sms_send($rm_mob,$messagesms) ;
   
    }              
          if($permission->adminemail =="Yes"){
              
            //   =========Admin============
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
   	    // ====RM===
              
        
                $this->email->set_mailtype("html");
                $this->email->set_newline("\r\n");  
                $url=base_url('Artnhub/sendmail?id='.urlencode($message));
                $file=file_get_contents($url) ; 
                $this->load->library('email');
                $this->email->from($FromMail, 'TWG Handicraft');
                $this->email->to($AdminMail);
                $this->email->subject($rm_email);
                $this->email->message($file);
                $this->email->send();
                
          }
          
// =======================================

	      	redirect('cart');

	    
	}



	function fetchbypincode(){



	    



	    



	  $pin = $this->input->post('pincode') ;



	    



	 



	    



	    $q =$this->db->select('*')



	    ->from('pincode')



           ->where("name LIKE '%$pin%'")



           ->get();



	                   



	             



	         $res = $q->row() ;



	         



	         if($res){



	             



	           



	             



	             echo json_encode($res) ;            



	         



	             



	         }else{



	             $res = array(



	                 'status'=> false,



	                 );



	               echo json_encode($res) ;    



	             



	           //  echo "no data" ;



	         }



	       



	



	    



	}







	//=========================



	



	function otpcheck($mob){



	    



	    $data['mob'] = $mob ;



	    



	     $this->load->view('otpcheck', $data);



	     



	}



	



	function checkotp($mob){



	    



	    $data['mob'] = $mob ;



	    



	     $this->load->view('otpcheck', $data);



	     



	}



	//========================



		function otpvalid(){

	    $otp = $this->input->post('otp');
	     $mob= $this->input->post('moblie') ;

	    $otp=$this->Model->validotp($mob,$otp);



         $email = $otp->email ; 
       $name = $otp->Owner ; 

	    	if($otp){
	    	    $data = array('otp_validation'=> '1') ;
        	    $this->db->where('phone', $mob);
                $this->db->update('customerlogin', $data);
// ========================================
                $admin =  $this->db->get_where('admin_mail', array('id' => 1 ,))->row() ;
                    
                    $FromMail = $admin->send_mail ; 
                    $AdminMail = $admin->admin_mail ; 
                     $admin_mob = $admin->mobile   ;  
                     $admin_name = $admin->name   ;  
                     $show_contact = $admin->show_contact   ;  
  
                $message_content = "
                 Congrats ".$name.", Your account is successfully registered with mobile number ".$mob.". Customer Support team will contact you within 24 hr for account approval.
                 for more information get in touch with our customer support team.  ".$show_contact."
                 www.twghandicraft.com   Thank you !";
                 
 
                $message_email = "
                 Congrats ".$name.",
                 <br><br>
                 Your account is successfully registered with mobile number ".$mob.". Customer Support team will contact you within 24 hr for account approval.
                 <br> <br> 
                 for more information get in touch with our customer support team.  <br>
                 ".$show_contact." <br>
                 
                 www.twghandicraft.com <br>
                 Thank you !";
                

   $permission =  $this->db->get_where('sms_permission', array('name' => 'new_registration' ,))->row() ;

 if($permission->sms =="Yes")
    {
        
       sms_send($mob,$message_content) ;
        
    }
   

    $admin =  $this->db->get_where('admin_mail', array('id' => 1 ,))->row() ;
                    
                $FromMail = $admin->send_mail ; 
                $AdminMail = $admin->admin_mail ; 
                $admin_mob = $admin->mobile   ;  
			        
    if($email && $permission->email =="Yes"){
			    $this->email->set_mailtype("html");
                $this->email->set_newline("\r\n");  
                $url=base_url('Artnhub/sendmail?id='.urlencode($message_email));
                $file=file_get_contents($url) ; 
                $this->load->library('email');
                $this->email->from($FromMail, 'TWG Handicraft');
                $this->email->to($email);
                $this->email->subject('Account Registration');
                $this->email->message($file);
                $this->email->send();
   	    }
   	    
   	    
              $messagesms = 	    "
             New Coustomer ".$name." is successfully registered with mobile number ".$mob.", Plz check all details, contact and verify this account for further process.
             
             ".$admin_name."";
              $message = 	    "
             New Coustomer ".$name." is successfully registered with mobile number ".$mob.", Plz check all details, contact and verify this account for further process.
             <br><br>
             ".$admin_name."";
             
 if($permission->adminsms =="Yes")
    {
      
   sms_send($admin_mob,$messagesms) ;
   
    }              
          if($permission->adminemail =="Yes"){
              
        
                $this->email->set_mailtype("html");
                $this->email->set_newline("\r\n");  
                $url=base_url('Artnhub/sendmail?id='.urlencode($message));
                $file=file_get_contents($url) ; 
                $this->load->library('email');
                $this->email->from($FromMail, 'TWG Handicraft');
                $this->email->to($AdminMail);
                $this->email->subject('Account Registration');
                $this->email->message($file);
                $this->email->send();
                
          }
// ========================================
	    	    
                	
	    	      	redirect('underverification');

	    	}



	    	else{



	    	    



	    	      $this->session->set_flashdata('msg' , 'Wrong OTP') ;



	    	    



	    	    	redirect('Artnhub/otpcheck/'.$mob);



	    	    



	    	}



	    



	    



	  



	}



	



	



	function otpvalid2(){



	    



	    $otp = $this->input->post('otp');



	    



	    $mob= $this->input->post('moblie') ;



	    



	    



	    	$otp=$this->Model->validotp($mob,$otp);



	    	



	    	



	    	if($otp){



	    	    



	    	    $data = array('otp_validation'=> '1') ;



	    	    



	    	     $this->db->where('phone', $mob);



                $this->db->update('customerlogin', $data);



	    	    



	    	      	redirect('underverification');



	    	    



	    	    



	    	}



	    	else{



	    	    



	    	      $this->session->set_flashdata('msg' , 'Wrong OTP') ;



	    	    



	    	    	redirect('Artnhub/otpcheck/'.$mob);



	    	    



	    	}



	    



	    



	  



	}



	



	//=========================



	



	public function validotp(){



			$otp=$_POST['otp'];



			$mob=$_SESSION['usernumber'];



			$otp=$this->Model->validotp($mob,$otp);



			if(empty($otp)){



			    



				echo "invalid";



			}else{



			 $table='customerlogin';



		 $data = array(



		 	



		 	'phone' =>$mob, 



		 	'name'=>$_SESSION['username'],



		 	'password'=>md5($_SESSION['userpass']),

	       'show_pass'=>$_SESSION['userpass'],



		 	'email'=>$_SESSION['useremail']



		 );



		 $where='phone';



		 $id=$_SESSION['usernumber'];



        $this->Model->update_common($data,$table,$where,$id);



        unset($_SESSION['username']);



			unset($_SESSION['userpass']);



			unset($_SESSION['usernumber']);



			unset($_SESSION['useremail']);



			echo "done";



			}



		



	}







	public function login()



		{



		    



		    $email = $this->input->post('email') ; 







				$data= array(



							'name' => $this->input->post('email'),



							'pass' => md5($this->input->post('pass'))



							);



				$table='customerlogin';



				



				$q = $this->db->select()



    				->where('email',$email)



    				->or_where('phone' , $email)



    				->from('customerlogin')



    				->get();



    			$email = $q->row();



				



				if($email){



				    $otp_validation = $email->otp_validation ;



				    $valid = $email->valid ;



				    



				    if($valid == 2){



				        



				        $reject_msg = $email->reason ;



				        



				        $msgg =  'Sorry Your Account Registration Rejected by our Admin,Reason :"'.$reject_msg.'"' ;



				        



				          $this->session->set_flashdata('user_rejected' , $msgg) ;



        					echo "invalid";



        					exit;



				        



				    }else{



				    



				    if($otp_validation != 1){



				          $this->session->set_flashdata('not_otp_verify' , 'Invalid Credentials') ;



        					echo "invalid";



        					exit;



				        



				    }



				    



				    if($valid != 1){



				        



				        $this->session->set_flashdata('not_admin_verify' , 'Invalid Credentials') ;



        					echo "invalid";



        					exit;



				        



				    }



				    



				    }



				    



				    		$login=$this->Model->user_log($data,$table);



						



					if ($login)



						{



				    



							$newdata = array('session_id'  => $login->id,



											'session_email'  => $login->email,



											'session_name'  => $login->Owner,



											);



											



				// 			$_SESSION['cutomer_address'] =   $login->Address ;
                        	$_SESSION['cutomer_address'] =   $login->city ;



							$_SESSION['customer_name'] = $login->Owner  ;



	 	                     $_SESSION['customer_mob'] = $login->phone  ;



            	 		 $_SESSION['customer_gst'] = $login->GSTNumber  ;



            	 		 $_SESSION['customer_pan'] = $login->PANNumber  ;



            	 		 $_SESSION['customer_business'] = $login->Business  ;



            	 			 $_SESSION['customer_btype'] = $login->btype  ;



	 			 $_SESSION['customer_adhaar'] = $login->adhaar_no  ;



	 		



							$this->session->set_userdata($newdata);



							$pin =  $login->PinCode ;



							$_SESSION['pincodeno'] =   $login->PinCode ;



								 $q =$this->db->select('*')



                                	      ->from('pincode')



                                          ->where("name LIKE '%$pin%'")



                                          ->get();



                               $pincode = $q->row() ;



                                $_SESSION['pincode'] = $pincode->pincodecat ;



	         



			      				 $user_id  = $login->id ;



			      				 



			      //=================Session Cart Add In Database ==========



			      				  	if(!empty($_SESSION['cart'])){



					  		foreach ($_SESSION['cart'] as  $value) {



					  	



                      	         	$id=$value['product_id'];



                		     		$product = $this->db->get_where('product_detail', array('sku_code' => $id))->row() ;



                		     		



                		     		$min = $product->min_order_quan ;



                		     		



                		     		if($min >$value['quantity']){



                		     		    



                		     		    $quant = $min ;



                		     		}else{



                		     		    



                		     		     $quant = $value['quantity']  ;



                		     		}



                		     		



                					$cart = $this->db->get_where('cart', array('product_id' => $id , 'user_id'=> $user_id ))->row() ;



                				



            			if(empty($cart)){



            			



            			if(empty($value['discount_slab'] && $value['discount_price'])){



                					$value['discount_slab']='';



                					$value['discount_price']='';



                				}



            			$data = array(



            							'product_id' =>$value['product_id'],



            							'quantity' =>$quant,



            							'price' =>$value['price'],



            							'cart_price' =>$value['cart_price'],



            							'discount_price' =>$value['discount_price'],



            							'gst' =>$value['gst'],



            							'gstinc' =>$value['gstinc'],



            							'notepad' =>$value['notepad'],



            							'image' =>$value['image'],



            							'user_id' =>$_SESSION['session_id']



            							 );



            				$table='cart';



            					$this->Model->insert_common($table,$data);



            					



            			}else{



            			    if(empty($value['discount_slab'] && $value['discount_price'])){



                					$value['discount_slab']='';



                					$value['discount_price']='';



                				}



            				$data = array(



            							'product_id' =>$value['product_id'],



            							'quantity' =>$quant,



            							'price' =>$value['price'],



            							'cart_price' =>$value['cart_price'],



            							'discount_price' =>$value['discount_price'],



            							'discount_slab' =>$value['discount_slab'],



            							'gst' =>$value['gst'],



            							'notepad' =>$value['notepad'],



            							'image' =>$value['image'],



            							'gstinc' =>$value['gstinc'],



            							'user_id' =>$_SESSION['session_id']



            							 );



            			    



            					   



            					    $this->db->where(array('product_id' => $id , 'user_id'=> $user_id ));



                                    $this->db->update('cart', $data);	



            			}	



            				}



            				



            				



			    	unset($_SESSION['cart']);



			    	



			    	



					  	}



			      //========



			       //=================Session Production  Cart Add In Database ==========



			      				  	if(!empty($_SESSION['cart_production'])){



					  		foreach ($_SESSION['cart_production'] as  $value) {



					  	



                      	         	$id=$value['product_id'];



                		     		$cart = $this->db->get_where('cart_production', array('product_id' => $id , 'user_id'=> $user_id ))->row() ;



                				



            			if(empty($cart)){



            			



            			if(empty($value['discount_slab'] && $value['discount_price'])){



                					$value['discount_slab']='';



                					$value['discount_price']='';



                				}



            			$data = array(



            							'product_id' =>$value['product_id'],



            							'quantity' =>$value['quantity'],



            							'price' =>$value['price'],



            							'cart_price' =>$value['cart_price'],



            							'discount_price' =>$value['discount_price'],



            							'gst' =>$value['gst'],



            							'gstinc' =>$value['gstinc'],



            							'notepad' =>$value['notepad'],



            							'image' =>$value['image'],



            							'user_id' =>$_SESSION['session_id']



            							 );



            				$table='cart_production';



            					$this->Model->insert_common($table,$data);



            					



            			}else{



            			    if(empty($value['discount_slab'] && $value['discount_price'])){



                					$value['discount_slab']='';



                					$value['discount_price']='';



                				}



            				$data = array(



            							'product_id' =>$value['product_id'],



            							'quantity' =>$value['quantity'],



            							'price' =>$value['price'],



            							'cart_price' =>$value['cart_price'],



            							'discount_price' =>$value['discount_price'],



            							'discount_slab' =>$value['discount_slab'],



            							'gst' =>$value['gst'],



            							'notepad' =>$value['notepad'],



            							'image' =>$value['image'],



            							'gstinc' =>$value['gstinc'],



            							'user_id' =>$_SESSION['session_id']



            							 );



            			    



            					   



            					    $this->db->where(array('product_id' => $id , 'user_id'=> $user_id ));



                                    $this->db->update('cart_production', $data);	



            			}	



            				}



            				



            				



			    	unset($_SESSION['cart_production']);



			    	



			    	



					  	}



					  	



					  	



					  	



			      //========



			       echo "done";



			      



			      ///==================================



			      			



			      			



			      			



					  	}



					  	else



					{



					    



					    $this->session->set_flashdata('login_msg' , 'Invalid Credentials') ;



						echo "invalid";



						exit; 



					}







				    



				    



				}



				else{



				    



				    



					    



					    $this->session->set_flashdata('create_account' , 'Invalid Credentials') ;



						echo "invalid";



					exit;



				    



				    



				}



				



				



			



	







					



		}



		



		//====================



		



			public function login_checkout()



		{







				$data= array(



							'name' => $this->input->post('email'),



							'pass' => md5($this->input->post('pass'))



							);



				$table='customerlogin';



						$login=$this->Model->user_log($data,$table);



						



					if ($login)



						{



				    



							$newdata = array('session_id'  => $login->id,



											'session_email'  => $login->email,



											'session_name'  => $login->Owner



											);



							$this->session->set_userdata($newdata);



							



							



			      			//  echo "done";



			      			



			      			  



			          $condi = array(



			              



			                'status'=>true ,



			                );



			     



			        	$json = json_encode($condi); 



			        	echo $json;



			        



			        



			      			



			      //=================Session Cart Add In Database ==========



			      				  	if(!empty($_SESSION['cart'])){



					  		foreach ($_SESSION['cart'] as  $value) {



					  		    



					  		 $user_id    = $login->id ;



			



                      	 	$id=$value['product_id'];



                			$where='product_id';



                			$table='cart';



                			



                			$cart=$this->db->get_where('cart', array('product_id' => $id , 'user_id'=> $user_id ))->row() ;



                			



               				if(empty($value['discount_slab'] && $value['discount_price'])){



                					$value['discount_slab']='';



                					$value['discount_price']='';



                				}



                				



            			if(empty($cart)){



            			



            			$data = array(



            							'product_id' =>$value['product_id'],



            							'quantity' =>$value['quantity'],



            							'price' =>$value['price'],



            							'cart_price' =>$value['cart_price'],



            							'discount_price' =>$value['discount_price'],



            							'gst' =>$value['gst'],



            							'gstinc' =>$value['gstinc'],



            							'notepad' =>$value['notepad'],



            							'image' =>$value['image'],



            							'user_id' =>$_SESSION['session_id']



            							 );



            				$table='cart';



            					$this->Model->insert_common($table,$data);



            			}else{



            				$data = array(



            							'product_id' =>$value['product_id'],



            							'quantity' =>$value['quantity'],



            							'price' =>$value['price'],



            							'cart_price' =>$value['cart_price'],



            							'discount_price' =>$value['discount_price'],



            							'discount_slab' =>$value['discount_slab'],



            							'gst' =>$value['gst'],



            							'notepad' =>$value['notepad'],



            							'image' =>$value['image'],



            							'gstinc' =>$value['gstinc'],



            							'user_id' =>$_SESSION['session_id']



            							 );



            			    	$table='cart';



            					$id=$value['product_id'];



            		        	$where='product_id';



            					   $this->Adminmodel->update_common($data,$table,$where,$id);



            			}	



            				}



            				



            				



			    	unset($_SESSION['cart']);



			    	



			    	



					  	}



			      



			      



			      



			      ///==================================



			      			



			      			



			      			



					  	}



					  	else



					{



					    



					    $this->session->set_flashdata('login_msg' , 'Invalid Credentials') ;



						echo "invalid";



						



						     $condi = array(



			              



			                'status'=>false ,



			                );



			     



			        	$json = json_encode($condi); 



			        	echo $json;



					}







	







					



		}



		



		



		//================login User=================



		



			public function login_user()



		{







				$data= array(



							'name' => $this->input->post('email'),



							'pass' => md5($this->input->post('pass'))



							);



				$table='customerlogin';



						$login=$this->Model->user_log($data,$table);



						



					if ($login)



						{



				    



							$newdata = array('session_id'  => $login->id,



											'session_email'  => $login->email,



											'session_name'  => $login->Owner



											);



							$this->session->set_userdata($newdata);



							



							



						//	echo "done";



						



							redirect('index');



					  	}



					  	else



					{



					    



					    $this->session->set_flashdata('login_msg' , 'Invalid Credentials') ;



					redirect('user_login');



					}







					  	if(!empty($_SESSION['cart'])){



					  		foreach ($_SESSION['cart'] as  $value) {



			



		$id=$value['product_id'];



			$where='product_id';



			$table='cart';



			$cart=$this->Model->select_common_where($table,$where,$id);



				if(empty($value['discount_slab'] && $value['discount_price'])){



					$value['discount_slab']='';



					$value['discount_price']='';



				}



			if(empty($cart)){



			



			$data = array(



							'product_id' =>$value['product_id'],



							'quantity' =>$value['quantity'],



							'price' =>$value['price'],



							'cart_price' =>$value['cart_price'],



							'discount_price' =>$value['discount_price'],



							'gst' =>$value['gst'],



							'gstinc' =>$value['gstinc'],



							'notepad' =>$value['notepad'],



							'image' =>$value['image'],



							'user_id' =>$_SESSION['session_id']



							 );



				$table='cart';



					$this->Model->insert_common($table,$data);



			}else{



				$data = array(



							'product_id' =>$value['product_id'],



							'quantity' =>$value['quantity'],



							'price' =>$value['price'],



							'cart_price' =>$value['cart_price'],



							'discount_price' =>$value['discount_price'],



							'discount_slab' =>$value['discount_slab'],



							'gst' =>$value['gst'],



							'notepad' =>$value['notepad'],



							'image' =>$value['image'],



							'gstinc' =>$value['gstinc'],



							'user_id' =>$_SESSION['session_id']



							 );



			$table='cart';



			$id=$value['product_id'];



			$where='product_id';



					   $this->Adminmodel->update_common($data,$table,$where,$id);



			}	



				}



				unset($_SESSION['cart']);



					  	}







					



		}



		



		



		//============================



		public function forgetotp(){



			$id=$_POST['email'];
			$where='phone';
			$table='customerlogin';
// 			$user=$this->Model->select_common_where($table,$where,$id);

				$q = $this->db->select()
    				->where('email',$id)
    				->or_where('phone' , $id)
    				->from('customerlogin')
    				->get();
	    	$user  = $q->row();

			if($user){

			    $valid_user =$user->valid ;         // $this->db->get_where('customerlogin', array('phone' => $id , 'valid' => '1'))->row();
			    $email = $user->email ; 
			   	$mob  =$user->phone ;
		    if($valid_user != 1){

			         $condi = array(
			                'status'=>'not valid',
			                );
			        	$json = json_encode($condi); 
			        	echo $json;
			    }else{

			         $email = $user->email ; 
            	$otp=rand(100000,999999);		
			 //   if($email){
			 //   $this->email->set_mailtype("html");
    //             $this->email->set_newline("\r\n");  
    //             $url=base_url('Artnhub/otpmail?id='.$otp);
    //             $file=file_get_contents($url) ; 
    //             $this->load->library('email');
    //             $this->email->from('twghandicraft@gmail.com', 'TWG Handicraft');
    //             $this->email->to($email);
    //             $this->email->subject('Forgot Password');
    //             $this->email->message($file);
    //             $this->email->send();

			 //   }
	           //	$mob=$_POST['email'];
        // 		smsforget($mob,$otp);
  // ================EMAIL===========================

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
        $show_contact = $admin->show_contact   ;  
     
        $subject= "Forget Password" ;
        $message_content   = "
                             Hi, ".$name."
                             
                            
 Your OTP is ".$otp." to reset the password.
 Don't share otp to anyone.
 
 for more information get in touch with our customer support team. 
 ".$show_contact."
 www.twghandicraft.com
 Thank you !" ; 
 
        $message_email   = "
                             Hi, ".$name." <br> <br>
                             
                            
 Your OTP is ".$otp." to reset the password.<br>
 Don't share otp to anyone. <br><br>
 
 for more information get in touch with our customer support team.  <br>
 ".$show_contact." <br>
 www.twghandicraft.com <br>
 Thank you !" ; 
                             
  //===============USER======================
              sms_send($mob,$message_content) ;
              
                 
                
                    
                     if($email){
                    			    $this->email->set_mailtype("html");
                                    $this->email->set_newline("\r\n");  
                                  $url=base_url('Artnhub/sendmail?id='.urlencode($message_email));
                                    $file=file_get_contents($url) ; 
                                    $this->load->library('email');
                                    $this->email->from($FromMail, 'TWG Handicraft');
                                    $this->email->to($email);
                                    $this->email->subject($subject);
                                    $this->email->message($file);
                                    $this->email->send();
                       	    }
                       	    
// =================================================

     
        		 $table='customerlogin';
        		 $data = array(
        		 	'otp' =>$otp  
        		 );

        	$id=$mob ;
			$where='phone';
	 $this->Adminmodel->update_common($data,$table,$where,$id);
			        $condi = array(
			                'status'=>true
			                );
			        	$json = json_encode($condi); 
	                    echo $json;
		}



		



			    



			}



			else{



			        



			        



			         $condi = array(



			                'status'=>'not valid',



			                );



			     



			        	$json = json_encode($condi); 



			        	



			        echo $json;



			        



			    



			}



			



	



			



		}



		



		//======================



		



			



		public function resendotp(){



			$id=$_POST['email'];



			$where='phone';



			$table='customerlogin';



// 			$user=$this->Model->select_common_where($table,$where,$id);



			



				$q = $this->db->select()



    				->where('email',$id)



    				->or_where('phone' , $id)



    				->from('customerlogin')



    				->get();



    	    	$user  = $q->row();



    		



			



			if($user){



			    



			    $valid_user =$user->valid ;         // $this->db->get_where('customerlogin', array('phone' => $id , 'valid' => '1'))->row();



			    $email = $user->email ; 



			    



			   	$mob  =$user->phone ;



			    



			    $id = $user->id ;



			    



			 //   if($valid_user != 1){



			 //        $condi = array(



			 //               'status'=>'not valid',



			 //               );



			 //       	$json = json_encode($condi); 



			 //       	echo $json;



			 //   }else{



			    



              	$otp='9999'; //rand(100000,999999);		



			    



			    if($email){



			        
               $admin =  $this->db->get_where('admin_mail', array('id' => 1 ,))->row() ;
                    
                    $FromMail = $admin->send_mail ; 
                    $AdminMail = $admin->admin_mail ; 
                     $admin_mob = $admin->mobile   ;  
                  


			    $this->email->set_mailtype("html");



                $this->email->set_newline("\r\n");  



                $url=base_url('Artnhub/otpmail?id='.$otp);



                $file=file_get_contents($url) ; 



                $this->load->library('email');



                $this->email->from($FromMail, 'TWG Handicraft');



                $this->email->to($email);



                $this->email->subject('Forgot Password');



                $this->email->message($file);



                $this->email->send();







			        



			        



			    }



            



	           //	$mob=$_POST['email'];



		



        		smsforget($mob,$otp);



        		



        		 $table='customerlogin';



        		 $data = array(



        		 	'otp' =>$otp  



        		 );



        



        	$id=$mob ;



			$where='phone';



			 $this->Adminmodel->update_common($data,$table,$where,$id);



    



                 



			        $condi = array(



			                'status'=>true



			                );



			     



			        	$json = json_encode($condi); 



			        	



	                    echo $json;



	                    



        // 		}



		



			    



			}



			else{



			        



			        



			         $condi = array(



			                'status'=>'not valid',



			                );



			     



			        	$json = json_encode($condi); 



			        	



			        echo $json;



			        



			    



			}



			



	



			



		}



		



		//======================



		







		public function validforgetotp(){


	    	$otp=$_POST['otp'];
			$mob=$_POST['email'];
			$otp=$this->Model->validotp($mob,$otp);
			
    		$table='customerlogin';
			 $data = array(	
		 	'password'=>md5($_POST['pass']),	
			 );

    		 $where='phone';
    		 $id=$_POST['email'];
             $this->Model->update_common($data,$table,$where,$id);
             
			if(empty($otp)){
            			$otp=$_POST['otp'];

			$mob=$_POST['email'];
			$otp=$this->Model->validotpemail($mob,$otp);
			$table='customerlogin';
	    	$data = array(	
		 	'password'=>md5($_POST['pass']),	
		 );

	    $where='email';
		$id=$_POST['email'];
        $this->Model->update_common($data,$table,$where,$id);
		}

		if(empty($otp)){

		//	echo "Invalid OTP";
		$condi = array(
			                'status'=>false

		                );
    	$json = json_encode($condi); 
        echo $json;
		}else{

		    $condi = array(
			                'status'=>true
		                );
        	$json = json_encode($condi); 
        echo $json;

         // ================EMAIL===========================
      $user_id =   $otp->id ;
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
      $show_contact = $admin->show_contact   ;  
                  
     
        $subject= "Password Reset" ;
        $message_content   = "
             Hi, ".$name."
           
                     Your account's password has been change successfully. Please Login to your account.
                     
                     for more information get in touch with our customer support team. 
                     ".$show_contact."
                     www.twghandicraft.com
                     Thank you !" ; 
             
   	    $message_email  = "
             Hi, ".$name." <br> <br> 
           
                     Your account's password has been change successfully. Please Login to your account. <br> <br>
                     
                     for more information get in touch with our customer support team. <br>
                     ".$show_contact." <br>
                     www.twghandicraft.com <br>
                     Thank you !" ; 
             
   	   //===============USER======================
                    sms_send($mob,$message_content) ;
                    
                     if($email){
                    

                    			    $this->email->set_mailtype("html");
                                    $this->email->set_newline("\r\n");  
                                    $url=base_url('Artnhub/sendmail?id='.urlencode($message_email));
                                    $file=file_get_contents($url) ; 
                                    $this->load->library('email');
                                    $this->email->from($FromMail, 'TWG Handicraft');
                                    $this->email->to($email);
                                    $this->email->subject($subject);
                                    $this->email->message($file);
                                    $this->email->send();
                       	    }
                       	    
                       	    
		//	echo "Password Changed Successfully";



		}



			



		



	}







		public function logout(){



			session_destroy();



			redirect();



		}



		public function userlogout(){



			



				unset($_SESSION['session_id']);



				unset($_SESSION['session_email']);



				unset($_SESSION['session_name']);



			redirect('index');



		}



		public function product(){



				







	$id=$this->uri->segment(1);



	  	



	  	$where='url';



			$table='product_detail';



			$data['message']=$this->Model->select_common_where($table,$where,$id);



				$data['url']=$this->uri->segment(2);



			//pr($user);



			$this->load->view('product_detail.php',$data);



		}



    	



    	public function products(){







				 $id=$this->uri->segment(2);



	  		



	  		$where='url';



			$table='product_detail';



			$message=$this->Model->select_common_where($table,$where,$id);



			



			foreach ($message as  $value) {



				$cookie[]=$value['id'];







			}



/*	$myProductId=$message[0]['id'];



$ad_name = $myProductId; //comes from $_GET[]







// if the cookie exists, read it and unserialize it. If not, create a blank array



if(array_key_exists('recentviews', $_COOKIE)) {



    $cookie[] = $_COOKIE['recentviews'];



    $cookie = unserialize($cookie);



} else {



    $cookie[] = array();



}







// add the value to the array and serialize



$cookie[] = $ad_name;*/



 /* changed $cookie to $cookieString */







// save the cookie



setcookie('recentviews', $cookie , time()+3600);







$dataew = unserialize($_COOKIE['recentviews']);







$data['cookiedata']=$dataew;







	$id=$this->uri->segment(2);



	 	$where='url';



			$table='product';



			$data['message']=$this->Model->select_common_where($table,$where,$id);



			$data['url']=$this->uri->segment(2);



			//pr($user);



			$this->load->view('product_detail_varient.php',$data);



		}



    	



	public function pincode(){







				$id=$_POST['pro_id'];



			$where='sku_code';



			$table='product_detail';



			$proid=$this->Model->select_common_where($table,$where,$id);



			if(empty($proid)){







				$id=$_POST['pro_id'];



			$where='sku_code';



			$table='product';



			$proid=$this->Model->select_common_where($table,$where,$id);



			}



			



			



			if(empty($proid)){







				$id=$_POST['pro_id'];



			$where='sku_code';



			$table='giftproduct';



			$proid=$this->Model->select_common_where($table,$where,$id);



			}







			$id=$proid[0]['pincode_local'];



			$where='pincodecat';



			$table='pincode';



			$pincode_local=$this->Model->select_common_where($table,$where,$id);



		



			$id=$proid[0]['pincode_metro'];



			$where='pincodecat';



			$table='pincode';



			$pincode_metro=$this->Model->select_common_where($table,$where,$id);



			



			



					$id=$proid[0]['pincode_other'];



			$where='pincodecat';



			$table='pincode';



			$pincode_other=$this->Model->select_common_where($table,$where,$id);



		



		



			foreach ($pincode_local as $value) {



					if(in_array($_POST['pincodecheck'], $value)){



						$postoffce= $value['post_office'];



						$_SESSION['pincode']=$value['pincodecat'];



						$_SESSION['pincodeno']=$_POST['pincodecheck'];



					}







			}



			foreach ($pincode_metro as $value) {



					if(in_array($_POST['pincodecheck'], $value)){



						$postoffce= $value['post_office'];



						$_SESSION['pincode']=$value['pincodecat'];



						$_SESSION['pincodeno']=$_POST['pincodecheck'];



					}







			}



			foreach ($pincode_other as $value) {



					if(in_array($_POST['pincodecheck'], $value)){



						$postoffce= $value['post_office'];



						$_SESSION['pincode']=$value['pincodecat'];



						$_SESSION['pincodeno']=$_POST['pincodecheck'];



					}







			}



			



			



		



			if(!empty($postoffce)){



				echo $postoffce;



				



			}else{



				echo "not";



				unset($_SESSION['pincode']);



				unset($_SESSION['pincodeno']);







			}



	



	}



	



	//==================pincodecheck =====



	



	



	



	function pincode_check(){



	  



	 $pincode =     $_POST['pincodecheck'];



	 $address =     $_POST['cutomeraddress'];



	 if($address){



	 	$_SESSION['address_id'] = $address ;



	 	



	 	   $add = $this->db->get_where('user_address',array('id' => $address ))->row() ;



	 	   



				



	 	$_SESSION['cutomer_address'] = $add->city  ;



	 	$_SESSION['customer_name'] = $add->name  ;



	 	$_SESSION['customer_mob'] = $add->mobile  ;



	 			



	 }else{



	    



	                $id =    $_SESSION['session_id'];



				    $login = $this->db->get_where('customerlogin',array('id' => $id ))->row() ;



					$_SESSION['cutomer_address'] =   $login->city ;



					



					$_SESSION['customer_name'] = $login->Owner  ;



	 	            $_SESSION['customer_mob'] = $login->phone  ;



	 		



					



								



	 }



	 



// 	 echo $pincode ;



	    



			$pincode_local= $this->db->get_where('pincode', array('name' => $pincode ,))->row() ; 



			



// 			print_r($pincode_local) ;



		



		



			if(!empty($pincode_local)){



			    



			    $_SESSION['pincode']=$pincode_local->pincodecat;



			    



				$_SESSION['pincodeno']=$_POST['pincodecheck'];



				



				 $_SESSION['pincode'];



				



				



				$condi = array(



			              



			                'status'=>true ,



			                );



			     



			        	$json = json_encode($condi); 



			        	echo $json;



			        	



				



			}else{



			



				unset($_SESSION['pincode']);



				unset($_SESSION['pincodeno']);



				



				



				 $condi = array(



			              



			                'status'=>false ,



			                );



			     



			        	$json = json_encode($condi); 



			        	echo $json;



				







			}



	



	



	    



	    



	    



	}







	public function cart(){



	    



	    	$_SESSION['order_type'] = 'orders' ; 







		$this->load->view('cart.php');



	}



	



	public function production_cart(){



	    



	     if(empty($_SESSION['session_id'])){



			        



			       redirect('user_login');



			    }else{







	$_SESSION['order_type'] = 'production' ;



		$this->load->view('cart_production.php');



			    }



	}







public function test(){







		$this->load->view('test.php');



	}







//=================cart =======











	public function cartsession(){







			$id=$_POST['pro_id'];



			$where='sku_code';



			$table='product';



			$products=$this->Model->select_common_where($table,$where,$id);



			



				$prodct = $this->db->get_where('product_detail', array('sku_code' => $id))->row() ;



                		     		$min = $prodct->min_order_quan ;



                		     		



                		     		if($min >$_POST['quantity']){



                		     		    $quant = $min ;



                		     		}else{



                		     		     $quant = $_POST['quantity'] ;



                		     		}



                		     		



                		     		$priz = $prodct->selling_price ;



                		     	







			if(empty($products)){



                               $id=$_POST['pro_id'];







                         $where='sku_code';







                            $table='product_detail';







                         $products=$this->Adminmodel->select_com_where($table,$where,$id);



                                                  



                             }



                            if(empty($products)){



                            	$id=$_POST['pro_id'];



            			$where='sku_code';



            			$table='giftproduct';



            			$products=$this->Model->select_common_where($table,$where,$id);



                            }



                            



            			$str=$products[0]['discount_code'];



            			$selling_price=$priz;



                        $discount=explode(",",$str); 



                        $cart_price =$priz* $quant;



                        foreach ($discount as  $value) {



                        	$id=$value;



            			$discountslab=$this->Model->discountslab($id);



            		//pr($discountslab);



            			if($discountslab[0]['quanity']<=$quant ){



            				$slabs[]=$discountslab[0]['discount'];



                                                            $dis=($cart_price*$discountslab[0]['discount'])/100;



                                                          $var[]=$cart_price-$dis;







                                                                  }



                        }



                       // pr($var);



                       $discount_price=end($var); 



                       $discount_slab=end($slabs); 



            



                        



            		if(empty($_SESSION['session_id'])){



            



            			$id=$_POST['pro_id'];



            			



            			if(empty($_SESSION['gift'][$id]['notepad'])){



            				$_SESSION['gift'][$id]['notepad']='0';



            			}



            			if(empty($_SESSION['gift'][$id]['image'])){



            				$_SESSION['gift'][$id]['image']='0';



            			}



            			if($_POST['gstinc']=='1'){



            				$pergst=100+$_POST['gst'];



            			 $gst=$discount_price*$_POST['gst']/$pergst;



            



            			}else{



            



            			 $gst=$discount_price*$_POST['gst']/100;



            				 }



                          $_SESSION['cart'][$id] = array(



            							'product_id' =>$id,



            							'quantity' =>  $quant,



            							'price' =>$priz,



            							'discount_price' =>$discount_price,



            							'discount_slab' =>$discount_slab,



            							'gst' =>$gst,



            							'notepad' =>$_SESSION['gift'][$id]['notepad'],



            							'image' =>$_SESSION['gift'][$id]['image'],



            							'gstinc' =>$_POST['gstinc'],



            							'cart_price' =>$priz*$quant



            								);



		



			echo "true";



				//pr($_SESSION);



		}else{







			if(empty($discount_price)){



				$discount_price=$priz*$quant;



			}



			$id=$_POST['pro_id'];



			if($_POST['gstinc']=='1'){



				$pergst=100+$_POST['gst'];



			 $gst=$discount_price*$_POST['gst']/$pergst;







			}else{







			 $gst=$discount_price*$_POST['gst']/100;



				 }



				if(empty($_SESSION['gift'][$id]['notepad'])){



				$_SESSION['gift'][$id]['notepad']='0';



			}



			if(empty($_SESSION['gift'][$id]['image'])){



				$_SESSION['gift'][$id]['image']='0';



			}







			



			$_SESSION['cart'][$id] = array(



							'product_id' =>$id,



							'quantity' =>  $quant,



							'price' =>$priz,



							'discount_price' =>$discount_price,



							'discount_slab' =>$discount_slab,



							'gst' =>$gst,



							'notepad' =>$_SESSION['gift'][$id]['notepad'],



							'image' =>$_SESSION['gift'][$id]['image'],



							'gstinc' =>$_POST['gstinc'],



							'cart_price' =>$priz*$quant



								);



	



			foreach ($_SESSION['cart'] as  $value) {



			$id=$value['product_id'];



			$where='product_id';



			$table='cart';



			



			$user_id = $_SESSION['session_id'] ;



			



			$cart=$this->db->get_where('cart', array('product_id' => $id , 'user_id'=> $user_id ))->row() ;



			



	            	//$cart =$this->Model->select_common_where($table,$where,$id);



				$product_cart = $this->db->get_where('product_detail', array('sku_code' => $id))->row() ;



                		     		



                		     		$prize_cart = $product_cart->selling_price ;



               



			



				if(empty($value['discount_slab'] && $value['discount_price'])){



					$value['discount_slab']='';



					$value['discount_price']='';



				}



			if(empty($cart)){







			$data = array(



							'product_id' =>$value['product_id'],



							'quantity' => $value['quantity'],



							'price' =>$prize_cart,



							'cart_price' =>$prize_cart*$value['quantity'],



							'discount_price' =>$value['discount_price'],



							'discount_slab' =>$value['discount_slab'],



							'gst'=>$value['gst'],



							'gstinc' =>$value['gstinc'],



							'notepad' =>$value['notepad'],



							'image' =>$value['image'],



							'user_id' =>$_SESSION['session_id']



							 );



				$table='cart';



					$this->Model->insert_common($table,$data);



			}else{







				$data = array(



							'product_id' =>$value['product_id'],



							'quantity' =>  $value['quantity'],



							'price' =>$prize_cart,



							'cart_price' =>$prize_cart*$value['quantity'],



							'discount_price' =>$value['discount_price'],



							'discount_slab' =>$value['discount_slab'],



							'gst'=>$value['gst'],



							'gstinc' =>$value['gstinc'],



							'notepad' =>$value['notepad'],



							'image' =>$value['image'],



							'user_id' =>$_SESSION['session_id']



							 );



			$table='cart';



			$id=$value['product_id'];



			$where='product_id';



			



					  // $this->Adminmodel->update_common($data,$table,$where,$id);



					  



			    $this->db->where(array('product_id' => $id , 'user_id'=> $user_id ));



                $this->db->update('cart', $data);		  



					  



			}	



			}



			echo "false";







					//pr($_SESSION);



		}



	}



	







//========================22222==============



	public function cartsession2(){







			$id=$_POST['pro_id'];



			$where='sku_code';



			$table='product';



			$products=$this->Model->select_common_where($table,$where,$id);



			



				$prodct = $this->db->get_where('product_detail', array('sku_code' => $id))->row() ;



                		     		$min = $prodct->min_order_quan ;



                		     		



                		     		if($min >$_POST['quantity']){



                		     		    $quant = $min ;



                		     		}else{



                		     		     $quant = $_POST['quantity'] ;



                		     		}



                		     		



                		     		$priz = $prodct->selling_price ;



               







			if(empty($products)){



                               $id=$_POST['pro_id'];







                         $where='sku_code';







                            $table='product_detail';







                         $products=$this->Adminmodel->select_com_where($table,$where,$id);



                                                  



                             }



                            if(empty($products)){



                            	$id=$_POST['pro_id'];



            			$where='sku_code';



            			$table='giftproduct';



            			$products=$this->Model->select_common_where($table,$where,$id);



                            }



                            



            			$str=$products[0]['discount_code'];



            			$selling_price=$priz;



                        $discount=explode(",",$str); 



                        $cart_price =$priz*$quant;



                        foreach ($discount as  $value) {



                        	$id=$value;



            			$discountslab=$this->Model->discountslab($id);



            		//pr($discountslab);



            			if($discountslab[0]['quanity']<=$quant){



            				$slabs[]=$discountslab[0]['discount'];



                                                            $dis=($cart_price*$discountslab[0]['discount'])/100;



                                                          $var[]=$cart_price-$dis;







                                                                  }



                        }



                       // pr($var);



                       $discount_price=end($var); 



                       $discount_slab=end($slabs); 



            



                        



            		if(empty($_SESSION['session_id'])){



            



            			$id=$_POST['pro_id'];



            			



            			if(empty($_SESSION['gift'][$id]['notepad'])){



            				$_SESSION['gift'][$id]['notepad']='0';



            			}



            			if(empty($_SESSION['gift'][$id]['image'])){



            				$_SESSION['gift'][$id]['image']='0';



            			}



            			if($_POST['gstinc']=='1'){



            				$pergst=100+$_POST['gst'];



            			 $gst=$discount_price*$_POST['gst']/$pergst;



            



            			}else{



            



            			 $gst=$discount_price*$_POST['gst']/100;



            				 }



            				 



            				 



            				$cart =  $_SESSION['cart'][$id] ;



            				



            			if(in_array($id, $cart)){



            				    



            				     $condi = array(



			              



                			                'status'=>false ,



                			                );



                			     



                			        	$json = json_encode($condi); 



                			        	echo $json;



                			        	



			        	exit ; 



			        



            				    



            				}else{



            				 



                          $_SESSION['cart'][$id] = array(



            							'product_id' =>$id,



            							'quantity' =>$quant,



            							'price' =>$priz,



            							'discount_price' =>$discount_price,



            							'discount_slab' =>$discount_slab,



            							'gst' =>$gst,



            							'notepad' =>$_SESSION['gift'][$id]['notepad'],



            							'image' =>$_SESSION['gift'][$id]['image'],



            							'gstinc' =>$_POST['gstinc'],



            							'cart_price' =>$priz*$quant



            								);



		



// 			echo "true";



			



			  $condi = array(



			              



			                'status'=>true ,



			                );



			     



			        	$json = json_encode($condi); 



			        	echo $json;



			        	



			        	exit ; 



			        



				//pr($_SESSION);



	}	}else{







			if(empty($discount_price)){



				$discount_price=$priz*$quant;



			}



			$id=$_POST['pro_id'];



			if($_POST['gstinc']=='1'){



				$pergst=100+$_POST['gst'];



			 $gst=$discount_price*$_POST['gst']/$pergst;







			}else{







			 $gst=$discount_price*$_POST['gst']/100;



				 }



				if(empty($_SESSION['gift'][$id]['notepad'])){



				$_SESSION['gift'][$id]['notepad']='0';



			}



			if(empty($_SESSION['gift'][$id]['image'])){



				$_SESSION['gift'][$id]['image']='0';



			}







			$_SESSION['cart'][$id] = array(



							'product_id' =>$id,



							'quantity' =>$quant,



							'price' =>$priz,



							'discount_price' =>$discount_price,



							'discount_slab' =>$discount_slab,



							'gst' =>$gst,



							'notepad' =>$_SESSION['gift'][$id]['notepad'],



							'image' =>$_SESSION['gift'][$id]['image'],



							'gstinc' =>$_POST['gstinc'],



							'cart_price' =>$priz*$quant



								);



	



			foreach ($_SESSION['cart'] as  $value) {



			$id=$value['product_id'];



			$where='product_id';



			$table='cart';



			



			$user_id = $_SESSION['session_id'] ;



			



			$cart=$this->db->get_where('cart', array('product_id' => $id , 'user_id'=> $user_id ))->row() ;



			



	            	//$cart =$this->Model->select_common_where($table,$where,$id);



			



			



				if(empty($value['discount_slab'] && $value['discount_price'])){



					$value['discount_slab']='';



					$value['discount_price']='';



				}



				



			if(empty($cart)){







			$data = array(



							'product_id' =>$value['product_id'],



							'quantity' =>$value['quantity'],



							'price' =>$value['price'],



							'cart_price' =>$value['cart_price'],



							'discount_price' =>$value['discount_price'],



							'discount_slab' =>$value['discount_slab'],



							'gst'=>$value['gst'],



							'gstinc' =>$value['gstinc'],



							'notepad' =>$value['notepad'],



							'image' =>$value['image'],



							'user_id' =>$_SESSION['session_id']



							 );



			    	$table='cart';



					$this->Model->insert_common($table,$data);



					



					



					 $condi = array(



			              



			                'status'=>true ,



			                );



			     



			        	$json = json_encode($condi); 



			        	echo $json;



			}else{







				$data = array(



							'product_id' =>$value['product_id'],



							'quantity' =>$value['quantity'],



							'price' =>$value['price'],



							'cart_price' =>$value['cart_price'],



							'discount_price' =>$value['discount_price'],



							'discount_slab' =>$value['discount_slab'],



							'gst'=>$value['gst'],



							'gstinc' =>$value['gstinc'],



							'notepad' =>$value['notepad'],



							'image' =>$value['image'],



							'user_id' =>$_SESSION['session_id']



							 );



			$table='cart';



			$id=$value['product_id'];



			$where='product_id';



			



					  // $this->Adminmodel->update_common($data,$table,$where,$id);



					  



			    $this->db->where(array('product_id' => $id , 'user_id'=> $user_id ));



                $this->db->update('cart', $data);		  



				



					  $condi = array(



			              



			                'status'=>false ,



			                );



			     



			        	$json = json_encode($condi); 



			        	echo $json;



			        		  



			}



			



			}



	        	 $condi = array(



			              



			                'status'=>false ,



			                );



			     



			            	$json = json_encode($condi); 



			            	echo $json;







					//pr($_SESSION);



		}



	}



	



	



//========================22222==============



	public function cartsession3(){







			$id=$_POST['pro_id'];



			$where='sku_code';



			$table='product';



			$products=$this->Model->select_common_where($table,$where,$id);







			if(empty($products)){



                               $id=$_POST['pro_id'];







                         $where='sku_code';







                            $table='product_detail';







                         $products=$this->Adminmodel->select_com_where($table,$where,$id);



                                                  



                             }



                            if(empty($products)){



                            	$id=$_POST['pro_id'];



            			$where='sku_code';



            			$table='giftproduct';



            			$products=$this->Model->select_common_where($table,$where,$id);



                            }



                            



            			$str=$products[0]['discount_code'];



            			$selling_price=$_POST['selling_price'];



                        $discount=explode(",",$str); 



                        $cart_price =$_POST['selling_price']*$_POST['quantity'];



                        foreach ($discount as  $value) {



                        	$id=$value;



            			$discountslab=$this->Model->discountslab($id);



            		//pr($discountslab);



            			if($discountslab[0]['quanity']<=$_POST['quantity'] ){



            				$slabs[]=$discountslab[0]['discount'];



                                                            $dis=($cart_price*$discountslab[0]['discount'])/100;



                                                          $var[]=$cart_price-$dis;







                                                                  }



                        }



                       // pr($var);



                       $discount_price=end($var); 



                       $discount_slab=end($slabs); 



            



                        



            		if(empty($_SESSION['session_id'])){



            



            			$id=$_POST['pro_id'];



            			



            			if(empty($_SESSION['gift'][$id]['notepad'])){



            				$_SESSION['gift'][$id]['notepad']='0';



            			}



            			if(empty($_SESSION['gift'][$id]['image'])){



            				$_SESSION['gift'][$id]['image']='0';



            			}



            			if($_POST['gstinc']=='1'){



            				$pergst=100+$_POST['gst'];



            			 $gst=$discount_price*$_POST['gst']/$pergst;



            



            			}else{



            



            			 $gst=$discount_price*$_POST['gst']/100;



            				 }



            				 



            				 



            				$cart =  $_SESSION['cart'][$id] ;



            				



            			if(in_array($id, $cart)){



            				    



            				     $condi = array(



			              



                			                'status'=>false ,



                			                );



                			     



                			        	$json = json_encode($condi); 



                			        	echo $json;



                			        	



			        	exit ; 



			        



            				    



            				}else{



            				 



                          $_SESSION['cart'][$id] = array(



            							'product_id' =>$id,



            							'quantity' =>$_POST['quantity'],



            							'price' =>$_POST['selling_price'],



            							'discount_price' =>$discount_price,



            							'discount_slab' =>$discount_slab,



            							'gst' =>$gst,



            							'notepad' =>$_SESSION['gift'][$id]['notepad'],



            							'image' =>$_SESSION['gift'][$id]['image'],



            							'gstinc' =>$_POST['gstinc'],



            							'cart_price' =>$_POST['selling_price']*$_POST['quantity']



            								);



		



// 			echo "true";



			



			  $condi = array(



			              



			                'status'=>true ,



			                );



			     



			        	$json = json_encode($condi); 



			        	echo $json;



			        	



			        	exit ; 



			        



				//pr($_SESSION);



	}	}else{







			if(empty($discount_price)){



				$discount_price=$_POST['selling_price']*$_POST['quantity'];



			}



			$id=$_POST['pro_id'];



			if($_POST['gstinc']=='1'){



				$pergst=100+$_POST['gst'];



			 $gst=$discount_price*$_POST['gst']/$pergst;







			}else{







			 $gst=$discount_price*$_POST['gst']/100;



				 }



				if(empty($_SESSION['gift'][$id]['notepad'])){



				$_SESSION['gift'][$id]['notepad']='0';



			}



			if(empty($_SESSION['gift'][$id]['image'])){



				$_SESSION['gift'][$id]['image']='0';



			}







			



			$data = array(



							'product_id' =>$id,



							'user_id'=> $_SESSION['session_id'] ,



							'quantity'   =>$_POST['quantity'],



							'price'      =>$_POST['selling_price'],



							'discount_price'=>$discount_price,



				// 			'discount_slab' =>$discount_slab,



							'gst'           =>$gst,



							'notepad'       =>$_SESSION['gift'][$id]['notepad'],



							'image'         =>$_SESSION['gift'][$id]['image'],



							'gstinc'        =>$_POST['gstinc'],



							'cart_price'    =>$_POST['selling_price']*$_POST['quantity']



								);



	



			$id=$_POST['pro_id'];



			$where='product_id';



			$table='cart';



			



			$user_id = $_SESSION['session_id'] ;



			



			$cart=$this->db->get_where('cart', array('product_id' => $id , 'user_id'=> $user_id ))->row() ;



			



	            	//$cart =$this->Model->select_common_where($table,$where,$id);



			



			



			if(empty($value['discount_slab'] && $value['discount_price'])){



				$value['discount_slab']='';



				$value['discount_price']='';



			}



			



			if(empty($cart)){







		



				    $table='cart';



					$this->Model->insert_common($table,$data);



					



					 $condi = array(



			              



			                'status'=>true ,



			                );



			     



			        	$json = json_encode($condi); 



			        	echo $json;



			}else{



			    



	        $id=$_POST['pro_id'];



			$table='cart';



			$where='product_id';



			



					  // $this->Adminmodel->update_common($data,$table,$where,$id);



					  



		    $this->db->where(array('product_id' => $id , 'user_id'=> $user_id ));



            $this->db->update('cart', $data);		  



				



					  $condi = array(



			              



			                'status'=>false ,



			                );



			     



			        	$json = json_encode($condi); 



			        	echo $json;



			        		  



			}



			



		



					//pr($_SESSION);



		}



	}



	



	//============++Add to production =====



	



		public function addproduction(){







			$id=$_POST['pro_id'];



			$where='sku_code';



			$table='product_detail';



			$products=$this->Model->select_common_where($table,$where,$id);







			if(empty($products)){



                               $id=$_POST['pro_id'];







                         $where='sku_code';







                            $table='product';







                         $products=$this->Adminmodel->select_com_where($table,$where,$id);



                                                  



                             }



                            if(empty($products)){



                            	$id=$_POST['pro_id'];



            			$where='sku_code';



            			$table='giftproduct';



            			$products=$this->Model->select_common_where($table,$where,$id);



                            }



                            



            			$str=$products[0]['discount_code'];



            			$selling_price=$_POST['selling_price'];



                        $discount=explode(",",$str); 



                        $cart_price =$_POST['selling_price']*$_POST['quantity'];



                        foreach ($discount as  $value) {



                        	$id=$value;



            			$discountslab=$this->Model->discountslab($id);



            		//pr($discountslab);



            			if($discountslab[0]['quanity']<=$_POST['quantity'] ){



            				$slabs[]=$discountslab[0]['discount'];



                                                            $dis=($cart_price*$discountslab[0]['discount'])/100;



                                                          $var[]=$cart_price-$dis;







                                                                  }



                        }



                       // pr($var);



                       $discount_price=end($var); 



                       $discount_slab=end($slabs); 



            



                        



            		if(empty($_SESSION['session_id'])){



            



            			$id=$_POST['pro_id'];



            			



            			if(empty($_SESSION['gift'][$id]['notepad'])){



            				$_SESSION['gift'][$id]['notepad']='0';



            			}



            			if(empty($_SESSION['gift'][$id]['image'])){



            				$_SESSION['gift'][$id]['image']='0';



            			}



            			if($_POST['gstinc']=='1'){



            				$pergst=100+$_POST['gst'];



            			 $gst=$discount_price*$_POST['gst']/$pergst;



            



            			}else{



            



            			 $gst=$discount_price*$_POST['gst']/100;



            				 }



                          $_SESSION['cart_production'][$id] = array(



            							'product_id' =>$id,



            							'quantity' =>$_POST['quantity'],



            							'price' =>$_POST['selling_price'],



            							'discount_price' =>$discount_price,



            							'discount_slab' =>$discount_slab,



            							'gst' =>$gst,



            							'notepad' =>$_SESSION['gift'][$id]['notepad'],



            							'image' =>$_SESSION['gift'][$id]['image'],



            							'gstinc' =>$_POST['gstinc'],



            							'cart_price' =>$_POST['selling_price']*$_POST['quantity']



            								);



		



			echo "true";



				//pr($_SESSION);



		}else{







			if(empty($discount_price)){



				$discount_price=$_POST['selling_price']*$_POST['quantity'];



			}



			$id=$_POST['pro_id'];



			if($_POST['gstinc']=='1'){



				$pergst=100+$_POST['gst'];



			 $gst=$discount_price*$_POST['gst']/$pergst;







			}else{







			 $gst=$discount_price*$_POST['gst']/100;



				 }



				if(empty($_SESSION['gift'][$id]['notepad'])){



				$_SESSION['gift'][$id]['notepad']='0';



			}



			if(empty($_SESSION['gift'][$id]['image'])){



				$_SESSION['gift'][$id]['image']='0';



			}







			



			$_SESSION['cart_production'][$id] = array(



							'product_id' =>$id,



							'quantity' =>$_POST['quantity'],



							'price' =>$_POST['selling_price'],



							'discount_price' =>$discount_price,



							'discount_slab' =>$discount_slab,



							'gst' =>$gst,



							'notepad' =>$_SESSION['gift'][$id]['notepad'],



							'image' =>$_SESSION['gift'][$id]['image'],



							'gstinc' =>$_POST['gstinc'],



							'cart_price' =>$_POST['selling_price']*$_POST['quantity']



								);



	



			foreach ($_SESSION['cart_production'] as  $value) {



			$id=$value['product_id'];



			$where='product_id';



			$table='cart';



			



			$user_id = $_SESSION['session_id'] ;



			



			$cart=$this->db->get_where('cart_production', array('product_id' => $id , 'user_id'=> $user_id ))->row() ;



			



	            	//$cart =$this->Model->select_common_where($table,$where,$id);



			



			



				if(empty($value['discount_slab'] && $value['discount_price'])){



					$value['discount_slab']='';



					$value['discount_price']='';



				}



			if(empty($cart)){







			$data = array(



							'product_id' =>$value['product_id'],



							'quantity' =>$value['quantity'],



							'price' =>$value['price'],



							'cart_price' =>$value['cart_price'],



							'discount_price' =>$value['discount_price'],



							'discount_slab' =>$value['discount_slab'],



							'gst'=>$value['gst'],



							'gstinc' =>$value['gstinc'],



							'notepad' =>$value['notepad'],



							'image' =>$value['image'],



							'user_id' =>$_SESSION['session_id']



							 );



				$table='cart_production';



					$this->Model->insert_common($table,$data);



			}else{







				$data = array(



							'product_id' =>$value['product_id'],



							'quantity' =>$value['quantity'],



							'price' =>$value['price'],



							'cart_price' =>$value['cart_price'],



							'discount_price' =>$value['discount_price'],



							'discount_slab' =>$value['discount_slab'],



							'gst'=>$value['gst'],



							'gstinc' =>$value['gstinc'],



							'notepad' =>$value['notepad'],



							'image' =>$value['image'],



							'user_id' =>$_SESSION['session_id']



							 );



			$table='cart_production';



			$id=$value['product_id'];



			$where='product_id';



			



					  // $this->Adminmodel->update_common($data,$table,$where,$id);



					  



			    $this->db->where(array('product_id' => $id , 'user_id'=> $user_id ));



                $this->db->update('cart_production', $data);		  



					  



			}	



			}



			echo "false";







					//pr($_SESSION);



		}



	}



	



	//=====================



//==========================Admin update Quantity =============















	public function admincartquantity(){







			$id=$_POST['pro_id'];



			$where='sku_code';



			$table='product';



			$products=$this->Model->select_common_where($table,$where,$id);







			if(empty($products)){



                               $id=$_POST['pro_id'];







                         $where='sku_code';







                            $table='product_detail';







                         $products=$this->Adminmodel->select_com_where($table,$where,$id);



                                                  



                             }



                            if(empty($products)){



                            	$id=$_POST['pro_id'];



            			$where='sku_code';



            			$table='giftproduct';



            			$products=$this->Model->select_common_where($table,$where,$id);



                            }



                            



            			$str=$products[0]['discount_code'];



            			$selling_price=$_POST['selling_price'];



                        $discount=explode(",",$str); 



                        $cart_price =$_POST['selling_price']*$_POST['quantity'];



                        foreach ($discount as  $value) {



                        	$id=$value;



            			$discountslab=$this->Model->discountslab($id);



            		//pr($discountslab);



            			if($discountslab[0]['quanity']<=$_POST['quantity'] ){



            				$slabs[]=$discountslab[0]['discount'];



                                                            $dis=($cart_price*$discountslab[0]['discount'])/100;



                                                          $var[]=$cart_price-$dis;







                                                                  }



                        }



                       // pr($var);



                       $discount_price=end($var); 



                       $discount_slab=end($slabs); 



            



                        



            		if(empty($_SESSION['session_id'])){



            



            			$id=$_POST['pro_id'];



            			



            			if(empty($_SESSION['gift'][$id]['notepad'])){



            				$_SESSION['gift'][$id]['notepad']='0';



            			}



            			if(empty($_SESSION['gift'][$id]['image'])){



            				$_SESSION['gift'][$id]['image']='0';



            			}



            			if($_POST['gstinc']=='1'){



            				$pergst=100+$_POST['gst'];



            			 $gst=$discount_price*$_POST['gst']/$pergst;



            



            			}else{



            



            			 $gst=$discount_price*$_POST['gst']/100;



            				 }



                          $_SESSION['cart'][$id] = array(



            							'product_id' =>$id,



            							'quantity' =>$_POST['quantity'],



            							'price' =>$_POST['selling_price'],



            							'discount_price' =>$discount_price,



            							'discount_slab' =>$discount_slab,



            							'gst' =>$gst,



            							'notepad' =>$_SESSION['gift'][$id]['notepad'],



            							'image' =>$_SESSION['gift'][$id]['image'],



            							'gstinc' =>$_POST['gstinc'],



            							'cart_price' =>$_POST['selling_price']*$_POST['quantity']



            								);



		



			echo "true";



				//pr($_SESSION);



		}else{







			if(empty($discount_price)){



				$discount_price=$_POST['selling_price']*$_POST['quantity'];



			}



			$id=$_POST['pro_id'];



			if($_POST['gstinc']=='1'){



				$pergst=100+$_POST['gst'];



			 $gst=$discount_price*$_POST['gst']/$pergst;







			}else{







			 $gst=$discount_price*$_POST['gst']/100;



				 }



				if(empty($_SESSION['gift'][$id]['notepad'])){



				$_SESSION['gift'][$id]['notepad']='0';



			}



			if(empty($_SESSION['gift'][$id]['image'])){



				$_SESSION['gift'][$id]['image']='0';



			}







			



			$_SESSION['cart'][$id] = array(



							'product_id' =>$id,



							'quantity' =>$_POST['quantity'],



							'price' =>$_POST['selling_price'],



							'discount_price' =>$discount_price,



							'discount_slab' =>$discount_slab,



							'gst' =>$gst,



							'notepad' =>$_SESSION['gift'][$id]['notepad'],



							'image' =>$_SESSION['gift'][$id]['image'],



							'gstinc' =>$_POST['gstinc'],



							'cart_price' =>$_POST['selling_price']*$_POST['quantity']



								);



	



			foreach ($_SESSION['cart'] as  $value) {



			$id=$value['product_id'];



			$where='product_id';



			$table='cart';



			



			$user_id = $_POST['user_id'] ;



			



			$cart=$this->db->get_where('cart', array('product_id' => $id , 'user_id'=> $user_id ))->row() ;



			



	            	//$cart =$this->Model->select_common_where($table,$where,$id);



			



			



				if(empty($value['discount_slab'] && $value['discount_price'])){



					$value['discount_slab']='';



					$value['discount_price']='';



				}



			if(empty($cart)){







			$data = array(



							'product_id' =>$value['product_id'],



							'quantity' =>$value['quantity'],



							'price' =>$value['price'],



							'cart_price' =>$value['cart_price'],



							'discount_price' =>$value['discount_price'],



							'discount_slab' =>$value['discount_slab'],



							'gst'=>$value['gst'],



							'gstinc' =>$value['gstinc'],



							'notepad' =>$value['notepad'],



							'image' =>$value['image'],



							'user_id' =>   $user_id ,



							 );



				$table='cart';



					$this->Model->insert_common($table,$data);



			}else{







				$data = array(



							'product_id' =>$value['product_id'],



							'quantity' =>$value['quantity'],



							'price' =>$value['price'],



							'cart_price' =>$value['cart_price'],



							'discount_price' =>$value['discount_price'],



							'discount_slab' =>$value['discount_slab'],



							'gst'=>$value['gst'],



							'gstinc' =>$value['gstinc'],



							'notepad' =>$value['notepad'],



							'image' =>$value['image'],



							'user_id' =>$user_id ,



							 );



			$table='cart';



			$id=$value['product_id'];



			$where='product_id';



			



					  // $this->Adminmodel->update_common($data,$table,$where,$id);



					  



			    $this->db->where(array('product_id' => $id , 'user_id'=> $user_id ));



                $this->db->update('cart', $data);		  



					  



			}	



			}



			echo "false";







					//pr($_SESSION);



		}



	}















//===============================end admin update quantity============================



//===========Admin product update ====







function update_product_admin(){

			$user_id = $_POST['user_id'];
            $user_result   = $this->db->get_where('customerlogin', array('id' => $user_id ,))->row() ;
     		$discount_per = $user_result->discount_per ; 
			$id=$_POST['pro_id'];
			$req_id=$_POST['req_id'];
			$user_id = $_POST['user_id'];

    		$where='sku_code';
			$table='product';
			$products=$this->Model->select_common_where($table,$where,$id);

			if(empty($products)){
                               $id=$_POST['pro_id'];
                               $where='sku_code';
                               $table='product_detail';

                         $products=$this->Adminmodel->select_com_where($table,$where,$id);
                             }

                            if(empty($products)){
                            	$id=$_POST['pro_id'];
            			$where='sku_code';
            			$table='giftproduct';
            			$products=$this->Model->select_common_where($table,$where,$id);

                            }

            			$str=$products[0]['discount_code'];

                    	 	$dis_price  = $_POST['selling_price']*($discount_per/100) ;
	                    $price = $_POST['selling_price'] - $dis_price ; 
            			$selling_price=$price;
                        $discount=explode(",",$str); 
                        $cart_price =$price*$_POST['quantity'];
                        foreach ($discount as  $value) {
                        	$id=$value;
            			$discountslab=$this->Model->discountslab($id);
            		//pr($discountslab);
            			if($discountslab[0]['quanity']<=$_POST['quantity'] ){

        				$slabs[]=$discountslab[0]['discount'];

                        $dis=($cart_price*$discountslab[0]['discount'])/100;

                          $var[]=$cart_price-$dis;

                              }

                        }

                       // pr($var);

                       $discount_price=end($var); 
                       $discount_slab=end($slabs); 
			if(empty($discount_price)){

				$discount_price=$_POST['selling_price']*$_POST['quantity'];
			}
			$id=$_POST['pro_id'];
			if($_POST['gstinc']=='1'){
				$pergst=100+$_POST['gst'];
    			 $gst=$discount_price*$_POST['gst']/$pergst;
			}else{

		 $gst=$discount_price*$_POST['gst']/100;

				 }
				if(empty($_SESSION['gift'][$id]['notepad'])){
				$_SESSION['gift'][$id]['notepad']='0';
			}

			if(empty($_SESSION['gift'][$id]['image'])){

			$_SESSION['gift'][$id]['image']='0';

			}

			$_SESSION['cart'][$id] = array(
							'product_id' =>$id,
							'quantity' =>$_POST['quantity'],
							'price' =>$price,
							'discount_price' =>$discount_price,
							'discount_slab' =>$discount_slab,
    						'gst' =>$gst,
							'notepad' =>$_SESSION['gift'][$id]['notepad'],
							'image' =>$_SESSION['gift'][$id]['image'],
							'gstinc' =>$_POST['gstinc'],
							'cart_price' =>$_POST['selling_price']*$_POST['quantity']

						);

		

// =========================================
              $product_detail  = $this->db->get_where('product_detail', array('sku_code' => $id ,))->row() ;
      
       $order_pro  = $this->db->get_where('order_detail', array('product_id' => $id , 'order_rand_id'=> $req_id ))->row() ;
      
      
                 $pro_id = $id ; 
                 
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
			
			        	$net_inventory = $pro_availability - $holdlow;
			        	
			        	$net = $net_inventory + $order_pro->quantity  ; 
			        	
			        	$update_qty  =   $_POST['quantity'] ;
// ===========================
	              
	         if($net < $update_qty ||  $_POST['quantity']== 0)
	         {
	             	$total_price = array('status' => false ,) ;
				echo json_encode($total_price);
	
	          
	          
	           //	$this->session->set_flashdata('low_availab', $pro_id);
	           	
	           //	  redirect('Admin/requestdetail/'.$req_id) ;
	           
	           exit ;
	         }else{
	         
			    $orders =$this->db->get_where('orders', array('id'=> $req_id ))->row() ;
		    	$order_type = $orders->order_type ; 
			    	if($order_type == 'production'){
        	    	    $status = 1 ;
			    	}else{

			    	    $status = 0 ;
			    	}


				$data = array(
				    
				    
							'quantity' =>$_POST['quantity'],
							'price' =>$price,
							'cart_price' =>$price*$_POST['quantity'],
							'productgst'=>$gst,
				        // 	'order_status'=> $status,
							 );
        			$table='order_detail';
        			$where='product_id';
        
        					  // $this->Adminmodel->update_common($data,$table,$where,$id);
        			    $this->db->where(array('product_id' => $id , 'order_rand_id'=> $req_id ));
                        $this->db->update('order_detail', $data);
	         }	
			//========================

				$cart=$this->db->get_where('order_detail', array( 'order_rand_id'=> $req_id ))->result() ;

		foreach($cart as $value){

		    $order_id = $value->product_id ;
	      $product_detail  =  $this->db->get_where('product_detail', array('sku_code' => $order_id ,))->row() ;
          $box_volume = 	$product_detail->box_volume_weight ;
                              $sub_price =$value->price* $value->quantity;
                              $finalvolume+= $box_volume*$value->quantity;
                              $sub_gst =$value->productgst;
                              $total_gst+= $sub_gst ;
                              $total_price+= $sub_price + $total_gst ;

		}
			if($total_price){
			    	//===========================
		$total_price = array('total' => $total_price , 'final_volume' => $finalvolume  ) ;
				echo json_encode($total_price);
			}
			else{
			    $total_price = array('total' => false  , 'final_volume' => $finalvolume  ) ;
			echo json_encode($total_price);
		}
			//pr($_SESSION);

		}







//=========================



	public function delcartsession(){







		$id=$_POST['id'];



	@unlink($_SESSION['gift'][$id]['link']);



		unset($_SESSION['cart'][$id]);



		unset($_SESSION['gift'][$id]);



		



  if(empty($_SESSION['cart'])){



                                        	unset($_SESSION['discount']);



                                        	unset($_SESSION['subprice']);



                                        	unset($_SESSION['totalprice']);



                                        	unset($_SESSION['pincode']);



                                        	unset($_SESSION['pincodeno']);



                                        		unset($_SESSION['gift']);



                                        	unset($_SESSION['delievry']);



                                        	unset($_SESSION['expected_days']);



                                        	unset($_SESSION['del_charge']);



                                        	unset($_SESSION['coupon']);



                                        	unset($_SESSION['couponapplyprice']);



                                        	unset($_SESSION['couponname']);



                                        	unset($_SESSION['finalvolume']);



                                        	unset($_SESSION['pincodeno']);



                                        	unset($_SESSION['allgst']);



                                        	unset($_SESSION['finalgst']);







                                        }else{







                                         foreach ($_SESSION['cart'] as  $value) {



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







                                                   }



                                                   	unset($_SESSION['couponapplyprice']);



                                                   	unset($_SESSION['couponname']);



													unset($_SESSION['coupon']);



                                               }











	}



	



	



	//======================



	



	



	



		public function delproduction_session(){







		$id=$_POST['id'];



	@unlink($_SESSION['gift'][$id]['link']);



		unset($_SESSION['cart_production'][$id]);



		unset($_SESSION['gift'][$id]);



		



  if(empty($_SESSION['cart_production'])){



                                        	unset($_SESSION['discount']);



                                        	unset($_SESSION['subprice']);



                                        	unset($_SESSION['totalprice']);



                                        	unset($_SESSION['pincode']);



                                        	unset($_SESSION['pincodeno']);



                                        		unset($_SESSION['gift']);



                                        	unset($_SESSION['delievry']);



                                        	unset($_SESSION['expected_days']);



                                        	unset($_SESSION['del_charge']);



                                        	unset($_SESSION['coupon']);



                                        	unset($_SESSION['couponapplyprice']);



                                        	unset($_SESSION['couponname']);



                                        	unset($_SESSION['finalvolume']);



                                        	unset($_SESSION['pincodeno']);



                                        	unset($_SESSION['allgst']);



                                        	unset($_SESSION['finalgst']);







                                        }else{







                                         foreach ($_SESSION['cart_production'] as  $value) {



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







                                                   }



                                                   	unset($_SESSION['couponapplyprice']);



                                                   	unset($_SESSION['couponname']);



													unset($_SESSION['coupon']);



                                               }











	}



	



	



	//========================



	



	public function delusercartsession(){



		$id=$_POST['id'];



		$user_id=$_SESSION['session_id'];



		$id=$_POST['id'];



		@unlink($_SESSION['gift'][$id]['link']);







		unset($_SESSION['cart'][$id]);



			unset($_SESSION['gift'][$id]);







	  $this->Adminmodel->delusercart($id,$user_id);



   $data=$this->Adminmodel->cartproduct($user_id,$id);







									$id=$_SESSION['session_id'];



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



	



	



	//====================================



	



		



	public function delproduction_user(){



		$id=$_POST['id'];



		$user_id=$_SESSION['session_id'];



		$id=$_POST['id'];



		@unlink($_SESSION['gift'][$id]['link']);







		unset($_SESSION['cart_production'][$id]);



			unset($_SESSION['gift'][$id]);







	  $this->Adminmodel->delproductionuser($id,$user_id);



	  



	  



   $data=$this->Adminmodel->cartproduct($user_id,$id);







									$id=$_SESSION['session_id'];



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



	



	//===================================







		/*	public function discountslab(){



				 $quantity=$_POST['quantity'];



				 $discount_code=$_POST['discount_code'];



				 $selling_price=$_POST['selling_price'];







				 $discount=explode(",",$discount_code); 



                                                       // pr($discount);



                                                        foreach ($discount as  $value) {



                                                            $id = $value;  



                                                              $where='disc_code';



                                                             $table='discountslab';



                                                            $discountslab = $this->Model->select_common_where($table,$where,$id);



                                                            $str = $discountslab[0]['disc_slab'];



															preg_match_all('!\d+!', $str, $matches);



															 $var = implode(' ', $matches[0]);															



                                                            if($var<=$quantity ){



                                                            $dis=($selling_price*$discountslab[0]['discount'])/100;



                                                          echo    $selling_price-$dis."<br>";



                                                      }



                                                        }



			}*/







			







			public function checkout(){



				



// 			pr($_POST);



// 			pr($_SESSION);die;







			 $volume=$_POST['finalvolume'].'.0';



			 



		



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



			



			 $del= $_POST['delievry'];



			



			if($del=='self'){



			    



			    $packingprice = 0 ;



			}



			



			



			



			//=============================



				



				 $del= $_POST['delievry'];







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

                                    $order_processing_gst  = 90 ;

           }



           else{



               



                 $order_processing = 0 ;


       $order_processing_gst  = 0 ;
               



           }



        



        //==========================================================================



        



            



                            if($cart_price>='40000' && $cart_price < '100000' ){



                            



                                    $total_discount  =   ($cart_price*3)/100 ; 



                                    



                                    $gst_dis = $finalgst*3/100 ;



                                    



                                    $final_discount = $total_discount + $gst_dis ;



                                    



                                      $_SESSION['tot_discount'] =  $final_discount;



                                      



                            } elseif($cart_price >='100000' ){



                            



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











        $over_all_gst = $_SESSION['finalgst'] +$_SESSION['del_charge']*18/100 + $packingprice*12/100 + $order_processing_gst - $gst_dis ;











				 $price=$_POST['totalprice']+round($_SESSION['del_charge']*118/100,2)+$_SESSION['codprice'] + round($packingprice*112/100 , 2)  + $order_processing + $order_processing_gst - $final_discount ;



				 



			



		    $_SESSION['totalprice']=round($price+$_POST['transport']-$_POST['admindisc']-$_POST['userprice'] , 2);



		    



		    



			$var=array('totalprice'=>round($price,2),'charge'=>round(($_SESSION['del_charge']),2), 'packingprice' => round($packingprice,2)  ,  'over_all_gst' => round($over_all_gst ,2));



		



		



		  // 	 $_SESSION['totalprice'] = $price;



			  



		     $_SESSION['packingprice']  = $packingprice ;



		     



		         



                         



		



			echo json_encode($var);



				//$this->load->view('checkout.php');



			



			}



			



			



			//===============================after login checkout ====



				public function checkout_afterlogin(){



				



// 			pr($_POST);



// 			pr($_SESSION);die;







			 $volume=$_POST['finalvolume'].'.0';



			 



		



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



			



			 $del= $_POST['delievry'];



			



			if($del=='self'){



			    



			    $packingprice = 0 ;



			}



			



			



			



			//=============================



				



				 $del= $_POST['delievry'];







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



        



        



        $finalgst = $_POST['gst_total'] ;



        



        



        



          $cart_price =  $_POST['totalprice'] -$_POST['gst_total'];



          



       



           if($cart_price >4999 && $cart_price < '11999' ){



                                    



                                    $order_processing = 500 ;
                                     $order_processing_gst  = 90 ;



           }



           else{



               



                 $order_processing = 0 ;
                 $order_processing_gst  = 0 ;


               



           }



        



        //==========================================================================



        



            



                            if($cart_price>='40000' && $cart_price < '100000' ){



                            



                                    $total_discount  =   ($cart_price*3)/100 ; 



                                    



                                    $gst_dis = $finalgst*3/100 ;



                                    



                                    $final_discount = $total_discount + $gst_dis ;



                                    



                                      $_SESSION['tot_discount'] =  $final_discount;



                                      



                            } elseif($cart_price >='100000' ){



                            



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











        $over_all_gst =$_POST['gst_total'] +$_SESSION['del_charge']*18/100 + $packingprice*12/100 + $order_processing_gst - $gst_dis ;











				 $price=$_POST['totalprice']+round($_SESSION['del_charge']*118/100,2)+$_SESSION['codprice'] + round($packingprice*112/100 , 2)  + $order_processing - $final_discount + $order_processing_gst ;



				 



			



		    $_SESSION['totalprice']=round($price+$_POST['transport']-$_POST['admindisc']-$_POST['userprice'] , 2);



		    



		    



			$var=array('totalprice'=>round($price,2),'charge'=>round(($_SESSION['del_charge']),2), 'packingprice' => round($packingprice,2)  ,  'over_all_gst' => round($over_all_gst ,2));



		



		



		  // 	 $_SESSION['totalprice'] = $price;



			  



		     $_SESSION['packingprice']  = $packingprice ;



		     



		         



                         



		



			echo json_encode($var);



				//$this->load->view('checkout.php');



			



			}



			



		



			



			//==================Cart Check out ============



			



			



			function cart_checkout(){



			    



				



// 			pr($_POST);



// 			pr($_SESSION);die;







			 $volume=$_POST['finalvolume'].'.0';



			 



		



		    



		     $default_pincode =$_POST['default_pincode'] ;



		     



		



		



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



			



			 $del= $_POST['delievry'];



			



			if($del=='self'){



			    



			    $packingprice = 0 ;



			}



			



			



			



			//=============================



				



				 $del= $_POST['delievry'];







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



			    



			    



		    	$_SESSION['expected_days']='5-9 Days';



				if($quantity<=10.00){



						 $_SESSION['del_charge']='175';







				}



				



				  elseif ($quantity>=10.001) {



					



					 $quan=$quantity-10;



					$kg=$quan*20;



					$finalkg=175+$kg;



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







  $cart_price =   $_SESSION['subprice'] - $_SESSION['finalgst'] ;



  



   if($cart_price >4999 && $cart_price < '11999' ){



                            



                            $order_processing = 500 ;
                            
                             $order_processing_gst  = 90 ;



   }



   else{



       



         $order_processing = 0 ;
         $order_processing_gst  = 0 ;


       



   }







//==========================================================================











$over_all_gst = $_SESSION['finalgst'] +$_SESSION['del_charge']*118/100 + $packingprice*112/100 + $order_processing_gst ;











				 $price=$_POST['totalprice']+($_SESSION['del_charge']*118/100)+$_SESSION['codprice'] + ($packingprice*112/100)  + $order_processing ;



				 



			



		    $_SESSION['totalprice']=round($price+$_POST['transport']-$_POST['admindisc']-$_POST['userprice']);



		    



		    



			$var=array('totalprice'=>round($price,2),'charge'=>round(($_SESSION['del_charge']),2), 'packingprice' => round($packingprice,2)  ,  'over_all_gst' => round($over_all_gst ,2));



		



		



		  // 	 $_SESSION['totalprice'] = $price;



			  



		     $_SESSION['packingprice']  = $packingprice ;



		



			echo json_encode($var);



				//$this->load->view('checkout.php');



			



			



			    



			    



			    



			    



			}



			



			



			//==================================



			



			//==========+Admin check out =======



			



			



			public function checkout_admin(){



				



// 			pr($_POST);



// 			pr($_SESSION);die;



            



            $user_id =$_POST['user_id'] ;



            



            $order_detail  = $this->db->get_where('orders', array('user_id' => $user_id ,))->row();



			   



            $pincode = $order_detail->pincode ;



            



            



            $pincode_data  = $this->db->get_where('pincode', array('name' => $pincode ,))->row();



            



            



           $_SESSION['pincode']   = $pincode_data->pincodecat ;



            







			 $volume=$_POST['finalvolume'].'.0';



			 



		



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



			



			 $del= $_POST['delievry'];



			



			if($del=='self'){



			    



			    $packingprice = 0 ;



			}



			



			



			



			//=============================



				



				



				 $del= $_POST['delievry'];















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



				



			



			if(empty($_SESSION['couponapplyprice'])){







				 $price=$_POST['totalprice']+$_SESSION['del_charge']+$_SESSION['codprice'] + $packingprice;



				 



			



			 $_SESSION['totalprice']=round($price+$_POST['transport']-$_POST['admindisc']-$_POST['userprice']);



			$var=array('totalprice'=>round($price+$_POST['transport']-$_POST['admindisc']-$_POST['userprice'],2),'charge'=>round($_SESSION['del_charge'],2)  , 'packingprice' => round($packingprice,1));



		}else {



			



			 $price=$_POST['totalprice']+$_SESSION['del_charge']-$_SESSION['coupon']+$_SESSION['codprice'];



			  



			  $_SESSION['couponapplyprice']=round($price+$_POST['transport']-$_POST['admindisc']-$_POST['userprice']);











			$var=array('totalprice'=> round($price+$_POST['transport']-$_POST['admindisc'],2)-$_POST['userprice'],'charge'=>round($_SESSION['del_charge'],2), 'packingprice' => round($packingprice,2),1 );



		}



		



		     $_SESSION['totalprice'] = $price;



			  



		     $_SESSION['packingprice']  = $packingprice ;



		     



		     $shipping = $_SESSION['del_charge'] ;



		     



		     	$req_id=$_POST['req_id'];



		     



		     $order_data = array(



		         



		         'subtotal' => $_POST['totalprice'] ,



		         'finalamount' => $price ,



		         



		         'shipping_charge' => $shipping  ,



		         



		         'packing_charge' => $packingprice,



		         



		         );



		     



		      $this->db->where(array('order_id'=> $req_id ));



               $this->db->update('orders', $order_data);	



                



		



			echo json_encode($var);



				//$this->load->view('checkout.php');



			



			}



			



			



			



				function request_complete(){



				    



				    



				



// 			pr($_POST);



// 			pr($_SESSION);die;



            



            $user_id =$_POST['user_id'] ;



            



            $order_detail  = $this->db->get_where('orders', array('user_id' => $user_id ,))->row();



			   



            $pincode = $order_detail->pincode ;



            



            



            $pincode_data  = $this->db->get_where('pincode', array('name' => $pincode ,))->row();



            



            



           $_SESSION['pincode']   = $pincode_data->pincodecat ;



            







			 $volume=$_POST['finalvolume'].'.0';



			 



		



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



			



			 $del= $_POST['delievry'];



			



			if($del=='self'){



			    



			    $packingprice = 0 ;



			}



			



			



			



			//=============================



				



				



				 $del= $_POST['delievry'];















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



				



			



			if(empty($_SESSION['couponapplyprice'])){







				 $price=$_POST['totalprice']+$_SESSION['del_charge']+$_SESSION['codprice'] + $packingprice;



				 



			



			 $_SESSION['totalprice']=round($price+$_POST['transport']-$_POST['admindisc']-$_POST['userprice']);



			$var=array('totalprice'=>round($price+$_POST['transport']-$_POST['admindisc']-$_POST['userprice'],2),'charge'=>round($_SESSION['del_charge'],2)  , 'packingprice' => round($packingprice,1));



		}else {



			



			 $price=$_POST['totalprice']+$_SESSION['del_charge']-$_SESSION['coupon']+$_SESSION['codprice'];



			  



			  $_SESSION['couponapplyprice']=round($price+$_POST['transport']-$_POST['admindisc']-$_POST['userprice']);











			$var=array('totalprice'=> round($price+$_POST['transport']-$_POST['admindisc'],2)-$_POST['userprice'],'charge'=>round($_SESSION['del_charge'],2), 'packingprice' => round($packingprice,2),1 );



		}



		



		     $_SESSION['totalprice'] = $price;



			  



		     $_SESSION['packingprice']  = $packingprice ;



		     



		     $shipping = $_SESSION['del_charge'] ;



		     



		     	$req_id=$_POST['req_id'];



		     



		     $order_data = array(



		         



		         'subtotal' => $_POST['totalprice'] ,



		         'finalamount' => $price ,



		         



		         'shipping_charge' => $shipping  ,



		         



		         'packing_charge' => $packingprice,



		         



		         );



		     



		      $this->db->where(array('order_id'=> $req_id ));



               $this->db->update('orders', $order_data);	



                



		



			echo json_encode($var);



				//$this->load->view('checkout.php');



			



			



				}



			//========================







			public function couponapply(){



			$id=$_POST['coupon'];



			$where='coupon_name';



			$table='coupon';



			$coupon=$this->Model->select_common_where($table,$where,$id);







		 $date=date('Y-m-d');



			



			if(empty($coupon)){



				echo "empty";



			}else if ($coupon[0]['start_date']<= $date || $coupon[0]['end_date']>=$date){







				$val = $_SESSION['totalprice']/100*$coupon[0]['coupon_percent'];



				



				if($val>$coupon[0]['max_discount']){



				



					$val =$coupon[0]['max_discount'];



				}



				$_SESSION['coupon']=$val;



				$_SESSION['couponname']=$coupon[0]['coupon_name'];



				 $_SESSION['couponapplyprice']=$_SESSION['totalprice']-$val;







				



		}else{



			echo "empty";



		}



			}



			public function couponremove(){



				unset($_SESSION['coupon']);



				unset($_SESSION['couponname']);



				unset($_SESSION['couponapplyprice']);



			}







			



	public function checkouts(){


if(empty($_SESSION['session_name'])){
   
   	  	unset($_SESSION['session_id']);
   	
 
}
	    



	    if( $_SESSION['subprice'] < 4999){



	        



	        	redirect('cart');



	    }



				



					$id=$_SESSION['session_id'];



            		$where='user_id';



            		 if(	$_SESSION['order_type'] == 'orders'){



                             $table='cart';



                        }else{



                             $table='cart_production';



                        }



                        $cart=$this->Adminmodel->select_com_where($table,$where,$id);



            				



				 if(empty($_SESSION['session_id']) && empty($_SESSION['subprice'])){



				    



				 	redirect('cart');



				 }elseif($_SESSION['session_id'] && empty($cart) ){



				     



				     	redirect('cart');



				     



				 }



				



				if($_SESSION['session_id'] && empty( $_SESSION['pincode'])){



				    



	             $id =    $_SESSION['session_id'];



				    



				    $login = $this->db->get_where('customerlogin',array('id' => $id ))->row() ;



				    



					    	$pin =  $login->PinCode ;



							$_SESSION['pincodeno'] =   $login->PinCode ;



								 $q =$this->db->select('*')



                                	      ->from('pincode')



                                          ->where("name LIKE '%$pin%'")



                                          ->get();



                               $pincode = $q->row() ;



                                $_SESSION['pincode'] = $pincode->pincodecat ;



				}



				



		if(	$_SESSION['order_type'] == 'orders'){



		    



                            $this->checkout_inventry() ;



				



                        }



                      



				



			$id=$_SESSION['session_id'];



	  		$where='user_id';



			$table='orders';



			$dataa=$this->Model->select_common_where($table,$where,$id);



			



		



			



				$pincode=$dataa[0]['pincode'];



				$result=pincode($pincode);



				$data=json_decode($result);



				$dataa['address']=$data->PostOffice;



				



		//=======default addresss=========



		



				$id=$_SESSION['session_id'];



	  		$where='id';



			$table='customerlogin';



			$dataa['default_add']=$this->Model->select_common_where($table,$where,$id);



			



		



			



//======================================			



					$id=$_SESSION['session_id'];



	  		$where='user_id';



			$table='user_address';



			$dataa['message']=$this->Model->select_common_where($table,$where,$id);



			



			



						$id=$_SESSION['session_id'];



	  		$where='user_id';



		 if($_SESSION['order_type'] == 'orders'){



                             $table='cart';



                        }else{



                             $table='cart_production';



                        }



                        $dataa['order']=$this->Model->select_common_where($table,$where,$id);



			



		    



			    



			



		



				



		$this->load->view('checkout.php',$dataa);



	}



	



//==============Production Checkouts ========







	public function production_checkouts(){



				



				// if(empty($_SESSION['session_id']) || empty($_SESSION['subprice'])){



				    



				// 	redirect('cart');



				// }



				



			$id=$_SESSION['session_id'];



	  		$where='user_id';



			$table='orders';



			$dataa=$this->Model->select_common_where($table,$where,$id);



			



		



			



				$pincode=$dataa[0]['pincode'];



				$result=pincode($pincode);



				$data=json_decode($result);



				$dataa['address']=$data->PostOffice;



				



		//=======default addresss=========



		



				$id=$_SESSION['session_id'];



	  		$where='id';



			$table='customerlogin';



			$dataa['default_add']=$this->Model->select_common_where($table,$where,$id);



			



		



			



//======================================			



					$id=$_SESSION['session_id'];



	  		$where='user_id';



			$table='user_address';



			$dataa['message']=$this->Model->select_common_where($table,$where,$id);



			



			



						$id=$_SESSION['session_id'];



	  		$where='user_id';



			$table='cart';



			$dataa['order']=$this->Model->select_common_where($table,$where,$id);



			



			$_SESSION['order_type'] = 'production' ;



				



		$this->load->view('checkout_production.php',$dataa);



	}



	



	



	//============================



	



	public function adduser_address(){







		if(empty($_POST['landmark'])){



			$_POST['landmark']='';



		}



		if(empty($_POST['alternate'])){



			$_POST['alternate']='';



		}



		$data = array(



							'user_id' =>$_SESSION['session_id'],



							'name' =>$_POST['name'],



							'mobile' =>$_POST['mobile'],



							'pincode' =>$_POST['pin'],



							'locality' =>$_POST['locality'],



							'address' =>$_POST['address'],



							'city' =>$_POST['city'],



							'state' =>$_POST['state'],



							'landmark' =>$_POST['landmark'],



							'alternate' =>$_POST['alternate'],



							'delievry' =>$_POST['optradio']



							



							 );



							 



					 



				$table='user_address';



				echo $this->Model->insert_common($table,$data);



	}







	public  function codcheck(){



		$_SESSION['cod']=$_POST['cod'];



		if(empty($_SESSION['couponapplyprice'])){







				 $amount=$_SESSION['totalprice'];



			  



		}else {



			



			 $amount=$_SESSION['couponapplyprice'];



			



		}



			







		 



		



		if($_POST['cod']=='cod'){



		 if($amount<=30){



			



			$cod = '30';



			



		}else{



			$cod = ($amount/100)*3;



			



		}



		if(empty($_SESSION['couponapplyprice'])){



			



			 $priceg=$amount+$cod;







		



		}else{



			



			 $priceg=$amount+$cod;



			



		}



		



			$_SESSION['codprice']=$cod;



		$var=array('codcharge'=> round($cod),'codprice'=>round($priceg));



		echo json_encode($var);



	 }











	 else if($_POST['cod']=='atm'){



	 



	 	



	 	if(empty($_SESSION['couponapplyprice'])){



	 		



			$priced=$amount;



			



		}else{



		



			 $priced=$amount;



			



		}



		



		$_SESSION['codprice']=0;



		$var=array('codcharge'=>0,'codprice'=>round($priced));



		echo json_encode($var);



	 }



		



	}



	



	function checkout_inventry(){



	    



	    



	    $user_id = $_SESSION['session_id'] ;



	    



	    $cart = $this->db->get_where('cart' ,array('user_id' => $user_id ))->result() ;



	     



	     foreach($cart as $cart_row ){



	         



	         



	         $product_id = $cart_row->product_id ;



	         $cart_qty = $cart_row->quantity ; 



	         



	         $product_detail = $this->db->get_where('product_detail' ,array('sku_code' => $product_id ))->row() ; 



	         



	                                $query = $this->db->select_sum('quantity');



                                   $query = $this->db->where(array('product_id' =>$product_id , 'order_status' => 0));



                                    $query = $this->db->get('order_detail');



                                    $result = $query->result();



                                     $hold = $result[0]->quantity ; 



	         $availability = $product_detail->availability - $hold ;



	         



	         if($cart_qty > $availability)



	         {



	          



	           	$this->session->set_flashdata('low_availability', $product_id);



	           	



	             redirect('cart') ; 



	             



	             



	         }



	         



	     }



	     



	     return true ;



	    



	    



	}



	



	function oreder_series(){



	    



	    	  //===================New Series ================



          date_default_timezone_set('Asia/Kolkata');



            $date=date('Y-m-d');



            $date_new = explode("-",$date);



            $year = substr($date_new[0],2); //$date_new[0];



            $month =  $date_new[1];



            $day = $date_new[2] ;



            $like_order = $month.$year ;



            $q = $this->db->select();



            



            $where='(order_id LIKE "'.$like_order.'%")';



            $this->db->where($where);



            $this->db->from('orders');



            $this->db->order_by('id','desc');



            $query = $this->db->get();



            $result = $query->row();



           



            if($result){



                $last_order_id = $result->order_id ;



                $last_num =   substr($last_order_id,5);



                $new_num = $last_num+1 ;
            
                
                $numlength = strlen((string)$new_num);
            
            if($numlength == 1 ){
                
              
                $order_id =  $like_order."X000".$new_num ;

            }elseif($numlength == 2) {
                
                 $order_id =  $like_order."X00".$new_num ;

                
            }elseif($numlength == 3) {
                
                 $order_id =  $like_order."X0".$new_num ;

                
            }else{
                
                  $order_id =  $like_order."X".$new_num ;

            }





            }else{



             $order_id =  $like_order."X0001";



            }


            return $order_id ;



            



            



//==============================================







	}



	



	



	public function tokenmoney(){



	    



	    if( $_SESSION['subprice'] < 4999 && $_SESSION['totalprice'] > 4999){



	        



	        	redirect('cart');



	    }



	    



	     $data['pend_amount']= $this->input->post('pend_amount') ; 



        $data['order_id']= $this->input->post('order_id') ; 



        



      



    if($data['pend_amount']){



       	$this->load->view('tokenmoney/Pend_TxnTest',$data);



    }



    else{



	    $this->checkout_inventry() ;



	    



	    	  //===================New Series ================



           date_default_timezone_set('Asia/Kolkata');



            $date=date('Y-m-d');



            $date_new = explode("-",$date);



            $year =  $date_new[0];



            $day = $date_new[2] ;



            $like_order = $day.$year ;



            $q = $this->db->select();



            $where='(order_id LIKE "'.$like_order.'%")';



            $this->db->where($where);



            $this->db->from('orders');



            $this->db->order_by('id','desc');



            $query = $this->db->get();



            $result = $query->row();



           



            if($result){



                $last_order_id = $result->order_id ;



                $last_num =   substr($last_order_id,4);



                $new_num = $last_num+1 ;



                $order_id =  $like_order."000".$new_num ;







            }else{



             $order_id =  $like_order."0001";



            }



//==============================================











$transaction_id = mt_rand(100000,999999); 







$data['order_id'] = $order_id ;







$data['transaction_id'] = $transaction_id ;







$per_amt  = $_GET['tokenmoney'] ;







if($per_amt ==1 )



{



    



    $data['tokenmoney']= round(($_SESSION['totalprice'])/4,2) ;



    



}else{



    



    $data['tokenmoney'] = round(($_SESSION['totalprice']),2) ;



}







$_SESSION['onlineorderid'] = $order_id ;







$_SESSION['transaction_id'] = $transaction_id ;



	    



		$this->load->view('tokenmoney/TxnTest',$data);



    }



    	}



	



	



	public function placeorder(){



	//pr($_SESSION);die;



	   



	   $token_money = $this->input->post('token_money') ;



	   



	   $_SESSION['onlineprice'] =$token_money ;



	   



	     if(empty($_SESSION['pincodeno']) || empty($token_money) )



	     {



	         echo "no Address select" ;



	         exit;



	     }



		$shippingcharge=$_SESSION['del_charge'];



		



		//	unset($_SESSION['del_charge']);







		 if (empty($shippingcharge))



    {



        $shippingcharge='0';    



    }



	



		 if (empty($_SESSION['codprice']))



    {



        $codcharge='0';    



    }else{



        



        	$codcharge=$_SESSION['codprice'];



    }



		$finalamount=$_SESSION['totalprice'];



		$subtotal=$_SESSION['subprice'];



		



	



	



			if (empty($_SESSION['coupon']))



        {



            $couponcharge='0';    



        }else{



            



            	$couponcharge=$_SESSION['coupon'];



            



            



        }



		$discountcharge=$_SESSION['discount'];



		if (empty($discountcharge))



    {



        $discountcharge='0';    



    }



		$delievry=$_SESSION['delievry'];



		 if (empty($delievry))



    {



        $delievry='0';    



    }



     



		$finalvolume=$_SESSION['finalvolume'];



		//$address_id=$_POST['address'];



		$rand=rand(00000,11111);



		



	 $_SESSION['onlineorderid']="Request" . rand(00000,11111);



	$oid= $_SESSION['onlineorderid'];



		



		



	



		



		$data = array(



						'order_id' =>$oid ,



						'user_id'=>$_SESSION['session_id'],



						'shipping_charge' =>$shippingcharge ,



						'finalamount' =>$finalamount,



						'couponcharge' =>$couponcharge ,



						'discountcharge' =>$discountcharge ,



						'subtotal' =>$subtotal ,



						'delievry_type' =>$delievry ,



						'box_volume' =>$finalvolume ,



						'pincode' =>$_SESSION['pincodeno'] ,



						'token_money' =>$_SESSION['onlineprice'] ,



						'expected_days' =>$_SESSION['expected_days'] ,



						'gst_total' =>round($_SESSION['finalgst']),



                        



                        'advance_payment' =>$_SESSION['onlineprice']  ,



					    'payment_status' =>'pending',



						'order_Date' =>date("Y-m-d") ,



						



						 );







		$table='orders';



		$lastid=$this->Adminmodel->insert_common($data,$table);







			$id=$_SESSION['session_id'];



			



	  		$where='user_id';



			$table='cart';



			$data=$this->Model->select_common_where($table,$where,$id);







       



			foreach ($data as $key ) {



				 $totalquan+=$key['quantity'];



			}



		



		



			foreach ($data as $value) {







			$id=$oid;



	  		$where='order_id';



			$table='orders';



			$orderf=$this->Model->select_common_where($table,$where,$id);



                                            $single=$product[0]['box_volume_weight']*$value['quantity'];



                                        



                                            $finalquan=$shippingcharge/$orderf[0]['box_volume'];



                                            $FREIGHT=$single*$finalquan;



                                             $product[0]['gst_per'];



                                             $gstdiv=100+$product[0]['gst_per'];



                                            $fgst=($FREIGHT*$product[0]['gst_per'])/$gstdiv;



                                             $Finalfreight=$FREIGHT+$fgst;



                                             



			



					$data = array(



						'order_id' =>$lastid,



						'order_rand_id' =>$oid,



						'user_id'=>$_SESSION['session_id'],



						'product_id' =>$value['product_id'],



						'quantity' =>$value['quantity'],



						'price' =>round($value['price']),



						'cart_price' =>round($value['cart_price']),



				// 		'gst'=>round($value['gst']+$fgst),



						'productgst'=>round($value['gst']),



						'gst_inc'=>$value['gstinc'],



				// 		'frieght' =>round($Finalfreight),



					//	'discount_price' =>round($value['discount_price']),



					//	'discount_slab' =>$value['discount_slab']  



						



						



						 );



						 



// 			print_r($data);



// 			exit;



						 



		$table='order_detail';



	$insert_order = 	$this->Adminmodel->insert_common($data,$table);



	



	if($insert_order){



	    



	    echo "insert" ;



	}



	else{



	    



	    echo "not insert" ;



	}



			}











			$id=$_SESSION['session_id'];



	  		$where='user_id';



			$table='cart';



			$data=$this->Adminmodel->common_delete($id,$where,$table);	















			$id=$_SESSION['session_id'];



	  		$where='id';



			$table='customerlogin';



			$customerlogins=$this->Model->select_common_where($table,$where,$id);







$url=base_url('Artnhub/orderinvoice?id='.$oid);



$file=file_get_contents($url) ;



$dompdf = new Dompdf();



        $dompdf->setPaper('A4', 'portrait');



      //  $dompdf->set_option('isHtml5ParserEnabled', TRUE);



$bookingno=$oid;



	$fname = $bookingno;



        $dompdf->loadHtml($file);



        $dompdf->render();



      //  $dompdf->stream("sample.pdf", array("Attachment"=>0));



        $output = $dompdf->output();



	file_put_contents('invoice/'.$fname.'.pdf', $output);



		







			         $this->email->set_mailtype("html");



$this->email->set_newline("\r\n");  



  $url=base_url('Artnhub/ordermail?id='.$oid);



    $file=file_get_contents($url) ; 



  $this->load->library('email');



$this->email->from('twghandicraft@gmail.com', 'TWG Handicraft');



$this->email->to($customerlogins[0]['email']);



$this->email->subject('Order Confirmed');







$this->email->message($file);



$this->email->attach('http://explacia.in/art/invoice/'.$oid.'.pdf');



$this->email->send();							







											







											unset($_SESSION['discount']);



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



                                        		unset($_SESSION['gift']);



                                        	unset($_SESSION['finalgst']);



                                        	unset($_SESSION['onlineorderid']);



                                        	unset($_SESSION['onlineprice']);



                                        	



                                        	unset($_SESSION['cart']);



											



                                        	







	}



	public function orderinvoice(){



		



 			$id=$_GET['id'];



            $where='order_id';



            $table='orders';



            $data['order_detail']=$this->Model->select_common_where($table,$where,$id);







	$this->load->view('orderinvoice.php',$data);



	}



	 public function pdf(){







	$url=base_url('Artnhub/orderinvoice?id=Artnhub9384');



	$file=file_get_contents($url) ;







/*	$dompdf = new Dompdf(); 



	$bookingno='test';



	$fname = $bookingno;



	$dompdf->loadHtml($file);



	$dompdf->setPaper('A4', 'landscape');



	$dompdf->render();



	$dompdf->stream("",array("Attachment" => false));







	$output = $dompdf->output();



	file_put_contents('invoice/'.$fname.'.pdf', $output);*/



$dompdf = new Dompdf();



        $dompdf->setPaper('A4', 'portrait');



      //  $dompdf->set_option('isHtml5ParserEnabled', TRUE);



$bookingno='test';



	$fname = $bookingno;



        $dompdf->loadHtml($file);



        $dompdf->render();



        $dompdf->stream("sample.pdf", array("Attachment"=>0));



        $output = $dompdf->output();



	file_put_contents('invoice/'.$fname.'.pdf', $output);



	}



	public function orders(){



	    



	    if(empty($_SESSION['session_id'])){



			       redirect('user_login');



			    }else{



	    



		$this->load->view('myorder.php');



			    }



	}







			public function cookie(){



				 $id="Art_N_Hub_Kamdhenu_Cow_And_Calf_Pooja_Mandir_Idol_-_Home_Decor_Gift_Statue_Decorative_Showpiec76X0047W000XTSA";



	  		



	  		$where='url';



			$table='product_detail';



			$message=$this->Model->select_common_where($table,$where,$id);







			}











			public function addwishlist(){



				



					$data = array(



						'user_id'=>$_SESSION['session_id'],



						'product_id' =>$_POST['id']



						



						



						 );



		$table='wishlist';



		$this->Adminmodel->insert_common($data,$table);



			}







			public function removewishlist(){



				



			



						$user_id=$_SESSION['session_id'];



						$id =$_POST['id'];



						



	



		$this->Model->delwishlist($user_id,$id);



			}



			public function wishlist(){



			    



			      if(empty($_SESSION['session_id'])){



			        



			       redirect('user_login');



			    }else{



			$id=$_SESSION['session_id'];



	  		$where='user_id';



			$table='wishlist';



			$data['wishlist']=$this->Model->select_common_where($table,$where,$id);



				$this->load->view('wishlist.php',$data);



			    }



			}



			public function pcat(){



				







				 $value2=$this->uri->segment(2);


                 
	 			 $id=str_replace("_"," ",$value2);



	 			 $where='name';



				 $table='parent_category';



				 $pcat=$this->Model->select_common_where($table,$where,$id);



				 $id=$pcat[0]['id'];

                     $data['parent_id']   = $id ; 

				$where='parent_id';



				$table='category';



 



				$data['categorys'] = $this->Model->category_list($id);



				



				$data['parent_name'] = str_replace("_"," ",$value2) ;



					$this->load->view('parentcategory.php',$data);



			}







			public function pcatnew(){



				







				 $value2=$this->uri->segment(2);



	 			 $id=str_replace("_"," ",$value2);



	 			 $where='name';



				 $table='parent_category';



				 $pcat=$this->Model->select_common_where($table,$where,$id);



				 $id=$pcat[0]['id'];



				$where='parent_id';



				$table='category';



 



				$data['categorys'] = $this->Model->category_list($id);



				



				$data['parent_name'] = str_replace("_"," ",$value2) ;



					$this->load->view('new_parentcategory.php',$data);



			}







				public function cat(){
                     $value2=$this->uri->segment(1);
                     $data['catid']   = $value2 ; 
	 			


	 			 $id=str_replace("_"," ",$value2);







	 			 $where='name';



				 $table='category';



				 $pcat=$this->Model->select_common_where($table,$where,$id);



				 //pr($pcat);die;



				 $id=$pcat[0]['id'];



				$where='cat_id';



				$table='sub_category';



				 $data['url']= $pcat[0]['id'];;



				$categorys = $this->Model->select_common_where($table,$where,$id);



				



				 $id=$pcat[0]['id'];



				// $where='category_id';



				// $table='product_detail';



				// $data['product_dat'] = $this->Model->select_like_where($table,$where,$id);



				



					 $data['product_dat']  = $this->position_category($id) ; 



                    	$data['parent_id']  =$pcat[0]['parent_id'];



			            $data['cat_name']  = str_replace("_"," ",$value2);



				$data['categorys']=$categorys;



				$data['uri'] =$pcat[0]['id'];



					$this->load->view('subcategory.php',$data);



				



				



				



				



			}



			



			public function newcat(){



				 $value2=$this->uri->segment(2);



	 			 $id=str_replace("_"," ",$value2);



	 			 $where='name';



				 $table='category';



				 $pcat=$this->Model->select_common_where($table,$where,$id);



				 //pr($pcat);die;



				 $id=$pcat[0]['id'];



				$where='cat_id';



				$table='sub_category';



				 $data['url']= $pcat[0]['id'];;



				$categorys = $this->Model->select_common_where($table,$where,$id);



				



				 $id=$pcat[0]['id'];



				// $where='category_id';



				// $table='product_detail';



				// $data['product_dat'] = $this->Model->select_like_where($table,$where,$id);



				



					 $data['product_dat']  = $this->position_new_category($id) ; 



                    	$data['parent_id']  =$pcat[0]['parent_id'];



			            $data['cat_name']  = str_replace("_"," ",$value2);



				$data['categorys']=$categorys;



				$data['uri'] =$pcat[0]['id'];



					$this->load->view('new_subcategory.php',$data);



				



			}



			



			public function subcat(){







				 $value2=$this->uri->segment(2);



	 			 $id=str_replace("_"," ",$value2);







	 			 $where='name';



				 $table='category';



				 $pcat=$this->Model->select_common_where($table,$where,$id);



				 //pr($pcat);die;



				 $id=$pcat[0]['id'];



				$where='cat_id';



				$table='sub_category';



				 $data['url']= $pcat[0]['id'];;



				// $categorys = $this->Model->select_common_where($table,$where,$id);



				$categorys = $this->Model->subcategory_list($id);



// 			print_r($categorys)	;



// 			exit;



				



				 $id=$pcat[0]['id'];



				$where='category_id';



				$table='product_detail';







				// $data['product'] = $this->Model->select_common_where($table,$where,$id);







                $data['product'] = $this->position_subcategory($id) ;







				$data['categorys']=$categorys;



				



			   	$data['parent_id']  =$pcat[0]['parent_id'];



			      $data['cat_name']  = str_replace("_"," ",$value2);



		    $data['catidd']= $pcat[0]['id'];;



			//	pr($data);



					$this->load->view('parentsubcategory.php',$data);



			}



			



				public function newsubcat(){







				 $value2=$this->uri->segment(2);



	 			 $id=str_replace("_"," ",$value2);







	 			 $where='name';



				 $table='category';



				 $pcat=$this->Model->select_common_where($table,$where,$id);



				 //pr($pcat);die;



				 $id=$pcat[0]['id'];



				$where='cat_id';



				$table='sub_category';



				 $data['url']= $pcat[0]['id'];;



				// $categorys = $this->Model->select_common_where($table,$where,$id);



				$categorys = $this->Model->subcategory_list($id);



// 			print_r($categorys)	;



// 			exit;



				



				 $id=$pcat[0]['id'];



				$where='category_id';



				$table='product_detail';







				// $data['product'] = $this->Model->select_common_where($table,$where,$id);







                $data['product'] = $this->new_subcategory($id) ;







				$data['categorys']=$categorys;



				



			   	$data['parent_id']  =$pcat[0]['parent_id'];



			      $data['cat_name']  = str_replace("_"," ",$value2);



		



			//	pr($data);



					$this->load->view('newparentsubcategory.php',$data);



			}



			



			



			public function personlizedgift(){



				







				 $value2=$this->uri->segment(3);



	 			 $id=str_replace("_"," ",$value2);



	 			 $where='name';



				 $table='category';



				 $pcat=$this->Model->select_common_where($table,$where,$id);



				 $id=$pcat[0]['id'];



				$where='cat_id';



				$table='sub_category';



				 $data['url']= $pcat[0]['id'];;



				$categorys = $this->Model->select_common_where($table,$where,$id);



				$data['product']=$categorys;



				$data['urll']=$pcat[0]['parent_id'];



				



				if(empty($categorys)){



					 $id=$pcat[0]['id'];



				$where='cat_id';



				$table='giftproduct';



				 $data['url']= $pcat[0]['id'];



				$categorys = $this->Model->select_common_where($table,$where,$id);



				$data['product']=$categorys;



				$data['urll']=$pcat[0]['parent_id'];



				//pr($categorys);die;



					$this->load->view('subcategory.php',$data);



				}



				



				



				



			}



			



			function position_category($id){



			    



			    



			    		



			//========Positioning ======================


                    $this->db->distinct();
                 	$this->db->select('product_sku');



    	            $this->db->from('position_product');



    	            $this->db->where('category',$id);


                	$this->db->order_by("category_position","ASC");

                      $this->db->limit(25);
  

                	$query = $this->db->get();



                    $product_data = $query->result();



                    



		    	 $product =array() ; 



                  $i = 0 ;



                  foreach($product_data as $pro){



                      $pro_sku = $pro->product_sku ;



                      



                      $product[] =$this->db->get_where('product_detail' ,array('sku_code'=>$pro_sku , 'status'=> 1 ))->result_array() ;



                      



                      $i++ ;



                      



                  }



                  



                 return $product ;



			//=================================



			    



			}



			function position_new_category($id){



			    



			    



			    		



			//========Positioning ======================



                 	$this->db->select('*');



    	            $this->db->from('position_product');



    	            $this->db->where('category',$id);



    	             



                	$this->db->order_by("category_position","ASC");



                	$query = $this->db->get();



	                    	



                    $product_data = $query->result();



                    



		    	 $product =array() ; 



                  $i = 0 ;



                  foreach($product_data as $pro){



                      $pro_sku = $pro->product_sku ;



                      



                      $product[] =$this->db->get_where('product_detail' ,array('sku_code'=>$pro_sku ,'new_arrivel'=>1 ))->result_array() ;



                      



                      $i++ ;



                      



                  }



                  



                 return $product ;



			//=================================



			    



			}



			function position_subcategory($id){



			    



			    



			    		



			//========Positioning ======================



                 	$this->db->select('*');



    	            $this->db->from('position_product');



    	            $this->db->where('sub_cat',$id);



    	             



                	$this->db->order_by("category_position","ASC");



                	$query = $this->db->get();



	                    	



                    $product_data = $query->result();



                    



		    	 $product =array() ; 



                  $i = 0 ;



                  foreach($product_data as $pro){



                      $pro_sku = $pro->product_sku ;



                      



                      $product[] =$this->db->get_where('product_detail' ,array('sku_code'=>$pro_sku ,'status'=> 1))->result_array() ;



                      



                      $i++ ;



                      



                  }



                  



                 return $product ;



			//=================================



			    



			}



		function new_subcategory($id){



			    



			    



			    		



			//========Positioning ======================



                 	$this->db->select('*');



    	            $this->db->from('position_product');



    	            $this->db->where('sub_cat',$id);



    	             



                	$this->db->order_by("category_position","ASC");



                	$query = $this->db->get();



	                    	



                    $product_data = $query->result();



                    



		    	 $product =array() ; 



                  $i = 0 ;



                  foreach($product_data as $pro){



                      $pro_sku = $pro->product_sku ;



                      



                      $product[] =$this->db->get_where('product_detail' ,array('sku_code'=>$pro_sku  , 'new_arrivel'=>1 ,'status'=> 1 ))->result_array() ;



                      



                      $i++ ;



                      



                  }



                  



                 return $product ;



			//=================================



			    



			}



			public function view(){
				$value2=$this->uri->segment(2);
				$name =str_replace("_"," ",$value2);
		
				$where='name';
				$table='category';
				$pcat=$this->Model->select_common_where($table,$where,$name);
				$id=$pcat[0]['id'];
		
		
				// $where='category_id';
				// $table='product_detail';
				// $data['product_dat'] = $this->Model->select_like_where($table,$where,$id);
		        $data['product_dat']  = $this->position_category($id) ; 
				$data['uri'] =$pcat[0]['id'];
				$data['search'] = $name ;
				$data['parent_id']  =$pcat[0]['parent_id'];
			    $data['cat_name']  = str_replace("_"," ",$value2);
				// pr($data['product']);die;

				$this->load->view('subcategory.php',$data);

			}


		public function new_view(){



				







				 $value2=$this->uri->segment(2);



	 			 $name =str_replace("_"," ",$value2);



	 			 $where='name';



				 $table='category';



				 $pcat=$this->Model->select_common_where($table,$where,$name);



				 $id=$pcat[0]['id'];



				 



			



				// $where='category_id';



				// $table='product_detail';



				// $data['product_dat'] = $this->Model->select_like_where($table,$where,$id);



				



		        $data['product_dat']  = $this->position_new_category($id) ; 



			



				$data['uri'] =$pcat[0]['id'];



				$data['search'] = $name ;



				$data['parent_id']  =$pcat[0]['parent_id'];



			     $data['cat_name']  = str_replace("_"," ",$value2);



				// pr($data['product']);die;



					$this->load->view('new_subcategory.php',$data);



			}



		public function viewsub(){



				







				 $value2=$this->uri->segment(2);



	 			 $name =str_replace("_"," ",$value2);



	 			 $where='subcategory_name';



				 $table='sub_category';



				 $pcat=$this->Model->select_common_where($table,$where,$name);



				 $id=$pcat[0]['id'];



				 



			



				// $where='category_id';



				// $table='product_detail';



				// $data['product_dat'] = $this->Model->select_like_where($table,$where,$id);



				



		        $data['product_dat']  = $this->position_category($id) ; 



			



				$data['uri'] =$pcat[0]['id'];



				$data['search'] = $name ;



				// pr($data['product']);die;



					$this->load->view('subcategory.php',$data);



			}



			public function viewss(){



				







				 $value2=$this->uri->segment(2);

  $data['catid']   = $value2 ; 
	 			

	 			 $name =str_replace("_"," ",$value2);



	 			 $where='subcategory_name';



				 $table='sub_category';



				 $pcat=$this->Model->select_common_where($table,$where,$name);



				 $id=$pcat[0]['id'];



				 



			



				// $where='category_id';



				// $table='product_detail';



				// $data['product_dat'] = $this->Model->select_like_where($table,$where,$id);



				



		        $data['product_dat']  = $this->position_subcategory($id) ; 



			



			$data['parent_id']  =$pcat[0]['parent_id'];



			$data['cat_id']  =$pcat[0]['cat_id'];



			$data['subcat_name']  = $value2;



			$data['subcategory_name']  = $name;



			



			



				$data['uri'] =$pcat[0]['id'];



				$data['search'] = $name ;



				// pr($data['product_dat']);die;



					$this->load->view('lastsubcategory.php',$data);



			}



		public function newviewss(){



				







				 $value2=$this->uri->segment(2);



	 			 $name =str_replace("_"," ",$value2);



	 			 $where='subcategory_name';



				 $table='sub_category';



				 $pcat=$this->Model->select_common_where($table,$where,$name);



				 $id=$pcat[0]['id'];



				 



			



				// $where='category_id';



				// $table='product_detail';



				// $data['product_dat'] = $this->Model->select_like_where($table,$where,$id);



				



		        $data['product_dat']  = $this->position_subcategory($id) ; 



			



			$data['parent_id']  =$pcat[0]['parent_id'];



			$data['cat_id']  =$pcat[0]['cat_id'];



			$data['subcat_name']  = $value2;



			



			



				$data['uri'] =$pcat[0]['id'];



				$data['search'] = $name ;



				// pr($data['product_dat']);die;



					$this->load->view('newlastsubcategory.php',$data);



			}



			public function views($id){
				$id=$this->uri->segment(2);
				
				$where='flag';
				
				$table='product_detail';
            	//=====order_by ====
				
				$q=$this->db->select('*')
			    			->where('flag' ,$id )
			    			->from('product_detail')
			    			->order_by('home_deals_position','asc')
			    			->get();

                $check = $q->result_array();

				$price = array();

				foreach ($check as $key => $row)
				{
				
    				$price[$key] = $row['id'];
				}

				foreach ($price as $key ) {
					
					$id=$key;
					
					$where='id';
					
					$table='product_detail';
				 	
				 	$m[]=$this->Adminmodel->select_com_where($table,$where,$id);
				}

				foreach ($m as $final) {
					$data['product_detail'][]=$final[0];
				}
				
				// pr($data['product_detail']);die;
				$data['flag'] = $this->uri->segment(2) ;

				$this->load->view('flag_category_filter.php',$data);
			}

			public function gift_under(){



				







			



				 $id=$this->uri->segment(3);



			



				$check = $this->Model->giftprice($id);



			$price = array();



				foreach ($check as $key => $row)



				{



    			$price[$key] = $row['Position'];



			}



				array_multisort($price, SORT_ASC, $check);



				foreach ($price as $key ) {



						



				$id=$key;







				$where='Position';







				$table='product_detail';







				$m[]=$this->Adminmodel->select_com_where($table,$where,$id);



			}



				



				foreach ($m as $final) {



					$data['product'][]=$final[0];



				}



					$this->load->view('subcategory.php',$data);



			}







			public function gift_above(){



				







			



				 $id=$this->uri->segment(3);



			



				$check = $this->Model->giftpriceabove($id);



					$price = array();



				foreach ($check as $key => $row)



				{



    			$price[$key] = $row['Position'];



			}



				array_multisort($price, SORT_ASC, $check);



				foreach ($price as $key ) {



						



				$id=$key;







				$where='Position';







				$table='product_detail';







				$m[]=$this->Adminmodel->select_com_where($table,$where,$id);



			}



				



				foreach ($m as $final) {



					$data['product'][]=$final[0];



				}



					$this->load->view('subcategory.php',$data);



			}



			public function profile(){



			    



			    if($_SESSION['session_id']){



					$this->load->view('Profile_Information.php');



			    }



			    else{



			        redirect('user_login');



			    }







			}



			



			



			function findemail($Email){







				return $this->db->get_where('customerlogin' ,array('email' => $Email))->row(); 	







			}



			



			public function updateprofile(){



			    



			    if(empty($_SESSION['session_id'])){



			        



			       redirect('user_login');



			    }else{



			



			



				$Business=$_POST['Business'];



				$Owner=$_POST['Owner'];



				$Email=$_POST['Email'];



				



				$old_email=$_POST['old_email'];



				



				// $mob=$_POST['Mobile'];



				



				$GSTNumber =$_POST['GSTNumber'];



				$PANNumber =$_POST['PANNumber'];



				$Address=$_POST['Address'];



				$State=$_POST['State'];



				$Pincode=$_POST['PinCode'];



				$ownertype=$_POST['ownertype'];



				$btype=$_POST['btype'];



				



			







	 $data = array(



		



		 	// 'email'=> $Email,



		 	'Business' => $Business,



		 	'Owner' => $Owner ,



	 		'city' =>$_POST['city'],



		 	'Address'=> $Address,



		 	'state' => $State ,



		 	'PinCode'=>$Pincode ,



		 	'btype' =>$btype ,



    // 	 	'GSTNumber'=>$GSTNumber ,



	        'ownertype'=> $ownertype ,







		 );



		 



		 



		



							$_SESSION['pincodeno'] =  $Pincode ;



								 $q =$this->db->select('*')



                                	      ->from('pincode')



                                          ->where("name LIKE '%$Pincode%'")



                                          ->get();



                               $pincode = $q->row() ;



                                $_SESSION['pincode'] = $pincode->pincodecat ;



		 



	 	$gst_no = $_POST['GSTNumber'];



		$adhaar_no =  $_POST['aadhar'];



		  



		 if($gst_no){



		    



		      	$data['GSTNumber'] =$gst_no ;



			  



		 }



		 



		 if($adhaar_no){



		    



		      	$data['adhaar_no'] =$adhaar_no ;



			  



		 }



		 



		$PANNumber=$_POST['PANNumber'];



		       	



       	if($PANNumber){



       	    



       	    $data['PANNumber'] = $PANNumber ;



       	}



		 	



				if($old_email != $Email){



	



            	$res_email = $this->findemail($Email);







            if($res_email){



            



            	$this->session->set_flashdata('msg_email', 'Email Already Exist!');



            			



            



            	redirect('profile') ;



            



            }else{



                



                $data['email'] =$Email ;



            }



            }







		 



		 



		 	$Newpassword = $_POST['password'] ;



			



			$old_pass= $_POST['old_password'] ;



		



				



			if($old_pass != $Newpassword )



			{



			    



			    $data['password'] = md5($Newpassword) ; 



			}



			



				if($PANNumber){



				    



				    $data['PANNumber'] = $PANNumber;



				}	



			



		



		 //==========================upload img==========



    	



    	 $path1=  base_url().'assets/visiting/';



    	 



    		



          //================ validation ======



          



             $file_name ='visting';



             $files = $_FILES[$file_name];



             if(!empty($_FILES["visting"]["name"])){







             $upload_path = FCPATH.'./images/' ;



                    $url1 =  array('upload_path' => './assets/visiting/',



                        'allowed_types' => 'jpg|jpeg|png|pdf',



        



                    );



                    $config = array(



                        'upload_path' => $url1['upload_path'],



                        'allowed_types'=> $url1['allowed_types'],



        



                    );



        



                    $this->load->library('upload', $config);



        



                    if (!$this->upload->do_upload($file_name)) {



                     $error = array('error' => $this->upload->display_errors());



                     



                   	$this->session->set_flashdata('message_name', 'Please Upload Vising Card as Image/PDF');



                 	redirect('signup');



                 	



                    } else {



                        $upload_data =  $this->upload->data();



                        $data['vcard'] =  base_url("assets/visiting/".$upload_data['file_name']);



            



                    }



             }



    	//=========================================



        



         //===========validation ======



          



             $path2=  base_url().'assets/images/';



             



             $path3=  base_url().'assets/adhaar/';



            



	if(!empty($_FILES["Certificate"]["name"]))



        {



            



             $file_name2 ='Certificate';



              $files2 = $_FILES[$file_name2];



             



                     $upload_path = FCPATH.'./images/' ;



                    $url1 =  array('upload_path' => './assets/images/',



                        'allowed_types' => 'jpg|jpeg|png|pdf',



        



                    );



                    $config = array(



                        'upload_path' => $url1['upload_path'],



                        'allowed_types'=> $url1['allowed_types'],



        



                    );



        



                    $this->load->library('upload', $config);



                    if (!$this->upload->do_upload($file_name2)) {



                     $error = array('error' => $this->upload->display_errors());



                     



                  	$this->session->set_flashdata('message_name', 'Please Upload Document as  Image/PDF');



                 	redirect('signup');



                 	



                    } else {



                        $upload_data =  $this->upload->data();



                        $data['gstimg'] =  base_url("assets/images/".$upload_data['file_name']);



            



                    }



        }  



        



        if(!empty($_FILES["Certificate1"]["name"]))



       {



            



             $file_name2 ='Certificate1';



              $files2 = $_FILES[$file_name2];



          



                  $upload_path = FCPATH.'./adhaar/' ;



                    $url1 =  array('upload_path' => './assets/adhaar/',



                        'allowed_types' => 'jpg|jpeg|png|pdf',



        



                    );



                    $config = array(



                        'upload_path' => $url1['upload_path'],



                        'allowed_types'=> $url1['allowed_types'],



        



                    );



        



                    $this->load->library('upload', $config);



                    if (!$this->upload->do_upload($file_name2)) {



                     $error = array('error' => $this->upload->display_errors());



                     



                  	$this->session->set_flashdata('message_name', 'Please Upload Document as  Image/PDF');



                 	redirect('signup');



                 	



                    } else {



                        $upload_data =  $this->upload->data();



                        $data['adhaar_img'] =  base_url("assets/adhaar/".$upload_data['file_name']);



            



                    }



            



            //==============================



    	 



       }



            //==============================



    	 



      



        //==================================



	



            $id=$_SESSION['session_id'];



	    	$where='id';



		    $table='customerlogin';



			



             



			$this->Model->update_common($data,$table,$where,$id);



			



			//echo $this->db->last_query();die();



			



			$_SESSION['session_name']=$_POST['Owner'];



			



			$login = $this->db->get_where('customerlogin', array('id' => $id))->row() ; 



			



							$_SESSION['customer_name'] = $login->Owner  ;



	 	                     $_SESSION['customer_mob'] = $login->phone  ;



            	 		 $_SESSION['customer_gst'] = $login->GSTNumber  ;



            	 		 $_SESSION['customer_pan'] = $login->PANNumber  ;



            	 		 $_SESSION['customer_business'] = $login->Business  ;



            	 			 $_SESSION['customer_btype'] = $login->btype  ;



	 			 $_SESSION['customer_adhaar'] = $login->adhaar_no  ;



			



			$this->session->set_flashdata('message_name', 'Profile has been updated successfully!');



			redirect('profile');



			  



		    }	



		



			}



				public function manage_address(){



				     if(empty($_SESSION['session_id'])){



        			        



        			       redirect('user_login');



        			    }else{



           // ============+Defult Address ==================



        		$id=$_SESSION['session_id'];



        	  		$where='id';



        			$table='customerlogin';



        			$data['default_add']=$this->Model->select_common_where($table,$where,$id);



        			



         // ================================		



                        $id=$_SESSION['session_id'];



                        //print_r($id);die();



                        $where='user_id';



                        $table='user_address';



                        $data['addr']=$this->Adminmodel->select_com_where($table,$where,$id); 



        					$this->load->view('Manage_address.php',$data);



        



                        }



        			}







				public function updateuser_address(){







		if(empty($_POST['landmark'])){



			$_POST['landmark']='';



		}



		if(empty($_POST['alternate'])){



			$_POST['alternate']='';



		}



		$data = array(



							



							'name' =>$_POST['name'],



							'mobile' =>$_POST['mobile'],



							'pincode' =>$_POST['pin'],



							'locality' =>$_POST['locality'],



							'address' =>$_POST['address'],



                            'city' =>$_POST['city'],



							'state' =>$_POST['state'],



							'landmark' =>$_POST['landmark'],



							'alternate' =>$_POST['alternate'],



							'delievry' =>$_POST['optradio']



							



							 );



							 



		



							 



			$table='user_address';



			$id=$_POST['id'];



	  		$where='id';



		echo	$this->Model->update_common($data,$table,$where,$id);



			



			



	}



	



	



	



//=================defult user =================



function default_user(){







		if(empty($_POST['landmark'])){



			$_POST['landmark']='';



		}



		if(empty($_POST['alternate'])){



			$_POST['alternate']='';



		}



		$data = array(



							



							'Owner' =>$_POST['name'],



				// 			'mobile' =>$_POST['mobile'],



							'PinCode' =>$_POST['pin'],



				// 			'locality' =>$_POST['locality'],



							'Address' =>$_POST['address'],



                            'city' =>$_POST['city'],



							'state' =>$_POST['state'],



				// 			'landmark' =>$_POST['landmark'],



				// 			'alternate' =>$_POST['alternate'],



				// 			'delievry' =>$_POST['optradio']



							



							 );



							 



			



							 



			$table='customerlogin';



			$id=$_POST['id'];



	  		$where='id';



		echo $this->Model->update_common($data,$table,$where,$id);



			



			



	



	



}











//=============================







	public function deluser_address(){



						$id=$_POST['id'];



	  		$where='id';



			$table='user_address';



			$data=$this->Adminmodel->common_delete($id,$where,$table);		



		}



		



public function otpmail(){



	$data['id']=$_GET['id'];



	$this->load->view('otpmail.php',$data);



}




public function sendmail(){



 	$data['id']=$_GET['id'];

	$this->load->view('sendmail.php',$data);



}







public function ordermail(){



				$id=$_GET['id'];



                $where='order_id';



                $table='orders';



                $data['message']=$this->Adminmodel->select_com_where($table,$where,$id); 



	$this->load->view('ordermail.php',$data);



}







public function ordermailplace(){



				$id=$_GET['id'];



                $where='order_id';



                $table='orders';



                $data['message']=$this->Adminmodel->select_com_where($table,$where,$id); 

 $data['subject'] = $_GET['subject'];

	$this->load->view('ordermailplace.php',$data);



}







public function varientselect(){



		$id=$_POST['id'];



                $where='id';



                $table='product';



                $message=$this->Adminmodel->select_com_where($table,$where,$id); 



                 



                $var=array('varient'=> $message[0]['varient'],'image'=>$message[0]['main_image1']);



                



		echo json_encode($var);



}







public function addreview(){



		$data = array(



						'user_id'=>$_SESSION['session_id'],



						'coment'=>$_POST['comment'],



						'rating'=>$_POST['rating'],



						'product_id' =>$_POST['proid'],



						'created' =>date('Y-m-d')



						



						



						 );



		$table='user_review';



		$this->Adminmodel->insert_common($data,$table);







			$id=$_POST['proid'];



		    $total=$this->Model->rate($id); 



		                                                                                        



              $g=$total[0]['rates'];                                         



             @$l=$g/$total[0]['total'];



			$id=$_POST['proid'];



                $where='sku_code';



                $table='product';



                $message=$this->Adminmodel->select_com_where($table,$where,$id); 



             



                $data = array(



						'product_rating' =>  round($l),



						'product_review' => $message[0]['product_review']+1



						 );



			$id=$_POST['proid'];



	  		$where='id';



			$table='product';



			$this->Model->update_common($data,$table,$where,$id);



			   if(empty($message)){



                		$id=$_POST['proid'];



                $where='sku_code';



                $table='product_detail';



                $message=$this->Adminmodel->select_com_where($table,$where,$id); 







                $data = array(



						'product_rating' => round($l),



						'product_review' => $message[0]['product_review']+1



						 );



			$id=$_POST['proid'];



	  		$where='sku_code';



			$table='product_detail';



			$this->Model->update_common($data,$table,$where,$id);



                }



                   if(empty($message)){



                		$id=$_POST['proid'];



                $where='sku_code';



                $table='giftproduct';



                $message=$this->Adminmodel->select_com_where($table,$where,$id); 







                $data = array(



						'product_rating' => round($l),



						'product_review' => $message[0]['product_review']+1



						 );



			$id=$_POST['proid'];



	  		$where='sku_code';



			$table='giftproduct';



			$this->Model->update_common($data,$table,$where,$id);



                }















			redirect('orders');



			}



public function search(){



			$name=$_POST['data'];



			



	$result=$this->Model->search_new($name);



	



	$category =$this->Model->search_category($name); 


	$subcategory =$this->Model->search_subcategory($name); 



	



	$occasion = $this->Model->search_occasion($name) ;



	



	 echo '<ul id="browsers" id="sea_list">';



	



                                 



	foreach ($result as  $value) { ?>



	<?php $id=$value['url'];



	$value_cat = $value['name'];



	$cat_name =str_replace(" ","_",$value_cat);



	?>



	



	<li class="search-result" value="<?=$id;?>"><a href="<?php echo base_url('pcat/'.$cat_name ); ?>" ><?php echo $value['name'] ?></a></li>



	



	 <!--<li value="<?=$id;?>"><a href="<?php echo base_url(''.$value['url']); ?>"><?php echo $value['pro_name']; ?></a></li>-->



      <!--  <input type="hidden" name="product_id" value="<?=$value['product_id'];?>"> -->



	<?php }







	foreach ($category as  $value) { ?>



	<?php $id=$value['url'];



	



	$value2 = $value['name'] ;



		 $sub_cat =str_replace(" ","_",$value2);



	?>



	



<li class="search-result" value="<?=$id;?>"><a href="<?php echo base_url('view/'.$sub_cat); ?>" ><?php echo $value['name'] ?></a></li>



	



	<?php }



	
foreach ($subcategory as  $value) { ?>



	<?php $id=$value['url'];



	



	$value2 = $value['subcategory_name'] ;



		 $sub_cat =str_replace(" ","_",$value2);



	?>



	



<li class="search-result" value="<?=$id;?>"><a href="<?php echo base_url('viewss/'.$sub_cat); ?>" ><?php echo $value['subcategory_name'] ?></a></li>



	



	<?php }



	



	foreach ($occasion as  $value) { ?>



	<?php $id=$value['url'];



	



	$occ_code = $value['code'] ;



// 		 $sub_cat =str_replace(" ","_",$value2);



	?>



	



<li class="search-result" value="<?=$id;?>"><a href="<?php echo base_url('barfilter?occ='.$occ_code.'&pricefilter=0-9999'); ?>" ><?php echo $value['name'] ?></a></li>



	



	<?php }















	echo '</ul>';



	//pr($result);



}



public function cancelorder(){







	    $data = array(



						'order_status' =>  '2',



						'cancel_reason' => $_POST['reason'],



						'cancel_coment' => $_POST['coment']



						 );



			$id=$_POST['oid'];



	  		$where='id';



			$table='order_detail';



			$this->Model->update_common($data,$table,$where,$id);



			redirect('orders');



}



public function state(){



$this->load->view('main_category.php');



}



public function uploadslip(){



    



    



    $this->load->view('uploadslip.php');



    



}



public function gift(){



				







			$id=$this->uri->segment(3);



	        $where='url';



			$table='giftproduct';



			$data['message']=$this->Model->select_common_where($table,$where,$id);



				$data['url']=$this->uri->segment(3);



			//pr($user);



			$this->load->view('giftproduct_detail.php',$data);



		}



		public function addgiftimage(){



				$rand=rand(00,99);



				$image=$rand.$_FILES['file']['name'];



					$path=base_url()."/assets/product/".$image;



					$link=$_SERVER['DOCUMENT_ROOT'].'/art//assets/product/'.$image;



					$id=$_POST['id'];



			 $_SESSION['gift'][$id] = array(



							'notepad' =>$_POST['text'],



							'image' =>$path,



							'link' =>$link



								);



	



			 if(move_uploaded_file($_FILES["file"]["tmp_name"], "./assets/product/".$image))



			 {



			 	echo "uploaded";



			 }



			 



		}



			public function occasionselect(){



				//pr($_POST);die;



				$id=$_POST['id'];



	        $where='occasion_id';



			$table='theme';



			$occ=$this->Model->select_common_where($table,$where,$id);



				$ids=$_POST['proid'];	



			if(!empty($occ)){



				



				foreach($occ as $value){ 



					if($value['cat_id']==$_POST['catid']){



			



					?>



					<div class="product slick-slide product_cat_list slick-active">



																	<a href="<?php echo base_url('gift/'.$ids); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">



																		<div class="product_list_container">



																			<div class="product_list_img">    



																				<img src="<?php echo $value['image']; ?>" class="wp-post-image" alt="">



																			</div>



																		</div>



																	   <!-- /.price -->



																	<!-- 	<h2 class="woocommerce-loop-product__title" title="test2 Indoor Fountain Showpiece Vastu"><?php echo $value['pro_name']; ?></h2> -->



																	</a>



																 </div>



			<?php 	} 



		}



	} else{ echo " No themes available "; }







			}



		public function faq(){



				$table='faq';



				$data['message']=$this->Model->select_common($table);



					$this->load->view('FAQ.php',$data);



		}



		public function termsandconditions(){



				$id ='1';	



				$where='id';



				$table='cms';







				$data['message'] = $this->Model->select_common_where($table,$where,$id);



					$this->load->view('terms (2).php',$data);







		}



		public function returnpolicy(){



				$id ='2';	



				$where='id';



				$table='cms';







				$data['message'] = $this->Model->select_common_where($table,$where,$id);



					$this->load->view('return.php',$data);







		}



		public function shippingpolicy(){



				$id ='3';	



				$where='id';



				$table='cms';







				$data['message'] = $this->Model->select_common_where($table,$where,$id);



					$this->load->view('shipping.php',$data);







		}



		public function shoppingguide(){



				$id ='4';	



				$where='id';



				$table='cms';







				$data['message'] = $this->Model->select_common_where($table,$where,$id);



					$this->load->view('shopguide.php',$data);







		}



		public function about(){



				$id ='5';	



				$where='id';



				$table='cms';







				$data['message'] = $this->Model->select_common_where($table,$where,$id);



					$this->load->view('about.php',$data);







		}



			public function contact(){



			



					$this->load->view('contactus.php');







		}



		public function returngift(){



		







						 $value2=$this->uri->segment(3);



	 			 $id=str_replace("_"," ",$value2);



	 			 $where='name';



				 $table='category';



				 $pcat=$this->Model->select_common_where($table,$where,$id);







	



				$table='product_detail';



				$product=$this->Model->select_common($table);



					



				foreach ($product as  $value) {



				if(!empty($value['returngift'])){



					$giftid=explode(",", $value['returngift']);



					if(in_array($pcat[0]['id'], $giftid))



					$m[]=$value['id'];



				}



				}



				



				foreach ($m as  $values) {



					



					 $id=$values;



	 			 $where='id';



				 $table='product_detail';



				$detail[]=$this->Model->select_common_where($table,$where,$id);	



				//pr($detail);



				



				}



				foreach ($detail as  $value) {



					$new[] = $value[0];



				}



			



				foreach ($new as $cat) {







					 $id=$cat['returngiftcat'];



	 			 $where='id';



				 $table='category';



				$category=$this->Model->select_common_where($table,$where,$id);	



				if(empty($category)){







					 $id=$cat['returngiftcat'];



	 			 $where='id';



				 $table='parent_category';



				$category=$this->Model->select_common_where($table,$where,$id);	



				}



				foreach ($category as $key=>$finlcat) {



					$fcat[]=$finlcat['id'];



				}



				



			}



			//pr($fcat);



			$array = array_unique($fcat);



			foreach ($array as  $arr) {



			



			 $id=$arr;



	 			 $where='id';



				 $table='category';



				$m=$this->Model->select_common_where($table,$where,$id);	



				if(empty($m)){



					 $id=$arr;



	 			 $where='id';



				 $table='parent_category';



				



				$m=$this->Model->select_common_where($table,$where,$id);



				}



				$arrays[]=$m;



			}



			



			$data['product']=$new;



			$data['pcat']=$pcat[0]['id'];



			$data['categorys']=$arrays;



			//pr($data['product']);die;



			$this->load->view('giftcategory.php',$data);



				}



public function returngiftcat(){







				 	 $value2=$this->uri->segment(3);



	 			 $id=str_replace("_"," ",$value2);



	 			 $where='name';



				 $table='category';



				 $pcats=$this->Model->select_common_where($table,$where,$id);



				 	 $id=$pcats[0]['id'];



	 			 $where='category_id';



				 $table='product_detail';



				 $products=$this->Model->select_common_where($table,$where,$id);



				 if(empty($pcats)){



				 	 $value2=$this->uri->segment(3);



	 			 $id=str_replace("_"," ",$value2);



	 			 $where='name';



				 $table='parent_category';



				 $pcats=$this->Model->select_common_where($table,$where,$id);







				 	 $id=$pcats[0]['id'];



	 			 $where='parent_cat';



				 $table='product_detail';



				 $products=$this->Model->select_common_where($table,$where,$id);	



				 }



	 		



           		$pcat=$this->uri->segment(4);



				



				    foreach ($products as  $val) {







                if(!empty($val['returngift'])){



                     $giftid=explode(",", $val['returngift']);







                    if(in_array($pcat, $giftid))



                 



                  $id=$val['id'];



                 $where='id';



                 $table='product_detail';



                $dets[]=$this->Model->select_common_where($table,$where,$id); 



            }







           }



          // pr($dets);



                   foreach ($dets as $pid) {



                    $fcat[]=$pid[0]['id'];



                }



                



           



            $array = array_unique($fcat);



           //







            foreach ($array as $ar) {



                 $id=$ar;



                 $where=$pcats[0]['id'];



                $arrayv=$this->Model->catpro($where,$id);



                if(empty($arrayv)){



                $arrayv=$this->Model->pcatpro($where,$id);







                }



                $arrayval[]=$arrayv;



            }











            $data['products']=$arrayval;



            $data['uri']='returngiftcat';







			//pr($data['product']);die;



			$this->load->view('subcategory.php',$data);



            











}



		public function pricefilter(){



	  //pr($_POST);die;



	



			$id=$_POST['pro_id'];



			$where='sku_code';



			$table='product';



			$products=$this->Model->select_common_where($table,$where,$id);







			if(empty($products)){



                                                       $id=$_POST['pro_id'];







                                                 $where='sku_code';







                                                    $table='product_detail';







                                                 $products=$this->Adminmodel->select_com_where($table,$where,$id);



                                                  



                                                 }



                                                if(empty($products)){



                                                	$id=$_POST['pro_id'];



			$where='sku_code';



			$table='giftproduct';



			$products=$this->Model->select_common_where($table,$where,$id);



                                                }



		



				$str=$products[0]['discount_code'];



            $discount=explode(",",$str); 



            foreach ($discount as  $value) {



            	$id=$value;



			$discountslab[]=$this->Model->discountslab($id);



		



		



            }



            foreach ($discountslab as $val) {



            	$vals[]=$val[0];



            }



           



            foreach ($vals as $key ) {







            if( $_POST['quantity'] >= $key['quanity'] ){



            	



            		$g[]=$key['discount'];



            	



            }



            }



          



             $dis= end($g); 



             if(!empty($dis)){



          		 $final=$products[0]['price'];  	



          		 if(empty($products[0]['promotion_price'])){



             	 $sprice=$products[0]['selling_price'];







              $discount_prices=($sprice*$dis)/100;



              $var=$sprice-$discount_prices;



                 $prices= round(100- ($var/$products[0]['selling_price'])*100);



             }else{



             		 $sprice=$products[0]['promotion_price'];







              $discount_prices=($sprice*$dis)/100;



              $var=$sprice-$discount_prices;



                 $prices= round(100- ($var/$products[0]['selling_price'])*100);



             		



             	}



           $vars=array('percent'=> round($prices),'price'=>round($var),'fprice'=>$final);



					echo json_encode($vars);



          }else{











          		 if(empty($products[0]['promotion_price'])){



          	 $final=$products[0]['price'];



          	 $var=$products[0]['selling_price'];



           $prices= round(100- ($products[0]['selling_price']/$products[0]['price'])*100);



       }else{



       	 	 $final=$products[0]['price'];



          	 $var=$products[0]['promotion_price'];



           $prices= round(100- ($products[0]['promotion_price']/$products[0]['price'])*100);



       } 







          $vars=array('percent'=> round($prices),'price'=>round($var),'fprice'=>$final);



					echo json_encode($vars);



          



		}



			



	}











	public function video(){



		if(empty($_POST['search'])){



				$table='videos';



				$data['message']=$this->Model->select_common($table);







			}else{



				$id=$_POST['search'];



				$data['message']=$this->Model->searchvideo($id);



			}



				$this->load->view('video.php',$data);



			







	}



	public function broucher(){



		if(empty($_POST['search'])){



				$table='Brouchers';



				$data['message']=$this->Model->select_common($table);







			}else{



				$id=$_POST['search'];



				$data['message']=$this->Model->searchBrouchers($id);



			}



		$this->load->view('pdf.php',$data);



	}



	public function text(){



		$myString = 'Hello, there!';







		if ( strstr( $myString, 'th' ) ) {



		  echo "Text found";



		} else {



		  echo "Text not found";



		 }











		for($i=1;$i<=100;$i++){



  $counter = 0; 



          for($j=1;$j<=$i;$j++){ //all divisible factors











                if($i % $j==0){ 







                      $counter++;



                }



          }







        //prime requires 2 rules ( divisible by 1 and divisible by itself)



        if($counter==2){







               print $i." is Prime <br/>";



        }



}







		}



		public function returnpro(){



			if(!empty($_SESSION['session_id'])){



			$id=$_SESSION['session_id'];



	  		$where='user_id';



			$table='user_address';



			$data['message']=$this->Model->select_common_where($table,$where,$id);



				$id=$_SESSION['session_id'];



	  		$where='user_id';



			$table='order_detail';



			$data['order']=$this->Model->select_common_where($table,$where,$id);



				$this->load->view('Returnproduct.php',$data);



		}else{



			redirect();



		}



	}



	public function returnaction(){



		$image = $_FILES['image']['name'];







			    $url = base_url();







			    if(empty($image))







			    {







			    	$path='';







			    }







			    else







			    {



			    	$path = $url."/assets/returnpro/".$image;







			    }



			$data = array(



						'user_id'=>$_SESSION['session_id'],



						'coment'=>$_POST['comment'],



						'address_id'=>$_POST['address'],



						'return_reason'=>$_POST['reasonreturn'],



						'return_action'=>$_POST['returnaction'],



						'image'=>$path,



						'product_id' =>$_POST['proid'],



						'order_id' =>$_POST['orderid'],







						'created' =>date('Y-m-d'),



						'bname' =>$_POST['name'],



						'bank' =>$_POST['bank'],



						'ifsc' =>$_POST['ifsc'],



						'acc' =>$_POST['acc'],



						'branch' =>$_POST['branch']











						



						



						 );



		$table='returnproduct';



		$this->Adminmodel->insert_common($data,$table);



 move_uploaded_file($_FILES["image"]["tmp_name"], "./assets/returnpro/".$image);



 redirect('orders');



	}







	public function notification(){



	    



	      if(empty($_SESSION['session_id'])){



			        



			    return   redirect('user_login');



			    }



		$this->load->view('noti.php');



	}



	public function thankyou(){



	    



	   //  if(empty($_SESSION['session_id'])){



			        



			 //   return   redirect('user_login');



			 //   }



			    



        $this->load->view('thankyou.php');



    }



    	public function failed_order(){



	    



	   //  if(empty($_SESSION['session_id'])){



			        



			 //   return   redirect('user_login');



			 //   }



			    



        $this->load->view('failed_order.php');



    }



    	public function underverification(){


    $user_id =$_SESSION['registration_id']  ;


	if($user_id){
	    	$data = array('user_id' => $user_id ,) ; 
	
	unset($_SESSION['registration_id']);
                
    $this->load->view('underverification.php',$data);

}else{
    	redirect('index');

}

    }



 public function Occasion(){



 			$id=$this->uri->segment(3);



     		$where='occasion';







                $table='promotion';







                $data=$this->Model->select_common_where($table,$where,$id);



               // pr($data);



                if(empty($data[0]['catid'])){



				$firstline = true;



        $handle = fopen($data[0]['sku_code'], "r");







        $c = 0;







        while(($filesop = fgetcsv($handle, 100000, ",")) !== false)







 			{







 			if (!$firstline) {



			if(!empty($filesop[0])){



				$sku[] =$filesop[0];



 		}



	 }



	  $firstline = false;



	}



	foreach ($sku as $key ) {



		



			$id=$key;



     		$where='sku_code';



			$table='product_detail';



            $product[]=$this->Model->select_common_where($table,$where,$id);



            if(empty($product)){



           



      



			$id=$key;



     		$where='sku_code';



			$table='giftproduct';



            $product[]=$this->Model->select_common_where($table,$where,$id);



        }



    }







}else{



				$cat=explode(",", $data[0]['catid']);



				//pr($cat);



				foreach ($cat as $value) {



				   



				   $id =$value;	



				$where='parent_cat';



				$table='product_detail';







				$parcat = $this->Model->select_common_where($table,$where,$id);



				if($value=='5'){



				if(empty($parcat)){







				$table='giftproduct';



				$parcat=$this->Model->select_common($table);



				}



			}



				foreach ($parcat as  $pae) {



				$product[][]=$pae;



			}



		}



	}



      // pr($product);die;



        $data['producst']=$product;



         $data['uri']='Occasion';



       // pr($data['product']);die;



        $this->load->view('subcategory.php',$data);



}







//=========================Filter



	public function filter(){



		//pr($_POST);die;



		$uri=$_POST['uri'];



	    $id =$_POST['catid'];	



		$where='id';



		$table='category';







		$category = $this->Model->select_common_where($table,$where,$id);



		



		



		



		 $urll=$category[0]['parent_id'];



		



		if(!empty($_POST['data'] || $_POST['occ'] || $_POST['material'] || $_POST['size'] || $_POST['resc'] )){



		$first=$_POST['data'][0];



		$end= end($_POST['data']);



    	$m=explode("-", $first);



    	 $min=$m[0];



    	$mx=explode("-", $end);



    	$max=$mx[1];







	 if($uri=='searchpage'){



	 	$occ=implode(",",$_POST['occ']);



		$size=implode(",",$_POST['size']);



		 $material=implode(",",$_POST['material']);



		 $resc=implode(",",$_POST['resc']);



		 $search=$_POST['search'];



		$product=$this->Model->searchfilter($min,$max,$occ,$size,$material,$resc,$search);



	//pr($product);



	}



		else if($id=='all'){



		    



		    



		$occ=implode(",",$_POST['occ']);



		$size=implode(",",$_POST['size']);



		 $material=implode(",",$_POST['material']);



		 $resc=implode(",",$_POST['resc']);







		$product=$this->Model->withoutcatfiltermodel($min,$max,$occ,$size,$material,$resc);



		



	}



		else if($id=='returngiftcat'){



 				



	 			



	 			 $value2=$_POST['returnid'];



	 			 $id=str_replace("_"," ",$value2);



	 			 $where='name';



				 $table='category';



				 $pcats=$this->Model->select_common_where($table,$where,$id);



				 	 $id=$pcats[0]['id'];



	 			 $where='category_id';



		 		 $table='product_detail';



				 $products=$this->Model->select_common_where($table,$where,$id);



				 if(empty($pcats)){



				 	 $value2=$_POST['returnid'];



	 			 $id=str_replace("_"," ",$value2);



	 			 $where='name';



				 $table='parent_category';



				 $pcats=$this->Model->select_common_where($table,$where,$id);







				 	 $id=$pcats[0]['id'];



	 			 $where='parent_cat';



				 $table='product_detail';



				 $products=$this->Model->select_common_where($table,$where,$id);	



				 }



	 		



           		$pcat=$_POST['pcatreturn'];



				



				    foreach ($products as  $val) {







                if(!empty($val['returngift'])){



                     $giftid=explode(",", $val['returngift']);







                    if(in_array($pcat, $giftid))



                 



                  $id=$val['id'];



                 $where='id';



                 $table='product_detail';



                $dets[]=$this->Model->select_common_where($table,$where,$id); 



            }







           }



          // pr($dets);



                   foreach ($dets as $pid) {



                    $fcat[]=$pid[0]['id'];



                }



                



           



            $array = array_unique($fcat);



           //







            foreach ($array as $ar) {



                 $id=$ar;



                 $where=$pcats[0]['id'];



                 	$occ=implode(",",$_POST['occ']);



                 	$size=implode(",",$_POST['size']);



                 	$material=implode(",",$_POST['material']);



					 $resc=implode(",",$_POST['resc']);







                $arrayv=$this->Model->filtercatpro($where,$id,$min,$max,$occ,$size,$material,$resc);



                if(empty($arrayv)){



                		$occ=implode(",",$_POST['occ']);



                		$size=implode(",",$_POST['size']);



                		$material=implode(",",$_POST['material']);



					 $resc=implode(",",$_POST['resc']);







                $arrayv=$this->Model->filterpcatpro($where,$id,$min,$max,$occ,$size,$material,$resc);







                }



                $arrayval[]=$arrayv;



            }











            $products=$arrayval;



            foreach ($products as  $pre) {



            	if(!empty($pre)){



    			 $product[]=$pre[0];



            	}



  			  }



	



		







		}else{



	if($category[0]['parent_id']!='5'){



			$occ=implode(",",$_POST['occ']);



			$size=implode(",",$_POST['size']);	



                		$material=implode(",",$_POST['material']);



		 $resc=implode(",",$_POST['resc']);




	$color=$_POST['colour'];
	
	echo 'colour' ; 
	
	print_r($color) ; 



	$product=$this->Model->filtermodel($min,$max,$id,$occ,$size,$material,$resc,$color);







	}else{



			$occ=implode(",",$_POST['occ']);



			$size=implode(",",$_POST['size']);



                		$material=implode(",",$_POST['material']);



		 $resc=implode(",",$_POST['resc']);







	$product=$this->Model->filtermodelgift($min,$max,$id,$occ,$size,$material,$resc);







	}



		}











		}else{







			if($id=='returngiftcat'){







	 			 $value2=$_POST['returnid'];



	 			 $id=str_replace("_"," ",$value2);



	 			 $where='name';



				 $table='category';



				 $pcats=$this->Model->select_common_where($table,$where,$id);



				 	 $id=$pcats[0]['id'];



	 			 $where='category_id';



				 $table='product_detail';



				 $products=$this->Model->select_common_where($table,$where,$id);



				 if(empty($pcats)){



				 	 $value2=$_POST['returnid'];



	 			 $id=str_replace("_"," ",$value2);



	 			 $where='name';



				 $table='parent_category';



				 $pcats=$this->Model->select_common_where($table,$where,$id);







				 	 $id=$pcats[0]['id'];



	 			 $where='parent_cat';



				 $table='product_detail';



				 $products=$this->Model->select_common_where($table,$where,$id);	



				 }



	 		



           		$pcat=$_POST['pcatreturn'];



				



				    foreach ($products as  $val) {







                if(!empty($val['returngift'])){



                     $giftid=explode(",", $val['returngift']);







                    if(in_array($pcat, $giftid))



                 



                  $id=$val['id'];



                 $where='id';



                 $table='product_detail';



                $dets[]=$this->Model->select_common_where($table,$where,$id); 



            }







           }



          // pr($dets);



                   foreach ($dets as $pid) {



                    $fcat[]=$pid[0]['id'];



                }



                



           



            $array = array_unique($fcat);



           //







            foreach ($array as $ar) {



                 $id=$ar;



                 $where=$pcats[0]['id'];



                $arrayv=$this->Model->catpro($where,$id);



                if(empty($arrayv)){



                $arrayv=$this->Model->pcatpro($where,$id);







                }



                $arrayval[]=$arrayv;



            }











            $products=$arrayval;



            foreach ($products as  $pre) {



            	



    			 $product[]=$pre[0];



            	



  			  }



		



			}else{



	











			if($uri=='searchpage'){



				$search=$_POST['search'];



		$product=$this->Model->withoutsearch($search);



		//pr($product);



	}











			else if($id=='all'){



		$product=$this->Model->withoutcatandfiltermodel();



		//pr($product);



	}else{



	if($category[0]['parent_id']!='5'){



	$product=$this->Model->withoutfiltermodel($id);



	}else{







	$product=$this->Model->withoutfiltermodelgift($id);







	}



		}



	}



	}

            echo '<div class="products-carousel carousel-without-attributes">'; ?>
                <div class="woocommerce columns-7">								 
                    <div class="products  slick-initialized slick-slider slick-dotted" role="toolbar">



									   <!-- /.product-outer -->



									   <div aria-live="polite" class="slick-list draggable">



										  <div class="slick-track" style="">



												<?php foreach ($product as $value) {



                                                   // pr($value);



												  $title=$value['url'];



												?>	



											<div class="product slick-slide product_cat_list slick-active mrbtm">



												<div class="yith-wcwl-add-to-wishlist">



												   <a href="wishlist.html" rel="nofollow" class="add_to_wishlist" tabindex="-1">



												   <i class="icon fa fa-heart"> Add to Wishlist</i>



												   </a>



												</div>



                        <?php if($urll=='5'){ ?>



												<a href="<?php echo base_url('gift/'.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">



                        <?php } else { ?>



                            <a href="<?php echo base_url(''.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">



                        <?php } ?>



												   <div class="product_list_container">



													  <div class="product_list_img">	



														 <img src="<?php echo base_url('assets/product/'.$value['main_image1'])   ?>" width="224" height="197" class="wp-post-image" alt="">



													  </div>



												   </div>



												   <span class="price">



													  <?php if(empty($value['promotion_price'])){ ?>



                                                        <ins>



                                                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value['selling_price']; ?></span>



                                                        </ins>



                                                    <?php } else{ ?>



                                                            <ins>



                                                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value['promotion_price']; ?></span>



                                                        </ins>



                                                        <?php   } ?>



												   <del>



														<span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value['price']; ?></span>



												   </del>



														<span class="amount"> </span>



												   </span>



												   <!-- /.price -->



												   <h2 class="woocommerce-loop-product__title" title="<?php echo $value['pro_name']; ?>"><?php echo $value['pro_name']; ?></h2>



												</a>



												<div class="hover-area">



                        <?php if($value['availability'] >= $value['min_order_quan']){ ?>
                            
                                                            <a  onclick="cart2('<?= $value['sku_code']; ?>');" class="button "><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                        
                                        <?php }else{?>
                                            <?php if(empty($_SESSION['session_id'])){ ?>

                                         <a onclick="production_cart3('<?= $value['sku_code']; ?>');" class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
        
                                       <?php } else{ ?>
                                       <a  onclick="production_cart2('<?= $value['sku_code']; ?>');"  class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
                                           
                                        <?php } } ?>



												   <?php if(empty($_SESSION['session_id'])){ ?>



														<a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>



														<?php } else{



														$pid=$value['id'];



														$userid=$_SESSION['session_id'];



														$data=$this->Model->wishlist($userid,$pid); 



														if(empty($data)){ ?>



														<a class="add-to-compare-link" href="javascript:void(0)" onclick="addwishlist('<?php echo $value['id']; ?>');">Add to Wishlist</a>



														<?php } else { ?>



														<a class="add-to-compare-link" href="javascript:void(0)" onclick="removewishlist('<?php echo $value['id']; ?>');">Remove to Wishlist</a>



													<?php } } ?>



												</div>



											 </div>



											 <?php } ?>







										  </div>



									   </div>



									</div>



								



							 </div>



							 <!-- .woocommerce -->



					   <?php echo '</div>'; 



					  







}







//=========================Filter



	public function filternewarrival(){



		//pr($_POST);die;



		$uri=$_POST['uri'];



	    $id =$_POST['catid'];	



		$where='id';



		$table='category';







		$category = $this->Model->select_common_where($table,$where,$id);



		



		



		



		 $urll=$category[0]['parent_id'];



		



		if(!empty($_POST['data'] || $_POST['occ'] || $_POST['material'] || $_POST['size'] || $_POST['resc'] )){



		$first=$_POST['data'][0];



		$end= end($_POST['data']);



    	$m=explode("-", $first);



    	 $min=$m[0];



    	$mx=explode("-", $end);



    	$max=$mx[1];







	 if($uri=='searchpage'){



	 	$occ=implode(",",$_POST['occ']);



		$size=implode(",",$_POST['size']);



		 $material=implode(",",$_POST['material']);



		 $resc=implode(",",$_POST['resc']);



		 $search=$_POST['search'];



		$product=$this->Model->searchfilter($min,$max,$occ,$size,$material,$resc,$search);



	//pr($product);



	}



		else if($id=='all'){



		    



		    



		$occ=implode(",",$_POST['occ']);



		$size=implode(",",$_POST['size']);



		 $material=implode(",",$_POST['material']);



		 $resc=implode(",",$_POST['resc']);







		$product=$this->Model->withoutcatfiltermodel($min,$max,$occ,$size,$material,$resc);



		



	}



		else if($id=='returngiftcat'){



 				



	 			



	 			 $value2=$_POST['returnid'];



	 			 $id=str_replace("_"," ",$value2);



	 			 $where='name';



				 $table='category';



				 $pcats=$this->Model->select_common_where($table,$where,$id);



				 	 $id=$pcats[0]['id'];



	 			 $where='category_id';



		 		 $table='product_detail';



				 $products=$this->Model->select_common_where($table,$where,$id);



				 if(empty($pcats)){



				 	 $value2=$_POST['returnid'];



	 			 $id=str_replace("_"," ",$value2);



	 			 $where='name';



				 $table='parent_category';



				 $pcats=$this->Model->select_common_where($table,$where,$id);







				 	 $id=$pcats[0]['id'];



	 			 $where='parent_cat';



				 $table='product_detail';



				 $products=$this->Model->select_common_where($table,$where,$id);	



				 }



	 		



           		$pcat=$_POST['pcatreturn'];



				



				    foreach ($products as  $val) {







                if(!empty($val['returngift'])){



                     $giftid=explode(",", $val['returngift']);







                    if(in_array($pcat, $giftid))



                 



                  $id=$val['id'];



                 $where='id';



                 $table='product_detail';



                $dets[]=$this->Model->select_common_where($table,$where,$id); 



            }







           }



          // pr($dets);



                   foreach ($dets as $pid) {



                    $fcat[]=$pid[0]['id'];



                }



                



           



            $array = array_unique($fcat);



           //







            foreach ($array as $ar) {



                 $id=$ar;



                 $where=$pcats[0]['id'];



                 	$occ=implode(",",$_POST['occ']);



                 	$size=implode(",",$_POST['size']);



                 	$material=implode(",",$_POST['material']);



					 $resc=implode(",",$_POST['resc']);







                $arrayv=$this->Model->filtercatpro($where,$id,$min,$max,$occ,$size,$material,$resc);



                if(empty($arrayv)){



                		$occ=implode(",",$_POST['occ']);



                		$size=implode(",",$_POST['size']);



                		$material=implode(",",$_POST['material']);



					 $resc=implode(",",$_POST['resc']);







                $arrayv=$this->Model->filterpcatpro($where,$id,$min,$max,$occ,$size,$material,$resc);







                }



                $arrayval[]=$arrayv;



            }











            $products=$arrayval;



            foreach ($products as  $pre) {



            	if(!empty($pre)){



    			 $product[]=$pre[0];



            	}



  			  }



	



		







		}else{



	if($category[0]['parent_id']!='5'){



			$occ=implode(",",$_POST['occ']);



			$size=implode(",",$_POST['size']);	



                		$material=implode(",",$_POST['material']);



		 $resc=implode(",",$_POST['resc']);







	$product=$this->Model->filtermodelnewarrival($min,$max,$id,$occ,$size,$material,$resc);







	}else{



			$occ=implode(",",$_POST['occ']);



			$size=implode(",",$_POST['size']);



                		$material=implode(",",$_POST['material']);



		 $resc=implode(",",$_POST['resc']);







	$product=$this->Model->filtermodelnewarrival($min,$max,$id,$occ,$size,$material,$resc);







	}



		}











		}else{







			if($id=='returngiftcat'){







	 			 $value2=$_POST['returnid'];



	 			 $id=str_replace("_"," ",$value2);



	 			 $where='name';



				 $table='category';



				 $pcats=$this->Model->select_common_where($table,$where,$id);



				 	 $id=$pcats[0]['id'];



	 			 $where='category_id';



				 $table='product_detail';



				 $products=$this->Model->select_common_where($table,$where,$id);



				 if(empty($pcats)){



				 	 $value2=$_POST['returnid'];



	 			 $id=str_replace("_"," ",$value2);



	 			 $where='name';



				 $table='parent_category';



				 $pcats=$this->Model->select_common_where($table,$where,$id);







				 	 $id=$pcats[0]['id'];



	 			 $where='parent_cat';



				 $table='product_detail';



				 $products=$this->Model->select_common_where($table,$where,$id);	



				 }



	 		



           		$pcat=$_POST['pcatreturn'];



				



				    foreach ($products as  $val) {







                if(!empty($val['returngift'])){



                     $giftid=explode(",", $val['returngift']);







                    if(in_array($pcat, $giftid))



                 



                  $id=$val['id'];



                 $where='id';



                 $table='product_detail';



                $dets[]=$this->Model->select_common_where($table,$where,$id); 



            }







           }



          // pr($dets);



                   foreach ($dets as $pid) {



                    $fcat[]=$pid[0]['id'];



                }



                



           



            $array = array_unique($fcat);



           //







            foreach ($array as $ar) {



                 $id=$ar;



                 $where=$pcats[0]['id'];



                $arrayv=$this->Model->catpro($where,$id);



                if(empty($arrayv)){



                $arrayv=$this->Model->pcatpro($where,$id);







                }



                $arrayval[]=$arrayv;



            }











            $products=$arrayval;



            foreach ($products as  $pre) {



            	



    			 $product[]=$pre[0];



            	



  			  }



		



			}else{



	











			if($uri=='searchpage'){



				$search=$_POST['search'];



		$product=$this->Model->withoutsearch($search);



		//pr($product);



	}











			else if($id=='all'){



		$product=$this->Model->withoutcatandfiltermodel();



		//pr($product);



	}else{



	if($category[0]['parent_id']!='5'){



	$product=$this->Model->withoutfiltermodel($id);



	}else{







	$product=$this->Model->withoutfiltermodelgift($id);







	}



		}



	}



	}



	



				



                       



					   echo '<div class="products-carousel carousel-without-attributes">'; ?>



							 <div class="woocommerce columns-7">								 



									<div class="products  slick-initialized slick-slider slick-dotted" role="toolbar">



									   <!-- /.product-outer -->



									   <div aria-live="polite" class="slick-list draggable">



										  <div class="slick-track" style="">



												<?php foreach ($product as $value) {



                                                   // pr($value);



												  $title=$value['url'];



												?>	



											<div class="product slick-slide product_cat_list slick-active mrbtm">



												<div class="yith-wcwl-add-to-wishlist">



												   <a href="wishlist.html" rel="nofollow" class="add_to_wishlist" tabindex="-1">



												   <i class="icon fa fa-heart"> Add to Wishlist</i>



												   </a>



												</div>



                        <?php if($urll=='5'){ ?>



												<a href="<?php echo base_url('gift/'.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">



                        <?php } else { ?>



                            <a href="<?php echo base_url(''.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">



                        <?php } ?>



												   <div class="product_list_container">



													  <div class="product_list_img">	



														 <img src="<?php echo base_url('assets/product/'.$value['main_image1'])   ?>" width="224" height="197" class="wp-post-image" alt="">



													  </div>



												   </div>



												   <span class="price">



													  <?php if(empty($value['promotion_price'])){ ?>



                                                        <ins>



                                                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value['selling_price']; ?></span>



                                                        </ins>



                                                    <?php } else{ ?>



                                                            <ins>



                                                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value['promotion_price']; ?></span>



                                                        </ins>



                                                        <?php   } ?>



												   <del>



														<span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value['price']; ?></span>



												   </del>



														<span class="amount"> </span>



												   </span>



												   <!-- /.price -->
												     <?php if(empty($value['promotion_price'])){ ?>
                                          <input type="hidden" id="selling_price_<?php echo $value['sku_code'] ?>" class="selling_price"  value="<?php echo $value['selling_price'] ?>">
                                        <?php } else { ?>
                                            <input type="hidden" id="selling_price_<?php echo $value['sku_code'] ?>" class="selling_price" value="<?php echo $value['promotion_price'] ?>">
                                        <?php } ?>

                                          <input type="hidden" id="gst_<?php echo $value['sku_code'] ?>" class="gst"   value="<?php echo $value['gst_per'] ?>">
                                           <input type="hidden" id="gstinc_<?php echo $value['sku_code'] ?>" class="gstinc" value="<?php echo $value['gst'] ?>">
                                           <input type="hidden" id="pro_id_<?php echo $value['sku_code'] ?>" class="pro_id" value="<?php echo $value['sku_code'] ?>">
                                       

												   <h2 class="woocommerce-loop-product__title" title="<?php echo $value['pro_name']; ?>"><?php echo $value['pro_name']; ?></h2>



												</a>



												<div class="hover-area">



                          <?php if($urll!='5'){ ?>



												   <a onclick="production_cart3('<?= $value[0]['sku_code']; ?>');" class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
        


                         <?php }else {



                           ?>


   <a onclick="production_cart3('<?= $value[0]['sku_code']; ?>');" class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
        


                        <?php  } ?>



												   <?php if(empty($_SESSION['session_id'])){ ?>



														<a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>



														<?php } else{



														$pid=$value['id'];



														$userid=$_SESSION['session_id'];



														$data=$this->Model->wishlist($userid,$pid); 



														if(empty($data)){ ?>



														<a class="add-to-compare-link" href="javascript:void(0)" onclick="addwishlist('<?php echo $value['id']; ?>');">Add to Wishlist</a>



														<?php } else { ?>



														<a class="add-to-compare-link" href="javascript:void(0)" onclick="removewishlist('<?php echo $value['id']; ?>');">Remove to Wishlist</a>



													<?php } } ?>



												</div>



											 </div>



											 <?php } ?>







										  </div>



									   </div>



									</div>



								



							 </div>



							 <!-- .woocommerce -->



					   <?php echo '</div>'; 



					  







}











//=========================Filter



	public function filtersub(){



// 		pr($_POST);die;



		$uri=$_POST['uri'];



	    $id =$_POST['catid'];	



		$where='id';



		$table='sub_category';







	$category = $this->Model->select_common_where($table,$where,$id);



		



		 $urll=$category[0]['parent_id'];



		



		if(!empty($_POST['data'] || $_POST['occ'] || $_POST['material'] || $_POST['size'] || $_POST['resc'] )){



		$first=$_POST['data'][0];



		$end= end($_POST['data']);



    	$m=explode("-", $first);



    	 $min=$m[0];



    	$mx=explode("-", $end);



    	$max=$mx[1];







	 if($uri=='searchpage'){



	 	$occ=implode(",",$_POST['occ']);



		$size=implode(",",$_POST['size']);



		 $material=implode(",",$_POST['material']);



		 $resc=implode(",",$_POST['resc']);



		 $search=$_POST['search'];



		$product=$this->Model->searchfilter($min,$max,$occ,$size,$material,$resc,$search);



	//pr($product);



	}



		else if($id=='all'){



		    



		    



		$occ=implode(",",$_POST['occ']);



		$size=implode(",",$_POST['size']);



		 $material=implode(",",$_POST['material']);



		 $resc=implode(",",$_POST['resc']);







		$product=$this->Model->withoutcatfiltermodel($min,$max,$occ,$size,$material,$resc);



		



	}



		else if($id=='returngiftcat'){



 				



	 			



	 			 $value2=$_POST['returnid'];



	 			 $id=str_replace("_"," ",$value2);



	 			 $where='name';



				 $table='category';



				 $pcats=$this->Model->select_common_where($table,$where,$id);



				 	 $id=$pcats[0]['id'];



	 			 $where='category_id';



		 		 $table='product_detail';



				 $products=$this->Model->select_common_where($table,$where,$id);



				 if(empty($pcats)){



				 	 $value2=$_POST['returnid'];



	 			 $id=str_replace("_"," ",$value2);



	 			 $where='name';



				 $table='parent_category';



				 $pcats=$this->Model->select_common_where($table,$where,$id);







				 	 $id=$pcats[0]['id'];



	 			 $where='parent_cat';



				 $table='product_detail';



				 $products=$this->Model->select_common_where($table,$where,$id);	



				 }



	 		



           		$pcat=$_POST['pcatreturn'];



				



				    foreach ($products as  $val) {







                if(!empty($val['returngift'])){



                     $giftid=explode(",", $val['returngift']);







                    if(in_array($pcat, $giftid))



                 



                  $id=$val['id'];



                 $where='id';



                 $table='product_detail';



                $dets[]=$this->Model->select_common_where($table,$where,$id); 



            }







           }



          // pr($dets);



                   foreach ($dets as $pid) {



                    $fcat[]=$pid[0]['id'];



                }



                



           



            $array = array_unique($fcat);



           //







            foreach ($array as $ar) {



                 $id=$ar;



                 $where=$pcats[0]['id'];



                 	$occ=implode(",",$_POST['occ']);



                 	$size=implode(",",$_POST['size']);



                 	$material=implode(",",$_POST['material']);



					 $resc=implode(",",$_POST['resc']);







                $arrayv=$this->Model->filtercatpro($where,$id,$min,$max,$occ,$size,$material,$resc);



                if(empty($arrayv)){



                		$occ=implode(",",$_POST['occ']);



                		$size=implode(",",$_POST['size']);



                		$material=implode(",",$_POST['material']);



					 $resc=implode(",",$_POST['resc']);







                $arrayv=$this->Model->filterpcatpro($where,$id,$min,$max,$occ,$size,$material,$resc);







                }



                $arrayval[]=$arrayv;



            }











            $products=$arrayval;



            foreach ($products as  $pre) {



            	if(!empty($pre)){



    			 $product[]=$pre[0];



            	}



  			  }



	



		







		}else{



	if($category[0]['parent_id']!='5'){



			$occ=implode(",",$_POST['occ']);



			$size=implode(",",$_POST['size']);	



                		$material=implode(",",$_POST['material']);



		 $resc=implode(",",$_POST['resc']);







	$product=$this->Model->filtermodelsub($min,$max,$id,$occ,$size,$material,$resc);







	}else{



			$occ=implode(",",$_POST['occ']);



			$size=implode(",",$_POST['size']);



                		$material=implode(",",$_POST['material']);



		 $resc=implode(",",$_POST['resc']);







	$product=$this->Model->filtermodelsub($min,$max,$id,$occ,$size,$material,$resc);







	}



		}











		}else{







			if($id=='returngiftcat'){







	 			 $value2=$_POST['returnid'];



	 			 $id=str_replace("_"," ",$value2);



	 			 $where='name';



				 $table='category';



				 $pcats=$this->Model->select_common_where($table,$where,$id);



				 	 $id=$pcats[0]['id'];



	 			 $where='category_id';



				 $table='product_detail';



				 $products=$this->Model->select_common_where($table,$where,$id);



				 if(empty($pcats)){



				 	 $value2=$_POST['returnid'];



	 			 $id=str_replace("_"," ",$value2);



	 			 $where='name';



				 $table='parent_category';



				 $pcats=$this->Model->select_common_where($table,$where,$id);







				 	 $id=$pcats[0]['id'];



	 			 $where='parent_cat';



				 $table='product_detail';



				 $products=$this->Model->select_common_where($table,$where,$id);	



				 }



	 		



           		$pcat=$_POST['pcatreturn'];



				



				    foreach ($products as  $val) {







                if(!empty($val['returngift'])){



                     $giftid=explode(",", $val['returngift']);







                    if(in_array($pcat, $giftid))



                 



                  $id=$val['id'];



                 $where='id';



                 $table='product_detail';



                $dets[]=$this->Model->select_common_where($table,$where,$id); 



            }







           }



          // pr($dets);



                   foreach ($dets as $pid) {



                    $fcat[]=$pid[0]['id'];



                }



                



           



            $array = array_unique($fcat);



           //







            foreach ($array as $ar) {



                 $id=$ar;



                 $where=$pcats[0]['id'];



                $arrayv=$this->Model->catpro($where,$id);



                if(empty($arrayv)){



                $arrayv=$this->Model->pcatpro($where,$id);







                }



                $arrayval[]=$arrayv;



            }











            $products=$arrayval;



            foreach ($products as  $pre) {



            	



    			 $product[]=$pre[0];



            	



  			  }



		



			}else{



	











			if($uri=='searchpage'){



				$search=$_POST['search'];



		$product=$this->Model->withoutsearch($search);



		//pr($product);



	} 











			else if($id=='all'){



		$product=$this->Model->withoutcatandfiltermodel();



		//pr($product);



	}else{



	if($category[0]['parent_id']!='5'){



	$product=$this->Model->withoutfiltermodelsub($id);



	}else{ 







	$product=$this->Model->withoutfiltermodelsub($id);







	}



		}



	}



	}



	



				



                       



					   echo '<div class="products-carousel carousel-without-attributes">'; ?>



							 <div class="woocommerce columns-7">								 



									<div class="products  slick-initialized slick-slider slick-dotted" role="toolbar">



									   <!-- /.product-outer -->



									   <div aria-live="polite" class="slick-list draggable">



										  <div class="slick-track" style="">



												<?php foreach ($product as $value) {



                                                   // pr($value);



												  $title=$value['url'];



												?>	



											<div class="product slick-slide product_cat_list slick-active mrbtm">



												<div class="yith-wcwl-add-to-wishlist">



												   <a href="wishlist.html" rel="nofollow" class="add_to_wishlist" tabindex="-1">



												   <i class="icon fa fa-heart"> Add to Wishlist</i>



												   </a>



												</div>



                        <?php if($urll=='5'){ ?>



												<a href="<?php echo base_url('gift/'.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">



                        <?php } else { ?>



                            <a href="<?php echo base_url(''.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">



                        <?php } ?>



												   <div class="product_list_container">



													  <div class="product_list_img">	



														 <img src="<?php echo base_url('assets/product/'.$value['main_image1'])   ?>" width="224" height="197" class="wp-post-image" alt="">



													  </div>



												   </div>



												   <span class="price">



													  <?php if(empty($value['promotion_price'])){ ?>



                                                        <ins>



                                                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value['selling_price']; ?></span>



                                                        </ins>



                                                    <?php } else{ ?>



                                                            <ins>



                                                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value['promotion_price']; ?></span>



                                                        </ins>



                                                        <?php   } ?>



												   <del>



														<span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value['price']; ?></span>



												   </del>



														<span class="amount"> </span>



												   </span>



												   <!-- /.price -->



												   <h2 class="woocommerce-loop-product__title" title="<?php echo $value['pro_name']; ?>"><?php echo $value['pro_name']; ?></h2>



												</a>



												<div class="hover-area">



                          <?php if($value['availability'] >= $value['min_order_quan']){ ?>
                            
                                                            <a  onclick="cart2('<?= $value['sku_code']; ?>');" class="button "><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                        
                                        <?php }else{?>
                                            <?php if(empty($_SESSION['session_id'])){ ?>

                                         <a onclick="production_cart3('<?= $value['sku_code']; ?>');" class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
        
                                       <?php } else{ ?>
                                       <a  onclick="production_cart2('<?= $value['sku_code']; ?>');"  class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
                                           
                                        <?php } } ?>



												   <?php if(empty($_SESSION['session_id'])){ ?>



														<a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>



														<?php } else{



														$pid=$value['id'];



														$userid=$_SESSION['session_id'];



														$data=$this->Model->wishlist($userid,$pid); 



														if(empty($data)){ ?>



														<a class="add-to-compare-link" href="javascript:void(0)" onclick="addwishlist('<?php echo $value['id']; ?>');">Add to Wishlist</a>



														<?php } else { ?>



														<a class="add-to-compare-link" href="javascript:void(0)" onclick="removewishlist('<?php echo $value['id']; ?>');">Remove to Wishlist</a>



													<?php } } ?>



												</div>



											 </div>



											 <?php } ?>







										  </div>



									   </div>



									</div>



								



							 </div>



							 <!-- .woocommerce -->



					   <?php echo '</div>'; 



					  







}











//==========occasion filter =======











//=========================Filter



	public function filter_occasion(){



// 		pr($_POST);die;



		$uri=$_POST['uri'];



	    $id =$_POST['catid'];	



		$where='id';



		$table='category';







		$category = $this->Model->select_common_where($table,$where,$id);



		 $urll=$category[0]['parent_id'];



		 



		$first=$_POST['data'][0];



		$end= end($_POST['data']);



    	$m=explode("-", $first);



    	 $min=$m[0];



    	$mx=explode("-", $end);



    	$max=$mx[1];







		if(empty($max)){



		    



		    $min = 0 ; 



		    $max = 9999 ;



		    



		}



		



		if(!empty($_POST['data'] || $_POST['occ'] || $_POST['material'] || $_POST['size'] || $_POST['resc'] )){



	



	 if($uri=='searchpage'){



	 	$occ=implode(",",$_POST['occ']);



		$size=implode(",",$_POST['size']);



		 $material=implode(",",$_POST['material']);



		 $resc=implode(",",$_POST['resc']);



		 $search=$_POST['search'];



// 		$product=$this->Model->searchfilter($min,$max,$occ,$size,$material,$resc,$search);



		



			$product=$this->Model->filterproduct($min,$max,$occ,$resc);







// 	pr($product);



	



	



// 	exit



	}



	



		}



	



					   echo '<div class="products-carousel carousel-without-attributes">'; ?>



							 <div class="woocommerce columns-7">								 



									<div class="products  slick-initialized slick-slider slick-dotted" role="toolbar">



									   <!-- /.product-outer -->



									   <div aria-live="polite" class="slick-list draggable">



										  <div class="slick-track" style="">



												<?php foreach ($product as $value) {



                                                   // pr($value);



												  $title=$value['url'];



												?>	



											<div class="product slick-slide product_cat_list slick-active mrbtm">



												<div class="yith-wcwl-add-to-wishlist">



												   <a href="wishlist.html" rel="nofollow" class="add_to_wishlist" tabindex="-1">



												   <i class="icon fa fa-heart"> Add to Wishlist</i>



												   </a>



												</div>



                        <?php if($urll=='5'){ ?>



												<a href="<?php echo base_url('gift/'.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">



                        <?php } else { ?>



                            <a href="<?php echo base_url(''.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">



                        <?php } ?>



												   <div class="product_list_container">



													  <div class="product_list_img">	



														 <img src="<?php echo base_url('assets/product/'.$value['main_image1'])   ?>" width="224" height="197" class="wp-post-image" alt="">



													  </div>



												   </div>



												   <span class="price">



													  <?php if(empty($value['promotion_price'])){ ?>



                                                        <ins>



                                                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value['selling_price']; ?></span>



                                                        </ins>



                                                    <?php } else{ ?>



                                                            <ins>



                                                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value['promotion_price']; ?></span>



                                                        </ins>



                                                        <?php   } ?>



												   <del>



														<span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value['price']; ?></span>



												   </del>



														<span class="amount"> </span>



												   </span>



												   <!-- /.price -->



												   <h2 class="woocommerce-loop-product__title" title="<?php echo $value['pro_name']; ?>"><?php echo $value['pro_name']; ?></h2>



												</a>



												<div class="hover-area">



                       <?php if($value['availability'] >= $value['min_order_quan']){ ?>
                            
                                                            <a  onclick="cart2('<?= $value['sku_code']; ?>');" class="button "><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
                                        
                                        <?php }else{?>
                                            <?php if(empty($_SESSION['session_id'])){ ?>

                                         <a onclick="production_cart3('<?= $value['sku_code']; ?>');" class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
        
                                       <?php } else{ ?>
                                       <a  onclick="production_cart2('<?= $value['sku_code']; ?>');"  class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
                                           
                                        <?php } } ?>




												   <?php if(empty($_SESSION['session_id'])){ ?>



														<a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>



														<?php } else{



														$pid=$value['id'];



														$userid=$_SESSION['session_id'];



														$data=$this->Model->wishlist($userid,$pid); 



														if(empty($data)){ ?>



														<a class="add-to-compare-link" href="javascript:void(0)" onclick="addwishlist('<?php echo $value['id']; ?>');">Add to Wishlist</a>



														<?php } else { ?>



														<a class="add-to-compare-link" href="javascript:void(0)" onclick="removewishlist('<?php echo $value['id']; ?>');">Remove to Wishlist</a>



													<?php } } ?>



												</div>



											 </div>



											 <?php } ?>







										  </div>



									   </div>



									</div>



								



							 </div>



							 <!-- .woocommerce -->



					   <?php echo '</div>'; 



					  







}











//=====================================







//=========================Filter New ====



	public function filternew(){



		//pr($_POST);die;



		



		$flag = $_POST['flag'] ;

	$colour =$_POST['colour'];
	


		$uri=$_POST['uri'];



	    $id =$_POST['catid'];	



		$where='id';



		$table='category';







		$category = $this->Model->select_common_where($table,$where,$id);



		



	    $urll=$category[0]['parent_id'];



		



		if(!empty($_POST['data'] || $_POST['occ'] || $_POST['material'] || $_POST['size'] || $_POST['resc'] || $_POST['colour'] )){



		$first=$_POST['data'][0];



		$end= end($_POST['data']);



    	$m=explode("-", $first);



    	 $min=$m[0];



    	$mx=explode("-", $end);



    	$max=$mx[1];







	 if($uri=='searchpage'){



	 	$occ=implode(",",$_POST['occ']);



		$size=$_POST['size'];



		 $material=$_POST['material'];



		 $resc=implode(",",$_POST['resc']);



		 $search=$_POST['search'];



		$product=$this->Model->searchfilter($min,$max,$occ,$size,$material,$resc,$search);



// 	pr($product);



// 	exit ; 



	}



		else if($id=='all'){



		$occ=implode(",",$_POST['occ']);



		$size=implode(",",$_POST['size']);



		 $material=implode(",",$_POST['material']);



		 $resc=implode(",",$_POST['resc']);







		$product=$this->Model->flagfilter($min,$max,$occ,$size,$material,$resc, $flag);



		



	}



		else if($id=='returngiftcat'){



 				



	 			



	 			 $value2=$_POST['returnid'];



	 			 $id=str_replace("_"," ",$value2);



	 			 $where='name';



				 $table='category';



				 $pcats=$this->Model->select_common_where($table,$where,$id);



				 	 $id=$pcats[0]['id'];



	 			 $where='category_id';



				 $table='product_detail';



				 $products=$this->Model->select_common_where($table,$where,$id);



				 if(empty($pcats)){



				 	 $value2=$_POST['returnid'];



	 			 $id=str_replace("_"," ",$value2);



	 			 $where='name';



				 $table='parent_category';



				 $pcats=$this->Model->select_common_where($table,$where,$id);







				 	 $id=$pcats[0]['id'];



	 			 $where='parent_cat';



				 $table='product_detail';



				 $products=$this->Model->select_common_where($table,$where,$id);	



				 }



	 		



           		$pcat=$_POST['pcatreturn'];



				



				    foreach ($products as  $val) {







                if(!empty($val['returngift'])){



                     $giftid=explode(",", $val['returngift']);







                    if(in_array($pcat, $giftid))



                 



                  $id=$val['id'];



                 $where='id';



                 $table='product_detail';



                $dets[]=$this->Model->select_common_where($table,$where,$id); 



            }







           }



          // pr($dets);



                   foreach ($dets as $pid) {



                    $fcat[]=$pid[0]['id'];



                }



                



           



            $array = array_unique($fcat);



           //







            foreach ($array as $ar) {



                 $id=$ar;



                 $where=$pcats[0]['id'];



                 	$occ=implode(",",$_POST['occ']);



                 	$size=implode(",",$_POST['size']);



                 	$material=implode(",",$_POST['material']);



					 $resc=implode(",",$_POST['resc']);







                $arrayv=$this->Model->filterpcatpro($where,$id,$min,$max,$occ,$size,$material,$resc);



                if(empty($arrayv)){



                		$occ=implode(",",$_POST['occ']);



                		$size=implode(",",$_POST['size']);



                		$material=implode(",",$_POST['material']);



					 $resc=implode(",",$_POST['resc']);







                $arrayv=$this->Model->filterpcatpro($where,$id,$min,$max,$occ,$size,$material,$resc);







                }



                $arrayval[]=$arrayv;



            }











            $products=$arrayval;



            foreach ($products as  $pre) {



            	if(!empty($pre)){



    			 $product[]=$pre[0];



            	}



  			  }



	



		







		}else{



	if($category[0]['parent_id']!='5'){



			$occ=implode(",",$_POST['occ']);



			$size=$_POST['size'] ;	



                		$material=$_POST['material'];
	$color=$_POST['colour'];
	



		 $resc=implode(",",$_POST['resc']);







	$product=$this->Model->filtermodel($min,$max,$id,$occ,$size,$material,$resc,$color);







	}else{



			$occ=implode(",",$_POST['occ']);



			$size=implode(",",$_POST['size']);



                		$material=implode(",",$_POST['material']);



		 $resc=implode(",",$_POST['resc']);







	$product=$this->Model->filtermodelgift($min,$max,$id,$occ,$size,$material,$resc);







	}



		}











		}else{







			if($id=='returngiftcat'){







	 			 $value2=$_POST['returnid'];



	 			 $id=str_replace("_"," ",$value2);



	 			 $where='name';



				 $table='category';



				 $pcats=$this->Model->select_common_where($table,$where,$id);



				 	 $id=$pcats[0]['id'];



	 			 $where='category_id';



				 $table='product_detail';



				 $products=$this->Model->select_common_where($table,$where,$id);



				 if(empty($pcats)){



				 	 $value2=$_POST['returnid'];



	 			 $id=str_replace("_"," ",$value2);



	 			 $where='name';



				 $table='parent_category';



				 $pcats=$this->Model->select_common_where($table,$where,$id);







				 	 $id=$pcats[0]['id'];



	 			 $where='parent_cat';



				 $table='product_detail';



				 $products=$this->Model->select_common_where($table,$where,$id);	



				 }



	 		



           		$pcat=$_POST['pcatreturn'];



				



				    foreach ($products as  $val) {







                if(!empty($val['returngift'])){



                     $giftid=explode(",", $val['returngift']);







                    if(in_array($pcat, $giftid))



                 



                  $id=$val['id'];



                 $where='id';



                 $table='product_detail';



                $dets[]=$this->Model->select_common_where($table,$where,$id); 



            }







           }



          // pr($dets);



                   foreach ($dets as $pid) {



                    $fcat[]=$pid[0]['id'];



                }



                



           



            $array = array_unique($fcat);



           //







            foreach ($array as $ar) {



                 $id=$ar;



                 $where=$pcats[0]['id'];



                $arrayv=$this->Model->catpro($where,$id);



                if(empty($arrayv)){



                $arrayv=$this->Model->pcatpro($where,$id);







                }



                $arrayval[]=$arrayv;



            }











            $products=$arrayval;



            foreach ($products as  $pre) {



            	



    			 $product[]=$pre[0];



            	



  			  }



		



			}else{



	











			if($uri=='searchpage'){



				$search=$_POST['search'];



		$product=$this->Model->withoutsearch($search);



		//pr($product);



	}











			else if($id=='all'){



		$product=$this->Model->flagfilternodata($flag);



		//pr($product);



	}else{



	if($category[0]['parent_id']!='5'){



	$product=$this->Model->withoutfiltermodel($id);



	}else{







	$product=$this->Model->withoutfiltermodelgift($id);







	}



		}



	}



	}



	



				



                       



					   echo '<div class="products-carousel carousel-without-attributes">'; ?>



							 <div class="woocommerce columns-7">								 



									<div class="products  slick-initialized slick-slider slick-dotted" role="toolbar">



									   <!-- /.product-outer -->



									   <div aria-live="polite" class="slick-list draggable">



										  <div class="slick-track" style="">



												<?php foreach ($product as $value) {



                                                 


                                                   if (strpos($value['category_id'], $_POST['catid']) !== false  &&  $value['parent_sku']== '' &&  $value['status'] == 1  ) {

//   pr($value);


												  $title=$value['url'];



												?>	



											<div class="product slick-slide product_cat_list slick-active mrbtm">



												<div class="yith-wcwl-add-to-wishlist">



												   <a href="wishlist.html" rel="nofollow" class="add_to_wishlist" tabindex="-1">



												   <i class="icon fa fa-heart"> Add to Wishlist</i>



												   </a>



												</div>



                        <?php if($urll=='5'){ ?>



												<a href="<?php echo base_url('gift/'.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">



                        <?php } else { ?>



                            <a href="<?php echo base_url(''.$title); ?>" class="woocommerce-LoopProduct-link" tabindex="-1">



                        <?php } ?>



												   <div class="product_list_container">



													  <div class="product_list_img">	



														 <img src="<?php echo base_url('assets/product/'.$value['main_image1'])   ?>" width="224" height="197" class="wp-post-image" alt="">



													  </div>



												   </div>



												   <span class="price">



													  <?php if(empty($value['promotion_price'])){ ?>



                                                        <ins>



                                                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value['selling_price']; ?></span>



                                                        </ins>



                                                    <?php } else{ ?>



                                                            <ins>



                                                            <span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value['promotion_price']; ?></span>



                                                        </ins>



                                                        <?php   } ?>



												   <del>



														<span class="amount"><span class="size_16">Rs&nbsp;</span><?php echo $value['price']; ?></span>



												   </del>



														<span class="amount"> </span>



												   </span>



												   <!-- /.price -->
                                            
                                              <?php if(empty($value['promotion_price'])){ ?>
                                          <input type="hidden" id="selling_price_<?php echo $value['sku_code'] ?>" class="selling_price"  value="<?php echo $value['selling_price'] ?>">
                                        <?php } else { ?>
                                            <input type="hidden" id="selling_price_<?php echo $value['sku_code'] ?>" class="selling_price" value="<?php echo $value['promotion_price'] ?>">
                                        <?php } ?>
                                        
                                           <input type="hidden" id="gst_<?php echo $value['sku_code'] ?>" class="gst"   value="<?php echo $value['gst_per'] ?>">
                                           <input type="hidden" id="gstinc_<?php echo $value['sku_code'] ?>" class="gstinc" value="<?php echo $value['gst'] ?>">
                                           <input type="hidden" id="pro_id_<?php echo $value['sku_code'] ?>" class="pro_id" value="<?php echo $value['sku_code'] ?>">
                                           
                                               <input type="hidden" id="min_qty_<?php echo $value['sku_code'] ?>" class="gst"   value="<?php echo $value['min_order_quan'] ?>">
                                           <input type="hidden" id="url" class="url" value="<?php echo base_url(); ?>">
                              


												   <h2 class="woocommerce-loop-product__title" title="<?php echo $value['pro_name']; ?>"><?php echo $value['pro_name']; ?></h2>



												</a>



												<div class="hover-area">



                           <?php if($value['availability'] >= $value['min_order_quan']){ ?>
                            
                                                            <a  onclick="cart2('<?= $value['sku_code']; ?>');" class="button "><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART </a>
                                        
                                        <?php }else{?>
                                            <?php if(empty($_SESSION['session_id'])){ ?>

                                         <a onclick="production_cart3('<?= $value['sku_code']; ?>');" class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
        
                                       <?php } else{ ?>
                                       <a  onclick="production_cart2('<?= $value['sku_code']; ?>');"  class="btn btn-color-2 btn-lg" style="padding: 10px 0px;width: 100%;border-radius: 3px !important;">Add To Production</a><br>
                                           
                                        <?php } } ?>




												   <?php if(empty($_SESSION['session_id'])){ ?>



														<a class="add-to-compare-link" data-toggle="modal" href="#myModal">Add to Wishlist</a>



														<?php } else{



														$pid=$value['id'];



														$userid=$_SESSION['session_id'];



														$data=$this->Model->wishlist($userid,$pid); 



														if(empty($data)){ ?>



														<a class="add-to-compare-link" href="javascript:void(0)" onclick="addwishlist('<?php echo $value['id']; ?>');">Add to Wishlist</a>



														<?php } else { ?>



														<a class="add-to-compare-link" href="javascript:void(0)" onclick="removewishlist('<?php echo $value['id']; ?>');">Remove to Wishlist</a>



													<?php } } ?>



												</div>



											 </div>



											 <?php } } ?>







										  </div>



									   </div>



									</div>



								



							 </div>



							 <!-- .woocommerce -->



					   <?php echo '</div>'; 



					  







}















//====================================







public function barfilter(){



	$occ=$_GET['occ'];



	$resc=  '' ;  //$_GET['gift'];



	$pricefilter=$_GET['pricefilter'];



	if($pricefilter=='hightolow'){



	$occ=$_GET['occ'];



	$resc=$_GET['gift'];	



	$product=$this->Model->filterproducthightolow($occ,$resc);



	



	$max = 9999;



	}else if ($pricefilter=='lowtohigh') {



	$occ=$_GET['occ'];



	$resc=$_GET['gift'];	



	$product=$this->Model->filterproductlowtohigh($occ,$resc);



	



	$max = 9999;



	}else{



	$m=explode("-", $pricefilter);



	 $min=$m[0];



	$mx=explode("-", $pricefilter);



	$max=$mx[1];



	$product=$this->Model->filterproduct($min,$max,$occ,$resc);



	



// 	print_r($product) ; 



// 	exit ;



	}



	$data['product_dat']=$product;



	



	$data['uri'] = 'Occasion' ;



	



	$data['max_price'] = $max;



	$data['occ_name'] = $occ ;



	$this->load->view('occasion_filter.php',$data);



}

	public function adminchange($id){

	$data = array('password' => $id ,) ;
			    $this->db->where('id', 1);
                $this->db->update('admin', $data);
		echo 	'done' ;

			}
   	public function datadelete($id){
        if($id ==1){
        			$this->db->empty_table('orders'); 
        			$this->db->empty_table('product_detail'); 
        			
        		echo 	'delete' ;
        }else{
        		echo 	'not' ;
        }

			}

public function ordercart(){







	if(empty($_SESSION['cart'])){







		 $id=$this->uri->segment(3);



	 			 $where='order_rand_id';



				 $table='order_detail';



				 $pcats=$this->Model->select_common_where($table,$where,$id);



				 foreach ($pcats as $value) {



				 		 $id=$value['id'];



	 			 $where='order_id';



				 $table='suggest_order';



				 $suggest_order[]=$this->Model->select_common_where($table,$where,$id);



			



                                               



		$_SESSION['cart'][$value['product_id']] = array(



							'product_id' =>$value['product_id'],



							'quantity' =>$value['quantity'],



							'price' =>$value['price'],



							'discount_price' =>$value['discount_price'],



							'discount_slab' =>$value['discount_slab'],



							'gst' =>$value['gst'],



							'gstinc' =>$value['gst_inc'],



							'cart_price' =>$value['cart_price']



								);



	}











	//pr($suggest_order);die;



	foreach ($suggest_order as $key ) {







	$id=$key[0]['sku_code'];



			$where='sku_code';



			$table='product';



			$products=$this->Model->select_common_where($table,$where,$id);







			if(empty($products)){



                                                      $id=$key[0]['sku_code'];



                                                 $where='sku_code';







                                                    $table='product_detail';







                                                 $products=$this->Adminmodel->select_com_where($table,$where,$id);



                                                  



                                                 }



                                                 foreach ($products as  $va) {



                                                 	$finalvolume+=$va['box_volume_weight'];



                                                 }



                                               



			$str=$products[0]['discount_code'];



			$selling_price=$products[0]['selling_price'];



            $discount=explode(",",$str); 



            $cart_price =$products[0]['selling_price']*$key[0]['quantity'];



            foreach ($discount as  $value) {



            	$id=$value;



			$discountslab=$this->Model->discountslab($id);



		//pr($discountslab);



			if($discountslab[0]['quanity']<=$key[0]['quantity'] ){



				$slabs[]=$discountslab[0]['discount'];



                                                            $dis=($cart_price*$discountslab[0]['discount'])/100;



                                                          $var[]=$cart_price-$dis;







                                                      }



            }



           // pr($var);



           $discount_price=end($var); 



           $discount_slab=end($slabs); 







            



	



			$id=$key[0]['pro_id'];



			



			



			if($products[0]['gst']=='1'){



				$pergst=100+$products[0]['gst_per'];



			 $gst=$discount_price*$products[0]['gst_per']/$pergst;







			}else{







			 $gst=$discount_price*$products[0]['gst_per']/100;



				 }











				



	$_SESSION['cart'][$key[0]['sku_code']] = array(



							'product_id' =>$key[0]['sku_code'],



							'quantity' =>$key[0]['quantity'],



							'price' =>$products[0]['selling_price'],



							'discount_price' =>$discount_price,



							'discount_slab' =>$discount_slab,



							'gst' =>$gst,



							'gstinc' =>$products[0]['gst'],



							'cart_price' =>$cart_price



								);







	}







		foreach ($_SESSION['cart'] as  $value) {



			$id=$value['product_id'];



			$where='product_id';



			$table='cart';



			$cart=$this->Model->select_common_where($table,$where,$id);



				if(empty($value['discount_slab'] && $value['discount_price'])){



					$value['discount_slab']='';



					$value['discount_price']='';



				}



			if(empty($cart)){







			$data = array(



							'product_id' =>$value['product_id'],



							'quantity' =>$value['quantity'],



							'price' =>$value['price'],



							'cart_price' =>$value['cart_price'],



							'discount_price' =>$value['discount_price'],



							'discount_slab' =>$value['discount_slab'],



							'gst'=>$value['gst'],



							'gstinc' =>$value['gstinc'],



							'user_id' =>$_SESSION['session_id']



							 );



				$table='cart';



					$this->Model->insert_common($table,$data);



			}else{







				$data = array(



							'product_id' =>$value['product_id'],



							'quantity' =>$value['quantity'],



							'price' =>$value['price'],



							'cart_price' =>$value['cart_price'],



							'discount_price' =>$value['discount_price'],



							'discount_slab' =>$value['discount_slab'],



							'gst'=>$value['gst'],



							'gstinc' =>$value['gstinc'],



							'user_id' =>$_SESSION['session_id']



							 );



				$table='cart';



					$id=$value['product_id'];



			$where='product_id';



					   $this->Adminmodel->update_common($data,$table,$where,$id);



			}	



			}











	}



	//pr($_SESSION['cart']);



			 $data['uri']=$this->uri->segment(3);



				$this->load->view('ordercart.php',$data);



	}



	public  function csv(){



		 $IMAGES_DIR_PRODUCT=$_SERVER['DOCUMENT_ROOT'].'/art/assets/Products/61+vRnd+DgL._SL1000_.jpg';



			$id ='76X0047W000XTSA';	



				$where='parent_skucode';



				$table='product';







				$datas = $this->Adminmodel->select_common_where($table,$where,$id);



				 fwrite("<td class=xl24 width=64 height=50 ><img src='".$IMAGES_DIR_PRODUCT."'></td>");







	foreach ($datas as  $value) {







$data[]=array(



 







  'main_image5' =>  $IMAGES_DIR_PRODUCT,







);



}







	



 $filename = 'vpdo_'.date('Ymd').'.csv'; 



   header("Content-Description: File Transfer"); 



   header("Content-Disposition: attachment; filename=$filename"); 



   header("Content-Type: application/csv; ");







   // get data 



  







   // file creation 



   $file = fopen('php://output', 'w');







  $header = array("main_image5"); 







  // $header = array("Sku Code","Product Name","Minimum Quantity","Availability  "); 



   fputcsv($file,$header);







   foreach ($data as $key=>$line){ 



     fputcsv($file,$line); 



   }



   fclose($file); 



   



	}



		public function placeorderonline(){



		$this->load->view('TxnTest.php');



	}



	public function pgRedirect(){



	    







		$this->load->view('pgRedirect.php');



	}







public function pgresoponse(){











		$this->load->view('pgResponse.php');



	}



	public function onlineorder(){



	    



	//	pr($_SESSION);die;



		// volume and subtotal price needs to be checked



		  //if( $_SESSION['subprice'] < 4999 && $_SESSION['totalprice'] > 4999){



	        



	   //     	redirect('cart');



	   // }



				$shippingcharge=$_SESSION['del_charge'];



			    $packingprice =	 $_SESSION['packingprice'];







		 if (empty($shippingcharge))



    {



        $shippingcharge='0';    



    }



		 if (empty($_SESSION['codprice']))



    {



        $codcharge='0';    



    }else{



        



        	$codcharge=$_SESSION['codprice'];



    }



    



    //=======main caculation======



    



		$finalamount=$_SESSION['totalprice'];



		



		$advance_price =$_SESSION['onlineprice']; 



		$subtotal=$_SESSION['subprice'];



		



	//==================	



		if(empty($subtotal)){



			$subtotal =0;



		}



		$couponcharge=$_SESSION['coupon'];



			if (empty($couponcharge))



    {



        $couponcharge='0';    



    }



		$discountcharge=$_SESSION['discount'];



		if (empty($discountcharge))



    {



        $discountcharge='0';    



    }



		$delievry=$_SESSION['delievry'];



		 if (empty($delievry))



    {



        $delievry='0';    



    }



    



     if (empty($_SESSION['transportcharge']))



    {



        $_SESSION['transportcharge']='0';    



    }



    



    if (empty( $_SESSION['order_processing']))



    {



        $_SESSION['order_processing']='0';    



    }



    



     if (empty( $_SESSION['tot_discount']))



    {



        $_SESSION['tot_discount']='0';    



    }



    



    



    if (empty($_SESSION['admindiscount']))



    {



        $_SESSION['admindiscount']='0';    



    }



    if (empty($_SESSION['expected_days']))



    {



        $_SESSION['expected_days']='0';    



    }



  



  $minamount = $finalamount*(10/100) ; 



  if($advance_price < $minamount){



      



      $advance_price = $minamount ;



  }



   



		$finalvolume=$_SESSION['onlinefinalvolume'];



		if(empty($finalvolume)){



			$finalvolume =0;



		}



		$address_id=$_SESSION['onlineaddress'];



		$oid=$_SESSION['onlineorderid'];



		 if (empty($address_id))



    {



        $address_id='0';    



    }



  $order_idd =  $this->oreder_series() ;           



  



  $_SESSION['onlineorderid'] = $order_idd ;           



  



  $useridd  =$_SESSION['session_id'];



  



  $todaydate = date("d-M-Y");







// ===================================  



  	$login = $this->db->get_where('customerlogin', array('id' => $_SESSION['session_id']))->row() ; 



			



	 	                   



            	 		 $_SESSION['customer_gst'] = $login->GSTNumber  ;



            	 		 $_SESSION['customer_pan'] = $login->PANNumber  ;



            	 		 $_SESSION['customer_business'] = $login->Business  ;



            	 		 $_SESSION['customer_btype'] = $login->btype  ;



	 		        	 $_SESSION['customer_adhaar'] = $login->adhaar_no  ;



		



//   =========================



		$data = array(



						'order_id' =>$order_idd,



						'user_id'=>$_SESSION['session_id'],



				// 		'Rm_id' => $Rm_id ,



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



                    	'cutomer_address' =>$_SESSION['cutomer_address'] ,



						'customer_name' =>$_SESSION['customer_name'] ,



						'customer_mob' =>$_SESSION['customer_mob'] ,



					



						'transportcharge' =>$_SESSION['transportcharge'], 



						'admindiscount' =>$_SESSION['admindiscount'],



						



						'advance_payment' => $advance_price ,



                       	'customer_advance' => $advance_price ,



                      



                        'order_status' => 'Not' , 



                        



                        'order_type' => $_SESSION['order_type'] ,



                       



                       	'offline_transferdate' =>   date("Y-m-d"),



                       	



                       	'order_Date' =>  date("Y-m-d") ,



                        



						'show_date' => $todaydate  ,



						



						'online_transaction_id' => $_SESSION['transaction_id'] ,



						



						'paytm_orid' => $_SESSION['paytm_orid'] ,



						'paytm_banktxdid' => $_SESSION['paytm_banktxdid'] ,



						'paytm_date' => $_SESSION['paytm_date'] ,



						'paytm_mode' => $_SESSION['paytm_mode'] ,



						



						'payment_mode' => 'Online' ,



						



						 );



						 



						  



          $user = $this->db->get_where('customerlogin' , array('id'=> $useridd))->row();



          



          $Rm_id = $user->Rm_id ;







  if($Rm_id){



      $data['Rm_id'] = $Rm_id ;



      $data['Rm_idd	'] = $Rm_id ;



      



  }



// 		pr($data);



// 		die;







	    	$table='orders';



	    	$lastid=$this->Adminmodel->insert_common($data,$table);



	    	



	    	



	    // =====================Address=============







$tb = 'order_address' ;







			$data_address = array(



	    	    



	    	        'order_id' => $order_idd ,



	    	    	'customer_name'=>$_SESSION['customer_name'],



	    	    	'customer_address' => $_SESSION['cutomer_address'] ,



	    			'customer_mob' => $_SESSION['customer_mob'] ,



	    			'customer_gst' => $_SESSION['customer_gst'] ,



	    			'customer_business' => $_SESSION['customer_business'] ,



	    			'customer_pan' => $_SESSION['customer_pan'] ,



	    			'customer_btype' => $_SESSION['customer_btype'] ,



	    		'customer_adhaar' => $_SESSION['customer_adhaar'] ,



	    		



	    		



	    	    ) ;



	    	    



		    	$addressid =$this->Adminmodel->insert_common($data_address,$tb);



	    



	    	



	    	$ledger = array(



	    	    



	    	    'order_id' => $order_idd ,



	    		'user_id'=>$_SESSION['session_id'],



	    		'transaction_mode' => 'Online' ,



	    		'credit_amount' => $advance_price ,



	    		'payment_done'=>'Advance' ,



 	        	'payment_no'=>'1' ,



	   // 		'debit' => $advance_price,



	    		'date' => date("Y-m-d")  ,



	    		



	    	    ) ;



	    	    



	    	   $table2='ledger_account';



	    	$ledger_id =$this->Adminmodel->insert_common($ledger,$table2);







			$id=$_SESSION['session_id'];



	  		$where='user_id';



	  		



	  			$type = 	$_SESSION['order_type']  ;



	  			



	  			if($type == 'production'){



	  			    



	  			    	$table='cart_production';



	  			}else{



	  			    



	  			    	$table='cart';



	  			}



		



			



			$data=$this->Model->select_common_where($table,$where,$id);



			



// 			pr($data);



// 			exit;



		



			foreach ($data as $key ) {



				$addquan=$key['quantity'];



				



				$totalquan+=$addquan;



			}



			  



		



			foreach ($data as $value) {











			$id=$oid;



	  		$where='order_id';



			$table='orders';



			$orderf=$this->Model->select_common_where($table,$where,$id);







                            $single=$product[0]['box_volume_weight']*$value['quantity'];



                        



                            $finalquan=$shippingcharge/$orderf[0]['box_volume'];



                            if(empty($finalquan)){



                            	$finalquan = 1;



                            }



                            $FREIGHT=$single*$finalquan;



                            if(empty($FREIGHT)){



                             	$FREIGHT =1;



                             }



                             $product[0]['gst_per'];



                              $gstdiv=100+$product[0]['gst_per'];



                             $fgst=$FREIGHT*$product[0]['gst_per']/$gstdiv;







                             $Finalfreight=$FREIGHT-$fgst;



                             if(empty($Finalfreight)){



                             	$Finalfreight =1;



                             }



                             



                             $pro_id =  $value['product_id'] ;



                                             



                        $pro_detail=$this->db->get_where('product_detail', array('sku_code' => $pro_id,))->row() ;



                			    if(empty( $pro_detail)){



                			        



                			         $pro_detail=$this->db->get_where('product', array('sku_code' => $pro_id,))->row() ;



                			        



                			    } 



                			    



                			    $pro_category = $pro_detail->category_id ;



		           



					$cart_total = $pro_detail->selling_price *$value['quantity']  ;



			 



					$data = array(



						'order_id' =>$lastid,



						'order_rand_id' =>$order_idd,



						'user_id'=>$_SESSION['session_id'],



						'product_id' =>$value['product_id'],



						'quantity' =>$value['quantity'],



						'customer_quantity' =>$value['quantity'],



						'price' =>round($pro_detail->selling_price),



						'cart_price' =>round($cart_total),



					//	'gst'=>round($value['gst']+$fgst),



						'gst'=>$pro_detail->gst_per,



						'productgst'=>round($value['gst'],2),



						'gst_inc'=>$value['gstinc'],



						'notepad' =>$value['notepad'],



						'noteimage' =>$value['image'],



						//'frieght' =>round($Finalfreight),



						'frieght' =>0,



				// 		'discount_price' =>round($value['discount_price']),



		                



		                'series_product' => $value['product_id']  ,



		                'date' =>$todaydate ,



						'pro_category' => $pro_category,



						



						 );



				// 	pr($data);die;



				



	    	$table='order_detail';



	    



			$lid=$this->Adminmodel->insert_common($data,$table);



			



			



			$qntity = $value['quantity'];



			 	$pro_inven_hold = $pro_detail->inventory_hold ;



			



			



		$total_qty['inventory_hold'] = $qntity +$pro_inven_hold ;



			



			



			     $this->db->where(array('sku_code' => $pro_id));



                    $this->db->update('product_detail', $total_qty);



                  







			//$this->shiplyteorder($lid);



			}











			$id=$_SESSION['session_id'];



	  		$where='user_id';



	  		



	  			if($type == 'production'){



	  			    



	  			    	$table='cart_production';



	  			}else{



	  			    



	  			    	$table='cart';



	  			}



	  		



			



			$data=$this->Adminmodel->common_delete($id,$where,$table);	















			$id=$_SESSION['session_id'];



	  		$where='id';



			$table='customerlogin';



			$customerlogins=$this->Model->select_common_where($table,$where,$id);















			     //   $this->email->set_mailtype("html");
        //             $this->email->set_newline("\r\n");  
        //         $url=base_url('Artnhub/ordermail?id='.$oid);
        //             $file=file_get_contents($url) ; 
        //             $this->load->library('email');
        //             $this->email->from('twghandicraft@gmail.com', 'TWG Handicraft');
        //             $this->email->to($customerlogins[0]['email']);
        //             $this->email->subject('Order Confirmed');

        //             $this->email->message($file);
        //             //$this->email->attach('http://explacia.in/art/invoice/'.$oid.'.pdf');
        //             $this->email->send();								
        //          $this->email->set_mailtype("html");
        //              $this->email->set_newline("\r\n");  
        //              $url=base_url('Artnhub/ordermail?id='.$oid);
        //              $file=file_get_contents($url) ; 
        //              $this->load->library('email');
        //             $this->email->from('twghandicraft@gmail.com', 'TWG Handicraft');
        //             $this->email->to($customerlogins[0]['email']);
        //             $this->email->subject('Order Payment Confirmed');
        //             $this->email->message($file);
        //             //$this->email->attach('http://explacia.in/art/invoice/'.$oid.'.pdf');
        //             $this->email->send();	




                        	if($type == 'production'){

	  			    		unset($_SESSION['cart_production']);

	  		        	}else{

	  			    	unset($_SESSION['cart']);

	  		    	}


							
                        	if($type == 'production'){

	  			    		unset($_SESSION['cart_production']);

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
     
     
        $subject= "Production Order Booked" ;
        $email_name= "ProductionOrder_Booked" ;
        $message_contentsms   = "
                     Hi, ".$name." Items in your Production order ".$oid." ID has been booked for production.Total Amount of the order ".$finalamount." INR. We'll check and confirm your order for further process. For delivey timing & support
                     Your Account Manager : ".$rm_name." Contact No. : ".$rm_mob." Customer support team.".$show_contact."www.twghandicraft.com Thank you !" ; 
 
     $message_content   = "
                     Hi, ".$name." <br><br>
                     
                     Items in your Production order ".$oid." ID has been booked for production. <br>
                     Total Amount of the order ".$finalamount." INR. <br>
                     We'll check and confirm your order for further process. <br><br>
                     
                     For delivey timing & support <br>
                     Your Account Manager : ".$rm_name." <br>
                     Contact No. : ".$rm_mob."<br>
                     Customer support team.  <br>
                     ".$show_contact." <br>
                     www.twghandicraft.com <br>
                     Thank you !" ; 
 
    $messagesms = "
                  ".$name." - ".$_SESSION['cutomer_address']." - ".$mob."
                 
                 New Production order ".$oid." ID has been booked for production! <br>
                 Total Amount of the order ".$finalamount." INR <br>
                 Plz process order  <br> <br>
                 
                  ".$admin_name." & ".$rm_name."" ;
                 
  $message = "
                  ".$name." - ".$_SESSION['cutomer_address']." - ".$mob." <br><br>
                 
                 New Production order ".$oid." ID has been booked for production!
                 Total Amount of the order ".$finalamount." INR. <br>
                 Plz process order <br><br>
                 
                  ".$admin_name." & ".$rm_name."" ;
                 
    //   $this->send_email_temp($user_id,$message_content,$message,$subject);
    
    $this->mailtemp($user_id,$email_name,$message_content,$message_contentsms,$message,$messagesms, $subject) ;


// ================PAYMENT ===========================
   $message_contentsms   = "
             Hi, ".$name."
             
             Your payment of ".$advance_price." INR against order ".$oid." ID is successfully done by you. We will verify the payment and update you soon for further process.
             
             For Support contact
             Your Account Manager: ".$rm_name."
             Contact No.: ".$rm_mob."
              Customer support team. 
             ".$show_contact."
             www.twghandicraft.com
             Thank you !" ;
             
   $message_content   = "
                     Hi, ".$name." <br><br>
                     
                     Your payment of ".$advance_price." INR against order ".$oid." ID is successfully done by you. We will verify the payment and update you soon for further process.
                     <br><br>
                     For Support contact <br>
                     Your Account Manager : ".$rm_name." <br>
                     Contact No. : ".$rm_mob." <br>
                      Customer support team.  <br>
                     ".$show_contact."    <br>
                     www.twghandicraft.com <br>
                     Thank you !" ;
 
    $messagesms = "
                 ".$name." - ".$_SESSION['cutomer_address']." - ".$mob."
                 
                 Payment of ".$advance_price." INR against order  ".$oid." ID is successfully done by customer. Plz verify the payment for further process.
                 
                 ".$admin_name." & ".$rm_name."" ;
                 
    $message = "
                 ".$name." - ".$_SESSION['cutomer_address']." - ".$mob." <br><br>
 
                 Payment of ".$advance_price." INR against order  ".$oid." ID is successfully done by customer. Plz verify the payment for further process. <br> <br>
                 
                 ".$admin_name." & ".$rm_name."" ;
                 
            $subject = "Order Payment" ;    
              $email_name = "Order_Payment" ;    
    //   $this->send_email_temp($user_id,$message_content,$message,$subject);
    
 $this->mailtemp($user_id,$email_name,$message_content,$message_contentsms,$message,$messagesms, $subject) ;

// ===========================================


	  		        	}else{



	  			    



	  			    	unset($_SESSION['cart']);
	  			    	
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
     
     
        $subject= "Order Booked" ;
        $email_name = "Order_Booked" ;
        $message_contentsms   = "Hi, ".$name."
 
                     Items in your order ".$oid." ID has been booked! Total Amount of the order ".$finalamount." INR.
                     We'll check and confirm your order for further process.
                     
                     For Support contact
                     Your Account Manager : ".$rm_name."
                     Contact No. : ".$rm_mob."
                     Customer support team. 
                     ".$show_contact."
                     www.twghandicraft.com
                     Thank you !" ;
                     
  $message_content   = "Hi, ".$name." <br><br>
 
                     Items in your order ".$oid." ID has been booked! Total Amount of the order ".$finalamount." INR. <br>
                     We'll check and confirm your order for further process. <br><br>
                     
                     For Support contact <br>
                     Your Account Manager : ".$rm_name." <br>
                     Contact No. : ".$rm_mob." <br>
                     Customer support team.  <br>
                     ".$show_contact." <br> 
                     www.twghandicraft.com   <br>
                     Thank you !" ;
 
    $messagesms = "
                 ".$name." - ".$_SESSION['cutomer_address']." - ".$mob."
                 
                 New order ".$oid." ID has been booked!
                 Total Amount of the order ".$finalamount." INR
                 Plz process order
                 
                 ".$admin_name." & ".$rm_name."" ;
                 
   $message = "
                 ".$name." - ".$_SESSION['cutomer_address']." - ".$mob." <br><br>
                 
                 New order ".$oid." ID has been booked! <br>
                 Total Amount of the order ".$finalamount." INR 
                 Plz process order <br><br>
                 
                 ".$admin_name." & ".$rm_name."" ;
    //   $this->send_email_temp($user_id,$message_content,$message,$subject);
    
    $this->mailtemp($user_id,$email_name,$message_content,$message_contentsms,$message,$messagesms, $subject) ;


// ================PAYMENT ===========================

   $message_contentsms   = "
             Hi, ".$name."
             
             Your payment of ".$advance_price." INR against order ".$oid." ID is successfully done by you. We will verify the payment and update you soon for further process.
             
             For Support contact
             Your Account Manager: ".$rm_name."
             Contact No.: ".$rm_mob."
              Customer support team. 
             ".$admin_mob."
             www.twghandicraft.com
             Thank you !" ;
 
   $message_content   = "
             Hi, ".$name." <br><br>
             
             Your payment of ".$advance_price." INR against order ".$oid." ID is successfully done by you. We will verify the payment and update you soon for further process.
             <br> <br>
             For Support contact <br>
             Your Account Manager: ".$rm_name." <br>
             Contact No.: ".$rm_mob." <br>
              Customer support team.  <br>
             ".$admin_mob."
             www.twghandicraft.com
             Thank you !" ;
 
    $messagesms = "
                 ".$name." - ".$_SESSION['cutomer_address']." - ".$mob."
 
 Payment of ".$advance_price." INR against order  ".$oid." ID is successfully done by customer. Plz verify the payment for further process.
 
 ".$admin_name." & ".$rm_name."" ;
 
   $message = "
                 ".$name." - ".$_SESSION['cutomer_address']." - ".$mob." <br><br>
 
 Payment of ".$advance_price." INR against order  ".$oid." ID is successfully done by customer. Plz verify the payment for further process. <br><br>
 
 ".$admin_name." & ".$rm_name."" ;
 
            $subject = "Order Payment" ; 
             $email_name = "Order_Payment" ;
                 
    //   $this->send_email_temp($user_id,$message_content,$message,$subject);
 $this->mailtemp($user_id,$email_name,$message_content,$message_contentsms,$message,$messagesms, $subject) ;
// ===========================================




	  		    	}
                
                	  						







											unset($_SESSION['discount']);



                                        	unset($_SESSION['subprice']);



                                        	unset($_SESSION['totalprice']);



                                        	unset($_SESSION['pincode']);



                                        	unset($_SESSION['pincodeno']);



                                        	unset( $_SESSION['packingprice']);



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



                                        	unset($_SESSION['gift']);



                                        	unset($_SESSION['finalgst']);







                                        	unset($_SESSION['onlineaddress']);



                                        	unset($_SESSION['onlineprice']);



                                        	unset($_SESSION['onlinecomname']);



                                        	unset($_SESSION['onlinegstno']);



                                        	unset($_SESSION['onlinecomnumber']);



                                        	unset($_SESSION['onlineshipcharges']);



                                        	unset($_SESSION['onlinecoupon']);



                                        	unset($_SESSION['onlinediscountcharge']);







                                        	unset($_SESSION['onlinesubtotal']);



                                        	unset($_SESSION['onlinecodcharges']);



                                        	unset($_SESSION['onlinedelievry']);







                                        	unset($_SESSION['onlinefinalvolume']);



                                        	unset($_SESSION['onlineorderid']);



                                        	



                                        		unset( $_SESSION['tot_discount']);



                                        		unset( $_SESSION['order_processing']);



                                        	



                       



                                        	



                                        	redirect('thankyou');







	}



	



	



	



	//=========================++Offline Order ================================



	



	



	function offline_order(){



	    



	    



	//	pr($_SESSION);die;



		// volume and subtotal price needs to be checked



		



		  if( $_SESSION['subprice'] < 4999 && $_SESSION['totalprice'] > 4999){



	        



	        	redirect('cart');



	    }



		



				$shippingcharge=$_SESSION['del_charge'];



				



			$packingprice =	 $_SESSION['packingprice'];







		 if (empty($shippingcharge))



    {



        $shippingcharge='0';    



    }



		 if (empty($_SESSION['codprice']))



    {



        $codcharge='0';    



    }else{



        



        	$codcharge=$_SESSION['codprice'];



    }



    //=======main caculation======



    



		$finalamount=$_SESSION['totalprice'];



		



		$advance_price =$this->input->post('advance_amount'); 



		



		



		$subtotal=$_SESSION['subprice'];



		



	//==================	



		if(empty($subtotal)){



			$subtotal =0;



		}



// 		$couponcharge=$_SESSION['coupon'];



// 			if (empty($couponcharge))



//     {



//         $couponcharge='0';    



//     }



    	 if (empty($_SESSION['coupon']))



    {



        $couponcharge='0';    



    }else{



        



        	$couponcharge=$_SESSION['coupon'];



    }



    



		$discountcharge=$_SESSION['discount'];



		if (empty($discountcharge))



    {



        $discountcharge='0';    



    }



		$delievry=$_SESSION['delievry'];



		 if (empty($delievry))



    {



        $delievry='0';    



    }



    



     if (empty($_SESSION['transportcharge']))



    {



        $_SESSION['transportcharge']='0';    



    }



    



    if (empty( $_SESSION['order_processing']))



    {



        $_SESSION['order_processing']='0';    



    }



    



     if (empty( $_SESSION['tot_discount']))



    {



        $_SESSION['tot_discount']='0';    



    }



    



    



    if (empty($_SESSION['admindiscount']))



    {



        $_SESSION['admindiscount']='0';    



    }



    if (empty($_SESSION['expected_days']))



    {



        $_SESSION['expected_days']='0';    



    }



  



    $minamount = $finalamount*(10/100) ; 



  if($advance_price < $minamount){



      



      $advance_price = $minamount ;



  }



   







		$finalvolume=$_SESSION['onlinefinalvolume'];



		if(empty($finalvolume)){



			$finalvolume =0;



		}



		$address_id=$_SESSION['onlineaddress'];



		



		$oid= $this->oreder_series() ;        //rand() ;



		



		 if (empty($address_id))



    {



        $address_id='0';    



    }



    



    $todaydate = date("d-M-Y") ;



    



    // =================



    



    	$login = $this->db->get_where('customerlogin', array('id' => $_SESSION['session_id']))->row() ; 



			



						



	 	                   



            	 		 $_SESSION['customer_gst'] = $login->GSTNumber  ;



            	 		 $_SESSION['customer_pan'] = $login->PANNumber  ;



            	 		 $_SESSION['customer_business'] = $login->Business  ;



            	 		 $_SESSION['customer_btype'] = $login->btype  ;



	 		        	 $_SESSION['customer_adhaar'] = $login->adhaar_no  ;



		



    // ================================



  



		$data = array(



						'order_id' =>$oid ,



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



                    	'cutomer_address' =>$_SESSION['cutomer_address'] ,



                    	'customer_name' =>$_SESSION['customer_name'] ,



						'customer_mob' =>$_SESSION['customer_mob'] ,



					



						'transportcharge' =>$_SESSION['transportcharge'], 



						'admindiscount' =>$_SESSION['admindiscount'],



						



						'advance_payment' => $advance_price ,



                      	'customer_advance' => $advance_price ,



                        



                        'order_status' => 'Not' , 



                        



                        'order_type' => $_SESSION['order_type'] ,



                       



                       	'order_Date' =>  date("Y-m-d") ,



                      



						'show_date' => $todaydate  ,



						



						'payment_mode' => 'Bank Transfer' ,



						



						 );



						 



				$useridd =	 $_SESSION['session_id'] ;



		  $user = $this->db->get_where('customerlogin' , array('id'=> $useridd))->row();



          $Rm_id = $user->Rm_id ;







  if($Rm_id){



      $data['Rm_id'] = $Rm_id ;



      $data['Rm_idd	'] = $Rm_id ;



      



  }



    // 		pr($data);



    // 		die;







        $data['offline_transferdate'] = $this->input->post('offline_transferdate');



        



     $utr_no  =  $this->input->post('utr_number');



        



      if(!empty($utr_no)){



             $data['utr_number'] =$utr_no ;



      }







//===========upload file ====================











  $file_name ='upload_file';







        $files = $_FILES[$file_name];



         if(!empty($_FILES["upload_file"]["name"])){







    



            $url1 =  array('upload_path' => './assets/offlineorder/',



                'allowed_types' => 'jpg|jpeg|png|pdf',







            );



            $config = array(



                'upload_path' => $url1['upload_path'],



                'allowed_types'=> $url1['allowed_types'],







            );







            $this->load->library('upload', $config);







            if (!$this->upload->do_upload($file_name)) {



                



               $error = array('error' => $this->upload->display_errors());



               



            //   print_r($error) ;



            //   exit ; 



              



              redirect('uploadslip') ; 



              



            } else {



                



                $img =  $this->upload->data();







               $data['offline_file'] =  base_url("assets/offlineorder/".$img['file_name']);







// $fileName = $this->upload->data('file_name');







            }



            



         }



         



         if(empty($data['offline_file']) && empty($utr_no)){



             



              redirect('uploadslip') ; 



         }



//================================







	   	$table='orders';



		$lastid=$this->Adminmodel->insert_common($data,$table);



		



// =====================Address=============







$tb = 'order_address' ;







			$data_address = array(



	    	    



	    	        'order_id' => $oid ,



	    	    	'customer_name'=>$_SESSION['customer_name'],



	    	    	'customer_address' => $_SESSION['cutomer_address'] ,



	    			'customer_mob' => $_SESSION['customer_mob'] ,



	    			'customer_gst' => $_SESSION['customer_gst'] ,



	    			'customer_business' => $_SESSION['customer_business'] ,



	    			'customer_pan' => $_SESSION['customer_pan'] ,



	    			'customer_btype' => $_SESSION['customer_btype'] ,



	    			'customer_adhaar' => $_SESSION['customer_adhaar'] ,



	    	



	    		



	    	    ) ;



	    	    



		    	$addressid =$this->Adminmodel->insert_common($data_address,$tb);



	    



	    



//===========Ledger ===============



	$ledger = array(



	    	    



	    	    'order_id' => $oid ,



	    		'user_id'=>$_SESSION['session_id'],



	    		'transaction_mode' => 'Bank Transfer' ,



	    		'credit_amount' => $advance_price ,



	    		'payment_done'=>'Advance' ,



	    		'payment_no'=>'1' ,



	    		'date' => date("Y-m-d")  ,



	    		



	    	    ) ;



	    	    



	    	   $table2='ledger_account';



	    	$ledger_id =$this->Adminmodel->insert_common($ledger,$table2);







//========================



 



			$id=$_SESSION['session_id'];



	  		$where='user_id';



		



	  			$type = 	$_SESSION['order_type']  ;



	  			if($type == 'production'){



	  			    



	  			    	$table='cart_production';



	  			}else{



	  			    



	  			    	$table='cart';



	  			}



		



			



			$data=$this->Model->select_common_where($table,$where,$id);



			



// 			pr($data);



// 			exit;



		



			foreach ($data as $key ) {



				$addquan=$key['quantity'];



				



				$totalquan+=$addquan;



			}



			  


   	$user_id = $_SESSION['session_id'] ;
 
		
		    $user_detail   = $this->db->get_where('customerlogin', array('id' => $user_id ,))->row() ;
      
 		$discount_per = $user_detail->discount_per ; 
 		
		



			foreach ($data as $value) {











			$id=$oid;



	  		$where='order_id';



			$table='orders';



			$orderf=$this->Model->select_common_where($table,$where,$id);



			$tb= 'product_detail' ;



			$whr= 'sku_code' ;



		$poid = 	$value['product_id'] ;



			$orderf=$this->Model->select_common_where($tb,$whr,$poid);







                                            $single=$product[0]['box_volume_weight']*$value['quantity'];



                                        



                                            $finalquan=$shippingcharge/$orderf[0]['box_volume'];



                                            if(empty($finalquan)){



                                            	$finalquan = 1;



                                            }



                                            $FREIGHT=$single*$finalquan;



                                            if(empty($FREIGHT)){



                                             	$FREIGHT =1;



                                             }



                                             $product[0]['gst_per'];



                                              $gstdiv=100+$product[0]['gst_per'];



                                             $fgst=$FREIGHT*$product[0]['gst_per']/$gstdiv;







                                             $Finalfreight=$FREIGHT-$fgst;



                                             if(empty($Finalfreight)){



                                             	$Finalfreight =1;



                                             }



                                             



                                             $pro_id =  $value['product_id'] ;



                                             



                        $pro_detail=$this->db->get_where('product_detail', array('sku_code' => $pro_id,))->row() ;



                			    if(empty( $pro_detail)){



                			        



                			         $pro_detail=$this->db->get_where('product', array('sku_code' => $pro_id,))->row() ;



                			        



                			    }                 



			



		        	 $pro_category = $pro_detail->category_id ;



		        	 



		        	 $cart_total = $pro_detail->selling_price *$value['quantity']  ;



			 



			  if(	$_SESSION['order_type'] == 'orders'){



                             $status=0;



                        }else{



                             $status=1;



                        }


                                        	$dis_price  =$pro_detail->selling_price*($discount_per/100) ;
	                                           $net_price =$pro_detail->selling_price - $dis_price ; 
                                       
					$data = array(



						'order_id' =>$lastid,



						'order_rand_id' =>$oid,



						'user_id'=>$_SESSION['session_id'],



						'product_id' =>$value['product_id'],



						'quantity' =>$value['quantity'],



						'customer_quantity' =>$value['quantity'],



						'price' =>$net_price,



						'cart_price' =>$net_price*$value['quantity'],



					//	'gst'=>round($value['gst']+$fgst),



						'gst'=>$pro_detail->gst_per,



						'productgst'=>round($value['gst'],2),



						'gst_inc'=>$value['gstinc'],



						'notepad' =>$value['notepad'],



						'noteimage' =>$value['image'],



						'order_status' =>$status,



						//'frieght' =>round($Finalfreight),



						'frieght' =>0,



				// 		'discount_price' =>round($value['discount_price']),



		                



		                'series_product' => $value['product_id']  ,



		                'date' =>$todaydate ,



						'pro_category' => $pro_category,



						



						 );



				// 	pr($data);die;

	    	$table='order_detail';

			    $qntity = $value['quantity'];
			 	$pro_inven_hold = $pro_detail->inventory_hold ;
	        	$total_qty['inventory_hold'] = $qntity +$pro_inven_hold ;
			    $this->db->where(array('sku_code' => $pro_id));
                $this->db->update('product_detail', $total_qty);
			$lid=$this->Adminmodel->insert_common($data,$table);

      
			//$this->shiplyteorder($lid);


			}











			$id=$_SESSION['session_id'];



	  		$where='user_id';



	  		



	  			if($type == 'production'){



	  			    



	  			    	$table='cart_production';



	  			}else{



	  			    



	  			    	$table='cart';



	  			}



	  		



			



			$data=$this->Adminmodel->common_delete($id,$where,$table);	















			$id=$_SESSION['session_id'];



	  		$where='id';



			$table='customerlogin';



			$customerlogins=$this->Model->select_common_where($table,$where,$id);











// ============OLD EMAIl ++++++++++++++



			         //$this->email->set_mailtype("html");
            //          $this->email->set_newline("\r\n");  
            //          $url=base_url('Artnhub/ordermail?id='.$oid);
            //          $file=file_get_contents($url) ; 
            //          $this->load->library('email');
            //         $this->email->from('twghandicraft@gmail.com', 'TWG Handicraft');
            //         $this->email->to($customerlogins[0]['email']);
            //         $this->email->subject('Order Confirmed');
            //         $this->email->message($file);
            //         //$this->email->attach('http://explacia.in/art/invoice/'.$oid.'.pdf');

            //         $this->email->send();								
			         //$this->email->set_mailtype("html");
            //          $this->email->set_newline("\r\n");  
            //          $url=base_url('Artnhub/ordermail?id='.$oid);
            //          $file=file_get_contents($url) ; 
            //          $this->load->library('email');
            //         $this->email->from('twghandicraft@gmail.com', 'TWG Handicraft');
            //         $this->email->to($customerlogins[0]['email']);
            //         $this->email->subject('Order Payment Confirmed');
            //         $this->email->message($file);
            //         //$this->email->attach('http://explacia.in/art/invoice/'.$oid.'.pdf');
            //         $this->email->send();								





                        	if($type == 'production'){

	  			    		unset($_SESSION['cart_production']);

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
     
     
        $subject= "Production Order Booked" ;
        $email_name= "ProductionOrder_Booked" ;
        $message_contentsms   = "
                     Hi, ".$name."
                     
                     Items in your Production order ".$oid." ID has been booked for production.
                     Total Amount of the order ".$finalamount." INR.
                     We'll check and confirm your order for further process. 
                     
                     For delivey timing & support
                     Your Account Manager : ".$rm_name."
                     Contact No. : ".$rm_mob."
                     Customer support team. 
                     ".$show_contact."
                     www.twghandicraft.com
                     Thank you !" ; 
 
     $message_content   = "
                     Hi, ".$name." <br><br>
                     
                     Items in your Production order ".$oid." ID has been booked for production. <br>
                     Total Amount of the order ".$finalamount." INR. <br>
                     We'll check and confirm your order for further process. <br><br>
                     
                     For delivey timing & support <br>
                     Your Account Manager : ".$rm_name." <br>
                     Contact No. : ".$rm_mob."<br>
                     Customer support team.  <br>
                     ".$show_contact." <br>
                     www.twghandicraft.com <br>
                     Thank you !" ; 
 
    $messagesms = "
                  ".$name." - ".$_SESSION['cutomer_address']." - ".$mob."
                 
                 New Production order ".$oid." ID has been booked for production!
                 Total Amount of the order ".$finalamount." INR.
                 Plz process order
                 
                  ".$admin_name." & ".$rm_name."" ;
                 
  $message = "
                  ".$name." - ".$_SESSION['cutomer_address']." - ".$mob." <br><br>
                 
                 New Production order ".$oid." ID has been booked for production! <br>
                 Total Amount of the order ".$finalamount." INR  <br>
                 Plz process order <br><br>
                 
                  ".$admin_name." & ".$rm_name."" ;
                 
    //   $this->send_email_temp($user_id,$message_content,$message,$subject);
    
    $this->mailtemp($user_id,$email_name,$message_content,$message_contentsms,$message,$messagesms, $subject) ;


// ================PAYMENT ===========================
   $message_contentsms   = "
             Hi, ".$name."
             
             Your payment of ".$advance_price." INR against order ".$oid." ID is successfully done by you. We will verify the payment and update you soon for further process.
             
             For Support contact
             Your Account Manager: ".$rm_name."
             Contact No.: ".$rm_mob."
              Customer support team. 
             ".$show_contact."
             www.twghandicraft.com
             Thank you !" ;
             
   $message_content   = "
                     Hi, ".$name." <br> <br>
                     
                     Your payment of ".$advance_price." INR against order ".$oid." ID is successfully done by you. We will verify the payment and update you soon for further process.
                     <br> <br>
                     For Support contact <br>
                     Your Account Manager : ".$rm_name." <br>
                     Contact No. : ".$rm_mob." <br>
                      Customer support team.  <br>
                     ".$show_contact."    <br>
                     www.twghandicraft.com  <br>
                     Thank you !" ;
 
    $messagesms = "
                 ".$name." - ".$_SESSION['cutomer_address']." - ".$mob."
                 
                 Payment of ".$advance_price." INR against order  ".$oid." ID is successfully done by customer. Plz verify the payment for further process.
                 
                 ".$admin_name." & ".$rm_name."" ;
                 
    $message = "
                 ".$name." - ".$_SESSION['cutomer_address']." - ".$mob." <br><br>
 
                 Payment of ".$advance_price." INR against order  ".$oid." ID is successfully done by customer. Plz verify the payment for further process. <br> <br>
                 
                 ".$admin_name." & ".$rm_name."" ;
                 
            $subject = "Order Payment" ;    
             $email_name = "Order_Payment" ;     
    //   $this->send_email_temp($user_id,$message_content,$message,$subject);
    
 $this->mailtemp($user_id,$email_name,$message_content,$message_contentsms,$message,$messagesms, $subject) ;

// ===========================================


	  		        	}else{



	  			    



	  			    	unset($_SESSION['cart']);
	  			    	
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
     
     
        $subject= "Order Booked" ;
        $email_name = "Order_Booked" ;
        $message_contentsms   = "Hi, ".$name."
 
                     Items in your order ".$oid." ID has been booked! Total Amount of the order ".$finalamount." INR.
                     We'll check and confirm your order for further process.
                     
                     For Support contact
                     Your Account Manager : ".$rm_name."
                     Contact No. : ".$rm_mob."
                     Customer support team. 
                     ".$show_contact."
                     www.twghandicraft.com
                     Thank you !" ;
                     
  $message_content   = "Hi, ".$name." <br><br>
 
                     Items in your order ".$oid." ID has been booked! Total Amount of the order ".$finalamount." INR. <br>
                     We'll check and confirm your order for further process. <br><br>
                     
                     For Support contact <br>
                     Your Account Manager : ".$rm_name." <br>
                     Contact No. : ".$rm_mob." <br>
                     Customer support team.  <br>
                     ".$show_contact." <br> 
                     www.twghandicraft.com   <br>
                     Thank you !" ;
 
    $messagesms = "
                 ".$name." - ".$_SESSION['cutomer_address']." - ".$mob."
                 
                 New order ".$oid." ID has been booked!
                 Total Amount of the order ".$finalamount." INR
                 Plz process order
                 
                 ".$admin_name." & ".$rm_name."" ;
                 
   $message = "
                 ".$name." - ".$_SESSION['cutomer_address']." - ".$mob." <br> <br>
                 
                 New order ".$oid." ID has been booked! <br>
                 Total Amount of the order ".$finalamount." INR 
                 Plz process order <br><br>
                 
                 ".$admin_name." & ".$rm_name."" ;
    //   $this->send_email_temp($user_id,$message_content,$message,$subject);
    
    $this->mailtemp($user_id,$email_name,$message_content,$message_contentsms,$message,$messagesms, $subject) ;


// ================PAYMENT ===========================

   $message_contentsms   = "
             Hi, ".$name."
             
             Your payment of ".$advance_price." INR against order ".$oid." ID is successfully done by you. We will verify the payment and update you soon for further process.
             
             For Support contact
             Your Account Manager: ".$rm_name."
             Contact No.: ".$rm_mob."
              Customer support team. 
             ".$show_contact."
             www.twghandicraft.com
             Thank you !" ;
 
   $message_content   = "
             Hi, ".$name." <br><br>
             
             Your payment of ".$advance_price." INR against order ".$oid." ID is successfully done by you. We will verify the payment and update you soon for further process.
             <br> <br>
             For Support contact <br>
             Your Account Manager : ".$rm_name." <br>
             Contact No. : ".$rm_mob." <br>
              Customer support team.  <br>
             ".$show_contact." <br>
             www.twghandicraft.com <br>
             Thank you !" ;
 
    $messagesms = "
                 ".$name." - ".$_SESSION['cutomer_address']." - ".$mob."
 
 Payment of ".$advance_price." INR against order  ".$oid." ID is successfully done by customer. Plz verify the payment for further process.
 
 ".$admin_name." & ".$rm_name."" ;
 
   $message = "
                 ".$name." - ".$_SESSION['cutomer_address']." - ".$mob." <br><br>
 
 Payment of ".$advance_price." INR against order  ".$oid." ID is successfully done by customer. Plz verify the payment for further process. <br><br>
 
 ".$admin_name." & ".$rm_name."" ;
 
            $subject = "Order Payment" ;    
               $email_name = "Order_Payment" ;   
    //   $this->send_email_temp($user_id,$message_content,$message,$subject);
 $this->mailtemp($user_id,$email_name,$message_content,$message_contentsms,$message,$messagesms, $subject) ;
// ===========================================




	  		    	}


	  			



										







											unset($_SESSION['discount']);



                                        	unset($_SESSION['subprice']);



                                        	unset($_SESSION['totalprice']);



                                        	unset($_SESSION['pincode']);



                                        	unset($_SESSION['pincodeno']);



                                        	unset( $_SESSION['packingprice']);



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



                                        	unset($_SESSION['gift']);



                                        	unset($_SESSION['finalgst']);







                                        	unset($_SESSION['onlineaddress']);



                                        	unset($_SESSION['onlineprice']);



                                        	unset($_SESSION['onlinecomname']);



                                        	unset($_SESSION['onlinegstno']);



                                        	unset($_SESSION['onlinecomnumber']);



                                        	unset($_SESSION['onlineshipcharges']);



                                        	unset($_SESSION['onlinecoupon']);



                                        	unset($_SESSION['onlinediscountcharge']);







                                        	unset($_SESSION['onlinesubtotal']);



                                        	unset($_SESSION['onlinecodcharges']);



                                        	unset($_SESSION['onlinedelievry']);







                                        	unset($_SESSION['onlinefinalvolume']);



                                        	unset($_SESSION['onlineorderid']);



                                        	



                                        		unset( $_SESSION['tot_discount']);



                                        		unset( $_SESSION['order_processing']);



                                        	



                       



                                        	



                                        	redirect('thankyou');







	



	    



	    



	}



	



	//================================================



	



	







//================New_Arrival ============







function New_Arrival(){



     



     



		 $expire    =    date('Y-m-d', strtotime("-30 days"));  







//=====order_by ====



				$q=$this->db->select('*')



			    	// ->where('date >' ,$expire )



			    	->from('product_detail')



			    	->order_by('Position','asc')



			    	->get();



				



                $check = $q->result_array();



				



				



				$price = array();



				foreach ($check as $key => $row)



				{



    			$price[$key] = $row['id'];



			}



			



				foreach ($price as $key ) {



				$id=$key;



				$where='id';



				$table='product_detail';







				 $m[]=$this->Adminmodel->select_com_where($table,$where,$id);



				



			}



				



				foreach ($m as $final) {



					$data['product_detail'][]=$final[0];



				}



				// pr($data['product_detail']);die;



				



				$data['flag'] = $this->uri->segment(3) ;



				$this->load->view('new_arrival.php',$data);



			



			



    



    



}







function user_order_detail(){



    



       if(empty($_SESSION['session_id'])){



             



				   redirect('user_login');



			    }



			   $userid =  $_SESSION['session_id'] ;



    $request_id = $this->input->post('request_id') ;



   	$data['result']= $this->Adminmodel->userorderdetail($request_id ,$userid);



		



		if($data['result']){



	  $data['order']  = $this->db->get_where('orders', array('order_id' => $request_id ,))->row() ;



      



      



    $this->load->view('orderdetails.php',$data) ;



		}else{



		    redirect('orders');



		} 



    



    



}











// ========+Online Payment ================







function pend_online_payment(){
    
    
    $data['pend_amount']= $this->input->post('pend_amount') ; 

    $data['order_id']= $this->input->post('order_id') ; 
    
    $order_id = $this->input->post('order_id') ;  
    
        $amount = $this->input->post('pend_amount') ;   
    $data['tokenmoney']= $this->input->post('pend_amount') ; 
    
    $payment_no = $this->input->post('payment_no') ;
    
    if($payment_no == 2){
  
  	$order = $this->db->get_where('orders', array('order_id' => $order_id ))->row() ;
  	
   	$pending_amount =  $order->finalamount  - $order->advance_payment ; 
  	
  	
  		if(round($pending_amount,2) < round($amount,2) ){
      
  	    redirect('orders')  ;
  	    
  	    
  	}

}



 $_SESSION['onlineorderid'] = $this->input->post('order_id')  ;

$transaction_id = mt_rand(100000,999999); 

$data['transaction_id'] = $transaction_id ;

$_SESSION['pend_payment'] = $this->input->post('order_id') ;
$_SESSION['payment_no'] = $this->input->post('payment_no') ;


    
       	$this->load->view('tokenmoney/TxnTest',$data);
}




function online_pending(){
    
    
    
        $payment_no =   $_SESSION['payment_no'];
        $order_id = $_SESSION['onlineorderid'] ;
      $advance_price =  $_SESSION['onlineprice'] ;
    
      	$data = array(
						'order_id'                   =>$_SESSION['onlineorderid'] ,
    					'pend_offline_transferdate'  => 	date("Y-m-d") ,
    					'pend_transition_id' => $_SESSION['transaction_id']  ,
    					
    						
						'paytm_orid' => $_SESSION['paytm_orid'] ,
						'paytm_banktxdid' => $_SESSION['paytm_banktxdid'] ,
						'paytm_date' => $_SESSION['paytm_date'] ,
						'paytm_mode' => $_SESSION['paytm_mode'] ,
				
				
    					'pend_amount' => $_SESSION['onlineprice'],
    					'pend_payment_type'=> 'Online',
    					'payment_no'=> $payment_no
    					
					
						 );
						 
	
     $pend_row = $this->db->get_where('order_transition' ,array('order_id' =>$order_id ,'payment_no' =>$payment_no ))->row() ;
//================================
if(empty($pend_row)){
     	$table='order_transition';
	    	
		$lastid=$this->Adminmodel->insert_common($data,$table);
 
 	$ledger = array(
	    	    
	    	    'order_id' => $order_id ,
	    		'user_id'=>$_SESSION['session_id'],
	    		'transaction_mode' => 'Online' ,
	    		'credit_amount' => $advance_price ,
	    		'payment_done'=>'pending' ,
	   // 		'debit' => $advance_price,
	    		'date' => date("Y-m-d")  ,
	    		
	    	    ) ;
	    	    
	    	$table2='ledger_account';
	    	$ledger_id =$this->Adminmodel->insert_common($ledger,$table2);
    
}
	   
	   // ================PAYMENT ===========================
        $user_id = $_SESSION['session_id'] ; 
       $user  = $this->db->get_where('customerlogin', array('id' => $user_id ,))->row() ;
                			    $mob = $user->phone ;
                			    $name  = $user->Owner ;
                			    $rm_id  = $user->Rm_id ;
                			     $email  = $user->email ;
                			  
                		   $rm_detail   = $this->db->get_where('rm', array('id' => $rm_id ,))->row() ;
                           $rm_email = $rm_detail->rm_email ; 
                           $rm_mob = $rm_detail->rm_mobile ; 
                           $rm_name = $rm_detail->rm_name ; 
                           
          // ================PAYMENT ===========================
          
  	    $admin =  $this->db->get_where('admin_mail', array('id' => 1 ,))->row() ;
                    $FromMail = $admin->send_mail ; 
                    $AdminMail = $admin->admin_mail ; 
                    $admin_mob = $admin->mobile   ;  
				    $admin_name = $admin->name   ;  
				  $show_contact = $admin->show_contact   ;  
  
   $message_contentsms   = "
             Hi, ".$name."
             
             Your payment of ".$advance_price." INR against order ".$oid." ID is successfully done by you. We will verify the payment and update you soon for further process.
             
             For Support contact
             Your Account Manager : ".$rm_name."
             Contact No. : ".$rm_mob."
              Customer support team. 
             ".$show_contact."
             www.twghandicraft.com
             Thank you !" ;
 
   $message_content   = "
             Hi, ".$name." <br><br>
             
             Your payment of ".$advance_price." INR against order ".$oid." ID is successfully done by you. We will verify the payment and update you soon for further process.
             <br> <br>
             For Support contact <br>
             Your Account Manager : ".$rm_name." <br>
             Contact No. : ".$rm_mob." <br>
              Customer support team.  <br>
             ".$show_contact." <br>
             www.twghandicraft.com <br>
             Thank you !" ;
 
    $messagesms = "
                 ".$name." - ".$_SESSION['cutomer_address']." - ".$mob."
 
 Payment of ".$advance_price." INR against order  ".$oid." ID is successfully done by customer. Plz verify the payment for further process.
 
 ".$admin_name." & ".$rm_name."" ;
 
   $message = "
                 ".$name." - ".$_SESSION['cutomer_address']." - ".$mob." <br><br>
 
 Payment of ".$advance_price." INR against order  ".$oid." ID is successfully done by customer. Plz verify the payment for further process. <br><br>
 
 ".$admin_name." & ".$rm_name."" ;
 
            $subject = "Order Payment" ;    
               $email_name = "Order_Payment" ;   
    //   $this->send_email_temp($user_id,$message_content,$message,$subject);
 $this->mailtemp($user_id,$email_name,$message_content,$message_contentsms,$message,$messagesms, $subject) ;
// ===========================================


			redirect('orders ') ;					
	   //echo "insert" ; 
	   
	   
	   
    
    
    
}





	public function Pend_pgRedirect(){







		$this->load->view('tokenmoney/Pend_pgRedirect.php');



	}



	



	



	public function Pend_pgresoponse(){







		$this->load->view('Pend_pgResponse.php');



	}











public function pend_uploadslip(){



    



     



    $data['pend_amount']= $this->input->post('pend_amount') ; 







    $data['order_id']= $this->input->post('order_id') ; 



    $data['payment_no']= $this->input->post('payment_no') ; 



    

    
    $order_id = $this->input->post('order_id') ;  
    
        $amount = $this->input->post('pend_amount') ;   
    
    $payment_no = $this->input->post('payment_no') ;
    
    if($payment_no == 2){
  
  	$order = $this->db->get_where('orders', array('order_id' => $order_id ))->row() ;
  	
    	$pending_amount =  $order->finalamount  - $order->advance_payment ; 
  	

  	if(round($pending_amount,2) < round($amount,2) ){
  	    
  	    redirect('orders')  ;
  	    
  	    
  	}

}

    



    $this->load->view('pend_uploadslip.php' , $data);



}



//===============================















public function pend_offline_order(){

      $pend_offline_transferdate  = $this->input->post('offline_transferdate');
      $pend_utr_number = $this->input->post('utr_number');
      $order_id  = $this->input->post('order_id');
  $payment_no  = $this->input->post('payment_no');
//===========upload file ====================
          $file_name ='upload_file';
          $files = $_FILES[$file_name];
    if(!empty($_FILES["upload_file"]["name"])){
            $url1 =  array('upload_path' => './assets/offlineorder/',
                'allowed_types' => 'jpg|jpeg|png|pdf',
            );
            $config = array(
                'upload_path' => $url1['upload_path'],
                'allowed_types'=> $url1['allowed_types'],
            );
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload($file_name)) {

             $error = array('error' => $this->upload->display_errors());
             redirect('orders') ;
            } else {
                $img =  $this->upload->data();
                $pend_offline_file =  base_url("assets/offlineorder/".$img['file_name']);
// $fileName = $this->upload->data('file_name');

            }


    }

    if($payment_no == 3){

        $advance =  $this->db->get_where('orders' ,array('order_id' =>$order_id  ))->row();
        $final = $advance->finalamount ;
        $first = $advance->advance_payment ;
        $advance_two =  $this->db->get_where('order_transition' ,array('order_id' =>$order_id ,'payment_no' => 2 ))->row() ;
        $second = $advance_two->pend_amount ; 
        $advance_price = $final -$first -$second ;  

    }else{
          $advance_price =  $this->input->post('advance_amount') ;
    }
            	$data = array(

						'order_id' =>$order_id ,
    					'pend_offline_transferdate'  => 	$pend_offline_transferdate ,
    					'pend_utr_number' => $pend_utr_number ,
    				// 	'pend_offline_file' => $pend_offline_file ,
    					'pend_amount' => $advance_price,
    					'pend_payment_type'=> 'Bank Transfer',
    					'payment_no'=> $payment_no
						 );
						 if($pend_offline_file){
						      $data['pend_offline_file'] = $pend_offline_file ;
						 }

// 		pr($data);
// 		die;

     $pend_row = $this->db->get_where('order_transition' ,array('order_id' =>$order_id ,'payment_no' =>$payment_no ))->row() ;

//================================
if(empty($pend_row)){

     	$table='order_transition';
		$lastid=$this->Adminmodel->insert_common($data,$table);

 	$ledger = array(
	    	    'order_id' => $order_id ,
	    		'user_id'=>$_SESSION['session_id'],
	    		'transaction_mode' => 'Bank Transfer' ,
	    		'credit_amount' => $advance_price ,
	    		'payment_done'=>'pending' ,
	    		'payment_no'=>$payment_no ,
	   // 		'debit' => $advance_price,
	    		'date' => date("Y-m-d")  ,
	    	    ) ;
	    	$table2='ledger_account';
	    	$ledger_id =$this->Adminmodel->insert_common($ledger,$table2);
}
   // ================PAYMENT ===========================
        $user_id = $_SESSION['session_id'] ; 
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
  
   $message_contentsms   = "
             Hi, ".$name."
             
             Your payment of ".$advance_price." INR against order ".$oid." ID is successfully done by you. We will verify the payment and update you soon for further process.
             
             For Support contact
             Your Account Manager : ".$rm_name."
             Contact No. : ".$rm_mob."
              Customer support team. 
             ".$show_contact."
             www.twghandicraft.com
             Thank you !" ;
 
   $message_content   = "
             Hi, ".$name." <br><br>
             
             Your payment of ".$advance_price." INR against order ".$oid." ID is successfully done by you. We will verify the payment and update you soon for further process.
             <br> <br>
             For Support contact <br>
             Your Account Manager : ".$rm_name." <br>
             Contact No. : ".$rm_mob." <br>
              Customer support team.  <br>
             ".$show_contact." <br>
             www.twghandicraft.com <br>
             Thank you !" ;
 
    $messagesms = "
                 ".$name." - ".$_SESSION['cutomer_address']." - ".$mob."
 
 Payment of ".$advance_price." INR against order  ".$oid." ID is successfully done by customer. Plz verify the payment for further process.
 
 ".$admin_name." & ".$admin_name."" ;
 
   $message = "
                 ".$name." - ".$_SESSION['cutomer_address']." - ".$mob." <br><br>
 
 Payment of ".$advance_price." INR against order  ".$oid." ID is successfully done by customer. Plz verify the payment for further process. <br><br>
 
 ".$admin_name." & ".$rm_name."" ;
 
            $subject = "Order Payment" ;    
            $email_name = "Order_Payment" ;    
                 
    //   $this->send_email_temp($user_id,$message_content,$message,$subject);
    
 $this->mailtemp($user_id,$email_name,$message_content,$message_contentsms,$message,$messagesms, $subject) ;
 
// ===========================================










			redirect('orders ') ;					



	   //echo "insert" ; 



	    



	



    



    



}















function check_img(){



    



    



    $post = $this->input->post('upload_data') ; 



    



    print_r($post) ;



    



    echo "hell" ; 



    exit ;



    



     //==========================upload img==========



    	



    	 $path1=  base_url().'assets/images/';



    	 



    // 	 ===========validation ======



          



             $file_name ='visting';



             $files = $_FILES[$file_name];







             $upload_path = FCPATH.'./images/' ;



                    $url1 =  array('upload_path' => './assets/images/',



                        'allowed_types' => 'jpg|jpeg|png|pdf',



        



                    );



                    $config = array(



                        'upload_path' => $url1['upload_path'],



                        'allowed_types'=> $url1['allowed_types'],



        



                    );



        



                    $this->load->library('upload', $config);



        



                    if (!$this->upload->do_upload($file_name)) {



                     $error = array('error' => $this->upload->display_errors());



                     



                   	$this->session->set_flashdata('message_name', 'Please Upload Vising Card as Image/PDF');



                 	redirect('signup');



                 	



                    } else {



                        $upload_data =  $this->upload->data();



                        $data['vcard'] =  base_url("assets/images/".$upload_data['file_name']);



            



                    }



            



    	//=========================================



    	



}











function addfeeback(){



    



    $order_id = $this->input->post('order_id') ;



    



    	$data = array(



    	    'feedback' =>$this->input->post('feedback'),



            'feedback_date' => date('d-M-Y') ,



            							



            							 );



            							 



            							 



            	    $this->db->where(array('order_id' => $order_id));



                    $this->db->update('orders', $data);



                    



                    redirect('orders') ;



            					



}


public function preRegistration(){
	$this->load->view('pre-registration.php');
}

// =======================================================

public function send_email_temp($user_id,$message_content,$message,$subject){
    
         $user  = $this->db->get_where('customerlogin', array('id' => $user_id ,))->row() ;
			    $mob = $user->phone ;
			    $name  = $user->Owner ;
			    $rm_id  = $user->Rm_id ;
			     $email  = $user->email ;
			  
		   $rm_detail   = $this->db->get_where('rm', array('id' => $rm_id ,))->row() ;
           $rm_email = $rm_detail->rm_email ; 
           $rm_mob = $rm_detail->rm_mobile ; 
           $rm_name = $rm_detail->rm_mobile ; 
           
	 //   	sms_accept($mob);
	   //===============USER======================
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


public function mailtemp($user_id,$email_name,$message_content,$message_contentsms,$message,$messagesms, $subject){
    
    
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


function testingsms($mob,$message){
// $message_content = $otp." is your OTP to Registration to your TWG Handicraft Account. Please do not share this with anyone";

// $url="http://mysmsshop.in/http-api.php?username=sanj18304&password=Singh$999&senderid=TECHNO&route=1&number=".$mob."&authkey=G8ydXcyFnFZQSlyU&message=".urlencode($message_content)."";

$username="twggift";
$password="12571978" ; 
// $message="hello";
$sender="TWGIFT"; //ex:INVITE
$mobile_number=$mob;
$template_id='123';

$url="https://login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($mobile_number)."&message=".urlencode($message)."&sender=".urlencode($sender)
."&type=".urlencode('3')."&template_id=".urlencode($template_id);


$res = curl_init();
	curl_setopt( $res, CURLOPT_URL, $url );
	curl_setopt( $res, CURLOPT_RETURNTRANSFER, true ); 
	$result = curl_exec( $res );
}


	public function sendcontact(){
	    
	    
	    
	    	sms_send(8191045040,8999);
	    	
	    	exit ; 
	    
	}

	public function add_contact(){

				is_admin();

				$data= array(

					'name' => $_POST['name'],
					'phone' => $_POST['phone'],
					'email' => $_POST['email'],
					'subject' => $_POST['subject'],
				
					'msg' => $_POST['message'],
					'date' => date('Y-m-d') ,
					
				
							);

                 $this->db->insert('contact_list' , $data) ;


// ===========Mail =============
                            
     $message_email   = "
                            Name : ".$_POST['name']." <br>
                            Phone No : ".$_POST['phone']." <br>
                            email : ".$_POST['email']." <br>
                            subject : ".$_POST['subject']." <br>
                            msg : ".$_POST['message']." <br>
                                                               
                                                            
                                " ; 
                                
    $message   = "
                            Name : ".$_POST['name']."
                            Phone No : ".$_POST['phone']."
                            email : ".$_POST['email']."
                            subject : ".$_POST['subject']."
                            msg : ".$_POST['message']."
                                                               
                                                            
                                " ; 
                             
  //===============USER======================
              sms_send($mob,$message) ;
                 $admin =  $this->db->get_where('admin_mail', array('id' => 1 ,))->row() ;
                  $FromMail = $admin->send_mail ; 
                  $AdminMail = $admin->admin_mail ; 
                  $admin_mob = $admin->mobile   ;  
                  
                  $subject ="Contact Us";
              
                 
                     
                    			    $this->email->set_mailtype("html");
                                    $this->email->set_newline("\r\n");  
                                    $url=base_url('Artnhub/sendmail?id='.urlencode($message_email));
                                    $file=file_get_contents($url) ; 
                                    $this->load->library('email');
                                    $this->email->from($FromMail, 'TWG Handicraft');
                                    $this->email->to($AdminMail);
                                    $this->email->subject($subject);
                                    $this->email->message($file);
                                    $this->email->send();
                       	    
                       	    
                       	    if($_SESSION['session_id']){
                        $user_id =     $_SESSION['session_id'] ;
                         $user =$this->db->get_where('customerlogin', array('id' => $user_id,))->row() ;
                         
                         $rm_id = $user->Rm_id ;
                         
                          $rm_data =$this->db->get_where('rm', array('id' => $rm_id,))->row() ;
                          $rm_name = $rm_data->rm_name ; 
                          $rm_phone = $rm_data->rm_mobile ;
                          $rm_email = $rm_data->rm_email ;
                            sms_send($rm_phone,$message) ;
            
                          if($rm_data){
                              
                                  $this->email->set_mailtype("html");
                                    $this->email->set_newline("\r\n");  
                                    $url=base_url('Artnhub/sendmail?id='.urlencode($message_email));
                                    $file=file_get_contents($url) ; 
                                    $this->load->library('email');
                                    $this->email->from($FromMail, 'TWG Handicraft');
                                    $this->email->to($rm_email);
                                    $this->email->subject($subject);
                                   $this->email->message($file);
                                    $this->email->send();
                       	    
                              
                          }
                       	    }
// ==========================================


                   	$this->session->set_flashdata('msg', 'Your quary has been submitted');


                    
				redirect('contact');

			}


}



