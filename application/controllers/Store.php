<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('store_model');
		$this->load->helper('url');
		$this->load->library('session');
	}

	public function index(){
		$email = $this->session->email;
		if($this->session->is_in){
			$is_in = 'You have logged in!';
		}
		else{
			$is_in = 'You have not logged in!';
		}
		$data = array( 'email' => $email, 'is_in' => $is_in);
		$this->load->view('welcome', $data);
	}

	public function sign_in(){
		if($this->session->is_in){
			redirect('/reservation', 'refresh');
		}
		else{
			$this->load->view('login');
		}
	}

	public function register(){
		if($this->session->is_in){
			redirect('/reservation', 'refresh');
		}
		else{
			$this->load->view('sign_up');
		}
	}

	public function view(){
		if($this->session->is_in){
			$data = $this->store_model->get_user_data();
			$this->load->view('change_user_data', $data);
		}
		else{
			redirect('/store', 'refresh');
		}
	}

	public function verify(){
		$email = $this->input->post('email');
		$passwd = $this->input->post('passwd');
		$data = array('email'=>$email, 'passwd'=>$passwd);
		$check = $this->store_model->check_login($data);
		if($check == true){
			//verify
			$data = array('email'=>$email, 'is_in'=>$check);
			$this->create_session($data);
			//save user data to session
			$user_data = $this->store_model->get_user_data();
			$data = array("id"=>$user_data['id'], "phonenum"=>$user_data["phonenum"], "name"=>$user_data["name"], "permission"=>$user_data["permission"]);
			$this->create_session($data);
			redirect('/reservation', 'refresh');
		}
		else{
			redirect('/store/sign_in', 'refresh');
		}
	}

	public function create(){
		$email = $this->input->post('email');
		$passwd = $this->input->post('passwd');
		$name = $this->input->post('name');
		$phonenum = $this->input->post('phonenum');
		$data = array('email'=>$email, 'passwd'=>$passwd, 'permission'=>1, 'phonenum'=>$phonenum, 'name'=>$name);
		$check = $this->store_model->insert_account($data);
		if($check){
			$data = $data = array('email'=>$email, 'is_in'=>$check);
			$this->create_session($data);
			redirect('/reservation', 'refresh');
		}
		else{
			redirect('/store', 'refresh');
		}
	}

	public function update(){
		$email = $this->input->post('email');
		$passwd = $this->input->post('passwd');
		$name = $this->input->post('name');
		$phonenum = $this->input->post('phonenum');
		$data = array('email'=>$email, 'passwd'=>$passwd, 'name'=>$name, 'phonenum'=>$phonenum);
		$this->store_model->update_user_data($data);
		redirect('/store/view', 'refresh');
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/', 'refresh');
	}

	private function create_session($data){
		$this->session->set_userdata($data);
	}
}