<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Faculty extends CI_Controller {
	function __construct()
    {
        // this is your constructor
        parent::__construct();
        $this->load->model('User_Model');
        $this->load->model('Subject_Model');
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
    }

	public function index($user_no){

        if(!isset($_SESSION['authorization'])){
            redirect(base_url().'index.php','refresh');
            exit();
        }
        $user       = $this->User_Model->get_user($user_no);
        $subject    = $this->Subject_Model->get_faculty_subjects($user_no);
        $data = array(
            'user'      =>  $user,
            'subject'   =>  $subject
        );
        $this->load->view('faculty/index',$data);
	}
}
