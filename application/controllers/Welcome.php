<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('welcome_model');
		$this->load->helper('form');
	}
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function _new(){
		$email = $this->input->post('id');
		$passwd = $this->input->post('passwd');
		$data = array(
				'email'=>$email,
				'passwd'=>$passwd
		);
		$this->welcome_model->insert($data);
		redirect('welcome', 'refresh');
	}
}
