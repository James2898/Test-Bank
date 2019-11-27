<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
    {
        // this is your constructor
        parent::__construct();
        $this->load->model('User_Model');
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
    }

	public function index(){

        if(!isset($_SESSION['authorization'])){
            redirect(base_url().'index.php','refresh');
            exit();
        }
        $user = $this->User_Model->get_user($_SESSION['user_no']);
        $users = $this->User_Model->get_all_faculty();
        $data = array(
            'user'  =>  $user,
            'users' =>  $users,
        );
        $this->load->view('home',$data);
	}
}
