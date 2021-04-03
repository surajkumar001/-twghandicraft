<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Adminmodel extends CI_Model{
				
	public function admin_log($data,$table)
			{
				$ads = array();
				$this->db->select('*');
				$this->db->where('email',$data['name']);
				$this->db->where('password',$data['pass']);

				$fetch_query= $this->db->get($table);

				$query=$fetch_query->result();
				foreach ($query as $row)
				 {
					$ads = $row;
				 }
				return $ads;
			}
	public function insert_common($table,$data){
		$this->db->insert($table,$data);
	}
	public function list_common($table){
		$this->db->select('*');
 		$this->db->from($table);		
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
 	public function Vendorbooking($vendorid){

 		$this->db->select('*,dl.image as dlimage');
 		$this->db->where('c.car_owner_id',$vendorid);	
 		$this->db->from('cars as c');
 		$this->db->join('car_owner as cc','cc.owner_id=c.car_owner_id');
 		$this->db->join('booking as b','c.car_id=b.car_id');
 		$this->db->join('users as u','u.id=b.user_id');
 		$this->db->join('licence_details as dl','dl.driving_detail_id=b.licence_id');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
 	}
 	
 	public function booking(){

 		$this->db->select('*,dl.image as dlimage');
 		$this->db->from('cars as c');
 		$this->db->join('booking as b','c.car_id=b.car_id');
 		$this->db->join('users as u','u.id=b.user_id');
 		$this->db->join('licence_details as dl','dl.driving_detail_id=b.licence_id');
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
 	}
 	public function Editvendor($id){
 		
 		$this->db->select('*');
 		$this->db->where('owner_id',$id);
		$this->db->from('car_owner');
		
		$query = $this->db->get();

		$result = $query->result_array();
		return $result;
 	}

 	public function update_common($data,$table,$where,$id){
 		$this->db->where($where,$id);
 		$this->db->update($table,$data);
 	}
 	public function ridestatus($bookid,$data){
 		$this->db->where('booking_id',$bookid);
 		$this->db->update('booking',$data);
 	}
 	public function vendorstatus($ownerid,$data){
 		$this->db->where('owner_id',$ownerid);
 		$this->db->update('car_owner',$data);
 	}
 	public function Edituser($id){
 		
 		$this->db->select('*');
 		$this->db->where('id',$id);
		$this->db->from('users');
		
		$query = $this->db->get();

		$result = $query->result_array();
		return $result;
 	}

 	
}