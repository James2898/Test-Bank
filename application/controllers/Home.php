<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct()
    {
        // this is your constructor
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
    }

	public function index(){
        if(!isset($_SESSION['authorization'])){
            $this->load->view('home');
        }else{
            redirect(base_url(),'refresh');
        }
	}
}
