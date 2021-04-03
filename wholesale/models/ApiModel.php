<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ApiModel extends CI_Model {


    public function login($email,$pass)
    {
    	
    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$email);
		$this->db->where('password',$pass);
		$query = $this->db->get();

		$result = $query->row();
		return $result;
    }
   
    public function signup($data){
    $this->db->insert('users',$data);
    return $this->db->insert_id();
    }
    public function checkemail($email){
    $this->db->select('*');
		$this->db->from('users');
		$this->db->where('email',$email);
		$que = $this->db->get();

		$res = $que->row();
		return $res;
    }
   public function Listcar(){
   	$this->db->select('*');
		$this->db->from('cars as c');
		$this->db->join('car_owner as cc','cc.owner_id=c.car_owner_id');
		$que = $this->db->get();

		$res = $que->result_array();
		return $res;



   }

   public function car($start,$end){


	

   	$query=$this->db->query("SELECT car_id FROM booking where (book_to >= '".$start."'
                      AND book_from <= '".$end."') or (book_from BETWEEN '".$start."' AND '".$end."') OR (book_to BETWEEN '".$start."' AND '".$end."' )");
   		 return $query->result();


   }

   public function searchcar($c){


   		$query=$this->db->query("SELECT * FROM cars as c join car_owner as cc on cc.owner_id=c.car_owner_id 
   		WHERE car_id NOT IN ($c)");
   		 return $query->result();


   		
   }
   public function Customerdetails($Customerdetails){
       $this->db->insert('licence_details',$Customerdetails);
       return $this->db->insert_id();

   }
   public function booking($book){
       $this->db->insert('booking',$book);
       $id= $this->db->insert_id();
       $this->db->select('booking_id');
    $this->db->where('book_id',$id);
     $que = $this->db->get('booking');

    $res = $que->row();
    return $res;
   }
   public function listbooking($id){
      $this->db->select('*');
    $this->db->where('car_id',$id);
     $que = $this->db->get('booking');

    $res = $que->result_array();
    return $res;
   }


   public function BookingDetails($userid,$status){
    $this->db->select('*');
    $this->db->from('booking as b');
    $this->db->join('cars as c','c.car_id=b.car_id');
    $this->db->join('car_owner as co','co.owner_id=c.car_owner_id');
    $this->db->join('licence_details as ld','ld.driving_detail_id=b.licence_id');
    $this->db->where('b.user_id',$userid);
    $this->db->where('b.status',$status);
    $que = $this->db->get();

    $res = $que->result_array();
    return $res;



   }

   public function updateuser($data,$userid){
     $this->db->where('id',$userid);
     $this->db->update('users',$data);
   }

   public function Rating($carid){
    $this->db->select('*');
    $this->db->where('car_id',$carid);
     $que = $this->db->get('Rating');

    $res = $que->result_array();
    return $res;
   }

    public function AddRating($data){
       $this->db->insert('Rating',$data);
       return $this->db->insert_id();
   }

   public function Startotp($data,$bookid){
     $this->db->where('booking_id',$bookid);
     $this->db->update('booking',$data);
      $this->db->select('start_trip');
    $this->db->where('booking_id',$bookid);
     $que = $this->db->get('booking');

    $res = $que->result_array();
    return $res;

    }
    public function checkstrtotp($otp,$bookid){
    $this->db->select('*');
    $this->db->where('booking_id',$bookid);
    $this->db->where('start_trip',$otp);
    $que = $this->db->get('booking');

    $res = $que->result_array();
    return $res;
    }
    public function startride($bookid,$data1){
       $this->db->where('booking_id',$bookid);
     $this->db->update('booking',$data1);
    }

     public function Endtotp($data,$bookid){
     $this->db->where('booking_id',$bookid);
     $this->db->update('booking',$data);

     $this->db->select('end_trip');
    $this->db->where('booking_id',$bookid);
     $que = $this->db->get('booking');

    $res = $que->result_array();
    return $res;
    }
    public function checkendotp($otp,$bookid){
    $this->db->select('*');
    $this->db->where('booking_id',$bookid);
    $this->db->where('end_trip',$otp);
    $que = $this->db->get('booking');

    $res = $que->result_array();
    return $res;
    }
    public function Endride($bookid,$data1){
       $this->db->where('booking_id',$bookid);
     $this->db->update('booking',$data1);

      $this->db->select('user_id');
    $this->db->where('booking_id',$bookid);
    $que = $this->db->get('booking');

    $res = $que->result_array();
    return $res;
    }

    public function updaterate($carid,$ra){
       $this->db->where('car_id',$carid);
     $this->db->update('cars',$ra);
    }
    public function invites($data){
    $this->db->insert('invites',$data);
   
    }
    public function checkrefer($refer){
    $this->db->select('user_id');
    $this->db->where('refer',$refer);
    $que = $this->db->get('invites');

    $res = $que->result_array();
    return $res;
    }
     public function checkride($loginid){
    $this->db->select('*');
    $this->db->where('user_id',$loginid);
    $this->db->where('status',2);
    $que = $this->db->get('booking');

    $res = $que->result_array();
    return $res;
    }

    public function checkuser($loginid){
    $this->db->select('*');
    $this->db->where('id',$loginid);
    $que = $this->db->get('users');
    $res = $que->result_array();
    return $res;
    }
    public function rewards($rewars){
      $this->db->insert('points',$rewars);
    }
     public function Getpoints($user_id){
    $this->db->select('*');
    $this->db->where('user_id',$user_id);
    $que = $this->db->get('points');
    $res = $que->result_array();
    return $res;
    }
}