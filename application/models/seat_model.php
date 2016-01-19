<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class seat_model extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
	}

	function get_empty_seat($data){
		//data consist of (date_, time_)
		$query = $this->db->query("select * from Seat where date_=\"".$data["date_"]."\" and time_=".$data['time_'])->result_array();
		$result = array();
		if($query){
			$empty = $query[0]["empty"];
			return $empty;
		}
		else{
			$temp = array('date_'=>$data["date_"], 'time_'=>$data["time_"], 'empty'=>50);
			$this->db->insert('Seat', $temp);
			return 50;
		}
	}

	function update_seat($data){
		//data consist of (data_, time_, new_empty)
		$this->db->where("date_", $data["date_"]);
		$this->db->where("time_", $data["time_"]);
		$this->db->update("Seat", array("empty"=>$data["empty"]));
	}

	function get_menu(){
		//data consist of (date_, time_)
		$query = $this->db->query("select * from Menu")->result_array();
		return $query;
	} 

	function get_timeid($data){
		$query = $this->db->query("select * from Seat where date_=\"".$data["date_"]."\" and time_=".$data['time_'])->result_array();
		return $query[0]['id'];
	}

	function new_reservation($data){
		$this->db->insert('Reservation', $data);
	}

	function get_reservation($data){
		if($data["permission"] == 0){
			$query = $this->db->query("select * from Reservation")->result_array();
			return $query;
		}
		else{
			$query = $this->db->query("select * from Reservation where uid=".$data["uid"])->result_array();
			return $query;
		}
	}

	function get_time_date_byid($id){
		$query = $this->db->query("select date_, time_ from Seat where id=".$id)->result_array();
		return $query[0];
	}

}