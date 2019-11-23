<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
        // this is your constructor
        parent::__construct();
        $this->load->helper('form');
        $this->load->helper('url');
    }

	public function index(){
		$this->load->view('login');
	}
}
