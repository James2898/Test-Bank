<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
        // this is your constructor
        parent::__construct();
    	$this->load->model('Login_Model');
    	$this->load->database();
    	$this->load->library('form_validation');
    	$this->load->helper('form');
        $this->load->helper('form');
        $this->load->helper('url');
    }

	public function index(){
		if(!isset($_SESSION['authorization'])){
			redirect(base_url().'index.php/home', 'refresh');
		}
		$this->load->view('login');
	}

	public function login(){
		$data = array(
			'username'	=>	$this->input->post('username'),
			'password'	=>	$this->input->post('password')
		);
		$result = $this->Login_Model->login($data);
		if($result == FALSE){
			redirect(base_url().'index.php/login?result=error');
		}else{
			$_SESSION['authorization'] 	= $result['authorization'];
			$_SESSION['first_name'] 	= $result['first_name'];
			$_SESSION['last_name'] 		= $result['last_name'];
			$_SESSION['user_no'] 		= $result['user_no'];

			redirect(base_url().'index.php/home','refresh');
		}
	}

	public function logout(){
		session_destroy();
		redirect(base_url() . 'index.php/login', 'refresh');
	}
}
