<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Reservation extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('seat_model');
		$this->load->helper('url');
		$this->load->library('session');
	}

	public function index(){
		if($this->session->is_in){
			$email = $this->session->email;
			$data = array('email'=>$email);
			$this->load->view('user_hall', $data);
		}
		else{
			redirect('/store', 'refresh');
		}
	}

	private function load_view_seat_reservation(){
		$dates = array();
		for($i=1; $i<8; $i++){
			$temp = date('Y/m/d', time()+(24*60*60)*$i);
			array_push($dates, $temp);
		}
		$data = array('dates'=>$dates);
		if($this->session->permission){
			$this->load->view('seat_reservation',$data);
		}
		else{
			$this->load->view('seat_reservation_by_manager',$data);
		}
	}

	public function seat_reservation(){
		$this->load_view_seat_reservation();
	}

	public function menu(){
		$data = $this->seat_model->get_menu();
		$result = array("menu"=>$data);
		$this->load->view('show_menu', $result);
	}

	public function order(){
		if($this->session->is_in){
			$uid = $this->session->id;
			$permission = $this->session->permission;
			$data = array("uid"=>$uid, "permission"=>$permission);
			$order = $this->seat_model->get_reservation($data);
			$time = array();
			for($i=0; $i < sizeof($order); $i++){
				$date_time = $this->seat_model->get_time_date_byid($order[$i]['timeid']);
				array_push($time, $date_time);
			}
			$data = array("reservation"=>$order, "date_time"=>$time);
			$this->load->view("show_reservations", $data);
		}
		else{

		}
	}

	public function upload_seat_reservation(){
		$date_ = $this->input->post("date_");
		$time_ = $this->input->post("time_");
		//calculate the input date_ diff from today
		$today = new DateTime(date('Y/m/d', time()));
		$input_date = new DateTime($date_);
		$time_diff = ($input_date->getTimestamp() - $today->getTimestamp())/(24*60*60);
		//deal whether the date_, time_ input is correct
		if($time_diff > 0 && $time_diff < 8 && $time_ > -1 && $time_ <4){
			$quantity = $this->input->post("quantity");
			$data = array("date_"=>$date_, "time_"=>$time_);
			$empty = $this->seat_model->get_empty_seat($data);
			$timeid = $this->seat_model->get_timeid($data);
			if($quantity <= $empty){
				//set session
				$data = array("timeid"=>$timeid, "seatnum"=>$quantity);
				$this->session->set_userdata($data);
				//update seat
				$empty = $empty - $quantity;
				$data = array("date_"=>$date_, "time_"=>$time_, "empty"=>$empty);
				$this->seat_model->update_seat($data);
				echo "c";
			}
			else{
				//redirect("/reservation/seat_reservation", "refresh");
				echo "n";
			}
		}
		else{
			//redirect("/reservation/seat_reservation", "refresh");
			echo "i";
		}
	}

	public function upload_seat_reservation_by_manager(){
		$date_ = $this->input->post("date_");
		$time_ = $this->input->post("time_");
		$customer_name = $this->input->post("name");
		$customer_phone = $this->input->post("phonenum");
		//calculate the input date_ diff from today
		$today = new DateTime(date('Y/m/d', time()));
		$input_date = new DateTime($date_);
		$time_diff = ($input_date->getTimestamp() - $today->getTimestamp())/(24*60*60);
		//deal whether the date_, time_ input is correct
		if($time_diff > 0 && $time_diff < 8 && $time_ > -1 && $time_ <4){
			$quantity = $this->input->post("quantity");
			$data = array("date_"=>$date_, "time_"=>$time_);
			$empty = $this->seat_model->get_empty_seat($data);
			$timeid = $this->seat_model->get_timeid($data);
			if($quantity <= $empty){
				//set session
				$data = array("timeid"=>$timeid, "seatnum"=>$quantity, "customer_name"=>$customer_name, "customer_phone"=>$customer_phone);
				$this->session->set_userdata($data);
				//update seat
				$empty = $empty - $quantity;
				$data = array("date_"=>$date_, "time_"=>$time_, "empty"=>$empty);
				$this->seat_model->update_seat($data);
				echo "c";
			}
			else{
				//redirect("/reservation/seat_reservation", "refresh");
				echo "n";
			}
		}
		else{
			//redirect("/reservation/seat_reservation", "refresh");
			echo "i";
		}
	}

	public function create_reservation(){
		$uid = $this->session->id;
		$timeid = $this->session->timeid;
		$seatnum = $this->session->seatnum;
		$phonenum = $this->session->phonenum;
		$name = $this->session->name;
		$customer_phone = $this->session->customer_phone;
		$customer_name = $this->session->customer_name;
		if($this->session->permission){
			$new_order = array("uid"=>$uid, "timeid"=>$timeid, "seatnum"=>$seatnum, "phonenum"=>$phonenum, "name"=>$name);
		}
		else{
			$new_order = array("uid"=>$uid, "timeid"=>$timeid, "seatnum"=>$seatnum, "phonenum"=>$customer_phone, "name"=>$customer_name);
		}
		$this->seat_model->new_reservation($new_order);
		redirect("/reservation", "refresh");
	}

	public function create_food_reservation(){
		$uid = $this->session->id;
		$timeid = $this->session->timeid;
		$seatnum = $this->session->seatnum;
		$phonenum = $this->session->phonenum;
		$name = $this->session->name;
		$customer_phone = $this->session->customer_phone;
		$customer_name = $this->session->customer_name;
		$order_result = $this->input->post("orderResult");
		if($this->session->permission){
			$new_order = array("uid"=>$uid, "timeid"=>$timeid, "seatnum"=>$seatnum, "phonenum"=>$phonenum, "name"=>$name, "food"=>$order_result);
		}
		else{
			$new_order = array("uid"=>$uid, "timeid"=>$timeid, "seatnum"=>$seatnum, "phonenum"=>$customer_phone, "name"=>$customer_name, "food"=>$order_result);
		}
		$this->seat_model->new_reservation($new_order);
	}
}