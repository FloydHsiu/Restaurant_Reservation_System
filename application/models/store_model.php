<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class store_model extends CI_Model{
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
	}

	function insert_account($data){
		//$insert_exec = "insert into Account(id, passwd) values (" + $data['email'] + ",\"" + $data['passwd'] + "\");";
		//$this->db->query($insert_exec);
		$query = $this->db->query("select * from Account where email=\"".$data['email']."\" limit 1")->result_array();
		if(!$query){
			if($data['email'] != NULL){
				if($data['passwd'] != NULL){
					if($data['name'] != NULL){
						$this->db->insert('Account', $data);
						return true;
					}
				}
			}
		}
		return false;
	}

	function check_login($data){
		$email = $this->input->post['email'];
		$passwd = $this->input->post['passwd'];
		$result = $this->db->query("select * from Account where email=\"".$data['email']."\" limit 1")->result_array();
		if($result){
			if($data['passwd']=== $result[0]['passwd']){
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}

	function get_user_data(){
		$old_email = $this->session->email;
		$query = $this->db->query("select * from Account where email=\"".$old_email."\"")->result_array();
		$email = $query[0]['email'];
		$passwd = $query[0]['passwd'];
		$phonenum = $query[0]['phonenum'];
		$name = $query[0]['name'];
		$id = $query[0]['id'];
		$permission = $query[0]['permission'];
		$result = array('email'=>$email, 'name'=>$name, 'id'=>$id
			, 'phonenum'=>$phonenum, 'permission'=>$permission);
		return $result;
	}

	function update_user_data($data){
		$old_email = $this->session->email;
		$query = $this->db->query("select * from Account where email=\"".$old_email."\"")->result_array();
		if(strcmp($data['email'], $query[0]['email']) != 0  && $data['email'] != null){
			$this->db->where('email', $old_email);
			$this->db->update('Account', array('email'=>$data['email']));
		}
		if(strcmp($data['passwd'], $query[0]['passwd']) != 0 && $data['passwd'] != null){
			$this->db->where('email', $old_email);
			$this->db->update('Account', array('passwd'=>$data['passwd']));
		}
		if(strcmp($data['name'], $query[0]['name']) != 0 && $data['name'] != null){
			$this->db->where('email', $old_email);
			$this->db->update('Account', array('name'=>$data['name']));
		}
		if(strcmp($data['phonenum'], $query[0]['phonenum']) != 0 && $data['phonenum'] != null){
			$this->db->where('email', $old_email);
			$this->db->update('Account', array('phonenum'=>$data['phonenum']));
		}
	}

	function get_permission($id){
		$query = $this->db->query("select * from Account where id=".$id)->result_array();
		return $query[0]["permission"];
	}

}