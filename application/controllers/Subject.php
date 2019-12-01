<?php
session_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class Subject extends CI_Controller {
	function __construct()
    {
        // this is your constructor
        parent::__construct();
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
        $subject    = $this->Subject_Model->get_user_subjects($user_no);
        $data = array(
            'user'      =>  $user,
            'subject'   =>  $subject
        );
        $this->load->view('faculty/detail',$data);
	}
}
